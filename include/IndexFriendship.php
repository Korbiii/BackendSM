<?php

require_once 'friendship.php';


$json = array();
$friendname = "";
$friendemail = "";
$email = "";
$callID = ""; //1: set Friend; 2: searchFriend; 3: getFriends; 4: deleteFriend 5: confirmFriend

//create Object
$friendship = new friendship();

//Variable declaration
if (isset($_POST['friendname'])) {
    $friendname = $_POST ['friendname'];

}
if (isset($_POST['friendemail'])) {
    $friendemail = $_POST ['friendemail'];

}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['callID'])) {
    $callID = is_numeric($_POST['callID']) ? (int)$_POST['callID'] : 0; //Converts to Int if possible
}

if ($callID == 1) {
    $friendship->setFriend($email, $friendemail);
} else if ($callID == 2) {
    $result = $friendship->searchNewFriend($friendname, $email);
    echo json_encode($result);
} else if ($callID == 3) {
    $result = $friendship->getFriends($email);
    echo json_encode($result);
} else if ($callID == 4) {
    $friendship->deleteFriendship($email, $friendemail);
} else if ($callID == 5) {
    $friendship->confirmFriendship($email, $friendemail);
} else if ($callID == 6) {
    $friendship->confirmPending($email);
} else {
    $json["Error"] = "Wrong Call";
    echo json_encode($json);
}


?>