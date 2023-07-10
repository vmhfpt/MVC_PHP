<?php
require_once("models/categoryPostModel.php");
class categoryPostController extends controller{
   private $categoryPost;
   private $validate;
   public function __construct(){
      $this->validate =  new request();
      $this->categoryPost  = new CategoryPost();
   }
   public function add(){
      return ($this->loadView('admin/categoryPost/add'));
   }
   public function index(){
      $listCategories = ($this->categoryPost->getAll());
      return ($this->loadView('admin/categoryPost/list' , ['dataItem' => $listCategories]));
   }
   public function edit($request, $response){
      $slug = ($request[0]['slug']);
      $item = $this->categoryPost->getBySlug($slug);
      return ($this->loadView('admin/categoryPost/edit', [
         'item' => $item
      ]));
   }
   public function create($request, $response){
        $this->validate->rule([
          'name' => 'unique:categoryPost|name|require',
        ]);
        $this->validate->validate([
           'name.unique' => '* Tên đã tồn tại',
           'name.require' => '* Tên danh mục không được để trống',
           'name.name' => '* Tên danh mục phải từ 2 ký tự và không chứa ký tự đặc biệt',
        ]);
        $errors = ($this->validate->message());
        if($errors){
            return ($this->loadView('admin/categoryPost/add', [
               'errors' => $errors,
               'old_field' => $request
            ]));
        }else {
           $this->categoryPost->insert($request['name'], slug($request['name']));
           $listCategories = ($this->categoryPost->getAll());
           return ($this->loadView('admin/categoryPost/list' , [
            'status' => "Thêm thành công danh mục : " . $request['name'], 
            'dataItem' => $listCategories
         ]));
          
        }
   }
   public function update($request, $response){
      $this->validate->rule([
        'name' => 'name|require',
      ]);
      $this->validate->validate([
         'name.require' => '* Tên danh mục không được để trống',
         'name.name' => '* Tên danh mục phải từ 2 ký tự và không chứa ký tự đặc biệt',
      ]);
      $errors = ($this->validate->message());
      if($errors){
         return ($this->loadView('admin/categoryPost/edit', [
            'errors' => $errors,
            'item' => $request
         ]));
     }else {
      try{
         $this->categoryPost->update($request['name'], slug($request['name']), $request[0]['slug']);
         header('Location: /admin/category-post/list');
      }catch(Exception $exc){
         return ($this->loadView('admin/categoryPost/edit', [
            'errors' => ["name" => 'Tên danh mục đã tồn tại'],
            'item' => $request
         ]));
      }
     }
   }
   public function destroy($request, $response){
      try{
         foreach($request['arr'] as $key => $value){
            $this->categoryPost->delete($value);
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