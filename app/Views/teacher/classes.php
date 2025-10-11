<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"><?= esc($title) ?></h2>
            
            <div class="alert alert-success">
                <h5 class="alert-heading">✅ Access Control Test Passed!</h5>
                <p class="mb-0">You successfully accessed the teacher-only page. This confirms that:</p>
                <ul class="mb-0 mt-2">
                    <li>You are logged in as: <strong><?= esc($userName) ?></strong></li>
                    <li>Your role is: <strong><?= esc(ucfirst($role)) ?></strong></li>
                    <li>Role-based access control is working correctly</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">My Classes</h5>
                            <p class="card-text">View and manage your assigned classes.</p>
                            <a href="#" class="btn btn-primary">View Classes</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Teaching Materials</h5>
                            <p class="card-text">Upload and organize course materials.</p>
                            <a href="#" class="btn btn-primary">Manage Materials</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grade Students</h5>
                            <p class="card-text">Grade assignments and track student progress.</p>
                            <a href="#" class="btn btn-primary">Grade Students</a>
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
