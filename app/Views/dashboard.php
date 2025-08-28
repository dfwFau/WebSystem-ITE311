<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: #f8fbff; /* light blue background */
    }
    .dashboard-header h2 {
        color: #0d6efd;
    }
    .dashboard-header .btn-logout {
        border-radius: 8px;
    }
    .welcome-box {
        border-radius: 12px;
        background: #0d6efd;
        color: white;
        font-weight: 500;
    }
</style>

<div class="container py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 dashboard-header">
        <h2 class="fw-bold">Dashboard</h2>
        <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-outline-danger btn-logout">Logout</a>
    </div>

    <!-- Welcome -->
    <div class="welcome-box shadow-sm p-3">
        👋 Welcome back, <strong><?= esc(session('userEmail')) ?></strong>!
    </div>

</div>
<?= $this->endSection() ?>
