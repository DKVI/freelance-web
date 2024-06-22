<?php
if (isset($_SESSION["admin_message"])) {
    echo "<script>alert('" . $_SESSION["admin_message"] . "');</script>";
    unset($_SESSION["admin_message"]);
    session_destroy();
} else {
    session_destroy();
}
?>
<link rel="stylesheet" href="../css/admin.css">
<div class="min-vh-100 min-vw-100 d-flex">
    <form method="post" action="../controllers/handleLogin.php" class="form d-flex w-50 m-auto rounded-3 shadow overflow-hidden" style="height: 80%">
        <div class="w-50 d-flex">
            <div class="w-75 m-auto">
                <h1 class="py-4 text-center" style="color: #274069;">LOGIN FOR ADMIN</h1>
                <div class="form-group">
                    <label class="form-label py-1 fw-bold " for="username" style="color: #274069;">
                        Username:
                    </label>
                    <div class="pb-2">
                        <input id="username" name="username" class="form-control shadow-sm  py-2 px-3" placeholder="Enter your username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label py-1 fw-bold" for="password" style="color: #274069;">
                        Password:
                    </label>
                    <div class="pb-2">
                        <input id="password" name="password" class="form-control shadow-sm py-2 px-3" type="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="pt-4 pb-5 d-flex justify-content-end flex-column" style="gap: 8px">
                    <div class="d-flex">
                        <p>Forgot password? <a style="color: #274069;" href="<?php echo BASE_URL . '/admin/verifyEmail' ?>">
                                Click
                                here!</a></p>
                    </div>
                    <button class="btn text-white w-50 shadow-sm" style="background-color: #274069;">Login</button>
                </div>
            </div>
        </div>
        <div class="shadow w-50 d-flex p-5" style="background-color: #274069;">
            <img src="../assets/imgs/logo-gray.png" alt="" class="m-auto w-100">
        </div>
    </form>
</div>