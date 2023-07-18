
<?php
 
 require_once("core/Database.php");
 
class Order extends Database{
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
}
?>