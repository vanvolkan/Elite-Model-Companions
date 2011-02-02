-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2011 at 10:14 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elite_model_companions`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_sessions`
--

DROP TABLE IF EXISTS `cake_sessions`;
CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_sessions`
--

INSERT INTO `cake_sessions` VALUES('722d2350341f429606a97c51a6e4218b', 'Config|a:3:{s:9:"userAgent";s:32:"deaa853a11762c44243d116ac060e2e4";s:4:"time";i:1295970198;s:7:"timeout";i:10;}Auth|a:1:{s:4:"User";a:5:{s:2:"id";s:1:"4";s:8:"username";s:4:"slav";s:10:"last_login";s:19:"0000-00-00 00:00:00";s:7:"created";s:19:"2011-01-25 22:58:16";s:8:"modified";N;}}', 1295970198);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(2, 'volkan', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '2011-01-25 21:31:56', '2011-01-25 21:31:17', '2011-01-25 21:31:56');
INSERT INTO `users` VALUES(4, 'slav', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '0000-00-00 00:00:00', '2011-01-25 22:58:16', NULL);
