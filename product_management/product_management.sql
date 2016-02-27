-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2016 at 11:23 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.16-2+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `product_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_list`
--

CREATE TABLE IF NOT EXISTS `brand_list` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_name` text NOT NULL,
  `b_desc` longtext NOT NULL,
  `b_status` int(11) NOT NULL DEFAULT '1',
  `b_logo` text NOT NULL,
  `b_c_list` text NOT NULL,
  `b_dateadded` datetime NOT NULL,
  `b_datemodify` datetime NOT NULL,
  `b_thumb` text NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `brand_list`
--

INSERT INTO `brand_list` (`b_id`, `b_name`, `b_desc`, `b_status`, `b_logo`, `b_c_list`, `b_dateadded`, `b_datemodify`, `b_thumb`) VALUES
(1, 'Apple', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software, and online services.', 1, 'applelogo.png', '4,11,3,2', '2016-01-27 16:04:45', '2016-02-01 10:40:02', 'applelogo_thumb.png'),
(2, 'Lenovo', 'Lenovo Group Ltd. /l?n?o?vo?/ is a Chinese multinational computer technology company with headquarters in Beijing, China, and Morrisville, North Carolina, United States.', 1, 'LenovoLogo-POS-Red.png', '4,11,3,2', '2016-01-27 16:36:06', '2016-02-01 10:40:22', 'LenovoLogo-POS-Red_thumb.png'),
(3, 'Cannon', 'Canon Inc. is a Japanese multinational corporation specialized in the manufacture of imaging and optical products, including cameras, camcorders, photocopiers, steppers, computer printers and medical equipment. Its headquarters are located in ?ta, Tokyo, Japan.\r\n\r\nCanon has a primary listing on the Tokyo Stock Exchange and is a constituent of the TOPIX index. It has a secondary listing on the New York Stock Exchange. At the beginning of 2015, Canon was the tenth largest public company in Japan when measured by market capitalization.', 1, 'canon-logo1.jpg', '5,8', '2016-01-28 12:22:49', '2016-01-29 10:02:20', 'canon-logo1_thumb.jpg'),
(4, 'Dell', 'Dell Inc. is an American privately owned multinational computer technology company based in Round Rock, Texas, United States, that develops, sells, repairs, and supports computers and related products and services.', 1, 'dell.png', '4', '2016-01-28 12:24:12', '2016-01-29 09:56:46', 'dell_thumb.png'),
(5, 'HTC', 'HTC Corporation, Full name:. It is a Taiwanese multinational manufacturer of smartphones and tablets headquartered in New Taipei City, Taiwan', 1, 'HTC_GPlus_Profile.png', '11,3,2', '2016-02-01 10:39:17', '0000-00-00 00:00:00', 'HTC_GPlus_Profile_thumb.png'),
(6, 'Motorola', 'Motorola, Inc. was a multinational telecommunications company based in Schaumburg, Illinois, United States.', 1, 'images.png', '13,11,3,2', '2016-02-01 10:50:24', '0000-00-00 00:00:00', 'images_thumb.png'),
(7, 'Timex', 'Timex Group USA, Inc. is a subsidiary of the Dutch company Timex Group B.V., and its US headquarters, is based in Middlebury, Connecticut.', 1, 'imaggges.png', '1,14', '2016-02-01 11:00:12', '0000-00-00 00:00:00', 'imaggges_thumb.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `c_id` int(4) NOT NULL AUTO_INCREMENT,
  `c_name` text NOT NULL,
  `c_qyt` int(11) NOT NULL,
  `c_price` int(11) NOT NULL,
  `c_p_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `c_id` int(4) NOT NULL AUTO_INCREMENT,
  `c_name` text NOT NULL,
  `c_description` longtext NOT NULL,
  `c_parent_id` int(11) DEFAULT NULL,
  `c_image` text NOT NULL,
  `c_dateadded` datetime NOT NULL,
  `c_datemodify` datetime NOT NULL,
  `c_status` tinyint(11) NOT NULL DEFAULT '1',
  `c_url_use_name` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_description`, `c_parent_id`, `c_image`, `c_dateadded`, `c_datemodify`, `c_status`, `c_url_use_name`) VALUES
(1, 'Fashion And Beauty', 'Fashion accessories are decorative items that supplement one''s garment, such as jewelry, gloves, handbags, hats, belts, scarves, watches, sunglasses, pins, stockings, bow ties, leg warmers, leggings, neckties, suspenders, and tights.\r\n\r\nFashion accessories add color, style and class to an outfit, and create a certain look, but they may also have practical functions. Handbags are for carrying small necessary items, hats protect the face from weather elements, Laptops provide mobile connectivity and are used to increase work power and gloves keep the hands warm.\r\n\r\nMany fashion accessories are produced by clothing design companies. However, there has been an increase in individuals creating their own brand name by designing and making their own label of accessories.\r\n\r\nFashion accessories can be visual symbols of religious affiliation: Crucifixes, Jewish stars, Islamic headscarves, skullcaps and turbans are common examples. Designer labels on accessories are perceived as an indicator of social status.\r\n\r\nFashion accessories are also available in the form of bracelets, necklaces, earrings, and shoelace accessories.', 0, '', '2016-01-25 01:28:35', '0000-00-00 00:00:00', 1, 'fashion-beauty'),
(2, 'Mobiles & Accessories', 'Demo 2', 0, '', '0000-00-00 00:00:00', '2016-02-01 10:28:36', 0, 'mobile-and-accessories'),
(3, 'Mobile Accessories', '', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mobile-accessory'),
(4, 'Computers & Peripherals', 'Laptop computers, also known as notebooks, are portable computers that you can take with you and use in different environments. They include a screen, keyboard, and a trackpad or trackball, which serves as the mouse. Because laptops are meant to be used on the go, they have a battery which allows them to operate without being plugged into a power outlet. Laptops also include a power adapter that allows them to use power from an outlet and recharges the battery.\r\n\r\nWhile portable computers used to be significantly slower and less capable than desktop computers, advances in manufacturing technology have enabled laptops to perform nearly as well as their desktop counterparts. In fact, high-end laptops often perform better than low or even mid-range desktop systems. Most laptops also include several I/O ports, such as USB ports, that allow standard keyboards and mice to be used with the laptop. Modern laptops often include a wireless networking adapter as well, allowing users to access the Internet without requiring any wires.\r\n\r\nWhile laptops can be powerful and convenient, the convenience often comes at a price. Most laptops cost several hundred dollars more than a similarly equipped desktop model with a monitor, keyboard, and mouse. Furthermore, working long hours on a laptop with a small screen and keyboard may be more fatiguing than working on a desktop system. Therefore, if portability is not a requirement for your computer, you may find better value in a desktop model.', 0, 'desktoplaptop.jpg', '2016-01-26 12:56:30', '2016-01-28 11:36:18', 0, 'computer-laptop'),
(5, 'Cameras', 'Demo', 0, 'Hiru_Electronics_SonyCameras_1280.jpg', '2016-01-26 13:06:36', '0000-00-00 00:00:00', 0, 'camera'),
(6, 'Movies, Music & Games', 'Shop for gaming, movies and music at Best Buy. Choose from a selection of games, gaming consoles, CDs, DVDs, Blu-ray Discs, and musical instruments at Best Buy.', 0, 'books-movies-music-video-games-under-25.jpg', '2016-01-28 11:07:29', '0000-00-00 00:00:00', 1, 'entertainment'),
(7, 'Movies & TV', 'Online shopping from a great selection at Movies &amp; TV Store.', 6, 'Christian-Movie-TVCable-Channels.jpg', '2016-01-28 11:19:35', '0000-00-00 00:00:00', 1, 'movies-tv'),
(8, 'Scanners', 'Scanners: Buy Scanners Online at Best Prices in India', 4, 'scanner.jpg', '2016-01-28 11:38:29', '2016-01-29 09:52:18', 1, 'scanner'),
(9, 'Clothes', 'Clothing (also called clothes) is fiber and textile material worn on the body. The wearing of clothing is mostly restricted to human beings and is a feature of nearly all human societies. The amount and type of clothing worn depends on physical, social and geographic considerations. Some clothing types can be gender specific.\r\n\r\nPhysically, clothing serves many purposes: it can serve as protection from the elements, and can enhance safety during hazardous activities such as hiking and cooking. It protects the wearer from rough surfaces, rash-causing plants, insect bites, splinters, thorns and prickles by providing a barrier between the skin and the environment. Clothes can insulate against cold or hot conditions. Further, they can provide a hygienic barrier, keeping infectious and toxic materials away from the body. Clothing also provides protection from harmful UV radiation.', 1, 'o-CLOTHING-COLOUR-facebook.jpg', '2016-01-28 14:58:23', '0000-00-00 00:00:00', 1, 'clothes'),
(10, 'Shoes', 'A shoe is an item of footwear intended to protect and comfort the human foot while doing various activities. Shoes are also used as an item of decoration.', 1, '1-January-SP-Shoes-Hero2-6100-540x370.jpg', '2016-01-28 15:00:40', '0000-00-00 00:00:00', 1, 'shoes'),
(11, 'Mobile', 'A mobile phone is a telephone that can make and receive calls over a radio frequency carrier while the user is moving within a telephone service area.', 2, '', '2016-01-28 17:13:07', '0000-00-00 00:00:00', 1, 'mobile'),
(12, 'Printers', 'Printers: Buy Printers Online at Best Prices in India', 4, '', '2016-01-29 09:53:12', '0000-00-00 00:00:00', 1, 'printer'),
(13, 'Cases & Covers', 'Buy Cases and Covers for Mobile phones online at Line.com. Select from the wide range of Mobile Cases and Covers for Any Mobile.', 2, '', '2016-02-01 10:48:37', '0000-00-00 00:00:00', 1, 'mobile-cases-covers'),
(14, 'Watches', 'A watch is a small timepiece intended to be carried or worn by a person. It is designed to keep working despite the motions caused by the person''s activities.', 1, '', '2016-02-01 10:59:01', '0000-00-00 00:00:00', 1, 'watches');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `timestamp` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
(0, '127.0.0.1', '1454389752', '__ci_last_regenerate|i:1454389556;cart_contents|a:4:{s:10:"cart_total";d:39500;s:11:"total_items";d:2;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(0, '127.0.0.1', '1454389900', '__ci_last_regenerate|i:1454389900;cart_contents|a:4:{s:10:"cart_total";d:74500;s:11:"total_items";d:3;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:2;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:70000;}}'),
(0, '127.0.0.1', '1454389925', '__ci_last_regenerate|i:1454389925;cart_contents|a:4:{s:10:"cart_total";d:74500;s:11:"total_items";d:3;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:2;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:70000;}}'),
(0, '127.0.0.1', '1454389965', '__ci_last_regenerate|i:1454389965;cart_contents|a:4:{s:10:"cart_total";d:74500;s:11:"total_items";d:3;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:2;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:70000;}}'),
(0, '127.0.0.1', '1454389971', '__ci_last_regenerate|i:1454389971;cart_contents|a:4:{s:10:"cart_total";d:74500;s:11:"total_items";d:3;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:2;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:70000;}}'),
(0, '127.0.0.1', '1454390002', '__ci_last_regenerate|i:1454390002;cart_contents|a:4:{s:10:"cart_total";d:74500;s:11:"total_items";d:3;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:2;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:70000;}}'),
(77722, '127.0.0.1', '1454390193', '__ci_last_regenerate|i:1454390102;cart_contents|a:4:{s:10:"cart_total";d:1229500;s:11:"total_items";d:36;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:35;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:1225000;}}'),
(5, '127.0.0.1', '1454390648', '__ci_last_regenerate|i:1454390499;cart_contents|a:4:{s:10:"cart_total";d:1334500;s:11:"total_items";d:39;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:38;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:1330000;}}'),
(0, '127.0.0.1', '1454390822', '__ci_last_regenerate|i:1454390822;cart_contents|a:4:{s:10:"cart_total";d:1369500;s:11:"total_items";d:40;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:39;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:1365000;}}'),
(5, '127.0.0.1', '1454390889', '__ci_last_regenerate|i:1454390889;cart_contents|a:4:{s:10:"cart_total";d:74500;s:11:"total_items";d:3;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:2;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:70000;}}'),
(0, '127.0.0.1', '1454391101', '__ci_last_regenerate|i:1454391101;cart_contents|a:4:{s:10:"cart_total";d:1369500;s:11:"total_items";d:40;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:39;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:1365000;}}'),
(0, '127.0.0.1', '1454391175', '__ci_last_regenerate|i:1454391175;cart_contents|a:4:{s:10:"cart_total";d:74500;s:11:"total_items";d:3;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:2;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:70000;}}'),
(0, '127.0.0.1', '1454391176', '__ci_last_regenerate|i:1454391176;cart_contents|a:4:{s:10:"cart_total";d:74500;s:11:"total_items";d:3;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:2;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:70000;}}'),
(71, '127.0.0.1', '1454391424', '__ci_last_regenerate|i:1454391192;cart_contents|a:4:{s:10:"cart_total";d:214500;s:11:"total_items";d:7;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:6;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:210000;}}'),
(0, '127.0.0.1', '1454391598', '__ci_last_regenerate|i:1454391598;cart_contents|a:4:{s:10:"cart_total";d:249500;s:11:"total_items";d:8;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:7;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:245000;}}'),
(6, '127.0.0.1', '1454391910', '__ci_last_regenerate|i:1454391610;cart_contents|a:4:{s:10:"cart_total";d:284500;s:11:"total_items";d:9;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:8;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:280000;}}'),
(2147483647, '127.0.0.1', '1454391911', '__ci_last_regenerate|i:1454391911;cart_contents|a:4:{s:10:"cart_total";d:319500;s:11:"total_items";d:10;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:9;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:315000;}}'),
(2147483647, '127.0.0.1', '1454391912', '__ci_last_regenerate|i:1454391912;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454391912', '__ci_last_regenerate|i:1454391912;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454391913', '__ci_last_regenerate|i:1454391913;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454391985', '__ci_last_regenerate|i:1454391985;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392015', '__ci_last_regenerate|i:1454392015;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392016', '__ci_last_regenerate|i:1454392016;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392016', '__ci_last_regenerate|i:1454392016;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392017', '__ci_last_regenerate|i:1454392017;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392059', '__ci_last_regenerate|i:1454392059;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392071', '__ci_last_regenerate|i:1454392071;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392072', '__ci_last_regenerate|i:1454392072;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392073', '__ci_last_regenerate|i:1454392073;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392073', '__ci_last_regenerate|i:1454392073;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392073', '__ci_last_regenerate|i:1454392073;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392074', '__ci_last_regenerate|i:1454392074;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392078', '__ci_last_regenerate|i:1454392078;'),
(2147483647, '127.0.0.1', '1454392081', '__ci_last_regenerate|i:1454392081;'),
(2147483647, '127.0.0.1', '1454392082', '__ci_last_regenerate|i:1454392082;'),
(2147483647, '127.0.0.1', '1454392082', '__ci_last_regenerate|i:1454392082;'),
(2147483647, '127.0.0.1', '1454392086', '__ci_last_regenerate|i:1454392086;cart_contents|a:3:{s:10:"cart_total";d:4500;s:11:"total_items";d:1;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}}'),
(2147483647, '127.0.0.1', '1454392089', '__ci_last_regenerate|i:1454392089;cart_contents|a:3:{s:10:"cart_total";d:4500;s:11:"total_items";d:1;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}}'),
(2147483647, '127.0.0.1', '1454392090', '__ci_last_regenerate|i:1454392090;'),
(2147483647, '127.0.0.1', '1454392092', '__ci_last_regenerate|i:1454392092;'),
(2147483647, '127.0.0.1', '1454392096', '__ci_last_regenerate|i:1454392096;'),
(2147483647, '127.0.0.1', '1454392248', '__ci_last_regenerate|i:1454392248;'),
(2147483647, '127.0.0.1', '1454392249', '__ci_last_regenerate|i:1454392249;'),
(2147483647, '127.0.0.1', '1454392250', '__ci_last_regenerate|i:1454392250;'),
(2147483647, '127.0.0.1', '1454392251', '__ci_last_regenerate|i:1454392251;'),
(2147483647, '127.0.0.1', '1454392254', '__ci_last_regenerate|i:1454392254;'),
(2147483647, '127.0.0.1', '1454392267', '__ci_last_regenerate|i:1454392267;'),
(2147483647, '127.0.0.1', '1454392271', '__ci_last_regenerate|i:1454392271;cart_contents|a:3:{s:10:"cart_total";d:4500;s:11:"total_items";d:1;s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";a:7:{s:2:"id";s:12:"sku_product5";s:3:"qty";d:1;s:5:"price";d:4500;s:4:"name";s:23:"Compact flatbed scanner";s:6:"option";a:1:{s:6:"c_p_id";s:1:"5";}s:5:"rowid";s:32:"55cf9213b9340d0ad171cb8cd2fb6b2b";s:8:"subtotal";d:4500;}}'),
(2147483647, '127.0.0.1', '1454392279', '__ci_last_regenerate|i:1454392279;'),
(2147483647, '127.0.0.1', '1454392281', '__ci_last_regenerate|i:1454392281;cart_contents|a:3:{s:10:"cart_total";d:2499;s:11:"total_items";d:1;s:32:"00a21e8a70adfdccb18f55f6e2c41f66";a:7:{s:2:"id";s:12:"sku_product8";s:3:"qty";d:1;s:5:"price";d:2499;s:4:"name";s:42:"Timex MF13 Expedition Analog-Digital Watch";s:6:"option";a:1:{s:6:"c_p_id";s:1:"8";}s:5:"rowid";s:32:"00a21e8a70adfdccb18f55f6e2c41f66";s:8:"subtotal";d:2499;}}'),
(2147483647, '127.0.0.1', '1454392383', '__ci_last_regenerate|i:1454392383;cart_contents|a:3:{s:10:"cart_total";d:2499;s:11:"total_items";d:1;s:32:"00a21e8a70adfdccb18f55f6e2c41f66";a:7:{s:2:"id";s:12:"sku_product8";s:3:"qty";d:1;s:5:"price";d:2499;s:4:"name";s:42:"Timex MF13 Expedition Analog-Digital Watch";s:6:"option";a:1:{s:6:"c_p_id";s:1:"8";}s:5:"rowid";s:32:"00a21e8a70adfdccb18f55f6e2c41f66";s:8:"subtotal";d:2499;}}'),
(2147483647, '127.0.0.1', '1454392392', '__ci_last_regenerate|i:1454392392;'),
(2147483647, '127.0.0.1', '1454392395', '__ci_last_regenerate|i:1454392395;cart_contents|a:3:{s:10:"cart_total";d:35000;s:11:"total_items";d:1;s:32:"a0dbd430902257599feefc93efc8dd3b";a:7:{s:2:"id";s:12:"sku_product1";s:3:"qty";d:1;s:5:"price";d:35000;s:4:"name";s:8:"iPhone 6";s:6:"option";a:1:{s:6:"c_p_id";s:1:"1";}s:5:"rowid";s:32:"a0dbd430902257599feefc93efc8dd3b";s:8:"subtotal";d:35000;}}'),
(2147483647, '127.0.0.1', '1454392426', '__ci_last_regenerate|i:1454392426;'),
(2147483647, '127.0.0.1', '1454392430', '__ci_last_regenerate|i:1454392430;'),
(2147483647, '127.0.0.1', '1454392435', '__ci_last_regenerate|i:1454392435;admin_user_name|s:9:"adminuser";admin_user_id|s:1:"2";admin_user_email|s:13:"admin@new.com";admin_logged_in|b:1;'),
(2147483647, '127.0.0.1', '1454392435', '__ci_last_regenerate|i:1454392435;'),
(2147483647, '127.0.0.1', '1454392435', '__ci_last_regenerate|i:1454392435;'),
(2147483647, '127.0.0.1', '1454392436', '__ci_last_regenerate|i:1454392436;'),
(2147483647, '127.0.0.1', '1454392448', '__ci_last_regenerate|i:1454392448;admin_user_name|s:9:"adminuser";admin_user_id|s:1:"2";admin_user_email|s:13:"admin@new.com";admin_logged_in|b:1;'),
(2147483647, '127.0.0.1', '1454392448', '__ci_last_regenerate|i:1454392448;'),
(2147483647, '127.0.0.1', '1454392448', '__ci_last_regenerate|i:1454392448;'),
(2147483647, '127.0.0.1', '1454392482', '__ci_last_regenerate|i:1454392482;'),
(2147483647, '127.0.0.1', '1454392487', '__ci_last_regenerate|i:1454392487;admin_user_name|s:9:"adminuser";admin_user_id|s:1:"2";admin_user_email|s:13:"admin@new.com";admin_logged_in|b:1;'),
(2147483647, '127.0.0.1', '1454392487', '__ci_last_regenerate|i:1454392487;'),
(2147483647, '127.0.0.1', '1454392487', '__ci_last_regenerate|i:1454392487;'),
(2147483647, '127.0.0.1', '1454392500', '__ci_last_regenerate|i:1454392500;'),
(2147483647, '127.0.0.1', '1454392500', '__ci_last_regenerate|i:1454392500;'),
(2147483647, '127.0.0.1', '1454392564', '__ci_last_regenerate|i:1454392564;'),
(2147483647, '127.0.0.1', '1454392565', '__ci_last_regenerate|i:1454392565;'),
(2147483647, '127.0.0.1', '1454392565', '__ci_last_regenerate|i:1454392565;'),
(2147483647, '127.0.0.1', '1454392565', '__ci_last_regenerate|i:1454392565;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392565;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392566', '__ci_last_regenerate|i:1454392566;'),
(2147483647, '127.0.0.1', '1454392567', '__ci_last_regenerate|i:1454392567;'),
(2147483647, '127.0.0.1', '1454392567', '__ci_last_regenerate|i:1454392567;'),
(2147483647, '127.0.0.1', '1454392567', '__ci_last_regenerate|i:1454392567;'),
(2147483647, '127.0.0.1', '1454392568', '__ci_last_regenerate|i:1454392568;'),
(2147483647, '127.0.0.1', '1454392570', '__ci_last_regenerate|i:1454392570;'),
(2147483647, '127.0.0.1', '1454392570', '__ci_last_regenerate|i:1454392570;'),
(2147483647, '127.0.0.1', '1454392570', '__ci_last_regenerate|i:1454392570;'),
(2147483647, '127.0.0.1', '1454392570', '__ci_last_regenerate|i:1454392570;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392571', '__ci_last_regenerate|i:1454392571;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392572', '__ci_last_regenerate|i:1454392572;'),
(2147483647, '127.0.0.1', '1454392573', '__ci_last_regenerate|i:1454392573;'),
(2147483647, '127.0.0.1', '1454392573', '__ci_last_regenerate|i:1454392573;'),
(2147483647, '127.0.0.1', '1454392573', '__ci_last_regenerate|i:1454392573;'),
(2147483647, '127.0.0.1', '1454392573', '__ci_last_regenerate|i:1454392573;'),
(2147483647, '127.0.0.1', '1454392573', '__ci_last_regenerate|i:1454392573;'),
(2147483647, '127.0.0.1', '1454392573', '__ci_last_regenerate|i:1454392573;'),
(2147483647, '127.0.0.1', '1454392573', '__ci_last_regenerate|i:1454392573;'),
(2147483647, '127.0.0.1', '1454392574', '__ci_last_regenerate|i:1454392574;'),
(2147483647, '127.0.0.1', '1454392574', '__ci_last_regenerate|i:1454392574;'),
(2147483647, '127.0.0.1', '1454392574', '__ci_last_regenerate|i:1454392574;'),
(2147483647, '127.0.0.1', '1454392574', '__ci_last_regenerate|i:1454392574;'),
(2147483647, '127.0.0.1', '1454392574', '__ci_last_regenerate|i:1454392574;'),
(2147483647, '127.0.0.1', '1454392574', '__ci_last_regenerate|i:1454392574;'),
(2147483647, '127.0.0.1', '1454392575', '__ci_last_regenerate|i:1454392575;'),
(2147483647, '127.0.0.1', '1454392575', '__ci_last_regenerate|i:1454392575;'),
(2147483647, '127.0.0.1', '1454392576', '__ci_last_regenerate|i:1454392576;'),
(2147483647, '127.0.0.1', '1454392576', '__ci_last_regenerate|i:1454392576;'),
(2147483647, '127.0.0.1', '1454392576', '__ci_last_regenerate|i:1454392576;'),
(2147483647, '127.0.0.1', '1454392576', '__ci_last_regenerate|i:1454392576;'),
(2147483647, '127.0.0.1', '1454392577', '__ci_last_regenerate|i:1454392577;'),
(2147483647, '127.0.0.1', '1454392577', '__ci_last_regenerate|i:1454392577;'),
(2147483647, '127.0.0.1', '1454392577', '__ci_last_regenerate|i:1454392577;'),
(2147483647, '127.0.0.1', '1454392582', '__ci_last_regenerate|i:1454392582;admin_user_name|s:9:"adminuser";admin_user_id|s:1:"2";admin_user_email|s:13:"admin@new.com";admin_logged_in|b:1;'),
(2147483647, '127.0.0.1', '1454392582', '__ci_last_regenerate|i:1454392582;'),
(2147483647, '127.0.0.1', '1454392582', '__ci_last_regenerate|i:1454392582;');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(4) NOT NULL AUTO_INCREMENT,
  `p_c_id` int(4) NOT NULL,
  `p_name` text NOT NULL,
  `p_desc` longtext NOT NULL,
  `p_brand` int(11) NOT NULL,
  `p_model` text NOT NULL,
  `p_image` text NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT '1',
  `p_stock` int(11) NOT NULL,
  `p_price` text NOT NULL,
  `p_discount` varchar(5) DEFAULT NULL,
  `p_thumb` text NOT NULL,
  `p_dateadded` datetime NOT NULL,
  `p_datemodify` datetime NOT NULL,
  `p_max_add` int(4) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_c_id`, `p_name`, `p_desc`, `p_brand`, `p_model`, `p_image`, `p_status`, `p_stock`, `p_price`, `p_discount`, `p_thumb`, `p_dateadded`, `p_datemodify`, `p_max_add`) VALUES
