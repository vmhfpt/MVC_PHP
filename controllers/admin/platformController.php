<?php
require_once("models/categoryModel.php");
class platformController extends controller{
    private $category;
    private $validate;
   public function __construct(){
      $this->validate =  new request();
      $this->category  = new Category();
   }
    public function index(){
        $listCategories = ($this->category->getAllPlatform());
        return ($this->loadView('admin/platform/list' , ['dataItem' => $listCategories]));
    }
    public function edit($request, $response){
        $slug = ($request[0]['slug']);
        $item = $this->category->getBySlug($slug);
        return ($this->loadView('admin/platform/edit', [
           'item' => $item
        ]));
    }
    public function update($request, $response){
        $this->validate->passField($request);
        $this->validate->rule([
          'name' => 'name|require',
        ]);
        $this->validate->validate([
           'name.require' => '* Tên nền tảng không được để trống',
           'name.name' => '* Tên nền tảng phải từ 2 ký tự và không chứa ký tự đặc biệt',
        ]);
        $errors = ($this->validate->message());
        if($errors){
           return ($this->loadView('admin/platform/edit', [
              'errors' => $errors,
              'item' => $request
           ]));
       }else {
        try{
           $this->category->updatePlatform($request['name'],slug($request['name']),  $request[0]['slug']);
           header('Location: /admin/platform/list');
        }catch(Exception $exc){
           return ($this->loadView('admin/platform/edit', [
              'errors' => ["name" => 'Tên nền tảng đã tồn tại'],
              'item' => $request
           ]));
        }
       }
    }
}
?>