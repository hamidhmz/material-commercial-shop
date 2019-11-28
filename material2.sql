-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2017 at 07:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `material2`
--

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE IF NOT EXISTS `atm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_number` varchar(16) COLLATE utf8_persian_ci NOT NULL,
  `cvv2` int(4) NOT NULL,
  `password` varchar(16) COLLATE utf8_persian_ci NOT NULL,
  `deadtime` date NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id`, `card_number`, `cvv2`, `password`, `deadtime`, `price`) VALUES
(1, '610433791752092', 1234, '12345', '2017-01-01', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(14) COLLATE utf8_persian_ci NOT NULL,
  `token` smallint(5) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `fullname`, `address`, `mobile`, `token`, `user_id`) VALUES
(1, 'حسین نجفی', 'مشهد - بلوار طبرسی', '09357405114', NULL, NULL),
(2, 'محمد قاسمی', 'ااالالرتذاارلل', '0937932830', NULL, NULL),
(3, 'حمید', 'بلوار', '0937932830۱', NULL, NULL),
(4, 'حمید', 'بلوار', '0937932830۱', NULL, NULL),
(5, 'kj', 'jkfjfj', '0937932830۱', NULL, NULL),
(6, 'hami', 'ifjeifje', '56454', NULL, NULL),
(7, 'kjk', 'kjlkj', 'jkljl', NULL, NULL),
(8, 'lkj', 'kjlkjl', 'ljljl', NULL, NULL),
(9, 'klj', 'lkj', 'ljl', NULL, NULL),
(10, 'jkj', 'hkjh', 'jkhk', NULL, NULL),
(11, 'jij', 'i', 'ji', NULL, NULL),
(12, 'kkk', 'kk', 'kk', NULL, NULL),
(13, 'klmlkm', 'mkmmklm', 'klmkm', NULL, NULL),
(14, '22', '222', '222', NULL, NULL),
(15, 'jkhj', 'jkhkjhk', 'khkjhkj', NULL, NULL),
(16, 'حسین نجفی', 'مشهد', '09357405114', NULL, NULL),
(17, 'حسین نجفی', 'مشهد', '09357405114', NULL, NULL),
(18, 'حسین نجفی', 'مشهد', '09357405114', NULL, NULL),
(19, 'dfvdfv', 'vdfvdfv', 'fdvdfv', NULL, NULL),
(20, 'kj', 'jkl', 'jlj', NULL, NULL),
(21, 'حمید', 'gfgfghgf', '0937932830۱', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(8, 'آجر', '148776815158ad8a57e88570.90581512.jpg'),
(9, 'سیمان', '148776955658ad8fd4496aa7.04220493.jpg'),
(10, 'گچ', '148776968458ad90544365e5.11207960.jpg'),
(11, 'هبلکس', '148776970858ad906c643c44.47799275.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `address`) VALUES
(12, 13, '148776978458ad90b86b9748.42597195.jpg'),
(13, 14, '148776986858ad910c0f17a9.72655578.jpg'),
(14, 15, '148776991358ad91398d3ea8.63649698.png'),
(15, 16, '148776996058ad916846df53.08495267.jpg'),
(16, 17, '148777000858ad9198ac61d6.59180778.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `category` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `count` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `model`, `category`, `type`, `weight`, `price`, `description`, `count`) VALUES
(13, 'سفال', 8, 3, 500, 50000, 'بسیار آجر خوب و مرغوبی است', 50000000),
(14, 'بلوک 20*20', 8, 3, 400, 35000, 'بسیار خوب و مرغوب است .تهیه شده از بهترین خاک رس ', 50000000),
(15, 'مشهد', 9, 1, 10000, 5000, 'خیلی هم عالی عالی', 50000000),
(16, 'مشهد', 10, 1, 400, 10000, 'اووووه اوووه بیا ببر', 50000000),
(17, 'خراسان', 11, 3, 150, 35000, 'پوووووف خیلی عالیه پسر', 50000000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `transportation_costs` int(11) DEFAULT '100000',
  `carry_method` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `buyer_id` (`buyer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(2, 'فله'),
(3, 'قالب'),
(1, 'کیسه ای');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `fullname`, `address`, `phone`) VALUES
(1, 'superadmin', 'X56WLc-sqROMEU4VMAJR-zGBDlUxgEaT', '$2y$13$v.jKYQ6oX6.gTJW5b.Xd5.D2C8.E39G8yiasqngynGrqVXzZupwIi', NULL, 'info@gmail.com', 10, 1486868679, 1486868679, NULL, NULL, NULL),
(5, 'hossein.najafi', 'DWJSoY8rfXleDka3sHQHsDVLVLaUpvLK', '$2y$13$oWo5SR8JWWMRXV3ietoEZ.OAEViaU9CJgEgYB5A/RDJia57xpZZIW', NULL, 'hnajafi1994@gmail.com', 10, 1488033524, 1488033524, 'حسین نجفی', 'مشهد', '09357405114'),
(6, 'mamad', 'hQFBew4QxxpXwbJZfSFhVtHPrgAfphtg', '$2y$13$16RTMl3mpqUB0wbBVUO4le0p4XrHw1zLPMPkQq.BQxHV3RSrAvjmK', NULL, 'm.qasemi12372@gmail.com', 10, 1488046518, 1488046518, 'محمد قاسمی', 'اونجا', '09379332830');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories_fk` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_types_fk` FOREIGN KEY (`type`) REFERENCES `types` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_buyers_fk` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`),
  ADD CONSTRAINT `sales_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sales_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
