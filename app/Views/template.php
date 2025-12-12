
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?= csrf_hash() ?>" />
  <meta name="csrf-name" content="<?= csrf_token() ?>" />
  <title><?= $this->renderSection('title') ?></title>

  <!-- Icons + Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
/* ========================================================================== */
/*                    MODERN DESIGN SYSTEM - REDESIGNED                      */
/* ========================================================================== */

:root {
  /* Single Color Green Theme */
  --primary: #73AF6F;
  --primary-dark: #5a8f58;
  --primary-light: #8bbf84;
  --primary-hover: #5a8f58;
  --secondary: #64748b;
  --accent: #73AF6F;
  --success: #73AF6F;
  --warning: #d97706;
  --danger: #dc2626;

  /* Clean Neutrals */
  --white: #ffffff;
  --gray-50: #f8fafc;
  --gray-100: #f1f5f9;
  --gray-200: #e2e8f0;
  --gray-300: #cbd5e1;
  --gray-400: #94a3b8;
  --gray-500: #64748b;
  --gray-600: #475569;
  --gray-700: #334155;
  --gray-800: #1e293b;
  --gray-900: #0f172a;

  /* Layout Dimensions */
  --sidebar-width: 260px;
  --sidebar-collapsed: 200px;
  --topbar-height: 64px;

  /* Spacing System */
  --space-1: 0.25rem;
  --space-2: 0.5rem;
  --space-3: 0.75rem;
  --space-4: 1rem;
  --space-5: 1.25rem;
  --space-6: 1.5rem;
  --space-8: 2rem;

  /* Border Radius */
  --radius-sm: 4px;
  --radius-md: 6px;
  --radius-lg: 8px;
  --radius-xl: 12px;
  --radius-full: 9999px;

  /* Minimal Shadows */
  --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
  --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
  --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);

  /* Clean Transitions */
  --transition-fast: 0.15s ease;
  --transition-base: 0.2s ease;
  --transition-slow: 0.3s ease;
}

/* ========================================================================== */
/*                          FOUNDATION & RESET                                */
/* ========================================================================== */
*, *::before, *::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  height: 100%;
  scroll-behavior: smooth;
  -webkit-text-size-adjust: 100%;
}

body {
  font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.6;
  color: var(--gray-700);
  background: var(--gray-50);
  min-height: 100vh;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
}

/* Typography */
h1, h2, h3, h4, h5, h6 {
  font-weight: 700;
  line-height: 1.2;
  color: var(--gray-900);
  margin: 0;
  letter-spacing: -0.5px;
}

h1 { font-size: 2.25rem; }
h2 { font-size: 1.875rem; }
h3 { font-size: 1.5rem; }
h4 { font-size: 1.25rem; }
h5 { font-size: 1.125rem; }
h6 { font-size: 1rem; }

a {
  color: var(--primary);
  text-decoration: none;
  transition: var(--transition-base);
  font-weight: 500;
}

a:hover {
  color: var(--primary-dark);
}

button {
  font-family: inherit;
  cursor: pointer;
  border: none;
  outline: none;
  transition: var(--transition-base);
}

/* ========================================================================== */
/*                    MODERN GUEST NAVBAR STYLES                              */
/* ========================================================================== */
.navbar-modern {
  position: sticky;
  top: 0;
  z-index: 1000;
  background: var(--white);
  border-bottom: 1px solid var(--gray-200);
  box-shadow: var(--shadow-sm);
}

.navbar-container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 var(--space-6);
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 70px;
}

.navbar-brand-modern {
  flex-shrink: 0;
}

.brand-link {
  display: flex;
  align-items: center;
  gap: var(--space-3);
  text-decoration: none;
  transition: var(--transition-base);
}

.brand-icon {
  width: 44px;
  height: 44px;
  border-radius: var(--radius-md);
  background: #73AF6F;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 1.25rem;
  transition: var(--transition-base);
  box-shadow: var(--shadow-md);
}

.brand-link:hover .brand-icon {
  transform: scale(1.08);
  box-shadow: var(--shadow-lg);
}

.brand-text {
  font-size: 1.25rem;
  font-weight: 800;
  color: #73AF6F;
  letter-spacing: -0.5px;
}

/* Navigation Menu */
.navbar-menu {
  display: flex;
  align-items: center;
  gap: var(--space-2);
}

.navbar-nav-modern {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
  gap: var(--space-1);
  align-items: center;
}

.navbar-item-modern {
  list-style: none;
}

.navbar-link-modern {
  display: flex;
  align-items: center;
  gap: var(--space-2);
  padding: var(--space-3) var(--space-5);
  color: var(--gray-600);
  text-decoration: none;
  font-weight: 500;
  font-size: 0.95rem;
  border-radius: var(--radius-md);
  transition: var(--transition-base);
  position: relative;
}

.navbar-link-modern i {
  font-size: 1rem;
  transition: var(--transition-base);
}

