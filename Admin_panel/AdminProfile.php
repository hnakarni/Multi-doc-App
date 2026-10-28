
  <?php 
  include('AdminHeader.php');
  $adminId = $_SESSION['admindata']['adminId'];

  if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $education = $_POST['education'];
      $designation = $_POST['designation'];
      $skill = $_POST['skill'];
      $about = $_POST['about'];
      $image = $_FILES['profile']['name'];
      move_uploaded_file($_FILES['profile']['tmp_name'],"dist/img/".$image);
      $que = "update admin set `name`='$name',`email`='$email' where `adminId`='$adminId'";
      $que1 = mysqli_query($con,$que);


      date_default_timezone_set("Asia/Kolkata");
      $datetime = date("d/m/Y H:i:s");

      $rque = "select * from adminprofile where `adminId`='$adminId'";
      $rque1 = mysqli_query($con,$rque);
      $count = mysqli_num_rows($rque1);
      if($count==1){
         $pque = "update adminprofile set `education`='$education',`designation`='$designation',`skill`='$skill',`about`='$about',`profile_pic`='$image',`updated_date`='$datetime' where `adminId`='$adminId'";
      }
      else{

        $pque = "insert into adminprofile(`education`,`designation`,`skill`,`about`,`profile_pic`,`updated_date`,`adminId`)values('$education','$designation','$skill','$about','$image','$datetime','$adminId')";
  
        }
        $pque1 = mysqli_query($con,$pque);

      if($pque1){
        $success_message = "Profile Updated Successfully";
      }
      else{
        $error_message = "Something wrong!!";
      }
     
  }

  $qu = "select name,email from admin where `adminId`='$adminId'";
  $qu1 = mysqli_query($con,$qu);
  $adminRecord = mysqli_fetch_assoc($qu1);

  echo $q = "select * from adminprofile where `adminId`='$adminId'";
  $q1 = mysqli_query($con,$q);
  $adminProfile= mysqli_fetch_assoc($q1);

  
  
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <?php 
          if(isset($success_message)){ ?>
            <div class="alert alert-success">
              <?php echo $success_message;  ?>
            </div>
          <?php } ?>

          <?php 
          if(isset($error_message)){ ?>
            <div class="alert alert-danger">
              <?php echo $error_message;  ?>
            </div>
          <?php } ?>
        <div class="row">

       
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo ADMIN_URL; ?>dist/img/<?php echo $adminProfile['profile_pic']; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $adminRecord['name'];?></h3>

                <p class="text-muted text-center"><?php echo $adminProfile['designation'];?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                 <?php echo $adminProfile['education'];?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?php echo $adminProfile['skill'];?></span>
                 
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> About</strong>

                <p class="text-muted"><?php echo $adminProfile['about'];?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                  <!-- /.tab-pane -->

                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" value="<?php if(isset($adminRecord['name'])){ echo $adminRecord['name']; }?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"  value="<?php if(isset($adminRecord['email'])){ echo $adminRecord['email']; }?>">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputEducation" placeholder="Education" name="education"><?php if(isset($adminProfile['education'])){ echo $adminProfile['education']; }?></textarea>
                        </div>
                      </div>

                       <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Designation</label>
                        <div class="col-sm-10">
                          <input type="text" name="designation" class="form-control" id="inputSkills" placeholder="designation" value="<?php if(isset($adminProfile['designation'])){ echo $adminProfile['designation']; }?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" name="skill" class="form-control" id="inputSkills" placeholder="Skills" value="<?php if(isset($adminProfile['skill'])){ echo $adminProfile['skill']; }?>">
                        </div>
                      </div>

                       <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">About</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="about" id="inputExperience" placeholder="About"><?php if(isset($adminProfile['about'])){ echo $adminProfile['about']; }?></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Profile Pic</label>
                        <div class="col-sm-10">
                          <input type="file" name="profile" class="form-control" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit" class="btn btn-danger" value="Update Profile" name="submit">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('AdminFooter.php');?>

  <script>
// var a=10;
</script>