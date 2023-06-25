<?php
class request {
    public $controller = 'defaultController';
    public $method = 'index';
   
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
   
}

?>