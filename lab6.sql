/*Lấy tất cả sản phẩm thuộc nền tảng kinh doanh*/

SELECT `products`.`name` AS `product_name`, `categories`.`name` AS `category_name` FROM `products` JOIN `categories` WHERE `products`.`category_id` IN(SELECT `categories`.`id` FROM `categories` WHERE `categories`.`parent_id` = 1 ) AND `products`.`category_id` = `categories`.`id`;
/*---------------------------------------------------------*/


/*Lấy tất cả sản phẩm thuộc danh mục*/

SELECT `products`.`name` AS `product_name`, `categories`.`name` AS `category_name` FROM `products` JOIN `categories` WHERE  `products`.`category_id` = `categories`.`id` AND `categories`.`id` = 2;
/*---------------------------------------------------------*/

/**/


/*Lấy sản phẩm kèm tất cả các biến thể*/
SELECT `attribute_product`.`id`, `types`.`description`, `values`.`value`, `products`.`name` FROM `attribute_product` 
JOIN `products` 
JOIN `values` 
JOIN `types`
WHERE `attribute_product`.`product_id` = 1
AND `attribute_product`.`type_id` = `types`.`id`
AND `attribute_product`.`value_id` = `values`.`id`
AND `products`.`id` = `attribute_product`.`product_id`
/*---------------------------------------------------------*/





/*Lấy sản phẩm kèm theo tất cả màu sắc*/
SELECT  `types`.`description`, `values`.`value`, `products`.`name`, `product_color`.* 
FROM `attribute_product` 
JOIN `products` 
JOIN `values` 
JOIN `types` 
JOIN `product_color` 
WHERE `attribute_product`.`product_id` = 1 
AND `attribute_product`.`type_id` = 3 
AND `attribute_product`.`id` = `product_color`.`attribute_product_id`
AND `attribute_product`.`type_id` = `types`.`id` 
AND `attribute_product`.`value_id` = `values`.`id` 
AND `products`.`id` = `attribute_product`.`product_id`;
/*---------------------------------------------------------*/

/*Lấy giá rom thông qua sản phẩm chỉ định*/
SELECT  `types`.`description`, `values`.`value`, `products`.`name`, `rom_product`.`price`
FROM `attribute_product` 
JOIN `products` 
JOIN `values` 
JOIN `types`
JOIN `rom_product`
WHERE `attribute_product`.`product_id` = 1 
AND `attribute_product`.`id` = `rom_product`.`attribute_product_id`
AND `attribute_product`.`type_id` = 1 
AND `attribute_product`.`type_id` = `types`.`id` 
AND `attribute_product`.`value_id` = `values`.`id` 
AND `products`.`id` = `attribute_product`.`product_id`;
/*---------------------------------------------------------*/


/*Lấy màu sắc chỉ định thông qua sản phẩm*/
SELECT `types`.`description`, `values`.`value`, `products`.`name`, `product_color`.* 
FROM `attribute_product` 
JOIN `products` 
JOIN `values` 
JOIN `types` 
JOIN `product_color` 
WHERE `attribute_product`.`id` = 1 
AND `attribute_product`.`type_id` = 3 
AND `attribute_product`.`id` = `product_color`.`attribute_product_id` 
AND `attribute_product`.`type_id` = `types`.`id` 
AND `attribute_product`.`value_id` = `values`.`id` 
AND `products`.`id` = `attribute_product`.`product_id`;


/*----------------------------------------------------------------*/



/*Lấy giá rom thông qua mauf sac sản phẩm chỉ định */
SELECT `rom_product`.`price`, `types`.`description`, `values`.`value`, `products`.`name` 
FROM `rom_product` 
JOIN `attribute_product`
JOIN `types`
JOIN `values`
JOIN `products`
WHERE `product_color_id` = 1
AND `rom_product`.`attribute_product_id` = `attribute_product`.`id`
AND `attribute_product`.`type_id` = `types`.`id`
AND `attribute_product`.`value_id` = `values`.`id`
AND `attribute_product`.`product_id` = `products`.`id`
/*----------------------------------------------------------------*/


/*-------------------------------------------------------------------*/
SELECT `products`.`name`,`types`.`description`,`values`.`value`,`attribute_price`.`price`, `attribute_price`.`price_sale`,`attribute_price`.`quantity`,`attribute_price`.`active` 
FROM `attribute_price`
JOIN `product_color`
JOIN `attribute_product`
JOIN `types`
JOIN `values`
JOIN `products`
ON `attribute_price`.`product_color_id` = `product_color`.`id`
AND `attribute_price`.`attribute_product_id` = `attribute_product`.`id`
AND `attribute_product`.`type_id` = `types`.`id`
AND `attribute_product`.`value_id` = `values`.`id`
AND `attribute_product`.`product_id` = `products`.`id`
/************************************************************************8 */

SELECT `products`.`name`,`types`.`description`,`values`.`value`,`attribute_price`.`price`, `attribute_price`.`price_sale`,`attribute_price`.`quantity`,`attribute_price`.`active` FROM `attribute_price` 
JOIN `product_color` 
JOIN `attribute_product` 
JOIN `types` 
JOIN `values` 
JOIN `products` 
ON `attribute_price`.`product_color_id` = `product_color`.`id` 
AND `attribute_price`.`attribute_product_id` = `attribute_product`.`id` 
AND `attribute_product`.`type_id` = `types`.`id` 
AND `attribute_product`.`value_id` = `values`.`id` 
AND `attribute_product`.`product_id` = `products`.`id` 
AND `attribute_price`.`product_color_id` = 1;

/******************************************************************************************/
SELECT `products`.`id` ,`products`.`name`, c1.name, c2.name AS `platform`, c2.id AS `platform_id` FROM `products` 
JOIN `categories` c1
JOIN `categories` c2
ON `products`.`category_id` = c1.id
AND c1.parent_id = c2.id
AND `products`.`id` = 1