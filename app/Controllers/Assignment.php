<?php

namespace App\Controllers;

use App\Models\AssignmentModel;
use App\Models\AssignmentSubmissionModel;
use App\Models\CourseModel;
use App\Models\EnrollmentModel;

class Assignment extends BaseController
{
    protected $assignmentModel;
    protected $submissionModel;
    protected $courseModel;
    protected $enrollmentModel;

    public function __construct()
    {
        $this->assignmentModel = new AssignmentModel();
        $this->submissionModel = new AssignmentSubmissionModel();
        $this->courseModel = new CourseModel();
        $this->enrollmentModel = new EnrollmentModel();
    }

    /**
     * Display assignments for a specific course
     */
    public function index($course_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        // Check if user has access to this course
        $course = $this->courseModel->find($course_id);
        if (!$course) {
            return redirect()->to('/courses')->with('error', 'Course not found');
        }

        // Check permissions
        if ($userRole === 'student') {
            if (!$this->enrollmentModel->isUserEnrolled($userId, $course_id)) {
                return redirect()->to('/courses')->with('error', 'You are not enrolled in this course');
            }
        } elseif ($userRole === 'teacher') {
            if ($course['teacher_id'] != $userId) {
                return redirect()->to('/courses')->with('error', 'You do not have permission to view this course');
            }
        } else {
            return redirect()->to('/courses')->with('error', 'Access denied');
        }

        $assignments = $this->assignmentModel->getAssignmentsByCourse($course_id);

        // For students, get submission status
        if ($userRole === 'student') {
            foreach ($assignments as &$assignment) {
                $submission = $this->submissionModel->getSubmission($assignment['id'], $userId);
                $assignment['has_submitted'] = !empty($submission);
                $assignment['submission'] = $submission;
            }
        }

        $data = [
            'course' => $course,
            'assignments' => $assignments,
            'userRole' => $userRole,
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
        ];

        return view('assignments/index', $data);
    }

    /**
     * Show create assignment form (Teachers only)
     */
    public function create($course_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        if ($userRole !== 'teacher') {
            return redirect()->to('/courses')->with('error', 'Only teachers can create assignments');
        }

        $course = $this->courseModel->find($course_id);
        if (!$course || $course['teacher_id'] != $userId) {
            return redirect()->to('/courses')->with('error', 'Course not found or access denied');
        }

        $data = [
            'course' => $course,
            'userName' => session()->get('userName'),
            'userRole' => $userRole,
            'userEmail' => session()->get('userEmail'),
        ];

        return view('assignments/create', $data);
    }

    /**
     * Handle assignment creation (Teachers only)
     */
    public function createPost($course_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        if ($userRole !== 'teacher') {
            return redirect()->to('/courses')->with('error', 'Only teachers can create assignments');
        }

        $course = $this->courseModel->find($course_id);
        if (!$course || $course['teacher_id'] != $userId) {
            return redirect()->to('/courses')->with('error', 'Course not found or access denied');
        }

        // Validation rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty|max_length[1000]',
            'due_date' => 'permit_empty|valid_date[Y-m-d H:i:s]',
            'assignment_file' => 'uploaded[assignment_file]|max_size[assignment_file,10240]|ext_in[assignment_file,pdf,doc,docx,txt]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $filePath = null;
        $fileName = null;

        // Handle file upload
        $file = $this->request->getFile('assignment_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = 'uploads/assignments/';
            if (!is_dir(FCPATH . $uploadPath)) {
                mkdir(FCPATH . $uploadPath, 0777, true);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . $uploadPath, $newName);
            $filePath = $uploadPath . $newName;
            $fileName = $file->getClientName();
        }

        // Create assignment
        $assignmentData = [
            'course_id' => $course_id,
            'teacher_id' => $userId,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'due_date' => $this->request->getPost('due_date') ?: null,
            'file_path' => $filePath,
            'file_name' => $fileName,
        ];

        if ($this->assignmentModel->insert($assignmentData)) {
            return redirect()->to('/assignments/course/' . $course_id)
                ->with('success', 'Assignment created successfully');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create assignment');
        }
    }

    /**
     * Show assignment submission form (Students only)
     */
    public function submit($assignment_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        if ($userRole !== 'student') {
            return redirect()->to('/courses')->with('error', 'Only students can submit assignments');
        }

        $assignment = $this->assignmentModel->getAssignmentWithCourse($assignment_id);
        if (!$assignment) {
            return redirect()->to('/courses')->with('error', 'Assignment not found');
        }

        // Check if student is enrolled
        if (!$this->enrollmentModel->isUserEnrolled($userId, $assignment['course_id'])) {
            return redirect()->to('/courses')->with('error', 'You are not enrolled in this course');
        }

        // Get existing submission
        $submission = $this->submissionModel->getSubmission($assignment_id, $userId);

        $data = [
            'assignment' => $assignment,
            'submission' => $submission,
            'userName' => session()->get('userName'),
            'userRole' => $userRole,
            'userEmail' => session()->get('userEmail'),
        ];

        return view('assignments/submit', $data);
    }

