<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"><?= esc($title) ?></h2>
            
            <div class="alert alert-info">
                <h5 class="alert-heading">🎓 Student Dashboard</h5>
                <p class="mb-0">Welcome, <strong><?= esc($userName) ?></strong>! You are logged in as a <strong><?= esc(ucfirst($role)) ?></strong>.</p>
            </div>

            <!-- Enrolled Courses Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">My Enrolled Courses</h5>
                        </div>
                        <div class="card-body">
                            <div id="enrolled-courses-container">
                                <div class="text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2">Loading enrolled courses...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Available Courses Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Available Courses for Enrollment</h5>
                        </div>
                        <div class="card-body">
                            <div id="available-courses-container">
                                <div class="text-center">
                                    <div class="spinner-border text-success" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2">Loading available courses...</p>
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
                            <h5 class="card-title">My Grades</h5>
                            <p class="card-text">Check your academic performance and grades.</p>
                            <a href="<?= base_url('/student/grades') ?>" class="btn btn-primary">View Grades</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">My Assignments</h5>
                            <p class="card-text">View and submit your assignments.</p>
                            <a href="<?= base_url('/student/assignments') ?>" class="btn btn-primary">View Assignments</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Course Materials</h5>
                            <p class="card-text">Access course materials and resources.</p>
                            <a href="#" class="btn btn-primary">View Materials</a>
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
    loadEnrolledCourses();
    loadAvailableCourses();
});

function loadEnrolledCourses() {
    fetch('<?= base_url('/course/enrolled') ?>')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('enrolled-courses-container');
            
            if (data.success && data.courses.length > 0) {
                let html = '<div class="row">';
                data.courses.forEach(course => {
                    html += `
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100 border-success">
                                <div class="card-body">
                                    <h6 class="card-title text-success">${course.course_name}</h6>
                                    <p class="card-text text-muted small">${course.course_code}</p>
                                    <p class="card-text">${course.description || 'No description available'}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">${course.units ? course.units + ' units' : 'No units specified'}</small>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary" onclick="viewCourse(${course.course_id})">View</button>
                                            <button class="btn btn-outline-danger" onclick="unenrollCourse(${course.course_id})">Unenroll</button>
                                        </div>
                                    </div>
                                    <small class="text-success">
                                        <i class="fas fa-check-circle"></i> Enrolled on ${new Date(course.enrollment_date).toLocaleDateString()}
                                    </small>
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
                        <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No enrolled courses</h5>
                        <p class="text-muted">Browse available courses below to enroll!</p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error loading enrolled courses:', error);
            document.getElementById('enrolled-courses-container').innerHTML = `
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> Error loading enrolled courses. Please try again.
                </div>
            `;
        });
}

function loadAvailableCourses() {
    fetch('<?= base_url('/course/available') ?>')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('available-courses-container');
            
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
                                        <button class="btn btn-success btn-sm" onclick="enrollCourse(${course.course_id})">
                                            <i class="fas fa-plus"></i> Enroll
                                        </button>
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
                        <h5 class="text-muted">No available courses</h5>
                        <p class="text-muted">Check back later for new courses!</p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error loading available courses:', error);
            document.getElementById('available-courses-container').innerHTML = `
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> Error loading available courses. Please try again.
                </div>
            `;
        });
}

function enrollCourse(courseId) {
    if (confirm('Are you sure you want to enroll in this course?')) {
        fetch('<?= base_url('/course/enroll') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: `course_id=${courseId}&<?= csrf_token() ?>=<?= csrf_hash() ?>`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                loadEnrolledCourses();
                loadAvailableCourses();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error enrolling in course:', error);
            alert('An error occurred while enrolling. Please try again.');
        });
    }
}

function unenrollCourse(courseId) {
    if (confirm('Are you sure you want to unenroll from this course?')) {
        fetch('<?= base_url('/course/unenroll') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: `course_id=${courseId}&<?= csrf_token() ?>=<?= csrf_hash() ?>`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                loadEnrolledCourses();
                loadAvailableCourses();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error unenrolling from course:', error);
            alert('An error occurred while unenrolling. Please try again.');
        });
    }
}

function viewCourse(courseId) {
    // TODO: Implement course view functionality
    alert('Course view functionality will be implemented soon!');
}
</script>

<?= $this->endSection() ?>
