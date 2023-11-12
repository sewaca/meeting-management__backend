<?php

include BASE_PATH."/server/libraries/simpleCalDAV-master/SimpleCalDAVClient.php";

// event_id

$room = [
  'name' => "Экспресс №1",
];

try{ 
  // ~ Получаем id календаря по имени:
  $client = new SimpleCalDAVClient();
  $client->connect(
    'https://caldav.yandex.ru:443/',
    YA_CALENDAR_LOGIN,
    YA_CALENDAR_PASSWORD
  );
  // Получаем все доступные календари
  $all_calendars = $client->findCalendars();

  $calendar_id = null;
  foreach($all_calendars as $calendar){
    if ($calendar->getDisplayName() === $room['name'])
      $calendar_id = $calendar->getCalendarID();
  }
  if (!$calendar_id) {
    include BASE_PATH."/server/404.php";
  } 
  $client->setCalendar($all_calendars[$calendar_id]);
  // yrl.uniqueid.'
  $client->DoDELETERequest("https://caldav.yandex.ru:443/"."6kqjide65508f3d0819byandex.ru".'.ics');

} 
catch ( Exception $e ) {
  file_put_contents('php://stdout', $e->__toString());
  include BASE_PATH."/server/500.php";
} 
