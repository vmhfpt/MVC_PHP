<?php
 
 require_once("core/Database.php");
 
class Attributes extends Database{
    
   
    public function getAll(){
        $sql = "SELECT * FROM `types` ORDER BY `types`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($name, $description){
        $sql = "INSERT INTO `types` (`name`, `description`, `createdAt`, `updatedAt`) VALUES (?, ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_execute($sql, $name, $description);
    }
    public function check_unique($name){
        $sql = "SELECT * FROM `types` WHERE `name`= ?";
        return  $this->pdo_query($sql, $name);
    }
  
    public function getById($id){
        $sql = "SELECT * FROM `types` WHERE `id`=?";
        return  $this->pdo_query_one($sql, $id);
    }


    public function update($name, $description, $id){
         $sql = "UPDATE `types` SET `name` = ?, `description` = ?, `updatedAt` =  current_timestamp() WHERE `types`.`id` = ?";
         return $this->pdo_execute($sql, $name,$description, $id);
    }
    public function delete($id){
        $sql = "DELETE FROM `types` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }
    public function getValueByType($type_id){
        $sql = "SELECT `types`.`id` AS `type_id`, `values`.`id`, `values`.`value`, `types`.`description` FROM `values` JOIN `types` WHERE `values`.`type_id` = `types`.`id` AND `types`.`id`  = ? ORDER BY `values`.`id` DESC";
        return $this->pdo_query($sql, $type_id);
    }
    public function getAttributeCategoryByPlatFormId($id){
        $sql = "SELECT `types`.`id`,`types`.`description`, `types`.`name` FROM `type_category` 
        JOIN `types`
        ON `type_category`.`type_id` = `types`.`id`
        WHERE `type_category`.`category_id` = ?";
        return  $this->pdo_query($sql, $id);
    }

}
?>