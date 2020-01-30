-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2015 at 02:46 AM
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
  `categories` varchar(32) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `in_stock` int(11) unsigned DEFAULT NULL,
  `catalog` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `makeup_prods`
--

INSERT INTO `makeup_prods` (`prod_id`, `prod_name`, `categories`, `description`, `price`, `rating`, `screenshot`, `in_stock`, `catalog`) VALUES
(1, 'EYE STUDIO MASTER GRAPHIC IN STRIKING BLACK', 'Eye', 'Eye Studio Master Graphic: Bold. Graphic. Easy. Get the edge.', '6.00', NULL, 'eyeProduct1.png', 2, 'Featured Product'),
(2, 'EYE STUDIO COLOR MOLTEN', 'Eye', 'Eye Studio Color Molten: Now shadow melts to a new molten luster.', '7.00', NULL, 'eyeProduct2.png', 3, 'What''s New'),
(3, 'EYE STUDIO BROW PRECISE', 'Eye', NULL, '8.00', NULL, 'eyeProduct3.png', 8, 'Featured Product'),
(4, 'FACE STUDIO MASTER PRIME', 'Face', 'NEW Master Prime Weightless Blurring Primers.', '11.00', 5, 'faceProduct1.png', 5, 'Featured Product'),
(5, 'FACE STUDIO MASTER CONCEAL', 'Face', 'Master Conceal by Face Studio. Laser-Thin Camouflaging Concealer.', '10.00', 4, 'faceProduct2.png', 15, 'Popular Product'),
(6, 'FIT ME! MATTE + PORELESS FOUNDATION', 'Face', 'Fit Me! Matte + Poreless Foundation: Ultra-lightweight mattifying foundation for normal to oily skin. Available in 12 shades.', '8.00', 3, 'faceProduct3.png', 5, 'What''s New'),
(7, 'FIT ME! MATTE + PORELESS POWDER', 'Face', 'Fit Me! Matte + Poreless Powder. Long-lasting shine control and up to 12HR wear. Available in 8 shades.', '8.00', NULL, 'faceProduct4.png', 6, NULL),
(8, 'DREAM WONDER LIQUID TOUCH FOUNDATION', 'Face', 'Dream Wonder Liquid-Touch Foundation. A flawless revolution for Perfection so Real it''s Unreal.', '10.00', NULL, 'faceProduct5.png', 4, NULL),
(9, 'DREAM WONDER POWDER', 'Face', '100% Second- Skin Powder Foundation Perfection', '11.00', 4, 'faceProduct6.png', 7, 'Popular Product'),
(10, 'COLOR SHOW VEILS', 'Nail Polish', 'TRENDING NOW: Veil Detail Textured Nail Lacquer Top Coats', '3.50', 4, 'nailsProduct1.png', 20, 'Best Seller'),
(11, 'COLOR SHOW NAIL LACQUER', 'Nail Polish', 'TRENDING NOW: Chip Free Nail Color, Straight from the Shows', '3.00', 0, 'nailsProduct2.png', 30, 'What''s New'),
(12, 'COLOR SENSATIONAL REBEL BLOOM', 'Lip', 'Color Sensational Rebel Bloom: Now, it''s time for pastels to rebel. A kicky bouquet of pinks, reds and mauves.', '8.00', NULL, 'lipsProduct1.png', 25, 'What''s New'),
(13, 'BABY LIPS DR. RESCUE', 'Lip', 'Rescue My Sore Lips With Medicated Care + 12 HR Hydration!', '4.00', 4, 'lipsProduct2.png', 20, 'Popular Product'),
(14, 'COLOR WHISPER BY COLOR SENSATIONAL', 'Lip', 'Dare to Whisper. Truly translucent gel-color with pure color pigments suspended in a weightless gel.', '8.00', 4, 'lipsProduct3.png', 15, 'Best Seller'),
(15, 'COLOR SENSATIONAL LIP LINER', 'Lip', 'Coordinating lip liners that won''t smudge, smear, feather or bleed.', '7.00', NULL, 'lipsProduct4.jpg', 40, ''),
(16, 'EXPERT EYES 100% OIL-FREE EYE MAKEUP REMOVER', 'Brushes and Accessories', 'Gently removes washable mascara and eye makeup. No oily residue.', '5.00', 3, 'BrushAndAccessProd1.jpg', 12, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
