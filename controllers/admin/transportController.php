<?php

require_once("models/transportModel.php");
require_once("models/addressModel.php");

class transportController extends controller{
   private $transport;
   private $validate;
   private $address;
   public function __construct(){
    $this->address = new Address();
     $this->transport  = new  Transport();
     $this->validate =  new request();
   }
   public function destroy($request, $response){
    try{
        foreach($request['arr'] as $key => $value){
          
           $this->transport->delete($value);
        }
        echo json_encode(['status' => 'success']);
       }catch(Exception $exc){
         echo json_encode([
          'status' => 'error',
          'detal' => $exc
        ]);
       }
   }
   public function insert($request, $response){
    $listCity = $this->address->getAllCity();
    $this->validate->rule([
        'city_id' => 'require',
        'district_id' => 'require',
        'ward_id' => 'require',
        'ship' => 'require'
       
    ]);
    $this->validate->validate([
       'city_id.require' => '* Tỉnh, thành phố không được để trống',
       'district_id.require' => '* Quận , huyện không được để trống',
       'ward_id.require' => '* Xã, phường không được để trống',
       'ship.require' => '* Phí vận chuyển không được để trống',
    ]);
    $errors = ($this->validate->message());
    if($this->transport->checkUnique($request['city_id'], $request['district_id'], $request['ward_id'])){
        $errors['city_id'] = '* Phí vận chuyển đã tồn tại';
    }
    if($errors){
       $dataItem = $this->transport->getAll();
        return ($this->loadView('admin/transportFee/list', [
            'errors' => $errors,
            'item' => $request,
            'dataItem' => $dataItem,
            'listCity' => $listCity 
         ]));
    }else {
        $this->transport->insert($request['district_id'], $request['ward_id'], $request['city_id'], $request['ship']);
        $dataItem = $this->transport->getAll();
        return ($this->loadView('admin/transportFee/list', [
            'dataItem' => $dataItem,
            'listCity' => $listCity ,
            'status' => ' Thêm phí vận chuyển thành công'
         ]));
    }
   }
   public function index(){
     $dataItem = $this->transport->getAll();
     $listCity = $this->address->getAllCity();
     return ($this->loadView('admin/transportFee/list' , [
        'dataItem' => $dataItem,
        'listCity' => $listCity 
     ]));
   }

   public function getAllDistrictByCity($request, $response){
       $dataItem = $this->address->getAllDistrictByCityId($request['city_id']);
       echo json_encode($dataItem);
   }
   public function getAllWardByDistrict($request, $response){
    $dataItem = $this->address->getAllWardByDistrictID($request['district_id']);
    echo json_encode($dataItem);
}
}

?>