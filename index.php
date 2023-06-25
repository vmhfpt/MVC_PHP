<?php





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