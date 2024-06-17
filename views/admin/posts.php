<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo '<script>window.location.href = "' . BASE_URL . '/admin/login"</script>';
}
if (!isset($_GET["type"])) {
    echo "<script>location.href='" . BASE_URL . "/e404'</script>";
}
$type = "";
$keyword = "";
if (isset($_GET["type"]) && !isset($_GET["keyword"])) {
    $type = $_GET["type"];
} else {
    $type = $_GET["type"];
    $keyword = $_GET["keyword"];
}
$post = Post::getAll($conn);
$current_url = $_SERVER['REQUEST_URI'];
function renderElement($element)
{

    echo '<div class="d-flex px-4 py-2 shadow rounded-4 justify-content-around " style="height: 100px;">
                                    <div class="h-100 px-3" style="width: 20%"><div class="h-100 w-100 shadow rounded-4" style="background-image: url(' . BASE_URL . '/uploads/imgs/' . $element->fileImg . '); background-size: cover; background-position: center;"></div>
                                    </div>
                                            <div class="w-75 h-100 px-3" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">
                                                <a href="' . BASE_URL . '/admin/editPost?id=' . $element->id . '"
                                    class="text-decoration-none fw-bold" style="color: #274069; font-size: 24px;">' . $element->title . '</a>
                                    <div class="mt-3">
                                    <span>' . convertDate($element->date) . ' - </span>
                                    <span>' . ($element->readTimes) . ' minutes read</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="m-auto"><span class="p-2">' . $element->views . '</span><i class="fa-regular fa-eye"></i></div>
                                </div>
                            </div>';
}
function renderPinElement($element)
{

    echo '<div class="d-flex px-4 py-2 shadow rounded-4 justify-content-around " style="height: 100px; background-color: #274069">
                                    <div class="h-100 px-3" style="width: 20%"><div class="h-100 w-100 rounded-4" style="background-image: url(' . BASE_URL . '/uploads/imgs/' . $element->fileImg . '); background-size: cover; background-position: center; box-shadow: 2px 2px 10px 1px white"></div>
                                    </div>
                                            <div class="w-75 h-100 px-3" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">
                                                <a href="' . BASE_URL . '/admin/editPost?id=' . $element->id . '"
                                    class="text-decoration-none fw-bold" style="color: white; font-size: 24px;">' . $element->title . '</a>
                                    <div class="mt-3">
                                    <span style="color: white">' . convertDate($element->date) . ' - </span>
                                    <span style="color: white">' . ($element->readTimes) . ' minutes read</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="m-auto"><span class="p-2" style="color: white">' . $element->views . '</span><i class="fa-regular fa-eye" style="color: white"></i></div>
                                </div>
                            </div>';
}
?>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main px-5 justify-content-center">
    <div class="p-5 w-100">
        <div class="px-5 d-flex row mb-3">
            <div class="col-8 align-content-between d-flex flex-column">
                <h1 class="py-4" style="color: #274069">NEWS & EVENTS</h1>
                <div class="d-flex w-100" style="gap: 16px">
                    <form action="<?php echo $current_url ?>" method="get" class="form-inline my-2 my-lg-0 w-50 d-flex"
                        style="gap: 8px">
                        <input name="type" value="<?php echo $type ?>" class="d-none">
                        <input name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <select class="shadow type-selection form-select m-auto w-50" aria-label="Default select example">
                        <?php
                        if (!isset($_GET['type'])) {
                            echo '<option class="text-center" selected>-- Select type of post --</option>
                                <option class="text-center" value="all"><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="static"><a class="w-100" href="">STATIC PAGE</a></option>
                                <option class="text-center" value="event"><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news"><a class="w-100" href="">NEWS</a></option>';
                        } else {
                            if ($type == "event") {
                                echo '<option class="text-center" >-- Select type of post --</option>
                                <option class="text-center" value="all"><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="static"><a class="w-100" href="">STATIC PAGE</a></option>
                                <option class="text-center" value="event" selected><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news"><a class="w-100" href="">NEWS</a></option>';
                            } else if ($type == "news") {
                                echo '<option class="text-center" >-- Select type of post --</option>
                                <option class="text-center" value="all"><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="static"><a class="w-100" href="">STATIC PAGE</a></option>
                                <option class="text-center" value="event"><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news" selected><a class="w-100" href="">NEWS</a></option>';
                            } else if ($type == "static") {
                                echo '<option class="text-center" >-- Select type of post --</option>
                                <option class="text-center" value="all"><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="static" selected><a class="w-100" href="">STATIC PAGE</a></option>
                                <option class="text-center" value="event"><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news"><a class="w-100" href="">NEWS</a></option>';
                            } else {
                                echo '<option class="text-center" >-- Select type of post --</option>
                                <option class="text-center" value="all" selected><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="static"><a class="w-100" href="">STATIC PAGE</a></option>
                                <option class="text-center" value="event"><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news"><a class="w-100" href="">NEWS</a></option>';
                            }
                        }
                        ?>
                    </select>

                </div>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-end">
                <a class="btn btn-success" style="flex: none;" href="<?php echo BASE_URL . "/admin/addPost" ?>">Create
                    New Post</a>
            </div>
        </div>
        <div class="px-5 d-flex flex-column" style="gap: 16px">
            <?php
            if (isset($keyword) && $keyword !== '') {
                echo '<h4 class="py-4" style="color: #274069">SEARCH RESULTS FOR "' . $keyword . '"</h4>';
            }
            if (count($post) != 0 && $keyword == "") {
                if ($type == "event") {
                    foreach ($post as $element) {
                        if ($element->type == "event") {
                            if ($element->pin) {
                                renderPinElement($element);
                            } else {
                                renderElement($element);
                            }
                        }
                    }
                } else if ($type == "news") {
                    foreach ($post as $element) {
                        if ($element->type == "news") {
                            if ($element->pin) {
                                renderPinElement($element);
                            } else {
                                renderElement($element);
                            }
                        }
                    }
                } else if ($type == "static") {
                    foreach ($post as $element) {
                        if ($element->type == "static") {
                            if ($element->pin) {
                                renderPinElement($element);
                            } else {
                                renderElement($element);
                            }
                        }
                    }
                } else {
                    foreach ($post as $element) {
                        if ($element->pin) {
                            renderPinElement($element);
                        } else {
                            renderElement($element);
                        }
                    }
                }
            } else if ($keyword != "") {
                $postByKeyword = Post::searchByKeyWordAndType($conn, $keyword, $type);
                foreach ($postByKeyword as $post) {
                    if ($post->pin) {
                        renderPinElement($post);
                    } else {
                        renderElement($post);
                    }
                }
                if ($postByKeyword == null) {
                    echo '<h4 class="fst-italic fw-light">There are no posts yet!</h4>';
                }
            } else {
                echo '<h4 class="fst-italic fw-light">There are no posts yet!</h4>';
            }
            ?>
        </div>
    </div>
</div>
<script>
const selectType = document.querySelector("select");
selectType.onchange = (e) => {
    if (selectType.value === "event") {
        window.location.href = "<?php echo BASE_URL ?>/admin/posts?type=event";
    } else if (selectType.value === "news") {
        window.location.href = "<?php echo BASE_URL ?>/admin/posts?type=news";
    } else if (selectType.value === "static") {
        window.location.href = "<?php echo BASE_URL ?>/admin/posts?type=static";
    } else {
        window.location.href = "<?php echo BASE_URL ?>/admin/posts?type=all";
    }
}
</script>