<?php
require_once("models/userModel.php");
require_once("models/orderModel.php");
require_once("models/productModel.php");
require_once("models/commentModel.php");
class homeController extends controller{
   private $user;
   private $order;
   private $product;
   private $validate;
   private $comment;
 
   public function __construct(){
      $this->order = new Order();
      $this->user  = new User();
      $this->product = new Product();
      $this->comment = new Comment();
   }
   public function index(){
      $chartArea = $this->order->statisticOrderTypeAreaChart();

      $orderStatistic = $this->order->orderStatisticGet();
      $orderSuggest = $this->order->orderSelectSuggest();
      $userSuggest = $this->user->selectTopNewUsers();
      $productSuggest = $this->product->getProductNewAdd();
      $commentSuggest = $this->comment->commentGetTop5();
      $totalSuccess = 0;
      $totalPending = 0;
      $totalCancel = 0;
      $totalRevenue = 0;
      $deliver = 0;
      $arrival = 0;
      $leaveWareHouse = 0;
      $receive = 0;
      $notReceive = 0;

      $dataItem = $this->product->statisticProduct();
      $arrBgr = ["#0074D9", "#FF4136", "#2ECC40",
      "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00",
      "#001f3f", "#39CCCC", "#01FF70", "#85144b",
      "#F012BE", "#3D9970", "#111111", "#AAAAAA"];

      foreach ($orderStatistic as $key => $value) {
         if ($value['active'] == 1) {
            $totalSuccess = $totalSuccess + $value['total'];
         }
         if ($value['active'] != 1 && $value['active'] != 0) {
            $totalPending = $totalPending + $value['total'];
         }
         if ($value['active'] == 0) {
            $totalCancel = $totalCancel + $value['total'];
         }
         if ($value['active'] == 2) {
            //da den noi
            $arrival = $value['total'];
         }
         if ($value['active'] == 3) {
            // dang van chuyen
            $deliver = $value['total'];
         }
         if ($value['active'] == 4) {
            // da roi kho
            $leaveWareHouse = $value['total'];
         }
         if ($value['active'] == 5) {
            // đa tiep nhan
            $receive =  $value['total'];
         }
         if ($value['active'] == 6) {
            // chua tiep nhan
            $notReceive = $value['total'];
         }

         $totalRevenue = $totalRevenue + $value['total_price'];
      }
    return ($this->loadView('admin/home', [
       'chartArea' => $chartArea,
       'orderStatistic' => $orderStatistic,
       'userSuggest' => $userSuggest,
       'productSuggest' => $productSuggest,
       'commentSuggest' => $commentSuggest,
       'orderSuggest' => $orderSuggest,
       "totalSuccess" => $totalSuccess,
      "totalPending" => $totalPending,
      "totalCancel" => $totalCancel,
      "totalRevenue" => $totalRevenue,
      "arrival" => $arrival,
      "deliver" => $deliver,
      "leaveWareHouse" => $leaveWareHouse,
      "receive" => $receive,
      "notReceive" => $notReceive,
      'dataItem' => $dataItem,
      "arrBgr" => $arrBgr
   
    ]));
   }
}