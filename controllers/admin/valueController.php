<?php

require_once("models/valueModel.php");
require_once("models/attributesModel.php");

class valueController extends controller{
    private $value;
    private $attribute;
    private $validate;
    public function __construct(){
        $this->value  = new Value();
        $this->validate =  new request();
        $this->attribute =  new Attributes();
    } 
    public function add(){
        $listAttributes = ($this->attribute->getAll());
        return ($this->loadView('admin/value/add', ['list' => $listAttributes]));
    }
    public function create($request, $response){
        $this->validate->rule([
            'value' => 'name|require',
          ]);
          $this->validate->validate([
             'value.require' => '* Giá trị không được để trống',
             'value.name' => '* Giá trị phải từ 2 ký tự và không chứa ký tự đặc biệt',
          ]);
          $errors = ($this->validate->message());
          if($errors){
            $listAttributes = ($this->attribute->getAll());
            return ($this->loadView('admin/value/add', [
               'list' => $listAttributes,
               'errors' => $errors,
               'old_field' => $request
            ]));
          }else {
             $this->value->insert($request['type_id'], $request['value']);
             $listValue = ($this->value->getAll());
             $listAttributes = ($this->attribute->getAll());
                return ($this->loadView('admin/value/list' , [
                        'status' => "Thêm thành công giá trị : " . $request['value'], 
                        'dataItem' => $listValue,
                        'list' => $listAttributes
                ]));
          }
    }
    public function index(){
        $listValue = ($this->value->getAll());
        $listAttributes = ($this->attribute->getAll());
        return ($this->loadView('admin/value/list' , [
                'dataItem' => $listValue,
                'list' => $listAttributes
        ]));
    }
    public function edit($request, $response){
       $id = $request[0]['id'];
       $item =  $this->value->getById($id);
       $listAttributes = ($this->attribute->getAll());
       return ($this->loadView('admin/value/edit', [
          'list' => $listAttributes,
          'item' => $item
       ]));
    }
    public function update($request, $response){
        $this->validate->rule([
            'value' => 'name|require',
          ]);
          $this->validate->validate([
             'value.require' => '* Giá trị không được để trống',
             'value.name' => '* Giá trị phải từ 2 ký tự và không chứa ký tự đặc biệt',
          ]);
          $errors = ($this->validate->message());
          if($errors){
            $listAttributes = ($this->attribute->getAll());
            return ($this->loadView('admin/value/edit', [
               'list' => $listAttributes,
               'errors' => $errors,
               'item' => $request
            ]));
          }else {
             $this->value->update($request['value'], $request['type_id'], $request[0]['id']);
             header('Location: /admin/value/list');
          }
    }
    public function destroy($request, $response){
      try{
         foreach($request['arr'] as $key => $value){
            $this->value->delete($value);
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