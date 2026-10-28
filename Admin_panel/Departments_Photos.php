<?php include("AdminHeader.php"); 

$departId = $_GET['departmentId'];
if(isset($_POST['add_department_photos'])){

    try{
        $photo = isset($_FILES['departmentsPhotos']['name'])?$_FILES['departmentsPhotos']['name']:"";
        if($photo==''){
            throw new Exception("Photo is not blank");
        }
        else{
            move_uploaded_file($_FILES['departmentsPhotos']['tmp_name'],"dist/img/".$photo);
        }
        
        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d H:i:s');
        $updated_date = date('Y-m-d H:i:s');
        $queryDepart = "insert into departments_photos(`d_id`,`photos`,`created_date`,`updated_date`)values('$departId','$photo','$created_date','$updated_date')";
        $queryRun = mysqli_query($con,$queryDepart);
        if($queryRun){
            $success_message = "Departments Photos updated Successfully";
        }
        else{
            throw new Exception("Something wrong !! in Query");
        }
    }
    catch(Exception $e){
        $error_message = $e->getMessage();
    }
}


?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Deparment wise Photos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Department Wise Photos</li>
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
                <h3 class="card-title">Department Photos</h3>
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
                        <label>Upload Department Photos</label>
                        <input type="file" name="departmentsPhotos" class="form-control" >
                      </div>
                    </div>
                    </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="add_department_photos" value="Department Photos" class="form-control btn btn-success" >
                        </div>
                    </div>
                  </div>
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Department Photos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Photos</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        
                        $query = "select * from departments_photos where `d_id`='$departId'";
                        $runQuery = mysqli_query($con,$query);
                        while($data = mysqli_fetch_array($runQuery)){
                    ?>
                  <tr>
                    <td><?php echo $data['photosId']; ?></td>
                    <td><img src="dist/img/<?php echo $data['photos']; ?>" height="100"/></td>
                    <td><button>Delete</button></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Deparment Id</th>
                   
                    <th>Hours</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include("AdminFooter.php"); ?>