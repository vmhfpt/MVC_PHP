<?php
require_once("models/userModel.php");
require_once("models/privilegeModel.php");
class loginController extends controller{
   private $user;
   private $validate;
   private $privilege;
   public function __construct(){
      $this->validate =  new request();
      $this->user  = new User();
      $this->privilege = new Privilege();
   }
   public function logout(){
    session_unset();
    session_destroy();
    header('Location: /admin/login');
   }
   public function login($request, $response){
      return ($this->loadView('admin/authentication/login'));
   }
   public function authen($request, $response){
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
        return ($this->loadView('admin/authentication/login', [
            'errors' => $errors,
            'old_field' => $request
         ]));
      }else {
        $item = $this->user->login($request['email'], md5($request['password']));

        if($item){
            $_SESSION['user'] = $item;
            $data = $this->privilege->getAuthProvileByUser($item['id']);
            $_SESSION['user']['privilege'] = $data;
            header('Location: /admin/product/list/');
        }else {
            return ($this->loadView('admin/authentication/login', [
                'old_field' => $request,
                'status' => '* Email hoặc mật khẩu không chính xác'
             ]));
        }
      }
        
   }
}