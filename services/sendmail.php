<?php
session_start();
include_once '../config.php';
include_once "../vendor/bootstrap.php";
include_once "../config.php";
include_once "../models/database.php";
include_once "../models/message.php";
include_once "../models/admin.php";
include_once "../models/post.php";
include_once "../utils/index.php";
//instance database
$conn = require "../inc/db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
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
        $admin = new Admin(1, "", $newPassword, $email);
        Admin::changePasswordAfterVerify($conn, $admin);
        $mail->Subject = 'RESET ADMIN PASSWORD';
        $mail->Body    = 'You have requested to reset your password. This is a temporary password. Please change it immediately upon logging in! Password is: <b>' . $newPassword . '</b>
        <a href="http://www.google.com">If not you, please enter this link</a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo '<div class="min-vh-100 min-vw-100 d-flex">
        <div class="shadow m-auto w-50 d-flex flex-column rounded-5" style="height: 300px">
            <div class="h-50 w-100 position-relative">
                <div class="d-flex rounded-circle position-absolute shadow"
                    style="height: 200px; width: 200px; background-color: #0ad50a; bottom: 0; left:50%; transform: translate(-50%, -25%);">
                    <i class="fa-solid fa-envelope-circle-check m-auto" style="color: white; font-size:
                    100px;"></i>
                </div>
            </div>
            <div class="h-50 w-100 px-5 text-center flex-column d-flex" style="gap: 32px">
                <div class="d-inline-block">
                    <p style="color: green">Password reset successful, please check your email <b>' . $email . '</b>
to log in with
a
temporary
password. Remember to change password after login!</p>
</div>
<div class="d-flex">
    <a class="m-auto w-50 btn btn-outline-success shadow fw-bold" href="' . BASE_URL . '/admin/login">Login</a>
</div>
</div>
</div>
</div>';
    } catch (Exception $e) {
        echo '<div class="min-vh-100 min-vw-100 d-flex">
        <div class="shadow m-auto w-50 d-flex flex-column rounded-5" style="height: 300px">
            <div class="h-50 w-100 position-relative">
                <div class="d-flex rounded-circle position-absolute shadow"
                    style="height: 200px; width: 200px; background-color: red; bottom: 0; left:50%; transform: translate(-50%, -25%);">
                    <i class="fa-solid fa-xmark m-auto" style="color: white; font-size: 100px;"></i>
                </div>
            </div>
            <div class="h-50 w-100 px-5 text-center flex-column d-flex" style="gap: 32px">
                <div class="d-inline-block">
                    <p style="color: red">Server got some error, please try again!</p>
</div>
<div class="d-flex">
    <a class="m-auto w-50 btn btn-outline-danger shadow fw-bold" href="' . BASE_URL . '/admin/verifyEmail">Try
        Again</a>
</div>
</div>
</div>
</div>';
    }
}
