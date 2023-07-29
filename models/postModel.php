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
   public function getFirstItem(){
      $sql = "SELECT * FROM `posts` ORDER BY `posts`.`id` ASC LIMIT 0,1";
      return  $this->pdo_query_one($sql);
   }
   public function getFivePostsSuggest(){
      $sql = "SELECT * FROM `posts` ORDER BY `posts`.`id` DESC LIMIT 5 OFFSET 1"; 
      return $this->pdo_query($sql);
   }
   public function getPostSuggestByCategory($category_post_id){
     $sql = "SELECT `category_post`.`name`, `posts`.`title`, `posts`.`description`, `posts`.`slug`, `posts`.`thumb`, `posts`.`createdAt` FROM `posts`
     INNER JOIN `category_post`
     ON `category_post`.`id` = `posts`.`category_post_id`
     WHERE `category_post`.`id` = ?
     LIMIT 0,5";
     return $this->pdo_query($sql, $category_post_id);
   }
   public function getTop10Post($limit, $offset){
    $sql = "SELECT `category_post`.`name`, `posts`.`title`, `posts`.`description`, `posts`.`slug`, `posts`.`thumb`, `posts`.`createdAt` FROM `posts`
    INNER JOIN `category_post`
    ON `category_post`.`id` = `posts`.`category_post_id`
    ORDER BY `posts`.`id` DESC
    LIMIT ".$limit." OFFSET ".$offset."";
    return $this->pdo_query($sql);
   }
   public function post_count_total(){
    $sql = "SELECT `posts`.`id` FROM `posts`";
    return $this->pdo_query_get_total($sql);
 }
 public function getTop10PostByCategory($limit, $offset, $slug){
    $sql = "SELECT `category_post`.`name`, `posts`.`title`, `posts`.`description`, `posts`.`slug`, `posts`.`thumb`, `posts`.`createdAt` FROM `posts`
    INNER JOIN `category_post`
    ON `category_post`.`id` = `posts`.`category_post_id`
    WHERE `category_post`.`slug` = ?
    ORDER BY `posts`.`id` DESC
    LIMIT ".$limit." OFFSET ".$offset."";
    return $this->pdo_query($sql, $slug);
   }
   public function post_count_totalByCategory($slug){
    $sql = "SELECT `posts`.`id` FROM `posts`
     INNER JOIN `category_post`
     ON `category_post`.`id` = `posts`.`category_post_id`
     WHERE `category_post`.`slug` = ?";
    return $this->pdo_query_get_total($sql, $slug);
 }
 public function getTop3PostSuggestByCategory($category_id){
    $sql = "SELECT `category_post`.`name`, `posts`.`title`, `posts`.`description`, `posts`.`slug`, `posts`.`thumb`, `posts`.`createdAt` FROM `posts`
    INNER JOIN `category_post`
    ON `category_post`.`id` = `posts`.`category_post_id`
    WHERE `category_post`.`id` = ?
    ORDER BY `posts`.`id` DESC
    LIMIT 0,3
    ";
   return $this->pdo_query($sql, $category_id);
 }
   
}
?>