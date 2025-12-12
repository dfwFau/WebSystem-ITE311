<?= $this->extend('template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
/* ========================================================================== */
/*                 STUDENT DASHBOARD DESIGN SYSTEM                            */
/* ========================================================================== */

:root {
  --primary: #73AF6F;
  --primary-dark: #5a8f58;
  --primary-light: #8bbf84;
  --secondary: #64748b;
  --accent: #73AF6F;
  --success: #73AF6F;
  --warning: #d97706;
  --danger: #dc2626;
  --info: #06b6d4;

  /* Backgrounds */
  --bg-primary: #f8fafc;
  --bg-card: rgba(255, 255, 255, 0.98);
  --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #e8f5e8 100%);

  /* Text Colors */
  --text-primary: #1e293b;
  --text-secondary: #64748b;
  --text-muted: #94a3b8;

  /* Spacing */
  --space-xs: 0.5rem;
  --space-sm: 0.75rem;
  --space-md: 1rem;
  --space-lg: 1.5rem;
  --space-xl: 2rem;
  --space-2xl: 3rem;

  /* Border Radius */
  --radius-sm: 8px;
  --radius-md: 12px;
  --radius-lg: 16px;
  --radius-xl: 20px;

  /* Shadows */
  --shadow-sm: 0 2px 8px rgba(115, 175, 111, 0.1);
  --shadow-md: 0 4px 16px rgba(115, 175, 111, 0.15);
  --shadow-lg: 0 8px 24px rgba(115, 175, 111, 0.2);
  --shadow-xl: 0 12px 32px rgba(115, 175, 111, 0.25);

  /* Transitions */
  --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* ========================================================================== */
/*                      DASHBOARD CONTAINER                                   */
/* ========================================================================== */

.student-dashboard {
  background: var(--bg-gradient);
  min-height: 100vh;
  padding: var(--space-xl) var(--space-lg);
}

/* ========================================================================== */
/*                      WELCOME HEADER SECTION                                */
/* ========================================================================== */

.welcome-header {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  margin-bottom: var(--space-2xl);
  position: relative;
  overflow: hidden;
  color: white;
  box-shadow: var(--shadow-lg);
}

.welcome-header::before {
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

.welcome-content {
  position: relative;
  z-index: 1;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: var(--space-lg);
}

.welcome-text h1 {
  margin: 0 0 var(--space-sm) 0;
  font-size: 2.5rem;
  font-weight: 800;
  letter-spacing: -0.5px;
}

.welcome-subtitle {
  margin: 0;
  font-size: 1.125rem;
  font-weight: 500;
  opacity: 0.9;
}

.welcome-actions {
  display: flex;
  gap: var(--space-md);
  align-items: center;
  flex-wrap: wrap;
}

.btn-welcome {
  background: rgba(255, 255, 255, 0.15);
  border: 2px solid rgba(255, 255, 255, 0.3);
  color: white;
  padding: 12px 24px;
  border-radius: var(--radius-md);
  font-weight: 600;
  font-size: 1rem;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: var(--transition);
  backdrop-filter: blur(10px);
}

.btn-welcome:hover {
  background: rgba(255, 255, 255, 0.25);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
}

.btn-welcome i {
  font-size: 1.1rem;
}

/* ========================================================================== */
/*                      STATS CARDS SECTION                                   */
/* ========================================================================== */

.stats-section {
  margin-bottom: var(--space-2xl);
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-lg);
}

.stat-card {
  background: var(--bg-card);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  box-shadow: var(--shadow-md);
  border: 1px solid rgba(115, 175, 111, 0.1);
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
  background: linear-gradient(90deg, var(--primary), var(--primary-light));
}

.stat-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}

.stat-content {
  display: flex;
  align-items: center;
  gap: var(--space-lg);
}

.stat-icon {
  width: 60px;
  height: 60px;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.75rem;
  flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
}

.stat-icon.courses {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
  color: white;
}

.stat-icon.assignments {
  background: linear-gradient(135deg, var(--warning) 0%, #f59e0b 100%);
  color: white;
}

.stat-icon.grades {
  background: linear-gradient(135deg, var(--success) 0%, #10b981 100%);
  color: white;
}

.stat-icon.materials {
  background: linear-gradient(135deg, var(--info) 0%, #0891b2 100%);
  color: white;
}

.stat-info {
  flex: 1;
}

.stat-value {
  font-size: 2.25rem;
  font-weight: 800;
  color: var(--text-primary);
  margin-bottom: var(--space-xs);
  line-height: 1;
}

.stat-label {
  font-size: 0.95rem;
  font-weight: 600;
  color: var(--text-secondary);
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin: 0;
}

/* ========================================================================== */
/*                      QUICK ACTIONS SECTION                                 */
/* ========================================================================== */

.actions-section h2 {
  font-size: 1.875rem;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: var(--space-xl);
  text-align: center;
}

.actions-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: var(--space-lg);
}

.action-card {
  background: var(--bg-card);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  box-shadow: var(--shadow-md);
  border: 1px solid rgba(115, 175, 111, 0.1);
  transition: var(--transition);
  text-decoration: none;
  color: inherit;
  display: block;
  position: relative;
  overflow: hidden;
}

.action-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(115, 175, 111, 0.02) 0%, rgba(115, 175, 111, 0.05) 100%);
  opacity: 0;
  transition: var(--transition);
}

.action-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-xl);
  color: inherit;
  text-decoration: none;
}

