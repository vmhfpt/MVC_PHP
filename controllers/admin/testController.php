<?php
require_once("models/brandModel.php");
class testController extends controller{
    private $brand;
    public function __construct(){
        $this->brand = new Brand();
    }
    public function test(){
       
     return ($this->loadView('post/demoPaymen'));
    }
    public function createPaypal($request, $response){
        echo json_encode([
            'status' => 'success',
            'id' => 6
        ]);
    }
    public function capturePaypal($request, $response){
        echo json_encode($request);
    }
    
}
?>