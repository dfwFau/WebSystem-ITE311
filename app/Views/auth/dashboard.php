<?= $this->extend('template') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('info')): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i>
            <?= esc(session()->getFlashdata('info')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?= esc(session()->getFlashdata('success')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="h3 fw-bold mb-1">Welcome back, <?= esc($userName) ?></h2>
            <p class="text-muted mb-0">
                Role: <span class="badge bg-primary"><?= esc(ucfirst($role)) ?></span>
                <?php if (isset($userEmail)): ?>
                    | Email: <span class="text-muted"><?= esc($userEmail) ?></span>
                <?php endif; ?>
            </p>
        </div>
    </div>

    <?php if ($role === 'admin'): ?>
        <!-- Admin Content -->
        
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= $totalUsers ?? 0 ?></h4>
                                <p class="card-text">Total Users</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= $totalCourses ?? 0 ?></h4>
                                <p class="card-text">Total Courses</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-book fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= $totalEnrollments ?? 0 ?></h4>
                                <p class="card-text">Total Enrollments</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-graduation-cap fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= $teacherCount ?? 0 ?></h4>
                                <p class="card-text">Teachers</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-chalkboard-teacher fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Role Statistics -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Admins</h5>
                        <h3 class="text-primary"><?= $adminCount ?? 0 ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Teachers</h5>
                        <h3 class="text-success"><?= $teacherCount ?? 0 ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-info">Students</h5>
                        <h3 class="text-info"><?= $studentCount ?? 0 ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Enrollments -->
        <?php if (!empty($recentEnrollments)): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Enrollments</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Course</th>
                                        <th>Enrollment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentEnrollments as $enrollment): ?>
                                    <tr>
                                        <td><?= esc($enrollment['student_name'] ?? 'Unknown') ?></td>
                                        <td><?= esc($enrollment['course_name'] ?? 'Unknown Course') ?></td>
                                        <td><?= date('M d, Y H:i', strtotime($enrollment['enrollment_date'])) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Admin Actions -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Management</h5>
                        <p class="card-text">Manage system users and their roles.</p>
                        <a href="<?= base_url('/admin/users') ?>" class="btn btn-primary">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Course Management</h5>
                        <p class="card-text">Create and manage courses.</p>
                        <a href="<?= base_url('/admin/courses') ?>" class="btn btn-success">Manage Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">System Reports</h5>
                        <p class="card-text">View system statistics and reports.</p>
                        <a href="<?= base_url('/admin/reports') ?>" class="btn btn-outline-primary">View Reports</a>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($role === 'teacher'): ?>
        <!-- Teacher Content -->
        
        <!-- Teacher Statistics -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= $totalMyCourses ?? 0 ?></h4>
                                <p class="card-text">My Courses</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-book fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= $totalStudents ?? 0 ?></h4>
                                <p class="card-text">Total Students</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= count($recentEnrollments ?? []) ?></h4>
                                <p class="card-text">Recent Enrollments</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-user-plus fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Courses -->
        <?php if (!empty($myCourses)): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">My Courses</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($myCourses as $course): ?>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title text-primary"><?= esc($course['course_name']) ?></h6>
                                        <p class="card-text small text-muted"><?= esc($course['course_code']) ?></p>
                                        <p class="card-text small"><?= esc(substr($course['description'] ?? '', 0, 100)) ?><?= strlen($course['description'] ?? '') > 100 ? '...' : '' ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted"><?= $course['units'] ?? 3 ?> units</small>
                                            <a href="<?= base_url('/teacher/course/' . $course['course_id']) ?>" class="btn btn-sm btn-outline-primary">Manage</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Recent Enrollments -->
        <?php if (!empty($recentEnrollments)): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Enrollments in My Courses</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Course</th>
                                        <th>Enrollment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentEnrollments as $enrollment): ?>
                                    <tr>
                                        <td><?= esc($enrollment['student_name'] ?? 'Unknown') ?></td>
                                        <td><?= esc($enrollment['course_name'] ?? 'Unknown Course') ?></td>
                                        <td><?= date('M d, Y H:i', strtotime($enrollment['enrollment_date'])) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Teacher Actions -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-chalkboard-teacher me-2"></i>My Classes</h5>
                        <p class="card-text">Manage your classes and student progress.</p>
                        <a href="<?= base_url('/teacher/classes') ?>" class="btn btn-primary">
                            <i class="fas fa-eye me-1"></i>View Classes
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-plus-circle me-2"></i>Create Course</h5>
                        <p class="card-text">Create new courses for students to enroll.</p>
                        <a href="<?= base_url('/teacher/create-course') ?>" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i>Create Course
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-file-upload me-2"></i>Teaching Materials</h5>
                        <p class="card-text">Upload and manage course materials.</p>
                        <a href="<?= base_url('/teacher/get-courses') ?>" class="btn btn-outline-primary">
                            <i class="fas fa-upload me-1"></i>Manage Materials
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Teacher Quick Actions -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-graduation-cap me-2"></i>Grade Students</h5>
                        <p class="card-text">View and grade student submissions.</p>
                        <a href="<?= base_url('/teacher/grades') ?>" class="btn btn-outline-success">
                            <i class="fas fa-edit me-1"></i>Grade Students
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-chart-line me-2"></i>Course Analytics</h5>
                        <p class="card-text">View course performance and analytics.</p>
                        <button class="btn btn-outline-info" onclick="showComingSoon('Course Analytics')">
                            <i class="fas fa-chart-bar me-1"></i>View Analytics
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($role === 'student'): ?>
        <!-- Student Content -->
        
        <!-- Student Statistics -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= $totalEnrolled ?? 0 ?></h4>
                                <p class="card-text">Enrolled Courses</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-book fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title"><?= count($recentActivity ?? []) ?></h4>
                                <p class="card-text">Recent Activity</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-history fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <?php if (!empty($recentActivity)): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <?php foreach ($recentActivity as $activity): ?>
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Enrolled in <?= esc($activity['course_name']) ?></h6>
                                    <small><?= date('M d, Y', strtotime($activity['enrollment_date'])) ?></small>
                                </div>
                                <p class="mb-1">Course Code: <?= esc($activity['course_code']) ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Quick Actions -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Grades</h5>
                        <p class="card-text">Check your academic performance and grades.</p>
                        <a href="<?= base_url('/student/grades') ?>" class="btn btn-outline-primary">View Grades</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Assignments</h5>
                        <p class="card-text">View and submit your assignments.</p>
                        <a href="<?= base_url('/student/assignments') ?>" class="btn btn-outline-primary">View Assignments</a>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <!-- Unknown Role -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-danger">Role Not Recognized</h5>
                        <p class="card-text">Please contact the administrator.</p>
                        <a href="#" class="btn btn-outline-danger">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- JavaScript for enhanced functionality -->
