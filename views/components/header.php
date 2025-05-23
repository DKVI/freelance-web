<!-- NAVBAR -->
<!-- LOGO AREA -->
<?php
// Lấy ra URL hiện tại không bao gồm query parameters
$linkVn = "";
$linkEng = "";
$current_url = $_SERVER['REQUEST_URI'];
if (strpos($current_url, "search")) {
    $linkVn = $current_url . "&language=vn";
    $linkEng = $current_url . "&language=eng";
} else {
    $linkVn = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?language=vn";
    $linkEng = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?language=eng";
}
if (strpos($current_url, "news&events")) {
    $linkVn = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?language=vn";
    $linkEng = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?language=eng";
} else if (strpos($current_url, "news") || strpos($current_url, "event")) {
    $linkVn = $current_url . "&language=vn";
    $linkEng = $current_url . "&language=eng";
}
if ((strpos($current_url, "&language=vn"))) {
    $new_url = str_replace("&language=vn", "", $current_url);
    $linkEng = $new_url . "&language=eng";
    $linkVn = $current_url;
} else if ((strpos($current_url, "&language=eng"))) {
    $new_url = str_replace("&language=eng", "", $current_url);
    $linkVn = $new_url . "&language=vn";
    $linkEng = $current_url;
}
// In ra URL hiện tại
?>
<div>
    <div class="logo-area container-fluid">
        <nav class=" navbar header-container navbar-expand-xl navbar-light fixed-top d-flex justify-content-between" id="mainNav">
            <div class="menu-nav text-center d-flex justify-content-between align-items-center px-3">
                <a class="navbar-brand" href="<?php echo BASE_URL ?>/home">
                    <img src="././assets/imgs/small-logo.png" alt="MSS-logo" class="logo-header">
                </a>
                <a class="navbar-toggler btn-sm align-items-end " type="button" data-bs-toggle="collapse" data-bs-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-solid fa-bars p-0 m-0"></i>
                </a>
            </div>

            <div class="h-100 navlink-container d-flex animate-btn px-4" style="padding-top: 10px; opacity: 100">
                <div class="m-auto">
                    <div class="collapse navbar-collapse" id="navResponsive">
                        <ul class="navbar-nav vn">
                            <li class="nav-item dropdown custom-scrollbar">
                                <a class="nav-link dropdown-toggle about" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Về MSS</a>
                                <ul style="width: auto; right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#a-message-from-our-founder' ?>">Lời ngỏ
                                            từ
                                            Nhà
                                            sáng
                                            lập</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#our-mission' ?>">Sứ
                                            mệnh của
                                            MSS</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#symbol-and-title-of-MSS' ?>">Biểu
                                            tượng và triết lý của
                                            MSS</a></li>
                                    <hr class="dropdown-divider">

                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#MSS-team' ?>">Đội
                                            ngũ
                                            của
                                            MSS</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="<?php echo BASE_URL . '/news&events' ?>" class="nav-link dropdown-toggle event">Sự
                                    kiện</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle curriculum" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Chương trình học</a>

                                <ul style="width: auto; right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#what-is-mooting' ?>">Mooting
                                            là gì?</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#course-overview' ?>">Tổng
                                            quan
                                            chương trình</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#overview-of-theoretical-sessions' ?>">Tổng
                                            quan
                                            các buổi lý thuyết</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#overview-of-mock-sessions' ?>">Tổng
                                            quan
                                            các buổi thực hành</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#end-of-course-sessions' ?>">Các
                                            buổi
                                            kết thúc khóa học</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle tuition" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Học phí</a>
                                <ul style="width: auto; right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/tuition#tuition-packages-and-benefits' ?>">Các
                                            gói học
                                            và quyền
                                            lợi</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/tuition#nonprofits-organizations-and-collecting-tuition' ?>">Tổ
                                            chức không vì lợi nhuận và thu phí</a></li>
                                </ul>
                            </li>


                            <li class="nav-item dropdown ">
                                <a href="<?php echo BASE_URL . '/endorsement' ?>" class="nav-link dropdown-toggle endorsement">Bảo
                                    chứng
                                    từ cộng đồng</a>

                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle faq" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">FAQ</a>
                                <ul style="width: auto; right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#about-the-program' ?>">Về
                                            chương trình</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#about-class-rules' ?>">Về
                                            nội quy trong lớp</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#about-the-package' ?>">Về
                                            gói học</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#about-tuition-fees' ?>">Về
                                            học phí</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#participant-prohibitions' ?>">Hành vi
                                            nghiêm cấm</a></li>

                                </ul>

                            </li>

                            <li class="nav-item dropdown contact">
                                <a target="_blank" class="go-down-btn nav-link dropdown-toggle">Liên hệ</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav eng">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle about" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                                <ul style="width: auto; right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#a-message-from-our-founder' ?>">A
                                            message
                                            from our Founder</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#our-mission' ?>">Our
                                            Mission</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#symbol-and-title-of-MSS' ?>">Our
                                            Emblem</a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#philosophy' ?>">Philosophy</a>
                                    </li>
                                    <hr class="dropdown-divider">

                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#MSS-team' ?>">Our
                                            Team</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="<?php echo BASE_URL . '/news&events' ?>" class="nav-link dropdown-toggle event">News
                                    & Events</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle curriculum" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Curriculum</a>

                                <ul style="width: auto; right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#what-is-mooting' ?>">What
                                            is
                                            Mooting?</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#course-overview' ?>">Course
                                            overview</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#overview-of-theoretical-sessions' ?>">Overview
                                            of theoretical sessions</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#overview-of-mock-sessions' ?>">Overview
                                            of mock sessions</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/curriculum#end-of-course-sessions' ?>">Closing
                                            session</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle tuition" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tuition</a>
                                <ul style="width: auto;  right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/tuition#tuition-packages-and-benefits' ?>">Tuition
                                            packages and benefits</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/tuition#nonprofits-organizations-and-collecting-tuition' ?>">Not-for-profit
                                            organizations and collecting
                                            tuition</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown endorsement">
                                <a href="<?php echo BASE_URL . '/endorsement' ?>" class="nav-link dropdown-toggle endorsement">Endorsement</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle faq" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">FAQ</a>
                                <ul style="width: auto; right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#about-the-program' ?>">About the
                                            program</a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#about-class-rules' ?>">About
                                            class rules</a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#about-the-package' ?>">About the
                                            package</a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#about-tuition-fees' ?>">About
                                            tuition fees</a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/faq#participant-prohibitions' ?>">Prohibited
                                            acts</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="go-down-btn nav-link">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- NAVBAR -->

