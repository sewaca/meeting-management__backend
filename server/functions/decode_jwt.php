<?php 
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key; 

/**
 * Decodes a JSON Web Token (JWT).
 *
 * @param string $jwt The JWT to decode.
 * @throws Exception if the JWT is invalid or the data is incorrect.
 * @return mixed The decoded data from the JWT.
 */
function decode_jwt($jwt){
  if (!$jwt) include BASE_PATH."/server/401.php";
  // Пытаемся раскодировать JWT
  try {
    $data = JWT::decode($jwt, new Key(JWT_SECRET, JWT_ALG));
    // Если получили неверные подписи
    if($data->iss != JWT_ISS or $data->aud != JWT_AUD) 
      include BASE_PATH."/server/401.php";
    // Если все ок, то получаем данные и проверяем их 
    $data = $data->data;
  }
  catch (Exception $e) {
    // Неверный JWT
    include BASE_PATH."/server/401.php"; 
  }
  
  return $data;
}
