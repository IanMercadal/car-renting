<?php 

class UserController {
    
    public function index() : array {
        $result = array("status" => 500,"content" => "Couldn't find users");

        $user = new User();
        $request = $user->index();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function show($data) : array {
        $result = array("status" => 500,"content" => "Couldn't find user");

        $user = new User($data["user_id"]);
        $request = $user->show();

        if($request["content"]) {
            $result["status"] = 200;
            $result["content"] = $request["content"];
        }

        return $result;
    }

    public function create($data) : array {
        $result = array("status" => 500,"content" => "Couldn't create user");

        $user = new User(NULL,$data["name"],$data["surname"],$data["email"],$data["password"]);
        $request = $user->create();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "User created successfully";
        }

        return $result;
    }

    public function update($data) : array {
        $result = array("status" => 500,"content" => "Couldn't update user");

        $user = new User($data["user_id"],$data["name"],$data["surname"],$data["email"],$data["password"]);
        $request = $user->update();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "User updated successfully";
        }

        return $result;
    }

    public function delete($data) : array {
        $result = array("status" => 500,"content" => "Couldn't delete user");

        $user = new User($data["user_id"]);
        $request = $user->delete();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "User deleted successfully";
        }

        return $result;
    }
}

?>