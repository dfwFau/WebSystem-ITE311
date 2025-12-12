<?= $this->extend('template') ?>

<?= $this->section('title') ?>Courses<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Courses Dashboard Template with #73AF6F Theme */

  :root {
    --primary-green: #73AF6F;
    --primary-green-light: #8bbf84;
    --primary-green-dark: #5a8f58;
    --secondary-green: #64748b;
    --accent-green: #73AF6F;
    --success-green: #73AF6F;
    --background-light: #f8fafc;
    --background-card: rgba(255, 255, 255, 0.98);
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --border-color: rgba(115, 175, 111, 0.2);
    --shadow-light: 0 4px 12px rgba(115, 175, 111, 0.1);
    --shadow-hover: 0 8px 24px rgba(115, 175, 111, 0.15);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Main Container */
  .courses-dashboard {
    background: linear-gradient(135deg, var(--background-light) 0%, #e8f5e8 100%);
    min-height: 100vh;
    padding: 2rem 0;
  }

  /* Header Section */
  .dashboard-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    padding: 3rem 2rem;
    margin-bottom: 2rem;
    border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    color: white;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-light);
  }

  .dashboard-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: float 6s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-10px) rotate(120deg); }
    66% { transform: translateY(5px) rotate(240deg); }
  }

  .header-content {
    position: relative;
    z-index: 1;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
  }

  .header-title {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .header-title h1 {
    margin: 0;
    font-size: 2.5rem;
    font-weight: 800;
    letter-spacing: -0.5px;
  }

  .header-title i {
    font-size: 2.5rem;
    opacity: 0.9;
  }

  .header-actions {
    display: flex;
    gap: 1rem;
    align-items: center;
  }

  .btn-primary-green {
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
    backdrop-filter: blur(10px);
  }

  .btn-primary-green:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
  }

  .btn-secondary-green {
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.2);
    color: white;
    padding: 12px 20px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: var(--transition);
  }

  .btn-secondary-green:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
  }

  /* Stats Cards */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  .stat-card {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
  }

  .stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-green), var(--primary-green-light));
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
  }

  .stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .stat-value {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary-green);
    margin-bottom: 0.5rem;
  }

  .stat-label {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  /* Content Grid */
  .content-grid {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
  }

  /* Main Content Card */
  .main-content-card {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
  }

  .content-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.5rem 2rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .content-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
  }

  .content-actions {
    display: flex;
    gap: 0.75rem;
    align-items: center;
  }

  .search-container {
    position: relative;
    flex: 1;
    max-width: 400px;
  }

  .search-input {
    width: 100%;
    padding: 10px 45px 10px 15px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.9rem;
    transition: var(--transition);
    background: white;
  }

  .search-input:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(115, 175, 111, 0.1);
  }

  .search-btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: var(--primary-green);
    border: none;
    color: white;
    padding: 6px 12px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: var(--transition);
  }

  .search-btn:hover {
    background: var(--primary-green-dark);
  }

  /* Course Cards Grid */
  .courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
  }

  .course-card-new {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: var(--transition);
    position: relative;
  }

  .course-card-new:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-hover);
  }

  .course-card-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.25rem 1.5rem;
    color: white;
    position: relative;
  }

  .course-code {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
  }

  .course-status {
    position: absolute;
    top: 1rem;
    right: 1rem;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .course-status.active {
    background: rgba(255, 255, 255, 0.2);
    color: white;
  }

  .course-status.pending {
    background: rgba(255, 255, 255, 0.3);
    color: white;
  }

  .course-card-body {
    padding: 1.5rem;
  }

  .course-info {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
  }

  .info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid rgba(115, 175, 111, 0.1);
  }

  .info-item:last-child {
    border-bottom: none;
  }

  .info-label {
    font-weight: 600;
    color: var(--text-secondary);
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .info-value {
    font-weight: 600;
    color: var(--text-primary);
  }

  .course-card-actions {
    display: flex;
    gap: 0.75rem;
  }

  .btn-course {
    flex: 1;
    padding: 10px 16px;
    border-radius: var(--radius-md);
    font-weight: 600;
    font-size: 0.85rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    transition: var(--transition);
    border: none;
    cursor: pointer;
  }

  .btn-course.primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .btn-course.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
  }

  .btn-course.secondary {
    background: rgba(115, 175, 111, 0.1);
    color: var(--primary-green);
    border: 1px solid var(--primary-green);
  }

  .btn-course.secondary:hover {
    background: var(--primary-green);
    color: white;
  }

  .btn-course.danger {
    background: rgba(239, 68, 68, 0.1);
    color: #dc2626;
    border: 1px solid #dc2626;
  }

  .btn-course.danger:hover {
    background: #dc2626;
    color: white;
  }

  /* Sidebar Panel */
  .sidebar-panel {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    height: fit-content;
    sticky: top;
    top: 2rem;
  }

  .panel-section {
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
  }

  .panel-section:last-child {
    border-bottom: none;
  }

  .panel-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .panel-title i {
    color: var(--primary-green);
  }

  .quick-stats {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .quick-stat {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .quick-stat-icon {
    width: 35px;
    height: 35px;
    background: rgba(115, 175, 111, 0.1);
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-green);
    font-size: 1rem;
  }

  .quick-stat-info {
    flex: 1;
  }

  .quick-stat-value {
    font-weight: 700;
    color: var(--text-primary);
    font-size: 1.1rem;
  }

  .quick-stat-label {
    font-size: 0.8rem;
    color: var(--text-secondary);
  }

  .recent-activity {
    max-height: 300px;
    overflow-y: auto;
  }

  .activity-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(115, 175, 111, 0.1);
  }

  .activity-item:last-child {
    border-bottom: none;
  }

  .activity-icon {
    width: 30px;
    height: 30px;
    background: rgba(115, 175, 111, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-green);
    font-size: 0.8rem;
    flex-shrink: 0;
  }

  .activity-content {
    flex: 1;
    min-width: 0;
  }

  .activity-text {
    font-size: 0.85rem;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
  }

  .activity-time {
    font-size: 0.75rem;
    color: var(--text-secondary);
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-secondary);
  }

  .empty-state i {
    font-size: 4rem;
    margin-bottom: 1.5rem;
    opacity: 0.3;
    color: var(--primary-green);
  }

  .empty-state h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
  }

  .empty-state p {
    font-size: 0.9rem;
    margin: 0;
  }

  /* Loading State */
  .loading-skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
  }

  @keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
  }

  /* Responsive Design */
  @media (max-width: 1024px) {
    .content-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    .sidebar-panel {
      order: -1;
    }
  }

  @media (max-width: 768px) {
    .dashboard-header {
      padding: 2rem 1rem;
    }

    .header-title h1 {
      font-size: 2rem;
    }

    .header-actions {
      flex-direction: column;
      width: 100%;
    }

    .btn-primary-green,
    .btn-secondary-green {
      width: 100%;
      justify-content: center;
    }

    .content-grid {
      padding: 0 1rem;
    }

    .courses-grid {
      grid-template-columns: 1fr;
      padding: 1rem;
    }

    .stats-grid {
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
  }

  @media (max-width: 480px) {
    .header-title {
      flex-direction: column;
      text-align: center;
    }

    .header-title h1 {
      font-size: 1.75rem;
    }

    .stats-grid {
      grid-template-columns: 1fr;
    }

    .course-card-actions {
      flex-direction: column;
    }

    .btn-course {
      width: 100%;
    }
  }

  /* Student Courses Dashboard Styles */

  .student-courses-section {
    background: linear-gradient(135deg, var(--background-light) 0%, #e8f5e8 100%);
    min-height: 100vh;
    padding: 2rem 0;
    margin-top: 40px;
  }

  .dashboard-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
  }

  .content-card-modern {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    margin-bottom: 2rem;
  }

  .card-header-modern {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.5rem 2rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .card-header-modern h5 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .card-container {
    padding: 2rem;
  }

  .course-card {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    margin-bottom: 1.5rem;
    overflow: hidden;
    transition: var(--transition);
  }

  .course-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
  }

  .course-card .card-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.25rem 1.5rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .course-card .card-header h4 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .status-dot {
    width: 12px;
    height: 12px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
  }

  .course-card .card-body {
    padding: 1.5rem;
  }

  .card-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(115, 175, 111, 0.1);
  }

  .card-item:last-child {
    border-bottom: none;
  }

  .card-item strong {
    font-weight: 600;
    color: var(--text-secondary);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .course-card .card-footer {
    padding: 1.5rem;
    background: rgba(115, 175, 111, 0.02);
    border-top: 1px solid var(--border-color);
  }

  .btn-action-modern {
    padding: 10px 20px;
    border-radius: var(--radius-md);
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: var(--transition);
    border: none;
    cursor: pointer;
    min-width: 120px;
  }

  .btn-action-modern.primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .btn-action-modern.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
  }

  .btn-action-modern.success {
    background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
  }

  .btn-action-modern.success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
  }

  .table-modern {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-light);
  }

  .table-modern thead {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
  }

  .table-modern th {
    padding: 1rem;
    text-align: left;
    font-weight: 700;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .table-modern td {
    padding: 1rem;
    border-bottom: 1px solid var(--border-color);
    font-size: 0.9rem;
  }

  .table-modern tbody tr {
    transition: var(--transition);
  }

  .table-modern tbody tr:hover {
    background: rgba(115, 175, 111, 0.02);
  }

  .table-complete-data {
    margin: 0;
  }

  .table-responsive {
    overflow-x: auto;
    border-radius: var(--radius-lg);
  }

  .empty-state-modern {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-secondary);
  }

  .empty-state-modern i {
    font-size: 4rem;
    margin-bottom: 1.5rem;
    opacity: 0.3;
    color: var(--primary-green);
  }

  .empty-state-modern h6 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
  }

  .empty-state-modern p {
    font-size: 0.9rem;
    margin: 0;
  }

  .badge-modern {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .badge-modern.success {
    background: rgba(16, 185, 129, 0.1);
    color: #059669;
  }

  .badge-modern.primary {
    background: rgba(115, 175, 111, 0.1);
    color: var(--primary-green);
  }

  .search-input-group {
    position: relative;
    max-width: 500px;
  }

  .search-input-group .search-input {
    width: 100%;
    padding: 10px 45px 10px 15px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.9rem;
    transition: var(--transition);
    background: white;
  }

  .search-input-group .search-input:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(115, 175, 111, 0.1);
  }

  .search-input-group .search-icon {
    position: absolute !important;
    right: 10px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    background: var(--primary-green) !important;
    border: none !important;
    color: white !important;
    padding: 8px 15px !important;
    border-radius: var(--radius-sm) !important;
    cursor: pointer !important;
    transition: var(--transition) !important;
    z-index: 10 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
  }

  .search-input-group .search-icon:hover {
    background: var(--primary-green-dark) !important;
  }

  .search-input-group {
    position: relative !important;
  }

  .search-input-group .search-input {
    position: relative !important;
    z-index: 1 !important;
  }

  /* Materials Modal Styles */
  .materials-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    animation: fadeIn 0.3s ease-out;
  }

  .materials-modal.show {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .materials-modal-content {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    max-width: 600px;
    width: 90%;
    max-height: 80vh;
    overflow: hidden;
    animation: slideIn 0.3s ease-out;
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @keyframes slideIn {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
  }

  .materials-modal-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    padding: 1.5rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .materials-modal-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
  }

  .materials-modal-close {
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 5px;
    border-radius: var(--radius-sm);
    transition: var(--transition);
  }

  .materials-modal-close:hover {
    background: rgba(255, 255, 255, 0.1);
  }

  .materials-modal-body {
    padding: 2rem;
    max-height: 400px;
    overflow-y: auto;
  }

  .materials-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .material-item-pro {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(115, 175, 111, 0.02);
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    transition: var(--transition);
  }

  .material-item-pro:hover {
    background: rgba(115, 175, 111, 0.05);
    transform: translateY(-1px);
  }

  .material-icon-pro {
    width: 40px;
    height: 40px;
    background: rgba(115, 175, 111, 0.1);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-green);
    font-size: 1.2rem;
  }

  .material-details-pro {
    flex: 1;
  }

  .material-name-pro {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
  }

  .material-date-pro {
    font-size: 0.8rem;
    color: var(--text-secondary);
  }

  .material-download-btn {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    padding: 8px 16px;
    border-radius: var(--radius-md);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: var(--transition);
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .material-download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
  }

  .materials-empty {
    text-align: center;
    padding: 3rem 2rem;
    color: var(--text-secondary);
  }

  .materials-empty i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.3;
    color: var(--primary-green);
  }

  .materials-empty h6 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
  }

  .materials-empty p {
    font-size: 0.9rem;
    margin: 0;
  }

  /* Responsive for Student Dashboard */
  @media (max-width: 768px) {
    .student-courses-section {
      padding: 1rem 0;
      margin-top: 20px;
    }

    .dashboard-grid {
      padding: 0 1rem;
      gap: 1.5rem;
    }

    .card-header-modern {
      padding: 1rem 1.5rem;
      flex-direction: column;
      align-items: stretch;
    }

    .card-header-modern h5 {
      font-size: 1.1rem;
    }

    .card-container {
      padding: 1.5rem 1rem;
    }

    .course-card .card-body {
      padding: 1rem;
    }

    .course-card .card-footer {
      padding: 1rem;
    }

    .btn-action-modern {
      width: 100%;
      justify-content: center;
    }

    .table-modern th,
    .table-modern td {
      padding: 0.75rem 0.5rem;
      font-size: 0.8rem;
    }

    .materials-modal-content {
      width: 95%;
      margin: 1rem;
    }

    .materials-modal-body {
      padding: 1.5rem 1rem;
    }
  }

  @media (max-width: 480px) {
    .dashboard-grid {
      padding: 0 0.5rem;
    }

    .content-card-modern {
      margin-bottom: 1rem;
    }

    .card-container {
      padding: 1rem 0.5rem;
    }

    .course-card {
      margin-bottom: 1rem;
    }

    .course-card .card-header h4 {
      font-size: 1rem;
    }

    .card-item {
      flex-direction: column;
      align-items: flex-start;
      gap: 0.25rem;
    }

    .materials-list {
      gap: 0.75rem;
    }

    .material-item-pro {
      flex-direction: column;
      align-items: flex-start;
      gap: 0.75rem;
    }

    .material-details-pro {
      width: 100%;
    }
  }
