<?= $this->extend('template') ?>

<?= $this->section('title') ?>Admin Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Simple Dashboard Container */
  .admin-dashboard {
    background: linear-gradient(135deg, var(--gray-50) 0%, #f0f9ff 100%);
    padding: 2rem 0;
  }

  /* Welcome Section */
  .welcome-banner {
    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    padding: 2rem;
    border-radius: 12px;
    color: white;
    margin-bottom: 2rem;
    box-shadow: 0 8px 16px rgba(14, 165, 233, 0.2);
  }

  .welcome-banner h1 {
    margin: 0 0 0.5rem 0;
    font-size: 1.75rem;
    font-weight: 700;
  }

  .welcome-banner p {
    margin: 0;
    opacity: 0.95;
    font-size: 0.95rem;
  }

  /* Stats Grid */
  .stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  /* Stat Card - Simple */
  .stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border-left: 4px solid #0ea5e9;
    transition: all 0.3s ease;
  }

  .stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
  }

  .stat-card.success {
    border-left-color: #10b981;
  }

  .stat-card.warning {
    border-left-color: #f59e0b;
  }

  .stat-card.danger {
    border-left-color: #ef4444;
  }

  .stat-label {
    font-size: 0.85rem;
    color: #6b7280;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
  }

  .stat-value {
    font-size: 2rem;
    font-weight: 800;
    color: #111827;
    margin: 0;
  }

  .stat-change {
    font-size: 0.8rem;
    margin-top: 0.5rem;
  }

  .stat-change.up {
    color: #10b981;
  }

  .stat-change.down {
    color: #ef4444;
  }

  /* Content Grid */
  .content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  /* Card */
  .dashboard-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
  }

  .dashboard-card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
  }

  .card-header {
    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    padding: 1.25rem;
    color: white;
    font-size: 1.1rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .card-body {
    padding: 1.5rem;
  }

  /* Health Bars */
  .health-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #e5e7eb;
  }

  .health-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
  }

  .health-label {
    font-weight: 600;
    color: #374151;
    font-size: 0.9rem;
  }

  .health-bar {
    width: 120px;
    height: 6px;
    background: #e5e7eb;
    border-radius: 3px;
    overflow: hidden;
  }

  .health-fill {
    height: 100%;
    background: linear-gradient(90deg, #0ea5e9, #06b6d4);
    border-radius: 3px;
    transition: width 0.3s ease;
  }

  .health-percentage {
    font-weight: 700;
    color: #0ea5e9;
    font-size: 0.85rem;
    min-width: 40px;
    text-align: right;
  }

  /* Quick Actions */
  .actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 1rem;
  }

  .action-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.08) 0%, rgba(6, 182, 212, 0.08) 100%);
    border-radius: 10px;
    text-decoration: none;
    color: #0ea5e9;
    font-weight: 600;
    font-size: 0.85rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid rgba(14, 165, 233, 0.2);
  }

  .action-link:hover {
    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3);
  }

  .action-link i {
    font-size: 1.5rem;
  }

  /* Activity List */
  .activity-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
  }

  .activity-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 0.75rem 0;
    border-bottom: 1px solid #f3f4f6;
  }

  .activity-item:last-child {
    border-bottom: none;
  }

  .activity-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 1rem;
  }

  .activity-icon.user {
    background: rgba(14, 165, 233, 0.1);
    color: #0ea5e9;
  }

  .activity-icon.course {
    background: rgba(16, 185, 129, 0.1);
    color: #10b981;
  }

  .activity-icon.assignment {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
  }

  .activity-content {
    flex: 1;
  }

  .activity-title {
    font-weight: 600;
    color: #111827;
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
  }

  .activity-time {
    font-size: 0.75rem;
    color: #9ca3af;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .welcome-banner h1 {
      font-size: 1.5rem;
    }

    .stats-row {
      grid-template-columns: 1fr;
      gap: 1rem;
    }

    .content-grid {
      grid-template-columns: 1fr;
      gap: 1rem;
    }

    .actions-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .health-bar {
      width: 80px;
    }
  }
</style>

