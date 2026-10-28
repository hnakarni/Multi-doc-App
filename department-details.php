<?php include("frontend_header.php"); 

if(isset($_GET['departmentId'])){
    $id = $_GET['departmentId'];
    $query = "select * from departments where `departmentId`='$id'";
    $query1  = mysqli_query($con,$query);
    $query2 = mysqli_fetch_array($query1);
   
}
else{
    header("location:departments.php");
}

?>
<!-- ===========================
     DEPARTMENT DETAILS PAGE
=========================== -->

<section class="department-details-page">

    <!-- Breadcrumb -->

    <section class="department-details-banner">

        <div class="container">

            <div class="department-details-breadcrumb">

                <a href="#" class="nav-link" data-page="home">
                    Home
                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="departments">
                    Departments
                </a>

                <span>›</span>

                <span id="departmentTitle">
                    <?php echo $query2['name']; ?>
                </span>

            </div>

            <h1 id="departmentHeading">
                 <?php echo $query2['name']; ?> Department
            </h1>

            <p>
                <?php echo $query2['title']; ?>
            </p>

        </div>

    </section>

    <!-- About Department -->

    <section class="department-details-about">

        <div class="container">

            <div class="department-details-grid">

                <!-- LEFT -->

                <div class="department-details-content">

                    <h2>

                        About Department

                    </h2>

                    <p id="departmentAbout">

                        <?php echo $query2['longDescription']; ?><br>

                    </p>

                  


                </div>

                <!-- RIGHT -->

                <div class="department-details-info-card">

                    <div class="department-details-info-header">

                        <i class="fa-solid fa-heart-pulse"></i>

                        <h3>

                            Department Information

                        </h3>

                    </div>

                    <div class="department-details-info-grid">

                        <div class="department-details-info-box">

                            <i class="fa-solid fa-location-dot"></i>

                            <h4>Location</h4>

                            <p id="departmentLocation">

                                <?php echo $query2['location']; ?>

                            </p>

                        </div>

                        <div class="department-details-info-box">

                            <i class="fa-solid fa-phone"></i>

                            <h4>

                                Phone

                            </h4>

                            <p id="departmentPhone">

                                 <?php echo $query2['phone']; ?>

                            </p>

                        </div>

                        <div class="department-details-info-box">

                            <i class="fa-solid fa-truck-medical"></i>

                            <h4>

                                Emergency

                            </h4>

                            <p id="departmentEmergency">

                                <?php echo $query2['emergency']; ?>

                            </p>

                        </div>

                        <div class="department-details-info-box">

                            <i class="fa-solid fa-clock"></i>

                            <h4>

                                Hours

                            </h4>

                            <p id="departmentHours">

                                <?php echo $query2['hours']; ?>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>


<!--=========================================
        PHOTO GALLERY
==========================================-->

<section class="department-details-gallery-section">

    <div class="container">

        <div class="department-details-section-title">

            <h2>

                Photo Gallery

            </h2>

            <p>

                Explore our advanced facilities and modern treatment rooms.

            </p>

        </div>

        <div class="department-details-gallery-grid">

        
            <?php 
                $queryData = "select * from departments_photos where `d_id`='$id'";
                $queryData1 = mysqli_query($con,$queryData);
                while($data = mysqli_fetch_array($queryData1)){
            ?>
            <div class="department-card" data-department="orthopedic">
                <img src="Admin_panel/dist/img/<?php echo $data['photos'];?>"/>
            </div>
            <?php } ?>



        </div>

    </div>

</section>


<!--=========================================
        OUR DOCTORS
==========================================-->

<section class="department-details-doctors-section">

    <div class="container">

        <div class="department-details-section-title">

            <h2>Our Doctors</h2>

            <p>
                Meet our experienced specialists dedicated to your health.
            </p>

        </div>

        <div class="department-details-doctors-grid">
             <?php 
                $queryData = "select * from doctors where `departmentId`='$id'";
                $queryData1 = mysqli_query($con,$queryData);
                while($data = mysqli_fetch_array($queryData1)){
            ?>
            <div class="department-card" data-department="orthopedic">
                <div class="department-card" data-department="orthopedic">
                     <img src="Admin_panel/dist/img/<?php echo $data['photo'];?>" height="300" width="300"/>
                    <h3><?php echo $data['name'];?></h3>
                    <p><?php echo $data['designation'];?></p>
                    </div>
            </div>
            <?php } ?>
        </div>

    </div>

</section>
<?php include("frontend_footer.php"); ?>