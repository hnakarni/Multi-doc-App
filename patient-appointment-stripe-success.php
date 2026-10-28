<?php

include("frontend_header.php");

if (isset($_GET['session_id'])) {
    \Stripe\Stripe::setApiKey(STRIPE_TEST_SK);
    $response = \Stripe\Checkout\Session::retrieve($_GET['session_id']);
    $paymentIntent = $response->payment_intent; // Transaction Id


     $scheduleId = $_SESSION['scheduleId'];
        // Insert into database
        $scheduleRecord = "select * from doctor_schedule where `doctorScheduleId`='$scheduleId'";
        $scheduleRecordRun = mysqli_query($con,$scheduleRecord);
        $scheduleArray = mysqli_fetch_array($scheduleRecordRun);
       

        $docId = $_SESSION['doctorId'];
        $paymentMethod = $_SESSION['paymentMethod'];
        $patientId = $_SESSION['patientData']['id'];
        $serialNo = $scheduleArray['booked']+1;
        $orderNo = time();
        $fees = $_SESSION['fees'];
        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d H:i:s');
        $updated_date = date('Y-m-d H:i:s');
        $appointmentQuery ="insert into appointments(`scheduleId`,`doctorId`,`patientId`,`serialNo`,`orderNo`,`paidAmount`,`paymentMethod`,`paymentStatus`,`TranscationId`,`created_date`,`updated_date`)values('$scheduleId','$docId','$patientId','$serialNo','$orderNo','$fees','$paymentMethod','Paid','$paymentIntent','$created_date','$updated_date')";
        $appointmentQueryRun = mysqli_query($con,$appointmentQuery);
        if($appointmentQueryRun){
            $updateDoctorSchedule = "update doctor_schedule set `booked`='$serialNo' where `doctorScheduleId`='$scheduleId'";
            $updateDoctorScheduleRun = mysqli_query($con,$updateDoctorSchedule);
            unset($_SESSION['scheduleId']); unset($_SESSION['doctorId']);unset($_SESSION['paymentMethod']);
            unset($_SESSION['fees']);
            $_SESSION['paypalSuccess'] = "Patient payment & Booked Appointment Successfully";
            header("location:make-appointment.php");
        }
        
} else {
    echo "Payment failed!";
}


?>