<?php include('AdminHeader.php'); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // if using composer


if(isset($_POST['add_doctors'])){
    try{
         $name = isset($_POST['name'])?$_POST['name']:"";
         $slug = isset($_POST['slug'])?$_POST['slug']:"";
         $username = isset($_POST['username'])?$_POST['username']:"";
         $doctorFees = isset($_POST['doctorFees'])?$_POST['doctorFees']:"";

         $existDoctor = "select * from doctors where `username`='$username'";
         $existDoctorRun = mysqli_query($con,$existDoctor);
         $countDoctor = mysqli_num_rows($existDoctorRun);
         if($countDoctor >=1){
            throw new Exception("Doctor username is already exist");
         }
         $password = isset($_POST['password'])?$_POST['password']:"";
         $retype_password = isset($_POST['retype_password'])?$_POST['retype_password']:"";
         if($password != $retype_password){
            throw new Exception("Password & Retype Password not match!!");
         }

         $departmentId = isset($_POST['departmentId'])?$_POST['departmentId']:"";
         $experience = isset($_POST['experience'])?$_POST['experience']:"";
         $designation = isset($_POST['designation'])?$_POST['designation']:"";
         $phone = isset($_POST['phone'])?$_POST['phone']:"";
         $email = isset($_POST['email'])?$_POST['email']:"";
         $state = isset($_POST['state'])?$_POST['state']:"";
         $city = isset($_POST['city'])?$_POST['city']:"";
         $zip = isset($_POST['zip'])?$_POST['zip']:"";
         $biography = isset($_POST['biography'])?$_POST['biography']:"";
         $doctorProfile = isset($_FILES['doctorProfile'])?$_FILES['doctorProfile']['name']:"";
        
         if($name==''){
            throw new Exception("Doctor Name is required");
         }

        if($slug==''){
            throw new Exception("Slug is required");
         }



        

        $doctorId = "Doc".time().rand(100,999);
        $token = md5(uniqid());
        $hashPassword = password_hash($password,PASSWORD_DEFAULT);
        
        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d H:i:s');
        $updated_date = date('Y-m-d H:i:s');

        if(isset($_GET['doctorId'])){
            $id = $_GET['doctorId'];
            $oldDoctorData = "select * from doctors where `id`='$id'";
            $runQuery = mysqli_query($con,$oldDoctorData);
            $oldDoc = mysqli_fetch_array($runQuery);
            if($doctorProfile==''){
                $doctorProfile = $oldDoc['photo'];
            }
            else{
                move_uploaded_file($_FILES['doctorProfile']['tmp_name'],"dist/img/".$doctorProfile);
            }
           $qu = "update doctors set `name`='$name',`slug`='$slug',`departmentId`='$departmentId',`designation`='$designation',`biography`='$biography',`phone`='$phone',`email`='$email',`state`='$state',`city`='$city',`zip`='$zip',`photo`='$doctorProfile',`updated_date`='$updated_date',`fees`='$doctorFees' where `id`='$id'";
            $queryRun = mysqli_query($con,$qu);
            if($queryRun){
                header("location:View_doctors.php");
                $success_message = "Doctor Data updated Successfully";
            }
            else{
                throw new Exception("Update query has some problem!!");
            }
        }
        else{
             if($doctorProfile==''){
                throw new Exception("Doctor Profile Pic is blank");
            }
            else{
                move_uploaded_file($_FILES['doctorProfile']['tmp_name'],"dist/img/".$doctorProfile);
            }
             $token = md5(uniqid());
             $qu = "insert into doctors(`doctorId`,`name`,`slug`,`username`,`fees`,`password`,`departmentId`,`experience`,`designation`,`biography`,`phone`,`email`,`state`,`city`,`zip`,`photo`,`status`,`created_date`,`updated_date`,`token`)values('$doctorId','$name','$slug','$username','$doctorFees','$hashPassword','$departmentId','$experience','$designation','$biography','$phone','$email','$state','$city','$zip','$doctorProfile','Active','$created_date','$updated_date','$token')";
                $qu1 = mysqli_query($con,$qu);
                if($qu1){
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
                        $mail->Subject = 'Doctor Login details & Link is below:';
                        $mail->Body    = "<h3>Doctor Login Details are Below:</h3>";
                        $mail->Body    .= "<h5>Doctor username: ".$username."</h3>";
                        $mail->Body    .= "<h5>Doctor Password: ".$password."</h3></br>";
                        $mail->Body    .= "<a href='http://localhost/doctorApp/doctor-login.php'>Login Link</a>";

                        if($mail->send()){
                            $success_message = "Doctor Add Successfully!! Check Your Email for verification!!";
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
                    throw new exception("Something wrong in Department Query!!");
                }
        }
    }
    catch(Exception $e){
        $error_message = $e->getMessage();
    }
}


if(isset($_GET['doctorId'])){
    $id = $_GET['doctorId'];
    $getDoctorData = "select * from doctors where `id`='$id'";
    $runQuery = mysqli_query($con,$getDoctorData);
    $doctorData = mysqli_fetch_array($runQuery);
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Doctors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
        
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- Form Element sizes -->
          
            <!-- /.card -->

           
            <!-- /.card -->

            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Doctors Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <?php if(isset($error_message )){ ?>
                <div class="alert alert-danger">
                    <?php echo $error_message; ?>
                </div>
              <?php } ?>
              
              <?php if(isset($success_message )){ ?>
                <div class="alert alert-success">
                    <?php echo $success_message; ?>
                </div>
              <?php } ?>
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Doctor Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Doctor Name"
                        value="<?php if(isset($doctorData['name'])) { echo $doctorData['name']; } ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug" value="<?php if(isset($doctorData['slug'])) { echo $doctorData['slug']; } ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                   <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Fees</label>
                        <input type="text" name="doctorFees" class="form-control" placeholder="Enter doctor Fees" >
                      </div>
                    </div>
                  </div>
                  <?php if(!isset($doctorData)) { ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter doctor Username" >
                      </div>
                    </div>

                   
                  </div>

                  
                   <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter doctor Password">
                        </div>
                    </div>

                     <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Retype Password</label>
                        <input type="password" name="retype_password" class="form-control" placeholder="Retype Password">
                      </div>
                    </div>
                  </div>
                  <?php } ?>

                  <?php 
                    $query_department = "select * from departments";
                    $query_run = mysqli_query($con,$query_department);
                  ?>
                   <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Select Department</label>
                        <select name="departmentId" class="form-control">
                            <option value="">--select Department--</option>
                            <?php while($depart = mysqli_fetch_array($query_run)) {?>
                                <option value="<?php echo $depart['departmentId'];?>"
                                <?php if(isset($doctorData['departmentId'])){ if($doctorData['departmentId']==$depart['departmentId']){ echo 'selected';}}?>><?php echo $depart['name']; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Experience</label>
                            <select name="experience" class="form-control">
                                <option value="">--select Experience--</option>
                                <?php for($i=0; $i<=50; $i++) {?>
                                    <option value="<?php echo $i; ?>"  <?php if(isset($doctorData['experience'])){ if($doctorData['experience']==$i){ echo 'selected';}}?>><?php echo $i; ?> Experiences</option>
                                <?php } ?>
                            </select>
                      </div>
                    </div>
                  </div>

                 

                   <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" placeholder="Enter Doctor Designation" value="<?php if(isset($doctorData['designation'])) { echo $doctorData['designation']; } ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Doctor Phone"value="<?php if(isset($doctorData['phone'])) { echo $doctorData['phone']; } ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Doctor Email" value="<?php if(isset($doctorData['email'])) { echo $doctorData['email']; } ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>state</label>
                            <input type="text" name="state" class="form-control" placeholder="Enter State" value="<?php if(isset($doctorData['state'])) { echo $doctorData['state']; } ?>">
                        </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" placeholder="Enter Doctor City" value="<?php if(isset($doctorData['city'])) { echo $doctorData['city']; } ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>zip</label>
                            <input type="text" name="zip" class="form-control" placeholder="Enter zip" value="<?php if(isset($doctorData['zip'])) { echo $doctorData['zip']; } ?>">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Biography</label>
                            <textarea name="biography" class="form-control" rows="3" placeholder="Enter biography..." ><?php if(isset($doctorData['biography'])) { echo $doctorData['biography']; } ?>"</textarea>
                        </div>
                    </div>

                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Doctor Photo Profile</label>
                        <input type="file" name="doctorProfile" class="form-control" >
                        <?php if(isset($doctorData['photo'])){ ?>
                            <img src="dist/img/<?php echo $doctorData['photo']; ?>" height="50"/>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="add_doctors" value="<?php if(isset($doctorData['id'])){ echo 'Update Doctor Details'; } else {echo 'Add Doctor Details';}?>" class="form-control btn btn-success" >
                        </div>
                    </div>
                  </div>

                  <!-- input states -->
                  
                 
                 

                 
                 
                
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
         
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include('AdminFooter.php'); ?>