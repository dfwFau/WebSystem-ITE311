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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/dashboard') ?>">MySite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <!-- Common link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/dashboard') ?>">Dashboard</a>
                </li>

                <!-- Admin links -->
                <?php if (session()->get('userRole') === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/manage-users') ?>">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/reports') ?>">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/admin/settings') ?>">Settings</a>
                    </li>
                <?php endif; ?>

                <!-- Teacher links -->
                <?php if (session()->get('userRole') === 'teacher'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/teacher/classes') ?>">My Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/teacher/materials') ?>">Materials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/teacher/grades') ?>">Grade Students</a>
                    </li>
                <?php endif; ?>

                <!-- Student links -->
                <?php if (session()->get('userRole') === 'student'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/student/courses') ?>">My Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/student/grades') ?>">My Grades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/student/assignments') ?>">Assignments</a>
                    </li>
                <?php endif; ?>

                <!-- Logout -->
                <?php if (session()->get('isAuthenticated')): ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= base_url('/logout') ?>">Logout</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>

  <!-- Page Content -->
  <main class="container my-4 flex-grow-1">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
