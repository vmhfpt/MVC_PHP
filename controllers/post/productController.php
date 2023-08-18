<?php
require_once("models/introduceModel.php");
require_once("models/categoryModel.php");
require_once("models/productModel.php");
require_once("models/postModel.php");
require_once("models/couponModel.php");
require_once("models/colorProductModel.php");
require_once("models/addressModel.php");
class productController extends controller{
    private $address;
    private $introduce;
    public $category;
    public $product;
    private $post;
    public $colorProduct;
    private $coupon;
    public function __construct(){
        $this->colorProduct = new ColorProduct();
        $this->introduce =  new Introduce();
        $this->category = new Category();
        $this->product = new Product();
        $this->post = new Post();
        $this->address = new Address();
        $this->coupon = new Coupon();
     }

     public function getColorProductByAttributeProductIDAjax($request, $response){
        $attribute_product_id = $request['attribute_product_id'];
        $item = $this->colorProduct->getColorProductByAttributeProductID( $attribute_product_id);
        $library = $this->colorProduct->getLibraryByColorProductID($item['id']);
        $priceAttributeProduct = $this->product->getPriceAttributeByProductColorID($item['id']);
        $totalArrayAttribute = $this->product->countPriceAttributeByProductColorID($item['id']);
        echo json_encode([
            'item' => $item,
            'library' => $library,
            'priceAttributeProduct' => $priceAttributeProduct,
            'totalArrayAttribute' => $totalArrayAttribute 
        ]);
     }
     public function getAttributePriceProductCartAjax($request, $response){
        $dataItem = $this->product->getAttributePriceProductCart($request['id']);
        echo json_encode(
           $dataItem 
        );
     }
     public function getDistrict($request, $response){
       $dataItem = $this->address->getAllDistrictByCityId($request['id']);
       echo json_encode(
         $dataItem 
      );
     }
     public function getWard($request, $response){
       $dataItem = $this->address->getAllWardByDistrictID($request['id']);
       echo json_encode(
         $dataItem 
      );
     }
     public function getTransportFee($request, $response){
      $dataItem = $this->address->getTransportFee($request['city'], $request['district'], $request['ward']);
      echo json_encode(
        $dataItem 
     );
     }
     public function checkCoupon($request, $response){
        $dataItem = $this->address->checkCoupon($request['code'], $request['date']);
        
        if($dataItem){
          //var_dump();
          if($this->coupon->checkCouponUser($dataItem['id'], $_SESSION['user']['id'])){
            echo json_encode(
               [
                  'status' => 'success',
                  'data' => $dataItem
               ] 
            );
          }else {
            echo json_encode(
               ['status' => 'error',
                'message' => '* Mã giảm giá không tồn tại'
               ]
   
            );
          }
          
         
        }else {
         echo json_encode(
            ['status' => 'error',
             'message' => '* Mã giảm giá không tồn tại'
            ]

         );
        }
     }
     public function getProductByChat($request, $response){

      
     
      $dataProduct = $this->product->getProductSearchByName($request['name']);
      if(!$dataProduct){
         echo '<span> Rất tiếc chúng tôi không tìm thấy sản phẩm nào như vậy  !</span>'; 
         die();
     }
     
      $attributePriceProduct = $this->product->getAttributeByProductIDChatBot($dataProduct['id']);
      $dataListColorProduct = $this->colorProduct->getAllColorByProductExceptInventory($dataProduct['id']);
      $result = [];
      foreach ($attributePriceProduct as $item) {
            if (isset($result[$item['description']])) {
               $result[$item['description']]['value'] .= ', ' . $item['value'];
            } else {
               $result[$item['description']] = $item;
            }
      }
     $result = array_values($result);

     $productInformationTemplate = '<div class="product-information">
     <b> THÔNG TIN SẢN PHẨM : '.$dataProduct['name'].'</b>
     <span><b>Tên :</b> '.$dataProduct['name'].'</span>
     <span><b>Giá gốc :</b> '.currency_format($dataProduct['price'] - ($dataProduct['price'] * $dataProduct['price_sale'])).' </span>
     <span><b>Xem thêm thông tin  :</b> <a href="/product/'.$dataProduct['platform_slug'].'/'.$dataProduct['slug'].'"> click vào đây</a></span>
     <span>Danh sách màu sản phẩm : </span>
 </div>';
     $dataListColorProductTemplate = '';
     foreach($dataListColorProduct as $key => $value){
      $dataListColorProductTemplate = $dataListColorProductTemplate . ' <tr>
      <td>'.($key + 1).'</td>
      <td>'.$value['value'].' </td>
      <td><img src="'.IMAGE_DIR_PRODUCT.$value['thumb'].'" style="width : 70px ; heigt : 70px;"></td>
      <td>Còn '.$value['quantity'].' sản phẩm</td>
      <td>+ '.currency_format($value['price'] - ($value['price'] * $value['price_sale'])).'</td>
  </tr>';
     }

     $dataAttributeProductTemplate = '';

     foreach($result as $key => $value){
        $dataAttributeProductTemplate = $dataAttributeProductTemplate . '<li> <b>'.$value['description'].'</b> : '.$value['value'].'</li>';
     }

     echo '<div class="app-chat__detail-item ">
     <div class="app-chat__detail-someone">
         
         <div>
             <div class="app-chat__detail-someone-name"><span>Hệ thống</span></div>
             <div class="app-chat__detail-someone-content">
             <span>


                 <div class="chatbot-result"> 
                 
                 '.$productInformationTemplate.' <br/>



                 <table>
     <tbody><tr>
         <th>STT</th>
         <th>Màu</th>
         <th>Hình</th>
         <th>Số lượng</th>
         <th>Giá</th>
         
     </tr>
     '.$dataListColorProductTemplate.'
     </tbody></table>  
     <br/>
     <div class="order-information-result">

     <ul>
          <b class="chatbot-title-product" >Cấu hình sản phẩm : '.$dataProduct['name'].' </b>
          '.$dataAttributeProductTemplate.'
     </ul>
     
  </div> 
  
  </div>
 
     
     </span>
     
     </div>
</div>
</div>
<div class="app-chat__detail-someone-date-someone">
<div><span class="time-current">Ngay lúc này</span></div>
</div>
</div>';



      // echo json_encode([
      //   'dataProduct' => $dataProduct,
      //   'dataAttributeProduct' =>$result,
      //   'listColor' => $dataListColorProduct
      // ]);die();
     
      //echo json_encode($result);

         }
   public function getAutoComplete($request, $response){
      $dataItem = $this->product->getSearchByAutoComplele($request['key']);
      echo json_encode([
         'data' => $dataItem,
         'rootUrl' => IMAGE_DIR_PRODUCT
      ]);
   }
}