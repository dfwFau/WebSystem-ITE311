<?php if (session()->get('isLoggedIn')):
  $role = session()->get('userRole');
  $email = session()->get('userEmail');
  $name  = session()->get('userName') ?? 'User';
  $uri   = uri_string();

  // Sidebar menus by role
  $menus = [
    'admin' => [
      'title' => 'Administration',
      ['url' => '/dashboard',       'icon' => 'th-large',     'text' => 'Dashboard'],
      ['url' => '/manageusers',   'icon' => 'users-cog',    'text' => 'ManageUsers'],
      ['url' => '/courses',        'icon' => 'graduation-cap','text' => 'All Courses'],
      ['url' => '/programs',       'icon' => 'layer-group',  'text' => 'Programs'],
    ],
    'teacher' => [
      'title' => 'Teaching',
      ['url' => '/dashboard',                'icon' => 'th-large',       'text' => 'Dashboard'],
      ['url' => 'courses',                   'icon' => 'graduation-cap', 'text' => 'Courses'],
      ['url' => '/programs',                 'icon' => 'layer-group',    'text' => 'Programs'],
      ['url' => '/announcements/create',     'icon' => 'bullhorn',       'text' => 'Create Announcement'],
      ['url' => '/assignments',      'icon' => 'tasks',          'text' => 'Assignments'],
      ['url' => '/teacher/grades',           'icon' => 'star',           'text' => 'Grades'],
      ['url' => '/teacher/settings',         'icon' => 'cog',            'text' => 'Settings'],
    ],
    'student' => [
      'title' => 'Learning',
      ['url' => '/dashboard',            'icon' => 'th-large',       'text' => 'Dashboard'],
      ['url' => '/courses',      'icon' => 'graduation-cap', 'text' => 'Courses'],
      ['url' => '/assignments',  'icon' => 'tasks',          'text' => 'Assignments'],
      ['url' => '/student/grades',       'icon' => 'star',           'text' => 'Grades'],
      ['url' => '/announcements',        'icon' => 'bullhorn',       'text' => 'Announcements'],
    ],
  ];
?>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<div class="sidebar-wrapper" id="sidebar">

  <!-- Header -->
  <div class="sidebar-header">
    <a href="<?= base_url('/dashboard') ?>" class="sidebar-brand">
      <i class="fas fa-rocket"></i><span>ITE311-MORIL</span>
    </a>
  </div>

  <!-- User Info -->
  <div class="sidebar-user">
    <div class="user-profile">
      <div class="user-avatar-sidebar"><?= strtoupper(substr($email, 0, 1)) ?></div>
      <div class="user-info-sidebar">
        <div class="user-name-sidebar"><?= $name ?></div>
        <div class="user-email-sidebar"><?= $email ?></div>
        <span class="user-role-badge <?= $role ?>"><?= ucfirst($role) ?></span>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav class="sidebar-nav">
    <ul class="p-0 m-0" style="list-style:none;">
      
      <div class="nav-section-title"><?= $menus[$role]['title'] ?></div>

      <?php foreach (array_slice($menus[$role], 1) as $item): 
        $itemUrl = trim($item['url'], '/');
        // Better active state detection
        if ($itemUrl === 'dashboard') {
          $active = ($uri === 'dashboard' || $uri === '') ? 'active' : '';
        } else {
          $active = (strpos($uri, $itemUrl) !== false || $uri === $itemUrl) ? 'active' : '';
        }
      ?>
        <li class="nav-item-sidebar">
          <a href="<?= base_url($item['url']) ?>" class="nav-link-sidebar <?= $active ?>">
            <span class="nav-icon"><i class="fas fa-<?= $item['icon'] ?>"></i></span>
            <span class="nav-text"><?= $item['text'] ?></span>
          </a>
        </li>
      <?php endforeach; ?>

    </ul>
  </nav>

  <div class="sidebar-footer">
    <a href="<?= base_url('/logout') ?>" class="logout-btn-sidebar">
      <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
      <span class="nav-text">Logout</span>
    </a>
  </div>
</div>

