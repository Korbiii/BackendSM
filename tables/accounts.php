<?php

include_once '/../include/db.php';

class Accounts{
    
    private $db;
    private $db_table = "accounts";
    
    public function __construct(){
        $this->db = new DbConnect();
    }    
    public function isLoginExists($username, $password){
        $query = "SELECT * FROM ".$this->db_table." WHERE username = '$username' AND passcode = '$password'";
        $result = mysqli_query($this->db->getConnection(), $query);
        if(mysqli_num_rows($result) == 1){
            mysqli_close($this->db->getConnection());
            return true;
        }
        mysqli_close($this->db->getConnection());
        return false;
    }
    public function createNewAccount($username, $password, $email){
        $json = array();
        $query = "INSERT INTO ".$this->db_table." (username, passcode, email) VALUES ('$username', '$password', '$email')";
        $inserted = mysqli_query($this->db->getConnection(), $query);
        if($inserted == 1){
            $json['success'] = 1;
        }
        else{
            $json['success'] = 0;
        }
        
        mysqli_close($this->db->getConnection());
        
        return $json;
    }
    public function loginAccount($username, $password){
        $json = array();
        $userCanLogin = $this->isLoginExists($username, $password);
        if($userCanLogin){
            $json['success'] = 1;
        }
        else{
            $json['success'] = 0;
            $json['username'] = $username;
            $json['password'] = $password;
        }
        return $json;
    }
}

?>