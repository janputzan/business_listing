-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2015 at 08:24 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `business_listings`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `info` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_premium` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`,`is_premium`,`is_active`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `address_1`, `address_2`, `city`, `postcode`, `tel`, `url`, `info`, `user_id`, `category_id`, `is_premium`, `is_active`) VALUES
(11, '', '', '', '', '', '', '', '', 9, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`business_id`,`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `is_admin` (`is_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_admin`) VALUES
(9, 'Jan', 'Putzan', 'admin@business.com', '$2y$10$e8TkJ.Dze.eBgpHeXmrGyOPsp5.PISi.HhhdfndZzRoPMDejtnZYK', 0),
(12, 'sdfsfsf', 'sfsfsf', 'sfsf@ff.hgjh', '$2y$10$QvBjYlL70NNUMtE2e.ru2e27K0ysUNA7BFL8IuvA/0k0b/R9flo.C', 0),
(13, 'asdasdasdasd', 'asdasdasdasd', 'sdsdsd@sfsf.ssss', '$2y$10$ehVk2dal24Y.0H0P0NdbLuL2PfGro8dimGkvem0eM3wXj1Oxycsti', 0),
(14, 'sfsfsss', 'ssssssss', 'admin@businesss.com', '$2y$10$6pzqNlEumjIDASiFo346Y.YnkeZM/CCBmOMtJQRzPG/.vlpVl.fBi', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
