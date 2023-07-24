<?php
require_once("models/introduceModel.php");
require_once("models/categoryModel.php");
require_once("models/productModel.php");
require_once("models/postModel.php");
require_once("models/colorProductModel.php");
require_once("models/couponModel.php");
require_once("models/giftProductModel.php");
require_once("models/addressModel.php");
require_once("models/commentModel.php");
require_once("models/brandModel.php");
require_once("models/attributesModel.php");
class handleController extends controller{
    public $attribute;
    private $brand;
    private $address;
    private $coupon;
    private $introduce;
    public $category;
    public $product;
    private $post;
    public $colorProduct;
    private $giftProduct;
    private $comment;
    public function __construct(){
       $this->brand = new Brand();
       $this->attribute = new Attributes();
       $this->address = new Address();
       $this->coupon = new Coupon();
       $this->colorProduct = new ColorProduct();
       $this->introduce =  new Introduce();
       $this->category = new Category();
       $this->product = new Product();
       $this->post = new Post();
       $this->giftProduct = new GiftProduct();
       $this->comment = new Comment();
    }
   public function home(){
      // $array = ['name' => ['join', 'alex', 'tom'], 'age' => 32];
      // $array['name'] = implode(', ', $array['name']);
      // var_dump($array);die();





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
       $platform = $request[0]['platform_slug'];
       $item = $this->product->getBySlug($request[0]['product_slug']);
      if(!$item) return ($this->loadView('admin/errorPage/404notFound'));
      $product_id = $item['id'];
      $attributeProduct = $this->product->getAttributeByProduct($product_id);
      $firstColor = $this->product->getFirstColorByProductID($product_id);
      $firstLibraryColor = $this->colorProduct->getLibraryByColorProductID($firstColor['product_color_id']);
      $listColorProduct = $this->colorProduct->getAllColorByProduct($product_id);
      $listCoupon = $this->coupon->getDetailListCouponByProduct($product_id);
      $giftProduct = $this->giftProduct->getGiftProductByProductId($product_id);
      $comments = $this->comment->getAllCommentByProductId($product_id);
      $postSuggest = $this->post->getFivePostsSuggest();
      $totalArrayAttribute = $this->product->countPriceAttributeByProductColorID($firstColor['product_color_id']);
      $listPriceAttributeProduct = $this->product->getPriceAttributeByProductColorID($firstColor['product_color_id']);
      $top10ProductSuggest = $this->product->getProductSuggestByPlatFormSLug($platform);
      $voteRank = $this->comment->getRankProduct($product_id);

      $total = 0;
      $totalRank = 0;
      $worstVote = 0;
      $badVote = 0;
      $normalVote = 0;
      $goodVote = 0;
      $bestVote = 0;

      foreach($voteRank as $key => $value){
         $totalRank = $totalRank + ($value['total']);
         if($value['vote'] == 1){
            $worstVote = $value['total'];
         }
         if($value['vote'] == 2){
            $badVote = $value['total'];
         }
         if($value['vote'] == 3){
            $normalVote  = $value['total'];
         }
         if($value['vote'] == 4){
            $goodVote = $value['total'];
         }
         if($value['vote'] == 5){
            $bestVote = $value['total'];
         }
         $total = $total + $value['caculation'];
      }
 
   if($totalRank  == 0) $totalRank = 0.1;
   if($total == 0) $total = 0;
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
         'totalArrayAttribute' => $totalArrayAttribute,
         'comments' => $comments,
         "total" => $total,
         "totalRank" => $totalRank,
         "worstVote" =>$worstVote,
         "badVote" => $badVote,
         "normalVote" => $normalVote,
         "goodVote" => $goodVote,
         "bestVote" => $bestVote,
         'top10ProductSuggest' => $top10ProductSuggest
     ]));
   }
   public function platForm($request, $response){
    //ar_dump();die();
    $listBrand = $this->brand->getAll();
    $listFilter = $this->category->getFilterByPlatFormSlug($request[0]['slug']);
    $categoryFilter = $this->category->getCategoryByPlatformSlug($request[0]['slug']);
    //var_dump($categoryFilter);die();
    //var_dump($listFilter);die();
    return ($this->loadView('post/product/list', [
      'listBrand' => $listBrand,
      'listFilter' => $listFilter,
      'categoryFilter' => $categoryFilter
   ]));
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
   public function detailNew($request, $response){
      $item = $this->post->getBySlug($request[0]['slug']);
      
    return ($this->loadView('post/new/detail', ['item' => $item]));
   }
   public function detailIntroduce($request, $response){
    $slug = $request[0]['slug'];
    $item = $this->introduce->getBySlug($slug);
     return ($this->loadView('post/introduce/detail', ['item' => $item]));
   }
   public function detailAgent(){
    return ($this->loadView('post/introduce/shop'));
   }
   public function minMaxPrice($array)
   {
       $tempArray = [];
       foreach ($array as $value) {
           if ($value == 1) {
               array_push($tempArray, 0, 2000000);
           }
           if ($value == 2) {
               array_push($tempArray, 2000000, 4000000);
           }
           if ($value == 3) {
               array_push($tempArray, 4000000, 7000000);
           }
           if ($value == 4) {
               array_push($tempArray, 7000000, 13000000);
           }
           if ($value == 5) {
               array_push($tempArray, 13000000, 20000000);
           }
           if ($value == 6) {
               array_push($tempArray, 20000000, 200000000);
           }
       }
       return ([min($tempArray), max($tempArray)]);
   }
   public function getTotalFilter($request, $response){
     // var_dump($request);
    // $arr = "1,2,3,4,5";
    // $dataItem = $this->product->getProductWhereINId($arr);
    // var_dump($dataItem);
     $platFormSlug = $request[0]['slug'];
     unset($request[0]);
     $stringQuery = '';
     $stringOrderBy = '';
     //var_dump($request);die();
      if(isset($request['ca'])){
         $result = str_replace("c", "", $request['ca']);
         //var_dump($result);
         $stringQuery = $stringQuery . " AND c1.id IN($result)";
      }

      $arrQuery = [];
      foreach($request as $key => $value){
         if($key != "page" && $key != "brand" && $key != "price" && $key != "ca" && $key != 'sort'){
            $arrQuery[] = $value;
         };
      }
      if(count($arrQuery) > 0){
         $string = implode(",", $arrQuery);
         $stringQuery = $stringQuery . " AND `attribute_product`.`value_id` IN ($string)";
      }
      

      if(isset($request['brand'])){
         $result = str_replace("b", "", $request['brand']);
         //var_dump($result);
         $stringQuery = $stringQuery . " AND `brands`.`id` IN($result)";
      }
      if(isset($request['price'])){
            $result = str_replace("p", "", $request['price']);
           // var_dump($result);
            $data = $this->minMaxPrice(explode(',', $result));
           // var_dump($data);
         $stringQuery = $stringQuery . " AND `products`.`price` - (`products`.`price` * `products`.`price_sale`) BETWEEN $data[0] AND $data[1]";
      }
      if(isset($request['sort'])){
         $sort = strtoupper($request['sort']);
         $stringOrderBy =  " ORDER BY `product_sale_price` $sort";
      }
     
     
     
     // var_dump($stringQuery.$stringOrderBy);
      //var_dump($string);
       
      $dataItem = $this->product->getProductByFilter($platFormSlug,$stringQuery,$stringOrderBy, '');
      echo json_encode($dataItem);
      //print("<pre>".print_r( $dataItem,true)."</pre>");die();
   }
   public function getAttributeProductByProductID($product_id){
      $attributePriceProduct = $this->product->getAttributeByProductIDLimitType($product_id);
      $result = [];
      foreach ($attributePriceProduct as $item) {
            if (isset($result[$item['description']])) {
               $result[$item['description']]['value'] .= ', ' . $item['value'];
            } else {
               $result[$item['description']] = $item;
            }
      }
     $result = array_values($result);
     $dataAttributeProductTemplate = '';

     foreach($result as $key => $value){
        $dataAttributeProductTemplate = $dataAttributeProductTemplate . '<li> '.$value['description'].' : '.$value['value'].'</li>';
     }
     return $dataAttributeProductTemplate;
   }
   public function getFilter($request, $response){

      
      $platFormSlug = $request[0]['slug'];
      unset($request[0]);
      $stringQuery = '';
      $stringOrderBy = '';
      $page = 1;
      $paginate = "LIMIT ".ITEM_PER_PAGE_PRODUCT." OFFSET 0";
      if(isset($request['page'])){
        
         $page = $request['page'];
         $limit = $page  * ITEM_PER_PAGE_PRODUCT;
         $paginate = "LIMIT ".$limit." OFFSET 0";
      }
       if(isset($request['ca'])){
          $result = str_replace("c", "", $request['ca']);
          
          $stringQuery = $stringQuery . " AND c1.id IN($result)";
       }
 
       $arrQuery = [];
       foreach($request as $key => $value){
          if($key != "page" && $key != "brand" && $key != "price" && $key != "ca" && $key != 'sort'){
             $arrQuery[] = $value;
          };
       }
       if(count($arrQuery) > 0){
          $string = implode(",", $arrQuery);
          $stringQuery = $stringQuery . " AND `attribute_product`.`value_id` IN ($string)";
       }
       
 
       if(isset($request['brand'])){
          $result = str_replace("b", "", $request['brand']);
         
          $stringQuery = $stringQuery . " AND `brands`.`id` IN($result)";
       }
       if(isset($request['price'])){
             $result = str_replace("p", "", $request['price']);
           
             $data = $this->minMaxPrice(explode(',', $result));
           
          $stringQuery = $stringQuery . " AND `products`.`price` - (`products`.`price` * `products`.`price_sale`) BETWEEN $data[0] AND $data[1]";
       }
       if(isset($request['sort'])){
          $sort = strtoupper($request['sort']);
          $stringOrderBy =  " ORDER BY `product_sale_price` $sort";
       }
      
       $total = $this->product->getProductByFilter($platFormSlug,$stringQuery,$stringOrderBy);
      // var_dump(count($total));die();
       
       $dataItem = $this->product->getProductByFilter($platFormSlug,$stringQuery,$stringOrderBy, $paginate);
      // () ? $page + 1 : false
      $templatePaginate = "";
       if(ceil(count($total)/count($dataItem)) > $page){
          $templatePaginate = ' <div next-page="'.($page + 1).'" class="app-phone-suggest__product-paginate">
          <button class="">Xem thêm ('.count($total) - count($dataItem).') Sản phẩm<i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
   </div>';
       }
      // print("<pre>".print_r( $dataItem,true)."</pre>");die();
     $template = '';
     foreach($dataItem as $key => $value){
      $template = $template . ' <div class="app-phone-suggest__product-item">
      <div class="app-top-sale__day-carousel-item-img">
        <img
          src="'.IMAGE_DIR_PRODUCT.$value['thumb'].'"
          alt=""
        />
        <div class="app-top-sale__day-carousel-item-img-bottom-gift">
          <img
            src="https://didongthongminh.vn/modules/products/assets/images/icon-gift.svg"
            alt=""
          />
        </div>
      </div>

      <div class="app-top-sale__day-carousel-item-detail">
        <div class="app-top-sale__day-carousel-item-detail-title">
          <a href="/product/'.$value['platform_slug'].'/'.$value['product_slug'].'">'.$value['product_name'].'</a>
        </div>
        <div class="app-top-sale__day-carousel-item-detail-price">
          <b>'.currency_format($value['product_sale_price']).'</b> <span>'.currency_format($value['price']).'</span>
        </div>
        <div class="app-top-sale__day-carousel-item-detail-attribute">
              <ul class="">
                 '.$this->getAttributeProductByProductID($value['product_id']).'
              </ul>
        </div>
      
        <div class="app-top-sale__day-carousel-item-detail-bottom">
          <div
            class="app-top-sale__day-carousel-item-detail-bottom-vote"
          >
            <ul>
              <li>
                <i
                  class="vote-active fa fa-star"
                  aria-hidden="true"
                ></i>
              </li>
              <li>
                <i
                  class="vote-active fa fa-star"
                  aria-hidden="true"
                ></i>
              </li>
              <li>
                <i
                  class="vote-active fa fa-star"
                  aria-hidden="true"
                ></i>
              </li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
          </div>
          <div
            class="app-top-plush-category__add"
          >
            <i class="fa fa-plus-circle" aria-hidden="true"></i> So sánh
          </div>
        </div>
      </div>
      <div class="app-top-sale__day-carousel-item-img-top-sale">
        -'.((float)$value['price_sale'] * 100).'%
      </div>
    </div>';
     }
     echo  '<div class="app-phone-suggest__product" >' .$template . '</div>'.$templatePaginate;
   }
}