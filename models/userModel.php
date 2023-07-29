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
        $sql = "SELECT * FROM `users` WHERE `email`=? AND `login_type` = 1";
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
   public function login($email, $password){
     $sql = "SELECT * FROM `users` WHERE `email` = ? AND `password` = ? AND `login_type` = 1";
     return  $this->pdo_query_one($sql, $email, $password);
   }
   public function checkLoginSocialiteGoogle($google_id){
    $sql = "SELECT * FROM `users` WHERE `google_id` = ? AND `login_type` = 2";
    return  $this->pdo_query_one($sql, $google_id);
   }
   public function checkLoginSocialiteFacebook($facebook_id){
    $sql = "SELECT * FROM `users` WHERE `facebook_id` = ? AND `login_type` = 3";
    return  $this->pdo_query_one($sql, $facebook_id);
   }
   public function insertLoginByGoogle($name, $emai, $google_id){
    $sql = "INSERT INTO `users` ( `name`, `email`, `email_verified_at`, `password`, `image`, `createdAt`, `updatedAt`, `phone_number`, `google_id`, `facebook_id`, `login_type`, `active`, `role`) VALUES (?, ?, NULL, '123', '', NULL, NULL, NULL, ?, NULL, '2', '0', '0')";
    return $this->pdo_query_get_lastId($sql, $name, $emai, $google_id);
   }
   public function insertLoginByFacebook($name, $emai, $facebook_id){
    $sql = "INSERT INTO `users` ( `name`, `email`, `email_verified_at`, `password`, `image`, `createdAt`, `updatedAt`, `phone_number`, `google_id`, `facebook_id`, `login_type`, `active`, `role`) VALUES (?, ?, NULL, '123', '', NULL, NULL, NULL, NULL, ?, '3', '0', '0')";
    return $this->pdo_query_get_lastId($sql, $name, $emai, $facebook_id);
   }
   public function checkForceEmail($email){
    $sql = "SELECT * FROM `users` WHERE `email` = ? AND `login_type` = 1";
    return  $this->pdo_query_one($sql, $email);
   }
   public function updatePassword($password, $id){
     $sql = "UPDATE `users` SET  `password` = ? WHERE `users`.`id` = ?";
     return $this->pdo_execute($sql,$password, $id);
   }
   public function register($name, $email, $password){
     $sql = "INSERT INTO `users` (`name`, `email`, `email_verified_at`, `password`, `image`, `createdAt`, `updatedAt`, `phone_number`, `google_id`, `facebook_id`, `login_type`, `active`, `role`) VALUES (?, ?, NULL, ?, '', NULL, NULL, NULL, NULL, NULL, '1', '0', '0')";
     return $this->pdo_query_get_lastId($sql,$name, $email, $password);
   }
   public function updateUser($name, $email, $password, $image, $phone_number, $id){
     $sql = "UPDATE `users` SET `name` = ?, `email` = ?,  `password` = ?, `image` = ?,  `phone_number` = ? WHERE `users`.`id` = ?";
     return $this->pdo_execute($sql,$name, $email, $password, $image, $phone_number, $id);
   }
   public function selectTopNewUsers(){
    $sql = "SELECT * FROM `users` ORDER BY `users`.`id` DESC LIMIT 8";
    return  $this->pdo_query($sql);
   }
   

}
?>