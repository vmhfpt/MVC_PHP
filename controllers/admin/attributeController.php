<?php

require_once("models/attributesModel.php");


class attributeController extends controller{
    private $attribute;
    private $validate;
    public function __construct(){
        $this->attribute  = new Attributes();
        $this->validate =  new request();
    } 
    public function add(){
        return ($this->loadView('admin/attribute/add'));
    }
    public function create($request, $response){
        $this->validate->rule([
            'name' => 'unique:attributes|name|require',
            'description' => 'name|require'
          ]);
          $this->validate->validate([
             'name.unique' => '* Tên đã tồn tại',
             'name.require' => '* Tên biến thể không được để trống',
             'name.name' => '* Tên biến thể phải từ 2 ký tự và không chứa ký tự đặc biệt',
             'description.require' => '* Mô tả không được để trống',
             'description.name' => '* Mô tả phải từ 2 ký tự và không chứa ký tự đặc biệt'
          ]);
          $errors = ($this->validate->message());
          if($errors){
            return ($this->loadView('admin/attribute/add', [
                'errors' => $errors,
                'old_field' => $request
             ]));
          }else {
            $this->attribute->insert($request['name'], $request['description']);
            $list = ($this->attribute->getAll());
            return ($this->loadView('admin/attribute/list' , [
             'status' => "Thêm thành công biến thể : " . $request['name'],
             'dataItem' => $list 
          ]));
          }
    }
    public function index(){
        $dataItem = $this->attribute->getAll();
        return ($this->loadView('admin/attribute/list', ['dataItem' => $dataItem]));
    }
    public function edit($request, $response){
        $id = ($request[0]['id']);
        $item = $this->attribute->getById($id);
        return ($this->loadView('admin/attribute/edit', [
           'item' => $item
        ]));
    }
    public function update($request, $response){
        $this->validate->rule([
            'name' => 'name|require',
            'description' => 'name|require'
          ]);
          $this->validate->validate([
             'name.require' => '* Tên biến thể không được để trống',
             'name.name' => '* Tên biến thể phải từ 2 ký tự và không chứa ký tự đặc biệt',
             'description.require' => '* Mô tả không được để trống',
             'description.name' => '* Mô tả phải từ 2 ký tự và không chứa ký tự đặc biệt'
          ]);
        $errors = ($this->validate->message());
        if($errors){
           return ($this->loadView('admin/attribute/edit', [
              'errors' => $errors,
              'item' => $request
           ]));
       }else {
        try{
           $this->attribute->update($request['name'], $request['description'], $request[0]['id']);
           header('Location: /admin/attribute/list');
        }catch(Exception $exc){
           return ($this->loadView('admin/attribute/edit', [
              'errors' => ["name" => 'Tên biến thể đã tồn tại'],
              'item' => $request
           ]));
        }
       }
    }
    public function destroy($request, $response){
        try{
            foreach($request['arr'] as $key => $value){
               $this->attribute->delete($value);
            }
            echo json_encode(['status' => 'success']);
           }catch(Exception $exc){
             echo json_encode([
              'status' => 'error',
              'detal' => $exc
            ]);
           }
    }
    public function getList($request, $response){
       $dataItem = $this->attribute->getValueByType($request['id']);
       echo json_encode( $dataItem);
    }
}

?>