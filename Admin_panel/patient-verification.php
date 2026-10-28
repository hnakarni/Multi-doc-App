<?php
include("dbconfig.php");

if(isset($_GET['email']) && isset($_GET['token'])){
    $email = $_GET['email'];
    $token = $_GET['token'];
    $query = "select * from patients where `email`='$email' AND `token`='$token'";
    $queyrRun = mysqli_query($con,$query);
    if($queyrRun){
        $updateStatus = "update patients set `status`='Active' where `email`='$email' AND `token`='$token'";
        $updateStatusRun = mysqli_query($con,$updateStatus);
        if($updateStatusRun){
            echo "<h2>Patient Verification is Successfully Done</h2>";
            echo "<h3><a href='../patient-login.php'>Goto Patient Login</a></h3>";
        }
        else{
            echo "<h2><a href=''>Goto Patient Register Page</a></h2>";
        }
    }
    else{
        header('location:../patient-register.php');
    }
}
else{
    header('location:../patient-register.php');
}

?>