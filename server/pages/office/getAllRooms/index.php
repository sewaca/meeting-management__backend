<?php

$office_id = $_GET['office_id'];

try {
  // Подключаемся к БД
  $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($link->connect_error)
    throw new Exception("Connection failed");

  // Получаем информацию из БД
  $sql = "SELECT `id`,`name`,`photo`,`status` FROM `meeting_rooms` WHERE `office_id` = ?";
  $stmt = $link->prepare($sql);
  $stmt->bind_param("d", $office_id);
  $stmt->execute();
  $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  
  echo json_encode($res);
}
catch ( Exception $e ) {
  include BASE_PATH."/server/500.php";
} 