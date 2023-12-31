<?php

 $viewLoad = new controller();

 // my-server/capture-paypal-order
 Router::handle('GET',  'test',       'admin/testController', 'test');
 Router::handle('POST',  'my-server/capture-paypal-order',       'admin/testController', 'capturePaypal');
 Router::handle('POST',  'my-server/create-paypal-order',       'admin/testController', 'createPaypal');




 Router::handle('GET',  'installment','post/handleController', 'installment' );
 Router::handle('POST',  'installment-handle','post/handleController', 'handleInstallment' );
 Router::handle('POST',  'installment-add','post/handleController', 'createInstallment' );


 Router::handle('GET',  'admin/logout',       'admin/loginController', 'logout');
 Router::handle('GET',  'admin/login',       'admin/loginController', 'login');
 Router::handle('POST',  'admin/login',       'admin/loginController', 'authen');
 /*************************************************************************************** */
 Router::handle('GET',  'admin','admin/homeController', 'index', 'admin');
 Router::handle('POST',  'admin/platform/edit/{slug}','admin/platformController', 'update', 'admin');
 Router::handle('GET',  'admin/platform/edit/{slug}','admin/platformController', 'edit', 'admin');
 Router::handle('GET',  'admin/platform/list',       'admin/platformController', 'index', 'admin');
 /*************************************************************************************** */
 Router::handle('POST',  'admin/flashsale/delete','admin/flashSaleController', 'destroy', 'admin');
 Router::handle('GET',  'admin/flashsale/add','admin/flashSaleController', 'add', 'admin');
 Router::handle('POST',  'admin/flashsale/add','admin/flashSaleController', 'create', 'admin');
 Router::handle('GET',  'admin/flashsale/list','admin/flashSaleController', 'index', 'admin');
 Router::handle('GET',  'admin/flashsale/edit/{id}','admin/flashSaleController', 'edit', 'admin');
 Router::handle('POST',  'admin/flashsale/edit/{id}','admin/flashSaleController', 'update', 'admin');
 /*************************************************************************************** */
 Router::handle('GET',  'admin/category-post/add',        'admin/categoryPostController', 'add', 'admin');
 Router::handle('POST',  'admin/category-post/add',        'admin/categoryPostController', 'create', 'admin');
 Router::handle('GET',  'admin/category-post/list',       'admin/categoryPostController', 'index', 'admin');
 Router::handle('GET',  'admin/category-post/edit/{slug}','admin/categoryPostController', 'edit', 'admin');
 Router::handle('POST',  'admin/category-post/edit/{slug}','admin/categoryPostController', 'update', 'admin');
 Router::handle('POST',  'admin/category-post/delete',     'admin/categoryPostController', 'destroy', 'admin');
 /*************************************************************************************** */
 Router::handle('GET',  'admin/post/add',        'admin/postController', 'add', 'admin');
 Router::handle('POST',  'admin/post/add',        'admin/postController', 'create', 'admin');
 Router::handle('GET',  'admin/post/list',  'admin/postController', 'index', 'admin');
 Router::handle('GET',  'admin/post/edit/{slug}','admin/postController', 'edit', 'admin');
 Router::handle('POST',  'admin/post/edit/{slug}','admin/postController', 'update', 'admin');
 Router::handle('POST',  'admin/post/delete','admin/postController', 'destroy', 'admin');
 /*************************************************************************************** */
 Router::handle('GET',  'admin/category/add',        'admin/categoryController', 'add', 'admin');
 Router::handle('POST',  'admin/category/add',        'admin/categoryController', 'create', 'admin');
 Router::handle('GET',  'admin/category/list',       'admin/categoryController', 'index', 'admin');
 Router::handle('GET',  'admin/category/edit/{slug}','admin/categoryController', 'edit', 'admin');
 Router::handle('POST',  'admin/category/edit/{slug}','admin/categoryController', 'update', 'admin');
 Router::handle('POST',  'admin/category/delete',     'admin/categoryController', 'destroy', 'admin');
 /*************************************************************************************** */
 Router::handle('GET',  'api/product/list',        'admin/productController', 'getListAPI', 'admin');
 Router::handle('GET',  'admin/product/add',        'admin/productController', 'add', 'admin');
 Router::handle('POST',  'admin/product/add',        'admin/productController', 'create', 'admin');
 Router::handle('GET',  'admin/product/list/{page}',       'admin/productController', 'index', 'admin');
 Router::handle('GET',  'admin/product/edit/{slug}','admin/productController', 'edit', 'admin');
 Router::handle('POST',  'admin/product/edit/{slug}','admin/productController', 'update', 'admin');
 Router::handle('POST',  'admin/product/delete','admin/productController', 'destroy', 'admin');

 Router::handle('GET',  'admin/installment/list','admin/productController', 'listInstallMent', 'admin');



 Router::handle('POST',  'admin/product-coupon/delete','admin/productController', 'destroyCouponProduct', 'admin');
 Router::handle('GET',  'admin/product-coupon/list','admin/productController', 'getListCouponByProduct', 'admin');
 Router::handle('GET',  'admin/product-coupon/detail/{id}','admin/productController', 'couponDetail', 'admin');
 Router::handle('POST',  'admin/product-coupon/detail/{id}','admin/productController', 'addCouponProduct', 'admin');
 /*************************************************************************************** */
 Router::handle('GET',  'admin/user/add',        'admin/userController', 'add', 'admin');
 Router::handle('POST',  'admin/user/add',        'admin/userController', 'create', 'admin');
 Router::handle('GET',  'admin/user/list',       'admin/userController', 'index', 'admin');
 Router::handle('GET',  'admin/user/edit/{id}','admin/userController', 'edit', 'admin');
 Router::handle('POST',  'admin/user/edit/{id}','admin/userController', 'update', 'admin');
 Router::handle('POST',  'admin/user/delete',     'admin/userController', 'destroy', 'admin');
  /*************************************************************************************** */
 Router::handle('GET',  'admin/brand/add',        'admin/brandController', 'add', 'admin');
 Router::handle('POST',  'admin/brand/add',        'admin/brandController', 'create', 'admin');
 Router::handle('GET',  'admin/brand/list',       'admin/brandController', 'index', 'admin');
 Router::handle('GET',  'admin/brand/edit/{id}','admin/brandController', 'edit', 'admin');
 Router::handle('POST',  'admin/brand/edit/{id}','admin/brandController', 'update', 'admin');
 Router::handle('POST',  'admin/brand/delete',     'admin/brandController', 'destroy', 'admin');
   /*************************************************************************************** */
 Router::handle('POST',  'admin/attribute/get-list/ajax', 'admin/attributeController', 'getList', 'admin');
 Router::handle('GET',  'admin/attribute/add',        'admin/attributeController', 'add', 'admin');
 Router::handle('POST',  'admin/attribute/add',        'admin/attributeController', 'create', 'admin');
 Router::handle('GET',  'admin/attribute/list',       'admin/attributeController', 'index', 'admin');
 Router::handle('GET',  'admin/attribute/edit/{id}','admin/attributeController', 'edit', 'admin');
 Router::handle('POST',  'admin/attribute/edit/{id}','admin/attributeController', 'update', 'admin');
 Router::handle('POST',  'admin/attribute/delete',     'admin/attributeController', 'destroy', 'admin');
   /*************************************************************************************** */
 Router::handle('GET',  'admin/value/add',        'admin/valueController', 'add', 'admin');
 Router::handle('POST',  'admin/value/add',        'admin/valueController', 'create', 'admin');
 Router::handle('GET',  'admin/value/list',       'admin/valueController', 'index', 'admin');
 Router::handle('GET',  'admin/value/edit/{id}','admin/valueController', 'edit', 'admin');
 Router::handle('POST',  'admin/value/edit/{id}','admin/valueController', 'update', 'admin');
 Router::handle('POST',  'admin/value/delete',     'admin/valueController', 'destroy', 'admin');
   /*************************************************************************************** */
 Router::handle('GET',  'admin/value-category/add',        'admin/valueCategoryController', 'add', 'admin');
 Router::handle('POST',  'admin/value-category/add',        'admin/valueCategoryController', 'create', 'admin');
 Router::handle('GET',  'admin/value-category/list',       'admin/valueCategoryController', 'index', 'admin');
 Router::handle('POST',  'admin/value-category/delete',     'admin/valueCategoryController', 'destroy', 'admin');
 Router::handle('POST',  'admin/value-category/get-list/ajax', 'admin/valueCategoryController', 'getList', 'admin');
  /*************************************************************************************** */
 Router::handle('POST',  'admin/attribute-product/delete',       'admin/attributeProductController', 'destroy', 'admin');
 Router::handle('GET',  'admin/attribute-product/{slug}',       'admin/attributeProductController', 'index', 'admin');
 Router::handle('POST',  'admin/attribute-product/get-value/ajax',       'admin/attributeProductController', 'getValue', 'admin');
 Router::handle('POST',  'admin/attribute-product/{slug}',       'admin/attributeProductController', 'create', 'admin');
  /*************************************************************************************** */
  Router::handle('GET',  'admin/color-product/list/detail/{id}',       'admin/colorProductController', 'show', 'admin');
  Router::handle('GET',  'admin/color-product/list',       'admin/colorProductController', 'list', 'admin');
  Router::handle('POST',  'admin/library-product/delete/ajax',       'admin/colorProductController', 'deleteLibrary', 'admin');
  Router::handle('GET',  'admin/color-product/{attribute_id}',       'admin/colorProductController', 'index', 'admin');
  Router::handle('POST',  'admin/color-product/{attribute_id}',       'admin/colorProductController', 'create', 'admin');
  Router::handle('POST',  'admin/color-product-update/{attribute_id}',       'admin/colorProductController', 'update', 'admin');
  /*************************************************************************************** */
  Router::handle('POST',  'admin/attribute-price/delete', 'admin/attributePriceController', 'destroy', 'admin');
  Router::handle('GET',  'admin/attribute-price/add/{product_id}/{attribute_product_id}/{product_color_id}',  'admin/attributePriceController', 'add', 'admin');
  Router::handle('GET',  'admin/attribute-price/list', 'admin/attributePriceController', 'index', 'admin');
  Router::handle('POST',  'admin/attribute-price/add/{product_id}/{attribute_product_id}/{product_color_id}',  'admin/attributePriceController', 'insert', 'admin');
  Router::handle('GET',  'admin/attribute-price/edit/{attribute_price_id}',  'admin/attributePriceController', 'edit', 'admin');
  Router::handle('POST',  'admin/attribute-price/edit/{attribute_price_id}',  'admin/attributePriceController', 'update', 'admin');
  /*************************************************************************************** */
  Router::handle('GET',  'admin/conversation', 'admin/conversationController', 'index', 'admin');
    /*************************************************************************************** */

 Router::handle('GET',  'admin/coupon/add',        'admin/couponController', 'add', 'admin');
 Router::handle('POST',  'admin/coupon/add',        'admin/couponController', 'create', 'admin');
 Router::handle('GET',  'admin/coupon/list',       'admin/couponController', 'index', 'admin');
 Router::handle('GET',  'admin/coupon/edit/{id}','admin/couponController', 'edit', 'admin');
 Router::handle('POST',  'admin/coupon/edit/{id}','admin/couponController', 'update', 'admin');
 Router::handle('POST',  'admin/coupon/delete',     'admin/couponController', 'destroy', 'admin');
   /*************************************************************************************** */
   Router::handle('POST',  'admin/transport-fee/delete',       'admin/transportController', 'destroy', 'admin');
   Router::handle('POST',  'admin/transport-fee/list',       'admin/transportController', 'insert', 'admin');
   Router::handle('GET',  'admin/transport-fee/list',       'admin/transportController', 'index', 'admin');
   Router::handle('POST',  'admin/transport-fee/get-district',       'admin/transportController', 'getAllDistrictByCity', 'admin');
   Router::handle('POST',  'admin/transport-fee/get-ward',       'admin/transportController', 'getAllWardByDistrict', 'admin');
