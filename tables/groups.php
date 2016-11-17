<?php

require_once '/../include/db.php';

class Groups{
    private $db;
    private $db_groups;
    private $db_groupmemberships;
    private $json;
    
    public function __construct(){
        $this->db = new DbConnect;
        $this->db_groups = "groups";
        $this->db_groupmemberships = "groupmemberships";
        $this->json = array();
        
    }
    public function getGroups($email){
        $query = "SELECT * FROM $this->db_groupmemberships WHERE email='$email'";
        $result = mysqli_query($this->db->getConnection(), $query);
        while($row = mysqli_fetch_array($result)){
            array_push($this->json, $row);
        }
        return json_encode($this->json);
    }
    public function newGroup($groupName){
        $query = "INSERT INTO $this->db_groups (GroupName) VALUES('$groupName')";
        $result = mysqli_query($this->db->getConnection(), $query);
        if($result){
            $this->json['success'] = 1;
        }
        return json_encode($this->json);
    }
    public function getGroupMembers($groupID){
        $query = "SELECT * FROM $this->db_groupmemberships WHERE GroupID='$groupID'";
        $result = mysqli_query($this->db->getConnection(), $query);
        while($row = mysqli_fetch_array($result)){
            array_push($this->json, $row);
        }
        return json_encode($this->json);
    }
}

?>