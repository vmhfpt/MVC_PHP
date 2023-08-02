<?php
require_once("models/userModel.php");
require_once("models/orderModel.php");
require_once("models/productModel.php");
require_once("models/inventoryModel.php");
class inventoryController extends controller{
   private $user;
   private $order;
   private $product;
   private $validate;
   private $inventory;
 
   public function __construct(){
      $this->inventory = new Inventory();
      $this->order = new Order();
      $this->user  = new User();
      $this->product = new Product();
      
   }
   public function index($request, $response){
      $dataItem = $this->inventory->getAllInventory();
      return ($this->loadView('admin/inventory/list', ['dataItem' => $dataItem]));
   }
   public function add($request, $response){
       //var_dump($request);
       $addressInventory = $this->inventory->getAllAddressInventory();
       $listProduct = $this->product->getAll();
       return ($this->loadView('admin/inventory/add', [
         'listProduct' => $listProduct,
         'addressInventory' => $addressInventory
      ]));
   }
   public function create($request, $response){
      $dataItem = $this->inventory->getInventoryByColorProductAndProductId($request['product_id'],$request['color_product_id']);
      if($dataItem){
         //var_dump($dataItem);
         $this->inventory->increateQuantityInitAndQuantityCurrent($request['quantity'], $request['color_product_id']);
         $this->inventory->insertInventoryHistory($dataItem['id'], $dataItem['quantity_in_inventory'], 2,$request['quantity'], 0, $_SESSION['user']['id'] );
      }else {
          $inventoryID = $this->inventory->create($request['product_id'], $request['color_product_id'], $request['quantity'], $request['inventory_address']);
       $this->inventory->insertInventoryHistory($inventoryID, 0, 2,$request['quantity'], 0, $_SESSION['user']['id'] );
      }
      $dataItems = $this->inventory->getAllInventory();
      return ($this->loadView('admin/inventory/list', ["status" => ' Thêm thành công', 'dataItem' => $dataItems]));
      // var_dump($inventoryID);
   }
   public function getAllHistoryByInventoryID($request, $response){
     // var_dump($request);die();
      $dataItem = $this->inventory->getAllHistoryInventoryByInventoryID($request['id']);
      echo json_encode($dataItem);
   }
   public function edit($request, $response){
      $item = $this->inventory->getInventoryByID($request[0]['id']);
      $dataAddress = $this->inventory->getAllAddressInventory();
     // var_dump($dataAddress);
      //print("<pre>".print_r( $item,true)."</pre>");die();
      return ($this->loadView('admin/inventory/edit', [
         'item' => $item,
         'dataAddress' => $dataAddress
      ]));
   }
   public function update($request, $response){
      //print("<pre>".print_r( $request,true)."</pre>");die();
      $item = $this->inventory->getInventoryByID($request[0]['id']);
     // print("<pre>".print_r( $item,true)."</pre>");die();
      $type = false;
      if($request['quantity_in_inventory'] < $item['quantity_in_inventory']){
         $type = 'decreate';
      }else if($request['quantity_in_inventory'] > $item['quantity_in_inventory']){
         $type = 'increate';
      }
      if($type == 'increate'){
          $quantity = (int) $request['quantity_in_inventory'] - (int) $item['quantity_in_inventory'];
          //var_dump($quantity);
          $this->inventory->increateQuantityInitAndQuantityCurrent($quantity,$item['color_id']);
          $this->inventory->insertInventoryHistory($request[0]['id'],$item['quantity_in_inventory'], 2, $quantity, 0, $_SESSION['user']['id']);
      }else if($type == 'decreate'){
         $quantity =  (int) $item['quantity_in_inventory'] - (int) $request['quantity_in_inventory'];
         //var_dump($quantity);
         $this->inventory->decreateQuantityInitAndQuantityCurrent($quantity,$item['color_id']);
         $this->inventory->insertInventoryHistory($request[0]['id'],$item['quantity_in_inventory'], 1, 0, $quantity, $_SESSION['user']['id']);
      }

      $typeQuantityProductError = false;
      if($request['quantity_product_error'] > $item['quantity_product_error']){
         $typeQuantityProductError = 'increate';
      }else if($request['quantity_product_error'] < $item['quantity_product_error']){
         $typeQuantityProductError = 'decreate';
      }

      if($typeQuantityProductError == 'increate'){
         $quantity = (int) $request['quantity_product_error'] - (int)$item['quantity_product_error']; 
         $this->inventory->increateQuantityProductError($quantity, $item['color_id']);
         $this->inventory->decreateQuantityInventoryCurrent($quantity, $item['color_id']);
      }else if($typeQuantityProductError == 'decreate'){
         $quantity =  (int)$item['quantity_product_error'] -(int) $request['quantity_product_error']; 
         $this->inventory->decreateQuantityProductError($quantity, $item['color_id']);
         $this->inventory->increateQuantityInventoryCurrent($quantity, $item['color_id']);
      }
      $item = $this->inventory->getInventoryByID($request[0]['id']);
      $dataAddress = $this->inventory->getAllAddressInventory();
     // var_dump($dataAddress);
      //print("<pre>".print_r( $item,true)."</pre>");die();
      return ($this->loadView('admin/inventory/edit', [
         'item' => $item,
         'dataAddress' => $dataAddress,
         'status' => ' Cập nhật thành công'
      ]));
      
   }
}
?>