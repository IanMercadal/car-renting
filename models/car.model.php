<?php 

class Car {
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
}

?>