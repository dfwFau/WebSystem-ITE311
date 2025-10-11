<?php

namespace App\Controllers;

use App\Models\CourseModel;

class Teacher extends BaseController
{
    protected $courseModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
    }

    public function classes()
    {
        // Redirect to dashboard with a message about classes
        return redirect()->to('/dashboard')->with('info', 'Classes management - Coming soon!');
    }
    
    public function materials()
    {
        // Redirect to dashboard with a message about materials
        return redirect()->to('/dashboard')->with('info', 'Teaching materials management - Coming soon!');
    }
    
    public function grades()
    {
        // Redirect to dashboard with a message about grading
        return redirect()->to('/dashboard')->with('info', 'Student grading system - Coming soon!');
    }

    /**
     * Display course creation form
     */
    public function createCourse()
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isAuthenticated') || session()->get('userRole') !== 'teacher') {
            return redirect()->to('/login')->with('error', 'Please login as a teacher to create courses.');
        }

        $data = [
            'title' => 'Create New Course',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        // Return a simple course creation form view
        return view('course/create_form', $data);
    }

    /**
     * Handle course creation form submission
     */
    public function storeCourse()
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isAuthenticated') || session()->get('userRole') !== 'teacher') {
            return redirect()->to('/login')->with('error', 'Please login as a teacher to create courses.');
        }

        $rules = [
            'course_name' => 'required|min_length[3]|max_length[255]',
            'course_code' => 'required|min_length[3]|max_length[50]|is_unique[courses.course_code]',
            'description' => 'permit_empty',
            'units' => 'permit_empty|integer|greater_than[0]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $courseData = [
            'course_name' => $this->request->getPost('course_name'),
            'course_code' => strtoupper($this->request->getPost('course_code')),
            'description' => $this->request->getPost('description') ?: null,
            'units' => $this->request->getPost('units') ?: 3
        ];

        if ($this->courseModel->insert($courseData)) {
            return redirect()->to('/dashboard')->with('success', 'Course "' . $courseData['course_name'] . '" created successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create course. Please try again.');
        }
    }

    /**
     * Get all courses created by teachersssss
     */
    public function getCourses()
    {
        // Check if user is logged in
        if (!session()->get('isAuthenticated')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Please login to view courses.'
            ]);
        }

        $courses = $this->courseModel->getAllCourses();

        return $this->response->setJSON([
            'success' => true,
            'courses' => $courses
        ]);
    }
}
