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
        $searchQuery = $this->request->getGet('search');
        
        // Get all users or filter by search query
        if (!empty($searchQuery)) {
            $users = $userModel->like('name', $searchQuery)
                              ->orLike('email', $searchQuery)
                              ->orLike('role', $searchQuery)
                              ->orderBy('created_at', 'DESC')
                              ->findAll();
        } else {
            $users = $userModel->orderBy('created_at', 'DESC')->findAll();
        }
        
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

    public function editUser($id)
    {
        // Role-based access control is handled by the RoleAuth filter
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/manage-users')
                ->with('error', 'User not found.');
        }
        
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            
            // Check if email is being changed and if it's unique
            $email = $this->request->getPost('email');
            $existingUser = $userModel->where('email', $email)->first();
            
            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'role' => 'required|in_list[admin,student,teacher]'
            ];
            
            if ($email !== $user['email']) {
                $rules['email'] = 'required|valid_email|is_unique[users.email]';
            } else {
                $rules['email'] = 'required|valid_email';
            }
            
            // Password is optional when editing
            $password = trim($this->request->getPost('password') ?? '');
            if (!empty($password)) {
                $rules['password'] = 'required|min_length[6]';
            }
            
            $validation->setRules($rules);
            
            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $validation->getErrors());
            }
            
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'role' => $this->request->getPost('role'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            // Only update password if provided and not empty
            $passwordChanged = false;
            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
                $passwordChanged = true;
            }
            
            // Check if the user being edited is the currently logged-in user
            $currentUserId = (int) session()->get('userId');
            $isCurrentUser = ((int) $id === $currentUserId);
            
            if ($userModel->update($id, $data)) {
                // If password was changed for the currently logged-in user, log them out immediately
                if ($passwordChanged && $isCurrentUser) {
                    // Destroy session to log out the user
                    session()->destroy();
                    // Redirect to login with success message
                    return redirect()->to('/login')
                        ->with('success', 'Your password has been changed. Please log in with your new password.');
                }
                
                return redirect()->to('/admin/manage-users')
                    ->with('success', 'User updated successfully!');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to update user. Please try again.');
            }
        }
        
        return view('admin/edit_user', array_merge($this->data, [
            'title' => 'Edit User',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole'),
            'user' => $user
        ]));
    }

    public function deleteUser($id)
    {
        // Role-based access control is handled by the RoleAuth filter
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/manage-users')
                ->with('error', 'User not found.');
        }
        
        // Prevent deleting yourself
        if ($id == session()->get('userId')) {
            return redirect()->to('/admin/manage-users')
                ->with('error', 'You cannot delete your own account.');
        }
        
        if ($userModel->delete($id)) {
            return redirect()->to('/admin/manage-users')
                ->with('success', 'User deleted successfully!');
        } else {
            return redirect()->to('/admin/manage-users')
                ->with('error', 'Failed to delete user. Please try again.');
        }
    }

    public function reports()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('admin/reports', [
            'title' => 'Reports',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]);
    }

    public function settings()
    {
        // Role-based access control is handled by the RoleAuth filter
        return view('admin/settings', [
            'title' => 'Settings',
            'userName' => session()->get('userName'),
            'userEmail' => session()->get('userEmail'),
            'userRole' => session()->get('userRole')
        ]);
    }
}