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
        return view('student/courses', [
            'title' => 'My Courses',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]);
    }
    
    public function grades()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('student/grades', [
            'title' => 'My Grades',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]);
    }
    
    public function assignments()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('student/assignments', [
            'title' => 'My Assignments',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]);
    }
}
