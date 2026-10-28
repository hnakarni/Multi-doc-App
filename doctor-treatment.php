<?php include("frontend_header.php");

if(!isset($_GET['appointmentId'])){
    header("location:doctor-all-appointments.php");
}

$appsId = $_GET['appointmentId'];
$dataExit = "select * from appointments where `appointmentId`='$appsId'";
$dataExitRun = mysqli_query($con,$dataExit);
$dataExitRecord = mysqli_fetch_array($dataExitRun);
if(!$dataExitRecord){
    header("location:doctor-all-appointments.php");
}



    $query = "select t1.*,t2.scheduleDate as scdate,t2.start_time, t2.end_time,t3.name,t3.departmentId,t3.id as docsIds,t4.name as departName,t3.fees, t5.patientid as ptId,t5.name as pName,t5.phone as pPhone,t5.dob,t5.gender,t5.email,t5.blood_group,t5.id as patiIds from appointments as t1 JOIN doctor_schedule as t2 on t1.scheduleId=t2.doctorScheduleId JOIN doctors as t3 on t3.id=t1.doctorId JOIN departments as t4 on t4.departmentId=t3.departmentId JOIN patients as t5 on t5.id=t1.patientId where t1.appointmentId='$appsId'";
    $queryRun = mysqli_query($con,$query);
    $queryData = mysqli_fetch_array($queryRun);



    if(isset($_POST['patient_prescription'])){
        try{

            $medicineTypes = isset($_POST['medicineTypes'])?$_POST['medicineTypes']:"";
            $medicineNames = isset($_POST['medicineNames'])?$_POST['medicineNames']:"";
            $medicineDosage = isset($_POST['medicineDosage'])?$_POST['medicineDosage']:"";
            $totalDays = isset($_POST['totalDays'])?$_POST['totalDays']:"";
            $totalTimes = isset($_POST['totalTimes'])?$_POST['totalTimes']:"";
            // echo "<pre>";
            // print_r($medicineTypes);
            // print_r($medicineNames);
            // print_r($medicineDosage);
            // print_r($totalDays);
            // print_r($totalTimes);
            // exit();


            $height = isset($_POST['height'])?$_POST['height']:"";
            $weight = isset($_POST['weight'])?$_POST['weight']:"";
            $tempreture = isset($_POST['tempreture'])?$_POST['tempreture']:"";
            $pulse = isset($_POST['pulse'])?$_POST['pulse']:"";
            $respiration = isset($_POST['respiration'])?$_POST['respiration']:"";
            $blood_pressure = isset($_POST['blood_pressure'])?$_POST['blood_pressure']:"";
            $habits = isset($_POST['habits'])?implode(',',$_POST['habits']):"";
            $symptoms = isset($_POST['symptoms'])?implode(',',$_POST['symptoms']):"";
            $diagnosis = isset($_POST['diagnosis'])?implode(',',$_POST['diagnosis']):"";
            $problem_description = isset($_POST['problem_description'])?$_POST['problem_description']:"";
            $tests = isset($_POST['tests'])?$_POST['tests']:"";
            $advice = isset($_POST['advice'])?$_POST['advice']:"";
            $followup_date = isset($_POST['followup_date'])?$_POST['followup_date']:"";
            $followup_notes = isset($_POST['followup_notes'])?$_POST['followup_notes']:"";
            
            $appsId = $_GET['appointmentId'];
            $patientIds = $queryData['patiIds'];
            $doctorsIds = $queryData['docsIds'];
            date_default_timezone_set('Asia/Kolkata');
            $created_date = date('Y-m-d H:i:s');
            $updated_date = date('Y-m-d H:i:s');

           

            if($height==''){
                throw new Exception("height is required");
            }
            else{
                 $queryPres = "insert into prescriptions(`appointmentId`,`doctorId`,`patientId`,`height`,`weight`,`tempreture`,`blood_pressure`,`pulse`,`respiration`,`habits`,`symptoms`,`diagnosis`,`problemDescription`,`test`,`advice`,`followup_date`,`followup_notes`,`created_date`,`updated_date`)values('$appsId','$doctorsIds','$patientIds','$height',' $weight','$tempreture','$blood_pressure','$pulse','$respiration','$habits','$symptoms','$diagnosis','$problem_description','$tests','$advice','$followup_date','$followup_notes','$created_date','$updated_date')";

                 $queryPresRun = mysqli_query($con,$queryPres);
                 if($queryPresRun){
                    $last_id = mysqli_insert_id($con);

                    //appointment table me status treatment updated completed
                    $queryAppointmentPres = "update appointments set `prescription_ids`='$last_id' where `appointmentId`='$appsId '";
                    $queryAppointmentPresRun = mysqli_query($con,$queryAppointmentPres);
                    //end 

                    //store medicine Data into medicine_prescription table
                    for($i=0; $i<sizeof($medicineTypes);$i++){
                        $singleMediType = $medicineTypes[$i];
                        $singleMediIds = $medicineNames[$i];
                        $singleMediDosage = $medicineDosage[$i];
                        $singleTotalDay = $totalDays[$i];
                        $singleTotalTime = $totalTimes[$i];
                        $mediPreQuery = "insert into medicine_prescriptions(`presMediIds`,`mediIds`,`dosage`,`total_days`,`total_times`,`created_date`,`updated_dae`)values('$last_id','$singleMediIds','$singleMediDosage','$singleTotalDay','$singleTotalTime','$created_date','$updated_date')";
                        $mediPreQueryRun = mysqli_query($con,$mediPreQuery);
                        
                    }

                    //end

                    header("location:doctor-all-appointments.php");
                 }
                 else{
                    throw new Exception("Something wrong in Query!!");
                 }
            }
        }
        catch(Exception $e){
            $error_message = $e->getMessage();
        }

    }

    $querySelection = "select habits,symptoms,diagnosis from prescriptions";
    $querySelectionRun = mysqli_query($con,$querySelection);
    $habitArray = [];
    $symptomsArray = [];
    $diagnosisArray = [];
    while($querySelectData = mysqli_fetch_array($querySelectionRun)){
        $habitArray = array_merge($habitArray,explode(',',$querySelectData['habits']));
        $symptomsArray = array_merge($symptomsArray,explode(',',$querySelectData['symptoms']));
        $diagnosisArray = array_merge($diagnosisArray,explode(',',$querySelectData['diagnosis']));
    }
    $habitArray = array_unique($habitArray);
    $symptomsArray = array_unique($symptomsArray);
    $diagnosisArray = array_unique($diagnosisArray);
