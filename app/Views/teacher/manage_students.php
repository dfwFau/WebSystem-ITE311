<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<style>
/* Additional styles for manage students page */
.student-table {
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow-md);
    overflow: hidden;
}

.search-filters {
    background: white;
    border-radius: 12px;
    padding: var(--space-6);
    margin-bottom: var(--space-6);
    box-shadow: var(--shadow-md);
}

.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.status-inactive {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
}

.status-dropped {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
}

.status-pending {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
}

.action-btn {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 500;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: var(--transition-fast);
}

.btn-view {
    background: rgba(6, 182, 212, 0.1);
    color: var(--secondary);
}

.btn-view:hover {
    background: var(--secondary);
    color: white;
}

.btn-update {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
}

.btn-update:hover {
    background: var(--warning);
    color: white;
}

.btn-remove {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
}

.btn-remove:hover {
    background: var(--danger);
    color: white;
}

.modal-content {
    border-radius: 12px;
    border: none;
    box-shadow: var(--shadow-xl);
}

.modal-header {
    border-bottom: 1px solid rgba(229, 231, 235, 0.5);
    padding: var(--space-6);
}

.modal-body {
    padding: var(--space-6);
}

.modal-footer {
    border-top: 1px solid rgba(229, 231, 235, 0.5);
    padding: var(--space-6);
}

.form-group {
    margin-bottom: var(--space-4);
}

.form-label {
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: var(--space-2);
    display: block;
}

