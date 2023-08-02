<?php
require_once("models/brandModel.php");
class testController extends controller{
    private $brand;
    public function __construct(){
        $this->brand = new Brand();
    }
    public function test(){
       $id = $this->brand->testUpdate("Sony", 2);
       var_dump($id);
    //  return ($this->loadView('post/chat'));
    }
    
}
?>