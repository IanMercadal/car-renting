<?php 

class LogController {
    
    public function index($data) : array {
        $result = array("status" => 500,"content" => "Couldn't find logs");

        $log = new Log();
        $request = $log->index();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function create($data) : array {
        $result = array("status" => 500,"content" => "Couldn't create log");

        $log = new Log(NULL, $data["action"], $data["user_id"]);
        $request = $log->create();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Log created successfully";
        }

        return $result;
    }
}

?>