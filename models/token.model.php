<?php 

class Token {

    private $token;
    private $date;
    private $hour;
    private $type;
    private $user_id;

    function __construct($token = NULL,$date = NULL,$hour = NULL,$type = NULL,$user_id = NULL) {
        $this->token = $token;
        $this->date = $date;
        $this->hour = $hour;
        $this->type = $type;
        $this->user_id = $user_id;
    }

    public function getToken() {
        $result = array("content" => []);     
        
        $db = DB::getInstance();
        $connection = $db->getConnection();

        // TODO: Añadir intervalo de 1 hora para el token
        $query = "SELECT * FROM tokens where token = '$this->token' and user_id = '$this->user_id' and date = '$this->date' ";
        $request = $connection->query($query);

        if ($request) {
            $row = $request->fetch_assoc();
            array_push($result["content"], $row);
        }

        return $result;
    }


    public function create() : bool {
        try {
            $db = DB::getInstance();
            $connection = $db->getConnection();
            $connection->begin_transaction();

            $query = "INSERT INTO tokens (token,date,hour,type,user_id) 
                        VALUES ('".$this->token."','".$this->date."','".$this->hour."','".$this->type."',".$this->user_id.") ";
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