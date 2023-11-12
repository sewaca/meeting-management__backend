<?php 




// include_once BASE_PATH."/server/services/YA_Calendar/getAllCalendars.php";
// include_once BASE_PATH."/server/services/YA_Calendar/getCalendarIdByName.php";
// include_once BASE_PATH."/server/services/YA_Calendar/postNewEvent.php";


// $all = getAllCalendars();
// print_r($all);

// // Создаем cal dav клиент
// $client = new SimpleCalDAVClient();
// // Подключаемся к яндекс-календарю
// try {
//   $client->connect(
//     'https://caldav.yandex.ru:443/',
//     YA_CALENDAR_LOGIN,
//     YA_CALENDAR_PASSWORD
//   );
//   // Получаем все доступные календари
//   $all_calendars = $client->findCalendars();
// } catch (Exception $e) {
//   file_put_contents('php://stdout', $e->__toString());
//   include BASE_PATH."/server/500.php";
// }
// print_r($all_calendars);



// print_r($all_calendars);


// https://calendar.yandex.ru/embed/week?private_token=72e2275a00cf65fcab5f4bb9a552ace17c41fb6f&tz_id=Europe/Moscow

// $client->setCalendar($all_calendars["events-26375286"]);

// // $dt_scan = gmdate('Ymd',time() - 3 * 24 * 60 * 60).'T000000Z';
// $my = $client->getEvents('20231109T063500Z', '20231109T063700Z'); // getEvents( start, finish )
// print_r($my);

// $res = postNewEvent('events-26375286', [], ['rule' => '', 'interval' => 2]);


// $id = getCalendarIdByName('Переговорная №1');

// postNewEvent('events-26375286');

// date_default_timezone_set('Europe/Moscow');

$dateFormat = 'Y-m-d H:i:s O'; // 2023-11-11 16:25:22 +0300

$date = date($dateFormat, strtotime('2023-11-11 16:25:22 +0300'));
echo $date.PHP_EOL;


// echo strtotime('2023/11/08 07:45:00 +02:00').PHP_EOL;
// echo ((new DateTime("now", new DateTimeZone('Europe/Moscow') ))->format('Y-m-d H:i:s O')).PHP_EOL;

// echo date("Y.m.d h:m:s", time()).PHP_EOL;
// // echo date("Y.m.d h:m:s", strtotime('2023/11/08 07:45:00 +02:00')).PHP_EOL;





// // print_r($arrayOfCalendars["events-26375286"]);

// // $res = $client->getEvents();
// // print_r($res);





// // TODO: Сделать выбор календаря зависящим от имени календаря
//   $client->setCalendar($arrayOfCalendars["events-26375286"]);
//   $dt_scan = gmdate('Ymd',time() - 3 * 24 * 60 * 60).'T000000Z';
//   $my = $client->getEvents($dt_scan);
//   echo("<pre>");
//   print_r($my);
//   foreach($my as $ev){

//     $all = $ev->getData();
//     $pos = stripos($all, "BEGIN:VEVENT");
//     $pos1 = stripos($all, "END:VEVENT");
//       if($pos && $pos1){
//         $event = explode("\n",substr($all,$pos + 13,$pos1 - $pos - 14));//between BEGIN:VEVENT & END:VEVENT
//         //print_r( $event);
//                 $todoerId = 0;
//                 $todoerCat = '';
//                 $todoerTitle = '';
//                 $description = ''; $categories = '';
//                 $summary = ''; $start = 0; $end = 0; $lastMod = 0;
//                 $todoer = false;
//         foreach($event as $line){
//           echo($line."<br>");
//           //парсим по-строчно
//           if(preg_match('/^DTSTART;VALUE=DATE:(\d\d\d\d\d\d\d\d)/su', $line, $m)){
//               $start0 = date_create_from_format('Ymd',$m[1]);
//               $start = date_format($start0, 'Y-m-d 00:00:00');
//           }elseif(preg_match('/^DTSTART;TZID=(.*):(\d\d\d\d\d\d\d\dT\d\d\d\d\d\d)/su', $line, $m)){
//               $start0 = date_create_from_format('Ymd\THis',$m[2],new DateTimeZone($m[1]));
//               date_timezone_set($start0, timezone_open('Europe/Moscow'));
//               $start = date_format($start0, 'Y-m-d H:i:00');
//           }elseif(preg_match('/^DTEND;VALUE=DATE:(\d\d\d\d\d\d\d\d)/su', $line, $m)){
//               $end0 = date_create_from_format('Ymd',$m[1]);
//               $end  = date_format($end0, 'Y-m-d 00:00:00');
//           }elseif(preg_match('/^DTEND;TZID=(.*):(\d\d\d\d\d\d\d\dT\d\d\d\d\d\d)/su', $line, $m)){
//               $end0 = date_create_from_format('Ymd\THis',$m[2],new DateTimeZone($m[1]));
//               date_timezone_set($end0, timezone_open('Europe/Moscow'));
//               $end = date_format($end0, 'Y-m-d H:i:00');
//           }elseif(str_starts_with($line,"SUMMARY:")){
//               $summary = str_replace("SUMMARY:",'',$line);
//           }elseif(str_starts_with($line,"LAST-MODIFIED:")){
//               $lm = str_replace("LAST-MODIFIED:",'',$line);          
//           }elseif(str_starts_with($line,"UID:")){
//               $uid = str_replace("UID:",'',$line);
//               if(str_starts_with($uid,"todoerEvent")){
//                  $todoer = true;
//                 $todoerId = (int)str_replace(array("todoerEvent","@mdm.clnd"),'',$uid);
//                 $td = explode("/",$summary);
//                 if($td[0]) $todoerCat = $td[0];
//                 if($td[1]) $todoerTitle = $td[1];

