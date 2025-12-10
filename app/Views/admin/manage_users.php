<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<style>
    .user-table {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .badge-role {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 500;
    }
    .badge-admin {
        background-color: #dc3545;
        color: white;
    }
    .badge-teacher {
        background-color: #0d6efd;
        color: white;
    }
    .badge-student {
        background-color: #198754;
        color: white;
    }
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"><?= esc($title) ?></h2>
            
            <div class="alert alert-success">
                <h5 class="alert-heading">✅ Access Control Test Passed!</h5>
                <p class="mb-0">You successfully accessed the admin-only page. This confirms that:</p>
                <ul class="mb-0 mt-2">
                    <li>You are logged in as: <strong><?= esc($userName) ?></strong></li>
                    <li>Your role is: <strong><?= esc(ucfirst($userRole)) ?></strong></li>
                    <li>Role-based access control is working correctly</li>
                </ul>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= esc(session()->getFlashdata('success')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= esc(session()->getFlashdata('error')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <div class="mb-4">
                <form action="<?= base_url('/admin/manage-users') ?>" method="GET" class="search-form">
                    <div class="input-group" style="max-width: 400px;">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search users by name, email, or role..." value="<?= esc($searchQuery ?? '') ?>">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                        <?php if (!empty($searchQuery)): ?>
                            <a href="<?= base_url('/admin/manage-users') ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-x"></i> Clear
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <div class="user-table">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <p class="text-muted mb-0">No users found.</p>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= esc($user['id']) ?></td>
                                    <td><?= esc($user['name']) ?></td>
                                    <td><?= esc($user['email']) ?></td>
                                    <td>
                                        <span class="badge badge-role badge-<?= esc($user['role']) ?>">
                                            <?= esc(ucfirst($user['role'])) ?>
                                        </span>
                                    </td>
                                    <td><?= esc($user['created_at'] ?? 'N/A') ?></td>
                                    <td>
                                        <a href="<?= base_url('/admin/edit-user/' . $user['id']) ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <?php if ($user['id'] != session()->get('userId')): ?>
                                            <a href="<?= base_url('/admin/delete-user/' . $user['id']) ?>" 
                                               class="btn btn-sm btn-outline-danger" 
                                               title="Delete"
                                               onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        <?php else: ?>
                                            <span class="btn btn-sm btn-outline-secondary disabled" title="Cannot delete your own account">
                                                <i class="bi bi-trash"></i>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <a href="<?= base_url('/dashboard') ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
