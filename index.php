<?php
include_once './config.php';
include_once "./vendor/bootstrap.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $uri);
$route = end($segments);
?>
<?php
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
    default:
        include __DIR__ . "/views/e404.php";
        break;
} ?>