?>

<!--=========================================
        TREATMENT PAGE
==========================================-->

<style>
    .select2-container {
    width: 100% !important;
}


.select2-container
.select2-selection--multiple {
    height: 80px !important;
    cursor: text;
    background: #fff;
    border: 1px solid #ced4da;
    border-radius: 4px;
}


.select2-container
.select2-selection__rendered {
    display: flex !important;
    flex-wrap: no-wrap;
    align-items: center;
    padding: 0px 0px !important;
    margin: 0 !important;
}


 .select2-container
.select2-search--inline .select2-search__field {
    height: 38px !important;
    margin-top: 0 !important;
    width: 100% !important;
}
.treatment-form-group textarea{
         min-height: 38px;
}




</style>


<section class="treatment-page">

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

                    Treatment

                </span>

            </div>

            <h1>

                Patient Treatment

            </h1>

            <p>

                Examine the patient, prescribe medicines and complete the treatment process.

            </p>

        </div>

    </section>


    <!--=========================================
            MAIN
    ==========================================-->

    <section class="treatment-main">

        <div class="container">

          

            <div class="treatment-layout">


                <!--=========================================
                        SIDEBAR
                ==========================================-->

                <?php include('doctor-aside.php');?>


                <!--=========================================
                        CONTENT
                ==========================================-->

                <div class="treatment-content">

                    <div class="treatment-card">

                        <div class="treatment-header">

                            <h2>

                                Patient Examination

                            </h2>

                            <p>

                                Record patient vitals, diagnosis, medicines and medical advice.

                            </p>

                        </div>

                        <form id="treatmentForm" method="post">

                            <!--=========================================
        TOP INFORMATION
