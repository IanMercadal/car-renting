<?php 

class Brand {

    private $brand_id;
    private $name;
    private $active;

    function __construct($brand_id = NULL,$name = NULL,$active = NULL) {
        $this->brand_id = $brand_id;
        $this->name = $name;
        $this->active = $active;
    }

    public function index() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "SELECT * FROM brands";
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

        $query = "SELECT * FROM brands where brand_id = " . $this->brand_id;
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

            $query = "INSERT INTO brands (name,active) VALUES('".$this->name."',".$this->active.") ";
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

    public function update() : bool {
        try {  
            $db = DB::getInstance();
            $connection = $db->getConnection();
    
            $query = "UPDATE brands SET name = '".$this->name."', active = '".$this->active."' where brand_id = ".$this->brand_id." ";
    
            $request = $connection->query($query);
            if (!$request) {
                throw new Exception("Error updating brand");
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
    
            $query = "DELETE FROM brands WHERE brand_id = ".$this->brand_id;
            $request = $connection->query($query);
    
            $request = $connection->query($query);
            if (!$request) {
                throw new Exception("Error deleting brand");
            }  
    
            return true;
        } catch (Exception $e) {
            $connection->rollback();
            return false;
        }
    }
}

?>