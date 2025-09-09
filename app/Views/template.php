<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            color: #00796b;
            font-weight: bold;
        }

        .nav-link {
            color: #00796b !important;
            font-weight: 500;
            transition: color 0.2s ease-in-out;
        }

        .nav-link:hover {
            color: #004d40 !important;
        }

        .btn-logout {
            font-size: 0.9rem;
            padding: 6px 14px;
            border-radius: 8px;
            border: 1px solid #dc3545;
            color: #dc3545;
            transition: all 0.2s ease-in-out;
        }

        .btn-logout:hover {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Brand goes to Dashboard if logged in, else Home -->
            <a class="navbar-brand" href="<?= session()->get('isLoggedIn') ? base_url('dashboard') : base_url('/') ?>">
            Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Public Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('contact') ?>">Contact</a>
                    </li>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <!-- Authenticated -->
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-danger btn-logout ms-2" href="<?= base_url('logout') ?>">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <?= $this->renderSection('content') ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
