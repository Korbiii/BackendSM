<?php
include_once db.php;
class project{
    
    private $db;
    private $db_table = projects;
    
    private function __construct(){
        $db = new DbConnect;
    }
    
    public function newProject(){
        $query = "INSERT INTO ".$db_table." () VALUES ('$', '$')";
        $inserted = mysqli_query(this->db->getConnection(), $query);
        if($inserted == 1){
            $json['success'] = 1;
        }
        else{
            $json['success'] = 0;
        }
        
        mysqli_close($this->db->getConnection());
        
        return $json;
    }
}

?>

CREATE TABLE projects (id int AUTO_INCREMENT NOT Null, 