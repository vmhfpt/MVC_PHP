<?php
 
 require_once("core/Database.php");
 
class Transport extends Database{
    
    public function checkUnique($city_id, $district_id, $ward_id){
        $sql = "SELECT * FROM `transport_fee` WHERE `district_id` = ? AND `ward_id` = ? AND `city_id` = ?";
        return $this->pdo_query($sql, $district_id, $ward_id, $city_id);
    }
    public function getAll(){
        $sql = "SELECT `transport_fee`.`id`, `devvn_tinhthanhpho`.`name` AS `name_city`, `devvn_quanhuyen`.`name` AS `name_district`,`devvn_xaphuongthitran`.`name` AS `name_ward`, `transport_fee`.`ship`  FROM `transport_fee` 
        JOIN `devvn_xaphuongthitran`
        JOIN `devvn_quanhuyen`
        JOIN `devvn_tinhthanhpho`
        ON `transport_fee`.`city_id` = `devvn_tinhthanhpho`.`matp`
        AND `transport_fee`.`district_id` = `devvn_quanhuyen`.`maqh`
        AND `transport_fee`.`ward_id` = `devvn_xaphuongthitran`.`xaid`";
        return $this->pdo_query($sql);
    }
   
   public function insert($district_id, $ward_id, $city_id, $ship){
     $sql = "INSERT INTO `transport_fee` ( `district_id`, `ward_id`, `city_id`, `ship`) VALUES ( ?, ?, ?, ?);";
     return $this->pdo_execute($sql, $district_id, $ward_id, $city_id, $ship);
   }
    public function delete($id){
        $sql = "DELETE FROM `transport_fee` WHERE `id` = ?";
        $this->pdo_execute($sql, $id);
   }
   public function getTransportFee($city_id, $district_id, $ward_id){
    $sql = "SELECT * FROM `transport_fee` WHERE `district_id` = ? AND `ward_id` = ? AND `city_id` = ?";
    return $this->pdo_query_one($sql, $district_id, $ward_id, $city_id);
}

}
?>