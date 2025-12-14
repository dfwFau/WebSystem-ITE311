<?= $this->extend('template') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    :root {
        --primary-green: #73AF6F;
        --primary-dark: #5a9356;
        --primary-light: #8bc487;
        --bg-light: #f8faf8;
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 2rem;
        margin: -1.5rem -1.5rem 2rem -1.5rem;
        border-radius: 0;
    }

    .page-header h1 {
        font-weight: 700;
        margin: 0;
    }

    .program-badge {
        background: rgba(255,255,255,0.2);
        padding: 0.3rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        display: inline-block;
        margin-top: 0.5rem;
    }

    .meta-info {
        display: flex;
        gap: 2rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: rgba(255,255,255,0.9);
        font-size: 0.9rem;
    }

    .meta-item i {
        opacity: 0.8;
    }

    .info-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .info-card h5 {
        color: var(--primary-dark);
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .description-text {
        color: #555;
        line-height: 1.7;
    }

    .stat-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .stat-card .stat-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: white;
        font-size: 1.2rem;
    }

    .stat-card .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-dark);
    }

    .stat-card .stat-label {
        font-size: 0.85rem;
        color: #888;
        text-transform: uppercase;
    }

    .courses-table {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .courses-table .table-header {
        background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
        color: white;
        padding: 1rem 1.5rem;
    }

    .courses-table .table-header h5 {
        margin: 0;
        font-weight: 600;
    }

    .table {
        margin: 0;
    }

    .table th {
        background: var(--bg-light);
        font-weight: 600;
        color: #555;
        border: none;
        padding: 1rem;
    }

    .table td {
        padding: 1rem;
        vertical-align: middle;
        border-color: #f0f0f0;
    }

    .empty-courses {
        text-align: center;
        padding: 3rem;
        color: #888;
    }

    .empty-courses i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #ddd;
    }
</style>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <h1><i class="fas fa-graduation-cap me-3"></i><?= esc($program['program_name']) ?></h1>
            <span class="program-badge"><?= esc($program['program_code']) ?></span>
            <div class="meta-info">
                <?php if (isset($program['teacher_name'])): ?>
                    <div class="meta-item">
                        <i class="fas fa-user"></i>
                        <span><?= esc($program['teacher_name']) ?></span>
                    </div>
                <?php endif; ?>
                <div class="meta-item">
                    <i class="fas fa-calendar"></i>
                    <span>Created: <?= date('M d, Y', strtotime($program['created_at'])) ?></span>
                </div>
            </div>
        </div>
        <a href="<?= base_url('programs/edit/' . $program['id']) ?>" class="btn btn-light">
            <i class="fas fa-edit me-2"></i>Edit Program
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Description -->
        <div class="info-card">
            <h5><i class="fas fa-info-circle"></i> About This Program</h5>
            <p class="description-text">
                <?= $program['description'] ? nl2br(esc($program['description'])) : '<em class="text-muted">No description provided.</em>' ?>
            </p>
        </div>

        <!-- Courses -->
        <div class="courses-table">
            <div class="table-header d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-book me-2"></i>Courses in This Program</h5>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-light text-dark"><?= count($courses) ?> courses</span>
                    <a href="<?= base_url('courses/create?program_id=' . $program['id']) ?>" class="btn btn-light btn-sm">
                        <i class="fas fa-plus me-1"></i>Add Course
                    </a>
                </div>
            </div>
            <?php if (empty($courses)): ?>
                <div class="empty-courses">
                    <i class="fas fa-book-open"></i>
                    <h6>No Courses Yet</h6>
                    <p class="mb-3">Courses added to this program will appear here.</p>
                    <a href="<?= base_url('courses/create?program_id=' . $program['id']) ?>" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Add First Course
                    </a>
                </div>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td>
                                    <strong><?= esc($course['name'] ?? $course['course_name'] ?? 'N/A') ?></strong>
                                </td>
                                <td>
                                    <span class="badge bg-secondary"><?= esc($course['code'] ?? $course['course_code'] ?? 'N/A') ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                                <td>
                                    <a href="<?= base_url('courses/view/' . $course['id']) ?>" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Stats -->
        <div class="stat-cards">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-number"><?= count($courses) ?></div>
                <div class="stat-label">Courses</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="info-card">
            <h5><i class="fas fa-bolt"></i> Quick Actions</h5>
            <div class="d-grid gap-2">
                <a href="<?= base_url('courses/create?program_id=' . $program['id']) ?>" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Add Course to Program
                </a>
                <a href="<?= base_url('programs/edit/' . $program['id']) ?>" class="btn btn-outline-warning">
                    <i class="fas fa-edit me-2"></i>Edit Program
                </a>
                <a href="<?= base_url('programs') ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-list me-2"></i>All Programs
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
