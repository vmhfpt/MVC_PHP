<?php
 /*
  Router::handle('GET',  '', 'admin/testController', 'test');
  Router::handle('GET',  'todo-list/add',       'admin/taskController', 'add');
  Router::handle('POST', 'todo-list/add',       'admin/taskController', 'insert');
  Router::handle('GET',  'todo-list/list',      'admin/taskController', 'index');
  Router::handle('GET',  'todo-list/edit/{id}', 'admin/taskController', 'edit');
  Router::handle('POST', 'todo-list/edit/{id}', 'admin/taskController', 'update');
  Router::handle('POST', 'todo-list/delete',    'admin/taskController', 'destroy');
 */


 Router::handle('GET',  'admin/category/add',      'admin/categoryController', 'add');


  
  http_response_code(404);
  echo '404 not found';
?>