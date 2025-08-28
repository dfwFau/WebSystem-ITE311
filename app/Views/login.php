<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: #f8fbff; /* light blue background */
    }
    .auth-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    h1 {
        color: #0d6efd;
    }
    .form-control {
        border-radius: 10px;
        border: 1px solid #d1e3ff;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.25);
    }
    .btn-primary {
        background: #0d6efd;
        border: none;
        border-radius: 10px;
    }
    .btn-primary:hover {
        background: #0b5ed7;
    }
</style>

<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-5">
        <h1 class="text-center mb-4 fw-bold">Sign In</h1>

        <?php if (session()->getFlashdata('register_success')): ?>
            <div class="alert alert-success" role="alert">
                <?= esc(session()->getFlashdata('register_success')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('login_error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= esc(session()->getFlashdata('login_error')) ?>
            </div>
        <?php endif; ?>

        <div class="auth-card">
            <form action="<?= base_url('login') ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?= esc(old('email')) ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>

        <p class="text-center mt-3 small text-muted">
            Don't have an account? <a href="<?= base_url('register') ?>" class="text-primary fw-semibold">Register</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>
