<?php 

class TokenController {
    
    public function getToken($data) : array {
        $result = array("status" => 500,"content" => "Couldn't find logs");

        $token = new Token($data["token"],NULL,NULL,NULL,$data["user_id"]);
        $request = $token->getToken();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function create($data) : array {
        $result = array("status" => 500,"content" => "Couldn't create token");

        $generated_token = bin2hex(random_bytes('16'));

        $token = new Token($generated_token,$data["date"],$data["hour"],$data["type"],$data["user_id"]);
        $request = $token->create();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Token created successfully";
        }

        return $result;
    }
}

?>