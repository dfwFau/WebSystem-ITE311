<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Manage Users
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned User Management Dashboard Template with #73AF6F Theme */

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
  .users-dashboard {
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

  /* Table Styles */
  .table-modern {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-light);
  }

  .table-modern thead {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
  }

  .table-modern th {
    padding: 1rem;
    text-align: left;
    font-weight: 700;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .table-modern td {
    padding: 1rem;
    border-bottom: 1px solid var(--border-color);
    font-size: 0.9rem;
  }

  .table-modern tbody tr {
    transition: var(--transition);
  }

  .table-modern tbody tr:hover {
    background: rgba(115, 175, 111, 0.02);
  }

  .badge-modern {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .badge-modern.admin {
    background: rgba(239, 68, 68, 0.1);
    color: #dc2626;
  }

  .badge-modern.teacher {
    background: rgba(59, 130, 246, 0.1);
    color: #2563eb;
  }

  .badge-modern.student {
    background: rgba(16, 185, 129, 0.1);
    color: #059669;
  }

  .badge-modern.you {
    background: rgba(59, 130, 246, 0.1);
    color: #2563eb;
  }

  .badge-modern.success {
    background: rgba(16, 185, 129, 0.1);
    color: #059669;
  }

  .btn-action-modern {
    padding: 8px 16px;
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
    min-width: 80px;
  }

  .btn-action-modern.primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .btn-action-modern.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
  }

  .btn-action-modern.danger {
    background: rgba(239, 68, 68, 0.1);
    color: #dc2626;
    border: 1px solid #dc2626;
  }

  .btn-action-modern.danger:hover {
    background: #dc2626;
    color: white;
  }

  .btn-action-modern.danger:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-secondary);
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

  /* Alert Styles */
  .alert-modern {
    padding: 1rem 1.5rem;
    border-radius: var(--radius-lg);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    border: none;
    font-size: 0.95rem;
    box-shadow: var(--shadow-light);
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

    .stats-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="users-dashboard">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <div class="header-content">
      <div class="header-title">
        <i class="fas fa-users"></i>
        <h1>User Management</h1>
      </div>
      <div class="header-actions">
        <a href="<?= base_url('manageusers/create') ?>" class="btn-primary-green">
          <i class="fas fa-user-plus"></i>
          Add User
        </a>
        <a href="#" class="btn-secondary-green" onclick="refreshUsers()">
          <i class="fas fa-sync-alt"></i>
          Refresh
        </a>
      </div>
    </div>
  </div>

  <!-- Stats Section -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-users"></i>
      </div>
      <div class="stat-value"><?= count($users ?? []) ?></div>
      <div class="stat-label">Total Users</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-user-shield"></i>
      </div>
      <div class="stat-value">
        <?php
          $adminCount = 0;
          foreach (($users ?? []) as $user) {
            if (($user['role'] ?? '') === 'admin') $adminCount++;
          }
          echo $adminCount;
        ?>
      </div>
      <div class="stat-label">Administrators</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-chalkboard-teacher"></i>
      </div>
      <div class="stat-value">
        <?php
          $teacherCount = 0;
          foreach (($users ?? []) as $user) {
            if (($user['role'] ?? '') === 'teacher') $teacherCount++;
          }
          echo $teacherCount;
        ?>
      </div>
      <div class="stat-label">Teachers</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div class="stat-value">
        <?php
          $studentCount = 0;
          foreach (($users ?? []) as $user) {
            if (($user['role'] ?? '') === 'student') $studentCount++;
          }
          echo $studentCount;
        ?>
      </div>
      <div class="stat-label">Students</div>
    </div>
  </div>

  <!-- Main Content Grid -->
  <div class="content-grid">
    <!-- Main Content Area -->
    <div class="main-content-card">
      <div class="content-header">
        <div class="content-title">
          <i class="fas fa-users"></i>
          All Users
        </div>
        <div class="content-actions">
          <div class="search-container">
            <input type="text" class="search-input" id="user-search-input" placeholder= >
            <button class="search-btn" id="search-btn">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>

      <div style="padding: 2rem;">
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert-modern success">
            <i class="fas fa-check-circle"></i>
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert-modern danger">
            <i class="fas fa-exclamation-circle"></i>
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <?php if (empty($users)): ?>
          <div class="empty-state">
            <i class="fas fa-users"></i>
            <h3>No Users Found</h3>
            <p>There are no users in the system yet. Create your first user to get started.</p>
          </div>
        <?php else: ?>
          <div class="table-responsive">
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user): ?>
                  <?php
                  $isCurrentUser = ($user['id'] == ($currentUserId ?? null));
                  $userRole = $user['role'] ?? 'student';
                  ?>
                  <tr>
                    <td>
                      <?= esc($user['name']) ?>
                      <?php if ($isCurrentUser): ?>
                        <span class="badge-modern you ms-2">You</span>
                      <?php endif; ?>
                    </td>
                    <td><?= esc($user['email']) ?></td>
                    <td>
                      <span class="badge-modern <?= $userRole ?>">
                        <?= ucfirst(esc($userRole)) ?>
                      </span>
                    </td>
                    <td>
                      <span class="badge-modern success">Active</span>
                    </td>
                    <td>
                      <button class="btn-action-modern primary me-2"
                              onclick="editUser(<?= $user['id'] ?>, '<?= esc($user['name']) ?>', '<?= esc($user['email']) ?>')">
                        <i class="fas fa-edit"></i> Edit
                      </button>
                      <button class="btn-action-modern danger"
                              onclick="deleteUser(<?= $user['id'] ?>, '<?= esc($user['name']) ?>')"
                              <?= $user['id'] == session()->get('user_id') ? 'disabled' : '' ?>>
                        <i class="fas fa-trash"></i> Delete
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Alert Container -->
  <div id="alert-container"></div>
