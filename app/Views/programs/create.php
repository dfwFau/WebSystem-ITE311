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

    .form-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 2rem;
        max-width: 700px;
        margin: 0 auto;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 0 3px rgba(115, 175, 111, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
        border: none;
        color: white;
        padding: 0.8rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-green));
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(115, 175, 111, 0.4);
        color: white;
    }

    .btn-secondary-custom {
        background: #e9ecef;
        border: none;
        color: #495057;
        padding: 0.8rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .btn-secondary-custom:hover {
        background: #dee2e6;
        color: #333;
    }

    .form-text {
        color: #6c757d;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .alert {
        border-radius: 12px;
        border: none;
    }

    .input-group-text {
        background: var(--bg-light);
        border: 2px solid #e9ecef;
        border-right: none;
        border-radius: 10px 0 0 10px;
        color: var(--primary-green);
    }

    .input-group .form-control {
        border-left: none;
        border-radius: 0 10px 10px 0;
    }

    .input-group:focus-within .input-group-text {
        border-color: var(--primary-green);
    }
</style>

<div class="page-header">
    <h1><i class="fas fa-plus-circle me-3"></i><?= esc($title) ?></h1>
    <p class="mb-0 mt-2 opacity-75">Create a new academic program</p>
</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        <ul class="mb-0">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="form-card">
    <form action="<?= base_url('programs/store') ?>" method="post">
        <?= csrf_field() ?>
        
        <div class="mb-4">
            <label for="program_name" class="form-label">
                <i class="fas fa-graduation-cap me-2 text-success"></i>Program Name *
            </label>
            <input type="text" class="form-control <?= session('errors.program_name') ? 'is-invalid' : '' ?>" 
                   id="program_name" name="program_name" 
                   value="<?= old('program_name') ?>"
                   placeholder="e.g., Bachelor of Science in Computer Science"
                   required>
            <div class="form-text">Enter the full name of the academic program.</div>
        </div>

        <div class="mb-4">
            <label for="program_code" class="form-label">
                <i class="fas fa-code me-2 text-success"></i>Program Code *
            </label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                <input type="text" class="form-control <?= session('errors.program_code') ? 'is-invalid' : '' ?>" 
                       id="program_code" name="program_code" 
                       value="<?= old('program_code') ?>"
                       placeholder="e.g., BSCS"
                       style="text-transform: uppercase;"
                       required>
            </div>
            <div class="form-text">A short code to identify the program (will be converted to uppercase).</div>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">
                <i class="fas fa-align-left me-2 text-success"></i>Description
            </label>
            <textarea class="form-control" id="description" name="description" 
                      rows="4" placeholder="Describe the program, its goals, and what students will learn..."><?= old('description') ?></textarea>
            <div class="form-text">Optional: Provide a description of the program.</div>
        </div>

        <hr class="my-4">

        <div class="d-flex gap-3 justify-content-end">
            <a href="<?= base_url('programs') ?>" class="btn btn-secondary-custom">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-primary-custom">
                <i class="fas fa-save me-2"></i>Create Program
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
