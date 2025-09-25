<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ?> - MySite</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f8fbff; /* same as login page */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Navbar */
    .navbar {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border-radius: 0 0 20px 20px;
      transition: all 0.3s ease;
    }

    .navbar-brand {
      font-weight: 700;
      color: #00796b !important; /* match login accent */
    }

    .navbar .btn {
      border-radius: 10px;
      font-weight: 600;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .navbar .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
    }

    /* Page container (similar feel as auth card) */
    main.container {
      background: #ffffff;
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    main.container:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 35px rgba(0, 0, 0, 0.12);
    }

    /* Footer */
    footer {
      background: #00796b;
      color: white;
      font-size: 0.9rem;
      border-radius: 20px 20px 0 0;
      box-shadow: 0 -4px 12px rgba(0,0,0,0.08);
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

  <?php if (!session()->get('isAuthenticated')): ?>
    <!-- NAVBAR for guests -->
    <nav class="navbar navbar-expand-lg bg-white">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">MySite</a>
        <div class="ms-auto">
          <a class="btn btn-outline-primary me-2" href="<?= base_url('/') ?>">Home</a>
          <a class="btn btn-outline-primary me-2" href="<?= base_url('/about') ?>">About</a>
          <a class="btn btn-outline-primary me-2" href="<?= base_url('/contact') ?>">Contact</a>
          <a class="btn btn-primary" href="<?= base_url('/login') ?>">Login</a>
        </div>
      </div>
    </nav>
  <?php else: ?>
    <!-- NAVBAR for logged-in users -->
    <nav class="navbar navbar-expand-lg bg-white">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url('/dashboard') ?>">MySite</a>
        <div class="ms-auto">
          <a class="btn btn-outline-primary me-2" href="<?= base_url('/dashboard') ?>">Dashboard</a>
          <a class="btn btn-danger" href="<?= base_url('/logout') ?>">Logout</a>
        </div>
      </div>
    </nav>
  <?php endif; ?>

  <!-- Page Content -->
  <main class="container my-4 flex-grow-1">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <footer class="text-center py-3 mt-auto">
    <small>&copy; <?= date('Y') ?> MySite. All rights reserved.</small>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
