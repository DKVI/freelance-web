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

function getLastDayOfMonth($month, $year)
{
  if (!checkdate($month, 1, $year)) {
    throw new InvalidArgumentException("Invalid month or year provided.");
  }
  $date = new DateTime("{$year}-{$month}-01");
  $date->modify('last day of this month');
  return $date->format('Y-m-d');
}

function resetTime($conn, $currentDate)
{
  $date = Date::getById($conn, 1);
  if (($currentDate >= $date->startTime && $currentDate <= $date->endTime)) {
  } else {
    $newStartMonth = 0;
    $newEndMonth = (int)date("m", strtotime($date->endTime)) + 3;
    $year = (int)date("Y", strtotime($date->endTime));
    if ($newEndMonth > 12) {
      $newEndMonth = 3;
      $newStartMonth = 1;
      $year += 1;
    } else {
      $newStartMonth = (int)date("m", strtotime($date->startTime)) + 3;
    }
    $newStartDate = date($year . "-" . $newStartMonth . "-" . 1);
    $newEndDate = getLastDayOfMonth($newEndMonth, $year);
    $date = new Date(1, $newStartDate, $newEndDate, 1);
    Date::setNewTime($conn, $date);
  }
}
