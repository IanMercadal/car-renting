<?php 

class User {

    private $user_id;
    private $name;
    private $surname;
    private $email;
    private $password;

    function __construct($user_id = NULL,$name = NULL,$surname = NULL,$email = NULL,$password = NULL) {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
    }

    public function index() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        $query = "SELECT * FROM users";
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

        $query = "SELECT * FROM users where user_id = " . $this->user_id;
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

            $query = "INSERT INTO users (name,surname,email,password) 
                        VALUES('".$this->name."','".$this->surname."','".$this->email."','".$this->password."')";

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
    
            $query = "UPDATE users SET name = '".$this->name."',
                        surname = '".$this->surname."',
                        email = '".$this->email."',
                        password = '".$this->password."'
                        where user_id = ".$this->user_id." ";

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
    
            $query = "DELETE FROM users WHERE user_id = ".$this->user_id;
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