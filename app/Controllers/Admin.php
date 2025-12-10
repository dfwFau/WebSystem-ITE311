<?php

namespace App\Controllers;

class Admin extends BaseController
{
    /**
     * Admin Dashboard
     * Redirects to unified dashboard with admin-specific functionality
     */
    public function dashboard()
    {
        // Redirect to unified dashboard - it will automatically show admin content
        return redirect()->to('/dashboard');
    }

    public function manageUsers()
    {
        // Role-based access control is handled by the RoleAuth filter
        $userModel = new \App\Models\UserModel();
        $searchQuery = $this->request->getGet('search') ?? '';

        $users = $userModel->like('name', $searchQuery)
                          ->orLike('email', $searchQuery)
                          ->orLike('role', $searchQuery)
                          ->findAll();

        return view('admin/manage_users', array_merge($this->data, [
            'title' => 'Manage Users',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole'),
            'searchQuery' => $searchQuery,
            'users' => $users
        ]));
    }

    public function addUser()
    {
        // Role-based access control is handled by the RoleAuth filter
        if ($this->request->getMethod() === 'post') {
            $userModel = new \App\Models\UserModel();
            
            $validation = \Config\Services::validation();
            $validation->setRules([
                'name' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
                'role' => 'required|in_list[admin,student,teacher]'
            ]);
            
            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $validation->getErrors());
            }
            
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getPost('role'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            if ($userModel->insert($data)) {
                return redirect()->to('/admin/manage-users')
                    ->with('success', 'User added successfully!');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to add user. Please try again.');
            }
        }
        
        return view('admin/add_user', array_merge($this->data, [
            'title' => 'Add New User',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }

    public function reports()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('admin/reports', array_merge($this->data, [
            'title' => 'Reports',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }

    public function settings()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('admin/settings', array_merge($this->data, [
            'title' => 'Settings',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]));
    }
}