<?php
 
 require_once("core/Database.php");
 
class Category extends Database{
    public function getAllPlatform(){
        $sql = "SELECT * FROM `categories` WHERE `parent_id` = 0 ORDER BY `categories`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function updatePlatform($name,$slugUpdate, $slug){
        $sql = "UPDATE `categories` SET `name` = ?,`slug` = ?, `updatedAt` = current_timestamp() WHERE `categories`.`slug` = ?";
        return $this->pdo_execute($sql, $name, $slugUpdate, $slug);
    }
    public function getAll(){
        $sql = "SELECT * FROM `categories` ORDER BY `categories`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($name, $category_id, $slug){
        $sql = "INSERT INTO `categories` ( `name`, `parent_id`, `slug`, `createdAt`, `updatedAt`) VALUES ( ?, ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000');";
        return $this->pdo_execute($sql, $name, $category_id, $slug);
    }
    public function check_unique($name){
        $sql = "SELECT * FROM `categories` WHERE `name`=?";
        return  $this->pdo_query($sql, $name);
    }
    public function getCategory(){
        $sql = "SELECT c.slug, c.id,c.name as `name`, c1.`name` as `parent` FROM `categories` c INNER JOIN `categories` c1 WHERE c.parent_id = c1.id";
        return $this->pdo_query($sql);
    }
    public function getBySlug($slug){
        $sql = "SELECT * FROM `categories` WHERE `slug`=?";
        return  $this->pdo_query_one($sql, $slug);
    }
    public function update($name, $parent_id, $slugUpdate, $slug){
         $sql = "UPDATE `categories` SET `name` = ?, `parent_id` = ?, `slug` = ?, `updatedAt` = current_timestamp() WHERE `categories`.`slug` = ?";
         return $this->pdo_execute($sql, $name, $parent_id, $slugUpdate, $slug);
    }
    public function delete($id){
        $sql = "DELETE FROM `categories` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }

}
?>