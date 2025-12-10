<?= $this->extend('template') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero -->
<div class="container mb-5">
  <div class="card hero-card shadow-sm border-0">
    <div class="card-body text-center p-5">
      <span class="badge bg-primary mb-3">Welcome</span>

      <h1 class="fw-bold mb-3">
        Learning Made Simple with
        <span class="text-primary">CodeIgniter 4</span>
      </h1>

      <p class="text-muted fs-5 mb-4">
        A modern learning platform designed for speed, security, and simplicity.
      </p>

      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="<?= base_url('/login') ?>" class="btn btn-primary btn-lg px-4">
          Get Started
        </a>
        <a href="<?= base_url('/contact') ?>" class="btn btn-outline-secondary btn-lg px-4">
          Contact Us
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Features -->
<div class="container mb-5">
  <h2 class="fw-bold text-center mb-4">Platform Features</h2>

  <div class="row g-4">
    <div class="col-md-6 col-lg-3">
      <div class="card feature-card h-100 shadow-sm border-0 text-center">
        <div class="card-body">
          <i class="fas fa-bolt feature-icon text-primary mb-3"></i>
          <h6 class="fw-bold">Fast Performance</h6>
          <p class="text-muted small mb-0">
            Optimized with CodeIgniter 4 for speed and efficiency.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="card feature-card h-100 shadow-sm border-0 text-center">
        <div class="card-body">
          <i class="fas fa-shield-alt feature-icon text-success mb-3"></i>
          <h6 class="fw-bold">Secure System</h6>
          <p class="text-muted small mb-0">
            Built-in protection against common web vulnerabilities.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="card feature-card h-100 shadow-sm border-0 text-center">
        <div class="card-body">
          <i class="fas fa-layer-group feature-icon text-info mb-3"></i>
          <h6 class="fw-bold">Organized Content</h6>
          <p class="text-muted small mb-0">
            Courses, materials, and users managed efficiently.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="card feature-card h-100 shadow-sm border-0 text-center">
        <div class="card-body">
          <i class="fas fa-mobile-alt feature-icon text-warning mb-3"></i>
          <h6 class="fw-bold">Responsive Design</h6>
          <p class="text-muted small mb-0">
            Works perfectly on desktop, tablet, and mobile.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- About / Info -->
<div class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h4 class="fw-bold mb-3">Modern Technology Stack</h4>
          <ul class="list-unstyled text-muted">
            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>CodeIgniter 4 Framework</li>
            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Bootstrap 5 UI</li>
            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Secure Authentication</li>
            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Scalable Architecture</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h4 class="fw-bold mb-3">Why Use This Platform?</h4>
          <p class="text-muted">
            Designed for schools and institutions that need a reliable,
            easy-to-use system for course and content management.
          </p>

          <div class="row text-center mt-4">
            <div class="col-4">
              <h4 class="fw-bold text-primary mb-0">99%</h4>
              <small class="text-muted">Uptime</small>
            </div>
            <div class="col-4">
              <h4 class="fw-bold text-primary mb-0">24/7</h4>
              <small class="text-muted">Access</small>
            </div>
            <div class="col-4">
              <h4 class="fw-bold text-primary mb-0">100+</h4>
              <small class="text-muted">Courses</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CTA -->
<div class="container mb-5">
  <div class="card cta-card border-0 text-center shadow-sm">
    <div class="card-body p-5">
      <h2 class="fw-bold mb-3">Ready to Begin?</h2>
      <p class="text-muted mb-4">
        Log in now and start managing or learning today.
      </p>
      <a href="<?= base_url('/login') ?>" class="btn btn-primary btn-lg px-5">
        Login Now
      </a>
    </div>
  </div>
</div>

<style>
.hero-card {
  background: linear-gradient(180deg, #f8fafc, #ffffff);
  border-radius: 20px;
}

.feature-icon {
  font-size: 2rem;
}

.feature-card {
  border-radius: 16px;
  transition: transform .3s ease;
}

.feature-card:hover {
  transform: translateY(-6px);
}

.cta-card {
  background: linear-gradient(135deg, #0d6efd, #0a58ca);
  color: white;
  border-radius: 22px;
}

.cta-card p {
  color: rgba(255,255,255,.85);
}
</style>

<?= $this->endSection() ?>
