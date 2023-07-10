<?php
require_once("models/postModel.php");
require_once("models/categoryPostModel.php");
class postController extends controller{
    private $validate;
    private $post;
    private $categoryPost;
   public function __construct(){
      $this->validate =  new request();
      $this->post  = new Post();
      $this->categoryPost = new CategoryPost();
   }
  
  
  
    public function add(){
        $listCategory = $this->categoryPost->getAll();
       
        return ($this->loadView('admin/post/add', [
          'listCategory' => $listCategory
        ]));
     }
     public function index($request, $response){
        $dataItem = $this->post->getAll();
        return ($this->loadView('admin/post/list',
         [
            'dataItem' => $dataItem,
         ]
      ));
     }
     public function edit($request, $response){
         $listCategory = $this->categoryPost->getAll();
         $slug = ($request[0]['slug']);
         $item = $this->post->getBySlug($slug);
        return ($this->loadView('admin/post/edit',  [
            'listCategory' => $listCategory,
            'item' => $item
        ]));
     }
     public function create($request, $response){
      $this->validate->rule([
        'title' => 'unique:post|require',
        'description' => 'require',
        'content' => 'min:10|require',
        'thumb' => 'file:require_file'
      ]);
      $this->validate->validate([
         'description.require' => '* Mô tả không được để trống',
         'title.unique' => '* Tên bài đăng đã tồn tại',
         'title.require' => '* Tên bài đăng không được để trống',
         'content.min' => '* Nội dung phải ít nhất 10 ký tự',
         'content.require' => '* Nội dung không được để trống',
         'thumb.file' => '* Cần ít nhất 1 ảnh cho bài đăng',
      ]);
      $errors = ($this->validate->message());
      if($errors){
            $listCategory = $this->categoryPost->getAll();
         return ($this->loadView('admin/post/add', [
            'errors' => $errors,
            'old_field' => $request,
            'listCategory' => $listCategory,
         ]));
      }else {
         
         $image = '';
         if($_FILES['thumb']['size'] != 0) {
            $image = save_file($_FILES['thumb'], UPLOAD_URL_POST);
         }
         $this->post->insert($request['title'], $request['description'], $request['content'], slug($request['title']), $image, $request['category_id']);
         $dataItem = $this->post->getAll();
         return ($this->loadView('admin/post/list',
         [
            'status' => " Thêm thành công bài đăng",
            'dataItem' => $dataItem,
         ]
      ));
      }
      
     }
     public function update($request, $response){
         $slug = ($request[0]['slug']);
         $listCategory = $this->categoryPost->getAll();
         $this->validate->rule([
            'title' => 'require',
            'description' => 'require',
            'content' => 'min:10|require',
            'thumb' => 'file:validate_file'
         ]);
         $this->validate->validate([
            'description.require' => '* Mô tả không được để trống',
            'title.require' => '* Tên bài đăng không được để trống',
            'content.min' => '* Nội dung phải ít nhất 10 ký tự',
            'content.require' => '* Nội dung không được để trống',
            'thumb.file' => '* Cần ít nhất 1 ảnh cho bài đăng',
         ]);
         $errors = ($this->validate->message());
         if($errors){
          
            $request['thumb'] = $request['old_image']; 
            return ($this->loadView('admin/post/edit', [
                'listCategory' => $listCategory,
                'errors' => $errors,
                'item' => $request
            ]));
         }else {
            try {
               $image = $request['old_image'];
               if($_FILES['thumb']['size'] != 0) {
                  $image = save_file($_FILES['thumb'], UPLOAD_URL_POST);
                  if($request['old_image'])  unlink(UPLOAD_URL_POST.$request['old_image']);
               }
               $this->post->update($request['category_post_id'], $request['title'], $request['description'], $request['content'], slug($request['title']), $image, $slug);
               header('Location: /admin/post/list');
              }catch(Exception $exc){
             
                 $request['thumb'] = $request['old_image']; 
                 return ($this->loadView('admin/post/edit', [
                    'errors' => ["title" => 'Tên bài viết đã tồn tại'],
                    'item' => $request,
                    'listCategory' => $listCategory,
                 ]));
              }
            
         }
     }
     public function destroy($request, $response){
      try{
         foreach($request['arr'] as $key => $value){
            $item = $this->post->getById($value);
            unlink(UPLOAD_URL_POST.$item['thumb']);
            $this->post->delete($value);
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