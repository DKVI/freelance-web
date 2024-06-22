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
    $date = new Date(1, $newStartDate, $newEndDate, 1, "");
    Date::setNewTime($conn, $date);
  }
}

function isValidEmail($email)
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function clearSpecialSymbols($inputString)
{
  // Define a regular expression pattern to match special symbols
  $pattern = '/[^\p{L}0-9\s]/u';

  // Use preg_replace() to remove special symbols from the input string
  $processedString = preg_replace($pattern, '', $inputString);

  return $processedString;
}

function changeLanguge($lang)
{
  $_SESSION['lang'] = $lang;
}


function authenAdmin()
{
  session_start();
  if (isset($_SESSION['is_admin']) && $_SESSION['user_admin']) {
    return true;
  } else {
    $_SESSION["admin_message"] = "You do not have administrator access, please log in!";
    header("Location: " . BASE_URL . "/admin/login");
    return false;
  }
}


function xssClean($data)
{
  // Fix &entity\n;
  $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
  $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
  $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
  $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

  // Remove any attribute starting with "on" or xmlns
  $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

  // Remove javascript: and vbscript: protocols
  $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
  $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
  $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

  // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
  $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
  $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
  $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

  // Remove namespaced elements (we do not need them)
  $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

  do {
    // Remove really unwanted tags
    $old_data = $data;
    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
  } while ($old_data !== $data);

  // we are done...
  return $data;
}
