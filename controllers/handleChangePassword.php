<?php
include_once "../models/message.php";
include_once "../config.php";
include_once "../models/database.php";
include_once "../models/admin.php";
$conn = require "../inc/db.php";
include_once "../utils/index.php";

if (authenAdmin()) {
    if (isset($_POST["newPassword"]) && isset($_POST["currentPassword"])) {
        $newPassword = $_POST["newPassword"];
        $currentPassword = $_POST["currentPassword"];
        $admin = new Admin(1, $_SESSION["user_admin"], $currentPassword, "");
        $isValid = Admin::login($conn, $admin);
        if ($isValid) {
            $admin = new Admin(1, $_SESSION["user_admin"], $newPassword, "");
            Admin::changePassword($conn, $admin);
            echo '<script>alert("Change password successfully!");
                        location.href="' . BASE_URL . '/admin/login";
                    </script>';
        } else {
            echo '<script>alert("Password incorrect!");
                location.href="' . BASE_URL . '/admin/change-password";
            </script>';
        }
    }
}
