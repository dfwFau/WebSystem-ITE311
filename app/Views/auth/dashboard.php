<?= $this->extend('template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Main Dashboard Template with #73AF6F Theme */

  :root {
    --primary-green: #73AF6F;
    --primary-green-light: #8bbf84;
    --primary-green-dark: #5a8f58;
    --secondary-green: #64748b;
    --accent-green: #73AF6F;
    --success-green: #73AF6F;
    --background-light: #f8fafc;
    --background-card: rgba(255, 255, 255, 0.98);
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --border-color: rgba(115, 175, 111, 0.2);
    --shadow-light: 0 4px 12px rgba(115, 175, 111, 0.1);
    --shadow-hover: 0 8px 24px rgba(115, 175, 111, 0.15);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Main Container */
  .main-dashboard {
    background: linear-gradient(135deg, var(--background-light) 0%, #e8f5e8 100%);
    min-height: 100vh;
    padding: 2rem 0;
  }

  /* Header Section */
  .dashboard-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    padding: 3rem 2rem;
    margin-bottom: 2rem;
    border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    color: white;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-light);
  }

  .dashboard-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: float 6s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-10px) rotate(120deg); }
    66% { transform: translateY(5px) rotate(240deg); }
  }

  .header-content {
    position: relative;
    z-index: 1;
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
  }

  .header-title {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 0.5rem;
  }

  .header-title h1 {
    margin: 0;
    font-size: 2.5rem;
    font-weight: 800;
    letter-spacing: -0.5px;
  }

  .header-title i {
    font-size: 2.5rem;
    opacity: 0.9;
  }

  .header-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
  }

  /* Stats Cards */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
  }

  .stat-card {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    padding: 2rem;
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    text-align: center;
  }

  .stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-green), var(--primary-green-light));
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
  }

  .stat-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.8rem;
    margin: 0 auto 1.5rem;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .stat-value {
    font-size: 3rem;
    font-weight: 800;
    color: var(--primary-green);
    margin-bottom: 0.5rem;
    display: block;
  }

  .stat-label {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  /* Content Grid */
  .content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
  }

  .content-card {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
  }

  .card-header-modern {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.5rem 2rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .card-header-modern h5 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .card-container {
    padding: 2rem;
  }

  .modern-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .modern-list-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(115, 175, 111, 0.02);
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    transition: var(--transition);
  }

  .modern-list-item:hover {
    background: rgba(115, 175, 111, 0.05);
  }

  .list-icon {
    width: 40px;
    height: 40px;
    background: rgba(115, 175, 111, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-green);
    font-size: 1.1rem;
    flex-shrink: 0;
  }

  .list-content {
    flex: 1;
  }

  .list-title {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
  }

  .list-subtitle {
    font-size: 0.85rem;
    color: var(--text-secondary);
  }

  .list-meta {
    font-size: 0.8rem;
    color: var(--text-secondary);
    margin-left: auto;
    flex-shrink: 0;
  }

  /* Actions Section */
  .actions-section {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
  }

  .actions-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.5rem 2rem;
    color: white;
    text-align: center;
  }

  .actions-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 700;
  }

  .actions-subtitle {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0.5rem 0 0 0;
  }

  .actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
  }

  .action-card {
    background: rgba(115, 175, 111, 0.02);
    border: 2px solid var(--border-color);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    text-align: center;
    transition: var(--transition);
    text-decoration: none;
    color: inherit;
  }

  .action-card:hover {
    transform: translateY(-4px);
    border-color: var(--primary-green);
    background: rgba(115, 175, 111, 0.05);
    text-decoration: none;
    color: inherit;
  }

  .action-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin: 0 auto 1rem;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .action-title {
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
  }

  .action-description {
    font-size: 0.9rem;
    color: var(--text-secondary);
    margin: 0;
  }

  /* Empty State */
  .empty-state-modern {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-secondary);
  }

  .empty-state-modern i {
    font-size: 4rem;
    margin-bottom: 1.5rem;
    opacity: 0.3;
    color: var(--primary-green);
  }

  .empty-state-modern h6 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
  }

  .empty-state-modern p {
    font-size: 0.9rem;
    margin: 0;
  }

  /* Badge Styles */
  .badge-modern {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .badge-modern.primary {
    background: rgba(115, 175, 111, 0.1);
    color: var(--primary-green);
  }

  .badge-modern.success {
    background: rgba(16, 185, 129, 0.1);
    color: #059669;
  }

  .badge-modern.warning {
    background: rgba(245, 158, 11, 0.1);
    color: #d97706;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .dashboard-header {
      padding: 2rem 1rem;
    }

    .header-title h1 {
      font-size: 2rem;
    }

    .stats-grid {
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }

    .content-grid {
      grid-template-columns: 1fr;
    }

    .actions-grid {
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
  }

  @media (max-width: 480px) {
    .header-title {
      flex-direction: column;
      gap: 0.5rem;
    }

    .header-title h1 {
      font-size: 1.75rem;
    }

    .stats-grid {
      grid-template-columns: 1fr;
    }

    .stat-value {
      font-size: 2.5rem;
    }

    .actions-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="main-dashboard">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <div class="header-content">
      <div class="header-title">
        <i class="fas fa-tachometer-alt"></i>
        <h1>Dashboard</h1>
      </div>
      <p class="header-subtitle">Welcome back, <?= esc($userName ?? 'User') ?> (<?= ucfirst($userRole ?? 'Guest') ?>)</p>
    </div>
  </div>

  <!-- Role-based Content -->
  <?php if (($userRole ?? '') === 'admin'): ?>
    <!-- Admin Stats Section -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-users"></i>
        </div>
        <span class="stat-value">
          <?php
            $userModel = new \App\Models\UserModel();
            echo $userModel->countAll();
          ?>
        </span>
        <div class="stat-label">Total Users</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <span class="stat-value">
          <?php
            $courseModel = new \App\Models\CourseModel();
            echo $courseModel->countAll();
          ?>
        </span>
        <div class="stat-label">Active Courses</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-user-check"></i>
        </div>
        <span class="stat-value">
          <?php
            $enrollmentModel = new \App\Models\EnrollmentModel();
            echo count($enrollmentModel->getEnrollmentsByStatus('active'));
          ?>
        </span>
        <div class="stat-label">Active Enrollments</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clock"></i>
        </div>
        <span class="stat-value">
          <?php
            echo count($enrollmentModel->getEnrollmentsByStatus('pending'));
          ?>
        </span>
        <div class="stat-label">Pending Requests</div>
      </div>
    </div>

    <!-- Admin Content Grid -->
    <div class="content-grid">
      <div class="content-card">
        <div class="card-header-modern">
          <h5>
            <i class="fas fa-user-plus"></i>
            Recent Users
          </h5>
        </div>
        <div class="card-container">
          <?php if (!empty($recentUsers ?? [])): ?>
            <div class="modern-list">
              <?php foreach (array_slice($recentUsers ?? [], 0, 5) as $user): ?>
                <div class="modern-list-item">
                  <div class="list-icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="list-content">
                    <div class="list-title"><?= esc($user['name']) ?></div>
                    <div class="list-subtitle"><?= esc($user['email']) ?> • <?= ucfirst(esc($user['role'])) ?></div>
                  </div>
                  <div class="list-meta">
                    <span class="badge-modern primary"><?= date('M d', strtotime($user['created_at'])) ?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-users"></i>
              <h6>No Users Yet</h6>
              <p>No users have been registered yet.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="content-card">
        <div class="card-header-modern">
          <h5>
            <i class="fas fa-book"></i>
            Recent Courses
          </h5>
        </div>
        <div class="card-container">
          <?php if (!empty($recentCourses ?? [])): ?>
            <div class="modern-list">
              <?php foreach (array_slice($recentCourses ?? [], 0, 5) as $course): ?>
                <div class="modern-list-item">
                  <div class="list-icon">
                    <i class="fas fa-graduation-cap"></i>
                  </div>
                  <div class="list-content">
                    <div class="list-title"><?= esc($course['course_number'] ?? '') ?></div>
                    <div class="list-subtitle"><?= esc($course['course_name'] ?? '') ?></div>
                  </div>
                  <div class="list-meta">
                    <span class="badge-modern success"><?= esc($course['units']) ?> units</span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-book"></i>
              <h6>No Courses Yet</h6>
              <p>No courses have been created yet.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>



  <?php elseif (($userRole ?? '') === 'teacher'): ?>
    <!-- Teacher Stats Section -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <span class="stat-value"><?= count($teacherCourses ?? []) ?></span>
        <div class="stat-label">My Courses</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-users"></i>
        </div>
        <span class="stat-value">
          <?php
            echo array_sum(array_column($teacherCourses ?? [], 'students'));
          ?>
        </span>
        <div class="stat-label">Total Students</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-file-alt"></i>
        </div>
        <span class="stat-value">
          <?php
            $materialModel = new \App\Models\MaterialModel();
            echo $materialModel->countAll();
          ?>
        </span>
        <div class="stat-label">Materials</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clipboard-list"></i>
        </div>
        <span class="stat-value">
          <?php
            $assignmentModel = new \App\Models\AssignmentModel();
            echo $assignmentModel->countAll();
          ?>
        </span>
        <div class="stat-label">Assignments</div>
      </div>
    </div>

    <!-- Teacher Content Grid -->
    <div class="content-grid">
      <div class="content-card">
        <div class="card-header-modern">
          <h5>
            <i class="fas fa-book"></i>
            My Courses
          </h5>
        </div>
        <div class="card-container">
          <?php if (!empty($teacherCourses ?? [])): ?>
            <div class="modern-list">
              <?php foreach (array_slice($teacherCourses ?? [], 0, 5) as $course): ?>
                <div class="modern-list-item">
                  <div class="list-icon">
                    <i class="fas fa-graduation-cap"></i>
                  </div>
                  <div class="list-content">
                    <div class="list-title"><?= esc($course['course_number'] ?? '') ?></div>
                    <div class="list-subtitle"><?= esc($course['course_name'] ?? '') ?></div>
                  </div>
                  <div class="list-meta">
                    <span class="badge-modern primary"><?= $course['students'] ?? 0 ?> students</span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="mt-3 text-center">
              <a href="<?= base_url('courses') ?>" class="action-button" style="font-size: 0.9rem; padding: 10px 20px;">
                <i class="fas fa-eye"></i>
                View All Courses
              </a>
            </div>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-book"></i>
              <h6>No Courses Yet</h6>
              <p>You haven't created any courses yet.</p>
              <a href="<?= base_url('courses/create') ?>" class="action-button" style="font-size: 0.9rem; padding: 10px 20px;">
                <i class="fas fa-plus"></i>
                Create Your First Course
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="content-card">
        <div class="card-header-modern">
          <h5>
            <i class="fas fa-file-alt"></i>
            Recent Materials
          </h5>
        </div>
        <div class="card-container">
          <?php if (!empty($recentMaterials ?? [])): ?>
            <div class="modern-list">
              <?php foreach (array_slice($recentMaterials ?? [], 0, 5) as $material): ?>
                <div class="modern-list-item">
                  <div class="list-icon">
                    <i class="fas fa-file"></i>
                  </div>
                  <div class="list-content">
                    <div class="list-title"><?= esc($material['file_name'] ?? '') ?></div>
                    <div class="list-subtitle">Course: <?= esc($material['course_code'] ?? '') ?></div>
                  </div>
                  <div class="list-meta">
                    <span class="badge-modern success"><?= date('M d', strtotime($material['created_at'] ?? 'now')) ?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-file-alt"></i>
              <h6>No Materials Yet</h6>
              <p>No materials have been uploaded yet.</p>
            </div>
          <?php endif; ?>
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
