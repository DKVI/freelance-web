<?php
session_start();
include_once './config.php';
include_once "./vendor/bootstrap.php";
include_once "./config.php";
include_once "./models/database.php";
include_once "./models/message.php";
include_once "./models/post.php";
include_once "./utils/index.php";
//instance database
$conn = require "./inc/db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);                              // Khai báo hàm
$email = '';
if (isset($_POST['email'])) {
    $email = $_POST["email"];
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@mootingsummerschool.com';
        $mail->Password   = 'Tw!stedF4te';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        //Recipients
        $mail->setFrom('info@mootingsummerschool.com', 'Mooting Summer School');
        $mail->addAddress($email, 'Admin');     //Add a recipient

        //Content
        $mail->isHTML(true);
        $newPassword = uniqid() . rand(1000, 9999);
        $mail->Subject = 'RESET ADMIN PASSWORD';
        $mail->Body    = 'You have requested to reset your password. This is a temporary password. Please change it immediately upon logging in! Password is: <b>' . $newPassword . '</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
