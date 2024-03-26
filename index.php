<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css" />
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

</head>

<body>
    <?php
    session_start();
    include_once './config.php';
    include_once "./vendor/bootstrap.php";
    include_once "./config.php";
    include_once "./models/database.php";
    include_once "./models/message.php";
    include_once "./models/news.php";
    include_once "./utils/index.php";
    //instance database
    $conn = require "./inc/db.php";
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', $uri);

    ?>

    <?php
    $language = "";
    if (isset($_GET['language'])) {
        $language = $_GET['language'];
    }
    ?>

    <link href="css/base.css">
    <!-- Add layout using router -->
    <div class="header">
        <!-- Add header to all pages -->
        <?php include __DIR__ . "/views/components/header.php" ?>
    </div>
    <div class="main">
        <?php
        $route = $segments[2] . (isset($segments[3]) ?  '/' . $segments[3] : "");
        switch ($route) {
            case "":
                include __DIR__ . "/views/home.php";
                break;
            case 'home':
                include __DIR__ . "/views/home.php";
                break;
            case 'about':
                include __DIR__ . "/views/about.php";
                break;
            case 'news':
                include __DIR__ . "/views/news.php";
                break;
            case "admin":
                include __DIR__ . "/views/admin/home.php";
                break;
            case "admin/":
                include __DIR__ . "/views/admin/home.php";
                break;
            case "admin/home":
                include __DIR__ . "/views/admin/home.php";
                break;
            case "admin/events":
                include __DIR__ . "/views/admin/home.php";
                break;
            case "admin/login":
                include __DIR__ . "/views/admin/login.php";
                break;
            case "admin/faqs":
                include __DIR__ . "/views/admin/faqs.php";
                break;
            case "admin/news":
                include __DIR__ . "/views/admin/news.php";
                break;
            case "admin/addNews":
                include __DIR__ . "/views/admin/addNews.php";
                break;
            case "admin/editNews":
                include __DIR__ . "/views/admin/editNews.php";
                break;
            case "admin/previewNews":
                include __DIR__ . "/views/admin/previewNews.php";
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
    <script>
        const vnElements = document.querySelectorAll(".vn");
        const engElements = document.querySelectorAll(".eng");
        const queryParams = "<?php echo $language ?>";
        if (queryParams === "" || queryParams === "vn") {
            vnElements.forEach((e) => {
                e.classList.remove("d-none");
            });
            engElements.forEach((e) => {
                e.classList.add("d-none");
            });
        } else {
            vnElements.forEach((e) => {
                e.classList.add("d-none");
            });
            engElements.forEach((e) => {
                e.classList.remove("d-none");
            });
        }
    </script>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>