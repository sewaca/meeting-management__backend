<?php

// TODO:! Отображать текущее состояние занятости и событие которое там идет, если такое есть 

$office_id = $_GET['office_id'];
$status = json_decode($_GET["status"]);

try {
  // Подключаемся к БД
  $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($link->connect_error)
    throw new Exception("Connection failed");

  // Получаем информацию из БД
  $sql = "SELECT `id`,`name`,`photo`,`status` FROM `meeting_rooms` WHERE `office_id` = ?" . (isset($status) ? " AND `status` = ? " : "");
  $stmt = $link->prepare($sql);
  if (isset($status))
    $stmt->bind_param("ii", $office_id, $status);
  else 
    $stmt->bind_param("i", $office_id);

  $stmt->execute();
  $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  
  echo json_encode($res);
}
catch ( Exception $e ) {
  include BASE_PATH."/server/500.php";
} 