<?= $this->extend('template') ?>

<?= $this->section('title') ?>Assignments<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Assignments Dashboard Template with #73AF6F Theme */

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
  .assignments-dashboard {
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

  /* Assignment Cards Grid */
  .assignments-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
  }

  .assignment-card {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: var(--transition);
    position: relative;
  }

  .assignment-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-hover);
  }

  .assignment-card-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.25rem 1.5rem;
    color: white;
    position: relative;
  }

  .assignment-title {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }

  .assignment-course {
    font-size: 0.9rem;
    opacity: 0.9;
  }

  .assignment-status {
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

  .assignment-status.submitted {
    background: rgba(16, 185, 129, 0.2);
    color: #059669;
  }

  .assignment-status.pending {
    background: rgba(245, 158, 11, 0.2);
    color: #d97706;
  }

  .assignment-status.overdue {
    background: rgba(239, 68, 68, 0.2);
    color: #dc2626;
  }

  .assignment-status.submissions {
    background: rgba(59, 130, 246, 0.2);
    color: #2563eb;
  }

  .assignment-card-body {
    padding: 1.5rem;
  }

  .assignment-info {
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

  .assignment-description {
    font-size: 0.9rem;
    color: var(--text-secondary);
    margin-bottom: 1rem;
    line-height: 1.5;
  }

  .assignment-card-actions {
    display: flex;
    gap: 0.75rem;
  }

  .btn-assignment {
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

  .btn-assignment.primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .btn-assignment.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
  }

  .btn-assignment.secondary {
    background: rgba(115, 175, 111, 0.1);
    color: var(--primary-green);
    border: 1px solid var(--primary-green);
  }

  .btn-assignment.secondary:hover {
    background: var(--primary-green);
    color: white;
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-secondary);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    grid-column: 1 / -1;
    min-height: 300px;
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

    .assignments-grid {
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

    .assignment-card-actions {
      flex-direction: column;
    }

    .btn-assignment {
      width: 100%;
    }
  }
</style>

<!-- Role-based Content -->
<?php if (($userRole ?? '') === 'student' || ($userRole ?? '') === 'teacher'): ?>
<div class="assignments-dashboard">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <div class="header-content">
      <div class="header-title">
        <i class="fas fa-clipboard-list"></i>
        <h1><?php echo ($userRole === 'student') ? 'My Assignments' : 'Assignments Dashboard'; ?></h1>
      </div>
      <div class="header-actions">
        <a href="#" class="btn-secondary-green">
          <i class="fas fa-sync-alt"></i>
          Refresh
        </a>
      </div>
    </div>
  </div>

  <!-- Stats Section -->
  <div class="stats-grid">
    <?php if ($userRole === 'student'): ?>
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="stat-value"><?php echo count($assignments ?? []); ?></div>
        <div class="stat-label">Total Assignments</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-value">
          <?php
            $submittedCount = 0;
            foreach (($assignments ?? []) as $assignment) {
              if (($assignment['has_submitted'] ?? false)) $submittedCount++;
            }
            echo $submittedCount;
          ?>
        </div>
        <div class="stat-label">Submitted</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clock"></i>
        </div>
        <div class="stat-value">
          <?php
            $pendingCount = 0;
            foreach (($assignments ?? []) as $assignment) {
              if (!(($assignment['has_submitted'] ?? false))) $pendingCount++;
            }
            echo $pendingCount;
          ?>
        </div>
        <div class="stat-label">Pending</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="stat-value">
          <?php
            $overdueCount = 0;
            foreach (($assignments ?? []) as $assignment) {
              if (($assignment['due_date'] ?? '') && strtotime($assignment['due_date']) < time()) {
                if (!(($assignment['has_submitted'] ?? false))) $overdueCount++;
              }
            }
            echo $overdueCount;
          ?>
        </div>
        <div class="stat-label">Overdue</div>
      </div>
    <?php else: ?>
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="stat-value"><?php echo count($assignments ?? []); ?></div>
        <div class="stat-label">My Assignments</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-users"></i>
        </div>
        <div class="stat-value">
          <?php
            $totalSubmissions = 0;
            foreach (($assignments ?? []) as $assignment) {
              $totalSubmissions += ($assignment['submission_count'] ?? 0);
            }
            echo $totalSubmissions;
          ?>
        </div>
        <div class="stat-label">Total Submissions</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-calendar-check"></i>
        </div>
        <div class="stat-value">
          <?php
            $activeCount = 0;
            foreach (($assignments ?? []) as $assignment) {
              if (($assignment['due_date'] ?? '') && strtotime($assignment['due_date']) > time()) $activeCount++;
            }
            echo $activeCount;
          ?>
        </div>
        <div class="stat-label">Active Assignments</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clock"></i>
        </div>
        <div class="stat-value">
          <?php
            $pastDueCount = 0;
            foreach (($assignments ?? []) as $assignment) {
              if (($assignment['due_date'] ?? '') && strtotime($assignment['due_date']) < time()) $pastDueCount++;
            }
            echo $pastDueCount;
          ?>
        </div>
        <div class="stat-label">Past Due</div>
      </div>
    <?php endif; ?>
  </div>

  <!-- Content Grid -->
  <div class="content-grid">
    <!-- Main Content Area -->
    <div class="main-content-card">
      <div class="content-header">
        <div class="content-title">
          <i class="fas fa-clipboard-list"></i>
          <?php echo ($userRole === 'student') ? 'My Assignments' : 'My Created Assignments'; ?>
        </div>
        <div class="content-actions">
          <div class="search-container">
            <input type="text" class="search-input" id="assignment-search-input" placeholder="Search assignments..." value="">
            <button class="search-btn" id="assignment-search-btn">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="assignments-grid">
        <!-- Assignment Cards -->
        <?php if (!empty($assignments ?? [])): ?>
          <?php foreach ($assignments as $assignment): ?>
            <div class="assignment-card">
              <div class="assignment-card-header">
                <div class="assignment-title"><?php echo esc($assignment['title']); ?></div>
                <div class="assignment-course"><?php echo esc($assignment['course_number']); ?></div>
                <div class="assignment-status <?php
                  if ($userRole === 'student') {
                    if (($assignment['has_submitted'] ?? false)) {
                      echo 'submitted';
                    } elseif (($assignment['due_date'] ?? '') && strtotime($assignment['due_date']) < time()) {
                      echo 'overdue';
                    } else {
                      echo 'pending';
                    }
                  } else {
                    echo 'submissions';
                  }
                ?>">
                  <?php
                    if ($userRole === 'student') {
                      if (($assignment['has_submitted'] ?? false)) {
                        echo 'Submitted';
                      } elseif (($assignment['due_date'] ?? '') && strtotime($assignment['due_date']) < time()) {
                        echo 'Overdue';
                      } else {
                        echo 'Pending';
                      }
                    } else {
                      echo ($assignment['submission_count'] ?? 0) . ' submissions';
                    }
                  ?>
                </div>
              </div>
              <div class="assignment-card-body">
                <?php if (!empty($assignment['description'])): ?>
                  <div class="assignment-description">
                    <?php echo esc(substr($assignment['description'], 0, 100)); ?><?php echo strlen($assignment['description'] ?? '') > 100 ? '...' : ''; ?>
                  </div>
                <?php endif; ?>

                <div class="assignment-info">
                  <div class="info-item">
                    <span class="info-label">Due Date</span>
                    <span class="info-value">
                      <?php
                        if ($assignment['due_date']) {
                          echo date('M d, Y H:i', strtotime($assignment['due_date']));
                        } else {
                          echo 'No due date';
                        }
                      ?>
                    </span>
                  </div>

                  <?php if ($userRole === 'student' && ($assignment['has_submitted'] ?? false) && isset($assignment['submission']['updated_at'])): ?>
                    <div class="info-item">
                      <span class="info-label">Last Updated</span>
                      <span class="info-value"><?php echo date('M d, Y H:i', strtotime($assignment['submission']['updated_at'])); ?></span>
                    </div>
                  <?php endif; ?>
                </div>

                <div class="assignment-card-actions">
                  <?php if ($userRole === 'student'): ?>
                    <a href="<?php echo base_url('assignments/submit/' . $assignment['id']); ?>" class="btn-assignment primary">
                      <i class="fas fa-edit"></i>
                      <?php echo ($assignment['has_submitted'] ?? false) ? 'Edit Submission' : 'Submit Assignment'; ?>
                    </a>
                  <?php else: ?>
                    <a href="<?php echo base_url('assignments/view-submissions/' . $assignment['id']); ?>" class="btn-assignment primary">
                      <i class="fas fa-eye"></i> View Submissions
                    </a>
                  <?php endif; ?>
                  <a href="<?php echo base_url('assignments/course/' . $assignment['course_id']); ?>" class="btn-assignment secondary">
                    <i class="fas fa-list"></i> Course Assignments
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="empty-state">
            <i class="fas fa-clipboard-list"></i>
            <h3><?php echo ($userRole === 'student') ? 'No Assignments Found' : 'No Assignments Created'; ?></h3>
            <p>
              <?php if ($userRole === 'student'): ?>
                You don't have any assignments from your enrolled courses yet.
              <?php else: ?>
                You haven't created any assignments for your courses yet.
              <?php endif; ?>
            </p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Alert Container -->
  <div id="assignment-alert-container"></div>
</div>

<?php else: ?>
<!-- Unknown Role -->
<div class="assignments-dashboard">
  <div class="empty-state" style="min-height: 60vh;">
    <i class="fas fa-exclamation-triangle"></i>
    <h3>Role Not Recognized</h3>
    <p>Please contact the administrator to resolve this issue.</p>
  </div>
</div>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Assignment search functionality
    const searchInput = document.getElementById('assignment-search-input');
    const searchBtn = document.getElementById('assignment-search-btn');

    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', function() {
            performAssignmentSearch();
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performAssignmentSearch();
            }
        });
    }
});

