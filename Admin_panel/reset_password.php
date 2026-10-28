<?php include("dbconfig.php"); 

if(!empty($_POST['submit'])){
    try{
        $npass = $_POST['npass'];
        $cpass = $_POST['cpass'];
        if(empty($npass)){
            throw new Exception("New Password Field is Blank!!");
        }

        if(empty($cpass)){
            throw new Exception("Confirm Password Field is Blank!!");
        }
        
        if($npass == $cpass){
            $newPass = password_hash($npass, PASSWORD_DEFAULT);  
            $email = $_SESSION['adminEmail'];
            $qu = "update admin set `password`='$newPass' where `email`='$email' AND `role`='admin'";
            $qu1 = mysqli_query($con,$qu);
            header('location:AdminLogout.php');

        }
        else{
            throw new Exception("New and Confirm password not match!!");
        }
    }
    catch(Exception $e){
          $error_message= $e->getMessage();    
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Reset</b>Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"></p>
        <?php if(isset($error_message)){ ?>
                <div class="alert alert-danger">
                        <?php echo $error_message; ?>
                </div>
        <?php } ?>
      <form method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" name="npass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Reset">
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      
      <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
