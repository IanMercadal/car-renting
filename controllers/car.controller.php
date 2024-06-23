<?php 

class CarController {
    
    public function index() : array {
        $result = array(
            "status" => 0,
            "content" => ""
        );

        $car = new Car();
        $request = $car->index();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

}

?>