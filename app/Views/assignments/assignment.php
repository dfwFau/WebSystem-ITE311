<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <?php if ($userRole === 'student'): ?>
                        <h5>Assignments from Enrolled Courses</h5>
                    <?php else: ?>
                        <h5>Assignments I've Created</h5>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <?php if (!empty($assignments)): ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>Assignment Title</th>
                                        <th>Due Date</th>
                                        <?php if ($userRole === 'student'): ?>
                                            <th>Status</th>
                                        <?php else: ?>
                                            <th>Submissions</th>
                                        <?php endif; ?>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($assignments as $assignment): ?>
                                        <tr>
                                            <td>
                                                <strong><?= esc($assignment['course_number']) ?></strong>
                                            </td>
                                            <td>
                                                <?php if ($userRole === 'student'): ?>
                                                    <strong><a href="<?= base_url('assignments/submit/' . $assignment['id']) ?>" class="text-decoration-none text-dark"><?= esc($assignment['title']) ?></a></strong>
                                                <?php else: ?>
                                                    <strong><?= esc($assignment['title']) ?></strong>
                                                <?php endif; ?>
                                                <?php if (!empty($assignment['description'])): ?>
                                                    <br><small class="text-muted"><?= esc(substr($assignment['description'], 0, 50)) ?>...</small>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($assignment['due_date']): ?>
                                                    <?= date('M d, Y H:i', strtotime($assignment['due_date'])) ?>
                                                    <?php
                                                    $now = new DateTime();
                                                    $due = new DateTime($assignment['due_date']);
                                                    $diff = $now->diff($due);
                                                    if ($due < $now): ?>
                                                        <br><span class="badge bg-danger"><?php echo ($userRole === 'student') ? 'Overdue' : 'Past Due'; ?></span>
                                                    <?php elseif ($diff->days <= 1): ?>
                                                        <br><span class="badge bg-warning">Due Soon</span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span class="text-muted">No due date</span>
                                                <?php endif; ?>
                                            </td>
                                            <?php if ($userRole === 'student'): ?>
                                                <td>
                                                    <?php if ($assignment['has_submitted']): ?>
                                                        <span class="badge bg-success">
                                                            <i class="fas fa-check"></i> Submitted
                                                        </span>
                                                        <?php if ($assignment['submission']['updated_at']): ?>
                                                            <br><small class="text-muted">
                                                                Last updated: <?= date('M d, H:i', strtotime($assignment['submission']['updated_at'])) ?>
                                                            </small>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <span class="badge bg-warning">
                                                            <i class="fas fa-clock"></i> Not Submitted
                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                            <?php else: ?>
                                                <td>
                                                    <span class="badge bg-info">
                                                        <?= $assignment['submission_count'] ?? 0 ?> submissions
                                                    </span>
                                                </td>
                                            <?php endif; ?>
                                            <td>
                                                <?php if ($userRole === 'student'): ?>
                                                    <a href="<?= base_url('assignments/submit/' . $assignment['id']) ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                        <?= $assignment['has_submitted'] ? 'Edit Submission' : 'Submit Assignment' ?>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= base_url('assignments/view-submissions/' . $assignment['id']) ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-eye"></i> View Submissions
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('assignments/course/' . $assignment['course_id']) ?>" class="btn btn-sm btn-secondary">
                                                    <i class="fas fa-list"></i> Course Assignments
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                            <?php if ($userRole === 'student'): ?>
                                <h5>No assignments found</h5>
                                <p>You don't have any assignments from your enrolled courses yet.</p>
                                <a href="<?= base_url('/courses') ?>" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Browse Available Courses
                                </a>
                            <?php else: ?>
                                <h5>No assignments created yet</h5>
                                <p>You haven't created any assignments for your courses yet.</p>
                                <a href="<?= base_url('/courses') ?>" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Create Your First Assignment
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