(1, 11, 'iPhone 6', 'iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name or number in your address book, a favorites list, or a call log. It also automatically syncs all your contacts from a PC, Mac, or Internet service. And it lets you select and listen to voicemail messages in whatever order you want just like email.', 1, 'iPhone 6', 'iPhone6-1140x380.jpg', 1, 25, '35000', NULL, 'iPhone6-1140x380_thumb.jpg', '2016-01-27 11:09:00', '2016-02-01 12:16:22', 3),
(2, 11, 'Palm Treo Pro', 'Redefine your workday with the Palm Treo Pro smartphone. Perfectly balanced, you can respond to business and personal email, stay on top of appointments and contacts, and use Wi-Fi or GPS when you’re out and about. Then watch a video on YouTube, catch up with news and sports on the web, or listen to a few songs. Balance your work and play the way you like it, with the Palm Treo Pro.\r\n\r\nFeatures\r\n\r\n    Windows Mobile® 6.1 Professional Edition\r\n    Qualcomm® MSM7201 400MHz Processor\r\n    320x320 transflective colour TFT touchscreen\r\n    HSDPA/UMTS/EDGE/GPRS/GSM radio\r\n    Tri-band UMTS — 850MHz, 1900MHz, 2100MHz\r\n    Quad-band GSM — 850/900/1800/1900\r\n    802.11b/g with WPA, WPA2, and 801.1x authentication\r\n    Built-in GPS\r\n    Bluetooth Version: 2.0 + Enhanced Data Rate\r\n    256MB storage (100MB user available), 128MB RAM\r\n    2.0 megapixel camera, up to 8x digital zoom and video capture\r\n    Removable, rechargeable 1500mAh lithium-ion battery\r\n    Up to 5.0 hours talk time and up to 250 hours standby\r\n    MicroSDHC card expansion (up to 32GB supported)\r\n    MicroUSB 2.0 for synchronization and charging\r\n    3.5mm stereo headset jack\r\n    60mm (W) x 114mm (L) x 13.5mm (D) / 133g', 0, 'Palm Treo Pro', 'palm-treo-pro.jpeg', 1, 20, '20000', NULL, 'palm-treo-pro_thumb.jpeg', '2016-01-27 11:10:28', '2016-01-29 18:36:20', 3),
(3, 4, 'Lenovo G50-80', '1.9 GHz Intel Core i3-4005U 4th Gen Processor\r\n    4GB RAM\r\n    1TB Hard Drive\r\n    15.6-inch Display\r\n    Windows 8.1 Operating System &#40;Free Upgrade to Windows 10&#41;\r\n    Intel HD Graphcis 4400', 2, '80L000HSIN', 'en-INTL-PDP-Lenovo-G50-Black-CWF-02077-Large.jpg', 1, 10, '32999', NULL, 'en-INTL-PDP-Lenovo-G50-Black-CWF-02077-Large_thumb.jpg', '2016-01-27 16:39:05', '2016-01-27 16:52:22', 4),
(4, 7, 'The Martian', 'After an exploratory mission goes awry, lone astronaut Mark Watney (Matt Damon) is left for dead on the hostile surface of Mars and must use his scientific ingenuity to homestead an enclosed habitat where he can survive. Meanwhile, the astronauts he left behind realize the severity of his plight and join forces with an international coalition of scientists to launch a rescue mission in defiance of NASA protocol.', 0, 'The Martian', 'images.jpeg', 1, 50, '600', NULL, 'images_thumb.jpeg', '2016-01-28 11:22:36', '2016-01-28 11:29:34', 1),
(5, 8, 'Compact flatbed scanner', 'Flatbed scanner\r\nScan resolution: 2400 x 4800dpi\r\nScan speed (A4, 300dpi): approx. \r\n16secs.\r\nSEND to cloud* function\r\nScanner Type  Flatbed\r\nScanning Method  CIS (Contact Image Sensor)\r\nLight Source  3-colour (RGB) LED\r\nOptical Resolution*1  2400 x 4800dpi\r\nSelectable Resolution*2  25 - 19200dpi\r\nScanning Bit Depth   \r\nGrayscale  16-bit input\r\n8-bit output\r\nColour  48-bit input (16-bit for each color)\r\n48 or 24-bit output (16-bit or 8-bit for each color)\r\nPreview Speed*3  Approx. 14secs.\r\nScanning Speed*4  Colour A4 300dpi  Approx. 16secs.', 3, 'LiDE 120', 'lide-120-b1.png', 1, 25, '4500', NULL, 'lide-120-b1_thumb.png', '2016-01-29 12:59:48', '2016-01-29 13:00:56', 4),
(6, 11, 'HTC Desire 626G Plus', 'Android v4.4.4 (KitKat) OS\r\n    13 MP Primary Camera\r\n    5 MP Secondary Camera\r\n    Dual Sim (GSM + UMTS)\r\n    5 inch Capacitive Touchscreen\r\n    1.7 GHz Cortex-A53 Octa Core Processor\r\n    Wi-Fi Enabled\r\n    FM Radio\r\n    Expandable Storage Capacity of 32 GB', 5, 'HTC Desire 626G Plus', 'htc-desire-626g-plus-400x400-imae6zpyfj54ezpk.jpeg', 1, 12, '12450', NULL, 'htc-desire-626g-plus-400x400-imae6zpyfj54ezpk_thumb.jpeg', '2016-02-01 10:44:18', '2016-02-01 12:15:28', 3),
(7, 13, 'Motorola Flip Cover for Moto G (3rd Gen)', 'Plastic Material\r\n    360 Degree Protection\r\n    Protects from Scratches and Cracks\r\n    Magnetic Clasp\r\n    Access to all Controls and Buttons\r\n    Cutout Window', 6, 'Moto G 3', 'motorola-moto-g-3-400x400-imae9pqhjfhubrft.jpeg', 1, 20, '999', NULL, 'motorola-moto-g-3-400x400-imae9pqhjfhubrft_thumb.jpeg', '2016-02-01 10:54:03', '2016-02-01 10:54:48', 3),
(8, 14, 'Timex MF13 Expedition Analog-Digital Watch', 'Round Dial\r\n    Chronograph Function\r\n    Water Resistant\r\n    Brown Strap\r\n    Fiber Case\r\n    Buckle Clasp', 7, 'Timex MF13 Expedition Analog', 'mf13-timex-400x400-imaefptnezey5ehy.jpeg', 1, 25, '2499', NULL, 'mf13-timex-400x400-imaefptnezey5ehy_thumb.jpeg', '2016-02-01 12:08:01', '2016-02-01 12:12:55', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_specification`
--

CREATE TABLE IF NOT EXISTS `product_specification` (
  `sp_id` int(4) NOT NULL AUTO_INCREMENT,
  `sp_name` text NOT NULL,
  `sp_values` longtext NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(4) NOT NULL AUTO_INCREMENT,
  `u_username` text NOT NULL,
  `u_email` text NOT NULL,
  `u_password` text NOT NULL,
  `u_fname` text NOT NULL,
  `u_lname` text NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1',
  `u_regdate` datetime NOT NULL,
  `u_lastlogin` datetime NOT NULL,
  `u_auth` varchar(6) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_username`, `u_email`, `u_password`, `u_fname`, `u_lname`, `u_status`, `u_regdate`, `u_lastlogin`, `u_auth`) VALUES
(1, 'sanket', 'sanketjadav@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', 1, '2016-01-21 12:02:01', '2016-01-25 15:44:52', ''),
(2, 'adminuser', 'admin@new.com', '25d55ad283aa400af464c76d713c07ad', 'Admin', 'User', 1, '2016-01-23 15:10:00', '2016-02-03 09:53:22', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
