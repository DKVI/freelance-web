<?php
$keyword;
if (isset($_GET["keyword"])) {

    $keyword = $_GET["keyword"];
} else {
    echo '<script>location.href = "' . BASE_URL . '/e404"</script>';
}
$postsList = Post::getByKeyWord($conn, $keyword);
echo $postsList == null;
$limit = 4;
function renderElement($element)
{

    return '<div class="d-flex px-4 py-2 shadow rounded-4 justify-content-around" style="height: 100px; opacity: 1">
                                    <div class="h-100 p-sm-3 p-3 px-lg-2 px-md-2 py-lg-0 py-sm-0" style="width: 35%"><div class="h-100 w-100 shadow rounded-4" style="background-image: url(' . BASE_URL . '/uploads/imgs/' . $element->fileImg . '); background-size: cover; background-position: center;"></div>
                                    </div>
                                            <div class="h-100 px-3" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap; width: 60%">
                                                <a href="' . BASE_URL . $element->path . '"
                                    class="text-decoration-none fw-bold" style="color: #274069; font-size: 24px;">' . $element->title . '</a>
                                    <div class="mt-3">
                                    <span>' . convertDate($element->date) . ' - </span>
                                    <span>' . ($element->readTimes) . ' minutes read</span>
                                    </div>
                                </div>
                            </div>';
}
?>
<script>
    const postList = [];
</script>
<?php
$newsList = Post::getByType($conn, 'news', 2);
$eventList = Post::getByType($conn, 'event', 2);
foreach ($postsList as $post) {
    echo '<script>postList.push(`' . renderElement($post) . '`);</script>';
};

?>

<main class="position-relative" style="margin-top: 10rem">
    <!-- MSS's Mascot - Griffin Background -->

    <div class="position-fixed d-flex justify-content-end" style="left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: -1;">
        <div class="griffin" style=" width: 75%;">
        </div>
    </div>

    <!-- Main content -->
    <div class="container py-5 p-lg-5 w-100">
        <div class="row justify-content-center min-vh-100 " style="gap: 16px">
            <div class="col-lg-8 h-100 row shadow-lg rounded-3 eng p-3">
                <h3 class="py-5">Search for "<?php echo $keyword ?>"</h3>
                <div class="w-full d-flex flex-column post-container" style="gap: 1rem">
                </div>
                <button class="show-more-post-btn mt-3 btn" style="color: #274069; flex: none" onclick="handleShowMore()">
                    Show more
                </button>
            </div>
            <div class="col-lg-8 h-100 row shadow-lg rounded-3 vn">
                <div class="col-lg-12">
                    <img src="./uploads/imgs/default.png" class="w-100">
                </div>
                <div class="col-lg-5 p-4"><a href="<?php echo BASE_URL . '/about' ?>">
                        <h1 style="font-size: 50px">ABOUT M.S.S</h1>
                    </a></div>
                <div class="col-lg-7 p-4">
                    <div>
                        <p class="" style="text-align: left">Trong bất kỳ chuyện chinh phục nào, sự yêu và hiểu đối
                            phương
                            luôn là điều
                            tối quan trọng.
                            Vậy nên, tại MSS, mình, với tư cách là Nhà sáng lập và Người hướng dẫn, hy vọng có thể khiến
                            bạn “yêu” và “hiểu” mooting hơn qua những bài giảng, những lời khuyên và những câu chuyện
                            được chia sẻ.</p>
                    </div>
                    <div><a class="btn" style="background-color: #274069; color: white" href="<?php echo BASE_URL . '/about' ?>">READ MORE</a></div>
                </div>
            </div>
            <div class="col-lg-4 h-100 p-3 d-flex flex-column rounded-3 shadow-lg" style="background-color: #274069">
                <h3 style="color: white; height: 10%">
                    NEWS & EVENTS
                </h3>
                <div class="d-flex flex-column justify-content-start" style="color: white; height: 90%">
                    <?php
                    foreach ($newsList as $news) {
                        echo '
                        <a href="' . BASE_URL . $news->path . '" class="w-100 h-25 py-4 px-3" style="border-top: 1px solid white; color: white">
                            <h4 style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">' . $news->title . '</h4>
                            <p  style="display: -webkit-box; 
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis; font-size: 16px">
                                ' . clearSpecialSymbols($news->content) . '
                    </p>
                    <p
                        style="font-size: 14px">' . convertDate($news->date) . " - " . $news->readTimes . " minutes read" . '</p>
                </a>';
                    }
                    foreach ($eventList as $event) {
                        echo '
                        <a href="' . BASE_URL . $event->path . '" class="w-100 h-25 py-4 px-3" style="border-top: 1px solid white; color: white">
                            <h4 style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">' . $event->title . '</h4>
                            <p class="" style="display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis; font-size: 16px; text-align: left">
                                ' . clearSpecialSymbols($event->content) . '
                    </p>
                    <p
                        style="font-size: 14px">' . convertDate($event->date) . " - " . $event->readTimes . " minutes read" . '</p>
                </a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row mt-3">

            <?php include "./views/components/popularPost.php" ?>
        </div>
    </div>
    <script>
        let limit = 4;
        let total = postList.length;
        let html = "";
        const showMorePostBtn = document.querySelector(".show-more-post-btn");
        const postContainer = document.querySelector(".post-container");
        const renderPosts = () => {
            if (limit < total) {
                for (let i = 0; i < limit; i++) {
                    html += postList[i];
                }
                postContainer.innerHTML = html;
                html = "";
            } else {
                for (let i = 0; i < total; i++) {
                    html += postList[i];
                }
                postContainer.innerHTML = html;
                html = "";
                showMorePostBtn.style.display = "none";
            }
        }
        renderPosts();
        const handleShowMore = (event) => {
            limit += 4;
            console.table(limit, total)
            if (limit >= total) {
                console.log("true");
                showMorePostBtn.style.display = "none";
            }
            renderPosts();
        }
    </script>
</main>