.navbar-link-modern:hover {
  color: var(--primary);
  background: rgba(124, 58, 237, 0.08);
  transform: translateY(-2px);
}

.navbar-link-modern.active {
  color: white;
  background: #73AF6F;
  box-shadow: var(--shadow-md);
}

.navbar-link-modern.active::after {
  content: '';
  position: absolute;
  bottom: -5px;
  left: 50%;
  transform: translateX(-50%);
  width: 20px;
  height: 3px;
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  border-radius: var(--radius-full);
  opacity: 0;
}

/* CTA Button */
.navbar-cta {
  display: flex;
  align-items: center;
  margin-left: var(--space-4);
  padding-left: var(--space-4);
  border-left: 1px solid rgba(229, 231, 235, 0.5);
}

.btn-navbar-login {
  display: flex;
  align-items: center;
  gap: var(--space-2);
  padding: var(--space-3) var(--space-6);
  background: #73AF6F;
  color: white;
  text-decoration: none;
  font-weight: 600;
  font-size: 0.95rem;
  border-radius: var(--radius-md);
  transition: var(--transition-base);
  box-shadow: var(--shadow-md);
}

.btn-navbar-login:hover {
  color: white;
  transform: translateY(-3px);
  box-shadow: var(--shadow-lg);
}

.btn-navbar-login i {
  font-size: 1rem;
}

/* Mobile Toggle */
.navbar-mobile-toggle {
  display: none;
  flex-direction: column;
  gap: 5px;
  background: transparent;
  border: none;
  cursor: pointer;
  padding: var(--space-2);
  transition: var(--transition-base);
}

.navbar-mobile-toggle span {
  width: 24px;
  height: 3px;
  background: var(--gray-600);
  border-radius: var(--radius-full);
  transition: var(--transition-base);
}

.navbar-mobile-toggle:hover span {
  background: var(--primary);
}

.navbar-mobile-toggle.active span:nth-child(1) {
  transform: rotate(45deg) translate(10px, 10px);
}

.navbar-mobile-toggle.active span:nth-child(2) {
  opacity: 0;
}

.navbar-mobile-toggle.active span:nth-child(3) {
  transform: rotate(-45deg) translate(7px, -7px);
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .navbar-container {
    padding: 0 var(--space-4);
  }

  .navbar-mobile-toggle {
    display: flex;
  }

  .navbar-menu {
    position: absolute;
    top: 70px;
    left: 0;
    right: 0;
    flex-direction: column;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.99) 0%, rgba(249, 250, 251, 0.99) 100%);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(229, 231, 235, 0.5);
    padding: var(--space-4);
    max-height: 0;
    overflow: hidden;
    transition: max-height var(--transition-base);
  }

  .navbar-menu.active {
    max-height: 400px;
    box-shadow: var(--shadow-md);
  }

  .navbar-nav-modern {
    flex-direction: column;
    width: 100%;
    gap: 0;
  }

  .navbar-item-modern {
    width: 100%;
  }

  .navbar-link-modern {
    width: 100%;
    padding: var(--space-4) var(--space-5);
    border-radius: 0;
  }

  .navbar-link-modern:first-child {
    border-radius: var(--radius-md) var(--radius-md) 0 0;
  }

  .navbar-link-modern:last-of-type {
    border-radius: 0 0 var(--radius-md) var(--radius-md);
  }

  .navbar-cta {
    width: 100%;
    margin-left: 0;
    padding-left: 0;
    padding-top: var(--space-4);
    border-left: none;
    border-top: 1px solid rgba(229, 231, 235, 0.5);
    margin-top: var(--space-4);
  }

  .btn-navbar-login {
    width: 100%;
    justify-content: center;
  }
}

/* ========================================================================== */
/*                    SIMPLE SIDEBAR DESIGN                                  */
/* ========================================================================== */
.sidebar-wrapper {
  position: fixed;
  left: 0;
  top: 0;
  width: var(--sidebar-collapsed);
  height: 100vh;
  background: var(--white);
  border-right: 1px solid var(--gray-200);
  display: flex;
  flex-direction: column;
  transition: width var(--transition-base);
  z-index: 1000;
}

/* Sidebar Overlay */
.sidebar-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(4px);
  opacity: 0;
  visibility: hidden;
  transition: var(--transition-base);
  z-index: 999;
}

.sidebar-overlay.active {
  opacity: 1;
  visibility: visible;
}

/* Sidebar Header */
.sidebar-header {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: var(--space-6);
  border-bottom: 1px solid var(--gray-200);
  min-height: var(--topbar-height);
  background: var(--gray-50);
}

.sidebar-brand {
  display: flex;
  align-items: center;
  gap: var(--space-3);
  color: var(--gray-900);
  text-decoration: none;
  font-size: 1rem;
  font-weight: 700;
  transition: var(--transition-base);
  white-space: nowrap;
  overflow: hidden;
}

.sidebar-brand i {
  font-size: 1.25rem;
  color: var(--primary);
  flex-shrink: 0;
}

