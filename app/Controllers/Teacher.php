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

        // Assuming teacher can see all courses or their own; for now, get all
        $courses = $courseModel->getAllCourses();

        // Get materials for each course
        foreach ($courses as &$course) {
            $course['materials'] = $materialModel->getMaterialsByCourse($course['course_id']);
        }

        return view('teacher/courses_list', array_merge($this->data, [
            'title' => 'My Courses',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole'),
            'courses' => $courses
        ]));
    }
}
