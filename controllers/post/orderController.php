<?php
require_once("models/orderModel.php");

class orderController extends controller{
    private $order;
    public function __construct(){
       $this->order = new Order();
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
}



                                      

                                        
                                    
                                   