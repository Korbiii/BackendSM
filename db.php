<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

class DbConnect{
    private $connect;
    public function __construct(){
        $this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }
    }
    public function getConnection(){
        return $this->connect;
    }
}

?>
