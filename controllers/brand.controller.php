<?php 

class BrandController {
    
    public function index() : array {
        $result = array("status" => 500,"content" => "Couldn't find brands");

        $brand = new Brand();
        $request = $brand->index();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function show($data) : array {
        $result = array("status" => 500,"content" => "Couldn't find brand");

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }
        
        $brand = new Brand($data["brand_id"],NULL,NULL);
        $request = $brand->show();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function create($data) : array {
        $result = array("status" => 500,"content" => "Couldn't create brand");

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }

        $brand = new Brand(NULL,$data["name"],$data["active"]);
        $request = $brand->create();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Brand created successfully";
        }

        return $result;
    }

    public function update($data) : array {
        $result = array("status" => 500,"content" => "Couldn't update brand");

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }

        $brand = new Brand($data["brand_id"],$data["name"],$data["active"]);
        $request = $brand->update();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Brand updated successfully";
        }

        return $result;
    }

    public function delete($data) : array {
        $result = array("status" => 500,"content" => "Couldn't delete brand");

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }

        $brand = new Brand($data["brand_id"]);
        $request = $brand->delete();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "Brand deleted successfully";
        }

        return $result;
    }
}

?>