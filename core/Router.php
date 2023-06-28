<?php

 
 class Router {
    

    public static function handleParamter($firstString, $secondString){
      $arrNewRequest = [];
      $str_arr = explode('/', $firstString);
      $str_arr2 = explode('/', $secondString);
      

     
      foreach($str_arr as $key => $value){
          if (str_contains($value, '{')) { 

              $start =  strpos($value, '{');
              $end = strpos($value, '}');
              if(isset($str_arr2[$key])){
               $arrNewRequest[substr($value,$start + 1, ($end - $start) - 1)] = $str_arr2[$key];
              }
             
          }
      }
      return($arrNewRequest);
    }
    public static function handle($method = 'GET', $path = '/', $controllorName = '', $controllerMethod = ''){
       $currenMethod = $_SERVER['REQUEST_METHOD'];
       
       $currentUri = $_SERVER['REQUEST_URI'];
       $newRequest = false;
      
      
       
       $currentUri = strpos($currentUri, '?') ? substr($currentUri, 0, strpos($currentUri, '?')) : $currentUri;
       $currentUri = ltrim($currentUri , $currentUri[0]);
       if($currenMethod != $method){
         return false;
       }
       if(strpos( $path, '{') !== false && (substr($currentUri,0,(int) strpos( $path, '{')) == substr($path,0,(int) strpos( $path, '{')))){
          $newRequest = ((Router::handleParamter($path, $currentUri)));
          $path = (substr($path,0,(int) strpos( $path, '{')));
          $currentUri = $path;
          array_push($_REQUEST,$newRequest);
       }
       $root = '';
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

        $controllerName =  substr($controllerName , strrpos($controllerName,"/") + 1);
        
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