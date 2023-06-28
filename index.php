<?php




$ROOT_URL = "";
$CONTENT_URL = "$ROOT_URL/content";
$ADMIN_URL = "$ROOT_URL/admin";

//$SITE_URL_ADMIN = "$ROOT_URL/public/admin";
//$SITE_URL = "$ROOT_URL/";

$UPLOAD_URL_USER = __DIR__ . "/uploaded/user/";
$UPLOAD_URL_PRODUCT = __DIR__ . "/uploaded/product/";
$IMAGE_DIR_USER = $ROOT_URL."/uploaded/user/" ;
$IMAGE_DIR_PRODUCT = $ROOT_URL."/uploaded/product/" ;
  
  
define('SITE_URL', "$ROOT_URL/");
define('SITE_URL_ADMIN', "$ROOT_URL/public/admin");
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
  'Router'
];
foreach($autoloads as $file){
    require('core/'.$file).'.php';
}
require_once('router/index.php');

?>