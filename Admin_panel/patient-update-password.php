<?php
include("dbconfig.php");

if(isset($_GET['email']) && isset($_GET['token'])){
    $email = $_GET['email'];
    $token = $_GET['token'];
    $query = "select * from patients where `email`='$email' AND `token`='$token'";
    $queyrRun = mysqli_query($con,$query);
    if($queyrRun){
            echo "<h2>Patient Verification is Successfully Done</h2>";
            echo "<h3><a href='../patient-newpassword.php?token=".$token."'>Goto Patient New Password</a></h3>";
    }
    else{
        header('location:../patient-register.php');
    }
}
else{
    header('location:../patient-register.php');
}

?>