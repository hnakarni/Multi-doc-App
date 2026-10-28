<?php 
include("frontend_header.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Admin_panel/vendor/autoload.php';


if(isset($_POST['submit'])){
    try{
        $name = $_POST['patientName']?$_POST['patientName']:"";
        $email = $_POST['patientEmail']?$_POST['patientEmail']:"";
        $Password = $_POST['patientPassword']?$_POST['patientPassword']:"";
        $RetypePassword = $_POST['patientRetypePassword']?$_POST['patientRetypePassword']:"";
        $agree_terms = $_POST['agree_terms']?? "";
        //Null coalesting operation 

        if($name==''){
            throw New Exception('Name is required');
        }

        if($email==''){
            throw New Exception('Email is required');
        }

        $existEmail = "select * from patients where `email`='$email'";
        $checkEmail = mysqli_query($con,$existEmail);
        $count = mysqli_num_rows($checkEmail);
        if($count>=1){
            throw new Exception("Email is already Exist! Try new Email");
        }

        if($Password ==''){
            throw new Exception("Password is required");
        }

        
        if($RetypePassword ==''){
            throw new Exception("Retype Password is required");
        }

        if($Password !== $RetypePassword){
            throw new Exception("Password and Retype Password not match!!");
        }

        if($agree_terms==''){
            throw new Exception("Please Tick Terms and Condition !!");
        }


        $patientId = "PAT".time().rand(100,999);
        $token = md5(uniqid());
        $hashPassword = password_hash($Password,PASSWORD_DEFAULT);

        $query = "insert into patients(`name`,`email`,`password`,`patientId`,`token`,`status`)values('$name','$email','$hashPassword','$patientId','$token','Pending')";
        $query_run = mysqli_query($con,$query);
        if($query_run){

            $mail = new PHPMailer(true);
            try {
            // SMTP Settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'piyush0101nakarani@gmail.com';
                $mail->Password   = 'xncpaoqphwonlllb'; // Gmail App Password
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                // Sender
                $mail->setFrom('piyush0101nakarani@gmail.com', 'RNW');

                // Receiver
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Your Verification Link is below:';
                $mail->Body    = "<a href='".ADMIN_URL."patient-verification.php?email=".$email."&token=".$token."'>Verification Link</a>";

                if($mail->send()){
                    $success_message = "Check Your Email for verification!!";
                }
                else{
                    $error_message = "Email not sent";
                }
            } 
            catch (Exception $e) {
                echo "Message could not be sent. Error: {$mail->ErrorInfo}";
            }
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

                Patient Register

            </div>

            <h1>Patient Registration</h1>

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

                <h2>Patient Register</h2>
                <p class="login-subtitle">
                    Sign Ups to your professional portal
                </p>

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
                        <label for="patientName">
                           name
                        </label>
                        <input type="text" id="PatientName" name="patientName" placeholder="Enter Name">
                    </div>

                    <div class="input-group">
                        <label for="doctorEmail">
                           Email
                        </label>
                        <input type="email" id="patientEmail" name="patientEmail" placeholder="patient@dokapp.com">
                    </div>

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

                    <div class="login-options">

                        <label class="remember">

                            <input type="checkbox" id="rememberDoctor" name="agree_terms" value="1">

                            Remember me

                        </label>

                        <a href="#">

                            Forgot password?

                        </a>

                    </div>

                    <button type="submit" class="doctor-login-btn" name="submit" value="submitData">

                        Register Patient →

                    </button>

                </form>

                <div class="login-footer">
                    <p>
                     Patient Login
                        <a href="patient-login.php">
                            Patient Login
                        </a>
                    </p>
                </div>
            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>