<?php
session_start();
include_once './config.php';
include_once "./vendor/bootstrap.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $uri);
?>
<link href="./css/base.css">
<!-- Add layout using router -->
<div class="header">
    <!-- Add header to all pages -->
    <?php include __DIR__ . "/views/components/header.php" ?>
</div>
<div class="main">
    <?php
        $route = $segments[2] . (isset($segments[3]) ?  '/' .$segments[3] : "");
        switch ($route) {
            case "":
                include __DIR__ . "/views/home.php";
                break;
            case 'home':
                include __DIR__ . "/views/home.php";
                break;
            case 'news':
                include __DIR__ . "/views/news.php";
                break;
            case "admin":
                include __DIR__ . "/views/admin/home.php";
                break;
            case "admin/home":
                    include __DIR__ . "/views/admin/home.php";
                    break;
            case "admin/login":
                include __DIR__ . "/views/admin/login.php";
                break;
            case "admin/message":
                include __DIR__ . "/views/admin/message.php";
                break;
            default:
                include __DIR__ . "/views/e404.php";
                break;
        }
        ?>
    <!-- Add footer to all pages -->
    <div class="footer">
        <?php include __DIR__ . "/views/components/footer.php" ?>
    </div>
</div>