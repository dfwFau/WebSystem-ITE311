<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function manageUsers()
    {
        $data = [
            'title' => 'Manage Users',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('admin/manage_users', $data);
    }
    
    public function reports()
    {
        $data = [
            'title' => 'System Reports',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('admin/reports', $data);
    }
    
    public function settings()
    {
        $data = [
            'title' => 'System Settings',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('admin/settings', $data);
    }
}
