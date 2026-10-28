<?php include("frontend_header.php"); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Admin_panel/vendor/autoload.php';

if(isset($_POST['PatientForget'])){
    try{
        $email = $_POST['patientEmail'];
        if(empty($email)){
            throw new Exception("Email is Blank!!");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
        $query = "select * from patients where `email`='$email' AND `status`='Active'";
        $que = mysqli_query($con,$query);
        $PatientData = mysqli_fetch_array($que);
        $count = mysqli_num_rows($que);
        if($count==1){
            $mail = new PHPMailer(true);
            $token = $PatientData['token'];
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
                $mail->Subject = 'Patient Forget Password Link:';
                $mail->Body    = "<a href='".ADMIN_URL."patient-update-password.php?email=".$email."&token=".$token."'>Verification Link</a>";

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
            throw new Exception("Invalid email Address!!");
        }
    }
    catch(Exception $e){
          $error_message= $e->getMessage();    
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

                Patient Forget Password

            </div>

            <h1>Patient Forget Password</h1>

            <p>
                Sign in to your professional portal.
            </p>

        </div>

    </section>

    <section class="login-section">

        <div class="container">

            <div class="login-card">
                <div class="login-icon">
                    👨‍⚕️
                </div>

                <h2>Forget Password</h2>
                <p class="login-subtitle">
                    Sign in to your professional portal
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
                        <label for="doctorEmail">
                           Email
                        </label>
                        <input type="email" id="patientEmail" name="patientEmail" placeholder="patient@dokapp.com" required>
                    </div>

                    <button type="submit" class="doctor-login-btn" name="PatientForget" value="PatientForget">

                        Forget Password →

                    </button>

                </form>


                <div class="login-divider">
                    <span>
                        Patient Login Page?
                    </span>
                </div>


                <!-- Patient Login Button -->

               <a href="Patient-login.php"> 
                <button type="button" class="patient-switch-btn">
                    Patient Login →
                </button>
                </a>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>