<?php
session_start();
include_once "../models/admin.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $admin = new Admin("1", $username, $password, "");
    $isValid = Admin::login($conn, $admin);
    if ($isValid) {
        $_SESSION["is_admin"] = true;
        $_SESSION["user_admin"] = $username;
        echo "<script>alert('Login successfully! Welcome back, admin!');
            location.href= '" . BASE_URL . "/admin/home" . "';
        </script>";
    } else {
        echo "<script>alert('Username or password incorrect, please try again!');
            location.href= '" . BASE_URL . "/admin/login" . "';
        </script>";
    }
}
