<?php
 
 require_once("core/Database.php");
 
class Inventory extends Database{
   public function increateQuantityTempOrder($quantity, $color_id){
     $sql = "UPDATE `inventory` SET `quantity_temp_order` = (`quantity_temp_order` + ?) WHERE `inventory`.`color_id` = ?";
     return $this->pdo_execute($sql, $quantity, $color_id);
   }
   public function decreateQuantityTempOrder($quantity, $color_id){
    $sql = "UPDATE `inventory` SET `quantity_temp_order` = (`quantity_temp_order` - ?) WHERE `inventory`.`color_id` = ?";
    return $this->pdo_execute($sql, $quantity, $color_id);
  }
  public function decreateQuantityInitAndQuantityCurrent($quantity, $color_id){
    $sql = "UPDATE `inventory` SET `quantity_in_inventory` = (`quantity_in_inventory` - ?), `quantity_current` = (`quantity_current` - ?) WHERE `inventory`.`color_id` = ?";
    return $this->pdo_execute($sql, $quantity,$quantity, $color_id);
  }

  public function increateQuantityInitAndQuantityCurrent($quantity, $color_id){
    $sql = "UPDATE `inventory` SET `quantity_in_inventory` = (`quantity_in_inventory` + ?), `quantity_current` = (`quantity_current` + ?) WHERE `inventory`.`color_id` = ?";
    return $this->pdo_execute($sql, $quantity,$quantity, $color_id);
  }
  public function increateQuantityProductError($quantity, $color_id){
    $sql = "UPDATE `inventory` SET `quantity_product_error` = (`quantity_product_error` + ?) WHERE `inventory`.`color_id` = ?";
    return $this->pdo_execute($sql, $quantity, $color_id);
  }
  public function decreateQuantityProductError($quantity, $color_id){
    $sql = "UPDATE `inventory` SET `quantity_product_error` = (`quantity_product_error` - ?) WHERE `inventory`.`color_id` = ?";
    return $this->pdo_execute($sql, $quantity, $color_id);
  }
  public function decreateQuantityInventoryCurrent($quantity, $color_id){
    $sql = "UPDATE `inventory` SET `quantity_current` = (`quantity_current` - ?) WHERE `inventory`.`color_id` = ?";
    return $this->pdo_execute($sql, $quantity, $color_id);
  }
  public function increateQuantityInventoryCurrent($quantity, $color_id){
    $sql = "UPDATE `inventory` SET `quantity_current` = (`quantity_current` + ?) WHERE `inventory`.`color_id` = ?";
    return $this->pdo_execute($sql, $quantity, $color_id);
  }
  public function getInventoryByColorID($color_id){
    $sql = "SELECT `inventory`.`id`, `inventory`.`quantity_current` FROM `inventory` WHERE `color_id` = ?";
    return $this->pdo_query_one($sql,$color_id);
  }
  public function insertInventoryHistory($inventory_id, $quantity_current,$type, $increate, $decreate, $user_id){
    $sql = "INSERT INTO `inventory_history` ( `inventory_id`, `quantity_current`, `type`, `increate`, `decreate`, `createdAt`, `user_id`) VALUES ( ?, ?, ?, ?, ?, current_timestamp(), ?)";
    return $this->pdo_execute($sql,$inventory_id, $quantity_current,$type, $increate, $decreate, $user_id);
  }
  public function getAllInventory(){
     $sql = "SELECT `inventory`.`id`, `inventory`.`quantity_in_inventory`, `inventory`.`quantity_current`, `inventory`.`quantity_temp_order`, `inventory`.`quantity_product_error` , `products`.`name`, `product_color`.`thumb`, `types`.`description`, `values`.`value`, `inventory_address`.`name` AS `address`
     FROM `inventory`
     INNER JOIN `inventory_address`
     ON `inventory`.`address_id` = `inventory_address`.`id`
     INNER JOIN `products`
     ON `inventory`.`product_id` = `products`.`id`
     INNER JOIN `product_color`
     ON `inventory`.`color_id` = `product_color`.`id`
     INNER JOIN `attribute_product`
     ON `product_color`.`attribute_product_id` = `attribute_product`.`id`
     INNER JOIN `types`
     INNER JOIN `values`
     ON `attribute_product`.`type_id` = `types`.`id`
     AND `attribute_product`.`value_id` = `values`.`id`";
     return $this->pdo_query($sql);
  }
  public function getAllAddressInventory(){
     $sql = "SELECT * FROM `inventory_address`";
     return $this->pdo_query($sql);
  }
  public function create($product_id, $color_id, $quantity, $address_id){
     $sql = "INSERT INTO `inventory` ( `product_id`, `color_id`, `quantity_in_inventory`, `quantity_current`, `quantity_temp_order`, `quantity_product_error`, `address_id`) VALUES ( ?, ?, ?, ?, '0', '0', ?)";
     return $this->pdo_query_get_lastId($sql, $product_id, $color_id, $quantity, $quantity, $address_id);
  }
  public function getInventoryByColorProductAndProductId($product_id, $color_id){
    $sql = "SELECT * FROM `inventory` WHERE `product_id` = ? AND `color_id` = ?";
    return $this->pdo_query_one($sql, $product_id, $color_id);
  }
  public function getAllHistoryInventoryByInventoryID($inventory_id){
    $sql = "SELECT `inventory_history`.* , `users`.`name` FROM `inventory_history`
    INNER JOIN `users`
    ON `users`.`id` = `inventory_history`.`user_id`
    WHERE `inventory_history`.`inventory_id` = ?";
    return $this->pdo_query($sql,$inventory_id);
  }
  public function getInventoryByID($inventory_id){
     $sql = "SELECT `product_color`.`thumb`,`values`.`value`, `products`.`name`, `inventory`.*  FROM `inventory`
     INNER JOIN `products`
     ON `inventory`.`product_id` = `products`.`id`
     INNER JOIN `product_color` 
     ON `inventory`.`color_id` = `product_color`.`id`
     INNER JOIN `attribute_product`
     ON `product_color`.`attribute_product_id` = `attribute_product`.`id`
     INNER JOIN `values`
     ON `attribute_product`.`value_id` = `values`.`id`
     WHERE `inventory`.`id` = ?";
     return $this->pdo_query_one($sql, $inventory_id);
  }
}

?>