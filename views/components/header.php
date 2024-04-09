<!-- LOGO AREA -->
<div class="logo-area container-fluid fixed-top" style="z-index: 0">
    <nav class=" navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="menu-nav text-center justify-content-center align-items-center col-lg-4">
            <a class="navbar-brand" href="#">
                <img src="././assets/imgs/small-logo.png" alt="MSS-logo">
            </a>
            <button class="navbar-toggler btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-solid fa-bars p-0 m-0"></i>
            </button>
        </div>
        <div class="container-fluid animate-btn col-lg-8">
            <div class="collapse navbar-collapse" id="navResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown custom-scrollbar">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li><a class="dropdown-item" href="#">About Us</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Our Team</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Our Friends</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">M.S.S</a>
                        <ul class="dropdown-menu dropdown-menu-light custom-scrollbar">
                            <li><a class="dropdown-item" href="#">Artical 1</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 2</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 3</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 4</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 5</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 6</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 7</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 8</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 9</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 10</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 11</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 12</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 13</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 14</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Artical 15</a></li>
                            <hr class="dropdown-divider">
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Review</a>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li><a class="dropdown-item" href="#">Mentee</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Mooter</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Judges & Organizations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pricing</a>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li><a class="dropdown-item" href="#">Pricing Scheme</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Scholarship</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link" href="#">News & Events</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">FAQ</a>
                        <ul class="dropdown-menu dropdown-menu-light custom-scrollbar">
                            <li><a class="dropdown-item" href="#">Question no.1</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.2</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.3</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.4</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.5</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.6</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.7</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.8</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.9</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="#">Question no.10</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link" href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex language fixed-top">
        <a class="text-decoration-none" href="<?php echo $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?language=vn"; ?>" style="cursor:pointer; color: inherit;"><img src="././assets/imgs/vietnam.png" alt="vietnam-flag" class="lang-flag"></a> <span class="px-2">|</span>
        <a class="text-decoration-none" href="<?php echo $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?language=eng"; ?>" style="cursor:pointer; color: inherit;"><img src="././assets/imgs/united-kingdom.png" alt="united-kingdom-flag" class="lang-flag"></a>
    </div>
</div>
<!-- NAVBAR -->


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
        <a href="#" target="_blank">Contact us!</a>
    </div>
</div>
<!-- Floating Social Media bar Ends -->