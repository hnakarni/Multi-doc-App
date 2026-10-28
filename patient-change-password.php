<?php include("frontend_header.php"); 

if(empty($_SESSION['patientData'])){ 
   header('location:patient-login.php'); 

} 


if(isset($_POST['submit'])){
    try{
        $encryptPassword = $_SESSION['patientData']['password'];
        $cpass = isset($_POST['cpass'])?$_POST['cpass']:"";
        $npass = isset($_POST['npass'])?$_POST['npass']:"";
        $confirmPass = isset($_POST['confirmPassword'])?$_POST['confirmPassword']:"";

        if(password_verify($cpass,$encryptPassword)){
            if($cpass !== $npass){
                if($npass == $confirmPass){
                    $hashPassword = password_hash($npass,PASSWORD_DEFAULT);
                    $patId = $_SESSION['patientData']['id'];
                    $query = "update patients set `password`='$hashPassword' where `id`='$patId'";
                    $query1 = mysqli_query($con,$query);
                    if($query1){
                        header("location:patient-logout.php");
                    }
                    else{
                        throw new Exception("Something wrong!!");
                    }
                }
                else{
                    throw new Exception("new and confirm are not match!!");
                }
            }
            else{
                throw new Exception("Current and new password match!!");
            }
        }   
        else{
            throw new Exception("Current password not match!!");
        }
    }
    catch(Exception $e){
        $error_message = $e->getMessage();
    }
}
?>

<!--=========================================
            PATIENT PROFILE PAGE
==========================================-->

<section class="patient-profile-main">

    <!--=====================================
            PAGE BANNER
    ======================================-->

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">

                <a href="#" class="nav-link" data-page="home">

                    Home

                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="patient-dashboard">

                    Patient Dashboard

                </a>

                <span>›</span>

                <span>

                    My Profile

                </span>

            </div>

            <h1>

                My Profile

            </h1>

            <p>

                Manage your personal information and account settings.

            </p>

        </div>

    </section>


    <!--=====================================
            PROFILE SECTION
    ======================================-->

    <section class="patient-profile-section">

        <div class="container">

            <?php if(isset($error_message)){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <div class="patient-profile-layout">


                <!--=====================================
                        SIDEBAR
                ======================================-->

             <?php include('patient-aside.php'); ?>

                <!--=====================================
                        CONTENT
                ======================================-->

                <div class="patient-profile-content">

                    <div class="patient-profile-header">

                        <h2>

                            Personal Information

                        </h2>

                        <p>

                            Keep your profile updated for better healthcare services.

                        </p>

                    </div>


                    <!-- Profile Form -->

                    

                    <form id="patientProfileForm" class="patient-profile-form" method="post">

            

                        <div class="patient-profile-password-card">

                            <h3>

                                <i class="fa-solid fa-lock"></i>

                                Change Password

                            </h3>

                            <div class="patient-profile-grid">

                                <!-- Current Password -->

                                <div class="patient-profile-group">

                                    <label>

                                        Current Password

                                    </label>

                                    <input type="password" name="cpass" id="patientProfileCurrentPassword"
                                        placeholder="Enter Current Password">

                                </div>

                                <!-- New Password -->

                                <div class="patient-profile-group">

                                    <label>

                                        New Password

                                    </label>

                                    <input type="password" name="npass" id="patientProfileNewPassword"
                                        placeholder="Enter New Password">

                                </div>

                                <!-- Confirm Password -->

                                <div class="patient-profile-group">

                                    <label>

                                        Confirm Password

                                    </label>

                                    <input type="password" name="confirmPassword" id="patientProfileConfirmPassword"
                                        placeholder="Confirm New Password">

                                </div>

                            </div>

                        </div>


                        <!--=====================================
        ACTION BUTTONS
======================================-->

                        <div class="patient-profile-actions">

                            <button type="submit" class="patient-profile-save-btn" name="submit" value="submit">

                                <i class="fa-solid fa-floppy-disk"></i>

                                Save Changes

                            </button>

                            <button type="reset" class="patient-profile-reset-btn">

                                <i class="fa-solid fa-rotate-left"></i>

                                Reset

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>