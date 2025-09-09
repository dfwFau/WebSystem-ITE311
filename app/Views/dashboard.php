<?= $this->extend('template') ?>
                
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    body {
        background: linear-gradient(to right, #e0f7fa, #f1f8e9); /* soft teal to light green */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 30px 25px;
        width: 100%;
        max-width: 500px; /* fixed smaller card width */
        margin: 0 auto; /* center horizontally */
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.12);
    }

    h4 {
        color: #00796b;
        font-weight: 600;
    }

    p {
        color: #455a64;
        font-size: 1.05rem;
    }

    @media (max-width: 768px) {
        .dashboard-card {
            padding: 25px 20px;
        }
    }
</style>

<div class="container py-5 d-flex justify-content-center">
    <div class="dashboard-card">
        <h4> Welcome to this page </h4>
        <p>You are logged in as <strong><?= esc(session('userEmail')) ?></strong></p>
    </div>
</div>  
<?= $this->endSection() ?>
