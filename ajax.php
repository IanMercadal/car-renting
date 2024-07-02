<?php 

/* 
    INFORMATION ABOUT FILE:
    THIS FILE IS THE ENTRY POINT OF INTERACTION WITH CODE AND DB.
    THIS MEANS THAT EVERY REQUEST HAS TO BEEN THROUGH THIS FILE AND BE TREATED.
*/

// CARS
require_once 'controllers/car.controller.php';
require_once 'models/car.model.php';

// BRAND
require_once 'controllers/brand.controller.php';
require_once 'models/brand.model.php';

// LOGS
require_once 'controllers/logs.controller.php';
require_once 'models/logs.model.php';

// RESERVATION
require_once 'controllers/reservation.controller.php';
require_once 'models/reservation.model.php';

// TOKEN
require_once 'controllers/token.controller.php';
require_once 'models/token.model.php';

// DB
require_once 'models/db.model.php';

// AUTH
require_once 'auth.php';


if(!isset($_POST['token'])) {
    $create_token = createToken($_POST['user_id']);
}

$check_token = validateToken($_POST['token']);
if(!$check_token) {
    return array('status' => '403', 'content' => 'You are not allowed to access API, try to log in again');
}


echo json_encode($response);

?>