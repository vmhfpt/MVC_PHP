<?php
require_once("models/brandModel.php");
class testController extends controller{

    public function test(){
      return ($this->loadView('post/chat'));
    }
}
?>