<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Announcements
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  :root {
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

  .announcements-page {
    background: linear-gradient(135deg, var(--bg-light) 0%, #e8f5e8 100%);
    min-height: calc(100vh - 100px);
    padding: 2rem 1rem;
  }

  .page-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    padding: 2rem;
    border-radius: var(--radius-lg);
    color: white;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
  }

  .page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
  }

  .header-content {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .header-title {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .header-title h1 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
  }

  .header-title p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
  }

  .header-title i {
    font-size: 2rem;
  }

  .btn-create {
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
  }

  .btn-create:hover {
    background: rgba(255, 255, 255, 0.3);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
  }

  .stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  .stat-card {
    background: var(--bg-card);
    border-radius: var(--radius-md);
    padding: 1.5rem;
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow-light);
    text-align: center;
  }

  .stat-card .stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
  }

  .stat-card .stat-icon i {
    color: white;
    font-size: 1.25rem;
  }

  .stat-card .stat-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-green);
  }

  .stat-card .stat-label {
    color: var(--text-secondary);
    font-size: 0.9rem;
  }

  .content-card {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow-light);
    overflow: hidden;
    margin-bottom: 1.5rem;
  }

  .card-header-green {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    padding: 1.25rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .card-header-green h5 {
    margin: 0;
    color: white;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .card-header-green .date-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    color: white;
  }

  .card-body-content {
    padding: 1.5rem;
  }

  .card-body-content p {
    color: var(--text-primary);
    line-height: 1.7;
    margin: 0;
    white-space: pre-wrap;
  }

  .card-footer-modern {
    background: #f8fafc;
    padding: 1rem 1.5rem;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .card-footer-modern .meta {
    color: var(--text-secondary);
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .btn-delete {
    background: #fee2e2;
    color: #dc2626;
    border: none;
    padding: 8px 16px;
    border-radius: var(--radius-md);
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
  }

  .btn-delete:hover {
    background: #dc2626;
    color: white;
    text-decoration: none;
  }

  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border-color);
  }

  .empty-state i {
    font-size: 4rem;
    color: var(--primary-green);
    opacity: 0.5;
    margin-bottom: 1.5rem;
  }

  .empty-state h4 {
    color: var(--text-primary);
    margin-bottom: 0.5rem;
  }

  .empty-state p {
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
  }

  .empty-state .btn-primary-green {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    color: white;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: none;
  }

  .empty-state .btn-primary-green:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
    color: white;
  }

  .alert-modern {
    padding: 1rem 1.5rem;
    border-radius: var(--radius-md);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    border: none;
  }

  .alert-success-modern {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
  }

  .alert-danger-modern {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
  }

  @media (max-width: 768px) {
    .header-content {
      flex-direction: column;
      text-align: center;
    }
    
    .header-title {
      flex-direction: column;
    }
  }
</style>

<div class="announcements-page">
  <div class="container">
    <!-- Page Header -->
    <div class="page-header">
      <div class="header-content">
        <div class="header-title">
          <i class="fas fa-bullhorn"></i>
          <div>
            <h1>Announcements</h1>
            <p>Stay updated with the latest news and updates</p>
          </div>
        </div>
        <?php if (($userRole ?? '') === 'admin' || ($userRole ?? '') === 'teacher'): ?>
          <a href="<?= base_url('announcements/create') ?>" class="btn-create">
            <i class="fas fa-plus"></i> Create Announcement
          </a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert-modern alert-success-modern">
        <i class="fas fa-check-circle"></i>
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert-modern alert-danger-modern">
        <i class="fas fa-exclamation-circle"></i>
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <!-- Stats Row -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-bullhorn"></i>
        </div>
        <div class="stat-value"><?= count($announcements ?? []) ?></div>
        <div class="stat-label">Total Announcements</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="stat-value">
          <?php 
            $thisMonth = 0;
            foreach ($announcements ?? [] as $a) {
              if (date('Y-m', strtotime($a['created_at'])) === date('Y-m')) {
                $thisMonth++;
              }
            }
            echo $thisMonth;
          ?>
        </div>
        <div class="stat-label">This Month</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clock"></i>
        </div>
        <div class="stat-value">
          <?php 
            if (!empty($announcements)) {
              echo date('M d', strtotime($announcements[0]['created_at']));
            } else {
              echo 'N/A';
            }
          ?>
        </div>
        <div class="stat-label">Latest Post</div>
      </div>
    </div>

    <!-- Announcements List -->
    <?php if (empty($announcements)): ?>
      <div class="empty-state">
        <i class="fas fa-bullhorn"></i>
        <h4>No Announcements Yet</h4>
        <p>There are no announcements to display at the moment.</p>
        <?php if (($userRole ?? '') === 'admin' || ($userRole ?? '') === 'teacher'): ?>
          <a href="<?= base_url('announcements/create') ?>" class="btn-primary-green">
            <i class="fas fa-plus"></i> Create First Announcement
          </a>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <?php foreach ($announcements as $announcement): ?>
        <div class="content-card">
          <div class="card-header-green">
            <h5>
              <i class="fas fa-bullhorn"></i>
              <?= esc($announcement['title']) ?>
            </h5>
            <span class="date-badge">
              <i class="fas fa-calendar-alt me-1"></i>
              <?= date('M d, Y', strtotime($announcement['created_at'])) ?>
            </span>
          </div>
          <div class="card-body-content">
            <p><?= nl2br(esc($announcement['content'])) ?></p>
          </div>
          <div class="card-footer-modern">
            <div class="meta">
              <i class="fas fa-clock"></i>
              Posted on <?= date('F j, Y \a\t g:i A', strtotime($announcement['created_at'])) ?>
            </div>
            <?php if (($userRole ?? '') === 'admin' || ($userRole ?? '') === 'teacher'): ?>
              <a href="<?= base_url('announcements/delete/' . $announcement['id']) ?>" 
                 class="btn-delete"
                 onclick="return confirm('Are you sure you want to delete this announcement?');">
                <i class="fas fa-trash"></i> Delete
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?= $this->endSection() ?>
