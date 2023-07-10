<?php
require_once("models/introduceModel.php");


class handleController extends controller{
    private $introduce;
    public function __construct(){
       $this->introduce =  new Introduce();
    }
   public function home(){
      return ($this->loadView('post/home'));
   }
   public function detailProduct($request, $response){
     return ($this->loadView('post/product/detail'));
   }
   public function platForm($request, $response){
    return ($this->loadView('post/product/list'));
   }
   public function category($request, $response){
    return ($this->loadView('post/product/list'));
   }
   public function cart(){
    return ($this->loadView('post/cart/index'));
   }
   public function login(){
    return ($this->loadView('post/user/login'));
   }
   public function register(){
    return ($this->loadView('post/user/register'));
   }
   public function dashboard(){
    return ($this->loadView('post/user/dashboard'));
   }
   public function new(){
    return ($this->loadView('post/new/index'));
   }
   public function detailNew(){
    return ($this->loadView('post/new/detail'));
   }
   public function detailIntroduce($request, $response){
    $slug = $request[0]['slug'];
    $item = $this->introduce->getBySlug($slug);
     return ($this->loadView('post/introduce/detail', ['item' => $item]));
   }
   public function detailAgent(){
    return ($this->loadView('post/introduce/shop'));
   }
}