<?php
require_once("models/brandModel.php");
class testController extends controller{
  private $brand;
  private $validate;
  public function __construct(){
    $this->brand  = new Brand();
  }
    public function test(){
       $dataItem = $this->brand->getAll();
       foreach($dataItem as $key => $value){
        var_dump($value); echo "<br/>-------<br/>";
       }
    }
}
?>