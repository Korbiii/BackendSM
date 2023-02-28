<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include(dirname(__FILE__)."/db.php");

$db= new DbConnect();
$db_meetings = "meetings";
$db_meeting_mem = "meetingMembers";
$call = $_GET['call'];
switch ($call){
  case 'Meetings':
        $email = $_GET['email'];
        $query = "SELECT ".$db_meeting_mem.".meetingID, ".$db_meeting_mem.".email,mystartTime,myendTime,confirmed,startTime,endTime,sportID,dynamic,longitude,latitude,minPar AS minParticipants,meetingActivity
                  FROM  ".$db_meetings."
                  INNER JOIN  ".$db_meeting_mem."
                  ON  ".$db_meetings.".meetingID =  ".$db_meeting_mem.".meetingID
                  WHERE  ".$db_meeting_mem.".email = '$email'";
        $result = mysqli_query($db->getConnection(), $query);
        $json = array();
          while ($rows = mysqli_fetch_assoc($result)) {
            $json[] = $rows;
          }
          print json_encode($json);
        break;
  case 'newMeeting':
        $creator = $_POST['creator'];
        $start_time = date('Y-m-d H:i:s',strtotime($_POST['startTime']));
        $end_time = date('Y-m-d H:i:s',strtotime($_POST['endTime']));
        $min_par =$_POST['minPar'];
        $sport_id =$_POST['sportID'];
        $activity = $_POST['activity'];
        $dynamic =$_POST['dynamic'];
        $long =$_POST['longitude'];
        $lat =$_POST['latitude'];
        $query = "INSERT INTO ".$db_meetings." (`creator`, `startTime`, `endTime`, `minPar`, `meetingActivity`, `sportID`, `dynamic`, `longitude`, `latitude`)
                  VALUES ('$creator','$start_time','$end_time','$min_par','$activity','$sport_id','$dynamic','$long','$lat')";
        $inserted = mysqli_query($db->getConnection(), $query);

        $query_get_id = "SELECT MAX(meetingID)
                        FROM ". $db_meetings ."
                        WHERE creator = '$creator'";
        $meetingID = mysqli_query($db->getConnection(), $query_get_id);
        $meetingID = mysqli_fetch_assoc($meetingID);
        $meetingID = reset($meetingID);

        $i = 0;
        $current_key = 'members' . $i;
        $insert_rows = array();
          while(isset($_POST[$current_key])){
            $insert_rows[$i] = array(
              'meetingID' => $meetingID,
              'email' => $_POST[$current_key]);
              $i++;
              $current_key ='members' . $i;
            }
            $insert_rows[$i] = array(
              'meetingID' => $meetingID,
              'email' => $creator);
          $values = array();
            foreach($insert_rows as $row){
              $values[] = "('{$row['meetingID']}', '{$row['email']}')";
            }
          $values = implode(", ", $values);
          $insert_query =  "INSERT INTO ".$db_meeting_mem." (`meetingID`, `email`)
          VALUES {$values}";
          $inserted2 = mysqli_query($db->getConnection(), $insert_query);
          if($inserted == 1 && $inserted2 == 1){
            $json['success'] = 1;
          }
          else{
            $json['success'] = 0;
          }
          break;
    case 'MemberList':
        $meetingID = $_GET['MeetingID'];
        $query = "SELECT * FROM " . $db_meeting_mem . " WHERE meetingID = '$meetingID'";
        $result = mysqli_query($db->getConnection(), $query);
        $json = array();
          while ($rows = mysqli_fetch_assoc($result)) {
            $json[] = $rows;
          }
          print json_encode($json);
          break;
    case 'confirmMeeting':
          $meetingID = $_POST['meetingID'];
          $startTime = $_POST['mystartTime'];
          $endTime = $_POST['myendTime'];
          $email = $_POST['email'];
          $query = "UPDATE " . $db_meeting_mem . "
                    SET confirmed = 1,myendTime='$endTime',mystartTime='$startTime'
                    WHERE meetingID = $meetingID and email = '$email'";
          $updated = mysqli_query($db->getConnection(), $query);
                    if($updated == 1 ){
                      $json['success'] = 1;
                    }
                    else{
                      $json['success'] = 0;
                    }
        break;
	case 'declineMeeting':
          $meetingID = $_POST['meetingID'];
          $email = $_POST['email'];
          $query = "DELETE FROM " . $db_meeting_mem . "
                    WHERE meetingID = $meetingID and email = '$email'";
			echo $query;
          $updated = mysqli_query($db->getConnection(), $query);
                    if($updated == 1 ){
                      $json['success'] = 1;
                    }
                    else{
                      $json['success'] = 0;
                    }
        break;
	case 'setOtherTime':
		  $meetingID = $_POST['meetingID'];
          $myStartTime = $_POST['mystartTime'];
          $myEndTime = $_POST['myendTime'];		  
          $email = $_POST['email'];
		  $query = "UPDATE " . $db_meeting_mem . "
                    SET confirmed = 1,myendTime='$myEndTime',mystartTime='$myStartTime'
                    WHERE meetingID = $meetingID and email = '$email'";
		$updated = mysqli_query($db->getConnection(), $query);
                    if($updated == 1 ){
                      $json['success'] = 1;
                    }
                    else{
                      $json['success'] = 0;
                    }
		break;
	default:
    echo "Call doesnt exist";
    break;
  }

  ?>
