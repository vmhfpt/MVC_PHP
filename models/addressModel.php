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
}