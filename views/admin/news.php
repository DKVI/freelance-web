<!-- Check login admin -->
<?php
    if (!isset($_SESSION["is_admin"])) {
        // return to login page for admin 
        header("Location: " . BASE_URL . "/admin/login");
    }
    else {
    }
?>
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main container">

</div>