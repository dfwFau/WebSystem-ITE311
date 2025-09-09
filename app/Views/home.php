<?= $this->extend('template') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    body {
        background: #f8fbff; /* light blue-white background */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .homepage-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px 30px;
        max-width: 600px;
        margin: 0 auto; /* keeps it centered */
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
    }

    .homepage-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.12);
    }

    h1 {
        color: #00796b; /* deep teal */
        font-weight: 700;
        font-size: 2.3rem;
    }

    p {
        color: #455a64; /* dark gray-blue */
        font-size: 1.1rem;
    }

    .divider {
        width: 70px;
        height: 4px;
        background: #00796b;
        margin: 15px auto 25px auto;
        border-radius: 3px;
    }

    @media (max-width: 768px) {
        .homepage-card {
            padding: 30px 20px;
        }

        h1 {
            font-size: 2rem;
        }

        p {
            font-size: 1rem;
        }
    }
</style>

<div class="container py-5">
    <div class="homepage-card">
        <h1>Welcome 👋</h1>
        <div class="divider"></div>
        <p class="lead">You've arrived at a beautifully updated homepage layout with clean visuals and soft colors.</p>
    </div>
</div>
<?= $this->endSection() ?>
