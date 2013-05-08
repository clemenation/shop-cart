/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : yiishop

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2011-07-19 18:24:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `shop_address`
-- ----------------------------
DROP TABLE IF EXISTS `shop_address`;
CREATE TABLE `shop_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_address
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_category`
-- ----------------------------
DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE `shop_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `language` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_category
-- ----------------------------
INSERT INTO shop_category VALUES ('1', '0', 'Primary Articles', null, null);
INSERT INTO shop_category VALUES ('2', '0', 'Secondary Articles', null, null);
INSERT INTO shop_category VALUES ('3', '1', 'Red Primary Articles', null, null);
INSERT INTO shop_category VALUES ('4', '1', 'Green Primary Articles', null, null);
INSERT INTO shop_category VALUES ('5', '2', 'Red Secondary Articles', null, null);

-- ----------------------------
-- Table structure for `shop_customer`
-- ----------------------------
DROP TABLE IF EXISTS `shop_customer`;
CREATE TABLE `shop_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_customer
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_image`
-- ----------------------------
DROP TABLE IF EXISTS `shop_image`;
CREATE TABLE `shop_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `filename` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Image_Products` (`product_id`),
  CONSTRAINT `fk_Image_Products` FOREIGN KEY (`product_id`) REFERENCES `shop_products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_image
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_order`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `ordering_date` int(11) NOT NULL,
  `ordering_done` tinyint(1) DEFAULT NULL,
  `ordering_confirmed` tinyint(1) DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `comment` text,
  PRIMARY KEY (`order_id`),
  KEY `fk_order_customer` (`customer_id`),
  CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `shop_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_order
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_order_position`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order_position`;
CREATE TABLE `shop_order_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `specifications` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_order_position
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_payment_method`
-- ----------------------------
DROP TABLE IF EXISTS `shop_payment_method`;
CREATE TABLE `shop_payment_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_payment_method
-- ----------------------------
INSERT INTO shop_payment_method VALUES ('1', 'cash', 'You pay cash', '1', '0');
INSERT INTO shop_payment_method VALUES ('2', 'advance Payment', 'You pay in advance, we deliver', '1', '0');
INSERT INTO shop_payment_method VALUES ('3', 'cash on delivery', 'You pay when we deliver', '1', '0');
INSERT INTO shop_payment_method VALUES ('4', 'invoice', 'We deliver and send a invoice', '1', '0');
INSERT INTO shop_payment_method VALUES ('5', 'paypal', 'You pay by paypal', '1', '0');

-- ----------------------------
-- Table structure for `shop_products`
-- ----------------------------
DROP TABLE IF EXISTS `shop_products`;
CREATE TABLE `shop_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `price` varchar(45) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `specifications` text,
  PRIMARY KEY (`product_id`),
  KEY `fk_products_category` (`category_id`),
  CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `shop_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_products
-- ----------------------------
INSERT INTO shop_products VALUES ('1', '1', '1', 'Demonstration of Article with variations', 'Hello, World!', '19.99', null, null);
INSERT INTO shop_products VALUES ('2', '1', '2', 'Another Demo Article with less Tax', '!!', '29.99', null, null);
INSERT INTO shop_products VALUES ('3', '2', '1', 'Demo3', '', '', null, null);
INSERT INTO shop_products VALUES ('4', '4', '1', 'Demo4', '', '7, 55', null, null);

-- ----------------------------
-- Table structure for `shop_product_specification`
-- ----------------------------
DROP TABLE IF EXISTS `shop_product_specification`;
CREATE TABLE `shop_product_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `is_user_input` tinyint(1) DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_product_specification
-- ----------------------------
INSERT INTO shop_product_specification VALUES ('1', 'Size', '0', '1');
INSERT INTO shop_product_specification VALUES ('2', 'Color', '0', '0');
INSERT INTO shop_product_specification VALUES ('3', 'Some random attribute', '0', '0');
INSERT INTO shop_product_specification VALUES ('4', 'Material', '0', '1');
INSERT INTO shop_product_specification VALUES ('5', 'Specific number', '1', '1');

