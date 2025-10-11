<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"><?= esc($title) ?></h2>
            
            <div class="alert alert-success">
                <h5 class="alert-heading">✅ Access Control Test Passed!</h5>
                <p class="mb-0">You successfully accessed the student-only page. This confirms that:</p>
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
                            <h5 class="card-title">My Courses</h5>
                            <p class="card-text">View your enrolled courses and course materials.</p>
                            <a href="#" class="btn btn-primary">View Courses</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">My Grades</h5>
                            <p class="card-text">Check your academic performance and grades.</p>
                            <a href="#" class="btn btn-primary">View Grades</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">My Assignments</h5>
                            <p class="card-text">View and submit your assignments.</p>
                            <a href="#" class="btn btn-primary">View Assignments</a>
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
