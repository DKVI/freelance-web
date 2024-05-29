<!-- NAVBAR -->
<!-- LOGO AREA -->
<div class="logo-area container-fluid">
    <nav class=" navbar navbar-expand-xl navbar-light fixed-top d-flex justify-content-between" id="mainNav">
        <div class="menu-nav text-center d-flex justify-content-between align-items-center px-3">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>/home">
                <img src="././assets/imgs/small-logo.png" alt="MSS-logo" class="w-100">
            </a>
            <a class="navbar-toggler btn-sm align-items-end " type="button" data-bs-toggle="collapse"
                data-bs-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa fa-solid fa-bars p-0 m-0"></i>
            </a>
        </div>

        <div class="h-100 navlink-container d-flex animate-btn px-5" style="padding-top: 10px;">
            <div class="m-auto">
                <div class="collapse navbar-collapse" id="navResponsive">
                    <ul class="navbar-nav vn">
                        <li class="nav-item dropdown custom-scrollbar">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Về MSS</a>
                            <ul style="width: auto" class="shadow-lg dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/about#a-message-from-our-founder' ?>">Lời ngỏ từ
                                        Nhà
                                        sáng
                                        lập</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#our-mission' ?>">Sứ
                                        mệnh của
                                        MSS</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/about#symbol-and-title-of-MSS' ?>">Biểu
                                        tượng và triết lý của
                                        MSS</a></li>
                                <hr class="dropdown-divider">

                                <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#MSS-team' ?>">Đội ngũ
                                        của
                                        MSS</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL . '/news&events' ?>" class="nav-link">Sự kiện</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Chương trình học</a>

                            <ul style="width: auto"
                                class="shadow-lg dropdown-menu dropdown-menu-light custom-scrollbar">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#what-is-mooting' ?>">Mooting
                                        là gì?</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#course-overview' ?>">Tổng
                                        quan
                                        chương trình</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#overview-of-theoretical-sessions' ?>">Tổng
                                        quan
                                        các buổi lý thuyết</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#overview-of-mock-sessions' ?>">Tổng
                                        quan
                                        các buổi thực hành</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#end-of-course-sessions' ?>">Các
                                        buổi
                                        kết thúc khóa học</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Học phí</a>
                            <ul style="width: auto" class="shadow-lg dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/tuition#tuition-packages-and-benefits' ?>">Các
                                        gói học
                                        và quyền
                                        lợi</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/tuition#nonprofits-organizations-and-collecting-tuition' ?>">Tổ
                                        chức phi lợi nhuận và thu phí</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Bảo chứng từ cộng đồng</a>
                            <ul style="width: auto"
                                class="shadow-lg dropdown-menu dropdown-menu-light custom-scrollbar">
                                <li><a class="dropdown-item" href="#">Từ Mentee</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="#">Từ cựu Mooter</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="#">Từ giám khảo và các tổ chức</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">FAQ</a>
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
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/faq#about-tuition-fees' ?>">Về
                                        học phí</a></li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="navbar-nav eng">
                        <li class="nav-item dropdown custom-scrollbar">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">About MSS</a>
                            <ul style="width: auto" class="shadow-lg dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/about#a-message-from-our-founder' ?>">Message
                                        from our Founder</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#our-mission' ?>">Our
                                        Mission</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/about#symbol-and-title-of-MSS' ?>">Our Mascot</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/about#philosophy' ?>">Philosophy</a></li>
                                <hr class="dropdown-divider">
                                
                                <li><a class="dropdown-item" href="<?php echo BASE_URL . '/about#MSS-team' ?>">MSS team</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL . '/news&events' ?>" class="nav-link">Events</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Curriculum</a>

                            <ul style="width: auto"
                                class="shadow-lg dropdown-menu dropdown-menu-light custom-scrollbar">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#what-is-mooting' ?>">What is
                                        Mooting?</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#course-overview' ?>">Course
                                        overview</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#overview-of-theoretical-sessions' ?>">Overview
                                        of theoretical sessions</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#overview-of-mock-sessions' ?>">Overview
                                        of mock sessions</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/curriculum#end-of-course-sessions' ?>">End of
                                        course sessions</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Tuition</a>
                            <ul style="width: auto" class="shadow-lg dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/tuition#tuition-packages-and-benefits' ?>">Tuition
                                        packages and benefits</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/tuition#nonprofits-organizations-and-collecting-tuition' ?>">Nonprofits
                                        organizations and collecting
                                        tuition</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Guarantee from the community</a>
                            <ul style="width: auto"
                                class="shadow-lg dropdown-menu dropdown-menu-light custom-scrollbar">
                                <li><a class="dropdown-item" href="#">From Mentee</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="#">From Former Mooter</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="#">
                                        From Judges And Organizations</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">FAQ</a>
                            <ul style="width: auto; right: 0" class="shadow-lg dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/faq#about-the-program' ?>">About the program</a>
                                </li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/faq#about-class-rules' ?>">About class rules</a>
                                </li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/faq#about-the-package' ?>">About the package</a>
                                </li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/faq#about-tuition-fees' ?>">About tuition fees</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- NAVBAR -->

<div class="d-flex flex-row-reverse fixed-top offset-lg-6 col-lg-6" style=" background-color: #e5e5e5; padding-top:10px; margin-top:0">

    <div class="col-12 d-flex">
        <div class="w-75">
            <?php
            include "./views/components/searchBar.php";
            ?>
        </div>
        <div class="d-flex language text-center" style="flex: none">
            <a class="text-decoration-none d-flex"
                href="<?php echo $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?language=vn"; ?>"
                style="cursor:pointer; color: inherit;"><img src="././assets/imgs/vietnam.png" alt="vietnam-flag"
                    class="lang-flag"></a>
            <div class="d-flex h-100 ">
                <span class="px-2 m-auto ">|</span>
            </div>
            <a class="text-decoration-none d-flex"
                href="<?php echo $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?language=eng"; ?>"
                style="cursor:pointer; color: inherit;"><img src="././assets/imgs/united-kingdom.png"
                    alt="united-kingdom-flag" class="lang-flag"></a>
        </div>
    </div>
</div>

<!-- SOCIAL MEDIA BAR -->
<div class="float-sm">
    <div class="fl-fl">
        <i class="fa fa-facebook"></i>
        <a href="#" target="_blank"> Like us!</a>
    </div>
    <div class="fl-fl">
        <i class="fa fa-instagram"></i>
        <a href="#" target="_blank">Follow us!</a>
    </div>
    <div class="fl-fl">
        <i class="fa fa-linkedin"></i>
        <a href="#" target="_blank">Follow us!</a>
    </div>
    <div class="fl-fl">
        <i class="fa fa-solid fa-address-card"></i>
        <a href="#" target="_blank" class="">Contact us!</a>
    </div>
</div>
<!-- Floating Social Media bar Ends -->

<script>
const navBtn = $(".navbar");
const navlinkContainer = $(".navlink-container");
console.log(navBtn);
navBtn.on("mouseover", function(e) {
    navlinkContainer.css("opacity", "100");
});
navBtn.on("mouseout", function(e) {
    navlinkContainer.css("opacity", "0");
});

const langBtn = document.querySelectorAll(".language a");
const vnBtn = langBtn[0];
const engBtn = langBtn[1];
const handleChangLang = async (param) => {
    await fetch("<?php echo BASE_URL ?>/controllers/handleChangeLanguage.php?lang=" + param).then(() => {
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