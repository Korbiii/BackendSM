<?php

include_once 'db.php';

class sportID
{
    private $db;
    private $db_table = "sportsid";

    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function getCount()
    {
        $query = "SELECT * FROM " . $this->db_table . " WHERE 1";
        $result = mysqli_query($this->db->getConnection(), $query);
        $json = array();
        $json["Count"] = mysqli_num_rows($result);
        echo json_encode($json);

    }


    public function getData()
    {
        $query = "SELECT * FROM " . $this->db_table . " WHERE 1";
        $result = mysqli_query($this->db->getConnection(), $query);
        $json = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $json[] = $rows;
        }
       print json_encode(array('sports'=>$json));
        //print json_encode($rows);


    }
}