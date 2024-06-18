<?php
include_once "../config.php";
include_once "../models/database.php";
include_once "../models/link.php";
$conn = require "../inc/db.php";

if (isset($_GET["name"])) {
    $name = $_GET["name"];
    $link = $_POST["link"];
    try {
        Link::updateByName($conn, $name, $link);
        echo '<script>alert("Update link successfully!");
            location.href="' . BASE_URL . '/admin/link";
        </script>
        ';
    } catch (Exception $e) {
        echo '<script>alert("Update link failed, please try again!");
            location.href="' . BASE_URL . '/admin/link";
        </script>
        ';
    }
}
