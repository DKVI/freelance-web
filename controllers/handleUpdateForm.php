<?php
include_once "../config.php";
include_once "../models/database.php";
include_once "../models/link.php";
$conn = require "../inc/db.php";

$titleVN = $_POST["title_vn"];
$titleEN = $_POST["title_en"];
$link = $_POST["link"];

try {
    $form = new Link(1, "form", $link, $titleEN, $titleVN);
    Link::updateForm($conn, $form);
    echo '<script>alert("Add link successfully!");
        location.href="' . BASE_URL . '/admin/link";
    </script>
    ';
} catch (\Throwable $e) {
    echo '<script>alert("Add link failed, please try again!");
        location.href="' . BASE_URL . '/admin/link";
    </script>
    ';
}
