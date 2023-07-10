<?php
 
 require_once("core/Database.php");
 
class Privilege extends Database{
    public function getPrivilegeGroup(){
        $sql = "SELECT * FROM `privilege_group`";
        return $this->pdo_query($sql);
    }
    public function getPrivilege(){
        $sql = "SELECT * FROM `privilege`";
        return $this->pdo_query($sql);
    }
    public function insertUserPrivilege($user_id, $privilege_id){
        $sql = "INSERT INTO `user_privilege` (`user_id`, `privilege_id`) VALUES (?, ?)";
        return $this->pdo_execute($sql, $user_id, $privilege_id);
    }
    public function getUserPrivile($user_id){
        $sql = "SELECT * FROM `user_privilege` WHERE `user_id` = ?";
        return $this->pdo_query($sql,$user_id);
    }
    public function deleteUserPrivile($user_id){
        $sql = "DELETE FROM `user_privilege` WHERE `user_id` = ?";
        $this->pdo_execute($sql, $user_id);
    }
    public function getAuthProvileByUser($user_id){
        $sql = "SELECT `privilege`.`url_match` FROM `user_privilege` 
        JOIN `privilege`
        JOIN `users`
        ON `user_privilege`.`privilege_id` = `privilege`.`id`
        AND `user_privilege`.`user_id` = `users`.`id`
        AND `user_privilege`.`user_id` = ?";
        return $this->pdo_query($sql, $user_id);
    }

}
?>