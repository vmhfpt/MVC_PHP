<?php

class testController extends controller{
    public function test(){
        $req = new request();
        $req->passField([
          'email' => 'vuminhungltt904@gmail.com',
          'password' => '123456789Hv',
          'name' => 'Điện thoại fd',
          'number' => 'fdsd',
          'phone' => '035993290'

        ]);
        $req->rule([
          'email' => 'email|require',
          'password' => 'password|require',
          'name' => 'unique:category|require',
          'number' => 'min:3|max:5|require',
          'phone' => 'phone_number'
        ]);
        $req->validate([
           'phone.phone_number' => 'Số điện thọại không hợp lệ',
           'number.require' => 'Number không được để trống',
           'number.min' => 'Ít nhất phải có 3 ký tự',
           'number.max' => 'Không vượt quá 5 ký tự',
           'name.require' => 'Tên không được để trống',
           'name.unique' => 'Tên đã tồn tại',
           'email.require' => 'Email không được để trống',
           'email.email' => 'Email không đúng định dạng',
           'password.require' => 'Mật khẩu không được để trống',
           'password.password' => '* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số'
        ]);
        
        

        $errors = ($req->message());
        var_dump($errors);
    }
}
?>