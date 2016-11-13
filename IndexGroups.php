<?php

require_once 'tables/groups.php';
$group = new Groups();

if(isset($_POST['function'])){  //later on password as additional requirement to restrict access to php files!
    if($_POST['function']=="getGroups"){
        $result = $group->getGroups($_POST['email']);
        echo $result;
    }
    if($_POST['function']=="newGroup"){
        $result = $group->newGroup($_POST['groupName']);
        echo $result;
    }
    if($_POST['function']=="getGroupMembers"){
        $result = $group->getGroupMembers($_POST['groupID']);
        echo $result;
    }       
}

?>