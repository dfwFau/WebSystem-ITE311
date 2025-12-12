<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Add New User
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Create User Template with #73AF6F Theme */

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

  .add-user-page {
    background: linear-gradient(135deg, var(--background-light) 0%, #e8f5e8 100%);
    min-height: calc(100vh - 200px);
    padding: 2rem 1rem;
  }

  .add-user-container {
    max-width: 700px;
    margin: 0 auto;
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: var(--transition);
  }

  .add-user-container:hover {
    box-shadow: var(--shadow-hover);
  }

  .add-user-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    padding: 2rem;
    text-align: center;
    color: #fff;
    position: relative;
    overflow: hidden;
  }

  .add-user-header::before {
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

  .add-user-header h2 {
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

  .add-user-header p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
    font-size: 1rem;
    position: relative;
    z-index: 1;
  }

  .add-user-body {
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

  .form-control {
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

  .form-control:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 4px rgba(115, 175, 111, 0.1);
    transform: translateY(-1px);
  }

  .form-control.is-invalid {
    border-color: #ef4444;
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
  }

  .form-select {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
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
    border-color: var(--primary-green);
    box-shadow: 0 0 0 4px rgba(115, 175, 111, 0.1);
    transform: translateY(-1px);
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

  .password-info {
    padding: 1.25rem 1.5rem;
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    border: 2px solid #93c5fd;
    border-radius: 12px;
    color: #1e40af;
    margin-bottom: 2rem;
    display: none;
    align-items: center;
    gap: 1rem;
    animation: slideDown 0.3s ease;
  }

  .password-info.show {
    display: flex;
  }

  .password-info i {
    font-size: 1.25rem;
    flex-shrink: 0;
  }

  .password-info-text {
    flex: 1;
  }

  .password-info-text strong {
    display: block;
    margin-bottom: 0.25rem;
  }

  .password-display {
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    background: rgba(255, 255, 255, 0.8);
    padding: 0.5rem 0.75rem;
    border-radius: 6px;
    display: inline-block;
    margin-top: 0.5rem;
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
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
    border-top: 1px solid #001339ff;
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
    min-width: 150px;
    position: relative;
    overflow: hidden;
  }

  .btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
  }

  .btn-primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(115, 175, 111, 0.3);
  }

  .btn-primary:hover:not(:disabled) {
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
    .add-user-body {
      padding: 2rem 1.5rem;
    }

    .add-user-header h2 {
      font-size: 1.75rem;
    }
  }

  @media (max-width: 576px) {
    .add-user-body {
      padding: 1.5rem 1rem;
    }

    .add-user-header {
      padding: 1.5rem 1rem;
    }

    .add-user-header h2 {
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

<div class="add-user-page">
  <div class="add-user-container">
    <div class="add-user-header">
      <h2>
        <i class="fas fa-user-plus"></i>
        Add New User
      </h2>
      <p>Create a new user account and set their role</p>
    </div>

    <div class="add-user-body">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); color: #065f46;">
          <i class="fas fa-check-circle"></i>
          <div>
            <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
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

      <form method="POST" action="<?= base_url('manageusers/create') ?>" id="addUserForm" novalidate>
        <?= csrf_field() ?>

        <div class="form-group">
          <label for="name" class="form-label">
            <i class="fas fa-user"></i>
            Full Name
            <span class="required">*</span>
          </label>
          <input
            type="text"
            id="name"
            name="name"
            class="form-control"
            value="<?= old('name') ?>"
            required
            minlength="3"
            maxlength="100"
            placeholder="Enter user's full name"
            pattern="[a-zA-Z\s\-\.']*"
            title="Name can only contain letters, spaces, hyphens, periods, and apostrophes"
          >
          <div class="form-help">
            <i class="fas fa-info-circle"></i>
            Letters, spaces, hyphens, periods, and apostrophes only (no numbers or special characters)
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="form-label">
            <i class="fas fa-envelope"></i>
            Email Address
            <span class="required">*</span>
          </label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            class="form-control" 
            value="<?= old('email') ?>"
            required
            maxlength="255"
            placeholder="user@example.com"
            pattern="[a-zA-Z0-9\.\-_]+@[a-zA-Z0-9\.\-]+"
            title="Email local part (before @) can only contain letters, numbers, dots, hyphens, and underscores"
          >
          <div class="form-help">
            <i class="fas fa-info-circle"></i>
            Must be a valid email address and must be unique
          </div>
        </div>

        <div class="form-group">
          <label for="role" class="form-label">
            <i class="fas fa-shield-alt"></i>
            User Role
            <span class="required">*</span>
          </label>
          <select id="role" name="role" class="form-select" required>
            <option value="">Select a role</option>
            <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>
              <i class="fas fa-crown"></i> Administrator
            </option>
            <option value="teacher" <?= old('role') === 'teacher' ? 'selected' : '' ?>>
              <i class="fas fa-chalkboard-user"></i> Teacher
            </option>
            <option value="student" <?= old('role') === 'student' ? 'selected' : '' ?>>
              <i class="fas fa-graduation-cap"></i> Student
            </option>
          </select>
          <div class="form-help">
            <i class="fas fa-info-circle"></i>
            Select the user's role in the system
          </div>
        </div>

        <!-- Default Password Info -->
        <div id="passwordInfo" class="password-info">
          <i class="fas fa-lock"></i>
          <div class="password-info-text">
            <strong>Default Password Generated:</strong>
            <div class="password-display">
              <span id="passwordDisplay"></span>
            </div>
          </div>
        </div>

        <!-- Hidden password fields - password is set based on role -->
        <input type="hidden" id="password" name="password" value="">
        <input type="hidden" id="password_confirm" name="password_confirm" value="">

        <div class="btn-group">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>
            Create User
          </button>
          <a href="<?= base_url('manageusers') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// Set default password based on selected role
const defaultPasswords = {
  admin: 'admin123',
  teacher: 'teacher123',
  student: 'student123'
};

const roleSelect = document.getElementById('role');
const passwordInput = document.getElementById('password');
const passwordConfirmInput = document.getElementById('password_confirm');
const passwordInfo = document.getElementById('passwordInfo');
const passwordDisplay = document.getElementById('passwordDisplay');

// Handle role change
roleSelect.addEventListener('change', function() {
  const selectedRole = this.value;
  
  if (selectedRole && defaultPasswords[selectedRole]) {
    // Set the hidden password fields
    const defaultPassword = defaultPasswords[selectedRole];
    passwordInput.value = defaultPassword;
    passwordConfirmInput.value = defaultPassword;
    
    // Show the password info with animation
    passwordInfo.classList.add('show');
    passwordDisplay.textContent = defaultPassword;
  } else {
    // Hide the password info if no role selected
    passwordInfo.classList.remove('show');
    passwordInput.value = '';
    passwordConfirmInput.value = '';
  }
});

// Form validation
const form = document.getElementById('addUserForm');
form.addEventListener('submit', function(e) {
  const role = roleSelect.value;
  
  if (!role) {
    e.preventDefault();
    alert('Please select a role for the user!');
    roleSelect.focus();
  }
});
</script>

<?= $this->endSection() ?>
