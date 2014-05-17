-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 17, 2014 at 02:28 PM
-- Server version: 5.5.34-log
-- PHP Version: 5.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_baralaye`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `name` varchar(10) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  UNIQUE KEY `name` (`name`),
  KEY `name_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`name`, `title`, `description`, `image`, `url`) VALUES
('ceramics', 'Sculpture / Ceramics', '', '', '/art/sculpture/ceramics'),
('metal', 'Sculpture / Metal', '', '', '/art/sculpture/metal'),
('mixed-medi', 'Sculpture / Mixed-Media', '', '', '/art/sculpture/mixed-media'),
('sculpture', 'Sculpture', 'Selections of my bronze, ceramic and mixed-media sculpture work. Sculpture has been the main direction of my artistic interests since I first started working in clay.', '', '/art/sculpture');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `banner` varchar(100) NOT NULL DEFAULT '',
  `creation_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `published_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `url`, `title`, `banner`, `creation_date`, `updated_date`, `content`, `published_date`, `status`) VALUES
(1, 'efa-open-studios-2013', 'Open Studio: Elizabeth Foundation 2013', '/images/post/full/efa-open-studios_2013.jpg', '2013-11-29 22:21:25', '2014-02-01 01:14:18', 'You are welcomed to see the latest creations in my studio and the works and studios of a multitude of other wonderfully talented artists at the Elizabeth Foundation for the Arts. Refreshments will be provided.', '2014-01-31 20:14:18', 1),
(2, 'efa-armory-open-house-2014', 'Open House: EFA Armory Arts Week', '/images/post/full/efa-open-studios_2013.jpg', '2014-01-31 18:23:27', '2014-02-08 16:12:01', 'As part of Armory Arts Week, we invite you to view nearly 60 EFA Open Studios and visit the EFA Project Space and Robert Blackburn Printmaking Workshop.', '0000-00-00 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
