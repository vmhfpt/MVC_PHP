<?php
 
 require_once("core/Database.php");
 
class giftProduct extends Database{
    public function getGiftProductByProductId($product_id){
        $sql = "SELECT p1.category_id, p2.name AS `product_name_gift`, p2.price, p2.price_sale, `gift`.id , p2.thumb, c1.slug AS `category_slug`, c2.slug AS `platform_slug`, p2.slug AS `product_slug`
        FROM `gift` 
        JOIN `products` p1
        JOIN `products` p2
        JOIN `categories` c1
        JOIN `categories` c2
        ON `gift`.`product_id` = p1.id
        AND `gift`.`gift_product_id` = p2.id
        AND `gift`.`product_id` = ?
        AND p2.category_id = c1.id
        AND c1.parent_id = c2.id";
        return $this->pdo_query($sql, $product_id);
    }
}
?>