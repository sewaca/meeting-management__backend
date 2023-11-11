<?php
$room_id = $_GET['id'];

try {
  // Подключаемся к БД
  $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($link->connect_error)
    throw new Exception("Connection failed");

  // Получаем информацию из БД
  $sql = "SELECT * FROM `meeting_rooms` WHERE `id` = ?";
  $stmt = $link->prepare($sql);
  $stmt->bind_param("d", $room_id);
  $stmt->execute();
  $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  
  if (!count($res))
    include BASE_PATH."/server/404.php";

  echo json_encode($res[0]);
}
catch ( Exception $e ) {
  include BASE_PATH."/server/500.php";
} 