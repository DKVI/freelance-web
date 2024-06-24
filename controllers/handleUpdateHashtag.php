<?php
session_start();
include_once "../models/hashtag.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";
include_once "../utils/index.php";
if (authenAdmin()) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST["hashtag"])) {
            try {
                $hashtag = $_POST["hashtag"];
                $hashtag = new HashTag($id, $hashtag);
                Hashtag::updateById($conn, $hashtag);
                echo '<script>alert("Update hashtag successfuly!");
                    location.href="' . BASE_URL . '/admin/hashtag";
                </script>
                ';
            } catch (\Throwable $e) {
                echo '<script>alert("Update hashtag failed, please try again!");
                    location.href="' . BASE_URL . '/admin/hashtag";
                </script>
                ';
            }
        }
    }
}