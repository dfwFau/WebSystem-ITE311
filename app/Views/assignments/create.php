<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Create Assignment
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

  .create-assignment-page {
    background: linear-gradient(135deg, #f5f7fa 0%, #e2e8f5 100%);
    min-height: calc(100vh - 200px);
    padding: 2rem 1rem;
  }

  .create-assignment-card {
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    border-radius: var(--border-radius);
    box-shadow: var(--card-shadow);
    overflow: hidden;
    transition: var(--transition);
  }

  .create-assignment-card:hover {
    box-shadow: var(--card-shadow-hover);
  }

  .create-assignment-header {
    background: var(--primary-gradient);
    padding: 2rem;
    text-align: center;
    color: #fff;
  }

  .create-assignment-header h1 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
  }

  .create-assignment-header p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
    font-size: 1rem;
  }

  .create-assignment-body {
    padding: 2.5rem;
  }

  .form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
  }

  @media (max-width: 768px) {
    .form-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
  }

  .form-group {
    margin-bottom: 2rem;
  }

  .form-group.full-width {
    grid-column: 1 / -1;
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
    min-height: 150px;
    resize: vertical;
    line-height: 1.5;
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

  .file-input-wrapper {
    position: relative;
    display: inline-block;
    width: 100%;
  }

  .file-input-label {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 2rem;
    border: 2px dashed #e2e8f0;
    border-radius: 12px;
    background: #f8fafc;
    cursor: pointer;
    transition: var(--transition);
    gap: 0.75rem;
  }

  .file-input-label:hover {
    border-color: #667eea;
    background: #f0f4ff;
  }

  .file-input-label i {
    font-size: 1.5rem;
    color: #667eea;
  }

  #assignment_file {
    display: none;
  }

  .file-name {
    margin-top: 0.75rem;
    padding: 0.75rem 1rem;
    background: #d1fae5;
    color: #065f46;
    border-radius: 8px;
    font-size: 0.9rem;
    display: none;
  }

  .file-name.show {
    display: block;
  }

  .alert-modern {
    padding: 1.25rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    border: none;
    font-size: 0.95rem;
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

  .btn-group-modern {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid #e2e8f0;
  }

  @media (max-width: 576px) {
    .btn-group-modern {
      flex-direction: column;
    }
  }

  .btn-modern {
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

  .btn-modern:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
  }

  .btn-modern.primary {
    background: var(--primary-gradient);
    color: #fff;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
  }

  .btn-modern.primary:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
  }

  .btn-modern.secondary {
    background: #f1f5f9;
    color: #475569;
    border: 2px solid #e2e8f0;
  }

  .btn-modern.secondary:hover:not(:disabled) {
    background: #e2e8f0;
    transform: translateY(-2px);
  }

  @media (max-width: 992px) {
    .create-assignment-body {
      padding: 2rem 1.5rem;
    }

    .create-assignment-header h1 {
      font-size: 1.75rem;
    }
  }

  @media (max-width: 576px) {
    .create-assignment-body {
      padding: 1.5rem 1rem;
    }

    .create-assignment-header {
      padding: 1.5rem 1rem;
    }

    .create-assignment-header h1 {
      font-size: 1.5rem;
      flex-direction: column;
      gap: 0.5rem;
    }

    .btn-modern {
      min-width: auto;
      padding: 0.875rem 1.5rem;
    }
  }
</style>

