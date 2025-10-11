<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><?= esc($title) ?></h2>
                <a href="<?= base_url('/teacher/create-course') ?>" class="btn btn-success">
                    <i class="fas fa-plus"></i> Create New Course
                </a>
            </div>
            
            <!-- Success/Error Messages -->
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

            <div class="alert alert-info">
                <h5 class="alert-heading">👨‍🏫 Teacher Dashboard</h5>
                <p class="mb-0">Welcome, <strong><?= esc($userName) ?></strong>! You are logged in as a <strong><?= esc(ucfirst($role)) ?></strong>.</p>
            </div>

            <!-- Courses Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Available Courses</h5>
                        </div>
                        <div class="card-body">
                            <div id="courses-container">
                                <div class="text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2">Loading courses...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Teaching Materials</h5>
                            <p class="card-text">Upload and organize course materials.</p>
                            <a href="<?= base_url('/teacher/materials') ?>" class="btn btn-primary">Manage Materials</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grade Students</h5>
                            <p class="card-text">Grade assignments and track student progress.</p>
                            <a href="<?= base_url('/teacher/grades') ?>" class="btn btn-primary">Grade Students</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Course Analytics</h5>
                            <p class="card-text">View enrollment statistics and course performance.</p>
                            <a href="#" class="btn btn-primary">View Analytics</a>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadCourses();
});

function loadCourses() {
    fetch('<?= base_url('/teacher/get-courses') ?>')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('courses-container');
            
            if (data.success && data.courses.length > 0) {
                let html = '<div class="row">';
                data.courses.forEach(course => {
                    html += `
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">${course.course_name}</h6>
                                    <p class="card-text text-muted small">${course.course_code}</p>
                                    <p class="card-text">${course.description || 'No description available'}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">${course.units ? course.units + ' units' : 'No units specified'}</small>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary" onclick="editCourse(${course.course_id})">Edit</button>
                                            <button class="btn btn-outline-danger" onclick="deleteCourse(${course.course_id})">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                html += '</div>';
                container.innerHTML = html;
            } else {
                container.innerHTML = `
                    <div class="text-center py-4">
                        <i class="fas fa-book fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No courses found</h5>
                        <p class="text-muted">Create your first course to get started!</p>
                        <a href="<?= base_url('/teacher/create-course') ?>" class="btn btn-success">Create Course</a>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error loading courses:', error);
            document.getElementById('courses-container').innerHTML = `
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> Error loading courses. Please try again.
                </div>
            `;
        });
}

function editCourse(courseId) {
    // TODO: Implement edit functionality
    alert('Edit functionality will be implemented soon!');
}

function deleteCourse(courseId) {
    if (confirm('Are you sure you want to delete this course? This action cannot be undone.')) {
        // TODO: Implement delete functionality
        alert('Delete functionality will be implemented soon!');
    }
}
</script>

<?= $this->endSection() ?>