<div class="d-flex nav-container flex-row-reverse fixed-top offset-lg-6 col-lg-6 container" style=" background-color: rgba(0, 0, 0, 0); padding-top:10px; margin-top:0">

    <div class="col-12 d-flex justify-content-end">
        <div class="w-75">
            <?php
            include "./views/components/searchBar.php";
            ?>
        </div>
        <div class="d-flex language text-center" style="flex: none">
            <a class="text-decoration-none d-flex" href="<?php echo $linkVn ?>" style="cursor:pointer; color: inherit;"><img src="././assets/imgs/vietnam.png" alt="vietnam-flag" class="lang-flag"></a>
            <div class="d-flex h-100 ">
                <span class="px-2 m-auto ">|</span>
            </div>
            <a class="text-decoration-none d-flex" href="<?php echo $linkEng ?>" style="cursor:pointer; color: inherit;"><img src="././assets/imgs/united-kingdom.png" alt="united-kingdom-flag" class="lang-flag"></a>
        </div>
    </div>
</div>

<!-- SOCIAL MEDIA BAR -->
<div class="float-sm vn">
    <div class="fl-fl">
        <i class="fa fa-facebook"></i>
        <a href="<?php echo $facebook->link ?>" target="_blank"> Thích chúng tôi!</a>

    </div>
    <div class="fl-fl">
        <i class="fa fa-instagram"></i>
        <a href="<?php echo $instagram->link ?>" target="_blank">Theo dõi chúng tôi!</a>
    </div>
    <div class="fl-fl">
        <i class="fa fa-linkedin"></i>
        <a href="<?php echo $linkedin->link ?>" target="_blank">Theo dõi chúng tôi!</a>
    </div>
    <div class="fl-fl">
        <i class="fa fa-solid fa-address-card"></i>
        <a href="<?php echo $form->link ?>" target="_blank">Đăng ký tại đây!</a>
    </div>
</div>
<div class="float-sm eng">
    <div class="fl-fl">
        <i class="fa fa-facebook"></i>
        <a href="<?php echo $facebook->link ?>" target="_blank"> Like us!</a>

    </div>
    <div class="fl-fl">
        <i class="fa fa-instagram"></i>
        <a href="<?php echo $instagram->link ?>" target="_blank">Follow us!</a>
    </div>
    <div class="fl-fl">
        <i class="fa fa-linkedin"></i>
        <a href="<?php echo $linkedin->link ?>" target="_blank">Follow us!</a>
    </div>
    <div class="fl-fl">
        <i class="fa fa-solid fa-address-card"></i>
        <a href="<?php echo $form->link ?>" target="_blank">Register here!</a>
    </div>
</div>
<!-- Floating Social Media bar Ends -->

<script>
    const navBtn = $(".navbar");

    const goDownBtn = document.querySelectorAll(".go-down-btn");
    goDownBtn.forEach(item => {
        item.onclick = (e) => {
            window.scrollTo(0, document.body.scrollHeight);
        }
    })
    const langBtn = document.querySelectorAll(".language a");
    const vnBtn = langBtn[0];
    const engBtn = langBtn[1];
    const handleChangLang = async (param) => {
        await fetch("<?php echo BASE_URL ?>/controllers/handleChangeLanguage.php?lang=" + param).then(
            () => {
                console.log("true");
            });
    }
    vnBtn.onclick = (e) => {
        handleChangLang('vn');
    }
    engBtn.onclick = () => {
        handleChangLang('eng');
    }
</script>

<style>
    .event .dropdown-toggle::after {
        display: none;
    }

    .endorsement .dropdown-toggle::after {
        display: none;
    }

    .contact .dropdown-toggle::after {
        display: none;
    }
</style>