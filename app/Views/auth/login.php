<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<style>
  .login-page {
    background: linear-gradient(135deg, #f8fafc 0%, #e8f5e8 100%);
    min-height: calc(100vh - 100px);
    padding: 3rem 1rem;
  }
  
  .login-card {
    border-radius: 16px;
    border: 1px solid rgba(115, 175, 111, 0.2);
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.1);
    overflow: hidden;
    background: white;
  }
  
  .login-header {
    background: linear-gradient(135deg, #73AF6F 0%, #5a8f58 100%);
    color: white;
    padding: 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  
  .login-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
  }
  
  .login-header i, .login-header h4, .login-header p {
    position: relative;
    z-index: 1;
  }
  
  .login-body {
    padding: 2rem;
  }
  
  .form-label {
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.5rem;
  }
  
  .form-label i {
    color: #73AF6F;
  }
  
  .form-control {
    border-radius: 10px;
    border: 2px solid rgba(115, 175, 111, 0.2);
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
  }
  
  .form-control:focus {
    border-color: #73AF6F;
    box-shadow: 0 0 0 4px rgba(115, 175, 111, 0.1);
  }
  
  .btn-login {
    background: linear-gradient(135deg, #73AF6F 0%, #5a8f58 100%);
    border: none;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
  }
  
  .btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
    color: white;
  }
  
  .link-green {
    color: #73AF6F;
    font-weight: 600;
  }
  
  .link-green:hover {
    color: #5a8f58;
  }
  
  .alert-success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    border: none;
    color: #065f46;
  }
  
  .alert-danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    border: none;
    color: #991b1b;
  }
</style>

<div class="login-page">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="login-card">
          <div class="login-header">
            <i class="fas fa-user-circle fa-3x mb-3"></i>
            <h4 class="mb-1">Welcome Back</h4>
            <p class="mb-0 opacity-75">Sign in to your account</p>
          </div>
          <div class="login-body">
            <?php if (session()->getFlashdata('register_success')): ?>
              <div class="alert alert-success" style="border-radius: 10px;">
                <i class="fas fa-check-circle me-2"></i> <?= esc(session()->getFlashdata('register_success')) ?>
              </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('login_error')): ?>
              <div class="alert alert-danger" style="border-radius: 10px;">
                <i class="fas fa-exclamation-circle me-2"></i> <?= esc(session()->getFlashdata('login_error')) ?>
              </div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="post">
              <?= csrf_field() ?>

              <div class="mb-3">
                <label for="email" class="form-label">
                  <i class="fas fa-envelope me-1"></i>Email Address
                </label>
                <input type="email" class="form-control" id="email" name="email"
                       value="<?= esc(old('email')) ?>" required
                       placeholder="Enter your email">
              </div>

              <div class="mb-4">
                <label for="password" class="form-label">
                  <i class="fas fa-lock me-1"></i>Password
                </label>
                <input type="password" class="form-control" id="password" name="password" required
                       placeholder="Enter your password">
              </div>

              <button type="submit" class="btn btn-login w-100 py-2 mb-3">
                <i class="fas fa-sign-in-alt me-2"></i>Sign In
              </button>
            </form>

            <div class="text-center">
              <span class="text-muted">Don't have an account?</span>
              <a href="<?= base_url('/register') ?>" class="text-decoration-none link-green ms-1">
                Create one
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
