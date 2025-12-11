<?= $this->extend('template') ?>

<?= $this->section('title') ?>
Create New Course
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h2>Create New Course</h2>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <strong>Please fix the following errors:</strong>
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= base_url('courses/create') ?>">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="course_number" class="form-label">Course Code & Name *</label>
                                <input type="text" id="course_number" name="course_number"
                                       class="form-control <?= session('errors') && isset(session('errors')['course_number']) ? 'is-invalid' : '' ?>"
                                       value="<?= old('course_number') ?>"
                                       placeholder="e.g., CS101 - Introduction to Computer Science" required>
                                <?php if (session('errors') && isset(session('errors')['course_number'])): ?>
                                    <div class="invalid-feedback"><?= session('errors')['course_number'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="units" class="form-label">Units</label>
                                <select id="units" name="units" class="form-select">
                                    <option value="3" <?= old('units') == '3' || old('units') == '' ? 'selected' : '' ?>>3 Units</option>
                                    <option value="1" <?= old('units') == '1' ? 'selected' : '' ?>>1 Unit</option>
                                    <option value="2" <?= old('units') == '2' ? 'selected' : '' ?>>2 Units</option>
                                    <option value="4" <?= old('units') == '4' ? 'selected' : '' ?>>4 Units</option>
                                    <option value="5" <?= old('units') == '5' ? 'selected' : '' ?>>5 Units</option>
                                    <option value="6" <?= old('units') == '6' ? 'selected' : '' ?>>6 Units</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="academic_year" class="form-label">Academic Year</label>
                                <select id="academic_year" name="academic_year" class="form-select">
                                    <option value="">Select academic year</option>
                                    <?php
                                    $currentYear = date('Y');
                                    for ($i = 0; $i <= 5; $i++) {
                                        $startYear = $currentYear + $i;
                                        $endYear = $startYear + 1;
                                        $yearRange = $startYear . '-' . $endYear;
                                        $selected = old('academic_year') == $yearRange ? 'selected' : '';
                                        echo "<option value='{$yearRange}' {$selected}>{$yearRange}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <select id="semester" name="semester" class="form-select">
                                    <option value="">Select semester</option>
                                    <option value="First Semester" <?= old('semester') == 'First Semester' ? 'selected' : '' ?>>First Semester</option>
                                    <option value="Second Semester" <?= old('semester') == 'Second Semester' ? 'selected' : '' ?>>Second Semester</option>
                                    <option value="Summer" <?= old('semester') == 'Summer' ? 'selected' : '' ?>>Summer</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="term" class="form-label">Term</label>
                                <select id="term" name="term" class="form-select">
                                    <option value="">Select term</option>
                                    <option value="Prelim" <?= old('term') == 'Prelim' ? 'selected' : '' ?>>Prelim</option>
                                    <option value="Midterm" <?= old('term') == 'Midterm' ? 'selected' : '' ?>>Midterm</option>
                                    <option value="Final" <?= old('term') == 'Final' ? 'selected' : '' ?>>Final</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="schedule_time" class="form-label">Schedule Time</label>
                                <input type="time" id="schedule_time" name="schedule_time"
                                       class="form-control" value="<?= old('schedule_time') ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="schedule_date" class="form-label">Schedule Date</label>
                                <input type="date" id="schedule_date" name="schedule_date"
                                       class="form-control" value="<?= old('schedule_date') ?>"
                                       min="<?= date('Y') . '-01-01' ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control"
                                          placeholder="Enter course description (optional)"
                                          maxlength="500"><?= old('description') ?></textarea>
                            </div>

                            <?php if ($userRole === 'admin'): ?>
                            <div class="col-12 mb-3">
                                <label for="teacher_id" class="form-label">Assign to Teacher *</label>
                                <select id="teacher_id" name="teacher_id"
                                        class="form-select <?= session('errors') && isset(session('errors')['teacher_id']) ? 'is-invalid' : '' ?>" required>
                                    <option value="">Select a teacher</option>
                                    <?php
                                    $db = \Config\Database::connect();
                                    $teachers = $db->table('users')
                                        ->select('users.id, users.name, users.email')
                                        ->join('roles', 'roles.id = users.role_id')
                                        ->where('roles.role_name', 'teacher')
                                        ->where('users.deleted_at', null)
                                        ->orderBy('users.name')
                                        ->get()
                                        ->getResultArray();

                                    foreach ($teachers as $teacher):
                                    ?>
                                        <option value="<?= $teacher['id'] ?>" <?= old('teacher_id') == $teacher['id'] ? 'selected' : '' ?>>
                                            <?= esc($teacher['name']) ?> (<?= esc($teacher['email']) ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (session('errors') && isset(session('errors')['teacher_id'])): ?>
                                    <div class="invalid-feedback d-block"><?= session('errors')['teacher_id'] ?></div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Create Course
                            </button>
                            <a href="<?= base_url('courses') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>
