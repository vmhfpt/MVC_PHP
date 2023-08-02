<?php
 use Facebook\Facebook;
 use Facebook\Exceptions\FacebookResponseException;
 use Facebook\Exceptions\FacebookSDKException;
require_once("models/introduceModel.php");
require_once("models/userModel.php");
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
require_once("models/privilegeModel.php");
require_once("models/categoryPostModel.php");


class handleController extends controller{
  private $categoryPost;
   private $privilege;
    private $user;
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
       $this->categoryPost = new CategoryPost();
       $this->privilege = new Privilege();
       $this->user = new User();
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
      //var_dump($firstColor );die();
      //var_dump($firstColor['product_color_id']);die();
      $firstLibraryColor = $this->colorProduct->getLibraryByColorProductID($firstColor['product_color_id']);
     // var_dump($firstLibraryColor);die();
      //print("<pre>".print_r($firstLibraryColor,true)."</pre>");die();
      $listColorProduct = $this->colorProduct->getAllColorByProductExceptInventory($product_id);
     // print("<pre>".print_r($listColorProduct,true)."</pre>");die();
      $listColorProductCheckInventory = $this->colorProduct->getAllColorByProductAttachInventory($product_id);
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
         'listColorProductCheckInventory' => $listColorProductCheckInventory,
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
   
      $fb = new Facebook(array(
         'app_id' => '540652344880063',
         'app_secret' => '259436cafd3faacc91f51fc61a7621a2',
         'default_graph_version' => 'v3.2',
       ));
       $helper = $fb->getRedirectLoginHelper();



       if(!isset($_GET['prompt'])){
         try {
           if(isset($_SESSION['facebook_access_token'])){
               $accessToken = $_SESSION['facebook_access_token'];
           }else{
                 $accessToken = $helper->getAccessToken();
           }
         } catch(FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
             exit;
         } catch(FacebookSDKException $e) {
           echo 'Facebook SDK returned an error: ' . $e->getMessage();
             exit;
         }
       }
       
       if(isset($accessToken) && !isset($_GET['prompt'])){
         if(isset($_SESSION['facebook_access_token'])){
             $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
         }else{
             // Put short-lived access token in session
             $_SESSION['facebook_access_token'] = (string) $accessToken;
             
               // OAuth 2.0 client handler helps to manage access tokens
             $oAuth2Client = $fb->getOAuth2Client();
             
             // Exchanges a short-lived access token for a long-lived one
             $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
             $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
             
             // Set default access token to be used in script
             $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
         }
         
         // Redirect the user back to the same page if url has "code" parameter in query string
        
         
         // Getting user's profile info from Facebook
         try {
             $graphResponse = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,picture');
             $fbUser = $graphResponse->getGraphUser();
         } catch(FacebookResponseException $e) {
             echo 'Graph returned an error: ' . $e->getMessage();
             session_destroy();
             // Redirect user back to app login page
             header("Location: /login");
             exit;
         } catch(FacebookSDKException $e) {
             echo 'Facebook SDK returned an error: ' . $e->getMessage();
             exit;
         }
         
         // Initialize User class
        // print("<pre>".print_r( $fbUser,true)."</pre>");die();
        //  echo $fbUser['name'] . "<br/>";
        //  echo $fbUser['email'] . "<br/>";
        //  echo $fbUser['picture']['url'] . "<br/>";
         if($this->user->checkLoginSocialiteFacebook($fbUser['id'])){
            $dataUser = $this->user->checkLoginSocialiteFacebook($fbUser['id']);
           // print("<pre>".print_r($dataUser,true)."</pre>");
         }else {
            $userId = $this->user->insertLoginByFacebook($fbUser['name'], $fbUser['email'],$fbUser['id'] );
            $dataUser = $this->user->getById($userId);
          //  print("<pre>".print_r($dataUser,true)."</pre>");
         }
        
         $_SESSION['user'] = $dataUser;
         $data = $this->privilege->getAuthProvileByUser($dataUser['id']);
         $_SESSION['user']['privilege'] = $data;
      //  print("<pre>".print_r($_SESSION['user'],true)."</pre>");
      header('Location: dashboard');
        die();
         
         // Render Facebook profile data
       
       }else{
        $permissions = ['email']; // Optional permissions
        $loginURL = $helper->getLoginUrl('http://localhost:84/login', $permissions);
       }
       








    $client = new Google_Client();
  
  
    $client->setClientId('361358319183-iruhsb51i3uublcu06dfp5gmqj42o5ga.apps.googleusercontent.com');
   // Enter your Client Secrect
   $client->setClientSecret('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');
   // Enter the Redirect URL
   $client->setRedirectUri('http://localhost:84/login');

