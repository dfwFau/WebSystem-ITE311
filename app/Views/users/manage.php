<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Manage Users
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  .users-table-container {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
  }

  .users-table-header {
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    padding: 1.25rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .search-bar-container {
    margin-right: 1rem;
  }

  .search-input-group {
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 2px solid transparent;
    transition: all 0.3s ease;
  }

  .search-input-group:focus-within {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
  }

  .search-input {
    border: none;
    border-radius: 0;
    font-size: 1rem;
    padding: 0.75rem 1rem;
    width: 250px;
  }

  .search-input:focus {
    box-shadow: none;
  }

  .search-btn {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    border: none;
    color: #fff;
    padding: 0.75rem 1rem;
    border-radius: 0;
    transition: all 0.3s ease;
  }

  .search-btn:hover {
    background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
  }

  .no-results {
    text-align: center;
    padding: 3rem;
    color: #6b7280;
    display: none;
  }

  .users-table-header h2 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #111827;
  }

  .btn-add {
    padding: 0.5rem 1rem;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .btn-add:hover {
    background: #1d4ed8;
  }

  .users-table {
    width: 100%;
    border-collapse: collapse;
  }

  .users-table thead {
    background: #f9fafb;
  }

  .users-table th {
    padding: 0.75rem 1rem;
    text-align: left;
    font-weight: 600;
    color: #374151;
    border-bottom: 1px solid #e5e7eb;
    font-size: 0.875rem;
  }

  .users-table td {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: middle;
  }

  .users-table tbody tr:hover {
    background: #f9fafb;
  }

  .users-table tbody tr:last-child td {
    border-bottom: none;
  }

  .role-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 500;
  }

  .role-badge.admin {
    background: #fee2e2;
    color: #991b1b;
  }

  .role-badge.teacher {
    background: #dbeafe;
    color: #1e40af;
  }

  .role-badge.student {
    background: #d1fae5;
    color: #065f46;
  }

  .role-select {
    padding: 0.5rem;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 0.875rem;
    background: white;
    min-width: 120px;
  }

  .role-select:focus {
    outline: none;
    border-color: #2563eb;
  }

  .role-select:disabled {
    background: #f3f4f6;
    color: #9ca3af;
    cursor: not-allowed;
  }

  .users-table tbody tr.current-user {
    background: #fef3c7;
  }

  .btn-delete {
    padding: 0.5rem 1rem;
    background: #dc2626;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 0.875rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .btn-delete:hover {
    background: #b91c1c;
  }

  .btn-delete:disabled {
    background: #d1d5db;
    cursor: not-allowed;
  }

  .btn-restore {
    padding: 0.5rem 1rem;
    background: #059669;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 0.875rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .btn-restore:hover {
    background: #047857;
  }

  .btn-restore:disabled {
    background: #d1d5db;
    cursor: not-allowed;
  }

  .modal {
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
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

  .modal-confirmation-content {
    text-align: center;
    padding: 1rem 0;
  }

  .confirmation-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin: 0 auto 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
  }

  .confirmation-icon.confirmation-danger {
    background: #fee2e2;
    color: #991b1b;
  }

  .confirmation-icon.confirmation-success {
    background: #d1fae5;
    color: #065f46;
  }

  .modal-confirmation-content h3 {
    margin: 0 0 1rem;
    font-size: 1.25rem;
    font-weight: 600;
    color: #111827;
    word-break: break-word;
  }

  .confirmation-message {
    margin: 0 0 1rem;
    color: #6b7280;
    font-size: 0.95rem;
    line-height: 1.5;
  }

  .confirmation-warning {
    margin: 1rem 0 0;
    color: #b91c1c;
    font-size: 0.85rem;
    font-weight: 500;
    background: #fee2e2;
    padding: 0.75rem;
    border-radius: 4px;
  }

  .confirmation-warning i {
    margin-right: 0.5rem;
  }

  .btn-edit {
    padding: 0.5rem 1rem;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 0.875rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-right: 0.5rem;
  }

  .btn-edit:hover {
    background: #1d4ed8;
  }

  .btn-edit:disabled {
    background: #d1d5db;
    cursor: not-allowed;
  }

  .status-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 500;
  }

  .status-badge-success {
    background: #d1fae5;
    color: #065f46;
  }

  .status-badge-danger {
    background: #fee2e2;
    color: #991b1b;
  }

  .btn-save-role {
    padding: 0.5rem 1rem;
    background: #059669;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 0.875rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-left: 0.5rem;
  }

  .btn-save-role:hover {
    background: #047857;
  }

  .btn-save-role:disabled {
    background: #d1d5db;
    cursor: not-allowed;
  }

  .action-buttons {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .alert {
    padding: 1rem;
    border-radius: 6px;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .alert-success {
    background: #d1fae5;
    color: #065f46;
    border: 1px solid #a7f3d0;
  }

  .alert-danger {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
  }

  .empty-state {
    text-align: center;
    padding: 3rem;
    color: #6b7280;
  }

  .user-email {
    color: #6b7280;
    font-size: 0.875rem;
  }

  .user-name {
    font-weight: 500;
    color: #111827;
  }

  .loading-spinner {
    display: inline-block;
    width: 14px;
    height: 14px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top-color: white;
    animation: spin 0.6s linear infinite;
  }

  @keyframes spin {
    to { transform: rotate(360deg); }
  }
</style>

<div class="users-table-container">
  <div class="users-table-header">
    <h2>User Management</h2>
    <div style="display: flex; align-items: center; gap: 1rem;">
      <div class="search-bar-container">
        <div class="input-group search-input-group">
          <input type="text" id="user-search-input" class="form-control search-input" placeholder="Search users by name, email, or role..." value="">
          <button class="btn search-btn" id="user-search-btn">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
      <a href="<?= base_url('manageusers/create') ?>" class="btn-add">
        <i class="fas fa-user-plus"></i>
        Add User
      </a>
    </div>
  </div>

  <div style="padding: 1.5rem;">
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <?php if (empty($users)): ?>
      <div class="empty-state">
        <i class="fas fa-users"></i>
        <h5>No users found</h5>
        <p>There are no users in the system.</p>
      </div>
    <?php else: ?>
      <div style="overflow-x: auto;">
        <table class="users-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Current Role</th>
              <th>Change Role</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <?php 
                $isCurrentUser = ($user['id'] == ($currentUserId ?? null));
                $userRole = $user['role'] ?? 'student'; // Default to 'student' if role is missing
              ?>
              <tr data-user-id="<?= $user['id'] ?>" <?= $isCurrentUser ? 'class="current-user"' : '' ?>>
                <td><?= $user['id'] ?></td>
                <td>
                  <div class="user-name"><?= esc($user['name']) ?></div>
                </td>
                <td>
                  <div class="user-email"><?= esc($user['email']) ?></div>
                </td>
                <td>
                  <span class="role-badge <?= esc($userRole) ?>">
                    <?= ucfirst(esc($userRole)) ?>
                  </span>
                </td>
                <td>
                  <div class="action-buttons">
                    <?php $isCurrentUser = ($user['id'] == ($currentUserId ?? null)); ?>
                    <select class="role-select" 
                            data-user-id="<?= $user['id'] ?>" 
                            data-current-role="<?= esc($userRole) ?>"
                            <?= $isCurrentUser ? 'disabled title="You cannot change your own role"' : '' ?>>
                      <option value="admin" <?= $userRole === 'admin' ? 'selected' : '' ?>>Admin</option>
                      <option value="teacher" <?= $userRole === 'teacher' ? 'selected' : '' ?>>Teacher</option>
                      <option value="student" <?= $userRole === 'student' ? 'selected' : '' ?>>Student</option>
                    </select>
                    <?php if (!$isCurrentUser): ?>
                    <button class="btn-save-role" 
                            data-user-id="<?= $user['id'] ?>" 
                            style="display: none;"
                            onclick="updateRole(<?= $user['id'] ?>)">
                      <i class="fas fa-save"></i>
                      Save
                    </button>
                    <?php else: ?>
                    <span style="color: #6b7280; font-size: 0.75rem; margin-left: 0.5rem;">
                      <i class="fas fa-info-circle"></i> Current user
                    </span>
                    <?php endif; ?>
                  </div>
                </td>
                <td>
                  <?php 
                    $statusClass = $user['deleted_at'] ? 'danger' : 'success';
                    $statusText = $user['deleted_at'] ? 'Deleted' : 'Active';
                  ?>
                  <span class="status-badge status-badge-<?= $statusClass ?>">
                    <?= $statusText ?>
                  </span>
                </td>
                <td>
                  <button class="btn-edit" 
                          onclick="editUser(<?= $user['id'] ?>, '<?= esc($user['name']) ?>', '<?= esc($user['email']) ?>')"
                          <?= $user['deleted_at'] ? 'disabled title="Cannot edit deleted users"' : '' ?>>
                    <i class="fas fa-edit"></i>
                    Edit
                  </button>
                  <?php if ($user['deleted_at']): ?>
                    <button class="btn-restore" 
                            onclick="restoreUser(<?= $user['id'] ?>, '<?= esc($user['name']) ?>')">
                      <i class="fas fa-undo"></i>
                      Restore
                    </button>
                  <?php else: ?>
                    <button class="btn-delete" 
                            onclick="deleteUser(<?= $user['id'] ?>, '<?= esc($user['name']) ?>')"
                            <?= $user['id'] == session()->get('user_id') ? 'disabled title="You cannot delete your own account"' : '' ?>>
                      <i class="fas fa-trash"></i>
                      Delete
                    </button>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
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
          Are you sure you want to delete this user? This will soft-delete the user (they will not be permanently removed from the database).
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

<!-- Restore User Confirmation Modal -->
<div id="restoreUserModal" class="modal" style="display: none;">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Confirm Restore</h2>
      <button class="modal-close" onclick="closeRestoreModal()">&times;</button>
    </div>
    <div class="modal-body">
      <div class="modal-confirmation-content">
        <div class="confirmation-icon confirmation-success">
          <i class="fas fa-undo"></i>
        </div>
        <h3 id="restoreUserName"></h3>
        <p class="confirmation-message">
          Are you sure you want to restore this user? The user will be restored to active status.
        </p>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn-cancel" onclick="closeRestoreModal()">Cancel</button>
      <button type="button" class="btn-restore" id="confirmRestoreBtn" onclick="confirmRestore()">
        <i class="fas fa-undo"></i>
        Restore User
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
// Show save button when role is changed
document.querySelectorAll('.role-select').forEach(select => {
  const originalValue = select.value;
  
  select.addEventListener('change', function() {
    // Skip if disabled (current user's row)
    if (this.disabled) {
      return;
    }
    
    const saveBtn = this.parentElement.querySelector('.btn-save-role');
    if (saveBtn && this.value !== this.dataset.currentRole) {
      saveBtn.style.display = 'inline-flex';
    } else if (saveBtn) {
      saveBtn.style.display = 'none';
    }
  });
});

function updateRole(userId) {
  const select = document.querySelector(`.role-select[data-user-id="${userId}"]`);
  const saveBtn = document.querySelector(`.btn-save-role[data-user-id="${userId}"]`);
  
  // Prevent role change for current user
  if (select.disabled) {
    showAlert('danger', 'You cannot change your own role');
    return;
  }
  
  const newRole = select.value;
  const currentRole = select.dataset.currentRole;

  if (newRole === currentRole) {
    saveBtn.style.display = 'none';
    return;
  }

  // Disable button and show loading
  saveBtn.disabled = true;
  const originalHTML = saveBtn.innerHTML;
  saveBtn.innerHTML = '<span class="loading-spinner"></span> Saving...';

  fetch('<?= base_url('manageusers/update-role') ?>', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      'X-Requested-With': 'XMLHttpRequest'
    },
    body: `user_id=${userId}&role=${newRole}`
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Update the current role badge
      const row = document.querySelector(`tr[data-user-id="${userId}"]`);
      const roleBadge = row.querySelector('.role-badge');
      roleBadge.className = `role-badge ${newRole}`;
      roleBadge.textContent = newRole.charAt(0).toUpperCase() + newRole.slice(1);
      
      // Update dataset
      select.dataset.currentRole = newRole;
      saveBtn.style.display = 'none';
      
      // Show success message
      showAlert('success', data.message);
    } else {
      showAlert('danger', data.message);
      // Revert select value
      select.value = currentRole;
    }
  })
  .catch(error => {
    console.error('Error:', error);
    showAlert('danger', 'An error occurred while updating the role.');
    select.value = currentRole;
  })
  .finally(() => {
    saveBtn.disabled = false;
    saveBtn.innerHTML = originalHTML;
  });
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
  
  const deleteBtn = document.querySelector(`button.btn-delete[onclick*="${userId}"]`);
  if (!deleteBtn) {
    showAlert('danger', 'Error: Delete button not found');
    return;
  }

  const originalHTML = deleteBtn.innerHTML;
  deleteBtn.disabled = true;
  deleteBtn.innerHTML = '<span class="loading-spinner"></span> Deleting...';

  fetch('<?= base_url('manageusers/delete') ?>', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      'X-Requested-With': 'XMLHttpRequest'
    },
    body: `user_id=${encodeURIComponent(userId)}`
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      const row = document.querySelector(`tr[data-user-id="${userId}"]`);
      if (row) {
        const statusBadge = row.querySelector('.status-badge');
        if (statusBadge) {
          statusBadge.className = 'status-badge status-badge-danger';
          statusBadge.textContent = 'Deleted';
        }
        
        const editBtn = row.querySelector('.btn-edit');
        if (editBtn) {
          editBtn.disabled = true;
          editBtn.title = 'Cannot edit deleted users';
        }
        
        const restoreButton = document.createElement('button');
        restoreButton.className = 'btn-restore';
        restoreButton.setAttribute('onclick', `restoreUser(${userId}, '${userName}')`);
        restoreButton.innerHTML = '<i class="fas fa-undo"></i> Restore';
        
        deleteBtn.replaceWith(restoreButton);
      }
      
      showAlert('success', data.message);
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

