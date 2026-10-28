<?php include("frontend_header.php"); ?>
<!-- CONTACT PAGE -->
<section id="contact">

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">
                <a href="#" class="nav-link" data-page="home">Home</a>
                <span>›</span>
                Contact
            </div>

            <h1>Contact Us</h1>

            <p>
                Have questions? We'd love to hear from you.
                Our team is available 24/7 to help you.
            </p>

        </div>

    </section>

    <section class="contact-section">

        <div class="container">

            <div class="contact-grid">

                <!-- Left Side -->

                <div class="contact-info">

                    <h2>Get In Touch</h2>

                    <p class="contact-text">
                        Have questions about appointments,
                        doctors, or our services?
                        Our healthcare team is here to assist
                        you anytime.
                    </p>

                    <div class="info-item">

                        <div class="icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div>

                            <h4>Address</h4>

                            <p>
                                123 Medical Street,
                                New York,
                                USA 10001
                            </p>

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div>

                            <h4>Phone</h4>

                            <p>+1 (555) 123-4567</p>

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div>

                            <h4>Email</h4>

                            <p>info@dokapp.com</p>

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>

                        <div>

                            <h4>Working Hours</h4>

                            <p>Mon – Fri : 8:00 AM – 8:00 PM</p>

                            <p>Sat – Sun : 9:00 AM – 5:00 PM</p>

                        </div>

                    </div>

                    <!-- Emergency Card -->

                    <div class="emergency-box">

                        <span class="emergency-title">

                            🚑 Emergency Hotline

                        </span>

                        <p>
                            For medical emergencies available
                            24 hours a day, 7 days a week.
                        </p>

                        <h2>1-800-DOK-HELP</h2>

                    </div>

                </div>

                <!-- Right Side -->

                <div class="contact-form">

                    <h2>Send a Message</h2>

                    <form id="contactForm">

                        <div class="row">

                            <div class="input-group">

                                <label>First Name</label>

                                <input type="text" id="firstName" placeholder="John" required>

                            </div>

                            <div class="input-group">

                                <label>Last Name</label>

                                <input type="text" id="lastName" placeholder="Doe" required>

                            </div>

                        </div>

                        <div class="input-group">

                            <label>Email Address</label>

                            <input type="email" id="email" placeholder="john@email.com" required>

                        </div>

                        <div class="input-group">

                            <label>Phone Number</label>

                            <input type="tel" id="phone" placeholder="+1 (555) 000-0000" required>

                        </div>

                        <div class="input-group">

                            <label>Subject</label>

                            <select id="subject">

                                <option>General Inquiry</option>

                                <option>Appointment</option>

                                <option>Doctor Information</option>

                                <option>Emergency</option>

                                <option>Complaint</option>

                            </select>

                        </div>

                        <div class="input-group">

                            <label>Message</label>

                            <textarea rows="6" id="message" placeholder="How can we help you?" required></textarea>

                        </div>

                        <button type="submit" class="btn-main">

                            Send Message
                            <i class="fa-solid fa-arrow-right"></i>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>