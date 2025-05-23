<?php
session_start();
include_once "../vendor/bootstrap.php";
include "../models/database.php";
include "../models/post.php";
include "../models/hashtag_post.php";
include "../config.php";
$conn = require "../inc/db.php";
include_once "../utils/index.php";
unset($_SESSION["message"]);
$_SESSION["message"] = "have no message";
function uploadThumbnail()
{
    $data = (object) [
        'id' => '',
        'fileImg' => ''
    ];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] == 0) {
            $target_dir = "../uploads/imgs/";
            $uniqueId = uniqid() . rand(1000, 9999);
            $filename = basename($_FILES["myfile"]["name"]);
            $target_file = $target_dir . $uniqueId . "." . pathinfo($filename, PATHINFO_EXTENSION);
            if (file_exists($target_file)) {
                $_SESSION["message"] = "Sorry, file already exists.";
            } else {
                if ($_FILES["myfile"]["size"] > 500000) {
                    $_SESSION["message"] = "Sorry, your file is too large.";
                } else {
                    $allowed_extensions = array("jpg", "jpeg", "png", "pdf");
                    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (in_array($extension, $allowed_extensions)) {
                        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
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

if (authenAdmin()) {
    if (isset($_POST['md-file'])) {
        $title = $_POST["title"];
        $readTime = $_POST["times"];
        $type = $_POST["type"];
        $priority = $_POST["priority"];
        $hashtagList = $_POST["hashtag"];
        $text = $_POST["md-file"];
        $post;
        $data = uploadThumbnail();
        if ($data) {
            try {
                $uniqueId = uniqid() . rand(1000, 9999);
                $imgId = $data->id;
                $fileImg = $data->fileImg;
                $text = $_POST['md-file'];
                $myfile = fopen("../uploads/posts/" . $uniqueId . ".md", "w");
                fwrite($myfile, $text);
                $path = "/" . $type . "?id=" . $uniqueId;
                $post = new Post($uniqueId, $readTime, $title, $uniqueId . '.md', $fileImg, date('Y-m-d'), 0, $type, $text, $path, $priority == "true" ? 1 : 0);
                Post::add($conn, $post);
                foreach ($hashtagList as $hashtag) {
                    $hashtagpost = new HashtagPost(1, $hashtag, $uniqueId);
                    HashtagPost::add($conn, $hashtagpost);
                }
                if (file_exists("../uploads/posts/test.md")) {
                    unlink("../uploads/posts/test.md");
                }
                $_SESSION["message"] = 'Upload post "' . $title . '" successfully!';
            } catch (\Throwable $e) {
                $img_path = "../uploads/imgs/";
                $file_path = "../uploads/posts/";
                echo $img_path . $post->fileImg;
                echo $file_path . $post->fileText;
                if ($post->fileImg != "default.png" && file_exists($img_path . $post->fileImg) && file_exists($file_path . $post->fileText)) {
                    unlink($img_path . $post->fileImg);
                    unlink($file_path . $post->fileText);
                } else if ($post->fileImg == "default.png" && file_exists($img_path . $post->fileImg) && file_exists($file_path . $post->fileText)) {
                    unlink($file_path . $post->fileText);
                } else {
                    echo "Doesn't exist";
                }
                $_SESSION["message"] = $e;
            }
        } else {
            try {
                $uniqueId = uniqid() . rand(1000, 9999);
                $fileImg = 'default.png';
                $text = $_POST['md-file'];
                $myfile = fopen("../uploads/posts/" . $uniqueId . ".md", "w");
                fwrite($myfile, $text);
                $path = "/" . $type . "?id=" . $uniqueId;
                $post = new Post($uniqueId, $readTime, $title, $uniqueId . '.md', $fileImg, date('Y-m-d'), 0, $type, $text, $path, $priority == "true" ? 1 : 0);
                Post::add($conn, $post);
                foreach ($hashtagList as $hashtag) {
                    $hashtagpost = new HashtagPost(1, $hashtag, $uniqueId);
                    HashtagPost::add($conn, $hashtagpost);
                }
                if (file_exists("../uploads/posts/test.md")) {
                    unlink("../uploads/posts/test.md");
                }
                $_SESSION["message"] = 'Upload post "' . $title . '" successfully!';
            } catch (\Throwable $e) {
                $_SESSION["message"] = "Sorry, there was an error uploading your post, please try again!.";
            }
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
                    <a type="button" href="<?php echo BASE_URL . '/admin/home' ?>" class="btn btn-primary">Go Home</a>
                    <a type="button" href="<?php echo BASE_URL . '/admin/addPost' ?>" class="btn btn-success" data-dismiss="modal">Create New</a>
                </div>
            </div>
        </div>
    </div>
</div>