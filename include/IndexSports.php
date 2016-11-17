<?php

require_once 'sportID.php';

$sportID ="";
$callID = "";        //1: getData, 2:getCount


$sportID = new SportID();

//Variable declaration
if (isset($_POST['sportID'])) {
    $sportID = $_POST ['sportID'];

}
if (isset($_POST['callID'])) {
    $callID = is_numeric($_POST['callID']) ? (int)$_POST['callID'] : 0;
}


if ($callID == 1) {
    $sportID->getData();
} else if ($callID == 2) {
    $num = $sportID->getCount();
} else {
    $json["Error"] = "Wrong Call";
    echo json_encode($json);
}
?>