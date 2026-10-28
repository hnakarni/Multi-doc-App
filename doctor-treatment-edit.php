<?php include("frontend_header.php");

if(!isset($_GET['prescriptionId'])){
    header("location:doctor-all-appointments.php");
}

$presId = $_GET['prescriptionId'];
$dataExit = "select * from prescriptions where `prescriptionId`='$presId'";
$dataExitRun = mysqli_query($con,$dataExit);
$dataExitRecord = mysqli_fetch_array($dataExitRun);
if(!$dataExitRecord){
    header("location:doctor-all-appointments.php");
}

$appsPresId = $dataExitRecord['appointmentId'];



    $query = "select t1.*,t2.scheduleDate as scdate,t2.start_time, t2.end_time,t3.name,t3.departmentId,t3.id as docsIds,t4.name as departName,t3.fees, t5.patientid as ptId,t5.name as pName,t5.phone as pPhone,t5.dob,t5.gender,t5.email,t5.blood_group,t5.id as patiIds from appointments as t1 JOIN doctor_schedule as t2 on t1.scheduleId=t2.doctorScheduleId JOIN doctors as t3 on t3.id=t1.doctorId JOIN departments as t4 on t4.departmentId=t3.departmentId JOIN patients as t5 on t5.id=t1.patientId where t1.appointmentId='$appsPresId'";
    $queryRun = mysqli_query($con,$query);
    $queryData = mysqli_fetch_array($queryRun);



    if(isset($_POST['patient_prescription'])){
        try{

            $medicineTypes = isset($_POST['medicineTypes'])?$_POST['medicineTypes']:"";
            $medicineNames = isset($_POST['medicineNames'])?$_POST['medicineNames']:"";
            $medicineDosage = isset($_POST['medicineDosage'])?$_POST['medicineDosage']:"";
            $totalDays = isset($_POST['totalDays'])?$_POST['totalDays']:"";
            $totalTimes = isset($_POST['totalTimes'])?$_POST['totalTimes']:"";
            $medicine_Pre_hidden_ids = isset($_POST['medicine_Pre_hidden_ids'])?$_POST['medicine_Pre_hidden_ids']:"";

            // echo "<pre>";
            // print_r($medicineTypes);
            // print_r($medicineNames);
            // print_r($medicineDosage);
            // print_r($totalDays);
            // print_r($totalTimes);
            // print_r($medicine_Pre_hidden_ids);
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
            
            date_default_timezone_set('Asia/Kolkata');
            $created_date = date('Y-m-d H:i:s');
            $updated_date = date('Y-m-d H:i:s');

           

            if($height==''){
                throw new Exception("height is required");
            }
            else{
                 $queryPres = "update prescriptions set `height`='$height',`weight`='$weight',`tempreture`='$tempreture',`blood_pressure`='$blood_pressure',`pulse`='$pulse',`respiration`='$respiration',`habits`='$habits',`symptoms`='$symptoms',`diagnosis`='$diagnosis',`problemDescription`='$problem_description',`test`='$tests',`advice`='$advice',`followup_date`='$followup_date',`followup_notes`='$followup_notes',`updated_date`='$updated_date' where `prescriptionId`='$presId'";

                 $queryPresRun = mysqli_query($con,$queryPres);
                 if($queryPresRun){

                    for($i=0; $i<sizeof($medicineTypes);$i++){
                        $singleMediType = $medicineTypes[$i];
                        $singleMediIds = $medicineNames[$i];
                        $singleMediDosage = $medicineDosage[$i];
                        $singleTotalDay = $totalDays[$i];
                        $singleTotalTime = $totalTimes[$i];

                        if(isset($medicine_Pre_hidden_ids[$i])){
                            $mediPPresId = $medicine_Pre_hidden_ids[$i];
                            $mediPreQuery = "update medicine_prescriptions set `mediIds`='$singleMediIds',`dosage`='$singleMediDosage',`total_days`='$singleTotalDay',`total_times`='$singleTotalTime',`updated_dae`='$updated_date' where `mediPresId`='$mediPPresId'";
                        }
                        else{
                            $mediPreQuery = "insert into medicine_prescriptions(`presMediIds`,`mediIds`,`dosage`,`total_days`,`total_times`,`created_date`,`updated_dae`)values('$presId','$singleMediIds','$singleMediDosage','$singleTotalDay','$singleTotalTime','$created_date','$updated_date')";
                        }
                        $mediPreQueryRun = mysqli_query($con,$mediPreQuery);
                    }
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

                                            <?php if(isset($_GET['prescriptionId'])){ ?>
                                                <span class="appointment-status completed">
                                                    Completed
                                                </span>
                                            <?php } else{ ?>
                                                <span class="appointment-status pending">
                                                    Pending
                                                </span>
                                            <?php } ?>


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

                                        <input type="number" name="height" id="height" placeholder="170" value="<?php if(isset($dataExitRecord['height'])){echo $dataExitRecord['height']; }?>">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Weight (kg)

                                        </label>

                                        <input type="number" name="weight" id="weight" placeholder="65" value="<?php if(isset($dataExitRecord['weight'])){echo $dataExitRecord['weight']; }?>">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Temperature (°C)

                                        </label>

                                        <input type="number" name="tempreture" step="0.1" id="temperature" placeholder="36.8" value="<?php if(isset($dataExitRecord['tempreture'])){echo $dataExitRecord['tempreture']; }?>">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Pulse (Per Minute)

                                        </label>

                                        <input type="number" name="pulse" id="pulse" placeholder="72" value="<?php if(isset($dataExitRecord['pulse'])){echo $dataExitRecord['pulse']; }?>">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Respiration (Per Minute)

                                        </label>

                                        <input type="number" name="respiration" id="respiration" placeholder="18" value="<?php if(isset($dataExitRecord['respiration'])){echo $dataExitRecord['respiration']; }?>">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Blood Pressure

                                        </label>

                                        <input type="text" name="blood_pressure" id="bloodPressure" placeholder="120 / 80" value="<?php if(isset($dataExitRecord['blood_pressure'])){echo $dataExitRecord['blood_pressure']; }?>">

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
                                        <?php $habitAuto = explode(',',$dataExitRecord['habits']);?>
                                         <select name="habits[]" id="habits" class="medicine-type" multiple>
                                            <?php foreach($habitArray as $key=>$value){ ?>
                                                 <option value="<?php echo $value; ?>" 
                                                 <?php if(in_array($value,$habitAuto)) { echo "selected"; } ?>><?php echo $value; ?></optio>
                                            <?php } ?>
                                            
                                            
                                        </select>

                                        
                                        
                                    </div>
                                    
                                    <div class="treatment-form-group">
                                        
                                        <label>
                                            
                                            Symptoms
                                            
                                        </label>
                                        <?php $symptomsAuto = explode(',',$dataExitRecord['symptoms']);?>
                                        <select name="symptoms[]" id="symptoms" class="medicine-type" multiple>
                                             <?php foreach($symptomsArray as $key=>$value){ ?>
                                                  <option value="<?php echo $value; ?>"  <?php if(in_array($value,$symptomsAuto)) { echo "selected"; } ?>><?php echo $value; ?></optio>
                                             <?php } ?>
                                             
                                            </select>
                                            
                                            
                                            
                                        </div>
                                        
                                        <div class="treatment-form-group">
                                            
                                            <label>
                                                
                                                Diagnosis
                                                
                                            </label>
                                             <?php $diagnosisAuto = explode(',',$dataExitRecord['diagnosis']);?>
                                            <select name="diagnosis[]" id="diagnosis" class="medicine-type" multiple>
                                                <?php foreach($diagnosisArray as $key=>$value){ ?>
                                                     <option value="<?php echo $value; ?>"  <?php if(in_array($value,$diagnosisAuto)) { echo "selected"; } ?>><?php echo $value; ?></optio>
                                                <?php } ?>
                                                
                                                </select>


                                    </div>

                                  

                                </div>


                                <div class="treatment-form-group treatment-full">

                                    <label>

                                        Problem Description

                                    </label>

                                    <textarea id="problemDescription" rows="5" name="problem_description"
                                        placeholder="Write complete examination details..."><?php echo $dataExitRecord['problemDescription'];?></textarea>

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


                                <?php

                                $queryPreMedicine ="select medicines.*,medicine_prescriptions.* from medicine_prescriptions join medicines on medicines.medicineId=medicine_prescriptions.mediIds where medicine_prescriptions.presMediIds='$presId'";
                                $queryPreMedicineRun = mysqli_query($con,$queryPreMedicine);
                                while($queryPreMedieRecord = mysqli_fetch_array($queryPreMedicineRun)){


                                ?>
                                   <div class="medicine-row">

                                     <input type="hidden" name="medicine_Pre_hidden_ids[]" value="<?php echo $queryPreMedieRecord['mediPresId']; ?>"/>

                                      <?php $singleMediTypData = $queryPreMedieRecord['MedicineType']; ?>

                                        <select class="medicine-type" name="medicineTypes[]">

                                            <option value=''>--Type--</option>
                                            <?php foreach($uniqueArrayType as $key=>$value) { ?>
                                                <option value="<?php echo $value; ?>" <?php if($singleMediTypData==$value){echo "selected"; }?>><?php echo $value; ?></option>
                                            <?php } ?>

                                        </select>

                                         <select class="medicine-name" name="medicineNames[]">

                                            <option value=''>--Name--</option>
                                            <?php  
                                            $queryMediNameRun = mysqli_query($con,$queryMedi);
                                            while($queryMediRecord = mysqli_fetch_array($queryMediNameRun)){ ?>
                                                <option value="<?php echo $queryMediRecord['medicineId']; ?>" <?php if($queryMediRecord['medicineId']==$queryPreMedieRecord['mediIds']){echo "selected"; }?>><?php echo $queryMediRecord['MedicineName']; ?></option>
                                            <?php } ?>

                                        </select>


                                        <select class="medicine-dosage" name="medicineDosage[]">

                                            <option value=''>--dosage--</option>
                                            <option value='0-0-0' <?php if($queryPreMedieRecord['dosage']=='0-0-0'){echo "selected"; }?>>0-0-0</option>
                                            <option value='0-0-1' <?php if($queryPreMedieRecord['dosage']=='0-0-1'){echo "selected"; }?>>0-0-1</option>
                                            <option value='0-1-0' <?php if($queryPreMedieRecord['dosage']=='0-1-0'){echo "selected"; }?>>0-1-0</option>
                                            <option value='1-0-0' <?php if($queryPreMedieRecord['dosage']=='1-0-0'){echo "selected"; }?>>1-0-0</option>
                                            <option value='1-1-0' <?php if($queryPreMedieRecord['dosage']=='1-1-0'){echo "selected"; }?>>1-1-0</option>
                                            <option value='1-0-1' <?php if($queryPreMedieRecord['dosage']=='1-0-1'){echo "selected"; }?>>1-0-1</option>
                                            <option value='1-1-1' <?php if($queryPreMedieRecord['dosage']=='1-1-1'){echo "selected"; }?>>1-1-1</option>
                                    

                                        </select>
                                        <input type="number" class="medicine-days" placeholder="5" name="totalDays[]" value="<?php echo $queryPreMedieRecord['total_days'];?>">

                                        <select class="medicine-time" name="totalTimes[]">

                                            <option value="Before Meal" <?php if($queryPreMedieRecord['total_times']=='Before Meal'){echo "selected"; }?>>Before Meal</option>

                                            <option value="After Meal" <?php if($queryPreMedieRecord['total_times']=='After Meal'){echo "selected"; }?>>After Meal</option>

                                            <option value="Morning" <?php if($queryPreMedieRecord['total_times']=='Morning'){echo "selected"; }?>>Morning</option>

                                            <option value="Night" <?php if($queryPreMedieRecord['total_times']=='Night'){echo "selected"; }?>>Night</option>

                                        </select>

                                        <icon class="fa fa-trash" onclick="removeFromDB('<?php echo $queryPreMedieRecord['mediPresId']; ?>','<?php echo $presId; ?>')"></icon>

                                    </div>

                                    <?php } ?>
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
                                            placeholder="Blood Test, ECG, X-Ray, MRI..."><?php echo $dataExitRecord['test'];?></textarea>

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Doctor's Advice

                                        </label>

                                        <textarea id="doctorAdvice" rows="5" name="advice"
                                            placeholder="Provide medical advice for the patient..."><?php echo $dataExitRecord['advice'];?></textarea>

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

                                        <input type="date" name="followup_date" id="followUpDate"  value="<?php if(isset($dataExitRecord['followup_date'])){echo $dataExitRecord['followup_date']; }?>">

                                    </div>

                                    <div class="treatment-form-group">

                                        <label>

                                            Follow-up Notes

                                        </label>

                                        <input type="text" name="followup_notes" id="followUpNotes" placeholder="Review after 7 days" value="<?php if(isset($dataExitRecord['followup_notes'])){echo $dataExitRecord['followup_notes']; }?>">

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

                                    Updated Treatment

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