==========================================-->

                            <div class="treatment-top-info">

                                <!-- Patient Information -->

                                <div class="treatment-info-card">

                                    <h3>

                                        <i class="fa-solid fa-user"></i>

                                        Patient Information

                                    </h3>

                                    <table class="treatment-info-table">

                                        <tr>

                                            <th>Patient Name</th>

                                            <td id="patientName">

                                                <?php echo $queryData['pName'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Phone</th>

                                            <td id="patientPhone">

                                                +91 <?php echo $queryData['pPhone'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Age</th>

                                            <td id="patientAge">


                                                <?php 
                                                $dob = $queryData['dob'];
                                                echo date_diff(date_create($dob),date_create(date('Y-m-d')))->y;?> Years

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Gender</th>

                                            <td>

                                                <?php echo $queryData['gender'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Blood Group</th>

                                            <td>

                                                <?php echo $queryData['blood_group'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Email</th>

                                            <td>

                                                <?php echo $queryData['email'];?>

                                            </td>

                                        </tr>

                                    </table>

                                </div>


                                <!-- Appointment Information -->

                                <div class="treatment-info-card">

                                    <h3>

                                        <i class="fa-solid fa-calendar-check"></i>

                                        Appointment Information

                                    </h3>

                                    <table class="treatment-info-table">

                                        <tr>

                                            <th>Date</th>

                                            <td id="appointmentDate">

                                                <?php echo $queryData['scdate'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Time</th>

                                            <td id="appointmentTime">

                                                <?php echo $queryData['start_time'];?> to <?php echo $queryData['end_time'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Serial No</th>

                                            <td id="appointmentToken">

                                                <?php echo $queryData['serialNo'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Fee</th>

                                            <td id="appointmentFee">

                                                $<?php echo $queryData['fees'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Payment Status</th>

                                            <td id="appointmentFee">

                                                <?php echo $queryData['paymentStatus'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                            <th>Status</th>

                                            <td>

                                                <span class="appointment-status pending">

                                                    Pending

                                                </span>

                                            </td>

                                        </tr>

                                    </table>

                                </div>

                            </div>


                            <!--=========================================
        PHYSICAL EXAMINATION
==========================================-->

                            <div class="treatment-section">
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

                                <h3>

                                    <i class="fa-solid fa-heart-pulse"></i>

                                    Physical Examination

                                </h3>

                                <div class="treatment-form-grid">

                                    <div class="treatment-form-group">

                                        <label>

                                            Height (cm)

                                        </label>

                                        <input type="number" name="height" id="height" placeholder="170">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Weight (kg)

                                        </label>

                                        <input type="number" name="weight" id="weight" placeholder="65">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Temperature (°C)

                                        </label>

                                        <input type="number" name="tempreture" step="0.1" id="temperature" placeholder="36.8">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Pulse (Per Minute)

                                        </label>

                                        <input type="number" name="pulse" id="pulse" placeholder="72">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Respiration (Per Minute)

                                        </label>

                                        <input type="number" name="respiration" id="respiration" placeholder="18">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Blood Pressure

                                        </label>

                                        <input type="text" name="blood_pressure" id="bloodPressure" placeholder="120 / 80">

                                    </div>

                                </div>

                            </div>


                            <!--=========================================
        SYMPTOMS & DIAGNOSIS
==========================================-->

                            <div class="treatment-section">

                                <h3>

                                    <i class="fa-solid fa-stethoscope"></i>

                                    Symptoms & Diagnosis

                                </h3>

                                <div class="treatment-form-grid">

                                    <div class="treatment-form-group">

                                        <label>

                                            Habits

                                        </label>

                                         <select name="habits[]" id="habits" class="medicine-type" multiple>
                                            <?php foreach($habitArray as $key=>$value){ ?>
                                                 <option value="<?php echo $value; ?>"><?php echo $value; ?></optio>
                                            <?php } ?>
                                            
                                            
                                        </select>

                                        
                                        
                                    </div>
                                    
                                    <div class="treatment-form-group">
                                        
                                        <label>
                                            
                                            Symptoms
                                            
                                        </label>
                                        
                                        <select name="symptoms[]" id="symptoms" class="medicine-type" multiple>
                                             <?php foreach($symptomsArray as $key=>$value){ ?>
                                                  <option value="<?php echo $value; ?>"><?php echo $value; ?></optio>
                                             <?php } ?>
                                             
                                            </select>
                                            
                                            
                                            
                                        </div>
                                        
                                        <div class="treatment-form-group">
                                            
                                            <label>
                                                
                                                Diagnosis
                                                
                                            </label>
                                            
                                            <select name="diagnosis[]" id="diagnosis" class="medicine-type" multiple>
                                                <?php foreach($diagnosisArray as $key=>$value){ ?>
                                                     <option value="<?php echo $value; ?>"><?php echo $value; ?></optio>
                                                <?php } ?>
                                                
                                                </select>


                                    </div>

                                  

                                </div>


                                <div class="treatment-form-group treatment-full">

                                    <label>

                                        Problem Description

                                    </label>

                                    <textarea id="problemDescription" rows="5" name="problem_description"
                                        placeholder="Write complete examination details..."></textarea>

                                </div>

                            </div>


                            <!--=========================================
        PRESCRIPTION
==========================================-->

                            <div class="treatment-section">

                                <h3>

                                    <i class="fa-solid fa-prescription-bottle-medical"></i>

                                    Prescription

                                </h3>

                                <?php 
                                    $queryMedi ="select * from medicines";
                                    $queryMediRun = mysqli_query($con,$queryMedi);
                                    $uniqueArrayType = [];
                                    while($queryMediData = mysqli_fetch_array($queryMediRun)){
                                        $uniqueArrayType[] = $queryMediData['MedicineType'];
                                    }

                                    $uniqueArrayType= array_unique($uniqueArrayType);

                                ?>

                                <div id="medicineContainer">

                                    <div class="medicine-row">

                                        <select class="medicine-type" name="medicineTypes[]">

                                            <option value=''>--Type--</option>
                                            <?php foreach($uniqueArrayType as $key=>$value) { ?>
                                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                            <?php } ?>

                                        </select>

                                         <select class="medicine-name" name="medicineNames[]">

                                            <option value=''>--Name--</option>
                                            <?php  
                                            $queryMediNameRun = mysqli_query($con,$queryMedi);
                                            while($queryMediRecord = mysqli_fetch_array($queryMediNameRun)){ ?>
                                                <option value="<?php echo $queryMediRecord['medicineId']; ?>"><?php echo $queryMediRecord['MedicineName']; ?></option>
                                            <?php } ?>

                                        </select>


                                        <select class="medicine-dosage" name="medicineDosage[]">

                                            <option value=''>--dosage--</option>
                                            <option value='0-0-0'>0-0-0</option>
                                            <option value='0-0-1'>0-0-1</option>
                                            <option value='0-1-0'>0-1-0</option>
                                            <option value='1-0-0'>1-0-0</option>
                                            <option value='1-1-0'>1-1-0</option>
                                            <option value='1-0-1'>1-0-1</option>
                                            <option value='1-1-1'>1-1-1</option>
                                    

                                        </select>
                                        <input type="number" class="medicine-days" placeholder="5" name="totalDays[]">

                                        <select class="medicine-time" name="totalTimes[]">

                                            <option>Before Meal</option>

                                            <option>After Meal</option>

                                            <option>Morning</option>

                                            <option>Night</option>

                                        </select>

                                    </div>

                                </div>

                                <button type="button" id="addMedicineBtn" class="add-medicine-btn">

                                    <i class="fa-solid fa-plus"></i>

                                    Add Medicine

                                </button>

                            </div>


                            <!--=========================================
        TESTS & ADVICE
==========================================-->

                            <div class="treatment-section">

                                <h3>

                                    <i class="fa-solid fa-flask-vial"></i>

                                    Test & Advice

                                </h3>

                                <div class="treatment-form-grid">

                                    <div class="treatment-form-group">

                                        <label>

                                            Recommended Tests

                                        </label>

                                        <textarea id="recommendedTests" rows="5" name="tests"
                                            placeholder="Blood Test, ECG, X-Ray, MRI..."></textarea>

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Doctor's Advice

                                        </label>

                                        <textarea id="doctorAdvice" rows="5" name="advice"
                                            placeholder="Provide medical advice for the patient..."></textarea>

                                    </div>

                                </div>

                            </div>


                            <!--=========================================
        FOLLOW UP
==========================================-->

                            <div class="treatment-section">

                                <h3>

                                    <i class="fa-solid fa-calendar-days"></i>

                                    Follow Up

                                </h3>

                                <div class="treatment-form-grid">

                                    <div class="treatment-form-group">

                                        <label>

                                            Follow-up Date

                                        </label>

                                        <input type="date" name="followup_date" id="followUpDate">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Follow-up Notes

                                        </label>

                                        <input type="text" name="followup_notes" id="followUpNotes" placeholder="Review after 7 days">

                                    </div>

                                </div>

                            </div>


                            <!--=========================================
        ACTION BUTTONS
==========================================-->

                            <div class="treatment-actions">

                                <!-- <button type="button" class="treatment-save-btn" id="saveTreatmentBtn">

                                    <i class="fa-solid fa-floppy-disk"></i>

                                    Save Treatment

                                </button> -->

                                <button type="submit" name="patient_prescription" class="treatment-complete-btn">

                                    <i class="fa-solid fa-circle-check"></i>

                                    Complete Treatment

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>