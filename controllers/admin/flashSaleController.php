<?php

require_once("models/flashSaleModel.php");
require_once("models/productModel.php");

class flashSaleController extends controller{
   private $product;
   private $validate;
   private $flashSale;
   public function __construct(){
     $this->flashSale = new flashSale();
     $this->product = new Product();
     $this->validate =  new request();
   }
   public function index($request, $response){
    $dataItem = $this->flashSale->getAllFlashSale();
   
    return ($this->loadView('admin/flashSale/list', [
        'dataItem' => $dataItem
    ]));
   }
   public function edit($request, $response){
    $item = $this->flashSale->getFlashSaleByID($request[0]['id']);
    //var_dump($item);die();
    return ($this->loadView('admin/flashSale/edit', [
      'item' => $item
    ]));
   }
   public function update($request, $response){
     //var_dump($request);die();
     $end_date = $request['end_date'];
     $start_date = $request['start_date'];
     $start_date = str_replace('T', ' ', $start_date). ":00";
     $end_date = str_replace('T', ' ', $end_date). ":00";
     $discountNew = $request['discount_new'];
     $dataItem = $this->flashSale->getById($request[0]['id']);
     


     $this->validate->rule([
      'discount_new' => 'require',
    ]);
    $this->validate->validate([
       'discount_new.require' => '* Giảm giá không được để trống',
  
    ]);
    $errors = ($this->validate->message());

    if ($start_date > $end_date) {
      $errors['start_date'] = "* Ngày bắt đầu không hợp lệ";
    }
    if($errors){
      $item = $this->flashSale->getFlashSaleByID($request[0]['id']);
        
        return ($this->loadView('admin/flashSale/edit', [
          'item' => $item,
          'errors' => $errors,
        ]));
    }else {
      $this->flashSale->updateDiscountNewByProductId($discountNew, $dataItem['product_id']);
      $this->flashSale->updateDateFlashSaleById($start_date,$end_date, $request[0]['id']);
      $item = $this->flashSale->getFlashSaleByID($request[0]['id']);
        
      return ($this->loadView('admin/flashSale/edit', [
        'item' => $item,
        'status' => '* Cập nhật thành công'
      ]));
    }
     //var_dump($start_date, $end_date);
     // $start_date = '2023-09-14 21:00:00';
     // $today = date('Y-m-d H:i:s');
     // $start_date > $today && 
      // if ($start_date < $end_date) {
      //     $this->flashSale->updateDiscountNewByProductId($discountNew, $dataItem['product_id']);
      //     $this->flashSale->updateDateFlashSaleById($start_date,$end_date, $request[0]['id']);
      //     echo 'success';
      // }else {
      //   $item = $this->flashSale->getFlashSaleByID($request[0]['id']);
        
      //   return ($this->loadView('admin/flashSale/edit', [
      //     'item' => $item,
          
      //   ]));
      // }
   }
   public function add($request, $response){
    $listProduct = $this->product->getAll();
    return ($this->loadView('admin/flashSale/add', [
      'listProduct' => $listProduct
    ]));
   }
   public function create($request, $response){
    // var_dump($request);die();
     $end_date = $request['end_date'];
     $start_date = $request['start_date'];
     $start_date = str_replace('T', ' ', $start_date). ":00";
     $end_date = str_replace('T', ' ', $end_date). ":00";
     $discountNew = $request['discount_new'];
     $product_id = $request['product_id'];
     date_default_timezone_set('Asia/Ho_Chi_Minh');
     $today = date('Y-m-d H:i:s');
     
     $this->validate->rule([
      'discount_new' => 'require',
      'start_date' => 'require',
      'end_date' => 'require'
    ]);
    $this->validate->validate([
       'discount_new.require' => '* Giảm giá không được để trống',
       'start_date.require' => '* Ngày bắt đầu không được để trống',
       'end_date.require' => '* Ngày kết thúc không được để trống',
    ]);
    $errors = ($this->validate->message());
     //var_dump($start_date, $today);
    if ($start_date > $end_date || $start_date < $today) {
      $errors['start_date'] = "* Ngày bắt đầu không hợp lệ";
    }
    if($errors){
      $listProduct = $this->product->getAll();
      return ($this->loadView('admin/flashSale/add', [
        'listProduct' => $listProduct,
        'errors' => $errors,
        'old_field' => $request
      ]));
    }else {
      $dataProduct = $this->product->getById($product_id);
      $this->flashSale->updateDiscountNewByProductId($discountNew, $product_id);
      $this->flashSale->insertFlashSale($product_id, $start_date,  $end_date, $dataProduct['price_sale']);
      header('Location: /admin/flashsale/list');
    }

    
   }
   public function destroy($request, $response){
        foreach($request['arr'] as $key => $value){
          $itemFlashSale = $this->flashSale->getById($value);
          $this->flashSale->updateDiscountNewByProductId($itemFlashSale['discount_old'], $itemFlashSale['product_id']);
          $this->flashSale->delete($value);
        }
       echo json_encode(['status' => 'success']);
   }
   
}