<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"><?= esc($title) ?></h2>
            
            <div class="mb-4">
                <form action="<?= base_url('/admin/manage-users') ?>" method="GET" class="search-form">
                    <div class="input-group" style="max-width: 400px;">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search users by name, email, or role..." value="<?= esc($searchQuery ?? '') ?>">
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Management</h5>
                            <p class="card-text">Manage system users, roles, and permissions.</p>
                            <a href="#" class="btn btn-primary">Manage Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">System Reports</h5>
                            <p class="card-text">View system analytics and user activity reports.</p>
                            <a href="#" class="btn btn-primary">View Reports</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">System Settings</h5>
                            <p class="card-text">Configure system-wide settings and preferences.</p>
                            <a href="#" class="btn btn-primary">Settings</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="<?= base_url('/dashboard') ?>" class="btn btn-outline-secondary">← Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
