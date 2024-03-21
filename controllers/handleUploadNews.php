<?php
include "../models/database.php";
include "../config.php";
$conn = require "../inc/db.php";

if (isset($_POST['md-file'])) {
    $text = $_POST['md-file'];
    $uniqueId = uniqid() . rand(1000, 9999);
    $myfile = fopen("../uploads/news/" . $uniqueId . ".md", "w");
    fwrite($myfile, $text);

    echo "<h1>Upload bài viết " . $_POST['title'] . " thành công! </h1>";
}
