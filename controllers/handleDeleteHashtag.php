<?php
include_once "../models/hashtag.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        Hashtag::deleteById($conn, $id);
        echo '<script>alert("Delete hashtag thành công!");
                location.href="' . BASE_URL . '/admin/hashtag";
            </script>
            ';
    } catch (\Throwable $e) {
        echo '<script>alert("Delete hashtag thất bại, vui lòng thử lại!");
                location.href="' . BASE_URL . '/admin/hashtag";
            </script>
            ';
    }
}
