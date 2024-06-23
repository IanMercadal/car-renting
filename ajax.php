<?php 

/* 
    INFORMATION ABOUT FILE:
    THIS FILE IS THE ENTRY POINT OF INTERACTION WITH CODE AND DB.
    THIS MEANS THAT EVERY REQUEST HAS TO BEEN THROUGH THIS FILE AND BE TREATED.
*/

require_once 'controllers/car.controller.php';
require_once 'models/car.model.php';
require_once 'models/db.model.php';

$carController = new CarController();
$response = $carController->index();

echo json_encode($response);

?>