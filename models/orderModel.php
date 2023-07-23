
<?php
 
 require_once("core/Database.php");
 
class Order extends Database{

    public function changeActiveOrder($active, $order_id){
         $sql = "UPDATE `order` SET `active` = ? WHERE `order`.`id` = ?";
         return $this->pdo_execute($sql,$active, $order_id);
    }
    public function addContentActiveOrder($active, $content, $user_id, $order_id){
        $sql = "INSERT INTO `status_active` ( `active`, `content`, `user_id`, `order_id`, `createdAt`, `updatedAt`) VALUES ( ?, ?,  ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000')";
        return $this->pdo_execute($sql, $active, $content, $user_id, $order_id);
    }


    public function getAllOrder(){
        $sql = "SELECT `order`.*, `coupons`.`name`AS `coupon_name` FROM `order`
        LEFT JOIN `coupons`
        ON `order`.`coupon_code` = `coupons`.`code` ORDER BY `order`.`id` DESC";
        return $this->pdo_query($sql);
    }
    public function getOrderAndCouponById($order_id){
        $sql = "SELECT `order`.*, `coupons`.`name`AS `coupon_name` FROM `order`
        LEFT JOIN `coupons`
        ON `order`.`coupon_code` = `coupons`.`code`
        WHERE `order`.`id` = ?";
        return $this->pdo_query_one($sql, $order_id);
    }
    public function updateTransportFeeAndAddress($transport_fee, $address_detail, $order_id){
        $sql = "UPDATE `order` SET `total` = ((total - transport_fee) + ? ) ,`transport_fee` = ? , `address_detail` = ? WHERE `order`.`id` = ?";
        return $this->pdo_execute($sql,$transport_fee, $transport_fee, $address_detail, $order_id);
    }
    public function updateNameOrder($name, $order_id){
        $sql = "UPDATE `order` SET `name` =  ? WHERE `order`.`id` = ?";
        return $this->pdo_execute($sql,$name, $order_id);
    }
    public function updatePhoneNumber($phone, $order_id){
        $sql = "UPDATE `order` SET `phone_number` = ? WHERE `order`.`id` = ?";
        return $this->pdo_execute($sql,$phone, $order_id);
    }

    public function getStateActionOrder($order_id){
        $sql = "SELECT `status_active`.*, `users`.`name` FROM `status_active`
        INNER JOIN `users`
        ON `status_active`.`user_id` = `users`.`id`
        AND `order_id` = ?
        ORDER BY `status_active`.`active` DESC";
        return $this->pdo_query($sql, $order_id);
    }


