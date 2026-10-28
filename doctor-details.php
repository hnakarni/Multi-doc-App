<?php include("frontend_header.php"); 

if(isset($_GET['docId'])){
    $dId = $_GET['docId'];
    $queryDoctors = "select t1.*,t2.name as departName from doctors as t1 JOIN departments as t2 on t1.departmentId=t2.departmentId where t1.id='$dId'";
    $queryDoctorRun = mysqli_query($con,$queryDoctors);
    $queryDoctorData = mysqli_fetch_assoc($queryDoctorRun);
    print_r($queryDoctorData); 
}
else{
    header("location:doctors.php");
}
?>
<!--=========================================
        DOCTOR DETAILS PAGE
==========================================-->

<section class="doctor-details-page">

    <!-- Banner -->

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">

                <a href="#" class="nav-link" data-page="home">

                    Home

                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="doctors">

                    Doctors

                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="search-doctors">

                    Search Doctors

                </a>

                <span>›</span>

                <span id="doctorDetailsBreadcrumb">

                    Doctor Details

                </span>

            </div>

            <h1 id="doctorDetailsName">

                <?php echo $queryDoctorData['name'];?>
                
            </h1>
            
            <p id="doctorDetailsDepartment">
                
                <?php echo $queryDoctorData['departName'];?>
                • 
                <?php echo $queryDoctorData['designation'];?>

            </p>

        </div>

    </section>



    <!--=========================================
            MAIN CONTENT
    ==========================================-->

    <section class="doctor-details-main">

        <div class="container">

            <div class="doctor-details-grid">

                <!-- Doctor Profile Card -->
                <!--=========================================
            DOCTOR PROFILE CARD
    ==========================================-->

                <div class="doctor-details-profile-card">

                    <div class="doctor-details-profile-image">

                        <img id="doctorProfileImage" src="Admin_panel/dist/img/<?php echo $queryDoctorData['photo'];?>" alt="Doctor">

                    </div>

                    <div class="doctor-details-profile-content">

                        <h2 id="doctorProfileName">

                            <?php echo $queryDoctorData['name'];?>

                        </h2>

                        <h4 id="doctorProfileDepartment">
                            
                 
                            <?php echo $queryDoctorData['designation'];?>
                             (<?php echo $queryDoctorData['departName'];?>)

                        </h4>

                        <p class="doctor-details-experience">

                            <i class="fa-solid fa-user-doctor"></i>

                            <span id="doctorProfileExperience">

                                <?php echo $queryDoctorData['experience'];?> Years Experience

                            </span>

                        </p>

                        <p>

                            <i class="fa-solid fa-phone"></i>

                            <span id="doctorProfilePhone">

                                <?php echo $queryDoctorData['phone'];?>

                            </span>

                        </p>

                        <p>

                            <i class="fa-solid fa-envelope"></i>

                            <span id="doctorProfileEmail">

                               <?php echo $queryDoctorData['email'];?>

                            </span>

                        </p>

                        <p>

                            <i class="fa-solid fa-location-dot"></i>

                            <span id="doctorProfileLocation">

                                <?php echo $queryDoctorData['city'];?>,<?php echo $queryDoctorData['state'];?>

                            </span>

                        </p>

                    </div>

                    <!-- Social Icons -->

                    <div class="doctor-details-social">

                        <a href="#">

                            <i class="fa-brands fa-facebook-f"></i>

                        </a>

                        <a href="#">

                            <i class="fa-brands fa-instagram"></i>

                        </a>

                        <a href="#">

                            <i class="fa-brands fa-linkedin-in"></i>

                        </a>

                        <a href="#">

                            <i class="fa-brands fa-x-twitter"></i>

                        </a>

                    </div>

                </div>


                <!-- RIGHT SIDE -->
                <!-- Biography -->
                <div class="doctor-details-right">

                    <!--=========================================
            BIOGRAPHY
    ==========================================-->

                    <div class="doctor-details-biography-card">

                        <div class="doctor-details-card-title">

                            <i class="fa-solid fa-user-doctor"></i>

                            <h3>

                                Biography

                            </h3>

                        </div>

                        <p id="doctorBiography">

                           <?php echo $queryDoctorData['biography'];?>

                        </p>

                        <p>

                            

                        </p>

                    </div>



                    <!--=========================================
            BOOK APPOINTMENT
    ==========================================-->


                    
                    <div class="doctor-details-book-card">


        

         

                <div class="doctor-details-section-heading">

                    <i class="fa-solid fa-calendar-days"></i>

                    <h2>

                        Available Schedule

                    </h2>

                </div>

                <div class="doctor-details-table-wrapper">

                    <table class="doctor-details-schedule-table">

                        <thead>

                            <tr>

                                <th>Date</th>

                                <th>Day</th>

                                <th>Time Slot</th>

                                <th>Max Patients</th>

                                <th>Booked</th>

                                <th>Available</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody id="doctorScheduleBody">

                            <tr>

                                <td>20 Jul 2026</td>

                                <td>Monday</td>

                                <td>09:00 AM - 10:00 AM</td>

                                <td>10</td>

                                <td>6</td>

                                <td>4</td>

                                <td>

                                    <span class="doctor-details-status available">

                                        Available

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <td>20 Jul 2026</td>

                                <td>Monday</td>

                                <td>11:00 AM - 12:00 PM</td>

                                <td>8</td>

                                <td>8</td>

                                <td>0</td>

                                <td>

                                    <span class="doctor-details-status full">

                                        Full

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <td>21 Jul 2026</td>

                                <td>Tuesday</td>

                                <td>09:00 AM - 10:00 AM</td>

                                <td>12</td>

                                <td>5</td>

                                <td>7</td>

                                <td>

                                    <span class="doctor-details-status available">

                                        Available

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <td>21 Jul 2026</td>

                                <td>Tuesday</td>

                                <td>02:00 PM - 03:00 PM</td>

                                <td>10</td>

                                <td>9</td>

                                <td>1</td>

                                <td>

                                    <span class="doctor-details-status limited">

                                        Limited

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <td>22 Jul 2026</td>

                                <td>Wednesday</td>

                                <td>10:00 AM - 11:00 AM</td>

                                <td>10</td>

                                <td>4</td>

                                <td>6</td>

                                <td>

                                    <span class="doctor-details-status available">

                                        Available

                                    </span>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>


        


                        

                        <form id="doctorBookingForm">

                            <!-- Date -->

                            

                            <!-- Time -->

                           
                          

                            <!-- Button -->

                            <button type="submit" class="doctor-details-book-btn">

                                Book Appointment →

                            </button>

                        </form>

                    </div>

                </div>

                <!-- Part 3 -->

                <!-- Part 3 -->
                <!-- Appointment Form -->

            </div>

        </div>

    </section>



    <!--=========================================
            AVAILABLE SCHEDULE
    ==========================================-->

    



    <!--=========================================
            UPCOMING LEAVES
    ==========================================-->

    <!-- <section class="doctor-details-leave-section">

        <div class="container">

            <div class="doctor-details-leave-card">

                <div class="doctor-details-section-heading">

                    <i class="fa-solid fa-calendar-xmark"></i>

                    <h2>

                        Upcoming Leave Schedule

                    </h2>

                </div>

                <div class="doctor-details-table-wrapper">

                    <table class="doctor-details-leave-table">

                        <thead>

                            <tr>

                                <th>Leave Date</th>

                                <th>Day</th>

                                <th>Reason</th>

                                <th>Duration</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody id="doctorLeaveBody">

                            <tr>

                                <td>25 Jul 2026</td>

                                <td>Saturday</td>

                                <td>Medical Conference</td>

                                <td>1 Day</td>

                                <td>

                                    <span class="doctor-details-status approved">

                                        Approved

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <td>12 Aug 2026</td>

                                <td>Wednesday</td>

                                <td>Family Function</td>

                                <td>2 Days</td>

                                <td>

                                    <span class="doctor-details-status approved">

                                        Approved

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <td>30 Aug 2026</td>

                                <td>Sunday</td>

                                <td>Annual Vacation</td>

                                <td>5 Days</td>

                                <td>

                                    <span class="doctor-details-status pending">

                                        Pending

                                    </span>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section> -->

</section>
<?php include("frontend_footer.php"); ?>