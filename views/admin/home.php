<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo "<script>window.location.href='" . BASE_URL . "/admin/login'</script>";
}
$date = Date::getById($conn, 1);
$visitor = $date->visitor;
$totalViews = Post::totalViews($conn);
$totalPosts = Post::totalPosts($conn);
$totalMessages = Message::totalMessages($conn);
$postsList = Post::getAllSortByViews($conn);
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
                                    <span>' . ($element->readTimes) . ' minues read</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="m-auto"><span class="p-2">' . $element->views . '</span><i class="fa-regular fa-eye"></i></div>
                                </div>
                            </div>';
}
?>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main p-5">
    <div class="px-5 py-3">
        <h1>Data from <span class="fst-italic">
                <?php echo convertDate($date->startTime) ?> to <?php echo convertDate($date->endTime) ?>
            </span></h1>
        <div>
            <h3 class="py-2">
                Traffic:
            </h3>
            <div class="w-100 d-flex pt-3 px-2" style="gap: 16px;">
                <div class=" w-25 d-flex shadow-lg py-3 px-5 bg-danger rounded-3">
                    <div class="w-25 d-flex">
                        <i class="fa-solid fa-users m-auto" style="font-size:40px; color: white;"></i>
                    </div>
                    <div class="w-75 text-lg-end align-content-center justify-content-end">
                        <div class="m-auto">
                            <div style="font-size: 32px; color: white"><?php echo $visitor ?></div>
                            <span style="color: white">Visitors</span>
                        </div>
                    </div>
                </div>
                <div class=" w-25 d-flex shadow-lg py-3 px-5 bg-primary rounded-3">
                    <div class="w-25 d-flex">
                        <i class="fa-solid fa-eye m-auto" style="font-size:40px; color: white;"></i>
                    </div>
                    <div class="w-75 text-lg-end align-content-center justify-content-end">
                        <div class="m-auto">
                            <div style="font-size: 32px; color: white"><?php echo $totalViews ?></div>
                            <span style="color: white">Total Views</span>
                        </div>
                    </div>
                </div>
                <a href="<?php echo BASE_URL ?>/admin/posts?type=all" class=" w-25 d-flex shadow-lg py-3 px-5 bg-success rounded-3 text-decoration-none">
                    <div class="w-25 d-flex">
                        <i class="fa-regular fa-pen-to-square m-auto" style="font-size:40px; color: white;"></i>
                    </div>
                    <div class="w-75 text-lg-end align-content-center justify-content-end">
                        <div class="m-auto">
                            <div style="font-size: 32px; color: white"><?php echo $totalPosts ?></div>
                            <span style="color: white">Posts (News & Events)</span>
                        </div>
                    </div>
                </a>
                <a href="<?php echo BASE_URL ?>/admin/messages" class=" w-25 d-flex shadow-lg py-3 px-5 bg-warning rounded-3 text-decoration-none">
                    <div class="w-25 d-flex">
                        <i class="fa-regular fa-circle-question m-auto" style="font-size:40px; color: white;"></i>
                    </div>
                    <div class="w-75 text-lg-end align-content-center justify-content-end">
                        <div class="m-auto">
                            <div style="font-size: 32px; color: white"><?php echo $totalMessages ?></div>
                            <span style="color: white">Total Questions</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-100 ">
                <h3 class="py-5">
                    Top views:
                </h3>
                <div class="w-100">
                    <div class="px-5 d-flex flex-column" style="gap: 16px">
                        <?php
                        foreach ($postsList as $post) {
                            renderElement($post);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>