<script>
// Function to show "Coming Soon" message
function showComingSoon(feature) {
    alert(feature + ' - Coming Soon!\n\nThis feature is currently under development. Thank you for your patience!');
}

// Auto-dismiss alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});

// Enhanced course management for teachers
<?php if ($role === 'teacher'): ?>
// Add click handlers for course management
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to action cards
    const actionCards = document.querySelectorAll('.card');
    actionCards.forEach(function(card) {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.transition = 'transform 0.2s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
<?php endif; ?>

// Enhanced enrollment functionality for students
<?php if ($role === 'student'): ?>
document.addEventListener('DOMContentLoaded', function() {
    // Handle enrollment buttons
    const enrollButtons = document.querySelectorAll('.enroll-btn');
    enrollButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const courseId = this.getAttribute('data-course-id');
            const courseName = this.getAttribute('data-course-name');
            
            if (confirm('Are you sure you want to enroll in "' + courseName + '"?')) {
                // Here you would typically make an AJAX call to enroll
                alert('Enrollment request sent for: ' + courseName + '\n\nThis feature will be fully functional soon!');
            }
        });
    });
    
    // Handle unenrollment buttons
    const unenrollButtons = document.querySelectorAll('.unenroll-btn');
    unenrollButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const courseId = this.getAttribute('data-course-id');
            const courseName = this.getAttribute('data-course-name');
            
            if (confirm('Are you sure you want to unenroll from "' + courseName + '"?')) {
                // Here you would typically make an AJAX call to unenroll
                alert('Unenrollment request sent for: ' + courseName + '\n\nThis feature will be fully functional soon!');
            }
        });
    });
});
<?php endif; ?>
</script>

<?= $this->endSection() ?>
