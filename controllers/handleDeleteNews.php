<?php
include "../models/database.php";
include "../models/post.php";
include "../config.php";
$conn = require "../inc/db.php";

if (isset($_GET['id'])) {
    $id = $_GET["id"];
    try {
        $news = Post::getById($conn, $id);
        $img_path = "../assets/imgs/";
        $file_path = "../uploads/news/";
        if (file_exists($img_path . $news->fileImg) && file_exists($file_path . $news->fileText)) {
            unlink($img_path . $news->fileImg);
            unlink($file_path . $news->fileText);
        }
        Post::delete($conn, $id);
        echo "xóa thành công!";
    } catch (\Throwable $e) {
        echo "xảy ra lỗi!";
    }
}
