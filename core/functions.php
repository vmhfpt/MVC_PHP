<?php
   function showError($errno, $errstr, $errfile, $errline){
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting, so let it fall
        // through to the standard PHP error handler
        return false;
    }

    // $errstr may need to be escaped:
    $errstr = htmlspecialchars($errstr);

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Lỗi không xác định kiểu: dòng: $errline -> [$errno] $errstr trong file $errfile<br />\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
   }
   function show404Error(){
     die('page not found');
   }

   function slug($string){
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
   }

   function save_file($file, $path){
        $random =  mt_rand(100000, 999999);
        $name = $random.$file["name"] ;
        move_uploaded_file($file["tmp_name"],$path.$random.$file["name"]);
        return($name);
   }
   function currency_format($number, $suffix = 'đ') {

        if (!empty($number)) {
            if( $number == 0) return ('0đ');
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
   }
   function randomCoupon(){
    $length = 10;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $coupon_code = '';
    
    for ($i = 0; $i < $length; $i++) {
        $coupon_code .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    $coupon_code = strtoupper($coupon_code);
    
    return($coupon_code);
   }
   function createMenuTree($menuList, $parent_id, $lever){
    $menuTree = array();
    foreach($menuList as $key => $menu){
      if($menu['parent_id'] == $parent_id){
         $menu['lever'] = $lever;
      
         $menuTree[] = $menu;
       unset($menuList[$key]);
         $children = createMenuTree($menuList, $menu['id'], $lever + 1);
         $menuTree = array_merge($menuTree, $children);
      }
    }
    return ($menuTree);
  }
?>