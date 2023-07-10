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
   public function create($request, $respone){
    $this->validate->rule([
        'name' => 'unique:coupon|require',
        'usage_limit' => 'require',
        'discount_amount' => 'require',
        'start_date' => 'require',
        'end_date' => 'require',
      ]);
      $this->validate->validate([
         'name.require' => '* Tên không được để trống',
         'name.unique' => '* Tên đã tồn tại',
         'usage_limit.require' => '* Số lượng không được để trống',
         'discount_amount.require' => '* Giá ưu đãi không được để trống',
         'start_date.require' => '* Ngày nhập không được để trống',
         'end_date.require' => '* Ngày kết thúc không được để trống'
      ]);
      $errors = ($this->validate->message());
      if($errors){
        return ($this->loadView('admin/coupon/add', [
            'errors' => $errors,
            'old_field' => $request
         ]));
      }else {
         $this->coupon->insert($request['type'], $request['code'], $request['name'], $request['discount_amount'],$request['start_date']  , $request['end_date'], $request['usage_limit']);
         $list = ($this->coupon->getAll());
        return ($this->loadView('admin/coupon/list' , [
            'status' => "Thêm thành công mã giảm giá ",
            'dataItem' => $list 
        ]));
      }
   }
   public function index(){
    $list = ($this->coupon->getAll());
    return ($this->loadView('admin/coupon/list' , [
        'dataItem' => $list 
    ]));
   }
   public function edit($request, $response){
     $id = $request[0]['id'];
     $item = $this->coupon->getById($id);
     return ($this->loadView('admin/coupon/edit', [
        'item' => $item
     ]));
   }
   public function update($request, $response){
    $id = $request[0]['id'];
    $this->validate->rule([
        'name' => 'require',
        'usage_limit' => 'require',
        'discount_amount' => 'require',
        'start_date' => 'require',
        'end_date' => 'require',
      ]);
      $this->validate->validate([
         'name.require' => '* Tên không được để trống',
         'usage_limit.require' => '* Số lượng không được để trống',
         'discount_amount.require' => '* Giá ưu đãi không được để trống',
         'start_date.require' => '* Ngày nhập không được để trống',
         'end_date.require' => '* Ngày kết thúc không được để trống'
      ]);
      $errors = ($this->validate->message());
      if($errors){
        return ($this->loadView('admin/coupon/edit', [
            'errors' => $errors,
            'item' => $request
         ]));
      }else {
        try{
            $this->coupon-> update($request['type'],$request['name'], $request['discount_amount'], $request['start_date'], $request['end_date'], $request['usage_limit'], $id);
            header('Location: /admin/coupon/list');
         }catch(Exception $exc){
            return ($this->loadView('admin/coupon/edit', [
               'errors' => ["name" => 'Tên  đã tồn tại'],
               'item' => $request
            ]));
         }
      }
   }
   public function destroy($request, $response){
    try{
        foreach($request['arr'] as $key => $value){
           $this->coupon->delete($value);
        }
        echo json_encode(['status' => 'success']);
       }catch(Exception $exc){
         echo json_encode([
          'status' => 'error',
          'detal' => $exc
        ]);
       }
   }
}

?>