</div>

<!-- Delete User Confirmation Modal -->
<div id="deleteUserModal" class="modal" style="display: none;">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Confirm Delete</h2>
      <button class="modal-close" onclick="closeDeleteModal()">&times;</button>
    </div>
    <div class="modal-body">
      <div class="modal-confirmation-content">
        <div class="confirmation-icon confirmation-danger">
          <i class="fas fa-trash-alt"></i>
        </div>
        <h3 id="deleteUserName"></h3>
        <p class="confirmation-message">
          Are you sure you want to delete this user? This will permanently remove the user from the database.
        </p>
        <p class="confirmation-warning">
          <i class="fas fa-exclamation-triangle"></i>
          This action cannot be undone.
        </p>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
      <button type="button" class="btn-delete" id="confirmDeleteBtn" onclick="confirmDelete()">
        <i class="fas fa-trash"></i>
        Delete User
      </button>
    </div>
  </div>
</div>



<!-- Edit User Modal -->
<div id="editUserModal" class="modal" style="display: none;">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Edit User</h2>
      <button class="modal-close" onclick="closeEditModal()">&times;</button>
    </div>
    <div class="modal-body">
      <form id="editUserForm">
        <input type="hidden" id="editUserId" name="user_id">
        
        <div class="form-group">
          <label for="editUserName" class="form-label">Full Name</label>
          <input 
            type="text" 
            id="editUserName" 
            name="name" 
            class="form-control" 
            required
          >
        </div>

        <div class="form-group">
          <label for="editUserEmail" class="form-label">Email Address</label>
          <input 
            type="email" 
            id="editUserEmail" 
            name="email" 
            class="form-control" 
            required
          >
        </div>

        <div class="form-group">
          <label for="editUserPassword" class="form-label">
            New Password (leave blank to keep current password)
          </label>
          <input 
            type="password" 
            id="editUserPassword" 
            name="password" 
            class="form-control" 
            placeholder="Optional"
          >
        </div>

        <div class="modal-footer">
          <button type="button" class="btn-cancel" onclick="closeEditModal()">Cancel</button>
          <button type="submit" class="btn-save">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  .modal {
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .modal-content {
    background-color: #fff;
    padding: 0;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .modal-header {
    background: #f9fafb;
    padding: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .modal-header h2 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #111827;
  }

  .modal-close {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #6b7280;
  }

  .modal-close:hover {
    color: #111827;
  }

  .modal-body {
    padding: 1.5rem;
  }

  .modal-footer {
    padding: 1.5rem;
    border-top: 1px solid #e5e7eb;
    display: flex;
    justify-content: flex-end;
    gap: 0.5rem;
  }

  .form-group {
    margin-bottom: 1.25rem;
  }

  .form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #111827;
    font-size: 0.875rem;
  }

  .form-control {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 0.875rem;
    font-family: inherit;
  }

  .form-control:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
  }

  .btn-cancel {
    padding: 0.5rem 1rem;
    background: #e5e7eb;
    color: #111827;
    border: none;
    border-radius: 4px;
    font-size: 0.875rem;
    cursor: pointer;
    font-weight: 500;
  }

  .btn-cancel:hover {
    background: #d1d5db;
  }

  .btn-save {
    padding: 0.5rem 1rem;
    background: #059669;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 0.875rem;
    cursor: pointer;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .btn-save:hover {
    background: #047857;
  }

  .btn-save:disabled {
    background: #d1d5db;
    cursor: not-allowed;
  }
</style>

<script>

// Helper function to get cookie value
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
  return null;
}

