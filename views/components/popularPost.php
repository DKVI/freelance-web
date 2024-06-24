<?php
$popularList = Post::getPopularPost($conn, 9);
$slide1 = [];
$slide2 = [];
$slide3 = [];
for ($i = 0; $i < count($popularList); $i++) {
    if ($i < 3) {
        array_push($slide1, $popularList[$i]);
    } else if ($i < 6) {
        array_push($slide2, $popularList[$i]);
    } else {
        array_push($slide3, $popularList[$i]);
    }
}

function renderPopularItem($item)
{
    echo '<div class="col-lg-4 col-sm-6 px-lg-5 px-sm-2 px-md-2 d-flex">
                    <a href="' . BASE_URL . $item->path . '" class="card m-auto" style="width: 18rem">
                        <img src="./uploads/imgs/' . $item->fileImg . '" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap; color: #274069; font-family: Myriad;">' . $item->title . '</h4>
                            <div class="card-text" style="display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis; font-size: 16px; text-align: left">' . clearSpecialSymbols($item->content) . '</div>
                        </div>
                    </a>
                </div>';
}

?>
<h3>POPULAR POSTS</h3>
<div id="carouselExampleControls" class="carousel carousel-dark slide rounded-3 shadow-lg p-4" data-bs-ride="carousel" style="background: transparent">
    <div class="carousel-inner border-0">
        <div class="carousel-item active" style="height:100%">
            <div class="card-wrapper row justify-content-center container-sm d-flex h-100 justify-content-around">
                <?php foreach ($slide1 as $item) {
                    renderPopularItem($item);
                } ?>
            </div>
        </div>
        <div class="carousel-item" style="height:100%">
            <div class="card-wrapper row justify-content-center container-sm d-flex h-100 justify-content-around">
                <?php foreach ($slide2 as $item) {
                    renderPopularItem($item);
                } ?>
            </div>
        </div>
        <div class="carousel-item" style="height:100%">
            <div class="card-wrapper row justify-content-center container-sm d-flex h-100 justify-content-around">
                <?php foreach ($slide3 as $item) {
                    renderPopularItem($item);
                } ?>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <style>
        .img-top-post {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .card {
            padding: 0;
        }

        .carousel-item.active {
            display: flex;
            background-color: transparent !important;
            border: 0;
        }
    </style>