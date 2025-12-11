<?= $this->extend('template') ?>

<?= $this->section('title') ?>Admin Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <h1>Admin Dashboard</h1>
    <p class="text-muted">Welcome back, Admin</p>
    <hr>

    <!-- System Statistics -->
    <div class="mb-4">
        <h3>System Statistics</h3>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><i class="fas fa-users"></i> Total Users</td>
                    <td><strong>1,247</strong></td>
                </tr>
                <tr>
                    <td><i class="fas fa-graduation-cap"></i> Active Courses</td>
                    <td><strong>48</strong></td>
                </tr>
                <tr>
                    <td><i class="fas fa-clipboard-list"></i> Assignments</td>
                    <td><strong>324</strong></td>
                </tr>
                <tr>
                    <td><i class="fas fa-exclamation-triangle"></i> Pending Issues</td>
                    <td><strong>18</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Quick Actions -->
    <div class="mb-4">
        <h3>Quick Actions</h3>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="<?= base_url('/manageusers') ?>" class="text-decoration-none">
                    <i class="fas fa-users"></i> Manage Users
                </a>
            </li>
            <li class="list-group-item">
                <a href="<?= base_url('/courses') ?>" class="text-decoration-none">
                    <i class="fas fa-graduation-cap"></i> View Courses
                </a>
            </li>
            <li class="list-group-item">
                <a href="<?= base_url('/admin/reports') ?>" class="text-decoration-none">
                    <i class="fas fa-chart-bar"></i> View Reports
                </a>
            </li>
            <li class="list-group-item">
                <a href="<?= base_url('/admin/settings') ?>" class="text-decoration-none">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
        </ul>
    </div>
</div>

<?= $this->endSection() ?>
