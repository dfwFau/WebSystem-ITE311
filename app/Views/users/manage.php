<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Manage Users
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container py-4">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>User Management</h2>
            <a href="<?= base_url('manageusers/create') ?>" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Add User
            </a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" id="user-search-input" class="form-control" placeholder="Search users by name, email, or role...">
                    </div>

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

                    <?php if (empty($users)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <h4>No users found</h4>
                            <p class="text-muted">There are no users in the system yet. Create your first user to get started.</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                                    <span class="badge bg-info ms-1">You</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= esc($user['email']) ?></td>
                                            <td>
                                                <span class="badge bg-<?= $userRole === 'admin' ? 'danger' : ($userRole === 'teacher' ? 'primary' : 'success') ?>">
                                                    <?= ucfirst(esc($userRole)) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1"
                                                        onclick="editUser(<?= $user['id'] ?>, '<?= esc($user['name']) ?>', '<?= esc($user['email']) ?>')">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger"
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

  const deleteBtn = document.querySelector(`button.btn-outline-danger[onclick*="${userId}"]`);
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
