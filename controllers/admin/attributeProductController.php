<?php

require_once("models/attributesModel.php");
require_once("models/productModel.php");

require_once("models/typeCategoryModel.php");
require_once("models/attributeProductModel.php");
require_once("models/valueModel.php");

class attributeProductController extends controller{
    private $attributeProduct;
    private $attributeCategory;
    private $validate;
    private $value;
    public function __construct(){
       $this->validate =  new request();
       $this->attributeProduct =  new attributeProduct();
       $this->attributeCategory = new typeCategory();
       $this->value = new Value();
    }
    public function index($request, $response){
        $slug = ($request[0]['slug']);
        $item = ($this->attributeProduct->getProduct($slug));
        $platForm_id = ($item['platform_id']);
        $listAttribute = $this->attributeCategory->getTypeByCategory($platForm_id);
        
       $dataItem = $this->attributeProduct->getAttributeByProduct($item['product_id']);
       return ($this->loadView('admin/attributeProduct/list', [
        'dataItem' => $dataItem, 
        'item' => $item,
        'listAttribute' => $listAttribute
        ]));
        
    }
    public function getValue($request, $response){
       $dataItem = $this->value->getValueByTypeId($request['id']);
       echo json_encode($dataItem);
    }
    public function create($request, $response){
        //var_dump($request);
        $this->validate->rule([
          'type_id' => 'require',
          'value_id' => 'require'
        ]);
        $this->validate->validate([
           'value_id.require' => '* Giá trị biến thể không hợp lệ',
           'type_id.require' => '* Tên biến thể không được để trống',
        ]);
        $errors = ($this->validate->message());
        if($this->attributeProduct->checkUnique($request['product_id'], $request['type_id'], $request['value_id'])){
            $errors['type_id'] = '* Biến thể đã tồn tại';
        }
        if($errors){
            $slug = ($request[0]['slug']);
            $item = ($this->attributeProduct->getProduct($slug));
            $platForm_id = ($item['platform_id']);
            $listAttribute = $this->attributeCategory->getTypeByCategory($platForm_id);
            $dataItem = $this->attributeProduct->getAttributeByProduct($item['product_id']);
            return ($this->loadView('admin/attributeProduct/list', [
                'errors' => $errors,
                'dataItem' => $dataItem, 
                'item' => $item,
                'listAttribute' => $listAttribute
             ]));
            
        }else {
            $slug = ($request[0]['slug']);
            $item = ($this->attributeProduct->getProduct($slug));
            $platForm_id = ($item['platform_id']);
            $listAttribute = $this->attributeCategory->getTypeByCategory($platForm_id);
            
            $this->attributeProduct->create($request['product_id'], $request['type_id'], $request['value_id']);
            $dataItem = $this->attributeProduct->getAttributeByProduct($item['product_id']);
            return ($this->loadView('admin/attributeProduct/list' , [
                'status' => "Thêm biến thể sản phẩm thành công",
                'dataItem' => $dataItem, 
                'item' => $item,
                'listAttribute' => $listAttribute
            ]));
        }
    }
    public function destroy($request, $response){
        try{
            foreach($request['arr'] as $key => $value){
               $this->attributeProduct->delete($value);
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