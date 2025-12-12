<?= $this->extend('template') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .auth-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px 30px;
        max-width: 500px;
        margin: 0 auto;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .auth-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.12);
    }

    h1 {
        color: #73AF6F;
        font-weight: 700;
    }

    .form-label {
        color: #455a64;
        font-weight: 600;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #e9ecef;
    }

    .form-control:focus {
        border-color: #73AF6F;
        box-shadow: 0 0 0 0.2rem rgba(115, 175, 111, 0.25);
    }

    .btn.btn-primary {
        background: #73AF6F !important;
        border: 1px solid #73AF6F !important;
        border-radius: 10px;
        font-weight: 600;
        color: white !important;
        box-shadow: none !important;
    }

    .btn.btn-primary:hover {
        background: #5a8f58 !important;
        border-color: #5a8f58 !important;
        color: white !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(115, 175, 111, 0.3) !important;
    }

    .btn.btn-primary:focus {
        background: #73AF6F !important;
        border-color: #73AF6F !important;
        color: white !important;
        box-shadow: 0 0 0 0.2rem rgba(115, 175, 111, 0.25) !important;
    }

    .text-primary {
        color: #73AF6F !important;
    }

    .alert {
        border-radius: 10px;
    }

    @media (max-width: 576px) {
        .auth-card {
            padding: 30px 20px;
        }
    }
</style>

<div class="container py-5">
    <div class="auth-card">
        <h1 class="text-center mb-4">Sign In</h1>

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

        <form action="<?= base_url('login') ?>" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    required 
                    value="<?= esc(old('email')) ?>">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <p class="text-center mt-3 small text-muted">
            Don’t have an account? 
            <a href="<?= base_url('register') ?>" class="text-primary fw-semibold">Register</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>
