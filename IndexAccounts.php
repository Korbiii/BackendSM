<?php

require_once 'tables/accounts.php';
//require_once 'project.php';   //doesnt work yet


if(isset($_POST['function'])){  //later on password as additional requirement to restrict access to php files!
    $username = "";
    $password = "";
    $email = "";
    $accountObject = new Accounts();
    
    if($_POST['function']=="createNewAccount"){
        $username = $_POST ['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        $hased_password = $password;
        $json_array = $userObject->createNewAccount($username, $hased_password, $email);

        echo json_encode($json_array);
    }    
    
    else if($_POST['function']=="loginAccount"){
        $username = $_POST ['username'];
        $password = $_POST['password'];
        $hashed_password = $password;
        $json_array = $accountObject->loginAccount($username, $hashed_password);

        echo json_encode($json_array);
    }
}

?>