<?php
include "../models/database.php";
include "../models/message.php";
include "../config.php";
$conn = require "../inc/db.php";
$name = json_decode(file_get_contents("php://input"), true)["name"];
$email = json_decode(file_get_contents("php://input"), true)["email"];
$phone = json_decode(file_get_contents("php://input"), true)["phone"];
$message = json_decode(file_get_contents("php://input"), true)["message"];
$date = date("Y-m-d");
try {
    $message = new Message(1, $name, $email, $message, "pending", $date, $phone);
    Message::addMessages($conn, $message);
    echo "true";
} catch (\Throwable $e) {
    echo "false";
}
