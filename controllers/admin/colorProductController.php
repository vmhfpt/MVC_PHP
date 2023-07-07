<?php
require_once("models/colorProductModel.php");
require_once("models/productModel.php");
require_once("models/attributeProductModel.php");
class colorProductController extends controller{
    private $attributeProduct;
    private $colorProduct;
    private $validate;
    private $product;
    public function __construct(){
       $this->product = new Product();
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
            'price' => 'require',
            'price_sale' => 'require',
            'thumb' => 'file:require_file',
            'quantity' => 'require'
          ]);
          $this->validate->validate([
             'price_sale.require' => '* Giảm giá không được để trống',
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
             $item = $this->attributeProduct->getById($attribute_product_id);
             $dataColor = $this->colorProduct->getColorProductByAttributeProductID($attribute_product_id);
             $dataLibraryColor = $this->colorProduct->getLibraryByColorProductID($dataColor['id']);
             return ($this->loadView('admin/colorProduct/edit',
             [
                'status' => ' Thêm thành công',
                 'item' => $item,
                 'dataColor' => $dataColor,
                 'dataLibraryColor' => $dataLibraryColor
             ] 
             ));
          }
    }
    public function update($request, $response){
        $attribute_product_id = $request[0]['attribute_id'];
        isset($request['active']) ? $request['active'] = 0 :  $request['active'] = 1;
        $this->validate->rule([
            'name' => 'unique:product|name|require',
            'price' => 'require',
            'price_sale' => 'require',
            'thumb' => 'file:validate_file',
            'quantity' => 'require'
          ]);
          $this->validate->validate([
             'price_sale.require' => '* Giảm giá không được để trống',
             'price.require' => '* Đơn giá không được để trống',
             'quantity.require' => '* Số lượng không hợp lệ'
          ]);
          $errors = ($this->validate->message());
          if($errors){
            $attribute_product_id = $request[0]['attribute_id'];
            $item = $this->attributeProduct->getById($attribute_product_id);
            $dataColor = $this->colorProduct->getColorProductByAttributeProductID($attribute_product_id);
            $dataLibraryColor = $this->colorProduct->getLibraryByColorProductID($dataColor['id']);
            $request['thumb'] = $request['old_image']; 
            return ($this->loadView('admin/colorProduct/edit', [
                'errors' => $errors,
                'item' => $item,
                'dataColor' => $request,
                'dataLibraryColor' => $dataLibraryColor
             ]));
          }else {
            $image = $request['old_image'];
            if($_FILES['thumb']['size'] != 0) {
               $image = save_file($_FILES['thumb'], UPLOAD_URL_PRODUCT);
               if($request['old_image'])  unlink(UPLOAD_URL_PRODUCT.$request['old_image']);
            }
            
             $this->colorProduct->update($request['price'], $request['price_sale'], $request['active'], $image, $request['quantity'], $attribute_product_id);
             $item = $this->attributeProduct->getById($attribute_product_id);
             $dataColor = $this->colorProduct->getColorProductByAttributeProductID($attribute_product_id);
             if (!empty($_FILES['library']['name'][0])) {
                foreach ($_FILES['library'] as $key => $values){
                    foreach ($values as $index => $value){
                         $files[$index][$key] = $value;
                    }
                 }
    
                 foreach ($files as $file){
                    $thumb = save_file($file, UPLOAD_URL_LIBRARY);
                    $this->colorProduct->insertLibraryProduct($request['color_product_id'], $thumb);
                 }
            }
            $dataLibraryColor = $this->colorProduct->getLibraryByColorProductID($dataColor['id']);
             return ($this->loadView('admin/colorProduct/edit',
             [
                'status' => ' Sửa thành công',
                 'item' => $item,
                 'dataColor' => $dataColor,
                 'dataLibraryColor' => $dataLibraryColor
             ] 
             ));
          }
    }
    public function deleteLibrary($request, $resonse){
        try{
            $data = $this->colorProduct->getLibraryProductByID($request['id']);
            unlink(UPLOAD_URL_LIBRARY.$data['thumb']);
            $this->colorProduct->deleteLibraryProductByID($request['id']);
            echo json_encode(['status' => 'success']);
           }catch(Exception $exc){
             echo json_encode([
              'status' => 'error',
              'detal' => $exc
            ]);
           }
    }
    public function list(){
        $dataItem = $this->colorProduct->getAllByProduct();
        return ($this->loadView('admin/colorProduct/list',
             [
                'dataItem' => $dataItem
             ] 
        ));
    }
    public function show($request, $response){
        $product_id = $request[0]['id'];
        $item = $this->product->getById($product_id);
        $dataItem = $this->colorProduct->getAllColorByProduct($product_id);
        return ($this->loadView('admin/colorProduct/show',
             [
                'dataItem' => $dataItem,
                'item' => $item
             ] 
        ));
    }
}