</style>



<!-- Role-based Content -->
<?php if (($userRole ?? '') === 'admin'): ?>
  <div class="courses-dashboard">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
      <div class="header-content">
        <div class="header-title">
          <i class="fas fa-graduation-cap"></i>
          <h1>Courses Dashboard</h1>
        </div>
        <div class="header-actions">
          <?php if (($userRole ?? '') === 'admin'): ?>
          <a href="<?= base_url('courses/create') ?>" class="btn-primary-green">
            <i class="fas fa-plus"></i>
            Add Course
          </a>
          <?php endif; ?>
          <a href="#" class="btn-secondary-green">
            <i class="fas fa-sync-alt"></i>
            Refresh
          </a>
        </div>
      </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-book"></i>
        </div>
        <div class="stat-value"><?= count($allCourses ?? []) ?></div>
        <div class="stat-label">Total Courses</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-users"></i>
        </div>
        <div class="stat-value">
          <?php
            $totalStudents = 0;
            foreach (($allCourses ?? []) as $course) {
              $totalStudents += $course['students'] ?? 0;
            }
            echo $totalStudents;
          ?>
        </div>
        <div class="stat-label">Enrolled Students</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-calendar-check"></i>
        </div>
        <div class="stat-value"><?= count($allCourses ?? []) ?></div>
        <div class="stat-label">Active Courses</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clock"></i>
        </div>
        <div class="stat-value">0</div>
        <div class="stat-label">Pending Approval</div>
      </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid">
      <!-- Main Content Area -->
      <div class="main-content-card">
        <div class="content-header">
          <div class="content-title">
            <i class="fas fa-graduation-cap"></i>
            All Courses
          </div>
        </div>

        <div class="courses-grid">
          <!-- Course Cards for Admin -->
          <?php if (!empty($allCourses ?? [])): ?>
            <?php foreach ($allCourses as $course): ?>
              <div class="course-card-new">
                <div class="course-card-header">
                  <div class="course-code"><?= esc($course['course_number'] ?? '') ?></div>
                  <div class="course-status active">Active</div>
                </div>
                <div class="course-card-body">
                  <div class="course-info">
                    <div class="info-item">
                      <span class="info-label">TEACHER</span>
                      <span class="info-value"><?= esc($course['teacher_name'] ?? 'N/A') ?></span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">UNITS</span>
                      <span class="info-value"><?= esc($course['units'] ?? '3') ?></span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">ACADEMIC YEAR</span>
                      <span class="info-value"><?= esc($course['academic_year'] ?? 'N/A') ?></span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">SEMESTER</span>
                      <span class="info-value"><?= esc($course['semester'] ?? 'N/A') ?> - <?= esc($course['term'] ?? 'N/A') ?></span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">SCHEDULE</span>
                      <span class="info-value">
                        <?php
                          $scheduleTime = $course['schedule_time'] ?? '';
                          $scheduleDate = $course['schedule_date'] ?? '';
                          if ($scheduleTime) {
                            echo esc(\App\Helpers\TimeHelper::to12HourFormat($scheduleTime));
                          } else {
                            echo 'N/A';
                          }
                          if ($scheduleDate) {
                            echo ' on ' . date('M d, Y', strtotime($scheduleDate));
                          }
                        ?>
                      </span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">DESCRIPTION</span>
                      <span class="info-value" title="<?= esc($course['description'] ?? '') ?>">
                        <?= esc(substr($course['description'] ?? 'No description', 0, 40)) ?><?= strlen($course['description'] ?? '') > 40 ? '...' : '' ?>
                      </span>
                    </div>
                  </div>
                  <div class="course-card-actions">
                    <button class="btn-course secondary" onclick="window.location.href='<?= base_url('courses/edit/') ?><?= esc($course['course_id'] ?? '') ?>'">
                      <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn-course danger delete-admin-course-btn"
                            data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                            data-course-name="<?= esc($course['course_number'] ?? '') ?>">
                      <i class="fas fa-trash"></i> Delete
                    </button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state">
              <i class="fas fa-book"></i>
              <h3>No Courses Yet</h3>
              <p>Start by creating your first course to get started!</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Alert Container -->
    <div id="admin-alert-container"></div>
  </div>

  <?php elseif (($userRole ?? '') === 'teacher'): ?>
  <div class="courses-dashboard">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
      <div class="header-content">
        <div class="header-title">
          <i class="fas fa-graduation-cap"></i>
          <h1>Courses Dashboard</h1>
        </div>
        <div class="header-actions">
          <?php if (($userRole ?? '') === 'admin' || ($userRole ?? '') === 'teacher'): ?>
          <a href="<?= base_url('courses/create') ?>" class="btn-primary-green">
            <i class="fas fa-plus"></i>
            Add Course
          </a>
          <?php endif; ?>
          <a href="#" class="btn-secondary-green">
            <i class="fas fa-sync-alt"></i>
            Refresh
          </a>
        </div>
      </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="stat-value"><?= count($teacherCourses ?? []) ?></div>
        <div class="stat-label">My Courses</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-users"></i>
        </div>
        <div class="stat-value"><?= $totalEnrolledStudents ?? 0 ?></div>
        <div class="stat-label">Total Students</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-calendar-check"></i>
        </div>
        <div class="stat-value">
          <?php
            $activeCount = 0;
            foreach (($teacherCourses ?? []) as $course) {
              if (($course['status'] ?? '') === 'active') $activeCount++;
            }
            echo $activeCount;
          ?>
        </div>
        <div class="stat-label">Active Courses</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-clock"></i>
        </div>
        <div class="stat-value">
          <?php
            $pendingCount = 0;
            foreach (($teacherCourses ?? []) as $course) {
              if (($course['status'] ?? '') === 'pending') $pendingCount++;
            }
            echo $pendingCount;
          ?>
        </div>
        <div class="stat-label">Pending Approval</div>
      </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid">
      <!-- Main Content Area -->
      <div class="main-content-card">
        <div class="content-header">
          <div class="content-title">
            <i class="fas fa-graduation-cap"></i>
            My Courses
          </div>
        </div>

        <div class="courses-grid">
          <!-- Course Cards for Teacher -->
          <?php if (!empty($teacherCourses ?? [])): ?>
            <?php foreach ($teacherCourses as $course): ?>
              <div class="course-card-new">
                <div class="course-card-header">
                  <div class="course-code"><?= esc($course['course_number'] ?? '') ?></div>
                  <div class="course-status <?php
                    $status = $course['status'] ?? 'pending';
                    echo $status === 'active' ? 'active' : 'pending';
                  ?>">
                    <?php
                      if ($status === 'active') {
                        echo 'Active (' . esc($course['students'] ?? 0) . ' students)';
                      } else {
                        echo 'Pending';
                      }
                    ?>
                  </div>
                </div>
                <div class="course-card-body">
                  <div class="course-info">
                    <div class="info-item">
                      <span class="info-label">UNITS</span>
                      <span class="info-value"><?= esc($course['units'] ?? '3') ?></span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">ACADEMIC YEAR</span>
                      <span class="info-value"><?= esc($course['academic_year'] ?? 'N/A') ?></span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">SEMESTER</span>
                      <span class="info-value"><?= esc($course['semester'] ?? 'N/A') ?> - <?= esc($course['term'] ?? 'N/A') ?></span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">SCHEDULE</span>
                      <span class="info-value">
                        <?php
                          $scheduleTime = $course['schedule_time'] ?? '';
                          $scheduleDate = $course['schedule_date'] ?? '';
                          if ($scheduleTime) {
                            echo esc(\App\Helpers\TimeHelper::to12HourFormat($scheduleTime));
                          } else {
                            echo 'N/A';
                          }
                          if ($scheduleDate) {
                            echo ' on ' . date('M d, Y', strtotime($scheduleDate));
                          }
                        ?>
                      </span>
                    </div>
                    <div class="info-item">
                      <span class="info-label">DESCRIPTION</span>
                      <span class="info-value" title="<?= esc($course['description'] ?? '') ?>">
                        <?= esc(substr($course['description'] ?? 'No description', 0, 40)) ?><?= strlen($course['description'] ?? '') > 40 ? '...' : '' ?>
                      </span>
                    </div>
                  </div>
                  <div class="course-card-actions">
                    <button class="btn-course primary" onclick="window.location.href='<?= base_url('admin/course/') ?><?= esc($course['course_id'] ?? '') ?>/upload'">
                      <i class="fas fa-eye"></i> Manage
                    </button>
                    <?php if (($course['status'] ?? 'active') === 'pending'): ?>
                      <button class="btn-course success activate-course-btn"
                              data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                              data-course-name="<?= esc($course['course_number'] ?? '') ?>">
                        <i class="fas fa-play"></i> Activate
                      </button>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state">
              <i class="fas fa-book"></i>
              <h3>No Courses Yet</h3>
              <p>Start by creating your first course!</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Alert Container -->
    <div id="teacher-alert-container"></div>
  </div>



  <?php elseif (($userRole ?? '') === 'student'): ?>
    <!-- Student Courses Dashboard - Updated to match Teacher Dashboard -->
    <div class="courses-dashboard">
      <!-- Dashboard Header -->
      <div class="dashboard-header">
        <div class="header-content">
          <div class="header-title">
            <i class="fas fa-graduation-cap"></i>
            <h1>My Courses Dashboard</h1>
          </div>
          <div class="header-actions">
            <a href="#" class="btn-secondary-green">
              <i class="fas fa-sync-alt"></i>
              Refresh
            </a>
          </div>
        </div>
      </div>

      <!-- Stats Section -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon">
            <i class="fas fa-book"></i>
          </div>
          <div class="stat-value"><?= count($enrolledCourses ?? []) ?></div>
          <div class="stat-label">Enrolled Courses</div>
        </div>

        <div class="stat-card">
          <div class="stat-icon">
            <i class="fas fa-plus-circle"></i>
          </div>
          <div class="stat-value"><?= count($availableCourses ?? []) ?></div>
          <div class="stat-label">Available Courses</div>
        </div>

        <div class="stat-card">
          <div class="stat-icon">
            <i class="fas fa-file-alt"></i>
          </div>
          <div class="stat-value">
            <?php
              // Get total materials count for enrolled courses
              $totalMaterials = 0;
              if (!empty($enrolledCourses ?? [])) {
                $materialModel = new \App\Models\MaterialModel();
                foreach ($enrolledCourses as $course) {
                  $materials = $materialModel->where('course_id', $course['course_id'])->findAll();
                  $totalMaterials += count($materials);
                }
              }
              echo $totalMaterials;
            ?>
          </div>
          <div class="stat-label">Course Materials</div>
        </div>

        <div class="stat-card">
          <div class="stat-icon">
            <i class="fas fa-clipboard-list"></i>
          </div>
          <div class="stat-value">
            <?php
              // Get total assignments count for enrolled courses
              $totalAssignments = 0;
              if (!empty($enrolledCourses ?? [])) {
                $assignmentModel = new \App\Models\AssignmentModel();
                foreach ($enrolledCourses as $course) {
                  $assignments = $assignmentModel->where('course_id', $course['course_id'])->findAll();
                  $totalAssignments += count($assignments);
                }
              }
              echo $totalAssignments;
            ?>
          </div>
          <div class="stat-label">Assignments</div>
        </div>
      </div>

      <!-- Content Grid -->
      <div class="content-grid">
        <!-- Main Content Area -->
        <div class="main-content-card">
          <div class="content-header">
            <div class="content-title">
              <i class="fas fa-graduation-cap"></i>
              My Enrolled Courses
            </div>
            <div class="content-actions">
              <div class="search-container">
                <input type="text" class="search-input" id="student-course-search-input" placeholder="Search enrolled courses..." value="">
                <button class="search-btn" id="student-search-btn">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="courses-grid">
            <!-- Course Cards for Student - Enrolled Courses -->
            <?php if (!empty($enrolledCourses ?? [])): ?>
              <?php foreach ($enrolledCourses as $course): ?>
                <div class="course-card-new">
                  <div class="course-card-header">
                    <div class="course-code"><?= esc($course['course_number'] ?? '') ?></div>
                    <div class="course-status active">Enrolled</div>
                  </div>
                  <div class="course-card-body">
                    <div class="course-info">
                      <div class="info-item">
                        <span class="info-label">INSTRUCTOR</span>
                        <span class="info-value"><?= esc($course['teacher_name'] ?? 'N/A') ?></span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">UNITS</span>
                        <span class="info-value"><?= esc($course['units'] ?? '3') ?></span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">ACADEMIC YEAR</span>
                        <span class="info-value"><?= esc($course['academic_year'] ?? 'N/A') ?></span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">SEMESTER</span>
                        <span class="info-value"><?= esc($course['semester'] ?? 'N/A') ?> - <?= esc($course['term'] ?? 'N/A') ?></span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">SCHEDULE</span>
                        <span class="info-value">
                          <?php
                            $scheduleTime = $course['schedule_time'] ?? '';
                            $scheduleDate = $course['schedule_date'] ?? '';
                            if ($scheduleTime) {
                              echo esc(\App\Helpers\TimeHelper::to12HourFormat($scheduleTime));
                            } else {
                              echo 'N/A';
                            }
                            if ($scheduleDate) {
                              echo ' on ' . date('M d, Y', strtotime($scheduleDate));
                            }
                          ?>
                        </span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">DESCRIPTION</span>
                        <span class="info-value" title="<?= esc($course['description'] ?? '') ?>">
                          <?= esc(substr($course['description'] ?? 'No description', 0, 40)) ?><?= strlen($course['description'] ?? '') > 40 ? '...' : '' ?>
                        </span>
                      </div>
                    </div>
                    <div class="course-card-actions">
                      <button class="btn-course primary view-materials-btn"
                              data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                              data-course-name="<?= esc($course['course_number'] ?? '') ?>">
                        <i class="fas fa-eye"></i> View Materials
                      </button>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="empty-state">
                <i class="fas fa-book"></i>
                <h3>No Enrolled Courses</h3>
                <p>Browse available courses below to get started!</p>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- Available Courses Section -->
        <div class="main-content-card">
          <div class="content-header">
            <div class="content-title">
              <i class="fas fa-plus-circle"></i>
              Available Courses
            </div>
          </div>

          <div class="courses-grid">
            <!-- Course Cards for Student - Available Courses -->
            <?php if (!empty($availableCourses ?? [])): ?>
              <?php foreach ($availableCourses as $course): ?>
                <div class="course-card-new">
                  <div class="course-card-header">
                    <div class="course-code"><?= esc($course['course_number'] ?? '') ?></div>
                    <div class="course-status active">Available</div>
                  </div>
                  <div class="course-card-body">
                    <div class="course-info">
                      <div class="info-item">
                        <span class="info-label">INSTRUCTOR</span>
                        <span class="info-value"><?= esc($course['teacher_name'] ?? 'N/A') ?></span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">UNITS</span>
                        <span class="info-value"><?= esc($course['units'] ?? '3') ?></span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">ACADEMIC YEAR</span>
                        <span class="info-value"><?= esc($course['academic_year'] ?? 'N/A') ?></span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">SEMESTER</span>
                        <span class="info-value"><?= esc($course['semester'] ?? 'N/A') ?> - <?= esc($course['term'] ?? 'N/A') ?></span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">SCHEDULE</span>
                        <span class="info-value">
                          <?php
                            $scheduleTime = $course['schedule_time'] ?? '';
                            $scheduleDate = $course['schedule_date'] ?? '';
                            if ($scheduleTime) {
                              echo esc(\App\Helpers\TimeHelper::to12HourFormat($scheduleTime));
                            } else {
                              echo 'N/A';
                            }
                            if ($scheduleDate) {
                              echo ' on ' . date('M d, Y', strtotime($scheduleDate));
                            }
                          ?>
                        </span>
                      </div>
                      <div class="info-item">
                        <span class="info-label">DESCRIPTION</span>
                        <span class="info-value" title="<?= esc($course['description'] ?? '') ?>">
                          <?= esc(substr($course['description'] ?? 'No description', 0, 40)) ?><?= strlen($course['description'] ?? '') > 40 ? '...' : '' ?>
                        </span>
                      </div>
                    </div>
                    <div class="course-card-actions">
                      <button class="btn-course success enroll-btn"
                              data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                              data-course-name="<?= esc($course['course_number'] ?? '') ?>">
                        <i class="fas fa-plus"></i> Enroll
                      </button>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="empty-state">
                <i class="fas fa-check-circle"></i>
                <h3>All Courses Enrolled</h3>
                <p>You're enrolled in all available courses!</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Alert Container -->
      <div id="alert-container"></div>
    </div>

  <?php else: ?>
    <!-- Unknown Role -->
    <div class="content-card-modern">
      <div class="empty-state-modern">
        <i class="fas fa-exclamation-triangle"></i>
        <h6>Role Not Recognized</h6>
        <p>Please contact the administrator to resolve this issue.</p>
      </div>
    </div>
  <?php endif; ?>
