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
if (isset($_GET['email'])) {
    $email = $_GET["email"];
    $name = $_GET["name"];
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
        $mail->addAddress($email, $name);     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = "Thank you for your message!";
        $mail->Body    = 'Dear ' . $name . ',
                            <br> <br>
                            Thank you for taking the time to reach out to us. We appreciate your feedback and will do our best to respond to your inquiry as soon as possible.
                            <br><br>     
                            Please feel free to contact us again if you have any further questions.
                            <br> <br>
                            Sincerely,
                            <br><br> Mooting Summer School
                            <br> <br>
                            <br> <br>
                            Kính gửi ' . $name . ',
                            <br> <br>
                            Cảm ơn bạn đã dành thời gian phản hồi cho chúng tôi. Chúng tôi rất trân trọng ý kiến của bạn và sẽ cố gắng giải đáp thắc mắc của bạn trong thời gian sớm nhất có thể.
                            <br> <br>
                            Vui lòng liên hệ lại với chúng tôi nếu bạn có thêm bất kỳ câu hỏi nào.
                            <br> <br>
                            Trân trọng,
                            <br> <br>
                            Mooting Summer School
                            ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
