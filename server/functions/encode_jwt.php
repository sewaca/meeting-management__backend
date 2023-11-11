<?php
use \Firebase\JWT\JWT;

/**
 * Encodes a JWT token for the given user ID.
 *
 * @param int $user_id The ID of the user.
 * @throws Exception If there is an error encoding the token.
 * @return string The encoded JWT token.
 */
function encode_jwt($user_id){
  if ($user_id < 0) include BASE_PATH.'/server/404.php';

  $token = array(
    "iss" => JWT_ISS,
    "aud" => JWT_AUD,
    "data" => $user_id,
  );
  $jwt = JWT::encode($token, JWT_SECRET, JWT_ALG);
  
  return $jwt;
}
