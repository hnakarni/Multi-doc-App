<?php
include("dbconfig.php");

if(isset($_GET['email']) && isset($_GET['token'])){
    $email = $_GET['email'];
    $token = $_GET['token'];
    $query = "select * from doctors where `email`='$email' AND `token`='$token'";
    $queyrRun = mysqli_query($con,$query);
    if($queyrRun){
            echo "<h2>Doctors Verification is Successfully Done</h2>";
            echo "<h3><a href='../doctor-newpassword.php?token=".$token."'>Goto Doctor New Password</a></h3>";
    }
    else{
        header('location:../doctor-login.php');
    }
}
else{
    header('location:../doctor-login.php');
}

?>