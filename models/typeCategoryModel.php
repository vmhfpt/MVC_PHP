<?php
 
 require_once("core/Database.php");
 
class typeCategory extends Database{
    
    public function checkUnique($category_id, $type_id){
        $sql = "SELECT * FROM `type_category` WHERE `category_id` = ? AND `type_id` = ?";
        return  $this->pdo_query($sql, $category_id, $type_id);
    }
   
    public function getAll(){
        $sql = "SELECT `type_category`.`id`, `categories`.`name`, `types`.`description` FROM `type_category` JOIN `categories` JOIN `types` ON `type_category`.`type_id` = `types`.`id` AND `type_category`.`category_id` = `categories`.`id`;";
        return $this->pdo_query($sql);
    }
    public function insert($category_id, $type_id ){
        $sql = "INSERT INTO `type_category` (`category_id`, `type_id`, `createdAt`, `updatedAt`) VALUES (?, ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_execute($sql, $category_id, $type_id);
    }
  
    public function delete($id){
        $sql = "DELETE FROM `type_category` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }
    public function getTypeByCategory($category_id){
        $sql = "SELECT `type_category`.`id`, `categories`.`name`, `types`.`description`, `types`.`id` AS `type_id` FROM `type_category` JOIN `categories` JOIN `types` ON `type_category`.`type_id` = `types`.`id` AND `type_category`.`category_id` = `categories`.`id` AND `type_category`.`category_id` = ?";
        return $this->pdo_query($sql, $category_id);
    }

}
?>