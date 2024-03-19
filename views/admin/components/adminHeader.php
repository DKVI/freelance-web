<nav class="p-3 admin-header d-flex navbar navbar-expand-lg justify-content-between "
    style="background-color: #274069; height: 60px;">
    <div class="px-5 w-1/3 h-100" style="width: 30%;">
        <a style="cursor: pointer;" href="<?php echo BASE_URL . '/home' ?>">
            <img class=" h-100" src="../assets/imgs/logo-gray.png" style="scale: 2;" alt="">
        </a>
    </div>
    <div class="d-flex justify-content-between" style="width: 30%;">
        <a class="text-white text-decoration-none" style="cursor: pointer">Home</a>
        <a class="text-white text-decoration-none" href="<?php echo BASE_URL . '/admin/news'?>"
            style="cursor: pointer">News</a>
        <a class="text-white text-decoration-none" href="<?php echo BASE_URL . '/admin/events'?>" style=" cursor:
            pointer">Events</a>
        <a class="text-white text-decoration-none" href="<?php echo BASE_URL . '/admin/faqs'?>"
            style="cursor: pointer">FAQs</a>
    </div>
    <div class="px-5 w-1/3 d-flex justify-content-end " style="width: 30%;">
        <a class="btn btn-outline-light" href="../controllers/handleLogout.php">Logout</a>
    </div>
</nav>