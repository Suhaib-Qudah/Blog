<?php 
 class Dashboard{
     private $db;
    
     public function __construct()
     {
             $this -> db = new Database;
     }


     public function getAllUsers(){
        $this->db->query("SELECT * FROM `user`");
        $rows = $this->db->resultSet();

        if ($this->db->rowcount()>0){
            return $rows;
        }else{
            return false;
        }
     }


     public function getAllPosts(){
        $this->db->query("SELECT * FROM `articles`");
        $rows = $this->db->resultSet();

        if ($this->db->rowcount()>0){
            return $rows;
        }else{
            return false;
        }
     }


     public function makeAdmin($id){
         $stat=$this->db->query('UPDATE `user` SET `state`="admin" WHERE id=:id ');
         $this->db->bind(':id',$id);
         if($this->db->execute()){
             return true;
         }else{
             return false;
         }       


     }


 }