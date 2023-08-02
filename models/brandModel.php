<?php
 
 require_once("core/Database.php");
 
class Brand extends Database{
    
   
    public function getAll(){
        $sql = "SELECT * FROM `brands` ORDER BY `brands`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($name){
        $sql = "INSERT INTO `brands` (`name`, `active`, `createdAt`, `updatedAt`) VALUES (?, '1', current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_execute($sql, $name);
    }
    public function check_unique($name){
        $sql = "SELECT * FROM `brands` WHERE `name`= ?";
        return  $this->pdo_query($sql, $name);
    }
  
    public function getById($id){
        $sql = "SELECT * FROM `brands` WHERE `id`=?";
        return  $this->pdo_query_one($sql, $id);
    }


    public function update($name, $id){
         $sql = "UPDATE `brands` SET `name` = ?, `updatedAt` =  current_timestamp() WHERE `brands`.`id` = ?";
         return $this->pdo_execute($sql, $name, $id);
    }
    public function delete($id){
        $sql = "DELETE FROM `brands` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }
   public function testUpdate($name, $id){
    $sql = "UPDATE `brands` SET `name` = ?, `updatedAt` =  current_timestamp() WHERE `brands`.`id` = ?";
    return $this->pdo_update_get_Id($sql, $name, $id);
}

}
?>