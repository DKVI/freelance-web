<?php
include_once "../models/message.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";

function parseStringToArray($string)
{
    $numberStrings = explode(",", $string);
    $numbers = array_map(function ($numString) {
        return (int) $numString;
    }, $numberStrings);
    return $numbers;
}

if (isset($_POST["idList"])) {
    $idList = $_POST["idList"];
    $idList = parseStringToArray($idList);
    try {
        foreach ($idList as $id) {
            Message::changeStatusAsUnRead($conn, $id);
        }
    } catch (\Throwable $e) {
        echo $e;
    }
} else {
    echo "false";
}
