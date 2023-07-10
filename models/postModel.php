<?php
 
 require_once("core/Database.php");
 
class Post extends Database{
    
   
    public function getAll(){
        $sql = "SELECT `posts`.`id`, `posts`.`title` , `posts`.`thumb`, `posts`.`slug`, `category_post`.`name` AS `category_name` FROM `posts` 
        JOIN `category_post`
        ON `posts`.`category_post_id` = `category_post`.`id`
        ORDER BY `posts`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($title, $description, $content, $slug, $thumb, $category_post_id){
        $sql = "INSERT INTO `posts` ( `title`, `description`, `content`, `slug`, `thumb`, `category_post_id`, `createdAt`, `updatedAt`) VALUES ( ?, ?, ?, ?, ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000');";
        return $this->pdo_execute($sql, $title, $description, $content, $slug, $thumb, $category_post_id);
    }
    public function check_unique($title){
        $sql = "SELECT * FROM `posts` WHERE `title`= ?";
        return  $this->pdo_query($sql, $title);
    }
  
    public function getBySlug($slug){
        $sql = "SELECT * FROM `posts` WHERE `slug`=?";
        return  $this->pdo_query_one($sql, $slug);
    }

    public function getById($id){
        $sql = "SELECT * FROM `posts` WHERE `id`=?";
        return  $this->pdo_query_one($sql, $id);
    }
    public function update($category_post_id, $title, $description, $content, $newSlug, $thumb, $slug){
         $sql = "UPDATE `posts` SET `category_post_id` = ?,`title` = ?, `description` = ?, `content` = ?, `slug` = ?, `thumb` = ?, `updatedAt` = current_timestamp() WHERE `posts`.`slug` = ?";
         return $this->pdo_execute($sql, $category_post_id, $title, $description, $content, $newSlug, $thumb, $slug);
    }
    public function delete($id){
        $sql = "DELETE FROM `posts` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }

}
?>