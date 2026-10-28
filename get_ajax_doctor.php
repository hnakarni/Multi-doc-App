<?php
include("Admin_panel/dbconfig.php");


if(isset($_POST['departmentId'])){
    $departId = $_POST['departmentId'];
    $doctorQuery = "select id,name from doctors where `departmentId`='$departId'";
    $doctorQueryRun = mysqli_query($con,$doctorQuery);

    $doctorOption = "<option value=''>--select Doctor--</option>";
    while($docData = mysqli_fetch_array($doctorQueryRun)){
        $doctorOption .= "<option value='".$docData['id']."'>".$docData['name']."</option>";
    }

    echo $doctorOption;
}

?>