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
                            <br> <br> <br> <br>
                            
                            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html
  xmlns="http://www.w3.org/1999/xhtml"
  xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office"
>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Email Signature</title>
    <style type="text/css">
      body {
        text-align: center;
        margin: 0;
        padding: 0.625rem 0;
        -webkit-text-size-adjust: 100%;
        background-color: #f2f4f6;
        color: #274069;
      }
      td {
        padding: 0;
        vertical-align: top;
      }
      a {
        text-decoration: none !important;
        color: #274069;
      }
      p {
        margin: 0;
        font-size: 13px;
        line-height: 1.35rem;
        font-family: "Helvetica", Arial, sans-serif;
        font-weight: 400;
        text-decoration: none;
        color: #274069 !important;
      }
      h1 {
        text-align: left;
        margin: 0;
        font-size: 1.6rem;
        font-family: "Times New Roman", Times, serif;
        color: #274069 !important;
      }
      h2 {
        margin: 0;
        font-weight: lighter;
        font-style: italic;
      }
      table {
        background-color: #fff;
        /* overflow: hidden; */
        /* background-image: url(https://lh3.googleusercontent.com/pw/AP1GczPt3hcWVzijFIkB8_BEHHSjrzaUxE9TWYOsuU5r--EZ8nU_qrh81TuLaSpq_h5AiYxE81XdQ4IEZ52x6yUSJc9cFL05X58xyduA10t3-cipaNRHgg=w2400); */
        /* background-size: cover; */
        width: 500px;
        max-width: 500px;
        vertical-align: top;
      }
    </style>
  </head>
  <body>
    <div style="text-align: justify">
      <table>
        <tbody>
          <tr>
            <!-- <td
              style="
                width: 8.5rem;
                padding: 0.5rem 0 0.3rem;
                text-align: center;
              "
              width="252"
            > -->
            <!-- <img
                style="max-width: 10rem; max-height: 8rem"
                alt="Logo"
                src="https://lh3.googleusercontent.com/pw/AP1GczM96g3a1h9iIFJDJ_sW1ITbwNa-B4lD3XvwtlSw1C2cc8hjU-dQirT3uEIMGol3tGgAbGtSf5DeQyoBR1Y5_9uq8ndKgdFL330B1N5wHDqTZ_ySxA=w2400"
                align="left"
                width="160"
                height="160"
              /> -->
            <td style="width: 180px" width="252">
              <img
                style="
                  max-width: 160px;
                  height: 160px;
                  width: 160px;
                  padding: 0;
                "
                alt="Logo"
                src="https://lh3.googleusercontent.com/pw/AP1GczM2By67ZAHdiutCe2sePhjmNtZIJrawvIiDJ0sdlTiFKWRFsX3eGlkcHdSrVYH7Mb8c3iMQrzaUIt7cntt-UkVoN85CyrOoWhc42hLSCgN9_aVdKw=w2400"
                align="center"
              />
            </td>

            <td style="width: 400px">
              <h1>Mooting Summer School</h1>
              <h2 style="margin-bottom: 10px; font-size: 16px">
                A mooting masterclass
              </h2>
              <p>
                <img
                  style="width: 0.8rem; padding: 0; margin: 0"
                  src="https://lh3.googleusercontent.com/pw/AP1GczM9B-ar4BGtGss1uMcZ17kOMGHMGQKyaQvDcBZA2R-Uvp-C8EukM7DjrSJ7Ut11gkUX7lgVHN80iUgBBokNc-IUVJ9ZQzgSn-TZBUd1l2zujR6WPA=s100-p-k"
                  align="center"
                />&nbsp;&nbsp;
                <a href="mailto:info@mootingsummerschool.com"
                  >info@mootingsummerschool.com</a
                >
              </p>
              <p>
                <img
                  style="width: 0.8rem; padding: 0; margin: 0"
                  src="https://lh3.googleusercontent.com/pw/AP1GczOXr0wK8kk8AAoHX3b0fQSfOqtrFvKiK-ruqiUDyvVUgnZocXe2pX2x6fY66vTgp6FDqSWh7JucoVhHfHHy99AMpcYi7L8_XfUHYpnLPckJybO3hQ=s100-p-k"
                  align="center"
                />&nbsp;&nbsp;
                <a href="https://mootingsummerschool.com" target="_blank"
                  >www.mootingsummerschool.com</a
                >
              </p>
              <p>
                <img
                  style="width: 0.8rem; padding: 0; margin: 0"
                  src="https://lh3.googleusercontent.com/pw/AP1GczOSzf5ag_q474s6SQ7cEugIMmZ3UjX1sfZw0Ye6TXbX4pVNC6yZVjDHaOcUtisPObFDE5yv2Pd7bcEf5HkVpWWp9akqQh3YZT7_HkVeOBvuy04KoQ=s100-p-k"
                  align="center"
                />&nbsp;&nbsp;
                <a
                  href="https://www.linkedin.com/company/mooting-summer-school/"
                  target="_blank"
                  >Mooting Summer School</a
                >
              </p>
              <p>
                <img
                  style="width: 0.8rem; padding: 0; margin: 0"
                  src="https://lh3.googleusercontent.com/pw/AP1GczMgUMoFAQsgpQOxRfY2PcKuCcIqxS-GH5YEj_U31-5a8AgNzCTqtzN3kApz9Gq2NEGpRfXp7n0oz_7RGa-SvK5b3PLG-gGequNt7BmniM0PVY8Gow=s100-p-k"
                  align="center"
                />&nbsp;&nbsp;
                <a
                  href="https://www.facebook.com/MootingSummerSchool"
                  target="_blank"
                  >Mooting Summer School</a
                >
              </p>
            </td>
          </tr>
        </tbody>
      </table>
      <table align="left" style="text-align: justify; padding: 0">
        <tbody>
          <tr>
            <td width="600">
              <p
                style="
                  font-size: 0.7rem;
                  line-height: 1rem;
                  font-family: "Times New Roman", Times, serif;
                  font-style: italic;
                  text-align: justify;
                  padding: 0;
                  margin: auto 10px;
                "
              >
                This email is strictly confidential and may be legally
                privileged. It is intended solely for the addressee. It should
                not be copied or used for any other purposes, nor should its
                content be disclosed to any other person without consent from
                the sender. If you are not the intended recipient, please delete
                it and notify the sender immediately.
              </p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
