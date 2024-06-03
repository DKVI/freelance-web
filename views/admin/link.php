<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo "<script>window.location.href='" . BASE_URL . "/admin/login'</script>";
}
$facebookLink = Link::getByName($conn, "facebook");
$linkedinLink = Link::getByName($conn, "linkedin");
$instagramLink = Link::getByName($conn, "instagram");
$mailLink = Link::getByName($conn, "mail");
$registerLink = Link::getByName($conn, "form");
?>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main p-5">
    <div class="px-5 py-3">
        <h1>LINK</h1>
        <div class="px-5 w-100">
            <div class="px-5 d-flex flex-column" style="gap: 32px;">
                <div>
                    <h5>Facebook</h5>
                    <form class="w-full d-flex" style="gap: 8px" method="post" action="<?php echo BASE_URL . "/controllers/handleUpdateSocialLink.php?name=facebook" ?>">
                        <input name="link" class="form-control w-75" required value="<?php echo $facebookLink->link ?>">
                        <div class="w-25 d-flex justify-content-center" style="gap: 8px"><button class="btn btn-primary" type="reset" onclick="reload()">Undo</button>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                <div>
                    <h5>Linkedin</h5>
                    <form class="w-full d-flex" style="gap: 8px" method="post" action="<?php echo BASE_URL . "/controllers/handleUpdateSocialLink.php?name=linkedin" ?>">
                        <input class="form-control w-75" name="link" required value="<?php echo $linkedinLink->link ?>">
                        <div class="w-25 d-flex justify-content-center" style="gap: 8px"><button class="btn btn-primary" type="reset" onclick="reload()">Undo</button>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                <div>
                    <h5>Instagram</h5>
                    <form class="w-full d-flex" style="gap: 8px" method="post" action="<?php echo BASE_URL . "/controllers/handleUpdateSocialLink.php?name=instagram" ?>">
                        <input class="form-control w-75" name="link" required value="<?php echo $instagramLink->link ?>">
                        <div class="w-25 d-flex justify-content-center" style="gap: 8px"><button class="btn btn-primary" type="reset" onclick="reload()">Undo</button>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                <div>
                    <h5>Email</h5>
                    <form class="w-full d-flex" style="gap: 8px" method="post" action="<?php echo BASE_URL . "/controllers/handleUpdateSocialLink.php?name=email" ?>">
                        <input class="form-control w-75" name="link" required value="<?php echo $mailLink->link ?>">
                        <div class="w-25 d-flex justify-content-center" style="gap: 8px"><button class="btn btn-primary" type="reset" onclick="reload()">Undo</button>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                <div class="d-flex">
                    <div class="m-auto w-75">
                        <h4>Register Form</h4>
                        <form class="w-full d-flex flex-column" method="post" action="<?php echo BASE_URL . "/controllers/handleUpdateForm.php" ?>" style="gap: 8px">

                            <div class="form-group">
                                <label class="form-label">
                                    Title (VN)
                                </label>
                                <input name="title_vn" class="form-control w-100" required value="<?php echo $registerLink->titleVn ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Title (ENG)
                                </label>
                                <input name="title_en" class="form-control w-100" required value="<?php echo $registerLink->titleEng ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Link
                                </label>
                                <input name="link" class="form-control w-100" required value="<?php echo $registerLink->link ?>">
                            </div>
                            <div class="w-100 d-flex justify-content-center" style="gap: 8px"><button class="btn btn-primary" type="reset" onclick="reload()">Undo</button>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const reload = () => {
        location.reload();
    }
</script>