function deleteUser(userId, userName) {
  // Show the delete modal instead of confirm dialog
  document.getElementById('deleteUserName').textContent = `Delete "${userName}"?`;
  document.getElementById('deleteUserModal').style.display = 'flex';
  
  // Store the user ID for confirmation
  window.currentDeleteUserId = userId;
  window.currentDeleteUserName = userName;
}

function closeDeleteModal() {
  document.getElementById('deleteUserModal').style.display = 'none';
  window.currentDeleteUserId = null;
  window.currentDeleteUserName = null;
}

function confirmDelete() {
  const userId = window.currentDeleteUserId;
  const userName = window.currentDeleteUserName;

  if (!userId || !userName) {
    showAlert('danger', 'Error: User information missing');
    closeDeleteModal();
    return;
  }

  // Hide the modal and proceed with deletion
  closeDeleteModal();

  const deleteBtn = document.querySelector(`button.btn-action-modern.danger[onclick*="${userId}"]`);
  if (!deleteBtn) {
    showAlert('danger', 'Error: Delete button not found');
    return;
  }

  const originalHTML = deleteBtn.innerHTML;
  deleteBtn.disabled = true;
  deleteBtn.innerHTML = '<span class="loading-spinner"></span> Deleting...';

  // Get CSRF token from cookie
  const csrfToken = getCookie('csrf_cookie_name');

  // Create form data with CSRF token
  const formData = new FormData();
  formData.append('user_id', userId);
  formData.append('csrf_test_name', csrfToken);

  fetch('<?= base_url('manageusers/delete') ?>', {
    method: 'POST',
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    },
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Reload the page to show updated user list
      location.reload();
    } else {
      showAlert('danger', data.message);
      deleteBtn.disabled = false;
      deleteBtn.innerHTML = originalHTML;
    }
  })
  .catch(error => {
    console.error('Error:', error);
    showAlert('danger', 'An error occurred while deleting the user.');
    deleteBtn.disabled = false;
    deleteBtn.innerHTML = originalHTML;
  });
}



// Close modals when clicking outside
window.onclick = function(event) {
  const deleteModal = document.getElementById('deleteUserModal');

  if (event.target === deleteModal) {
    closeDeleteModal();
  }
};

function showAlert(type, message) {
  // Remove existing alerts
  const existingAlerts = document.querySelectorAll('.alert');
  existingAlerts.forEach(alert => alert.remove());

  // Create new alert
  const alert = document.createElement('div');
  alert.className = `alert alert-${type}`;
  alert.innerHTML = `
    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
    ${message}
  `;

  // Insert at the top of the card body
  const cardBody = document.querySelector('.card-body');
  cardBody.insertBefore(alert, cardBody.firstChild);

  // Auto-remove after 5 seconds
  setTimeout(() => {
    alert.style.transition = 'opacity 0.3s';
    alert.style.opacity = '0';
    setTimeout(() => alert.remove(), 300);
  }, 5000);
}

