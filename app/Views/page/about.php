<?= $this->extend('template') ?>

<?= $this->section('title') ?>About<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="container mb-5">
    <div class="card shadow-sm border-0">
        <div class="card-body text-center p-5">
            <span class="badge bg-primary mb-3">About Us</span>
            <h1 class="fw-bold mb-3">Who We Are</h1>
            <p class="text-muted fs-5 mb-0">
                A modern system built using <strong>CodeIgniter 4</strong> to deliver
                speed, clarity, and reliability.
            </p>
        </div>
    </div>
</div>

<!-- Mission & Vision -->
<div class="container mb-5">
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">
                        <i class="fas fa-bullseye text-primary me-2"></i>Our Mission
                    </h4>
                    <p class="text-muted">
                        Our mission is to create a simple, efficient, and user-friendly
                        web application that is easy to use and easy to maintain.
                    </p>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>User-friendly interfaces</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Clean and structured code</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Scalable system design</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Reliable performance</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">
                        <i class="fas fa-eye text-success me-2"></i>Our Vision
                    </h4>
                    <p class="text-muted">
                        We envision a platform where technology supports learning,
                        organization, and growth through reliable and accessible systems.
                    </p>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Accessible technology</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Continuous improvement</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Practical innovation</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Sustainable development</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Core Values -->
<div class="container mb-5">
    <h2 class="fw-bold text-center mb-4">Our Core Values</h2>

    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="fas fa-lightbulb text-primary fs-2 mb-3"></i>
                    <h6 class="fw-bold">Innovation</h6>
                    <p class="text-muted small">
                        We continuously explore better ways to build and improve systems.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="fas fa-shield-alt text-success fs-2 mb-3"></i>
                    <h6 class="fw-bold">Quality</h6>
                    <p class="text-muted small">
                        Every feature is built with stability and reliability in mind.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="fas fa-users text-info fs-2 mb-3"></i>
                    <h6 class="fw-bold">Collaboration</h6>
                    <p class="text-muted small">
                        We believe good systems are created through teamwork.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="fas fa-chart-line text-warning fs-2 mb-3"></i>
                    <h6 class="fw-bold">Growth</h6>
                    <p class="text-muted small">
                        Learning and improvement never stop.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Technology Stack -->
<div class="container mb-5">
    <h2 class="fw-bold text-center mb-4">Technology Stack</h2>

    <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-4 col-lg-2 text-center">
            <div class="card shadow-sm border-0 p-3">
                <i class="fab fa-php fs-2 text-primary mb-2"></i>
                <small class="fw-bold">PHP 8+</small>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center">
            <div class="card shadow-sm border-0 p-3">
                <i class="fas fa-fire fs-2 text-danger mb-2"></i>
                <small class="fw-bold">CodeIgniter 4</small>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center">
            <div class="card shadow-sm border-0 p-3">
                <i class="fab fa-bootstrap fs-2 text-purple mb-2"></i>
                <small class="fw-bold">Bootstrap 5</small>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center">
            <div class="card shadow-sm border-0 p-3">
                <i class="fas fa-database fs-2 text-success mb-2"></i>
                <small class="fw-bold">MySQL</small>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="container mb-5">
    <div class="card cta-card shadow-sm border-0 text-center">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-3">Want to Know More?</h2>
            <p class="text-muted mb-4">
                Reach out to us and let’s build something meaningful together.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="<?= base_url('/contact') ?>" class="btn btn-primary btn-lg px-4">
                    Contact Us
                </a>
                <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary btn-lg px-4">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.cta-card {
    background: linear-gradient(180deg, #f8fafc, #ffffff);
    border-radius: 20px;
}
</style>

<?= $this->endSection() ?>
