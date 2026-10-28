<?php include("frontend_header.php"); 

if(isset($_GET['appointmentsId'])){
    $appId = $_GET['appointmentsId'];
    $query = "select t1.*,t2.scheduleDate as scdate,t2.start_time, t2.end_time,t3.name,t3.departmentId,t4.name as departName,t3.fees,t3.name as docName,t3.designation, t4.name as departName, t5.name as pname, t5.dob, t5.gender,t5.phone,t6.symptoms,t6.diagnosis,t6.test,t6.advice,t6.followup_date,t6.prescriptionId from appointments as t1 JOIN doctor_schedule as t2 on t1.scheduleId=t2.doctorScheduleId JOIN doctors as t3 on t3.id=t1.doctorId JOIN departments as t4 on t4.departmentId=t3.departmentId JOIN patients as t5 on t5.id=t1.patientId JOIN prescriptions as t6 on t6.prescriptionId=t1.prescription_ids where t1.appointmentId='$appId'";
    $queryRun = mysqli_query($con,$query);
    $queryData = mysqli_fetch_assoc($queryRun);
    print_r($queryData);

    echo $presMediId = $queryData['prescriptionId'];
    echo "<br>";
    
}
else{
    header("location:patient-appointment-details.php");
}


?>




<!--=========================================
        PATIENT DESCRIPTION PAGE
==========================================-->

<section class="patient-description-page">

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

                <span>

                    Prescription

                </span>

            </div>

            <h1>

                Patient Prescription

            </h1>

            <p>

                View and print your doctor's prescription.

            </p>

        </div>

    </section>


    <!--=========================================
            MAIN
    ==========================================-->

    <section class="patient-description-main">

        <div class="container">

            <div class="patient-description-layout">


                <!--=========================================
                        SIDEBAR
                ==========================================-->

                <aside class="patient-description-sidebar">

                    <div class="patient-description-sidebar-top">

                        <img id="patientDescriptionImage" src="images/patients/patient1.jpg" alt="Patient">

                        <h3 id="patientDescriptionName">

                            Rahul Patel

                        </h3>

                        <p>

                            Patient ID :
                            <span id="patientDescriptionId">

                                PAT1001

                            </span>

                        </p>

                    </div>


                    <ul class="patient-description-menu">

                        <li>

                            <a href="#" class="nav-link patient-description-menu-link" data-page="home">

                                <i class="fa-solid fa-house"></i>

                                Dashboard

                            </a>

                        </li>

                        <li>

                            <a href="#" class="nav-link patient-description-menu-link">

                                <i class="fa-solid fa-user"></i>

                                My Profile

                            </a>

                        </li>


                        <!-- Make Appointment -->

                        <li>

                            <a href="#" class="nav-link patient-description-menu-link" data-page="make-appointment">

                                <i class="fa-solid fa-calendar-plus"></i>

                                Make Appointment

                            </a>

                        </li>


                        <li>

                            <a href="#" class="nav-link patient-description-menu-link">

                                <i class="fa-solid fa-calendar-days"></i>

                                Appointments

                            </a>

                        </li>


                        <li>

                            <a href="#" class="nav-link patient-description-menu-link" data-page="home">

                                <i class="fa-solid fa-right-from-bracket"></i>

                                Logout

                            </a>

                        </li>

                    </ul>

                </aside>


                <!--=========================================
                        CONTENT
                ==========================================-->

                <div class="patient-description-content">

                    <div class="prescription-card">

                        <div class="prescription-header">

                            <h2>

                                Prescription

                            </h2>

                        </div>

                        <!--=========================================
        HOSPITAL HEADER
