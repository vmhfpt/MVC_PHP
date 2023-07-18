<?php
require_once("models/introduceModel.php");
require_once("models/categoryModel.php");
require_once("models/productModel.php");
require_once("models/postModel.php");
require_once("models/colorProductModel.php");
require_once("models/couponModel.php");
require_once("models/giftProductModel.php");
require_once("models/addressModel.php");
class handleController extends controller{
    private $address;
    private $coupon;
    private $introduce;
    public $category;
    public $product;
    private $post;
    public $colorProduct;
    private $giftProduct;
    public function __construct(){
       $this->address = new Address();
       $this->coupon = new Coupon();
       $this->colorProduct = new ColorProduct();
       $this->introduce =  new Introduce();
       $this->category = new Category();
       $this->product = new Product();
       $this->post = new Post();
       $this->giftProduct = new GiftProduct();
    }
   public function home(){
      $topPhoneSuggest = $this->product->getProductByPlatformID(1);
      $listPostsSuggest = $this->post->getFivePostsSuggest();
      $firstPost = $this->post->getFirstItem();
      $listPlatform = $this->category->getAllPlatform();
      $topAppleSuggest = $this->product->getProductByBrandSuggest(14);
      return ($this->loadView('post/home', [ 
         'listPlatform' => $listPlatform ,
         'firstPost' =>  $firstPost,
         'listPostsSuggest' => $listPostsSuggest,
         'topAppleSuggest' => $topAppleSuggest,
         'topPhoneSuggest' => $topPhoneSuggest
      ]));
   }
   public function detailProduct($request, $response){
       $item = $this->product->getBySlug($request[0]['product_slug']);
      if(!$item) return ($this->loadView('admin/errorPage/404notFound'));
      $product_id = $item['id'];
      $attributeProduct = $this->product->getAttributeByProduct($product_id);
      $firstColor = $this->product->getFirstColorByProductID($product_id);
      $firstLibraryColor = $this->colorProduct->getLibraryByColorProductID($firstColor['product_color_id']);
      $listColorProduct = $this->colorProduct->getAllColorByProduct($product_id);
      $listCoupon = $this->coupon->getDetailListCouponByProduct($product_id);
      $giftProduct = $this->giftProduct->getGiftProductByProductId($product_id);
      $postSuggest = $this->post->getFivePostsSuggest();
      $totalArrayAttribute = $this->product->countPriceAttributeByProductColorID($firstColor['product_color_id']);
      $listPriceAttributeProduct = $this->product->getPriceAttributeByProductColorID($firstColor['product_color_id']);
     return ($this->loadView('post/product/detail', [
         'attributeProduct' => $attributeProduct,
         'firstColor' => $firstColor,
         'item' => $item,
         'firstLibraryColor' => $firstLibraryColor,
         'listColorProduct' => $listColorProduct,
         'listPriceAttributeProduct' => $listPriceAttributeProduct,
         'listCoupon' => $listCoupon,
         'giftProduct' => $giftProduct,
         'postSuggest' => $postSuggest,
         'totalArrayAttribute' => $totalArrayAttribute 
     ]));
   }
   public function platForm($request, $response){
    return ($this->loadView('post/product/list'));
   }
   public function category($request, $response){
    return ($this->loadView('post/product/list'));
   }
   public function cart(){

    $listCity = $this->address->getAllCity();
    return ($this->loadView('post/cart/index', ['listCity' => $listCity]));
   }
   public function login(){
    return ($this->loadView('post/user/login'));
   }
   public function register(){
    return ($this->loadView('post/user/register'));
   }
   public function dashboard(){
    return ($this->loadView('post/user/dashboard'));
   }
   public function new(){
    return ($this->loadView('post/new/index'));
   }
   public function detailNew(){
    return ($this->loadView('post/new/detail'));
   }
   public function detailIntroduce($request, $response){
    $slug = $request[0]['slug'];
    $item = $this->introduce->getBySlug($slug);
     return ($this->loadView('post/introduce/detail', ['item' => $item]));
   }
   public function detailAgent(){
    return ($this->loadView('post/introduce/shop'));
   }
}