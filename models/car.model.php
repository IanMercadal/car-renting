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

    public function show() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "SELECT * FROM cars where car_id = " . $this->car_id;
        $request = $connection->query($query);

        if ($request) {
            while ($row = $request->fetch_assoc()) {
                array_push($result["content"], $row);
            }
        }

        return $result;
    }


    public function create() : bool {
        try {
            $db = DB::getInstance();
            $connection = $db->getConnection();
            $connection->begin_transaction();

            $query = "INSERT INTO cars (model,air_conditioner,shift,passengers,price,active,brand_id) 
                        VALUES('".$this->model."',".$this->air_conditioner.",".$this->shift.",".$this->passengers.",".$this->price.",".$this->active.",".$this->brand_id.") ";
            
            $request = $connection->query($query);
            if (!$request) {
                throw new Exception("Error creating car");
            }  
            
            $connection->commit();
            return true;
        } catch (Exception $e) {
            $connection->rollback();
            return false;
        } 
    }

    public function update() : bool {
        try {  
            $db = DB::getInstance();
            $connection = $db->getConnection();
    
            $query = "UPDATE cars SET model = '".$this->model."',
                        air_conditioner = '".$this->air_conditioner."',
                        shift = ".$this->shift.",
                        passengers = ".$this->passengers.",
                        price = ".$this->price.",
                        active = ".$this->active.",
                        brand_id = ".$this->brand_id."
                        where car_id = ".$this->car_id." ";
    
            $request = $connection->query($query);
            if (!$request) {
                throw new Exception("Error updating car");
            }  
            
            return true;
        } catch (Exception $e) {
            $connection->rollback();
            return false;
        }
    }

    public function delete() : bool {
        try {
            $db = DB::getInstance();
            $connection = $db->getConnection();
    
            $query = "DELETE FROM cars WHERE car_id = ".$this->car_id;
            $request = $connection->query($query);
    
            $request = $connection->query($query);
            if (!$request) {
                throw new Exception("Error deleting car");
            }  
    
            return true;
        } catch (Exception $e) {
            $connection->rollback();
            return false;
        }
    }
}

?>