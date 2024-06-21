<?php
session_start();
include_once './config.php';
include_once "./vendor/bootstrap.php";
include_once "./config.php";
include_once "./models/database.php";
include_once "./models/message.php";
include_once "./models/date.php";
include_once "./models/link.php";
include_once "./models/hashtag_post.php";
include_once "./models/post.php";
include_once "./models/hashtag.php";
include_once "./utils/index.php";
//instance database
$conn = require "./inc/db.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $uri);

$facebook = Link::getByName($conn, "facebook");
$linkedin = Link::getByName($conn, "linkedin");
$instagram = Link::getByName($conn, "instagram");
$mail = Link::getByName($conn, "mail");
$form = Link::getByName($conn, "form");
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
    <scrip src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
        </script>
</head>

<?php
$language = "";
if (isset($_GET['language'])) {
    $language = $_GET['language'];
} else {
    if (isset($_SESSION['lang'])) {
        $language = $_SESSION['lang'];
    } else {
        $_SESSION['lang'] = "eng";
        $language = $_SESSION['lang'];
    }
}
?>

<div id="preloader">
    <div class="line"></div>
</div>

<body class="custom-scrollbar" style="opacity: 0">
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
            include "./views/components/hoverHere.php";
            include "./utils/securityContent.php";
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
            case 'curriculum':
                include __DIR__ . "/views/curriculum.php";
                break;
            case 'tuition':
                include __DIR__ . "/views/tuition.php";
                break;
            case 'faq':
                include __DIR__ . "/views/faq.php";
                break;
            case 'event':
                include __DIR__ . "/views/event.php";
                break;
            case 'news':
                include __DIR__ . "/views/news.php";
                break;
            case 'endorsement':
                include __DIR__ . "/views/endorsement.php";
                break;
            case 'search':
                include __DIR__ . "/views/search.php";
                break;
            case "news&events":
                include __DIR__ . "/views/news&events.php";
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
            case "admin/link":
                include __DIR__ . "/views/admin/link.php";
                break;
            case "admin/messages":
                include __DIR__ . "/views/admin/message.php";
                break;
            case "admin/change-password":
                include __DIR__ . "/views/admin/changePassword.php";
                break;
            case "admin/template-email":
                include __DIR__ . "/views/admin/templateEmail.php";
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
    </div>
    <div class="footer">
        <?php include __DIR__ . "/views/components/footer.php" ?>
    </div>
    <script>
        const vnElements = document.querySelectorAll(".vn");
        const engElements = document.querySelectorAll(".eng");
        const queryParams = "<?php echo $language ?>";
        if (queryParams === "eng") {
            vnElements.forEach((e) => {
                e.classList.add("d-none");
            });
            engElements.forEach((e) => {
                e.classList.remove("d-none");
            });
        } else {
            vnElements.forEach((e) => {
                e.classList.remove("d-none");
            });
            engElements.forEach((e) => {
                e.classList.add("d-none");
            });
        }

        const body = document.querySelector("body");
        body.style.transition = "all 0.3s ease-in-out";
        setTimeout(() => {
            body.style.opacity = "1";
        }, 500);
    </script>
    <script src="js/index.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
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