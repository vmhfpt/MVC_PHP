<?php
require_once("models/categoryModel.php");
class categoryController extends controller{
   private $category;
   private $validate;
   public function __construct(){
      $this->validate =  new request();
      $this->category  = new Category();
   }
   public function add(){
      $listCategories = ($this->category->getAll());
      return ($this->loadView('admin/category/add', ['list' => $listCategories]));
   }
   public function index(){
      $listCategories = ($this->category->getCategory());
      return ($this->loadView('admin/category/list' , ['dataItem' => $listCategories]));
   }
   public function edit($request, $response){
      $slug = ($request[0]['slug']);
      $item = $this->category->getBySlug($slug);
      $listCategories = ($this->category->getAll());
      return ($this->loadView('admin/category/edit', [
         'item' => $item,
         'list' => $listCategories
      ]));
   }
   public function create($request, $response){
        $this->validate->passField($request);
        $this->validate->rule([
          'name' => 'unique:category|name|require',
        ]);
        $this->validate->validate([
           'name.unique' => '* Tên đã tồn tại',
           'name.require' => '* Tên danh mục không được để trống',
           'name.name' => '* Tên danh mục phải từ 2 ký tự và không chứa ký tự đặc biệt',
        ]);
        $errors = ($this->validate->message());
        if($errors){
            $listCategories = ($this->category->getAll());
            return ($this->loadView('admin/category/add', [
               'list' => $listCategories,
               'errors' => $errors,
               'old_field' => $request
            ]));
        }else {
           $this->category->insert($request['name'], $request['category'], slug($request['name']));
           $listCategories = ($this->category->getCategory());
           return ($this->loadView('admin/category/list' , [
            'status' => "Thêm thành công danh mục : " . $request['name'], 
            'dataItem' => $listCategories
         ]));
          
        }
   }
   public function update($request, $response){
      $this->validate->passField($request);
      $this->validate->rule([
        'name' => 'name|require',
      ]);
      $this->validate->validate([
         'name.require' => '* Tên danh mục không được để trống',
         'name.name' => '* Tên danh mục phải từ 2 ký tự và không chứa ký tự đặc biệt',
      ]);
      $errors = ($this->validate->message());
      if($errors){
          $listCategories = ($this->category->getAll());
         return ($this->loadView('admin/category/edit', [
            'list' => $listCategories,
            'errors' => $errors,
            'item' => $request
         ]));
     }else {
      try{
         $this->category->update($request['name'], $request['parent_id'],slug($request['name']), $request[0]['slug']);
         header('Location: /admin/category/list');
      }catch(Exception $exc){
         $listCategories = ($this->category->getAll());
         return ($this->loadView('admin/category/edit', [
            'list' => $listCategories,
            'errors' => ["name" => 'Tên danh mục đã tồn tại'],
            'item' => $request
         ]));
      }
     }
   }
   public function destroy($request, $response){
      try{
         foreach($request['arr'] as $key => $value){
            $this->category->delete($value);
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