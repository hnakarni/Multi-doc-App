<?php 

include("Admin_panel/dbconfig.php");
$current_page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
 date_default_timezone_set('Asia/Kolkata');

 require_once "vendor/autoload.php"; 
 include("config/config_paypal.php");
 include("config/config_stripe.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CarePlus Hospital</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
    <!-- Main CSS -->
    <link rel="stylesheet" href="frontend_dist/css/department-details.css">
    <link rel="stylesheet" href="frontend_dist/css/search-doctors.css">
    <link rel="stylesheet" href="frontend_dist/css/doctor-details.css">
    <link rel="stylesheet" href="frontend_dist/css/doctor-dashboard.css">
    <link rel="stylesheet" href="frontend_dist/css/doctor-profile.css">
    <link rel="stylesheet" href="frontend_dist/css/today-appointments.css">
    <link rel="stylesheet" href="frontend_dist/css/setup-schedule.css">
    <link rel="stylesheet" href="frontend_dist/css/add-leave.css">
    <link rel="stylesheet" href="frontend_dist/css/treatment.css">
    <link rel="stylesheet" href="frontend_dist/css/doctor-withdrawal.css">
    <link rel="stylesheet" href="frontend_dist/css/make-appointment.css">
    <link rel="stylesheet" href="frontend_dist/css/patient-description.css">
    <link rel="stylesheet" href="frontend_dist/css/patient-dashboard.css">
    <link rel="stylesheet" href="frontend_dist/css/patient-profile.css">
    <link rel="stylesheet" href="frontend_dist/css/patient-appointment-details.css">


    <link rel="stylesheet" href="frontend_dist/css/style.css">
    <!-- Media Query -->
    <link rel="stylesheet" href="frontend_dist/css/media.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
</head>

<body>

    <header>

        <div class="top-header">

            <div class="container top-row">

                <div></div>

                <div class="top-btns">

                <?php if(isset($_SESSION['patientData'])){ ?>
                    <a href="patient-dashboard.php" class="patient-btn" data-page="patient">
                        Patient Dashboard
                    </a>
                <?php } else { ?>
                    <a href="patient-login.php" class="patient-btn" data-page="patient">
                        Patient Login
                    </a>

                    <a href="doctor-login.php" class="doctor-btn" data-page="doctor-login">
                        Doctor Login
                    </a>
                <?php } ?>

                    

                </div>

            </div>

        </div>

        <div class="main-header">

            <div class="container nav-grid">

                <div class="logo">

                    <a href="#" class="nav-link" data-page="home">

                        <img src="frontend_dist/images/logo.png" alt="DokApp Logo">

                    </a>

                </div>

                <div class="menu-toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <nav>

                    <ul>

                        <li>
                            <a href="index.php"  data-page="home"> Home </a>
                        </li>

                        <li>
                            <a href="doctors.php" > Doctors </a>
                        </li>

                        <li>
                            <a href="departments.php"  data-page="departments"> Departments </a>
                        </li>

                        <li>
                            <a href="contact.php"  data-page="contact"> Contact </a>
                        </li>

                    </ul>

                </nav>

                <div class="right-side">

                    <a href="appointment.php" class="appointment" data-page="appointment"> Make Appointment </a>

                </div>

            </div>

        </div>

    </header>