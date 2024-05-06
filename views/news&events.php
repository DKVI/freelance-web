<?php
$popularList = Post::getPopularPost($conn, 3);
$newsList = Post::getByType($conn, 'news', 2);
$eventList = Post::getByType($conn, 'event', 2);
$mainPost = Post::getById($conn, '48864jf325949f3553');
?>


<main class="position-relative">
    <!-- MSS's Mascot - Griffin Background -->
    <div class="bg-fix-griffin position-fixed d-flex justify-content-end">
        <div class="griffin" style=" width: 75%;">
        </div>
    </div>

    <!-- Main content -->
    <div class="container py-5 p-lg-5 w-100">
        <div class="row">
            <div class="col-lg-8 h-100 row">
                <div class="col-lg-12">
                    <img src="./uploads/imgs/default.png">
                </div>
                <div class="col-lg-6 p-4"><a>
                        <h1>ABOUT M.S.S</h1>
                    </a></div>
                <div class="col-lg-6 p-4">
                    <div>
                        <p>Trong bất kỳ chuyện chinh phục nào, sự yêu và hiểu đối phương luôn là điều tối quan trọng.
                            Vậy nên, tại MSS, mình, với tư cách là Nhà sáng lập và Người hướng dẫn, hy vọng có thể khiến
                            bạn “yêu” và “hiểu” mooting hơn qua những bài giảng, những lời khuyên và những câu chuyện
                            được chia sẻ. </p>
                    </div>
                    <div><a class="btn" style="background-color: #274069; color: white" href="">READ MORE</a></div>
                </div>
            </div>
            <div class="col-lg-4 h-100 p-3 d-flex flex-column" style="background-color: #274069">
                <h2 style="color: white; height: 10%">
                    NEWS & EVENTS
                </h2>
                <div class="d-flex flex-column justify-content-start" style="color: white; height: 90%">
                    <?php
                    foreach ($newsList as $news) {
                        echo '
                        <div class="w-100 h-25 py-4" style="border-top: 1px solid white">
                            <h4 style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">' . $news->title . '</h4>
                            <p class="" style="display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis; font-size: 16px">
                                ' . clearSpecialSymbols($news->content) . '
                    </p>
                    <p
                        style="font-size: 14px">' . convertDate($news->date) . " - " . $news->readTimes . " minutes read" . '</p>
                </div>';
                    }
                    foreach ($eventList as $event) {
                        echo '
                        <div class="w-100 h-25 py-4" style="border-top: 1px solid white">
                            <h4 style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">' . $event->title . '</h4>
                            <p class="" style="display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis; font-size: 16px">
                                ' . clearSpecialSymbols($event->content) . '
                    </p>
                    <p
                        style="font-size: 14px">' . convertDate($event->date) . " - " . $event->readTimes . " minutes read" . '</p>
                </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row"></div>
    </div>

</main>