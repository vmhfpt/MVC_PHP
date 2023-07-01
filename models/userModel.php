<?php
 
 require_once("core/Database.php");
 
class User extends Database{
    
   
    public function getAll(){
        $sql = "SELECT * FROM `users` ORDER BY `users`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($name, $email, $password, $image, $phone_number,$google_id, $facebook_id, $login_type, $active, $role){
        $sql = "INSERT INTO `users` ( `name`, `email`, `email_verified_at`, `password`, `image`, `createdAt`, `updatedAt`, `phone_number`, `google_id`, `facebook_id`, `login_type`, `active`, `role`) VALUES ( ?, ? , NULL, ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000', ?, ?, ?, ?, ?, ?)";
        return $this->pdo_execute($sql, $name, $email, $password, $image, $phone_number, $google_id, $facebook_id, $login_type, $active, $role);
    }
    public function check_unique($email){
        $sql = "SELECT * FROM `users` WHERE `email`=?";
        return  $this->pdo_query($sql, $email);
    }
  
    public function getById($id){
        $sql = "SELECT * FROM `users` WHERE `id`=?";
        return  $this->pdo_query_one($sql, $id);
    }
    public function update($name, $email, $password, $image, $phone_number, $google_id, $facebook_id, $login_type, $active, $role, $id){
         $sql = "UPDATE `users` SET `name` =  ?, `email` = ?, `email_verified_at` = NULL, `password` = ?, `image` = ?,  `updatedAt` = current_timestamp(), `phone_number` = ?, `google_id` = ?, `facebook_id` = ?, `login_type` = ?, `active` = ?, `role` = ? WHERE `users`.`id` = ?";
         return $this->pdo_execute($sql, $name, $email, $password, $image, $phone_number, $google_id, $facebook_id, $login_type, $active, $role, $id);
    }
    public function delete($id){
        $sql = "DELETE FROM `users` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }

}
?>