<?php
session_start();
include "../models/database.php";
include "../models/post.php";
include "../config.php";
include "../models/hashtag_post.php";
$conn = require "../inc/db.php";
include_once "../utils/index.php";

if (authenAdmin()) {
    if (isset($_GET['id'])) {
        $id = $_GET["id"];
        try {
            $news = Post::getById($conn, $id);
            $img_path = "../uploads/imgs/";
            $file_path = "../uploads/posts/";
            if ($news->fileImg == "default.png" && file_exists($img_path . $news->fileImg) && file_exists($file_path . $news->fileText)) {
                unlink($file_path . $news->fileText);
            } else if ($news->fileImg != "default.png" && file_exists($img_path . $news->fileImg) && file_exists($file_path . $news->fileText)) {
                unlink($img_path . $news->fileImg);
                unlink($file_path . $news->fileText);
            }
            HashtagPost::deleteByPostId($conn, $id);
            Post::delete($conn, $id);
            echo "<script>
                alert('Delete post successfully!');
                location.href='" . BASE_URL . "/admin/posts?type=all';  
            </script>";
        } catch (\Throwable $e) {
            echo "<script>
                alert('Delete post failed, please try again!');
                location.href='" . BASE_URL . "/admin/posts?type=all';  
            </script>";
        }
    }
}
