<?php
require_once 'sportID.php';

$sportIDs;
if (isset($_POST['sportID'])) {
    $sportIDs = $_POST ['sportID'];

}

$sportID = new SportID();
$json_array=$sportID->getData();

?>