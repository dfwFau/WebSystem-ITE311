<?php

namespace App\Controllers;

use App\Models\UserModel; // ✅ Add this line
use App\Models\NotificationModel; // ✅ Add this too (since you use it later)


class Auth extends BaseController
{
    
// Handles registration 
    public function register()
    {
        $session = session();

        // If already logged in, redirect based on role
        if ($session->get('isLoggedIn')) {
            return $this->redirectBasedOnRole($session->get('userRole'));
        }

        // Process form submission (POST)
        if ($this->request->getMethod() === 'POST') {
            $name = trim((string) $this->request->getPost('name'));
            $email = trim((string) $this->request->getPost('email'));
            $password = (string) $this->request->getPost('password');
            $passwordConfirm = (string) $this->request->getPost('password_confirm');

            // Validate required fields
            if ($name === '' || $email === '' || $password === '' || $passwordConfirm === '') {
                return redirect()->back()->withInput()->with('register_error', 'All fields are required.');
            }

            // Validate email format
            if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return redirect()->back()->withInput()->with('register_error', 'Invalid email address.');
            }

            // Validate password match
            if ($password !== $passwordConfirm) {
                return redirect()->back()->withInput()->with('register_error', 'Passwords do not match.');
            }

            $userModel = new UserModel();

            // Check for duplicate email
            if ($userModel->where('email', $email)->first()) {
                return redirect()->back()->withInput()->with('register_error', 'Email is already registered.');
            }

            // Hash password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Get student role_id
            $roleModel = new \App\Models\RoleModel();
            $roleId = $roleModel->getRoleIdByName('student');
            
            if (!$roleId) {
                return redirect()->back()->withInput()->with('register_error', 'System error: Default role not found. Please contact administrator.');
            }

            // Insert student
            $userId = $userModel->insert([
                'name' => $name,
                'email' => $email,
                'role_id' => $roleId,
                'password' => $passwordHash,
            ], true);

            // Handle insertion error
            if (! $userId) {
                return redirect()->back()->withInput()->with('register_error', 'Registration failed.');
            }

           // ✅ Notify Admin
$notificationModel = new NotificationModel();
$userModel = new UserModel();

// ✅ Find admin automatically
$admins = $userModel->getUsersByRoleName('admin');
$admin = !empty($admins) ? $admins[0] : null;

if ($admin) {
    $notificationModel->insert([
        'user_id' => $admin['id'],
        'message' => "A new student has registered: <b>{$name}</b>.",
        'is_read' => 0,
        'created_at' => date('Y-m-d H:i:s'),
    ]);
}

            // Redirect after success
            return redirect()
                ->to(base_url('login'))
                ->with('register_success', 'Account created successfully! Please wait for admin approval before logging in.');
        }

        // Display registration form
        return view('auth/register');
    }
