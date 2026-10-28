 <?php
 
include("Admin_panel/dbconfig.php");
    $queryMedi ="select * from medicines";
    $queryMediRun = mysqli_query($con,$queryMedi);
    $uniqueArrayType = [];
    while($queryMediData = mysqli_fetch_array($queryMediRun)){
        $uniqueArrayType[] = $queryMediData['MedicineType'];
    }

    $uniqueArrayType= array_unique($uniqueArrayType);


    $medicineRow = $_POST['medicineRowCount']+1;
?>



<div class="medicine-row" id="medicinePrescription<?php echo $medicineRow; ?>">

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

    <icon class="fa fa-trash" onclick="removeMedicineRow('<?php echo $medicineRow; ?>')"></icon>

</div>