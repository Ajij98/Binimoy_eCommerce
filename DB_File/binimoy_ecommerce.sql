-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2022-02-19 10:42:03
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for binimoy_ecommerce
DROP DATABASE IF EXISTS `binimoy_ecommerce`;
CREATE DATABASE IF NOT EXISTS `binimoy_ecommerce` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `binimoy_ecommerce`;


-- Dumping structure for table binimoy_ecommerce.tb_area
DROP TABLE IF EXISTS `tb_area`;
CREATE TABLE IF NOT EXISTS `tb_area` (
  `area_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table binimoy_ecommerce.tb_area: ~26 rows (approximately)
DELETE FROM `tb_area`;
/*!40000 ALTER TABLE `tb_area` DISABLE KEYS */;
INSERT INTO `tb_area` (`area_id`, `area_name`, `added_by`, `entry_time`) VALUES
	(1, 'Agrabad', 'Admin', '2021-07-12 16:05:49'),
	(2, 'JEC', 'Admin', '2021-07-12 16:06:03'),
	(3, '2 No Gate', 'Admin', '2021-07-12 16:06:12'),
	(4, 'Muradpur', 'Admin', '2021-07-12 16:06:21'),
	(5, 'Boddarhat', 'Admin', '2021-07-12 16:06:34'),
	(6, 'Chawkbazar', 'Admin', '2021-07-12 16:06:43'),
	(7, 'Zamal Khan', 'Admin', '2021-09-04 07:18:07'),
	(8, 'Lalkhan Bazar', 'Admin', '2021-09-04 07:18:38'),
	(9, 'Halisahar', 'Admin', '2021-09-04 07:18:47'),
	(10, 'Karnafuli', 'Admin', '2021-09-04 07:19:00'),
	(11, 'Kotwali', 'Admin', '2021-09-04 07:19:13'),
	(12, 'Khulshi', 'Admin', '2021-09-04 07:19:22'),
	(13, 'Panchlaish', 'Admin', '2021-09-04 07:19:31'),
	(14, 'Pahartali', 'Admin', '2021-09-04 07:19:42'),
	(15, 'Bakalia', 'Admin', '2021-09-04 07:19:58'),
	(16, 'Bayejid', 'Admin', '2021-09-04 07:20:53'),
	(17, 'Anowara', 'Admin', '2021-09-04 07:21:02'),
	(18, 'Chandanaish', 'Admin', '2021-09-04 07:21:09'),
	(19, 'Patiya', 'Admin', '2021-09-04 07:21:18'),
	(20, 'Fatikchhari', 'Admin', '2021-09-04 07:21:25'),
	(21, 'Banskhali', 'Admin', '2021-09-04 07:21:31'),
	(22, 'Boalkhali', 'Admin', '2021-09-04 07:21:38'),
	(23, 'Mirsharai', 'Admin', '2021-09-04 07:21:46'),
	(24, 'Raozan', 'Admin', '2021-09-04 07:21:53'),
	(25, 'Rangunia', 'Admin', '2021-09-04 07:22:00'),
	(26, 'Lohagara', 'Admin', '2021-09-04 07:22:07'),
	(27, 'Sandwip', 'Admin', '2021-09-04 07:22:15'),
	(28, 'Satkania', 'Admin', '2021-09-04 07:22:22'),
	(29, 'Sitakunda', 'Admin', '2021-09-04 07:22:29'),
	(30, 'Hatazari', 'Admin', '2021-09-04 07:22:35');
/*!40000 ALTER TABLE `tb_area` ENABLE KEYS */;


-- Dumping structure for table binimoy_ecommerce.tb_order_payment
DROP TABLE IF EXISTS `tb_order_payment`;
CREATE TABLE IF NOT EXISTS `tb_order_payment` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_code` int(10) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `order_code` int(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_code` int(10) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `payment_ss` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `paid_by` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `payment_verify_status` int(10) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='payment_code,customer_name,customer_email,customer_phone,customer_address,order_id,order_code,product_id,product_name,product_price,product_code,product_type,paid_amount,payment_method,account_number,trx_id,payment_ss,payment_date,paid_by,shop_owner,entry_time';

-- Dumping data for table binimoy_ecommerce.tb_order_payment: ~0 rows (approximately)
DELETE FROM `tb_order_payment`;
/*!40000 ALTER TABLE `tb_order_payment` DISABLE KEYS */;
INSERT INTO `tb_order_payment` (`payment_id`, `payment_code`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `order_id`, `order_code`, `product_id`, `product_name`, `product_price`, `product_code`, `product_type`, `paid_amount`, `payment_method`, `account_number`, `trx_id`, `payment_ss`, `payment_date`, `paid_by`, `shop_owner`, `payment_verify_status`, `entry_time`) VALUES
	(1, 572634, 'Md Karim', 'karim@gmail.com', '01845862635', 'JEC', 1, 233474, 1, 'Panasonic Iron', 1400, 459821, 'Electronics', 100, 'Bkash', '01845862635', '8DX6ZQ9WER', 'payment_screenshots/55aad67b2ab77c1aabb2debb422c6019bkash_payment.jpg', '2021-09-08', 'Customer', 'Shop Owner', 1, '2021-09-08 14:54:10');
/*!40000 ALTER TABLE `tb_order_payment` ENABLE KEYS */;


-- Dumping structure for table binimoy_ecommerce.tb_order_product
DROP TABLE IF EXISTS `tb_order_product`;
CREATE TABLE IF NOT EXISTS `tb_order_product` (
  `order_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `order_code` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` int(11) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `shop_image` varchar(255) DEFAULT NULL,
  `shop_location` varchar(255) DEFAULT NULL,
  `shop_location_details` varchar(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `customer_msg` varchar(255) DEFAULT NULL,
  `order_by` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `order_verify_status` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='order_code,customer_name,email,phone,address,shop_id,shop_name,shop_code,shop_address,medicine,medicine_image,order_date,order_by,shop_owner,entry_time';

-- Dumping data for table binimoy_ecommerce.tb_order_product: ~2 rows (approximately)
DELETE FROM `tb_order_product`;
/*!40000 ALTER TABLE `tb_order_product` DISABLE KEYS */;
INSERT INTO `tb_order_product` (`order_id`, `order_code`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `product_id`, `product_name`, `product_code`, `product_price`, `product_type`, `product_image`, `order_date`, `shop_id`, `shop_name`, `shop_code`, `shop_image`, `shop_location`, `shop_location_details`, `quantity`, `customer_msg`, `order_by`, `shop_owner`, `order_verify_status`, `entry_time`) VALUES
	(1, 233474, 'Md Karim', 'karim@gmail.com', '01845862635', 'JEC', 1, 'Panasonic Iron', 459821, 1400, 'Electronics', 'product_images/82144fd44a3a843da6b6a93415e01f17iron.jpg', '2021-09-08', 1, 'Janata Electronics', 420845, 'shop_images/289146d4c421197cd9a0f1c88a0a26e1electronics_shop.jpg', 'New Market', '#Road No-3, Sah Amanat Market, #2nd Floor, #Shop No-3, New Market', 1, 'Nothing to say.', 'Customer', 'Shop Owner', 1, '2021-09-08 01:57:04'),
	(2, 741724, 'Md Karim', 'karim@gmail.com', '01845862635', 'JEC', 1, 'Panasonic Iron', 459821, 1400, 'Electronics', 'product_images/82144fd44a3a843da6b6a93415e01f17iron.jpg', '2021-09-08', 1, 'Janata Electronics', 420845, 'shop_images/289146d4c421197cd9a0f1c88a0a26e1electronics_shop.jpg', 'New Market', '#Road No-3, Sah Amanat Market, #2nd Floor, #Shop No-3, New Market', 1, 'aasa', 'Customer', 'Shop Owner', 0, '2021-09-08 02:01:39');
/*!40000 ALTER TABLE `tb_order_product` ENABLE KEYS */;


-- Dumping structure for table binimoy_ecommerce.tb_product
DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE IF NOT EXISTS `tb_product` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_image` varchar(255) DEFAULT NULL,
  `shop_location` varchar(255) DEFAULT NULL,
  `shop_location_details` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` int(11) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_image_1` varchar(255) DEFAULT NULL,
  `product_image_2` varchar(255) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_brand` varchar(255) DEFAULT NULL,
  `fixed_price_or_not` varchar(255) DEFAULT NULL,
  `product_upload_date` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='name,email,phone,shop_id,shop_code,shop_name,shop_location_details,product_name,product_code,product_type,product_price,product_image_1,product_image_2,product_description,product_brand,fixed_price_or_not,product_upload_date,shop_owner,entry_time';

-- Dumping data for table binimoy_ecommerce.tb_product: ~2 rows (approximately)
DELETE FROM `tb_product`;
/*!40000 ALTER TABLE `tb_product` DISABLE KEYS */;
INSERT INTO `tb_product` (`product_id`, `name`, `email`, `phone`, `shop_id`, `shop_code`, `shop_name`, `shop_image`, `shop_location`, `shop_location_details`, `product_name`, `product_code`, `product_type`, `product_price`, `product_image_1`, `product_image_2`, `product_description`, `product_brand`, `fixed_price_or_not`, `product_upload_date`, `shop_owner`, `entry_time`) VALUES
	(1, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854568255', 1, 420845, 'Janata Electronics', 'shop_images/289146d4c421197cd9a0f1c88a0a26e1electronics_shop.jpg', 'New Market', '#Road No-3, Sah Amanat Market, #2nd Floor, #Shop No-3, New Market', 'Panasonic Iron', 459821, 'Electronics', 1400, 'product_images/82144fd44a3a843da6b6a93415e01f17iron.jpg', 'product_images/82144fd44a3a843da6b6a93415e01f17iron.jpg', 'It is an original Panasonic product and it has one year warranty.\r\n', 'Panasonic', 'Yes', '2021-09-04', 'Shop Owner', '2021-09-04 00:54:52'),
	(3, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854568255', 1, 420845, 'Janata Electronics', 'shop_images/289146d4c421197cd9a0f1c88a0a26e1electronics_shop.jpg', 'New Market', '#Road No-3, Sah Amanat Market, #2nd Floor, #Shop No-3, New Market', 'aa', 139903, 'Electronics', 12, 'product_images/041fa809706d090661c36ec61cbc0e17991189c4cf8f227f0c1009dcc7300273product-5.jpg', 'product_images/041fa809706d090661c36ec61cbc0e176a53996fc307dec45defadb43a411b08product-5.jpg', 'zsdf', 'asd', 'Yes', '2021-09-08', 'Shop Owner', '2021-09-08 01:44:32');
/*!40000 ALTER TABLE `tb_product` ENABLE KEYS */;


-- Dumping structure for table binimoy_ecommerce.tb_shop
DROP TABLE IF EXISTS `tb_shop`;
CREATE TABLE IF NOT EXISTS `tb_shop` (
  `shop_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_type` varchar(255) DEFAULT NULL,
  `about_shop` varchar(255) DEFAULT NULL,
  `shop_location` varchar(255) DEFAULT NULL,
  `shop_location_details` varchar(255) DEFAULT NULL,
  `shop_image` varchar(255) DEFAULT NULL,
  `shop_added_date` varchar(255) DEFAULT NULL,
  `shop_oc_time` varchar(255) DEFAULT NULL,
  `shop_contact` varchar(255) DEFAULT NULL,
  `bkash_number` varchar(11) DEFAULT NULL,
  `nagad_number` varchar(11) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `shop_verify_status` int(11) DEFAULT '0',
  `shop_owner` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='name,email,phone,shop_name,about_shop,shop_location,shop_location_details,shop_image,shop_added_date,shop_oc_time,shop_contact,shop_code,shop_owner,entry_time';

-- Dumping data for table binimoy_ecommerce.tb_shop: ~4 rows (approximately)
DELETE FROM `tb_shop`;
/*!40000 ALTER TABLE `tb_shop` DISABLE KEYS */;
INSERT INTO `tb_shop` (`shop_id`, `name`, `email`, `phone`, `shop_name`, `shop_type`, `about_shop`, `shop_location`, `shop_location_details`, `shop_image`, `shop_added_date`, `shop_oc_time`, `shop_contact`, `bkash_number`, `nagad_number`, `shop_code`, `shop_verify_status`, `shop_owner`, `entry_time`) VALUES
	(1, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854568255', 'Janata Electronics', 'Electronics', 'An electrical store is a shop focused on selling different electrical supplies (cable, cable channels, electric sockets etc) and electrical devices (electric meters, junction boxes, fuse boxes etc).', 'New Market', '#Road No-3, Sah Amanat Market, #2nd Floor, #Shop No-3, New Market', 'shop_images/289146d4c421197cd9a0f1c88a0a26e1electronics_shop.jpg', '2021-09-03', '( Sat - Wed ) 10:00 AM - 12:00 PM', '01855478566', '01855478566', '01855478577', 420845, 1, 'Shop Owner', '2021-09-03 15:33:07'),
	(2, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854568255', 'Hoque Electronics', 'Electronics', 'An electrical store is a shop focused on selling different electrical supplies (cable, cable channels, electric sockets etc) and electrical devices (electric meters, junction boxes, fuse boxes etc).', 'Agrabad', '#Road No-2, Ziaul Hoque Market, #Ground Floor, #Shop No-3, Agrabad', 'shop_images/8c43fea8bd36397a92a1c8506edcebbaelectronics_shop_1.jpg', '2021-09-07', '( Sat - Wed ) 10:00 AM - 12:00 PM', '01875482155', '01855478566', '01855478577', 886462, 1, 'Shop Owner', '2021-09-15 01:00:00'),
	(3, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854568255', 'Ananda Crockeries', 'Crockeries', 'Crockery is the plates, cups, saucers, and dishes that you use at meals. [mainly British] We had no fridge, cooker, cutlery or crockery.', 'Agrabad', '#Road No-2, Opposite of Akhtaruzzaman Center, Singapur Market, #Shop No-3, Agrabad', 'shop_images/80535a99ffdf421a14c565d4a2a0b841crockeries_shop.jpg', '2021-09-03', '( Sat - Thur ) 10:00 AM - 01:00 PM', '01875482155, 01845254566', '01875482155', '01875482166', 495094, 0, 'Shop Owner', '2021-09-03 15:33:07');
/*!40000 ALTER TABLE `tb_shop` ENABLE KEYS */;


-- Dumping structure for table binimoy_ecommerce.tb_shop_payment
DROP TABLE IF EXISTS `tb_shop_payment`;
CREATE TABLE IF NOT EXISTS `tb_shop_payment` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_location_details` varchar(255) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `payment_ss` varchar(255) DEFAULT NULL,
  `paid_by` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_code` int(11) DEFAULT NULL,
  `payment_verify_status` int(11) DEFAULT '0',
  `owner_user_name` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='name,phone,shop_id,shop_code,shop_name,shop_location_details,paid_amount,trx_id,payment_ss,paid_by,payment_date,payment_code,owner_user_name,entry_time';

-- Dumping data for table binimoy_ecommerce.tb_shop_payment: ~3 rows (approximately)
DELETE FROM `tb_shop_payment`;
/*!40000 ALTER TABLE `tb_shop_payment` DISABLE KEYS */;
INSERT INTO `tb_shop_payment` (`payment_id`, `name`, `phone`, `shop_id`, `shop_code`, `shop_name`, `shop_location_details`, `paid_amount`, `trx_id`, `payment_ss`, `paid_by`, `payment_date`, `payment_code`, `payment_verify_status`, `owner_user_name`, `entry_time`) VALUES
	(1, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Janata Electronics', '#Road No-3, Sah Amanat Market, #2nd Floor, #Shop No-3, New Market', 500, '8G41LMGK57', 'payment_screenshot_images/ba8a7a79b3c409ea2137b704594cef4ebkash_payment.jpg', 'Bkash', '2021-09-03', 936654, 1, 'Shop Owner', '2021-09-03 15:33:07'),
	(2, 'Md Abdur Rahim', '01854568255', 2, 886462, 'Hoque Electronics', '#Road No-2, Ziaul Hoque Market, #Ground Floor, #Shop No-3, Agrabad', 1000, '8FT2HOERYG', 'payment_screenshot_images/d57c5cf525a166547c2e42238eab81d5bkash_payment.jpg', 'Bkash', '2021-09-07', 552198, 1, 'Shop Owner', '2021-09-15 01:00:00'),
	(3, 'Md Abdur Rahim', '01854568255', 3, 495094, 'Ananda Crockeries', '#Road No-2, Opposite of Akhtaruzzaman Center, Singapur Market, #Shop No-3, Agrabad', 800, '7FT9HLQTIX', 'payment_screenshot_images/e931eb857fcae40bad8fdd7e1fcca25fbkash_payment.jpg', 'Nagad', '2021-09-03', 826840, 0, 'Shop Owner', '2021-09-03 15:33:07');
/*!40000 ALTER TABLE `tb_shop_payment` ENABLE KEYS */;


-- Dumping structure for table binimoy_ecommerce.tb_shop_review
DROP TABLE IF EXISTS `tb_shop_review`;
CREATE TABLE IF NOT EXISTS `tb_shop_review` (
  `review_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `reviewed_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table binimoy_ecommerce.tb_shop_review: ~0 rows (approximately)
DELETE FROM `tb_shop_review`;
/*!40000 ALTER TABLE `tb_shop_review` DISABLE KEYS */;
INSERT INTO `tb_shop_review` (`review_id`, `shop_id`, `shop_name`, `shop_code`, `rating_value`, `comment`, `shop_owner`, `reviewed_by`, `entry_time`) VALUES
	(1, 1, 'Janata Electronics', 420845, 4, 'I bought a Panasonic Iron, This product is very good. Thanks to Janata Electronics.', 'Shop Owner', 'Customer', '2021-09-07 23:43:24');
/*!40000 ALTER TABLE `tb_shop_review` ENABLE KEYS */;


-- Dumping structure for table binimoy_ecommerce.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table binimoy_ecommerce.tb_user: ~4 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `email`, `phone`, `address`, `user_name`, `password`, `user_type`, `entry_time`) VALUES
	(1, 'Md Habib', 'admin@gmail.com', '01609479393', 'Agrabad', 'Admin', '12345', 'Admin', '2021-09-03 15:33:07'),
	(2, 'Md Abdur Rahim', 'abdurrahim@gmail.com', '01857458255', 'Muradpur', 'Shop Owner', '12345', 'Shop Owner', '2021-09-03 15:33:07'),
	(3, 'Md Karim', 'karim@gmail.com', '01845862635', 'JEC', 'Customer', '12345', 'Customer', '2021-09-03 15:33:07'),
	(4, 'Sahid Rahman', 'sahid@gmail.com', '01857562587', 'Muradpur', 'Sahid', '12345', 'Customer', '2021-09-04 15:33:07'),
	(5, 'Jishan Ahmed', 'jishan@gmail.com', '01875325462', 'JEC', 'Jishan', '12345', 'Customer', '2021-09-05 15:33:07');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
