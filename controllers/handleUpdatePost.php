<?php
session_start();
include_once "../vendor/bootstrap.php";
include "../models/database.php";
include "../models/post.php";
include "../models/hashtag_post.php";
include "../config.php";
$conn = require "../inc/db.php";
unset($_SESSION["message"]);
$_SESSION["message"] = "have no message";
function uploadThumbnail($conn, $id)
{
    $data = (object) [
        'id' => '',
        'fileImg' => ''
    ];
    $post = Post::getById($conn, $id);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] == 0) {
            $target_dir = "../uploads/imgs/";
            $uniqueId = uniqid() . rand(1000, 9999);
            $filename = basename($_FILES["myfile"]["name"]);
            $target_file = $target_dir . $uniqueId . "." . pathinfo($filename, PATHINFO_EXTENSION);
            if (file_exists($target_file)) {
                $_SESSION["message"] = "Sorry, file already exists.";
            } else {
                if ($_FILES["myfile"]["size"] > 5000000) {
                    $_SESSION["message"] = "Sorry, your file is too large.";
                } else {
                    $allowed_extensions = array("jpg", "jpeg", "png", "pdf");
                    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (in_array($extension, $allowed_extensions)) {

                        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                            if (file_exists($target_dir . $post->fileImg)) {
                                unlink($target_dir . $post->fileImg);
                            }
                            $data->fileImg = $uniqueId . '.' . pathinfo($filename, PATHINFO_EXTENSION);
                            $data->id = $uniqueId;
                            return $data;
                        } else {
                            $_SESSION["message"] = "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        $_SESSION["message"] = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
                    }
                }
            }
        }
    }
    return false;
}

if (isset($_POST['md-file'])) {
    $title = $_POST["title"];
    $readTimes = $_POST["times"];
    $type = $_POST["type"];
    $id = $_GET["id"];
    $priority = $_POST["priority"];
    $hashtagList = $_POST["hashtag"];
    $post = Post::getById($conn, $id);
    $data = uploadThumbnail($conn, $id);
    $link = "/" . $type . "?id=" . $id;
    if ($data != false) {
        try {
            $img_path = "../uploads/imgs/" . $post->fileImg;
            $text = $_POST['md-file'];
            $myfile = fopen("../uploads/posts/" . $id . ".md", "w");
            fwrite($myfile, $text);
            HashtagPost::deleteByPostId($conn, $id);
            $updatePost = new Post($id, $readTimes, $title, $id . '.md', $data->fileImg, date('Y-m-d'), $post->views, $type, $text, $link, $priority == "true" ? 1 : 0);
            Post::update($conn, $updatePost, $id);
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            foreach ($hashtagList as $hashtag) {
                $hashtagpost = new HashtagPost(1, $hashtag, $id);
                HashtagPost::add($conn, $hashtagpost);
            }
            $_SESSION["message"] =  'Update post "' . $title . '" successfully!';;
            if (file_exists("../uploads/post/test.md")) {
                unlink("../uploads/post/test.md");
            }
        } catch (\Throwable $e) {
            $_SESSION["message"] = "Sorry, there was an error updating your post, please try again!.";
        }
    } else {
        try {
            $post = Post::getById($conn, $id);
            HashtagPost::deleteByPostId($conn, $id);
            $text = $_POST['md-file'];
            $myfile = fopen("../uploads/posts/" . $id . ".md", "w");
            fwrite($myfile, $text);
            $updatePost = new Post($id, $readTimes, $title, $id . '.md', $post->fileImg, date('Y-m-d'), $post->views, $type, $text, $link, $priority == "true" ? 1 : 0);
            Post::update($conn, $updatePost, $id);
            foreach ($hashtagList as $hashtag) {
                $hashtagpost = new HashtagPost(1, $hashtag, $id);
                HashtagPost::add($conn, $hashtagpost);
            }
            $_SESSION["message"] =  'Update post "' . $title . '" successfully!';;
            if (file_exists("../uploads/posts/test.md")) {
                unlink("../uploads/posts/test.md");
            }
        } catch (\Throwable $e) {
            $_SESSION["message"] = "Sorry, there was an error updating your post, please try again!.";
        }
    }
}
?>
<link href="../css/admin.css" rel="stylesheet">
<div class="min-vh-100 min-vw-100 d-flex">
    <div class="modal d-block m-auto" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notice</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo $_SESSION["message"] ?></p>
                </div>
                <div class="modal-footer">
                    <a type="button" href="<?php echo BASE_URL . '/admin/editPost?id=' . $post->id ?>" class="btn btn-primary">Back To
                        This
                        Post</a>
                    <a type="button" href="<?php echo BASE_URL . '/admin/addPost' ?>" class="btn btn-success" data-dismiss="modal">Create New Post</a>
                </div>
            </div>
        </div>
    </div>
</div>