.form-control {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    border: 1px solid var(--gray-300);
    border-radius: 8px;
    font-size: 0.9rem;
    transition: var(--transition-fast);
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    border: none;
    padding: var(--space-3) var(--space-6);
    border-radius: 8px;
    font-weight: 600;
    color: white;
    cursor: pointer;
    transition: var(--transition-fast);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-secondary {
    background: var(--gray-200);
    border: none;
    padding: var(--space-3) var(--space-6);
    border-radius: 8px;
    font-weight: 600;
    color: var(--gray-700);
    cursor: pointer;
    transition: var(--transition-fast);
}

.btn-secondary:hover {
    background: var(--gray-300);
}

.table-responsive {
    border-radius: 12px;
    overflow: hidden;
}

.table {
    margin-bottom: 0;
}

.table th {
    background: linear-gradient(135deg, var(--gray-50) 0%, rgba(124, 58, 237, 0.05) 100%);
    border-bottom: 2px solid var(--gray-200);
    font-weight: 700;
    color: var(--gray-900);
    padding: var(--space-4);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table td {
    padding: var(--space-4);
    border-bottom: 1px solid var(--gray-100);
    vertical-align: middle;
}

.table tbody tr:hover {
    background: rgba(124, 58, 237, 0.02);
}

.empty-state {
    text-align: center;
    padding: var(--space-8);
    color: var(--gray-500);
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: var(--space-4);
    opacity: 0.3;
}

.course-selector {
    background: white;
    border-radius: 12px;
    padding: var(--space-6);
    margin-bottom: var(--space-6);
    box-shadow: var(--shadow-md);
}

.course-select {
    max-width: 300px;
}
</style>

<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-2">Manage Students</h1>
            <?php if ($selectedCourse): ?>
                <p class="text-muted mb-0">Course: <?= esc($selectedCourse['course_number']) ?> – <?= esc($selectedCourse['description'] ?? 'No description') ?></p>
            <?php else: ?>
                <p class="text-muted mb-0">Please select a course to manage students</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Course Selector -->
    <div class="course-selector">
        <form method="GET" action="<?= base_url('teacher/manage-students') ?>" class="d-flex gap-3 align-items-end">
            <div class="flex-grow-1">
                <label for="course_id" class="form-label">Select Course</label>
                <select name="course_id" id="course_id" class="form-control course-select" onchange="this.form.submit()">
                    <?php foreach ($courses as $course): ?>
                        <option value="<?= $course['course_id'] ?>" <?= $courseId == $course['course_id'] ? 'selected' : '' ?>>
                            <?= esc($course['course_number']) ?> - <?= esc($course['description'] ?? 'No description') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
    </div>

    <?php if ($courseId): ?>
        <!-- Search and Filters -->
        <div class="search-filters">
            <form method="GET" action="<?= base_url('teacher/manage-students') ?>" class="row g-3">
                <input type="hidden" name="course_id" value="<?= $courseId ?>">

                <!-- Search Bar -->
                <div class="col-md-6">
                    <label for="search" class="form-label">Search Students</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search by name, student ID, or email..." value="<?= esc($searchQuery) ?>">
                </div>

                <!-- Year Level Filter -->
                <div class="col-md-2">
                    <label for="year_level" class="form-label">Year Level</label>
                    <select class="form-control" id="year_level" name="year_level">
                        <option value="">All Years</option>
                        <?php foreach ($yearLevels as $level): ?>
                            <option value="<?= esc($level) ?>" <?= $yearLevel == $level ? 'selected' : '' ?>><?= esc($level) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Program Filter -->
                <div class="col-md-2">
                    <label for="program" class="form-label">Program</label>
                    <select class="form-control" id="program" name="program">
                        <option value="">All Programs</option>
                        <?php foreach ($programs as $prog): ?>
                            <option value="<?= esc($prog) ?>" <?= $program == $prog ? 'selected' : '' ?>><?= esc($prog) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="col-md-2">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">All Statuses</option>
                        <option value="Active" <?= $status == 'Active' ? 'selected' : '' ?>>Active</option>
                        <option value="Pending" <?= $status == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Inactive" <?= $status == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                        <option value="Dropped" <?= $status == 'Dropped' ? 'selected' : '' ?>>Dropped</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-search"></i> Search & Filter
                    </button>
                    <a href="<?= base_url('teacher/manage-students?course_id=' . $courseId) ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Clear Filters
                    </a>
                </div>
            </form>
        </div>

        <!-- Student List Table -->
        <div class="student-table">
            <div class="table-responsive">
                <?php if (!empty($students)): ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Program</th>
                                <th>Year Level</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?= esc($student['student_id']) ?></td>
                                    <td><?= esc($student['name']) ?></td>
                                    <td><?= esc($student['email']) ?></td>
                                    <td><?= esc($student['program']) ?></td>
                                    <td><?= esc($student['year_level']) ?></td>
                                    <td>
                                        <span class="status-badge status-<?= strtolower($student['status'] ?? 'active') ?>">
                                            <?= esc($student['status'] ?? 'Active') ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="action-btn btn-view" onclick="viewStudentDetails(<?= $student['id'] ?>, <?= $courseId ?>)">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            <?php if (strtolower($student['status'] ?? 'active') === 'pending'): ?>
                                                <button class="action-btn btn-success" onclick="approveStudent(<?= $student['enrollment_id'] ?>, '<?= esc($student['name']) ?>')" style="background: rgba(16, 185, 129, 0.1); color: var(--success);" onmouseover="this.style.background='var(--success)'; this.style.color='white';" onmouseout="this.style.background='rgba(16, 185, 129, 0.1)'; this.style.color='var(--success)';">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                                <button class="action-btn btn-remove" onclick="rejectStudent(<?= $student['enrollment_id'] ?>, '<?= esc($student['name']) ?>')">
                                                    <i class="fas fa-times"></i> Reject
                                                </button>
                                            <?php else: ?>
                                                <button class="action-btn btn-update" onclick="updateStudentStatus(<?= $student['enrollment_id'] ?>, '<?= esc($student['status'] ?? 'Active') ?>')">
                                                    <i class="fas fa-edit"></i> Update
                                                </button>
                                                <button class="action-btn btn-remove" onclick="removeStudent(<?= $student['enrollment_id'] ?>, '<?= esc($student['name']) ?>')">
                                                    <i class="fas fa-trash"></i> Remove
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-users"></i>
                        <h4>No students found</h4>
                        <p>No students are currently enrolled in this course or match your search criteria.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Student Details Modal -->
<div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentDetailsModalLabel">Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="studentDetailsContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusUpdateModal" tabindex="-1" aria-labelledby="statusUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusUpdateModalLabel">Update Student Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="statusUpdateForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Current Status</label>
                        <input type="text" class="form-control" id="currentStatus" readonly>
                    </div>
                    <div class="form-group">
                        <label for="newStatus" class="form-label">New Status</label>
                        <select class="form-control" id="newStatus" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Dropped">Dropped</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Optional remarks..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
let currentEnrollmentId = null;

function viewStudentDetails(studentId, courseId) {
    // Show loading
    $('#studentDetailsContent').html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>');
    $('#studentDetailsModal').modal('show');

    // Fetch student details
    $.ajax({
        url: '<?= base_url('teacher/get-student-details') ?>',
        type: 'GET',
        data: { student_id: studentId, course_id: courseId },
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        success: function(response) {
            if (response.success) {
                const student = response.student;
                $('#studentDetailsContent').html(`
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Student ID</label>
                                <input type="text" class="form-control" value="${student.student_id}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="${student.full_name}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" value="${student.email}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Program / Major</label>
                                <input type="text" class="form-control" value="${student.program}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Year Level</label>
                                <input type="text" class="form-control" value="${student.year_level}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Section</label>
                                <input type="text" class="form-control" value="${student.section}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Enrollment Date</label>
                                <input type="text" class="form-control" value="${new Date(student.enrollment_date).toLocaleDateString()}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" value="${student.status}" readonly>
                            </div>
                        </div>
                    </div>
                `);
            } else {
                $('#studentDetailsContent').html('<div class="alert alert-danger">Error loading student details.</div>');
            }
        },
        error: function() {
            $('#studentDetailsContent').html('<div class="alert alert-danger">Error loading student details.</div>');
        }
    });
}

function updateStudentStatus(enrollmentId, currentStatus) {
    currentEnrollmentId = enrollmentId;
    $('#currentStatus').val(currentStatus);
    $('#newStatus').val(currentStatus);
    $('#remarks').val('');
    $('#statusUpdateModal').modal('show');
}

function removeStudent(enrollmentId, studentName) {
    if (confirm(`Are you sure you want to remove ${studentName} from this course?`)) {
        $.ajax({
            url: '<?= base_url('teacher/remove-student') ?>',
            type: 'POST',
            data: {
                [document.querySelector('meta[name="csrf-name"]').getAttribute('content')]: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                enrollment_id: enrollmentId
            },
            success: function(response) {
                if (response.success) {
                    alert('Student removed successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Error removing student.');
            }
        });
    }
}

function approveStudent(enrollmentId, studentName) {
    if (confirm(`Are you sure you want to approve ${studentName}'s enrollment in this course?`)) {
        $.ajax({
            url: '<?= base_url('teacher/update-student-status') ?>',
            type: 'POST',
            data: {
                [document.querySelector('meta[name="csrf-name"]').getAttribute('content')]: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                enrollment_id: enrollmentId,
                status: 'Active'
            },
            success: function(response) {
                if (response.success) {
                    alert('Student approved successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Error approving student.');
            }
        });
    }
}

function rejectStudent(enrollmentId, studentName) {
    if (confirm(`Are you sure you want to reject ${studentName}'s enrollment application? This will remove them from the course.`)) {
        $.ajax({
            url: '<?= base_url('teacher/remove-student') ?>',
            type: 'POST',
            data: {
                [document.querySelector('meta[name="csrf-name"]').getAttribute('content')]: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                enrollment_id: enrollmentId
            },
            success: function(response) {
                if (response.success) {
                    alert('Student application rejected successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Error rejecting student application.');
            }
        });
    }
}

$('#statusUpdateForm').on('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    formData.append('enrollment_id', currentEnrollmentId);
    formData.append(document.querySelector('meta[name="csrf-name"]').getAttribute('content'), document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    $.ajax({
        url: '<?= base_url('teacher/update-student-status') ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                $('#statusUpdateModal').modal('hide');
                alert('Status updated successfully!');
                location.reload();
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function() {
            alert('Error updating status.');
        }
    });
});
</script>
<?= $this->endSection() ?>
