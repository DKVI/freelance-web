<!-- Check login admin -->
<?php
    if (!isset($_SESSION["is_admin"])) {
        // return to login page for admin 
        header("Location: /" . BASE_URL . "/admin/login");
    }
?>
<h1>Message</h1>