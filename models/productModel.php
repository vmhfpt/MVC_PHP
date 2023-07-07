<?php
 
 require_once("core/Database.php");
 
class Product extends Database{
    
   
    public function getAll(){
        $sql = "SELECT `categories`.`name` AS `category`,`products`.`thumb`,`products`.`name`, `products`.`id`, `products`.`slug`, `products`.`price`, `products`.`view_total` FROM `products` JOIN `categories` WHERE `categories`.`id` = `products`.`category_id` ORDER BY `products`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($name, $category_id, $price, $price_sale, $content, $slug, $active, $thumb, $view_model, $brand_id, $view_total){
        $sql = "INSERT INTO `products` ( `name`, `category_id`, `price`, `price_sale`, `content`, `slug`, `active`, `thumb`, `view_model`, `brand_id`, `createdAt`, `updatedAt`, `view_total`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp() , '0000-00-00 00:00:00.000000', ?);";
        return $this->pdo_execute($sql, $name, $category_id, $price, $price_sale, $content, $slug, $active, $thumb, $view_model, $brand_id, $view_total);
    }
    public function check_unique($name){
        $sql = "SELECT * FROM `products` WHERE `name`= ?";
        return  $this->pdo_query($sql, $name);
    }
  
    public function getBySlug($slug){
        $sql = "SELECT * FROM `products` WHERE `slug`=?";
        return  $this->pdo_query_one($sql, $slug);
    }
    public function getById($id){
        $sql = "SELECT * FROM `products` WHERE `id`=?";
        return  $this->pdo_query_one($sql, $id);
    }
   

    public function update($name, $category_id, $price, $price_sale, $content, $newSlug, $active, $thumb, $view_model, $brand_id, $slug){
         $sql = "UPDATE `products` SET `name` = ?, `category_id` = ?, `price` = ?, `price_sale` =  ? , `content` = ?, `slug` = ?, `active` = ?, `thumb` = ?, `view_model` = ?, `brand_id` = ?, `updatedAt` = current_timestamp() WHERE `products`.`slug` = ?";
         return $this->pdo_execute($sql, $name, $category_id, $price, $price_sale, $content, $newSlug, $active, $thumb, $view_model, $brand_id, $slug);
    }
    public function delete($id){
        $sql = "DELETE FROM `products` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
    }
    public function product_count_total(){
        $sql = "SELECT `products`.`id` FROM `products`";
        return $this->pdo_query_get_total($sql);
     }
    public function product_pagination($limit, $offset){
        $sql = "SELECT `categories`.`name` AS `category`,`products`.`thumb`,`products`.`name`, `products`.`id`, `products`.`slug`, `products`.`price`, `products`.`view_total` FROM `products` JOIN `categories` WHERE `categories`.`id` = `products`.`category_id` ORDER BY `products`.`id` DESC LIMIT ".$limit." OFFSET ".$offset."";
        return $this->pdo_query($sql);
    }
    public function getColorByProduct(){
        $sql = "SELECT `product_color`.`id` AS `product_color_id`,`values`.`value`,`product_color`.`thumb` AS `thumb_color`,`products`.`slug`,`products`.`thumb` AS `thumb_product`,`products`.`name`, `products`.`id` AS `product_id`, `attribute_product`.`id` AS `attribute_product_id` 
        FROM `products` 
        JOIN `product_color` 
        JOIN `values` 
        JOIN `attribute_product` 
        ON `products`.`id` = `attribute_product`.`product_id` 
        AND `product_color`.`attribute_product_id` = `attribute_product`.`id` 
        AND `attribute_product`.`value_id` = `values`.`id` 
        AND `attribute_product`.`type_id` = 3";
        return $this->pdo_query($sql);
    }

}
?>