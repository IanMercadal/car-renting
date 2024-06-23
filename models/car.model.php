<?php 

class Car {

    private $car_id;
    private $model;
    private $air_conditioner;
    private $shift;
    private $passengers;
    private $price;
    private $active;
    private $brand_id;

    function __construct($car_id = NULL,$model = NULL,$air_conditioner = NULL,$shift = NULL,$passengers = NULL,$price = NULL,$active = NULL,$brand_id = NULL) {
        $this->car_id = $car_id;
        $this->model = $model;
        $this->air_conditioner = $air_conditioner;
        $this->shift = $shift;
        $this->passengers = $passengers;
        $this->price = $price;
        $this->active = $active;
        $this->brand_id = $brand_id;
    }

    public function index() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "SELECT * FROM cars";
        $request = $connection->query($query);

        if ($request) {
            while ($row = $request->fetch_assoc()) {
                array_push($result["content"], $row);
            }
        }

        return $result;
    }

    public function create() {
        $result = false;     

        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "INSERT INTO cars (model,air_conditioner,shift,passengers,price,active,brand_id) 
                    VALUES('".$this->model."',".$this->air_conditioner.",".$this->shift.",".$this->passengers.",".$this->price.",".$this->active.",".$this->brand_id.") ";
        $request = $connection->query($query);

        if ($request) {
           $result = true;
        }

        return $result;
    }

    public function update() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "SELECT * FROM cars";
        $request = $connection->query($query);

        if ($request) {
            while ($row = $request->fetch_assoc()) {
                array_push($result["content"], $row);
            }
        }

        return $result;
    }

    public function delete() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "SELECT * FROM cars";
        $request = $connection->query($query);

        if ($request) {
            while ($row = $request->fetch_assoc()) {
                array_push($result["content"], $row);
            }
        }

        return $result;
    }
}

?>