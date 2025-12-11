<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow" style="border-radius: 15px; border: none;">
                <div class="card-header bg-primary text-white text-center py-4" style="border-radius: 15px 15px 0 0 !important; border: none;">
                    <i class="fas fa-user-circle fa-2x mb-2"></i>
                    <h4 class="mb-1">Welcome Back</h4>
                    <p class="mb-0 small opacity-75">Sign in to your account</p>
                </div>
                <div class="card-body p-4">
                    <?php if (session()->getFlashdata('register_success')): ?>
                        <div class="alert alert-success border-0" style="border-radius: 10px;">
                            <i class="fas fa-check-circle me-2"></i> <?= esc(session()->getFlashdata('register_success')) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('login_error')): ?>
                        <div class="alert alert-danger border-0" style="border-radius: 10px;">
                            <i class="fas fa-exclamation-circle me-2"></i> <?= esc(session()->getFlashdata('login_error')) ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('login') ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">
                                <i class="fas fa-envelope text-primary me-1"></i>Email Address
                            </label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="<?= esc(old('email')) ?>" required
                                   style="border-radius: 10px; border: 2px solid #e9ecef;">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">
                                <i class="fas fa-lock text-primary me-1"></i>Password
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required
                                   style="border-radius: 10px; border: 2px solid #e9ecef;">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3"
                                style="border-radius: 10px; font-weight: 600;">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>
                    </form>

                    <div class="text-center">
                        <span class="text-muted">Don't have an account?</span>
                        <a href="<?= base_url('/register') ?>" class="text-decoration-none fw-bold text-primary ms-1">
                            Create one
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
