<?php

namespace App\Controllers;

class Student extends BaseController
{
    /**
     * Student Dashboard
     * Redirects to unified dashboard with student-specific functionality
     */
    public function dashboard()
    {
        // Redirect to unified dashboard - it will automatically show student content
        return redirect()->to('/dashboard');
    }

    public function courses()
    {
        // Role-based access control is handled by the RoleAuth filter
        $enrollmentModel = new \App\Models\EnrollmentModel();
        $materialModel = new \App\Models\MaterialModel();
        $courseModel = new \App\Models\CourseModel();

        $userId = session()->get('userId');
        $searchQuery = $this->request->getGet('search');
        
        $enrollments = $enrollmentModel->getUserEnrollments($userId);

        // Filter enrollments based on search query
        if (!empty($searchQuery)) {
            $searchLower = strtolower($searchQuery);
            $enrollments = array_filter($enrollments, function($enrollment) use ($searchLower) {
                return strpos(strtolower($enrollment['course_name'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($enrollment['course_code'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($enrollment['description'] ?? ''), $searchLower) !== false;
            });
            // Re-index array after filtering
            $enrollments = array_values($enrollments);
        }

        // Get materials for each course
        foreach ($enrollments as &$enrollment) {
            $enrollment['materials'] = $materialModel->getMaterialsByCourse($enrollment['course_id']);
        }

        // Also get courses available to enroll (not yet enrolled)
        $availableCourses = $courseModel->getAvailableCourses($userId);

        return view('student/courses', array_merge($this->data, [
            'title' => 'My Courses',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole'),
            'enrollments' => $enrollments,
            'searchQuery' => $searchQuery,
            'availableCourses' => $availableCourses
        ]));
    }

    /**
     * Enroll the current student in a course
     *
     * @param int|null $course_id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function enroll($course_id = null)
    {
        if (!session()->get('isAuthenticated')) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        $userId = session()->get('userId');

        if (empty($course_id) || !is_numeric($course_id)) {
            return redirect()->back()->with('error', 'Invalid course selected.');
        }

        $enrollmentModel = new \App\Models\EnrollmentModel();

        if ($enrollmentModel->isAlreadyEnrolled($userId, (int) $course_id)) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        $result = $enrollmentModel->enrollUser([
            'user_id' => $userId,
            'course_id' => (int) $course_id,
        ]);

        if ($result) {
            return redirect()->back()->with('success', 'Enrolled successfully.');
        }

        return redirect()->back()->with('error', 'Enrollment failed.');
    }
    
    public function grades()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('student/grades', array_merge($this->data, [
            'title' => 'My Grades',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }
    
    public function assignments()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('student/assignments', array_merge($this->data, [
            'title' => 'My Assignments',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }
}
