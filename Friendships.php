<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include(dirname(__FILE__)."/db.php");

     $db= new DbConnect();
     $db_friendS = "friendships";
	 $db_accounts = 'accounts';

    $call = $_GET['call'];
    switch ($call){
        case 'Friends':
			$email = $_GET['email'];
			$query = 	"SELECT friendemail as email,confirmed, ac.username
						FROM " . $db_friendS . " fs
						INNER JOIN ".$db_accounts." ac
						ON ac.email = fs.friendemail
						WHERE fs.email = '$email'";
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