//               }else{
//                 $todoer = false;
//               }
//           }elseif(str_starts_with($line,"DESCRIPTION:")){
//               $description = str_replace("DESCRIPTION:",'',$line);
//               $description = str_replace('\\n',PHP_EOL,$description);
//               $description = str_replace('\\,',',',$description);
//               $description = str_replace('\\;',';',$description);
//           }elseif(preg_match('/^LAST-MODIFIED:(\d\d\d\d\d\d\d\dT\d\d\d\d\d\d)Z/su', $line, $m)){
//             $lastMod0 = date_create_from_format("Ymd\THis",$m[1],new DateTimeZone('UTC'));
//             $lastMod = date_format($lastMod0, 'Y-m-d H:i:s');
//           }elseif(str_starts_with($line,"CATEGORIES:")){
//             $categories = str_replace("CATEGORIES:",'',$line);
//           }
//         }

//   }
//    echo "start:$start end:$end summary:$summary <br>";
//    echo " uid:$uid  todoerId:$todoerId todoerCat:$todoerCat todoerTitle:$todoerTitle<br>";
//    if($description>'')echo " description:".mb_substr($description,0,20)."<br>";
//    echo " categories:$categories<br>";
//    echo " lastMod gmt:$lastMod<br>";
//    echo('--------------------------------<br>');

//    if(!$todoer){ //search in db
//     $interval = date_diff($start0,$end0);
//     echo("diff ".$interval->d." d ".$interval->days." days ".$interval->h." h ".$interval->i." m <br>");
//     if(($interval->d > 0 && $interval->h == 0 && $interval->i == 0) ){ //|| ($interval->h == 23 && $interval->i == 59)){
//       $all_day = 1;
//       echo('all_day<br>');
//       $end2 = date_create_from_format('Y-m-d H:i:s',$end);
//       date_modify($end2, '-1 minute');
//       echo 'new end:'.date_format($end2, 'Y-m-d 23:59:00').'<br>';
//       $end = date_format($end2, 'Y-m-d 23:59:00');
//     }else{
//       $all_day =0;
//     }

//     $rec = SQLSelectOne("SELECT c.ID FROM `clnd_events` c join clnd_categories cc on c.CALENDAR_CATEGORY_ID=cc.ID WHERE cc.TITLE='Yandex' AND c.TITLE='".DBSafe($summary)."' AND DUE='$start'");
//    if(!$rec['ID']) {
//    if(strtotime($end)>= time()){//не берём прошлое
//    echo('Добавим в todoer в категорию Yandex?<br>');
//    //add new
//    include_once(DIR_MODULES . 'todoer/todoer.class.php');

//    $todo = new todoer();
//    $tsk = array(
//     'TITLE'         => $summary,
//     'DUE'           => $start,
//     'END_TIME'      => $end,
//     'NOTES'         => $description,
//     'CATEGORY'      => "Yandex",
//     'ALL_DAY'       => $all_day,
//     'EX_ID'         => $uid,
//     'LAST_SYNCHRO'  => date('Y-m-d H:i:s')
//     //  ... and so on
//    );
//    //echoes id of new task

//      $todoerid = $todo->create_new_task($tsk);
//      //SQLExec("UPDATE `clnd_events` SET LAST_SYNCHRO='".date('Y-m-d H:i:s')."' WHERE `ID`=".$todoerid);
//      echo " Да, добавили!<br>";
//    }
//    }else{echo "Нет, уже есть!<br>";}
//    }
//  }
//   echo("ok"); -->