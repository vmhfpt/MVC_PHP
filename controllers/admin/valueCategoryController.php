<?php

require_once("models/categoryModel.php");
require_once("models/attributesModel.php");
require_once("models/typeCategoryModel.php");

class valueCategoryController extends controller{
    private $category;
    private $type;
    private $typeCategory;
    public function __construct(){
       $this->type =  new Attributes();
       $this->category  = new Category();
       $this->typeCategory  = new typeCategory();
    }
    public function add(){
        
        $listCategory = ($this->category->getAllPlatform());
        $listType = $this->type->getAll();
        return ($this->loadView('admin/typeCategory/add', [
            'listCategory' => $listCategory,
            'listType' => $listType
        ]));
    }
    public function create($request, $response){
        if($this->typeCategory->checkUnique($request['category_id'], $request['type_id'])){
            $listCategory = ($this->category->getAllPlatform());
            $listType = $this->type->getAll();
            return ($this->loadView('admin/typeCategory/add', [
                'errors' => ["name" => '* Biến thể đã được thêm'],
                'old_field' => $request,
                'listCategory' => $listCategory,
                'listType' => $listType
             ]));
        }else {
            $listCategory = ($this->category->getAllPlatform());
            $this->typeCategory->insert($request['category_id'], $request['type_id']);
            $list = ($this->typeCategory->getAll());
            return ($this->loadView('admin/typeCategory/list' , ['dataItem' => $list, 'list' => $listCategory, 'status' => "Thêm thành công" ]));
        }
       
    }
    public function index(){
        $listCategory = ($this->category->getAllPlatform());
        $list = ($this->typeCategory->getAll());
        return ($this->loadView('admin/typeCategory/list' , ['dataItem' => $list, 'list' => $listCategory ]));
    }
    public function destroy($request, $response){
        try{
           foreach($request['arr'] as $key => $value){
              $this->typeCategory->delete($value);
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
        $dataItem = $this->typeCategory->getTypeByCategory($request['id']);
        echo json_encode( $dataItem);
    }
}