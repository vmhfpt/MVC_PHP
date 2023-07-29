<?php
require_once("models/introduceModel.php");
require_once("models/categoryModel.php");
require_once("models/productModel.php");
require_once("models/postModel.php");
require_once("models/colorProductModel.php");
require_once("models/couponModel.php");
require_once("models/giftProductModel.php");
require_once("models/addressModel.php");
require_once("models/orderModel.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class cartController extends controller{
    private $address;
    private $coupon;
    private $introduce;
    private $order;
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
       $this->order = new Order();
    }
    public function getProductColorIdByColorCurrent($array, $id){
        foreach($array as $key => $value){
            if($value['attribute_prd_id'] == $id){
                return $value['id'];
            }
        }
        return false;
    }
    public function sendEmail($carts, $urlThumb, $user, $dataOrder, $transportFee, $codeCouPon){
        if(!$codeCouPon){
            $codeCouPon = "Không áp dụng";
        }
        function getAttributeProduct($arr){
            $template = ' ';
            if(isset($arr)){
                foreach($arr as $key => $value){
                    $template = $template . '<span style="margin : 0px 5px;padding : 10px 10px;border : 1px solid orangered">'.$value['name'].' : '.$value['value'].'</span>';
                }
                return ($template);
            }else {
                return '';
            }
        }
        
        function getDataListCouponProduct($arr){
            $template = '';
            foreach($arr as $key => $value){
                $template = $template . '<li class="">'.$value['name'].', code : '.$value['code'].'</li>';
            }
            return $template;
        }
        function getDataListGiftProduct($arr){
            $template = '';
            foreach($arr as $key => $value){
                $template = $template . '<li class="">'.$value['name'].', số lượng : x'.$value['total'].'</li>';
            }
            return $template;
        }
        $dataAllProductGift = $this->coupon->getAllProductGiftByOrderID($dataOrder['id']);
        $dataListCouponProduct = $this->coupon->getAllCouponByOrderDetailID($dataOrder['id']);
        $template = ' ';
        
        foreach($carts as $key => $value){
            $array = [];
            
            if(isset($value['attributePriceCurrent'])){
                $array = $value['attributePriceCurrent'];
            }
            $template = $template . ' <tr>
            <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">'.($key + 1).'</td>
            <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px; "><span class="">'.$value['name'].'</span> '.getAttributeProduct($array).' <span style="margin : 0px 5px;padding : 10px 10px;border : 1px solid orangered">'.$value['colorCurrent']['name'].'</span></td>   
            <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px; "> <img src="'.'http://localhost:84s'.$value['thumb'].'" alt="" style="width : 60px ; height : 60px;"></td>
            <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">'.currency_format($value['priceCurrent']).'</td>
            <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">x '.$value['quantity'].'</td>
           
            </tr>';
        }
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP(); // using SMTP protocol                                     
            $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
            $mail->SMTPAuth = true;  // enable smtp authentication                             
            $mail->Username = 'tuyetnhung200201@gmail.com';  // sender gmail host              
            $mail->Password = 'pevupqufusoaiatg'; // sender gmail host password                          
            $mail->SMTPSecure = 'tls';  // for encrypted connection                           
            $mail->Port = 587;   // port for SMTP     
    
            $mail->setFrom('tuyetnhung200201@gmail.com', "Admin"); // sender's email and name
            $mail->addAddress("vuminhhungltt904@gmail.com", "Don hang");  // receiver's email and name
            $mail->isHTML(true);
            $mail->Subject = 'Chi tiet don hang';
            $mail->Body    = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            
            </head>
            <body>
                <div style="display : flex">
                    <!DOCTYPE html>
                    <html>
                    <head>
                   
                    </head>
                    <body>
                    
                    <div style="width : 100%">
                        <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
                            <tr>
                              <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">STT</th>
                              <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Tên</th>
                              <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Hình</th>
                              <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Giá</th>
                              <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Số lượng</th>
                
                            </tr>
                            
                            '.$template.'
                            
                          </table>
                          <div>
                                <h3 class="">Quà tặng đính kèm</h3>
                                <ul class="">
                                    '.getDataListCouponProduct($dataListCouponProduct).'
                                    '.getDataListGiftProduct($dataAllProductGift).'
                                </ul>
                         </div>
            
                          <div class="">
                              <h2 class="">Thông tin đơn hàng</h2>
                              <span >Tổng tiền : <b class="" style="color : red">'.currency_format($dataOrder['total']).'</b></span>
                              <ul class="">
                                 <li class="">Tên khách hàng : '.$user['name'].'</li>
                                 <li class="">Email : '.$user['email'].'</li>
                                 <li class="">SĐT : '.$user['phone'].'</li>
                                 <li class="">Ghi Chú : '.$user['note'].'</li>
                                 <li class="">Địa chỉ : '.$dataOrder['address_detail'].'</li>
                                 <li class="">Ngày đặt : '.$dataOrder['createdAt'].'</li>
                                 <li class="">Phí vận chuyển : '.$transportFee.'</li>
                                 <li class="">Mã giảm giá áp dụng : '.$codeCouPon.'</li>
                                 <li class="">Mã tra cứu : <b style="color : red">'.$dataOrder['CODE'].'</b></li>
                                 <li class="">Trạng thái : <b style="color : red">Chưa tiếp nhận</b></li>
                              </ul>
                          </div>
                    </div>
            
                    
                    </body>
                    </html>
                </div>
            </body>
            </html>';
    
            $mail->send();
            echo json_encode(
                ['status' => 'success',
                  'name' => $user['name'],
                  'payPhone' => $user['phone'],
                  'email' => $user['email'],
                  'payNote' => $user['note'],
                  'address' => $dataOrder['address_detail'],
                  'date' => $dataOrder['createdAt'],
                  'transportfee' => $transportFee,
                  'coupon' => $codeCouPon,
                  'codeorder' => $dataOrder['CODE'],
                  'total' => $dataOrder['total']

                ]

            );
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function addOrder($user,  $transportFee, $codeCoupon,$total){
         $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
         $dataAddress = $this->address->addressSelectall($user['address_code']['city'], $user['address_code']['district'], $user['address_code']['aware']);
         $fullAddress = $user["address"]. "," . $dataAddress["aware"] . "," . $dataAddress["district"] . "," . $dataAddress["city"];
         $codeOrderRandom = randomCoupon();
         return $this->order->insertAndGetLastId($codeOrderRandom, $user_id, $transportFee, $codeCoupon, $user['note'], $user['email'], $user['name'], $user['phone'], $fullAddress, $total, 6);
         
    }
    public function insertOrderDetail($orderId, $carts){
        try {
            foreach($carts as $key => $value){
        
                $dataItem = $this->product->getByName($value['name']);
                $product_id = $dataItem['id'];
                $listGiftProduct = $this->giftProduct->getGiftProductByProductId($product_id);
                    $productID = $this->getProductColorIdByColorCurrent($value['dataListColorProduct'], $value['colorCurrent']['id']);
                    $total = $value['priceCurrent'];
                    $quantity = $value['quantity'];
                    $orderDetailID = $this->order->insertOrderDetailAndGetLastID($orderId, $productID, (int)$total, (int)$quantity);
                    if(isset($value['attributePriceCurrent'])){
                        foreach($value['attributePriceCurrent'] as $k1 => $attribute){
                            $this->order->insertOrderAttributeProduct($orderDetailID, $attribute['price_attribute_product']);
                        }
                    }
                    if(isset($value['dataListCouponProduct'])){
                        foreach($value['dataListCouponProduct'] as $k2 => $coupon){
                            $this->order->insertOrderCoupon($orderDetailID, $coupon['id']);
                        }
                    }
                    
                    
                    foreach($listGiftProduct as $k3 => $gift){
                        $this->order->insertOrderGift($orderDetailID, $gift['id']);
                    }
                    
        
               }
               return true;
        }catch(Exception $exc){
            return false;
        }

    }
    public function purchaseCart($request, $response){
      // var_dump(  $response['HTTP_HOST']); die();
         $transportFee = (int) $request['transport_fee'];
         $codeCoupon = $request['codeCoupon'];
         $codeCoupon == 'false' ? $codeCoupon = false : $codeCoupon = $codeCoupon ;
        if (true) {
            // $this->insertOrderDetail(true , $request['carts']);
            // die();
            $orderID = $this->addOrder($request['detail_user'], $transportFee , $codeCoupon, $request['total']);
            $insertOrderDetail = $this->insertOrderDetail($orderID , $request['carts']);
            if($insertOrderDetail){
                $dataOrder = $this->order->getOrderById($orderID);
               return $this->sendEmail($request['carts'], $response['HTTP_HOST'], $request['detail_user'], $dataOrder, $transportFee, $codeCoupon);
              
            }else {
                    echo json_encode(
                                ['status' => 'error',
                                'message' => '* Mua hàng thất bại'
                                ]

                            );
            }
        } 
      
       die();
    }
}