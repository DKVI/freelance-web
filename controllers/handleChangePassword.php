<?php
include_once "../models/message.php";
include_once "../config.php";
include_once "../models/database.php";
include_once "../models/admin.php";
$conn = require "../inc/db.php";

if (isset($_POST["newPassword"]) && isset($_POST["currentPassword"])) {
    $newPassword = $_POST["newPassword"];
    $currentPassword = $_POST["currentPassword"];
    $admin = new Admin(1, "mootingsummeradmin", $currentPassword, "");
    $isValid = Admin::login($conn, $admin);
    if ($isValid) {
        $admin = new Admin(1, "mootingsummeradmin", $newPassword, "");
        Admin::changePassword($conn, $admin);
        echo '<script>alert("Đổi mật khẩu thành công!");
                    location.href="' . BASE_URL . '/admin/home";
                </script>';
    } else {
        echo '<script>alert("Mật khẩu không chính xác!");
            location.href="' . BASE_URL . '/admin/change-password";
        </script>';
    }
}