   // Adding those scopes which we want to get (email & profile Information)
   $client->addScope("email");
   $client->addScope("profile");
   if(isset($_GET['code']) && isset($_GET['prompt']) ){

      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
      if(!isset($token["error"])){
    
          $client->setAccessToken($token['access_token']);
    
          // getting profile information
          $google_oauth = new Google_Service_Oauth2($client);
          $google_account_info = $google_oauth->userinfo->get();

    
    
        //  echo $google_account_info->name . "<br/>";
        //  echo $google_account_info->email . "<br/>";
        //  echo $google_account_info->picture . "<br/>";
        //echo $google_account_info->id . "<br/>";
        $dataUser = true;
        if($this->user->checkLoginSocialiteGoogle($google_account_info->id)){
          $dataUser = $this->user->checkLoginSocialiteGoogle($google_account_info->id);
         // print("<pre>".print_r($dataUser,true)."</pre>");
        }else {
          $idUser = $this->user->insertLoginByGoogle($google_account_info->name, $google_account_info->email, $google_account_info->id);
          $dataUser = $this->user->getById($idUser);
          // print("<pre>".print_r($dataUser,true)."</pre>");
        }
           $_SESSION['user'] = $dataUser;
            $data = $this->privilege->getAuthProvileByUser($dataUser['id']);
            $_SESSION['user']['privilege'] = $data;
            header('Location: dashboard');
           //print("<pre>".print_r($_SESSION['user'],true)."</pre>");
     
        
         die();
          
    
      }
      else{
         // header('Location: login.php');
         echo "redirect";
          die();
      }
    }
    return ($this->loadView('post/user/login', ['client' => $client, 'loginURL' => $loginURL]));
   }
   public function register(){
    return ($this->loadView('post/user/register'));
   }
   public function dashboard(){
    //var_dump($_SESSION['user']); die();
   
    $user = $_SESSION['user'];
    return ($this->loadView('post/user/dashboard', ['user' => $user ]));
   }
   public function detailCategoryPost($request, $response){
    $firstPost = $this->post->getPostSuggestByCategory(5);
    $secondPost = $this->post->getPostSuggestByCategory(7);
    $thirdPost = $this->post->getPostSuggestByCategory(6);
    $fourthPost = $this->post->getPostSuggestByCategory(8);
    $top5Product = $this->product->getTop5Product();
    $listCategory = $this->categoryPost->getAll();



    $page = 1;
    


    if(isset($request['page'])){
       $page = (int)$request['page'];
    }
    $totalItem = $this->post->post_count_totalByCategory($request[0]['slug']);
   
    $limitShow = ITEM_PER_PAGE;
    $offset = ($page - 1) * $limitShow;
    $dataItem = $this->post->getTop10PostByCategory($limitShow, $offset, $request[0]['slug']);
    //print("<pre>".print_r($dataItem,true)."</pre>");die();
   
    return ($this->loadView('post/new/index', [
       'dataItem' => $dataItem,
      'firstPost' => $firstPost,
      'secondPost' => $secondPost,
      'thirdPost' => $thirdPost,
      'fourthPost' => $fourthPost,
      'top5Product' => $top5Product,
      'listCategory' => $listCategory,
      'page' => $page,
      'limitShow' => $limitShow,
      'totalItem' => $totalItem
    ]));
   }
   public function new($request, $response){
    $firstPost = $this->post->getPostSuggestByCategory(5);
    $secondPost = $this->post->getPostSuggestByCategory(7);
    $thirdPost = $this->post->getPostSuggestByCategory(6);
    $fourthPost = $this->post->getPostSuggestByCategory(8);
    $top5Product = $this->product->getTop5Product();
    $listCategory = $this->categoryPost->getAll();



    $page = 1;
    


    if(isset($request['page'])){
       $page = (int)$request['page'];
    }
    $totalItem = $this->post->post_count_total();
   
    $limitShow = ITEM_PER_PAGE;
    $offset = ($page - 1) * $limitShow;
    $dataItem = $this->post->getTop10Post($limitShow, $offset);
    //print("<pre>".print_r($dataItem,true)."</pre>");die();
   
    return ($this->loadView('post/new/index', [
       'dataItem' => $dataItem,
      'firstPost' => $firstPost,
      'secondPost' => $secondPost,
      'thirdPost' => $thirdPost,
      'fourthPost' => $fourthPost,
      'top5Product' => $top5Product,
      'listCategory' => $listCategory,
      'page' => $page,
      'limitShow' => $limitShow,
      'totalItem' => $totalItem
    ]));
   }
   public function detailNew($request, $response){
    $firstPost = $this->post->getPostSuggestByCategory(5);
    $secondPost = $this->post->getPostSuggestByCategory(7);
    $thirdPost = $this->post->getPostSuggestByCategory(6);
    $fourthPost = $this->post->getPostSuggestByCategory(8);
    $top5Product = $this->product->getTop5Product();
    $listCategory = $this->categoryPost->getAll();
      $item = $this->post->getBySlug($request[0]['slug']);
      $postPrev = $this->post->getById((int)$item['id'] - 1);
      
    $postSuggest = $this->post->getTop3PostSuggestByCategory($item["category_post_id"]);
    
    return ($this->loadView('post/new/detail', [
      'item' => $item,
      'firstPost' => $firstPost,
      'secondPost' => $secondPost,
      'thirdPost' => $thirdPost,
      'fourthPost' => $fourthPost,
      'top5Product' => $top5Product,
      'listCategory' => $listCategory,
      'postSuggest' => $postSuggest,
      'postPrev' => $postPrev
    
    ]));
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
         if($key != "key" && $key != "page" && $key != "brand" && $key != "price" && $key != "ca" && $key != 'sort'){
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
        $dataAttributeProductTemplate = $dataAttributeProductTemplate . '<li> '.$value['description'].' : <span class="text-get-compare"> '.$value['value'].' </span></li>';
     }
     return $dataAttributeProductTemplate;
   }
   public function getFilter($request, $response){

      
      $platFormSlug = $request[0]['slug'];
      if($platFormSlug == 'tim-kiem' || isset($request['key'])){
         $dataItem = $this->product->getSearchAllByProductName($request['key']);
         $template = "";

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
                  class="app-top-plush-category__add" data-product="'.$value['product_slug'].'" data-category="'.$value['platform_slug'].'" data-name="'.$value['product_name'].'" data-id="'.$value['product_id'].'" data-thumb="'.IMAGE_DIR_PRODUCT.$value['thumb'].'" 
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
           echo  '<div class="app-phone-suggest__product" >' .$template . '</div>';


         die();
         
      }
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
          if($key != "key" && $key != "page" && $key != "brand" && $key != "price" && $key != "ca" && $key != 'sort'){
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
            class="app-top-plush-category__add" data-product="'.$value['product_slug'].'" data-category="'.$value['platform_slug'].'" data-name="'.$value['product_name'].'" data-id="'.$value['product_id'].'" data-thumb="'.IMAGE_DIR_PRODUCT.$value['thumb'].'" 
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
   public function compare($request, $response){
      //var_dump($request[0]['url_first']);die();
      $data = $this->category->selectPlatFormIdByProductSlug($request[0]['url_first']);
     // var_dump($data['id']);
      $iframeAttribute = $this->attribute->getAttributeCategoryByPlatFormId($data['id']);
      //var_dump($iframeAttribute);die();
      $dataFirst = $this->product->getAllAttributeProductByProductSlug($request[0]['url_first']);
      $result1 = [];
      foreach ($dataFirst as $item) {
            if (isset($result1[$item['description']])) {
               $result1[$item['description']]['value'] .= ', ' . $item['value'];
            } else {
               $result1[$item['description']] = $item;
            }
      }


     $result2 = array_values($result1);
     $dataSecond = $this->product->getAllAttributeProductByProductSlug($request[0]['url_second']);
      $result2 = [];
      foreach ($dataSecond as $item) {
            if (isset($result2[$item['description']])) {
               $result2[$item['description']]['value'] .= ', ' . $item['value'];
            } else {
               $result2[$item['description']] = $item;
            }
      }
     $result2 = array_values($result2);

 
     $item1 = $this->product->getProductBySlugMore($request[0]['url_first']);
     $item2 = $this->product->getProductBySlugMore($request[0]['url_second']);
     //print("<pre>".print_r($result1,true)."</pre>");die();
      return ($this->loadView('post/product/compare', [
          'iframeAttribute' => $iframeAttribute,
          'result1' => $result1,
          'result2' => $result2,
          'item1' => $item1,
          'item2' => $item2
         ]));
   }
   public function getCompare($arr, $id){
      foreach($arr as $key => $value){
          if($value['id'] == $id){
            return ($value['value']);
          }
      }
      return ('Chưa xác định');
   }
   
   
}