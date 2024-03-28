<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    header("Location: " . BASE_URL . "/admin/login");
}

$news = News::getAll($conn);

?>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main container">
    <div class="p-5">
        <h1 class="py-4" style="color: #274069">NEWS</h1>
        <div class="container d-flex flex-column" style="gap: 16px">
            <?php
            if (count($news) != 0) {
                foreach ($news as $element) {
                    echo '<div class="d-flex px-4 py-2 shadow rounded-4" style="height: 100px;">
                    <div class="h-100 px-3" style="flex: none;"><img class="h-100 shadow rounded-4" src=" ../uploads/imgs/' . $element->fileImg . '">
                    </div>
                            <div class="w-75 h-100 px-3" style="overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: nowrap;">
                                <a href="' . BASE_URL . '/admin/editNews?id=' . $element->id . '"
            class="text-decoration-none fw-bold" style="color: #274069; font-size: 24px;">' . $element->title . '</a>
            <div class="mt-3">
            <span>' . convertDate($element->date) . ' - </span>
            <span>' . ($element->readTimes) . ' minues read</span>
            </div>
        </div>
    </div>';
                }
            } else {
                echo '<h4 class="fst-italic fw-light">There are no posts yet!</h4>';
            }
            ?>
        </div>
        <div class="mt-5">
            <a class="btn btn-success" href="<?php echo BASE_URL . "/admin/addNews" ?>">Create</a>
        </div>
    </div>
</div>