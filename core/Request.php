<?php
class request {
    public $controller = 'defaultController';
    public $method = 'index';


    private $rule = [];
    private $field = [];
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

    
    public function rule($rule = []){
      return $this->rule = $rule;
    }
    public function validate($validate = []){
        $error = false;
        $dataField = $this->field;
      
        $rule = $this->rule;
        foreach($rule as $key => $value){
          
            $typeRule = explode('|',  $value);

          
              foreach($typeRule as $eachTypeRule){
                $filterRule = explode(':',  $eachTypeRule);
                if(isset($dataField[$key])){
                    if(count($filterRule) == 1){
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
                        if($eachTypeRule == 'password'){
                            $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
                            if (!preg_match($regexPassword, $dataField[$key])) {
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
    
   
}

?>