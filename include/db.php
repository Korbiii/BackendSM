<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "QWERT1234");
define("DB_NAME", "Sportsm8");

class DbConnect{
    private $connect;
    public function __construct(){
        $this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if(mysqli_connect_errno($this->connect)){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }
    }
    public function getConnection(){
        return $this->connect;
    }
}

?>