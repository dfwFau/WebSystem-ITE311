<?= $this->extend('template') ?>

<?= $this->section('title') ?>Admin Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
  <!-- Welcome Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="welcome-card">
        <h1 class="h3 mb-1">Admin Dashboard</h1>
        <p class="text-muted mb-0">Welcome back, Administrator. Here's your system overview.</p>
      </div>
    </div>
  </div>

  <!-- Admin Stats Row -->
  <div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
      <div class="card stat-card border-left-success">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <h4 class="card-title mb-0 text-success">
                <?php
                  // Get actual user count from database
                  $userModel = new \App\Models\UserModel();
                  echo $userModel->countAll();
                ?>
              </h4>
              <p class="card-text text-muted small mb-0">Total Users</p>
            </div>
            <div class="stat-icon">
              <i class="fas fa-users text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
      <div class="card stat-card border-left-success">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <h4 class="card-title mb-0 text-success">
                <?php
                  // Get actual course count
                  $courseModel = new \App\Models\CourseModel();
                  echo $courseModel->countAll();
                ?>
              </h4>
              <p class="card-text text-muted small mb-0">Active Courses</p>
            </div>
            <div class="stat-icon">
              <i class="fas fa-graduation-cap text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
      <div class="card stat-card border-left-success">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <h4 class="card-title mb-0 text-success">
                <?php
                  // Get actual assignment count
                  $assignmentModel = new \App\Models\AssignmentModel();
                  echo $assignmentModel->countAll();
                ?>
              </h4>
              <p class="card-text text-muted small mb-0">Assignments</p>
            </div>
            <div class="stat-icon">
              <i class="fas fa-clipboard-list text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
      <div class="card stat-card border-left-warning">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <h4 class="card-title mb-0 text-warning">0</h4>
              <p class="card-text text-muted small mb-0">Pending Issues</p>
            </div>
            <div class="stat-icon">
              <i class="fas fa-exclamation-triangle text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Admin Content Cards -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card h-100">
        <div class="card-header bg-success text-white">
          <h5 class="card-title mb-0"><i class="fas fa-user-plus mr-2"></i>Recent Users</h5>
        </div>
        <div class="card-body">
          <div class="text-center py-4">
            <i class="fas fa-users fa-2x text-success mb-3"></i>
            <p class="text-muted mb-0">User management features coming soon</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 mb-4">
      <div class="card h-100">
        <div class="card-header bg-success text-white">
          <h5 class="card-title mb-0"><i class="fas fa-book mr-2"></i>Recent Courses</h5>
        </div>
        <div class="card-body">
          <div class="text-center py-4">
            <i class="fas fa-book fa-2x text-success mb-3"></i>
            <p class="text-muted mb-0">Course management features coming soon</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions Card -->
  <div class="card">
    <div class="card-header bg-success text-white">
      <h5 class="card-title mb-0"><i class="fas fa-bolt mr-2"></i>Quick Actions</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-3">
          <a href="<?= base_url('/manageusers') ?>" class="btn btn-outline-success btn-block">
            <i class="fas fa-users fa-lg mb-2"></i><br>
            <span>Manage Users</span>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
          <a href="<?= base_url('/courses') ?>" class="btn btn-outline-success btn-block">
            <i class="fas fa-graduation-cap fa-lg mb-2"></i><br>
            <span>Manage Courses</span>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
          <a href="<?= base_url('/admin/reports') ?>" class="btn btn-outline-success btn-block">
            <i class="fas fa-chart-bar fa-lg mb-2"></i><br>
            <span>Reports</span>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
          <a href="<?= base_url('/admin/settings') ?>" class="btn btn-outline-success btn-block">
            <i class="fas fa-cog fa-lg mb-2"></i><br>
            <span>Settings</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .welcome-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #dee2e6;
    border-left: 4px solid #28a745;
  }

  .stat-card {
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    height: 100%;
  }

  .stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  }

  .border-left-success {
    border-left: 4px solid #28a745 !important;
  }

  .border-left-warning {
    border-left: 4px solid #ffc107 !important;
  }

  .stat-icon {
    font-size: 2rem;
    opacity: 0.8;
  }

  .card {
    border-radius: 12px;
    border: 1px solid #dee2e6;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
  }

  .card-header {
    border-radius: 12px 12px 0 0 !important;
    border-bottom: 1px solid #dee2e6;
    padding: 1rem 1.25rem;
  }

  .card-body {
    padding: 1.25rem;
  }

  .btn-outline-success:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
  }

  .btn-block {
    display: block;
    width: 100%;
  }

  @media (max-width: 768px) {
    .welcome-card {
      padding: 15px;
    }

    .stat-card {
      margin-bottom: 1rem;
    }

    .card-body {
      padding: 1rem;
    }
  }
</style>

<?= $this->endSection() ?>
