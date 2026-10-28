<?php include("frontend_header.php");

if(empty($_SESSION['patientData'])){ 
   header('location:patient-login.php'); 

} 

?>

<!--=========================================
            MY APPOINTMENTS PAGE
==========================================-->

<section class="patient-appointment-main">

    <!--=====================================
            PAGE BANNER
    ======================================-->

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">

                <a href="#" class="nav-link" data-page="home">

                    Home

                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="patient-dashboard">

                    Patient Dashboard

                </a>

                <span>›</span>

                <span>

                    My Appointments

                </span>

            </div>

            <h1>

                My Appointments

            </h1>

            <p>

                View and manage all your booked appointments.

            </p>

        </div>

    </section>


    <!--=====================================
            APPOINTMENT SECTION
    ======================================-->

    <section class="patient-appointment-section">

        <div class="container">

            <div class="patient-appointment-layout">


                <!--=====================================
                        SIDEBAR
                ======================================-->

               <?php include('patient-aside.php'); ?>


                <!--=====================================
                        CONTENT
                ======================================-->

                <div class="patient-appointment-content">

                    <div class="patient-appointment-header">

                        <h2>

                            Appointment History

                        </h2>

                        <p>

                            Track your upcoming, completed and cancelled appointments.

                        </p>

                    </div>


                    <!-- Statistics -->

                    <div class="patient-appointment-stats">

                        <!--=====================================
        STATISTICS CARDS
======================================-->

                        <div class="patient-appointment-stat-card">

                            <div class="patient-appointment-stat-icon">

                                <i class="fa-solid fa-calendar-check"></i>

                            </div>

                            <div>

                                <h3 id="patientAppointmentTotal">

                                    12

                                </h3>

                                <p>

                                    Total Appointments

                                </p>

                            </div>

                        </div>


                        <div class="patient-appointment-stat-card">

                            <div class="patient-appointment-stat-icon">

                                <i class="fa-solid fa-hourglass-half"></i>

                            </div>

                            <div>

                                <h3 id="patientAppointmentPending">

                                    3

                                </h3>

                                <p>

                                    Pending

                                </p>

                            </div>

                        </div>


                        <div class="patient-appointment-stat-card">

                            <div class="patient-appointment-stat-icon">

                                <i class="fa-solid fa-circle-check"></i>

                            </div>

                            <div>

                                <h3 id="patientAppointmentCompleted">

                                    8

                                </h3>

                                <p>

                                    Completed

                                </p>

                            </div>

                        </div>


                        <div class="patient-appointment-stat-card">

                            <div class="patient-appointment-stat-icon">

                                <i class="fa-solid fa-xmark-circle"></i>

                            </div>

                            <div>

                                <h3 id="patientAppointmentCancelled">

                                    1

                                </h3>

                                <p>

                                    Cancelled

                                </p>

                            </div>

                        </div>

                    </div>


                    <!--=====================================
        SEARCH & FILTER
======================================-->

                    <div class="patient-appointment-toolbar">

                        <div class="patient-appointment-search">

                            <i class="fa-solid fa-magnifying-glass"></i>

                            <input type="text" id="patientAppointmentSearch"
                                placeholder="Search doctor, department or date...">

                        </div>

                        <div class="patient-appointment-filter">

                            <select id="patientAppointmentStatusFilter">

                                <option value="all">

                                    All Status

                                </option>

                                <option value="Pending">

                                    Pending

                                </option>

                                <option value="Confirmed">

                                    Confirmed

                                </option>

                                <option value="Completed">

                                    Completed

                                </option>

                                <option value="Cancelled">

                                    Cancelled

                                </option>

                            </select>

                        </div>

                    </div>


                    <!--=====================================
        APPOINTMENT TABLE
======================================-->

                    <div class="patient-appointment-table-wrapper">

                        <table class="patient-appointment-table">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Date</th>

                                    <th>Time</th>

                                    <th>Deparment Name</th>

                                    <th>Doctor Name</th>

                                    <th>Serial NO</th>

                                    <th>Payment Status</th>
                                    <th>Treatment Status</th>
                                    <th>Actions</th>

                                </tr>

                            </thead>

                            <tbody id="patientAppointmentTableBody">

                            <?php 

    $pId = $_SESSION['patientData']['id'];
    $query = "select t1.*,t2.scheduleDate as scdate,t2.start_time, t2.end_time,t3.name,t3.departmentId,t4.name as departName,t3.fees from appointments as t1 JOIN doctor_schedule as t2 on t1.scheduleId=t2.doctorScheduleId JOIN doctors as t3 on t3.id=t1.doctorId JOIN departments as t4 on t4.departmentId=t3.departmentId where t1.patientId='$pId'";
    $queryRun = mysqli_query($con,$query);
    $i=1;
    while($queryData = mysqli_fetch_array($queryRun)){
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $queryData['scdate'];?></td>
                                    <td><?php echo $queryData['start_time'];?> to <?php echo $queryData['end_time']; ?></td>
                                    <td><?php echo $queryData['departName'];?></td>
                                    <td><?php echo $queryData['name'];?></td>
                                    <td><?php echo $queryData['serialNo'];?></td>
                                    <td>
                                        <span class="badge bg-success">
                                            <?php echo $queryData['paymentStatus'];?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if(isset($queryData['prescription_ids'])) { ?>
                                            <span class="badge bg-success">
                                                Completed
                                            </span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">
                                                Pending
                                            </span>
                                        <?php } ?>
                                         
                                    </td>
                                    <td>
                                        <icon class="fa fa-eye" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $queryData['appointmentId'] ?>"></icon>
                                        <?php if(isset($queryData['prescription_ids'])) { ?>
                                        ||
                                        <a href="patient-description.php?appointmentsId=<?php echo $queryData['appointmentId'];?>">
                                            <icon class="fa fa-anchor"></icon>
                                        </a>
                                        <?php } ?>
                                    </td>
                                     <div class="modal fade" id="exampleModal<?php echo $queryData['appointmentId'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Patient Appointment Details</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <p>Order No : <?php echo $queryData['orderNo'];?></p>
                                           <p>Date : <?php echo $queryData['scdate'];?></p>
                                           <p>Time: <?php echo $queryData['start_time'];?> to <?php echo $queryData['end_time']; ?></p>
                                           <p>Department Name : <?php echo $queryData['departName'];?></p>
                                           <p>Doctor Name : <?php echo $queryData['name'];?></p>
                                           <p>Serial No : <?php echo $queryData['serialNo'];?></p>
                                           <p>Fees : $<?php echo $queryData['fees'];?></p>
                                           <p>Payment Method : <?php echo $queryData['paymentMethod'];?></p>
                                           <p>Payment Status : <?php echo $queryData['paymentStatus'];?></p>
                                           <p>Transcation Id : <?php echo $queryData['TranscationId'];?></p>
                                        </div>
                                       
                                        </div>
                                    </div>
                                </div>
                                </tr>

                               
                            <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>