<?php
$lastestPost = Post::getLastestNewsEvent($conn, 4);
$mainPost = Post::getById($conn, '48864jf325949f3553');
$newsPost = Post::getByType($conn, 'news', 100);
$eventsPost = Post::getByType($conn, 'event', 100);

function renderElement($element)
{

    return '<div class="d-flex px-4 py-2 shadow rounded-4 justify-content-around mb-3" style="height: 100px; opacity: 1; animation: movingNav 0.3s ease-in-out ;transition: all 0.3s ease-in-out">
                                    <div class="h-100 p-sm-3 p-3 px-lg-2 px-md-2 py-lg-0 py-sm-0 w-25"><div class="h-100 w-100 shadow rounded-4" style="background-image: url(' . BASE_URL . '/uploads/imgs/' . $element->fileImg . '); background-size: cover; background-position: center;"></div>
                                    </div>
                                            <div class="h-100 px-3 w-75" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">
                                                <a href="' . BASE_URL . $element->path . '"
                                    class="text-decoration-none fw-bold" style="color: #274069; font-size: 24px;">' . $element->title . '</a>
                                    <div class="mt-3">
                                    <span>' . convertDate($element->date) . ' - </span>
                                    <span>' . ($element->readTimes) . ' minues read</span>
                                    </div>
                                </div>
                            </div>';
}
echo "<script>let newsList = [];
    let eventsList = [];
</script>";
foreach ($newsPost as $post) {
    echo '<script>
    newsList.push(`' . renderElement($post) . '`);</script>';
};
foreach ($eventsPost as $post) {
    echo '
    <script>eventsList.push(`' . renderElement($post) . '`);</script>';
};
?>


<script>
    console.log(newsList);
    console.log(eventsList);
</script>

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
        <div class="row justify-content-center min-vh-100 mt-5" style="gap: 16px">
            <div class="col-lg-8 h-100 row shadow-lg rounded-3">
                <div class="col-lg-12">
                    <img src="./assets/imgs/ne-banner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="col-lg-12 p-4">
                    <div class="w-100">
                        <ul class="nav nav-pills d-flex nav-justified tab-views" style="gap: 8px">
                            <li class="nav-item">
                                <a class="nav-link news-tab active shadow" style="transition: all 0.3s ease-in-out" aria-current="page">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link shadow events-tab" style="transition: all 0.3s ease-in-out">Events</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-100 pt-4">
                        <div class="posts-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 h-100 p-3 d-flex flex-column rounded-3 shadow-lg" style="background-color: #274069">
                <h3 style="color: white; height: 10%">
                    LATEST POSTS
                </h3>
                <div class="d-flex flex-column justify-content-start" style="color: white; height: 90%">
                    <?php
                    foreach ($lastestPost as $post) {
                        echo '
                        <a href="' . BASE_URL . $post->path . '" class="w-100 h-25 py-4 px-3" style="border-top: 1px solid white; color: white">
                            <h4 style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">' . $post->title . '</h4>
                            <p  style="display: -webkit-box; 
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis; font-size: 16px">
                                ' . clearSpecialSymbols($post->content) . '
                    </p>
                    <p
                        style="font-size: 14px">' . convertDate($post->date) . " - " . $post->readTimes . " minutes read" . '</p>
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
    <style>
        .nav-link {
            margin: unset !important;
            color: #274069 !important;
        }

        .nav-link.active:hover {
            opacity: 0.8;
            color: white !important;
        }

        .nav-item {
            padding: 0;
        }

        .nav-link.active {
            background-color: #274069 !important;
            color: white !important;
        }
    </style>
    <script>
        let eventsLimit = 4;
        let newsLimit = 4;
        const postsContainer = document.querySelector('.posts-container');
        const renderEvents = (limit) => {
            let html = "";
            if (limit <= eventsList.length) {
                for (let i = 0; i < limit; i++) {
                    html += eventsList[i];
                }
                postsContainer.innerHTML = html + "<button class='btn'>Show more</button>";
            } else {
                for (let i = 0; i < eventsList.length; i++) {
                    html += eventsList[i];
                }
                postsContainer.innerHTML = html;
            }
        }

        const renderNews = (limit) => {
            let html = "";
            if (limit <= newsList.length) {
                for (let i = 0; i < limit; i++) {
                    html += newsList[i];
                }
                postsContainer.innerHTML = html + "<button class='btn' onclick='showMoreNews()'>Show more</button>";
            } else {
                for (let i = 0; i < newsList.length; i++) {
                    html += newsList[i];
                }
                postsContainer.innerHTML = html;
            }
        }

        const showMoreNews = () => {
            newsLimit += 4;
            renderNews(newsLimit);
        }

        const tabViews = document.querySelectorAll(".tab-views .nav-link");
        console.log(tabViews);
        tabViews.forEach((tabView) => {
            tabView.onclick = () => {
                if (tabView.classList.contains("events-tab")) {
                    renderEvents(eventsLimit);
                } else {
                    renderNews(newsLimit);
                }

                tabViews.forEach((tabView) => {
                    tabView.classList.remove("active");
                });
                tabView.classList.add("active");
            }
        })
        renderNews(newsLimit);
    </script>
</main>