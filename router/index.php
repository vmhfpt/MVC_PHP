<?php
 Router::handle('GET',  '', 'admin/testController', 'test');
 /*
  
  Router::handle('GET',  'todo-list/add',       'admin/taskController', 'add');
  Router::handle('POST', 'todo-list/add',       'admin/taskController', 'insert');
  Router::handle('GET',  'todo-list/list',      'admin/taskController', 'index');
  Router::handle('GET',  'todo-list/edit/{id}', 'admin/taskController', 'edit');
  Router::handle('POST', 'todo-list/edit/{id}', 'admin/taskController', 'update');
  Router::handle('POST', 'todo-list/delete',    'admin/taskController', 'destroy');
 
  
 */
 /*************************************************************************************** */
 Router::handle('POST',  'admin/platform/edit/{slug}','admin/platformController', 'update');
 Router::handle('GET',  'admin/platform/edit/{slug}','admin/platformController', 'edit');
 Router::handle('GET',  'admin/platform/list',       'admin/platformController', 'index');
 /*************************************************************************************** */
 Router::handle('GET',  'admin/category/add',        'admin/categoryController', 'add');
 Router::handle('POST',  'admin/category/add',        'admin/categoryController', 'create');
 Router::handle('GET',  'admin/category/list',       'admin/categoryController', 'index');
 Router::handle('GET',  'admin/category/edit/{slug}','admin/categoryController', 'edit');
 Router::handle('POST',  'admin/category/edit/{slug}','admin/categoryController', 'update');
 Router::handle('POST',  'admin/category/delete',     'admin/categoryController', 'destroy');
 /*************************************************************************************** */
 Router::handle('GET',  'admin/product/add',        'admin/productController', 'add');
 Router::handle('POST',  'admin/product/add',        'admin/productController', 'create');
 Router::handle('GET',  'admin/product/list/{page}',       'admin/productController', 'index');
 Router::handle('GET',  'admin/product/edit/{slug}','admin/productController', 'edit');
 Router::handle('POST',  'admin/product/edit/{slug}','admin/productController', 'update');
 Router::handle('POST',  'admin/product/delete','admin/productController', 'destroy');
 /*************************************************************************************** */
 Router::handle('GET',  'admin/user/add',        'admin/userController', 'add');
 Router::handle('POST',  'admin/user/add',        'admin/userController', 'create');
 Router::handle('GET',  'admin/user/list',       'admin/userController', 'index');
 Router::handle('GET',  'admin/user/edit/{id}','admin/userController', 'edit');
 Router::handle('POST',  'admin/user/edit/{id}','admin/userController', 'update');
 Router::handle('POST',  'admin/user/delete',     'admin/userController', 'destroy');
  /*************************************************************************************** */
 Router::handle('GET',  'admin/brand/add',        'admin/brandController', 'add');
 Router::handle('POST',  'admin/brand/add',        'admin/brandController', 'create');
 Router::handle('GET',  'admin/brand/list',       'admin/brandController', 'index');
 Router::handle('GET',  'admin/brand/edit/{id}','admin/brandController', 'edit');
 Router::handle('POST',  'admin/brand/edit/{id}','admin/brandController', 'update');
 Router::handle('POST',  'admin/brand/delete',     'admin/brandController', 'destroy');
   /*************************************************************************************** */


 
 http_response_code(404);
 echo '404 not found';
?>