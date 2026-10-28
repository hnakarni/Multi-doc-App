<?php include("frontend_header.php"); 

if(empty($_SESSION['patientData'])){ 
   header('location:patient-login.php'); 
} 





if(isset($_POST['submit'])){
   
    try{
        $name= isset($_POST['patientName'])?$_POST['patientName']:"";
        $email= isset($_POST['patientEmail'])?$_POST['patientEmail']:"";
        $phone= isset($_POST['patientPhone'])?$_POST['patientPhone']:"";
        $gender= isset($_POST['patientGender'])?$_POST['patientGender']:"";
        $dob= isset($_POST['patientDOB'])?$_POST['patientDOB']:"";
        $bloodGroup= isset($_POST['patientBloodGroup'])?$_POST['patientBloodGroup']:"";
        $state= isset($_POST['patientState'])?$_POST['patientState']:"";
        $city= isset($_POST['patientCity'])?$_POST['patientCity']:"";
        $zip= isset($_POST['patientZip'])?$_POST['patientZip']:"";
        $profilePic= isset($_FILES['patientProfilePic'])?$_FILES['patientProfilePic']['name']:"";
        
        $uniqueId = $_SESSION['patientData']['id'];
        $qu = "select * from patients where `id`='$uniqueId'";
        $qu1 = mysqli_query($con,$qu);
        $data  = mysqli_fetch_array($qu1);
        if($profilePic==''){
            $profilePic = $data['profilePic'];
        }

        move_uploaded_file($_FILES['patientProfilePic']['tmp_name'],"frontend_dist/images/patients/".$profilePic);

        $query = "update patients set `name`='$name',`email`='$email',`phone`='$phone',`gender`='$gender',`dob`='$dob',`blood_group`='$bloodGroup',`state`='$state',`city`='$city',`zip`='$zip',`profilePic`='$profilePic' where `id`='$uniqueId'";
        $queryRun=mysqli_query($con,$query);
        if($queryRun){

            $qu = "select * from patients where `id`='$uniqueId'";
            $qu1 = mysqli_query($con,$qu);
            $data  = mysqli_fetch_array($qu1);
            $_SESSION['patientData'] = $data;
            $success_message = "Patient Profile Updated Successfully";
        }
        else{
            throw new Exception("Something wrong in Query!!");
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

            <?php if(isset($success_message)){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success_message; ?>
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

                    <form id="patientProfileForm" class="patient-profile-form" method="post" enctype="multipart/form-data">

                        <!--=====================================
        PROFILE IMAGE
======================================-->

                        <div class="patient-profile-image-section">

                            <img id="patientProfilePreview" src="frontend_dist/images/patients/<?php echo @$_SESSION['patientData']['profilePic']; ?>" alt="Patient">

                            <label for="patientProfileUpload" class="patient-profile-upload-btn">

                                <i class="fa-solid fa-camera"></i>

                                Change Photo

                            </label>

                            <input type="file" name="patientProfilePic" id="patientProfileUpload" accept="image/*" hidden>

                        </div>


                        <!--=====================================
        FORM GRID
======================================-->

                        <div class="patient-profile-grid">

                            <!-- Full Name -->

                            <div class="patient-profile-group">

                                <label>

                                    Full Name

                                </label>

                                <input type="text" name="patientName" id="patientProfileName" placeholder="Enter Full Name" value="<?php echo $_SESSION['patientData']['name']; ?>">

                            </div>


                            <!-- Email -->

                            <div class="patient-profile-group">

                                <label>

                                    Email Address

                                </label>

                                <input type="email" name="patientEmail" id="patientProfileEmail" placeholder="Enter Email Address" value="<?php echo $_SESSION['patientData']['email']; ?>">

                            </div>


                            <!-- Phone -->

                            <div class="patient-profile-group">

                                <label>

                                    Phone Number

                                </label>

                                <input type="text" name="patientPhone" id="patientProfilePhone" placeholder="Enter Phone Number" value="<?php echo @$_SESSION['patientData']['phone']; ?>">

                            </div>


                            <!-- Gender -->

                            <div class="patient-profile-group">

                                <label>

                                    Gender

                                </label>

                                <select id="patientProfileGender" name="patientGender">

                                    <option value="">--select Gender--</option>
                                    <option value="male" <?php if(@$_SESSION['patientData']['gender']=='male'){ echo 'selected'; } ?>>Male</option>
                                    <option value="female" <?php if(@$_SESSION['patientData']['gender']=='female'){ echo 'selected'; } ?>>Female</option>
                                    <option value="others" <?php if(@$_SESSION['patientData']['gender']=='others'){ echo 'selected'; } ?>>Other</option>

                                </select>

                            </div>


                            <!-- Date of Birth -->

                            <div class="patient-profile-group">

                                <label>

                                    Date of Birth

                                </label>

                                <input type="date" name="patientDOB" id="patientProfileDob" value="<?php echo @$_SESSION['patientData']['dob']; ?>">

                            </div>


                            <!-- Blood Group -->

                            <div class="patient-profile-group">

                                <label>

                                    Blood Group

                                </label>

                                <select id="patientProfileBloodGroup" name="patientBloodGroup">

                                    <option value="">-select Blood Group-</option>
                                    <option value="A+" <?php if(@$_SESSION['patientData']['blood_group']=='A+'){ echo 'selected'; } ?>>A+</option>
                                    <option value="A-" <?php if(@$_SESSION['patientData']['blood_group']=='A-'){ echo 'selected'; } ?>>A-</option>
                                    <option value="B+" <?php if(@$_SESSION['patientData']['blood_group']=='B+'){ echo 'selected'; } ?>>B+</option>
                                    <option value="B-" <?php if(@$_SESSION['patientData']['blood_group']=='B-'){ echo 'selected'; } ?>>B-</option>
                                    <option value="AB+" <?php if(@$_SESSION['patientData']['blood_group']=='AB+'){ echo 'selected'; } ?>>AB+</option>
                                    <option value="AB-" <?php if(@$_SESSION['patientData']['blood_group']=='AB-'){ echo 'selected'; } ?>>AB-</option>
                                    <option value="O+" <?php if(@$_SESSION['patientData']['blood_group']=='O+'){ echo 'selected'; } ?>>O+</option>
                                    <option value="O-" <?php if(@$_SESSION['patientData']['blood_group']==')-'){ echo 'selected'; } ?>>O-</option>

                                </select>

                            </div>


                            <!-- Height -->

                            <div class="patient-profile-group">

                                <label>

                                    State

                                </label>

                                <input type="text" name="patientState" id="patientProfileHeight" placeholder="Enter Your State" value="<?php echo @$_SESSION['patientData']['state']; ?>">

                            </div>


                            <!-- Weight -->

                            <div class="patient-profile-group">

                                <label>

                                   City

                                </label>

                                <input type="text" name="patientCity" id="patientProfileWeight" placeholder="Enter your City" value="<?php echo @$_SESSION['patientData']['city']; ?>">

                            </div>

                        </div>


                        <!--=====================================
        ADDRESS
======================================-->

                        <div class="patient-profile-group patient-profile-full">

                            <label>

                                Zip

                            </label>

                           
                            <input type="text" name="patientZip" id="patientProfileAddress" placeholder="Enter your Location " value="<?php echo @$_SESSION['patientData']['zip']; ?>">

                        </div>


                        <div class="patient-profile-actions">

                            <button type="submit" name="submit"  value="submit" class="patient-profile-save-btn">

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