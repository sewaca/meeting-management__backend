<?php 

try {
  $event_id = $_GET['event_id'];
  if (!$event_id) include BASE_PATH."/server/404.php";

  $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($link->connect_error)
    throw new Exception("Connection failed");

    // Получаем основные данные
  $sql = "SELECT * FROM `events` WHERE `table_def_id` = ? LIMIT 1";
  $stmt = $link->prepare($sql);
  $stmt->bind_param("s", $event_id);
  $stmt->execute();
  $main_data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]; 
  if(!($main_data)) include BASE_PATH."/server/404.php";

  // Получаем комнаты
  $sql = "SELECT `id`,`name` FROM `meeting_rooms` WHERE `id` IN (SELECT `room_id` FROM `events` WHERE `table_def_id` = ?)";
  $stmt = $link->prepare($sql);
  $stmt->bind_param("s", $event_id);
  $stmt->execute();
  $room_data = array_values($stmt->get_result()->fetch_all(MYSQLI_ASSOC));

  // TODO: Добавить Office Timezone

  echo json_encode([
    'id' => $main_data['table_def_id'],
    'name' => $main_data['name'],
    'rooms' => $room_data,
    'description' => $main_data['description'],
    'start' => $main_data['start'],
    'end' => $main_data['end'],
    'freq' => [
      'rule' => $main_data['freq_rule'],
      'interval' => $main_data['freq_interval']
    ]   
  ]);
}
catch ( Exception $e ) {
  file_put_contents('php://stdout', $e->__toString());
  include BASE_PATH."/server/500.php";
} 

