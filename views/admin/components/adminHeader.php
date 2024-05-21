<nav class="p-3 admin-header d-flex navbar navbar-expand-lg justify-content-between " style="background-color: #274069; height: 60px;">
    <div class="px-5 w-1/3 h-100" style="width: 30%;">
        <a style="cursor: pointer;" href="<?php echo BASE_URL . '/admin/home' ?>">
            <img class=" h-100" src="../assets/imgs/logo-gray.png" style="scale: 2;" alt="">
        </a>
    </div>
    <div class="d-flex justify-content-between" style="width: 30%;">
        <a class="text-white text-decoration-none" href="<?php echo BASE_URL . '/admin/home' ?>" style="cursor: pointer">Home</a>
        <a class="text-white text-decoration-none" href="<?php echo BASE_URL . '/admin/posts?type=all' ?>" style=" cursor:pointer">Posts</a>
        <a class="text-white text-decoration-none" href="<?php echo BASE_URL . '/admin/messages' ?>" style="cursor: pointer">Messages</a>
        <a class="text-white text-decoration-none" href="<?php echo BASE_URL . '/admin/hashtag' ?>" style="cursor: pointer">Hashtag</a>
    </div>
    <div class="px-5 w-1/3 d-flex justify-content-end " style="width: 30%;">
        <div class="px-4 dropdown show">
            <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
            </a>

            <div class="dropdown-menu shadow " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?php echo BASE_URL . "/admin/change-password" ?>">Change Password</a>
                <a class="dropdown-item" href="<?php echo BASE_URL . "/admin/login" ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>