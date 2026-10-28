<?php

include("Admin_panel/dbconfig.php");

if(isset($_POST['medicinePrescriptionId'])){
    $mediPreId = $_POST['medicinePrescriptionId'];
    $queryMediPreDelete = "delete from medicine_prescriptions where `mediPresId`='$mediPreId'";
    $queryMediPreDeleteRun = mysqli_query($con,$queryMediPreDelete);
}

$presId = $_POST['presId'];

$queryMedi ="select * from medicines";
$queryMediRun = mysqli_query($con,$queryMedi);
$uniqueArrayType = [];
while($queryMediData = mysqli_fetch_array($queryMediRun)){
    $uniqueArrayType[] = $queryMediData['MedicineType'];
}

$uniqueArrayType= array_unique($uniqueArrayType);

$queryPreMedicine ="select medicines.*,medicine_prescriptions.* from medicine_prescriptions join medicines on medicines.medicineId=medicine_prescriptions.mediIds where medicine_prescriptions.presMediIds='$presId'";
$queryPreMedicineRun = mysqli_query($con,$queryPreMedicine);
while($queryPreMedieRecord = mysqli_fetch_array($queryPreMedicineRun)){


?>
    <div class="medicine-row">

    <input type="hidden" name="medicine_Pre_hidden_ids[]" value="<?php if(isset($queryPreMedieRecord['mediPresId'])) { echo $queryPreMedieRecord['mediPresId']; } else {echo "";} ?>"/>

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