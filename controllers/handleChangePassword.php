<?php
include_once "../models/message.php";
include_once "../config.php";
include_once "../models/database.php";
include_once "../models/admin.php";
$conn = require "../inc/db.php";

if (isset($_POST["newPassword"]) && isset($_POST["currentPassword"])) {
    $newPassword = $_POST["newPassword"];
    $currentPassword = $_POST["currentPassword"];
}