<?php
class request {
    public $controller = 'defaultController';
    public $method = 'index';


    private $rule = [];
    private $field = false;
    private $messageError = false;

    
    public function setRequest($controller, $method){
      $this->controller = $controller;
      $this->method = $method;
    }
    public function post($name){
        return $_POST[$name] ?? null;
    }
    public function get($name){
        return $_GET[$name] ?? null;
    }
    public function getFile($name){
        return $_FILES[$name] ?? null;
    }
    public function getRequest(){
        return $_REQUEST;
    }
    

    
    public function rule($rule = []){
      return $this->rule = $rule;
    }
    public function validate($validate = []){
        $error = false;
        $dataField = $this->field;
        if(!$dataField) $dataField = $this->getRequest();
      
        $rule = $this->rule;
        
        foreach($rule as $key => $value){
          
            $typeRule = explode('|',  $value);

          
              foreach($typeRule as $eachTypeRule){
                $filterRule = explode(':',  $eachTypeRule);
                if(isset($dataField[$key]) || isset($_FILES[$key])){
                    if(count($filterRule) == 1){
                        if($eachTypeRule == 'phone_number'){ 
                            $regexRequire = '/^[0-9]{10}+$/';
                            if(!preg_match($regexRequire, $dataField[$key])){
                               $error[$key] = $validate[$key . '.'. $eachTypeRule];
                            }  
                        }
                        if($eachTypeRule == 'name'){
                            $regexName = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
                            if (!preg_match($regexName, $dataField[$key])) {
                                $error[$key] = $validate[$key . '.'. $eachTypeRule];
                            }
                        }
                        if($eachTypeRule == 'email'){
                            $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                            if (!preg_match($regexEmail, $dataField[$key])) {
                                $error[$key] = $validate[$key . '.'. $eachTypeRule];
                            }
                            
                        }
                        
                        if($eachTypeRule == 'require'){ 
                           $regexRequire = '/[\s\S]/';
                           if(!preg_match($regexRequire, $dataField[$key])){
                              $error[$key] = $validate[$key . '.'. $eachTypeRule];
                           }
                           
                        }
                        if($eachTypeRule == 'confirm_password'){ 
                            if($dataField[$key] != $dataField['password']){
                               $error[$key] = $validate[$key . '.'. $eachTypeRule];
                            }
                            
                         }
                        
                        if($eachTypeRule == 'password'){
                            $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
                            if (!preg_match($regexPassword, $dataField[$key])) {
                                $error[$key] = $validate[$key . '.'. $eachTypeRule];
                            }
                            
                        }
                        if($eachTypeRule == 'price'){
                            $regexPrice = '/^[0-9]{2,}$/';
                            if (!preg_match($regexPrice, $dataField[$key])) {
                                $error[$key] = $validate[$key . '.'. $eachTypeRule];
                            }
                            
                        }
                    }else {
                        if($filterRule[0] == 'min'){
                            if(strlen($dataField[$key]) < (int)$filterRule[1]){
                                $error[$key] = $validate[$key . '.'. $filterRule[0]];
                            }
                        }else if($filterRule[0] == 'max'){
                            if(strlen($dataField[$key]) > (int)$filterRule[1]){
                                $error[$key] = $validate[$key . '.'. $filterRule[0]];
                            }
                        }else if($filterRule[0] == 'unique'){
                            require_once('models/'.$filterRule[1]."Model").'.php';
                            $modelName = $filterRule[1];
                            $model = new $modelName();
                            if($model->check_unique($dataField[$key])){
                                $error[$key] = $validate[$key . '.'. $filterRule[0]];
                            }
                        }else if($filterRule[0] == 'file'){
                            if($filterRule[1] == 'require_file'){ 
                                 $file = $this->getFile($key);
                                  if($file['size'] != 0) {
                                    $checkFile = $this->validateUploadFile($file);
                                    if($checkFile){
                                        $error[$key] = $checkFile;
                                    }
                                  } else {
                                    $error[$key] = $validate[$key . '.'. $filterRule[0]];
                                  }
                            } else if($filterRule[1] == 'validate_file'){
                                
                                 $file = $this->getFile($key);
                                 if($file['size'] != 0) {
                                    $checkFile = $this->validateUploadFile($file);
                                    if($checkFile){
                                        $error[$key] = $checkFile;
                                    }
                                  } 
                            }
                        }
                    }
                }
              }
           
            
        }
        return $this->messageError = $error;

    }
    public function message(){
      return $this->messageError;
    }
    public function passField($field){
      $this->field = $field;
    }
    public function validateUploadFile($file) {
        if ($file['size'] > 15 * 1024 * 1024) { // 2Mb = 2 * 1024kb * 1024 bite 
            return ("* File vượt quá 15Mb");
        }
        $validTypes = array('jpg', 'jpeg', 'png', 'bmp');
        $fileType = substr($file['name'], strrpos($file['name'], ".") + 1) ;
        if (!in_array($fileType, $validTypes)) {
           return ('* File chỉ hỗ trợ định dạng jpg, jpeg, png, bmp') ;
        }
       return (false) ;
    }
    
   
}

?>