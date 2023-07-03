<?php
 
 require_once("core/Database.php");
 
class ColorProduct extends Database{
    
   
    public function getColorProductByAttributeProductID($attribute_product_id){
        $sql = "SELECT `product_color`.*, `values`.`value`, `types`.`description`, `products`.`name` AS `product_name`, `products`.`id` AS `product_id`
        FROM `product_color` 
        JOIN `products`
        JOIN `attribute_product`
        JOIN `values`
        JOIN `types`
        ON `product_color`.`attribute_product_id` = `attribute_product`.`id`
        AND `attribute_product`.`product_id` = `products`.`id`
        AND `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`value_id` = `values`.`id`
        AND `attribute_product`.`id` = ?";
        return $this->pdo_query_one($sql, $attribute_product_id);
    }
    public function getLibraryByColorProductID($colorProduct_id){
       $sql = "SELECT * FROM `library_color` WHERE `product_color_id` = ?";
       return  $this->pdo_query($sql, $colorProduct_id);
    }
    public function insert($attribute_product_id, $price, $price_sale, $active, $thumb, $quantity){
        $sql = "INSERT INTO `product_color` ( `attribute_product_id`, `price`, `price_sale`, `active`, `thumb`, `quantity`, `createdAt`, `updatedAt`) VALUES ( ?, ?, ?, ?, ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_query_get_lastId($sql, $attribute_product_id, $price, $price_sale, $active, $thumb, $quantity);
    }
    public function check_unique($attribute_product_id){
        $sql = "SELECT * FROM `product_color` WHERE `attribute_product_id`= ?";
        return  $this->pdo_query($sql, $attribute_product_id);
    }
  
    public function insertLibraryProduct($product_color_id, $thumb){
        $sql = "INSERT INTO `library_color` ( `product_color_id`, `thumb`) VALUES (?, ?)";
        return $this->pdo_execute($sql, $product_color_id, $thumb);
    }


    public function update($name, $id){
         $sql = "UPDATE `brands` SET `name` = ?, `updatedAt` =  current_timestamp() WHERE `brands`.`id` = ?";
         return $this->pdo_execute($sql, $name, $id);
    }
    public function delete($id){
        $sql = "DELETE FROM `brands` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }

}
?>