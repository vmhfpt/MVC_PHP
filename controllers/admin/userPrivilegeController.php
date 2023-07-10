
<?php
require_once("models/privilegeModel.php");
require_once("models/userModel.php");
class userPrivilegeController extends controller{
    private $privilege;
    private $validate;
    private $user;
    private $arrPrivilegeUser;
    public function __construct(){
       $this->validate =  new request();
       $this->privilege  = new Privilege();
       $this->user = new User();
    }
   public function checkContain($v){
     $arr = $this->arrPrivilegeUser;
     foreach($arr as $key => $value){
        if($value['privilege_id'] == $v){
            return true;
        }
     }
     return false;

   }
   public function add($request, $response){
    $user_id = $request[0]['id'];
    $listPrivilegeGroup = $this->privilege->getPrivilegeGroup();
    $listPrivilege = $this->privilege->getPrivilege();
    $this->arrPrivilegeUser = $this->privilege->getUserPrivile($user_id);
    //var_dump($arrPrivilegeUser); die();
    $item = $this->user->getById($user_id);
    return ($this->loadView('admin/privilege/add',
      [ 
        'listPrivilegeGroup' => $listPrivilegeGroup ,
        'listPrivilege' => $listPrivilege,
        'item' => $item
      ]
    ));
   }
   public function create($request, $response){
     
      $privilege = isset($request['privilege']) ? $request['privilege']  : [];
      $user_id = $request[0]['id'];
      $item = $this->user->getById($user_id);
      $this->privilege->deleteUserPrivile($user_id);
      $listPrivilegeGroup = $this->privilege->getPrivilegeGroup();
      $listPrivilege = $this->privilege->getPrivilege();
      foreach($privilege as $value){
         $this->privilege->insertUserPrivilege($user_id, $value);
      }
      $this->arrPrivilegeUser = $this->privilege->getUserPrivile($user_id);
      return ($this->loadView('admin/privilege/add',
      [ 
        'listPrivilegeGroup' => $listPrivilegeGroup ,
        'listPrivilege' => $listPrivilege,
        'status' => ' Cập nhật thành công',
        'item' => $item
      ]
    ));
   }
}
?>