function performAssignmentSearch() {
    const searchTerm = document.getElementById('assignment-search-input').value.toLowerCase().trim();
    const assignmentCards = document.querySelectorAll('.assignment-card');
    let visibleCount = 0;

    assignmentCards.forEach(card => {
        const title = card.querySelector('.assignment-title')?.textContent.toLowerCase() || '';
        const course = card.querySelector('.assignment-course')?.textContent.toLowerCase() || '';
        const description = card.querySelector('.assignment-description')?.textContent.toLowerCase() || '';

        if (title.includes(searchTerm) || course.includes(searchTerm) || description.includes(searchTerm)) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Show/hide no results message in assignments grid
    const assignmentsGrid = document.querySelector('.assignments-grid');
    let noResultsDiv = assignmentsGrid.querySelector('.empty-state');
    if (!noResultsDiv || assignmentsGrid.querySelectorAll('.assignment-card').length === 0) {
        // Create no results div if it doesn't exist or if all cards are hidden
        if (!noResultsDiv) {
            noResultsDiv = document.createElement('div');
            noResultsDiv.className = 'empty-state';
            assignmentsGrid.appendChild(noResultsDiv);
        }

        if (visibleCount === 0 && searchTerm !== '') {
            noResultsDiv.innerHTML = `
                <i class="fas fa-search"></i>
                <h3>No assignments found matching your search.</h3>
                <p>Try adjusting your search terms.</p>
            `;
            noResultsDiv.style.display = 'block';
        } else {
            noResultsDiv.style.display = 'none';
        }
    }
}
</script>

<?= $this->endSection() ?>