// User search functionality
function performUserSearch() {
  const searchTerm = document.getElementById('user-search-input').value.toLowerCase().trim();
  const rows = document.querySelectorAll('tbody tr');
  let visibleCount = 0;

  rows.forEach(row => {
    const cells = row.querySelectorAll('td');
    const name = cells[0].textContent.toLowerCase();
    const email = cells[1].textContent.toLowerCase();
    const role = cells[2].textContent.toLowerCase();

    const matches = name.includes(searchTerm) ||
                   email.includes(searchTerm) ||
                   role.includes(searchTerm);

    if (matches) {
      row.style.display = '';
      visibleCount++;
    } else {
      row.style.display = 'none';
    }
  });
}

// Initialize search functionality
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('user-search-input');

  if (searchInput) {
    // Search on input change with debounce
    let searchTimeout;
    searchInput.addEventListener('input', function() {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(performUserSearch, 300);
    });
  }
});

// Edit User Modal Functions
function editUser(userId, userName, userEmail) {
  document.getElementById('editUserId').value = userId;
  document.getElementById('editUserName').value = userName;
  document.getElementById('editUserEmail').value = userEmail;
  document.getElementById('editUserPassword').value = '';
  document.getElementById('editUserModal').style.display = 'flex';
}

function closeEditModal() {
  document.getElementById('editUserModal').style.display = 'none';
  document.getElementById('editUserForm').reset();
}

// Close modal when clicking outside of it
window.onclick = function(event) {
  const modal = document.getElementById('editUserModal');
  if (event.target === modal) {
    closeEditModal();
  }
};

// Handle edit form submission
document.getElementById('editUserForm')?.addEventListener('submit', function(e) {
  e.preventDefault();
  
  const userId = document.getElementById('editUserId').value;
  const name = document.getElementById('editUserName').value.trim();
  const email = document.getElementById('editUserEmail').value.trim();
  const password = document.getElementById('editUserPassword').value.trim();

  // Basic validation
  if (!name) {
    alert('Name is required');
    return;
  }

  if (!email) {
    alert('Email is required');
    return;
  }

  if (!email.includes('@')) {
    alert('Invalid email format');
    return;
  }

  const saveBtn = document.querySelector('.modal-footer .btn-save');
  const originalHTML = saveBtn.innerHTML;
  saveBtn.disabled = true;
  saveBtn.innerHTML = '<span class="loading-spinner"></span> Saving...';

  // Get CSRF token from cookie
  const csrfToken = getCookie('csrf_cookie_name');

  const formData = new FormData();
  formData.append('user_id', userId);
  formData.append('name', name);
  formData.append('email', email);
  formData.append('csrf_test_name', csrfToken);
  if (password) {
    formData.append('password', password);
  }

  fetch('<?= base_url('manageusers/edit') ?>', {
    method: 'POST',
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    },
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    saveBtn.disabled = false;
    saveBtn.innerHTML = originalHTML;

    if (data.success) {
      closeEditModal();
      showAlert('success', data.message);
      
      // If admin edited their own password, redirect to login after showing message
      if (data.logout) {
        setTimeout(() => {
          window.location.href = '<?= base_url('login') ?>';
        }, 2000);
      } else {
        // Update the table row for other users
        const row = document.querySelector(`tr[data-user-id="${userId}"]`);
        if (row) {
          row.querySelector('.user-name').textContent = name;
          row.querySelector('.user-email').textContent = email;
          // Reload page after 1 second to refresh all data
          setTimeout(() => {
            location.reload();
          }, 1000);
        }
      }
    } else {
      showAlert('danger', data.message);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    saveBtn.disabled = false;
    saveBtn.innerHTML = originalHTML;
    showAlert('danger', 'An error occurred while updating the user.');
  });
});
</script>

<?= $this->endSection() ?>
