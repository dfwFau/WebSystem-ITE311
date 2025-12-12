<?= $this->extend('template') ?>

<?= $this->section('title') ?>Create Announcement<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Create Announcement Dashboard Template with #73AF6F Theme */

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
  .create-announcement-dashboard {
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
    text-align: center;
  }

  .header-title {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 0.5rem;
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

  .header-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
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
    justify-content: center;
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

  .content-body {
    padding: 3rem;
  }

  /* Form Styles */
  .form-section {
    margin-bottom: 2.5rem;
  }

  .form-section:last-child {
    margin-bottom: 0;
  }

  .form-label {
    display: block;
    margin-bottom: 0.75rem;
    font-weight: 600;
    color: var(--text-primary);
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .form-label .required {
    color: #dc2626;
    font-size: 1.1rem;
  }

  .form-label i {
    color: var(--primary-green);
    font-size: 1rem;
  }

  .form-control {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-family: inherit;
    background: white;
    transition: var(--transition);
    box-sizing: border-box;
  }

  .form-control:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 4px rgba(115, 175, 111, 0.1);
    transform: translateY(-1px);
  }

  .form-control.is-invalid {
    border-color: #dc2626;
    box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
  }

  textarea.form-control {
    min-height: 250px;
    resize: vertical;
    line-height: 1.6;
  }

  .form-help {
    margin-top: 0.5rem;
    font-size: 0.85rem;
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .form-help i {
    font-size: 0.8rem;
  }

  .char-counter {
    text-align: right;
    margin-top: 0.5rem;
    font-size: 0.85rem;
    color: var(--text-secondary);
  }

  .char-counter.warning {
    color: #d97706;
  }

  .char-counter.danger {
    color: #dc2626;
  }

  /* Alert Styles */
  .alert-modern {
    padding: 1.25rem 1.5rem;
    border-radius: var(--radius-md);
    margin-bottom: 2rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    border: none;
    font-size: 0.95rem;
  }

  .alert-modern.success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
  }

  .alert-modern.danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
  }

  .alert-modern ul {
    margin: 0.5rem 0 0 0;
    padding-left: 1.5rem;
  }

  .alert-modern li {
    margin-bottom: 0.25rem;
  }

  /* Button Group */
  .btn-group-modern {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid var(--border-color);
  }

  .btn-modern {
    padding: 1rem 2.5rem;
    border: none;
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    text-decoration: none;
    transition: var(--transition);
    min-width: 180px;
    position: relative;
    overflow: hidden;
  }

  .btn-modern:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
  }

  .btn-modern.primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(115, 175, 111, 0.3);
  }

  .btn-modern.primary:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(115, 175, 111, 0.4);
  }

  .btn-modern.secondary {
    background: rgba(115, 175, 111, 0.1);
    color: var(--primary-green);
    border: 2px solid var(--primary-green);
  }

  .btn-modern.secondary:hover:not(:disabled) {
    background: var(--primary-green);
    color: white;
    transform: translateY(-2px);
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

    .content-grid {
      padding: 0 1rem;
    }

    .content-body {
      padding: 2rem 1.5rem;
    }

    .btn-group-modern {
      flex-direction: column;
      gap: 1rem;
    }

    .btn-modern {
      min-width: auto;
      width: 100%;
    }
  }

  @media (max-width: 480px) {
    .header-title {
      flex-direction: column;
      gap: 0.5rem;
    }

    .header-title h1 {
      font-size: 1.75rem;
    }

    .content-body {
      padding: 1.5rem 1rem;
    }

    .form-control {
      padding: 0.875rem 1rem;
    }

    textarea.form-control {
      min-height: 200px;
    }
  }
</style>

