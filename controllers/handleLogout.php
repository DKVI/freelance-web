<?php
include "../config.php";
session_start();
unset($_SESSION["is_admin"]);
header("Location: " . BASE_URL . "/admin/login");