<?php

include_once 'db.php';

class friendship
{
    private $db;
    private $db_table = "friendships";
    private $db_table_acc = "accounts";
    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function search($username)
    {
        $query = "SELECT email FROM " . $this->db_table_acc . " WHERE username = '$username'";
        $result = mysqli_query($this->db->getConnection(), $query);
        echo 'searched';
        return $result;
    }

    public function setFriend($email,$friend)
    {
        $query = "INSERT INTO friendships (email, friend) VALUES ('$email', '$friend')";
        echo 'inserted';
        $inserted = mysqli_query($this->db->getConnection(), $query);
    }
}

?>