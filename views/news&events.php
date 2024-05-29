<?php
$newsList = Post::getByType($conn, 'news', 2);
$eventList = Post::getByType($conn, 'event', 2);
$mainPost = Post::getById($conn, '48864jf325949f3553');
?>


<main class="position-relative">
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

    <p class="relative-anchor" style="height:80px"><span id="about-anchor"></span></p>
    <div class="container py-5 p-lg-5 w-100">
        <div class="row justify-content-center min-vh-100 " style="gap: 16px">
            <div class="col-lg-8 h-100 row shadow eng">
                <div class="col-lg-12">
                    <img src="./uploads/imgs/default.png" class="w-100 rounded-3">
                </div>
                <div class="col-lg-5 p-4"><a href="<?php echo BASE_URL . '/about' ?>">
                        <h1 style="font-size: 50px">ABOUT M.S.S</h1>
                    </a></div>
                <div class="col-lg-7 p-4">
                    <div>
                        <p class="" style="text-align: left">I believe that mooting is an activity every law student
                            should experience at least once in their law school life. From a professional perspective,
                            this is a challenging playground that not only helps you practice critical thinking, improve
                            your research skills, but also expand your understanding of the law. Additionally, mooting
                            is an opportunity for you to meet and interact with incredible people in the industry,
                            people with the same passions and hobbies, or even people who might be your “future
                            colleagues.”
                        </p>
                    </div>
                    <div><a class="btn" style="background-color: #274069; color: white" href="<?php echo BASE_URL . '/about' ?>">READ MORE</a></div>
                </div>
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
                            được chia sẻ. </p>
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

</main>