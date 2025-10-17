<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    /**
     * Teacher Dashboard
     * Displays welcome message for teachers
     */
    public function dashboard()
    {
        // Check if user is authenticated
        if (!session()->get('isAuthenticated')) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        // Check if user has teacher role
        if (session()->get('userRole') !== 'teacher') {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }

        // Load teacher dashboard view
        return view('admin/teacher_dashboard', [
            'title' => 'Teacher Dashboard',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]);
    }
}