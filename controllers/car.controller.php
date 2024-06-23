<?php 

class CarController {
    
    public function index($data) : array {
        $result = array(
            "status" => 0,
            "content" => ""
        );

        $car = new Car($data["car_id"], $data["model"], $data["air_conditioner"], $data["shift"],$data["passengers"],$data["price"],$data["active"],$data["brand_id"]);
        $request = $car->index();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function show($data) : array {
        $result = array(
            "status" => 0,
            "content" => ""
        );

        $car = new Car($data["car_id"], $data["model"], $data["air_conditioner"], $data["shift"],$data["passengers"],$data["price"],$data["active"],$data["brand_id"]);
        $request = $car->show();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function create($data) : array {
        $result = array(
            "status" => 0,
            "content" => ""
        );

        $car = new Car($data["car_id"], $data["model"], $data["air_conditioner"], $data["shift"],$data["passengers"],$data["price"],$data["active"],$data["brand_id"]);
        $request = $car->create();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Car created successfully";
        }

        return $result;
    }

    public function update($data) : array {
        $result = array(
            "status" => 0,
            "content" => ""
        );

        $car = new Car($data["car_id"], $data["model"], $data["air_conditioner"], $data["shift"],$data["passengers"],$data["price"],$data["active"],$data["brand_id"]);
        $request = $car->update();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Car updated successfully";
        }

        return $result;
    }

    public function delete($data) : array {
        $result = array(
            "status" => 0,
            "content" => ""
        );

        $car = new Car($data["car_id"], $data["model"], $data["air_conditioner"], $data["shift"],$data["passengers"],$data["price"],$data["active"],$data["brand_id"]);
        $request = $car->delete();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Car deleted successfully";
        }

        return $result;
    }
}

?>