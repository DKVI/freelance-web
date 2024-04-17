<?php
include_once "../models/hashtag.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";


if (isset($_POST['hashtag'])) {
    try {
        $hashtag = $_POST['hashtag'];
        $hashtag = new Hashtag(1, $hashtag);
        Hashtag::add($conn, $hashtag);
        echo '<script>alert("Create hashtag thành công!");
                    location.href="' . BASE_URL . '/admin/hashtag";
                </script>
                ';
    } catch (\Throwable $e) {
        echo '<script>alert("Create hashtag thất bại, vui lòng thử lại!");
                    location.href="' . BASE_URL . '/admin/hashtag";
                </script>
                ';
    }
}
