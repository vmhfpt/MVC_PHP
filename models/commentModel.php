<?php
 
 require_once("core/Database.php");
 
class Comment extends Database{
    public function insert($product_id, $vote, $content, $name, $number_phone, $email, $active){
        $sql = "INSERT INTO `comment` ( `product_id`, `vote`, `content`, `name`, `number_phone`, `email`, `active`, `createdAt`) VALUES ( ?, ?, ? , ?, ?, ?, ?, current_timestamp())";
        return $this->pdo_query_get_lastId($sql,$product_id, $vote, $content, $name, $number_phone, $email, $active);
    }
    public function getCommentById($comment_id){
        $sql = "SELECT * FROM `comment` WHERE `comment`.`id` = ?";
        return  $this->pdo_query_one($sql, $comment_id);
    }
    public function getAllCommentByProductId($product_id){
        $sql = "SELECT * FROM `comment` WHERE `product_id` = ? ORDER BY `comment`.`id` DESC";
        return $this->pdo_query($sql, $product_id);
    }
    public function getRankProduct($product_id){
        $sql = "SELECT COUNT(`vote`) AS `total`, COUNT(`vote`) * `vote` AS `caculation`, `vote` FROM `comment` WHERE `product_id` = ? AND `vote` != 0 GROUP BY `vote` ORDER BY `comment`.`vote` ASC";
        return $this->pdo_query($sql, $product_id);
    }
    public function getAllcommentByProduct(){
        $sql = "SELECT `products`.`id`, `categories`.`name` AS `category_name` , `products`.`thumb`, `products`.`name`, COUNT(`comment`.`product_id`) AS `total`, MAX(`comment`.`createdAt`) AS `new`, MIN(`comment`.`createdAt`) AS `old` 
        FROM `products`
        INNER JOIN `comment` 
        ON `comment`.`product_id` = `products`.`id` 
        INNER JOIN `categories` 
        ON `products`.`category_id` = `categories`.`id` 
        GROUP BY `products`.`id`, `products`.`name`
        HAVING `total` > 0
        ORDER BY `products`.`id` DESC";
        return $this->pdo_query($sql);
    }

    public function getCommentsByProductID($product_id){
        $sql = "SELECT * FROM `comment` WHERE `product_id` = ?";
        return $this->pdo_query($sql, $product_id);
    }
    public function deleteCommentByID($comment_id){
        $sql = "DELETE FROM `comment` WHERE `id` = ?";
        $this->pdo_execute($sql, $comment_id);
    }
    public function commentGetTop5(){
        $sql = "SELECT `comment`.`content`, `comment`.`createdAt`, `products`.`name`, `comment`.`name` FROM `comment` JOIN `products`  WHERE  `comment`.`product_id` = `products`.`id` ORDER BY `comment`.`createdAt` DESC LIMIT 5 OFFSET 0";
        return $this->pdo_query($sql);
    }
}