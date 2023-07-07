<?php
class conversationController extends controller{
   public function index(){
      return ($this->loadView('admin/conversation/index'));
   }
}
?>