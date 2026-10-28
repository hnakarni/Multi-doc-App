<?php include("frontend_header.php"); 


?>

<!-- DOCTORS PAGE -->
<section id="doctors">
    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">
                <a href="#">Home</a>
                <span>›</span>
                Doctors
            </div>

            <h1>Our Doctors</h1>

            <p>
                Find and book appointments with our expert specialists.
            </p>

        </div>

    </section>

    <div class="container">
        <form method="post">
        <div class="doctor-search">

            <button type="submit" name="find_doctors" class="search-doctors-btn " data-page="search-doctors">

                Find Your Doctor

            </button>

            <input type="text" placeholder="Search Doctor" name="docName">

            

            <select id="departmentFilter" name="departmentFilter">
                <option value="">All Departments</option>
                <?php 
                $departmentsData = "select * from departments";
                $departRun  = mysqli_query($con,$departmentsData);
                while($departD = mysqli_fetch_assoc($departRun)){
            ?>
                    <option value="<?php echo $departD['departmentId'];?>"><?php echo $departD['name'];?></option>

                <?php } ?>
        
            </select>

        </div>

</form>

        <div class="doctor-container">

            <?php  
                if(!empty($_POST['docName']) || !empty($_POST['departmentFilter'])){
                    $docName = $_POST['docName'];
                    $departmentFilter = $_POST['departmentFilter'];
                     $queryDoctors = "select t1.*,t2.name as departName from doctors as t1 JOIN departments as t2 on t1.departmentId=t2.departmentId where t1.name LIKE '%$docName%' AND t1.departmentId='$departmentFilter'"; 
                }
                else{
                     $queryDoctors = "select t1.*,t2.name as departName from doctors as t1 JOIN departments as t2 on t1.departmentId=t2.departmentId"; 
                }
                $queryDoctorsRun = mysqli_query($con,$queryDoctors);
                $countsDoc = mysqli_num_rows($queryDoctorsRun);
                if($countsDoc>0){
                while($queryDoctorData = mysqli_fetch_assoc($queryDoctorsRun)){     
            ?>

            <div class="doctor-card" data-department="Cardiology">

                <div class="doctor-image">
                    <img src="Admin_panel/dist/img/<?php echo $queryDoctorData['photo']; ?>">
                </div>

                <div class="doctor-info">

                    <h3><?php echo $queryDoctorData['name'];?></h3>

                    <h4><?php echo $queryDoctorData['departName'];?></h4>

                    <p><?php echo $queryDoctorData['experience'];?> Years Experience</p>

                    <a href="doctor-details.php?docId=<?php echo $queryDoctorData['id'];?>" data-page="appointment">

                        Book Appointment

                    </a>

                </div>

            </div>
            

            <?php } } else { ?>
            
            <div class="alert alert-danger">
                    No Record OR Doctors Find
            </div>

            <?php } ?>

           

        </div>

    </div>

</section>
<?php include("frontend_footer.php"); ?>