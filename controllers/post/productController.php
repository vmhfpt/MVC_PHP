<?php
require_once("models/introduceModel.php");
require_once("models/categoryModel.php");
require_once("models/productModel.php");
require_once("models/postModel.php");
require_once("models/colorProductModel.php");
require_once("models/addressModel.php");
class productController extends controller{
    private $address;
    private $introduce;
    public $category;
    public $product;
    private $post;
    public $colorProduct;
    public function __construct(){
        $this->colorProduct = new ColorProduct();
        $this->introduce =  new Introduce();
        $this->category = new Category();
        $this->product = new Product();
        $this->post = new Post();
        $this->address = new Address();
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
     }

}