</div>

<!-- Materials Modal -->
<div class="materials-modal" id="materialsModal">
  <div class="materials-modal-content">
    <div class="materials-modal-header">
      <h5 class="materials-modal-title" id="materialsModalTitle">Course Materials</h5>
      <button class="materials-modal-close" id="materialsModalClose">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="materials-modal-body" id="materialsModalBody">
      <!-- Materials will be loaded here -->
    </div>
  </div>
</div>

<script>
// Materials Modal Functionality
document.querySelectorAll('.view-materials-btn').forEach(button => {
  button.addEventListener('click', function() {
    const courseId = this.dataset.courseId;
    const courseName = this.dataset.courseName;
    const modal = document.getElementById('materialsModal');
    const modalTitle = document.getElementById('materialsModalTitle');
    const modalBody = document.getElementById('materialsModalBody');

    // Set modal title
    modalTitle.textContent = `${courseName} Materials`;

    // Show modal
    modal.classList.add('show');
    modalBody.innerHTML = `
      <div class="text-center text-muted">
        <i class="fas fa-spinner fa-spin fa-2x mb-3"></i>
        <p>Loading materials...</p>
      </div>
    `;

    // Fetch materials
    fetch(`<?= base_url('admin/course/') ?>${courseId}/upload`, {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
      .then(res => res.json())
      .then(data => {
        if (Array.isArray(data) && data.length > 0) {
          let html = `<div class="materials-list">`;
          data.forEach(material => {
            html += `
              <div class="material-item-pro">
                <div class="material-info-pro">
                  <div class="material-icon-pro">
                    <i class="fas fa-file"></i>
                  </div>
                  <div class="material-details-pro">
                    <p class="material-name-pro">${material.file_name}</p>
                    <p class="material-date-pro">${material.created_at}</p>
                  </div>
                </div>
                <a href="<?= base_url('materials/download/') ?>${material.id}" class="material-download-btn">
                  <i class="fas fa-download"></i> Download
                </a>
              </div>
            `;
          });
          html += `</div>`;
          modalBody.innerHTML = html;
        } else {
          modalBody.innerHTML = `
            <div class="materials-empty">
              <i class="fas fa-folder-open"></i>
              <h6>No Materials Yet</h6>
              <p>No materials have been uploaded for this course.</p>
            </div>
          `;
        }
      })
      .catch(error => {
        console.error('Error loading materials:', error);
        modalBody.innerHTML = `
          <div class="text-center text-danger">
            <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
            <p class="fw-bold mb-0">Failed to load materials.</p>
          </div>
        `;
      });
  });
});

// Close modal functionality
document.getElementById('materialsModalClose').addEventListener('click', function() {
  document.getElementById('materialsModal').classList.remove('show');
});

// Close modal when clicking outside
document.getElementById('materialsModal').addEventListener('click', function(e) {
  if (e.target === this) {
    this.classList.remove('show');
  }
});
</script>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    console.log('Courses page scripts loaded');

    // Function to perform search on enrolled courses only
    function performSearch() {
        const searchTerm = document.getElementById('student-course-search-input').value.toLowerCase().trim();
        const enrolledCard = document.querySelector('.content-card-modern'); // First card (enrolled courses)
        const courseCards = enrolledCard.querySelectorAll('.course-card');
        const noResultsDiv = document.getElementById('search-no-results');
        let visibleCount = 0;

        courseCards.forEach(card => {
            const courseCode = card.querySelector('.card-header h4')?.textContent.toLowerCase() || '';
            const courseInfo = card.textContent.toLowerCase();

            const matches = courseCode.includes(searchTerm) || courseInfo.includes(searchTerm);

            if (matches) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide no results message
        if (noResultsDiv) {
            if (visibleCount === 0 && searchTerm !== '') {
                noResultsDiv.style.display = 'block';
            } else {
                noResultsDiv.style.display = 'none';
            }
        }
    }

    // Initialize student search functionality
    const studentSearchInput = document.getElementById('student-course-search-input');
    const studentSearchBtn = document.getElementById('student-search-btn');

    if (studentSearchInput && studentSearchBtn) {
        // Search on input change with debounce
        let studentSearchTimeout;
        studentSearchInput.addEventListener('input', function() {
            clearTimeout(studentSearchTimeout);
            studentSearchTimeout = setTimeout(performSearch, 300);
        });

        // Search on button click
        studentSearchBtn.addEventListener('click', performSearch);

        // Search on Enter key
        studentSearchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }

    // Function to perform search on teacher courses
    function performTeacherSearch() {
        const searchTerm = document.getElementById('teacher-course-search-input').value.toLowerCase().trim();
        const rows = document.querySelectorAll('.content-card-modern tbody tr');
        const noResultsDiv = document.getElementById('teacher-search-no-results');
        let visibleCount = 0;

        rows.forEach(row => {
            const courseCode = row.querySelector('td:first-child').textContent.toLowerCase();
            const courseName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

            const matches = courseCode.includes(searchTerm) || courseName.includes(searchTerm);

            if (matches) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Show/hide no results message
        if (noResultsDiv) {
            if (visibleCount === 0 && searchTerm !== '') {
                noResultsDiv.style.display = 'block';
            } else {
                noResultsDiv.style.display = 'none';
            }
        }
    }

    // Initialize teacher search functionality
    const teacherSearchInput = document.getElementById('teacher-course-search-input');
    const teacherSearchBtn = document.getElementById('teacher-search-btn');

    if (teacherSearchInput && teacherSearchBtn) {
        // Search on input change with debounce
        let teacherSearchTimeout;
        teacherSearchInput.addEventListener('input', function() {
            clearTimeout(teacherSearchTimeout);
            teacherSearchTimeout = setTimeout(performTeacherSearch, 300);
        });

        // Search on button click
        teacherSearchBtn.addEventListener('click', performTeacherSearch);

        // Search on Enter key
        teacherSearchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performTeacherSearch();
            }
        });
    }

    // Function to perform search on admin courses
    function performAdminSearch() {
        const searchTerm = document.getElementById('admin-course-search-input').value.toLowerCase().trim();
        const rows = document.querySelectorAll('.content-card-modern tbody tr');
        const noResultsDiv = document.getElementById('admin-search-no-results');
        let visibleCount = 0;

        rows.forEach(row => {
            const courseCode = row.querySelector('td:first-child').textContent.toLowerCase();
            const courseName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

            const matches = courseCode.includes(searchTerm) || courseName.includes(searchTerm);

            if (matches) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Show/hide no results message
        if (noResultsDiv) {
            if (visibleCount === 0 && searchTerm !== '') {
                noResultsDiv.style.display = 'block';
            } else {
                noResultsDiv.style.display = 'none';
            }
        }
    }

    // Initialize admin search functionality
    const adminSearchInput = document.getElementById('admin-course-search-input');
    const adminSearchBtn = document.getElementById('admin-search-btn');

    if (adminSearchInput && adminSearchBtn) {
        // Search on input change with debounce
        let adminSearchTimeout;
        adminSearchInput.addEventListener('input', function() {
            clearTimeout(adminSearchTimeout);
            adminSearchTimeout = setTimeout(performAdminSearch, 300);
        });

        // Search on button click
        adminSearchBtn.addEventListener('click', performAdminSearch);

        // Search on Enter key
        adminSearchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performAdminSearch();
            }
        });
    }

    // Handle enrollment button clicks
    $(document).on('click', '.enroll-btn', function(e) {
        console.log('Enroll button clicked');
        e.preventDefault();

        var button = $(this);
        var courseId = button.data('course-id');
        var courseName = button.data('course-name');

        console.log('Course ID:', courseId, 'Course Name:', courseName);

        if (!courseId) {
            console.error('No course ID found');
            showAlert('danger', 'Course ID is missing. Please refresh the page and try again.');
            return;
        }

        button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enrolling...');

        $.ajax({
            url: '<?= base_url('course/enroll') ?>',
            type: 'POST',
            data: {
                course_id: courseId,
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
            },
            dataType: 'json',
            timeout: 10000
        })
        .done(function(response) {
            console.log('AJAX response:', response);
            if (response && response.success) {
                showAlert('success', response.message);

                // Update UI without reload
                var courseRow = button.closest('tr');
                var courseCode = courseRow.find('td:first-child').text();
                var courseName = courseRow.find('td:nth-child(2)').text();

                // Remove from available courses table
                courseRow.fadeOut(500, function() {
                    $(this).remove();

                    // Check if available courses table is empty
                    var availableTable = $('.content-card-modern').eq(1).find('tbody');
                    if (availableTable.find('tr').length === 0) {
                        availableTable.closest('.table-responsive').html(`
                            <div class="empty-state-modern">
                                <i class="fas fa-check-circle"></i>
                                <h6>All Courses Enrolled</h6>
                                <p>You're enrolled in all available courses!</p>
                            </div>
                        `);
                    }
                });

                // Add to enrolled courses table
                var enrolledTable = $('.content-card-modern').eq(0).find('tbody');
                var enrolledTableContainer = enrolledTable.closest('.table-responsive');

                // If empty state exists, replace it with table
                if (enrolledTableContainer.find('.empty-state-modern').length > 0) {
                    enrolledTableContainer.html(`
                        <table class="table-modern">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Course Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    `);
                    enrolledTable = enrolledTableContainer.find('tbody');
                }

                var newRow = `
                    <tr style="display: none;">
                        <td><strong>${courseCode}</strong></td>
                        <td>${courseName}</td>
                        <td><span class="badge-modern success">Enrolled</span></td>
                        <td>
                            <button class="btn-action-modern primary view-materials-btn"
                                    data-course-id="${courseId}"
                                    data-course-name="${courseName}">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </td>
                    </tr>
                `;

                enrolledTable.append(newRow);
                enrolledTable.find('tr:last').fadeIn(500);

            } else {
                showAlert('danger', (response && response.message) ? response.message : 'Failed to enroll in course.');
                button.prop('disabled', false).html('<i class="fas fa-plus"></i> Enroll');
            }
        })
        .fail(function(xhr, status, error) {
            console.error('AJAX error:', xhr, status, error);
            let errorMessage = 'An error occurred. Please try again.';
            if (status === 'timeout') errorMessage = 'Request timed out. Please try again.';
            else if (xhr.status === 0) errorMessage = 'Network error. Please check your connection.';
            else if (xhr.status === 403) errorMessage = 'Access denied. Please check your permissions.';
            else if (xhr.status === 404) errorMessage = 'Enrollment endpoint not found.';
            showAlert('danger', errorMessage);
            button.prop('disabled', false).html('<i class="fas fa-plus"></i> Enroll');
        });
    });

    function showAlert(type, message) {
        var alertHtml = `
          <div class="alert alert-${type} alert-dismissible fade show" role="alert" style="border-radius: 16px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 1.5rem;">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        `;
        $('#alert-container').html(alertHtml);
        setTimeout(function() { $('.alert').fadeOut(); }, 5000);
    }
});

