<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Create New Course
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

  .create-course-page {
    background: linear-gradient(135deg, #f5f7fa 0%, #e2e8f5 100%);
    min-height: calc(100vh - 200px);
    padding: 2rem 1rem;
  }

  .create-course-card {
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    border-radius: var(--border-radius);
    box-shadow: var(--card-shadow);
    overflow: hidden;
    transition: var(--transition);
  }

  .create-course-card:hover {
    box-shadow: var(--card-shadow-hover);
  }

  .create-course-header {
    background: var(--primary-gradient);
    padding: 2rem;
    text-align: center;
    color: #fff;
  }

  .create-course-header h1 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
  }

  .create-course-header p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
    font-size: 1rem;
  }

  .create-course-body {
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

  .form-control.is-valid {
    border-color: #10b981;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
  }

  .form-control.is-invalid {
    border-color: #ef4444;
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
  }

  textarea.form-control {
    min-height: 120px;
    resize: vertical;
    line-height: 1.5;
  }

  .form-select {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 1rem;
    background: #fff;
    cursor: pointer;
    transition: var(--transition);
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.75rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 3rem;
  }

  .form-select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    transform: translateY(-1px);
  }

  .form-select.is-valid {
    border-color: #10b981;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
  }

  .form-select.is-invalid {
    border-color: #ef4444;
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
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

  .validation-message {
    margin-top: 0.5rem;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    opacity: 0;
    transform: translateY(-10px);
    transition: var(--transition);
  }

  .validation-message.show {
    opacity: 1;
    transform: translateY(0);
  }

  .validation-message.success {
    color: #059669;
  }

  .validation-message.error {
    color: #dc2626;
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

  .alert-modern.success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
  }

  .alert-modern.danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
  }

  .alert-modern i {
    font-size: 1.2rem;
    flex-shrink: 0;
    margin-top: 0.25rem;
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

  .btn-spinner {
    display: none;
    width: 1rem;
    height: 1rem;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top-color: #fff;
    animation: spin 1s ease-in-out infinite;
  }

  .btn-modern.loading .btn-text {
    opacity: 0;
  }

  .btn-modern.loading .btn-spinner {
    display: block;
  }

  @keyframes spin {
    to { transform: rotate(360deg); }
  }

  @media (max-width: 992px) {
    .create-course-body {
      padding: 2rem 1.5rem;
    }

    .create-course-header h1 {
      font-size: 1.75rem;
    }
  }

  @media (max-width: 576px) {
    .create-course-body {
      padding: 1.5rem 1rem;
    }

    .create-course-header {
      padding: 1.5rem 1rem;
    }

    .create-course-header h1 {
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

<div class="create-course-page">
  <div class="create-course-card">
    <div class="create-course-header">
      <h1>
        <i class="fas fa-graduation-cap"></i>
        Create New Course
      </h1>
      <p>Fill in the details below to create a new course</p>
    </div>

    <div class="create-course-body">
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

      <form method="POST" action="<?= base_url('courses/create') ?>" id="createCourseForm" novalidate>
        <?= csrf_field() ?>

        <div class="form-grid">
          <!-- Course Number (CN) -->
          <div class="form-group full-width">
            <label for="course_number" class="form-label">
              <i class="fas fa-hashtag"></i>
              CN (Course Code & Name)
              <span class="required">*</span>
            </label>
            
            <input
              type="text"
              id="course_number"
              name="course_number"
              class="form-control <?= session('errors') && isset(session('errors')['course_number']) ? 'is-invalid' : '' ?>"
              value="<?= old('course_number') ?>"
              placeholder="e.g., CS101 - Introduction to Computer Science"
              required
              minlength="5"
              maxlength="200"
            >
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Enter course code, dash, and course name (e.g., CS101 - Intro to CS)
            </div>
            <?php if (session('errors') && isset(session('errors')['course_number'])): ?>
              <div class="validation-message show error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?= session('errors')['course_number'] ?></span>
              </div>
            <?php endif; ?>
          </div>

          <!-- Units -->
          <div class="form-group">
            <label for="units" class="form-label">
              <i class="fas fa-calculator"></i>
              Units
            </label>
            <select id="units" name="units" class="form-select">
              <option value="1" <?= old('units') == '1' ? 'selected' : '' ?>>1 Unit</option>
              <option value="2" <?= old('units') == '2' ? 'selected' : '' ?>>2 Units</option>
              <option value="3" <?= old('units') == '3' || old('units') == '' ? 'selected' : '' ?>>3 Units (Default)</option>
              <option value="4" <?= old('units') == '4' ? 'selected' : '' ?>>4 Units</option>
              <option value="5" <?= old('units') == '5' ? 'selected' : '' ?>>5 Units</option>
              <option value="6" <?= old('units') == '6' ? 'selected' : '' ?>>6 Units</option>
            </select>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Credit units for this course
            </div>
          </div>

          <!-- Academic Year -->
          <div class="form-group">
            <label for="academic_year" class="form-label">
              <i class="fas fa-calendar"></i>
              Academic Year
            </label>
            <select id="academic_year" name="academic_year" class="form-select">
              <option value="">Select academic year</option>
              <?php
              $currentYear = date('Y');
              for ($i = 0; $i <= 5; $i++) {
                $startYear = $currentYear + $i;
                $endYear = $startYear + 1;
                $yearRange = $startYear . '-' . $endYear;
                $selected = old('academic_year') == $yearRange ? 'selected' : '';
                echo "<option value='{$yearRange}' {$selected}>{$yearRange}</option>";
              }
              ?>
            </select>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Select academic year (current year or future)
            </div>
          </div>

          <!-- Semester -->
          <div class="form-group">
            <label for="semester" class="form-label">
              <i class="fas fa-divisions"></i>
              Semester
            </label>
            <select id="semester" name="semester" class="form-select">
              <option value="">Select semester</option>
              <option value="First Semester" <?= old('semester') == 'First Semester' ? 'selected' : '' ?>>First Semester</option>
              <option value="Second Semester" <?= old('semester') == 'Second Semester' ? 'selected' : '' ?>>Second Semester</option>
              <option value="Summer" <?= old('semester') == 'Summer' ? 'selected' : '' ?>>Summer</option>
            </select>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Course semester
            </div>
          </div>

          <!-- Term -->
          <div class="form-group">
            <label for="term" class="form-label">
              <i class="fas fa-stopwatch"></i>
              Term
            </label>
            <select id="term" name="term" class="form-select">
              <option value="">Select term</option>
              <option value="Prelim" <?= old('term') == 'Prelim' ? 'selected' : '' ?>>Prelim</option>
              <option value="Midterm" <?= old('term') == 'Midterm' ? 'selected' : '' ?>>Midterm</option>
              <option value="Final" <?= old('term') == 'Final' ? 'selected' : '' ?>>Final</option>
            </select>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Course term
            </div>
          </div>

          <!-- Schedule Time -->
          <div class="form-group">
            <label for="schedule_time" class="form-label">
              <i class="fas fa-clock"></i>
              Schedule (Time)
            </label>
            <input
              type="time"
              id="schedule_time"
              name="schedule_time"
              class="form-control"
              value="<?= old('schedule_time') ?>"
            >
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Class start time
            </div>
          </div>

          <!-- Schedule Date -->
          <div class="form-group">
            <label for="schedule_date" class="form-label">
              <i class="fas fa-calendar-alt"></i>
              Schedule (Date)
            </label>
            <input
              type="date"
              id="schedule_date"
              name="schedule_date"
              class="form-control"
              value="<?= old('schedule_date') ?>"
              min="<?= date('Y') . '-01-01' ?>"
            >
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Class date
            </div>
          </div>

          <!-- Description -->
              Full name of the course (3-150 characters)
            </div>
            <?php if (session('errors') && isset(session('errors')['course_name'])): ?>
              <div class="validation-message show error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?= session('errors')['course_name'] ?></span>
              </div>
            <?php endif; ?>
          </div>

          <!-- Description -->
            <label for="description" class="form-label">
              <i class="fas fa-align-left"></i>
              Description
            </label>
            <textarea
              id="description"
              name="description"
              class="form-control <?= session('errors') && isset(session('errors')['description']) ? 'is-invalid' : '' ?>"
              placeholder="Enter course description (optional)"
              maxlength="500"
            ><?= old('description') ?></textarea>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Brief description of the course content
            </div>
            <div class="char-counter" id="description_counter">0 / 500</div>
            <?php if (session('errors') && isset(session('errors')['description'])): ?>
              <div class="validation-message show error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?= session('errors')['description'] ?></span>
              </div>
            <?php endif; ?>
          </div>

          <!-- Teacher Selection (Admin Only) -->
          <?php if ($userRole === 'admin'): ?>
          <div class="form-group full-width">
            <label for="teacher_id" class="form-label">
              <i class="fas fa-user-graduate"></i>
              Assign to Teacher
              <span class="required">*</span>
            </label>
            <select id="teacher_id" name="teacher_id" class="form-select <?= session('errors') && isset(session('errors')['teacher_id']) ? 'is-invalid' : '' ?>" required>
              <option value="">Select a teacher</option>
              <?php
              $db = \Config\Database::connect();
              $teachers = $db->table('users')
                  ->select('users.id, users.name, users.email')
                  ->join('roles', 'roles.id = users.role_id')
                  ->where('roles.role_name', 'teacher')
                  ->where('users.deleted_at', null)
                  ->orderBy('users.name')
                  ->get()
                  ->getResultArray();

              foreach ($teachers as $teacher):
              ?>
                <option value="<?= $teacher['id'] ?>" <?= old('teacher_id') == $teacher['id'] ? 'selected' : '' ?>>
                  <?= esc($teacher['name']) ?> (<?= esc($teacher['email']) ?>)
                </option>
              <?php endforeach; ?>
            </select>
            <div class="form-help">
              <i class="fas fa-info-circle"></i>
              Select the teacher who will manage this course
            </div>
            <?php if (session('errors') && isset(session('errors')['teacher_id'])): ?>
              <div class="validation-message show error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?= session('errors')['teacher_id'] ?></span>
              </div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>

        <!-- Button Group -->
        <div class="btn-group-modern">
          <button type="submit" class="btn-modern primary" id="submitBtn">
            <span class="btn-spinner" id="btnSpinner"></span>
            <span class="btn-text">
              <i class="fas fa-save"></i>
              Create Course
            </span>
          </button>
          <a href="<?= base_url('courses') ?>" class="btn-modern secondary">
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
  const form = document.getElementById('createCourseForm');
  const submitBtn = document.getElementById('submitBtn');
  const descriptionInput = document.getElementById('description');
  const descriptionCounter = document.getElementById('description_counter');

  // Character counter for description
  function updateCharCounter() {
    const length = descriptionInput.value.length;
    const max = 500;
    descriptionCounter.textContent = `${length} / ${max}`;

    if (length > max * 0.9) {
      descriptionCounter.classList.add('warning');
      descriptionCounter.classList.remove('danger');
    }
    if (length >= max) {
      descriptionCounter.classList.add('danger');
      descriptionCounter.classList.remove('warning');
    } else if (length <= max * 0.9) {
      descriptionCounter.classList.remove('warning', 'danger');
    }
  }

  descriptionInput.addEventListener('input', updateCharCounter);
  updateCharCounter();

  // Form validation
  form.addEventListener('submit', function(e) {
    const courseCode = document.getElementById('course_code').value.trim();
    const courseName = document.getElementById('course_name').value.trim();
    const teacherId = document.getElementById('teacher_id')?.value;
    const scheduleDate = document.getElementById('schedule_date').value;
    const scheduleTime = document.getElementById('schedule_time').value;

    let isValid = true;

    // Validate course code
    if (!courseCode || courseCode.length < 2) {
      e.preventDefault();
      alert('Course code must be at least 2 characters!');
      document.getElementById('course_code').focus();
      isValid = false;
    }

    // Validate course name
    if (!courseName || courseName.length < 3) {
      if (isValid) {
        e.preventDefault();
        alert('Course name must be at least 3 characters!');
        document.getElementById('course_name').focus();
      }
      isValid = false;
    }

    // Validate schedule date
    if (scheduleDate) {
      const selectedDate = new Date(scheduleDate);
      const currentYear = new Date().getFullYear();
      const selectedYear = selectedDate.getFullYear();
      
      if (selectedYear < currentYear) {
        if (isValid) {
          e.preventDefault();
          alert('Schedule date cannot be from a previous year. Please select a date from the current year or later!');
          document.getElementById('schedule_date').focus();
        }
        isValid = false;
      }
    }

    // Validate schedule time
    if (scheduleTime === '') {
      if (isValid) {
        e.preventDefault();
        alert('Schedule time is required! Please select a time.');
        document.getElementById('schedule_time').focus();
      }
      isValid = false;
    }

    // Validate teacher if admin
    if (document.getElementById('teacher_id') && !teacherId) {
      if (isValid) {
        e.preventDefault();
        alert('Please select a teacher!');
        document.getElementById('teacher_id').focus();
      }
      isValid = false;
    }

    if (isValid) {
      submitBtn.disabled = true;
      submitBtn.classList.add('loading');
    }
  });
});
</script>

<?= $this->endSection() ?>

