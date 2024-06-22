<?php
session_start();

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    if ($lang == "eng") {
        $_SESSION['lang'] = $lang;
    } else if ($lang == "vn") {
        $_SESSION['lang'] = $lang;
    } else {
        header("Location: " . BASE_URL . "/e404");
    }
}
echo $_SESSION['lang'];
