<?php include('AdminHeader.php'); 


if(isset($_POST['add_medicine'])){
    try{
         $medicineName = isset($_POST['medicineName'])?$_POST['medicineName']:"";
         $medicineType = isset($_POST['medicineType'])?$_POST['medicineType']:"";
         if($medicineName==''){
            throw new Exception("Medicine Name is required");
         }

         if($medicineType==''){
            throw new Exception("Medicine Type is required");
         }

        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d H:i:s');
        $updated_date = date('Y-m-d H:i:s');

         $qu = "insert into medicines(`medicineName`,`medicineType`,`status`,`created_date`,`updated_date`)values('$medicineName','$medicineType','Active','$created_date','$updated_date')";
         $qu1 = mysqli_query($con,$qu);
         if($qu1){
            $success_message = "Medicine Added Successfully";
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
            <h1>Medicine</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Medicine</li>
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
                <h3 class="card-title">Add Medicine Details</h3>
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
                        <label>Medicine Name</label>
                        <input type="text" name="medicineName" class="form-control" placeholder="Enter Medicine Name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Medicine Type</label>
                        <select class="form-control" name="medicineType">
                            <option value="">--select Medicine Type--</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Syrup">Syrup</option>
                            <option value="Injection">Injection</option>
                            <option value="Capsule">Capsule</option>
                        </select>
                      </div>
                    </div>
                  </div>
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="add_medicine" value="Add medicine Details" class="form-control btn btn-success" >
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