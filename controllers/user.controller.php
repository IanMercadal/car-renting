<?php 

class UserController {

    public function login($data) : array {
        $result = array("status" => 500,"content" => "Email or password incorrect");

        $user = new User(NULL,NULL,NULL,$data["email"], NULL);
        $request = $user->login();

        if($request["content"]) {
            $hashed_password = $request["content"]["password"];
            $verify_password = hashCompare($data["password"], $hashed_password);

            if($verify_password) {
                $result["status"] = 200;
                $result["content"] = $request["content"];
            }
        }

        return $result;
    }
    
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

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }

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

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }

        $hashed_password = hashPassword($data["password"]);

        $user = new User(NULL,$data["name"],$data["surname"],$data["email"],$hashed_password);
        $request = $user->create();

        if($request) {
            $result["status"] = 200;
            $result["content"] = "User created successfully";
        }

        return $result;
    }

    public function update($data) : array {
        $result = array("status" => 500,"content" => "Couldn't update user");

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }

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

        $check_values = checkFieldValues($data);
        if(!$check_values) {
            return $result;
        }

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