<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h2>Welcome, <?= esc($userName) ?>!</h2>
            <p>Access your courses, grades, and assignments.</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">My Courses</h5>
                    <a href="<?= base_url('student/courses') ?>" class="btn btn-primary">View Courses</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">My Grades</h5>
                    <a href="<?= base_url('student/grades') ?>" class="btn btn-success">View Grades</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Assignments</h5>
                    <a href="<?= base_url('student/assignments') ?>" class="btn btn-warning">View Assignments</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
