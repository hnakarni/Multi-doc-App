<?php include("frontend_header.php");

if(empty($_SESSION['patientData'])){ 
   header('location:patient-login.php'); 
} 

?>
<!--=========================================
            PATIENT DASHBOARD
==========================================-->

<section class="patient-dashboard-page">

    <!--================ Banner ================-->

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">

                <a href="#" class="nav-link" data-page="home">

                    Home

                </a>

                <span>›</span>

                <span>

                    Patient Dashboard

                </span>

            </div>

            <h1>

                Patient Dashboard

            </h1>

            <p>

                Manage your appointments, prescriptions and profile.

            </p>

        </div>

    </section>


    <!--================ Dashboard ================-->

    <section class="patient-dashboard">

        <div class="container">

            <div class="patient-dashboard-wrapper">


                <!--================ Sidebar ================-->

               <?php include('patient-aside.php'); ?>


                <!--================ Content ================-->

                <div class="patient-dashboard-content">


                    <!-- Welcome -->

                    <div class="patient-welcome">

                        <div>

                            <h2>

                                Welcome Back,

                                <span id="patientWelcomeName">

                                    John Doe

                                </span>

                            </h2>

                            <p>

                                Here's a quick overview of your healthcare activities.

                            </p>

                        </div>

                    </div>


                    <!-- Dashboard Cards -->

                    <div class="patient-dashboard-cards">

                        <!--=========================================
        DASHBOARD STATISTICS
==========================================-->

                        <div class="dashboard-card">

                            <div class="dashboard-card-icon">

                                <i class="fa-solid fa-calendar-check"></i>

                            </div>

                            <div>

                                <h3 id="patientTotalAppointments">

                                    12

                                </h3>

                                <p>

                                    Total Appointments

                                </p>

                            </div>

                        </div>


                        <div class="dashboard-card">

                            <div class="dashboard-card-icon">

                                <i class="fa-solid fa-calendar-day"></i>

                            </div>

                            <div>

                                <h3 id="patientUpcomingAppointments">

                                    3

                                </h3>

                                <p>

                                    Upcoming Appointments

                                </p>

                            </div>

                        </div>


                        <div class="dashboard-card">

                            <div class="dashboard-card-icon">

                                <i class="fa-solid fa-file-prescription"></i>

                            </div>

                            <div>

                                <h3 id="patientPrescriptionCount">

                                    8

                                </h3>

                                <p>

                                    Prescriptions

                                </p>

                            </div>

                        </div>


                        <div class="dashboard-card">

                            <div class="dashboard-card-icon">

                                <i class="fa-solid fa-user-doctor"></i>

                            </div>

                            <div>

                                <h3 id="patientDoctorsVisited">

                                    5

                                </h3>

                                <p>

                                    Doctors Visited

                                </p>

                            </div>

                        </div>

                    </div>


                    <!--=========================================
        UPCOMING APPOINTMENTS
==========================================-->

                    <div class="dashboard-section">

                        <div class="dashboard-section-header">

                            <h3>

                                <i class="fa-solid fa-calendar-days"></i>

                                Upcoming Appointments

                            </h3>

                            <a href="#" class="nav-link" data-page="patient-appointment-details">

                                View All →

                            </a>

                        </div>


                        <div class="table-responsive">

                            <table class="dashboard-table">

                                <thead>

                                    <tr>

                                        <th>Doctor</th>

                                        <th>Department</th>

                                        <th>Date</th>

                                        <th>Time</th>

                                        <th>Status</th>

                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody id="patientAppointmentTable">

                                    <tr>

                                        <td>Dr. John Smith</td>

                                        <td>Cardiology</td>

                                        <td>25 Jul 2026</td>

                                        <td>10:00 AM</td>

                                        <td>

                                            <span class="status pending">

                                                Upcoming

                                            </span>

                                        </td>

                                        <td>

                                            <a href="#" class="nav-link dashboard-btn"
                                                data-page="patient-appointment-details">

                                                View

                                            </a>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>


                    <!--=========================================
        QUICK ACTIONS
==========================================-->

                    <div class="dashboard-actions">

                        <a href="#" class="nav-link action-card" data-page="make-appointment">

                            <i class="fa-solid fa-calendar-plus"></i>

                            <h4>

                                Book Appointment

                            </h4>

                            <p>

                                Schedule a new appointment.

                            </p>

                        </a>


                        <a href="#" class="nav-link action-card" data-page="patient-profile">

                            <i class="fa-solid fa-user-pen"></i>

                            <h4>

                                Update Profile

                            </h4>

                            <p>

                                Edit your profile details.

                            </p>

                        </a>


                        <a href="#" class="nav-link action-card" data-page="patient-description">

                            <i class="fa-solid fa-file-prescription"></i>

                            <h4>

                                View Prescription

                            </h4>

                            <p>

                                See your latest prescription.

                            </p>

                        </a>


                    </div>


                    <!--=========================================
        BOTTOM SECTION
==========================================-->

                    <div class="dashboard-bottom">


                        <!--=========================================
            LATEST PRESCRIPTION
    ==========================================-->

                        <div class="dashboard-section">

                            <div class="dashboard-section-header">

                                <h3>

                                    <i class="fa-solid fa-file-prescription"></i>

                                    Latest Prescription

                                </h3>

                            </div>

                            <div class="latest-prescription">

                                <h4 id="latestDoctor">

                                    Dr. John Smith

                                </h4>

                                <p>

                                    <strong>Department :</strong>

                                    <span id="latestDepartment">

                                        Cardiology

                                    </span>

                                </p>

                                <p>

                                    <strong>Date :</strong>

                                    <span id="latestPrescriptionDate">

                                        25 Jul 2026

                                    </span>

                                </p>

                                <p>

                                    <strong>Diagnosis :</strong>

                                    <span id="latestDiagnosis">

                                        Blood Pressure

                                    </span>

                                </p>

                                <a href="#" class="nav-link prescription-btn" data-page="patient-description">

                                    View Prescription →

                                </a>

                            </div>

                        </div>


                        <!--=========================================
            NOTIFICATIONS
    ==========================================-->

                        <div class="dashboard-section">

                            <div class="dashboard-section-header">

                                <h3>

                                    <i class="fa-solid fa-bell"></i>

                                    Notifications

                                </h3>

                            </div>

                            <div class="notification-list">

                                <div class="notification-item">

                                    <i class="fa-solid fa-circle-check"></i>

                                    <div>

                                        <strong>

                                            Appointment Confirmed

                                        </strong>

                                        <p>

                                            Your appointment with
                                            Dr. John Smith
                                            has been confirmed.

                                        </p>

                                    </div>

                                </div>

                                <div class="notification-item">

                                    <i class="fa-solid fa-file-medical"></i>

                                    <div>

                                        <strong>

                                            Prescription Ready

                                        </strong>

                                        <p>

                                            Your latest prescription is available.

                                        </p>

                                    </div>

                                </div>

                                <div class="notification-item">

                                    <i class="fa-solid fa-calendar-day"></i>

                                    <div>

                                        <strong>

                                            Upcoming Appointment

                                        </strong>

                                        <p>

                                            Tomorrow at 10:00 AM.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>