<?php
include_once "../models/message.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    Message::changeStatusAsRead($conn, $id);
}
