<?= $this->extend('template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Modern Dashboard Styles -->
<style>
  .dashboard-modern {
    --primary-green: #73AF6F;
    --primary-green-light: #8bbf84;
    --primary-green-dark: #5a8f58;
    --bg-light: #f8fafc;
    --bg-card: rgba(255, 255, 255, 0.98);
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --border-color: rgba(115, 175, 111, 0.2);
    --shadow-light: 0 4px 12px rgba(115, 175, 111, 0.1);
    --shadow-hover: 0 8px 24px rgba(115, 175, 111, 0.15);
    --radius-md: 12px;
    --radius-lg: 16px;
  }

  .dashboard-header-modern {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    padding: 2.5rem 2rem;
    border-radius: var(--radius-lg);
    color: white;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
  }

  .dashboard-header-modern::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
  }

  .header-content-modern {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .header-title-modern {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .header-title-modern h1 {
    margin: 0;
    font-size: 2rem;
    font-weight: 800;
  }

  .header-title-modern p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
    font-size: 1rem;
  }

  .header-title-modern i {
    font-size: 2rem;
  }

  .btn-refresh {
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 10px 20px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
  }

  .btn-refresh:hover {
    background: rgba(255, 255, 255, 0.25);
    color: white;
    text-decoration: none;
  }

  .stats-grid-modern {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  .stat-card-modern {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .stat-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-green), var(--primary-green-light));
  }

  .stat-card-modern:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
  }

  .stat-icon-modern {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .stat-value-modern {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary-green);
    margin-bottom: 0.25rem;
  }

  .stat-label-modern {
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .content-card-modern {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    margin-bottom: 2rem;
  }

  .card-header-modern {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.25rem 1.5rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .card-header-modern h5 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .card-body-modern {
    padding: 1.5rem;
  }

  .list-item-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    border-bottom: 1px solid var(--border-color);
    transition: all 0.2s ease;
  }

  .list-item-modern:last-child {
    border-bottom: none;
  }

  .list-item-modern:hover {
    background: rgba(115, 175, 111, 0.05);
  }

  .item-info h6 {
    margin: 0 0 0.25rem 0;
    font-weight: 700;
    color: var(--text-primary);
  }

  .item-info small {
    color: var(--text-secondary);
  }

  .badge-modern {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .badge-modern.secondary {
    background: linear-gradient(135deg, #64748b 0%, #94a3b8 100%);
  }

  .empty-state-modern {
    text-align: center;
    padding: 3rem 2rem;
  }

  .empty-state-modern i {
    font-size: 3rem;
    color: var(--primary-green);
    opacity: 0.5;
    margin-bottom: 1rem;
  }

  .empty-state-modern h6 {
    color: var(--text-secondary);
    margin-bottom: 1rem;
  }

  .btn-action-modern {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    padding: 10px 24px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
  }

  .btn-action-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
    color: white;
    text-decoration: none;
  }

  .quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
  }

  .quick-action-btn {
    background: var(--bg-card);
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    padding: 1.5rem 1rem;
    text-align: center;
    text-decoration: none;
    color: var(--text-primary);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
  }

  .quick-action-btn:hover {
    border-color: var(--primary-green);
    background: rgba(115, 175, 111, 0.05);
    transform: translateY(-2px);
    text-decoration: none;
    color: var(--primary-green);
  }

  .quick-action-btn i {
    font-size: 1.75rem;
    color: var(--primary-green);
  }

  .quick-action-btn span {
    font-weight: 600;
    font-size: 0.9rem;
  }

  .cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  @media (max-width: 768px) {
    .cards-grid {
      grid-template-columns: 1fr;
    }
    .stats-grid-modern {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 480px) {
    .stats-grid-modern {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="container-fluid py-4 dashboard-modern">

  <!-- Role-based Content -->
  <?php if (($userRole ?? '') === 'admin'): ?>
    <!-- Admin Dashboard - Modern Green Theme -->
    <div class="dashboard-header-modern">
      <div class="header-content-modern">
        <div class="header-title-modern">
          <i class="fas fa-shield-alt"></i>
          <div>
            <h1>Admin Dashboard</h1>
            <p>Welcome back, <?= esc($userName ?? 'Admin') ?></p>
          </div>
        </div>
        <a href="<?= current_url() ?>" class="btn-refresh">
          <i class="fas fa-sync-alt"></i> Refresh
        </a>
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid-modern">
      <div class="stat-card-modern">
        <div class="stat-icon-modern">
          <i class="fas fa-users"></i>
        </div>
        <div class="stat-value-modern">
          <?php
            $userModel = new \App\Models\UserModel();
            echo $userModel->countAll();
          ?>
        </div>
        <div class="stat-label-modern">Total Users</div>
      </div>
      <div class="stat-card-modern">
        <div class="stat-icon-modern">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="stat-value-modern">
          <?php
            $courseModel = new \App\Models\CourseModel();
            echo $courseModel->countAll();
          ?>
        </div>
        <div class="stat-label-modern">Active Courses</div>
      </div>
      <div class="stat-card-modern">
        <div class="stat-icon-modern">
          <i class="fas fa-user-check"></i>
        </div>
        <div class="stat-value-modern">
          <?php
            $enrollmentModel = new \App\Models\EnrollmentModel();
            echo count($enrollmentModel->getEnrollmentsByStatus('active'));
          ?>
        </div>
        <div class="stat-label-modern">Active Enrollments</div>
      </div>
      <div class="stat-card-modern">
        <div class="stat-icon-modern">
          <i class="fas fa-bullhorn"></i>
        </div>
        <div class="stat-value-modern"><?= count($announcements ?? []) ?></div>
        <div class="stat-label-modern">Announcements</div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="content-card-modern" style="margin-bottom: 2rem;">
      <div class="card-header-modern">
        <h5><i class="fas fa-bolt"></i> Quick Actions</h5>
      </div>
      <div class="card-body-modern">
        <div class="quick-actions-grid">
          <a href="<?= base_url('/manageusers') ?>" class="quick-action-btn">
            <i class="fas fa-users"></i>
            <span>Manage Users</span>
          </a>
          <a href="<?= base_url('/programs') ?>" class="quick-action-btn">
            <i class="fas fa-layer-group"></i>
            <span>Manage Programs</span>
          </a>
          <a href="<?= base_url('/courses') ?>" class="quick-action-btn">
            <i class="fas fa-graduation-cap"></i>
            <span>Manage Courses</span>
          </a>
          <a href="<?= base_url('/announcements') ?>" class="quick-action-btn">
            <i class="fas fa-bullhorn"></i>
            <span>Announcements</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Content Cards Grid -->
    <div class="cards-grid">
      <!-- Recent Users Card -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-user-plus"></i> Recent Users</h5>
          <a href="<?= base_url('/manageusers') ?>" class="btn-refresh" style="padding: 8px 16px; font-size: 0.9rem;">
            View All
          </a>
        </div>
        <div class="card-body-modern">
          <?php if (!empty($recentUsers ?? [])): ?>
            <?php foreach (array_slice($recentUsers ?? [], 0, 5) as $user): ?>
              <div class="list-item-modern">
                <div class="item-info">
                  <h6><?= esc($user['name']) ?></h6>
                  <small><?= esc($user['email']) ?> • <?= ucfirst(esc($user['role'])) ?></small>
                </div>
                <span class="badge-modern secondary"><?= date('M d', strtotime($user['created_at'])) ?></span>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-users"></i>
              <h6>No users registered yet</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Recent Courses Card -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-book"></i> Recent Courses</h5>
          <a href="<?= base_url('/courses') ?>" class="btn-refresh" style="padding: 8px 16px; font-size: 0.9rem;">
            View All
          </a>
        </div>
        <div class="card-body-modern">
          <?php if (!empty($recentCourses ?? [])): ?>
            <?php foreach (array_slice($recentCourses ?? [], 0, 5) as $course): ?>
              <div class="list-item-modern">
                <div class="item-info">
                  <h6><?= esc($course['course_number'] ?? '') ?></h6>
                  <small><?= esc($course['course_name'] ?? '') ?></small>
                </div>
                <span class="badge-modern"><?= esc($course['units']) ?> units</span>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-book"></i>
              <h6>No courses created yet</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  <?php elseif (($userRole ?? '') === 'teacher'): ?>
    <!-- Teacher Dashboard - Modern Green Theme -->
    <div class="dashboard-header-modern">
      <div class="header-content-modern">
        <div class="header-title-modern">
          <i class="fas fa-chalkboard-teacher"></i>
          <div>
            <h1>Teacher Dashboard</h1>
            <p>Welcome back, <?= esc($userName ?? 'Teacher') ?></p>
          </div>
        </div>
        <a href="<?= current_url() ?>" class="btn-refresh">
          <i class="fas fa-sync-alt"></i> Refresh
        </a>
      </div>
    </div>

    <!-- Quick Actions (Moved to Top) -->
    <div class="content-card-modern" style="margin-bottom: 2rem;">
      <div class="card-header-modern">
        <h5><i class="fas fa-bolt"></i> Quick Actions</h5>
      </div>
      <div class="card-body-modern">
        <div class="quick-actions-grid">
          <a href="<?= base_url('programs') ?>" class="quick-action-btn">
            <i class="fas fa-layer-group"></i>
            <span>My Programs</span>
          </a>
          <a href="<?= base_url('courses') ?>" class="quick-action-btn">
            <i class="fas fa-graduation-cap"></i>
            <span>Manage Courses</span>
          </a>
          <a href="<?= base_url('assignments') ?>" class="quick-action-btn">
            <i class="fas fa-clipboard-list"></i>
            <span>Assignments</span>
          </a>
          <a href="<?= base_url('announcements') ?>" class="quick-action-btn">
            <i class="fas fa-bullhorn"></i>
            <span>Announcements</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid-modern">
      <div class="stat-card-modern">
        <div class="stat-icon-modern">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="stat-value-modern"><?= count($teacherCourses ?? []) ?></div>
        <div class="stat-label-modern">My Courses</div>
      </div>
      <div class="stat-card-modern">
        <div class="stat-icon-modern">
          <i class="fas fa-users"></i>
        </div>
        <div class="stat-value-modern">
          <?= array_sum(array_column($teacherCourses ?? [], 'students')) ?>
        </div>
        <div class="stat-label-modern">Total Students</div>
      </div>
      <div class="stat-card-modern">
        <div class="stat-icon-modern">
          <i class="fas fa-file-alt"></i>
        </div>
        <div class="stat-value-modern">
          <?php
            $materialModel = new \App\Models\MaterialModel();
            echo $materialModel->countAll();
          ?>
        </div>
        <div class="stat-label-modern">Materials</div>
      </div>
      <div class="stat-card-modern">
        <div class="stat-icon-modern">
          <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="stat-value-modern">
          <?php
            $assignmentModel = new \App\Models\AssignmentModel();
            echo $assignmentModel->countAll();
          ?>
        </div>
        <div class="stat-label-modern">Assignments</div>
      </div>
    </div>

    <!-- Content Cards Grid -->
    <div class="cards-grid">
      <!-- My Courses Card -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-book"></i> My Courses</h5>
          <a href="<?= base_url('courses') ?>" class="btn-refresh" style="padding: 8px 16px; font-size: 0.9rem;">
            View All
          </a>
        </div>
        <div class="card-body-modern">
          <?php if (!empty($teacherCourses ?? [])): ?>
            <?php foreach (array_slice($teacherCourses ?? [], 0, 5) as $course): ?>
              <div class="list-item-modern">
                <div class="item-info">
                  <h6><?= esc($course['course_number'] ?? '') ?></h6>
                  <small><?= esc($course['course_name'] ?? '') ?></small>
                </div>
                <span class="badge-modern"><?= $course['students'] ?? 0 ?> students</span>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-book"></i>
              <h6>No courses yet</h6>
              <a href="<?= base_url('courses/create') ?>" class="btn-action-modern">
                <i class="fas fa-plus"></i> Create Course
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Recent Materials Card -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-file-alt"></i> Recent Materials</h5>
        </div>
        <div class="card-body-modern">
          <?php if (!empty($recentMaterials ?? [])): ?>
            <?php foreach (array_slice($recentMaterials ?? [], 0, 5) as $material): ?>
              <div class="list-item-modern">
                <div class="item-info">
                  <h6><?= esc($material['file_name'] ?? '') ?></h6>
                  <small>Course: <?= esc($material['course_code'] ?? '') ?></small>
                </div>
                <span class="badge-modern secondary"><?= date('M d', strtotime($material['created_at'] ?? 'now')) ?></span>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-file-alt"></i>
              <h6>No materials uploaded yet</h6>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  <?php elseif (($userRole ?? '') === 'student'): ?>
    <!-- Student Dashboard - Modern Green Theme -->
    <style>
      .student-dashboard-modern {
        --primary-green: #73AF6F;
        --primary-green-light: #8bbf84;
        --primary-green-dark: #5a8f58;
        --bg-light: #f8fafc;
        --bg-card: rgba(255, 255, 255, 0.98);
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --border-color: rgba(115, 175, 111, 0.2);
        --shadow-light: 0 4px 12px rgba(115, 175, 111, 0.1);
        --shadow-hover: 0 8px 24px rgba(115, 175, 111, 0.15);
        --radius-md: 12px;
        --radius-lg: 16px;
      }

      .dashboard-header-modern {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
        padding: 2.5rem 2rem;
        border-radius: var(--radius-lg);
        color: white;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
      }

      .dashboard-header-modern::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
      }

      .header-content-modern {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
      }

      .header-title-modern {
        display: flex;
        align-items: center;
        gap: 1rem;
      }

      .header-title-modern h1 {
        margin: 0;
        font-size: 2rem;
        font-weight: 800;
      }

      .header-title-modern i {
        font-size: 2rem;
      }

      .btn-refresh {
        background: rgba(255, 255, 255, 0.15);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 10px 20px;
        border-radius: var(--radius-md);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
      }

      .btn-refresh:hover {
        background: rgba(255, 255, 255, 0.25);
        color: white;
        text-decoration: none;
      }

      .stats-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }

      .stat-card-modern {
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }

      .stat-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-green), var(--primary-green-light));
      }

      .stat-card-modern:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-hover);
      }

      .stat-icon-modern {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        margin-bottom: 1rem;
        box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
      }

      .stat-value-modern {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-green);
        margin-bottom: 0.25rem;
      }

      .stat-label-modern {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }

      .content-card-modern {
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-color);
        overflow: hidden;
        margin-bottom: 2rem;
      }

      .card-header-modern {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
        padding: 1.25rem 1.5rem;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
      }

      .card-header-modern h5 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      .card-body-modern {
        padding: 1.5rem;
      }

      .course-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        transition: all 0.2s ease;
      }

      .course-list-item:last-child {
        border-bottom: none;
      }

      .course-list-item:hover {
        background: rgba(115, 175, 111, 0.05);
      }

      .course-info h6 {
        margin: 0 0 0.25rem 0;
        font-weight: 700;
        color: var(--text-primary);
      }

      .course-info small {
        color: var(--text-secondary);
      }

      .badge-enrolled {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
      }

      .empty-state-modern {
        text-align: center;
        padding: 3rem 2rem;
      }

      .empty-state-modern i {
        font-size: 3rem;
        color: var(--primary-green);
        opacity: 0.5;
        margin-bottom: 1rem;
      }

      .empty-state-modern h6 {
        color: var(--text-secondary);
        margin-bottom: 1rem;
      }

      .btn-browse {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
        color: white;
        padding: 10px 24px;
        border-radius: var(--radius-md);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        border: none;
      }

      .btn-browse:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
        color: white;
        text-decoration: none;
      }

      .deadline-item {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
      }

      .deadline-item:last-child {
        border-bottom: none;
      }

      .deadline-info {
        flex: 1;
      }

      .deadline-info h6 {
        margin: 0 0 0.25rem 0;
        font-weight: 700;
        color: #d97706;
      }

      .deadline-warning {
        color: #d97706;
        font-size: 1.25rem;
      }
    </style>

    <div class="student-dashboard-modern">
      <!-- Dashboard Header -->
      <div class="dashboard-header-modern">
        <div class="header-content-modern">
          <div class="header-title-modern">
            <i class="fas fa-graduation-cap"></i>
            <h1>Dashboard</h1>
          </div>
          <a href="<?= current_url() ?>" class="btn-refresh">
            <i class="fas fa-sync-alt"></i> Refresh
          </a>
        </div>
      </div>

      <!-- Stats Grid -->
      <div class="stats-grid-modern">
        <div class="stat-card-modern">
          <div class="stat-icon-modern">
            <i class="fas fa-book-open"></i>
          </div>
          <div class="stat-value-modern"><?= count($enrolledCourses ?? []) + count($pendingCourses ?? []) ?></div>
          <div class="stat-label-modern">My Courses</div>
        </div>
        <div class="stat-card-modern">
          <div class="stat-icon-modern">
            <i class="fas fa-clipboard-list"></i>
          </div>
          <div class="stat-value-modern"><?= count($upcomingDeadlines ?? []) ?></div>
          <div class="stat-label-modern">Pending Tasks</div>
        </div>
        <div class="stat-card-modern">
          <div class="stat-icon-modern">
            <i class="fas fa-star"></i>
          </div>
          <div class="stat-value-modern">
            <?php
            if (!empty($recentGrades ?? [])) {
              $avg = array_sum(array_column($recentGrades, 'grade')) / count($recentGrades);
              echo number_format($avg, 1);
            } else {
              echo '—';
            }
            ?>
          </div>
          <div class="stat-label-modern">Average Grade</div>
        </div>
        <div class="stat-card-modern">
          <div class="stat-icon-modern">
            <i class="fas fa-bell"></i>
          </div>
          <div class="stat-value-modern"><?= count($announcements ?? []) ?></div>
          <div class="stat-label-modern">Announcements</div>
        </div>
      </div>

      <!-- My Courses Card -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-graduation-cap"></i> My Courses</h5>
          <a href="<?= base_url('courses') ?>" class="btn-refresh" style="padding: 8px 16px; font-size: 0.9rem;">
            Browse All
          </a>
        </div>
        <div class="card-body-modern">
          <?php 
            $allCourses = array_merge($enrolledCourses ?? [], $pendingCourses ?? []);
          ?>
          <?php if (!empty($allCourses)): ?>
            <?php foreach (array_slice($pendingCourses ?? [], 0, 5) as $course): ?>
              <div class="course-list-item" style="border-left: 3px solid #f59e0b;">
                <div class="course-info">
                  <h6><?= esc($course['course_number'] ?? '') ?></h6>
                  <small><?= esc($course['teacher_name'] ?? '') ?></small>
                </div>
                <span class="badge-pending" style="background: #f59e0b; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">Pending</span>
              </div>
            <?php endforeach; ?>
            <?php foreach (array_slice($enrolledCourses ?? [], 0, 5) as $course): ?>
              <div class="course-list-item">
                <div class="course-info">
                  <h6><?= esc($course['course_number'] ?? '') ?></h6>
                  <small><?= esc($course['teacher_name'] ?? '') ?></small>
                </div>
                <span class="badge-enrolled">Enrolled</span>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-graduation-cap"></i>
              <h6>No enrolled courses</h6>
              <a href="<?= base_url('courses') ?>" class="btn-browse">
                <i class="fas fa-search"></i> Browse Courses
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Upcoming Deadlines Card -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5><i class="fas fa-calendar-alt"></i> Upcoming Deadlines</h5>
        </div>
        <div class="card-body-modern">
          <?php if (!empty($upcomingDeadlines ?? [])): ?>
            <?php foreach (array_slice($upcomingDeadlines ?? [], 0, 5) as $deadline): ?>
              <div class="deadline-item">
                <div class="deadline-info">
                  <h6><?= esc($deadline['assignment'] ?? '') ?></h6>
                  <small class="text-muted">Course: <?= esc($deadline['course'] ?? '') ?> • Due: <?= date('M d, Y', strtotime($deadline['due_date'] ?? 'now')) ?></small>
                </div>
                <i class="fas fa-exclamation-triangle deadline-warning"></i>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-calendar-check"></i>
              <h6>No upcoming deadlines</h6>
              <p class="text-muted mb-0">You're all caught up!</p>
            </div>
          <?php endif; ?>
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
