<?php
session_start();
include_once "../models/hashtag.php";
include_once "../models/hashtag_post.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";
include_once "../utils/index.php";

if (authenAdmin()) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        try {
            HashtagPost::deteleByHashtagId($conn, $id);
            Hashtag::deleteById($conn, $id);
            echo '<script>alert("Delete hashtag successfully!");
                    location.href="' . BASE_URL . '/admin/hashtag";
                </script>';
        } catch (\Throwable $e) {
            echo '<script>alert("Delete hashtag failed, please try again!");
                    location.href="' . BASE_URL . '/admin/hashtag";
                </script>
                ';
        }
    }
}