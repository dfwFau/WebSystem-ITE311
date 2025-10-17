<?php

namespace App\Controllers;

class Admin extends BaseController
{
    /**
     * Admin Dashboard
     * Displays welcome message for admins
     */
    public function dashboard()
    {
        // Check if user is authenticated
        if (!session()->get('isAuthenticated')) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        // Check if user has admin role
        if (session()->get('userRole') !== 'admin') {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }

        // Load admin dashboard view
        return view('admin/admin_dashboard', [
            'title' => 'Admin Dashboard',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]);
    }
}