<?php
include_once "../models/hashtag.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";
include_once "../utils/index.php";

if (authenAdmin()) {
    if (isset($_POST['hashtag'])) {
        try {
            $hashtag = $_POST['hashtag'];
            $hashtag = new Hashtag(1, $hashtag);
            Hashtag::add($conn, $hashtag);
            echo '<script>alert("Create hashtag successfully!");
                        location.href="' . BASE_URL . '/admin/hashtag";
                    </script>
                    ';
        } catch (\Throwable $e) {
            echo '<script>alert("Create hashtag failed, please try again!");
                        location.href="' . BASE_URL . '/admin/hashtag";
                    </script>
                    ';
        }
    }
}
