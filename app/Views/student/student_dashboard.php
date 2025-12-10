<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <!-- Page Title -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="dashboard-title">Welcome, <span class="gradient-text"><?= esc($userName) ?></span>!</h2>
            <p class="text-muted">Here’s a quick overview of your courses, grades, and assignments.</p>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="dashboard-card text-center p-4">
                <div class="icon-card bg-primary-gradient mb-3">
                    <i class="mdi mdi-book-open-variant"></i>
                </div>
                <h4 class="card-title">My Courses</h4>
                <a href="<?= base_url('student/courses') ?>" class="btn btn-gradient mt-3">View Courses</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card text-center p-4">
                <div class="icon-card bg-success-gradient mb-3">
                    <i class="mdi mdi-chart-line"></i>
                </div>
                <h4 class="card-title">My Grades</h4>
                <a href="<?= base_url('student/grades') ?>" class="btn btn-gradient mt-3">View Grades</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card text-center p-4">
                <div class="icon-card bg-warning-gradient mb-3">
                    <i class="mdi mdi-file-document"></i>
                </div>
                <h4 class="card-title">Assignments</h4>
                <a href="<?= base_url('student/assignments') ?>" class="btn btn-gradient mt-3">View Assignments</a>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row">
        <div class="col-12">
            <div class="dashboard-card p-4">
                <h5 class="card-title mb-3">Quick Links</h5>
                <div class="d-flex flex-wrap gap-2">
                    <a href="<?= base_url('announcements') ?>" class="btn btn-outline-gradient-primary">
                        <i class="mdi mdi-bullhorn me-1"></i> Announcements
                    </a>
                    <a href="<?= base_url('student/courses') ?>" class="btn btn-outline-gradient-success">
                        <i class="mdi mdi-book-open me-1"></i> Courses
                    </a>
                    <a href="<?= base_url('student/grades') ?>" class="btn btn-outline-gradient-info">
                        <i class="mdi mdi-chart-line me-1"></i> Grades
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .gradient-text {
        background: linear-gradient(135deg,#667eea,#764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .dashboard-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .dashboard-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .icon-card {
        width: 70px;
        height: 70px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        margin: 0 auto;
    }

    .bg-primary-gradient { background: linear-gradient(135deg,#667eea,#764ba2); }
    .bg-success-gradient { background: linear-gradient(135deg,#10b981,#059669); }
    .bg-warning-gradient { background: linear-gradient(135deg,#f59e0b,#d97706); }

    .btn-gradient {
        background: linear-gradient(135deg,#667eea,#764ba2);
        color: #fff;
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(102,126,234,0.4);
        color: #fff;
    }

    .btn-outline-gradient-primary {
        border: 2px solid #667eea;
        color: #667eea;
        border-radius: 50px;
        transition: 0.3s;
    }

    .btn-outline-gradient-primary:hover {
        background: linear-gradient(135deg,#667eea,#764ba2);
        color: #fff;
    }

    .btn-outline-gradient-success {
        border: 2px solid #10b981;
        color: #10b981;
        border-radius: 50px;
        transition: 0.3s;
    }

    .btn-outline-gradient-success:hover {
        background: linear-gradient(135deg,#10b981,#059669);
        color: #fff;
    }

    .btn-outline-gradient-info {
        border: 2px solid #06b6d4;
        color: #06b6d4;
        border-radius: 50px;
        transition: 0.3s;
    }

    .btn-outline-gradient-info:hover {
        background: linear-gradient(135deg,#06b6d4,#0891b2);
        color: #fff;
    }

    .card-title {
        font-weight: 700;
        font-size: 1.25rem;
    }

    @media (max-width: 768px){
        .dashboard-card { text-align: center; }
        .d-flex.flex-wrap { justify-content: center; }
    }
</style>
<?= $this->endSection() ?>
