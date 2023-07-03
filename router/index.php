<?php
 Router::handle('GET',  '', 'admin/testController', 'test');
 
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
 Router::handle('POST',  'admin/attribute/get-list/ajax', 'admin/attributeController', 'getList');
 Router::handle('GET',  'admin/attribute/add',        'admin/attributeController', 'add');
 Router::handle('POST',  'admin/attribute/add',        'admin/attributeController', 'create');
 Router::handle('GET',  'admin/attribute/list',       'admin/attributeController', 'index');
 Router::handle('GET',  'admin/attribute/edit/{id}','admin/attributeController', 'edit');
 Router::handle('POST',  'admin/attribute/edit/{id}','admin/attributeController', 'update');
 Router::handle('POST',  'admin/attribute/delete',     'admin/attributeController', 'destroy');
   /*************************************************************************************** */
 Router::handle('GET',  'admin/value/add',        'admin/valueController', 'add');
 Router::handle('POST',  'admin/value/add',        'admin/valueController', 'create');
 Router::handle('GET',  'admin/value/list',       'admin/valueController', 'index');
 Router::handle('GET',  'admin/value/edit/{id}','admin/valueController', 'edit');
 Router::handle('POST',  'admin/value/edit/{id}','admin/valueController', 'update');
 Router::handle('POST',  'admin/value/delete',     'admin/valueController', 'destroy');
   /*************************************************************************************** */
 Router::handle('GET',  'admin/value-category/add',        'admin/valueCategoryController', 'add');
 Router::handle('POST',  'admin/value-category/add',        'admin/valueCategoryController', 'create');
 Router::handle('GET',  'admin/value-category/list',       'admin/valueCategoryController', 'index');
 Router::handle('POST',  'admin/value-category/delete',     'admin/valueCategoryController', 'destroy');
 Router::handle('POST',  'admin/value-category/get-list/ajax', 'admin/valueCategoryController', 'getList');
  /*************************************************************************************** */
 Router::handle('POST',  'admin/attribute-product/delete',       'admin/attributeProductController', 'destroy');
 Router::handle('GET',  'admin/attribute-product/{slug}',       'admin/attributeProductController', 'index');
 Router::handle('POST',  'admin/attribute-product/get-value/ajax',       'admin/attributeProductController', 'getValue');
 Router::handle('POST',  'admin/attribute-product/{slug}',       'admin/attributeProductController', 'create');
  /*************************************************************************************** */
  Router::handle('GET',  'admin/color-product/{attribute_id}',       'admin/colorProductController', 'index');
  Router::handle('POST',  'admin/color-product/{attribute_id}',       'admin/colorProductController', 'create');

 
 http_response_code(404);
 echo '404 not found';
?>