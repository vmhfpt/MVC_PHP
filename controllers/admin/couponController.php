<?php

require_once("models/couponModel.php");


class couponController extends controller{
   private $coupon;
   private $validate;
   public function __construct(){
     $this->coupon = new Coupon();
     $this->validate =  new request();
   }
   public function add(){
    return ($this->loadView('admin/coupon/add'));
   }
}

?>