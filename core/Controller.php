<?php
class controller {
    public function __construct(){
    
    }
    public function loadModel($modelName){
        $modelName = $modelName.'Model';
        if(!file_exists('models/'.$modelName.'.php')){   
            return false;
        }
        require('models/'.$modelName.'.php');
        $this->{$modelName} = new $modelName();
        
    }
    public function loadView($viewName, $data = []){
       
        if(!file_exists('views/'.$viewName.'.php')){
            return false;
        }
        extract($data);
        require('views/'.$viewName.'.php');
    }
   
}
?>