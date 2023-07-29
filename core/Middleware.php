<?php

class Middleware {
    public static function auth($next, $controllorName, $controllerMethod, $type ) {
        
       // var_dump($_SESSION['user']['privilege']); die();
       
        
        if($type == 'admin'){
            $viewLoad = new controller();
            if (!isset($_SESSION['user'])) {
                header('Location: /admin/login');
                die();
            }
            if($_SESSION['user']['role'] == 0){
                http_response_code(403);
                return ($viewLoad->loadView('admin/errorPage/403Forbidden'));
                die();
            }
            if($_SESSION['user']['role'] == 3){
                $next($controllorName, $controllerMethod);
                die();
              }
              $regex = [];
              foreach($_SESSION['user']['privilege'] as $key => $value){
                  $regex[] = $value['url_match'];
              }
              if(empty($regex)){
                http_response_code(403);
                return ($viewLoad->loadView('admin/errorPage/403Forbidden'));
                die();
              }
              $regex = implode('|', $regex);
            
            preg_match('/'.$regex.'/', $_SERVER['REQUEST_URI'], $matches);
            
            if(empty(($matches))){
                http_response_code(403);
                return ($viewLoad->loadView('admin/errorPage/403Forbidden'));
                die();
            }
            $next($controllorName, $controllerMethod);
        }else if($type == 'user'){
            if (!isset($_SESSION['user'])) {
                header('Location: /login');
                die();
            }
            $next($controllorName, $controllerMethod);
        }
        
      
    }
}
?>