    public function insertAndGetLastId($code, $user_id, $transportFee, $couponCode_id, $note, $email, $name, $phoneNumber, $address, $total, $active){
        $sql = "INSERT INTO `order` ( `CODE`, `user_id`, `transport_fee`, `coupon_code`, `note`, `email`, `name`, `phone_number`, `address_detail`, `total`, `active`, `createdAt`, `updatedAt`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp() , '0000-00-00 00:00:00.000000');";
        return $this->pdo_query_get_lastId($sql,$code, $user_id, $transportFee, $couponCode_id, $note, $email, $name, $phoneNumber, $address, (int) $total, $active);
    }
    public function insertOrderDetailAndGetLastID($order_id, $product_id, $total, $quantity){
        $sql = "INSERT INTO `order_detail` (`order_id`, `product_id`, `total`, `quantity`, `createdAt`, `updatedAt`) VALUES ( ?, ?, ?, ?, current_timestamp(), '0000-00-00 00:00:00.000000');";
        return $this->pdo_query_get_lastId($sql,$order_id, $product_id, $total, $quantity);
    }
    public function insertOrderAttributeProduct($order_detail_id, $attribute_price_id){
        $sql = "INSERT INTO `order_attribute_product` (`order_detail_id`, `attribute_price_id`) VALUES (?, ?)";
        return $this->pdo_execute($sql, $order_detail_id, $attribute_price_id);
    }
    public function insertOrderCoupon($order_detail_id, $coupon_product_id){
        $sql = "INSERT INTO `order_coupon` (`order_detail_id`, `coupon_product_id`) VALUES (?, ?);";
        return $this->pdo_execute($sql, $order_detail_id, $coupon_product_id);
    }
    public function insertOrderGift($order_detail_id, $gift_id){
        $sql = "INSERT INTO `order_gift` (`order_detail_id`, `gift_id`) VALUES (?, ?)";
        return $this->pdo_execute($sql, $order_detail_id, $gift_id);
    }
    public function getOrderById($orderId){
        $sql = "SELECT * FROM `order` WHERE `id` = ?";
        return  $this->pdo_query_one($sql, $orderId);
    }
    public function getOrderDetainById($orderDetailId){
        $sql = "SELECT * FROM `order_detail` WHERE `id` = ?";
        return  $this->pdo_query_one($sql, $orderDetailId);
    }
    public function getAllOrderDetailByOrderID($order_id){
         $sql = "SELECT  `products`.`id` AS `product_id`, `product_color`.`id` AS `product_color_id`,(`products`.`price` - (`products`.`price` * `products`.`price_sale`)) AS `init_price` , `order_detail`.`id`, `products`.`name`,`types`.`description`, `values`.`value`, `product_color`.`price`, `product_color`.`price_sale`, `product_color`.`thumb`, `order_detail`.`total`, `order_detail`.`quantity`

         FROM `order_detail`
         INNER JOIN `order`
         INNER JOIN `product_color`
         ON `order_detail`.`order_id` = `order`.`id`
         AND `order_detail`.`product_id` = `product_color`.`id`
         INNER JOIN `attribute_product` 
         ON `product_color`.`attribute_product_id` = `attribute_product`.`id`
         INNER JOIN `products`
         ON `attribute_product`.`product_id` = `products`.`id`
         INNER JOIN `values`
         INNER JOIN `types`
         ON `attribute_product`.`type_id` = `types`.`id`
         AND `attribute_product`.`value_id` = `values`.`id`
         AND `order_detail`.`order_id` = ?";
         return $this->pdo_query($sql, $order_id);
    }
    public function getAllOrderDetailByOrderCode($order_code){
        $sql = "SELECT (`products`.`price` - (`products`.`price` * `products`.`price_sale`)) AS `init_price` , `order_detail`.`id`, `products`.`name`,`types`.`description`, `values`.`value`, `product_color`.`price`, `product_color`.`price_sale`, `product_color`.`thumb`, `order_detail`.`total`, `order_detail`.`quantity`

        FROM `order_detail`
        INNER JOIN `order`
        ON `order`.`CODE` = ?
        INNER JOIN `product_color`
        ON `order_detail`.`order_id` = `order`.`id`
        AND `order_detail`.`product_id` = `product_color`.`id`
        INNER JOIN `attribute_product` 
        ON `product_color`.`attribute_product_id` = `attribute_product`.`id`
        INNER JOIN `products`
        ON `attribute_product`.`product_id` = `products`.`id`
        INNER JOIN `values`
        INNER JOIN `types`
        ON `attribute_product`.`type_id` = `types`.`id`
        AND `attribute_product`.`value_id` = `values`.`id`";
        
        return $this->pdo_query($sql, $order_code);
   }
   public function getOrderByCode($code){
     $sql = "SELECT * FROM `order` WHERE `CODE` = ?";
     return  $this->pdo_query_one($sql, $code);

   }
   public function getAttributePriceInOrderCurrent($order_detail_id){
     $sql = "SELECT `types`.`id` AS `type_id`,`order_attribute_product`.`id` AS `order_attribute_product_id`, `attribute_price`.`id` AS `attribute_price_id`, `attribute_product`.`id` AS `attribute_product_id`, `types`.`description`, `values`.`value`
     FROM `order_attribute_product` 
     
     INNER JOIN `attribute_price`
     ON `attribute_price`.`id` = `order_attribute_product`.`attribute_price_id`
     INNER JOIN `attribute_product`
     ON `attribute_price`.`attribute_product_id` = `attribute_product`.`id`
     INNER JOIN `types`
     INNER JOIN `values`
     ON `attribute_product`.`type_id` = `types`.`id`
     AND `attribute_product`.`value_id` = `values`.`id`
     WHERE `order_attribute_product`.`order_detail_id` = ?";
      return $this->pdo_query($sql, $order_detail_id);
   }
   public function getColorProductCurrentInOrderDetail($order_detail){
     $sql = "SELECT  `order_detail`.`quantity`, `products`.`name` AS `product_name`,`order_detail`.`id` AS `order_detail_id`, `product_color`.`id` AS `product_color_id`, `attribute_product`.`id` AS `attribute_product_id`, `values`.`value`, `types`.`description`, `order`.`id` AS `order_id`, `order`.`name`, `order`.`CODE`
     FROM `order_detail` 
     INNER JOIN `order`
     ON `order_detail`.`order_id` = `order`.`id`
     INNER JOIN `product_color`
     ON `order_detail`.`product_id` = `product_color`.`id`
     INNER JOIN `attribute_product`
     ON `attribute_product`.`id` = `product_color`.`attribute_product_id`
     INNER JOIN `types`
     INNER JOIN `values`
     INNER JOIN `products`
     ON `attribute_product`.`type_id` = `types`.`id`
     AND `attribute_product`.`value_id` = `values`.`id`
     AND `attribute_product`.`product_id` = `products`.`id`
     WHERE `order_detail`.`id` = ?";
     return  $this->pdo_query_one($sql, $order_detail);
   }
   public function updateTotalOrder($total, $order_id){
     $sql = "UPDATE `order` SET `total` = ? WHERE `order`.`id` = ?";
     return $this->pdo_execute($sql,$total, $order_id);
   }
   public function updateTotalOrderWhenDeleteOrderDetail($total, $order_id){
    $sql = "UPDATE `order` SET `total` = (`total` - ?) WHERE `order`.`id` = ?";
    return $this->pdo_execute($sql,$total, $order_id);
  }
  public function updateTotalIncreateOrderWhenDeleteOrderDetail($total, $order_id){
    $sql = "UPDATE `order` SET `total` = (`total` + ?) WHERE `order`.`id` = ?";
    return $this->pdo_execute($sql,$total, $order_id);
  }

   public function updateTotalOrderDetail($color_product_id, $total,$quantity, $order_detail_id){
      $sql = "UPDATE `order_detail` SET `product_id` = ?, `total` = ?, `quantity` = ? WHERE `order_detail`.`id` = ?";
      return $this->pdo_execute($sql,$color_product_id, $total,$quantity, $order_detail_id);
   }
   public function deleteOrderAttributeProduct($order_detail_id){
     $sql = "DELETE FROM `order_attribute_product` WHERE `order_detail_id` = ?";
     $this->pdo_execute($sql, $order_detail_id);
   }

   public function deleteOrderDetail($orderDetailId){
     $sql = "DELETE FROM `order_detail` WHERE `id` = ?";
     $this->pdo_execute($sql, $orderDetailId);
   }
    
}
?>