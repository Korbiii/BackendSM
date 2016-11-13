<?php
    
require_once 'tables/Meetings.php';
$meeting = new Meeting;

if(isset($_POST['function'])){  //later on password as additional requirement to restrict access to php files!
    if($_POST['function']=="newMeeting"){
        $result = $meeting->newMeeting();        
        echo $result;
    }
    else if($_POST['function']=="getMeeting"){
        $meetingID = $_POST['meetingID'];
        $result = $meeting->getMeetings($meetingID);

        echo $result;
    }
}

?>