function restoreUser(userId, userName) {
  // Show the restore modal instead of confirm dialog
  document.getElementById('restoreUserName').textContent = `Restore "${userName}"?`;
  document.getElementById('restoreUserModal').style.display = 'flex';
  
  // Store the user ID for confirmation
  window.currentRestoreUserId = userId;
  window.currentRestoreUserName = userName;
}

function closeRestoreModal() {
  document.getElementById('restoreUserModal').style.display = 'none';
  window.currentRestoreUserId = null;
  window.currentRestoreUserName = null;
}

function confirmRestore() {
  const userId = window.currentRestoreUserId;
  const userName = window.currentRestoreUserName;
  
  if (!userId || !userName) {
    showAlert('danger', 'Error: User information missing');
    closeRestoreModal();
    return;
  }

  // Hide the modal and proceed with restore
  closeRestoreModal();

  const restoreBtn = document.querySelector(`button.btn-restore[onclick*="${userId}"]`);
  if (!restoreBtn) {
    showAlert('danger', 'Error: Restore button not found');
    return;
  }

  const originalHTML = restoreBtn.innerHTML;
  restoreBtn.disabled = true;
  restoreBtn.innerHTML = '<span class="loading-spinner"></span> Restoring...';

  fetch('<?= base_url('manageusers/restore') ?>', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      'X-Requested-With': 'XMLHttpRequest'
    },
    body: `user_id=${encodeURIComponent(userId)}`
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      const row = document.querySelector(`tr[data-user-id="${userId}"]`);
      if (row) {
        const statusBadge = row.querySelector('.status-badge');
        if (statusBadge) {
          statusBadge.className = 'status-badge status-badge-success';
          statusBadge.textContent = 'Active';
        }
        
        const editBtn = row.querySelector('.btn-edit');
        if (editBtn) {
          editBtn.disabled = false;
          editBtn.title = '';
        }
        
        const deleteButton = document.createElement('button');
        deleteButton.className = 'btn-delete';
        deleteButton.setAttribute('onclick', `deleteUser(${userId}, '${userName}')`);
        deleteButton.innerHTML = '<i class="fas fa-trash"></i> Delete';
        
        restoreBtn.replaceWith(deleteButton);
      }
      
      showAlert('success', data.message);
    } else {
      showAlert('danger', data.message);
      restoreBtn.disabled = false;
      restoreBtn.innerHTML = originalHTML;
    }
  })
  .catch(error => {
    console.error('Error:', error);
    showAlert('danger', 'An error occurred while restoring the user.');
    restoreBtn.disabled = false;
    restoreBtn.innerHTML = originalHTML;
  });
}

