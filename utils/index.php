<?php
function convertDate($date)
{
  $dateObject = DateTime::createFromFormat('Y-m-d', $date);
  if (!$dateObject) {
    throw new Exception("Invalid date format. Please use YYYY-MM-DD.");
  }
  return $dateObject->format('d F, Y');
}


function convertTimes($times)
{
  $second = $times;
  $minues = floor($second / 60);
  $rest_minues = $second - (floor($second / 60) * 60);
  return $minues . 'm' . $rest_minues . 's';
}
