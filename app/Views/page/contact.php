<?= $this->extend('template') ?>

<?= $this->section('title') ?>Contact<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Contact Header -->
<div class="about-header text-center mb-5">
    <div class="about-badge mb-3">
        <span class="badge-text">
            <i class="fas fa-comments me-2"></i>Get In Touch
        </span>
    </div>
    <h1 class="about-title mb-3">
        Let's Start a <span class="gradient-text">Conversation</span>
    </h1>
    <p class="about-subtitle mx-auto">
        We'd love to hear from you! Questions, feedback, or just saying hello — reach out and we’ll get back promptly.
    </p>
</div>

<div class="row g-4">
    <!-- Contact Form -->
    <div class="col-lg-7">
        <div class="mission-card p-4">
            <h2 class="card-title mb-3">
                <i class="fas fa-paper-plane me-2"></i>Send us a Message
            </h2>
            <p class="card-text mb-4">Fill out the form below and we'll respond as soon as possible.</p>

            <form id="contactForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control-custom" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="lastName" placeholder="Last Name" class="form-control-custom" required>
                    </div>
                    <div class="col-12">
                        <input type="email" id="email" placeholder="Email Address" class="form-control-custom" required>
                    </div>
                    <div class="col-12">
                        <select id="subject" class="form-control-custom" required>
                            <option value="">Select a subject...</option>
                            <option value="general">General Inquiry</option>
                            <option value="support">Technical Support</option>
                            <option value="feedback">Feedback</option>
                            <option value="partnership">Partnership</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <textarea id="message" rows="5" placeholder="Your message..." class="form-control-custom" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-light-custom w-100">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Contact Info Sidebar -->
    <div class="col-lg-5">
        <div class="values-section">
            <div class="value-card mb-4">
                <div class="value-icon bg-primary-gradient"><i class="fas fa-map-marker-alt"></i></div>
                <h3 class="value-title">Visit Us</h3>
                <p class="value-text">
                    123 Business Street<br>
                    Tech City, TC 12345<br>
                    Philippines
                </p>
            </div>

            <div class="value-card mb-4">
                <div class="value-icon bg-success-gradient"><i class="fas fa-phone-alt"></i></div>
                <h3 class="value-title">Call Us</h3>
                <p class="value-text">
                    <a href="tel:+1234567890">+1 (234) 567-890</a><br>
                    Mon - Fri, 9AM - 6PM
                </p>
            </div>

            <div class="value-card mb-4">
                <div class="value-icon bg-info-gradient"><i class="fas fa-envelope"></i></div>
                <h3 class="value-title">Email Us</h3>
                <p class="value-text">
                    <a href="mailto:info@myci.com">info@myci.com</a><br>
                    <a href="mailto:support@myci.com">support@myci.com</a>
                </p>
            </div>

            <div class="value-card mb-4 text-center">
                <h3 class="value-title mb-3">Follow Us</h3>
                <div class="social-buttons justify-content-center">
                    <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-btn instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-btn linkedin"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-btn github"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="faq-section mt-5">
    <div class="text-center mb-4">
        <h2 class="faq-title"><i class="fas fa-question-circle me-2"></i>Frequently Asked Questions</h2>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="mission-card p-4 h-100">
                <h4 class="card-title mb-2"><i class="fas fa-clock me-2"></i>Business Hours</h4>
                <p class="card-text">Mon - Fri, 9:00 AM to 6:00 PM (PST). We usually respond within 24 hours.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mission-card p-4 h-100">
                <h4 class="card-title mb-2"><i class="fas fa-reply me-2"></i>Response Time</h4>
                <p class="card-text">Most inquiries receive a response within 24 hours during business days. Urgent matters are prioritized.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mission-card p-4 h-100">
                <h4 class="card-title mb-2"><i class="fas fa-headset me-2"></i>Phone Support</h4>
                <p class="card-text">Yes! Call our support team during business hours, or use email for non-urgent matters.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mission-card p-4 h-100">
                <h4 class="card-title mb-2"><i class="fas fa-globe me-2"></i>International Clients</h4>
                <p class="card-text">We work with clients worldwide and accommodate different time zones and communication preferences.</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Reuse About page styles */
    .gradient-text { background: linear-gradient(135deg,#667eea,#764ba2); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
    .mission-card, .value-card { background:white; border-radius:20px; box-shadow:0 4px 10px rgba(0,0,0,0.05); transition:all 0.3s; }
    .mission-card:hover, .value-card:hover { transform:translateY(-5px); box-shadow:0 10px 20px rgba(0,0,0,0.15); }
    .form-control-custom { width:100%; padding:0.875rem 1rem; border-radius:12px; border:1px solid #e2e8f0; background:#f8fafc; transition:0.3s; }
    .form-control-custom:focus { outline:none; border-color:#667eea; background:white; box-shadow:0 0 0 4px rgba(102,126,234,0.1);}
    .btn-light-custom { background:linear-gradient(135deg,#667eea,#764ba2); color:white; border-radius:50px; font-weight:600; padding:0.875rem 2rem; border:none; transition:0.3s; }
    .btn-light-custom:hover { transform:translateY(-2px); box-shadow:0 15px 25px rgba(102,126,234,0.4);}
    .value-icon { width:60px;height:60px; display:flex; align-items:center; justify-content:center; font-size:1.5rem; color:white; border-radius:16px; flex-shrink:0;}
    .bg-primary-gradient{background:linear-gradient(135deg,#667eea,#764ba2);}
    .bg-success-gradient{background:linear-gradient(135deg,#10b981,#059669);}
    .bg-info-gradient{background:linear-gradient(135deg,#06b6d4,#0891b2);}
    .value-title{font-weight:700; font-size:1.25rem; margin:0.5rem 0;}
    .value-text{color:#64748b; line-height:1.6;}
    .value-text a{color:#667eea; text-decoration:none; font-weight:600;}
    .value-text a:hover{color:#764ba2;}
    .social-buttons { display:flex; gap:0.75rem; flex-wrap:wrap; justify-content:center; margin-top:0.5rem;}
    .social-btn{width:50px;height:50px;border-radius:12px;display:flex;align-items:center;justify-content:center;color:white;font-size:1.25rem;transition:0.3s;}
    .social-btn:hover{transform:translateY(-4px);}
    .social-btn.facebook{background:#1877f2;}
    .social-btn.twitter{background:#1da1f2;}
    .social-btn.instagram{background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);}
    .social-btn.linkedin{background:#0077b5;}
    .social-btn.github{background:#333;}
    @media (max-width:768px){.mission-card, .value-card{text-align:center;}.social-buttons{justify-content:center;}}
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault();
    const firstName=document.getElementById('firstName').value;
    const lastName=document.getElementById('lastName').value;
    const email=document.getElementById('email').value;
    const subject=document.getElementById('subject').value;
    const message=document.getElementById('message').value;
    if(!firstName||!lastName||!email||!subject||!message){alert('Please fill in all fields');return;}
    alert('Thank you! We\'ll get back to you soon.');
    this.reset();
});
</script>
<?= $this->endSection() ?>
