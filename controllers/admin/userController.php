<?php
require_once("models/userModel.php");
class userController extends controller{
   private $user;
   private $validate;
   public function __construct(){
      $this->validate =  new request();
      $this->user  = new User();
   }
    public function add(){
        return ($this->loadView('admin/user/add'));
     }
     public function index(){
        $dataItem = $this->user->getAll();
        return ($this->loadView('admin/user/list',['dataItem' => $dataItem]));
     }
     public function edit($request, $response){
        $id = ($request[0]['id']);
        $item = $this->user->getById($id);
        return ($this->loadView('admin/user/edit', [
           'item' => $item,
        ]));
     }
     public function create($request, $response){
     
        $this->validate->passField($request);
        $this->validate->rule([
          'phone_number' => 'phone_number|require',
          'password' => 'password|require',
          'confirm_password' => 'confirm_password|password|require',
          'email' => 'unique:user|email|require',
          'name' => 'max:30|name|require',
          'image' => 'file:validate_file'
        ]);
        $this->validate->validate([
           'phone_number.phone_number' => '* Số điện thoại không hợp lệ',
           'phone_number.require' => '* Số điện thoại không được để trống',
           'password.password' => '* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số',
           'password.require' => '* Mật khẩu không được để trống',
           'confirm_password.password' => '* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số',
           'confirm_password.require' => '* Mật khẩu không được để trống',
           'confirm_password.confirm_password' => '* Mật khẩu nhập lại không khớp',
           'email.email' => '* Email Không hợp lệ',
           'email.unique' => '* Email đã tồn tại',
           'email.require' => '* Email không được để trống',
           'name.max' => '* Tên không được vượt quá 30 ký tự',
           'name.name' => '* Tên khách hàng phải từ 2 đến 30 ký tự trở lên và không chứa ký tự đặc biệt',
           'name.require' => '* Tên khách hàng không được để trống',
           
        ]);
        $errors = ($this->validate->message());

        if($errors){
         return ($this->loadView('admin/user/add', [
            'errors' => $errors,
            'old_field' => $request
         ]));
        }else {
         isset($request['active']) ? $active = 0 :  $active = 1;
          $image = '';
          if($_FILES['image']['size'] != 0) {
             $image = save_file($_FILES['image'], UPLOAD_URL_USER);
          }
         $this->user->insert($request['name'], $request['email'], md5($request['password']), $image, $request['phone_number'],NULL, NULL, 1, $active, $request['role']);
         $dataItem = $this->user->getAll();
         return ($this->loadView('admin/user/list' , [
            'status' => "Thêm thành công người dùng : " . $request['name'],
            'dataItem' => $dataItem
         ]));
        }
     }
     public function update($request, $response){
      $id = ($request[0]['id']);
      isset($request['active']) ? $request['active'] = 0 :  $request['active'] = 1;
      
      $this->validate->passField($request);
      $this->validate->rule([
        'phone_number' => 'phone_number|require',
        'password' => 'password|require',
        'confirm_password' => 'confirm_password|password|require',
        'email' => 'email|require',
        'name' => 'max:30|name|require',
        'image' => 'file:validate_file'
      ]);
      $this->validate->validate([
         'phone_number.phone_number' => '* Số điện thoại không hợp lệ',
         'phone_number.require' => '* Số điện thoại không được để trống',
         'password.password' => '* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số',
         'password.require' => '* Mật khẩu không được để trống',
         'confirm_password.password' => '* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số',
         'confirm_password.require' => '* Mật khẩu không được để trống',
         'confirm_password.confirm_password' => '* Mật khẩu nhập lại không khớp',
         'email.email' => '* Email Không hợp lệ',
         'email.unique' => '* Email đã tồn tại',
         'email.require' => '* Email không được để trống',
         'name.max' => '* Tên không được vượt quá 30 ký tự',
         'name.name' => '* Tên khách hàng phải từ 2 đến 30 ký tự trở lên và không chứa ký tự đặc biệt',
         'name.require' => '* Tên khách hàng không được để trống',
         
      ]);
      $errors = ($this->validate->message());
      if($errors){
         $request['image'] = $request['old_image'] ;
         return ($this->loadView('admin/user/edit', [
            'errors' => $errors,
            'item' => $request
         ]));
      }else {
         try {
          $image = $request['old_image'];
          if($_FILES['image']['size'] != 0) {
             $image = save_file($_FILES['image'], UPLOAD_URL_USER);
             if($request['old_image'])  unlink(UPLOAD_URL_USER.$request['old_image']);
          }
          $this->user->update($request['name'], $request['email'], md5($request['password']), $image, $request['phone_number'], NULL, NULL, 1, $request['active'], $request['role'], $id);
          header('Location: /admin/user/list');
         }catch(Exception $exc){
            return ($this->loadView('admin/user/edit', [
               'errors' => ["email" => 'Email đã tồn tại'],
               'item' => $request
            ]));
         }
      }
     }
     public function destroy($request, $response){
      try{
         foreach($request['arr'] as $key => $value){
            $item = $this->user->getById($value);
            if($item['image'])  unlink(UPLOAD_URL_USER.$item['image']);
            $this->user->delete($value);
         }
         echo json_encode(['status' => 'success']);
        }catch(Exception $exc){
          echo json_encode([
           'status' => 'error',
           'detal' => $exc
         ]);
        }
   }
}
?>