==========================================-->

                        <div id="prescriptionArea">

                            <div class="hospital-header">

                                <h1>

                                    CarePlus Hospital

                                </h1>

                                <p>

                                    Healthcare Management System

                                </p>

                                <p>

                                    95 South Park Avenue, New York, USA

                                    |

                                    Phone : +1 (555) 123-4567

                                </p>

                            </div>


                            <!--=========================================
            DOCTOR INFO
    ==========================================-->

                            <div class="prescription-doctor">

                                <div>

                                    <h3 id="prescriptionDoctorName">

                                        <?php echo $queryData['docName'];?>

                                    </h3>

                                    <p id="prescriptionDoctorDegree">

                                       <?php echo $queryData['designation'];?>
                                    </p>

                                    <p id="prescriptionDoctorDepartment">

                                        <?php echo $queryData['departName'];?>

                                    </p>

                                </div>

                            </div>


                            <hr>


                            <!--=========================================
            PATIENT DETAILS
    ==========================================-->

                            <div class="prescription-patient-info">

                                <div>

                                    <strong>

                                        Patient Name :

                                    </strong>

                                    <span id="prescriptionPatientName">

                                        <?php echo $queryData['pname'];?>

                                    </span>

                                </div>

                                <div>

                                    <strong>

                                        Age :

                                    </strong>

                                    <span id="prescriptionAge">

                                        <?php 
                                        $dob  = $queryData['dob'];
                                       echo date_diff(date_create(date('Y-m-d')), date_create($dob))->y; ?> Years

                                    </span>

                                </div>

                                <div>

                                    <strong>

                                        Gender :

                                    </strong>

                                    <span id="prescriptionGender">

                                         <?php echo $queryData['gender'];?>

                                    </span>

                                </div>

                                <div>

                                    <strong>

                                        Date :

                                    </strong>

                                    <span id="prescriptionDate">

                                        --

                                    </span>

                                </div>

                                <div>

                                    <strong>

                                        Phone :

                                    </strong>

                                    <span id="prescriptionPhone">

                                        +91  <?php echo $queryData['phone'];?>

                                    </span>

                                </div>

                            </div>


                            <hr>


                            <!--=========================================
            SYMPTOMS
    ==========================================-->

                            <div class="prescription-section">

                                <h3>

                                    Symptoms

                                </h3>

                                <p id="prescriptionSymptoms">

                                     <?php echo $queryData['symptoms'];?>

                                </p>

                            </div>


                            <!--=========================================
            DIAGNOSIS
    ==========================================-->

                            <div class="prescription-section">

                                <h3>

                                    Diagnosis

                                </h3>

                                <p id="prescriptionDiagnosis">

                                     <?php echo $queryData['diagnosis'];?>

                                </p>

                            </div>


                            <!--=========================================
        PRESCRIPTION TABLE
==========================================-->

                            <div class="prescription-section">

                                <h3>

                                    Prescription

                                </h3>

                                <div class="prescription-table-wrapper">

                                    <table class="prescription-table">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>Medicine</th>

                                                <th>Type</th>

                                                <th>Dosage</th>

                                                <th>Days</th>

                                                <th>Time</th>

                                            </tr>

                                        </thead>

                                        <tbody id="" style='color:"black";'>
                                            

                                        <?php 
                                            $prescriptionMedicines = "select t1.*,t2.MedicineName,t2.MedicineType from medicine_prescriptions as t1 join medicines as t2 on t1.mediIds=t2.medicineId where t1.prescriptIds='$presMediId'";
                                            $prescriptionMedicinesRun = mysqli_query($con,$prescriptionMedicines);
                                            while($preMediData = mysqli_fetch_assoc($prescriptionMedicinesRun)) {
                                              

                                        ?>
                                             <tr >

                                                <th style='color:black'>#</th>

                                                <th style='color:black'><?php echo $preMediData['MedicineName']; ?></th>

                                                <th style='color:black'><?php echo $preMediData['MedicineType']; ?></th>

                                                <th style='color:black'><?php echo $preMediData['dosage']; ?></th>

                                                <th style='color:black'><?php echo $preMediData['totalDays']; ?></th>

                                                <th style='color:black'><?php echo $preMediData['totalTimes']; ?></th>

                                            </tr>

                                            <?php } ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>


                            <!--=========================================
        TESTS
==========================================-->

                            <div class="prescription-section">

                                <h3>

                                    Recommended Tests

                                </h3>

                                <p id="prescriptionTests">

                                    -

                                </p>

                            </div>


                            <!--=========================================
        ADVICE
==========================================-->

                            <div class="prescription-section">

                                <h3>

                                    Doctor's Advice

                                </h3>

                                <p id="prescriptionAdvice">

                                    -

                                </p>

                            </div>


                            <!--=========================================
        FOLLOW UP
==========================================-->

                            <div class="prescription-section">

                                <h3>

                                    Follow-up

                                </h3>

                                <p>

                                    <strong>Date :</strong>

                                    <span id="prescriptionFollowUp">
                                        -
                                    </span>
                                </p>
                            </div>
                            <!--=========================================
        SIGNATURE
==========================================-->
                            <div class="prescription-signature">
                                <div>
                                    ___________________________
                                    <br>
                                    <strong id="signatureDoctorName">
                                        Dr. John Smith
                                    </strong>
                                    <br>
                                    <span id="signatureDegree">
                                        MBBS, FCPS
                                    </span>
                                </div>
                            </div>
                        </div>


                        <!--=========================================
        ACTION BUTTONS
==========================================-->

                        <div class="prescription-actions no-print">

                            <!-- <button type="button" class="print-prescription-btn" id="printPrescriptionBtn">

                                <i class="fa-solid fa-print"></i>

                                Print Prescription

                            </button> 
                            </button> 
                            </button> -->

                            <button type="button" onclick="window.print()" class="print-prescription-btn" id="printPrescriptionBtn">
                                <i class="fa-solid fa-print"></i>
                                    Print Prescription
                            </button>

                            <button type="button" class="back-appointment-btn nav-link" data-page="appointments">

                                <i class="fa-solid fa-arrow-left"></i>

                                Back to Appointments

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>