/* User Profile Section */
.sidebar-user {
  padding: var(--space-5);
  border-bottom: 1px solid rgba(229, 231, 235, 0.5);
  background: rgba(124, 58, 237, 0.03);
}

.user-profile {
  display: flex;
  gap: var(--space-3);
  align-items: center;
}

.user-avatar-sidebar {
  width: 45px;
  height: 45px;
  border-radius: var(--radius-md);
  background: #73AF6F;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  color: white;
  font-size: 1rem;
  flex-shrink: 0;
  box-shadow: var(--shadow-md);
  transition: var(--transition-base);
}

.user-avatar-sidebar:hover {
  transform: scale(1.08);
}

.sidebar-wrapper.collapsed .user-profile {
  flex-direction: column;
  text-align: center;
}

.sidebar-wrapper.collapsed .user-info-sidebar {
  display: none;
}

.user-info-sidebar {
  flex: 1;
  min-width: 0;
}

.user-name-sidebar {
  font-weight: 700;
  font-size: 0.9rem;
  color: var(--gray-900);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: var(--space-1);
}

.user-email-sidebar {
  font-size: 0.75rem;
  color: var(--gray-500);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: var(--space-2);
}

.user-role-badge {
  display: inline-block;
  padding: 4px 10px;
  border-radius: var(--radius-sm);
  font-size: 0.65rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.8px;
}

.user-role-badge.admin {
  background: rgba(239, 68, 68, 0.1);
  color: var(--danger);
}

.user-role-badge.teacher {
  background: rgba(20, 184, 166, 0.1);
  color: var(--success);
}

.user-role-badge.student {
  background: rgba(6, 182, 212, 0.1);
  color: var(--secondary);
}

/* Navigation */
.sidebar-nav {
  flex: 1;
  overflow-y: auto;
  padding: var(--space-4) 0;
}

.sidebar-nav::-webkit-scrollbar {
  width: 5px;
}

.sidebar-nav::-webkit-scrollbar-track {
  background: transparent;
}

.sidebar-nav::-webkit-scrollbar-thumb {
  background: rgba(124, 58, 237, 0.2);
  border-radius: var(--radius-full);
}

.sidebar-nav::-webkit-scrollbar-thumb:hover {
  background: rgba(124, 58, 237, 0.4);
}

.nav-section-title {
  padding: var(--space-4) var(--space-6) var(--space-2);
  font-size: 0.65rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: var(--gray-400);
}

.sidebar-wrapper.collapsed .nav-section-title {
  text-align: center;
  padding: var(--space-3) var(--space-2);
  font-size: 0.5rem;
}

.nav-item-sidebar {
  list-style: none;
}

.nav-link-sidebar {
  display: flex;
  align-items: center;
  gap: var(--space-3);
  padding: var(--space-3) var(--space-5);
  margin: 3px var(--space-3);
  border-radius: var(--radius-md);
  color: var(--gray-600);
  text-decoration: none;
  font-weight: 500;
  font-size: 0.9rem;
  transition: var(--transition-base);
  position: relative;
}

.nav-link-sidebar .nav-icon {
  width: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.125rem;
  flex-shrink: 0;
  transition: var(--transition-base);
}

.nav-link-sidebar .nav-text {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.nav-link-sidebar:hover {
  background: var(--gray-100);
  color: var(--primary);
}

.nav-link-sidebar.active {
  background: var(--primary);
  color: white;
  font-weight: 600;
}

.nav-link-sidebar.active::before {
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 3px;
  height: 70%;
  background: white;
  border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
}

.sidebar-wrapper.collapsed .nav-link-sidebar {
  justify-content: center;
  padding: var(--space-3);
}

.sidebar-wrapper.collapsed .nav-link-sidebar .nav-text {
  display: none;
}

/* Sidebar Footer */
.sidebar-footer {
  padding: var(--space-5);
  border-top: 1px solid rgba(229, 231, 235, 0.5);
  background: rgba(124, 58, 237, 0.02);
}

.logout-btn-sidebar {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-3);
  padding: var(--space-3);
  background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(244, 63, 94, 0.1) 100%);
  border: 1px solid rgba(239, 68, 68, 0.3);
  border-radius: var(--radius-md);
  color: var(--danger);
  text-decoration: none;
  font-weight: 600;
  font-size: 0.9rem;
  transition: var(--transition-base);
}

.logout-btn-sidebar:hover {
  background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(244, 63, 94, 0.2) 100%);
  color: var(--danger);
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.sidebar-wrapper.collapsed .logout-btn-sidebar .nav-text {
  display: none;
}

/* ========================================================================== */
/*                    MODERN TOP BAR WITH GLASS EFFECT                        */
/* ========================================================================== */
.top-bar {
  position: fixed;
  top: 0;
  left: var(--sidebar-collapsed);
  right: 0;
  height: var(--topbar-height);
  background: var(--white);
  border-bottom: 1px solid var(--gray-200);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 var(--space-6);
  transition: left var(--transition-base);
  z-index: 900;
  box-shadow: var(--shadow-sm);
}

