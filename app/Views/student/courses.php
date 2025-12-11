<?= $this->extend('template') ?>

<?= $this->section('title') ?>My Courses<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    .page-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .search-bar input {
        height: 42px;
    }

    .course-item {
        padding: 18px 20px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .course-item:hover {
        background: #f8f9fa;
    }

    .course-left {
        display: flex;
        flex-direction: column;
    }

    .course-code {
        font-size: 17px;
        font-weight: 600;
        color: #111827;
    }

    .course-name {
        font-size: 14px;
        color: #6b7280;
    }

    .empty-state {
        text-align: center;
        padding: 50px 0;
        color: #6b7280;
    }

    .btn-minimal {
        padding: 6px 14px;
        font-size: 14px;
    }
</style>

<div class="container py-4">

    <!-- HEADER -->
    <div class="page-title">My Courses</div>

    <!-- SEARCH -->
    <form method="GET" action="<?= base_url('/student/courses') ?>" class="mb-4">
        <div class="row">
            <div class="col-md-6 d-flex">
                <input type="text" name="search" class="form-control me-2"
                       placeholder="Search courses..."
                       value="<?= esc($searchQuery ?? '') ?>">
                <button class="btn btn-primary px-4">Search</button>
            </div>
        </div>
    </form>

    <!-- ENROLLED COURSES -->
    <?php if (!empty($enrollments)): ?>
        <h5 class="mb-3 text-muted">Enrolled Courses</h5>

        <?php foreach ($enrollments as $enrollment): ?>
            <div class="course-item">
                <div class="course-left">
                    <span class="course-code"><?= esc($enrollment['course_code']) ?></span>
                    <span class="course-name"><?= esc($enrollment['course_name']) ?></span>
                </div>

                <a href="<?= base_url('student/course-details/'.$enrollment['course_id']) ?>"
                   class="btn btn-outline-primary btn-minimal">
                    View
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- AVAILABLE COURSES -->
    <?php if (!empty($availableCourses)): ?>
        <h5 class="mb-3 mt-4 text-muted">Available Courses</h5>

        <?php foreach ($availableCourses as $course): ?>
            <div class="course-item">
                <div class="course-left">
                    <span class="course-code"><?= esc($course['course_code']) ?></span>
                    <span class="course-name"><?= esc($course['course_name']) ?></span>
                </div>

                <form method="POST" action="<?= base_url('/student/enroll/'.$course['course_id']) ?>">
                    <button type="submit" class="btn btn-success btn-minimal">Enroll</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- NO COURSES -->
    <?php if (empty($enrollments) && empty($availableCourses)): ?>
        <div class="empty-state">
            <i class="fas fa-book fa-2x mb-3"></i>
            <div>No courses found.</div>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
