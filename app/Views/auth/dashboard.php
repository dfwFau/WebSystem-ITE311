<?= $this->extend('template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
  <!-- Welcome Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="welcome-card">
        <h1 class="h3 mb-1">Dashboard</h1>
        <p class="text-muted mb-0">Welcome back, <?= esc($userName ?? 'User') ?> (<?= ucfirst($userRole ?? 'Guest') ?>)</p>
      </div>
    </div>
  </div>

  <!-- Role-based Content -->
  <?php if (($userRole ?? '') === 'admin'): ?>
    <!-- Admin Stats Row -->
    <div class="row mb-4">
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card border-left-primary">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <h4 class="card-title mb-0 text-primary"><?= $totalUsers ?? 0 ?></h4>
                <p class="card-text text-muted small mb-0">Total Users</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-users text-primary"></i>
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
                <h4 class="card-title mb-0 text-success"><?= $totalCourses ?? 0 ?></h4>
                <p class="card-text text-muted small mb-0">Courses</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-graduation-cap text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card border-left-info">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <h4 class="card-title mb-0 text-info"><?= $activeEnrollments ?? 0 ?></h4>
                <p class="card-text text-muted small mb-0">Active Enrollments</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-user-check text-info"></i>
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
                <h4 class="card-title mb-0 text-warning"><?= $pendingEnrollments ?? 0 ?></h4>
                <p class="card-text text-muted small mb-0">Pending</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-clock text-warning"></i>
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
          <div class="card-header bg-light">
            <h5 class="card-title mb-0"><i class="fas fa-user-plus mr-2"></i>Recent Users</h5>
          </div>
          <div class="card-body">
            <?php if (!empty($recentUsers)): ?>
              <div class="list-group list-group-flush">
                <?php foreach ($recentUsers as $user): ?>
                  <div class="list-group-item px-0">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="mb-1"><?= esc($user['name']) ?></h6>
                        <small class="text-muted"><?= esc($user['email']) ?> • <?= ucfirst(esc($user['role'])) ?></small>
                      </div>
                      <small class="text-muted"><?= date('M d', strtotime($user['created_at'])) ?></small>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <div class="text-center py-4">
                <i class="fas fa-users fa-2x text-muted mb-3"></i>
                <p class="text-muted mb-0">No users yet</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <div class="card-header bg-light">
            <h5 class="card-title mb-0"><i class="fas fa-book mr-2"></i>Recent Courses</h5>
          </div>
          <div class="card-body">
            <?php if (!empty($recentCourses)): ?>
              <div class="list-group list-group-flush">
                <?php foreach ($recentCourses as $course): ?>
                  <div class="list-group-item px-0">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="mb-1"><?= esc($course['course_number'] ?? '') ?></h6>
                        <small class="text-muted"><?= esc($course['course_name'] ?? '') ?></small>
                      </div>
                      <small class="text-muted"><?= esc($course['units']) ?> units</small>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <div class="text-center py-4">
                <i class="fas fa-book fa-2x text-muted mb-3"></i>
                <p class="text-muted mb-0">No courses yet</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  <?php elseif (($userRole ?? '') === 'teacher'): ?>
    <!-- Teacher Stats Row -->
    <div class="row mb-4">
      <div class="col-lg-4 mb-3">
        <div class="card stat-card border-left-primary">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <h4 class="card-title mb-0 text-primary"><?= count($teacherCourses ?? []) ?></h4>
                <p class="card-text text-muted small mb-0">My Courses</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-book text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-3">
        <div class="card stat-card border-left-success">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <h4 class="card-title mb-0 text-success"><?= array_sum(array_column($teacherCourses ?? [], 'students')) ?></h4>
                <p class="card-text text-muted small mb-0">Total Students</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-users text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-3">
        <div class="card stat-card border-left-info">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <h4 class="card-title mb-0 text-info"><?= $totalMaterials ?? 0 ?></h4>
                <p class="card-text text-muted small mb-0">Materials</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-file-alt text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Teacher Content Cards -->
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <div class="card-header bg-light">
            <h5 class="card-title mb-0"><i class="fas fa-book mr-2"></i>My Courses</h5>
          </div>
          <div class="card-body">
            <?php if (!empty($teacherCourses ?? [])): ?>
              <div class="list-group list-group-flush">
                <?php foreach (array_slice($teacherCourses ?? [], 0, 5) as $course): ?>
                  <div class="list-group-item px-0">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="mb-1"><?= esc($course['course_number'] ?? '') ?></h6>
                        <small class="text-muted"><?= esc($course['course_name'] ?? '') ?></small>
                      </div>
                      <span class="badge badge-primary badge-pill"><?= $course['students'] ?? 0 ?> students</span>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="mt-3">
                <a href="<?= base_url('courses') ?>" class="btn btn-outline-primary btn-sm">View All Courses</a>
              </div>
            <?php else: ?>
              <div class="text-center py-4">
                <i class="fas fa-book fa-2x text-muted mb-3"></i>
                <h6 class="text-muted">No courses yet</h6>
                <a href="<?= base_url('courses/create') ?>" class="btn btn-primary">Create Your First Course</a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <div class="card-header bg-light">
            <h5 class="card-title mb-0"><i class="fas fa-file-alt mr-2"></i>Recent Materials</h5>
          </div>
          <div class="card-body">
            <?php if (!empty($recentMaterials ?? [])): ?>
              <div class="list-group list-group-flush">
                <?php foreach (array_slice($recentMaterials ?? [], 0, 5) as $material): ?>
                  <div class="list-group-item px-0">
                    <div class="d-flex align-items-start">
                      <div class="flex-grow-1">
                        <h6 class="mb-1"><?= esc($material['file_name'] ?? '') ?></h6>
                        <small class="text-muted">Course: <?= esc($material['course_code'] ?? '') ?> • Uploaded: <?= date('M d, Y', strtotime($material['created_at'] ?? 'now')) ?></small>
                      </div>
                      <i class="fas fa-file text-muted ml-2"></i>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <div class="text-center py-4">
                <i class="fas fa-file-alt fa-2x text-muted mb-3"></i>
                <p class="text-muted mb-0">No materials uploaded yet</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="card">
      <div class="card-header bg-light">
        <h5 class="card-title mb-0"><i class="fas fa-bolt mr-2"></i>Quick Actions</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-3">
            <a href="<?= base_url('courses') ?>" class="btn btn-outline-primary btn-block">
              <i class="fas fa-book fa-lg mb-2"></i><br>
              <span>Manage Courses</span>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <a href="<?= base_url('teacher/manage-students') ?>" class="btn btn-outline-success btn-block">
              <i class="fas fa-users fa-lg mb-2"></i><br>
              <span>Manage Students</span>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <a href="<?= base_url('courses/create') ?>" class="btn btn-outline-info btn-block">
              <i class="fas fa-plus fa-lg mb-2"></i><br>
              <span>Create Course</span>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <a href="<?= base_url('announcements/create') ?>" class="btn btn-outline-warning btn-block">
              <i class="fas fa-bullhorn fa-lg mb-2"></i><br>
              <span>Make Announcement</span>
            </a>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <?php if (!empty($teacherCourses)): ?>
              <a href="<?= base_url('admin/course/' . $teacherCourses[0]['course_id'] . '/upload') ?>" class="btn btn-outline-secondary btn-block">
                <i class="fas fa-upload fa-lg mb-2"></i><br>
                <span>Upload Material</span>
              </a>
            <?php else: ?>
              <button class="btn btn-outline-secondary btn-block" disabled>
                <i class="fas fa-upload fa-lg mb-2"></i><br>
                <span>Upload Material</span>
              </button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  <?php elseif (($userRole ?? '') === 'student'): ?>
    <!-- Student Stats Row -->
    <div class="row mb-4">
      <div class="col-lg-4 mb-3">
        <div class="card stat-card border-left-success">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <h4 class="card-title mb-0 text-success"><?= count($enrolledCourses ?? []) ?></h4>
                <p class="card-text text-muted small mb-0">Enrolled Courses</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-graduation-cap text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-3">
        <div class="card stat-card border-left-warning">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <h4 class="card-title mb-0 text-warning"><?= count($upcomingDeadlines ?? []) ?></h4>
                <p class="card-text text-muted small mb-0">Pending Tasks</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-clipboard-list text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-3">
        <div class="card stat-card border-left-info">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <h4 class="card-title mb-0 text-info">
                  <?php
                  if (!empty($recentGrades ?? [])) {
                    $avg = array_sum(array_column($recentGrades, 'grade')) / count($recentGrades);
                    echo number_format($avg, 1);
                  } else {
                    echo '—';
                  }
                  ?>
                </h4>
                <p class="card-text text-muted small mb-0">Average Grade</p>
              </div>
              <div class="stat-icon">
                <i class="fas fa-star text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Student Content Cards -->
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <div class="card-header bg-light">
            <h5 class="card-title mb-0"><i class="fas fa-graduation-cap mr-2"></i>My Courses</h5>
          </div>
          <div class="card-body">
            <?php if (!empty($enrolledCourses ?? [])): ?>
              <div class="list-group list-group-flush">
                <?php foreach (array_slice($enrolledCourses ?? [], 0, 5) as $course): ?>
                  <div class="list-group-item px-0">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="mb-1"><?= esc($course['course_number'] ?? '') ?></h6>
                        <small class="text-muted"><?= esc($course['course_name'] ?? '') ?></small>
                      </div>
                      <span class="badge badge-success badge-pill">Enrolled</span>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="mt-3">
                <a href="<?= base_url('courses') ?>" class="btn btn-outline-primary btn-sm">Browse More Courses</a>
              </div>
            <?php else: ?>
              <div class="text-center py-4">
                <i class="fas fa-graduation-cap fa-2x text-muted mb-3"></i>
                <h6 class="text-muted">No enrolled courses</h6>
                <a href="<?= base_url('courses') ?>" class="btn btn-primary">Browse Courses</a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <div class="card-header bg-light">
            <h5 class="card-title mb-0"><i class="fas fa-calendar-alt mr-2"></i>Upcoming Deadlines</h5>
          </div>
          <div class="card-body">
            <?php if (!empty($upcomingDeadlines ?? [])): ?>
              <div class="list-group list-group-flush">
                <?php foreach (array_slice($upcomingDeadlines ?? [], 0, 5) as $deadline): ?>
                  <div class="list-group-item px-0">
                    <div class="d-flex align-items-start">
                      <div class="flex-grow-1">
                        <h6 class="mb-1 text-warning"><?= esc($deadline['assignment'] ?? '') ?></h6>
                        <small class="text-muted">Course: <?= esc($deadline['course'] ?? '') ?> • Due: <?= date('M d, Y', strtotime($deadline['due_date'] ?? 'now')) ?></small>
                      </div>
                      <i class="fas fa-exclamation-triangle text-warning ml-2"></i>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <div class="text-center py-4">
                <i class="fas fa-calendar-alt fa-2x text-muted mb-3"></i>
                <p class="text-muted mb-0">No upcoming deadlines</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="card">
      <div class="card-header bg-light">
        <h5 class="card-title mb-0"><i class="fas fa-bolt mr-2"></i>Quick Actions</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <a href="<?= base_url('courses') ?>" class="btn btn-outline-primary btn-block">
              <i class="fas fa-book fa-lg mb-2"></i><br>
              <span>Browse Courses</span>
            </a>
          </div>
          <div class="col-md-6 mb-3">
            <a href="<?= base_url('announcements') ?>" class="btn btn-outline-info btn-block">
              <i class="fas fa-bullhorn fa-lg mb-2"></i><br>
              <span>View Announcements</span>
            </a>
          </div>
        </div>
      </div>
    </div>

  <?php else: ?>
    <!-- Unknown Role Card -->
    <div class="card">
      <div class="card-body text-center py-5">
        <i class="fas fa-exclamation-triangle fa-4x text-warning mb-4"></i>
        <h4 class="text-muted">Role Not Recognized</h4>
        <p class="text-muted">Please contact the administrator to resolve this issue.</p>
      </div>
    </div>
  <?php endif; ?>
</div>

<style>
  .welcome-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #dee2e6;
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

  .border-left-primary {
    border-left: 4px solid #007bff !important;
  }

  .border-left-success {
    border-left: 4px solid #28a745 !important;
  }

  .border-left-info {
    border-left: 4px solid #17a2b8 !important;
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

  .list-group-item {
    border: none;
    padding: 0.75rem 0;
    border-bottom: 1px solid #f8f9fa;
  }

  .list-group-item:last-child {
    border-bottom: none;
  }

  .btn-outline-primary:hover, .btn-outline-success:hover, .btn-outline-warning:hover, .btn-outline-info:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
  }

  .btn-block {
    display: block;
    width: 100%;
  }

  .badge-pill {
    border-radius: 10rem;
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

</final_file_content>
<task_progress>
- [x] Create balanced card-based design
- [x] Add subtle colored borders to stat cards
- [x] Use Bootstrap cards for content sections
- [x] Add gentle hover effects
- [x] Include icons in cards and buttons
- [x] Maintain clean layout without excess
- [x] Keep responsive design
- [x] Add welcome card with gradient background
</task_progress>
</write_to_file>