<div class="create-assignment-page">
  <div class="create-assignment-card">
    <div class="create-assignment-header">
      <h1>
        <i class="fas fa-tasks"></i>
        Post New Assignment
      </h1>
      <p>Create and manage assignment for your students</p>
    </div>

    <div class="create-assignment-body">
      <?php if (isset($validation) && $validation->hasErrors()): ?>
        <div class="alert-modern danger">
          <i class="fas fa-exclamation-circle"></i>
          <div>
            <strong>Please fix the following errors:</strong>
            <ul>
              <?php foreach ($validation->getErrors() as $error): ?>
                <li><?= esc($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('assignments/create/' . $course['id']) ?>" method="post" enctype="multipart/form-data" id="createAssignmentForm" novalidate>
        <?= csrf_field() ?>

        <div class="form-grid">
          <!-- Assignment Title -->
          <div class="form-group full-width">
            <label for="title" class="form-label">
              <i class="fas fa-heading"></i>
              Assignment Title
              <span class="required">*</span>
            </label>
            <input 
              type="text" 
              id="title" 
              name="title" 
              class="form-control" 
              value="<?= old('title') ?>"
              placeholder="Enter assignment title"
              required
              minlength="3"
              maxlength="200"
            >
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Title must be between 3 and 200 characters
            </div>
          </div>

          <!-- Description -->
          <div class="form-group full-width">
            <label for="description" class="form-label">
              <i class="fas fa-align-left"></i>
              Description
            </label>
            <textarea 
              id="description" 
              name="description" 
              class="form-control"
              placeholder="Enter assignment description and instructions..."
              maxlength="2000"
            ><?= old('description') ?></textarea>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Provide clear instructions for your students
            </div>
          </div>

          <!-- Due Date -->
          <div class="form-group">
            <label for="due_date" class="form-label">
              <i class="fas fa-calendar"></i>
              Due Date & Time
            </label>
            <input 
              type="datetime-local" 
              id="due_date" 
              name="due_date" 
              class="form-control"
              value="<?= old('due_date') ?>"
            >
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Set when the assignment is due
            </div>
          </div>

          <!-- Assignment File -->
          <div class="form-group">
            <label for="assignment_file" class="form-label">
              <i class="fas fa-file-upload"></i>
              Attachment (Optional)
            </label>
            <div class="file-input-wrapper">
              <label for="assignment_file" class="file-input-label">
                <i class="fas fa-cloud-upload-alt"></i>
                <span>Click to upload or drag and drop</span>
              </label>
              <input 
                type="file" 
                id="assignment_file" 
                name="assignment_file" 
                accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png"
              >
              <div id="fileName" class="file-name">
                <i class="fas fa-check-circle"></i>
                <span id="fileNameText"></span>
              </div>
            </div>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              PDF, DOC, DOCX, TXT, JPG, PNG. Max: 10MB
            </div>
          </div>
        </div>

        <!-- Button Group -->
        <div class="btn-group-modern">
          <button type="submit" class="btn-modern primary">
            <i class="fas fa-save"></i>
            Post Assignment
          </button>
          <a href="<?= base_url('assignments/course/' . $course['id']) ?>" class="btn-modern secondary">
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
  const fileInput = document.getElementById('assignment_file');
  const fileNameDisplay = document.getElementById('fileName');
  const fileNameText = document.getElementById('fileNameText');

  // File input change handler
  fileInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
      fileNameText.textContent = this.files[0].name;
      fileNameDisplay.classList.add('show');
    } else {
      fileNameDisplay.classList.remove('show');
    }
  });

  // Drag and drop functionality
  const fileInputLabel = document.querySelector('.file-input-label');
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    fileInputLabel.addEventListener(eventName, preventDefaults, false);
  });

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  ['dragenter', 'dragover'].forEach(eventName => {
    fileInputLabel.addEventListener(eventName, () => {
      fileInputLabel.style.borderColor = '#667eea';
      fileInputLabel.style.background = '#f0f4ff';
    });
  });

  ['dragleave', 'drop'].forEach(eventName => {
    fileInputLabel.addEventListener(eventName, () => {
      fileInputLabel.style.borderColor = '#e2e8f0';
      fileInputLabel.style.background = '#f8fafc';
    });
  });

  fileInputLabel.addEventListener('drop', (e) => {
    const dt = e.dataTransfer;
    const files = dt.files;
    fileInput.files = files;
    
    if (files && files[0]) {
      fileNameText.textContent = files[0].name;
      fileNameDisplay.classList.add('show');
    }
  });

  // Form validation
  const form = document.getElementById('createAssignmentForm');
  form.addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();
    
    if (title.length < 3) {
      e.preventDefault();
      alert('Assignment title must be at least 3 characters long!');
      document.getElementById('title').focus();
    }
  });
});
</script>

<?= $this->endSection() ?>
