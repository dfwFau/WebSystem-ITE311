<?= $this->extend('template') ?>

<?= $this->section('title') ?>Upload Materials - <?= esc($course['course_number']) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
.upload-section {
  background: #f8fafc;
  border-radius: 12px;
  padding: 2rem;
  margin-bottom: 2rem;
  border-left: 4px solid #73AF6F;
}

.upload-section h2 {
  color: #1e293b;
  font-weight: 700;
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.upload-section p {
  color: #64748b;
  margin-bottom: 1.5rem;
}

.upload-btn {
  background: #73AF6F;
  color: white;
  border: none;
  padding: 0.75rem 1.5rem;
  border-radius: 8px;
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  transition: all 0.2s ease;
}

.upload-btn:hover {
  background: #5a8f58;
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(115, 175, 111, 0.3);
}

.materials-section {
  background: white;
  border-radius: 12px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.materials-header {
  background: #f8fafc;
  padding: 1.5rem 2rem;
  border-bottom: 1px solid #e2e8f0;
}

.materials-title {
  font-size: 1.25rem;
  font-weight: 600;
  color: #1e293b;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.materials-count {
  background: #73AF6F;
  color: white;
  padding: 0.25rem 0.75rem;
  border-radius: 12px;
  font-size: 0.75rem;
  font-weight: 600;
}

.materials-body {
  padding: 2rem;
}

.material-item {
  display: flex;
  align-items: center;
  padding: 1rem 0;
  border-bottom: 1px solid #f1f5f9;
}

.material-item:last-child {
  border-bottom: none;
}

.material-icon {
  width: 40px;
  height: 40px;
  background: #dbeafe;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #3b82f6;
  margin-right: 1rem;
  flex-shrink: 0;
}

.material-info {
  flex: 1;
  min-width: 0;
}

.material-name {
  font-weight: 600;
  color: #1e293b;
  margin-bottom: 0.25rem;
}

.material-meta {
  color: #64748b;
  font-size: 0.875rem;
  display: flex;
  align-items: center;
  gap: 1rem;
}

.material-meta span {
  display: flex;
  align-items: center;
  gap: 0.25rem;
}

.material-actions {
  display: flex;
  gap: 0.5rem;
  flex-shrink: 0;
}

.btn-delete {
  background: #dc2626;
  color: white;
  border: none;
  padding: 0.375rem 0.75rem;
  border-radius: 6px;
  font-size: 0.875rem;
  display: inline-flex;
  align-items: center;
  gap: 0.25rem;
  text-decoration: none;
  transition: all 0.2s ease;
}

.btn-delete:hover {
  background: #b91c1c;
  transform: translateY(-1px);
}

.empty-state {
  text-align: center;
  padding: 3rem 2rem;
  color: #64748b;
}

.empty-icon {
  font-size: 3rem;
  color: #cbd5e1;
  margin-bottom: 1rem;
}

.empty-title {
  font-size: 1.25rem;
  font-weight: 600;
  color: #374151;
  margin-bottom: 0.5rem;
}

.empty-text {
  color: #9ca3af;
}

.alert {
  border-radius: 8px;
  border: none;
  padding: 1rem 1.5rem;
  margin-bottom: 1rem;
}

.alert-success {
  background: #d1fae5;
  color: #065f46;
  border-left: 4px solid #10b981;
}

.alert-danger {
  background: #fee2e2;
  color: #991b1b;
  border-left: 4px solid #dc2626;
}

@media (max-width: 768px) {
  .upload-section {
    padding: 1.5rem;
  }

  .upload-section h2 {
    font-size: 1.5rem;
  }

  .material-item {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }

  .material-meta {
    flex-wrap: wrap;
    gap: 0.5rem;
  }

  .materials-header,
  .materials-body {
    padding: 1rem;
  }
}
</style>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <h1 class="mb-4">Upload Materials</h1>
      <p class="text-muted mb-4">Manage course materials for <?= esc($course['course_number']) ?></p>
    </div>
  </div>

  <!-- Upload Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="upload-section">
        <h2>
          <i class="fas fa-cloud-upload-alt"></i>
          Upload New Material
        </h2>
        <p>Share course materials with your students. Supported formats: PDF, DOC, DOCX, PPT, PPTX, TXT, JPG, JPEG, PNG</p>
        <button type="button" class="upload-btn" data-bs-toggle="modal" data-bs-target="#uploadModal">
          <i class="fas fa-plus"></i>
          Upload Material
        </button>
      </div>
    </div>
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

  <!-- Materials List -->
  <div class="row">
    <div class="col-12">
      <div class="materials-section">
        <div class="materials-header">
          <h3 class="materials-title">
            <i class="fas fa-file-alt"></i>
            Uploaded Materials
            <span class="badge ms-2" style="background: #73AF6F; color: white;">
              <?= count($materials) ?>
            </span>
          </h3>
        </div>
        <div class="materials-body">
          <?php if (!empty($materials)): ?>
            <?php foreach ($materials as $material): ?>
              <div class="material-item">
                <div class="material-icon">
                  <i class="fas fa-file"></i>
                </div>
                <div class="material-info">
                  <div class="material-name">
                    <?= esc($material['file_name']) ?>
                  </div>
                  <div class="material-meta">
                    <span>
                      <i class="fas fa-calendar"></i>
                      <?= esc($material['created_at']) ?>
                    </span>
                    <span>
                      <i class="fas fa-weight"></i>
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
                <div class="material-actions">
                  <a href="<?= base_url('materials/delete/' . $material['id']) ?>"
                     class="btn-delete"
                     onclick="return confirm('Are you sure you want to delete this material?')">
                    <i class="fas fa-trash"></i>
                    Delete
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-state">
              <i class="fas fa-file-alt"></i>
              <h5>No Materials Yet</h5>
              <p>Start by uploading your first course material using the button above.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
