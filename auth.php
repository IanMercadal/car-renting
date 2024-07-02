<?php 

function login() {
    // TODO: CHECK USER AND PASSWORD

    // TODO: CREATE TOKEN

}

function register() {
    // TODO: CHECK USER AND PASSWORD

    // TODO: CREATE TOKEN
    
}

function validateToken($incoming_token) {
    $date = Date('Y-m-d');
    $hour = Date('H:i');
    $data = array('token' => $incoming_token, 'date' => $date, 'hour' => $hour);

    $token = new TokenController();
    $getToken = $token->getToken($data);

    if($incoming_token != $getToken["content"]) {
        return false;
    }
    
    return true;
}

function createToken($user_id) {
    $date = Date('Y-m-d');
    $hour = Date('H:i');
    $data = array('token' => NULL, 'date' => $date, 'hour' => $hour, 'type' => 'customer', 'user_id' => $user_id);

    $token = new TokenController();
    $created_token = $token->create($data);
    
    return $created_token;
}

?>