.mobile-toggle {
  display: none;
  width: 40px;
  height: 40px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  border: none;
  color: white;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: var(--transition-base);
  font-size: 1.125rem;
}

.mobile-toggle:hover {
  transform: scale(1.05);
  box-shadow: var(--shadow-md);
}

.top-bar h1 {
  font-size: 1.375rem;
  font-weight: 700;
  color: var(--gray-900);
  margin: 0;
}

.top-bar-actions {
  display: flex;
  gap: var(--space-4);
  align-items: center;
}

.notification-bell-topbar {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: var(--radius-md);
  background: rgba(124, 58, 237, 0.1);
  border: none;
  color: var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: var(--transition-base);
  font-size: 1.125rem;
}

.notification-bell-topbar:hover {
  background: #73AF6F;
  color: white;
  transform: scale(1.05);
}

.notification-badge-topbar {
  position: absolute;
  top: -4px;
  right: -4px;
  background: #dc2626;
  color: white;
  font-size: 0.625rem;
  font-weight: 700;
  padding: 2px 6px;
  border-radius: var(--radius-full);
  min-width: 20px;
  text-align: center;
  box-shadow: var(--shadow-md);
}

/* Notification Dropdown */
.notification-dropdown-menu {
  width: 400px;
  max-height: 500px;
  border: 1px solid rgba(229, 231, 235, 0.5);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-xl);
  padding: 0;
  margin-top: var(--space-3);
  overflow: hidden;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(249, 250, 251, 0.98) 100%);
  backdrop-filter: blur(10px);
}

.notification-dropdown-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--space-5);
  border-bottom: 1px solid rgba(229, 231, 235, 0.5);
  background: linear-gradient(135deg, rgba(124, 58, 237, 0.05) 0%, rgba(6, 182, 212, 0.05) 100%);
}

.notification-dropdown-header h6 {
  margin: 0;
  font-size: 0.9rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: var(--space-2);
  color: var(--gray-900);
}

.notification-action-btn {
  background: transparent;
  border: none;
  color: var(--gray-400);
  cursor: pointer;
  padding: var(--space-2);
  border-radius: var(--radius-md);
  transition: var(--transition-base);
  display: flex;
  align-items: center;
  justify-content: center;
}

.notification-action-btn:hover {
  color: var(--primary);
  background: rgba(124, 58, 237, 0.1);
}

.notification-body {
  max-height: 400px;
  overflow-y: auto;
}

.notification-body::-webkit-scrollbar {
  width: 5px;
}

.notification-body::-webkit-scrollbar-thumb {
  background: rgba(124, 58, 237, 0.2);
  border-radius: var(--radius-full);
}

.notification-item {
  display: flex;
  gap: var(--space-3);
  padding: var(--space-4);
  border-bottom: 1px solid rgba(229, 231, 235, 0.3);
  transition: var(--transition-base);
  background: transparent;
}

.notification-item:hover {
  background: rgba(124, 58, 237, 0.04);
}

.notification-item.unread {
  background: rgba(124, 58, 237, 0.08);
  border-left: 3px solid var(--primary);
}

.notification-icon {
  width: 42px;
  height: 42px;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-size: 1.25rem;
}

.notification-icon.info { 
  background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
  color: var(--secondary);
}

.notification-icon.success { 
  background: linear-gradient(135deg, rgba(20, 184, 166, 0.1) 0%, rgba(20, 184, 166, 0.05) 100%);
  color: var(--success);
}

.notification-icon.warning { 
  background: linear-gradient(135deg, rgba(249, 115, 22, 0.1) 0%, rgba(249, 115, 22, 0.05) 100%);
  color: var(--warning);
}

.notification-icon.error { 
  background: linear-gradient(135deg, rgba(244, 63, 94, 0.1) 0%, rgba(244, 63, 94, 0.05) 100%);
  color: var(--danger);
}

.notification-content {
  flex: 1;
  min-width: 0;
}

.notification-content-message {
  margin: 0 0 var(--space-2) 0;
  font-size: 0.875rem;
  color: var(--gray-700);
  line-height: 1.5;
  font-weight: 500;
}

.notification-time {
  display: flex;
  align-items: center;
  gap: var(--space-1);
  font-size: 0.75rem;
  color: var(--gray-400);
}

.notification-mark-read {
  background: #73AF6F;
  border: none;
  color: white;
  padding: 5px 12px;
  border-radius: var(--radius-sm);
  font-size: 0.75rem;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition-base);
  flex-shrink: 0;
  align-self: flex-start;
  white-space: nowrap;
}

.notification-mark-read:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.notification-empty {
  padding: var(--space-8);
  text-align: center;
  color: var(--gray-400);
}

.notification-empty i {
  font-size: 3.5rem;
  margin-bottom: var(--space-4);
  opacity: 0.2;
}

