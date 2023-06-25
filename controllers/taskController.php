<?php
use Carbon\Carbon;
require_once(ROOT_PATH . "models/taskModel.php");


class taskController extends controller{
   private $task;
   public function __construct(){
     $this->task  = new Task();
   }
   public function add(){
      $this->loadView('Todo/add');
   }
   public function index($request, $response){
     $item['date_now'] = Carbon::now();


     $item['page'] = 1;
     if(isset($request['page'])){
      $item['page'] = (int)$request['page'];
     }
   
     $item['totalItem'] = $this->task->task_count_total();
    
     $item['limitShow'] = 5;
     $offset = ($item['page'] - 1) * $item['limitShow'];
     //$item['data'] = $this->task->task_get_pagination($item['limitShow'], $offset);

     $item['data'] = isset($request['key']) ? $this->task->task_search_by_name($request['key']) : $this->task->task_get_pagination($item['limitShow'], $offset);
    // $items = isset($_GET['key']) ? hang_hoa_select_by_search_name($_GET['key']) : hang_hoa_pagination($limitShow, $offset);
     $this->loadView('Todo/list', $item);
   }
   public function insert($request, $response){
    
    $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
    $error = [];
    $active = 0;
    if(isset($request['active'])){
      $active = 1;
    }
    if (!preg_match($regex,  $request['name'])) {
        $error['error_name'] = "* Name is invalid !";
        $error['old_name'] = $request['name'];
        $error['old_active'] = $active;
    }
    if(count($error) == 0){
        
        $this->task->Insert($request['name'],$active, date('y-m-d'));
        $messasge['success'] = 'Add todo list : "' . $request['name']. '" success !';
        return ( $this->loadView('Todo/add', $messasge));
    }
   return $this->loadView('Todo/add', $error);
   }
   public function edit($request, $response){
      $data = $this->task->findById($request['id']);
      return ( $this->loadView('Todo/edit', $data));
   }
   public function update($request, $response){
    $active = 0;
    if(isset($request['active'])){
      $active = 1;
    }  
    $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
   
    $active = 0;
    if(isset($request['active'])){
      $active = 1;
    }
    if (!preg_match($regex,  $request['name'])) {
      $data["error_name"] = "* Name is invalid !";
      $data["id"] = $request['id'];
      $data["name"] =  $request['name'] ;
      $data["active"] = $active ;
      return $this->loadView('Todo/edit', $data);
    }
    if(!isset($data["error_name"])){
      $this->task->Update($request['name'], $active, $request['id']);
      header("Location: list");
      die();
      
    }
  
   }
   public function destroy($request, $response){
     
     try{
      foreach($request['arr'] as $key => $value){
         $this->task->delete($value);
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