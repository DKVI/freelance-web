<?php
include_once "../config.php";
include_once "../models/database.php";
include_once "../models/link.php";
$conn = require "../inc/db.php";

if (isset($_GET["name"])) {
    $name = $_GET["name"];
    $titleVN = $_POST["title_vn"];
    $titleEN = $_POST["title_en"];
}