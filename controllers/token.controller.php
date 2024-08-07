<?php 

class TokenController {
    
    public function getToken($data) : array {
        $result = array("status" => 500,"content" => "Couldn't find token");

        $token = new Token($data["token"],$data["date"],$data["hour"],NULL,NULL);
        $request = $token->getToken();

        if($request) {
            $result["status"] = 200;
            $result["content"] = $request;
        }

        return $result;
    }

    public function create($data) : array {
        $result = array("status" => 500,"content" => "Couldn't create token");

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }

        $generated_token = bin2hex(random_bytes('16'));

        $token = new Token($generated_token,$data["date"],$data["hour"],$data["type"],$data["user_id"]);
        $request = $token->create();

        if($request) {
            $result["status"] = 200;
            $result["content"] = $generated_token;
        }

        return $result;
    }
}

?>