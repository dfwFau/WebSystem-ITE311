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
        $data = [
            'title' => 'My Classes',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('teacher/classes', $data);
    }
    
    public function materials()
    {
        $data = [
            'title' => 'Teaching Materials',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('teacher/materials', $data);
    }
    
    public function grades()
    {
        $data = [
            'title' => 'Grade Students',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('teacher/grades', $data);
    }

    /**
     * Display course creation form
     */
    public function createCourse()
    {
        $data = [
            'title' => 'Create New Course',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('teacher/create_course', $data);
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
            'course_name' => 'required|min_length[3]|max_length[150]',
            'course_code' => 'required|min_length[3]|max_length[50]|is_unique[courses.course_code]',
            'description' => 'permit_empty',
            'units' => 'permit_empty|integer|greater_than[0]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $courseData = [
            'course_name' => $this->request->getPost('course_name'),
            'course_code' => $this->request->getPost('course_code'),
            'description' => $this->request->getPost('description'),
            'units' => $this->request->getPost('units') ?: null
        ];

        if ($this->courseModel->insert($courseData)) {
            return redirect()->to('/teacher/classes')->with('success', 'Course created successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create course. Please try again.');
        }
    }

    /**
     * Get all courses created by teachers
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
