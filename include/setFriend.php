<?php

require_once 'friendship.php';


$friend = "";
$email = "";

if (isset($_POST['friend'])) {
    $friend = $_POST ['friend'];





}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

$friendship = new friendship();
$friendship->setFriend($email,$friend);



?>