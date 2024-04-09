<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo "<script>window.location.href='" . BASE_URL . "/admin/login'</script>";
}
$date = Date::getById($conn, 1);
?>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main p-5">
    <div class="p-5">
        <h1><?php echo convertDate($date->startTime) ?> - <?php echo convertDate($date->endTime) ?></h1>
    </div>
</div>