<?php

require_once 'include/user.php';

$username = "";
$password = "";
$email = "";

if(isset($_POST['username'])){
    $username = $_POST ['username'];
    
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
    
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

$userObject = new User();

if(!empty($username) &&  !empty($password) && empty($email)){
    $hased_password = $password;
    $json_array = $userObject->loginUsers($username, $hased_password);
    
    echo json_encode($json_array);
}

if(!empty($username) &&  !empty($password) && !empty($email)){
    $hased_password = $password;
    $json_array = $userObject->loginUsers($username, $hased_password);
    
    echo json_encode($json_array);
}

?>