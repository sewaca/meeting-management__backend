<?php 


// Приводим к нужному нам виду строки start и end
$start = str_replace(":", "", str_replace(" ", "T", str_replace(".", "", $_GET['start'])))."Z";
$end   = str_replace(":", "", str_replace(" ", "T", str_replace(".", "", $_GET['end'])))."Z";
// Проверяем валидные ли данные переданы: 
if (
  !$_GET['room_name'] 
  or !strtotime($start) 
  or !strtotime($end)
  or strtotime($end) <= strtotime($start)
) {
  include BASE_PATH."/server/404.php";
}

// Получаем данные на этот день
include BASE_PATH."/server/libraries/simpleCalDAV-master/SimpleCalDAVClient.php";

// Подключаемся к яндекс-календарю
$client = new SimpleCalDAVClient();
try {
  $client->connect(
    'https://caldav.yandex.ru:443/',
    YA_CALENDAR_LOGIN,
    YA_CALENDAR_PASSWORD
  );
  // Получаем все доступные календари
  $all_calendars = $client->findCalendars();
  // Ищем нужный нам календарь
  $calendar_id = null;
  foreach($all_calendars as $calendar){
    if ($calendar->getDisplayName() === $_GET['room_name'])
      $calendar_id = $calendar->getCalendarID();
  }
  if (!$calendar_id){
    include BASE_PATH."/server/404.php";
  }
  $client->setCalendar($all_calendars[$calendar_id]);
  // Проверяем свободно ли в переговорке в нужное время
  $events = $client->getEvents($start, $end);
  echo json_encode(count($events) === 0);  
} catch (Exception $e) {
  file_put_contents('php://stdout', $e->__toString());
  include BASE_PATH."/server/500.php";
}