<div class="create-announcement-dashboard">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <div class="header-content">
      <div class="header-title">
        <i class="fas fa-bullhorn"></i>
        <h1>Create Announcement</h1>
      </div>
      <p class="header-subtitle">Share important information with your audience</p>
    </div>
  </div>

  <!-- Content Grid -->
  <div class="content-grid">
    <!-- Main Content Area -->
    <div class="main-content-card">
      <div class="content-header">
        <div class="content-title">
          <i class="fas fa-plus-circle"></i>
          New Announcement
        </div>
      </div>

      <div class="content-body">
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert-modern success">
            <i class="fas fa-check-circle"></i>
            <div>
              <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert-modern danger">
            <i class="fas fa-exclamation-circle"></i>
            <div>
              <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert-modern danger">
            <i class="fas fa-exclamation-circle"></i>
            <div>
              <strong>Please fix the following errors:</strong>
              <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                  <li><?= esc($error) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>

        <form method="POST" action="<?= base_url('announcements/create') ?>" id="createAnnouncementForm" novalidate>
          <?= csrf_field() ?>

          <div class="form-section">
            <label for="title" class="form-label">
              <i class="fas fa-heading"></i>
              Announcement Title
              <span class="required">*</span>
            </label>
            <input
              type="text"
              id="title"
              name="title"
              class="form-control"
              value="<?= old('title') ?>"
              required
              minlength="3"
              maxlength="255"
              placeholder="Enter a catchy announcement title"
            >
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Title must be between 3 and 255 characters
            </div>
            <div class="char-counter" id="titleCounter">0 / 255</div>
          </div>

          <div class="form-section">
            <label for="content" class="form-label">
              <i class="fas fa-align-left"></i>
              Announcement Content
              <span class="required">*</span>
            </label>
            <textarea
              id="content"
              name="content"
              class="form-control"
              required
              minlength="10"
              maxlength="5000"
              placeholder="Enter announcement content and details..."
            ><?= old('content') ?></textarea>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Content must be at least 10 characters long
            </div>
            <div class="char-counter" id="contentCounter">0 / 5000</div>
          </div>

          <!-- Button Group -->
          <div class="btn-group-modern">
            <button type="submit" class="btn-modern primary" id="submitBtn">
              <i class="fas fa-paper-plane"></i>
              Publish Announcement
            </button>
            <a href="<?= base_url('dashboard') ?>" class="btn-modern secondary">
              <i class="fas fa-arrow-left"></i>
              Cancel
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('createAnnouncementForm');
  const titleInput = document.getElementById('title');
  const contentInput = document.getElementById('content');
  const titleCounter = document.getElementById('titleCounter');
  const contentCounter = document.getElementById('contentCounter');
  const submitBtn = document.getElementById('submitBtn');

  // Character counters
  function updateCounter(input, counter, maxLength) {
    const length = input.value.length;
    counter.textContent = `${length} / ${maxLength}`;

    if (length > maxLength * 0.9) {
      counter.classList.add('warning');
      counter.classList.remove('danger');
    }
    if (length >= maxLength) {
      counter.classList.add('danger');
      counter.classList.remove('warning');
    } else if (length <= maxLength * 0.9) {
      counter.classList.remove('warning', 'danger');
    }
  }

  titleInput.addEventListener('input', () => updateCounter(titleInput, titleCounter, 255));
  contentInput.addEventListener('input', () => updateCounter(contentInput, contentCounter, 5000));

  // Initialize counters
  updateCounter(titleInput, titleCounter, 255);
  updateCounter(contentInput, contentCounter, 5000);

  // Form validation on submit
  form.addEventListener('submit', function(e) {
    const title = titleInput.value.trim();
    const content = contentInput.value.trim();

    if (title.length < 3) {
      e.preventDefault();
      alert('Title must be at least 3 characters long!');
      titleInput.focus();
      return false;
    }

    if (content.length < 10) {
      e.preventDefault();
      alert('Content must be at least 10 characters long!');
      contentInput.focus();
      return false;
    }

    // Disable submit button during submission
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Publishing...';
  });

  // Focus styling
  [titleInput, contentInput].forEach(input => {
    input.addEventListener('blur', function() {
      if (!this.value.trim() && this.hasAttribute('required')) {
        this.classList.add('is-invalid');
      } else {
        this.classList.remove('is-invalid');
      }
    });

    input.addEventListener('focus', function() {
      this.classList.remove('is-invalid');
    });
  });
});
</script>

<?= $this->endSection() ?>
