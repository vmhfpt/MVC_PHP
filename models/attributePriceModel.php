<?php
 
 require_once("core/Database.php");
 
class AttributePrice extends Database{
    public function getListByProductColorId($product_color_id){
        $sql = "SELECT `product_color`.`thumb`,`attribute_price`.`price`,`attribute_price`.`price_sale`,`attribute_price`.`active`,`attribute_price`.`quantity`,`attribute_price`.`id`, t1.`description`, v1.`value`,  v2.`value` AS `color`, `products`.`name` AS `name_product`
        FROM `attribute_price` 
        JOIN `attribute_product` a1
        JOIN `attribute_product` a2
        JOIN `product_color`
        JOIN `values` v1
        JOIN `types` t1
        JOIN `values` v2
        JOIN `types` t2
        JOIN `products`
        ON `attribute_price`.`attribute_product_id` = a1.`id`
        AND `attribute_price`.`product_color_id` = `product_color`.`id`
        AND `product_color`.`attribute_product_id` = a2.`id`
        AND a1.`product_id` = `products`.`id`
        AND a1.`type_id` = t1.`id`
        AND a1.`value_id` = v1.`id`
        AND a2.`type_id` = t2.`id`
        AND a2.`value_id` = v2.`id`
        AND `product_color`.`id` = ?";
         return $this->pdo_query($sql, $product_color_id);
    }
    public function checkUnique($attribute_product_id, $product_color_id){
        $sql = "SELECT * FROM `attribute_price` WHERE `attribute_product_id` = ? AND `product_color_id` = ?";
        return $this->pdo_query($sql, $attribute_product_id, $product_color_id);
    }
    public function insert($attribute_product_id, $product_color_id, $price, $price_sale, $quantity, $active){
        $sql = "INSERT INTO `attribute_price` (`attribute_product_id`, `product_color_id`, `price`, `price_sale`, `quantity`, `active`, `createdAt`, `updatedAt`) VALUES (?, ?, ?, ?, ?,  ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_execute($sql, $attribute_product_id, $product_color_id, $price, $price_sale, $quantity, $active);
    }
    public function delete($id){
        $sql = "DELETE FROM `attribute_price` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
    }
    public function getById($id){
        $sql = "SELECT `product_color`.`thumb`,`attribute_price`.`price`,`attribute_price`.`price_sale`,`attribute_price`.`active`,`attribute_price`.`quantity`,`attribute_price`.`id`, t1.`description`, v1.`value`,  v2.`value` AS `color`, `products`.`name` AS `name_product`
        FROM `attribute_price` 
        JOIN `attribute_product` a1
        JOIN `attribute_product` a2
        JOIN `product_color`
        JOIN `values` v1
        JOIN `types` t1
        JOIN `values` v2
        JOIN `types` t2
        JOIN `products`
        ON `attribute_price`.`attribute_product_id` = a1.`id`
        AND `attribute_price`.`product_color_id` = `product_color`.`id`
        AND `product_color`.`attribute_product_id` = a2.`id`
        AND a1.`product_id` = `products`.`id`
        AND a1.`type_id` = t1.`id`
        AND a1.`value_id` = v1.`id`
        AND a2.`type_id` = t2.`id`
        AND a2.`value_id` = v2.`id`
        AND `attribute_price`.`id` = ?";
        return  $this->pdo_query_one($sql, $id);
    }
    public function update($price, $price_sale, $quantity, $active, $id){
        $sql = "UPDATE `attribute_price` SET `price` = ?, `price_sale` = ?, `quantity` = ?, `active` = ?, `updatedAt` = current_timestamp() WHERE `attribute_price`.`id` = ?";
        return $this->pdo_execute($sql, $price, $price_sale, $quantity, $active, $id);
    }
    
}
?>