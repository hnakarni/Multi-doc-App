<?php include("AdminHeader.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Departments</li>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Deparment Id</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Short_description</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Emergency</th>
                    <th>Hours</th>
                    <th>status</th>
                    <th>Department Photos</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $query = "select * from departments";
                        $runQuery = mysqli_query($con,$query);
                        while($data = mysqli_fetch_array($runQuery)){
                    ?>
                  <tr>
                    <td><?php echo $data['departmentId']; ?></td>
                    <td><ion-icon name="heart-outline"></ion-icon><?php echo $data['icon']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['shortDescription']; ?></td>
                    <td><?php echo $data['phone']; ?></td>
                    <td><?php echo $data['location']; ?></td>
                    <td><?php echo $data['emergency']; ?></td>
                    <td><?php echo $data['hours']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><a href="Departments_Photos.php?departmentId=<?php echo $data['departmentId']; ?>"><button class='btn btn-primary'>Photos</button></a></td>
                    <td><button>Delete</button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_<?php echo $data['departmentId']; ?>">
                  Launch Default Modal
                </button>
                </td>
                  <div class="modal fade" id="modal_<?php echo $data['departmentId']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $data['name']; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Deparment Id</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Short_description</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Emergency</th>
                    <th>Hours</th>
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