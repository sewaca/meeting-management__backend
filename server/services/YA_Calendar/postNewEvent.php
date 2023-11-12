<?php

include_once BASE_PATH."/server/libraries/simpleCalDAV-master/SimpleCalDAVClient.php";

// $freq = "WEEKLY" | "DAILY" | "YEARLY" | ...


function checkInData($data){
  if (!$data['NAME']) return false;
  if (!$data['AUTHOR'] or !filter_var($data['AUTHOR'], FILTER_VALIDATE_EMAIL)) return false;
  foreach($data['ATTENDEES'] as $attendee)
    if (!filter_var($attendee, FILTER_VALIDATE_EMAIL)) 
      return false;
    

  return true;

  // Проверка времени: 
}

// START и END - unix метки времени
function postNewEvent(
  $id, // calendar id
  $data = [ "START"=> -1, "END" => -1, "NAME" => "", "DESCRIPTION" => "", "AUTHOR" => "", "ATTENDEES" => [] ], 
  $freq = ['rule' => '', 'interval' => 1]
){
  // Если некорректные входные данные: 
  if (!checkInData($data))
    include BASE_PATH."/server/404.php";

  // Если некорректная частота  
  if (
    !in_array($freq['rule'], ["", "DAILY", "WEEKLY", "MONTHLY", "YEARLY"]) 
    or !is_int($freq['interval'])
    or (int)$freq['interval'] <= 0
  ) 
    include BASE_PATH."/server/404.php";

  // Создаем cal dav клиент
  $client = new SimpleCalDAVClient();
  // Подключаемся к яднекс-календарю
  try {
    $client->connect(
      'https://caldav.yandex.ru:443/',
      YA_CALENDAR_LOGIN,
      YA_CALENDAR_PASSWORD
    );
    $allCalendars = $client->findCalendars();
    $client->setCalendar($allCalendars[$id]);
  } catch (Exception $e) {
    file_put_contents('php://stdout', $e->__toString());
    include BASE_PATH."/server/500.php";
  }
  
  $unique_id = '6kqjide'.uniqid().'yandex.ru';
  // Строим запрос  
  $req =  'BEGIN:VCALENDAR'.PHP_EOL.
          'VERSION:2.0'.PHP_EOL.
          'PRODID:-//Yandex LLC//Yandex Calendar//EN'.PHP_EOL.
          'BEGIN:VEVENT'.PHP_EOL.
          'UID:'.$unique_id.PHP_EOL. 
          "DTSTART;TZID=Europe/Moscow:20231108T051500".PHP_EOL.       // Начало
          "DTEND;TZID=Europe/Moscow:20231108T074500".PHP_EOL.         // Конец
          'SUMMARY:Test name'.PHP_EOL.                                // Название
                                                                      // Повторять каждые
          ($freq["rule"] ? "RRULE:FREQ=".$freq["rule"].";INTERVAL=".$freq["interval"].PHP_EOL : "" ).            
          'PUBLIC:PUBLIC'.PHP_EOL.
          'DESCRIPTION:Test desc'.PHP_EOL.                            // Описание
                                             // Создатель: 
          'ORGANIZER;CN="sevabulgackov":mailto:sevabulgackov@yandex.ru'.PHP_EOL.
                                             // Поочередно строки с приглашенными
          'ATTENDEE;CN=example:mailto:example@gmail.com'.PHP_EOL.
          'END:VEVENT'.PHP_EOL.
          'END:VCALENDAR';


  try{
    $res = $client->create($req);
  } catch (Exception $e) {
    file_put_contents('php://stdout', $e->__toString());
    include BASE_PATH."/server/500.php";
  }

  return $res;
}