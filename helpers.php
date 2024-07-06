<?php 

function getHourBefore($actual_hour) {
    $datetime = DateTime::createFromFormat('H:i', $actual_hour);
    $datetime->sub(new DateInterval('PT1H'));
    $hour_before = $datetime->format('H:i');

    return $hour_before;
}

?>