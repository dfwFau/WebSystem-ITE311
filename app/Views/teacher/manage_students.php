<?= $this->extend('template') ?>

<?= $this->section('title') ?>Manage Students<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Modern Dashboard Styles - Green Theme */
  .manage-students-dashboard {
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
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
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

  .header-actions-modern {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .btn-header {
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

  .btn-header:hover {
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

  .course-selector-modern {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    padding: 1.5rem;
    margin-bottom: 2rem;
  }

  .course-selector-modern label {
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    display: block;
  }

  .course-selector-modern select {
    width: 100%;
    max-width: 400px;
    padding: 12px 16px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
  }

  .course-selector-modern select:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(115, 175, 111, 0.2);
  }

  .filters-card-modern {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    padding: 1.5rem;
    margin-bottom: 2rem;
  }

  .filters-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 1rem;
  }

  .filter-group label {
    font-weight: 600;
    color: var(--text-secondary);
    margin-bottom: 0.5rem;
    display: block;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .filter-group input,
  .filter-group select {
    width: 100%;
    padding: 10px 14px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background: white;
  }

  .filter-group input:focus,
  .filter-group select:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(115, 175, 111, 0.2);
  }

  .filter-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
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
    cursor: pointer;
  }

  .btn-action-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
    color: white;
    text-decoration: none;
  }

  .btn-secondary-modern {
    background: var(--bg-card);
    color: var(--text-secondary);
    border: 2px solid var(--border-color);
    padding: 10px 24px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .btn-secondary-modern:hover {
    border-color: var(--primary-green);
    color: var(--primary-green);
    text-decoration: none;
  }

  .table-modern {
    width: 100%;
    border-collapse: collapse;
  }

  .table-modern th {
    background: linear-gradient(135deg, rgba(115, 175, 111, 0.1) 0%, rgba(115, 175, 111, 0.05) 100%);
    padding: 1rem 1.25rem;
    text-align: left;
    font-weight: 700;
    color: var(--text-primary);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid var(--border-color);
  }

  .table-modern td {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--border-color);
    color: var(--text-primary);
    vertical-align: middle;
  }

  .table-modern tbody tr {
    transition: all 0.2s ease;
  }

  .table-modern tbody tr:hover {
    background: rgba(115, 175, 111, 0.05);
  }

  .status-badge-modern {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .status-active {
    background: rgba(16, 185, 129, 0.15);
    color: var(--success);
  }

  .status-pending {
    background: rgba(245, 158, 11, 0.15);
    color: var(--warning);
  }

  .status-inactive {
    background: rgba(100, 116, 139, 0.15);
    color: var(--text-secondary);
  }

  .status-dropped {
    background: rgba(239, 68, 68, 0.15);
    color: var(--danger);
  }

  .action-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }

  .btn-table {
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 4px;
  }

  .btn-view {
    background: rgba(115, 175, 111, 0.15);
    color: var(--primary-green);
  }

  .btn-view:hover {
    background: var(--primary-green);
    color: white;
  }

  .btn-approve {
    background: rgba(16, 185, 129, 0.15);
    color: var(--success);
  }

  .btn-approve:hover {
    background: var(--success);
    color: white;
  }

  .btn-update {
    background: rgba(245, 158, 11, 0.15);
    color: var(--warning);
  }

  .btn-update:hover {
    background: var(--warning);
    color: white;
  }

  .btn-remove {
    background: rgba(239, 68, 68, 0.15);
    color: var(--danger);
  }

  .btn-remove:hover {
    background: var(--danger);
    color: white;
  }

  .empty-state-modern {
    text-align: center;
    padding: 4rem 2rem;
  }

  .empty-state-modern i {
    font-size: 4rem;
    color: var(--primary-green);
    opacity: 0.4;
    margin-bottom: 1.5rem;
  }

  .empty-state-modern h4 {
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    font-weight: 700;
  }

  .empty-state-modern p {
    color: var(--text-secondary);
    margin: 0;
  }

  .modal-content {
    border-radius: var(--radius-lg);
    border: none;
    box-shadow: var(--shadow-hover);
  }

  .modal-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    border-bottom: none;
    padding: 1.25rem 1.5rem;
    border-radius: var(--radius-lg) var(--radius-lg) 0 0;
  }

  .modal-header .btn-close {
    filter: brightness(0) invert(1);
    opacity: 0.8;
  }

  .modal-header .btn-close:hover {
    opacity: 1;
  }

  .modal-body {
    padding: 1.5rem;
  }

  .modal-footer {
    border-top: 1px solid var(--border-color);
    padding: 1rem 1.5rem;
  }

  .form-group-modern {
    margin-bottom: 1rem;
  }

  .form-group-modern label {
    font-weight: 600;
    color: var(--text-secondary);
    margin-bottom: 0.5rem;
    display: block;
    font-size: 0.85rem;
  }

  .form-group-modern input,
  .form-group-modern select,
  .form-group-modern textarea {
    width: 100%;
    padding: 10px 14px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.95rem;
    transition: all 0.3s ease;
  }

  .form-group-modern input:focus,
  .form-group-modern select:focus,
  .form-group-modern textarea:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(115, 175, 111, 0.2);
  }

  @media (max-width: 768px) {
    .header-content-modern {
      flex-direction: column;
      text-align: center;
    }
    .stats-grid-modern {
      grid-template-columns: repeat(2, 1fr);
    }
    .filters-grid {
      grid-template-columns: 1fr;
    }
    .table-modern {
      font-size: 0.85rem;
    }
    .table-modern th,
    .table-modern td {
      padding: 0.75rem;
    }
  }

  @media (max-width: 480px) {
    .stats-grid-modern {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="container-fluid py-4 manage-students-dashboard">
  <!-- Dashboard Header -->
  <div class="dashboard-header-modern">
    <div class="header-content-modern">
      <div class="header-title-modern">
        <i class="fas fa-users-cog"></i>
        <div>
          <h1>Manage Students</h1>
          <p><?php if ($selectedCourse): ?>
            <?= esc($selectedCourse['course_number']) ?> – <?= esc($selectedCourse['description'] ?? 'No description') ?>
          <?php else: ?>
            Select a course to manage students
          <?php endif; ?></p>
        </div>
      </div>
      <div class="header-actions-modern">
        <a href="<?= base_url('courses') ?>" class="btn-header">
          <i class="fas fa-arrow-left"></i> Back to Courses
        </a>
        <a href="<?= current_url() ?>" class="btn-header">
          <i class="fas fa-sync-alt"></i> Refresh
        </a>
      </div>
    </div>
  </div>

  <!-- Stats Grid -->
  <div class="stats-grid-modern">
    <div class="stat-card-modern">
      <div class="stat-icon-modern">
        <i class="fas fa-users"></i>
      </div>
      <div class="stat-value-modern"><?= count($students ?? []) ?></div>
      <div class="stat-label-modern">Total Students</div>
    </div>
    <div class="stat-card-modern">
      <div class="stat-icon-modern">
        <i class="fas fa-user-check"></i>
      </div>
      <div class="stat-value-modern">
        <?php
          $activeCount = 0;
          foreach (($students ?? []) as $student) {
            if (strtolower($student['status'] ?? 'active') === 'active') $activeCount++;
          }
          echo $activeCount;
        ?>
      </div>
      <div class="stat-label-modern">Active Students</div>
    </div>
    <div class="stat-card-modern">
      <div class="stat-icon-modern">
        <i class="fas fa-clock"></i>
      </div>
      <div class="stat-value-modern">
        <?php
          $pendingCount = 0;
          foreach (($students ?? []) as $student) {
            if (strtolower($student['status'] ?? '') === 'pending') $pendingCount++;
          }
          echo $pendingCount;
        ?>
      </div>
      <div class="stat-label-modern">Pending Approval</div>
    </div>
    <div class="stat-card-modern">
      <div class="stat-icon-modern">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div class="stat-value-modern"><?= count($courses ?? []) ?></div>
      <div class="stat-label-modern">My Courses</div>
    </div>
  </div>

  <!-- Course Selector -->
  <div class="course-selector-modern">
    <form method="GET" action="<?= base_url('teacher/manage-students') ?>">
      <label for="course_id"><i class="fas fa-book me-2"></i>Select Course</label>
      <select name="course_id" id="course_id" onchange="this.form.submit()">
        <?php foreach ($courses as $course): ?>
          <option value="<?= $course['course_id'] ?>" <?= $courseId == $course['course_id'] ? 'selected' : '' ?>>
            <?= esc($course['course_number']) ?> - <?= esc($course['description'] ?? 'No description') ?>
          </option>
        <?php endforeach; ?>
      </select>
    </form>
  </div>

  <?php if ($courseId): ?>
  <!-- Filters Section -->
  <div class="filters-card-modern">
    <form method="GET" action="<?= base_url('teacher/manage-students') ?>">
      <input type="hidden" name="course_id" value="<?= $courseId ?>">
      <div class="filters-grid">
        <div class="filter-group">
          <label for="search"><i class="fas fa-search me-1"></i>Search</label>
          <input type="text" id="search" name="search" placeholder="Search by name, ID, or email..." value="<?= esc($searchQuery ?? '') ?>">
        </div>
        <div class="filter-group">
          <label for="year_level">Year Level</label>
          <select id="year_level" name="year_level">
            <option value="">All Years</option>
            <?php foreach ($yearLevels ?? [] as $level): ?>
              <option value="<?= esc($level) ?>" <?= ($yearLevel ?? '') == $level ? 'selected' : '' ?>><?= esc($level) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="filter-group">
          <label for="program">Program</label>
          <select id="program" name="program">
            <option value="">All Programs</option>
            <?php foreach ($programs ?? [] as $prog): ?>
              <option value="<?= esc($prog) ?>" <?= ($program ?? '') == $prog ? 'selected' : '' ?>><?= esc($prog) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="filter-group">
          <label for="status">Status</label>
          <select id="status" name="status">
            <option value="">All Statuses</option>
            <option value="Active" <?= ($status ?? '') == 'Active' ? 'selected' : '' ?>>Active</option>
            <option value="Pending" <?= ($status ?? '') == 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Inactive" <?= ($status ?? '') == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
            <option value="Dropped" <?= ($status ?? '') == 'Dropped' ? 'selected' : '' ?>>Dropped</option>
          </select>
        </div>
      </div>
      <div class="filter-actions">
        <button type="submit" class="btn-action-modern">
          <i class="fas fa-search"></i> Search & Filter
        </button>
        <a href="<?= base_url('teacher/manage-students?course_id=' . $courseId) ?>" class="btn-secondary-modern">
          <i class="fas fa-times"></i> Clear Filters
        </a>
      </div>
    </form>
  </div>

  <!-- Students Table -->
  <div class="content-card-modern">
    <div class="card-header-modern">
      <h5><i class="fas fa-user-graduate"></i> Enrolled Students</h5>
      <span class="badge bg-white text-success"><?= count($students ?? []) ?> students</span>
    </div>
    <div class="card-body-modern" style="padding: 0;">
      <?php if (!empty($students)): ?>
        <div style="overflow-x: auto;">
          <table class="table-modern">
            <thead>
              <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Program</th>
                <th>Year Level</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($students as $student): ?>
                <tr>
                  <td><strong><?= esc($student['student_id']) ?></strong></td>
                  <td><?= esc($student['name']) ?></td>
                  <td><?= esc($student['email']) ?></td>
                  <td><?= esc($student['program']) ?></td>
                  <td><?= esc($student['year_level']) ?></td>
                  <td>
                    <span class="status-badge-modern status-<?= strtolower($student['status'] ?? 'active') ?>">
                      <?= esc($student['status'] ?? 'Active') ?>
                    </span>
                  </td>
                  <td>
                    <div class="action-buttons">
                      <button class="btn-table btn-view" onclick="viewStudentDetails(<?= $student['id'] ?>, <?= $courseId ?>)">
                        <i class="fas fa-eye"></i> View
                      </button>
                      <?php if (strtolower($student['status'] ?? 'active') === 'pending'): ?>
                        <button class="btn-table btn-approve" onclick="approveStudent(<?= $student['enrollment_id'] ?>, '<?= esc($student['name']) ?>')">
                          <i class="fas fa-check"></i> Approve
                        </button>
                        <button class="btn-table btn-remove" onclick="rejectStudent(<?= $student['enrollment_id'] ?>, '<?= esc($student['name']) ?>')">
                          <i class="fas fa-times"></i> Reject
                        </button>
                      <?php else: ?>
                        <button class="btn-table btn-update" onclick="updateStudentStatus(<?= $student['enrollment_id'] ?>, '<?= esc($student['status'] ?? 'Active') ?>')">
                          <i class="fas fa-edit"></i> Update
                        </button>
                        <button class="btn-table btn-remove" onclick="removeStudent(<?= $student['enrollment_id'] ?>, '<?= esc($student['name']) ?>')">
                          <i class="fas fa-trash"></i> Remove
                        </button>
                      <?php endif; ?>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="empty-state-modern">
          <i class="fas fa-users"></i>
          <h4>No Students Found</h4>
          <p>No students are currently enrolled in this course or match your search criteria.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
</div>

<!-- Student Details Modal -->
<div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentDetailsModalLabel"><i class="fas fa-user me-2"></i>Student Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="studentDetailsContent">
        <!-- Content will be loaded here -->
      </div>
    </div>
  </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusUpdateModal" tabindex="-1" aria-labelledby="statusUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusUpdateModalLabel"><i class="fas fa-edit me-2"></i>Update Student Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="statusUpdateForm">
        <div class="modal-body">
          <div class="form-group-modern">
            <label>Current Status</label>
            <input type="text" id="currentStatus" readonly>
          </div>
          <div class="form-group-modern">
            <label for="newStatus">New Status</label>
            <select id="newStatus" name="status" required>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
              <option value="Dropped">Dropped</option>
            </select>
          </div>
          <div class="form-group-modern">
            <label for="remarks">Remarks</label>
            <textarea id="remarks" name="remarks" rows="3" placeholder="Optional remarks..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-secondary-modern" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn-action-modern">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
let currentEnrollmentId = null;

function viewStudentDetails(studentId, courseId) {
    // Show loading
    $('#studentDetailsContent').html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>');
    $('#studentDetailsModal').modal('show');

    // Fetch student details
    $.ajax({
        url: '<?= base_url('teacher/get-student-details') ?>',
        type: 'GET',
        data: { student_id: studentId, course_id: courseId },
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        success: function(response) {
            if (response.success) {
                const student = response.student;
                $('#studentDetailsContent').html(`
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Student ID</label>
                                <input type="text" class="form-control" value="${student.student_id}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="${student.full_name}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" value="${student.email}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Program / Major</label>
                                <input type="text" class="form-control" value="${student.program}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Year Level</label>
                                <input type="text" class="form-control" value="${student.year_level}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Section</label>
                                <input type="text" class="form-control" value="${student.section}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Enrollment Date</label>
                                <input type="text" class="form-control" value="${new Date(student.enrollment_date).toLocaleDateString()}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" value="${student.status}" readonly>
                            </div>
                        </div>
                    </div>
                `);
            } else {
                $('#studentDetailsContent').html('<div class="alert alert-danger">Error loading student details.</div>');
            }
        },
        error: function() {
            $('#studentDetailsContent').html('<div class="alert alert-danger">Error loading student details.</div>');
        }
    });
}

function updateStudentStatus(enrollmentId, currentStatus) {
    currentEnrollmentId = enrollmentId;
    $('#currentStatus').val(currentStatus);
    $('#newStatus').val(currentStatus);
    $('#remarks').val('');
    $('#statusUpdateModal').modal('show');
}

function removeStudent(enrollmentId, studentName) {
    if (confirm(`Are you sure you want to remove ${studentName} from this course?`)) {
        $.ajax({
            url: '<?= base_url('teacher/remove-student') ?>',
            type: 'POST',
            data: {
                [document.querySelector('meta[name="csrf-name"]').getAttribute('content')]: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                enrollment_id: enrollmentId
            },
            success: function(response) {
                if (response.success) {
                    alert('Student removed successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Error removing student.');
            }
        });
    }
}

function approveStudent(enrollmentId, studentName) {
    if (confirm(`Are you sure you want to approve ${studentName}'s enrollment in this course?`)) {
        $.ajax({
            url: '<?= base_url('teacher/update-student-status') ?>',
            type: 'POST',
            data: {
                [document.querySelector('meta[name="csrf-name"]').getAttribute('content')]: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                enrollment_id: enrollmentId,
                status: 'Active'
            },
            success: function(response) {
                if (response.success) {
                    alert('Student approved successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Error approving student.');
            }
        });
    }
}

function rejectStudent(enrollmentId, studentName) {
    if (confirm(`Are you sure you want to reject ${studentName}'s enrollment application? This will remove them from the course.`)) {
        $.ajax({
            url: '<?= base_url('teacher/remove-student') ?>',
            type: 'POST',
            data: {
                [document.querySelector('meta[name="csrf-name"]').getAttribute('content')]: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                enrollment_id: enrollmentId
            },
            success: function(response) {
                if (response.success) {
                    alert('Student application rejected successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Error rejecting student application.');
            }
        });
    }
}

$('#statusUpdateForm').on('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    formData.append('enrollment_id', currentEnrollmentId);
    formData.append(document.querySelector('meta[name="csrf-name"]').getAttribute('content'), document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    $.ajax({
        url: '<?= base_url('teacher/update-student-status') ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                $('#statusUpdateModal').modal('hide');
                alert('Status updated successfully!');
                location.reload();
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function() {
            alert('Error updating status.');
        }
    });
});
</script>
<?= $this->endSection() ?>
