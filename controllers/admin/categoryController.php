<?php
require_once("models/taskModel.php");
class categoryController extends controller{
   public function add(){
      return ($this->loadView('admin/category/add'));
   }
}