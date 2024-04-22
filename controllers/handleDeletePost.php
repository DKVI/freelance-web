<?php
include "../models/database.php";
include "../models/post.php";
include "../config.php";
$conn = require "../inc/db.php";

if (isset($_GET['id'])) {
    $id = $_GET["id"];
    try {
        $news = Post::getById($conn, $id);
        $img_path = "../uploads/imgs/";
        $file_path = "../uploads/posts/";
        if (file_exists($img_path . $news->fileImg) && file_exists($file_path . $news->fileText)) {
            unlink($img_path . $news->fileImg);
            unlink($file_path . $news->fileText);
        }
        Post::delete($conn, $id);
        echo "<script>
            alert('Xóa post thành công');
            location.href='" . BASE_URL . "/admin/posts';  
        </script>";
    } catch (\Throwable $e) {
        echo "<script>
            alert('Xóa post thất bại, vui lòng thử lại!');
            location.href='" . BASE_URL . "/admin/posts';  
        </script>";
    }
}
