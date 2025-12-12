<?= $this->extend('template') ?>

<?= $this->section('title') ?>Upload Materials - <?= esc($course['course_number']) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Redesigned Upload Materials Dashboard Template with #73AF6F Theme */

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
  .upload-dashboard {
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

  /* Materials Grid */
  .materials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
  }

  .material-card-new {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: var(--transition);
    position: relative;
  }

  .material-card-new:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-hover);
  }

  .material-card-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.25rem 1.5rem;
    color: white;
    position: relative;
  }

  .material-file-name {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
  }

  .material-status {
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

  .material-status.uploaded {
    background: rgba(255, 255, 255, 0.2);
    color: white;
  }

  .material-card-body {
    padding: 1.5rem;
  }

  .material-info {
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

  .material-card-actions {
    display: flex;
    gap: 0.75rem;
  }

  .btn-material {
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

  .btn-material.primary {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .btn-material.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
  }

  .btn-material.secondary {
    background: rgba(115, 175, 111, 0.1);
    color: var(--primary-green);
    border: 1px solid var(--primary-green);
  }

  .btn-material.secondary:hover {
    background: var(--primary-green);
    color: white;
  }

  .btn-material.danger {
    background: rgba(239, 68, 68, 0.1);
    color: #dc2626;
    border: 1px solid #dc2626;
  }

  .btn-material.danger:hover {
    background: #dc2626;
    color: white;
  }

  /* Upload Section */
  .upload-section {
    background: var(--background-card);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    margin-bottom: 2rem;
  }

  .upload-section-header {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    padding: 1.5rem 2rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .upload-section-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
  }

  .upload-section-body {
    padding: 2rem;
  }

  .upload-description {
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
  }

  .btn-upload-main {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
    color: white;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
    border: none;
    box-shadow: 0 4px 12px rgba(115, 175, 111, 0.3);
  }

  .btn-upload-main:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(115, 175, 111, 0.4);
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

    .materials-grid {
      grid-template-columns: 1fr;
      padding: 1rem;
    }

    .stats-grid {
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    .upload-section-body {
      padding: 1.5rem 1rem;
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

    .material-card-actions {
      flex-direction: column;
    }

    .btn-material {
      width: 100%;
    }
  }
</style>

<div class="upload-dashboard">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <div class="header-content">
      <div class="header-title">
        <i class="fas fa-cloud-upload-alt"></i>
        <h1>Upload Materials</h1>
      </div>
      <div class="header-actions">
        <a href="<?= base_url('courses') ?>" class="btn-secondary-green">
          <i class="fas fa-arrow-left"></i>
          Back to Courses
        </a>
      </div>
    </div>
  </div>

  <!-- Stats Section -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-file-alt"></i>
      </div>
      <div class="stat-value"><?= count($materials ?? []) ?></div>
      <div class="stat-label">Total Materials</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-users"></i>
      </div>
      <div class="stat-value">
        <?php
          // Get enrolled students count
          $enrollmentModel = new \App\Models\EnrollmentModel();
          $enrollments = $enrollmentModel->where('course_id', $course['course_id'] ?? '')->findAll();
          echo count($enrollments);
        ?>
      </div>
      <div class="stat-label">Enrolled Students</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-calendar-check"></i>
      </div>
      <div class="stat-value">
        <?php
          // Get active materials count
          echo count($materials ?? []);
        ?>
      </div>
      <div class="stat-label">Active Materials</div>
    </div>

    <div class="stat-card">
      <div class="stat-icon">
        <i class="fas fa-clock"></i>
      </div>
      <div class="stat-value">0</div>
      <div class="stat-label">Pending Review</div>
    </div>
  </div>

  <!-- Content Grid -->
  <div class="content-grid">
    <!-- Upload Section -->
    <div class="upload-section">
      <div class="upload-section-header">
        <div class="upload-section-title">
          <i class="fas fa-plus-circle"></i>
          Upload New Material
        </div>
      </div>
      <div class="upload-section-body">
        <p class="upload-description">
          Share course materials with your students. Supported formats: PDF, DOC, DOCX, PPT, PPTX, TXT, JPG, JPEG, PNG
        </p>
        <button type="button" class="btn-upload-main" data-bs-toggle="modal" data-bs-target="#uploadModal">
          <i class="fas fa-cloud-upload-alt"></i>
          Upload Material
        </button>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content-card">
      <div class="content-header">
        <div class="content-title">
          <i class="fas fa-file-alt"></i>
          Course Materials
        </div>
        <div class="content-actions">
          <div class="search-container">
            <input type="text" class="search-input" id="material-search-input" placeholder="Search materials..." value="">
            <button class="search-btn" id="search-btn">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="materials-grid">
        <!-- Materials Cards -->
        <?php if (!empty($materials ?? [])): ?>
          <?php foreach ($materials as $material): ?>
            <div class="material-card-new">
              <div class="material-card-header">
                <div class="material-file-name">
                  <i class="fas fa-file me-2"></i>
                  <?= esc(substr($material['file_name'], 0, 20)) ?><?= strlen($material['file_name']) > 20 ? '...' : '' ?>
                </div>
                <div class="material-status uploaded">Uploaded</div>
              </div>
              <div class="material-card-body">
                <div class="material-info">
                  <div class="info-item">
                    <span class="info-label">FILE NAME</span>
                    <span class="info-value" title="<?= esc($material['file_name']) ?>">
                      <?= esc(substr($material['file_name'], 0, 25)) ?><?= strlen($material['file_name']) > 25 ? '...' : '' ?>
                    </span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">UPLOAD DATE</span>
                    <span class="info-value">
                      <?php
                        echo date('M d, Y', strtotime($material['created_at'] ?? 'now'));
                      ?>
                    </span>
                  </div>
                  <div class="info-item">
                    <span class="info-label">FILE SIZE</span>
                    <span class="info-value">
                      <?php
                        $filePath = FCPATH . $material['file_path'];
                        if (file_exists($filePath)) {
                            $size = filesize($filePath);
                            if ($size < 1024) {
                                echo $size . ' bytes';
                            } elseif ($size < 1048576) {
                                echo round($size / 1024, 1) . ' KB';
                            } else {
                                echo round($size / 1048576, 1) . ' MB';
                            }
                        } else {
                            echo 'File not found';
                        }
                      ?>
                    </span>
                  </div>
                </div>
                <div class="material-card-actions">
                  <button class="btn-material primary">
                    <i class="fas fa-download"></i> Download
                  </button>
                  <button class="btn-material danger"
                          onclick="deleteMaterial(<?= esc($material['id']) ?>, '<?= esc($material['file_name']) ?>')">
                    <i class="fas fa-trash"></i> Delete
                  </button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="empty-state">
            <i class="fas fa-file-alt"></i>
            <h3>No Materials Yet</h3>
            <p>Start by uploading your first course material using the upload button above.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Alert Container -->
  <div id="alert-container"></div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fas fa-upload"></i>
          Upload New Material
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i>
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/course/' . $course['course_id'] . '/upload') ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <div class="mb-3">
            <label for="material_file" class="form-label">Select File to Upload *</label>
            <input type="file" class="form-control" id="material_file" name="material_file" required
                   accept=".pdf,.doc,.docx,.ppt,.pptx,.txt,.jpg,.jpeg,.png">
            <div class="form-text">
              Allowed file types: PDF, DOC, DOCX, PPT, PPTX, TXT, JPG, JPEG, PNG<br>
              Maximum file size: 10MB
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">
              <i class="fas fa-upload"></i>
              Upload Material
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function deleteMaterial(materialId, fileName) {
  if (!confirm(`Are you sure you want to delete "${fileName}"? This action cannot be undone.`)) {
    return;
  }

  // Create form and submit for deletion
  const form = document.createElement('form');
  form.method = 'POST';
  form.action = `<?= base_url('materials/delete/') ?>${materialId}`;

  const csrfField = document.createElement('input');
  csrfField.type = 'hidden';
  csrfField.name = '<?= csrf_token() ?>';
  csrfField.value = '<?= csrf_hash() ?>';

  form.appendChild(csrfField);
  document.body.appendChild(form);
  form.submit();
}

// Search functionality
document.getElementById('material-search-input')?.addEventListener('input', function() {
  const searchTerm = this.value.toLowerCase().trim();
  const materialCards = document.querySelectorAll('.material-card-new');

  materialCards.forEach(card => {
    const fileName = card.querySelector('.material-file-name')?.textContent.toLowerCase() || '';
    const isVisible = fileName.includes(searchTerm);
    card.style.display = isVisible ? '' : 'none';
  });
});

document.getElementById('search-btn')?.addEventListener('click', function() {
  const searchInput = document.getElementById('material-search-input');
  searchInput?.dispatchEvent(new Event('input'));
});
</script>

<?= $this->endSection() ?>