.action-card:hover::before {
  opacity: 1;
}

.action-content {
  display: flex;
  align-items: center;
  gap: var(--space-lg);
  position: relative;
  z-index: 1;
}

.action-icon {
  width: 70px;
  height: 70px;
  border-radius: var(--radius-lg);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  flex-shrink: 0;
  transition: var(--transition);
}

.action-card:hover .action-icon {
  transform: scale(1.1);
}

.action-icon.courses {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
  color: white;
  box-shadow: 0 4px 12px rgba(115, 175, 111, 0.4);
}

.action-icon.assignments {
  background: linear-gradient(135deg, var(--warning) 0%, #f59e0b 100%);
  color: white;
  box-shadow: 0 4px 12px rgba(249, 115, 22, 0.4);
}

.action-icon.grades {
  background: linear-gradient(135deg, var(--success) 0%, #10b981 100%);
  color: white;
  box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
}

.action-icon.materials {
  background: linear-gradient(135deg, var(--info) 0%, #0891b2 100%);
  color: white;
  box-shadow: 0 4px 12px rgba(6, 182, 212, 0.4);
}

.action-icon.announcements {
  background: linear-gradient(135deg, var(--secondary) 0%, #475569 100%);
  color: white;
  box-shadow: 0 4px 12px rgba(100, 116, 139, 0.4);
}

.action-info {
  flex: 1;
}

.action-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: var(--space-xs);
}

.action-description {
  font-size: 0.95rem;
  color: var(--text-secondary);
  margin: 0;
  line-height: 1.5;
}

.action-arrow {
  color: var(--primary);
  font-size: 1.25rem;
  transition: var(--transition);
  opacity: 0.7;
}

.action-card:hover .action-arrow {
  transform: translateX(4px);
  opacity: 1;
}

/* ========================================================================== */
/*                      RESPONSIVE DESIGN                                     */
/* ========================================================================== */

@media (max-width: 1024px) {
  .student-dashboard {
    padding: var(--space-lg);
  }

  .welcome-header {
    padding: var(--space-xl);
  }

  .welcome-content {
    flex-direction: column;
    text-align: center;
    gap: var(--space-md);
  }

  .welcome-text h1 {
    font-size: 2rem;
  }

  .welcome-actions {
    justify-content: center;
  }

  .stats-grid {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
}

@media (max-width: 768px) {
  .student-dashboard {
    padding: var(--space-md);
  }

  .welcome-header {
    padding: var(--space-lg);
    margin-bottom: var(--space-xl);
  }

  .welcome-text h1 {
    font-size: 1.75rem;
  }

  .welcome-subtitle {
    font-size: 1rem;
  }

  .welcome-actions {
    flex-direction: column;
    width: 100%;
  }

  .btn-welcome {
    width: 100%;
    justify-content: center;
  }

  .stats-grid {
    grid-template-columns: 1fr;
  }

  .actions-grid {
    grid-template-columns: 1fr;
  }

  .stat-content {
    flex-direction: column;
    text-align: center;
    gap: var(--space-md);
  }

  .action-content {
    flex-direction: column;
    text-align: center;
    gap: var(--space-md);
  }

  .actions-section h2 {
    font-size: 1.5rem;
  }
}

@media (max-width: 480px) {
  .student-dashboard {
    padding: var(--space-sm);
  }

  .welcome-header {
    padding: var(--space-md);
  }

  .welcome-text h1 {
    font-size: 1.5rem;
  }

  .stat-card {
    padding: var(--space-lg);
  }

  .action-card {
    padding: var(--space-lg);
  }

  .stat-value {
    font-size: 1.875rem;
  }

  .action-icon {
    width: 60px;
    height: 60px;
    font-size: 1.75rem;
  }
}

/* ========================================================================== */
/*                      LOADING ANIMATIONS                                    */
/* ========================================================================== */

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.stat-card, .action-card {
  animation: fadeInUp 0.6s ease-out;
}

.stat-card:nth-child(1) { animation-delay: 0.1s; }
.stat-card:nth-child(2) { animation-delay: 0.2s; }
.stat-card:nth-child(3) { animation-delay: 0.3s; }
.stat-card:nth-child(4) { animation-delay: 0.4s; }

.action-card:nth-child(1) { animation-delay: 0.1s; }
.action-card:nth-child(2) { animation-delay: 0.2s; }
.action-card:nth-child(3) { animation-delay: 0.3s; }
.action-card:nth-child(4) { animation-delay: 0.4s; }
.action-card:nth-child(5) { animation-delay: 0.5s; }

.stat-card, .action-card {
  animation-fill-mode: both;
}
</style>

<!-- Student Dashboard -->
<div class="student-dashboard">
  <!-- Welcome Header -->
  <div class="welcome-header">
    <div class="welcome-content">
      <div class="welcome-text">
        <h1>Welcome back, <?= esc($userName ?? 'Student') ?>! 👋</h1>
        <p class="welcome-subtitle">Ready to continue your learning journey? Let's explore your dashboard.</p>
      </div>
      <div class="welcome-actions">
        <a href="<?= base_url('student/courses') ?>" class="btn-welcome">
          <i class="fas fa-graduation-cap"></i>
          Browse Courses
        </a>
        <a href="#" class="btn-welcome">
          <i class="fas fa-bell"></i>
          Notifications
        </a>
      </div>
    </div>
  </div>

  <!-- Stats Section -->
  <div class="stats-section">
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-content">
          <div class="stat-icon courses">
            <i class="fas fa-book"></i>
          </div>
          <div class="stat-info">
            <div class="stat-value">
              <?php
                // This would ideally come from the controller
                // For now, showing a placeholder
                echo rand(3, 8);
              ?>
            </div>
            <p class="stat-label">Enrolled Courses</p>
          </div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-content">
          <div class="stat-icon assignments">
            <i class="fas fa-tasks"></i>
          </div>
          <div class="stat-info">
            <div class="stat-value">
              <?php echo rand(2, 6); ?>
            </div>
            <p class="stat-label">Pending Assignments</p>
          </div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-content">
          <div class="stat-icon grades">
            <i class="fas fa-chart-line"></i>
          </div>
          <div class="stat-info">
            <div class="stat-value">
              <?php echo rand(85, 95); ?>%
            </div>
            <p class="stat-label">Average Grade</p>
          </div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-content">
          <div class="stat-icon materials">
            <i class="fas fa-file-alt"></i>
          </div>
          <div class="stat-info">
            <div class="stat-value">
              <?php echo rand(12, 25); ?>
            </div>
            <p class="stat-label">Study Materials</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions Section -->
  <div class="actions-section">
    <h2>Quick Actions</h2>
    <div class="actions-grid">
      <a href="<?= base_url('student/courses') ?>" class="action-card">
        <div class="action-content">
          <div class="action-icon courses">
            <i class="fas fa-graduation-cap"></i>
          </div>
          <div class="action-info">
            <h3 class="action-title">My Courses</h3>
            <p class="action-description">View enrolled courses, access materials, and track progress</p>
          </div>
          <div class="action-arrow">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>
      </a>

      <a href="#" class="action-card">
        <div class="action-content">
          <div class="action-icon assignments">
            <i class="fas fa-tasks"></i>
          </div>
          <div class="action-info">
            <h3 class="action-title">Assignments</h3>
            <p class="action-description">Check pending assignments and submit completed work</p>
          </div>
          <div class="action-arrow">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>
      </a>

      <a href="#" class="action-card">
        <div class="action-content">
          <div class="action-icon grades">
            <i class="fas fa-chart-bar"></i>
          </div>
          <div class="action-info">
            <h3 class="action-title">My Grades</h3>
            <p class="action-description">View your academic performance and progress reports</p>
          </div>
          <div class="action-arrow">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>
      </a>

      <a href="#" class="action-card">
        <div class="action-content">
          <div class="action-icon materials">
            <i class="fas fa-folder-open"></i>
          </div>
          <div class="action-info">
            <h3 class="action-title">Study Materials</h3>
            <p class="action-description">Access lecture notes, presentations, and resources</p>
          </div>
          <div class="action-arrow">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>
      </a>

      <a href="#" class="action-card">
        <div class="action-content">
          <div class="action-icon announcements">
            <i class="fas fa-bullhorn"></i>
          </div>
          <div class="action-info">
            <h3 class="action-title">Announcements</h3>
            <p class="action-description">Stay updated with important news and notifications</p>
          </div>
          <div class="action-arrow">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
