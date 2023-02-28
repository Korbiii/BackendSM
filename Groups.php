<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include(dirname(__FILE__)."/db.php");

     $db= new DbConnect();
     $db_table = "groups";
	 $db_table_members = "groupmembers";

    $call = $_GET['call'];
    switch ($call){
        case 'Groups':
			$email = $_GET['email'];
			$query = "SELECT gr.GroupName,gr.GroupID
			FROM ".$db_table_members." mem
			RIGHT JOIN ".$db_table." gr
			ON gr.groupID = mem.groupID
			WHERE mem.email = '$email'";
			$result = mysqli_query($db->getConnection(), $query);
            $json = array();
            while ($rows = mysqli_fetch_assoc($result)) {
                $json[] = $rows;
            }
            print json_encode($json);
            break;
        default:
            echo "Call doesnt exist";
            break;
    }

?>

