<?php 

class Log {

    private $brand_id;
    private $action;
    private $user_id;
    private $car_id;

    function __construct($brand_id = NULL,$action = NULL,$user_id = NULL,$car_id = NULL) {
        $this->brand_id = $brand_id;
        $this->action = $action;
        $this->user_id = $user_id;
        $this->car_id = $car_id;
    }

    public function index() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "SELECT * FROM logs";
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

            $query = "INSERT INTO logs (action,user_id) VALUES(".$this->action.",".$this->user_id.") ";
            $request = $connection->query($query);
            
            if (!$request) {
                throw new Exception("Error creating brand");
            }  
            
            $connection->commit();
            return true;
        } catch (Exception $e) {
            $connection->rollback();
            return false;
        } 
    }
}

?>