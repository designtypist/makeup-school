-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2015 at 02:47 AM
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
-- Table structure for table `makeup_vids`
--

CREATE TABLE IF NOT EXISTS `makeup_vids` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `con_creator` varchar(64) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `img_link` varchar(255) DEFAULT NULL,
  `featured_vids` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `makeup_vids`
--

INSERT INTO `makeup_vids` (`video_id`, `video_name`, `description`, `con_creator`, `video_link`, `img_link`, `featured_vids`) VALUES
(1, '6 Eyeliner Styles - MakeUp Tutorial', 'Eyeliner tutorial showing you 6 ways you can wear eyeliner! You can adapt these looks to suit your eye shape.', 'Shonagh Scott', 'https://www.youtube.com/watch?v=lfPRLuReKF4', 'http://img.youtube.com/vi/lfPRLuReKF4/0.jpg', 1),
(2, 'Tutorial : Everyday Makeup Routine', 'Makeup tutorial for everyday routines.', 'RhaeaEstelle', 'https://www.youtube.com/watch?v=r0HpbASP7AM', 'http://img.youtube.com/vi/r0HpbASP7AM/0.jpg', 1),
(3, 'Full Face Drugstore Makeup Tutorial & Affordable Brushes!', 'Makeup tutorial at an affordable price.', 'KathleenLights', 'https://www.youtube.com/watch?v=ePmnAZUQlkM', 'http://img.youtube.com/vi/ePmnAZUQlkM/0.jpg', 1),
(4, 'Glamorous Evening Makeup Tutorial', 'Glamorous Evening Makeup', 'TheMakeupChair', 'https://www.youtube.com/watch?v=oAv6KeHbQhw', 'http://img.youtube.com/vi/oAv6KeHbQhw/0.jpg', 0),
(5, 'Makeup MISTAKES to AVOID!', '13 tips on how to achieve a flawless face with makeup', 'Carli Bybel', 'https://www.youtube.com/watch?v=TcxU9Dr-1rs', 'http://img.youtube.com/vi/TcxU9Dr-1rs/0.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
