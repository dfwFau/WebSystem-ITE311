<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"><?= esc($title) ?></h2>
            
            <div class="alert alert-info">
                <h5 class="alert-heading">📊 My Grades</h5>
                <p class="mb-0">Student-only access confirmed. View your academic performance.</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Current Grades</h5>
                            <p class="card-text">View your current course grades and feedback.</p>
                            <a href="#" class="btn btn-primary">View Grades</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grade History</h5>
                            <p class="card-text">Track your academic progress over time.</p>
                            <a href="#" class="btn btn-primary">View History</a>
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
