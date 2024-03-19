<!-- Check login admin -->
<?php
    if (!isset($_SESSION["is_admin"])) {
        // return to login page for admin 
        echo '<script>location.href = "'.BASE_URL .'/admin/login"</script>';
    }
    else {
    }
?>
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<link href="../css/admin.css" rel="stylesheet">
<div class="main container">

</div>