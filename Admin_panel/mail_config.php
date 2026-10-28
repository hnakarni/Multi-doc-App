<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // if using composer

$mail = new PHPMailer(true);

try {
   // SMTP Settings
   $mail->isSMTP();
   $mail->Host       = 'smtp.gmail.com';
   $mail->SMTPAuth   = true;
   $mail->Username   = 'piyush0101nakarani@gmail.com';
   $mail->Password   = 'xncpaoqphwonlllb'; // Gmail App Password
   $mail->SMTPSecure = 'tls';
   $mail->Port       = 587;

   // Sender
   $mail->setFrom('piyush0101nakarani@gmail.com', 'RNW');

   // Receiver
   $email = $_SESSION['adminEmail'];
   $mail->addAddress($email);

   // Content
   $otp = rand(100000,999999);
   $_SESSION['adminOtp'] = $otp;

   $mail->isHTML(true);
   $mail->Subject = 'Your OTP is here!!!';
   $mail->Body    = "<h3>Your otp is below:</h3><br><b>OTP: $otp</b> <br> Enter Your OTP on Forget Page";

    $mail->send();
    header('location:verify_otp.php');
} catch (Exception $e) {
   echo "Message could not be sent. Error: {$mail->ErrorInfo}";

}
?>
