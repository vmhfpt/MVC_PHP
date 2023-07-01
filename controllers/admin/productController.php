<?php
require_once("models/brandModel.php");
require_once("models/categoryModel.php");
require_once("models/productModel.php");
class productController extends controller{
    private $category;
    private $brand;
    private $validate;
    private $product;
   public function __construct(){
      $this->validate =  new request();
      $this->category  = new Category();
      $this->brand = new Brand();
      $this->product = new Product();
   }
    public function add(){
        $listCategory = $this->category->getCategory();
        $listBrand = $this->brand->getAll();
       
        return ($this->loadView('admin/product/add', [
          'listCategory' => $listCategory,
          'listBrand' => $listBrand
        ]));
     }
     public function index($request, $response){
       $page = 1;
        if(isset($request[0]['page']) && $request[0]['page'] != ''){
           $page = (int)$request[0]['page'];
        }
        $totalItem = $this->product->product_count_total();
        $limitShow = ITEM_PER_PAGE;
        $offset = ($page - 1) * $limitShow;
        $dataItem = $this->product->product_pagination($limitShow, $offset);
        return ($this->loadView('admin/product/list',
         [
            'dataItem' => $dataItem,
            'page' => $page,
            'limitShow' => $limitShow,
            'totalItem' => $totalItem
         ]
      ));
     }
     public function edit($request, $response){
         $listCategory = $this->category->getCategory();
         $listBrand = $this->brand->getAll();
         $slug = ($request[0]['slug']);
         $item = $this->product->getBySlug($slug);
        return ($this->loadView('admin/product/edit',  [
         'listCategory' => $listCategory,
         'listBrand' => $listBrand,
         'item' => $item
       ]));
     }
     public function create($request, $response){
      isset($request['active']) ? $request['active'] = 0 :  $request['active'] = 1;
      $this->validate->rule([
        'name' => 'unique:product|name|require',
        'price' => 'price|require',
        'price_sale' => 'require',
        'content' => 'min:10|require',
        'thumb' => 'file:require_file'
      ]);
      $this->validate->validate([
         'price_sale.require' => '* Giảm giá không được để trống',
         'price.price' => '* Đơn giá không hợp lệ',
         'price.require' => '* Đơn giá không được để trống',
         'name.unique' => '* Tên hàng hóa đã tồn tại',
         'name.name' => '* Tên hàng hóa không hợp lệ',
         'name.require' => '* Tên hàng hóa không được để trống',
         'content.min' => '* Nội dung phải ít nhất 10 ký tự',
         'content.require' => '* Nội dung không được để trống',
         'thumb.file' => '* Cần ít nhất 1 ảnh cho sản phẩm',
      ]);
      $errors = ($this->validate->message());
      if($errors){
         $listCategory = $this->category->getCategory();
         $listBrand = $this->brand->getAll();
         return ($this->loadView('admin/product/add', [
            'errors' => $errors,
            'old_field' => $request,
            'listCategory' => $listCategory,
            'listBrand' => $listBrand
         ]));
      }else {
         
         $image = '';
         if($_FILES['thumb']['size'] != 0) {
            $image = save_file($_FILES['thumb'], UPLOAD_URL_PRODUCT);
         }
         $this->product->insert($request['name'], $request['category_id'], $request['price'], $request['price_sale'], $request['content'], slug($request['name']), $request['active'], $image, $request['view_model'], $request['brand_id'], 0);
         $totalItem = $this->product->product_count_total();
         $limitShow = ITEM_PER_PAGE;
         $offset = 0;
         $dataItem = $this->product->product_pagination($limitShow, $offset);
        return ($this->loadView('admin/product/list' , [
           'status' => "Thêm thành công sản phẩm : " . $request['name'],
           'dataItem' => $dataItem,
           'page' => 1,
           'limitShow' => $limitShow,
           'totalItem' => $totalItem
        ]));
      }
      //var_dump($request);
     }
     public function update($request, $response){
         $slug = ($request[0]['slug']);
         isset($request['active']) ? $request['active'] = 0 :  $request['active'] = 1;
         $this->validate->rule([
         'name' => 'name|require',
         'price' => 'price|require',
         'price_sale' => 'require',
         'content' => 'min:10|require',
         'thumb' => 'file:validate_file'
         ]);
         $this->validate->validate([
            'price_sale.require' => '* Giảm giá không được để trống',
            'price.price' => '* Đơn giá không hợp lệ',
            'price.require' => '* Đơn giá không được để trống',
            'name.name' => '* Tên hàng hóa không hợp lệ',
            'name.require' => '* Tên hàng hóa không được để trống',
            'content.min' => '* Nội dung phải ít nhất 10 ký tự',
            'content.require' => '* Nội dung không được để trống',
            'thumb.file' => '* Cần ít nhất 1 ảnh cho sản phẩm',
         ]);
         $errors = ($this->validate->message());
         if($errors){
            $listCategory = $this->category->getCategory();
            $listBrand = $this->brand->getAll();
            $request['thumb'] = $request['old_image']; 
            return ($this->loadView('admin/product/edit', [
               'listCategory' => $listCategory,
               'listBrand' => $listBrand,
               'errors' => $errors,
               'item' => $request
            ]));
         }else {
            try {
               $image = $request['old_image'];
               if($_FILES['thumb']['size'] != 0) {
                  $image = save_file($_FILES['thumb'], UPLOAD_URL_PRODUCT);
                  if($request['old_image'])  unlink(UPLOAD_URL_PRODUCT.$request['old_image']);
               }
               $this->product->update($request['name'], $request['category_id'], $request['price'], $request['price_sale'], $request['content'], slug($request['name']), $request['active'], $image, $request['view_model'], $request['brand_id'], $slug);
               header('Location: /admin/product/list/');
              }catch(Exception $exc){
                 $listCategory = $this->category->getCategory();
                 $listBrand = $this->brand->getAll();
                 $request['thumb'] = $request['old_image']; 
                 return ($this->loadView('admin/product/edit', [
                    'errors' => ["name" => 'Tên hàng hóa đã tồn tại'],
                    'item' => $request,
                    'listCategory' => $listCategory,
                    'listBrand' => $listBrand,
                 ]));
              }
            
         }
     }
     public function destroy($request, $response){
      try{
         foreach($request['arr'] as $key => $value){
            $item = $this->product->getById($value);
            unlink(UPLOAD_URL_PRODUCT.$item['thumb']);
            $this->product->delete($value);
         }
         echo json_encode(['status' => 'success']);
        }catch(Exception $exc){
          echo json_encode([
           'status' => 'error',
           'detal' => $exc
         ]);
        }
     }
}
?>