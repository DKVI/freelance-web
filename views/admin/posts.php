<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo '<script>window.location.href = "' . BASE_URL . '/admin/login"</script>';
}
$type = "";
if (isset($_GET["type"])) {
    $type = $_GET["type"];
}
$post = Post::getAll($conn);

?>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>*
<div class="main container overflow-y-hidden justify-content-center ">
    <div class="p-5 w-100">
        <div class="d-flex row mb-3">
            <div class="col-6 align-content-between d-flex flex-column">
                <h1 class="py-4" style="color: #274069">NEWS & EVENTS</h1>
                <select class="shadow type-selection form-select m-auto " aria-label="Default select example">
                    <?php
                    if (!isset($_GET['type'])) {
                        echo '<option class="text-center" selected>-- Select type of post --</option>
                                <option class="text-center" value="all"><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="event"><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news"><a class="w-100" href="">NEWS</a></option>';
                    } else {
                        if ($type == "event") {
                            echo '<option class="text-center" >-- Select type of post --</option>
                                <option class="text-center" value="all"><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="event" selected><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news"><a class="w-100" href="">NEWS</a></option>';
                        } else if ($type == "news") {
                            echo '<option class="text-center" >-- Select type of post --</option>
                                <option class="text-center" value="all"><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="event"><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news" selected><a class="w-100" href="">NEWS</a></option>';
                        } else {
                            echo '<option class="text-center" >-- Select type of post --</option>
                                <option class="text-center" value="all" selected><a class="w-100" href="">ALL</a></option>
                                <option class="text-center" value="event"><a class="w-100" href="">EVENT</a></option>
                                <option class="text-center" value="news"><a class="w-100" href="">NEWS</a></option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-end">
                <a class="btn btn-success" style="flex: none;" href="<?php echo BASE_URL . "/admin/addPost" ?>">Create
                    New Post</a>
            </div>
        </div>
        <div class="d-flex flex-column" style="gap: 16px">
            <?php
            if (count($post) != 0) {
                if ($type == "event") {
                    foreach ($post as $element) {
                        if ($element->type == "event") {
                            echo '<div class="d-flex px-4 py-2 shadow rounded-4 justify-content-around" style="height: 100px;">
                                    <div class="h-100 px-3" style="flex: none;"><img class="h-100 shadow rounded-4" src=" ../uploads/imgs/' . $element->fileImg . '">
                                    </div>
                                            <div class="w-75 h-100 px-3" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">
                                                <a href="' . BASE_URL . '/admin/editPost?id=' . $element->id . '"
                                    class="text-decoration-none fw-bold" style="color: #274069; font-size: 24px;">' . $element->title . '</a>
                                    <div class="mt-3">
                                    <span>' . convertDate($element->date) . ' - </span>
                                    <span>' . ($element->readTimes) . ' minues read</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="m-auto"><span class="p-2">' . $element->views . '</span><i class="fa-regular fa-eye"></i></div>
                                </div>
                            </div>';
                        }
                    }
                } else if ($type == "news") {
                    foreach ($post as $element) {
                        if ($element->type == "news") {
                            echo '<div class="d-flex px-4 py-2 shadow rounded-4 justify-content-around" style="height: 100px;">
                                    <div class="h-100 px-3" style="flex: none;"><img class="h-100 shadow rounded-4" src=" ../uploads/imgs/' . $element->fileImg . '">
                                    </div>
                                            <div class="w-75 h-100 px-3" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">
                                                <a href="' . BASE_URL . '/admin/editPost?id=' . $element->id . '"
                                    class="text-decoration-none fw-bold" style="color: #274069; font-size: 24px;">' . $element->title . '</a>
                                    <div class="mt-3">
                                    <span>' . convertDate($element->date) . ' - </span>
                                    <span>' . ($element->readTimes) . ' minues read</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="m-auto"><span class="p-2">' . $element->views . '</span><i class="fa-regular fa-eye"></i></div>
                                </div>
                            </div>';
                        }
                    }
                } else {
                    foreach ($post as $element) {
                        echo '<div class="d-flex px-4 py-2 shadow rounded-4 justify-content-around " style="height: 100px;">
                                    <div class="h-100 px-3" style="flex: none;"><img class="h-100 shadow rounded-4" src=" ../uploads/imgs/' . $element->fileImg . '">
                                    </div>
                                            <div class="w-75 h-100 px-3" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">
                                                <a href="' . BASE_URL . '/admin/editPost?id=' . $element->id . '"
                                    class="text-decoration-none fw-bold" style="color: #274069; font-size: 24px;">' . $element->title . '</a>
                                    <div class="mt-3">
                                    <span>' . convertDate($element->date) . ' - </span>
                                    <span>' . ($element->readTimes) . ' minues read</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="m-auto"><span class="p-2">' . $element->views . '</span><i class="fa-regular fa-eye"></i></div>
                                </div>
                            </div>';
                    }
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
        } else {
            window.location.href = "<?php echo BASE_URL ?>/admin/posts?type=all";
        }
    }
</script>