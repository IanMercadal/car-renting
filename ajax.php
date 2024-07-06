<?php 

/* 
    INFORMATION ABOUT FILE:
    THIS FILE IS THE ENTRY POINT OF INTERACTION WITH CODE AND DB.
    THIS MEANS THAT EVERY REQUEST HAS TO BEEN THROUGH THIS FILE AND BE TREATED.
*/

// SET SPAIN HOUR
date_default_timezone_set("Europe/Madrid");

// USER
require_once 'controllers/user.controller.php';
require_once 'models/user.model.php';

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

// HELPERS
require_once 'helpers.php';

// CHECKING WANTED ACTION/METHOD
$available_actions = array("brand", "car", "reservation", "user");
$available_methods = array("index", "show", "create", "update" , "delete", "login", "register");

if(!isset($_POST['action']) || trim($_POST['action']) == "" || !in_array($_POST["action"], $available_actions) || !in_array($_POST["method"], $available_methods)) {
    returnResponse(400, "Bad Request");
}

// CHECK IF USER NEED LOGIN
if($_POST['action'] != 'user') {
    if(!isset($_POST['token'])) {
        returnResponse(403, 'You are not allowed to access API, try to log in again');
    }

    $check_token = validateToken($_POST['token']);
    if(!$check_token) {
        returnResponse(403, 'You are not allowed to access API, bad token, try to log in again');
    }
}

// CONTROL STRUCTURE FOR USER
if($_POST['action'] == 'user') {
    $user = new UserController();

    if($_POST['method'] == 'login') {
        $login = $user->login($_POST);
        if($login["status"] != 200) {
            $response = array("status" => $login["status"],"content" => $login["content"]);
        } else {
            $token = createToken($login['content']['user_id']);
            $response = array("status" => $token["status"],"content" => $token["content"]);
        }
    }

    if($_POST['method'] == 'register') {
        $response = $user->create($_POST);
    }

    returnResponse($response["status"], $response["content"]);
}

// CONTROL STRUCTURE FOR BRAND
if($_POST['action'] == 'brand') {
    $brand = new BrandController();
    $method = $_POST["method"];

    $response = call_user_func_array([$brand, $method], [$_POST]);

    returnResponse($response["status"], $response["content"]);
}

// CONTROL STRUCTURE FOR CAR
if($_POST['action'] == 'car') {
    $car = new CarController();
    $method = $_POST["method"];

    $response = call_user_func_array([$car, $method], [$_POST]);

    returnResponse($response["status"], $response["content"]);
}

// CONTROL STRUCTURE FOR RESERVATION
if($_POST['action'] == 'reservation') {
    $reservation = new ReservationController();
    $method = $_POST["method"];

    $response = call_user_func_array([$reservation, $method], [$_POST]);

    returnResponse($response["status"], $response["content"]);
}


?>