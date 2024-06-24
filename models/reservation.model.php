<?php 

class Reservation {

    private $res_id;
    private $date_begin;
    private $date_end;
    private $total_amount;
    private $state;
    private $car_id;
    private $user_id;

    function __construct($res_id = NULL,$date_begin = NULL,$date_end = NULL,$total_amount = NULL,$state = NULL,$car_id = NULL,$user_id = NULL) {
        $this->res_id = $res_id;
        $this->date_begin = $date_begin;
        $this->date_end = $date_end;
        $this->total_amount = $total_amount;
        $this->state = $state;
        $this->car_id = $car_id;
        $this->user_id = $user_id;
    }

    public function index() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "SELECT * FROM reservations";
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

        $query = "SELECT * FROM reservations where res_id = " . $this->res_id;
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

            $query = "INSERT INTO reservations (date_begin,date_end,total_amount,state,car_id,user_id) 
                        VALUES('".$this->date_begin."','".$this->date_end."',".$this->total_amount.",".$this->state.",".$this->car_id.",".$this->user_id.") ";
            
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
    
            $query = "UPDATE reservations  SET res_id = '".$this->res_id."', date_begin = '".$this->date_begin."', 
                        date_end = '".$this->date_end."',total_amount = ".$this->total_amount.", state = ".$this->state.",
                        car_id = ".$this->car_id.", user_id = ".$this->user_id." where res_id = ".$this->res_id." ";

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
    
            $query = "DELETE FROM reservations WHERE res_id = ".$this->res_id;
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