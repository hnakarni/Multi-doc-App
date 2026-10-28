<?php include("frontend_header.php"); 

if(isset($_SESSION['patientData'])){ 
   header('location:patient-dashboard.php'); 

} 

if(isset($_POST['PatientLogin'])){
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
        $count = mysqli_num_rows($que);
        if($count==1){
            $data = mysqli_fetch_array($que);
            
            if(!password_verify($_POST['patientPassword'],$data['password'])){
                throw new Exception("Invalid Password!!");
            }
            else{
                $_SESSION['patientData'] = $data;
                header("location:patient-dashboard.php");
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

                Patient Login

            </div>

            <h1>Patient Login</h1>

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

                <h2>Patient Login</h2>
                <p class="login-subtitle">
                    Sign in to your professional portal
                </p>

                 <?php if(isset($error_message)) { ?>
                    <button class="doctor-login-btn" style="background-color:black;color:red">
                            <?php echo $error_message; ?>
                    </button>
                <?php } ?>



                <form id="doctorLoginForm" method="post">
                    <div class="input-group">
                        <label for="doctorEmail">
                           Email
                        </label>
                        <input type="email" id="patientEmail" name="patientEmail" placeholder="patient@dokapp.com" required>
                    </div>

                    <div class="input-group">

                        <label for="doctorPassword">

                            Password

                        </label>

                        <div class="password-box">

                            <input type="password" id="patientPassword" name="patientPassword" placeholder="••••••••" required>

                            <span id="toggleDoctorPassword" class="toggle-password">

                                👁

                            </span>

                        </div>

                    </div>

                    <div class="login-options">

                        <label class="remember">

                            <input type="checkbox" id="rememberDoctor">

                            Remember me

                        </label>

                        <a href="patient-forget-password.php">

                            Forgot password?

                        </a>

                    </div>

                    <button type="submit" class="doctor-login-btn" name="PatientLogin" value="PatientLogin">

                        Login to Portal →

                    </button>

                </form>

                <div class="login-footer">
                    <p>
                        Register Patient
                        <a href="patient-register.php">
                            Goto Register Page
                        </a>
                    </p>
                </div>


                <div class="login-divider">
                    <span>
                        Are you a Doctor?
                    </span>
                </div>


                <!-- Patient Login Button -->

               <a href="doctor-login.php"> 
                <button type="button" class="patient-switch-btn">
                    Doctor Login →
                </button>
                </a>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>