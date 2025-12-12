<?= $this->extend('template') ?>

<?= $this->section('title') ?>Teacher Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Teacher Dashboard Template with #73AF6F Theme */

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
  .teacher-dashboard {
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

  .btn-secondary-green {
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.2);
    color: white;
    padding: 12px 20px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: var(--transition);
  }

  .btn-secondary-green:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
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

  .btn-course.danger {
    background: rgba(239, 68, 68, 0.1);
    color: #dc2626;
    border: 1px solid #dc2626;
  }

  .btn-course.danger:hover {
    background: #dc2626;
    color: white;
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

  /* Responsive Design */
  @media (max-width: 1024px) {
    .content-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
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

    .btn-primary-green,
    .btn-secondary-green {
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

<div class="teacher-dashboard">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <div class="header-content">
      <div class="header-title">
        <i class="fas fa-chalkboard-teacher"></i>
        <h1>Teacher Dashboard</h1>
      </div>
      <div class="header-actions">
        <a href="<?= base_url('courses/create') ?>" class="btn-primary-green">
          <i class="fas fa-plus"></i>
          Add Course
        </a>
        <a href="#" class="btn-secondary-green">
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
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div class="stat-value">
        <?php
          // Get teacher's course count
          $courseModel = new \App\Models\CourseModel();
          $teacherCourses = $courseModel->where('teacher_id', session()->get('user_id'))->findAll();
          echo count($teacherCourses);
        ?>
      </div>
      <div class="stat-label">My Courses</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-users"></i>
      </div>
      <div class="stat-value">
        <?php
          // Get total enrolled students across all teacher's courses
          $enrollmentModel = new \App\Models\EnrollmentModel();
          $totalStudents = 0;
          foreach ($teacherCourses as $course) {
            $enrollments = $enrollmentModel->where('course_id', $course['course_id'])->findAll();
            $totalStudents += count($enrollments);
          }
          echo $totalStudents;
        ?>
      </div>
      <div class="stat-label">Total Students</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-file-alt"></i>
      </div>
      <div class="stat-value">
        <?php
          // Get materials count
          $materialModel = new \App\Models\MaterialModel();
          echo $materialModel->countAll();
        ?>
      </div>
      <div class="stat-label">Materials</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-clipboard-list"></i>
      </div>
      <div class="stat-value">
        <?php
          // Get assignments count
          $assignmentModel = new \App\Models\AssignmentModel();
          echo $assignmentModel->countAll();
        ?>
      </div>
      <div class="stat-label">Assignments</div>
    </div>
  </div>

  <!-- Content Grid -->
  <div class="content-grid">
    <!-- Pending Enrollments Section -->
    <div class="main-content-card" id="pending-enrollments-card" style="display: none;">
      <div class="content-header">
        <div class="content-title">
          <i class="fas fa-clock"></i>
          Pending Enrollment Applications
          <span class="badge badge-warning ml-2" id="pending-count">0</span>
        </div>
        <div class="content-actions">
          <button class="btn-course secondary" onclick="refreshPendingEnrollments()">
            <i class="fas fa-sync-alt"></i> Refresh
          </button>
        </div>
      </div>

      <div class="pending-enrollments-content" style="padding: 2rem;">
        <div id="pending-enrollments-list">
          <!-- Pending enrollments will be loaded here -->
        </div>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content-card">
      <div class="content-header">
        <div class="content-title">
          <i class="fas fa-graduation-cap"></i>
          My Courses
        </div>
        <div class="content-actions">
          <div class="search-container">
            <input type="text" class="search-input" id="course-search-input" placeholder="Search courses..." value="">
            <button class="search-btn" id="search-btn">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="courses-grid">
        <!-- Course Cards for Teacher -->
        <?php if (!empty($teacherCourses)): ?>
          <?php foreach ($teacherCourses as $course): ?>
            <div class="course-card-new">
              <div class="course-card-header">
                <div class="course-code"><?= esc($course['course_number'] ?? '') ?></div>
                <div class="course-status <?php
                  $status = $course['status'] ?? 'pending';
                  echo $status === 'active' ? 'active' : 'pending';
                ?>">
                  <?php
                    if ($status === 'active') {
                      echo 'Active';
                    } else {
                      echo 'Pending';
                    }
                  ?>
                </div>
              </div>
              <div class="course-card-body">
                <div class="course-info">
                  <div class="info-item">
                    <span class="info-label">UNITS</span>
                    <span class="info-value"><?= esc($course['units'] ?? '3') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">ACADEMIC YEAR</span>
                    <span class="info-value"><?= esc($course['academic_year'] ?? 'N/A') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">SEMESTER</span>
                    <span class="info-value"><?= esc($course['semester'] ?? 'N/A') ?> - <?= esc($course['term'] ?? 'N/A') ?></span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">SCHEDULE</span>
                    <span class="info-value">
                      <?php
                        $scheduleTime = $course['schedule_time'] ?? '';
                        $scheduleDate = $course['schedule_date'] ?? '';
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
                    <span class="info-value" title="<?= esc($course['description'] ?? '') ?>">
                      <?= esc(substr($course['description'] ?? 'No description', 0, 40)) ?><?= strlen($course['description'] ?? '') > 40 ? '...' : '' ?>
                    </span>
                  </div>
                </div>
                <div class="course-card-actions">
                  <button class="btn-course primary" onclick="window.location.href='<?= base_url('admin/course/') ?><?= esc($course['course_id'] ?? '') ?>/upload'">
                    <i class="fas fa-eye"></i> Manage
                  </button>
                  <?php if (($course['status'] ?? 'active') === 'pending'): ?>
                    <button class="btn-course success activate-course-btn"
                            data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                            data-course-name="<?= esc($course['course_number'] ?? '') ?>">
                      <i class="fas fa-play"></i> Activate
                    </button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="empty-state">
            <i class="fas fa-book"></i>
            <h3>No Courses Yet</h3>
            <p>Start by creating your first course!</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

<!-- Alert Container -->
  <div id="teacher-alert-container"></div>
</div>

<!-- Enrollment Application Modal -->
<div class="enrollment-modal" id="enrollmentModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(8px); z-index: 1050; animation: fadeIn 0.3s ease;">
    <div class="enrollment-modal-content" style="background: #fff; border-radius: 24px; box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15); max-width: 500px; width: 90%; max-height: 80vh; overflow: hidden; animation: slideUp 0.4s ease;">
        <div class="enrollment-modal-header" style="background: var(--primary-gradient); padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; color: #fff;">
            <h5 class="enrollment-modal-title" id="enrollmentModalTitle" style="font-size: 1.25rem; font-weight: 700; margin: 0;">Process Enrollment Application</h5>
            <button class="enrollment-modal-close" id="enrollmentModalClose" style="background: rgba(255,255,255,0.2); border: none; color: #fff; font-size: 1.5rem; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="enrollment-modal-body" id="enrollmentModalBody" style="padding: 2rem;">
            <!-- Enrollment details will be loaded here -->
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

.pending-enrollment-card {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    padding: 1.5rem;
    margin-bottom: 1rem;
    transition: var(--transition);
}

.pending-enrollment-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
}

.pending-enrollment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.pending-enrollment-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.pending-enrollment-actions {
    display: flex;
    gap: 0.75rem;
    justify-content: flex-end;
}

.btn-approve {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.btn-approve:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.btn-reject {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.btn-reject:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.enrollment-details {
    background: #f8fafc;
    padding: 1.5rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
}

.enrollment-detail-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.enrollment-detail-item:last-child {
    margin-bottom: 0;
}

.detail-label {
    font-weight: 600;
    color: var(--text-secondary);
}

.detail-value {
    font-weight: 600;
    color: var(--text-primary);
}
</style>

<script>
// Load pending enrollments on page load
document.addEventListener('DOMContentLoaded', function() {
    loadPendingEnrollments();
});

// Function to load pending enrollments
function loadPendingEnrollments() {
    fetch('<?= base_url('teacher/getPendingEnrollments') ?>', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            displayPendingEnrollments(data.pendingEnrollments);
        } else {
            console.error('Failed to load pending enrollments:', data.message);
        }
    })
    .catch(error => {
        console.error('Error loading pending enrollments:', error);
    });
}

// Function to display pending enrollments
function displayPendingEnrollments(enrollments) {
    const container = document.getElementById('pending-enrollments-list');
    const card = document.getElementById('pending-enrollments-card');
    const countBadge = document.getElementById('pending-count');

    if (enrollments.length > 0) {
        // Show the pending enrollments card
        card.style.display = 'block';
        countBadge.textContent = enrollments.length;

        let html = '';
        enrollments.forEach(enrollment => {
            html += `
                <div class="pending-enrollment-card">
                    <div class="pending-enrollment-header">
                        <h6 style="margin: 0; color: var(--primary-green); font-weight: 700;">
                            ${enrollment.student_name}
                        </h6>
                        <small style="color: var(--text-secondary);">
                            Applied: ${new Date(enrollment.application_date).toLocaleDateString()}
                        </small>
                    </div>
                    <div class="pending-enrollment-info">
                        <div><strong>Course:</strong> ${enrollment.course_number}</div>
                        <div><strong>Email:</strong> ${enrollment.student_email}</div>
                    </div>
                    <div class="pending-enrollment-actions">
                        <button class="btn-approve" onclick="processEnrollment(${enrollment.enrollment_id}, 'approve')">
                            <i class="fas fa-check"></i> Approve
                        </button>
                        <button class="btn-reject" onclick="processEnrollment(${enrollment.enrollment_id}, 'reject')">
                            <i class="fas fa-times"></i> Reject
                        </button>
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;
    } else {
        // Hide the pending enrollments card if no pending applications
        card.style.display = 'none';
    }
}

// Function to process enrollment application
function processEnrollment(enrollmentId, action) {
    // Show confirmation modal
    showEnrollmentModal(enrollmentId, action);
}

// Function to show enrollment processing modal
function showEnrollmentModal(enrollmentId, action) {
    const modal = document.getElementById('enrollmentModal');
    const modalTitle = document.getElementById('enrollmentModalTitle');
    const modalBody = document.getElementById('enrollmentModalBody');

    modalTitle.textContent = action === 'approve' ? 'Approve Enrollment Application' : 'Reject Enrollment Application';

    // Get enrollment details first
    fetch(`<?= base_url('teacher/getPendingEnrollments') ?>`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const enrollment = data.pendingEnrollments.find(e => e.enrollment_id == enrollmentId);
            if (enrollment) {
                modalBody.innerHTML = `
                    <div class="enrollment-details">
                        <div class="enrollment-detail-item">
                            <span class="detail-label">Student:</span>
                            <span class="detail-value">${enrollment.student_name}</span>
                        </div>
                        <div class="enrollment-detail-item">
                            <span class="detail-label">Email:</span>
                            <span class="detail-value">${enrollment.student_email}</span>
                        </div>
                        <div class="enrollment-detail-item">
                            <span class="detail-label">Course:</span>
                            <span class="detail-value">${enrollment.course_number}</span>
                        </div>
                        <div class="enrollment-detail-item">
                            <span class="detail-label">Application Date:</span>
                            <span class="detail-value">${new Date(enrollment.application_date).toLocaleDateString()}</span>
                        </div>
                    </div>
                    ${action === 'reject' ? `
                        <div style="margin-bottom: 1.5rem;">
                            <label for="rejectionRemarks" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Reason for rejection (optional):</label>
                            <textarea id="rejectionRemarks" rows="3" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 8px; resize: vertical;" placeholder="Please provide a reason for rejecting this application..."></textarea>
                        </div>
                    ` : ''}
                    <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                        <button onclick="closeEnrollmentModal()" style="padding: 0.75rem 1.5rem; background: #e5e7eb; border: none; border-radius: 8px; cursor: pointer;">Cancel</button>
                        <button onclick="confirmProcessEnrollment(${enrollmentId}, '${action}')" style="padding: 0.75rem 1.5rem; background: ${action === 'approve' ? '#10b981' : '#ef4444'}; color: white; border: none; border-radius: 8px; cursor: pointer;">
                            <i class="fas fa-${action === 'approve' ? 'check' : 'times'}"></i>
                            ${action === 'approve' ? 'Approve' : 'Reject'} Application
                        </button>
                    </div>
                `;

                modal.style.display = 'flex';
            }
        }
    });
}

// Function to close enrollment modal
function closeEnrollmentModal() {
    document.getElementById('enrollmentModal').style.display = 'none';
}

// Function to confirm and process enrollment
function confirmProcessEnrollment(enrollmentId, action) {
    const remarks = action === 'reject' ? document.getElementById('rejectionRemarks').value : '';

    // Disable buttons during processing
    const buttons = document.querySelectorAll('#enrollmentModal button');
    buttons.forEach(btn => btn.disabled = true);

    const formData = new FormData();
    formData.append('enrollment_id', enrollmentId);
    formData.append('action', action);
    if (remarks) {
        formData.append('remarks', remarks);
    }

    fetch('<?= base_url('teacher/processEnrollmentApplication') ?>', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        closeEnrollmentModal();

        if (data.success) {
            showAlert('success', data.message);
            loadPendingEnrollments(); // Refresh the list
        } else {
            showAlert('danger', data.message || 'Failed to process enrollment application');
        }
    })
    .catch(error => {
        closeEnrollmentModal();
        console.error('Error processing enrollment:', error);
        showAlert('danger', 'An error occurred while processing the enrollment application');
    });
}

// Function to refresh pending enrollments
function refreshPendingEnrollments() {
    loadPendingEnrollments();
}

// Function to show alerts
function showAlert(type, message) {
    const alertContainer = document.getElementById('teacher-alert-container');
    const alert = document.createElement('div');
    alert.className = `alert alert-${type === 'success' ? 'success' : 'danger'}`;
    alert.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        max-width: 400px;
        animation: slideInRight 0.3s ease;
    `;

    if (type === 'success') {
        alert.style.background = 'linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%)';
        alert.style.color = '#065f46';
    } else {
        alert.style.background = 'linear-gradient(135deg, #fee2e2 0%, #fecaca 100%)';
        alert.style.color = '#991b1b';
    }

    alert.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
        ${message}
    `;

    alertContainer.appendChild(alert);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        alert.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => alert.remove(), 300);
    }, 5000);
}

// Modal close handlers
document.getElementById('enrollmentModalClose')?.addEventListener('click', closeEnrollmentModal);
window.addEventListener('click', function(e) {
    const modal = document.getElementById('enrollmentModal');
    if (e.target === modal) {
        closeEnrollmentModal();
    }
});

// Course search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('course-search-input');
    const searchBtn = document.getElementById('search-btn');

    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', function() {
            performCourseSearch();
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performCourseSearch();
            }
        });
    }
});

function performCourseSearch() {
    const searchTerm = document.getElementById('course-search-input').value.toLowerCase().trim();
    const courseCards = document.querySelectorAll('.course-card-new');

    courseCards.forEach(card => {
        const courseCode = card.querySelector('.course-code').textContent.toLowerCase();
        const courseInfo = card.textContent.toLowerCase();

        if (courseCode.includes(searchTerm) || courseInfo.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?= $this->endSection() ?>
