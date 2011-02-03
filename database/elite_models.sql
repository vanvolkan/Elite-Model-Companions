-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2011 at 09:34 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `elite_model_companions`
--

-- --------------------------------------------------------

--
-- Table structure for table `elite_models`
--

CREATE TABLE `elite_models` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(3) NOT NULL,
  `height` varchar(5) NOT NULL,
  `bust_cup_size` varchar(3) NOT NULL,
  `size` int(3) NOT NULL,
  `hair_colour` varchar(10) NOT NULL,
  `eye_colour` varchar(10) NOT NULL,
  `cost` double NOT NULL,
  `description` text NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elite_models`
--