// Teacher dashboard functions
function refreshCourses() {
    $.ajax({
        url: '<?= base_url('course/getTeacherCourses') ?>',
        type: 'GET',
        dataType: 'json',
        timeout: 5000
    })
    .done(function(response) {
        if (response && response.success) {
            updateTeacherCoursesTable(response.teacherCourses);
            showTeacherAlert('success', 'Courses refreshed successfully!');
        }
    })
    .fail(function() {
        showTeacherAlert('danger', 'Failed to refresh courses. Please try again.');
    });
}

function updateTeacherCoursesTable(teacherCourses) {
    var tableBody = $('.content-card-modern').eq(0).find('tbody');
    if (teacherCourses && teacherCourses.length > 0) {
        var html = '';
        teacherCourses.forEach(function(course) {
            html += `
                <tr>
                    <td><strong>${course.course_number || ''}</strong></td>
                    <td>${(course.description || 'No description').substring(0, 50)}...</td>
                    <td>${course.units || 3}</td>
                    <td>${course.students || 0}</td>
                    <td>${new Date(course.created_at || 'now').toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                    <td><span class="badge-modern success">${course.status || 'Active'}</span></td>
                    <td>
                        <button class="btn-action-modern primary view-teacher-course-btn"
                                data-course-id="${course.course_id || ''}"
                                data-course-name="${course.course_number || ''}">
                            <i class="fas fa-eye"></i> Enrolled
                        </button>
                    </td>
                </tr>
            `;
        });
        tableBody.html(html);
    } else {
        tableBody.closest('.table-responsive').html(`
            <div class="empty-state-modern">
                <i class="fas fa-book"></i>
                <h6>No Courses Yet</h6>
                <p>Start by creating your first course!</p>
            </div>
        `);
    }
}

