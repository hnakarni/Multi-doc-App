<?php

include("frontend_header.php");

if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id' => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
    if ($response->isSuccessful()) {
        $arr_body = $response->getData();
 
        $payment_id = $arr_body['id'];
        // $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        // $payer_email = $arr_body['payer']['payer_info']['email'];
        // $amount = $arr_body['transactions'][0]['amount']['total'];
        // $currency = PAYPAL_CURRENCY;
        // $payment_status = $arr_body['state'];
 
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
        $appointmentQuery ="insert into appointments(`scheduleId`,`doctorId`,`patientId`,`serialNo`,`orderNo`,`paidAmount`,`paymentMethod`,`paymentStatus`,`TranscationId`,`created_date`,`updated_date`)values('$scheduleId','$docId','$patientId','$serialNo','$orderNo','$fees','$paymentMethod','Paid','$payment_id','$created_date','$updated_date')";
        $appointmentQueryRun = mysqli_query($con,$appointmentQuery);
        if($appointmentQueryRun){
            $updateDoctorSchedule = "update doctor_schedule set `booked`='$serialNo' where `doctorScheduleId`='$scheduleId'";
            $updateDoctorScheduleRun = mysqli_query($con,$updateDoctorSchedule);
            unset($_SESSION['scheduleId']); unset($_SESSION['doctorId']);unset($_SESSION['paymentMethod']);
            unset($_SESSION['fees']);
            $_SESSION['paypalSuccess'] = "Patient payment & Booked Appointment Successfully";
            header("location:make-appointment.php");
        }
        echo "Payment is successful. Your transaction id is: ". $payment_id;
    } else {
        echo $response->getMessage();
    }
} else {
    header('location: '.PAYPAL_CANCEL_URL);
}


?>