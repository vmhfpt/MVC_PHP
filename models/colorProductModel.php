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
    public function getByID($id){
        $sql = "SELECT * FROM `product_color` WHERE `id` = ?";
        return $this->pdo_query_one($sql, $id);
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
    public function deleteLibraryProductByID($id){
        $sql = "DELETE FROM `library_color` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
    }
    public function getLibraryProductByID($id){
        $sql = "SELECT * FROM `library_color` WHERE `id` = ?";
        return  $this->pdo_query_one($sql, $id);
    }

    public function update($price, $price_sale, $active, $thumb, $quantity, $attribute_product_id){
         $sql = "UPDATE `product_color` SET  `price` = ?, `price_sale` = ?, `active` = ?, `thumb` = ?, `quantity` = ?, `updatedAt` = current_timestamp() WHERE `product_color`.`attribute_product_id` = ?";
         return $this->pdo_execute($sql, $price, $price_sale, $active, $thumb, $quantity, $attribute_product_id);
    }
    
    public function getAllByProduct(){
        $sql = "SELECT `products`.`slug`,`products`.`thumb`,`products`.`name`, `products`.`id` AS `product_id`, `attribute_product`.`id` AS `attribute_product_id`, COUNT(`attribute_product`.`product_id`) AS `total_color` 
        FROM `products` 
        LEFT JOIN `attribute_product` 
        ON `products`.`id` = `attribute_product`.`product_id` 
        AND `attribute_product`.`type_id` = 3 
        GROUP BY `attribute_product`.`product_id`, `products`.`name`";
        return  $this->pdo_query($sql);
    }
    public function getAllColorByProduct($product_id){
        $sql = "SELECT  `attribute_product`.`id` AS `attribute_prd_id`,`types`.`description`, `values`.`value`, `products`.`name`, `product_color`.* 
        FROM `attribute_product` 
        JOIN `products` 
        JOIN `values` 
        JOIN `types` 
        JOIN `product_color` 
        WHERE `attribute_product`.`product_id` = ?
        AND `attribute_product`.`type_id` = 3 
        AND `attribute_product`.`id` = `product_color`.`attribute_product_id`
        AND `attribute_product`.`type_id` = `types`.`id` 
        AND `attribute_product`.`value_id` = `values`.`id` 
        AND `products`.`id` = `attribute_product`.`product_id`";
        return  $this->pdo_query($sql, $product_id);
    }
    public function getPriceAttributeByProductColorID($product_color_id){
        $sql="SELECT `types`.`id` AS `type_id`,`types`.`description`, `product_color`.`id` AS `product_color_id`, `attribute_price`.`id` AS `attribute_price_id`, `attribute_product`.`id` AS `attribute_product_id`
        FROM `attribute_price` 
        JOIN `product_color` 
        JOIN `attribute_product` 
        JOIN `types` 
        JOIN `values` 
        JOIN `products` 
        ON `attribute_price`.`product_color_id` = `product_color`.`id` 
        AND `attribute_price`.`attribute_product_id` = `attribute_product`.`id` 
        AND `attribute_product`.`type_id` = `types`.`id` 
        AND `attribute_product`.`value_id` = `values`.`id` 
        AND `attribute_product`.`product_id` = `products`.`id` 
        AND `attribute_price`.`product_color_id` = ?
        GROUP BY `types`.`name` ORDER BY `types`.`id` ASC;";
        return $this->pdo_query($sql, $product_color_id);
    }

}
?>