// Handle teacher view course button clicks
$(document).on('click', '.view-teacher-course-btn', function(e) {
    e.preventDefault();
    var courseId = $(this).data('course-id');
    var courseName = $(this).data('course-name');
    // For now, redirect to the upload page since it's a full page
    window.location.href = '<?= base_url('admin/course/') ?>' + courseId + '/upload';
});

// Handle activate course button clicks
$(document).on('click', '.activate-course-btn', function(e) {
    e.preventDefault();
    var button = $(this);
    var courseId = button.data('course-id');
    var courseName = button.data('course-name');

    if (!courseId) {
        showTeacherAlert('danger', 'Course ID is missing. Please refresh the page and try again.');
        return;
    }

    button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Activating...');

    $.ajax({
        url: '<?= base_url('course/activate') ?>',
        type: 'POST',
        data: {
            course_id: courseId,
            '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
        },
        dataType: 'json',
        timeout: 10000
    })
    .done(function(response) {
        if (response && response.success) {
            showTeacherAlert('success', response.message);

            // Update the button to "Enrolled" and change its class
            button.removeClass('activate-course-btn success').addClass('view-teacher-course-btn primary');
            button.html('<i class="fas fa-eye"></i> Enrolled');
            button.prop('disabled', false);

            // Update the status badge in the same row
            var statusBadge = button.closest('tr').find('td:nth-child(7) .badge-modern');
            statusBadge.removeClass('primary').addClass('success').text('Active');

        } else {
            showTeacherAlert('danger', (response && response.message) ? response.message : 'Failed to activate course.');
            button.prop('disabled', false).html('<i class="fas fa-play"></i> Activate');
        }
    })
    .fail(function(xhr, status, error) {
        console.error('AJAX error:', xhr, status, error);
        let errorMessage = 'An error occurred. Please try again.';
        if (status === 'timeout') errorMessage = 'Request timed out. Please try again.';
        else if (xhr.status === 0) errorMessage = 'Network error. Please check your connection.';
        else if (xhr.status === 403) errorMessage = 'Access denied. Please check your permissions.';
        else if (xhr.status === 404) errorMessage = 'Activation endpoint not found.';
        showTeacherAlert('danger', errorMessage);
        button.prop('disabled', false).html('<i class="fas fa-play"></i> Activate');
    });
});

