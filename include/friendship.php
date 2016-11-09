<?php

include_once 'db.php';

class friendship
{
    private $db;
    private $db_table_friends = "friendships";
    private $db_table_acc = "accounts";

    public function __construct()
    {
        $this->db = new DbConnect();

    }

    public function searchNewFriend($username, $ownemail)
    {
        $query = "SELECT email FROM " . $this->db_table_acc . " WHERE username LIKE '$username%'";
        $result = mysqli_query($this->db->getConnection(), $query);
        $json = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $searchString = implode($row);
            if (strcasecmp($searchString, $ownemail)) {
                $query2 = "SELECT friend FROM " . $this->db_table_friends . " WHERE email = '$ownemail'  AND friend = '$searchString'";
                $result2 = mysqli_query($this->db->getConnection(), $query2);
                if (empty(mysqli_fetch_all($result2))) {

                    $json[] = $row;

                }
            }
        }


        if (empty($json)) {
            $json["Error"] = "No such Username";
        }
        return $json;
    }

    public function setFriend($email, $friend)
    {
        $testquery = "SELECT * FROM " . $this->db_table_acc . " WHERE email = '$friend'";
        if (!empty(mysqli_fetch_all(mysqli_query($this->db->getConnection(), $testquery)))) {
            $query = "INSERT INTO friendships (email, friend,confirmed) VALUES ('$email', '$friend','1')";
            $query2 = "INSERT INTO friendships (email, friend,confirmed) VALUES ('$friend', '$email','0')";
            mysqli_query($this->db->getConnection(), $query);
            mysqli_query($this->db->getConnection(), $query2);
        } else {
            $json = array();
            $json["Error"] = "No such Email";
            echo json_encode($json);
        }
    }


    public function confirmFriendship($email,$friend){
        $query = "UPDATE friendships SET confirmed = '1' WHERE friend ='$friend' AND email ='$email'";
        mysqli_query($this->db->getConnection(),$query);
    }



    public function deleteFriendship($email, $friend)
    {
        $testquery = "SELECT * FROM " . $this->db_table_acc . " WHERE email = '$friend'";
        if (!empty(mysqli_fetch_all(mysqli_query($this->db->getConnection(), $testquery)))) {
            $query = "DELETE FROM friendships WHERE email = '$email' AND friend = '$friend'";
            mysqli_query($this->db->getConnection(), $query);
        } else {
            $json = array();
            $json["Error"] = "No such Email";
            echo json_encode($json);
        }
    }

    public function confirmPending($email){
        $query = "SELECT * FROM " . $this->db_table_friends . " WHERE email = '$email' AND confirmed = '0'";
        $result = mysqli_query($this->db->getConnection(), $query);
        $json = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $json[] = $row;
        }
        if (empty($json)) {
            $json["Error"] = "No Friend Requests";
        }
        echo json_encode($json);
    }

    public function getFriends($email)
    {
        $query = "SELECT friend FROM " . $this->db_table_friends . " WHERE email = '$email'";
        $result = mysqli_query($this->db->getConnection(), $query);
        $json = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $json[] = $row;
        }
        if (empty($json)) {
            $json["Error"] = "No Friends found";
        }
        return $json;
    }

}

?>