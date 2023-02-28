<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include(dirname(__FILE__)."/db.php");

     $db= new DbConnect();
     $db_table = "accounts";

    $call = $_GET['call'];
    switch ($call){
        case 'createNewAccount':
			$email = $_POST['email'];
			$username = $_POST['username'];
			$query = "INSERT INTO ".$db_table." (username, email) VALUES ('$username','$email')";
            $inserted = mysqli_query($db->getConnection(), $query);
			if($inserted == 1){
				$json['success'] = 1;
			}
			else{
				$json['success'] = 0;			}
			mysqli_close($db->getConnection());
            break;
		case 'AccountInfo':
			$email = $_GET['email'];
			$query = "SELECT * FROM " . $db_table . " WHERE email = '$email'";
			$result = mysqli_query($db->getConnection(), $query);
            $json = array();
            while ($rows = mysqli_fetch_assoc($result)) {
                $json[] = $rows;
            }
            print json_encode($json[0]);
			break;
        default:
            echo "Call doesnt exist";
            break;
    }

?>