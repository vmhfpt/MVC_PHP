<?php
 
 require_once("core/Database.php");
 
class Value extends Database{
    
   
    public function getAll(){
        $sql = "SELECT `types`.`id` AS `type_id`, `values`.`id`, `values`.`value`, `types`.`description` FROM `values` JOIN `types` WHERE `values`.`type_id` = `types`.`id` ORDER BY `values`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($type_id, $value){
        $sql = "INSERT INTO `values` (`type_id`, `value`, `createdAt`, `updatedAt`) VALUES (?, ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_execute($sql,$type_id, $value);
    }
  
    public function getById($id){
        $sql = "SELECT `types`.`id` AS `type_id`, `values`.`id`, `values`.`value`, `types`.`description` FROM `values` JOIN `types` WHERE `values`.`type_id` = `types`.`id` AND `values`.`id` = ? ORDER BY `values`.`id` DESC";
        return  $this->pdo_query_one($sql, $id);
    }
    public function getValueByTypeId($type_id){
        $sql = "SELECT * FROM `values` WHERE `type_id` = ?";
        return $this->pdo_query($sql, $type_id);
    }


    public function update($value, $type_id, $id){
         $sql = "UPDATE `values` SET `value` = ?, `type_id` = ? ,`updatedAt` =  current_timestamp() WHERE `values`.`id` = ?";
         return $this->pdo_execute($sql, $value, $type_id, $id);
    }
    public function delete($id){
        $sql = "DELETE FROM `values` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }

}
?>