<?php

 
 class Router {
    
    public static function handle($method = 'GET', $path = '/', $controllorName = '', $controllerMethod = ''){
       $currenMethod = $_SERVER['REQUEST_METHOD'];
       
       $currentUri = $_SERVER['REQUEST_URI'];

       
       $currentUri = strpos($currentUri, '?') ? substr($currentUri, 0, strpos($currentUri, '?')) : $currentUri;
       
      
       if($currenMethod != $method){
         
         return false;
       }
       $root = '/';
       $pattern = '#^'.$root.$path.'$#siD';
       if(preg_match( $pattern,  $currentUri)){
         $request = new request();
         $request->setRequest($controllorName, $controllerMethod);
        
        $controllerName = $request->controller ;
        $methodName = $request->method;
         
        
        if(!file_exists('./controllers/'.$controllerName.'.php')){
           show404Error();
        }
        require('controllers/'.$controllerName.'.php');
        
        $controller = new $controllerName();
        
        if(!method_exists($controller, $methodName)){
            show404Error();
        }
        
        $controller->{$methodName}($_REQUEST, $_SERVER);

         exit();
       }
       return false;
    }

}
?>