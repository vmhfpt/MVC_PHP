<?php

require_once("models/productModel.php");
require_once("models/attributeProductModel.php");
require_once("models/attributePriceModel.php");

class attributePriceController extends controller{
    private $attributeProduct;
    private $product;
    private $validate;
    private $attributePrice;
    public function __construct(){
       $this->validate =  new request();
       $this->attributeProduct =  new attributeProduct();
       $this->product = new Product();
       $this->attributePrice = new AttributePrice();
    }
    public function index(){
        $dataItem = $this->product->getColorByProduct();
        return ($this->loadView('admin/priceAttributeProduct/list',
        ['dataItem' => $dataItem ] 
        ));
    }
    public function add($request, $response){
        
        $product_id = $request[0]['product_id'];
        $attribute_product_id = $request[0]['attribute_product_id'];
        $product_color_id = $request[0]['product_color_id'];

        $item = $this->product->getById($product_id);
        $dataItem = $this->attributePrice->getListByProductColorId($product_color_id);
        $dataAttribute = $this->attributeProduct->getAttributeExceptColorByProductId($product_id);
        return ($this->loadView('admin/priceAttributeProduct/add',
        [
         'dataItem' => $dataItem,
         'dataAttribute' => $dataAttribute,
         'item' => $item
        ] 
        ));

    }
    public function insert($request, $response){
      // var_dump($request);
      $product_id = $request[0]['product_id'];
      $attribute_product_id = $request[0]['attribute_product_id'];
      $product_color_id = $request[0]['product_color_id'];
      $item = $this->product->getById($product_id);
      isset($request['active']) ? $request['active'] = 0 :  $request['active'] = 1;
      $this->validate->rule([
        'attribute_product_id' => 'require',
        'price' => 'require',
        'price_sale' => 'require',
        'quantity' => 'require',
      ]);
      $this->validate->validate([
         'attribute_product_id.require' => '* Biến thể bắt buộc nhập',
         'price.require' => '* Đơn giá bắt buộc nhập',
         'price_sale.require' => '* Giảm giá bắt buộc nhập',
         'quantity.require' => '* Số lượng bắt buộc nhập'
      ]);
      $errors = ($this->validate->message());
      if($this->attributePrice->checkUnique($request['attribute_product_id'], $product_color_id)){
         $errors['attribute_product_id'] = "* Biến thể đã được thêm";
      }
     
      if($errors){
        $dataItem = $this->attributePrice->getListByProductColorId($product_color_id);
        $dataAttribute = $this->attributeProduct->getAttributeExceptColorByProductId($product_id);
        return ($this->loadView('admin/priceAttributeProduct/add', [
            'errors' => $errors,
            'old_field' => $request,
            'dataItem' => $dataItem,
            'dataAttribute' => $dataAttribute,
            'item' =>  $item
         ]));
      }else {
         $this->attributePrice->insert($request['attribute_product_id'], $product_color_id, $request['price'], $request['price_sale'], $request['quantity'], $request['active']);
         $dataItem = $this->attributePrice->getListByProductColorId($product_color_id);
         $dataAttribute = $this->attributeProduct->getAttributeExceptColorByProductId($product_id);
         return ($this->loadView('admin/priceAttributeProduct/add', [
            'dataItem' => $dataItem,
            'dataAttribute' => $dataAttribute,
            'status' => ' Thêm thành công',
            'item' =>  $item
         ]));
      }
    }
    public function destroy($request, $response){
        try{
            foreach($request['arr'] as $key => $value){
               $this->attributePrice->delete($value);
            }
            echo json_encode(['status' => 'success']);
           }catch(Exception $exc){
             echo json_encode([
              'status' => 'error',
              'detal' => $exc
            ]);
           }
    }
    public function edit($request, $response){
       $attribute_price_id = $request[0]['attribute_price_id'];
       $item = $this->attributePrice->getById($attribute_price_id);
       $detail = $item;
       return ($this->loadView('admin/priceAttributeProduct/edit', [
        'item' =>  $item,
        'detail' => $detail
       ]));
    }
    public function update($request, $response){
        $attribute_price_id = $request[0]['attribute_price_id'];
        //var_dump($request);
        isset($request['active']) ? $request['active'] = 0 :  $request['active'] = 1;
        $this->validate->rule([
            'price' => 'require',
            'price_sale' => 'require',
            'quantity' => 'require',
          ]);
          $this->validate->validate([
             'price.require' => '* Đơn giá không được để trống',
             'price_sale.require' => '* Giảm giá không được để trống',
             'quantity.require' => '* Số lượng không được để trống'
          ]);
          $errors = ($this->validate->message());
          if($errors){
            $item = $this->attributePrice->getById($attribute_price_id);
            $detail = $item;
            return ($this->loadView('admin/priceAttributeProduct/edit', [
                'errors' => $errors,
                'item' => $request,
                'detail' => $detail
             ]));
          }else {
            $this->attributePrice->update($request['price'], $request['price_sale'], $request['quantity'], $request['active'],$attribute_price_id);
            $item = $this->attributePrice->getById($attribute_price_id);
            $detail = $item;
            return ($this->loadView('admin/priceAttributeProduct/edit', [
                'item' =>  $item,
                'detail' => $detail,
                'status' => ' Cập nhật thành công'
            ]));
          }
    }
}