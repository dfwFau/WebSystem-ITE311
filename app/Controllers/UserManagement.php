<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Helpers\SessionHelper;

class UserManagement extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Display user management page (admin only)
     */
    public function index()
    {
        $session = session();
        
        // Check if user is logged in and is admin
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        
        if ($session->get('userRole') !== 'admin') {
            return redirect()->to(base_url('dashboard'))
                ->with('error', 'Access Denied: Admin only');
        }

        // Get all users (including soft deleted) with role information
        $db = \Config\Database::connect();
        $users = $db->table('users')
            ->select('users.*, roles.role_name as role')
            ->join('roles', 'users.role_id = roles.id', 'left')
            ->get()
            ->getResultArray();

        $data = [
            'users' => $users,
            'userRole' => $session->get('userRole'),
            'userEmail' => $session->get('userEmail'),
            'userName' => $session->get('userName') ?? 'Admin',
            'currentUserId' => $session->get('user_id')
        ];

        return view('users/manage', $data);
    }

    /**
     * Update user role (AJAX)
     */
    public function updateRole()
    {
        $session = session();
        
        // Check if user is logged in and is admin
        if (!$session->get('isLoggedIn') || $session->get('userRole') !== 'admin') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Access Denied'
            ])->setStatusCode(403);
        }

        $userId = $this->request->getPost('user_id');
        $newRole = $this->request->getPost('role');

        // Validate role
        $allowedRoles = ['admin', 'teacher', 'student'];
        if (!in_array($newRole, $allowedRoles)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid role'
            ])->setStatusCode(400);
        }

        // Prevent admin from changing their own role
        if ($userId == $session->get('user_id')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You cannot change your own role'
            ])->setStatusCode(400);
        }

        // Update user role
        $user = $this->userModel->find($userId);
        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User not found'
            ])->setStatusCode(404);
        }

        // Get role_id from role name
        $db = \Config\Database::connect();
        $roleRow = $db->table('roles')->where('role_name', $newRole)->get()->getRowArray();
        $roleId = $roleRow ? $roleRow['id'] : null;
        if (!$roleId) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid role'
            ])->setStatusCode(400);
        }

        $this->userModel->update($userId, ['role_id' => $roleId]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'User role updated successfully',
            'role' => $newRole
        ]);
    }

    /**
     * Soft delete user (AJAX)
     */
    public function delete()
    {
        $session = session();
        
        // Check if user is logged in and is admin
        if (!$session->get('isLoggedIn') || $session->get('userRole') !== 'admin') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Access Denied'
            ])->setStatusCode(403);
        }

        $userId = $this->request->getPost('user_id');

        // Prevent admin from deleting themselves
        if ($userId == $session->get('user_id')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You cannot delete your own account'
            ])->setStatusCode(400);
        }

        // Check if user exists
        $user = $this->userModel->find($userId);
        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User not found'
            ])->setStatusCode(404);
        }

        // Hard delete user
        $this->userModel->delete($userId, true);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'User deleted successfully'
        ]);
    }

    /**
     * Restore deleted user (AJAX)
     */
    public function restore()
    {
        $session = session();
        
        // Check if user is logged in and is admin
        if (!$session->get('isLoggedIn') || $session->get('userRole') !== 'admin') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Access Denied'
            ])->setStatusCode(403);
        }

        $userId = $this->request->getPost('user_id');

        // Check if user exists (including deleted)
        $db = \Config\Database::connect();
        $user = $db->table('users')->where('id', $userId)->get()->getRowArray();
        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User not found'
            ])->setStatusCode(404);
        }

        // Restore user by setting deleted_at to null
        $db->table('users')->where('id', $userId)->update(['deleted_at' => null]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'User restored successfully'
        ]);
    }

    /**
     * Show form to create new user or handle form submission (admin only)
     */
    public function create()
    {
        $session = session();
        
        // Check if user is logged in and is admin
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        
        if ($session->get('userRole') !== 'admin') {
            return redirect()->to(base_url('dashboard'))
                ->with('error', 'Access Denied: Admin only');
        }

        // Handle POST request (form submission)
        if ($this->request->getMethod() === 'POST') {
            // Get form data
            $name = trim((string) $this->request->getPost('name'));
            $email = trim((string) $this->request->getPost('email'));
            $password = (string) $this->request->getPost('password');
            $role = trim((string) $this->request->getPost('role'));

            // Define default passwords for each role
            $defaultPasswords = [
                'admin' => 'admin123',
                'teacher' => 'teacher123',
                'student' => 'student123'
            ];

            // Validation
            $errors = [];

            if ($name === '') {
                $errors[] = 'Name is required.';
            } else {
                // Validate name - no numbers or special characters allowed
                if (!preg_match('/^[a-zA-Z\s\-\.\']+$/', $name)) {
                    $errors[] = 'Name can only contain letters, spaces, hyphens, periods, and apostrophes. Numbers are not allowed.';
                }
            }

            if ($email === '') {
                $errors[] = 'Email is required.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid email address.';
            } else {
                // Validate email - check for disallowed special characters before @
                $emailParts = explode('@', $email);
                if (count($emailParts) === 2) {
                    $localPart = $emailParts[0]; // The part before @
                    // Only allow alphanumeric, dots, hyphens, and underscores in local part
                    if (!preg_match('/^[a-zA-Z0-9\.\-_]+$/', $localPart)) {
                        $errors[] = 'Email local part (before @) can only contain letters, numbers, dots, hyphens, and underscores.';
                    }
                }
            }

            // Validate role
            $allowedRoles = ['admin', 'teacher', 'student'];
            if (!in_array($role, $allowedRoles)) {
                $errors[] = 'Invalid role selected.';
            } else {
                // Set default password based on role
                $password = $defaultPasswords[$role];
            }

            // Check for duplicate email (including deleted users)
            $db = \Config\Database::connect();
            $existingUser = $db->table('users')
                ->where('email', $email)
                ->get()
                ->getRowArray();
            if ($email !== '' && $existingUser) {
                $errors[] = 'Email is already registered.';
            }

            // If there are errors, redirect back with errors
            if (!empty($errors)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $errors);
            }

            // Hash password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Get role_id from role name
            $db = \Config\Database::connect();
            $roleRow = $db->table('roles')->where('role_name', $role)->get()->getRowArray();
            $roleId = $roleRow ? $roleRow['id'] : null;
            if (!$roleId) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['Invalid role selected.']);
            }

            // Insert user
            $userId = $this->userModel->insert([
                'name' => $name,
                'email' => $email,
                'password' => $passwordHash,
                'role_id' => $roleId,
            ], true);

            // Handle insertion error
            if (!$userId) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['Failed to create user. Please try again.']);
            }

            // Success - redirect back to create page with success message
            return redirect()->to(base_url('manageusers/create'))
                ->with('success', "User '{$name}' successfully created, add this!");
        }

        // Handle GET request (show form)
        $data = [
            'userRole' => $session->get('userRole'),
            'userEmail' => $session->get('userEmail'),
            'userName' => $session->get('userName') ?? 'Admin'
        ];

        return view('users/create', $data);
    }

    /**
     * Edit user details (AJAX)
     */
    public function edit()
    {
        $session = session();
        
        // Check if user is logged in and is admin
        if (!$session->get('isLoggedIn') || $session->get('userRole') !== 'admin') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Access Denied'
            ])->setStatusCode(403);
        }

        try {
            $userId = $this->request->getPost('user_id');
            $name = trim((string) $this->request->getPost('name'));
            $email = trim((string) $this->request->getPost('email'));
            $password = (string) $this->request->getPost('password');

            // Validation
            $errors = [];

            if ($name === '') {
                $errors[] = 'Name is required.';
            } else {
                // Validate name - no numbers or special characters allowed
                if (!preg_match('/^[a-zA-Z\s\-\.\']+$/', $name)) {
                    $errors[] = 'Name can only contain letters, spaces, hyphens, periods, and apostrophes. Numbers are not allowed.';
                }
            }

            if ($email === '') {
                $errors[] = 'Email is required.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid email address.';
            } else {
                // Validate email - check for disallowed special characters before @
                $emailParts = explode('@', $email);
                if (count($emailParts) === 2) {
                    $localPart = $emailParts[0]; // The part before @
                    // Only allow alphanumeric, dots, hyphens, and underscores in local part
                    if (!preg_match('/^[a-zA-Z0-9\.\-_]+$/', $localPart)) {
                        $errors[] = 'Email local part (before @) can only contain letters, numbers, dots, hyphens, and underscores.';
                    }
                }
            }

            // Check if email is already used by another user
            $existingUser = $this->userModel->where('email', $email)->where('id !=', $userId)->first();
            if ($existingUser) {
                $errors[] = 'Email is already used by another user.';
            }

            if (!empty($errors)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => implode(' ', $errors)
                ])->setStatusCode(400);
            }

            // Check if user exists
            $user = $this->userModel->find($userId);
            if (!$user) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'User not found'
                ])->setStatusCode(404);
            }

            // Update user
            $updateData = [
                'name' => $name,
                'email' => $email,
            ];

            // Only update password if provided
            $passwordUpdated = false;
            if ($password !== '') {
                if (strlen($password) < 6) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Password must be at least 6 characters long.'
                    ])->setStatusCode(400);
                }
                $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
                $updateData['force_logout_at'] = date('Y-m-d H:i:s'); // Force logout flag
                $passwordUpdated = true;
            }

            $this->userModel->update($userId, $updateData);

            // If password was updated, invalidate all sessions for the edited user
            // This will force them to logout and login again with new password
            if ($passwordUpdated) {
                try {
                    SessionHelper::invalidateUserSessions($userId);
                } catch (\Exception $e) {
                    log_message('error', 'Error invalidating sessions: ' . $e->getMessage());
                    // Don't fail the update just because session invalidation failed
                }
                
                // If admin is editing their own password, logout the admin too
                $currentUserId = $session->get('user_id');
                if ($currentUserId == $userId) {
                    $session->destroy();
                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'Your password was updated. Please log in again.',
                        'logout' => true
                    ]);
                }
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'User updated successfully'
            ]);
            
        } catch (\Exception $e) {
            log_message('error', 'Error in UserManagement::edit(): ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the user'
            ])->setStatusCode(500);
        }
    }
}
