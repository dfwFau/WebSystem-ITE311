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
        <?php if (($role ?? session('userRole')) === 'admin'): ?>
            <h4>Administrator Dashboard</h4>
            <p>Welcome, <strong><?= esc($userName ?? session('userName')) ?></strong></p>
            <hr>
            <div class="text-start">
                <p class="mb-2">Total Users: <strong><?= esc($stats['totalUsers'] ?? 0) ?></strong></p>
                <div class="d-grid gap-2 mt-3">
                    <a href="#" class="btn btn-outline-primary btn-sm" disabled>Manage Users</a>
                    <a href="#" class="btn btn-outline-secondary btn-sm" disabled>View Reports</a>
                    <a href="#" class="btn btn-outline-success btn-sm" disabled>Site Settings</a>
                </div>
                <p class="mt-3 small text-muted">Links are placeholders for admin features.</p>
            </div>
        <?php else: ?>
            <h4>Welcome</h4>
            <p>You are logged in as <strong><?= esc($userEmail ?? session('userEmail')) ?></strong></p>
            <p class="small text-muted">This dashboard currently includes admin features only.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
