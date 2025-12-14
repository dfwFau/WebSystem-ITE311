<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<style>
    /* Page Header */
    .users-page-header {
        background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
        padding: 2.5rem 2rem;
        margin-bottom: 2rem;
        border-radius: 0;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 12px 24px rgba(14, 165, 233, 0.2);
    }

    .users-page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: pulse-gradient 3s ease-in-out infinite;
    }

    @keyframes pulse-gradient {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(10px, 10px); }
    }

    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 1;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .users-header h2 {
        margin: 0;
        font-size: 1.875rem;
        font-weight: 800;
        color: white;
        letter-spacing: -0.5px;
    }

    .btn-add-user {
        padding: 12px 24px;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-add-user:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
        color: white;
    }

    /* Modern Users Table */
    .user-table-container {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(249, 250, 251, 0.95) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(229, 231, 235, 0.5);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .user-table-container:hover {
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }

    .user-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
    }

    .user-table thead {
        background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    }

    .user-table thead tr {
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .user-table thead th {
        padding: 1.25rem;
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: white;
        border: none;
        white-space: nowrap;
    }

    .user-table tbody tr {
        border-bottom: 1px solid rgba(229, 231, 235, 0.3);
        transition: all 0.3s ease;
    }

    .user-table tbody tr:hover {
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.04) 0%, rgba(6, 182, 212, 0.04) 100%);
    }

    .user-table tbody td {
        padding: 1rem 1.25rem;
        color: #334155;
        vertical-align: middle;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .user-table tbody td:first-child {
        font-weight: 700;
        color: #0ea5e9;
    }

    /* Badge Styles */
    .badge-role {
        padding: 8px 14px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        border: 1px solid transparent;
    }

    .badge-admin {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(244, 63, 94, 0.1) 100%);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .badge-teacher {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%);
        color: #3b82f6;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .badge-student {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    /* Action Buttons */
    .btn-action-user {
        padding: 10px 16px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.8rem;
        border: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        margin-right: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-action-user.edit {
        background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
    }

    .btn-action-user.edit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
        color: white;
    }

    .btn-action-user.delete {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(6, 182, 212, 0.3);
    }

    .btn-action-user.delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(6, 182, 212, 0.4);
        color: white;
    }

    .btn-action-user.deactivate {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .btn-action-user.deactivate:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4);
        color: white;
    }

    .btn-action-user.activate {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .btn-action-user.activate:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .btn-action-user.delete:disabled {
        background: rgba(229, 231, 235, 0.5);
        color: #9ca3af;
        cursor: not-allowed;
        opacity: 0.6;
        border: 1px solid rgba(229, 231, 235, 0.3);
    }

    /* Status Badge */
    .badge-status {
        padding: 6px 12px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    .badge-status.active {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .badge-status.inactive {
        background: linear-gradient(135deg, rgba(107, 114, 128, 0.1) 0%, rgba(75, 85, 99, 0.1) 100%);
        color: #6b7280;
        border: 1px solid rgba(107, 114, 128, 0.3);
    }

    /* Search Bar */
    .search-form-modern {
        margin-bottom: 2rem;
    }

    .search-input-group-modern {
        display: flex;
        gap: 0.5rem;
        max-width: 600px;
    }

    .search-input-modern {
        flex: 1;
        padding: 12px 18px;
        border: 1px solid rgba(229, 231, 235, 0.5);
        border-radius: 10px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(249, 250, 251, 0.95) 100%);
        font-size: 0.95rem;
        transition: all 0.3s ease;
        font-family: inherit;
        font-weight: 500;
    }

    .search-input-modern:focus {
        outline: none;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
        background: white;
    }

    .search-input-modern::placeholder {
        color: #9ca3af;
    }

    .btn-search-modern {
        padding: 12px 24px;
        background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-search-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(14, 165, 233, 0.3);
    }

    .btn-clear-modern {
        padding: 12px 18px;
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(244, 63, 94, 0.1) 100%);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-clear-modern:hover {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(239, 68, 68, 0.3);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #9ca3af;
    }

    .empty-state i {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        opacity: 0.2;
        color: #0ea5e9;
    }

    .empty-state p {
        font-size: 1rem;
        margin: 0;
        font-weight: 500;
    }

    /* Alert Styles */
    .alert {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
        border: 1px solid rgba(16, 185, 129, 0.3);
        color: #059669;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .alert.alert-danger {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(244, 63, 94, 0.1) 100%);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #ef4444;
    }

    .alert i {
        margin-right: 0.5rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .users-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .users-header h2 {
            font-size: 1.5rem;
        }

        .user-table thead th {
            padding: 0.75rem 0.5rem;
            font-size: 0.7rem;
        }

        .user-table tbody td {
            padding: 0.75rem 0.5rem;
            font-size: 0.8rem;
        }

        .search-input-group-modern {
            flex-direction: column;
            max-width: 100%;
        }

        .btn-action-user {
            padding: 8px 10px;
            font-size: 0.7rem;
            margin-bottom: 0.25rem;
        }
    }
</style>

<div class="users-page-header">
    <div class="users-header">
        <h2><i class="fas fa-users"></i> Manage Users</h2>
        <a href="<?= base_url('/admin/add-user') ?>" class="btn-add-user">
            <i class="fas fa-user-plus"></i> Add New User
        </a>
    </div>
</div>

<div class="container mt-0" style="max-width: 1280px;">
    <div class="row">
        <div class="col-12">
            
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%); border: 1px solid rgba(16, 185, 129, 0.3); color: #10b981;">
                    <i class="fas fa-check-circle"></i> <?= esc(session()->getFlashdata('success')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(244, 63, 94, 0.1) 100%); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444;">
                    <i class="fas fa-exclamation-circle"></i> <?= esc(session()->getFlashdata('error')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="search-form-modern">
                <form action="<?= base_url('/admin/manage-users') ?>" method="GET">
                    <div class="search-input-group-modern">
                        <input type="text" class="search-input-modern" name="search" placeholder="Search by name, email, or role..." value="<?= esc($searchQuery ?? '') ?>">
                        <button class="btn-search-modern" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                        <?php if (!empty($searchQuery)): ?>
                            <a href="<?= base_url('/admin/manage-users') ?>" class="btn-clear-modern">
                                <i class="fas fa-times"></i> Clear
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <div class="user-table-container">
                <?php if (empty($users)): ?>
                    <div class="empty-state">
                        <i class="fas fa-users"></i>
                        <p>No users found. Start by adding a new user.</p>
                    </div>
                <?php else: ?>
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= esc($user['id']) ?></td>
                                    <td>
                                        <strong><?= esc($user['name']) ?></strong>
                                    </td>
                                    <td><?= esc($user['email']) ?></td>
                                    <td>
                                        <span class="badge-role badge-<?= esc($user['role']) ?>">
                                            <?= esc(ucfirst($user['role'])) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge-status <?= ($user['status'] ?? 'active') === 'active' ? 'active' : 'inactive' ?>">
                                            <?= ($user['status'] ?? 'active') === 'active' ? 'Active' : 'Inactive' ?>
                                        </span>
                                    </td>
                                    <td><?= esc($user['created_at'] ?? 'N/A') ?></td>
                                    <td>
                                        <a href="<?= base_url('/admin/edit-user/' . $user['id']) ?>" class="btn-action-user edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a href="<?= base_url('/admin/toggle-user-status/' . $user['id']) ?>" 
                                           class="btn-action-user <?= ($user['status'] ?? 'active') === 'active' ? 'deactivate' : 'activate' ?>"
                                           title="<?= ($user['status'] ?? 'active') === 'active' ? 'Deactivate User' : 'Activate User' ?>"
                                           onclick="return confirm('Are you sure?');">
                                            <i class="fas <?= ($user['status'] ?? 'active') === 'active' ? 'fa-ban' : 'fa-check-circle' ?>"></i> 
                                            <?= ($user['status'] ?? 'active') === 'active' ? 'Deactivate' : 'Activate' ?>
                                        </a>
                                        <a href="<?= base_url('/admin/delete-user/' . $user['id']) ?>" 
                                           class="btn-action-user delete"
                                           title="Delete"
                                           onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

            <div class="mt-4">
                <a href="<?= base_url('/dashboard') ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