<!-- Main Content -->
<div class="main-content" id="mainContent">

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="d-flex align-items-center gap-3">
      <button class="mobile-toggle" id="mobileToggle" style="display:none;">
        <i class="fas fa-bars"></i>
      </button>
      <h1>
        <?php
        // Dynamic page title based on current route
        $pageTitle = 'Dashboard';
        if ($uri === 'dashboard' || $uri === '') {
          $pageTitle = 'Dashboard';
        } elseif (strpos($uri, 'manageusers') !== false) {
          $pageTitle = 'ManageUsers';
        } elseif (strpos($uri, 'courses') !== false) {
          $pageTitle = 'Courses';
        } elseif (strpos($uri, 'announcements') !== false) {
          $pageTitle = 'Announcements';
        } elseif (strpos($uri, 'materials') !== false) {
          $pageTitle = 'Materials';
        } else {
          // Try to get title from menu
          foreach ($menus[$role] as $menuItem) {
            if (is_array($menuItem) && isset($menuItem['url'])) {
              $menuUrl = trim($menuItem['url'], '/');
              if (strpos($uri, $menuUrl) !== false || $uri === $menuUrl) {
                $pageTitle = $menuItem['text'];
                break;
              }
            }
          }
        }
        echo $pageTitle;
        ?>
      </h1>
    </div>

    <div class="top-bar-actions">

      <!-- Notifications -->
      <div class="dropdown">
        <button class="notification-bell-topbar" id="notificationDropdown" data-bs-toggle="dropdown">
          <i class="fas fa-bell"></i>
          <span id="notificationBadge" class="notification-badge-topbar" style="display:none;">0</span>
        </button>

        <ul class="dropdown-menu dropdown-menu-end notification-dropdown-menu">
          <li class="notification-dropdown-header">
            <h6><i class="fas fa-bell"></i> Notifications</h6>
            <div class="notification-header-actions">
              <button id="markAllRead" class="notification-action-btn"><i class="fas fa-check-double"></i></button>
              <button id="refreshNotifications" class="notification-action-btn"><i class="fas fa-sync-alt"></i></button>
            </div>
          </li>

          <div class="notification-body" id="notificationBody">
            <div class="notification-empty">
              <i class="fas fa-bell-slash"></i>
              <p><strong>No notifications</strong></p>
              <p class="small">You're all caught up!</p>
            </div>
          </div>
        </ul>
      </div>

    </div>
  </div>

  <div style="padding:2rem;">
    <?= $this->renderSection('content') ?>
  </div>

</div>

<?php else: ?>
<!-- Modern Guest Navigation -->
<?php $uri = uri_string(); ?>
<nav class="navbar-modern">
  <div class="navbar-container">
    <!-- Brand -->
    <div class="navbar-brand-modern">
      <a href="<?= base_url('/') ?>" class="brand-link">
        <div class="brand-icon">
          <i class="fas fa-rocket"></i>
        </div>
        <span class="brand-text">ITE311-MORIL</span>
      </a>
    </div>

    <!-- Mobile Toggle -->
    <button class="navbar-mobile-toggle" id="mobileNavToggle">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <!-- Navigation Links -->
    <div class="navbar-menu" id="navbarMenu">
      <ul class="navbar-nav-modern">
        <?php
          $guestPages = [
            '/'        => ['text' => 'Home', 'icon' => 'home'],
            '/about'   => ['text' => 'About', 'icon' => 'info-circle'],
            '/contact' => ['text' => 'Contact', 'icon' => 'envelope']
          ];
          foreach ($guestPages as $url => $text):
            $isActive = ($uri === trim($url, '/') || ($uri === '' && $url === '/')) ? 'active' : '';
        ?>
        <li class="navbar-item-modern">
          <a href="<?= base_url($url) ?>" class="navbar-link-modern <?= $isActive ?>">
            <i class="fas fa-<?= $text['icon'] ?>"></i>
            <span><?= $text['text'] ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>

      <!-- CTA Button -->
      <div class="navbar-cta">
        <a href="<?= base_url('/login') ?>" class="btn-navbar-login">
          <i class="fas fa-sign-in-alt"></i>
          <span>Login</span>
        </a>
      </div>
    </div>
  </div>
</nav>

<!-- Add Mobile Navbar Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const mobileToggle = document.getElementById('mobileNavToggle');
  const navbarMenu = document.getElementById('navbarMenu');

  if (mobileToggle) {
    mobileToggle.addEventListener('click', function() {
      navbarMenu.classList.toggle('active');
      this.classList.toggle('active');
    });

    // Close menu when link is clicked
    const navLinks = navbarMenu.querySelectorAll('.navbar-link-modern');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        navbarMenu.classList.remove('active');
        mobileToggle.classList.remove('active');
      });
    });
  }
});
</script>

<?php endif; ?>
