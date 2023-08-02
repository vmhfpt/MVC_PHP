<?php
require_once("models/orderModel.php");
require_once("models/productModel.php");
require_once("models/inventoryModel.php");
class orderController extends controller{
    private $order;
    private $product;
    private $inventory;
    public function __construct(){
       $this->order = new Order();
       $this->product = new Product();
       $this->inventory = new Inventory();
    }
    public function checkInventory($request, $response){
        //var_dump($request);
        $dataItem = $this->order->checkInventoryCart($request['id']);
        echo json_encode($dataItem);
    }
    public function getOrderByCode($request, $response){
        $dataItem = $this->order->getAllOrderDetailByOrderCode($request['code']);
        
        $item = $this->order->getOrderByCode($request['code']);
        if(!$dataItem || !$item){
            echo '<span> Rất tiếc chúng tôi không tìm thấy đơn hàng nào có mã như vậy !</span>'; 
            die();
        }


        if ($item['active'] == 6) {
            $active = "Chưa tiếp nhận";
        }
        if ($item['active'] == 5) {
            $active = "Đã tiếp nhận";
        }
        if ($item['active'] == 4) {
            $active = "Đã rời kho";
        }
        if ($item['active'] == 3) {
            $active = "Đang vận chuyển";
        }
        if ($item['active'] == 2) {
            $active = "Đã đến nơi";
        }
        if ($item['active'] == 1) {
            $active = "Hoàn thành";
        }
        if ($item['active'] == 0) {
            $active = "Đã hủy";
        }
        $detail = ' <div class="order-information-result">
        <ul>
             <li> <b>Họ Tên</b> : '.$item['name'].'</li>
             <li> <b>Email</b> : '.$item['email'].'</li>
             <li> <b>SĐT</b> : '.$item['phone_number'].'</li>
             <li> <b>Địa chỉ</b> : '.$item['address_detail'].'</li>
             <li> <b>Tổng tiền</b> : '.currency_format($item['total']).'</li>
             <li> <b>Ngày đặt</b> : '.$item['createdAt'].'</li>
             <li> <b>Ghi chú</b> : '.$item['note'].'</li>
             <li> <b>Trạng thái</b> : '.$active.'</li>
        </ul>
     </div>';
        $template = "";
        foreach($dataItem as $key => $value){
            $template = $template . '<tr>
            <td>'.($key + 1).'</td>
            <td>'.$value['name'].'</td>
            <td><img src="'.IMAGE_DIR_PRODUCT.$value['thumb'].'" style="width : 70px ; heigt : 70px;" /></td>
            <td>'.$value['quantity'].'</td>
            <td>'.currency_format($value['total'] * $value['quantity']).'</td>
        </tr>';
        }
        echo '<div class="app-chat__detail-item ">
        <div class="app-chat__detail-someone">
            
            <div>
                <div class="app-chat__detail-someone-name"><span>Hệ thống</span></div>
                <div class="app-chat__detail-someone-content">
                <span>


                    <div class="chatbot-result"> 
                    <table>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Hình</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            
        </tr>
        '.$template.'
        
        </table> '. $detail . ' </div>
    
        
        </span>
        
        </div>
   </div>
</div>
<div class="app-chat__detail-someone-date-someone">
   <div><span class="time-current" >Ngay lúc này</span></div>
</div>
</div>';
    }
    public function renderAttributePriceProduct($order_detail_id){
        $template = "";
        foreach($this->product->getAttributePriceProductByOrderDetailID($order_detail_id) as $key => $value ){
            $template = $template . '<li>'.$value['description'].': '.$value['value'].' </li>';
        }
        return($template);
    }
    public function getListOrderDetail($request, $response){
        
        function checkDelete($active, $total, $id, $name){
            if($active == 6){
                return '<td class="app-user-content__table-btn-delete"><i class="fa fa-trash click-btn-delete" data-price="'.$total.'" data-item="'.$id.'" data-name="'.$name.'" aria-hidden="true"></i></td>';
            }
        }
        $template = "";
        $activeOrder = "";
        $cancelOrder = "";
        $item = $this->order->getOrderById($request['id']);
        if ($item['active'] == 6) {
            $cancelOrder  = "<li> <button class='btn-cancel-order' >Hủy đơn hàng  </button></li>";
            $activeOrder =  "Chưa tiếp nhận";
        }
        if ($item['active'] == 5) {
            $activeOrder = "Đã tiếp nhận";
        }
        if ($item['active'] == 4) {
            $activeOrder = 'Đã rời kho';
        }
        if ($item['active'] == 3) {
            $activeOrder = 'Đang vận chuyển';
        }
        if ($item['active'] == 2) {
            $activeOrder = 'Đã đến nơi';
        }
        if ($item['active'] == 1) {
            $activeOrder = 'Hoàn thành';
        }
        if ($item['active'] == 0) {
            $activeOrder = 'Đã hủy';
        }
        $dataItem = $this->order->getAllOrderDetailByOrderID($request['id']);
         //print("<pre>".print_r($item,true)."</pre>");
         foreach($dataItem as $key => $value){
            $template = $template . '<tr id="data-delete-'.$value['id'].'">
            <td>#'.($key+1).'</td>
            <td>'.$value['name'].'</td>
            <td>'.$value['value'].'</td>
            <td><img src="'.IMAGE_DIR_PRODUCT.$value['thumb'].'" alt="" /></td>
            <td><ul>'.$this->renderAttributePriceProduct($value['id']).' </ul></td>
            <td>'.currency_format($value['total']).'</td>
            <td>'.$value['quantity'].'</td>
            <td>'.currency_format($value['total'] * $value['quantity']).'</td>
            '.checkDelete($item['active'], ($value['total'] * $value['quantity']),$value['id'], $value['name'] ).'
          </tr>';
         }
         $templateDetailBill = '<ul class="detail-bill"> 
         <li> <b> Mã đơn hàng :</b>  <i> '.$item['CODE'].'</i> </li>
         <li> <b> Họ Tên :</b>  <i> '.$item['name'].'</i> </li>
         <li> <b> Số điện thoại:</b>  <i> '.$item['phone_number'].'</i> </li>
         <li> <b> Địa chỉ nhận hàng :</b>  <i> '.$item['address_detail'].'</i> </li>
         <li> <b> Ghi chú :</b>  <i> '.$item['note'].'</i> </li>
         <li> <b> Ngày đặt :</b>  <i> '.$item['createdAt'].'</i> </li>
         <li> <b> Trạng thái :</b>  <i>'.$activeOrder.' </i> </li>
         <li> <b> Tổng tiền :</b>  <i>'.currency_format($item['total']).' </i> </li>
         <li> <b> Tạm tính lại :</b>  <i class="bill-red" data-total="'.$item['total'].'"> '.currency_format($item['total']).'</i> </li>
         '.$cancelOrder.'
       </ul>';
         
         echo '<table>
         <tr>
           <th>STT</th>
           <th>Tên</th>
           <th>Màu</th>
           <th>Ảnh</th>
           <th>Phân loại</th>
           <th>Giá</th>
           <th>Số lượng</th>
           <th>Tổng tiền</th>
           <th></th>
         </tr>' . $template . '</table>' . $templateDetailBill ;
    }
    public function deleteItem($request, $response){
        //array(4) { ["type"]=> string(4) "POST" ["id"]=> string(3) "196" ["order_id"]=> string(2) "72" ["price"]=> string(8) "38060000" }
       
        $allOrderDetail = $this->order->getAllOrderDetailByOrderID($request['order_id']);
        
        if((count($allOrderDetail) - 1 != 0)){
            $item = $this->order->getOrderDetainById($request['id']);
            //print("<pre>".print_r($allOrderDetail,true)."</pre>");
            //print("<pre>".print_r($item,true)."</pre>");die();
            $this->inventory->decreateQuantityTempOrder($item['quantity'], $item['product_id']);
            $this->order->updateTotalOrderWhenDeleteOrderDetail($request['price'], $request['order_id']);
            $this->order->deleteOrderDetail($item['id']);
            echo json_encode([
                'status' => 'success',
                'message' => 'Xóa sản phẩm thành công'
            ]);
        }else {
            echo json_encode([
                'status' => 'error',
                'message' => '* Cần ít nhất một sản phẩm trong đơn hàng'
            ]);
        }
    }
}



                                      

                                        
                                    
                                   