<?= $this->extend('template') ?>

<?= $this->section('title') ?>My Courses<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Courses Dashboard Template with #73AF6F Theme */

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
    --radius-xl: 12px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Main Container */
  .courses-dashboard {
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
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
  }

  .header-title {
    display: flex;
    align-items: center;
    gap: 1rem;
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

  .header-actions {
    display: flex;
    gap: 1rem;
    align-items: center;
  }

  .btn-primary-green {
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
    backdrop-filter: blur(10px);
  }

  .btn-primary-green:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
  }

  /* Stats Cards */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  .stat-card {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    transition: var(--transition);
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
    background: linear-gradient(90deg, var(--primary-green), var(--primary-green-light));
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
  }

  .stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .stat-value {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary-green);
    margin-bottom: 0.5rem;
  }

  .stat-label {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  /* Content Grid */
  .content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
  }

  /* Main Content Card */
  .main-content-card {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
  }

  .content-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.5rem 2rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .content-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
  }

  .content-actions {
    display: flex;
    gap: 0.75rem;
    align-items: center;
  }

  .search-container {
    position: relative;
    flex: 1;
    max-width: 400px;
  }

  .search-input {
    width: 100%;
    padding: 10px 45px 10px 15px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.9rem;
    transition: var(--transition);
    background: white;
  }

  .search-input:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(115, 175, 111, 0.1);
  }

  .search-btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: var(--primary-green);
    border: none;
    color: white;
    padding: 6px 12px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: var(--transition);
  }

  .search-btn:hover {
    background: var(--primary-green-dark);
  }

  /* Course Cards Grid */
  .courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
  }

  .course-card-new {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: var(--transition);
    position: relative;
  }

  .course-card-new:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-hover);
  }

  .course-card-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.25rem 1.5rem;
    color: white;
    position: relative;
  }

  .course-code {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
  }

  .course-status {
    position: absolute;
    top: 1rem;
    right: 1rem;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .course-status.active {
    background: rgba(255, 255, 255, 0.2);
    color: white;
  }

  .course-status.pending {
    background: rgba(255, 255, 255, 0.3);
    color: white;
  }

  .course-card-body {
    padding: 1.5rem;
  }

  .course-info {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
  }

  .info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid rgba(115, 175, 111, 0.1);
  }

  .info-item:last-child {
    border-bottom: none;
  }

  .info-label {
    font-weight: 600;
    color: var(--text-secondary);
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .info-value {
    font-weight: 600;
    color: var(--text-primary);
  }

  .course-card-actions {
    display: flex;
    gap: 0.75rem;
  }

  .btn-course {
    flex: 1;
    padding: 10px 16px;
    border-radius: var(--radius-md);
    font-weight: 600;
    font-size: 0.85rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    transition: var(--transition);
    border: none;
    cursor: pointer;
  }

  .btn-course.primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .btn-course.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
  }

  .btn-course.secondary {
    background: rgba(115, 175, 111, 0.1);
    color: var(--primary-green);
    border: 1px solid var(--primary-green);
  }

  .btn-course.secondary:hover {
    background: var(--primary-green);
    color: white;
  }

  /* Sidebar Panel */
  .sidebar-panel {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    height: fit-content;
    sticky: top;
    top: 2rem;
  }

  .panel-section {
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
  }

  .panel-section:last-child {
    border-bottom: none;
  }

  .panel-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .panel-title i {
    color: var(--primary-green);
  }

  .quick-stats {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .quick-stat {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .quick-stat-icon {
    width: 35px;
    height: 35px;
    background: rgba(115, 175, 111, 0.1);
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-green);
    font-size: 1rem;
  }

  .quick-stat-info {
    flex: 1;
  }

  .quick-stat-value {
    font-weight: 700;
    color: var(--text-primary);
    font-size: 1.1rem;
  }

  .quick-stat-label {
    font-size: 0.8rem;
    color: var(--text-secondary);
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-secondary);
  }

  .empty-state i {
    font-size: 4rem;
    margin-bottom: 1.5rem;
    opacity: 0.3;
    color: var(--primary-green);
  }

  .empty-state h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
  }

  .empty-state p {
    font-size: 0.9rem;
    margin: 0;
  }

  /* Available Courses Table Styles */
  .available-courses-section {
    margin-top: 2rem;
  }

  .available-courses-card {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    margin-top: 2rem;
  }

  .available-courses-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.5rem 2rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .available-courses-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
  }

  .table-responsive {
    overflow-x: auto;
  }

  .table-modern {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
  }

  .table-modern thead {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    position: sticky;
    top: 0;
    z-index: 10;
  }

  .table-modern thead th {
    padding: 1.25rem;
    font-weight: 700;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: white;
    border: none;
    white-space: nowrap;
    box-shadow: 0 2px 8px rgba(115, 175, 111, 0.1);
  }

  .table-modern tbody tr {
    transition: var(--transition);
    border-bottom: 1px solid rgba(229, 231, 235, 0.3);
  }

  .table-modern tbody tr:hover {
    background: linear-gradient(135deg, rgba(115, 175, 111, 0.04) 0%, rgba(115, 175, 111, 0.04) 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.08);
  }

  .table-modern tbody td {
    padding: 1rem 1.25rem;
    color: var(--text-primary);
    vertical-align: middle;
    font-size: 0.9rem;
    font-weight: 500;
  }

  .table-modern tbody td:first-child {
    font-weight: 700;
    color: var(--primary-green);
  }

  .btn-action-modern {
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 0.8rem;
    border: none;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    white-space: nowrap;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .btn-action-modern.success {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: #fff;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .btn-action-modern.success:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(115, 175, 111, 0.4);
  }

  .btn-action-modern.success:active {
    transform: translateY(-1px);
  }

  /* Responsive Design */
  @media (max-width: 1024px) {
    .content-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    .sidebar-panel {
      order: -1;
    }
  }

  @media (max-width: 768px) {
    .dashboard-header {
      padding: 2rem 1rem;
    }

    .header-title h1 {
      font-size: 2rem;
    }

    .header-actions {
      flex-direction: column;
      width: 100%;
    }

    .btn-primary-green {
      width: 100%;
      justify-content: center;
    }

    .content-grid {
      padding: 0 1rem;
    }

    .courses-grid {
      grid-template-columns: 1fr;
      padding: 1rem;
    }

    .stats-grid {
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    .table-modern {
      font-size: 0.85rem;
    }

    .table-modern thead th,
    .table-modern tbody td {
      padding: 0.75rem 0.875rem;
    }
  }

  @media (max-width: 480px) {
    .header-title {
      flex-direction: column;
      text-align: center;
    }

    .header-title h1 {
      font-size: 1.75rem;
    }

    .stats-grid {
      grid-template-columns: 1fr;
    }

    .course-card-actions {
      flex-direction: column;
    }

    .btn-course {
      width: 100%;
    }
  }
</style>

<!-- Student Courses Dashboard -->
<div class="courses-dashboard">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <div class="header-content">
      <div class="header-title">
        <i class="fas fa-graduation-cap"></i>
        <h1>My Courses Dashboard</h1>
      </div>
      <div class="header-actions">
        <a href="#" class="btn-primary-green">
          <i class="fas fa-sync-alt"></i>
          Refresh
        </a>
      </div>
    </div>
  </div>

  <!-- Stats Section -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-book"></i>
      </div>
      <div class="stat-value">
        <?php
          $enrolledCourses = array_filter($enrollments ?? [], function($enrollment) {
            return in_array(strtolower($enrollment['status']), ['enrolled', 'active']);
          });
          echo count($enrolledCourses);
        ?>
      </div>
      <div class="stat-label">Enrolled Courses</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-clock"></i>
      </div>
      <div class="stat-value">
        <?php
          $pendingApplications = array_filter($enrollments ?? [], function($enrollment) {
            return strtolower($enrollment['status']) === 'pending';
          });
          echo count($pendingApplications);
        ?>
      </div>
      <div class="stat-label">Pending Approval</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-plus-circle"></i>
      </div>
      <div class="stat-value">
        <?php
          $availableCourses = $availableCourses ?? [];
          echo count($availableCourses);
        ?>
      </div>
      <div class="stat-label">Available Courses</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-calendar-check"></i>
      </div>
      <div class="stat-value">
        <?php
          $totalUnits = 0;
          foreach ($enrolledCourses as $course) {
            $totalUnits += (int)($course['units'] ?? 0);
          }
          echo $totalUnits;
        ?>
      </div>
      <div class="stat-label">Total Units</div>
    </div>
  </div>

  <!-- Main Content Grid -->
  <div class="content-grid">
    <!-- Main Content Area -->
    <div class="main-content-card">
      <div class="content-header">
        <div class="content-title">
          <i class="fas fa-graduation-cap"></i>
          My Enrolled Courses
        </div>
        <div class="content-actions">
          <div class="search-container">
            <input type="text" class="search-input" id="enrolled-course-search-input" placeholder="Search enrolled courses..." value="">
            <button class="search-btn" id="enrolled-search-btn">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="courses-grid">
        <?php
        $enrolledCourses = array_filter($enrollments ?? [], function($enrollment) {
          return in_array(strtolower($enrollment['status']), ['enrolled', 'active']);
        });
        $pendingApplications = array_filter($enrollments ?? [], function($enrollment) {
          return strtolower($enrollment['status']) === 'pending';
        });
        ?>

        <?php if (!empty($enrolledCourses)): ?>
          <?php foreach ($enrolledCourses as $enrollment): ?>
            <div class="course-card-new">
              <div class="course-card-header">
                <div class="course-code"><?= esc($enrollment['course_number']) ?></div>
                <div class="course-status active">Enrolled</div>
              </div>
              <div class="course-card-body">
                <div class="course-info">
                  <div class="info-item">
                    <span class="info-label">TEACHER</span>
                    <span class="info-value"><?= esc($enrollment['teacher_name'] ?? 'N/A') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">UNITS</span>
                    <span class="info-value"><?= esc($enrollment['units'] ?? '3') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">ACADEMIC YEAR</span>
                    <span class="info-value"><?= esc($enrollment['academic_year'] ?? 'N/A') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">SEMESTER</span>
                    <span class="info-value">
                      <?= esc($enrollment['semester'] ?? 'N/A') ?> - <?= esc($enrollment['term'] ?? 'N/A') ?>
                    </span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">SCHEDULE</span>
                    <span class="info-value">
                      <?php
                        $scheduleTime = $enrollment['schedule_time'] ?? '';
                        $scheduleDate = $enrollment['schedule_date'] ?? '';
                        if ($scheduleTime) {
                          echo esc(\App\Helpers\TimeHelper::to12HourFormat($scheduleTime));
                        } else {
                          echo 'N/A';
                        }
                        if ($scheduleDate) {
                          echo ' on ' . date('M d, Y', strtotime($scheduleDate));
                        }
                      ?>
                    </span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">DESCRIPTION</span>
                    <span class="info-value" title="<?= esc($enrollment['description'] ?? '') ?>">
                      <?= esc(substr($enrollment['description'] ?? 'No description', 0, 40)) ?><?= strlen($enrollment['description'] ?? '') > 40 ? '...' : '' ?>
                    </span>
                  </div>
                </div>
                <div class="course-card-actions">
                  <button class="btn-course primary view-materials-btn"
                          data-course-id="<?= esc($enrollment['course_id']) ?>"
                          data-course-name="<?= esc($enrollment['course_number']) ?>">
                    <i class="fas fa-eye"></i> View Materials
                  </button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($pendingApplications)): ?>
          <?php foreach ($pendingApplications as $enrollment): ?>
            <div class="course-card-new">
              <div class="course-card-header">
                <div class="course-code"><?= esc($enrollment['course_number']) ?></div>
                <div class="course-status pending">Pending</div>
              </div>
              <div class="course-card-body">
                <div class="course-info">
                  <div class="info-item">
                    <span class="info-label">TEACHER</span>
                    <span class="info-value"><?= esc($enrollment['teacher_name'] ?? 'N/A') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">UNITS</span>
                    <span class="info-value"><?= esc($enrollment['units'] ?? '3') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">ACADEMIC YEAR</span>
                    <span class="info-value"><?= esc($enrollment['academic_year'] ?? 'N/A') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">SEMESTER</span>
                    <span class="info-value">
                      <?= esc($enrollment['semester'] ?? 'N/A') ?> - <?= esc($enrollment['term'] ?? 'N/A') ?>
                    </span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">STATUS</span>
                    <span class="info-value">Waiting for teacher approval</span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">DESCRIPTION</span>
                    <span class="info-value" title="<?= esc($enrollment['description'] ?? '') ?>">
                      <?= esc(substr($enrollment['description'] ?? 'No description', 0, 40)) ?><?= strlen($enrollment['description'] ?? '') > 40 ? '...' : '' ?>
                    </span>
                  </div>
                </div>
                <div class="course-card-actions">
                  <span class="text-muted small">
                    <i class="fas fa-info-circle"></i> Application submitted
                  </span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>

        <?php if (empty($enrolledCourses) && empty($pendingApplications)): ?>
          <div class="empty-state">
            <i class="fas fa-book"></i>
            <h3>No Enrolled Courses</h3>
            <p>Browse available courses below to get started!</p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Sidebar Panel -->
    <div class="sidebar-panel">
      <!-- Quick Stats -->
      <div class="panel-section">
        <div class="panel-title">
          <i class="fas fa-chart-bar"></i>
          Quick Stats
        </div>
        <div class="quick-stats">
          <div class="quick-stat">
            <div class="quick-stat-icon">
              <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="quick-stat-info">
              <div class="quick-stat-value">
                <?php
                  $enrolledCourses = array_filter($enrollments ?? [], function($enrollment) {
                    return in_array(strtolower($enrollment['status']), ['enrolled', 'active']);
                  });
                  echo count($enrolledCourses);
                ?>
              </div>
              <div class="quick-stat-label">Enrolled Courses</div>
            </div>
          </div>
          <div class="quick-stat">
            <div class="quick-stat-icon">
              <i class="fas fa-clock"></i>
            </div>
            <div class="quick-stat-info">
              <div class="quick-stat-value">
                <?php
                  $pendingApplications = array_filter($enrollments ?? [], function($enrollment) {
                    return strtolower($enrollment['status']) === 'pending';
                  });
                  echo count($pendingApplications);
                ?>
              </div>
              <div class="quick-stat-label">Pending</div>
            </div>
          </div>
          <div class="quick-stat">
            <div class="quick-stat-icon">
              <i class="fas fa-plus-circle"></i>
            </div>
            <div class="quick-stat-info">
              <div class="quick-stat-value">
                <?php
                  $availableCourses = $availableCourses ?? [];
                  echo count($availableCourses);
                ?>
              </div>
              <div class="quick-stat-label">Available</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Available Courses Section -->
  <div class="available-courses-section">
    <div class="available-courses-card">
      <div class="available-courses-header">
        <div class="available-courses-title">
          <i class="fas fa-plus-circle"></i>
          Available Courses
        </div>
      </div>
      <div class="table-responsive">
        <?php if (!empty($availableCourses ?? [])): ?>
          <table class="table-modern table-complete-data">
            <thead>
              <tr>
                <th>Course Code</th>
                <th>Units</th>
                <th>Instructor</th>
                <th>Academic Year</th>
                <th>Semester</th>
                <th>Term</th>
                <th>Schedule Time</th>
                <th>Schedule Date</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($availableCourses as $course): ?>
                <tr>
                  <td>
                    <div><strong><?= esc($course['course_number'] ?? '') ?></strong></div>
                  </td>
                  <td><?= esc($course['units'] ?? '0') ?></td>
                  <td><?= esc($course['teacher_name'] ?? 'N/A') ?></td>
                  <td><?= esc($course['academic_year'] ?? 'N/A') ?></td>
                  <td><?= esc($course['semester'] ?? 'N/A') ?></td>
                  <td><?= esc($course['term'] ?? 'N/A') ?></td>
                  <td>
                    <?php
                      $scheduleTime = $course['schedule_time'] ?? '';
                      if ($scheduleTime) {
                        echo esc(\App\Helpers\TimeHelper::to12HourFormat($scheduleTime));
                      } else {
                        echo 'N/A';
                      }
                    ?>
                  </td>
                  <td>
                    <?php
                      $scheduleDate = $course['schedule_date'] ?? '';
                      if ($scheduleDate) {
                        echo date('M d, Y', strtotime($scheduleDate));
                      } else {
                        echo 'N/A';
                      }
                    ?>
                  </td>
                  <td>
                    <span title="<?= esc($course['description'] ?? '') ?>">
                      <?= esc(substr($course['description'] ?? '', 0, 30)) ?><?= strlen($course['description'] ?? '') > 30 ? '...' : '' ?>
                    </span>
                  </td>
                  <td>
                    <button class="btn-action-modern success enroll-btn"
                            data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                            data-course-name="<?= esc($course['course_number'] ?? '') ?>">
                      <i class="fas fa-plus"></i> Enroll
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="empty-state">
            <i class="fas fa-check-circle"></i>
            <h3>All Courses Enrolled</h3>
            <p>You're enrolled in all available courses!</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Alert Container -->
  <div id="alert-container"></div>
</div>

<!-- Materials Modal -->
<div class="materials-modal" id="materialsModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(8px); z-index: 1050; animation: fadeIn 0.3s ease;">
    <div class="materials-modal-content" style="background: #fff; border-radius: 24px; box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15); max-width: 600px; width: 90%; max-height: 80vh; overflow: hidden; animation: slideUp 0.4s ease;">
        <div class="materials-modal-header" style="background: var(--primary-gradient); padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; color: #fff;">
            <h5 class="materials-modal-title" id="materialsModalTitle" style="font-size: 1.25rem; font-weight: 700; margin: 0;">Course Materials</h5>
            <button class="materials-modal-close" id="materialsModalClose" style="background: rgba(255,255,255,0.2); border: none; color: #fff; font-size: 1.5rem; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="materials-modal-body" id="materialsModalBody" style="padding: 2rem; max-height: 60vh; overflow-y: auto;">
            <!-- Materials will be loaded here -->
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { transform: translateY(50px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('enrolled-course-search-input');
    const searchBtn = document.getElementById('enrolled-search-btn');

    // Function to perform search
    function performSearch() {
        const searchQuery = searchInput.value.trim();
        const currentUrl = new URL(window.location);

        if (searchQuery) {
            currentUrl.searchParams.set('search', searchQuery);
        } else {
            currentUrl.searchParams.delete('search');
        }

        // Reload the page with the search parameter
        window.location.href = currentUrl.toString();
    }

    // Handle search button click
    if (searchBtn) {
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            performSearch();
        });
    }

    // Handle Enter key press in search input
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                performSearch();
            }
        });

        // Set initial value from URL parameter if exists
        const urlParams = new URLSearchParams(window.location.search);
        const searchParam = urlParams.get('search');
        if (searchParam) {
            searchInput.value = searchParam;
        }
    }

    // Handle enrollment buttons
    const enrollButtons = document.querySelectorAll('.enroll-btn');
    enrollButtons.forEach(button => {
        button.addEventListener('click', function() {
            const courseId = this.getAttribute('data-course-id');
            const courseName = this.getAttribute('data-course-name');

            if (confirm(`Are you sure you want to enroll in ${courseName}?`)) {
                // Create a form to submit the enrollment request
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/student/enroll/${courseId}`;

                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                if (csrfToken) {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'csrf_token';
                    hiddenInput.value = csrfToken.getAttribute('content');
                    form.appendChild(hiddenInput);
                }

                document.body.appendChild(form);
                form.submit();
            }
        });
    });

    // Handle view materials buttons
    const viewMaterialsButtons = document.querySelectorAll('.view-materials-btn');
    viewMaterialsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const courseId = this.getAttribute('data-course-id');
            const courseName = this.getAttribute('data-course-name');

            // Show loading state
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            this.disabled = true;

            // Fetch materials via AJAX
            fetch(`/materials/get/${courseId}`)
                .then(response => response.json())
                .then(data => {
                    const modal = document.getElementById('materialsModal');
                    const modalTitle = document.getElementById('materialsModalTitle');
                    const modalBody = document.getElementById('materialsModalBody');

                    modalTitle.textContent = `Materials for ${courseName}`;
                    modalBody.innerHTML = '';

                    if (data.success && data.materials && data.materials.length > 0) {
                        const materialsList = document.createElement('div');
                        materialsList.className = 'materials-list';

                        data.materials.forEach(material => {
                            const materialItem = document.createElement('div');
                            materialItem.className = 'material-item';
                            materialItem.innerHTML = `
                                <div class="material-info">
                                    <h6>${material.title}</h6>
                                    <p>${material.description || 'No description'}</p>
                                    <small>Uploaded: ${new Date(material.created_at).toLocaleDateString()}</small>
                                </div>
                                <a href="/uploads/materials/${material.file_path}" class="btn btn-sm btn-primary" download>
                                    <i class="fas fa-download"></i> Download
                                </a>
                            `;
                            materialsList.appendChild(materialItem);
                        });

                        modalBody.appendChild(materialsList);
                    } else {
                        modalBody.innerHTML = '<p class="text-center text-muted">No materials available for this course.</p>';
                    }

                    modal.style.display = 'flex';

                    // Reset button state
                    this.innerHTML = '<i class="fas fa-eye"></i> View Materials';
                    this.disabled = false;
                })
                .catch(error => {
                    console.error('Error fetching materials:', error);
                    alert('Error loading materials. Please try again.');

                    // Reset button state
                    this.innerHTML = '<i class="fas fa-eye"></i> View Materials';
                    this.disabled = false;
                });
        });
    });

    // Handle modal close
    const modalClose = document.getElementById('materialsModalClose');
    if (modalClose) {
        modalClose.addEventListener('click', function() {
            document.getElementById('materialsModal').style.display = 'none';
        });
    }

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        const modal = document.getElementById('materialsModal');
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});
</script>

<?= $this->endSection() ?>
