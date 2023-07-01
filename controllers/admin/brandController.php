<?php

require_once("models/brandModel.php");


class brandController extends controller{
   private $brand;
   private $validate;
   public function __construct(){
     $this->brand  = new Brand();
     $this->validate =  new request();
   }
   public function add(){
     return ($this->loadView('admin/brand/add'));
   }
   public function create($request, $response){
    $this->validate->passField($request);
    $this->validate->rule([
      'name' => 'unique:brand|name|require',
    ]);
    $this->validate->validate([
       'name.unique' => '* Tên đã tồn tại',
       'name.require' => '* Tên thương hiệu không được để trống',
       'name.name' => '* Tên thương hiệu phải từ 2 ký tự và không chứa ký tự đặc biệt',
    ]);
    $errors = ($this->validate->message());
    if($errors){
        return ($this->loadView('admin/brand/add', [
           'errors' => $errors,
           'old_field' => $request
        ]));
    }else {
       $this->brand->insert($request['name']);
       $list = ($this->brand->getAll());
       return ($this->loadView('admin/brand/list' , [
        'status' => "Thêm thành công thương hiệu : " . $request['name'],
        'dataItem' => $list 
     ]));
      
    }
   }
   public function index(){
    $list = ($this->brand->getAll());
    return ($this->loadView('admin/brand/list' , ['dataItem' => $list]));
   }
   public function edit($request, $response){
        $id = ($request[0]['id']);
        $item = $this->brand->getById($id);
        return ($this->loadView('admin/brand/edit', [
           'item' => $item
        ]));
   }
   public function update($request, $response){
    $this->validate->passField($request);
    $this->validate->rule([
      'name' => 'name|require',
    ]);
    $this->validate->validate([
       'name.require' => '* Tên thương hiệu không được để trống',
       'name.name' => '* Tên thương hiệu phải từ 2 ký tự và không chứa ký tự đặc biệt',
    ]);
    $errors = ($this->validate->message());
    if($errors){
       return ($this->loadView('admin/brand/edit', [
          'errors' => $errors,
          'item' => $request
       ]));
   }else {
    try{
       $this->brand->update($request['name'], $request[0]['id']);
       header('Location: /admin/brand/list');
    }catch(Exception $exc){
       return ($this->loadView('admin/brand/edit', [
          'errors' => ["name" => 'Tên thương hiệu đã tồn tại'],
          'item' => $request
       ]));
    }
   }
   }

   public function destroy($request, $response){
    try{
      foreach($request['arr'] as $key => $value){
         $this->brand->delete($value);
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