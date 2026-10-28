<?php include("frontend_header.php"); 



$docId = $_SESSION['doctorData']['id'];
if(isset($_POST['add_schedule'])){
    try{

        $scheduleDate = isset($_POST['scheduleDate'])?$_POST['scheduleDate']:"";
        $scheduleCapacity = isset($_POST['scheduleCapacity'])?$_POST['scheduleCapacity']:"";
        $scheduleStartTime = isset($_POST['scheduleStartTime'])?$_POST['scheduleStartTime']:"";
        $scheduleEndTime = isset($_POST['scheduleEndTime'])?$_POST['scheduleEndTime']:"";
        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d H:i:s');
        $updated_date = date('Y-m-d H:i:s');

        $docSchedulQuery = "insert into doctor_schedule(`doctor_id`,`scheduleDate`,`start_time`,`end_time`,`capacity`,`booked`,`created_date`,`updated_date`)values('$docId','$scheduleDate',' $scheduleStartTime','$scheduleEndTime','$scheduleCapacity','0','$created_date',' $updated_date')";

        if($scheduleStartTime >= $scheduleEndTime){
             throw new Exception("Start time are bigger then end time !! try new Time");
        }
        $docQueryRun = mysqli_query($con,$docSchedulQuery);
        if($docQueryRun){
            $success_message = "Doctor Schedul Added Successfully";
        }
        else{
            throw new Exception("Something wrong !! Check Query");
        }

    }
    catch(Exception $e){
        $error_message = $e->getMessage();
    }

}


?>

<!--=========================================
        SETUP SCHEDULE PAGE
==========================================-->

<section class="setup-schedule-page">

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

                    Setup Schedule

                </span>

            </div>

            <h1>

                Setup Schedule

            </h1>

            <p>

                Manage your consultation schedule and available appointment slots.

            </p>

        </div>

    </section>


    <!--=========================================
            MAIN
    ==========================================-->

    <section class="setup-schedule-main">

        <div class="container">
             <?php if(isset($error_message)){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <?php if(isset($success_message)){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success_message; ?>
                </div>
             <?php } ?>

            <div class="setup-schedule-layout">


                <!--=========================================
                        SIDEBAR
                ==========================================-->


               <?php include('doctor-aside.php');?>

                <!--=========================================
                        CONTENT
                ==========================================-->

                <div class="setup-schedule-content">

                    <div class="setup-schedule-card">

                        <div class="setup-schedule-header">

                            <h2>

                                Setup Your Schedule

                            </h2>

                            <p>

                                Add available consultation timings for patients.

                            </p>

                        </div>

                        <form id="setupScheduleForm" method="post">

                            <!--=========================================
            FORM GRID
    ==========================================-->

                            <div class="setup-schedule-form-grid">

                                <!-- Date -->

                                <div class="setup-schedule-form-group">

                                    <label>

                                        Select Date

                                    </label>

                                    <input type="text" id="scheduleDate" name="scheduleDate" value="<?php echo date('Y-m-d');?>">

                                </div>


                                <!-- Capacity -->

                                <div class="setup-schedule-form-group">

                                    <label>

                                        Patient Capacity

                                    </label>

                                    <input type="number" id="scheduleCapacity" name="scheduleCapacity" placeholder="Enter capacity" min="1"
                                        value="10" required>

                                </div>


                                <!-- Start Time -->

                                <div class="setup-schedule-form-group">

                                    <label>

                                        Start Time

                                    </label>

                                    <input type="text" id="scheduleStartTime" name="scheduleStartTime" value="<?php echo date('h:i:s'); ?>" required>

                                </div>


                                <!-- End Time -->

                                <div class="setup-schedule-form-group">

                                    <label>

                                        End Time

                                    </label>
                                     <input type="text" id="scheduleEndTime" name="scheduleEndTime" value="<?php echo date('h:i:s'); ?>" required>

                                </div>

                            </div>


                            <!--=========================================
            BUTTON
    ==========================================-->

                            <div class="setup-schedule-buttons">

                                <button type="submit" name="add_schedule" class="setup-schedule-save-btn">

                                    <i class="fa-solid fa-calendar-plus"></i>

                                    Add Schedule

                                </button>

                                <button type="reset" class="setup-schedule-reset-btn">

                                    <i class="fa-solid fa-rotate-left"></i>

                                    Reset

                                </button>

                            </div>


                            <!--=========================================
            SCHEDULE TABLE
    ==========================================-->

                            <div class="setup-schedule-table-section">

                                <div class="setup-schedule-table-header">

                                    <h3>

                                        Existing Schedule

                                    </h3>

                                </div>

                                <div class="setup-schedule-table-wrapper">

                                    <table class="setup-schedule-table">

                                        <thead>

                                            <tr>

                                                <th>Id</th>
                                                <th>Date</th>

                                                <th>Start</th>

                                                <th>End</th>

                                                <th>Capacity</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody id="scheduleTableBody">

                                            <!-- Schedule 1 -->


                                            <?php 
                                            $docDataQuery = "select * from doctor_schedule where `doctor_id`='$docId'";
                                            $docDataQuery1 = mysqli_query($con,$docDataQuery);
                                            $i=1;
                                            while($docScData = mysqli_fetch_array($docDataQuery1)){
                                            ?>
                                            <tr>

                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $docScData['scheduleDate'];?></td>
                                                <td><?php echo $docScData['start_time'];?></td>
                                                <td><?php echo $docScData['end_time'];?></td>
                                                <td><?php echo $docScData['capacity'];?></td>
                                                

                                                <td>

                                                   

                                                    <button class="schedule-delete-btn">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>

                                                </td>

                                            </tr>
                                            <?php } ?>



                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>