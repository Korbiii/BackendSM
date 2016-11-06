<?php
require_once 'friendship.php';

$friend = "";
$email="";

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['friend'])) {
    $friend = $_POST['friend'];
}

$friendship = new friendship();

$friend2 = $friendship->search($friend);
$row = $friend2->fetch_assoc();
$friend2=$row['email'];


$friendship->setFriend($email,$friend2);



?>