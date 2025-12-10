<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <h2 class="page-title mb-0">My Courses</h2>
            <form action="<?= base_url('/student/courses') ?>" method="GET" class="d-flex gap-2 flex-wrap">
                <input type="text" name="search" class="form-control search-input" placeholder="Search courses..." value="<?= esc($searchQuery ?? '') ?>">
                <button type="submit" class="btn btn-gradient-primary">Search</button>
            </form>
        </div>
    </div>

    <!-- Enrolled Courses -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="section-card p-4">
                <h5 class="section-title mb-3">Enrolled Courses</h5>

                <?php if (empty($enrollments)): ?>
                    <div class="alert alert-info d-flex align-items-center gap-2">
                        <i class="mdi mdi-information-outline"></i> No courses enrolled yet.
                    </div>
                <?php else: ?>
                    <?php foreach ($enrollments as $enrollment): ?>
                        <div class="course-card mb-3 p-3">
                            <h5 class="mb-2"><?= esc($enrollment['course_code']) ?> - <?= esc($enrollment['course_name']) ?></h5>
                            <p class="text-muted mb-3"><?= esc($enrollment['description'] ?? 'No description available.') ?></p>

                            <?php if (!empty($enrollment['materials'])): ?>
                                <h6 class="mb-2">Materials</h6>
                                <div class="list-group">
                                    <?php foreach ($enrollment['materials'] as $material): ?>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="mdi mdi-file-document-outline me-2"></i>
                                                <?= esc($material['file_name']) ?>
                                            </div>
                                            <a href="<?= base_url('materials/download/' . $material['id']) ?>" class="btn btn-sm btn-gradient-primary">
                                                Download
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Available Courses -->
    <div class="row">
        <div class="col-12">
            <div class="section-card p-4">
                <h5 class="section-title mb-3">Available Courses</h5>

                <?php if (empty($availableCourses)): ?>
                    <div class="alert alert-secondary d-flex align-items-center gap-2">
                        <i class="mdi mdi-information-outline"></i> No available courses at this time.
                    </div>
                <?php else: ?>
                    <?php foreach ($availableCourses as $course): ?>
                        <div class="course-card mb-2 p-3 d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div>
                                <h6 class="mb-1"><?= esc($course['course_code']) ?> - <?= esc($course['course_name']) ?></h6>
                                <p class="text-muted mb-0"><?= esc($course['description'] ?? 'No description available.') ?></p>
                            </div>
                            <form action="<?= base_url('/student/enroll/' . $course['course_id']) ?>" method="POST">
                                <button type="submit" class="btn btn-gradient-success">Enroll</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .page-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
    }

    .search-input {
        max-width: 300px;
        border-radius: 50px;
        padding: 0.5rem 1rem;
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: #667eea;
        outline: none;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        background: #fff;
    }

    .section-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .course-card {
        background: #f8fafc;
        border-radius: 16px;
        transition: all 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(102,126,234,0.15);
    }

    .section-title {
        font-weight: 700;
        font-size: 1.25rem;
    }

    .btn-gradient-primary {
        background: linear-gradient(135deg,#667eea,#764ba2);
        color: #fff;
        border-radius: 50px;
        padding: 0.4rem 1.2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-gradient-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(102,126,234,0.4);
        color: #fff;
    }

    .btn-gradient-success {
        background: linear-gradient(135deg,#10b981,#059669);
        color: #fff;
        border-radius: 50px;
        padding: 0.4rem 1.2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-gradient-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(16,185,129,0.4);
        color: #fff;
    }

    @media (max-width: 768px) {
        .course-card {
            flex-direction: column !important;
            text-align: center;
        }
        .d-flex.flex-wrap {
            justify-content: center !important;
        }
    }
</style>
<?= $this->endSection() ?>