// Close modals when clicking outside
window.onclick = function(event) {
  const deleteModal = document.getElementById('deleteUserModal');
  const restoreModal = document.getElementById('restoreUserModal');
  
  if (event.target === deleteModal) {
    closeDeleteModal();
  }
  if (event.target === restoreModal) {
    closeRestoreModal();
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

  // Insert at the top of the container
  const container = document.querySelector('.users-table-container > div[style*="padding"]');
  container.insertBefore(alert, container.firstChild);

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
  const rows = document.querySelectorAll('.users-table tbody tr');
  const noResults = document.querySelector('.no-results');
  let visibleCount = 0;

  rows.forEach(row => {
    const name = row.querySelector('.user-name').textContent.toLowerCase();
    const email = row.querySelector('.user-email').textContent.toLowerCase();
    const role = row.querySelector('.role-badge').textContent.toLowerCase();

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

  // Show/hide no results message
  if (noResults) {
    if (visibleCount === 0 && searchTerm !== '') {
      noResults.style.display = 'block';
    } else {
      noResults.style.display = 'none';
    }
  }
}

// Initialize search functionality
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('user-search-input');
  const searchBtn = document.getElementById('user-search-btn');

  if (searchInput && searchBtn) {
    // Search on input change with debounce
    let searchTimeout;
    searchInput.addEventListener('input', function() {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(performUserSearch, 300);
    });

    // Search on button click
    searchBtn.addEventListener('click', performUserSearch);

    // Search on Enter key
    searchInput.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        performUserSearch();
      }
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

  const formData = new FormData();
  formData.append('user_id', userId);
  formData.append('name', name);
  formData.append('email', email);
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