-- ----------------------------
-- Table structure for `shop_product_variation`
-- ----------------------------
DROP TABLE IF EXISTS `shop_product_variation`;
CREATE TABLE `shop_product_variation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_adjustion` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_product_variation
-- ----------------------------
INSERT INTO shop_product_variation VALUES ('1', '1', '1', '2', 'variation1', '3');
INSERT INTO shop_product_variation VALUES ('2', '1', '1', '3', 'variation2', '6');
INSERT INTO shop_product_variation VALUES ('3', '1', '2', '4', 'variation3', '9');
INSERT INTO shop_product_variation VALUES ('4', '1', '5', '1', 'please enter a number here', '0');

-- ----------------------------
-- Table structure for `shop_shipping_method`
-- ----------------------------
DROP TABLE IF EXISTS `shop_shipping_method`;
CREATE TABLE `shop_shipping_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_shipping_method
-- ----------------------------
INSERT INTO shop_shipping_method VALUES ('1', 'Delivery by postal Service', 'We deliver by Postal Service. 2.99 units of money are charged for that', '1', '2.99');

-- ----------------------------
-- Table structure for `shop_tax`
-- ----------------------------
DROP TABLE IF EXISTS `shop_tax`;
CREATE TABLE `shop_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_tax
-- ----------------------------
INSERT INTO shop_tax VALUES ('1', '19%', '19');
INSERT INTO shop_tax VALUES ('2', '7%', '7');

-- ----------------------------
-- Table structure for `tbl_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profiles`;
CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_profiles
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_profiles_fields`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profiles_fields`;
CREATE TABLE `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_profiles_fields
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_rights`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rights`;
CREATE TABLE `tbl_rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `tbl_rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `tbl_rights_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_rights
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_rights_authassignment`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rights_authassignment`;
CREATE TABLE `tbl_rights_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `tbl_rights_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `tbl_rights_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_rights_authassignment
-- ----------------------------
INSERT INTO tbl_rights_authassignment VALUES ('Admin', '1', null, 'N;');

-- ----------------------------
-- Table structure for `tbl_rights_authitem`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rights_authitem`;
CREATE TABLE `tbl_rights_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_rights_authitem
-- ----------------------------
INSERT INTO tbl_rights_authitem VALUES ('Admin', '2', null, null, 'N;');
INSERT INTO tbl_rights_authitem VALUES ('Authenticated', '2', null, null, 'N;');
INSERT INTO tbl_rights_authitem VALUES ('Guest', '2', null, null, 'N;');

-- ----------------------------
-- Table structure for `tbl_rights_authitemchild`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rights_authitemchild`;
CREATE TABLE `tbl_rights_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `tbl_rights_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_rights_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_rights_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `tbl_rights_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_rights_authitemchild
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_settings`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_settings`;
CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_settings
-- ----------------------------
INSERT INTO tbl_settings VALUES ('1', 'system', 'title', 's:8:\"asasdasd\";');
INSERT INTO tbl_settings VALUES ('2', 'system', 'email', 's:16:\"asdas@asdasd.asd\";');
INSERT INTO tbl_settings VALUES ('3', 'system', 'table', 's:1:\"5\";');
INSERT INTO tbl_settings VALUES ('5', 'system', 'isSplitStadium', 's:1:\"1\";');
INSERT INTO tbl_settings VALUES ('6', 'system', 'A split', 's:1:\"C\";');
INSERT INTO tbl_settings VALUES ('7', 'system', 'B split', 's:1:\"D\";');
INSERT INTO tbl_settings VALUES ('8', 'system', 'D merge', 's:1:\"B\";');

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO tbl_users VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '1261146094', '1311074368', '1', '1');
INSERT INTO tbl_users VALUES ('2', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '1261146096', '1310578105', '0', '1');
INSERT INTO tbl_users VALUES ('3', 'jellydn', '4297f44b13955235245b2497399d7a93', 'a12pct@gmail.com', 'dd81487bd65abb9b9dd145eb2edc2479', '1310312265', '1310399934', '1', '1');
