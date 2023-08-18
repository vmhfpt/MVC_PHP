<?php

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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
require_once("models/orderModel.php");



class userController extends controller{
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
    private $validate;
    private $order;
    public function __construct(){
       $this->order = new Order();
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
        $this->validate =  new request();
    }
    public function login($request, $response){
        $fb = new Facebook(array(
            'app_id' => '540652344880063',
            'app_secret' => '259436cafd3faacc91f51fc61a7621a2',
            'default_graph_version' => 'v3.2',
          ));
          $helper = $fb->getRedirectLoginHelper();
          $permissions = ['email']; // Optional permissions
        $loginURL = $helper->getLoginUrl('http://localhost:84/login', $permissions);
        $client = new Google_Client();
  
  
        $client->setClientId('361358319183-iruhsb51i3uublcu06dfp5gmqj42o5ga.apps.googleusercontent.com');
       // Enter your Client Secrect
       $client->setClientSecret('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');
       // Enter the Redirect URL
       $client->setRedirectUri('http://localhost:84/login');
    
       // Adding those scopes which we want to get (email & profile Information)
       $client->addScope("email");
       $client->addScope("profile");
        $this->validate->rule([
            'password' => 'password|require',
            'email' => 'email|require',
          ]);
          $this->validate->validate([
             'password.password' => '* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số',
             'password.require' => '* Mật khẩu không được để trống',
             'email.email' => '* Email Không hợp lệ',
             'email.require' => '* Email không được để trống',
          ]);
          $errors = ($this->validate->message());
  
          if($errors){
           
            return ($this->loadView('post/user/login', [
                'errors' => $errors,
                'old_field' => $request,
                'client' => $client, 
                'loginURL' => $loginURL
             ]));
          }else {
            $check = $this->user->login($request['email'], md5($request['password']));
            if($check){
                  if(isset($request['remember'])){
                    add_cookie("user", ["email" => $request['email'], "password" => $request['password']], 3);
                  }else {
                    delete_cookie("user");
                  }
                  $_SESSION['user'] =  $check;
                  $data = $this->privilege->getAuthProvileByUser( $check['id']);
                  $_SESSION['user']['privilege'] = $data;
                  header('Location: dashboard');
            }else {
                return ($this->loadView('post/user/login', [
                    'message' => "Email hoặc mật khẩu không chính xác",
                    'client' => $client, 
                    'loginURL' => $loginURL
                 ]));
            }
            
          }
    }
    public function authenticationForcePassWord($request, $response){
        $email = $request['email'];
       $data = $this->user->checkForceEmail($request['email']);
       if($data){
        $mail = new PHPMailer(true);
        try {
          $otp =  mt_rand(100000, 999999);
          $mail->isSMTP(); // using SMTP protocol                                     
          $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
          $mail->SMTPAuth = true;  // enable smtp authentication                             
          $mail->Username = 'vuminhhungltt904@gmail.com';  // sender gmail host              
          $mail->Password = 'riskxnwsapyjcqfr'; // sender gmail host password                          
          $mail->SMTPSecure = 'tls';  // for encrypted connection                           
          $mail->Port = 587;   // port for SMTP     

          $mail->setFrom('vuminhhungltt904@gmail.com', "Admin"); // sender's email and name
          $mail->addAddress($email, "Xác thực OTP!");  // receiver's email and name

          $mail->Subject = 'Forget Password';
          $mail->Body    = 'Mã OTP khôi phục mật khẩu cho ' . $email . ': ' . $otp;

          $mail->send();
          $_SESSION["force_user"] =  [
            'id' => $data['id'],
            'otp' =>  $otp,
            'email' => $email
          ];
          echo json_encode([
            'status' => 'success',
            'message' => 'send OTP  success'
          ]);
        } catch (Exception $e) { // handle error.
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
       }else {
          echo json_encode([
            'status' => 'error',
            'message' => '* Địa chỉ email chưa được đăng ký'
          ]);
       }
    }
    public function getPassWord($request, $response){
        if ($_SESSION["force_user"]["otp"] == $request['otp'] && $_SESSION["force_user"]["email"] == $request['email']) {
            //khach_hang_update_password($_POST['password'], $_SESSION["force_user"]["id"],$_SESSION["force_user"]["email"] );
            $this->user->updatePassword(md5($request['password']),  $_SESSION["force_user"]["id"]);
            unset($_SESSION["force_user"]);
            unset($_SESSION["user"]);
            echo json_encode([
              'status' => 'success',
              'message' => '* Đổi mật khẩu thành công'
            ]);
          } else {
            echo json_encode([
              'status' => 'error',
              'message' => '* Mã OTP không khớp'
            ]);
          }
    }
    public function register($request, $response){
      $this->validate->rule([
        'password' => 'password|require',
        'email' => 'unique:user|email|require',
        'name' => 'max:30|name|require',
      ]);
      $this->validate->validate([
         'password.password' => '* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số',
         'password.require' => '* Mật khẩu không được để trống',
         'email.email' => '* Email Không hợp lệ',
         'email.unique' => '* Email đã có người đăng ký',
         'email.require' => '* Email không được để trống',
         'name.max' => '* Tên không được vượt quá 30 ký tự',
         'name.name' => '* Tên khách hàng phải từ 2 đến 30 ký tự trở lên và không chứa ký tự đặc biệt',
         'name.require' => '* Tên khách hàng không được để trống',
      ]);
      $errors = ($this->validate->message());

      if($errors){
        return ($this->loadView('post/user/register', [
          'errors' => $errors,
          'old_field' => $request,
         // 'client' => $client, 
          //'loginURL' => $loginURL
       ]));
      }else {
         $userId = $this->user->register($request['name'], $request['email'], md5($request['password']));
         $dataUser = $this->user->getById($userId);
         $_SESSION['user'] = $dataUser;
         $_SESSION['user']['privilege'] = [];
         header('Location: dashboard');
      }
    }
    public function logout($request, $response){
      session_unset();
      session_destroy();
      header('Location: login');
    }
    public function update($request, $response){
      $user = $_SESSION['user'];
      $this->validate->rule([
        'phone_number' => 'phone_number|require',
        'password' => 'password|require',
        'email' => 'email|require',
        'name' => 'max:30|name|require',
        'image' => 'file:validate_file'
      ]);
      $this->validate->validate([
         'phone_number.phone_number' => '* Số điện thoại không hợp lệ',
         'phone_number.require' => '* Số điện thoại không được để trống',
         'password.password' => '* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số',
         'password.require' => '* Mật khẩu không được để trống',
         'email.email' => '* Email Không hợp lệ',
         'email.require' => '* Email không được để trống',
         'name.max' => '* Tên không được vượt quá 30 ký tự',
         'name.name' => '* Tên khách hàng phải từ 2 đến 30 ký tự trở lên và không chứa ký tự đặc biệt',
         'name.require' => '* Tên khách hàng không được để trống',
         
      ]);
      $errors = ($this->validate->message());

      if($errors){
           return ($this->loadView('post/user/dashboard', [
          'errors' => $errors,
          'old_field' => $request,
          'user' => $user
       ]));
      }else {
        //var_dump($request);die();
        try {
          $image = $request['old_image'];
          if($_FILES['image']['size'] != 0) {
             $image = save_file($_FILES['image'], UPLOAD_URL_USER);
             if($request['old_image'] && $request['old_image'] != '')  unlink(UPLOAD_URL_USER.$request['old_image']);
          }
      
          $this->user->updateUser($request['name'], $request['email'], md5($request['password']), $image, $request['phone_number'], $request['id']);
          
          $dataUser = $this->user->getById($request['id']);
          $_SESSION['user'] = $dataUser;
          $data = $this->privilege->getAuthProvileByUser($dataUser['id']);
          $_SESSION['user']['privilege'] = $data;
          $user = $_SESSION['user'];
         
          return ($this->loadView('post/user/dashboard', [
             'message' => "Cập nhật thành công",
             'user' => $user
         ])); 
         }catch(Exception $exc){
            return ($this->loadView('post/user/dashboard', [
               'errors' => ["email" => 'Email đã tồn tại'],
               'user' => $user
            ])); 
         }
      }
    }
    public function getListOrder($request, $response){
      $user = $_SESSION['user'];
      $dataItem = $this->order->getOrderByUserId($user['id']);
      return ($this->loadView('post/user/order', [
        'user' => $user,
        'dataItem' => $dataItem 
     ]));
    }
}