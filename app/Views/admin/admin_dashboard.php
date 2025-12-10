<?= $this->extend('template') ?>

<?= $this->section('title') ?>Admin Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <!-- Header -->
    <div class="dashboard-header mb-4">
        <h1 class="dashboard-title">Dashboard</h1>
        <p class="dashboard-subtitle">Welcome back, Admin. Here's what's happening with your system.</p>
    </div>

    <!-- Main Content Layout: Two Columns -->
    <div class="row g-4">
        <!-- Left Column: Stats -->
        <div class="col-lg-6">
            <div class="stats-section">
                <h2 class="section-title mb-3">System Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-card d-flex align-items-center p-3 mb-3">
                        <i class="fas fa-users stat-icon me-3"></i>
                        <div>
                            <div class="stat-number">1,247</div>
                            <div class="stat-label">Total Users</div>
                        </div>
                    </div>
                    <div class="stat-card d-flex align-items-center p-3 mb-3">
                        <i class="fas fa-graduation-cap stat-icon me-3"></i>
                        <div>
                            <div class="stat-number">48</div>
                            <div class="stat-label">Active Courses</div>
                        </div>
                    </div>
                    <div class="stat-card d-flex align-items-center p-3 mb-3">
                        <i class="fas fa-clipboard-list stat-icon me-3"></i>
                        <div>
                            <div class="stat-number">324</div>
                            <div class="stat-label">Assignments</div>
                        </div>
                    </div>
                    <div class="stat-card d-flex align-items-center p-3 mb-3">
                        <i class="fas fa-exclamation-triangle stat-icon me-3"></i>
                        <div>
                            <div class="stat-number">18</div>
                            <div class="stat-label">Pending Issues</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Quick Actions -->
        <div class="col-lg-6">
            <div class="actions-section card p-4">
                <h2 class="section-title mb-3">Quick Actions</h2>
                <div class="actions-grid">
                    <a href="<?= base_url('/manageusers') ?>" class="action-item d-flex align-items-center p-3 mb-3">
                        <i class="fas fa-users action-icon me-3"></i>
                        <div class="action-text">Manage Users</div>
                    </a>
                    <a href="<?= base_url('/courses') ?>" class="action-item d-flex align-items-center p-3 mb-3">
                        <i class="fas fa-graduation-cap action-icon me-3"></i>
                        <div class="action-text">View Courses</div>
                    </a>
                    <a href="<?= base_url('/admin/reports') ?>" class="action-item d-flex align-items-center p-3 mb-3">
                        <i class="fas fa-chart-bar action-icon me-3"></i>
                        <div class="action-text">View Reports</div>
                    </a>
                    <a href="<?= base_url('/admin/settings') ?>" class="action-item d-flex align-items-center p-3 mb-3">
                        <i class="fas fa-cog action-icon me-3"></i>
                        <div class="action-text">Settings</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Header */
.dashboard-title {
    font-size: 2rem;
    font-weight: 800;
    color: #1e293b;
}

.dashboard-subtitle {
    color: #64748b;
    font-size: 1rem;
}

/* Stats Section */
.stats-section {
    background: #f8fafc;
    border-radius: 20px;
    padding: 1.5rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.section-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
}

.stats-grid {
    display: flex;
    flex-direction: column;
}

.stat-card {
    border-radius: 16px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
}

.stat-icon {
    font-size: 2rem;
    opacity: 0.9;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
}

.stat-label {
    font-size: 0.8rem;
    text-transform: uppercase;
    opacity: 0.9;
}

/* Actions Section */
.actions-section {
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    background: #fff;
}

.actions-grid {
    display: flex;
    flex-direction: column;
}

.action-item {
    display: flex;
    align-items: center;
    border-radius: 16px;
    padding: 1rem;
    color: #1e293b;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    background: #f8fafc;
}

.action-item:hover {
    transform: translateY(-3px);
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    box-shadow: 0 10px 20px rgba(102,126,234,0.3);
}

.action-icon {
    font-size: 1.5rem;
}

.action-text {
    font-weight: 600;
}

/* Responsive */
@media (max-width: 992px) {
    .row > .col-lg-6 {
        margin-bottom: 2rem;
    }
}

@media (max-width: 768px) {
    .stat-number {
        font-size: 1.25rem;
    }
    .dashboard-title {
        font-size: 1.75rem;
    }
    .action-item, .stat-card {
        padding: 0.75rem;
    }
}
</style>

<?= $this->endSection() ?>
