<?php
include("Admin_panel/dbconfig.php");


if(isset($_POST['doctorId']) && isset($_POST['scheduleDate'])){
    $doctorId = $_POST['doctorId'];
    $scheduleDate = $_POST['scheduleDate'];

    $doctorQuery = "select * from doctor_schedule where `doctor_id`='$doctorId' AND `scheduleDate`='$scheduleDate'";
    $doctorQueryRun = mysqli_query($con,$doctorQuery);

    $doctorOption = "<option value=''>--select Slots--</option>";
    while($docData = mysqli_fetch_array($doctorQueryRun)){
        $availbleSlots = $docData['capacity']- $docData['booked'];
        if($availbleSlots!=0){
            $doctorOption .= "<option value='".$docData['doctorScheduleId']."'>".$docData['start_time']." - ".$docData['end_time']." (".$availbleSlots." Slots Available)</option>";
        }
    }

    echo $doctorOption;
}

?>