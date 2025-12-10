<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');

// Announcements
$routes->get('/announcements', 'Announcement::index');
$routes->get('/announcements/create', 'Announcement::create');
$routes->post('/announcements/create', 'Announcement::create');

// Authentication
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard');

// Courses
$routes->get('/courses', 'Course::index');
$routes->get('/courses/create', 'Course::create');
$routes->post('/courses/create', 'Course::create');
$routes->post('/course/enroll', 'Course::enroll');
$routes->get('/course/search', 'Course::search');
$routes->post('/course/search', 'Course::search');
$routes->post('/course/delete', 'Course::delete');
$routes->get('/course/getAllCourses', 'Course::getAllCourses');
$routes->get('/course/getTeacherCourses', 'Course::getTeacherCourses');
$routes->post('/course/activate', 'Course::activate');

// Materials
$routes->get('/admin/course/(:num)/upload', 'Materials::upload/$1');
$routes->post('/admin/course/(:num)/upload', 'Materials::upload/$1');
$routes->get('/materials/delete/(:num)', 'Materials::delete/$1');
$routes->get('/materials/download/(:num)', 'Materials::download/$1');

// Assignments
$routes->get('/assignments/course/(:num)', 'Assignment::index/$1');
$routes->get('/assignments/create/(:num)', 'Assignment::create/$1');
$routes->post('/assignments/create/(:num)', 'Assignment::create/$1');
$routes->get('/assignments/submit/(:num)', 'Assignment::submit/$1');
$routes->post('/assignments/submit/(:num)', 'Assignment::submit/$1');
$routes->get('/assignments/view-submissions/(:num)', 'Assignment::viewSubmissions/$1');
$routes->get('/assignments/get-submission-text/(:num)', 'Assignment::getSubmissionText/$1');
$routes->get('/assignments/download-submission/(:num)', 'Assignment::downloadSubmission/$1');

// Generic assignment routes
$routes->get('/assignments', 'Assignment::assignments');

// Notifications
$routes->get('/notifications', 'Notifications::get');
$routes->post('/notifications/mark_read/(:num)', 'Notifications::mark_as_read/$1');
$routes->post('/notifications/mark_all_read', 'Notifications::mark_all_read');

// User Management
$routes->get('/manageusers', 'UserManagement::index');
$routes->get('/manageusers/create', 'UserManagement::create');
$routes->post('/manageusers/create', 'UserManagement::create');
$routes->post('/manageusers/update-role', 'UserManagement::updateRole');
$routes->post('/manageusers/delete', 'UserManagement::delete');
$routes->post('/manageusers/restore', 'UserManagement::restore');
$routes->post('/manageusers/edit', 'UserManagement::edit');

// Admin Course Management
$routes->get('/admin/courses', 'Admin::courses');
$routes->get('/admin/courses/create', 'Admin::createCourse');
$routes->post('/admin/courses/create', 'Admin::createCourse');



















