<?php
session_start();
include_once "../utils/index.php";

if (isset($_GET['lang'])) {
    $lang = xssClean($_GET['lang']);
    if ($lang == "eng") {
        $_SESSION['lang'] = $lang;
    } else if ($lang == "vn") {
        $_SESSION['lang'] = $lang;
    } else {
        header("Location: " . BASE_URL . "/e404");
    }
}
echo $_SESSION['lang'];
