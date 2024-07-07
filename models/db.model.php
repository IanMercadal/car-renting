<?php 

class DB {
    private static $instance = null;
    private $mysqli;
    private $host = HOST;
    private $db = DATABASE;
    private $user = CUSTOMER_USER;
    private $pass = CUSTOMER_USER_PASSWORD;

    private function __construct() {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->mysqli->connect_error) {
            die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->mysqli;
    }
}

?>