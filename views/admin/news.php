<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    header("Location: " . BASE_URL . "/admin/login");
} else {
}
?>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main container">
    <div class="p-5">
        <h1 class="py-4" style="color: #274069">NEWS</h1>
        <div>
            <a class="btn btn-success" href="<?php echo BASE_URL . "/admin/addNews" ?>">Create</a>
        </div>
    </div>
</div>