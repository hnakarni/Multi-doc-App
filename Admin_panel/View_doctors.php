<?php include("AdminHeader.php"); ?>

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
              <li class="breadcrumb-item active">View Doctors</li>
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
                <h3 class="card-title">Doctors Datatables</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Profile</th>
                    <th>Doctor Id</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>City</th>
                    <th>status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $query = "select *, doctors.name as dname from doctors JOIN departments on doctors.departmentId=departments.departmentId";
                        $runQuery = mysqli_query($con,$query);
                        while($data = mysqli_fetch_array($runQuery)){
                    ?>
                  <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><img src="dist/img/<?php echo $data['photo']; ?>" height="50"></td>
                    <td><?php echo $data['doctorId']; ?></td>
                    <td><?php echo $data['dname']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['designation']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['state']; ?></td>
                    <td><?php echo $data['city']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td>
                       
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_<?php echo $data['id']; ?>"><i class="fas fa-eye"></i></button>
                        |
                        <i class="fas fa-trash"></i> |
                        <a href="Add_doctors.php?doctorId=<?php echo $data['id']; ?>"><i class="fas fa-edit"></i></a> 
                       
                </td>
                
                        <div class="modal fade" id="modal_<?php echo $data['id']; ?>">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Doctor Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                     <p>Profile Pic: <img src="dist/img/<?php echo $data['photo']; ?>" height="50"/></p>
                                     <p>name : <?php echo $data['dname'];?></p>
                                     <p>Username : <?php echo $data['username'];?></p>
                                     <p>biography : <?php echo $data['biography'];?></p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Id</th>
                    <th>Profile</th>
                    <th>Doctor Id</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>City</th>
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