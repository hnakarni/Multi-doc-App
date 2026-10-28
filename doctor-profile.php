<?php include("frontend_header.php"); 


if(isset($_POST['submit'])){

    try{
        $photo = isset($_FILES['photo']['name'])?$_FILES['photo']['name']:'';
        if($photo==''){
            $photo = $_SESSION['doctorData']['photo'];
        }
        else{
            move_uploaded_file($_FILES['photo']['tmp_name'],'Admin_panel/dist/img/'.$photo);
        }

        $name = isset($_POST['doctorName'])?$_POST['doctorName']:"";
        $email = isset($_POST['doctorEmail'])?$_POST['doctorEmail']:"";
        $fees = isset($_POST['doctorFees'])?$_POST['doctorFees']:"";
        $phone = isset($_POST['doctorPhone'])?$_POST['doctorPhone']:"";
        $departmentId = isset($_POST['doctorDepartment'])?$_POST['doctorDepartment']:"";
        $designation = isset($_POST['doctorDesignation'])?$_POST['doctorDesignation']:"";
        $experience = isset($_POST['doctorExperience'])?$_POST['doctorExperience']:"";
        $state = isset($_POST['doctorState'])?$_POST['doctorState']:"";
        $city = isset($_POST['doctorCity'])?$_POST['doctorCity']:"";
        $zip = isset($_POST['doctorZip'])?$_POST['doctorZip']:"";
        $username = isset($_POST['doctorUsername'])?$_POST['doctorUsername']:"";
        $biography = isset($_POST['doctorBiography'])?$_POST['doctorBiography']:"";
        if($name==''){
            throw new Exception("Name is required!!!");
        }

        if($email ==''){
             throw new Exception("Email is required!!!");
        }

        $existEmail = "select * from doctors where `email`='$email' AND `status`='Active'";
        $existEmailRun = mysqli_query($con,$existEmail);
        $count = mysqli_num_rows($existEmailRun);
        if($count>=2){
            throw new Exception("Email is already Exist");
        }

        date_default_timezone_set('Asia/Kolkata');
        $updated_date = date('Y-m-d H:i:s');

        $id = $_SESSION['doctorData']['id'];
        $updateDoctorData = "update doctors set `name`='$name',`username`='$username',`departmentId`='$departmentId',`experience`='$experience',`designation`='$designation',`biography`='$biography',`phone`='$phone',`email`='$email',`state`='$state',`city`='$city',`zip`='$zip',`photo`='$photo',`updated_date`='$updated_date',`fees`='$fees' where `id`='$id'";
        $updateDoctorDataRun = mysqli_query($con,$updateDoctorData);
        if($updateDoctorDataRun){
            $updatedData = "select * from doctors where `id`='$id'";
            $updateDataRun = mysqli_query($con,$updatedData);
            $doctorRecord = mysqli_fetch_array($updateDataRun);
            $_SESSION['doctorData'] = $doctorRecord;
            $success_message = "Doctor Data Updated Successfully";
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
        DOCTOR PROFILE PAGE
==========================================-->

<section class="doctor-profile-page">

    <!--=========================================
            PAGE BANNER
    ==========================================-->

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">

                <a href="#" class="nav-link" data-page="home">

                    Home

                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="doctor-dashboard">

                    Doctor Dashboard

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

                Update your personal information, profile picture and account details.

            </p>

        </div>

    </section>


    <!--=========================================
            MAIN SECTION
    ==========================================-->

    <section class="doctor-profile-main">

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

            <div class="doctor-profile-layout">


                <!--=========================================
                        SIDEBAR
                ==========================================-->

                <?php include("doctor-aside.php"); ?>


                <!--=========================================
                        RIGHT SIDE
                ==========================================-->

                <div class="doctor-profile-content">

                    <div class="doctor-profile-card">

                        <div class="doctor-profile-card-header">

                            <h2>

                                Update Profile

                            </h2>

                            <p>

                                Keep your professional information up to date.

                            </p>

                        </div>

                        <form id="doctorProfileForm" method="post" enctype="multipart/form-data">

                            <!--=========================================
            PROFILE IMAGE
    ==========================================-->

                            <div class="doctor-profile-image-section">

                                <div class="doctor-profile-image-preview">

                                    <img id="doctorProfilePreview" src="Admin_panel/dist/img/<?php echo $_SESSION['doctorData']['photo']; ?>" alt="Doctor">

                                </div>

                                <div class="doctor-profile-upload">

                                    <label for="doctorProfileImage">

                                        Profile Photo

                                    </label>

                                    <input type="file" name="photo" id="doctorProfileImage" accept="image/*">

                                    <small>

                                        JPG, PNG or JPEG (Max 2MB)

                                    </small>

                                </div>

                            </div>


                            <!--=========================================
            PERSONAL DETAILS
    ==========================================-->

                            <div class="doctor-profile-form-grid">

                                <!-- Full Name -->

                                <div class="doctor-profile-form-group">

                                    <label>

                                        Full Name

                                    </label>

                                    <input type="text" id="doctorName" name="doctorName" value="<?php echo $_SESSION['doctorData']['name']; ?>"  >

                                </div>

                                <!-- Email -->

                                <div class="doctor-profile-form-group">

                                    <label>

                                        Email Address

                                    </label>

                                    <input type="email" id="doctorEmail" name="doctorEmail" value="<?php echo $_SESSION['doctorData']['email']; ?>" required>

                                </div>

                                 <div class="doctor-profile-form-group">

                                    <label>

                                        Fees

                                    </label>

                                    <input type="text" id="doctorEmail" name="doctorFees" value="<?php echo $_SESSION['doctorData']['fees']; ?>" >

                                </div>

                                <!-- Phone -->

                                <div class="doctor-profile-form-group">

                                    <label>

                                        Phone Number

                                    </label>

                                    <input type="tel" id="doctorPhone" name="doctorPhone" value="+91 <?php echo $_SESSION['doctorData']['phone']; ?>" required>

                                </div>

                                <!-- Department -->

                                <div class="doctor-profile-form-group">

                                    <label>

                                        Department

                                    </label>

                                    <?php 
                                    $departmentQuery  = "select * from departments where `status`='Active'";
                                    $dpeartmentRun = mysqli_query($con,$departmentQuery);
                                    
                                    ?>

                                    <select id="doctorDepartment" name="doctorDepartment">
                                        <option value="">--select Department--</option>  
                                        <?php while($dq = mysqli_fetch_array($dpeartmentRun)){?>  
                                            <option value="<?php echo $dq['departmentId']; ?>" 
                                            <?php if($dq['departmentId']==$_SESSION['doctorData']['departmentId']){ echo 'selected'; } ?>><?php echo $dq['name']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <!-- Qualification -->

                                <div class="doctor-profile-form-group">

                                    <label>

                                        Designation

                                    </label>

                                    <input type="text" id="doctorQualification" name="doctorDesignation" value="<?php echo $_SESSION['doctorData']['designation']; ?>">

                                </div>

                                <!-- Experience -->

                                <div class="doctor-profile-form-group">

                                    <label>

                                        Experience

                                    </label>

                                       <select id="doctorExperience" name="doctorExperience">
                                        <option value="">--select Years--</option>  
                                        <?php for($i=0; $i<=50; $i++){?>  
                                            <option value="<?php echo $i; ?>" 
                                            <?php if($i==$_SESSION['doctorData']['experience']){ echo 'selected'; } ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- Hospital -->

                                <div class="doctor-profile-form-group">

                                    <label>

                                        State

                                    </label>

                                    <input type="text" id="doctorState" name="doctorState" value="<?php echo $_SESSION['doctorData']['state']; ?>">

                                </div>

                                 <div class="doctor-profile-form-group">

                                    <label>

                                        city

                                    </label>

                                    <input type="text" id="doctorCity" name="doctorCity" value="<?php echo $_SESSION['doctorData']['city']; ?>">

                                </div>

                                 <div class="doctor-profile-form-group">

                                    <label>

                                        zip

                                    </label>

                                    <input type="text" id="doctorzip" name="doctorZip" value="<?php echo $_SESSION['doctorData']['zip']; ?>">

                                </div>

                                 <div class="doctor-profile-form-group">

                                    <label>

                                        Username

                                    </label>

                                    <input type="text" id="doctorUsername" name="doctorUsername" value="<?php echo $_SESSION['doctorData']['username']; ?>">

                                </div>

                                <!-- City -->

                               

                            </div>

                            <!--=========================================
            BIOGRAPHY
    ==========================================-->

                            <div class="doctor-profile-form-group doctor-profile-full">

                                <label>

                                    Biography

                                </label>

                                <textarea id="doctorBiography" name="doctorBiography" rows="6" placeholder="Write about yourself..."><?php echo $_SESSION['doctorData']['biography']; ?></textarea>

                            </div>


                

                            <div class="doctor-profile-buttons">

                                <button type="submit" name="submit" class="doctor-profile-save-btn">

                                    <i class="fa-solid fa-floppy-disk"></i>

                                    Update Profile

                                </button>

                                <button type="reset" class="doctor-profile-reset-btn">

                                    <i class="fa-solid fa-rotate-left"></i>

                                    Reset

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- 
</section>

</div>

</div>

</div>

</div>

</section>

</section> -->
<?php include("frontend_footer.php"); ?>