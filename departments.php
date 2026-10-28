<?php include("frontend_header.php"); ?>
<!-- DEPARTMENTS PAGE -->
<section id="departments">
    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">
                <a href="#">Home</a>
                <span>›</span>
                Department
            </div>

            <h1>Our Departments</h1>

            <p>
                Providing expert medical care across all departments,
                with experienced specialists and modern facilities.
            </p>

        </div>

    </section>

    <div class="container">
        <div class="department-grid">

        <?php 
            $getDepartmentData = "select * from departments";
            $getDeparmentDataRun = mysqli_query($con,$getDepartmentData);
            while($depart = mysqli_fetch_array($getDeparmentDataRun)){
        ?>

            <a href="department-details.php?departmentId=<?php echo $depart['departmentId']; ?>" style="color:black; text-decoration:none"><div class="department-card" data-department="cardiology">
                <div class="icon <?php echo $depart['icon']; ?>"></div>
                    <h3><?php echo $depart['name']; ?></h3>
                    <p><?php echo $depart['title']; ?></p>
                </div>
            </a>
            <?php } ?>

            <!-- <div class="department-card" data-department="neurology">
                <div class="icon">🧠</div>
                <h3>Neurology</h3>
                <p>Brain & Nervous System</p>
            </div>

            <div class="department-card" data-department="orthopedic">
                <div class="icon">🦴</div>
                <h3>Orthopedic</h3>
                <p>Bone & Joint Care</p>
            </div>

            <div class="department-card" data-department="pediatrics">
                <div class="icon">👶</div>
                <h3>Pediatrics</h3>
                <p>Child Healthcare</p>
            </div>

            <div class="department-card" data-department="eyecare">
                <div class="icon">👁</div>
                <h3>Eye Care</h3>
                <p>Vision & Eye Surgery</p>
            </div>

            <div class="department-card" data-department="dental">
                <div class="icon">🦷</div>
                <h3>Dental</h3>
                <p>Complete Dental Care</p>
            </div>

            <div class="department-card" data-department="generalmedicine">
                <div class="icon">🩺</div>
                <h3>General Medicine</h3>
                <p>Primary Healthcare</p>
            </div>

            <div class="department-card" data-department="emergency">
                <div class="icon">💉</div>
                <h3>Emergency</h3>
                <p>24 x 7 Emergency Service</p>
            </div>

            <div class="department-card" data-department="icu">
                <div class="icon">🫀</div>
                <h3>ICU</h3>
                <p>Critical Care Unit</p>
            </div> -->

        </div>

    </div>

</section>
<?php include("frontend_footer.php"); ?>