function showTeacherAlert(type, message) {
    var alertHtml = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert" style="border-radius: 16px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 1.5rem;">
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
    $('#teacher-alert-container').html(alertHtml);
    setTimeout(function() { $('#teacher-alert-container .alert').fadeOut(); }, 5000);
}

// Admin dashboard functions
function refreshAllCourses() {
    $.ajax({
        url: '<?= base_url('course/getAllCourses') ?>',
        type: 'GET',
        dataType: 'json',
        timeout: 5000
    })
    .done(function(response) {
        if (response && response.success) {
            updateAllCoursesTable(response.allCourses);
            showAdminAlert('success', 'All courses refreshed successfully!');
        }
    })
    .fail(function() {
        showAdminAlert('danger', 'Failed to refresh courses. Please try again.');
    });
}

function updateAllCoursesTable(allCourses) {
    var tableBody = $('.content-card-modern').eq(0).find('tbody');
    if (allCourses && allCourses.length > 0) {
        var html = '';
        allCourses.forEach(function(course) {
            html += `
                <tr>
                    <td><strong>${course.course_number || ''}</strong></td>
                    <td>${course.teacher_name || 'N/A'}</td>
                    <td>${(course.description || 'No description').substring(0, 50)}...</td>
                    <td>${course.units || 3}</td>
                    <td>${course.students || 0}</td>
                    <td>${new Date(course.created_at || 'now').toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                    <td><span class="badge-modern success">Active</span></td>
                    <td>
                        <button class="btn-action-modern primary view-admin-course-btn"
                                data-course-id="${course.course_id || ''}"
                                data-course-name="${course.course_number || ''}">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
            `;
        });
        tableBody.html(html);
    } else {
        tableBody.closest('.table-responsive').html(`
            <div class="empty-state-modern">
                <i class="fas fa-book"></i>
                <h6>No Courses Yet</h6>
                <p>Start by creating your first course!</p>
            </div>
        `);
    }
}

