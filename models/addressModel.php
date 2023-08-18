<?php
 
 require_once("core/Database.php");
 
class Address extends Database{
    public function getAllCity(){
        $sql = "SELECT * FROM `devvn_tinhthanhpho`";
        return $this->pdo_query($sql);
    }
    public function getAllDistrictByCityId($city_id){
        $sql = "SELECT * FROM `devvn_quanhuyen` WHERE `matp` = ?";
        return $this->pdo_query($sql, $city_id);
    }
    public function getAllWardByDistrictID($district_id){
        $sql = "SELECT * FROM `devvn_xaphuongthitran` WHERE `maqh` = ?";
        return $this->pdo_query($sql, $district_id);

    }
    public function getTransportFee($city_id, $district_id, $ward_id){
        $sql = "SELECT * FROM `transport_fee` WHERE `district_id` = ? AND `ward_id` = ? AND `city_id` = ?";
        return  $this->pdo_query_one($sql, $district_id, $ward_id, $city_id);
    }
    public function checkCoupon($code, $date){
        $sql = "SELECT * FROM `coupons` WHERE `code` = ? AND `end_date` >= ?";
        return  $this->pdo_query_one($sql, $code, $date);
    }
    public function addressSelectall($city_id, $district_id, $ward_id){
        $sql= "SELECT `devvn_tinhthanhpho`.`name` as `city`, `devvn_quanhuyen`.`name` as `district`, `devvn_xaphuongthitran`.`name` as `aware` FROM `devvn_tinhthanhpho`, `devvn_quanhuyen`, `devvn_xaphuongthitran` WHERE `devvn_tinhthanhpho`.`matp` =  ? AND `devvn_quanhuyen`.`maqh` = ? AND `devvn_xaphuongthitran`.`xaid` = ?";
        return ($this->pdo_query_one($sql, $city_id, $district_id, $ward_id));
    }
    
   
}