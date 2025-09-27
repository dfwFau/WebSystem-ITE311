<?= $this->extend('template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #f8fffe 0%, #e8f5f3 100%); min-height: 100vh;">

    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h1 class="mb-2 fw-bold" style="color: #2d3748; font-size: 2.5rem;">
                                Welcome back, <?= esc($userName) ?>! 
                            </h1>
                            <p class="mb-0" style="color: #718096; font-size: 1.1rem;">
                                You are logged in as 
                                <span class="badge px-3 py-2 fs-6" style="background: #00796b; color: white; border-radius: 20px;">
                                    <?= esc(ucfirst($role)) ?>
                                </span>
                            </p>
                        </div>
                        <div class="d-none d-md-block">
                            <div class="text-end">
                                <div style="font-size: 4rem; color: #00796b;">
                                    <?php 
                                    $icons = [
                                        'admin' => '👑',
                                        'teacher' => '👨‍🏫',
                                        'student' => '🎓'
                                    ];
                                    echo $icons[$role] ?? '👤';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Role-based Dashboard Content -->
    <?php if ($role === 'admin'): ?>
        <!-- Admin Dashboard -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg h-100" style="background: rgba(255, 255, 255, 0.95);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3" style="font-size: 2rem; color: #00796b;">⚡</div>
                            <div>
                                <h4 class="card-title mb-1 fw-bold" style="color: #2d3748;">Admin Control Center</h4>
                                <p class="card-text text-muted">Manage your entire system from here</p>
                            </div>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="<?= base_url('/manage-users') ?>" class="btn btn-lg w-100 py-3" style="border-radius: 15px; background: #00796b; color: white; border: none;">
                                    <i class="fas fa-users me-2"></i>Manage Users
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-outline btn-lg w-100 py-3" style="border-radius: 15px; border: 2px solid #00796b; color: #00796b; background: transparent;">
                                    <i class="fas fa-chart-bar me-2"></i>View Reports
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #00a085, #00796b);">
                    <div class="card-body p-4 text-white text-center">
                        <div style="font-size: 3rem;" class="mb-2">📊</div>
                        <h5 class="fw-bold">Quick Stats</h5>
                        <p class="mb-0">System overview at a glance</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users List -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95);">
                    <div class="card-header border-0 bg-transparent p-4">
                        <h5 class="card-title mb-0 fw-bold d-flex align-items-center" style="color: #2d3748;">
                            <span class="me-2" style="font-size: 1.5rem; color: #00796b;">👥</span>
                            Registered Users
                        </h5>
                    </div>
                    <div class="card-body p-4 pt-0">
                        <?php if (!empty($users)): ?>
                            <div class="row g-3">
                                <?php foreach ($users as $u): ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="p-3 rounded-3" style="background: #f8fffe; border-left: 4px solid #00796b; border: 1px solid #e0f2f1;">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #00796b; color: white; font-weight: bold;">
                                                        <?= strtoupper(substr(esc($u['name']), 0, 1)) ?>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bold" style="color: #2d3748;"><?= esc($u['name']) ?></div>
                                                    <small class="text-muted"><?= esc($u['email']) ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <div style="font-size: 3rem; color: #cbd5e0;">👤</div>
                                <p class="text-muted mt-2">No users found.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($role === 'teacher'): ?>
        <!-- Teacher Dashboard -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg h-100" style="background: rgba(255, 255, 255, 0.95);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3" style="font-size: 2rem; color: #00796b;">📚</div>
                            <div>
                                <h4 class="card-title mb-1 fw-bold" style="color: #2d3748;">Teacher Dashboard</h4>
                                <p class="card-text text-muted">Manage your classes and track student progress</p>
                            </div>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="<?= base_url('/teacher/classes') ?>" class="btn btn-lg w-100 py-3" style="border-radius: 15px; background: #00796b; color: white; border: none;">
                                    <i class="fas fa-chalkboard me-2"></i>My Classes
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-outline btn-lg w-100 py-3" style="border-radius: 15px; border: 2px solid #00796b; color: #00796b; background: transparent;">
                                    <i class="fas fa-upload me-2"></i>Upload Materials
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #00a085, #00796b);">
                    <div class="card-body p-4 text-white text-center">
                        <div style="font-size: 3rem;" class="mb-2">🎯</div>
                        <h5 class="fw-bold">Student Progress</h5>
                        <p class="mb-0">Track your students' achievements</p>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($role === 'student'): ?>
        <!-- Student Dashboard -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg h-100" style="background: rgba(255, 255, 255, 0.95);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3" style="font-size: 2rem; color: #00796b;">🚀</div>
                            <div>
                                <h4 class="card-title mb-1 fw-bold" style="color: #2d3748;">Student Hub</h4>
                                <p class="card-text text-muted">Access your courses, grades, and assignments</p>
                            </div>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="<?= base_url('/student/courses') ?>" class="btn btn-lg w-100 py-3" style="border-radius: 15px; background: #00796b; color: white; border: none;">
                                    <i class="fas fa-book me-2"></i>My Courses
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-outline btn-lg w-100 py-3" style="border-radius: 15px; border: 2px solid #00796b; color: #00796b; background: transparent;">
                                    <i class="fas fa-tasks me-2"></i>Assignments
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #00a085, #00796b);">
                    <div class="card-body p-4 text-white text-center">
                        <div style="font-size: 3rem;" class="mb-2">⭐</div>
                        <h5 class="fw-bold">Your Grades</h5>
                        <p class="mb-0">Check your academic performance</p>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <!-- Unknown Role -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95);">
                    <div class="card-body p-4 text-center">
                        <div style="font-size: 4rem; color: #f56565;" class="mb-3">⚠️</div>
                        <h4 class="fw-bold mb-2" style="color: #2d3748;">Role Not Recognized</h4>
                        <p class="text-muted mb-4">It seems your role is not properly configured. Please contact the administrator for assistance.</p>
                        <a href="#" class="btn btn-outline btn-lg" style="border-radius: 15px; border: 2px solid #f56565; color: #f56565; background: transparent;">
                            Contact Administrator
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>

<style>
.btn {
    transition: all 0.3s ease;
    font-weight: 600;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Hover effects for teal buttons */
.btn[style*="#00796b"]:hover {
    background: #00695c !important;
    transform: translateY(-2px);
}

.btn-outline:hover {
    background: #00796b !important;
    color: white !important;
    border-color: #00796b !important;
}

.card {
    transition: all 0.3s ease;
    border-radius: 20px;
}

.card:hover {
    transform: translateY(-5px);
}

@media (max-width: 768px) {
    .container-fluid {
        padding-left: 15px;
        padding-right: 15px;
    }
    
    h1 {
        font-size: 2rem !important;
    }
}
</style>

<?= $this->endSection() ?>