/********************************************************************************************* */

 Router::handle('GET',  'admin/user/privilege/{id}',       'admin/userPrivilegeController', 'add', 'admin');
 Router::handle('POST',  'admin/user/privilege/{id}',       'admin/userPrivilegeController', 'create', 'admin');
 /********************************************************************************************* */
 Router::handle('POST',  'admin/order/get-list-attribute-price',       'admin/orderController', 'getListAttributePriceProduct', 'admin');
 Router::handle('POST',  'admin/order/get-color',       'admin/orderController', 'getListColor', 'admin');
 Router::handle('POST',  'admin/order/get-color/not-inventory',       'admin/orderController', 'getListColorExceptInventory', 'admin');
 Router::handle('POST',  'admin/order/delete',       'admin/orderController', 'delete', 'admin');
 Router::handle('GET',  'admin/order/change/{product_id}/{product_color_id}/{order_id}/{order_detail_id}',       'admin/orderController', 'edit', 'admin');
 Router::handle('POST',  'admin/order/change/{product_id}/{product_color_id}/{order_id}/{order_detail_id}',       'admin/orderController', 'update', 'admin');
 Router::handle('GET',  'admin/order/list',       'admin/orderController', 'index', 'admin');
 Router::handle('GET',  'admin/order/detail/{id}',       'admin/orderController', 'detail', 'admin');
 Router::handle('POST',  'admin/order/detail/{id}',       'admin/orderController', 'change', 'admin');
 Router::handle('POST',  'admin/order/change-active-detail/{id}',       'admin/orderController', 'changeActive', 'admin');
 Router::handle('GET',  'admin/order/{id}',       'admin/orderController', 'listOrder', 'admin');
 Router::handle('POST',  'admin/order/{id}',       'admin/orderController', 'addItemToOrderDetail', 'admin');
 Router::handle('POST',  'api/admin/change-order',       'admin/orderController', 'getAttributeByColoProduct', 'admin');

  /********************************************************************************************* */
  Router::handle('POST',  'api/product/post-coment',       'post/commentController', 'postComment');
  Router::handle('GET',  'admin/comment/list',       'admin/commentController', 'index', 'admin');
  Router::handle('POST',  'admin/comment/delete',       'admin/commentController', 'destroy', 'admin');
  Router::handle('GET',  'admin/comment-detail/list/{id}',       'admin/commentController', 'detailListComment', 'admin');
    /********************************************************************************************* */
  Router::handle('GET',  'admin/inventory/list',       'admin/inventoryController', 'index', 'admin');
  Router::handle('GET',  'admin/inventory/add',       'admin/inventoryController', 'add', 'admin');
  Router::handle('POST',  'admin/inventory/add',       'admin/inventoryController', 'create', 'admin');
  Router::handle('GET',  'admin/inventory/edit/{id}',       'admin/inventoryController', 'edit', 'admin');
  Router::handle('POST',  'admin/inventory/edit/{id}',       'admin/inventoryController', 'update', 'admin');
  Router::handle('POST',  'api/inventory/get-history',       'admin/inventoryController', 'getAllHistoryByInventoryID', 'admin');
