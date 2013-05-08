-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2013 at 12:00 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yiishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` blob,
  `url` varchar(255) NOT NULL,
  `position` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

DROP TABLE IF EXISTS `docs`;
CREATE TABLE `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `file` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `content` varchar(255) NOT NULL,
  `show_menu` int(11) NOT NULL,
  `created` varchar(255) NOT NULL,
  `modified` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE `news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `image` blob,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_address`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shop_address`
--

INSERT INTO `shop_address` (`id`, `firstname`, `lastname`, `street`, `zipcode`, `city`, `country`) VALUES
(1, 'Tung', 'Tung', 'hoang mai', 'hanoi', 'hanoi', 'viet nam'),
(2, 'Tung', 'Tung', 'hoang mai', 'hanoi', 'hanoi', 'viet nam'),
(3, 'Tung', 'Tung', 'hoang mai', 'hanoi', 'hanoi', 'viet nam');

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE `shop_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `language` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`category_id`, `parent_id`, `title`, `description`, `language`) VALUES
(2, 0, 'Acer', NULL, NULL),
(3, 0, 'Apple', NULL, NULL),
(4, 0, 'Compact', NULL, NULL),
(6, 0, 'Dell', 'Dell', ''),
(7, 0, 'HP', '', ''),
(8, 0, 'Lenovo', '', ''),
(9, 0, 'Toshiba', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_customer`
--

DROP TABLE IF EXISTS `shop_customer`;
CREATE TABLE `shop_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shop_customer`
--

INSERT INTO `shop_customer` (`customer_id`, `user_id`, `address_id`, `delivery_address_id`, `billing_address_id`, `email`) VALUES
(1, NULL, 0, 0, 0, 'tung@gmail.com'),
(2, NULL, 1, 0, 0, 'tung@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shop_image`
--

DROP TABLE IF EXISTS `shop_image`;
CREATE TABLE `shop_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `filename` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Image_Products` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `shop_image`
--

INSERT INTO `shop_image` (`id`, `title`, `filename`, `product_id`) VALUES
(2, 'Anh', '416d8d9N5zL._AA160_.jpg', 5),
(3, 'anh', '416d8d9N5zL._AA160_.jpg', 5),
(4, '1', '51tbPD6sC6L._SL1000_.jpg', 5),
(5, '2', '51yFCpOdfEL._SL1000_.jpg', 5),
(6, 'app1', '518tQZTWd6L._SL1024_.jpg', 6),
(7, 'app2', '41hDOZzEa8L.jpg', 7),
(8, 'app3', '71CVdatMhmL._SL1500_.jpg', 8),
(9, 'App4', '71CVdatMhmL._SL1500_.jpg', 9),
(10, 'app41', '71fGEvsPtzL._SL1500_.jpg', 9),
(11, 'app5', '71CVdatMhmL._SL1500_.jpg', 10),
(12, 'app51', '71fGEvsPtzL._SL1500_.jpg', 10),
(13, 'app6', '71cB0ikYYEL._SL1500_.jpg', 11),
(14, 'cq1', '81RX1cRqQqL._SL1500_.jpg', 12),
(15, 'cq2', '81X9Av14mQL._SL1500_.jpg', 12),
(16, 'cq3', 'B004G5ZUFK-1.jpg', 13),
(17, 'cq4', 'B004G5ZUFK-3.jpg', 13),
(18, 'cq5', '41pCVNTlipL.jpg', 14),
(19, 'd1', '71h9qz5zDZL._SL1500_.jpg', 15),
(20, 'd2', '81HbTCgjX7L._SL1500_.jpg', 15),
(21, 'd3', '41x0As6IqmL.jpg', 16),
(22, 'd4', '5183xwS3tCL._SL1024_.jpg', 16),
(23, 'd5', '51C6QeYRdLL._SL1000_.jpg', 17),
(24, 'd6', '61tLscOirRL._SL1000_.jpg', 17),
(25, 'd1', '41BNsVOXKPL.jpg', 18),
(26, 'd1', '81HbTCgjX7L._SL1500_.jpg', 19),
(27, 'd1', '81LcrgMpIcL._SL1500_.jpg', 19),
(28, '1', '71-Cwopoo+L._SL1500_.jpg', 20),
(29, '1', '71-Cwopoo+L._SL1500_.jpg', 21),
(30, '2', '8184iVik0-L._SL1500_.jpg', 21),
(31, '1', '1.jpg', 22),
(32, '2', '81AaKFkxikL._SL1500_.jpg', 22),
(33, '1', '31aHtSDnFnL.jpg', 23),
(34, '1', '21+8zqs6SJL.jpg', 24),
(35, '2', '41XsR1akaLL.jpg', 24),
(36, '1', '31zAzl-+paL.jpg', 25),
(37, '1', '81gYX76rHDL._SL1500_.jpg', 26),
(38, '1', '71K9iaFMFPL._SL1500_.jpg', 27),
(40, '1', '41BxZbpI83L._AA160_.jpg', 28);

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

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
  KEY `fk_order_customer` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shop_order`
--

INSERT INTO `shop_order` (`order_id`, `customer_id`, `delivery_address_id`, `billing_address_id`, `ordering_date`, `ordering_done`, `ordering_confirmed`, `payment_method`, `shipping_method`, `comment`) VALUES
(1, 2, 2, 3, 1368019180, NULL, NULL, 5, 1, 'Thanh toán luôn đê.');

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_position`
--

DROP TABLE IF EXISTS `shop_order_position`;
CREATE TABLE `shop_order_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `specifications` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shop_order_position`
--

INSERT INTO `shop_order_position` (`id`, `order_id`, `product_id`, `amount`, `specifications`) VALUES
(1, 1, 4, 1, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `shop_payment_method`
--

DROP TABLE IF EXISTS `shop_payment_method`;
CREATE TABLE `shop_payment_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shop_payment_method`
--

INSERT INTO `shop_payment_method` (`id`, `title`, `description`, `tax_id`, `price`) VALUES
(1, 'cash', 'You pay cash', 1, 0),
(2, 'advance Payment', 'You pay in advance, we deliver', 1, 0),
(3, 'cash on delivery', 'You pay when we deliver', 1, 0),
(4, 'invoice', 'We deliver and send a invoice', 1, 0),
(5, 'paypal', 'You pay by paypal', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

DROP TABLE IF EXISTS `shop_products`;
CREATE TABLE `shop_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `specifications` text,
  `view` int(11) NOT NULL,
  `is_saleoff` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_products_category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`product_id`, `category_id`, `tax_id`, `title`, `description`, `price`, `language`, `specifications`, `view`, `is_saleoff`) VALUES
(3, 2, 1, 'Acer Notebook NX.RYFAA.011;V3-571-... 15.6-In', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Acer</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Aspire</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">NX.RYFAA.011;V3-571-9832</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 8</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">8 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">7 x 3.50 x 12.80 inches</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">4</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Lithium ion batteries required.</td></tr></tbody></table>', 756.37, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 9, 0),
(5, 2, 0, 'Acer Aspire S7-391-6810 13.3-Inch Touchscreen', '<h2><span style="font-weight: bold;">Key Features</span></h2> <ul><li><strong>13.3" Full HD widescreen CineCrystal™ LED-backlit display:</strong> (1920 x 1080) resolution; 16:9 aspect ratio </li><li><strong>Multi-touch screen, supporting 10 finger touch</strong></li><li><strong>3rd Generation Intel® Core™ i5-3317U Processor 1.7GHz<strong>with Turbo Boost Technology up to 2.6GHz</strong></strong></li><strong><strong> <li><strong>Windows 8</strong></li> <li><strong>Intel® HD Graphics 4000 </strong> with 128MB of dedicated system memory</li> <li><strong>4GB DDR3 Memory</strong></li> <li><strong>128GB SSD drive</strong>In RAID 0 configuration</li> <li><strong>2-in-1 Digital Media Card Reader</strong></li> <li><strong>Acer Invilink™ Nplify™ 802.11a/b/g/n Wi-Fi Certified™</strong></li> <li><strong>Bluetooth® 4.0+HS</strong></li> <li><strong>1.3MP HD Webcam</strong>(1280 x 1024)</li> <li><strong>Optimized Dolby® Advanced Audio® v4 audio enhancement</strong></li> <li><strong>Two Built-in stereo speakers</strong></li> <li><strong>2- USB 3.0 Ports</strong></li> <li><strong>1- Micro-HDMI™ Port</strong>with HDCP Support</li> <li><strong>4-cell lithium polymer battery (4680mAh)</strong></li> <li><strong>Up to 6-hours battery life</strong></li> <li><strong>2.86 lbs. | 1.3kg &lt;\\strong&gt;system unit only</strong></li></strong></strong></ul>', 1109.55, NULL, '{"Size":"13.3","Color":"White","Some random attribute":"","Material":"","Specific number":"S7-391-6810"}', 14, 0),
(6, 3, 0, ' Apple MacBook Pro MD101LL/A 13.3-Inch Laptop', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">13.30 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1280x800 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.5 GHz Intel Core i5 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">4 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">500 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics 4000</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Apple</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">MacBook Pro</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">MD101LL/A</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">Mac</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Mac OS X v10.8 Mountain Lion</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">4.5 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">8.94 x 12.78 x 0.95 inches</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr></tbody></table>', 1099, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 0),
(7, 3, 0, ' Apple MacBook Air MD231LL/A 13.3-Inch Laptop', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">13.30 inches</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">1.8 GHz Intel Core i5 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">4 GB DDR3L SDRAM </td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics 4000</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11G</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Apple</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">MacBook Air</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">MD231LL/A</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">Mac</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Mac OS X v10.8 Mountain Lion</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">3 pounds</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr>\r\n         <tr><td class="label">Flash Memory Size</td><td class="value">128</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Solid State</td></tr></tbody></table>', 1129, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 1, 1),
(8, 3, 0, ' Apple MacBook Pro MD212LL/A 13-Inch Laptop w', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">13.3 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">2560 x 1600 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.5 GHz Intel Core i5 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB SDRAM </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">0 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics 4000</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11g 108 Mbps</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Apple</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">MacBook Pro</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">MD212LL/A</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">Mac</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Mac OS X 10.8 Mountain Lion</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">3.6 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">8.62 x 12.35 x 0.75 inches</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">SDRAM</td></tr>\r\n         <tr><td class="label">Flash Memory Size</td><td class="value">128</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Solid State</td></tr>\r\n         <tr><td class="label">Power Source</td><td class="value">Fuel Cell</td></tr></tbody></table>', 1419, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 0),
(9, 3, 0, ' Apple MacBook Pro MD213LL/A 13.3-Inch Laptop', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">13.3 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">2560x1600 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.5 GHz Intel Core i5 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB SDRAM </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">0 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics 4000</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Apple</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">MacBook Pro</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">MD213LL/A</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">Mac</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Mac OS X 10.8 Mountain Lion</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">3.6 pounds</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">SDRAM</td></tr>\r\n         <tr><td class="label">Flash Memory Size</td><td class="value">256</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr></tbody></table>', 1479, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(10, 3, 0, ' Apple MacBook Pro ME662LL/A 13.3-Inch Laptop', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">13.3 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">2560x1600 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.6 GHz Intel Core i5 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB DDR3L </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">0 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics 4000</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Apple</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">MacBook Pro</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">ME662LL/A</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">Mac</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Mac OS X Mountain Lion</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr>\r\n         <tr><td class="label">Flash Memory Size</td><td class="value">256</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr></tbody></table>', 1599, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 0),
(11, 3, 0, ' Apple MacBook Pro ME664LL/A 15.4-Inch Laptop', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15.4 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">2880x1800 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.4 GHz Intel Core i7 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB DDR3L </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">0 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">NVIDIA GeForce GT 650M</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Apple</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Macbook Pro</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">ME664LL/A</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">Mac</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Mac OS X Mountain Lion</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">4.5 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">14.13 x 0.71 x 9.73 inches</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr>\r\n         <tr><td class="label">Flash Memory Size</td><td class="value">256</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr></tbody></table>', 2079, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 2, 1),
(12, 4, 0, ' HP CQ58-b10NR 15.6-Inch Laptop ', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15.6 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1366x768 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">3.1 GHz Celeron E1200 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">2 GB DIMM </td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">AMD Radeon HD 7310</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">2</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">HP</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Presario</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">CQ58-b10NR</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 8</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">7.2 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">3.10 x 18.90 x 13.60 inches</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">AMD</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DIMM</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 378, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(13, 4, 0, ' Compaq Presario CQ62-410US 15.6-Inch Noteboo', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15.6 inches</td></tr>\r\n         <tr><td class="label">Screen Resolution</td><td class="value">1366 x 768</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1336 x 768 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.2 GHz Intel Celeron </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">2 GB DDR3 </td></tr>\r\n         <tr><td class="label">Memory Speed\r\n</td><td class="value">800 MHz</td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">250 GB SATA </td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel GMA 4500M</td></tr>\r\n         <tr><td class="label">Chipset Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Card Description</td><td class="value">Graphics Media Accelerator 4500M</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11B, 802.11G, 802.11n</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">3</td></tr>\r\n         <tr><td class="label">Average Battery Life (in hours)\r\n</td><td class="value">4.5 hours</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">HP</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Presario</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">CQ62-410US</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 7 Home Premium</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">5.6 pounds</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">black</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">7200 RPM</td></tr>\r\n         <tr><td class="label">Optical Drive Type</td><td class="value">dvd_plus_minus_rw, dvd_ram</td></tr>\r\n         <tr><td class="label">Audio-out Ports (#)</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Battery Type</td><td class="value">lithium_ion</td></tr>\r\n         <tr><td class="label">Power Source</td><td class="value">AC</td></tr>\r\n         <tr><td class="label">Voltage</td><td class="value">230 volts</td></tr></tbody></table>', 490, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(14, 4, 0, ' Compaq CQ57-229WM 15.6-inch AMD Dual-Core 1G', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15.6 inches</td></tr>\r\n         <tr><td class="label">Screen Resolution</td><td class="value">1366 x 768</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1336 x 768 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">1 GHz C-Series Dual Core C-50 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">2 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">250 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Radeon</td></tr>\r\n         <tr><td class="label">Chipset Brand</td><td class="value">AMD</td></tr>\r\n         <tr><td class="label">Card Description</td><td class="value">Radeon HD 6250</td></tr>\r\n         <tr><td class="label">Graphics Card Ram Size</td><td class="value">1309 MB</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">3</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Compaq</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Presario</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">CQ57-229WM</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Microsoft Windows 7</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">8 pounds</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">black</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">AMD</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr>\r\n         <tr><td class="label">Optical Drive Type</td><td class="value">dvd_plus_minus_rw, dvd_rom, dvd_ram, cd_rom, cd_rw</td></tr>\r\n         <tr><td class="label">Audio-out Ports (#)</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Battery Type</td><td class="value">lithium_ion</td></tr>\r\n         <tr><td class="label">Power Source</td><td class="value">AC</td></tr></tbody></table>', 315, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 0),
(15, 6, 0, ' Dell Inspiron i15R-1632sLV 15-Inch Laptop (S', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1366x768</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.4 GHz Core i3-2370M </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">6 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">750 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics 3000</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Dell</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Inspiron</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">i15R-1632sLV</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 7 Home Premium 64-bit</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">9.4 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">19.41 x 13.27 x 4.09 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Silver</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr></tbody></table>', 619, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 2, 1),
(16, 6, 0, ' Dell Latitude D630 14.1-Inch Notebook PC - S', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">14.1 inches</td></tr>\r\n         <tr><td class="label">Screen Resolution</td><td class="value">1280 x 800</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1280 X 800 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2 GHz Intel Core 2 Duo </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">2 GB DDR2 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">80 GB SATA </td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Graphics Media Accelerator X3100</td></tr>\r\n         <tr><td class="label">Chipset Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Graphics Card Ram Size</td><td class="value">256 MB</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11abg</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">4</td></tr>\r\n         <tr><td class="label">Average Battery Life (in hours)\r\n</td><td class="value">2 hours</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Dell</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Latitude</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">IBDELD630/2.0C2D</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Windows XP Professional</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">4.4 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">9.37 x 13.27 x 1.26 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Silver</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR2 SDRAM</td></tr>\r\n         <tr><td class="label">Optical Drive Type</td><td class="value">Combo</td></tr>\r\n         <tr><td class="label">Audio-out Ports (#)</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Voltage</td><td class="value">19.5 volts</td></tr></tbody></table>', 512, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 0),
(17, 6, 0, ' Dell Inspiron i14R5-5743sLV 14-Inch Laptop ', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">14 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1366 x 768 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.5 GHz Core i5-3210M </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">6 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">750 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11n</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">4</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Dell</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Inspiron</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">i14R5-5743sLV</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 8</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">5.3 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">13.70 x 1.24 x 9.50 inches</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries:</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 568, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(18, 6, 0, ' Dell D600 Laptop (1.6ghz, 40 GB Hard Drive, ', '<h2>Technical Details</h2>\r\n      \r\n      \r\n        \r\n        <ul style="list-style: disc; padding-left: 25px;"><li>1.6 GHz Processor and DVD-ROM/CD-RW included</li><li>Integrated wireless</li><li>Windows XP installed</li></ul>', 235, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(19, 6, 0, ' Dell Inspiron i15R-2105sLV 15-Inch Laptop (S', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">720 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.5 GHz Core i5-3210M </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">1 TB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics 4000</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">4</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Dell</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Inspiron</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">i15R-2105sLV</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 7 Home Premium 64-bit</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">9 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">19.41 x 13.27 x 4.09 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Silver</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Nonstandard Battery batteries required. (included)</td></tr></tbody></table>', 688, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(20, 7, 0, ' HP Pavilion g7-2270us 17.3-Inch Laptop (Blac', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">17.3 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1600 x 900 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.4 GHz Core i3-3110M </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">6 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">750 GB SATA </td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD Graphics 4000</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">2</td></tr>\r\n         <tr><td class="label">Average Battery Life (in hours)\r\n</td><td class="value">3.45 hours</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">HP</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Pavilion</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">g7-2270us</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 8</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">8 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">3.10 x 22 x 13.60 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Black</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">2</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">SODIMM</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 568, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(21, 7, 0, ' HP ENVY 17-3090NR 17.3 Inch Laptop (Black/Si', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">17.3 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1920x1080 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.2 GHz Core i7-2670QM </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB SDRAM </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">830 GB SATA </td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">AMD Radeon HD 7690M XT - 1024 MB GDDR5 SDRAM</td></tr>\r\n         <tr><td class="label">Graphics Card Ram Size</td><td class="value">1024 MB</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">3</td></tr>\r\n         <tr><td class="label">Average Battery Life (in hours)\r\n</td><td class="value">5.5 hours</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">HP</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Envy</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">ENVY 17-3090NR</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 7 Home Premium</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">11.5 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">20.20 x 5.90 x 13.60 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Black/Silver</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">2</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">SODIMM</td></tr>\r\n         <tr><td class="label">Flash Memory Size</td><td class="value">80</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">7690 RPM</td></tr>\r\n         <tr><td class="label">Optical Drive Type</td><td class="value">Slot-loading Blu-ray player and SuperMulti DVD burner</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 1755, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(22, 7, 0, ' HP SPECTRE XT TouchSmart 15-4010nr 15.6-Inch', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15.6 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1920 X 1080 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">1.9 GHz Core i7-3517U </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">500 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Intel HD graphics 4000</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">3</td></tr>\r\n         <tr><td class="label">Average Battery Life (in hours)\r\n</td><td class="value">5.25 hours</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">HP</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">SPECTRE</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">5-4010nr</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 8</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">5 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">0.70 x 14.87 x 10.10 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Silver</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">2</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">SODIMM</td></tr>\r\n         <tr><td class="label">Flash Memory Size</td><td class="value">32</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 1349, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1);
INSERT INTO `shop_products` (`product_id`, `category_id`, `tax_id`, `title`, `description`, `price`, `language`, `specifications`, `view`, `is_saleoff`) VALUES
(23, 7, 0, ' 13.3" Intel 500G 4G ', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">13.3 inches</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">Intel Core i5 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">0 MB DDR3 SDRAM </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">500 GB</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">HP</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">LJ463UT#ABA</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">4 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">18.11 x 18.11 x 4.53 inches</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">1</td></tr></tbody></table>', 965, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(24, 8, 0, ' Thinkpad T420S 14" 320GB 4GB ', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">14 inches</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.5 GHz Core i5-2520M </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">4 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">320 GB</td></tr>\r\n         <tr><td class="label">Chipset Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11A</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Lenovo</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">ThinkPad</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">417032U</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 7 Professional</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">0.2 ounces</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">2</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">SODIMM</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">7200 RPM</td></tr></tbody></table>', 2975, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 2, 1),
(25, 8, 0, ' Lenovo W520 42844ZU 15.6-Inch Laptop ', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15.6 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1920 x 1080 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.4 GHz Apple A4 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">32 GB SDRAM </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">500 GB</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">4</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">2</td></tr>\r\n         <tr><td class="label">Average Battery Life (in hours)\r\n</td><td class="value">1 hours</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Lenovo</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Thinkpad</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">42844ZU</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 7 Professional</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">9.8 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">19 x 4.30 x 13 inches</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">4</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">SDRAM</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">7200 RPM</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 2970, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 0),
(26, 8, 0, ' Lenovo IdeaPad Yoga 13 13.3-Inch Convertible', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">13.3 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1600 x 900 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">1.8 GHz Intel Core i5 </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">4 GB DDR3 </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">0 GB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">Integrated Intel HD Graphics</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Average Battery Life (in hours)\r\n</td><td class="value">8 hours</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Lenovo</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">IdeaPad</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">59359567</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Hardware Platform</td><td class="value">PC</td></tr>\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 8</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">3.3 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">13.10 x 8.90 x 0.67 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Gray</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Processor Count</td><td class="value">2</td></tr>\r\n         <tr><td class="label">Computer Memory Type</td><td class="value">DDR3 SDRAM</td></tr>\r\n         <tr><td class="label">Flash Memory Size</td><td class="value">128</td></tr>\r\n         <tr><td class="label">Hard Drive Interface</td><td class="value">Serial ATA</td></tr>\r\n         <tr><td class="label">Optical Drive Type</td><td class="value">No</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries:</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 989, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 0),
(27, 9, 0, ' Toshiba Satellite S855D-S5148 15.6-Inch Lapt', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15.6 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1366 x 768 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.3 GHz A-Series Quad-Core A10-4600M </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB DIMM </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">1 TB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">AMD Radeon HD 7660G</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">2</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Toshiba</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Toshiba Satellite S855D-S5148</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">PSKG2U-07F004</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 8</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">5.5 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">9.53 x 14.96 x 1.31 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Ice Blue Brushed Aluminum</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">AMD</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr>\r\n         <tr><td class="label">Optical Drive Type</td><td class="value">DVD SuperMulti drive supporting 11 formats</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 669, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 1),
(28, 9, 0, ' Toshiba Satellite S855-S5170 15.6-Inch Lapto', '<table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Screen Size</td><td class="value">15.6 inches</td></tr>\r\n         <tr><td class="label">Max Screen Resolution</td><td class="value">1366 x 768 pixels</td></tr>\r\n         <tr><td class="label">Processor</td><td class="value">2.4 GHz Core i7-3630QM </td></tr>\r\n         <tr><td class="label">RAM</td><td class="value">8 GB DIMM </td></tr>\r\n         <tr><td class="label">Hard Drive</td><td class="value">1 TB</td></tr>\r\n         <tr><td class="label">Graphics Coprocessor</td><td class="value">AMD Radeon HD 7670M Graphics 2GB DDR3</td></tr>\r\n         <tr><td class="label">Graphics Card Ram Size</td><td class="value">2000 MB</td></tr>\r\n         <tr><td class="label">Wireless Type</td><td class="value">802.11bgn</td></tr>\r\n         <tr><td class="label">Number of USB 2.0 Ports\r\n</td><td class="value">1</td></tr>\r\n         <tr><td class="label">Number of USB 3.0 Ports\r\n</td><td class="value">2</td></tr>\r\n     </tbody>\r\n     </table>\r\n     \r\n     \r\n     \r\n     <div class=" pdSection">\r\n       <div class="pdPM">\r\n         <a class="dpSprite pdSpriteMinus pdSprite"><span>Expand</span></a>\r\n       </div>\r\n       <div>\r\n         <a class="pdSN">\r\n           <span><strong>Other Technical Details</strong></span>\r\n         </a>\r\n       </div>\r\n     </div>\r\n     \r\n     \r\n     \r\n         <table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="label">Brand Name</td><td class="value">Toshiba</td></tr>\r\n         <tr><td class="label">Series</td><td class="value">Toshiba Satellite S855-S5170</td></tr>\r\n\r\n\r\n\r\n\r\n<tr class="item-model-number"><td class="label">Item model number</td><td class="value">PSKFWU-06G002</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n         <tr><td class="label">Operating System</td><td class="value">Windows 8</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                                                                \r\n\r\n\r\n<tr class="size-weight"><td class="label">Item Weight</td><td class="value">5.5 pounds</td></tr>\r\n         <tr><td class="label">Item Dimensions  L x W x H</td><td class="value">9.53 x 14.96 x 1.31 inches</td></tr>\r\n         <tr><td class="label">Color\r\n</td><td class="value">Ice Blue Brushed Aluminum</td></tr>\r\n         <tr><td class="label">Processor Brand</td><td class="value">Intel</td></tr>\r\n         <tr><td class="label">Hard Drive Rotational Speed</td><td class="value">5400 RPM</td></tr>\r\n         <tr><td class="label">Optical Drive Type</td><td class="value">DVD SuperMulti drive supporting 11 formats</td></tr>\r\n\r\n\r\n\r\n\r\n\r\n<tr class="batteries"><td class="label">Batteries</td><td class="value">1 Lithium ion batteries required. (included)</td></tr></tbody></table>', 879, NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_specification`
--

DROP TABLE IF EXISTS `shop_product_specification`;
CREATE TABLE `shop_product_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `is_user_input` tinyint(1) DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shop_product_specification`
--

INSERT INTO `shop_product_specification` (`id`, `title`, `is_user_input`, `required`) VALUES
(1, 'Size', 0, 1),
(2, 'Color', 0, 0),
(3, 'Some random attribute', 0, 0),
(4, 'Material', 0, 1),
(5, 'Specific number', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_variation`
--

DROP TABLE IF EXISTS `shop_product_variation`;
CREATE TABLE `shop_product_variation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_adjustion` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shop_product_variation`
--

INSERT INTO `shop_product_variation` (`id`, `product_id`, `specification_id`, `position`, `title`, `price_adjustion`) VALUES
(1, 1, 1, 2, 'variation1', 3),
(2, 1, 1, 3, 'variation2', 6),
(3, 1, 2, 4, 'variation3', 9),
(4, 1, 5, 1, 'please enter a number here', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_shipping_method`
--

DROP TABLE IF EXISTS `shop_shipping_method`;
CREATE TABLE `shop_shipping_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shop_shipping_method`
--

INSERT INTO `shop_shipping_method` (`id`, `title`, `description`, `tax_id`, `price`) VALUES
(1, 'Delivery by postal Service', 'We deliver by Postal Service. 2.99 units of money are charged for that', 1, 2.99);

-- --------------------------------------------------------

--
-- Table structure for table `shop_tax`
--

DROP TABLE IF EXISTS `shop_tax`;
CREATE TABLE `shop_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shop_tax`
--

INSERT INTO `shop_tax` (`id`, `title`, `percent`) VALUES
(1, '19%', 19),
(2, '7%', 7);

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

DROP TABLE IF EXISTS `supports`;
CREATE TABLE `supports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_sale` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `username` varchar(64) NOT NULL,
  `display` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `content`, `status`, `create_time`, `author`, `email`, `url`, `post_id`) VALUES
(1, 'This is a test comment.', 2, 1230952187, 'Tester', 'tester@example.com', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

DROP TABLE IF EXISTS `tbl_lookup`;
CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_lookup`
--

INSERT INTO `tbl_lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Draft', 1, 'PostStatus', 1),
(2, 'Published', 2, 'PostStatus', 2),
(3, 'Archived', 3, 'PostStatus', 3),
(4, 'Pending Approval', 1, 'CommentStatus', 1),
(5, 'Approved', 2, 'CommentStatus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(1, 'Welcome!', 'This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.\n\nFeel free to try this system by writing new posts and posting comments.', 'yii, blog', 2, 1230952187, 1230952187, 1),
(2, 'A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'test', 2, 1230952187, 1230952187, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

DROP TABLE IF EXISTS `tbl_profiles`;
CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles_fields`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rights`
--

DROP TABLE IF EXISTS `tbl_rights`;
CREATE TABLE `tbl_rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rights_authassignment`
--

DROP TABLE IF EXISTS `tbl_rights_authassignment`;
CREATE TABLE `tbl_rights_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rights_authassignment`
--

INSERT INTO `tbl_rights_authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rights_authitem`
--

DROP TABLE IF EXISTS `tbl_rights_authitem`;
CREATE TABLE `tbl_rights_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rights_authitem`
--

INSERT INTO `tbl_rights_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rights_authitemchild`
--

DROP TABLE IF EXISTS `tbl_rights_authitemchild`;
CREATE TABLE `tbl_rights_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `category`, `key`, `value`) VALUES
(1, 'system', 'title', 's:8:"asasdasd";'),
(2, 'system', 'email', 's:16:"asdas@asdasd.asd";'),
(3, 'system', 'table', 's:1:"5";'),
(5, 'system', 'isSplitStadium', 's:1:"1";'),
(6, 'system', 'A split', 's:1:"C";'),
(7, 'system', 'B split', 's:1:"D";'),
(8, 'system', 'D merge', 's:1:"B";');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

DROP TABLE IF EXISTS `tbl_tag`;
CREATE TABLE `tbl_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `name`, `frequency`) VALUES
(1, 'yii', 1),
(2, 'blog', 1),
(3, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `salt`, `email`, `profile`) VALUES
(1, 'demo', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760', 'webmaster@example.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 1368022760, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 1368021367, 0, 1),
(3, 'jellydn', '4297f44b13955235245b2497399d7a93', 'a12pct@gmail.com', 'dd81487bd65abb9b9dd145eb2edc2479', 1310312265, 1310399934, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop_image`
--
ALTER TABLE `shop_image`
  ADD CONSTRAINT `fk_Image_Products` FOREIGN KEY (`product_id`) REFERENCES `shop_products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `shop_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `shop_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_rights`
--
ALTER TABLE `tbl_rights`
  ADD CONSTRAINT `tbl_rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `tbl_rights_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rights_authassignment`
--
ALTER TABLE `tbl_rights_authassignment`
  ADD CONSTRAINT `tbl_rights_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `tbl_rights_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rights_authitemchild`
--
ALTER TABLE `tbl_rights_authitemchild`
  ADD CONSTRAINT `tbl_rights_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_rights_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rights_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `tbl_rights_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
