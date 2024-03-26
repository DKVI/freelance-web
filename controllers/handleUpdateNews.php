<?php
include "../models/database.php";
include "../models/news.php";
include "../config.php";
$conn = require "../inc/db.php";

if (isset($_POST['md-file'])) {
    $title = $_POST["title"];
    $readTimes = $_POST["times"];
    echo $readTimes == null ? "null" : "value";
    $id = $_GET["id"];
    $isSuccess = false;
    try {
        $text = $_POST['md-file'];
        $myfile = fopen("../uploads/news/" . $id . ".md", "w");
        fwrite($myfile, $text);
        $news = new News($id, $readTimes, $title, $id . '.md', "", date('Y-m-d'));
        echo $news->date;
        try {
            News::update($conn, $news, $id);
        } catch (\Throwable $e) {
            echo $e;
        }
        $isSuccess = true;
        if (file_exists("../uploads/news/test.md")) {
            unlink("../uploads/news/test.md");
        }
    } catch (\Throwable $e) {
        $isSuccess = false;
    }
}
?>

<h1><?php echo $isSuccess == 1 ? "Success" : "Failure" ?></h1>