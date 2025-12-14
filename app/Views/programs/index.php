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

    .programs-container {
        padding: 0;
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

    .btn-primary-custom {
        background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
        border: none;
        color: white;
        padding: 0.6rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-green));
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(115, 175, 111, 0.4);
        color: white;
    }

    .program-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: none;
        overflow: hidden;
        height: 100%;
    }

    .program-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(115, 175, 111, 0.2);
    }

    .program-card .card-header {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 1.2rem;
        border: none;
    }

    .program-card .card-header h5 {
        margin: 0;
        font-weight: 600;
    }

    .program-card .program-code {
        background: rgba(255,255,255,0.2);
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        display: inline-block;
        margin-top: 0.5rem;
    }

    .program-card .card-body {
        padding: 1.5rem;
    }

    .program-card .description {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 1rem;
        min-height: 48px;
    }

    .program-stats {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .stat-item {
        background: var(--bg-light);
        padding: 0.8rem 1rem;
        border-radius: 10px;
        flex: 1;
        text-align: center;
    }

    .stat-item .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-green);
    }

    .stat-item .stat-label {
        font-size: 0.8rem;
        color: #888;
        text-transform: uppercase;
    }

    .program-actions {
        display: flex;
        gap: 0.5rem;
    }

    .program-actions .btn {
        flex: 1;
        padding: 0.5rem;
        border-radius: 8px;
        font-size: 0.9rem;
    }

    .btn-view {
        background: var(--bg-light);
        color: var(--primary-green);
        border: 1px solid var(--primary-green);
    }

    .btn-view:hover {
        background: var(--primary-green);
        color: white;
    }

    .btn-edit {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffc107;
    }

    .btn-edit:hover {
        background: #ffc107;
        color: #212529;
    }

    .btn-delete {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #dc3545;
    }

    .btn-delete:hover {
        background: #dc3545;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--primary-green);
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        color: #333;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #666;
        margin-bottom: 1.5rem;
    }

    .alert {
        border-radius: 12px;
        border: none;
    }
</style>

<div class="programs-container">
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1><i class="fas fa-layer-group me-3"></i><?= esc($title) ?></h1>
                <p class="mb-0 mt-2 opacity-75">Manage your academic programs</p>
            </div>
            <a href="<?= base_url('programs/create') ?>" class="btn btn-light btn-lg">
                <i class="fas fa-plus me-2"></i>Create Program
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (empty($programs)): ?>
        <div class="empty-state">
            <i class="fas fa-folder-open"></i>
            <h3>No Programs Yet</h3>
            <p>Create your first academic program to organize your courses.</p>
            <a href="<?= base_url('programs/create') ?>" class="btn btn-primary-custom btn-lg">
                <i class="fas fa-plus me-2"></i>Create Your First Program
            </a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($programs as $program): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="program-card card">
                        <div class="card-header">
                            <h5><?= esc($program['program_name']) ?></h5>
                            <span class="program-code"><?= esc($program['program_code']) ?></span>
                        </div>
                        <div class="card-body">
                            <p class="description">
                                <?= $program['description'] ? esc(substr($program['description'], 0, 100)) . (strlen($program['description']) > 100 ? '...' : '') : '<em class="text-muted">No description</em>' ?>
                            </p>
                            <div class="program-stats">
                                <div class="stat-item">
                                    <div class="stat-number"><?= $program['course_count'] ?? 0 ?></div>
                                    <div class="stat-label">Courses</div>
                                </div>
                            </div>
                            <?php if (isset($userRole) && $userRole === 'admin' && isset($program['teacher_name'])): ?>
                                <p class="text-muted small mb-3">
                                    <i class="fas fa-user me-1"></i> <?= esc($program['teacher_name']) ?>
                                </p>
                            <?php endif; ?>
                            <div class="program-actions">
                                <a href="<?= base_url('programs/view/' . $program['id']) ?>" class="btn btn-view">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= base_url('programs/edit/' . $program['id']) ?>" class="btn btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-delete" onclick="confirmDelete(<?= $program['id'] ?>, '<?= esc($program['program_name']) ?>')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the program "<strong id="programName"></strong>"?</p>
                <p class="text-muted small">This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="post" style="display: inline;">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Delete Program
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name) {
        document.getElementById('programName').textContent = name;
        document.getElementById('deleteForm').action = '<?= base_url('programs/delete') ?>/' + id;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }
</script>

<?= $this->endSection() ?>