<div class="admin-dashboard">
  <!-- Welcome Banner -->
  <div class="welcome-banner">
    <h1>Welcome back, Admin! 👋</h1>
    <p>Manage your system and view key metrics at a glance</p>
  </div>

  <!-- Stats Grid -->
  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-label">Total Users</div>
      <div class="stat-value">1,247</div>
      <div class="stat-change up">↑ 12% from last month</div>
    </div>

    <div class="stat-card success">
      <div class="stat-label">Active Courses</div>
      <div class="stat-value">48</div>
      <div class="stat-change up">↑ 8% from last month</div>
    </div>

    <div class="stat-card warning">
      <div class="stat-label">Assignments</div>
      <div class="stat-value">324</div>
      <div class="stat-change down">↓ 3% from last month</div>
    </div>

    <div class="stat-card danger">
      <div class="stat-label">Pending Issues</div>
      <div class="stat-value">18</div>
      <div class="stat-change up">↑ 2% from last week</div>
    </div>
  </div>

  <!-- Content Grid -->
  <div class="content-grid">
    <!-- Quick Actions Card -->
    <div class="dashboard-card">
      <div class="card-header">
        <i class="fas fa-rocket"></i>
        <span>Quick Actions</span>
      </div>
      <div class="card-body">
        <div class="actions-grid">
          <a href="<?= base_url('/manageusers') ?>" class="action-link">
            <i class="fas fa-user-plus"></i>
            <span>Manage Users</span>
          </a>
          <a href="<?= base_url('/courses') ?>" class="action-link">
            <i class="fas fa-graduation-cap"></i>
            <span>View Courses</span>
          </a>
          <a href="<?= base_url('/admin/reports') ?>" class="action-link">
            <i class="fas fa-chart-bar"></i>
            <span>View Reports</span>
          </a>
          <a href="<?= base_url('/admin/settings') ?>" class="action-link">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
          </a>
        </div>
      </div>
    </div>

    <!-- System Health Card -->
    <div class="dashboard-card">
      <div class="card-header">
        <i class="fas fa-heartbeat"></i>
        <span>System Health</span>
      </div>
      <div class="card-body">
        <div class="health-item">
          <span class="health-label">Database</span>
          <div class="health-bar">
            <div class="health-fill" style="width: 95%;"></div>
          </div>
          <span class="health-percentage">95%</span>
        </div>
        <div class="health-item">
          <span class="health-label">Server</span>
          <div class="health-bar">
            <div class="health-fill" style="width: 88%;"></div>
          </div>
          <span class="health-percentage">88%</span>
        </div>
        <div class="health-item">
          <span class="health-label">Storage</span>
          <div class="health-bar">
            <div class="health-fill" style="width: 65%;"></div>
          </div>
          <span class="health-percentage">65%</span>
        </div>
        <div class="health-item">
          <span class="health-label">Uptime</span>
          <div class="health-bar">
            <div class="health-fill" style="width: 99%;"></div>
          </div>
          <span class="health-percentage">99%</span>
        </div>
      </div>
    </div>

    <!-- Recent Activity Card -->
    <div class="dashboard-card">
      <div class="card-header">
        <i class="fas fa-list"></i>
        <span>Recent Activity</span>
      </div>
      <div class="card-body">
        <div class="activity-list">
          <div class="activity-item">
            <div class="activity-icon user">
              <i class="fas fa-user-check"></i>
            </div>
            <div class="activity-content">
              <div class="activity-title">New User Registered</div>
              <div class="activity-time">2 hours ago</div>
            </div>
          </div>

          <div class="activity-item">
            <div class="activity-icon course">
              <i class="fas fa-book"></i>
            </div>
            <div class="activity-content">
              <div class="activity-title">Course Published</div>
              <div class="activity-time">4 hours ago</div>
            </div>
          </div>

          <div class="activity-item">
            <div class="activity-icon assignment">
              <i class="fas fa-tasks"></i>
            </div>
            <div class="activity-content">
              <div class="activity-title">45 Assignments Submitted</div>
              <div class="activity-time">6 hours ago</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
