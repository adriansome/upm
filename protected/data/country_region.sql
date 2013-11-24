-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2013 at 12:22 PM
-- Server version: 5.5.34-0ubuntu0.13.10.1-log
-- PHP Version: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fanatic_give_us_time`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_type`
--

CREATE TABLE IF NOT EXISTS `content_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_active` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `content_type`
--

INSERT INTO `content_type` (`id`, `name`, `date_created`, `date_updated`, `date_active`, `date_deleted`) VALUES
(1, 'singleline', '2013-09-05 12:06:47', '2013-09-05 12:06:47', '2013-09-05 12:06:47', NULL),
(2, 'html', '2013-09-05 12:06:47', '2013-09-05 12:06:47', '2013-09-05 12:06:47', NULL),
(3, 'file', '2013-09-05 12:07:24', '2013-09-05 12:07:24', '2013-09-05 12:07:24', NULL),
(4, 'date', '2013-09-05 12:07:24', '2013-09-05 12:07:24', '2013-09-05 12:07:24', NULL),
(5, 'boolean', '2013-09-05 12:07:37', '2013-09-05 12:07:37', '2013-09-05 12:07:37', NULL),
(6, 'multiline', '2013-09-05 12:07:37', '2013-09-05 12:07:37', NULL, NULL),
(7, 'hidden', '2013-10-15 10:00:00', NULL, NULL, NULL),
(8, 'list', '2013-10-15 10:00:00', NULL, NULL, NULL),
(9, 'text', '2013-11-18 00:00:00', NULL, NULL, NULL),
(10, 'textarea', '2013-11-18 00:00:00', NULL, NULL, NULL),
(11, 'submit', '2013-11-18 00:00:00', NULL, NULL, NULL),
(12, 'image', '2013-11-21 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sub_continent` varchar(100) NOT NULL,
  `continent` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `sub_continent`, `continent`) VALUES
