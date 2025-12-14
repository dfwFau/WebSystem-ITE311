<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;
use App\Models\NotificationModel;
use App\Models\UserModel;

class Announcement extends BaseController
{
    /**
     * Display announcements (All logged-in users)
     */
    public function index()
    {
        $session = session();
        
        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $userRole = $session->get('userRole');
        $userName = $session->get('userName');
        $userEmail = $session->get('userEmail');

        $announcementModel = new AnnouncementModel();
        $announcements = $announcementModel->getAllAnnouncements();
        
        $data = [
            'announcements' => $announcements,
            'title' => 'Announcements',
            'userRole' => $userRole,
            'userName' => $userName,
            'userEmail' => $userEmail
        ];
        
        return view('announcements/index', $data);
    }

    /**
     * Show create announcement form or handle form submission (Admins and Teachers)
     */
    public function create()
    {
        $session = session();
        
        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $userRole = $session->get('userRole');
        $userName = $session->get('userName');
        $userEmail = $session->get('userEmail');
        
        // Only admins and teachers can create announcements
        if ($userRole !== 'admin' && $userRole !== 'teacher') {
            return redirect()->to(base_url('announcements'))
                ->with('error', 'Only admins and teachers can create announcements.');
        }

        // Handle POST request (form submission)
        if ($this->request->getMethod() === 'POST') {
            // Validate input
            $validation = \Config\Services::validation();
            $validation->setRules([
                'title' => [
                    'label' => 'Title',
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'The announcement title is required.',
                        'min_length' => 'The title must be at least 3 characters long.',
                        'max_length' => 'The title cannot exceed 255 characters.'
                    ]
                ],
                'content' => [
                    'label' => 'Content',
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'The announcement content is required.',
                        'min_length' => 'The content must be at least 10 characters long.'
                    ]
                ]
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                $errorMessages = [];
                foreach ($errors as $field => $message) {
                    $errorMessages[] = $message;
                }
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $errorMessages);
            }

            $announcementModel = new AnnouncementModel();
            $notificationModel = new NotificationModel();
            $userModel = new UserModel();

            // Get announcement data
            $title = $this->request->getPost('title');
            $content = $this->request->getPost('content');

            // Create announcement
            $announcementData = [
                'title' => $title,
                'content' => $content,
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($announcementModel->insert($announcementData)) {
            // Notify all students about the new announcement
            $students = $userModel->getUsersByRoleName('student');
                
                foreach ($students as $student) {
                    $notificationModel->insert([
                        'user_id' => $student['id'],
                        'message' => "New announcement: <b>{$title}</b>",
                        'is_read' => 0,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }

                return redirect()->to(base_url('announcements'))
                    ->with('success', 'Announcement created successfully and all students have been notified!');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to create announcement. Please try again.');
            }
        }

        // Handle GET request (show form)
        $data = [
            'title' => 'Create Announcement',
            'userRole' => $userRole,
            'userName' => $userName,
            'userEmail' => $userEmail
        ];
        
        return view('announcements/create', $data);
    }
    
    /**
     * Delete an announcement (Admins and Teachers only)
     */
    public function delete($id = null)
    {
        $session = session();
        
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $userRole = $session->get('userRole');
        
        if ($userRole !== 'admin' && $userRole !== 'teacher') {
            return redirect()->to(base_url('announcements'))
                ->with('error', 'Only admins and teachers can delete announcements.');
        }

        if (!$id) {
            return redirect()->to(base_url('announcements'))
                ->with('error', 'Announcement ID is required.');
        }

        $announcementModel = new AnnouncementModel();
        
        if ($announcementModel->delete($id)) {
            return redirect()->to(base_url('announcements'))
                ->with('success', 'Announcement deleted successfully.');
        } else {
            return redirect()->to(base_url('announcements'))
                ->with('error', 'Failed to delete announcement.');
        }
    }
}
