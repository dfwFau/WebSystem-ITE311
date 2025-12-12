<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    /**
     * Teacher Dashboard
     * Redirects to unified dashboard with teacher-specific functionality
     */
    public function dashboard()
    {
        // Redirect to unified dashboard - it will automatically show teacher content
        return redirect()->to('/dashboard');
    }

    public function classes()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('teacher/classes', array_merge($this->data, [
            'title' => 'My Classes',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }

    public function materials()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('teacher/materials', array_merge($this->data, [
            'title' => 'Materials',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }

    public function grades()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('teacher/grades', array_merge($this->data, [
            'title' => 'Grade Students',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }

    public function createCourse()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('teacher/create_course', array_merge($this->data, [
            'title' => 'Create Course',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }

    public function storeCourse()
    {
        // Role-based access control is handled by the RoleAuth filter
        // Course creation logic will be implemented here
        return redirect()->to('/dashboard')->with('success', 'Course created successfully!');
    }

    public function getCourses()
    {
        // Role-based access control is handled by the RoleAuth filter
        $courseModel = new \App\Models\CourseModel();
        $materialModel = new \App\Models\MaterialModel();
        $searchQuery = $this->request->getGet('search');

        // Assuming teacher can see all courses or their own; for now, get all
        $courses = $courseModel->getAllCourses();

        // Filter courses based on search query
        if (!empty($searchQuery)) {
            $searchLower = strtolower($searchQuery);
            $courses = array_filter($courses, function($course) use ($searchLower) {
                return strpos(strtolower($course['course_name'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($course['course_code'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($course['description'] ?? ''), $searchLower) !== false;
            });
            // Re-index array after filtering
            $courses = array_values($courses);
        }

        // Get materials for each course
        foreach ($courses as &$course) {
            $course['materials'] = $materialModel->getMaterialsByCourse($course['course_id']);
        }

        return view('teacher/courses_list', array_merge($this->data, [
            'title' => 'My Courses',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole'),
            'courses' => $courses,
            'searchQuery' => $searchQuery
        ]));
    }

    public function manageStudents()
    {
        // Role-based access control is handled by the RoleAuth filter
        $teacherId = session()->get('user_id');
        $courseModel = new \App\Models\CourseModel();
        $enrollmentModel = new \App\Models\EnrollmentModel();
        $userModel = new \App\Models\UserModel();
        $statusModel = new \App\Models\EnrollmentStatusModel();

        // Get search and filter parameters
        $searchQuery = $this->request->getGet('search');
        $yearLevel = $this->request->getGet('year_level');
        $program = $this->request->getGet('program');
        $status = $this->request->getGet('status');
        $courseId = $this->request->getGet('course_id');

        // Get teacher's courses for the dropdown
        $courses = $courseModel->getCoursesByTeacher($teacherId);

        // Set default course if none selected
        if (empty($courseId) && !empty($courses)) {
            $courseId = $courses[0]['course_id'];
        }

        // Get course details for header
        $selectedCourse = null;
        if ($courseId) {
            $selectedCourse = $courseModel->getCourseWithTeacher($courseId);
        }

        // Get students enrolled in the selected course
        $students = [];
        if ($courseId) {
            $enrollments = $enrollmentModel->getEnrollmentsByCourse($courseId);

            foreach ($enrollments as $enrollment) {
                $student = $userModel->find($enrollment['user_id']);
                if ($student) {
                    // Add enrollment info to student data
                    $student['enrollment_id'] = $enrollment['enrollment_id'];
                    $student['enrollment_date'] = $enrollment['enrollment_date'];
                    $student['status'] = $enrollment['status'];
                    $student['status_id'] = $enrollment['status_id'];

                    // Add additional fields (these might need to be added to users table)
                    $student['student_id'] = $student['id']; // Using user ID as student ID
                    $student['program'] = $student['name'] ?? 'Not specified'; // Placeholder
                    $student['year_level'] = 'Not specified'; // Placeholder
                    $student['section'] = 'Not specified'; // Placeholder

                    $students[] = $student;
                }
            }
        }

        // Apply filters
        if (!empty($searchQuery)) {
            $searchLower = strtolower($searchQuery);
            $students = array_filter($students, function($student) use ($searchLower) {
                return strpos(strtolower($student['name'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($student['email'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($student['student_id'] ?? ''), $searchLower) !== false;
            });
        }

        if (!empty($yearLevel)) {
            $students = array_filter($students, function($student) use ($yearLevel) {
                return ($student['year_level'] ?? '') === $yearLevel;
            });
        }

        if (!empty($program)) {
            $students = array_filter($students, function($student) use ($program) {
                return ($student['program'] ?? '') === $program;
            });
        }

        if (!empty($status)) {
            $students = array_filter($students, function($student) use ($status) {
                return ($student['status'] ?? '') === $status;
            });
        }

        // Get unique values for filter dropdowns
        $yearLevels = array_unique(array_column($students, 'year_level'));
        $programs = array_unique(array_column($students, 'program'));
        $statuses = ['Active', 'Inactive', 'Dropped'];

        return view('teacher/manage_students', array_merge($this->data, [
            'title' => 'Manage Students',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole'),
            'courses' => $courses,
            'selectedCourse' => $selectedCourse,
            'students' => array_values($students), // Re-index array
            'searchQuery' => $searchQuery,
            'yearLevel' => $yearLevel,
            'program' => $program,
            'status' => $status,
            'courseId' => $courseId,
            'yearLevels' => array_filter($yearLevels), // Remove empty values
            'programs' => array_filter($programs), // Remove empty values
            'statuses' => $statuses
        ]));
    }

    public function getStudentDetails()
    {
        $studentId = $this->request->getGet('student_id');
        $courseId = $this->request->getGet('course_id');

        if (!$studentId || !$courseId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid parameters']);
        }

        $enrollmentModel = new \App\Models\EnrollmentModel();
        $userModel = new \App\Models\UserModel();

        $enrollment = $enrollmentModel->getEnrollmentByUserAndCourse($studentId, $courseId);
        $student = $userModel->find($studentId);

        if (!$enrollment || !$student) {
            return $this->response->setJSON(['success' => false, 'message' => 'Student or enrollment not found']);
        }

        $statusModel = new \App\Models\EnrollmentStatusModel();
        $statusName = $statusModel->getStatusNameById($enrollment['status_id']);

        $studentDetails = [
            'student_id' => $student['id'],
            'full_name' => $student['name'],
            'email' => $student['email'],
            'program' => $student['name'] ?? 'Not specified', // Placeholder
            'year_level' => 'Not specified', // Placeholder
            'section' => 'Not specified', // Placeholder
            'enrollment_date' => $enrollment['enrollment_date'],
            'status' => $statusName
        ];

        return $this->response->setJSON(['success' => true, 'student' => $studentDetails]);
    }

    public function updateStudentStatus()
    {
        $enrollmentId = $this->request->getPost('enrollment_id');
        $statusName = $this->request->getPost('status');
        $remarks = $this->request->getPost('remarks');

        if (!$enrollmentId || !$statusName) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid parameters']);
        }

        $enrollmentModel = new \App\Models\EnrollmentModel();
        $statusModel = new \App\Models\EnrollmentStatusModel();

        $statusId = $statusModel->getStatusIdByName($statusName);
        if (!$statusId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid status']);
        }

        $updated = $enrollmentModel->update($enrollmentId, [
            'status_id' => $statusId,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($updated) {
            return $this->response->setJSON(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update status']);
        }
    }

    public function removeStudent()
    {
        $enrollmentId = $this->request->getPost('enrollment_id');

        if (!$enrollmentId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid enrollment ID']);
        }

        $enrollmentModel = new \App\Models\EnrollmentModel();
        $deleted = $enrollmentModel->delete($enrollmentId);

        if ($deleted) {
            return $this->response->setJSON(['success' => true, 'message' => 'Student removed from course']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to remove student']);
        }
    }

    /**
     * Get pending enrollment applications for teacher's courses
     */
    public function getPendingEnrollments()
    {
        $teacherId = session()->get('user_id');
        $enrollmentModel = new \App\Models\EnrollmentModel();
        $courseModel = new \App\Models\CourseModel();
        $userModel = new \App\Models\UserModel();

        // Get all pending enrollments for this teacher's courses
        $pendingEnrollments = $enrollmentModel->getPendingEnrollmentsByTeacher($teacherId);

        // Format the data for display
        $formattedEnrollments = [];
        foreach ($pendingEnrollments as $enrollment) {
            $student = $userModel->find($enrollment['user_id']);
            $course = $courseModel->find($enrollment['course_id']);

            if ($student && $course) {
                $formattedEnrollments[] = [
                    'enrollment_id' => $enrollment['enrollment_id'],
                    'student_id' => $student['id'],
                    'student_name' => $student['name'],
                    'student_email' => $student['email'],
                    'course_id' => $course['course_id'],
                    'course_number' => $course['course_number'],
                    'course_name' => $course['description'],
                    'enrollment_date' => $enrollment['enrollment_date'],
                    'application_date' => $enrollment['created_at'] ?? $enrollment['enrollment_date']
                ];
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'pendingEnrollments' => $formattedEnrollments
        ]);
    }

    /**
     * Approve or reject enrollment application
     */
    public function processEnrollmentApplication()
    {
        $enrollmentId = $this->request->getPost('enrollment_id');
        $action = $this->request->getPost('action'); // 'approve' or 'reject'
        $remarks = $this->request->getPost('remarks') ?? '';

        if (!$enrollmentId || !in_array($action, ['approve', 'reject'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid parameters'
            ]);
        }

        $enrollmentModel = new \App\Models\EnrollmentModel();
        $userModel = new \App\Models\UserModel();
        $courseModel = new \App\Models\CourseModel();
        $notificationModel = new \App\Models\NotificationModel();

        // Get enrollment details
        $enrollment = $enrollmentModel->find($enrollmentId);
        if (!$enrollment) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Enrollment application not found'
            ]);
        }

        // Check if teacher owns this course
        $course = $courseModel->find($enrollment['course_id']);
        if (!$course || $course['teacher_id'] != session()->get('user_id')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Access denied'
            ]);
        }

        // Get student details for notification
        $student = $userModel->find($enrollment['user_id']);

        if ($action === 'approve') {
            // Update enrollment status to 'enrolled'
            $result = $enrollmentModel->updateEnrollmentStatus($enrollmentId, 'enrolled');

            if ($result) {
                // Notify student of approval
                $notificationData = [
                    'user_id' => $enrollment['user_id'],
                    'message' => "Congratulations! Your enrollment application for {$course['course_number']} has been approved. You can now access the course materials.",
                    'is_read' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $notificationModel->insert($notificationData);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Enrollment application approved successfully'
                ]);
            }
        } elseif ($action === 'reject') {
            // Delete the pending enrollment
            $result = $enrollmentModel->delete($enrollmentId);

            if ($result) {
                // Notify student of rejection
                $notificationData = [
                    'user_id' => $enrollment['user_id'],
                    'message' => "Unfortunately, your enrollment application for {$course['course_number']} has been rejected." . (!empty($remarks) ? " Reason: {$remarks}" : ""),
                    'is_read' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $notificationModel->insert($notificationData);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Enrollment application rejected'
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to process enrollment application'
        ]);
    }
}