// Handle admin view course button clicks
$(document).on('click', '.view-admin-course-btn', function(e) {
    e.preventDefault();
    var courseId = $(this).data('course-id');
    var courseName = $(this).data('course-name');
    // For now, redirect to the upload page since it's a full page
    window.location.href = '<?= base_url('admin/course/') ?>' + courseId + '/upload';
});

function showAdminAlert(type, message) {
    var alertHtml = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert" style="border-radius: 16px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 1.5rem;">
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
    $('#admin-alert-container').html(alertHtml);
    setTimeout(function() { $('#admin-alert-container .alert').fadeOut(); }, 5000);
}

// Handle admin delete course button clicks
$(document).on('click', '.delete-admin-course-btn', function(e) {
    e.preventDefault();
    var button = $(this);
    var courseId = button.data('course-id');
    var courseName = button.data('course-name');

    if (!courseId) {
        showAdminAlert('danger', 'Course ID is missing. Please refresh the page and try again.');
        return;
    }

    // Show confirmation dialog
    if (!confirm(`Are you sure you want to delete the course "${courseName}"? This action cannot be undone and will remove all related data including enrollments and materials.`)) {
        return;
    }

    button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...');

    $.ajax({
        url: '<?= base_url('course/delete') ?>',
        type: 'POST',
        data: {
            course_id: courseId,
            '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
        },
        dataType: 'json',
        timeout: 10000
    })
    .done(function(response) {
        if (response && response.success) {
            showAdminAlert('success', response.message);

            // Remove the course row from the table
            button.closest('tr').fadeOut(500, function() {
                $(this).remove();

                // Check if table is empty
                var tableBody = $('.content-card-modern').eq(0).find('tbody');
                if (tableBody.find('tr').length === 0) {
                    tableBody.closest('.table-responsive').html(`
                        <div class="empty-state-modern">
                            <i class="fas fa-book"></i>
                            <h6>No Courses Yet</h6>
                            <p>Start by creating your first course!</p>
                        </div>
                    `);
                }
            });
        } else {
            showAdminAlert('danger', (response && response.message) ? response.message : 'Failed to delete course.');
            button.prop('disabled', false).html('<i class="fas fa-trash"></i> Delete');
        }
    })
    .fail(function(xhr, status, error) {
        console.error('AJAX error:', xhr, status, error);
        let errorMessage = 'An error occurred. Please try again.';
        if (status === 'timeout') errorMessage = 'Request timed out. Please try again.';
        else if (xhr.status === 0) errorMessage = 'Network error. Please check your connection.';
        else if (xhr.status === 403) errorMessage = 'Access denied. Please check your permissions.';
        else if (xhr.status === 404) errorMessage = 'Delete endpoint not found.';
        showAdminAlert('danger', errorMessage);
        button.prop('disabled', false).html('<i class="fas fa-trash"></i> Delete');
    });
});

</script>
<?= $this->endSection() ?>
