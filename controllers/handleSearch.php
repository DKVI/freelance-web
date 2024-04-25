<?php
include "../models/database.php";
include "../models/post.php";
include "../models/hashtag_post.php";
include "../config.php";
$conn = require "../inc/db.php";
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    try {
        $posts = Post::getByKeyword($conn, $keyword);
        echo json_encode($posts);
    } catch (\Throwable $e) {
        echo json_encode($e);
    }
}
