<?php
function convertDate($date) {
  // Tách ngày tháng năm
  $arrDate = explode("-", $date);
  
  // Lấy ngày và tháng
  $day = $arrDate[2];
  $month = $arrDate[1];
  $year = $arrDate[0];
  
  
  
  return $day . " thg " . $month . ", " . $year;
}