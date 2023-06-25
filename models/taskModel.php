<?php
 
 require_once(ROOT_PATH . "core/Database.php");
 
class Task extends Database{
   
    
    
    public function Insert($name, $active, $date)
    {
        $sql = "INSERT INTO `task` ( `name`, `active`, `createdAt`) VALUES ( ?, ?, ?)";
        $this->pdo_execute($sql, $name, $active, $date);
    }
    public function getAll(){
        $sql = "SELECT * FROM `task` ORDER BY `task`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function findById($id){
        $sql = "SELECT * FROM `task` WHERE `id` = ?";
        return $this->pdo_query_one($sql, $id);
    }
    public function update($name, $active, $id){
        $sql = "UPDATE `task` SET `name` = ?, `active` = ? WHERE `task`.`id` = ?";
        $this->pdo_execute($sql,$name, $active, $id);
    }
    public function delete($id){
         $sql = "DELETE FROM `task` WHERE `id` = ?";
         $this->pdo_execute($sql, $id);
    }
    public function task_count_total(){
        $sql = "SELECT `task`.`id` FROM `task`";
        return  $this->pdo_query_get_total($sql);
     }
    public function task_search_by_name($name){
        $sql = "SELECT * FROM `task` WHERE `name` LIKE ? ";
        return $this->pdo_query($sql, "%$name%");
    }
    public function task_get_pagination($limit, $offset){
        $sql = "SELECT * FROM `task` ORDER BY `task`.`id` DESC LIMIT ".$limit." OFFSET ".$offset."";
        return $this->pdo_query($sql);
    }
   

}
