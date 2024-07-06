<?php 

function getHourBefore($actual_hour) {
    $datetime = DateTime::createFromFormat('H:i', $actual_hour);
    $datetime->sub(new DateInterval('PT1H'));
    $hour_before = $datetime->format('H:i');

    return $hour_before;
}

function returnResponse($status, $content) {
    $response = array('status' => $status, 'content' => $content);
    echo json_encode($response);
    die();
}

?>