/*************************************************************************************
  * ********************************
  * ********************************
  * ********************************
  * ********************************
  * ********************************
  * ********************************
  * ********************************
  * ********************************
  * ********************************
  * ********************************
  * ********************************
  **************************************************************************************/
  
  Router::handle('GET',  'category/new/{slug}', 'post/handleController', 'detailCategoryPost');
  Router::handle('GET',  'compare/{url_first}/{url_second}', 'post/handleController', 'compare');
  Router::handle('GET',  'new', 'post/handleController', 'new');
  Router::handle('GET',  'new/{slug}', 'post/handleController', 'detailNew');
  Router::handle('GET',  'dashboard', 'post/handleController', 'dashboard', 'user');
  Router::handle('POST',  'dashboard', 'post/userController', 'update', 'user');

  Router::handle('GET',  'login', 'post/handleController', 'login');
  Router::handle('GET',  'logout', 'post/userController', 'logout');
  Router::handle('GET',  'order', 'post/userController', 'getListOrder', 'user');
  Router::handle('POST',  'api/authentication/force-password', 'post/userController', 'authenticationForcePassWord');
  Router::handle('POST',  'api/authentication/handle-otp', 'post/userController', 'getPassWord');
  Router::handle('POST',  'login', 'post/userController', 'login');
  Router::handle('GET',  'register', 'post/handleController', 'register');
  Router::handle('POST',  'register', 'post/userController', 'register');
  Router::handle('GET',  '', 'post/handleController', 'home');
  Router::handle('GET',  'index.html', 'post/handleController', 'home');
  Router::handle('GET',  'cart', 'post/handleController', 'cart');
  Router::handle('POST',  'get/plat-form/{slug}', 'post/handleController', 'getFilter');
  Router::handle('POST',  'api/plat-form/{slug}', 'post/handleController', 'getTotalFilter');
  Router::handle('GET',  'plat-form/{slug}', 'post/handleController', 'platForm');
  //Router::handle('GET',  'category/{platform_slug}/{category_slug}', 'post/handleController', 'category');
  Router::handle('GET',  'product/{platform_slug}/{product_slug}', 'post/handleController', 'detailProduct');
  Router::handle('GET',  'introduce/agent', 'post/handleController', 'detailAgent');
  Router::handle('GET',  'introduce/{slug}', 'post/handleController', 'detailIntroduce');
  Router::handle('POST',  'api/get-color-product', 'post/productController', 'getColorProductByAttributeProductIDAjax');
  Router::handle('POST',  'api/get-attribute-price-product', 'post/productController', 'getAttributePriceProductCartAjax');
  Router::handle('POST',  'api/address/get-district', 'post/productController', 'getDistrict');
  Router::handle('POST',  'api/address/get-ward', 'post/productController', 'getWard');
  Router::handle('POST',  'api/address/get-transport-fee', 'post/productController', 'getTransportFee');
  Router::handle('POST',  'api/check-coupon', 'post/productController', 'checkCoupon');
  Router::handle('POST',  'api/purchase', 'post/cartController', 'purchaseCart');
  Router::handle('POST',  'api/user/get-orderdetail', 'post/orderController', 'getListOrderDetail');
  Router::handle('POST',  'api/user/delete-item/order', 'post/orderController', 'deleteItem');
  Router::handle('POST',  'api/user/cancel-order-item/order', 'post/orderController', 'cancelOrder');
 /**************************************************************************************/
 Router::handle('POST',  'api/chatbot/get-order', 'post/orderController', 'getOrderByCode');
 Router::handle('POST',  'api/chatbot/get-product', 'post/productController', 'getProductByChat');
 Router::handle('POST',  'api/get-autocomplete', 'post/productController', 'getAutoComplete');
 Router::handle('POST',  'api/check-inventory/cart', 'post/orderController', 'checkInventory');
 http_response_code(404);
 return ($viewLoad->loadView('admin/errorPage/404notFound'));
 
?>