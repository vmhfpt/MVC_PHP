

<?php
 
 require_once("core/Database.php");
 
class flashSale extends Database{
    public function getFlashSaleByProduct($product_id){
        $sql = "SELECT `flash_sales`.*, `products`.`price_sale` AS `discount_new` , `products`.`price` FROM `flash_sales` 
        INNER JOIN `products`
        ON `products`.`id` = `flash_sales`.`product_id`
        WHERE `flash_sales`.`product_id` = ?
        AND current_timestamp() < `flash_sales`.`end_date`";
        return  $this->pdo_query_one($sql, $product_id);
    }
    public function getAllFlashSale(){
        $sql = "SELECT `flash_sales`.*, `products`.`price_sale` AS `discount_new` , `products`.`price` , `products`.`name`, `products`.`thumb`
        FROM `flash_sales` 
        INNER JOIN `products`
        ON `products`.`id` = `flash_sales`.`product_id`";
        return  $this->pdo_query($sql);
    }
    public function getFlashSaleByID($product_id){
        $sql = "SELECT `flash_sales`.*, `products`.`price_sale` AS `discount_new` , `products`.`price`, `products`.`name`, `products`.`thumb` FROM `flash_sales` 
        INNER JOIN `products`
        ON `products`.`id` = `flash_sales`.`product_id`
        WHERE `flash_sales`.`id` = ?";
        return  $this->pdo_query_one($sql, $product_id);
    }
    public function getById($id){
        $sql = "SELECT * FROM `flash_sales` WHERE `id` = ?";
        return  $this->pdo_query_one($sql, $id);
    }
    public function updateDiscountNewByProductId($discountNew, $product_id){
        $sql = "UPDATE `products` SET `price_sale` = ? WHERE `products`.`id` = ?";
        return $this->pdo_execute($sql,$discountNew, $product_id);
    }
    public function updateDateFlashSaleById($start_date, $end_date, $flashSaleID){
        $sql = "UPDATE `flash_sales` SET `start_date` = ?, `end_date` = ? WHERE `flash_sales`.`id` = ?";
        return $this->pdo_execute($sql,$start_date, $end_date, $flashSaleID);
    }
    public function insertFlashSale($product_id, $start_date, $end_date, $discount_old){
        $sql = "INSERT INTO `flash_sales` ( `product_id`, `start_date`, `end_date`, `discount_old`) VALUES ( ?, ?, ?, ?)";
        return $this->pdo_execute($sql,$product_id, $start_date, $end_date, $discount_old);
    }
    public function delete($id){
        $sql = "DELETE FROM `flash_sales` WHERE `id` = ? ";
        return $this->pdo_execute($sql, $id);
    }
}

?>