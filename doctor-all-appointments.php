<?php include("frontend_header.php"); ?>
<!--=========================================
        TODAY APPOINTMENTS PAGE
==========================================-->

<section class="today-appointments-page">

    <!--=========================================
            PAGE BANNER
    ==========================================-->

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">

                <a href="#" class="nav-link" data-page="home">

                    Home

                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="doctor-dashboard">

                    Doctor Dashboard

                </a>

                <span>›</span>

                <span>

                    All Appointments

                </span>

            </div>

            <h1>

                All Appointments

            </h1>

            <p>

                View and manage all appointments scheduled.

            </p>

        </div>

    </section>


    <!--=========================================
            MAIN SECTION
    ==========================================-->

    <section class="today-appointments-main">

        <div class="container">

            <div class="today-appointments-layout">


                <!--=========================================
                        SIDEBAR
                ==========================================-->

                <?php include('doctor-aside.php'); ?>


                <!--=========================================
                        CONTENT
                ==========================================-->

                <div class="today-appointments-content">

                    <div class="today-appointments-card">

                        <div class="today-appointments-header">

                            <h2>

                                All Appointment

                            </h2>

                            <p id="todayAppointmentsDate">

                                

                            </p>

                        </div>

                        <!--=========================================
        FILTER SECTION
==========================================-->

                        <div class="today-appointments-filter">

                            <div class="today-appointments-filter-group">

                                <label>

                                    Select Time Slot

                                </label>

                                <select id="todayAppointmentTime">

                                    <option value="all">

                                        All Time Slots

                                    </option>

                                    <option value="09:00 AM">

                                        09:00 AM - 10:00 AM

                                    </option>

                                    <option value="10:00 AM">

                                        10:00 AM - 11:00 AM

                                    </option>

                                    <option value="11:00 AM">

                                        11:00 AM - 12:00 PM

                                    </option>

                                    <option value="01:00 PM">

                                        01:00 PM - 02:00 PM

                                    </option>

                                    <option value="02:00 PM">

                                        02:00 PM - 03:00 PM

                                    </option>

                                    <option value="03:00 PM">

                                        03:00 PM - 04:00 PM

                                    </option>

                                </select>

                            </div>

                            <button id="todayAppointmentSearch" class="today-appointments-search-btn">

                                <i class="fa-solid fa-magnifying-glass"></i>

                                Search

                            </button>

                        </div>


                        <!--=========================================
        APPOINTMENTS TABLE
==========================================-->

                        <div class="today-appointments-table-wrapper">

                            <table class="today-appointments-table">

                                <thead>

                                    <tr>

                                        <th>SL</th>

                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Patient No</th>
                                        <th>Patient Info</th>
                                        <th>Fees</th>

                                        <th>SerialNO</th>

                                        <th>Treatment Status</th>

                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody id="todayAppointmentsTable">

                                  


                                    <!-- Appointment 1 -->

    <?php 

    $dId = $_SESSION['doctorData']['id'];
    $query = "select t1.*,t2.scheduleDate as scdate,t2.start_time, t2.end_time,t3.name,t3.departmentId,t4.name as departName,t3.fees, t5.patientid as ptId,t5.name as pName,t5.phone as pPhone from appointments as t1 JOIN doctor_schedule as t2 on t1.scheduleId=t2.doctorScheduleId JOIN doctors as t3 on t3.id=t1.doctorId JOIN departments as t4 on t4.departmentId=t3.departmentId JOIN patients as t5 on t5.id=t1.patientId where t1.doctorId='$dId'";
    $queryRun = mysqli_query($con,$query);
    $i=1;
    while($queryData = mysqli_fetch_array($queryRun)){
                            ?>

                                    <tr data-time="10:00 AM">

                                        <td>1</td>
                                        <td><?php echo $queryData['scdate']; ?></td>
                                        <td><?php echo $queryData['start_time']; ?> to <?php echo $queryData['end_time']; ?></td>
                                        <td><?php echo $queryData['ptId']; ?></td>

                                        <td>

                                            <strong><?php echo $queryData['pName']; ?></strong>

                                            <br>

                                            <small>+91 <?php echo $queryData['pPhone']; ?></small>

                                        </td>




                                        <td>$<?php echo $queryData['fees']; ?></td>
                                        <td><?php echo $queryData['serialNo']; ?></td>

                                        <td>
                                             <?php if(isset($queryData['prescription_ids'])){ ?>
                                                <span class="today-appointments-status completed">

                                                    Completed

                                                </span>
                                             <?php } else {?>
                                                <span class="today-appointments-status pending">

                                                    Pending

                                                </span>
                                             <?php } ?>

                                           

                                        </td>

                                        <td>

                                            <?php if(isset($queryData['prescription_ids'])){ ?>


                                             <a href="doctor-treatment-edit.php?prescriptionId=<?php echo $queryData['prescription_ids'];?>">
                                                <button class="today-appointments-view-btn btn btn-info">

                                                    <i class="fa-solid fa-edit"></i>

                                                </button>
                                            </a>

                                            <?php } else { ?>

                                            
                                            <a href="doctor-treatment.php?appointmentId=<?php echo $queryData['appointmentId']; ?>">
                                                <button class="today-appointments-view-btn" data-patient="Priya Shah">

                                                    <i class="fa-solid fa-eye"></i>

                                                </button>
                                            </a>
                                            <?php } ?>

                                        </td>

                                    </tr>

    <?php } ?>


                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>