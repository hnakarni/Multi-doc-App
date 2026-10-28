<?php include("AdminHeader.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Medicines</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Medicine</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Medicine Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Medicine Id</th>
                    <th>Medicine Name</th>
                    <th>Medicine Type</th>
                    <th>status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $query = "select * from medicines";
                        $runQuery = mysqli_query($con,$query);
                        while($data = mysqli_fetch_array($runQuery)){
                    ?>
                  <tr>
                    <td><?php echo $data['medicineId']; ?></td>
                    <td><?php echo $data['MedicineName']; ?></td>
                    <td><?php echo $data['MedicineType']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                     <td><button>Delete</button>
                        
                </td>
                
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Medicine Id</th>
                    <th>Medicine Name</th>
                    <th>Medicine Type</th>
                    <th>status</th>
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
  <!-- /.content-wrapper -->
 
<?php include("AdminFooter.php"); ?>