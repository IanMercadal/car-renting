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

function checkFieldValues($data) {
    $clean_values = true;
    foreach ($data as $key => $value) {
        $sanitized_value = strtolower(trim(strip_tags($value)));

        if($sanitized_value === "") {
            $clean_values = false;
        }

        if($sanitized_value === NULL) {
            $clean_values = false;
        }

        if($sanitized_value === false) {
            $clean_values = false;
        }

        if (strpos($value, "drop") !== false) {
            $clean_values = false;
        }

        if (strpos($value, "database") !== false) {
            $clean_values = false;
        }
    }
    return $clean_values;
}

?>