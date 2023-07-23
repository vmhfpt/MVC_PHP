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
    public function getByName($name) {
        $sql = "SELECT * FROM `products` WHERE `name`=?";
        return  $this->pdo_query_one($sql, $name);
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
    public function getProductByPlatformID($platform_id){
        $sql = "SELECT `products`.`price_sale`,`products`.`price`,`products`.`thumb`,`products`.`name` AS `product_name`, `categories`.`slug` AS `category_slug`, platform.slug AS `platform_slug`, `products`.`slug` AS `product_slug` FROM `products` JOIN `categories` ON `products`.`category_id` IN(SELECT `categories`.`id` FROM `categories` WHERE `categories`.`parent_id` = ? ) AND `products`.`category_id` = `categories`.`id` JOIN `categories` platform ON `categories`.`parent_id` = platform.id ORDER BY `products`.`id` DESC LIMIT 0,10";
        return $this->pdo_query($sql, $platform_id);
    }
    public function getProductByBrandSuggest($brand_id){
       $sql = "SELECT `products`.`price_sale`,`products`.`price`,`products`.`name`,`products`.`thumb`,`products`.`slug` AS `product_slug`,`products`.`name` AS `product_name`, category.slug AS `cateogory_slug`,platform.slug AS `platform_slug` FROM `products`
       INNER JOIN `categories` category
       ON `products`.`category_id` = category.id
       AND `products`.`brand_id` = ?
       INNER JOIN `categories` platform
       ON platform.id = category.parent_id
       ORDER BY `products`.`id` 
       DESC LIMIT 0,20";
       return $this->pdo_query($sql, $brand_id);
    }
    public function getAttributeByProduct($product_id){
        $sql = "SELECT `attribute_product`.`id`, `types`.`description`, `values`.`value`, `products`.`name` FROM `attribute_product` 
        JOIN `products` 
        JOIN `values` 
        JOIN `types`
        WHERE `attribute_product`.`product_id` = ?
        AND `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`value_id` = `values`.`id`
        AND `products`.`id` = `attribute_product`.`product_id`
        AND `types`.`id` != 3
        GROUP BY `types`.`id` ";
        return $this->pdo_query($sql, $product_id);
    }
    public function getFirstColorByProductID($product_id){
        $sql = "SELECT `attribute_product`.`id` AS `attribute_product_id`, `products`.`name` AS `product_name` , `types`.`name` AS `attribute`, `values`.`value` , `product_color`.`thumb`, `product_color`.`price`, `product_color`.`price_sale`, `product_color`.`quantity`, `product_color`.`id` AS `product_color_id`
        FROM `attribute_product` 
        INNER JOIN `products`
        INNER JOIN `types`
        INNER JOIN `values`
        INNER JOIN `product_color`
        ON `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`id` = `product_color`.`attribute_product_id`
        AND `attribute_product`.`product_id` = `products`.`id`
        AND `attribute_product`.`value_id` = `values`.`id`
        AND `attribute_product`.`product_id` = ?
        AND `attribute_product`.`type_id` = 3 LIMIT 0,1";
        return $this->pdo_query_one($sql, $product_id);
    }

    public function getPriceAttributeByProductColorID($product_color_id){
        $sql = "SELECT `types`.`id` AS `type_id`,`products`.`name`,`types`.`name` AS `type_name`,`values`.`value`,`attribute_price`.`price`, `attribute_price`.`price_sale`,`attribute_price`.`quantity`,`attribute_price`.`active` , `attribute_price`.`id` AS `attribute_price_id`
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
        ORDER BY `types`.`id` ASC;";
        return $this->pdo_query($sql, $product_color_id);
    }
    public function countPriceAttributeByProductColorID($product_color_id){
        $sql="SELECT `types`.`name` , `types`.`description`, `types`.`id`
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
    
    public function getAttributePriceProductCart($attribute_product_id){
        $sql = "SELECT `types`.`id`,`products`.`name`,`types`.`name` AS `type_name`,`values`.`value`,`attribute_price`.`price`, `attribute_price`.`price_sale`,`attribute_price`.`quantity`,`attribute_price`.`active` , `attribute_price`.`id` AS `attribute_price_id`
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
        AND `product_color`.attribute_product_id = ?
        ORDER BY `types`.`id` ASC";
        return $this->pdo_query($sql, $attribute_product_id);
    }

    public function getAttributePriceProductByOrderDetailID($order_detail_id){
        $sql = "SELECT `products`.name AS `product_name`, v1.value AS `product_color`, `types`.`description`, `values`.`value`, `attribute_price`.`price`,`attribute_price`.`price_sale`
        FROM `order_attribute_product` 
        INNER JOIN `order_detail`
        ON `order_attribute_product`.`order_detail_id` = `order_detail`.`id`
        AND `order_attribute_product`.`order_detail_id`= ?
        INNER JOIN `product_color` 
        ON `order_detail`.`product_id` = `product_color`.`id`
        INNER JOIN `attribute_product` p1
        ON `product_color`.`attribute_product_id` = p1.id
        INNER JOIN `types` t1
        INNER JOIN `values` v1
        ON p1.type_id = t1.id
        AND p1.value_id = v1.id
        INNER JOIN `attribute_price`
        ON `order_attribute_product`.`attribute_price_id` = `attribute_price`.`id`
        INNER JOIN `attribute_product`
        ON `attribute_price`.`attribute_product_id` = `attribute_product`.`id`
        INNER JOIN `values`
        INNER JOIN `types`
        ON `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`value_id` = `values`.`id`
        INNER JOIN `products`  
        ON `attribute_product`.`product_id` = `products`.`id`
        ";
         return $this->pdo_query($sql, $order_detail_id);
    }
    public function getProductSuggestByPlatFormSLug($slug){
        $sql = "SELECT `products`.`name`, `products`.`price`, `products`.`price_sale`, `products`.`thumb`, `products`.`slug`, c2.slug AS `platform_slug`  FROM `products` 
        INNER JOIN `categories` c1 
        ON `products`.`category_id` = c1.id 
        INNER JOIN `categories` c2 
        ON c1.parent_id = c2.id 
        AND c2.slug = ? 
        ORDER BY `products`.`id` 
        ASC LIMIT 0,10";
        return $this->pdo_query($sql, $slug);
    }
    public function getAttributeByProductIDChatBot($product_id){
        $sql = "SELECT `attribute_product`.`id`, `types`.`description`, `values`.`value`, `products`.`name` FROM `attribute_product` 
        JOIN `products` 
        JOIN `values` 
        JOIN `types`
        WHERE `attribute_product`.`product_id` = ?
        AND `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`value_id` = `values`.`id`
        AND `products`.`id` = `attribute_product`.`product_id`
        AND `types`.`id` != 3";
        return $this->pdo_query($sql, $product_id);
    }
    public function getProductSearchByName($name){
        $sql = "SELECT `products`.`id`,`products`.`name`, `products`.`price`, `products`.`price_sale`, `products`.`thumb`, `products`.`slug`, c2.slug AS `platform_slug`  FROM `products` 
        
        INNER JOIN `categories` c1 
        ON `products`.`category_id` = c1.id 
        INNER JOIN `categories` c2 
        ON c1.parent_id = c2.id 
        WHERE `products`.`name` LIKE ?
        ORDER BY `products`.`id` 
        ASC LIMIT 0,1";
        return $this->pdo_query_one($sql,  "%$name%");

    }
    public function getPriceProductInitByProductColorID($product_color_id){
        $sql = "SELECT `products`.`name`, (`products`.`price` - (`products`.`price` * `products`.`price_sale`) ) AS `price_init` FROM `product_color` 
        INNER JOIN `attribute_product`
        ON `product_color`.`attribute_product_id` = `attribute_product`.`id`
        INNER JOIN `products`
        ON `products`.`id` = `attribute_product`.`product_id`
        WHERE `product_color`.`id` = ?";
        return $this->pdo_query_one($sql,  $product_color_id);
    }
    public function getProductByFilter($arr){
        //$string = "WHERE `id` = 1";
        //$sql = "SELECT * FROM `products`'".$string."' ";
        return $this->pdo_query($sql);
    }
}
?>