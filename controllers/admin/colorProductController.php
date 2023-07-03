<?php
require_once("models/colorProductModel.php");
require_once("models/attributeProductModel.php");
class colorProductController extends controller{
    private $attributeProduct;
    private $colorProduct;
    private $validate;
    public function __construct(){
       $this->attributeProduct =  new attributeProduct();
       $this->colorProduct = new ColorProduct();
       $this->validate = new request();
    }
    public function index($request, $response){
        $attribute_product_id = $request[0]['attribute_id'];
        $item = $this->attributeProduct->getById($attribute_product_id);
        $dataColor = $this->colorProduct->getColorProductByAttributeProductID($attribute_product_id);
        
        
        if($dataColor){
            $dataLibraryColor = $this->colorProduct->getLibraryByColorProductID($dataColor['id']);
            // var_dump($dataColor);die();
            // echo '<br/> <br/>';
            // var_dump($dataLibraryColor);die();
            // echo 'yes';
            return ($this->loadView('admin/colorProduct/edit',
            [
                'item' => $item,
                'dataColor' => $dataColor,
                'dataLibraryColor' => $dataLibraryColor
            ] 
            ));
        }else {
            return ($this->loadView('admin/colorProduct/add',
            [
                'item' => $item] 
            ));
        }

        
    }
    public function create($request, $response){
        $attribute_product_id = $request[0]['attribute_id'];
        isset($request['active']) ? $request['active'] = 0 :  $request['active'] = 1;
        $this->validate->rule([
            'name' => 'unique:product|name|require',
            'price' => 'price|require',
            'price_sale' => 'require',
            'thumb' => 'file:require_file',
            'quantity' => 'require'
          ]);
          $this->validate->validate([
             'price_sale.require' => '* Giảm giá không được để trống',
             'price.price' => '* Đơn giá không hợp lệ',
             'price.require' => '* Đơn giá không được để trống',
             'thumb.file' => '* Cần ít nhất 1 ảnh cho màu sản phẩm',
             'quantity.require' => '* Số lượng không hợp lệ'
          ]);
          $errors = ($this->validate->message());
          $count = count($_FILES['library']['name']);
          if($count < 2) {
            $errors['library'] = "* Cần ít nhất 2 ảnh cho thư viện màu sản phẩm";
          }
          
          if($errors){
             
             $item = $this->attributeProduct->getById($attribute_product_id);
             return ($this->loadView('admin/colorProduct/add', [
                'errors' => $errors,
                'old_field' => $request,
                'item' => $item
             ]));
          }else {
            $image = '';
            if($_FILES['thumb']['size'] != 0) {
               $image = save_file($_FILES['thumb'], UPLOAD_URL_PRODUCT);
            }
            $colorProduct_id = $this->colorProduct->insert($attribute_product_id, $request['price'], $request['price_sale'], $request['active'], $image, $request['quantity']);
            
            foreach ($_FILES['library'] as $key => $values){
                foreach ($values as $index => $value){
                     $files[$index][$key] = $value;
                }
             }

             foreach ($files as $file){
                $thumb = save_file($file, UPLOAD_URL_LIBRARY);
                $this->colorProduct->insertLibraryProduct($colorProduct_id, $thumb);
             }


          }
    }
}