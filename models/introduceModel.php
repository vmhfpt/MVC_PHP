<?php
 
 require_once("core/Database.php");
 
class Introduce extends Database{
    public function getBySlug($slug){
        $sql = "SELECT * FROM `introduce` WHERE `slug`=?";
        return  $this->pdo_query_one($sql, $slug);
    }
}