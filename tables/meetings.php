<?php

require_once '/../include/db.php';

class Meeting{
    
    private $db;
    private $db_table = 'meetings';
    private $json = array();
    
    public function __construct(){
        $this->db = new DbConnect;
        $this->json['success'] = 0;
    }
    
    public function newMeeting(){        
        if(isset($_POST['startTime']) && isset($_POST['endTime'])){
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $query = "INSERT INTO ".$this->db_table." (startTime, endTime) VALUES (STR_TO_DATE('$startTime', '%m-%d-%Y %H:%i:%s'), STR_TO_DATE('$endTime', '%m-%d-%Y %H:%i:%s'))";
            $inserted = mysqli_query($this->db->getConnection(), $query);
            if($inserted == 1){
                $this->json['success'] = 1;
            }
            mysqli_close($this->db->getConnection());
        }
        return json_encode($this->json);
    }
    public function getMeetings($meetingID){
        $query = "SELECT * FROM ".$this->db_table." WHERE MeetingID = '$meetingID'";
        //$query = "Select * FROM Groups";
        //$query = "INSERT INTO groups (GroupID, GroupName) VALUES (4, 'Beachen')";
        $result = mysqli_query($this->db->getConnection(), $query);
        while($row = mysqli_fetch_array($result)){
            //gotta remove the success: 0 somehow
            array_push($this->json, $row);
        }
        return json_encode($this->json);
    }
}

?>