<?= $this->extend('template') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    body {
        background: #f8fbff; /* very light blue-white background */
    }
    .homepage-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.2s ease-in-out;
    }
    .homepage-card:hover {
        transform: translateY(-5px);
    }
    h1 {
        color: #0d6efd; /* Bootstrap primary blue */
    }
    p {
        color: #6c757d;
    }
    .divider {
        width: 60px;
        height: 4px;
        background: #0d6efd;
        margin: 10px auto 20px auto;
        border-radius: 3px;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="homepage-card text-center">
                <h1 class="fw-bold">Welcome 👋</h1>
                <div class="divider"></div>
                <p class="lead">This is your clean and simple homepage.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
