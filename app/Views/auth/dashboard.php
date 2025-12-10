<?= $this->extend('template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  .dashboard-content {
    padding: 0;
  }

  .welcome-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 0;
    padding: 2rem;
    margin-bottom: 0;
    color: white;
    width: 100%;
  }

  .welcome-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: none;
  }

  .welcome-text h2 {
    margin: 0 0 0.5rem 0;
    font-size: 2rem;
    font-weight: 700;
    color: white;
  }

  .welcome-text p {
    margin: 0;
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.1rem;
  }

  .welcome-avatar {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    font-weight: 700;
    backdrop-filter: blur(10px);
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
  }

  .stat-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 1.25rem;
  }

  .stat-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
  }

  .stat-icon-wrapper {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    background: #6366f1;
    color: white;
  }

  .stat-icon-wrapper.success {
    background: #10b981;
  }

  .stat-icon-wrapper.info {
    background: #3b82f6;
  }

  .stat-icon-wrapper.warning {
    background: #f59e0b;
  }

  .stat-body h3 {
    margin: 0 0 0.25rem 0;
    font-size: 1.875rem;
    font-weight: 700;
    color: #111827;
  }

  .stat-body p {
    margin: 0;
    color: #6b7280;
    font-size: 0.875rem;
  }

  .content-card-modern {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    margin-bottom: 1.5rem;
  }

  .card-header-modern {
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .card-header-modern h5 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    color: #111827;
  }

  .card-header-modern .btn-modern {
    padding: 0.5rem 1rem;
    background: #6366f1;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 0.875rem;
    text-decoration: none;
  }

  .card-header-modern .btn-modern:hover {
    background: #4f46e5;
  }

  .table-modern {
    width: 100%;
    border-collapse: collapse;
  }

  .table-modern thead {
    background: #f9fafb;
  }

  .table-modern th {
    padding: 0.75rem 1rem;
    text-align: left;
    font-weight: 600;
    font-size: 0.875rem;
    color: #374151;
    border-bottom: 1px solid #e5e7eb;
  }

  .table-modern td {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #f3f4f6;
    color: #374151;
    font-size: 0.875rem;
  }

  .table-modern tbody tr:hover {
    background: #f9fafb;
  }

  .badge-modern {
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 500;
    display: inline-block;
  }

  .badge-modern.admin {
    background: #fee2e2;
    color: #991b1b;
  }

  .badge-modern.teacher {
    background: #dbeafe;
    color: #1e40af;
  }

  .badge-modern.student {
    background: #d1fae5;
    color: #065f46;
  }

  .badge-modern.enrolled,
  .badge-modern.active {
    background: #d1fae5;
    color: #065f46;
  }

  .badge-modern.pending {
    background: #fef3c7;
    color: #92400e;
  }

  .empty-state-modern {
    text-align: center;
    padding: 3rem;
    color: #6b7280;
  }

  .empty-state-modern i {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    opacity: 0.3;
  }

  .empty-state-modern h6 {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
  }

  .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 1.5rem;
  }

  .card-body {
    padding: 1.5rem;
  }

  .btn-action-modern {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s;
  }

  .btn-action-modern.primary {
    background: #6366f1;
    color: white;
  }

  .btn-action-modern.primary:hover {
    background: #4f46e5;
    color: white;
  }

  .btn-action-modern.outline {
    background: transparent;
    color: #6366f1;
    border: 1px solid #6366f1;
  }

  .btn-action-modern.outline:hover {
    background: #6366f1;
    color: white;
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
