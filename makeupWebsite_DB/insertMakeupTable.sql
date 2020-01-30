-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2015 at 04:26 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `w0650451db`
--

-- --------------------------------------------------------

--
-- Table structure for table `makeup_prods`
--

CREATE TABLE IF NOT EXISTS `makeup_prods` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(80) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  `img_link` varchar(255) DEFAULT NULL,
  `in_stock` int(11) unsigned DEFAULT NULL,
  `in_cart` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `makeup_prods`
--

INSERT INTO `makeup_prods` (`prod_id`, `prod_name`, `description`, `price`, `rating`, `img_link`, `in_stock`, `in_cart`) VALUES
(1, 'Fit Me Pressed Powder', 'Pressed powder that goes beyond matching to a fresh, natural finish.', '25.00', 4, '../img/products/product1.png', 4, 0),
(2, 'Fit Me Hydrate + Smooth Foundation', 'Flawless. Lets the real you come through. Fresh, breathing, natural skin.', '15.00', 3, NULL, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
