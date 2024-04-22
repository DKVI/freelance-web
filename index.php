<?php
session_start();
include_once './config.php';
include_once "./vendor/bootstrap.php";
include_once "./config.php";
include_once "./models/database.php";
include_once "./models/message.php";
include_once "./models/date.php";
include_once "./models/hashtag_post.php";
include_once "./models/post.php";
include_once "./models/hashtag.php";
include_once "./utils/index.php";
//instance database
$conn = require "./inc/db.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $uri);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ------------- -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- ----------------------- -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL ?>/assets/imgs/favicon.ico">
    <title>Mooting Summer School</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css" />
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<?php
$language = "";
if (isset($_GET['language'])) {
    $language = $_GET['language'];
}
?>


<body class="custom-scrollbar">

    <link href="css/base.css">
    <!-- Add layout using router -->
    <div class="header">
        <!-- Add header to all pages -->

        <?php
        if ($segments[2] !== 'admin') {
            include __DIR__ . "/views/components/header.php";
        }
        ?>
    </div>
    <div class="main">
        <?php
        $route = $segments[2] . (isset($segments[3]) ?  '/' . $segments[3] : "");
        if ($segments[2] !== 'admin') {
            include "./views/components/popupMessage.php";
        }
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
            case 'faq':
                include __DIR__ . "/views/faq.php";
            case 'events':
                include __DIR__ . "/views/event.php";
                break;
            case 'news':
                include __DIR__ . "/views/news.php";
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
            case "admin/verifyEmail":
                include __DIR__ . "/views/admin/verifyEmail.php";
                break;
            case "admin/posts":
                include __DIR__ . "/views/admin/posts.php";
                break;
            case "admin/addPost":
                include __DIR__ . "/views/admin/addPost.php";
                break;
            case "admin/editPost":
                include __DIR__ . "/views/admin/editPost.php";
                break;
            case "admin/hashtag":
                include __DIR__ . "/views/admin/hashtag.php";
                break;
            case "admin/messages":
                include __DIR__ . "/views/admin/message.php";
                break;
            case "admin/change-password":
                include __DIR__ . "/views/admin/changePassword.php";
                break;
            case "e404":
                include __DIR__ . "/views/e404.php";
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
    <?php
    $currentDate = date("Y-m-d");
    resetTime($conn, $currentDate);
    ?>
    <?php
    include "./views/components/goToTop.php";
    ?>
</body>

</html>