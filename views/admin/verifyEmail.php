<link rel="stylesheet" href="../css/admin.css">
<div class="w-100 h-100 d-flex">
    <form method="post" action="../controllers/handleSendMail.php"
        class="form d-flex w-50 m-auto rounded-3 shadow overflow-hidden login-container" style="height: auto">
        <div class="shadow w-50 d-flex p-5" style="background-color: #274069;">
            <img src="../assets/imgs/logo-gray.png" alt="" class="m-auto w-100">
        </div>
        <div class="w-50 d-flex">
            <div class="w-75 m-auto d-flex flex-column ">
                <h1 class="py-4 text-center" style="color: #274069;">VERIFY ADMIN</h1>
                <div class="form-group">
                    <div class="pb-2">
                        <input id="email" type="email" name="email" class="form-control shadow-sm  py-2 px-3"
                            placeholder="Enter admin's email" required>
                    </div>
                </div>
                <button class="btn mt-4" style="background-color: #274069; color: white">Confirm</button>
            </div>
        </div>
    </form>
</div>

<style>
body {
    margin: auto !important;
}

.gototop-component {
    display: none;
}
</style>