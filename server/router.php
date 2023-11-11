<?php

define('BASE_PATH', ($_ENV['IS_BUILD'] ? '' : '.'));

include_once BASE_PATH."/server/headers.php";
include_once BASE_PATH."/server/definitions.php";
include_once BASE_PATH."/server/vendor/autoload.php";
include_once BASE_PATH."/server/functions/index.php";

// ~ ENDPOINTS: 
// ^ POST /login/
endpoint("login", "POST");
// ^ GET /user/organizations/
endpoint("user/organizations");
// ^ GET /organization/getOffices/
endpoint("organization/getOffices");
// ^ GET /office/getAllRooms/
endpoint("office/getAllRooms");
// ^ GET /room/info/
endpoint("room/info");

include BASE_PATH."/server/404.php";
?>