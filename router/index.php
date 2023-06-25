<?php
  Router::handle('GET','todo-list/add', 'taskController', 'add');
  Router::handle('POST','todo-list/add', 'taskController', 'insert');
  Router::handle('GET','todo-list/list', 'taskController', 'index');
  Router::handle('GET','todo-list/edit', 'taskController', 'edit');
  Router::handle('POST','todo-list/edit', 'taskController', 'update');
  Router::handle('POST','todo-list/delete', 'taskController', 'destroy');
  http_response_code(404);
  echo '404 not found';
?>