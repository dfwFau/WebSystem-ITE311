<?= $this->extend('template') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-plus-circle"></i> Create New Course
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Error Messages -->
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <h6 class="alert-heading">Please fix the following errors:</h6>
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/teacher/store-course') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Course Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control <?= session()->getFlashdata('errors.course_name') ? 'is-invalid' : '' ?>" 
                                   id="course_name" 
                                   name="course_name" 
                                   value="<?= old('course_name') ?>" 
                                   placeholder="e.g., Introduction to Programming"
                                   required>
                            <?php if (session()->getFlashdata('errors.course_name')): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session()->getFlashdata('errors.course_name')) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="course_code" class="form-label">Course Code <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control <?= session()->getFlashdata('errors.course_code') ? 'is-invalid' : '' ?>" 
                                   id="course_code" 
                                   name="course_code" 
                                   value="<?= old('course_code') ?>" 
                                   placeholder="e.g., CS101, MATH201"
                                   required>
                            <?php if (session()->getFlashdata('errors.course_code')): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session()->getFlashdata('errors.course_code')) ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-text">Course code must be unique and will be used by students to identify the course.</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control <?= session()->getFlashdata('errors.description') ? 'is-invalid' : '' ?>" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Brief description of the course content and objectives..."><?= old('description') ?></textarea>
                            <?php if (session()->getFlashdata('errors.description')): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session()->getFlashdata('errors.description')) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="units" class="form-label">Units</label>
                            <input type="number" 
                                   class="form-control <?= session()->getFlashdata('errors.units') ? 'is-invalid' : '' ?>" 
                                   id="units" 
                                   name="units" 
                                   value="<?= old('units') ?>" 
                                   min="1" 
                                   max="10"
                                   placeholder="e.g., 3">
                            <?php if (session()->getFlashdata('errors.units')): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session()->getFlashdata('errors.units')) ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-text">Number of credit units for this course (optional).</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('/teacher/classes') ?>" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Create Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-generate course code from course name
document.getElementById('course_name').addEventListener('input', function() {
    const courseName = this.value;
    const courseCodeField = document.getElementById('course_code');
    
    if (courseName && !courseCodeField.value) {
        // Generate a simple course code from the first letters of each word
        const words = courseName.split(' ');
        let code = '';
        
        if (words.length >= 2) {
            code = words[0].substring(0, 2).toUpperCase() + 
                   words[1].substring(0, 2).toUpperCase() + 
                   Math.floor(Math.random() * 100).toString().padStart(2, '0');
        } else if (words.length === 1) {
            code = words[0].substring(0, 4).toUpperCase() + 
                   Math.floor(Math.random() * 100).toString().padStart(2, '0');
        }
        
        courseCodeField.value = code;
    }
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const courseName = document.getElementById('course_name').value.trim();
    const courseCode = document.getElementById('course_code').value.trim();
    
    if (!courseName || !courseCode) {
        e.preventDefault();
        alert('Please fill in all required fields.');
        return false;
    }
    
    if (courseName.length < 3) {
        e.preventDefault();
        alert('Course name must be at least 3 characters long.');
        return false;
    }
    
    if (courseCode.length < 3) {
        e.preventDefault();
        alert('Course code must be at least 3 characters long.');
        return false;
    }
});
</script>

<?= $this->endSection() ?>
