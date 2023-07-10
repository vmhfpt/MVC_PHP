<?php
 
 require_once("core/Database.php");
 
class CategoryPost extends Database{
   
   
    public function getAll(){
        $sql = "SELECT * FROM `category_post` ORDER BY `category_post`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($name, $slug){
        $sql = "INSERT INTO `category_post` ( `name`, `slug`, `createdAt`, `updatedAt`) VALUES ( ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_execute($sql, $name,$slug);
    }
    public function check_unique($name){
        $sql = "SELECT * FROM `category_post` WHERE `name`=?";
        return  $this->pdo_query($sql, $name);
    }
    public function getBySlug($slug){
        $sql = "SELECT * FROM `category_post` WHERE `slug`=?";
        return  $this->pdo_query_one($sql, $slug);
    }
    public function update($name,  $slugUpdate, $slug){
         $sql = "UPDATE `category_post` SET `name` = ?, `slug` = ?, `updatedAt` = current_timestamp() WHERE `category_post`.`slug` = ?;";
         return $this->pdo_execute($sql, $name, $slugUpdate, $slug);
    }
    public function delete($id){
        $sql = "DELETE FROM `category_post` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }

}
?>