-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2011 at 08:55 PM
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

INSERT INTO `cake_sessions` VALUES('818c4a09888ffe864bd31c1146392600', 'Config|a:3:{s:9:"userAgent";s:32:"db555b90bc304cf457385dd76be7161c";s:4:"time";i:1296994603;s:7:"timeout";i:10;}', 1296994605);

-- --------------------------------------------------------

--
-- Table structure for table `elite_models`
--

DROP TABLE IF EXISTS `elite_models`;
CREATE TABLE IF NOT EXISTS `elite_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` varchar(3) NOT NULL,
  `height` varchar(5) NOT NULL,
  `bust_cup_size` varchar(3) NOT NULL,
  `size` int(3) NOT NULL,
  `hair_colour` varchar(15) NOT NULL,
  `eye_colour` varchar(10) NOT NULL,
  `cost` double NOT NULL,
  `description` text NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `elite_models`
--

INSERT INTO `elite_models` VALUES(1, 'Rebecca: the Sensual Senorita', '22', '5''7"', 'C', 8, 'Black', 'Brown', 1500, 'There''s no need to wear red to get Rebecca: the Sensual Senorita excited. This Spanish stunner has the face of an angel with delicious dark brown locks, but once in the bedroom she becomes a passionate, fiery, sizzling companion. In fact with Rebecca, you''ll be screaming with delight, "Andale Andale, Arriba Arriba," all night long. So prepare the sangria for a Spanish fiesta with Rebecca: the Sensual Senorita.', 0);
INSERT INTO `elite_models` VALUES(2, 'Eva: the Swedish Centrefold', '23', '5''7"', 'D', 8, 'Blonde', 'Blue', 2500, 'Don your Viking helmet because Eva: the Swedish Centrefold has hit Sydney with a massive splash. Bubbly and outgoing, this young model has beautiful blonde hair, a great sense of style and a stunning body. With her confidant and playful nature, Eva is always happy to undress, to reveal her sexy lingerie and perfect curves. So baton-down-the–hatches because Sydney Escort’s Eva: the Swedish Centrefold is looking forward to parading her sexy bod down your gangplank very soon.', 0);
INSERT INTO `elite_models` VALUES(3, 'Kimberly: the Bikini Model', '24', '5''8"', 'D', 8, 'Blonde', 'blue', 3000, 'The bikini was designed with Kimberly: the Bikini Model’s body in mind. With perfectly proportioned curves, Kimberly has long slender legs, a svelte waist, and a delicious bust. When it comes to the evening though, Kimberly swaps her bikini for sexy lace lingerie and looks forward to showing you her latest purchase. We’re confident you’ll enjoy Sydney Escort’s Kimberly: the Bikini Model.', 0);
INSERT INTO `elite_models` VALUES(4, 'Kate: the Sensitive Soul', '19', '5''8"', 'C', 8, 'Dark Blonde', 'Blue', 1500, 'For a true girlfriend experience you really can’t go past Kate: the Sensitive Soul. Kate has gorgeous fresh Australian looks and a fantastic laid back personality. The moment you meet Kate, she will put you at ease with her gentle, warm persona. Evenings spent with Kate are always enlightening. So for some quality time, enlist the help of Sydney Escort’s Kate: the Sensitive Soul.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `model_images`
--

DROP TABLE IF EXISTS `model_images`;
CREATE TABLE IF NOT EXISTS `model_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elite_model_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `elite_model_id` (`elite_model_id`,`location`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `model_images`
--


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

INSERT INTO `users` VALUES(1, 'slav', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '0000-00-00 00:00:00', '2011-01-25 22:58:16', NULL);
INSERT INTO `users` VALUES(2, 'volkan', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '2011-01-25 21:31:56', '2011-01-25 21:31:17', '2011-01-25 21:31:56');