.notification-empty p {
  margin: var(--space-2) 0;
  font-weight: 500;
}

/* ========================================================================== */
/*                         MAIN CONTENT AREA                                  */
/* ========================================================================== */
.main-content {
  margin-left: var(--sidebar-collapsed);
  margin-top: var(--topbar-height);
  padding: var(--space-8);
  min-height: calc(100vh - var(--topbar-height));
  transition: margin-left var(--transition-base);
  background: var(--gray-50);
}

body:not(.has-sidebar) .main-content {
  margin-left: 0;
  margin-top: 0;
}

/* ========================================================================== */
/*                    MODERN PROFESSIONAL FOOTER                              */
/* ========================================================================== */
.footer-custom {
  background: var(--white);
  border-top: 1px solid var(--gray-200);
  padding: var(--space-8) 0 var(--space-6);
  margin-top: auto;
  margin-left: var(--sidebar-collapsed);
  transition: margin-left var(--transition-base);
}

body:not(.has-sidebar) .footer-custom {
  margin-left: 0;
}

.footer-custom .container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 var(--space-6);
}

.footer-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: var(--space-8);
  margin-bottom: var(--space-8);
}

.footer-brand {
  display: flex;
  align-items: center;
  gap: var(--space-2);
  font-size: 1.25rem;
  font-weight: 800;
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.footer-brand i {
  font-size: 1.75rem;
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.footer-links {
  display: flex;
  gap: var(--space-6);
  flex-wrap: wrap;
}

.footer-links a {
  color: var(--gray-600);
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 500;
  transition: var(--transition-base);
}

.footer-links a:hover {
  color: var(--primary);
  transform: translateY(-2px);
}

.footer-social {
  display: flex;
  gap: var(--space-3);
}

.footer-social a {
  width: 40px;
  height: 40px;
  border-radius: var(--radius-md);
  background: rgba(124, 58, 237, 0.1);
  color: var(--gray-600);
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  transition: var(--transition-base);
  font-size: 0.9rem;
}

.footer-social a:hover {
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  color: white;
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.footer-bottom {
  padding-top: var(--space-6);
  border-top: 1px solid rgba(229, 231, 235, 0.5);
  text-align: center;
  font-size: 0.875rem;
  color: var(--gray-500);
}

.footer-bottom p {
  margin: 0;
}

/* ========================================================================== */
/*                       RESPONSIVE DESIGN                                    */
/* ========================================================================== */
@media (max-width: 768px) {
  :root {
    --sidebar-width: 100%;
    --topbar-height: 70px;
  }

  .top-bar {
    left: 0 !important;
    padding: 0 var(--space-4);
  }

  .main-content {
    margin-left: 0 !important;
    margin-top: var(--topbar-height);
    padding: var(--space-4);
  }

  .mobile-toggle {
    display: flex;
  }

  .sidebar-wrapper {
    transform: translateX(-100%);
    width: 100%;
    max-width: 300px;
  }

  .sidebar-wrapper.mobile-open {
    transform: translateX(0);
  }

  .sidebar-overlay {
    z-index: 999;
  }

  .footer-custom {
    margin-left: 0 !important;
  }

  .footer-content {
    flex-direction: column;
    text-align: center;
    gap: var(--space-4);
  }

  .footer-links {
    justify-content: center;
  }

  .notification-dropdown-menu {
    width: calc(100vw - 2rem);
    max-width: 380px;
  }

  .top-bar h1 {
    font-size: 1.125rem;
  }

  .navbar-nav {
    flex-direction: column;
    width: 100%;
    gap: var(--space-1);
  }

  .navbar-nav .nav-link {
    width: 100%;
    text-align: left;
  }
}

@media (max-width: 480px) {
  .top-bar h1 {
    font-size: 1rem;
  }

  .footer-links {
    flex-direction: column;
    gap: var(--space-2);
  }

  .main-content {
    padding: var(--space-3);
  }

  h1 { font-size: 1.75rem; }
  h2 { font-size: 1.375rem; }
  h3 { font-size: 1.125rem; }
}
  </style>                                                                  
</head>

<body id="mainBody" class="<?= session()->get('isLoggedIn') ? 'has-sidebar' : '' ?>">

  <?= $this->include('template/header') ?>

  <!-- Main Content Area -->
  <div class="main-content">
    <?= $this->renderSection('content') ?>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Professional Sidebar Management System
class SidebarManager {
  constructor() {
    this.sidebar = document.getElementById('sidebar');
    this.overlay = document.getElementById('sidebarOverlay');
    this.mobileToggle = document.getElementById('mobileToggle');
    this.mainContent = document.getElementById('mainContent');
    this.sidebarToggle = document.getElementById('sidebarToggle');
    this.body = document.body;

    this.isCollapsed = false;
    this.isMobile = window.innerWidth <= 768;
    this.isMobileOpen = false;

    this.init();
  }

  init() {
    this.setupEventListeners();
    this.updateLayout();
    this.setupKeyboardNavigation();
    this.setupAccessibility();
  }

  setupEventListeners() {
    // Desktop sidebar toggle - DISABLED: sidebar is permanently collapsed
    // if (this.sidebarToggle) {
    //   this.sidebarToggle.addEventListener('click', (e) => {
    //     e.preventDefault();
    //     this.toggleCollapsed();
    //   });
    // }

    // Mobile toggle
    if (this.mobileToggle) {
      this.mobileToggle.addEventListener('click', (e) => {
        e.preventDefault();
        this.toggleMobile();
      });
    }

    // Overlay click
    if (this.overlay) {
      this.overlay.addEventListener('click', () => {
        this.closeMobile();
      });
    }

    // Window resize
    window.addEventListener('resize', () => {
      this.handleResize();
    });

    // ESC key to close mobile sidebar
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.isMobileOpen) {
        this.closeMobile();
      }
    });

    // Prevent body scroll when mobile sidebar is open
    this.preventBodyScroll();
  }

  setupKeyboardNavigation() {
    const navLinks = this.sidebar.querySelectorAll('.nav-link-sidebar');
    navLinks.forEach((link, index) => {
      link.setAttribute('tabindex', '0');

      link.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          link.click();
        }

        // Arrow key navigation
        if (e.key === 'ArrowDown') {
          e.preventDefault();
          const nextLink = navLinks[index + 1] || navLinks[0];
          nextLink.focus();
        }

        if (e.key === 'ArrowUp') {
          e.preventDefault();
          const prevLink = navLinks[index - 1] || navLinks[navLinks.length - 1];
          prevLink.focus();
        }
      });
    });
  }

  setupAccessibility() {
    // Add ARIA labels
    if (this.sidebarToggle) {
      this.sidebarToggle.setAttribute('aria-label', 'Toggle sidebar');
      this.sidebarToggle.setAttribute('aria-expanded', !this.isCollapsed);
    }

    if (this.mobileToggle) {
      this.mobileToggle.setAttribute('aria-label', 'Open navigation menu');
    }

    if (this.overlay) {
      this.overlay.setAttribute('aria-hidden', 'true');
    }

    // Update ARIA attributes when state changes
    this.updateAriaAttributes();
  }

  toggleCollapsed() {
    this.isCollapsed = !this.isCollapsed;
    this.updateLayout();
    this.saveState();

    // Add haptic feedback if available
    if (navigator.vibrate) {
      navigator.vibrate(50);
    }
  }

  toggleMobile() {
    if (this.isMobileOpen) {
      this.closeMobile();
    } else {
      this.openMobile();
    }
  }

  openMobile() {
    this.isMobileOpen = true;
    this.updateLayout();

    // Focus management
    const firstLink = this.sidebar.querySelector('.nav-link-sidebar');
    if (firstLink) {
      setTimeout(() => firstLink.focus(), 300);
    }
  }

  closeMobile() {
    this.isMobileOpen = false;
    this.updateLayout();

    // Return focus to mobile toggle
    if (this.mobileToggle) {
      setTimeout(() => this.mobileToggle.focus(), 300);
    }
  }

  updateLayout() {
    // Update sidebar classes
    this.sidebar.classList.toggle('collapsed', this.isCollapsed && !this.isMobile);
    this.sidebar.classList.toggle('mobile-open', this.isMobileOpen);
    this.sidebar.classList.toggle('mobile-closed', !this.isMobileOpen && this.isMobile);

    // Update overlay
    if (this.overlay) {
      this.overlay.classList.toggle('active', this.isMobileOpen);
    }

    // Update main content
    if (this.mainContent) {
      this.mainContent.classList.toggle('sidebar-collapsed', this.isCollapsed && !this.isMobile);
    }

    // Update body class
    this.body.classList.toggle('sidebar-collapsed', this.isCollapsed && !this.isMobile);

    // Update mobile toggle visibility
    if (this.mobileToggle) {
      this.mobileToggle.style.display = this.isMobile ? 'flex' : 'none';
    }

    this.updateAriaAttributes();
  }

  updateAriaAttributes() {
    if (this.sidebarToggle) {
      this.sidebarToggle.setAttribute('aria-expanded', !this.isCollapsed);
    }

    if (this.overlay) {
      this.overlay.setAttribute('aria-hidden', !this.isMobileOpen);
    }
  }

  handleResize() {
    const wasMobile = this.isMobile;
    this.isMobile = window.innerWidth <= 768;

    if (wasMobile !== this.isMobile) {
      // Reset mobile state when switching between mobile/desktop
      if (!this.isMobile) {
        this.closeMobile();
      }
      this.updateLayout();
    }
  }

  preventBodyScroll() {
    let touchStartY = 0;

    document.addEventListener('touchstart', (e) => {
      touchStartY = e.touches[0].clientY;
    }, { passive: true });

    document.addEventListener('touchmove', (e) => {
      if (this.isMobileOpen) {
        const touchY = e.touches[0].clientY;
        const touchDiff = touchStartY - touchY;

        // Prevent scrolling when sidebar is open
        if (Math.abs(touchDiff) > 10) {
          e.preventDefault();
        }
      }
    }, { passive: false });
  }

  saveState() {
    try {
      localStorage.setItem('sidebarCollapsed', this.isCollapsed);
    } catch (e) {
      // localStorage not available
    }
  }

  loadState() {
    try {
      const collapsed = localStorage.getItem('sidebarCollapsed');
      if (collapsed === 'false') {
        this.isCollapsed = false;
      }
      // Default to collapsed (true) if no saved state or not explicitly false
    } catch (e) {
      // localStorage not available
    }
  }
}

