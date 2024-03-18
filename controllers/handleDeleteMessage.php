<?php 
include_once "../models/message.php";
include_once "../config.php";
include_once "../models/database.php";
$conn = require "../inc/db.php";

// if (isset($_GET["id"])) {
//     $id = $_GET["id"];
//     try {
//         Message::deleteById($conn, $id);
//         echo "<script>alert('Delete message successfully!');
//             location.href ='".BASE_URL."/admin/faqs';
//         </script>";
//     } catch (\Throwable $e) {
//         echo "<script>alert('Has got some error, please try again!');
//             location.href ='".BASE_URL."/admin/faqs';
//         </script>";
//     }
// } 
if(isset($_POST['checkbox'])){
    if (is_array($_POST['checkbox'])) {
      foreach($_POST['checkbox'] as $value){
        echo $value;
      }
    } else {
      $value = $_POST['checkbox'];
      echo $value;
    }
  }