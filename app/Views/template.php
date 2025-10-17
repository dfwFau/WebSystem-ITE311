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

                <!-- Unified Dashboard link for all roles -->
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
                        <a class="nav-link" href="<?= base_url('/announcements') ?>">Announcements</a>
                    </li>
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
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
  <!-- Custom JavaScript for enrollment functionality -->
  <script>
  $(document).ready(function() {
      // Handle enrollment button clicks
      $(document).on('click', '.enroll-btn', function(e) {
          e.preventDefault();
          
          const button = $(this);
          const courseId = button.data('course-id');
          const courseName = button.data('course-name');
          
          // Disable button to prevent multiple clicks
          button.prop('disabled', true).text('Enrolling...');
          
          // Send AJAX request
          $.post('<?= base_url('/course/enroll') ?>', {
              course_id: courseId
          })
          .done(function(response) {
              if (response.success) {
                  // Show success message
                  showAlert('success', response.message);
                  
                  // Hide the enrolled course card
                  button.closest('.col-md-6, .col-lg-4').fadeOut(500, function() {
                      $(this).remove();
                      
                      // Check if no more available courses
                      if ($('.enroll-btn').length === 0) {
                          $('.row:has(.enroll-btn)').html(`
                              <div class="col-12">
                                  <div class="alert alert-warning">
                                      <h6 class="alert-heading">No Available Courses</h6>
                                      <p class="mb-0">You are enrolled in all available courses! Great job!</p>
                                  </div>
                              </div>
                          `);
                      }
                  });
                  
                  // Add to enrolled courses section
                  addToEnrolledCourses(response.course);
                  
              } else {
                  // Show error message
                  showAlert('danger', response.message);
                  
                  // Re-enable button
                  button.prop('disabled', false).text('Enroll');
              }
          })
          .fail(function() {
              // Show error message
              showAlert('danger', 'An error occurred. Please try again.');
              
              // Re-enable button
              button.prop('disabled', false).text('Enroll');
          });
      });
      
      // Handle unenroll button clicks
      $(document).on('click', '.unenroll-btn', function(e) {
          e.preventDefault();
          
          const button = $(this);
          const courseId = button.data('course-id');
          const courseName = button.data('course-name');
          
          // Confirm unenrollment
          if (!confirm(`Are you sure you want to unenroll from "${courseName}"?`)) {
              return;
          }
          
          // Disable button to prevent multiple clicks
          button.prop('disabled', true).text('Unenrolling...');
          
          // Send AJAX request
          $.post('<?= base_url('/course/unenroll') ?>', {
              course_id: courseId
          })
          .done(function(response) {
              if (response.success) {
                  // Show success message
                  showAlert('success', response.message);
                  
                  // Hide the enrolled course card
                  button.closest('.col-md-6, .col-lg-4').fadeOut(500, function() {
                      $(this).remove();
                      
                      // Check if no more enrolled courses
                      if ($('.unenroll-btn').length === 0) {
                          $('.row:has(.unenroll-btn)').html(`
                              <div class="col-12">
                                  <div class="alert alert-info">
                                      <h6 class="alert-heading">No Enrolled Courses</h6>
                                      <p class="mb-0">You haven't enrolled in any courses yet. Browse available courses below to get started!</p>
                                  </div>
                              </div>
                          `);
                      }
                  });
                  
                  // Add to available courses section
                  addToAvailableCourses(response.course_id);
                  
              } else {
                  // Show error message
                  showAlert('danger', response.message);
                  
                  // Re-enable button
                  button.prop('disabled', false).text('Unenroll');
              }
          })
          .fail(function() {
              // Show error message
              showAlert('danger', 'An error occurred. Please try again.');
              
              // Re-enable button
              button.prop('disabled', false).text('Unenroll');
          });
      });
      
      // Function to show alert messages
      function showAlert(type, message) {
          const alertHtml = `
              <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                  ${message}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          `;
          
          // Remove existing alerts
          $('.alert').remove();
          
          // Add new alert at the top of the container
          $('.container').prepend(alertHtml);
          
          // Auto-dismiss after 5 seconds
          setTimeout(function() {
              $('.alert').fadeOut();
          }, 5000);
      }
      
      // Function to add course to enrolled courses section
      function addToEnrolledCourses(course) {
          const enrolledSection = $('h4:contains("My Enrolled Courses")').closest('.row').next('.row');
          
          // Check if this is the first enrollment
          if (enrolledSection.find('.alert-info').length > 0) {
              enrolledSection.html('');
          }
          
          const courseCard = `
              <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                      <div class="card-body">
                          <h6 class="card-title text-primary">${course.name}</h6>
                          <p class="card-text small text-muted">${course.code}</p>
                          <p class="card-text small">${course.description || ''}</p>
                          <div class="d-flex justify-content-between align-items-center">
                              <small class="text-muted">
                                  Enrolled: ${new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}
                              </small>
                              <button class="btn btn-sm btn-outline-danger unenroll-btn" 
                                      data-course-id="${course.id}"
                                      data-course-name="${course.name}">
                                  Unenroll
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          `;
          
          enrolledSection.append(courseCard);
      }
      
      // Function to add course to available courses section
      function addToAvailableCourses(courseId) {
          // This would require fetching course details from the server
          // For now, we'll just refresh the page
          setTimeout(function() {
              location.reload();
          }, 1000);
      }
  });
  </script>
</body>
</html>