// Initialize sidebar when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  window.sidebarManager = new SidebarManager();
  window.sidebarManager.loadState();
});

// Notification System
$(document).ready(function() {
  // Load notifications on page load
  loadNotifications();

  // Refresh notifications every 60 seconds
  setInterval(loadNotifications, 60000);

  // Prevent dropdown from closing when clicking read buttons
  $('#notificationDropdown').on('hide.bs.dropdown', function(e) {
    if ($(e.clickEvent && e.clickEvent.target).closest('.notification-mark-read').length > 0) {
      e.preventDefault();
    }
  });

  // Refresh button
  $('#refreshNotifications').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();

    const btn = $(this);
    const icon = btn.find('i');

    icon.addClass('fa-spin');
    loadNotifications();

    setTimeout(function() {
      icon.removeClass('fa-spin');
    }, 1000);
  });

  // Mark all as read
  $('#markAllRead').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();

    console.log('Marking all notifications as read');

    // Send AJAX request to mark all as read
    $.ajax({
      url: "<?php echo base_url('/notifications/mark_all_read') ?>",
      type: 'POST',
      data: {
        [document.querySelector('meta[name="csrf-name"]').getAttribute('content')]: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      dataType: 'json',
      success: function(res) {
        console.log('Mark all read response:', res);
        if (res.success) {
          // Update badge to 0
          updateNotificationBadge(0);
          // Reload notifications to show all as read
          loadNotifications();
          showNotificationMessage('All notifications marked as read!', 'success');
        } else {
          console.error('Failed to mark all as read');
          showNotificationMessage('Failed to mark all as read.', 'error');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error marking all as read:', status, error, xhr.responseText);
        showNotificationMessage('Error marking all as read.', 'error');
      }
    });
  });

  // Mark notification as read
  $(document).on('click', '.notification-mark-read', function(e) {
    e.preventDefault();
    e.stopPropagation();
    e.stopImmediatePropagation();

    const btn = $(this);
    const notificationId = btn.data('id');
    const notificationItem = btn.closest('.notification-item');

    console.log('Marking notification as read:', notificationId);

    // Immediately update UI to show as read (no loading state)
    notificationItem.removeClass('unread');
    btn.remove();

    // Immediately decrement badge count
    const badge = $('#notificationBadge');
    console.log('Badge element found:', badge.length, badge);
    const currentText = badge.text().trim();
    console.log('Current badge text:', currentText);
    let currentCount = 0;

    if (currentText === '9+') {
      currentCount = 10; // Assume at least 10
    } else if (currentText && !isNaN(parseInt(currentText))) {
      currentCount = parseInt(currentText);
    }

    console.log('Current count:', currentCount);

    // Decrement count if greater than 0
    if (currentCount > 0) {
      const newCount = currentCount - 1;
      console.log('New count:', newCount);
      updateNotificationBadge(newCount);
    }

    // Show success message
    showNotificationMessage('Notification marked as read!', 'success');

    // Send AJAX request in background
    $.ajax({
      url: "<?php echo base_url('/notifications/mark_read/') ?>" + notificationId,
      type: 'POST',
      data: {
        [document.querySelector('meta[name="csrf-name"]').getAttribute('content')]: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      dataType: 'json',
      success: function(res) {
        console.log('AJAX success response:', res);
        if (res.success) {
          // Update badge count with server response (in case of discrepancy)
          updateNotificationBadge(res.unread_count || 0);
        } else {
          console.error('Failed to mark notification as read');
          // Revert UI changes on failure
          notificationItem.addClass('unread');
          notificationItem.append('<button class="notification-mark-read" data-id="' + notificationId + '"><i class="fas fa-check"></i> Read</button>');
          // Revert badge count
          updateNotificationBadge(currentCount);
          showNotificationMessage('Failed to mark notification as read.', 'error');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error marking notification as read:', status, error, xhr.responseText);
        // Revert UI changes on error
        notificationItem.addClass('unread');
        notificationItem.append('<button class="notification-mark-read" data-id="' + notificationId + '"><i class="fas fa-check"></i> Read</button>');
        // Revert badge count
        updateNotificationBadge(currentCount);
        showNotificationMessage('Error marking notification as read.', 'error');
      }
    });
  });
});