    /**
     * Handle assignment submission (Students only)
     */
    public function submitPost($assignment_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        if ($userRole !== 'student') {
            return redirect()->to('/courses')->with('error', 'Only students can submit assignments');
        }

        $assignment = $this->assignmentModel->getAssignmentWithCourse($assignment_id);
        if (!$assignment) {
            return redirect()->to('/courses')->with('error', 'Assignment not found');
        }

        // Check if student is enrolled
        if (!$this->enrollmentModel->isUserEnrolled($userId, $assignment['course_id'])) {
            return redirect()->to('/courses')->with('error', 'You are not enrolled in this course');
        }

        // Validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'submission_text' => 'permit_empty',
            'submission_file' => 'uploaded[submission_file]|max_size[submission_file,10240]|ext_in[submission_file,pdf,doc,docx,txt,zip]',
        ]);

        // Only validate file if no text is provided
        if (empty($this->request->getPost('submission_text'))) {
            $validation->setRule('submission_file', 'Submission File', 'uploaded[submission_file]|max_size[submission_file,10240]|ext_in[submission_file,pdf,doc,docx,txt,zip]');
        }

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $filePath = null;
        $fileName = null;

        // Handle file upload
        $file = $this->request->getFile('submission_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = 'uploads/assignment_submissions/';
            if (!is_dir(FCPATH . $uploadPath)) {
                mkdir(FCPATH . $uploadPath, 0777, true);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . $uploadPath, $newName);
            $filePath = $uploadPath . $newName;
            $fileName = $file->getClientName();
        }

        // Create or update submission
        $submissionData = [
            'assignment_id' => $assignment_id,
            'student_id' => $userId,
            'submission_text' => $this->request->getPost('submission_text'),
            'file_path' => $filePath,
            'file_name' => $fileName,
        ];

        if ($this->submissionModel->upsertSubmission($submissionData)) {
            return redirect()->to('/assignments/course/' . $assignment['course_id'])
                ->with('success', 'Assignment submitted successfully');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to submit assignment');
        }
    }

    /**
     * View submissions for an assignment (Teachers only)
     */
    public function viewSubmissions($assignment_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        if ($userRole !== 'teacher') {
            return redirect()->to('/courses')->with('error', 'Only teachers can view submissions');
        }

        $assignment = $this->assignmentModel->getAssignmentWithCourse($assignment_id);
        if (!$assignment || $assignment['teacher_id'] != $userId) {
            return redirect()->to('/courses')->with('error', 'Assignment not found or access denied');
        }

        $submissions = $this->submissionModel->getSubmissionsByAssignment($assignment_id);

        $data = [
            'assignment' => $assignment,
            'submissions' => $submissions,
            'userName' => session()->get('userName'),
            'userRole' => $userRole,
            'userEmail' => session()->get('userEmail'),
        ];

        return view('assignments/view_submissions', $data);
    }

    /**
     * Get submission text via AJAX
     */
    public function getSubmissionText($submission_id)
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['error' => 'Not logged in'])->setStatusCode(401);
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        // Get submission
        $submission = $this->submissionModel->find($submission_id);
        if (!$submission) {
            return $this->response->setJSON(['error' => 'Submission not found'])->setStatusCode(404);
        }

        // Check permissions
        if ($userRole === 'student' && $submission['student_id'] != $userId) {
            return $this->response->setJSON(['error' => 'Access denied'])->setStatusCode(403);
        } elseif ($userRole === 'teacher') {
            $assignment = $this->assignmentModel->find($submission['assignment_id']);
            if (!$assignment || $assignment['teacher_id'] != $userId) {
                return $this->response->setJSON(['error' => 'Access denied'])->setStatusCode(403);
            }
        }

        return $this->response->setJSON([
            'submission_text' => $submission['submission_text'] ?: ''
        ]);
    }

    /**
     * Download submission file
     */
    public function downloadSubmission($submission_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        // Get submission
        $submission = $this->submissionModel->find($submission_id);
        if (!$submission || !$submission['file_path']) {
            return redirect()->back()->with('error', 'File not found');
        }

        // Check permissions
        if ($userRole === 'student' && $submission['student_id'] != $userId) {
            return redirect()->back()->with('error', 'Access denied');
        } elseif ($userRole === 'teacher') {
            $assignment = $this->assignmentModel->find($submission['assignment_id']);
            if (!$assignment || $assignment['teacher_id'] != $userId) {
                return redirect()->back()->with('error', 'Access denied');
            }
        }

        if (!file_exists(FCPATH . $submission['file_path'])) {
            return redirect()->back()->with('error', 'File not found on server');
        }

        return $this->response->download(FCPATH . $submission['file_path'], null, true)
            ->setFileName($submission['file_name']);
    }

    /**
     * Display all assignments for the current user (teacher or student)
     */
    public function assignments()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        $userId = session()->get('user_id');

        if ($userRole === 'teacher') {
            $assignments = $this->assignmentModel->getAssignmentsByTeacher($userId);
        } elseif ($userRole === 'student') {
            $assignments = $this->assignmentModel->getAssignmentsForStudent($userId);

            // Add submission status for students
            foreach ($assignments as &$assignment) {
                $submission = $this->submissionModel->getSubmission($assignment['id'], $userId);
                $assignment['has_submitted'] = !empty($submission);
                $assignment['submission'] = $submission;
            }
        } else {
            return redirect()->to('/dashboard')->with('error', 'Access denied');
        }

        $data = [
            'assignments' => $assignments,
            'userName' => session()->get('userName'),
            'userRole' => $userRole,
            'userEmail' => session()->get('userEmail'),
        ];

        return view('assignments/assignment', $data);
    }
}
