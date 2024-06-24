<?php 

class ReservationController {
    
    public function index($data) : array {
        $result = array("status" => 500,"content" => "Couldn't find reservations");

        $reservation = new Reservation();
        $request = $reservation->index();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function show($data) : array {
        $result = array("status" => 500,"content" => "Couldn't find reservation");

        $reservation = new Reservation($data["res_id"],NULL,NULL);
        $request = $reservation->show();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function create($data) : array {
        $result = array("status" => 500,"content" => "Couldn't create reservation");

        $reservation = new Reservation($data["res_id"],$data["date_begin"],$data["date_end"],$data["total_amount"],$data["state"],$data["car_id"],$data["user_id"]);
        $request = $reservation->create();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Reservation created successfully";
        }

        return $result;
    }

    public function update($data) : array {
        $result = array("status" => 500,"content" => "Couldn't update reservation");

        $reservation = new Reservation($data["res_id"],$data["date_begin"],$data["date_end"],$data["total_amount"],$data["state"],$data["car_id"],$data["user_id"]);
        $request = $reservation->update();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Reservation updated successfully";
        }

        return $result;
    }

    public function delete($data) : array {
        $result = array("status" => 500,"content" => "Couldn't delete reservation");

        $reservation = new Reservation($data["res_id"]);
        $request = $reservation->delete();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Reservation deleted successfully";
        }

        return $result;
    }
}

?>