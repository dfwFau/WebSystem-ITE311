<!-- TEMPLATE 1: Minimalist Clean Design -->
<?= $this->extend('template') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0" style="background: #f8f9fa; min-height: 100vh;">
    <!-- Top Bar -->
    <div class="bg-white shadow-sm border-bottom">
        <div class="container-fluid px-4 py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h4 mb-0 fw-bold" style="color: #2c3e50;">Dashboard</h1>
                </div>
                <div class="col-auto">
                    <div class="d-flex align-items-center">
                        <span class="badge rounded-pill me-3" style="background: #00796b; font-size: 0.85rem;"><?= esc(ucfirst($role)) ?></span>
                        <div class="dropdown">
                            <button class="btn btn-sm rounded-circle" style="width: 40px; height: 40px; background: #00796b; color: white;">
                                <?= strtoupper(substr(esc($userName), 0, 1)) ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4 py-4">
        <!-- Welcome Section -->
        <div class="mb-4">
            <h2 class="h3 fw-bold mb-1" style="color: #2c3e50;">Welcome back, <?= esc($userName) ?></h2>
            <p class="text-muted mb-0">Here's what's happening with your account today.</p>
        </div>

        <?php if ($role === 'admin'): ?>
            <!-- Admin Content -->
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 h-100" style="background: linear-gradient(135deg, #00796b, #004d40);">
                        <div class="card-body text-white text-center p-4">
                            <div class="mb-3" style="font-size: 2.5rem;">👥</div>
                            <h5 class="fw-bold mb-2">Total Users</h5>
                            <h2 class="mb-0"><?= count($users ?? []) ?></h2>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold">Quick Actions</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <a href="<?= base_url('/manage-users') ?>" class="btn w-100 py-3" style="background: #00796b; color: white; border-radius: 10px;">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2">👤</span>
                                            Manage Users
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="btn btn-outline-secondary w-100 py-3" style="border-radius: 10px;">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2">📊</span>
                                            Reports
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="btn btn-outline-secondary w-100 py-3" style="border-radius: 10px;">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2">⚙️</span>
                                            Settings
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users List -->
            <?php if (!empty($users)): ?>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 py-3">
                                <h5 class="mb-0 fw-bold">Registered Users</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-0 fw-bold">User</th>
                                                <th class="border-0 fw-bold">Email</th>
                                                <th class="border-0 fw-bold">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $u): ?>
                                                <tr>
                                                    <td class="border-0 py-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; background: #e9ecef; color: #6c757d; font-weight: bold; font-size: 0.8rem;">
                                                                <?= strtoupper(substr(esc($u['name']), 0, 1)) ?>
                                                            </div>
                                                            <span class="fw-medium"><?= esc($u['name']) ?></span>
                                                        </div>
                                                    </td>
                                                    <td class="border-0 py-3 text-muted"><?= esc($u['email']) ?></td>
                                                    <td class="border-0 py-3">
                                                        <span class="badge rounded-pill" style="background: #e8f5e8; color: #2e7d32;">Active</span>
                                                    </td>
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

        <?php elseif ($role === 'teacher'): ?>
            <!-- Teacher Content -->
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3 p-3 rounded-circle" style="background: rgba(0, 121, 107, 0.1);">
                                    <span style="font-size: 1.5rem; color: #00796b;">📚</span>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1">Teaching Hub</h4>
                                    <p class="text-muted mb-0">Manage your classes and student progress</p>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <a href="<?= base_url('/teacher/classes') ?>" class="btn w-100 py-3" style="background: #00796b; color: white; border-radius: 10px;">
                                        📖 My Classes
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-outline-secondary w-100 py-3" style="border-radius: 10px;">
                                        📤 Upload Materials
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 h-100" style="background: linear-gradient(135deg, #00796b, #004d40);">
                        <div class="card-body text-white text-center p-4">
                            <div class="mb-3" style="font-size: 2.5rem;">🎯</div>
                            <h5 class="fw-bold mb-2">Student Progress</h5>
                            <p class="mb-0">Track achievements</p>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($role === 'student'): ?>
            <!-- Student Content -->
            <!-- Welcome Cards at Top -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm text-center h-100" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <div class="mb-4" style="font-size: 4rem;">🎓</div>
                            <h4 class="fw-bold mb-3">My Learning</h4>
                            <p class="text-muted mb-4">Access courses and materials</p>
                            <a href="<?= base_url('/student/courses') ?>" class="btn rounded-pill px-4 py-2" style="background: #00796b; color: white;">
                                View Courses
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm text-center h-100" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <div class="mb-4" style="font-size: 4rem;">⭐</div>
                            <h4 class="fw-bold mb-3">Academic Performance</h4>
                            <p class="text-muted mb-4">Check grades and progress</p>
                            <button class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                View Grades
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- My Courses Section -->
            <div class="mb-5">
                <h3 class="fw-bold mb-4">📚 My Courses</h3>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-2">Web Development</h5>
                                <p class="text-muted mb-3">HTML, CSS, JavaScript</p>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar" style="background: #00796b; width: 75%"></div>
                                </div>
                                <small class="text-muted">75% Complete</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-2">Graphic Design</h5>
                                <p class="text-muted mb-3">Design principles and tools</p>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar" style="background: #00796b; width: 60%"></div>
                                </div>
                                <small class="text-muted">60% Complete</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-2">Data Analytics</h5>
                                <p class="text-muted mb-3">Data analysis basics</p>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar" style="background: #00796b; width: 0%"></div>
                                </div>
                                <small class="text-muted">Not Started</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-2">Mathematics</h5>
                                <p class="text-muted mb-3">Basic mathematics</p>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar" style="background: #00796b; width: 100%"></div>
                                </div>
                                <small class="text-muted">Completed</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Assignments Section -->
            <div class="mb-5">
                <h3 class="fw-bold mb-4">📝 Assignments</h3>
                
                <div class="row g-3">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="fw-bold mb-1">JavaScript Project</h5>
                                        <p class="text-muted mb-0">Web Development Course</p>
                                    </div>
                                    <span class="badge rounded-pill" style="background: #dc3545; color: white;">Due Tomorrow</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="fw-bold mb-1">Design Portfolio</h5>
                                        <p class="text-muted mb-0">Graphic Design Course</p>
                                    </div>
                                    <span class="badge rounded-pill" style="background: #ffc107; color: black;">Due in 3 days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="fw-bold mb-1">Data Report</h5>
                                        <p class="text-muted mb-0">Data Analytics Course</p>
                                    </div>
                                    <span class="badge rounded-pill" style="background: #28a745; color: white;">Due in 1 week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <!-- Unknown Role -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body py-5">
                            <div style="font-size: 4rem; color: #dc3545;" class="mb-3">⚠️</div>
                            <h4 class="fw-bold">Role Not Recognized</h4>
                            <p class="text-muted">Please contact the administrator.</p>
                            <a href="#" class="btn btn-outline-danger">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.btn {
    transition: all 0.3s ease;
    border: none;
    font-weight: 500;
}
.btn:hover {
    transform: translateY(-1px);
}
.card {
    transition: all 0.3s ease;
    border-radius: 12px;
}
.table-hover tbody tr:hover {
    background-color: rgba(0, 121, 107, 0.05);
}
</style>

<?= $this->endSection() ?>