// Login
    public function login()
    {
        $session = session();

        if ($session->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }
         // Process form submission (POST)
           if ($this->request->getMethod() === 'POST') {
               $email = trim((string) $this->request->getPost('email'));
               $password = (string) $this->request->getPost('password');
       
               $userModel = new \App\Models\UserModel();
               $user = $userModel->findByEmailWithRole($email);
               
               if ($user && password_verify($password, $user['password'])) {
                   // Check if user account is active
                   if (($user['status'] ?? 'active') === 'inactive') {
                       return redirect()->back()->with('login_error', 'Your account has been deactivated. Please contact the administrator.');
                   }
                   
                   // Store the user's email and role in the session
                   $session->set([
                       'isLoggedIn' => true,
                       'user_id' => $user['id'],
                       'userEmail' => $email,
                       'userRole' => $user['role'], // role_name from join
                       'userName' => $user['name'], // Store user name in session
                       'login_time' => time(), // Store login timestamp
                   ]);

                   // Redirect based on user role
                   return $this->redirectBasedOnRole($user['role']);
               }
       
               return redirect()->back()->with('login_error', 'Invalid credentials');
           }
       
           return view('auth/login');
       }

 //Logout
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }

  // Handles the dashboard each role admin, teacher, student
        public function dashboard()
    {
        $session = session();
        if (! $session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $role = $session->get('userRole');
        $userEmail = $session->get('userEmail');
        
        // Get user details from database with role
        $userModel = new \App\Models\UserModel();
        $user = $userModel->findByEmailWithRole($userEmail);
        
        // If user not found, log out
        if (!$user) {
            $session->destroy();
            return redirect()->to(base_url('login'))->with('error', 'User not found');
        }
        
        $data = [
            'userRole' => $role,
            'userEmail' => $userEmail,
            'userName' => $user['name'] ?? 'User'
        ];

        if ($role === 'admin') {
            $courseModel = new \App\Models\CourseModel();
            $enrollmentModel = new \App\Models\EnrollmentModel();
            $announcementModel = new \App\Models\AnnouncementModel();
            $materialModel = new \App\Models\MaterialModel();

            // Get total users by role
            $totalUsers = $userModel->countAllResults();
            $totalAdmins = $userModel->countUsersByRoleName('admin');
            $totalTeachers = $userModel->countUsersByRoleName('teacher');
            $totalStudents = $userModel->countUsersByRoleName('student');

            // Get course statistics
            $totalCourses = $courseModel->countAllResults();
            
            // Get enrollment statistics
            $totalEnrollments = $enrollmentModel->countAllResults();
            
            $statusModel = new \App\Models\EnrollmentStatusModel();
            $enrolledStatusId = $statusModel->getStatusIdByName('enrolled');
            $activeStatusId = $statusModel->getStatusIdByName('active');
            $pendingStatusId = $statusModel->getStatusIdByName('pending');
            
            $activeEnrollments = $enrollmentModel
                ->whereIn('status_id', array_filter([$enrolledStatusId, $activeStatusId]))
                ->countAllResults();
            $pendingEnrollments = $enrollmentModel
                ->where('status_id', $pendingStatusId)
                ->countAllResults();

            // Get announcements count
            $totalAnnouncements = $announcementModel->countAllResults();

            // Get materials count
            $totalMaterials = $materialModel->countAllResults();

            // Get recent users (last 5) with roles
            $builder = $userModel->db->table('users u');
            $builder->select('u.*, r.role_name as role');
            $builder->join('roles r', 'u.role_id = r.id', 'left');
            $builder->orderBy('u.created_at', 'DESC');
            $builder->limit(5);
            $recentUsers = $builder->get()->getResultArray();

            // Get recent courses (last 5)
            $recentCourses = $courseModel->orderBy('created_at', 'DESC')->limit(5)->findAll();

            // Get recent enrollments (last 5)
            $builder = $enrollmentModel->db->table('enrollments e');
            $builder->select('e.*, u.name as user_name, r.role_name as user_role, c.course_number, es.status_name as status');
            $builder->join('users u', 'u.id = e.user_id', 'left');
            $builder->join('roles r', 'u.role_id = r.id', 'left');
            $builder->join('courses c', 'c.course_id = e.course_id', 'left');
            $builder->join('enrollment_statuses es', 'e.status_id = es.id', 'left');
            $builder->orderBy('e.created_at', 'DESC');
            $builder->limit(5);
            $recentEnrollments = $builder->get()->getResultArray();

            $data['totalUsers'] = $totalUsers;
            $data['totalAdmins'] = $totalAdmins;
            $data['totalTeachers'] = $totalTeachers;
            $data['totalStudents'] = $totalStudents;
            $data['totalCourses'] = $totalCourses;
            $data['totalEnrollments'] = $totalEnrollments;
            $data['activeEnrollments'] = $activeEnrollments;
            $data['pendingEnrollments'] = $pendingEnrollments;
            $data['totalAnnouncements'] = $totalAnnouncements;
            $data['totalMaterials'] = $totalMaterials;
            $data['recentUsers'] = $recentUsers;
            $data['recentCourses'] = $recentCourses;
            $data['recentEnrollments'] = $recentEnrollments;
        } elseif ($role === 'teacher') {
            $courseModel = new \App\Models\CourseModel();
            $enrollmentModel = new \App\Models\EnrollmentModel();
            $materialModel = new \App\Models\MaterialModel();
            $announcementModel = new \App\Models\AnnouncementModel();

            $teacherId = $user['id'];

            // Get courses created by this teacher (already includes student counts)
            $teacherCourses = $courseModel->getCoursesByTeacher($teacherId);

            // Process materials and ensure course data is complete
            $totalMaterials = 0;
            $recentMaterials = [];
            foreach ($teacherCourses as &$course) {
                // Ensure status is set
                if (!isset($course['status'])) {
                    $course['status'] = 'Active';
                }
                
                // Ensure students count is set (should already be set by model)
                if (!isset($course['students'])) {
                    $course['students'] = $enrollmentModel->getCourseEnrollmentCount($course['course_id']);
                }
                
                // Count materials for this course
                $materials = $materialModel->getMaterialsByCourse($course['course_id']);
                $totalMaterials += count($materials);
                
                // Collect recent materials
                foreach ($materials as $material) {
                    $material['course_number'] = $course['course_number'];
                    $recentMaterials[] = $material;
                }
            }

            // Sort recent materials by date and get last 5
            usort($recentMaterials, function($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });
            $recentMaterials = array_slice($recentMaterials, 0, 5);

            // Get recent announcements
            $recentAnnouncements = $announcementModel->getAllAnnouncements();
            $recentAnnouncements = array_slice($recentAnnouncements, 0, 5);

            // Get recent enrollments for teacher's courses
            $courseIds = array_column($teacherCourses, 'course_id');
            $recentEnrollments = [];
            if (!empty($courseIds)) {
                $builder = $enrollmentModel->db->table('enrollments e');
                $builder->select('e.*, u.name as student_name, c.course_number');
                $builder->join('users u', 'u.id = e.user_id', 'left');
                $builder->join('courses c', 'c.course_id = e.course_id', 'left');
                $builder->whereIn('e.course_id', $courseIds);
                $builder->orderBy('e.created_at', 'DESC');
                $builder->limit(5);
                $recentEnrollments = $builder->get()->getResultArray();
            }

            $data['teacherCourses'] = $teacherCourses;
            $data['totalMaterials'] = $totalMaterials;
            $data['recentMaterials'] = $recentMaterials;
            $data['recentAnnouncements'] = $recentAnnouncements;
            $data['recentEnrollments'] = $recentEnrollments;
        } elseif ($role === 'student') {
            // Get enrollment data for students
            $enrollmentModel = new \App\Models\EnrollmentModel();
            $courseModel = new \App\Models\CourseModel();
            $materialModel = new \App\Models\MaterialModel();
            $announcementModel = new \App\Models\AnnouncementModel();
            
            $userId = $user['id'];
            
            // Get enrolled courses
            $enrolledCourses = $enrollmentModel->getUserEnrollments($userId);
            $data['enrolledCourses'] = $enrolledCourses;
            
            // Get available courses using the new method
            $data['availableCourses'] = $courseModel->getAvailableCoursesForStudent($userId);
            
            // Get recent materials from enrolled courses
            $recentMaterials = [];
            foreach ($enrolledCourses as $course) {
                $materials = $materialModel->getMaterialsByCourse($course['course_id']);
                foreach ($materials as $material) {
                    $material['course_number'] = $course['course_number'];
                    $recentMaterials[] = $material;
                }
            }
            // Sort by date and get last 5
            usort($recentMaterials, function($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });
            $data['recentMaterials'] = array_slice($recentMaterials, 0, 5);
            
            // Get recent announcements
            $recentAnnouncements = $announcementModel->getAllAnnouncements();
            $data['recentAnnouncements'] = array_slice($recentAnnouncements, 0, 5);
            
            // Add some sample data for other sections
            $data['upcomingDeadlines'] = [
                ['course' => 'Web Development', 'assignment' => 'Final Project', 'due_date' => '2025-01-25', 'status' => 'pending'],
                ['course' => 'Database Management', 'assignment' => 'SQL Quiz', 'due_date' => '2025-01-28', 'status' => 'pending'],
                ['course' => 'Software Engineering', 'assignment' => 'Design Document', 'due_date' => '2025-02-01', 'status' => 'pending']
            ];
            $data['recentGrades'] = [
                ['course' => 'Web Development', 'assignment' => 'HTML/CSS Project', 'grade' => 95, 'date' => '2025-01-20'],
                ['course' => 'Database Management', 'assignment' => 'ERD Design', 'grade' => 88, 'date' => '2025-01-18'],
                ['course' => 'Software Engineering', 'assignment' => 'Requirements Analysis', 'grade' => 92, 'date' => '2025-01-15']
            ];
        }

        return view('auth/dashboard', $data);
    }

    /**
     * Redirects user based on their role
     */
    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'student':
                return redirect()->to(base_url('announcements'));
            case 'teacher':
                return redirect()->to(base_url('dashboard'));
            case 'admin':
                return redirect()->to(base_url('dashboard'));
            default:
                return redirect()->to(base_url('dashboard'));
        }
    }
}
