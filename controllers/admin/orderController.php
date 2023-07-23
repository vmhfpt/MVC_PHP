<?php
require_once("models/orderModel.php");
require_once("models/addressModel.php");
require_once("models/transportModel.php");
require_once("models/productModel.php");
require_once("models/colorProductModel.php");
require_once("models/attributePriceModel.php");
class orderController extends controller{
   private $order;
   private $address;
   private $validate;
   private $transportFee;
   public $product;
   private $productColor;
   private $attributePrice;
   public function __construct(){
      $this->productColor = new ColorProduct();
      $this->product = new Product();
      $this->validate =  new request();
      $this->order  = new Order();
      $this->address = new Address();
      $this->transportFee = new Transport();
      $this->attributePrice = new AttributePrice();
   }
   public function changeActive($request, $response){
      if($request['type'] == 'check'){
        $activeCurrent = $this->order->getOrderById($request[0]['id']);
        $active = (int) $request['active'];
       
        if($activeCurrent['active'] != 0 &&  (($active == ((int) $activeCurrent['active'] - 1)) )  ){
           echo json_encode([
               'status' => true
             ]);
        }else {
           echo json_encode([
               'status' => false
             ]);
        }
      }else if($request['type'] == 'update'){
         //var_dump($request);
         
         $activeCurrent = $this->order->getOrderById($request[0]['id']);
         

         $activeChange = $request['active'];
         if((int)$activeChange == 0 && $activeCurrent['active'] != 6){
            echo json_encode([
                'status' => 'error',
              ]);
              return true;
         }
         $content = $request['content'];
         $order_id = $request[0]['id'];
         $this->order->changeActiveOrder($activeChange, $order_id );
         $this->order->addContentActiveOrder($activeChange, $content, $_SESSION['user']['id'], $order_id);
         echo json_encode([
            'status' => 'success',
            'user_name' =>$_SESSION['user']['name'],
             'date' => gmdate('Y-m-d h:i:s ')
          ]);
      }
   }
   public function index(){
    $dataItem = $this->order->getAllOrder();
    //var_dump($dataItem);
    return ($this->loadView('admin/order/list' , ['dataItem' => $dataItem]));
   }
   public function detail($request, $response){
    $dataCity = $this->address->getAllCity();
    
    $dataItem = $this->order->getOrderAndCouponById($request[0]['id']);
    $statusOder = $this->order->getStateActionOrder($request[0]['id']);
    if($statusOder){
        if((int) $statusOder[0]['active'] == 0){
            $statusOder[5] = $statusOder[0];
            unset($statusOder[0]); 
        }
    }

    return ($this->loadView('admin/order/detail', ['dataItem' => $dataItem, 'dataCity' => $dataCity, 'statusOder' => $statusOder] ));
   }
   public function change($request, $response){
        $action = $request['changeColumn'];
        if($action == "address-detail"){
          return $this->changeAddressDetail($request);
        }else if($action == "name"){
            return $this->changeOrderName($request);
        }else if($action == 'number'){
            return $this-> changePhoneNumber($request);
        }
      //  var_dump($action);
   }
   public function changeAddressDetail($data){
      $dataAddress = $this->address->addressSelectall($data['city_id'], $data['district_id'], $data['ward_id']);
      $fullAddress = $data['address_detail']. "," . $dataAddress["aware"] . "," . $dataAddress["district"] . "," . $dataAddress["city"];
      $Fee = 0;
      $transportFee = $this->transportFee->getTransportFee($data['city_id'], $data['district_id'], $data['ward_id']);
      if($transportFee ){
        $Fee = $transportFee['ship'];
      }
      $this->order->updateTransportFeeAndAddress($Fee, $fullAddress, $data[0]['id']);
      $total = $this->order->getOrderById($data[0]['id']);
      echo json_encode([
        'address_detail' => $fullAddress ,
        'transport_fee' => $Fee,
        'total' => $total['total']
      ]);
   }
   public function changeOrderName($data){
     return $this->order->updateNameOrder($data['value'], $data[0]['id']);
   }
   public function changePhoneNumber($data){
     return $this->order->updatePhoneNumber($data['value'], $data[0]['id']);
   }
   public function listOrder($request, $response){
    $listProduct = $this->product->getAll();
    $item = $this->order->getOrderById($request[0]['id']);
    $dataItem = $this->order->getAllOrderDetailByOrderID($request[0]['id']);
   // print("<pre>".print_r($dataItem,true)."</pre>");
    //die();
    return ($this->loadView('admin/order/listOrderDetail', ['item' => $item, 'dataItem' => $dataItem, 'listProduct' => $listProduct] ));
   }
   public function edit($request, $response){
      // var_dump($request);die();
      $product_id = $request[0]['product_id'];
      $product_color_id = $request[0]['product_color_id'];
      $order_id = $request[0]['order_id'];
      $order_detail_id = $request[0]['order_detail_id'];
      
      $dataListColorProductInit = $this->productColor->getAllColorByProduct($product_id);

      //print("<pre>".print_r( $dataListColorProductInit,true)."</pre>");die();
      $dataListAttributeProductInit = $this->product->getPriceAttributeByProductColorID($product_color_id);
      //print("<pre>".print_r($dataListAttributeProductInit,true)."</pre>");die();
      $dataListAttributeProductCurrent = $this->order->getAttributePriceInOrderCurrent($order_detail_id);
      //print("<pre>".print_r($dataListAttributeProductCurrent,true)."</pre>");die();
     $dataColorProductCurrent = $this->order->getColorProductCurrentInOrderDetail($order_detail_id);
      
      //print("<pre>".print_r( $dataColorProductCurrent,true)."</pre>");die();
     return ($this->loadView('admin/order/edit',[
      'dataColorProductCurrent' => $dataColorProductCurrent,
      'dataListAttributeProductInit' => $dataListAttributeProductInit,
      'dataListAttributeProductCurrent' => $dataListAttributeProductCurrent,
      'dataListColorProductInit' => $dataListColorProductInit
    ]));


   }
   public function update($request, $response){
     //var_dump($request);
     //print("<pre>".print_r( $request,true)."</pre>");die();
     $attributePrice = 0;
     $priceProductOrigin = $this->product->getPriceProductInitByProductColorID($request['color_product_id']);
    // var_dump($priceProductOrigin["price_init"]);
     
     if(isset($request['attribute_price_id'] )){
        foreach($request['attribute_price_id'] as $key => $value){
           $data = $this->attributePrice->getById($value);
           //print("<pre>".print_r( $data,true)."</pre>");
           $attributePrice = $attributePrice + (int) ($data['price'] - ($data['price'] * $data['price_sale']));
        }
     }
     // var_dump($attributePrice);
     $dataColor = $this->productColor->getByID($request['color_product_id']);
     $priceColor = $dataColor['price'] - ($dataColor['price'] * $dataColor['price_sale']);
     $totalAllProduct = ($priceProductOrigin["price_init"] + $priceColor + $attributePrice) * $request['quantity'];
     $dataOrder = $this->order->getOrderById($request[0]['order_id']);
     
     $dataOrderDetail = $this->order->getOrderDetainById($request[0]['order_detail_id']);
     $dataOrderDetail = $dataOrderDetail['total'] * $dataOrderDetail['quantity'];
      //var_dump(($dataOrder['total'] - $dataOrderDetail) + $totalAllProduct);

    // var_dump($dataOrderDetail);
    // var_dump($dataOrderDetail);die();


     $this->order->updateTotalOrder((($dataOrder['total'] - $dataOrderDetail) + $totalAllProduct), $request[0]['order_id']);
     $this->order->updateTotalOrderDetail($request['color_product_id'], ($priceProductOrigin["price_init"] + $priceColor + $attributePrice),$request['quantity'], $request[0]['order_detail_id']);
     $this->order->deleteOrderAttributeProduct($request[0]['order_detail_id']);
     if(isset($request['attribute_price_id'] )){
        foreach($request['attribute_price_id'] as $key => $value){
          $this->order->insertOrderAttributeProduct($request[0]['order_detail_id'],$value);
        }
     }



     $product_id = $request[0]['product_id'];
     $product_color_id = $request[0]['product_color_id'];
     $order_id = $request[0]['order_id'];
     $order_detail_id = $request[0]['order_detail_id'];
     
     $dataListColorProductInit = $this->productColor->getAllColorByProduct($product_id);


     $dataListAttributeProductInit = $this->product->getPriceAttributeByProductColorID($product_color_id);
     
     $dataListAttributeProductCurrent = $this->order->getAttributePriceInOrderCurrent($order_detail_id);

    $dataColorProductCurrent = $this->order->getColorProductCurrentInOrderDetail($order_detail_id);
     return ($this->loadView('admin/order/edit',[
      'status' => 'Sửa thành công',
      'dataColorProductCurrent' => $dataColorProductCurrent,
      'dataListAttributeProductInit' => $dataListAttributeProductInit,
      'dataListAttributeProductCurrent' => $dataListAttributeProductCurrent,
      'dataListColorProductInit' => $dataListColorProductInit
    ]));

   }
   public function getAttributeByColoProduct($request, $response){
    function getListAttributeColor($arr, $type_id){
      $template = '';
      foreach($arr as $key => $value){
        
         if($value['type_id'] == $type_id){
          $template  = $template  . ' <option  value="'.$value['attribute_price_id'].'">'.$value['type_name'].' - '.$value['value'].' </option>';
         }
      }
      return ($template);
    }
     //var_dump($request);
     $listAtributeColorInit = $this->productColor->getPriceAttributeByProductColorID($request['id']);
     //print("<pre>".print_r( $listAtributeColorInit,true)."</pre>");die();
     $listAttributeColor = $this->product->getPriceAttributeByProductColorID($request['id']);
     //print("<pre>".print_r( $listAttributeColor,true)."</pre>");die();
     $template = '';
     foreach ($listAtributeColorInit as $key => $value){
      $template = $template . '<div class="col-md-2">
      <div class="form-group">
          <label>'.$value['description'].'</label>

          <select name="attribute_price_id[]" class="get-value custom-select">
                '.getListAttributeColor($listAttributeColor, $value['type_id']).'
          </select>

      </div>
  </div>'; 
     }
     echo $template;
     

     
   }
   public function delete($request, $response){
      //var_dump($request);
      $this->order->updateTotalOrderWhenDeleteOrderDetail($request['total'], $request['order_id']);
      $this->order->deleteOrderDetail($request['order_detail_id']);
      echo json_encode([
        'status' => 'success'
      ]);
   }
   public function getListColor($request, $response){
     
     $dataColor = $this->productColor->getAllColorByProduct($request['product_id']);
     echo json_encode($dataColor);
   }
   public function getListAttributePriceProduct($request, $response){
     function getListAttributeChild($arr, $type_id){
        $template = '';
        foreach($arr as $key => $value){
           if($value['type_id'] == $type_id){
              $template = $template.'<option value="'.$value['attribute_price_id'].'">'.$value['value'].'</option>';
           }
        }
        return $template;
     }
      //var_dump($request);
      $dataListAttribute = $this->product->getPriceAttributeByProductColorID($request['id']);
      //print("<pre>".print_r( $dataListAttribute ,true)."</pre>");die();
      $dataPriceAttributeInit = $this->product->countPriceAttributeByProductColorID($request['id']);
     //print("<pre>".print_r( $dataPriceAttributeInit,true)."</pre>");die();
     $template = '';
     foreach($dataPriceAttributeInit as $key => $value){
      $template  =  $template. '<div class="col-md-2"> 
      <div class="form-group">
          <label>'.$value['description'].'</label>
      
          <select id="attribute_price_id" name="attribute_price_id[]" class="get-value custom-select">
                 '.getListAttributeChild($dataListAttribute, $value['id']).'
                 
          </select>
         
      </div>
  </div>';
     }
     echo $template. '<div class="col-md-2"> 
     <div class="form-group">
         <label>SỐ LƯỢNG</label>
         <input value="1" name="quantity" type="number" class="form-control"  placeholder="Nhập số lượng">
     </div>
 </div>
 <div class="col-md-2">
     <div class="form-group mt-4">
        <button type="submit" class="btn btn-success m-2">Thêm</button>
     </div>
     
 </div>';
     
   }
   public function addItemToOrderDetail($request, $response){
     //var_dump($request);die();
     $priceProductOrigin = $this->product->getPriceProductInitByProductColorID($request['color_product_id']);
     //var_dump($priceProductOrigin["price_init"]);
     $attributePrice = 0;
     $dataColor = $this->productColor->getByID($request['color_product_id']);
     $priceColor = $dataColor['price'] - ($dataColor['price'] * $dataColor['price_sale']);
     //var_dump($priceColor);
     if(isset($request['attribute_price_id'] )){
      foreach($request['attribute_price_id'] as $key => $value){
         $data = $this->attributePrice->getById($value);
         //print("<pre>".print_r( $data,true)."</pre>");
         $attributePrice = $attributePrice + (int) ($data['price'] - ($data['price'] * $data['price_sale']));
      }
   }
    $totalProductAll = $priceProductOrigin["price_init"] + $priceColor + $attributePrice;
    $this->order->updateTotalIncreateOrderWhenDeleteOrderDetail($request[0]['id'], ($totalProductAll * $request['quantity']));
    $order_detail_id = $this->order->insertOrderDetailAndGetLastID($request[0]['id'], $request['color_product_id'],$totalProductAll, $request['quantity'] );
    if(isset($request['attribute_price_id'] )){
      foreach($request['attribute_price_id'] as $key => $value){
        $this->order->insertOrderAttributeProduct($order_detail_id,$value);
      }
    }

    
    $listProduct = $this->product->getAll();
    $item = $this->order->getOrderById($request[0]['id']);
    $dataItem = $this->order->getAllOrderDetailByOrderID($request[0]['id']);
   // print("<pre>".print_r($dataItem,true)."</pre>");
    //die();
    return ($this->loadView('admin/order/listOrderDetail', ['item' => $item, 'dataItem' => $dataItem, 'listProduct' => $listProduct, 'status' => 'Thêm thành công'] ));
   }
}