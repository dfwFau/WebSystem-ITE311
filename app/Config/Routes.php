<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Home::index');

// Custom routes
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');


// Authentication routes
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard');

// Admin routes (admin only) - Protected by RoleAuth filter
$routes->group('admin', ['filter' => 'roleAuth'], function($routes) {
    $routes->get('manage-users', 'Admin::manageUsers');
    $routes->get('reports', 'Admin::reports');
    $routes->get('settings', 'Admin::settings');
    $routes->get('dashboard', 'Admin::dashboard');
});

// Teacher routes (teacher only) - Protected by RoleAuth filter
$routes->group('teacher', ['filter' => 'roleAuth'], function($routes) {
    $routes->get('classes', 'Teacher::classes');
    $routes->get('materials', 'Teacher::materials');
    $routes->get('grades', 'Teacher::grades');
    $routes->get('create-course', 'Teacher::createCourse');
    $routes->post('store-course', 'Teacher::storeCourse');
    $routes->get('get-courses', 'Teacher::getCourses');
    $routes->get('dashboard', 'Teacher::dashboard');
});

// Student routes (student only) - Protected by RoleAuth filter
$routes->group('student', ['filter' => 'roleAuth'], function($routes) {
    $routes->get('courses', 'Student::courses');
    $routes->get('grades', 'Student::grades');
    $routes->get('assignments', 'Student::assignments');
});

// Additional routes for testing (with role filters)
$routes->get('/manage-users', 'Admin::manageUsers', ['filter' => 'role:admin']);
$routes->get('/reports', 'Admin::reports', ['filter' => 'role:admin']);
$routes->get('/admin/settings', 'Admin::settings', ['filter' => 'role:admin']);
$routes->get('/teacher/classes', 'Teacher::classes', ['filter' => 'role:teacher']);
$routes->get('/teacher/materials', 'Teacher::materials', ['filter' => 'role:teacher']);
$routes->get('/teacher/grades', 'Teacher::grades', ['filter' => 'role:teacher']);
$routes->get('/student/courses', 'Student::courses', ['filter' => 'role:student']);
$routes->get('/student/grades', 'Student::grades', ['filter' => 'role:student']);
$routes->get('/student/assignments', 'Student::assignments', ['filter' => 'role:student']);

// Course enrollment routes
$routes->post('/course/enroll', 'Course::enroll');
$routes->post('/course/unenroll', 'Course::unenroll');
$routes->get('/course/enrolled', 'Course::getEnrolledCourses');
$routes->get('/course/available', 'Course::getAvailableCourses');

// Announcements route
$routes->get('/announcements', 'Announcement::index');

// Dashboard routes are now handled within the protected route groups above