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
        $sql = "SELECT `coupon_product`.`id`, `products`.`name` AS `product_name`, `coupons`.`name` AS `coupon_name` FROM `coupon_product` 
        JOIN `coupons`
        JOIN `products`
        ON `coupon_product`.`coupon_id` = `coupons`.`id`
        AND `coupon_product`.`product_id` = `products`.`id`
        AND `coupon_product`.`product_id` = ?";
        return $this->pdo_query($sql, $product_id);
    }
    public function getDetailListCouponByProductAdmin($product_id){
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
   public function getAllCouponByOrderDetailID($order_id){
      $sql = "SELECT `coupons`.`code`, `coupons`.`name` FROM `order_coupon` 
      INNER JOIN `coupon_product`
      INNER JOIN `coupons`
      ON `order_coupon`.`order_detail_id` IN (SELECT `order_detail`.`id` FROM `order_detail` WHERE `order_detail`.`order_id` = ?)
      AND `order_coupon`.`coupon_product_id` = `coupon_product`.`id`
      AND `coupon_product`.`coupon_id` = `coupons`.`id`;";
      return $this->pdo_query($sql, $order_id);
   }
   public function getAllProductGiftByOrderID($order_id){
     $sql = "SELECT `products`.`name` ,`order_gift`.`id`, COUNT(`products`.`id`) AS `total` FROM `order_gift`
     INNER JOIN `gift`
     INNER JOIN `products`
     ON `order_gift`.`order_detail_id` IN (SELECT `order_detail`.`id` FROM `order_detail` WHERE `order_detail`.`order_id` = ?)
     AND `order_gift`.`gift_id` = `gift`.`id`
     AND `gift`.`gift_product_id` = `products`.`id`
     GROUP BY `products`.`id`";
     return $this->pdo_query($sql, $order_id);
   }

   public function insertCouponUser($user_id, $coupon_id){
     $sql = "INSERT INTO `coupon_user` ( `user_id`, `coupon_product_id`) VALUES ( ?, ?)";
     return $this->pdo_execute($sql, $user_id, $coupon_id);
   }
   public function checkCouponUser($coupon_id, $user_id){
       $sql = "SELECT * FROM `coupon_user`
       INNER JOIN `coupon_product`
       ON `coupon_user`.`coupon_product_id` = `coupon_product`.`id`
       INNER JOIN `coupons`
       ON `coupon_product`.`coupon_id` = `coupons`.`id`
       WHERE `coupons`.`id` = ? 
       AND `coupon_user`.`user_id` = ?";
       return  $this->pdo_query_one($sql, $coupon_id, $user_id);
   }
   public function getCouponUser($coupon_code, $user_id){
    $sql = "SELECT `coupon_user`.`id` FROM `coupon_user`
    INNER JOIN `coupon_product`
    ON `coupon_user`.`coupon_product_id` = `coupon_product`.`id`
    INNER JOIN `coupons`
    ON `coupon_product`.`coupon_id` = `coupons`.`id`
    WHERE `coupons`.`code` = ? 
    AND `coupon_user`.`user_id` = ?";
    return  $this->pdo_query_one($sql, $coupon_code, $user_id);
  }
  public function deleteCouponUser($id){
     $sql = "DELETE FROM `coupon_user` WHERE `id` = ?";
     $this->pdo_execute($sql, $id);
  }
}
?>