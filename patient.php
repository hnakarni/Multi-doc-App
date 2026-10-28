<?php include("frontend_header.php"); ?>

<!-- PATIENT LOGIN -->
<section id="patient">

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">
                <a href="#" class="nav-link" data-page="home">Home</a>
                <span>›</span>
                Patient Login
            </div>

            <h1>Patient Login</h1>

            <p>
                Access your personal health dashboard.
            </p>

        </div>

    </section>

    <div class="container">

        <section class="login-section">

            <div class="container">

                <div class="login-card">

                    <!-- Icon -->

                    <div class="login-icon">

                        👨‍⚕️

                    </div>

                    <!-- Heading -->

                    <h2>Welcome Back</h2>

                    <p class="login-subtitle">

                        Sign in to your patient account

                    </p>


                    <!-- Login Form -->

                    <form id="patientLoginForm">

                        <!-- Email -->

                        <div class="input-group">

                            <label for="patientEmail">

                                Email Address

                            </label>

                            <input type="email" id="patientEmail" placeholder="patient@email.com" required>

                        </div>


                        <!-- Password -->

                        <div class="input-group">

                            <label for="patientPassword">

                                Password

                            </label>

                            <div class="password-box">

                                <input type="password" id="patientPassword" placeholder="••••••••" required>

                                <span class="toggle-password" id="togglePatientPassword">

                                    👁

                                </span>

                            </div>

                        </div>


                        <!-- Remember -->

                        <div class="login-options">

                            <label class="remember">

                                <input type="checkbox" id="rememberPatient">

                                Remember Me

                            </label>

                            <a href="#">

                                Forgot Password?

                            </a>

                        </div>


                        <!-- Login -->

                        <button type="submit" class="login-btn">

                            Login to Dashboard

                        </button>

                    </form>


                    <!-- Register -->

                    <div class="login-footer">

                        <p>

                            New here?

                            <a href="#">

                                Create an Account

                            </a>

                        </p>

                    </div>


                    <!-- Divider -->

                    <div class="login-divider">

                        <span>

                            Are you a doctor?

                        </span>

                    </div>


                    <!-- Doctor Login -->

                    <button class="doctor-switch-btn nav-link" data-page="doctor-login">

                        Doctor Login →

                    </button>

                </div>

            </div>

        </section>

    </div>

</section>
<?php include("frontend_footer.php"); ?>