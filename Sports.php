<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include(dirname(__FILE__)."/db.php");

     $db= new DbConnect();
     $db_table = "sports";

    $call = $_GET['call'];
    switch ($call){
        case 'sportlist':
			$query = "SELECT * FROM " . $db_table . " WHERE 1";
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

