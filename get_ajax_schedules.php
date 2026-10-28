<?php
include("Admin_panel/dbconfig.php");


if(isset($_POST['doctorId'])){
    $doctorId = $_POST['doctorId'];
    $doctorQuery = "select distinct scheduleDate from doctor_schedule where `doctor_id`='$doctorId' AND `scheduleDate`>=CURDATE() order by scheduleDate";
    $doctorQueryRun = mysqli_query($con,$doctorQuery);

    $doctorOption = "<option value=''>--select Schedule Date--</option>";
    while($docData = mysqli_fetch_array($doctorQueryRun)){
        $doctorOption .= "<option value='".$docData['scheduleDate']."'>".$docData['scheduleDate']."</option>";
    }

    echo $doctorOption;
}

?>