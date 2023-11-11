<?php 

include_once BASE_PATH."/server/services/YA_Calendar/getAllCalendars.php";

function getCalendarIdByName($name){
  $calendars = getAllCalendars();
  foreach($calendars as $calendar){
    if ($calendar->getDisplayName() === $name)
      return $calendar->getCalendarID();
  }

  return -1;
}