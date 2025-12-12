<?php

namespace App\Controllers;

use App\Models\EnrollmentModel;
use App\Models\CourseModel;
use App\Models\NotificationModel;
use App\Models\UserModel;

class Course extends BaseController
{
    protected $enrollmentModel;
    protected $courseModel;
    protected $db;

    public function __construct()
    {
        $this->enrollmentModel = new EnrollmentModel();
        $this->courseModel = new CourseModel();
        $this->db = \Config\Database::connect();
    }

    /**
     * Display courses page based on user role
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');
        $userName = session()->get('userName');
        $userEmail = session()->get('userEmail');

        $data = [
            'userName' => $userName,
            'userRole' => $userRole,
            'userEmail' => $userEmail,
        ];

        switch ($userRole) {
            case 'admin':
                // Admin can see all courses
                $data['allCourses'] = $this->courseModel->getAllCoursesWithTeachers();
                break;

            case 'teacher':
                // Teacher can see their own courses and all courses
                $data['teacherCourses'] = $this->courseModel->getCoursesByTeacher($userId);
                $data['allCourses'] = $this->courseModel->getAllCoursesWithTeachers();
                $data['totalMaterials'] = $this->courseModel->getTotalMaterialsByTeacher($userId);
                $data['totalEnrolledStudents'] = $this->courseModel->getTotalEnrolledStudentsByTeacher($userId);
                break;

            case 'student':
                // Student can see enrolled and available courses
                $data['enrolledCourses'] = $this->enrollmentModel->getUserEnrollments($userId);
                $data['availableCourses'] = $this->courseModel->getAvailableCoursesForStudent($userId);
                $data['upcomingDeadlines'] = []; // TODO: Implement if needed
                $data['recentGrades'] = []; // TODO: Implement if needed
                break;

            default:
                return redirect()->to('/dashboard');
        }

        return view('courses/index', $data);
    }

    /**
     * Handle course search
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function search()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');
        $userName = session()->get('userName');
        $userEmail = session()->get('userEmail');

        // Get search term from GET or POST
        $searchTerm = $this->request->getGet('search_term') ?? $this->request->getPost('search_term') ?? '';

        $data = [
            'userName' => $userName,
            'userRole' => $userRole,
            'userEmail' => $userEmail,
            'searchTerm' => $searchTerm,
        ];

        if ($userRole === 'student') {
            // For students, search in available courses
            if (!empty($searchTerm)) {
                $availableCourses = $this->courseModel->getAvailableCoursesForStudent($userId);

                // Filter courses using LIKE queries
                $filteredCourses = array_filter($availableCourses, function($course) use ($searchTerm) {
                    $term = strtolower($searchTerm);
                    return strpos(strtolower($course['course_number']), $term) !== false;
                });

                $data['availableCourses'] = array_values($filteredCourses);
            } else {
                $data['availableCourses'] = $this->courseModel->getAvailableCoursesForStudent($userId);
            }

            // Always show enrolled courses
            $data['enrolledCourses'] = $this->enrollmentModel->getUserEnrollments($userId);
            $data['upcomingDeadlines'] = []; // TODO: Implement if needed
            $data['recentGrades'] = []; // TODO: Implement if needed
        } elseif ($userRole === 'admin') {
            // For admins, search in all courses
            if (!empty($searchTerm)) {
                $allCourses = $this->courseModel->getAllCoursesWithTeachers();

                // Filter courses using LIKE queries
                $filteredCourses = array_filter($allCourses, function($course) use ($searchTerm) {
                    $term = strtolower($searchTerm);
                    return strpos(strtolower($course['course_number']), $term) !== false;
                });

                $data['allCourses'] = array_values($filteredCourses);
            } else {
                $data['allCourses'] = $this->courseModel->getAllCoursesWithTeachers();
            }
        } else {
            // For other roles, redirect to index or handle differently
            return redirect()->to('/courses');
        }

        // Check if it's an AJAX request
        if ($this->request->isAJAX()) {
            $this->response->setContentType('application/json');
            return $this->response->setJSON([
                'success' => true,
                'availableCourses' => $data['availableCourses'] ?? [],
                'searchTerm' => $searchTerm
            ]);
        } else {
            // Render the view with filtered data
            return view('courses/index', $data);
        }
    }

    /**
     * Handle course enrollment via AJAX
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function enroll()
    {
        $this->response->setContentType('application/json');

        if (!session()->get('isLoggedIn')) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'User not logged in']);
        }

        $course_id = $this->request->getPost('course_id');
        $user_id = session()->get('user_id');

        if (!$course_id) {
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Course ID is required']);
        }

        $enrollmentModel = new EnrollmentModel();
        $courseModel = new CourseModel();

        $course = $courseModel->find($course_id);
        if (!$course) {
            return $this->response->setStatusCode(404)->setJSON(['success' => false, 'message' => 'Course not found']);
        }

        if ($enrollmentModel->isAlreadyEnrolled($user_id, $course_id)) {
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Already enrolled in this course']);
        }

        $data = [
            'user_id' => $user_id,
            'course_id' => $course_id,
            'enrollment_date' => date('Y-m-d H:i:s'),
            'status' => 'pending' // Set status to pending for teacher approval
        ];

        if ($enrollmentModel->enrollUser($data)) {
            // Get the enrollment date from the data
            $enrollment_date = $data['enrollment_date'];

            // Create notification for enrollment application for the student
            $notificationModel = new NotificationModel();
            $notificationData = [
                'user_id' => $user_id,
                'message' => "Your enrollment application for {$course['course_number']} has been submitted and is waiting for teacher approval.",
                'is_read' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $notificationModel->insert($notificationData);

            // Notify the teacher about the new enrollment application
            $userModel = new \App\Models\UserModel();
            $student = $userModel->find($user_id);
            if ($student) {
                $studentName = $student['name'];
                $teacherNotification = [
                    'user_id' => $course['teacher_id'],
                    'message' => "Student {$studentName} has applied for enrollment in your course: {$course['course_number']}. Please review and approve/reject the application.",
                    'is_read' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $notificationModel->insert($teacherNotification);
            }

            return $this->response->setJSON(['success' => true, 'message' => 'Enrollment application submitted successfully. Waiting for teacher approval.', 'enrollment_date' => $enrollment_date]);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['success' => false, 'message' => 'Failed to submit enrollment application']);
        }
    }

    /**
     * Show edit course form or handle form submission (Admins only)
     *
     * @param int $courseId
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function edit($courseId = null)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');

        // Only admins can edit courses
        if ($userRole !== 'admin') {
            return redirect()->to('/dashboard')
                ->with('error', 'Only admins can edit courses.');
        }

        if (!$courseId) {
            return redirect()->to('/courses')
                ->with('error', 'Course ID is required.');
        }

        // Get the course
        $course = $this->courseModel->find($courseId);
        if (!$course) {
            return redirect()->to('/courses')
                ->with('error', 'Course not found.');
        }

        // Handle POST request (form submission)
        if ($this->request->getMethod() === 'POST') {
            // Validate input
            $validation = \Config\Services::validation();
            $validationRules = [
                'course_number' => [
                    'label' => 'Course Number (CN)',
                    'rules' => 'required|min_length[5]|max_length[200]|is_unique[courses.course_number,id,' . $courseId . ']',
                    'errors' => [
                        'required' => 'Course number (CN) is required.',
                        'min_length' => 'Course number must be at least 5 characters long.',
                        'max_length' => 'Course number cannot exceed 200 characters.',
                        'is_unique' => 'This course number already exists. Please use a different combination.'
                    ]
                ],
                'description' => [
                    'label' => 'Description',
                    'rules' => 'permit_empty|max_length[500]',
                    'errors' => [
                        'max_length' => 'Description cannot exceed 500 characters.'
                    ]
                ],
                'units' => [
                    'label' => 'Units',
                    'rules' => 'permit_empty|is_natural_no_zero|less_than_equal_to[6]',
                    'errors' => [
                        'is_natural_no_zero' => 'Units must be a number greater than 0.',
                        'less_than_equal_to' => 'Units cannot exceed 6 units.'
                    ]
                ],
                'schedule_date' => [
                    'label' => 'Schedule Day',
                    'rules' => 'permit_empty',
                    'errors' => []
                ],
                'schedule_time' => [
                    'label' => 'Schedule Time',
                    'rules' => 'permit_empty',
                    'errors' => []
                ],
                'teacher_id' => [
                    'label' => 'Teacher',
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'Please select a teacher for this course.',
                        'integer' => 'Invalid teacher selection.'
                    ]
                ]
            ];

            $validation->setRules($validationRules);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $validation->getErrors());
            }

            // Additional manual validation
            $scheduleDate = $this->request->getPost('schedule_date');
            $scheduleTime = $this->request->getPost('schedule_time');
            $teacherId = $this->request->getPost('teacher_id');
            $manualErrors = [];

            if (!empty($scheduleDate)) {
                $selectedDate = strtotime($scheduleDate);
                $currentYear = date('Y');
                $selectedYear = date('Y', $selectedDate);

                if ((int)$selectedYear < (int)$currentYear) {
                    $manualErrors['schedule_date'] = 'Schedule date cannot be from a previous year.';
                }
            }

            if (empty($scheduleTime)) {
                $manualErrors['schedule_time'] = 'Schedule time is required!';
            }

            // Check if teacher exists
            if (!empty($teacherId)) {
                $userModel = new \App\Models\UserModel();
                $teacher = $userModel->find($teacherId);
                if (!$teacher || $teacher['role_id'] != 2) { // role_id 2 is teacher
                    $manualErrors['teacher_id'] = 'The selected teacher does not exist.';
                }
            }

            if (!empty($manualErrors)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $manualErrors);
            }

            // Get course data
            $courseNumber = $this->request->getPost('course_number');
            $description = $this->request->getPost('description') ?? '';
            $units = $this->request->getPost('units') ?? 3;
            $teacherId = $this->request->getPost('teacher_id');
            $academicYear = $this->request->getPost('academic_year') ?? '';
            $semester = $this->request->getPost('semester') ?? '';
            $term = $this->request->getPost('term') ?? '';
            $scheduleTime = $this->request->getPost('schedule_time') ?? '';
            $scheduleDate = $this->request->getPost('schedule_date') ?? '';

            // Update course
            $courseData = [
                'course_number' => $courseNumber,
                'description' => $description,
                'units' => (int)$units,
                'teacher_id' => $teacherId,
                'academic_year' => $academicYear,
                'semester' => $semester,
                'term' => $term,
                'schedule_time' => $scheduleTime,
                'schedule_date' => $scheduleDate,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->courseModel->update($courseId, $courseData)) {
                return redirect()->to('/courses')
                    ->with('success', 'Course updated successfully!');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to update course. Please try again.');
            }
        }

        // Handle GET request (show form)
        $data = [
            'userName' => session()->get('userName'),
            'userRole' => $userRole,
            'userEmail' => session()->get('userEmail'),
            'course' => $course,
            'isEdit' => true
        ];

        return view('courses/create', $data);
    }

    /**
     * Show create course form or handle form submission (Admins only)
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function create()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            if ($this->request->getMethod() === 'POST' && $this->request->isAJAX()) {
                return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'User not logged in']);
            }
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        // Only admins and teachers can create courses
        if ($userRole !== 'admin' && $userRole !== 'teacher') {
            if ($this->request->getMethod() === 'POST' && $this->request->isAJAX()) {
                return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Access denied.']);
            }
            return redirect()->to('/dashboard')
                ->with('error', 'Access denied.');
        }

        // Handle POST request (form submission)
        if ($this->request->getMethod() === 'POST') {
            // Validate input
            $validation = \Config\Services::validation();
            $validationRules = [
                'course_number' => [
                    'label' => 'Course Number (CN)',
                    'rules' => 'required|min_length[5]|max_length[200]|is_unique[courses.course_number]',
                    'errors' => [
                        'required' => 'Course number (CN) is required.',
                        'min_length' => 'Course number must be at least 5 characters long.',
                        'max_length' => 'Course number cannot exceed 200 characters.',
                        'is_unique' => 'This course number already exists. Please use a different combination.'
                    ]
                ],
                'description' => [
                    'label' => 'Description',
                    'rules' => 'permit_empty|max_length[500]',
                    'errors' => [
                        'max_length' => 'Description cannot exceed 500 characters.'
                    ]
                ],
                'units' => [
                    'label' => 'Units',
                    'rules' => 'permit_empty|is_natural_no_zero|less_than_equal_to[6]',
                    'errors' => [
                        'is_natural_no_zero' => 'Units must be a number greater than 0.',
                        'less_than_equal_to' => 'Units cannot exceed 6 units.'
                    ]
                ],
                'schedule_date' => [
                    'label' => 'Schedule Date',
                    'rules' => 'permit_empty',
                    'errors' => []
                ],
                'schedule_time' => [
                    'label' => 'Schedule Time',
                    'rules' => 'permit_empty',
                    'errors' => []
                ]
            ];

            // Add teacher_id validation for admins
            if ($userRole === 'admin') {
                $validationRules['teacher_id'] = [
                    'label' => 'Teacher',
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'Please select a teacher for this course.',
                        'integer' => 'Invalid teacher selection.'
                    ]
                ];
            }

            $validation->setRules($validationRules);

            if (!$validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                if ($this->request->isAJAX()) {
                    return $this->response->setStatusCode(400)->setJSON([
                        'success' => false,
                        'message' => 'Validation failed',
                        'errors' => $errors
                    ]);
                }
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $errors);
            }

            // Additional manual validation
            $scheduleDate = $this->request->getPost('schedule_date');
            $scheduleTime = $this->request->getPost('schedule_time');
            $teacherId = $this->request->getPost('teacher_id');
            $manualErrors = [];

            if (!empty($scheduleDate)) {
                $selectedDate = strtotime($scheduleDate);
                $currentYear = date('Y');
                $selectedYear = date('Y', $selectedDate);

                if ((int)$selectedYear < (int)$currentYear) {
                    $manualErrors['schedule_date'] = 'Schedule date cannot be from a previous year.';
                }
            }

            if (empty($scheduleTime)) {
                $manualErrors['schedule_time'] = 'Schedule time is required!';
            }

            // Check if teacher exists for admin
            if ($userRole === 'admin' && !empty($teacherId)) {
                $userModel = new \App\Models\UserModel();
                $teacher = $userModel->find($teacherId);
                if (!$teacher || $teacher['role_id'] != 2) { // role_id 2 is teacher
                    $manualErrors['teacher_id'] = 'The selected teacher does not exist.';
                }
            }

            if (!empty($manualErrors)) {
                if ($this->request->isAJAX()) {
                    return $this->response->setStatusCode(400)->setJSON([
                        'success' => false,
                        'message' => 'Validation failed',
                        'errors' => $manualErrors
                    ]);
                }
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $manualErrors);
            }

            // Get course data
            $courseNumber = $this->request->getPost('course_number');
            $description = $this->request->getPost('description') ?? '';
            $units = $this->request->getPost('units') ?? 3;
            $teacherId = $userRole === 'admin' ? $this->request->getPost('teacher_id') : $userId;
            $academicYear = $this->request->getPost('academic_year') ?? '';
            $semester = $this->request->getPost('semester') ?? '';
            $term = $this->request->getPost('term') ?? '';
            $scheduleTime = $this->request->getPost('schedule_time') ?? '';
            $scheduleDate = $this->request->getPost('schedule_date') ?? '';

            // Create course
            $courseData = [
                'course_number' => $courseNumber,
                'description' => $description,
                'units' => (int)$units,
                'teacher_id' => $teacherId,
                'academic_year' => $academicYear,
                'semester' => $semester,
                'term' => $term,
                'schedule_time' => $scheduleTime,
                'schedule_date' => $scheduleDate,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->courseModel->insert($courseData)) {
                // Create notification for the assigned teacher
                $notificationModel = new NotificationModel();
                $notificationData = [
                    'user_id' => $teacherId,
                    'message' => "A new course '{$courseNumber}' has been assigned to you. Please review and activate it when ready.",
                    'is_read' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $notificationModel->insert($notificationData);

                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'Course created successfully!',
                        'course' => $this->courseModel->find($this->courseModel->getInsertID())
                    ]);
                }
                return redirect()->to('/courses')
                    ->with('success', 'Course created successfully!');
            } else {
                if ($this->request->isAJAX()) {
                    return $this->response->setStatusCode(500)->setJSON([
                        'success' => false,
                        'message' => 'Failed to create course. Please try again.'
                    ]);
                }
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to create course. Please try again.');
            }
        }

        // Handle GET request (show form)
        $data = [
            'userName' => session()->get('userName'),
            'userRole' => $userRole,
            'userEmail' => session()->get('userEmail'),
        ];

        return view('courses/create', $data);
    }

    /**
     * Get teacher courses via AJAX
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getTeacherCourses()
    {
        $this->response->setContentType('application/json');

        if (!session()->get('isLoggedIn')) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'User not logged in']);
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        if ($userRole !== 'teacher') {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Access denied']);
        }

        $teacherCourses = $this->courseModel->getCoursesByTeacher($userId);
        $totalMaterials = $this->courseModel->getTotalMaterialsByTeacher($userId);

        // Update course status and action based on enrollment
        foreach ($teacherCourses as &$course) {
            $enrollmentCount = $this->enrollmentModel->getCourseEnrollmentCount($course['course_id']);
            if ($enrollmentCount > 0) {
                $course['status'] = 'active';
                $course['action'] = 'enrolled';
            } else {
                $course['status'] = 'pending';
                $course['action'] = 'enroll';
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'teacherCourses' => $teacherCourses,
            'totalMaterials' => $totalMaterials
        ]);
    }

    /**
     * Get all courses via AJAX (Admin only)
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getAllCourses()
    {
        $this->response->setContentType('application/json');

        if (!session()->get('isLoggedIn')) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'User not logged in']);
        }

        $userRole = session()->get('userRole');

        if ($userRole !== 'admin') {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Access denied']);
        }

        $allCourses = $this->courseModel->getAllCoursesWithTeachers();

        // Add student count for each course
        foreach ($allCourses as &$course) {
            $enrollmentModel = new EnrollmentModel();
            $course['students'] = $enrollmentModel->getCourseEnrollmentCount($course['course_id']);
        }

        return $this->response->setJSON([
            'success' => true,
            'allCourses' => $allCourses
        ]);
    }

    /**
     * Activate a course (Teacher only)
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function activate()
    {
        $this->response->setContentType('application/json');

        if (!session()->get('isLoggedIn')) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'User not logged in']);
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        if ($userRole !== 'teacher') {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Only teachers can activate courses']);
        }

        $courseId = $this->request->getPost('course_id');

        if (!$courseId) {
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Course ID is required']);
        }

        // Check if the course belongs to this teacher
        $course = $this->courseModel->find($courseId);
        if (!$course) {
            return $this->response->setStatusCode(404)->setJSON(['success' => false, 'message' => 'Course not found']);
        }

        if ($course['teacher_id'] != $userId) {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'You can only activate your own courses']);
        }

        // Update course status to active
        $updateData = [
            'status' => 'active',
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->courseModel->update($courseId, $updateData)) {
            // Get the updated student count
            $enrollmentCount = $this->enrollmentModel->getCourseEnrollmentCount($courseId);
            
            // Notify all students about the newly available course
            $userModel = new UserModel();
            $students = $userModel->getUsersByRoleName('student');

            $notificationModel = new NotificationModel();
            foreach ($students as $student) {
                $studentNotification = [
                    'user_id' => $student['id'],
                    'message' => "A new course '{$course['course_number']}' is now available for enrollment!",
                    'is_read' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $notificationModel->insert($studentNotification);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Course activated successfully! Students can now enroll in this course.',
                'studentCount' => $enrollmentCount
            ]);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['success' => false, 'message' => 'Failed to activate course']);
        }
    }

    /**
     * Hard delete a course (Admin only)
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function delete()
    {
        $this->response->setContentType('application/json');

        if (!session()->get('isLoggedIn')) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'User not logged in']);
        }

        $userRole = session()->get('userRole');

        if ($userRole !== 'admin') {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Only admins can delete courses']);
        }

        $courseId = $this->request->getPost('course_id');

        if (!$courseId) {
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Course ID is required']);
        }

        // Check if the course exists
        $course = $this->courseModel->find($courseId);
        if (!$course) {
            return $this->response->setStatusCode(404)->setJSON(['success' => false, 'message' => 'Course not found']);
        }

        // Start transaction for data integrity
        $this->db->transStart();

        try {
            // Delete related enrollments first
            $this->enrollmentModel->where('course_id', $courseId)->delete();

            // Delete related materials
            $materialModel = new \App\Models\MaterialModel();
            $materialModel->where('course_id', $courseId)->delete();

            // Delete the course
            if ($this->courseModel->delete($courseId)) {
                $this->db->transComplete();
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Course deleted successfully!'
                ]);
            } else {
                $this->db->transRollback();
                return $this->response->setStatusCode(500)->setJSON(['success' => false, 'message' => 'Failed to delete course']);
            }
        } catch (\Exception $e) {
            $this->db->transRollback();
            return $this->response->setStatusCode(500)->setJSON(['success' => false, 'message' => 'Failed to delete course: ' . $e->getMessage()]);
        }
    }

}
