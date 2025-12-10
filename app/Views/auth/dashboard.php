<?= $this->extend('template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Dashboard Container */
  .dashboard-content {
    padding: 0;
    background: linear-gradient(135deg, var(--gray-50) 0%, #f0f9ff 100%);
  }

  /* Welcome Card */
  .welcome-card {
    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    border: none;
    border-radius: 0;
    padding: 3rem 2rem;
    margin-bottom: 2rem;
    color: white;
    width: 100%;
    position: relative;
    overflow: hidden;
    box-shadow: 0 12px 24px rgba(14, 165, 233, 0.2);
  }

  .welcome-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: pulse-gradient 3s ease-in-out infinite;
  }

  @keyframes pulse-gradient {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(10px, 10px); }
  }

  .welcome-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: none;
    position: relative;
    z-index: 1;
  }

  .welcome-text h2 {
    margin: 0 0 0.5rem 0;
    font-size: 1.5rem;
    font-weight: 700;
    color: white;
    letter-spacing: -0.5px;
  }

  .welcome-text p {
    margin: 0;
    color: rgba(255, 255, 255, 0.95);
    font-size: 0.875rem;
    font-weight: 500;
  }

  .welcome-avatar {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
    border: 3px solid rgba(255, 255, 255, 0.4);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: white;
    font-weight: 800;
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  /* Stats Grid */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
    margin-top: 2rem;
  }

  .stat-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(249, 250, 251, 0.95) 100%);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(229, 231, 235, 0.5);
    border-radius: 16px;
    padding: 1.75rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
  }

  .stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
  }

  .stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 32px rgba(0, 0, 0, 0.1);
  }

  .stat-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
  }

  .stat-icon-wrapper {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.1) 0%, rgba(6, 182, 212, 0.1) 100%);
    color: #0ea5e9;
  }

  .stat-icon-wrapper.success {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
    color: #10b981;
  }

  .stat-icon-wrapper.info {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%);
    color: #3b82f6;
  }

  .stat-icon-wrapper.warning {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.1) 100%);
    color: #f59e0b;
  }

  .stat-body h3 {
    margin: 0 0 0.5rem 0;
    font-size: 2.25rem;
    font-weight: 800;
    color: var(--gray-900);
    letter-spacing: -0.5px;
  }

  .stat-body p {
    margin: 0;
    color: var(--gray-500);
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  /* Content Cards */
  .content-card-modern {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(249, 250, 251, 0.95) 100%);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(229, 231, 235, 0.5);
    border-radius: 16px;
    margin-bottom: 1.5rem;
    overflow: hidden;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .content-card-modern:hover {
    box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
  }

  .card-header-modern {
    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    border-bottom: none;
    padding: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 12px rgba(14, 165, 233, 0.15);
  }

  .card-header-modern h5 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 800;
    color: white;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    letter-spacing: -0.5px;
  }

  .card-header-modern .btn-modern {
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .card-header-modern .btn-modern:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
  }

  /* Modern Table */
  .table-modern {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin: 0;
  }

  .table-modern thead {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  }

  .table-modern thead th {
    padding: 1.25rem;
    text-align: left;
    font-weight: 700;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #0ea5e9;
    border-bottom: 2px solid rgba(14, 165, 233, 0.2);
  }

  .table-modern tbody td {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid rgba(229, 231, 235, 0.3);
    color: var(--gray-700);
    font-size: 0.9rem;
    font-weight: 500;
  }

  .table-modern tbody tr {
    transition: all 0.3s ease;
  }

  .table-modern tbody tr:hover {
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.04) 0%, rgba(6, 182, 212, 0.04) 100%);
  }

  .table-modern tbody tr:last-child td {
    border-bottom: none;
  }

  /* Badges */
  .badge-modern {
    padding: 8px 14px;
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
    border: 1px solid transparent;
  }

  .badge-modern.admin {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(244, 63, 94, 0.1) 100%);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
  }

  .badge-modern.teacher {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%);
    color: #3b82f6;
    border: 1px solid rgba(59, 130, 246, 0.3);
  }

  .badge-modern.student {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
    color: #10b981;
    border: 1px solid rgba(16, 185, 129, 0.3);
  }

  .badge-modern.enrolled,
  .badge-modern.active {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
    color: #10b981;
    border: 1px solid rgba(16, 185, 129, 0.3);
  }

  .badge-modern.pending {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.1) 100%);
    color: #f59e0b;
    border: 1px solid rgba(245, 158, 11, 0.3);
  }

  .empty-state-modern {
    text-align: center;
    padding: 3rem 2rem;
    color: var(--gray-500);
  }

  .empty-state-modern i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.2;
    color: var(--primary);
  }

  .empty-state-modern h6 {
    font-weight: 700;
    color: var(--gray-600);
    margin-bottom: 0.5rem;
  }

  .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  .card-body {
    padding: 1.5rem;
  }

  .btn-action-modern {
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .btn-action-modern.primary {
    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
  }

  .btn-action-modern.primary:hover {
    background: linear-gradient(135deg, #0284c7 0%, #0891b2 100%);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
  }

  .btn-action-modern.outline {
    background: transparent;
    color: #0ea5e9;
    border: 1.5px solid #0ea5e9;
  }

  .btn-action-modern.outline:hover {
    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    color: white;
    border-color: transparent;
    transform: translateY(-3px);
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .welcome-content {
      flex-direction: column;
      text-align: center;
      gap: 1.5rem;
    }

    .welcome-text h2 {
      font-size: 1.75rem;
    }

    .stats-grid {
      grid-template-columns: 1fr;
      gap: 1rem;
    }

    .dashboard-grid {
      grid-template-columns: 1fr;
    }

    .table-modern thead th,
    .table-modern tbody td {
      padding: 0.75rem;
      font-size: 0.8rem;
    }
  }
</style>


<div class="dashboard-content">
  <!-- Welcome Card -->
  <div class="welcome-card">
    <div class="welcome-content">
      <div class="welcome-text">
        <h2>Welcome back, <?= esc($userName ?? 'User') ?>! 👋</h2>
        <p><strong><?= ucfirst($userRole ?? 'Guest') ?></strong> • <?= esc($userEmail ?? 'N/A') ?></p>
      </div>
      <div class="welcome-avatar">
        <?= strtoupper(substr($userName ?? 'U', 0, 1)) ?>
      </div>
    </div>
  </div>

  <!-- Role-based Content -->
  <?php if (($userRole ?? '') === 'admin'): ?>
    <!-- Admin Dashboard -->
    
    <!-- Statistics Cards -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper">
            <i class="fas fa-users"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= $totalUsers ?? 0 ?></h3>
          <p>Total Users</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper success">
            <i class="fas fa-graduation-cap"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= $totalCourses ?? 0 ?></h3>
          <p>Total Courses</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper info">
            <i class="fas fa-user-check"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= $activeEnrollments ?? 0 ?></h3>
          <p>Active Enrollments</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper warning">
            <i class="fas fa-clock"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= $pendingEnrollments ?? 0 ?></h3>
          <p>Pending Enrollments</p>
        </div>
      </div>
    </div>

    <!-- Detailed Statistics -->
    <div class="dashboard-grid" style="margin-top: 1rem;">
      <!-- Users Breakdown -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-users"></i> Users Overview</h5>
        </div>
        <div class="card-body" style="padding: 1.5rem;">
          <div class="stats-grid" style="grid-template-columns: repeat(3, 1fr); gap: 1rem; margin: 0;">
            <div style="text-align: center; padding: 1rem; background: #f8fafc; border-radius: 8px;">
              <h3 style="margin: 0; color: #dc2626; font-size: 1.5rem;"><?= $totalAdmins ?? 0 ?></h3>
              <p style="margin: 0.5rem 0 0; color: #6b7280; font-size: 0.875rem;">Admins</p>
            </div>
            <div style="text-align: center; padding: 1rem; background: #f8fafc; border-radius: 8px;">
              <h3 style="margin: 0; color: #2563eb; font-size: 1.5rem;"><?= $totalTeachers ?? 0 ?></h3>
              <p style="margin: 0.5rem 0 0; color: #6b7280; font-size: 0.875rem;">Teachers</p>
            </div>
            <div style="text-align: center; padding: 1rem; background: #f8fafc; border-radius: 8px;">
              <h3 style="margin: 0; color: #059669; font-size: 1.5rem;"><?= $totalStudents ?? 0 ?></h3>
              <p style="margin: 0.5rem 0 0; color: #6b7280; font-size: 0.875rem;">Students</p>
            </div>
          </div>
        </div>
      </div>

      <!-- System Overview -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-chart-bar"></i> System Overview</h5>
        </div>
        <div class="card-body" style="padding: 1.5rem;">
          <div style="display: grid; gap: 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: #f8fafc; border-radius: 6px;">
              <span style="color: #6b7280;">Announcements</span>
              <strong style="color: #111827;"><?= $totalAnnouncements ?? 0 ?></strong>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: #f8fafc; border-radius: 6px;">
              <span style="color: #6b7280;">Materials</span>
              <strong style="color: #111827;"><?= $totalMaterials ?? 0 ?></strong>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: #f8fafc; border-radius: 6px;">
              <span style="color: #6b7280;">Total Enrollments</span>
              <strong style="color: #111827;"><?= $totalEnrollments ?? 0 ?></strong>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Activity -->
    <div class="dashboard-grid" style="margin-top: 1rem;">
      <!-- Recent Users -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-user-plus"></i> Recent Users</h5>
          <a href="<?= base_url('manage-users') ?>" class="btn-modern">View All</a>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($recentUsers)): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Joined</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentUsers as $recentUser): ?>
                  <tr>
                    <td><?= esc($recentUser['name']) ?></td>
                    <td><?= esc($recentUser['email']) ?></td>
                    <td><span class="badge-modern <?= esc($recentUser['role']) ?>"><?= ucfirst(esc($recentUser['role'])) ?></span></td>
                    <td><?= date('M d, Y', strtotime($recentUser['created_at'])) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-users"></i>
              <h6>No users yet</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Recent Courses -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-book"></i> Recent Courses</h5>
          <a href="<?= base_url('courses') ?>" class="btn-modern">View All</a>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($recentCourses)): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Course Name</th>
                  <th>Units</th>
                  <th>Created</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentCourses as $course): ?>
                  <tr>
                    <td><strong><?= esc($course['course_number'] ?? '') ?></strong></td>
                    <td><?= esc($course['units']) ?></td>
                    <td><?= date('M d, Y', strtotime($course['created_at'])) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-book"></i>
              <h6>No courses yet</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Recent Enrollments -->
    <div class="content-card-modern" style="margin-top: 1rem;">
      <div class="card-header-modern">
        <h5><i class="fas fa-user-check"></i> Recent Enrollments</h5>
      </div>
      <div class="card-body" style="padding: 0;">
        <?php if (!empty($recentEnrollments)): ?>
          <table class="table-modern">
            <thead>
              <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($recentEnrollments as $enrollment): ?>
                <tr>
                  <td><?= esc($enrollment['user_name'] ?? 'N/A') ?> <small style="color: #6b7280;">(<?= ucfirst(esc($enrollment['user_role'] ?? 'N/A')) ?>)</small></td>
                  <td><strong><?= esc($enrollment['course_number'] ?? 'N/A') ?></strong></td>
                  <td><span class="badge-modern <?= esc($enrollment['status']) ?>"><?= ucfirst(esc($enrollment['status'])) ?></span></td>
                  <td><?= date('M d, Y', strtotime($enrollment['created_at'])) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="empty-state-modern">
            <i class="fas fa-user-check"></i>
            <h6>No enrollments yet</h6>
          </div>
        <?php endif; ?>
      </div>
    </div>

  <?php elseif (($userRole ?? '') === 'teacher'): ?>
    <!-- Teacher Dashboard -->

    <!-- Stats Cards -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper">
            <i class="fas fa-book"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= count($teacherCourses ?? []) ?></h3>
          <p>My Courses</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper success">
            <i class="fas fa-users"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= array_sum(array_column($teacherCourses ?? [], 'students')) ?></h3>
          <p>Total Students</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper info">
            <i class="fas fa-file-alt"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= $totalMaterials ?? 0 ?></h3>
          <p>Materials Uploaded</p>
        </div>
      </div>
    </div>

    <!-- Teacher Dashboard Content -->
    <div class="dashboard-grid">
      <!-- My Courses -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-book"></i> My Courses</h5>
          <a href="<?= base_url('courses') ?>" class="btn-modern">View All</a>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($teacherCourses ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Course Name</th>
                  <th>Students</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach (array_slice($teacherCourses ?? [], 0, 5) as $course): ?>
                  <tr>
                    <td><strong><?= esc($course['course_number'] ?? '') ?></strong></td>
                    <td><?= $course['students'] ?? 0 ?></td>
                    <td><span class="badge-modern active">Active</span></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-book"></i>
              <h6>No courses yet</h6>
              <p>Create your first course to get started!</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Recent Materials -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-file-alt"></i> Recent Materials</h5>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($recentMaterials ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>File Name</th>
                  <th>Course</th>
                  <th>Uploaded</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentMaterials as $material): ?>
                  <tr>
                    <td><?= esc($material['file_name'] ?? '') ?></td>
                    <td><small><?= esc($material['course_code'] ?? '') ?></small></td>
                    <td><small><?= date('M d, Y', strtotime($material['created_at'] ?? 'now')) ?></small></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-file-alt"></i>
              <h6>No materials uploaded</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Recent Announcements & Enrollments -->
    <div class="dashboard-grid" style="margin-top: 1rem;">
      <!-- Recent Announcements -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-bullhorn"></i> Recent Announcements</h5>
          <a href="<?= base_url('announcements') ?>" class="btn-modern">View All</a>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($recentAnnouncements ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentAnnouncements as $announcement): ?>
                  <tr>
                    <td><?= esc($announcement['title'] ?? '') ?></td>
                    <td><small><?= date('M d, Y', strtotime($announcement['created_at'] ?? 'now')) ?></small></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-bullhorn"></i>
              <h6>No announcements</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Recent Enrollments -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-user-plus"></i> Recent Enrollments</h5>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($recentEnrollments ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Student</th>
                  <th>Course</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentEnrollments as $enrollment): ?>
                  <tr>
                    <td><?= esc($enrollment['student_name'] ?? 'N/A') ?></td>
                    <td><small><?= esc($enrollment['course_number'] ?? '') ?></small></td>
                    <td><small><?= date('M d, Y', strtotime($enrollment['created_at'] ?? 'now')) ?></small></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-user-plus"></i>
              <h6>No recent enrollments</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

      <!-- Quick Actions -->
      <div class="content-card-modern" style="margin-top: 1rem;">
        <div class="card-header-modern">
          <h5><i class="fas fa-bolt"></i> Quick Actions</h5>
        </div>
        <div class="card-body" style="padding: 1.5rem;">
          <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="<?= base_url('courses') ?>" class="btn-modern" style="text-decoration: none;">
              <i class="fas fa-book"></i> Manage Courses
            </a>
            <a href="<?= base_url('courses/create') ?>" class="btn-modern" style="text-decoration: none;">
              <i class="fas fa-plus"></i> Create Course
            </a>
            <a href="<?= base_url('announcements/create') ?>" class="btn-modern" style="text-decoration: none;">
              <i class="fas fa-bullhorn"></i> Create Announcement
            </a>
            <?php if (!empty($teacherCourses)): ?>
              <a href="<?= base_url('admin/course/' . $teacherCourses[0]['course_id'] . '/upload') ?>" class="btn-modern" style="text-decoration: none;">
                <i class="fas fa-upload"></i> Upload Material
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

  <?php elseif (($userRole ?? '') === 'student'): ?>
    <!-- Student Dashboard -->

    <!-- Stats Cards -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper">
            <i class="fas fa-graduation-cap"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= count($enrolledCourses ?? []) ?></h3>
          <p>Enrolled Courses</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper warning">
            <i class="fas fa-clipboard-list"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= count($upcomingDeadlines ?? []) ?></h3>
          <p>Pending Tasks</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper success">
            <i class="fas fa-star"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3>
            <?php
            if (!empty($recentGrades ?? [])) {
              $avg = array_sum(array_column($recentGrades, 'grade')) / count($recentGrades);
              echo number_format($avg, 1);
            } else {
              echo 'N/A';
            }
            ?>
          </h3>
          <p>Average Grade</p>
        </div>
      </div>
    </div>

    <!-- Student Dashboard Content -->
    <div class="dashboard-grid">
      <!-- Enrolled Courses -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-graduation-cap"></i> My Enrolled Courses</h5>
          <a href="<?= base_url('courses') ?>" class="btn-modern">View All</a>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($enrolledCourses ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Course Name</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach (array_slice($enrolledCourses, 0, 5) as $course): ?>
                  <tr>
                    <td><strong><?= esc($course['course_number'] ?? '') ?></strong></td>
                    <td><span class="badge-modern enrolled">Enrolled</span></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-graduation-cap"></i>
              <h6>No enrolled courses</h6>
              <p>Browse available courses to get started!</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Recent Materials -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-file-alt"></i> Recent Materials</h5>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($recentMaterials ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>File Name</th>
                  <th>Course</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentMaterials as $material): ?>
                  <tr>
                    <td><?= esc($material['file_name'] ?? '') ?></td>
                    <td><small><?= esc($material['course_code'] ?? '') ?></small></td>
                    <td><small><?= date('M d, Y', strtotime($material['created_at'] ?? 'now')) ?></small></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-file-alt"></i>
              <h6>No materials available</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Recent Announcements & Upcoming Deadlines -->
    <div class="dashboard-grid" style="margin-top: 1rem;">
      <!-- Recent Announcements -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-bullhorn"></i> Recent Announcements</h5>
          <a href="<?= base_url('announcements') ?>" class="btn-modern">View All</a>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($recentAnnouncements ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentAnnouncements as $announcement): ?>
                  <tr>
                    <td><?= esc($announcement['title'] ?? '') ?></td>
                    <td><small><?= date('M d, Y', strtotime($announcement['created_at'] ?? 'now')) ?></small></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-bullhorn"></i>
              <h6>No announcements</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Upcoming Deadlines -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-calendar-alt"></i> Upcoming Deadlines</h5>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($upcomingDeadlines ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>Assignment</th>
                  <th>Due Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($upcomingDeadlines as $deadline): ?>
                  <tr>
                    <td><?= esc($deadline['course'] ?? '') ?></td>
                    <td><?= esc($deadline['assignment'] ?? '') ?></td>
                    <td><small><?= date('M d, Y', strtotime($deadline['due_date'] ?? 'now')) ?></small></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-calendar-alt"></i>
              <h6>No upcoming deadlines</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Recent Grades & Quick Actions -->
    <div class="dashboard-grid" style="margin-top: 1rem;">
      <!-- Recent Grades -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-star"></i> Recent Grades</h5>
        </div>
        <div class="card-body" style="padding: 0;">
          <?php if (!empty($recentGrades ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>Assignment</th>
                  <th>Grade</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentGrades as $grade): ?>
                  <tr>
                    <td><?= esc($grade['course'] ?? '') ?></td>
                    <td><?= esc($grade['assignment'] ?? '') ?></td>
                    <td><strong><?= esc($grade['grade'] ?? '') ?>%</strong></td>
                    <td><small><?= date('M d, Y', strtotime($grade['date'] ?? 'now')) ?></small></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-star"></i>
              <h6>No grades yet</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-bolt"></i> Quick Actions</h5>
        </div>
        <div class="card-body" style="padding: 1.5rem;">
          <div style="display: flex; flex-direction: column; gap: 0.75rem;">
            <a href="<?= base_url('courses') ?>" class="btn-modern" style="text-decoration: none; text-align: center;">
              <i class="fas fa-book"></i> Browse Courses
            </a>
            <a href="<?= base_url('announcements') ?>" class="btn-modern" style="text-decoration: none; text-align: center;">
              <i class="fas fa-bullhorn"></i> View Announcements
            </a>
          </div>
        </div>
      </div>
    </div>

  <?php else: ?>
    <!-- Unknown Role -->
    <div class="content-card-modern">
      <div class="empty-state-modern">
        <i class="fas fa-exclamation-triangle"></i>
        <h6>Role Not Recognized</h6>
        <p>Please contact the administrator to resolve this issue.</p>
      </div>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
