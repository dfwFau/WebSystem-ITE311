<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Create New Course
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Create Course Template with #73AF6F Theme */

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

  .create-course-page {
    background: linear-gradient(135deg, var(--background-light) 0%, #e8f5e8 100%);
    min-height: calc(100vh - 200px);
    padding: 2rem 1rem;
  }

  .create-course-container {
    max-width: 1000px;
    margin: 0 auto;
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: var(--transition);
  }

  .create-course-container:hover {
    box-shadow: var(--shadow-hover);
  }

  .create-course-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    padding: 2rem;
    text-align: center;
    color: #fff;
    position: relative;
    overflow: hidden;
  }

  .create-course-header::before {
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

  .create-course-header h2 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    position: relative;
    z-index: 1;
  }

  .create-course-header p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
    font-size: 1rem;
    position: relative;
    z-index: 1;
  }

  .create-course-body {
    padding: 2.5rem;
  }

  .form-group {
    margin-bottom: 2rem;
  }

  .form-label {
    display: block;
    margin-bottom: 0.75rem;
    font-weight: 600;
    color: var(--text-primary);
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
    color: var(--primary-green);
    font-size: 1rem;
  }

  .form-control, .form-select {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-family: inherit;
    background: #fff;
    transition: var(--transition);
    box-sizing: border-box;
  }

  .form-control:focus, .form-select:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 4px rgba(115, 175, 111, 0.1);
    transform: translateY(-1px);
  }

  .form-control.is-invalid, .form-select.is-invalid {
    border-color: #ef4444;
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
  }

  .form-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.75rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 3rem;
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

  .alert {
    padding: 1.25rem 1.5rem;
    border-radius: var(--radius-md);
    margin-bottom: 2rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    border: none;
  }

  .alert-success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
  }

  .alert-danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
  }

  .alert-info {
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    color: #1e40af;
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
    border-top: 1px solid var(--border-color);
  }

  @media (max-width: 576px) {
    .btn-group {
      flex-direction: column;
    }
  }

  .btn {
    padding: 1rem 2rem;
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
    min-width: 150px;
    position: relative;
    overflow: hidden;
  }

  .btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
  }

  .btn-success {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(115, 175, 111, 0.3);
  }

  .btn-success:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(115, 175, 111, 0.4);
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

  @media (max-width: 992px) {
    .create-course-body {
      padding: 2rem 1.5rem;
    }

    .create-course-header h2 {
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

    .create-course-header h2 {
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

<div class="create-course-page">
  <div class="create-course-container">
    <div class="create-course-header">
      <h2>
        <i class="fas fa-plus-circle"></i>
        Create New Course
      </h2>
      <p>Add a new course to the system</p>
    </div>

    <div class="create-course-body">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
          <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
          <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
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

      <form method="POST" action="<?= base_url('courses/create') ?>">
        <?= csrf_field() ?>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="course_number" class="form-label">
              <i class="fas fa-book"></i>
              Course Code & Name
              <span class="required">*</span>
            </label>
            <input type="text" id="course_number" name="course_number"
                   class="form-control <?= session('errors') && isset(session('errors')['course_number']) ? 'is-invalid' : '' ?>"
                   value="<?= old('course_number') ?>"
                   placeholder="e.g., CS101 - Introduction to Computer Science" required>
            <?php if (session('errors') && isset(session('errors')['course_number'])): ?>
              <div class="form-help">
                <i class="fas fa-exclamation-triangle"></i>
                <?= session('errors')['course_number'] ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="col-md-6 mb-3">
            <label for="units" class="form-label">
              <i class="fas fa-graduation-cap"></i>
              Units
            </label>
            <select id="units" name="units" class="form-select">
              <option value="3" <?= old('units') == '3' || old('units') == '' ? 'selected' : '' ?>>3 Units</option>
              <option value="1" <?= old('units') == '1' ? 'selected' : '' ?>>1 Unit</option>
              <option value="2" <?= old('units') == '2' ? 'selected' : '' ?>>2 Units</option>
              <option value="4" <?= old('units') == '4' ? 'selected' : '' ?>>4 Units</option>
              <option value="5" <?= old('units') == '5' ? 'selected' : '' ?>>5 Units</option>
              <option value="6" <?= old('units') == '6' ? 'selected' : '' ?>>6 Units</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="academic_year" class="form-label">
              <i class="fas fa-calendar-alt"></i>
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
          </div>

          <div class="col-md-6 mb-3">
            <label for="semester" class="form-label">
              <i class="fas fa-calendar-week"></i>
              Semester
            </label>
            <select id="semester" name="semester" class="form-select">
              <option value="">Select semester</option>
              <option value="First Semester" <?= old('semester') == 'First Semester' ? 'selected' : '' ?>>First Semester</option>
              <option value="Second Semester" <?= old('semester') == 'Second Semester' ? 'selected' : '' ?>>Second Semester</option>
              <option value="Summer" <?= old('semester') == 'Summer' ? 'selected' : '' ?>>Summer</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="term" class="form-label">
              <i class="fas fa-clock"></i>
              Term
            </label>
            <select id="term" name="term" class="form-select">
              <option value="">Select term</option>
              <option value="Prelim" <?= old('term') == 'Prelim' ? 'selected' : '' ?>>Prelim</option>
              <option value="Midterm" <?= old('term') == 'Midterm' ? 'selected' : '' ?>>Midterm</option>
              <option value="Final" <?= old('term') == 'Final' ? 'selected' : '' ?>>Final</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="schedule_time" class="form-label">
              <i class="fas fa-clock"></i>
              Schedule Time
            </label>
            <select id="schedule_time" name="schedule_time" class="form-select">
              <option value="">Select time</option>
              <option value="07:00" <?= old('schedule_time') == '07:00' ? 'selected' : '' ?>>7:00 AM</option>
              <option value="08:00" <?= old('schedule_time') == '08:00' ? 'selected' : '' ?>>8:00 AM</option>
              <option value="09:00" <?= old('schedule_time') == '09:00' ? 'selected' : '' ?>>9:00 AM</option>
              <option value="10:00" <?= old('schedule_time') == '10:00' ? 'selected' : '' ?>>10:00 AM</option>
              <option value="11:00" <?= old('schedule_time') == '11:00' ? 'selected' : '' ?>>11:00 AM</option>
              <option value="12:00" <?= old('schedule_time') == '12:00' ? 'selected' : '' ?>>12:00 PM</option>
              <option value="13:00" <?= old('schedule_time') == '13:00' ? 'selected' : '' ?>>1:00 PM</option>
              <option value="14:00" <?= old('schedule_time') == '14:00' ? 'selected' : '' ?>>2:00 PM</option>
              <option value="15:00" <?= old('schedule_time') == '15:00' ? 'selected' : '' ?>>3:00 PM</option>
              <option value="16:00" <?= old('schedule_time') == '16:00' ? 'selected' : '' ?>>4:00 PM</option>
              <option value="17:00" <?= old('schedule_time') == '17:00' ? 'selected' : '' ?>>5:00 PM</option>
              <option value="18:00" <?= old('schedule_time') == '18:00' ? 'selected' : '' ?>>6:00 PM</option>
              <option value="19:00" <?= old('schedule_time') == '19:00' ? 'selected' : '' ?>>7:00 PM</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="schedule_date" class="form-label">
              <i class="fas fa-calendar-day"></i>
              Schedule Day
            </label>
            <select id="schedule_date" name="schedule_date" class="form-select">
              <option value="">Select day</option>
              <option value="Monday" <?= old('schedule_date') == 'Monday' ? 'selected' : '' ?>>Monday</option>
              <option value="Tuesday" <?= old('schedule_date') == 'Tuesday' ? 'selected' : '' ?>>Tuesday</option>
              <option value="Wednesday" <?= old('schedule_date') == 'Wednesday' ? 'selected' : '' ?>>Wednesday</option>
              <option value="Thursday" <?= old('schedule_date') == 'Thursday' ? 'selected' : '' ?>>Thursday</option>
              <option value="Friday" <?= old('schedule_date') == 'Friday' ? 'selected' : '' ?>>Friday</option>
              <option value="Saturday" <?= old('schedule_date') == 'Saturday' ? 'selected' : '' ?>>Saturday</option>
              <option value="Sunday" <?= old('schedule_date') == 'Sunday' ? 'selected' : '' ?>>Sunday</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label for="description" class="form-label">
              <i class="fas fa-align-left"></i>
              Description
            </label>
            <textarea id="description" name="description" class="form-control"
                      placeholder="Enter course description (optional)"
                      maxlength="500"><?= old('description') ?></textarea>
          </div>

          <?php if ($userRole === 'admin'): ?>
          <div class="col-12 mb-3">
            <label for="teacher_id" class="form-label">
              <i class="fas fa-chalkboard-teacher"></i>
              Assign to Teacher
              <span class="required">*</span>
            </label>
            <select id="teacher_id" name="teacher_id"
                    class="form-select <?= session('errors') && isset(session('errors')['teacher_id']) ? 'is-invalid' : '' ?>" required>
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
            <?php if (session('errors') && isset(session('errors')['teacher_id'])): ?>
              <div class="form-help">
                <i class="fas fa-exclamation-triangle"></i>
                <?= session('errors')['teacher_id'] ?>
              </div>
            <?php endif; ?>
          </div>
          <?php elseif ($userRole === 'teacher'): ?>
          <div class="col-12 mb-3">
            <div class="alert alert-info">
              <i class="fas fa-info-circle"></i> This course will be assigned to you as the instructor.
            </div>
          </div>
          <?php endif; ?>
        </div>

        <div class="btn-group">
          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Create Course
          </button>
          <a href="<?= base_url('courses') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</div>



<?= $this->endSection() ?>