(1, 'Australia', 'Pacific', 'Oceania'),
(2, 'Austria', 'Western Europe', 'Europe'),
(3, 'Bahamas', 'Caribbean', 'North America'),
(4, 'Bahrain', 'Middle East', 'Asia'),
(5, 'Barbados', 'Caribbean', 'North America'),
(6, 'Belgium', 'Western Europe', 'Europe'),
(7, 'Belize', 'Central America', 'North America'),
(8, 'Botswana', 'Sub-Saharan Africa', 'Africa'),
(9, 'Brunei', 'South East Asia', 'Asia'),
(10, 'Bulgaria', 'Eastern Europe', 'Europe'),
(11, 'Canada', 'North America', 'North America'),
(12, 'Costa Rica', 'Central America', 'North America'),
(13, 'Croatia', 'Eastern Europe', 'Europe'),
(14, 'Cyprus', 'Western Europe', 'Europe'),
(15, 'Czech Republic', 'Eastern Europe', 'Europe'),
(16, 'Denmark', 'Western Europe', 'Europe'),
(17, 'Dominican Republic', 'Caribbean', 'North America'),
(18, 'Egypt', 'North Africa', 'Africa'),
(19, 'Ethiopia', 'Sub-Saharan Africa', 'Africa'),
(20, 'Fiji', 'Pacific', 'Oceania'),
(21, 'Finland', 'Western Europe', 'Europe'),
(22, 'France', 'Western Europe', 'Europe'),
(23, 'Germany', 'Western Europe', 'Europe'),
(24, 'Ghana', 'Sub-Saharan Africa', 'Africa'),
(25, 'Greece', 'Western Europe', 'Europe'),
(26, 'Grenada', 'Caribbean', 'North America'),
(27, 'Hungary', 'Eastern Europe', 'Europe'),
(28, 'Iceland', 'Western Europe', 'Europe'),
(29, 'India', 'Indian Subcontinent', 'Asia'),
(30, 'Indonesia', 'South East Asia', 'Asia'),
(31, 'Ireland', 'Western Europe', 'Europe'),
(32, 'Israel', 'Middle East', 'Asia'),
(33, 'Italy', 'Western Europe', 'Europe'),
(34, 'Kenya', 'Sub-Saharan Africa', 'Africa'),
(35, 'Latvia', 'Eastern Europe', 'Europe'),
(36, 'Luxembourg', 'Western Europe', 'Europe'),
(37, 'Madagascar', 'Indian Ocean', 'Africa'),
(38, 'Malawi', 'Sub-Saharan Africa', 'Africa'),
(39, 'Malaysia', 'South East Asia', 'Asia'),
(40, 'Maldives', 'Indian Ocean', 'Asia'),
(41, 'Malta', 'Western Europe', 'Europe'),
(42, 'Mauritius', 'Indian Ocean', 'Africa'),
(43, 'Monaco', 'Western Europe', 'Europe'),
(44, 'Morocco', 'North Africa', 'Africa'),
(45, 'Mozambique', 'Sub-Saharan Africa', 'Africa'),
(46, 'Namibia', 'Sub-Saharan Africa', 'Africa'),
(47, 'Nepal', 'Indian Subcontinent', 'Asia'),
(48, 'Netherlands', 'Western Europe', 'Europe'),
(49, 'New Zealand', 'Pacific', 'Oceania'),
(50, 'Norway', 'Western Europe', 'Europe'),
(51, 'Philippines', 'South East Asia', 'Asia'),
(52, 'Poland', 'Eastern Europe', 'Europe'),
(53, 'Portugal', 'Western Europe', 'Europe'),
(54, 'Qatar', 'Middle East', 'Asia'),
(55, 'Russian Federation', 'Eastern Europe', 'Asia'),
(56, 'Rwanda', 'Sub-Saharan Africa', 'Africa'),
(57, 'Seychelles', 'Indian Ocean', 'Africa'),
(58, 'Singapore', 'South East Asia', 'Asia'),
(59, 'Slovakia', 'Eastern Europe', 'Europe'),
(60, 'Slovenia', 'Eastern Europe', 'Europe'),
(61, 'South Africa', 'Sub-Saharan Africa', 'Africa'),
(62, 'Spain', 'Western Europe', 'Europe'),
(63, 'Sri Lanka', 'Indian Subcontinent', 'Asia'),
(64, 'Sweden', 'Western Europe', 'Europe'),
(65, 'Switzerland', 'Western Europe', 'Europe'),
(66, 'Tanzania', 'Sub-Saharan Africa', 'Africa'),
(67, 'Thailand', 'South East Asia', 'Asia'),
(68, 'Tunisia', 'North Africa', 'Africa'),
(69, 'Turkey', 'Middle East', 'Europe'),
(70, 'United Arab Emirates', 'Middle East', 'Asia'),
(71, 'United Kingdom', 'Western Europe', 'Europe'),
(72, 'United States', 'North America', 'North America'),
(73, 'Vietnam', 'South East Asia', 'Asia'),
(74, 'Zambia', 'Sub-Saharan Africa', 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `country_region`
--

CREATE TABLE IF NOT EXISTS `country_region` (
  `country_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`country_id`,`region_id`),
  KEY `region` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_region`
--

INSERT INTO `country_region` (`country_id`, `region_id`) VALUES
(22, 1),
(22, 2),
(22, 3),
(71, 4),
(71, 5),
(71, 6),
(71, 7),
(71, 8),
(71, 9),
(71, 10),
(71, 11),
(72, 12),
(72, 13),
(72, 14);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'North'),
(2, 'South'),
(3, 'Alps'),
(4, 'Wales'),
(5, 'Northern Ireland'),
(6, 'Scotland'),
(7, 'North East England'),
(8, 'North West England'),
(9, 'South East England'),
(10, 'South West England'),
(11, 'Midlands'),
(12, 'East Coast'),
(13, 'Central'),
(14, 'West Coast');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `header` text NOT NULL,
  `footer` text NOT NULL,
  `recipient` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `header`, `footer`, `recipient`) VALUES
(1, 'contact', 'HEADER TEXTs', 'FOOTER TEXT', 'jack@mightysquid.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `country_region`
--
ALTER TABLE `country_region`
  ADD CONSTRAINT `region` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
