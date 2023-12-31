<?php



if(!session_id()){
    session_start();
    
}

//var_dump($_SESSION['user']); die();

$ROOT_URL = "";
$CONTENT_URL = "$ROOT_URL/content";
$ADMIN_URL = "$ROOT_URL/admin";

//$SITE_URL_ADMIN = "$ROOT_URL/public/admin";
//$SITE_URL = "$ROOT_URL/";

//$UPLOAD_URL_USER = __DIR__ . "/uploaded/user/";
//$UPLOAD_URL_PRODUCT = __DIR__ . "/uploaded/product/";
//$IMAGE_DIR_USER = $ROOT_URL."/uploaded/user/" ;
//$IMAGE_DIR_PRODUCT = $ROOT_URL."/uploaded/product/" ;
define('ITEM_PER_PAGE', 5);
define('ITEM_PER_PAGE_PRODUCT', 5);

define('UPLOAD_URL_POST', __DIR__ . "/public/image/post/");
define('IMAGE_DIR_POST', $ROOT_URL . "/public/image/post/");
define('UPLOAD_URL_LIBRARY', __DIR__ . "/public/image/library/");
define('UPLOAD_URL_PRODUCT', __DIR__ . "/public/image/product/");
define('IMAGE_DIR_USER', $ROOT_URL . "/public/image/user/");
define('IMAGE_DIR_PRODUCT', $ROOT_URL . "/public/image/product/");
define('IMAGE_DIR_LIBRARY', $ROOT_URL . "/public/image/library/");
define('UPLOAD_URL_USER', __DIR__ . "/public/image/user/");
define('SITE_URL', "$ROOT_URL/");
define('SITE_URL_ADMIN', "$ROOT_URL/public/admin");
define('SITE_URL_POST', "$ROOT_URL/public/post");
define('ROOT_PATH', dirname(__DIR__) . '/htdocs/');
define('ENV', 'development');


require('config.php');
require('core/functions.php');

if(ENV == 'development'){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    set_error_handler('showError');
}

if(file_exists('vendor/autoload.php')){
    require('vendor/autoload.php');
}

$autoloads = [
  'Controller',
  'Request',
  'Router',
  'Middleware'
];
foreach($autoloads as $file){
    require('core/'.$file).'.php';
}
require_once('router/index.php');

?>


