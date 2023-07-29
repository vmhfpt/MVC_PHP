<?php
 
 require_once("core/Database.php");
 
class AttributeProduct extends Database{
    
    public function getAttributeExceptColorByProductId($product_id){
        $sql = "SELECT `attribute_product`.`id`, `types`.`description`, `values`.`value`
        FROM `attribute_product`  
        JOIN `types`
        JOIN `values`
        ON `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`value_id` = `values`.`id`
        AND `attribute_product`.`type_id` != 3
        AND `attribute_product`.`product_id` = ?";
        return $this->pdo_query($sql, $product_id);
    }
    public function getProduct($slug){
        $sql = "SELECT `products`.`id` AS `product_id` ,`products`.`name` AS `product_name`, c1.name, c2.name AS `platform`, c2.id AS `platform_id` FROM `products` 
        JOIN `categories` c1
        JOIN `categories` c2
        ON `products`.`category_id` = c1.id
        AND c1.parent_id = c2.id
        AND `products`.`slug` = ?";
       return  $this->pdo_query_one($sql, $slug);
    }
    public function getAttributeByProduct($product_id){
        $sql = "SELECT `attribute_product`.`type_id` AS `type_id` ,`attribute_product`.`id`, `types`.`description`, `values`.`value` FROM  `attribute_product`
        JOIN `types` 
        JOIN `values`
        ON `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`value_id`= `values`.`id`
        AND `attribute_product`.`product_id` = ?";
        return $this->pdo_query($sql, $product_id);
    }
    public function checkUnique($product_id, $type_id, $value_id){
       $sql = "SELECT * FROM `attribute_product` WHERE `product_id` = ? AND `type_id` = ? AND `value_id` = ?";
       return $this->pdo_query($sql, $product_id, $type_id, $value_id);
    }
    public function create($product_id, $type_id, $value_id){
        $sql = "INSERT INTO `attribute_product` ( `product_id`, `type_id`, `value_id`, `createdAt`, `updatedAt`) VALUES ( ?, ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_execute($sql, $product_id, $type_id, $value_id);
    }
    public function delete($attribute_product_id){
        $sql = "DELETE FROM `attribute_product` WHERE `id` = ?";
        $this->pdo_execute($sql, $attribute_product_id);
    }
    public function getById($id){
        $sql = "SELECT `attribute_product`.`product_id` AS `product_id`,`attribute_product`.`id`, `products`.`name`, `types`.`description`, `values`.`value` FROM `attribute_product` 
        JOIN `products`
        JOIN `values`
        JOIN `types`
        ON `attribute_product`.`product_id` = `products`.`id`
        AND `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`value_id` = `values`.`id`
        AND `attribute_product`.`id` = ?";
        return  $this->pdo_query_one($sql, $id);
    }
   
}
?>