<?php 

include BASE_PATH."/server/libraries/simpleCalDAV-master/SimpleCalDAVClient.php";

function getAllCalendars(){
  // Создаем cal dav клиент
  $client = new SimpleCalDAVClient();
  // Подключаемся к яндекс-календарю
  try {
    $client->connect(
      'https://caldav.yandex.ru:443/',
      YA_CALENDAR_LOGIN,
      YA_CALENDAR_PASSWORD
    );
    // Получаем все доступные календари
    $all_calendars = $client->findCalendars();
  } catch (Exception $e) {
    file_put_contents('php://stdout', $e->__toString());
    include BASE_PATH."/server/500.php";
  }

  return $all_calendars;
}
