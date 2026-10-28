<?php 
include("frontend_header.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Admin_panel/vendor/autoload.php';

if(!isset($_GET['token'])){
    header('location:patient-login.php');
}


if(isset($_POST['submit'])){
    try{
        $Password = $_POST['patientPassword']?$_POST['patientPassword']:"";
        $RetypePassword = $_POST['patientRetypePassword']?$_POST['patientRetypePassword']:"";

        if($Password ==''){
            throw new Exception("Password is required");
        }

        if($RetypePassword ==''){
            throw new Exception("Retype Password is required");
        }

        if($Password !== $RetypePassword){
            throw new Exception("Password and Retype Password not match!!");
        }

        $token = $_GET['token'];
        $hashPassword = password_hash($Password,PASSWORD_DEFAULT);

        $query = "update patients set `password`='$hashPassword' where `token`='$token'";
        $query_run = mysqli_query($con,$query);
        if($query_run){
            header('location:patient-login.php');
        }   
        else{
            throw new Exception("Something wrong!! Query Problem");
        }

    }
    catch(Exception $e){
        $error_message = $e->getMessage();
    }
   
}


 ?>
<!-- DOCTOR LOGIN -->
<section id="doctor-login">

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">

                <a href="#" class="nav-link" data-page="home">Home</a>

                <span>›</span>

                Patient New Password

            </div>

            <h1>Patient New Password</h1>

            <p>
                Sign Up to your professional portal.
            </p>

        </div>

    </section>

    <section class="login-section">

        <div class="container">

            <div class="login-card">
                <div class="login-icon">
                    👨‍⚕️
                </div>

                <h2>Patient New Password</h2>

                <?php if(isset($error_message)) { ?>
                    <button class="doctor-login-btn" style="background-color:black;color:red">
                            <?php echo $error_message; ?>
                    </button>
                <?php } ?>

                <?php if(isset($success_message)) { ?>
                    <button class="doctor-login-btn" style="background-color:gray;color:white">
                            <?php echo $success_message; ?>
                    </button>
                <?php } ?>

                <form id="doctorLoginForm" method="post">


                    <div class="input-group">
                        <label for="patientPassword">
                            Password
                        </label>
                        <div class="password-box">
                            <input type="password" id="patientPassword" name="patientPassword" placeholder="••••••••" >
                            <span id="toggleDoctorPassword" class="toggle-password">👁</span>
                        </div>
                    </div>

                     <div class="input-group">
                        <label for="doctorPassword">
                            Retrype Password
                        </label>
                        <div class="password-box">
                            <input type="password" id="patientPassword" name="patientRetypePassword" placeholder="••••••••" >
                            <span id="toggleDoctorPassword" class="toggle-password">👁</span>
                        </div>
                    </div>


                    <button type="submit" class="doctor-login-btn" name="submit" value="submitData">

                         Patient New Password →

                    </button>

                </form>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>