/*Lấy tất cả sản phẩm thuộc nền tảng kinh doanh*/

SELECT `products`.`name` AS `product_name`, `categories`.`name` AS `category_name`, platform.name AS `platform_name` FROM `products` 
JOIN `categories`
ON `products`.`category_id` 
IN(SELECT `categories`.`id` FROM `categories` WHERE `categories`.`parent_id` = 1 ) 
AND `products`.`category_id` = `categories`.`id`
JOIN `categories` platform
ON `categories`.`parent_id` = platform.id
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


/*lấy tổng màu sắc trong list sản phẩm*/
SELECT `products`.`name`, COUNT(`attribute_product`.`product_id`) AS `total_color` FROM `products` 
JOIN `attribute_product` 
ON `products`.`id` = `attribute_product`.`product_id`
AND `attribute_product`.`type_id` = 3
GROUP BY `attribute_product`.`product_id`, `products`.`name`

/*******Lấy tất cả sản phẩm có biến thể màu sắc********/
SELECT `product_color`.`id` AS `product_color_id`,`values`.`value`,`product_color`.`thumb`,`products`.`slug`,`products`.`thumb`,`products`.`name`, `products`.`id` AS `product_id`, `attribute_product`.`id` AS `attribute_product_id`
FROM `products`
JOIN `product_color`
JOIN `values`
JOIN `attribute_product`
ON `products`.`id` = `attribute_product`.`product_id`
AND `product_color`.`attribute_product_id` = `attribute_product`.`id`
AND `attribute_product`.`value_id` = `values`.`id`
AND `attribute_product`.`type_id` = 3 

/*********************Lấy hết giá biến thể thông qua màu sắc sản phẩm**********************************/
SELECT `attribute_price`.`price`, `attribute_price`.`id`, t1.`description`, v1.`value`,  v2.`value` AS `color`, `products`.`name` AS `name_product`
FROM `attribute_price` 
JOIN `attribute_product` a1
JOIN `attribute_product` a2
JOIN `product_color`
JOIN `values` v1
JOIN `types` t1
JOIN `values` v2
JOIN `types` t2
JOIN `products`
ON `attribute_price`.`attribute_product_id` = a1.`id`
AND `attribute_price`.`product_color_id` = `product_color`.`id`
AND `product_color`.`attribute_product_id` = a2.`id`
AND a1.product_id = `products`.`id`
AND a1.`type_id` = t1.`id`
AND a1.`value_id` = v1.`id`
AND a2.`type_id` = t2.`id`
AND a2.`value_id` = v2.`id`

/*lấy biến thể màu sản phẩm thông qua chi tiết đơn hàng chỉ định*/
SELECT `products`.`name`,`types`.`description`, `values`.`value`, `product_color`.`price`, `product_color`.`price_sale`, `product_color`.`thumb`, `order_detail`.`total`, `order_detail`.`quantity`

FROM `order_detail`
INNER JOIN `order`
INNER JOIN `product_color`
ON `order_detail`.`order_id` = `order`.`id`
AND `order_detail`.`product_id` = `product_color`.`id`
INNER JOIN `attribute_product` 
ON `product_color`.`attribute_product_id` = `attribute_product`.`id`
INNER JOIN `products`
ON `attribute_product`.`product_id` = `products`.`id`
INNER JOIN `values`
INNER JOIN `types`
ON `attribute_product`.`type_id` = `types`.`id`
AND `attribute_product`.`value_id` = `values`.`id`
AND `order_detail`.`order_id` = 11

/*********************Lấy biến thể giá thông qua bảng chi tiết đơn hàng ID*****************/
SELECT `products`.name AS `product_name`, v1.value AS `product_color`, `types`.`description`, `values`.`value`, `attribute_price`.`price`,`attribute_price`.`price_sale`
FROM `order_attribute_product` 
INNER JOIN `order_detail`
ON `order_attribute_product`.`order_detail_id` = `order_detail`.`id`
INNER JOIN `product_color` 
ON `order_detail`.`product_id` = `product_color`.`id`
INNER JOIN `attribute_product` p1
ON `product_color`.`attribute_product_id` = p1.id
INNER JOIN `types` t1
INNER JOIN `values` v1
ON p1.type_id = t1.id
AND p1.value_id = v1.id
INNER JOIN `attribute_price`
ON `order_attribute_product`.`attribute_price_id` = `attribute_price`.`id`
INNER JOIN `attribute_product`
ON `attribute_price`.`attribute_product_id` = `attribute_product`.`id`
INNER JOIN `values`
INNER JOIN `types`
ON `attribute_product`.`type_id` = `types`.`id`
AND `attribute_product`.`value_id` = `values`.`id`
INNER JOIN `products` 
ON `attribute_product`.`product_id` = `products`.`id`


/*******************************/
SELECT `types`.`id`,`products`.`name`,`types`.`name` AS `type_name`,`values`.`value`,`attribute_price`.`price`, `attribute_price`.`price_sale`,`attribute_price`.`quantity`,`attribute_price`.`active` , `attribute_price`.`id` AS `attribute_price_id`
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
        AND `product_color`.attribute_product_id = 138
        AND `values`.`value` IN ('256 Gb', '8Gb')
        ORDER BY `types`.`id` ASC;

/*******************************************************/
SELECT (`products`.`price` - (`products`.`price` * `products`.`price_sale`)) AS `price_init` ,`products`.`name` FROM `attribute_product` 
INNER JOIN `products`
INNER JOIN `brands`
ON `products`.`id` = `attribute_product`.`product_id`
AND `products`.`brand_id` = `brands`.`id`
WHERE `attribute_product`.`type_id` IN(1,2) 
AND `attribute_product`.`value_id` IN(1,2,3,4)
AND (`products`.`price` - (`products`.`price` * `products`.`price_sale`)) >= 3 AND (`products`.`price` - (`products`.`price` * `products`.`price_sale`)) <= 50000000
AND `products`.`brand_id` IN (1,2,3,5);


/***********************************/
SELECT `products`.`price` - (`products`.`price` * `products`.`price_sale`) AS `product_sale_price`,c1.name AS `category_name`, c2.name AS `platform_name`, `products`.`name` AS `product_name`, `brands`.`name` AS `brand_name`, `products`.`price`, `products`.`price_sale` FROM `attribute_product`
RIGHT JOIN `products`
ON `attribute_product`.`product_id` = `products`.`id`
INNER JOIN `categories` c1
ON `products`.`category_id` = c1.`id`
INNER JOIN `categories` c2
ON c2.id = c1.parent_id
INNER JOIN `brands`
ON `products`.`brand_id` = `brands`.`id`
WHERE c2.slug = "dien-thoai"
AND c1.id IN(4,3)
AND `attribute_product`.`value_id` IN (9)
AND `brands`.`id` IN(3)
AND `products`.`price` - (`products`.`price` * `products`.`price_sale`) BETWEEN 3000000 AND 7000000
GROUP BY `products`.`name`
ORDER BY `product_sale_price` DESC

/************************************************/
SELECT `products`.`name`, `types`.`description`, `values`.`value`
FROM `type_category`
LEFT JOIN `attribute_product`
ON `attribute_product`.`type_id` = `type_category`.`type_id`
JOIN `products`
ON `attribute_product`.`product_id`= `products`.`id`
JOIN `types` 
ON `attribute_product`.`type_id` = `types`.`id`
JOIN `values`
ON `attribute_product`.`value_id` = `values`.`id`
JOIN `categories`
ON `categories`.`id` = `type_category`.`category_id`
WHERE `categories`.`slug` = "dien-thoai"
AND `products`.`slug` = "iphone-13"