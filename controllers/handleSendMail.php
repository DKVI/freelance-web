<?php
session_start();
include_once "../models/admin.php";
include_once "../config.php";
include_once "../vendor/bootstrap.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";
include_once "../utils/index.php";
if (authenAdmin()) {
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $isAdmin = Admin::verifyEmail($conn, $email);
        if ($isAdmin) {
            echo '<form method="POST" class="d-none" action="../services/sendmail.php">
                <input name="email" value="' . $email . '">
            </form>
            <script>
                const form = document.querySelector("form");
                form.submit();
            </script>
            ';
        } else {
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
                        <p style="color: red"><b>' . $email . '</b> is not admin email, please try again!</p>
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
}
