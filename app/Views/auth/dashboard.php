<?= $this->extend('template') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="h3 fw-bold mb-1">Welcome back, <?= esc($userName) ?></h2>
            <p class="text-muted mb-0">Role: <span class="badge bg-primary"><?= esc(ucfirst($role)) ?></span></p>
        </div>
    </div>

    <?php if ($role === 'admin'): ?>
        <!-- Admin Content -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Management</h5>
                        <p class="card-text">Total Users: <strong><?= count($users ?? []) ?></strong></p>
                        <a href="<?= base_url('/manage-users') ?>" class="btn btn-primary">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">System Overview</h5>
                        <p class="card-text">Monitor system activities and user statistics.</p>
                        <a href="#" class="btn btn-outline-primary">View Reports</a>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($role === 'teacher'): ?>
        <!-- Teacher Content -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Classes</h5>
                        <p class="card-text">Manage your classes and student progress.</p>
                        <a href="<?= base_url('/teacher/classes') ?>" class="btn btn-primary">View Classes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Course</h5>
                        <p class="card-text">Create new courses for students to enroll.</p>
                        <a href="<?= base_url('/teacher/create-course') ?>" class="btn btn-success">Create Course</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Teaching Materials</h5>
                        <p class="card-text">Upload and manage course materials.</p>
                        <a href="<?= base_url('/teacher/materials') ?>" class="btn btn-outline-primary">Upload Materials</a>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($role === 'student'): ?>
        <!-- Student Content -->
        
        <!-- Enrolled Courses Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="mb-3">📚 My Enrolled Courses</h4>
                <?php if (!empty($enrolledCourses)): ?>
                    <div class="row">
                        <?php foreach ($enrolledCourses as $enrollment): ?>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title text-primary"><?= esc($enrollment['course_name']) ?></h6>
                                        <p class="card-text small text-muted"><?= esc($enrollment['course_code']) ?></p>
                                        <p class="card-text small"><?= esc(substr($enrollment['description'] ?? '', 0, 100)) ?><?= strlen($enrollment['description'] ?? '') > 100 ? '...' : '' ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                Enrolled: <?= date('M d, Y', strtotime($enrollment['enrollment_date'])) ?>
                                            </small>
                                            <button class="btn btn-sm btn-outline-danger unenroll-btn" 
                                                    data-course-id="<?= $enrollment['course_id'] ?>"
                                                    data-course-name="<?= esc($enrollment['course_name']) ?>">
                                                Unenroll
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">
                        <h6 class="alert-heading">No Enrolled Courses</h6>
                        <p class="mb-0">You haven't enrolled in any courses yet. Browse available courses below to get started!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Available Courses Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="mb-3">🎯 Available Courses</h4>
                <?php if (!empty($availableCourses)): ?>
                    <div class="row">
                        <?php foreach ($availableCourses as $course): ?>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title text-success"><?= esc($course['course_name']) ?></h6>
                                        <p class="card-text small text-muted"><?= esc($course['course_code']) ?></p>
                                        <p class="card-text small"><?= esc(substr($course['description'] ?? '', 0, 100)) ?><?= strlen($course['description'] ?? '') > 100 ? '...' : '' ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted"><?= $course['units'] ?? 3 ?> units</small>
                                            <button class="btn btn-sm btn-success enroll-btn" 
                                                    data-course-id="<?= $course['course_id'] ?>"
                                                    data-course-name="<?= esc($course['course_name']) ?>">
                                                Enroll
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <h6 class="alert-heading">No Available Courses</h6>
                        <p class="mb-0">You are enrolled in all available courses! Great job!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

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

<?= $this->endSection() ?>
