<?php include('AdminHeader.php'); 

if(isset($_POST['ResetPass'])){
    try{
        $dbpass = $_SESSION['admindata']['password'];

        $opass = $_POST['old_pass'];
        $npass = $_POST['new_pass'];
        $cpass = $_POST['con_pass'];
       
        if(empty($opass)){
            throw new Exception("Old Password field is blank!!");
        }

        if(empty($npass)){
            throw new Exception("new Password field is blank!!");
        }

        if(empty($cpass)){
            throw new Exception("confirm Password field is blank!!");
        }
        
        if(password_verify($opass, $dbpass)){
            if($opass != $npass){
                if($npass == $cpass){
                    $hashPass = password_hash($npass, PASSWORD_DEFAULT);
                    $email = $_SESSION['admindata']['email'];
                    $qu = "update admin set `password`='$hashPass' where `email`='$email' AND `role`='admin'";
                    $qu1 = mysqli_query($con,$qu);
                    header("location:AdminLogout.php");
                }
                else{
                    throw new Exception("New & Confirm Password are not match!!");
                }
            }
            else{
                throw new Exception("new & Old are same!! Try New Password!!");
            }
        }
        else{
            throw new Exception("Old & Database password not match!!");
        }
    }
    catch(Exception $e){
        $error_message= $e->getMessage();
    }    
}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Change Password Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Change Password Form</li>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
                <br>
              <?php
                  if(isset($error_message)){
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $error_message; ?>
                        </div>
                    <?php
                  } 
              ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Enter Old Password</label>
                    <input type="password" name="old_pass" class="form-control" id="exampleInputPassword1" placeholder="Old Password">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Enter New Password</label>
                    <input type="password" name="new_pass" class="form-control" id="exampleInputPassword1" placeholder="New Password">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Enter Confirm Password</label>
                    <input type="password" name="con_pass" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="ResetPass" class="btn btn-primary" value="Reset Password">
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            
            <!-- /.card -->

            <!-- Input addon -->
            
            <!-- /.card -->
            <!-- Horizontal Form -->
            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('AdminFooter.php'); ?>