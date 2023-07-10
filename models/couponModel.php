<?php
 
 require_once("core/Database.php");
 
class Coupon extends Database{
    public function checkUnique($product_id, $coupon_id){
        $sql = "SELECT * FROM `coupon_product` WHERE `coupon_id` = ? AND `product_id` = ?";
        return $this->pdo_query($sql,$coupon_id, $product_id);
    }
    public function getAllCouponByProduct(){
        $sql = "SELECT `coupon_product`.`product_id` AS `coupon_product_id` ,`products`.`thumb`,`products`.`id` AS `id`,`products`.`name`, COUNT(`coupon_product`.`id`) AS `total` FROM `coupon_product`
        RIGHT JOIN `products`
        ON `coupon_product`.`product_id` = `products`.`id`
        GROUP BY `coupon_product`.`product_id`, `products`.`id`, `products`.`name`";
        return $this->pdo_query($sql);
    }
    public function getDetailListCouponByProduct($product_id){
        $sql = "SELECT `coupon_product`.`id`, `products`.`name` AS `product_name`, `coupons`.`name` AS `coupon_name`, `coupons`.`code` FROM `coupon_product` 
        JOIN `coupons`
        JOIN `products`
        ON `coupon_product`.`coupon_id` = `coupons`.`id`
        AND `coupon_product`.`product_id` = `products`.`id`
        AND `coupon_product`.`product_id` = ?";
        return $this->pdo_query($sql, $product_id);
    }
    public function insertCouponProduct($coupon_id,$product_id){
        $sql = "INSERT INTO `coupon_product` ( `coupon_id`, `product_id`) VALUES ( ?, ?)";
        return $this->pdo_execute($sql,$coupon_id,$product_id);
    }

    public function deleteCouponProduct($id){
        $sql = "DELETE FROM `coupon_product` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
    }
   
    public function getAll(){
        $sql = "SELECT * FROM `coupons` ORDER BY `coupons`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function insert($type, $code, $name, $discount_amount, $start_date, $end_date, $usage_limit){
        $sql = "INSERT INTO `coupons` ( `type`, `code`, `name`, `discount_amount`, `start_date`, `end_date`, `usage_limit`) VALUES ( ?, ?, ?, ?, ?, ?, ?);";
        return $this->pdo_execute($sql,$type, $code, $name, $discount_amount, $start_date, $end_date, $usage_limit);
    }
    public function check_unique($name){
        $sql = "SELECT * FROM `coupons` WHERE `name`= ?";
        return  $this->pdo_query($sql, $name);
    }
  
    public function getById($id){
        $sql = "SELECT * FROM `coupons` WHERE `id`=?";
        return  $this->pdo_query_one($sql, $id);
    }


    public function update($type,$name, $discount_amount, $start_date, $end_date, $usage_limit, $id){
         $sql = "UPDATE `coupons` SET `type` = ?, `name` = ?, `discount_amount` = ?, `start_date` = ?, `end_date` = ?, `usage_limit` =  ? WHERE `coupons`.`id` = ?";
         return $this->pdo_execute($sql, $type,$name, $discount_amount, $start_date, $end_date, $usage_limit, $id);
    }
    public function delete($id){
        $sql = "DELETE FROM `coupons` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }

}
?>