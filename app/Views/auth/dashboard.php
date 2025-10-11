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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Classes</h5>
                        <p class="card-text">Manage your classes and student progress.</p>
                        <a href="<?= base_url('/teacher/classes') ?>" class="btn btn-primary">View Classes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Teaching Materials</h5>
                        <p class="card-text">Upload and manage course materials.</p>
                        <a href="#" class="btn btn-outline-primary">Upload Materials</a>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($role === 'student'): ?>
        <!-- Student Content -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Courses</h5>
                        <p class="card-text">Access your enrolled courses and materials.</p>
                        <a href="<?= base_url('/student/courses') ?>" class="btn btn-primary">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Grades</h5>
                        <p class="card-text">Check your academic performance and grades.</p>
                        <a href="#" class="btn btn-outline-primary">View Grades</a>
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
