<link rel="stylesheet" href="../css/admin.css">
<div class="min-vh-100 min-vw-100 d-flex">
    <form method="post" action="../controllers/handleChangePassword.php" class="form-change-password d-flex w-50 m-auto rounded-3 shadow overflow-hidden" style="height: 80%">

        <div class="w-50 d-flex">
            <div class="w-75 m-auto d-flex flex-column pb-5">
                <h1 class="py-4 text-center" style="color: #274069;">CHANGE PASSWORD</h1>
                <div class="form-group">
                    <div class="pb-2">
                        <input id="newPassword" type="password" name="newPassword" class="form-control shadow-sm  py-2 px-3" placeholder="Enter new password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pb-2">
                        <input id="confirmNewPassword" type="password" name="confirmNewPassword" class="form-control shadow-sm  py-2 px-3" placeholder="Confirm new password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pb-2">
                        <input id="currentPassword" type="password" name="currentPassword" class="form-control  shadow-sm  py-2 px-3" placeholder="Enter current password" required>
                    </div>
                </div>
                <button class="btn mt-4" style="background-color: #274069; color: white">Submit</button>
            </div>
        </div>
        <div class="shadow w-50 d-flex p-5" style="background-color: #274069;">
            <img src="../assets/imgs/logo-gray.png" alt="" class="m-auto w-100">
        </div>
    </form>
</div>

<script>
    const formChangePassword = document.querySelector('.form-change-password');
    const newPassword = document.getElementById("newPassword");
    const confirmNewPassword = document.getElementById("confirmNewPassword");
    const changePasswordBtn = formChangePassword.querySelector("button");
    const currentPassword = document.getElementById("currentPassword");
    changePasswordBtn.onclick = (e) => {
        console.log("true");
        if (newPassword.value !== "" && confirmNewPassword.value !== "" && currentPassword.value !== "") {
            if (newPassword.localeCompare(confirmNewPassword)) {
                form.submit();
            } else {
                e.preventDefault();
                form.reset();
                alert("New password and confirm password must match!");
            }
        }
    }
</script>