// Show notification message
function showNotificationMessage(message, type = 'info') {
  // Remove any existing message
  $('.notification-message').remove();

  // Create message element
  const messageEl = $(`
    <div class="notification-message ${type}" style="
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 12px 16px;
      border-radius: 8px;
      color: white;
      font-weight: 500;
      font-size: 14px;
      z-index: 9999;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      opacity: 0;
      transform: translateY(-10px);
      transition: all 0.3s ease;
    ">
      <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
      <span style="margin-left: 8px;">${message}</span>
    </div>
  `);

  // Set background color based on type
  if (type === 'success') {
    messageEl.css('background', 'linear-gradient(135deg, #10b981, #059669)');
  } else if (type === 'error') {
    messageEl.css('background', 'linear-gradient(135deg, #ef4444, #dc2626)');
  } else {
    messageEl.css('background', 'linear-gradient(135deg, #6366f1, #4f46e5)');
  }

  // Add to body
  $('body').append(messageEl);

  // Animate in
  setTimeout(() => {
    messageEl.css({
      'opacity': '1',
      'transform': 'translateY(0)'
    });
  }, 10);

  // Auto remove after 3 seconds
  setTimeout(() => {
    messageEl.css({
      'opacity': '0',
      'transform': 'translateY(-10px)'
    });
    setTimeout(() => {
      messageEl.remove();
    }, 300);
  }, 3000);
}

