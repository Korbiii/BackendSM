<?php

/**
 * Created by PhpStorm.
 * User: Korbi
 * Date: 05.11.2016
 * Time: 11:40
 */
class sportId
{
    private $db;
    private $db_table = "sportsid";

    public function __construct(){
        $this->db = new DbConnect();
    }
public function sportstype($id){
    $query = "SELECT * FROM ".$this->db_table." WHERE sports_id = '$id'";

}

}