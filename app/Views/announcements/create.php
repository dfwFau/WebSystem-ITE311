<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Create Announcement
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  :root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
    --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --card-shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --border-radius: 16px;
    --transition: all 0.3s ease;
  }

  .create-announcement-page {
    background: linear-gradient(135deg, #f5f7fa 0%, #e2e8f5 100%);
    min-height: calc(100vh - 200px);
    padding: 2rem 1rem;
  }

  .create-announcement-container {
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    border-radius: var(--border-radius);
    box-shadow: var(--card-shadow);
    overflow: hidden;
    transition: var(--transition);
  }

  .create-announcement-container:hover {
    box-shadow: var(--card-shadow-hover);
  }

  .create-announcement-header {
    background: var(--primary-gradient);
    padding: 2rem;
    text-align: center;
    color: #fff;
  }

  .create-announcement-header h1 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
  }

  .create-announcement-header p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
    font-size: 1rem;
  }

  .create-announcement-body {
    padding: 2.5rem;
  }

  .form-group {
    margin-bottom: 2rem;
  }

  .form-label {
    display: block;
    margin-bottom: 0.75rem;
    font-weight: 600;
    color: #1e293b;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .form-label .required {
    color: #ef4444;
    font-size: 1.1rem;
  }

  .form-label i {
    color: #667eea;
    font-size: 1rem;
  }

  .form-control {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 1rem;
    font-family: inherit;
    background: #fff;
    transition: var(--transition);
    box-sizing: border-box;
  }

  .form-control:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    transform: translateY(-1px);
  }

  .form-control.is-invalid {
    border-color: #ef4444;
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
  }

  textarea.form-control {
    min-height: 200px;
    resize: vertical;
    line-height: 1.6;
  }

  .form-help {
    margin-top: 0.5rem;
    font-size: 0.85rem;
    color: #64748b;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .form-help i {
    font-size: 0.8rem;
  }

  .char-counter {
    font-size: 0.8rem;
    color: #94a3b8;
    text-align: right;
    margin-top: 0.25rem;
  }

  .char-counter.warning {
    color: #f59e0b;
  }

  .char-counter.danger {
    color: #ef4444;
  }

  .alert {
    padding: 1.25rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    border: none;
    font-size: 0.95rem;
  }

  .alert-danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
  }

  .alert-success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
  }

  .alert i {
    font-size: 1.2rem;
    flex-shrink: 0;
    margin-top: 0.25rem;
  }

  .alert ul {
    margin: 0.5rem 0 0 0;
    padding-left: 1.5rem;
  }

  .alert li {
    margin-bottom: 0.25rem;
  }

  .btn-group {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid #e2e8f0;
  }

  @media (max-width: 576px) {
    .btn-group {
      flex-direction: column;
    }
  }

  .btn {
    padding: 1rem 2rem;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    text-decoration: none;
    transition: var(--transition);
    min-width: 160px;
    position: relative;
    overflow: hidden;
  }

  .btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
  }

  .btn-primary {
    background: var(--primary-gradient);
    color: white;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
  }

  .btn-primary:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
  }

  .btn-secondary {
    background: #f1f5f9;
    color: #475569;
    border: 2px solid #e2e8f0;
  }

  .btn-secondary:hover:not(:disabled) {
    background: #e2e8f0;
    transform: translateY(-2px);
  }

  .back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #667eea;
    text-decoration: none;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    transition: var(--transition);
  }

  .back-link:hover {
    color: #764ba2;
    transform: translateX(-4px);
  }

  @media (max-width: 992px) {
    .create-announcement-body {
      padding: 2rem 1.5rem;
    }

    .create-announcement-header h1 {
      font-size: 1.75rem;
    }
  }

  @media (max-width: 576px) {
    .create-announcement-body {
      padding: 1.5rem 1rem;
    }

    .create-announcement-header {
      padding: 1.5rem 1rem;
    }

    .create-announcement-header h1 {
      font-size: 1.5rem;
      flex-direction: column;
      gap: 0.5rem;
    }

    .btn {
      min-width: auto;
      padding: 0.875rem 1.5rem;
    }
  }
</style>

<div class="create-announcement-page">
  <div class="create-announcement-container">
    <div class="create-announcement-header">
      <h1>
        <i class="fas fa-bullhorn"></i>
        Create New Announcement
      </h1>
      <p>Share important information with your audience</p>
    </div>

    <div class="create-announcement-body">
      <a href="<?= base_url('dashboard') ?>" class="back-link">
        <i class="fas fa-arrow-left"></i>
        Back to Dashboard
      </a>

      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
          <i class="fas fa-check-circle"></i>
          <div>
            <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
          <i class="fas fa-exclamation-circle"></i>
          <div>
            <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
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

        <div class="form-group">
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

        <div class="form-group">
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

        <div class="btn-group">
          <button type="submit" class="btn btn-primary" id="submitBtn">
            <i class="fas fa-paper-plane"></i>
            Publish Announcement
          </button>
          <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Cancel
          </a>
        </div>
      </form>
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

