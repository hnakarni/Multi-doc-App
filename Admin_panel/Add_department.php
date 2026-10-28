<?php include('AdminHeader.php'); 


if(isset($_POST['add_department'])){
    try{
         $name = isset($_POST['name'])?$_POST['name']:"";
         $icon = isset($_POST['icon'])?$_POST['icon']:"";
         $short_description = isset($_POST['short_description'])?$_POST['short_description']:"";
         $title = isset($_POST['title'])?$_POST['title']:"";
         $long_Description = isset($_POST['long_Description'])?$_POST['long_Description']:"";
         $phone = isset($_POST['phone'])?$_POST['phone']:"";
         $location = isset($_POST['location'])?$_POST['location']:"";
         $emergency = isset($_POST['emergency'])?$_POST['emergency']:"";
         $hours = isset($_POST['hours'])?$_POST['hours']:"";
         if($icon==''){
            throw new Exception("Department icon is required");
         }

         if($name==''){
            throw new Exception("Department Name is required");
         }

        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d H:i:s');
        $updated_date = date('Y-m-d H:i:s');

         $qu = "insert into departments(`icon`,`name`,`title`,`shortDescription`,`longDescription`,`location`,`phone`,`emergency`,`hours`,`status`,`created_date`,`updated_date`)values('$icon','$name','$title','$short_description','$long_Description','$location','$phone','$emergency','$hours','Active','$created_date','$updated_date')";
         $qu1 = mysqli_query($con,$qu);
         if($qu1){
            $success_message = "Department Add Successfully";
         }
         else{
            throw new exception("Something wrong in Department Query!!");
         }
    }
    catch(Exception $e){
        $error_message = $e->getMessage();
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
            <h1>Deparments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Department</li>
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
                <h3 class="card-title">Add Department Details</h3>
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
                <form method="post">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="icon" class="form-control" placeholder="Enter Icon Name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Department Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Department Name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Short Description</label>
                        <input type="text" name="short_description" class="form-control" placeholder="Enter Department Name">
                      </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Department title">
                        </div>
                    
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Long Description</label>
                        <textarea name="long_Description" class="form-control" rows="3" placeholder="Enter details..." ></textarea>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Department location</label>
                        <input type="text" name="location" class="form-control" placeholder="Enter Department location">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Emergency</label>
                        <input type="text" name="emergency" class="form-control" placeholder="Enter Department emergency">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>hours</label>
                            <input type="text" name="hours" class="form-control" placeholder="Enter Department hours">
                        </div>
                    </div>
                  </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="add_department" value="Add Department Details" class="form-control btn btn-success" >
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