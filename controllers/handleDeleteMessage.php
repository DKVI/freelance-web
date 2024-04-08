<?php
include_once "../models/message.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";


if (isset($_POST['checkbox'])) {
  if (is_array($_POST['checkbox'])) {
    try {
      foreach ($_POST['checkbox'] as $value) {
        Message::deleteById($conn, $value);
      }
      echo '<script>alert("Delete messages successfully!");
                    location.href="' . BASE_URL . '/admin/messages";
                </script>';
    } catch (\Throwable $e) {
      echo '<script>alert("Server gots some error, please try again!");
                location.href="' . BASE_URL . '/admin/messages";
          </script>';
    }
  } else {
    $value = $_POST['checkbox'];
    echo $value;
    try {
      Message::deleteById($conn, $value);
      echo '<script>alert("Delete messages successfully!");
                    location.href="' . BASE_URL . '/admin/messages";
                </script>';
    } catch (\Throwable $e) {
      echo '<script>alert("Server gots some error, please try again!");
                    location.href="' . BASE_URL . '/admin/messages";
                </script>';
    }
  }
}