// Load notifications function
function loadNotifications() {
  $.ajax({
    url: "<?php echo base_url('/notifications') ?>",
    type: 'GET',
    dataType: 'json',
    success: function(res) {
      if (res.success) {
        updateNotificationBadge(res.unread_count);
        updateNotificationList(res.notifications);
      }
    },
    error: function() {
      console.error('Failed to load notifications');
    }
  });
}

// Update notification badge
function updateNotificationBadge(count) {
  const badge = $('#notificationBadge');
  if (count > 0) {
    badge.text(count > 9 ? '9+' : count).show();
  } else {
    badge.hide();
  }
}

// Update notification list
function updateNotificationList(notifications) {
  const body = $('#notificationBody');
  body.empty();

  if (notifications.length === 0) {
    body.html(`
      <div class="notification-empty">
        <i class="fas fa-bell-slash"></i>
        <p><strong>No notifications</strong></p>
        <p class="small">You're all caught up!</p>
      </div>
    `);
  } else {
    notifications.forEach(function(notification) {
      const isUnread = notification.is_read == 0;
      const typeIcon = getNotificationIcon(notification.type);
      const typeClass = getNotificationClass(notification.type);
      const timeAgo = formatTimeAgo(notification.created_at);

      const notificationHtml = `
        <div class="notification-item ${isUnread ? 'unread' : ''}" data-id="${notification.id}">
          <div class="notification-icon ${typeClass}">
            <i class="${typeIcon}"></i>
          </div>
          <div class="notification-content">
            <p class="notification-content-message">${notification.message}</p>
            <div class="notification-time">
              <i class="far fa-clock"></i>
              <span>${timeAgo}</span>
            </div>
          </div>
          ${isUnread ? `<button class="notification-mark-read" data-id="${notification.id}">
            <i class="fas fa-check"></i> Read
          </button>` : ''}
        </div>
      `;

      body.append(notificationHtml);
    });
  }
}

// Get notification icon based on type
function getNotificationIcon(type) {
  const icons = {
    'info': 'fas fa-info-circle',
    'success': 'fas fa-check-circle',
    'warning': 'fas fa-exclamation-triangle',
    'error': 'fas fa-times-circle',
    'course': 'fas fa-book',
    'announcement': 'fas fa-bullhorn',
    'material': 'fas fa-file-alt',
    'assignment': 'fas fa-tasks'
  };
  return icons[type] || icons['info'];
}

// Get notification class based on type
function getNotificationClass(type) {
  const classes = {
    'info': 'info',
    'success': 'success',
    'warning': 'warning',
    'error': 'error',
    'course': 'info',
    'announcement': 'info',
    'material': 'info',
    'assignment': 'warning'
  };
  return classes[type] || 'info';
}

// Format time ago
function formatTimeAgo(timestamp) {
  const date = new Date(timestamp);
  const now = new Date();
  const diff = now - date;

  const seconds = Math.floor(diff / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);
  const days = Math.floor(hours / 24);

  if (seconds < 60) return 'Just now';
  if (minutes < 60) return minutes + ' minute' + (minutes > 1 ? 's' : '') + ' ago';
  if (hours < 24) return hours + ' hour' + (hours > 1 ? 's' : '') + ' ago';
  if (days < 7) return days + ' day' + (days > 1 ? 's' : '') + ' ago';

  return date.toLocaleDateString();
}
</script>

<?= $this->renderSection('scripts') ?>

</body>
</html>
