-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2013 at 04:06 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `avalonrob`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) unsigned NOT NULL,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `page_id`, `name`) VALUES
(1, 82, 'home nugget area'),
(2, 79, 'nugget area'),
(3, 78, 'nugget area'),
(4, 95, 'nugget area'),
(5, 94, 'nugget area'),
(6, 92, 'nugget area'),
(7, 91, 'nugget area'),
(8, 90, 'nugget area'),
(9, 97, 'nugget area'),
(10, 98, 'nugget area'),
(11, 90, 'nugget 1'),
(12, 90, 'nugget 2'),
(13, 90, 'nugget 3'),
(14, 91, 'nugget 1'),
(15, 91, 'nugget 2'),
(16, 91, 'nugget 3'),
(17, 94, 'nugget 1'),
(18, 94, 'nugget 2'),
(19, 94, 'nugget 3'),
(20, 95, 'nugget 1'),
(21, 95, 'nugget 2'),
(22, 95, 'nugget 3'),
(23, 100, 'nugget 1'),
(24, 100, 'nugget 2'),
(25, 100, 'nugget 3'),
(26, 97, 'nugget 1'),
(27, 97, 'nugget 2'),
(28, 97, 'nugget 3'),
(29, 101, 'nugget 1'),
(30, 101, 'nugget 2'),
(31, 101, 'nugget 3'),
(32, 100, 'nugget area'),
(33, 101, 'nugget area'),
(34, 82, 'nugget area'),
(35, 102, 'nugget area'),
(36, 96, 'nugget area'),
(37, 104, 'nugget area'),
(38, 103, 'nugget area');

-- --------------------------------------------------------

--
-- Table structure for table `area_block`
--

CREATE TABLE IF NOT EXISTS `area_block` (
  `area_id` int(11) unsigned NOT NULL,
  `block_id` int(11) unsigned NOT NULL,
  KEY `area_id` (`area_id`) USING BTREE,
  KEY `block_id` (`block_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_block`
--

INSERT INTO `area_block` (`area_id`, `block_id`) VALUES
(1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `scope` enum('site','section','page') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'page',
  `page_id` int(11) unsigned DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_active` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`) USING BTREE,
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=137 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `name`, `scope`, `page_id`, `date_created`, `date_updated`, `date_active`, `date_deleted`) VALUES
(1, 'test text', 'page', 82, '2013-09-17 12:43:44', NULL, NULL, NULL),
(2, 'test text block', 'page', 82, '2013-09-17 12:43:44', NULL, NULL, NULL),
(3, 'test heading', 'page', 82, '2013-09-17 12:43:44', NULL, NULL, NULL),
(4, 'test text block 2', 'page', 82, '2013-09-17 12:43:44', NULL, NULL, NULL),
(5, 'test image block', 'page', 82, '2013-09-17 12:43:44', NULL, NULL, NULL),
(7, 'page text', 'page', NULL, '2013-09-17 12:44:11', NULL, NULL, NULL),
(12, 'blog item 1', 'section', NULL, '2013-09-17 16:17:21', NULL, NULL, NULL),
(13, 'blog item 2', 'section', NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(14, 'blog item 3', 'section', NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(15, 'page text', 'page', NULL, '2013-09-25 10:18:49', NULL, NULL, NULL),
(41, 'test nugget block', 'page', 82, '2013-09-26 12:04:31', NULL, NULL, NULL),
(42, 'nugget-support', 'page', 82, '2013-10-01 12:10:54', NULL, NULL, NULL),
(43, 'main content area', 'page', NULL, '2013-10-01 12:23:21', NULL, NULL, NULL),
(44, 'nugget-2col', 'page', 82, '2013-10-01 13:16:35', NULL, NULL, NULL),
(45, 'message-from-liam-image', 'page', 82, '2013-10-01 13:16:35', NULL, NULL, NULL),
(46, 'message-from-liam-heading', 'page', 82, '2013-10-01 13:16:35', NULL, NULL, NULL),
(47, 'message-from-liam-text', 'page', 82, '2013-10-01 13:16:35', NULL, NULL, NULL),
(48, 'message-from-liam-more-link', 'page', 82, '2013-10-01 13:16:35', NULL, NULL, NULL),
(49, 'main content area', 'page', NULL, '2013-10-01 13:29:57', NULL, NULL, NULL),
(50, 'holidays-carousel item', 'section', NULL, '2013-10-01 14:03:41', NULL, NULL, NULL),
(51, 'holidays-carousel item', 'section', NULL, '2013-10-01 14:04:51', NULL, NULL, NULL),
(52, 'video-thumbnail', 'page', 82, '2013-10-01 14:37:04', NULL, NULL, NULL),
(53, 'main content area', 'page', 95, '2013-10-02 16:22:02', NULL, NULL, NULL),
(54, 'main content area', 'page', 94, '2013-10-02 16:22:04', NULL, NULL, NULL),
(55, 'main content area', 'page', 92, '2013-10-02 16:22:06', NULL, NULL, NULL),
(56, 'main content area', 'page', 91, '2013-10-02 16:22:07', NULL, NULL, NULL),
(57, 'main content area', 'page', NULL, '2013-10-02 16:40:33', NULL, NULL, NULL),
(58, 'blog item', 'section', NULL, '2013-10-03 17:29:30', NULL, NULL, NULL),
(63, 'properties item', 'section', NULL, '2013-10-16 15:06:16', NULL, NULL, NULL),
(64, 'holidays item', 'section', NULL, '2013-10-16 15:06:54', NULL, NULL, NULL),
(65, 'properties item', 'section', NULL, '2013-10-16 16:02:47', NULL, NULL, NULL),
(66, 'holidays item', 'section', NULL, '2013-10-16 16:07:01', NULL, NULL, NULL),
(67, 'properties item', 'section', NULL, '2013-10-16 16:22:09', NULL, NULL, NULL),
(68, 'properties item', 'section', NULL, '2013-10-16 16:25:12', NULL, NULL, NULL),
(69, 'holidays item', 'section', NULL, '2013-10-16 16:28:32', NULL, NULL, NULL),
(70, 'holidays item', 'section', NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(71, 'properties item', 'section', NULL, '2013-10-16 20:41:11', NULL, NULL, NULL),
(72, 'holidays item', 'section', NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(73, 'news item', 'section', NULL, '2013-10-17 09:10:51', NULL, NULL, NULL),
(74, 'news item', 'section', NULL, '2013-10-17 10:14:31', NULL, NULL, NULL),
(75, 'main content area', 'page', 97, '2013-10-17 12:51:11', NULL, NULL, NULL),
(76, 'main content area', 'page', 98, '2013-10-17 12:56:55', NULL, NULL, NULL),
(77, 'main content area', 'page', NULL, '2013-10-17 16:41:08', NULL, NULL, NULL),
(78, 'main content area', 'page', NULL, '2013-10-17 16:58:50', NULL, NULL, NULL),
(79, 'main content area', 'page', 102, '2013-10-17 17:57:18', NULL, NULL, NULL),
(80, 'holidays item', 'section', NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(81, 'main content area', 'page', 104, '2013-10-18 10:49:56', NULL, NULL, NULL),
(82, 'page heading', 'page', 95, '2013-10-31 20:44:41', NULL, NULL, NULL),
(83, 'page heading', 'page', 94, '2013-10-31 20:44:46', NULL, NULL, NULL),
(84, 'page heading', 'page', 91, '2013-10-31 20:44:54', NULL, NULL, NULL),
(85, 'page heading', 'page', 102, '2013-10-31 20:45:02', NULL, NULL, NULL),
(86, 'holidays item', 'section', NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(87, 'properties item', 'section', NULL, '2013-10-31 21:09:19', NULL, NULL, NULL),
(88, 'holidays item', 'section', NULL, '2013-10-31 21:38:25', NULL, NULL, NULL),
(89, 'page heading', 'page', 104, '2013-10-31 22:06:06', NULL, NULL, NULL),
(90, 'nugget1', 'page', 82, '2013-11-05 16:14:02', NULL, NULL, NULL),
(91, 'nugget2', 'page', 82, '2013-11-05 16:14:02', NULL, NULL, NULL),
(92, 'nugget3', 'page', 82, '2013-11-05 16:14:02', NULL, NULL, NULL),
(93, 'nugget4', 'page', 82, '2013-11-05 16:14:02', NULL, NULL, NULL),
(94, 'our partners', 'page', 82, '2013-11-05 16:14:02', NULL, NULL, NULL),
(95, 'Footer Heading 1', 'page', 82, '2013-11-05 16:14:02', NULL, NULL, NULL),
(96, 'Footer Heading 2', 'page', 82, '2013-11-05 16:14:02', NULL, NULL, NULL),
(97, 'Footer Heading 3', 'page', 82, '2013-11-05 16:14:03', NULL, NULL, NULL),
(98, 'Footer Heading 4', 'page', 82, '2013-11-05 16:14:03', NULL, NULL, NULL),
(99, 'home-carousel item', 'section', NULL, '2013-11-06 11:53:59', NULL, NULL, NULL),
(100, 'nugget2', 'page', 102, '2013-11-06 13:13:55', NULL, NULL, NULL),
(101, 'Footer Heading 1', 'page', 102, '2013-11-06 13:13:55', NULL, NULL, NULL),
(102, 'Footer Heading 2', 'page', 102, '2013-11-06 13:13:55', NULL, NULL, NULL),
(103, 'Footer Heading 3', 'page', 102, '2013-11-06 13:13:55', NULL, NULL, NULL),
(104, 'Footer Heading 4', 'page', 102, '2013-11-06 13:13:55', NULL, NULL, NULL),
(105, 'home-carousel item', 'section', NULL, '2013-11-06 15:44:35', NULL, NULL, NULL),
(106, 'page heading', 'page', 103, '2013-11-06 16:14:55', NULL, NULL, NULL),
(107, 'main content area', 'page', 103, '2013-11-06 16:14:55', NULL, NULL, NULL),
(108, 'nugget2', 'page', 103, '2013-11-06 16:14:55', NULL, NULL, NULL),
(109, 'Footer Heading 1', 'page', 103, '2013-11-06 16:14:55', NULL, NULL, NULL),
(110, 'Footer Heading 2', 'page', 103, '2013-11-06 16:14:55', NULL, NULL, NULL),
(111, 'Footer Heading 3', 'page', 103, '2013-11-06 16:14:55', NULL, NULL, NULL),
(112, 'Footer Heading 4', 'page', 103, '2013-11-06 16:14:55', NULL, NULL, NULL),
(113, 'nugget', 'page', 103, '2013-11-06 16:31:22', NULL, NULL, NULL),
(114, 'nugget', 'page', 102, '2013-11-06 16:32:08', NULL, NULL, NULL),
(115, 'Footer Heading 1', 'page', 92, '2013-11-06 16:32:25', NULL, NULL, NULL),
(116, 'Footer Heading 2', 'page', 92, '2013-11-06 16:32:25', NULL, NULL, NULL),
(117, 'Footer Heading 3', 'page', 92, '2013-11-06 16:32:25', NULL, NULL, NULL),
(118, 'Footer Heading 4', 'page', 92, '2013-11-06 16:32:25', NULL, NULL, NULL),
(119, 'page heading', 'page', 92, '2013-11-06 16:48:42', NULL, NULL, NULL),
(120, 'nugget', 'page', 92, '2013-11-06 16:48:42', NULL, NULL, NULL),
(121, 'nugget', 'page', 104, '2013-11-07 09:44:36', NULL, NULL, NULL),
(122, 'Footer Heading 1', 'page', 104, '2013-11-07 09:44:36', NULL, NULL, NULL),
(123, 'Footer Heading 2', 'page', 104, '2013-11-07 09:44:36', NULL, NULL, NULL),
(124, 'Footer Heading 3', 'page', 104, '2013-11-07 09:44:36', NULL, NULL, NULL),
(125, 'Footer Heading 4', 'page', 104, '2013-11-07 09:44:36', NULL, NULL, NULL),
(126, 'Head office contact details', 'page', 104, '2013-11-07 12:43:45', NULL, NULL, NULL),
(127, 'Head office address', 'page', 104, '2013-11-07 12:43:45', NULL, NULL, NULL),
(128, 'Mendip office contact details', 'page', 104, '2013-11-07 12:43:45', NULL, NULL, NULL),
(129, 'Mendip office address', 'page', 104, '2013-11-07 12:44:37', NULL, NULL, NULL),
(130, 'picture nugget', 'page', 102, '2013-11-07 15:32:32', NULL, NULL, NULL),
(131, 'Footer Heading 1', 'site', 102, '2013-11-07 15:44:09', NULL, NULL, NULL),
(132, 'Footer Heading 1', 'site', 104, '2013-11-07 15:44:38', NULL, NULL, NULL),
(133, 'Footer Heading 1', 'site', 92, '2013-11-07 15:44:44', NULL, NULL, NULL),
(134, 'picture nugget', 'page', 103, '2013-11-07 16:24:28', NULL, NULL, NULL),
(135, 'Footer Heading 1', 'site', 103, '2013-11-07 16:24:28', NULL, NULL, NULL),
(136, 'Footer Heading 1', 'site', 82, '2013-11-07 16:59:13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `string_value` text COLLATE utf8_unicode_ci,
  `date_value` datetime DEFAULT NULL,
  `boolean_value` tinyint(1) DEFAULT NULL,
  `file_value` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_active` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `block_id` (`block_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=650 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`, `block_id`, `type_id`, `string_value`, `date_value`, `boolean_value`, `file_value`, `date_created`, `date_updated`, `date_active`, `date_deleted`) VALUES
(1, 'text', 1, 1, 'Main Heading', NULL, NULL, NULL, '2013-09-17 12:43:44', '2013-09-25 16:56:22', NULL, NULL),
(2, 'text', 2, 2, '<b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit. Cras nec lacinia urna. Etiam convallis diam eu neque placerat aliquam. Proin volutpat erat sed leo dignissim, sit amet eleifend nulla congue. Proin elementum, est sit amet fringilla tincidunt, odio nisi molestie nulla, id lobortis neque nisi sed est. Etiam sagittis nisl quam, a suscipit augue varius id. Curabitur a nisl laoreet, ultrices justo et, iaculis sapien. Aenean placerat magna sit amet purus lobortis feugiat. Nunc sapien nunc, porta sit amet porttitor eu, congue sit amet lacus. Aliquam ultrices placerat turpis quis sodales. Pellentesque eu congue est.', NULL, NULL, NULL, '2013-09-17 12:43:44', '2013-09-17 19:47:01', NULL, NULL),
(3, 'text', 3, 1, 'Sub Heading', NULL, NULL, NULL, '2013-09-17 12:43:44', '2013-09-19 22:17:51', NULL, NULL),
(4, 'text', 4, 6, 'Duis placerat, justo a facilisis rhoncus, orci diam scelerisque elit, ut euismod magna ante ut odio. Integer semper mauris vitae nisi tempus, nec iaculis magna congue. Cras porttitor tristique vulputate. Donec rhoncus lobortis lorem sit amet malesuada. Ut in auctor justo. Aliquam sed tincidunt massa. Maecenas vel neque consectetur, porta ante nec, auctor nibh. Vestibulum iaculis convallis velit, sed elementum sapien euismod ac. Mauris fringilla non elit vitae semper.', NULL, NULL, NULL, '2013-09-17 12:43:44', '2013-09-17 13:11:52', NULL, NULL),
(5, 'image', 5, 3, NULL, NULL, NULL, '/assets/source/carbon sync dashboard v2.jpg', '2013-09-17 12:43:44', '2013-09-27 11:29:37', NULL, NULL),
(6, 'alt', 5, 1, 'Test Img', NULL, NULL, NULL, '2013-09-17 12:43:44', '2013-09-27 11:29:37', NULL, NULL),
(7, 'title', 5, 1, 'This is a test image block.', NULL, NULL, NULL, '2013-09-17 12:43:44', '2013-09-27 11:29:37', NULL, NULL),
(17, 'text', 7, 1, NULL, NULL, NULL, NULL, '2013-09-17 12:44:11', NULL, NULL, NULL),
(18, 'title', 12, 1, 'Aenean Volutpat...', NULL, NULL, NULL, '2013-09-17 16:17:21', '2013-09-26 15:30:00', NULL, NULL),
(19, 'text', 12, 2, 'Aenean volutpat tempor sodales. Nam vestibulum, lectus ut pellentesque sagittis, quam erat tincidunt ligula, vel tristique augue dolor sed nulla. Aenean eget ultrices turpis. Pellentesque sit amet ante egestas, pharetra ipsum ac, commodo nulla. Nullam tortor dolor, porttitor nec porta ut, sodales ac magna. Mauris blandit in sem vitae placerat. Curabitur eget tincidunt enim. Donec at pretium eros. Integer sagittis magna ac tempus ultrices. Suspendisse potenti. Morbi ac enim vel ligula tempus accumsan in dignissim libero. Nam vulputate hendrerit lacus vitae luctus.', NULL, NULL, NULL, '2013-09-17 16:17:21', '2013-09-26 15:30:00', NULL, NULL),
(20, 'image', 12, 3, NULL, NULL, NULL, '0', '2013-09-17 16:17:21', '2013-09-26 15:30:00', NULL, NULL),
(21, 'image_alt', 12, 1, '', NULL, NULL, NULL, '2013-09-17 16:17:21', '2013-09-26 15:30:00', NULL, NULL),
(22, 'image_title', 12, 1, '', NULL, NULL, NULL, '2013-09-17 16:17:21', '2013-09-26 15:30:00', NULL, NULL),
(23, 'link_text', 12, 1, 'Read More...', NULL, NULL, NULL, '2013-09-17 16:17:21', '2013-09-26 15:30:00', NULL, NULL),
(24, 'author', 12, 1, 'Matt Biddle', NULL, NULL, NULL, '2013-09-17 16:17:21', '2013-09-26 15:30:00', NULL, NULL),
(25, 'date_published', 12, 4, NULL, '2013-09-18 11:43:00', NULL, NULL, '2013-09-17 16:17:21', '2013-09-26 15:30:00', NULL, NULL),
(26, 'title', 13, 1, 'Blog item 2', NULL, NULL, NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(27, 'text', 13, 2, 'Nunc condimentum dictum libero ut congue. Maecenas mi nisi, ullamcorper vel mauris eget, vestibulum rhoncus turpis. In rhoncus id mi rhoncus blandit. Curabitur magna dolor, cursus lobortis lacus eget, fermentum rhoncus est. Etiam tincidunt turpis placerat metus mattis, in dapibus ligula mollis. Fusce dignissim porta enim eget sagittis. Nullam cursus nec odio quis porttitor. Morbi id ipsum scelerisque, fermentum nulla nec, vulputate felis. Suspendisse bibendum et sapien ut mattis. Maecenas mollis ligula eget mi sagittis tempus. Mauris auctor eu nisi id adipiscing. Phasellus dignissim est arcu, mattis imperdiet velit rutrum at. Nunc felis augue, hendrerit eu mattis ut, facilisis vitae elit. Nam fermentum velit ac augue feugiat, a mollis purus cursus.', NULL, NULL, NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(28, 'image', 13, 3, NULL, NULL, NULL, NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(29, 'image_alt', 13, 1, NULL, NULL, NULL, NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(30, 'image_title', 13, 1, NULL, NULL, NULL, NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(31, 'link_text', 13, 1, 'Read More...', NULL, NULL, NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(32, 'author', 13, 1, 'Matt Biddle', NULL, NULL, NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(33, 'date_published', 13, 4, NULL, '2013-09-18 11:43:00', NULL, NULL, '2013-09-17 16:28:07', NULL, NULL, NULL),
(34, 'title', 14, 1, 'Blog item 3', NULL, NULL, NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(35, 'text', 14, 2, 'Donec a vulputate lacus. Cras pretium fringilla mi at scelerisque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sem est, tristique eu facilisis sit amet, cursus et est. Maecenas venenatis, tellus placerat semper sagittis, mauris odio facilisis odio, commodo bibendum metus risus sit amet mi. Phasellus placerat dolor vitae lectus elementum luctus. Sed felis metus, vehicula in felis id, fringilla semper turpis. Morbi ut libero dictum, aliquet lectus aliquet, dictum est. Pellentesque enim elit, vehicula eget volutpat vel, vehicula et est. Vestibulum in eros orci. Curabitur ligula odio, dignissim ut accumsan et, ullamcorper eu enim. Vivamus ac lectus nulla. Nullam et egestas quam, at pharetra erat. Aenean faucibus congue scelerisque.', NULL, NULL, NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(36, 'image', 14, 3, NULL, NULL, NULL, NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(37, 'image_alt', 14, 1, NULL, NULL, NULL, NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(38, 'image_title', 14, 1, NULL, NULL, NULL, NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(39, 'link_text', 14, 1, 'Read More...', NULL, NULL, NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(40, 'author', 14, 1, 'Matt Biddle', NULL, NULL, NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(41, 'date_published', 14, 4, NULL, '2013-09-18 11:43:00', NULL, NULL, '2013-09-17 16:33:01', NULL, NULL, NULL),
(42, 'text', 15, 1, NULL, NULL, NULL, NULL, '2013-09-25 10:18:49', NULL, NULL, NULL),
(86, 'title', 38, 1, 'Hmmd', NULL, NULL, NULL, '2013-09-25 16:24:37', '2013-09-30 14:11:40', NULL, NULL),
(87, 'text', 38, 6, '', NULL, NULL, NULL, '2013-09-25 16:24:37', '2013-09-30 14:11:40', NULL, NULL),
(88, 'image_src', 38, 3, NULL, NULL, NULL, '', '2013-09-25 16:24:37', '2013-09-30 14:11:40', NULL, NULL),
(89, 'image_alt', 38, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', '2013-09-30 14:11:40', NULL, NULL),
(90, 'link_href', 38, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', '2013-09-30 14:11:40', NULL, NULL),
(91, 'link_text', 38, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', '2013-09-30 14:11:40', NULL, NULL),
(92, 'link_title', 38, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', '2013-09-30 14:11:40', NULL, NULL),
(93, 'title', 39, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(94, 'text', 39, 6, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(95, 'image_src', 39, 3, NULL, NULL, NULL, '', '2013-09-25 16:24:37', NULL, NULL, NULL),
(96, 'image_alt', 39, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(97, 'link_href', 39, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(98, 'link_text', 39, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(99, 'link_title', 39, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(100, 'title', 40, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(101, 'text', 40, 6, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(102, 'image_src', 40, 3, NULL, NULL, NULL, '', '2013-09-25 16:24:37', NULL, NULL, NULL),
(103, 'image_alt', 40, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(104, 'link_href', 40, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(105, 'link_text', 40, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(106, 'link_title', 40, 1, '', NULL, NULL, NULL, '2013-09-25 16:24:37', NULL, NULL, NULL),
(107, 'title', 41, 1, '', NULL, NULL, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:05', NULL, NULL),
(108, 'title_is_link', 41, 5, NULL, NULL, 1, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:05', NULL, NULL),
(109, 'text', 41, 6, 'Vestibulum lacinia eu risus eget facilisis. Duis ultrices, urna et tempus rhoncus, eros mi pretium odio, ac bibendum neque mauris sit amet justo. Nam congue augue risus, non vulputate leo placerat sit amet. Mauris erat libero, sodales sit amet sem quis, sollicitudin imperdiet enim. Suspendisse vel mi ut nisl semper iaculis. Etiam eu sagittis turpis. In tincidunt ipsum id dui dictum sollicitudin. Mauris accumsan non risus in facilisis. Nunc eget sollicitudin dolor.', NULL, NULL, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:05', NULL, NULL),
(110, 'href', 41, 1, '#', NULL, NULL, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:05', NULL, NULL),
(111, 'target', 41, 5, NULL, NULL, 0, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:06', NULL, NULL),
(112, 'link_in_body', 41, 5, NULL, NULL, 1, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:06', NULL, NULL),
(113, 'link_title', 41, 1, 'Link Tool Tip', NULL, NULL, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:06', NULL, NULL),
(114, 'link_text', 41, 1, 'A Link', NULL, NULL, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:06', NULL, NULL),
(115, 'image_src', 41, 3, NULL, NULL, NULL, '/assets/source/3.jpg', '2013-09-26 12:04:31', '2013-09-27 11:31:06', NULL, NULL),
(116, 'image_alt', 41, 1, 'a test image', NULL, NULL, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:06', NULL, NULL),
(117, 'image_title', 41, 1, 'Image Tool Tip', NULL, NULL, NULL, '2013-09-26 12:04:31', '2013-09-27 11:31:06', NULL, NULL),
(118, 'title', 42, 1, 'Support Us', NULL, NULL, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(119, 'title_is_link', 42, 5, NULL, NULL, 0, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(120, 'text', 42, 6, 'We are very pleased that you would like to support Give Us Time. please click below to visit our Just Giving Page.', NULL, NULL, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(121, 'href', 42, 1, '/donate/', NULL, NULL, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(122, 'target', 42, 5, NULL, NULL, 0, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(123, 'link_in_body', 42, 5, NULL, NULL, 1, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(124, 'link_title', 42, 1, 'Donate money', NULL, NULL, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(125, 'link_text', 42, 1, 'Donate money', NULL, NULL, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(126, 'image_src', 42, 3, NULL, NULL, NULL, '/assets/source/loading-gif.gif', '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(127, 'image_alt', 42, 1, '', NULL, NULL, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(128, 'image_title', 42, 1, '', NULL, NULL, NULL, '2013-10-01 12:10:54', '2013-10-17 19:26:59', NULL, NULL),
(129, 'text', 43, 2, '', NULL, NULL, NULL, '2013-10-01 12:23:21', '2013-10-01 12:24:01', NULL, NULL),
(130, 'title', 44, 1, 'Welcome to Give Us Time', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(131, 'title_is_link', 44, 5, NULL, NULL, 0, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(132, 'text', 44, 6, 'Give Us Time provides holidays to help families adjust to life after combat. This is possible thanks to generously donated week-long holidays in second homes, holiday homes and timeshares across the UK and beyond.', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(133, 'href', 44, 1, '/about-us', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(134, 'target', 44, 5, NULL, NULL, 0, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(135, 'link_in_body', 44, 5, NULL, NULL, 1, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(136, 'link_title', 44, 1, 'More about us', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(137, 'link_text', 44, 1, 'More about us', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(138, 'image_src', 44, 3, NULL, NULL, NULL, '/assets/source/nugget-family.jpg', '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(139, 'image_alt', 44, 1, '', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(140, 'image_title', 44, 1, '', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-17 19:42:49', NULL, NULL),
(141, 'image', 45, 3, NULL, NULL, NULL, '/assets/source/liam-fox.jpg', '2013-10-01 13:16:35', '2013-10-02 13:00:58', NULL, NULL),
(142, 'alt', 45, 1, 'Liam Fox', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-02 13:00:58', NULL, NULL),
(143, 'title', 45, 1, 'Liam Fox', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-02 13:00:58', NULL, NULL),
(144, 'text', 46, 1, 'A message from Liam Fox', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-01 13:17:54', NULL, NULL),
(145, 'text', 47, 2, '<p><em>During my time as Secretary of State for Defence I was extremely heartened to see how we improved the treatment of those who had been physically injured in combat. Medical improvements in prosthetics, better physiotherapy and improved social attitudes all contributed to a better chance of rehabilitation. In terms of psychological trauma, the invisible scars of war, we are making progress though perhaps at a slower rate.</em></p>\r\n<p><em>One of the areas where I think there remains room for improvement is the integration of service families into this equation. As a doctor working with the Armed Forces I learned the importance of seeing our personnel not as isolated individuals but as members of a wider family and community dynamic..</em></p>\r\n<p><img src="assets/source/liam-signature.png" alt="" width="154" height="87" /></p>', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-16 16:52:39', NULL, NULL),
(146, 'href', 48, 1, '/message-from-liam/', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-16 16:52:27', NULL, NULL),
(147, 'title', 48, 1, 'Read more', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-16 16:52:27', NULL, NULL),
(148, 'text', 48, 1, 'Read more', NULL, NULL, NULL, '2013-10-01 13:16:35', '2013-10-16 16:52:27', NULL, NULL),
(149, 'target', 48, 5, NULL, NULL, 0, NULL, '2013-10-01 13:16:35', '2013-10-16 16:52:27', NULL, NULL),
(150, 'text', 49, 2, '<p>Test content</p>', NULL, NULL, NULL, '2013-10-01 13:29:57', '2013-10-02 10:48:08', NULL, NULL),
(151, 'Image', 50, 3, NULL, NULL, NULL, '/assets/source/holiday stories/phots2-203-comp.jpg', '2013-10-01 14:03:41', '2013-10-17 19:41:32', NULL, NULL),
(152, 'Image Alternative Text', 50, 1, 'Holiday photo', NULL, NULL, NULL, '2013-10-01 14:03:41', '2013-10-17 19:41:32', NULL, NULL),
(153, 'Caption', 50, 6, 'Sergant Mike Richey & Family Enjoyed a week in Madera in July', NULL, NULL, NULL, '2013-10-01 14:03:41', '2013-10-17 19:41:32', NULL, NULL),
(154, 'Image', 51, 3, NULL, NULL, NULL, '/assets/source/nugget-stories.jpg', '2013-10-01 14:04:51', '2013-10-02 13:00:12', NULL, NULL),
(155, 'Image Alternative Text', 51, 1, '', NULL, NULL, NULL, '2013-10-01 14:04:51', '2013-10-02 13:00:12', NULL, NULL),
(156, 'Caption', 51, 6, 'Caption text goes here.', NULL, NULL, NULL, '2013-10-01 14:04:51', '2013-10-02 13:00:12', NULL, NULL),
(157, 'image', 52, 3, NULL, NULL, NULL, '/assets/source/video.jpg', '2013-10-01 14:37:04', '2013-10-02 13:02:50', NULL, NULL),
(158, 'alt', 52, 1, '', NULL, NULL, NULL, '2013-10-01 14:37:04', '2013-10-02 13:02:50', NULL, NULL),
(159, 'title', 52, 1, 'Video title', NULL, NULL, NULL, '2013-10-01 14:37:04', '2013-10-02 13:02:50', NULL, NULL),
(160, 'text', 53, 2, '<p>Give Us Time is part of Afghan Heroes</p>\r\n<p>Agfhan Heroes</p>\r\n<p>Phone<br />0844 5766771</p>\r\n<p>Email<br />info@afghanheroes.org.uk</p>\r\n<p>Address<br />Afghan Heroes<br />Unit 1<br />Wayside, Evercreech<br />Shepton Mallet, Somerset BA4 6QW</p>\r\n<p>Registered Charity No: 1132340</p>', NULL, NULL, NULL, '2013-10-02 16:22:02', '2013-10-03 11:27:02', NULL, NULL),
(161, 'text', 54, 2, NULL, NULL, NULL, NULL, '2013-10-02 16:22:04', NULL, NULL, NULL),
(162, 'text', 55, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nisl dui. Quisque ullamcorper tempor purus quis dapibus. Morbi scelerisque eros quis elit aliquet suscipit. Nulla venenatis dictum ipsum id fringilla. Nulla facilisi. Integer risus sapien, fringilla eu magna vel, porttitor aliquam.</p>', NULL, NULL, NULL, '2013-10-02 16:22:06', '2013-11-06 17:04:34', NULL, NULL),
(163, 'text', 56, 2, '<p><strong><a href="#Q1">1) What does Give Us Time do?</a><br /></strong><strong><a href="#Q2">2) Am I eligible?</a><br /></strong><strong><a href="#Q3">3) Who can make a booking?</a><br /></strong><strong><a href="#Q4">4) What do I have to pay?</a><br /></strong><strong><a href="#Q5">5) Who can I take?</a>&nbsp;<br /></strong><strong><a href="#Q6">6) What if I change my mind after booking?&nbsp;</a><br /></strong><strong><a href="#Q7">7) Will you keep my information?</a>&nbsp;<br /></strong><strong><a href="#Q8">8) [Where are the properties]&nbsp;</a><br /></strong><strong><a href="#Q9">9) [How long can I stay?]&nbsp;</a><br /></strong><strong><a href="#Q10">10) [Who are the donors]?&nbsp;</a><br /></strong><strong><a href="#Q11">11) Is Give Us Time liable for any damages which occur during my holiday?&nbsp;</a><br /></strong><strong><a href="#Q12">12) Can I apply for help with the transport costs?</a></strong></p>\r\n<h2><strong><a id="Q1"></a>1) What does Give Us Time do? </strong></h2>\r\n<p>Give Us Time offers recently returned servicemen and women who have been to Afghanistan, or the families of servicemen and women who have died in Afghanistan the chance to get away to spend time with their friends and families. &nbsp;The holiday homes are provided by companies who own a holiday home and have donated some time in them to Give Us Time.</p>\r\n<h2><strong><a id="Q2"></a>2) Am I eligible? </strong></h2>\r\n<p>Applicants must either have served on active operations in Afghanistan within the last two years, or had a member of their family killed whilst on active operations in Afghanistan since the war began in 2001. <strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>\r\n<h2><strong><a id="Q3"></a>3) Who can make a booking? </strong></h2>\r\n<p>The person who registers and completes the Booking Form should be the person who is the current or retired, regular or reserve service person who has recently serviced on operations in Afghanistan, or a member of the immediate family or next of kin of the service person who has died on active service in Afghanistan.</p>\r\n<h2><strong><a id="Q4"></a>4) What do I have to pay? </strong></h2>\r\n<p>The holiday homes have been donated so you do not have to pay to stay in them. &nbsp;You will have to put down a deposit &pound;100 to cover any late cancellation, we ask that you provide the property owner with your credit card details or a cheque for the amount of the deposit. &nbsp;They will only debit the amount from your card if necessary. &nbsp;You will also have to pay for travel to and from the holiday home. &nbsp;You may also have to pay any additional charges which will be specified by the Donor.</p>\r\n<h2><strong><a id="Q5"></a>5) Who can I take? </strong></h2>\r\n<p>You are welcome to take whoever you like from your family. Please note that you are responsible for the booking and are therefore responsible for any damage to the Property.</p>\r\n<h2><strong><a id="Q6"></a>6) What if I change my mind after booking? </strong></h2>\r\n<p>When you submit an Booking Form for a property, Give Us Time will notify the property owner who will send you confirmation of the booking. &nbsp; You can cancel the booking at any time before 24 hours of the start of your stay in the holiday home without charge by giving notice to the owner. If you cancel the booking after 24 hours of the start of your booking or do not check in at the start of your booking without giving the required notice to the owner, the owner may deduct all or part of your deposit.<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>\r\n<h2><strong><a id="Q7"></a>7) Will you keep my information? </strong></h2>\r\n<p>Yes we will keep the details of your registration and bookings. &nbsp;We accept that there will be occasions when, for reasons of illness bereavement, or a call back to active duty at short notice, when you will not be able to use a confirmed booking. &nbsp;We ask that you let us know as soon as possible if you cannot use a property and the reasons for your cancellation. &nbsp;Please also note that if, having booked a property, you do not then use it on more than one occasion (and not for the reasons given above) we reserve the right to refuse any further applications for bookings from you. &nbsp;</p>\r\n<h2><strong><a id="Q8"></a>8) [Where are the properties] </strong></h2>\r\n<p>[●]</p>\r\n<p>&nbsp;</p>\r\n<h2><strong><a id="Q9"></a>9) [How long can I stay?] </strong></h2>\r\n<p>[●]</p>\r\n<p>&nbsp;</p>\r\n<h2><strong><a id="Q10"></a>10) [Who are the donors]? </strong></h2>\r\n<p>[Donor Parties]</p>\r\n<p>&nbsp;</p>\r\n<h2><strong><a id="Q11"></a>11) Is Give Us Time liable for any damages which occur during my holiday? </strong></h2>\r\n<p>Give Us Time can accept no liability for any loss or damage howsoever caused including but not limited to:</p>\r\n<ul>\r\n<li>The quality and fitness of the Property;</li>\r\n<li>Damage to your possessions during your stay; and</li>\r\n<li>Lost or stolen possessions during your stay.</li>\r\n</ul>\r\n<p>This does not exclude any liability arising from death or personal injury to persons caused by negligence on the part of Give Us Time, any liability arising as a result of fraud, or anything else which cannot be excluded or limited by relevant law.</p>\r\n<h2><strong><a id="Q12"></a>12) Can I apply for help with the transport costs? </strong></h2>\r\n<p>We only offer to subsidise travel payments in exceptional financial circumstances. &nbsp;If you would like to apply for a travel subsidy please fill out</p>\r\n<p>[●] form.</p>', NULL, NULL, NULL, '2013-10-02 16:22:07', '2013-10-03 11:23:19', NULL, NULL),
(164, 'text', 57, 2, '<p>During his time as Secretary of State for Defence, Dr Liam Fox MP came to realise that whilst the care for our injured and the bereaved has improved immeasurably over the last decade, there are still some major challenges faced by all servicemen and servicewomen, and their families, whenever they try to reintegrate after those long months apart.</p>\r\n<p>Thousands of soldiers, sailors, airmen and marines return from Afghanistan without a scratch but still find that the lives of their family have moved on without them whilst they&rsquo;ve been away. All too often, this feeling of being &ldquo;spare&rdquo; in the life they used to know, alongside the need to finally reflect on the triumphs and traumas of their operational tour, leads to deep emotion &ndash; and often anger &ndash; that gets in the way of reintegrating with their families.</p>\r\n<p>The power of a good holiday is immeasurable. For the parent left at home it is a break from the single-parenthood that they have coped with so stoically for the last six months. For service personnel, it&rsquo;s an opportunity to spend quality time with their families and to re-establish relationships in a neutral location. The family returns home having re-learnt to live together and reinvigorated after a very difficult time apart.</p>\r\n<p>More importantly still, the serviceman or woman has just put their life on the line defending our nation&rsquo;s interests and the family have been at home living in dread of a knock at the door that could bring heartbreaking news. They deserve a holiday!</p>\r\n<h2>How can I help?</h2>\r\n<p>If you own a timeshare, second home, hotel, apartment block, cruise ship, ski chalet or holiday home &ndash; no matter how big or small, near or far &ndash; we&rsquo;d love you to consider donating whatever spare capacity you have to Give Us Time. We&rsquo;ll make sure that your donation goes to a British soldier, sailor, airman or marine that has just returned from Afghanistan so that they can rehabilitate with their families after a long hard tour.</p>\r\n<p>This website is already set-up to take your donation so please Register online and donate your weeks of spare time.</p>\r\n<h2>I&rsquo;m serving in the Armed Forces, how can I apply for a holiday?</h2>\r\n<p>Registration for holidays will start in January 2013 with a pilot scheme running during the spring. The charity hopes to be fully operational by May 2013.</p>\r\n<h2>How does it work?</h2>\r\n<p>Give Us Time will allocate holidays to anyone currently serving in the regular or reserve armed forces who has served on operations in Afghanistan. Holidays will usually be accommodation only and you will normally be responsible for funding travel, food and activities whilst away. However, the charity hopes to raise funds to provide assistance with travel costs on a case by case basis.</p>\r\n<p>Once Registration opens, you&rsquo;ll be able to see what properties have been donated over the period you hope to go away and you&rsquo;ll be able to apply for that holiday. Holidays will then be allocated by the charity on a first come, first served basis other than for the most popular locations at the most popular times; when allocation will be by ballot.</p>', NULL, NULL, NULL, '2013-10-02 16:40:33', '2013-10-03 11:06:41', NULL, NULL),
(165, 'title', 58, 1, 'ian', NULL, NULL, NULL, '2013-10-03 17:29:30', NULL, NULL, NULL),
(166, 'text', 58, 2, '', NULL, NULL, NULL, '2013-10-03 17:29:30', NULL, NULL, NULL),
(167, 'image', 58, 3, NULL, NULL, NULL, '', '2013-10-03 17:29:30', NULL, NULL, NULL),
(168, 'image_alt', 58, 1, '', NULL, NULL, NULL, '2013-10-03 17:29:30', NULL, NULL, NULL),
(169, 'image_title', 58, 1, '', NULL, NULL, NULL, '2013-10-03 17:29:30', NULL, NULL, NULL),
(170, 'link_text', 58, 1, '', NULL, NULL, NULL, '2013-10-03 17:29:30', NULL, NULL, NULL),
(171, 'author', 58, 1, '', NULL, NULL, NULL, '2013-10-03 17:29:30', NULL, NULL, NULL),
(172, 'date_published', 58, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-03 17:29:30', NULL, NULL, NULL),
(173, 'title', 59, 1, 'Holly Towers', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:01', NULL, NULL),
(174, 'location', 59, 8, '2', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:01', NULL, NULL),
(175, 'type', 59, 8, '2', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:01', NULL, NULL),
(176, 'area', 59, 1, 'Bedminster', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:01', NULL, NULL),
(177, 'city', 59, 1, 'Bristol', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:01', NULL, NULL),
(178, 'county', 59, 1, 'Bristol', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(179, 'country', 59, 1, 'UK', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(180, 'description', 59, 6, 'This is a lovely skyline view condo in the heart of Bedminster, with stunning views of East Street', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(181, 'additional_info', 59, 6, '', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(182, 'facilities', 59, 6, '', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(183, 'accessibility', 59, 6, '', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(184, 'image', 59, 3, NULL, NULL, NULL, '', '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(185, 'welcome_pack', 59, 3, NULL, NULL, NULL, '', '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(186, 'extras', 59, 6, '', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(187, 'date', 59, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(188, 'live_on_site', 59, 5, NULL, NULL, 0, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(189, 'user_id', 59, 7, '31', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(190, 'slug', 59, 7, 'holly-towers', NULL, NULL, NULL, '2013-10-15 13:25:05', '2013-10-15 14:00:02', NULL, NULL),
(191, 'arrival_date', 60, 4, NULL, '2013-11-11 00:00:00', NULL, NULL, '2013-10-15 13:27:12', NULL, NULL, NULL),
(192, 'departure_date', 60, 4, NULL, '2013-11-22 00:00:00', NULL, NULL, '2013-10-15 13:27:12', NULL, NULL, NULL),
(193, 'type', 60, 8, '2', NULL, NULL, NULL, '2013-10-15 13:27:12', NULL, NULL, NULL),
(194, 'status', 60, 7, 'available', NULL, NULL, NULL, '2013-10-15 13:27:12', NULL, NULL, NULL),
(195, 'number_of_bedrooms', 60, 1, '2', NULL, NULL, NULL, '2013-10-15 13:27:12', NULL, NULL, NULL),
(196, 'sleeps_number', 60, 1, '2', NULL, NULL, NULL, '2013-10-15 13:27:12', NULL, NULL, NULL),
(197, 'property_id', 60, 7, '59', NULL, NULL, NULL, '2013-10-15 13:27:13', NULL, NULL, NULL),
(198, 'booked_by', 60, 7, '', NULL, NULL, NULL, '2013-10-15 13:27:13', NULL, NULL, NULL),
(199, 'title', 60, 7, '', NULL, NULL, NULL, '2013-10-15 13:27:13', NULL, NULL, NULL),
(200, 'slug', 60, 7, '', NULL, NULL, NULL, '2013-10-15 13:27:13', NULL, NULL, NULL),
(201, 'title', 61, 1, 'Test', NULL, NULL, NULL, '2013-10-16 12:56:11', '2013-10-16 13:37:42', NULL, NULL),
(202, 'location', 61, 8, '1', NULL, NULL, NULL, '2013-10-16 12:56:11', '2013-10-16 13:37:42', NULL, NULL),
(203, 'type', 61, 8, '1', NULL, NULL, NULL, '2013-10-16 12:56:11', '2013-10-16 13:37:42', NULL, NULL),
(204, 'area', 61, 1, 'Test', NULL, NULL, NULL, '2013-10-16 12:56:11', '2013-10-16 13:37:42', NULL, NULL),
(205, 'city', 61, 1, 'Bethlehem', NULL, NULL, NULL, '2013-10-16 12:56:11', '2013-10-16 13:37:42', NULL, NULL),
(206, 'county', 61, 1, 'Test', NULL, NULL, NULL, '2013-10-16 12:56:11', '2013-10-16 13:37:42', NULL, NULL),
(207, 'country', 61, 1, 'Test', NULL, NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:42', NULL, NULL),
(208, 'description', 61, 6, 'Test', NULL, NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:42', NULL, NULL),
(209, 'additional_info', 61, 6, 'Stable', NULL, NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:42', NULL, NULL),
(210, 'facilities', 61, 6, 'Wise men, mules', NULL, NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:42', NULL, NULL),
(211, 'accessibility', 61, 6, 'Camel ramp', NULL, NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:43', NULL, NULL),
(212, 'image', 61, 3, NULL, NULL, NULL, '', '2013-10-16 12:56:12', '2013-10-16 13:37:43', NULL, NULL),
(213, 'welcome_pack', 61, 3, NULL, NULL, NULL, '', '2013-10-16 12:56:12', '2013-10-16 13:37:43', NULL, NULL),
(214, 'extras', 61, 6, 'Test', NULL, NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:43', NULL, NULL),
(215, 'date', 61, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:43', NULL, NULL),
(216, 'live_on_site', 61, 5, NULL, NULL, 1, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:43', NULL, NULL),
(217, 'user_id', 61, 7, '37', NULL, NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:43', NULL, NULL),
(218, 'slug', 61, 7, 'test', NULL, NULL, NULL, '2013-10-16 12:56:12', '2013-10-16 13:37:43', NULL, NULL),
(219, 'arrival_date', 62, 4, NULL, '2011-11-11 00:00:00', NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(220, 'departure_date', 62, 4, NULL, '2011-11-11 00:00:00', NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(221, 'type', 62, 8, '1', NULL, NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(222, 'status', 62, 7, 'available', NULL, NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(223, 'number_of_bedrooms', 62, 1, '648', NULL, NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(224, 'sleeps_number', 62, 1, '2', NULL, NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(225, 'property_id', 62, 7, '61', NULL, NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(226, 'booked_by', 62, 7, '', NULL, NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(227, 'title', 62, 7, '', NULL, NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(228, 'slug', 62, 7, '', NULL, NULL, NULL, '2013-10-16 13:36:45', NULL, NULL, NULL),
(229, 'title', 63, 1, 'Property Test', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:31', NULL, NULL),
(230, 'location', 63, 8, '1', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:31', NULL, NULL),
(231, 'type', 63, 8, '1', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:31', NULL, NULL),
(232, 'area', 63, 1, 'Test', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:31', NULL, NULL),
(233, 'city', 63, 1, 'Bristol', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(234, 'county', 63, 1, 'North Somerset', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(235, 'country', 63, 1, '', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(236, 'description', 63, 6, 'Property description', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(237, 'additional_info', 63, 6, 'Additional Info goes here', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(238, 'disabled_access', 63, 5, NULL, NULL, 1, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(239, 'beach', 63, 5, NULL, NULL, 1, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(240, 'child_friendly', 63, 5, NULL, NULL, 0, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(241, 'cancellation_fee', 63, 5, NULL, NULL, 1, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(242, 'accessibility', 63, 6, '', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(243, 'image', 63, 3, NULL, NULL, NULL, '', '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(244, 'welcome_pack', 63, 3, NULL, NULL, NULL, '', '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(245, 'extras', 63, 6, '', NULL, NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(246, 'date', 63, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(247, 'live_on_site', 63, 5, NULL, NULL, 0, NULL, '2013-10-16 15:06:16', '2013-10-16 15:06:32', NULL, NULL),
(248, 'user_id', 63, 7, '33', NULL, NULL, NULL, '2013-10-16 15:06:17', '2013-10-16 15:06:32', NULL, NULL),
(249, 'slug', 63, 7, 'property-test', NULL, NULL, NULL, '2013-10-16 15:06:17', '2013-10-16 15:06:32', NULL, NULL),
(250, 'arrival_date', 64, 4, NULL, '2013-10-25 00:00:00', NULL, NULL, '2013-10-16 15:06:54', '2013-10-16 15:11:31', NULL, NULL),
(251, 'departure_date', 64, 4, NULL, '2013-10-30 00:00:00', NULL, NULL, '2013-10-16 15:06:54', '2013-10-16 15:11:31', NULL, NULL),
(252, 'type', 64, 8, '2', NULL, NULL, NULL, '2013-10-16 15:06:54', '2013-10-16 15:11:31', NULL, NULL),
(253, 'status', 64, 7, 'available', NULL, NULL, NULL, '2013-10-16 15:06:54', '2013-10-16 15:11:31', NULL, NULL),
(254, 'number_of_bedrooms', 64, 1, '4', NULL, NULL, NULL, '2013-10-16 15:06:54', '2013-10-16 15:11:31', NULL, NULL),
(255, 'sleeps_number', 64, 1, '5', NULL, NULL, NULL, '2013-10-16 15:06:54', '2013-10-16 15:11:31', NULL, NULL),
(256, 'property_id', 64, 7, '63', NULL, NULL, NULL, '2013-10-16 15:06:54', '2013-10-16 15:11:31', NULL, NULL),
(257, 'booked_by', 64, 7, '', NULL, NULL, NULL, '2013-10-16 15:06:55', '2013-10-16 15:11:31', NULL, NULL),
(258, 'title', 64, 7, '', NULL, NULL, NULL, '2013-10-16 15:06:55', '2013-10-16 15:11:31', NULL, NULL),
(259, 'slug', 64, 7, '', NULL, NULL, NULL, '2013-10-16 15:06:55', '2013-10-16 15:11:31', NULL, NULL),
(260, 'title', 65, 1, 'Mr Cox', NULL, NULL, NULL, '2013-10-16 16:02:47', '2013-10-16 16:06:01', NULL, NULL),
(261, 'location', 65, 8, '2', NULL, NULL, NULL, '2013-10-16 16:02:47', '2013-10-16 16:06:01', NULL, NULL),
(262, 'type', 65, 8, '1', NULL, NULL, NULL, '2013-10-16 16:02:47', '2013-10-16 16:06:01', NULL, NULL),
(263, 'area', 65, 1, 'Clifton', NULL, NULL, NULL, '2013-10-16 16:02:47', '2013-10-16 16:06:01', NULL, NULL),
(264, 'city', 65, 1, 'Bristol', NULL, NULL, NULL, '2013-10-16 16:02:47', '2013-10-16 16:06:01', NULL, NULL),
(265, 'county', 65, 1, 'Avon', NULL, NULL, NULL, '2013-10-16 16:02:47', '2013-10-16 16:06:01', NULL, NULL),
(266, 'country', 65, 1, 'England', NULL, NULL, NULL, '2013-10-16 16:02:47', '2013-10-16 16:06:01', NULL, NULL),
(267, 'description', 65, 6, 'Small Flat', NULL, NULL, NULL, '2013-10-16 16:02:47', '2013-10-16 16:06:01', NULL, NULL),
(268, 'additional_info', 65, 6, '', NULL, NULL, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(269, 'disabled_access', 65, 5, NULL, NULL, 1, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(270, 'beach', 65, 5, NULL, NULL, 0, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(271, 'child_friendly', 65, 5, NULL, NULL, 1, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(272, 'cancellation_fee', 65, 5, NULL, NULL, 1, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(273, 'accessibility', 65, 6, 'Accessible ', NULL, NULL, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(274, 'image', 65, 3, NULL, NULL, NULL, '/assets/source/1.jpg', '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(275, 'welcome_pack', 65, 3, NULL, NULL, NULL, '', '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(276, 'extras', 65, 6, '', NULL, NULL, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(277, 'date', 65, 4, NULL, '2009-01-14 00:00:00', NULL, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(278, 'live_on_site', 65, 5, NULL, NULL, 1, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(279, 'user_id', 65, 7, '39', NULL, NULL, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(280, 'slug', 65, 7, 'mr-cox', NULL, NULL, NULL, '2013-10-16 16:02:48', '2013-10-16 16:06:01', NULL, NULL),
(281, 'arrival_date', 66, 4, NULL, '2014-01-01 12:00:00', NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(282, 'departure_date', 66, 4, NULL, '2014-01-08 00:00:00', NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(283, 'type', 66, 8, '2', NULL, NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(284, 'status', 66, 7, 'available', NULL, NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(285, 'number_of_bedrooms', 66, 1, '4', NULL, NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(286, 'sleeps_number', 66, 1, '6', NULL, NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(287, 'property_id', 66, 7, '65', NULL, NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(288, 'booked_by', 66, 7, '', NULL, NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(289, 'title', 66, 7, '', NULL, NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(290, 'slug', 66, 7, '', NULL, NULL, NULL, '2013-10-16 16:07:01', '2013-10-16 16:10:11', NULL, NULL),
(291, 'title', 67, 1, 'Faulty Towers', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(292, 'location', 67, 8, '3', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(293, 'type', 67, 8, '1', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(294, 'area', 67, 1, 'London', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(295, 'city', 67, 1, 'London', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(296, 'county', 67, 1, 'London', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(297, 'country', 67, 1, 'UK', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(298, 'description', 67, 6, 'A place that you can go on holiday and stay', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(299, 'additional_info', 67, 6, 'A really good place ', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(300, 'disabled_access', 67, 5, NULL, NULL, 0, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(301, 'beach', 67, 5, NULL, NULL, 1, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(302, 'child_friendly', 67, 5, NULL, NULL, 1, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(303, 'cancellation_fee', 67, 5, NULL, NULL, 0, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(304, 'accessibility', 67, 6, 'ramps and disable toilets', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(305, 'image', 67, 3, NULL, NULL, NULL, '/assets/source/nugget-family.jpg', '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(306, 'welcome_pack', 67, 3, NULL, NULL, NULL, '', '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(307, 'extras', 67, 6, 'Pool table, ', NULL, NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(308, 'date', 67, 4, NULL, '2013-12-23 00:00:00', NULL, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:13', NULL, NULL),
(309, 'live_on_site', 67, 5, NULL, NULL, 1, NULL, '2013-10-16 16:22:09', '2013-10-18 08:19:14', NULL, NULL),
(310, 'user_id', 67, 7, '42', NULL, NULL, NULL, '2013-10-16 16:22:10', '2013-10-18 08:19:14', NULL, NULL),
(311, 'slug', 67, 7, 'faulty-towers', NULL, NULL, NULL, '2013-10-16 16:22:10', '2013-10-18 08:19:14', NULL, NULL),
(312, 'title', 68, 1, 'Benidorm Paridise', NULL, NULL, NULL, '2013-10-16 16:25:12', '2013-10-18 08:30:57', NULL, NULL),
(313, 'location', 68, 8, '1', NULL, NULL, NULL, '2013-10-16 16:25:12', '2013-10-18 08:30:57', NULL, NULL),
(314, 'type', 68, 8, '2', NULL, NULL, NULL, '2013-10-16 16:25:12', '2013-10-18 08:30:57', NULL, NULL),
(315, 'area', 68, 1, 'Benidorm', NULL, NULL, NULL, '2013-10-16 16:25:12', '2013-10-18 08:30:57', NULL, NULL),
(316, 'city', 68, 1, '', NULL, NULL, NULL, '2013-10-16 16:25:12', '2013-10-18 08:30:57', NULL, NULL),
(317, 'county', 68, 1, '', NULL, NULL, NULL, '2013-10-16 16:25:12', '2013-10-18 08:30:57', NULL, NULL),
(318, 'country', 68, 1, 'Spain', NULL, NULL, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:57', NULL, NULL),
(319, 'description', 68, 6, 'An apartment with a shared pool, 400 metres from the glorious beaches of Benidorm...', NULL, NULL, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:57', NULL, NULL),
(320, 'additional_info', 68, 6, 'Drinks served in bar until 11pm, free sunbeds and towels available at cost', NULL, NULL, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:57', NULL, NULL),
(321, 'disabled_access', 68, 5, NULL, NULL, 0, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:57', NULL, NULL),
(322, 'beach', 68, 5, NULL, NULL, 1, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:57', NULL, NULL),
(323, 'child_friendly', 68, 5, NULL, NULL, 1, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:57', NULL, NULL),
(324, 'cancellation_fee', 68, 5, NULL, NULL, 0, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(325, 'accessibility', 68, 6, 'Lifts to all floors', NULL, NULL, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(326, 'image', 68, 3, NULL, NULL, NULL, '/assets/source/images.jpeg', '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(327, 'welcome_pack', 68, 3, NULL, NULL, NULL, '', '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(328, 'extras', 68, 6, 'None', NULL, NULL, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(329, 'date', 68, 4, NULL, '2001-11-13 00:00:00', NULL, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(330, 'live_on_site', 68, 5, NULL, NULL, 1, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(331, 'user_id', 68, 7, '42', NULL, NULL, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(332, 'slug', 68, 7, 'benidorm-paridise', NULL, NULL, NULL, '2013-10-16 16:25:13', '2013-10-18 08:30:58', NULL, NULL),
(333, 'arrival_date', 69, 4, NULL, '2013-12-23 00:00:00', NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(334, 'departure_date', 69, 4, NULL, '2013-12-28 00:00:00', NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(335, 'type', 69, 8, '2', NULL, NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(336, 'status', 69, 7, 'available', NULL, NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(337, 'number_of_bedrooms', 69, 1, '2', NULL, NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(338, 'sleeps_number', 69, 1, '4', NULL, NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(339, 'property_id', 69, 7, '67', NULL, NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(340, 'booked_by', 69, 7, '', NULL, NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(341, 'title', 69, 7, '', NULL, NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(342, 'slug', 69, 7, '', NULL, NULL, NULL, '2013-10-16 16:28:32', '2013-10-17 09:47:52', NULL, NULL),
(343, 'arrival_date', 70, 4, NULL, '2014-01-13 00:00:00', NULL, NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(344, 'departure_date', 70, 4, NULL, '2014-01-20 00:00:00', NULL, NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(345, 'type', 70, 8, '2', NULL, NULL, NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(346, 'status', 70, 7, 'available', NULL, NULL, NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(347, 'number_of_bedrooms', 70, 1, '2', NULL, NULL, NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(348, 'sleeps_number', 70, 1, '4', NULL, NULL, NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(349, 'property_id', 70, 7, '67', NULL, NULL, NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(350, 'booked_by', 70, 7, '', NULL, NULL, NULL, '2013-10-16 16:30:56', NULL, NULL, NULL),
(351, 'title', 70, 7, '', NULL, NULL, NULL, '2013-10-16 16:30:57', NULL, NULL, NULL),
(352, 'slug', 70, 7, '', NULL, NULL, NULL, '2013-10-16 16:30:57', NULL, NULL, NULL),
(353, 'title', 71, 1, 'Ian''s Great palace', NULL, NULL, NULL, '2013-10-16 20:41:11', NULL, NULL, NULL),
(354, 'location', 71, 8, '1', NULL, NULL, NULL, '2013-10-16 20:41:11', NULL, NULL, NULL),
(355, 'type', 71, 8, '1', NULL, NULL, NULL, '2013-10-16 20:41:11', NULL, NULL, NULL),
(356, 'area', 71, 1, 'Alderley Edge', NULL, NULL, NULL, '2013-10-16 20:41:11', NULL, NULL, NULL),
(357, 'city', 71, 1, 'Manchester', NULL, NULL, NULL, '2013-10-16 20:41:11', NULL, NULL, NULL),
(358, 'county', 71, 1, 'Manchester', NULL, NULL, NULL, '2013-10-16 20:41:11', NULL, NULL, NULL),
(359, 'country', 71, 1, 'UK', NULL, NULL, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(360, 'description', 71, 6, 'This is a lovely tree top mansion near Manchester', NULL, NULL, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(361, 'additional_info', 71, 6, 'This is a loveley house, it really is', NULL, NULL, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(362, 'disabled_access', 71, 5, NULL, NULL, 1, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(363, 'beach', 71, 5, NULL, NULL, 1, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(364, 'child_friendly', 71, 5, NULL, NULL, 1, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(365, 'cancellation_fee', 71, 5, NULL, NULL, 1, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(366, 'accessibility', 71, 6, 'Its all fine', NULL, NULL, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(367, 'image', 71, 3, NULL, NULL, NULL, '/assets/source/images.jpeg', '2013-10-16 20:41:12', NULL, NULL, NULL),
(368, 'welcome_pack', 71, 3, NULL, NULL, NULL, '', '2013-10-16 20:41:12', NULL, NULL, NULL),
(369, 'extras', 71, 6, 'There are no hidden extras', NULL, NULL, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(370, 'date', 71, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(371, 'live_on_site', 71, 5, NULL, NULL, 1, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(372, 'user_id', 71, 7, '41', NULL, NULL, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(373, 'slug', 71, 7, 'ian-s-great-palace', NULL, NULL, NULL, '2013-10-16 20:41:12', NULL, NULL, NULL),
(374, 'arrival_date', 72, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(375, 'departure_date', 72, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(376, 'type', 72, 8, '2', NULL, NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(377, 'status', 72, 7, 'available', NULL, NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(378, 'number_of_bedrooms', 72, 1, '5', NULL, NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(379, 'sleeps_number', 72, 1, '6', NULL, NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(380, 'property_id', 72, 7, '71', NULL, NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(381, 'booked_by', 72, 7, '', NULL, NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(382, 'title', 72, 7, '', NULL, NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(383, 'slug', 72, 7, '', NULL, NULL, NULL, '2013-10-16 20:44:42', NULL, NULL, NULL),
(384, 'title', 73, 1, 'News Story Number One', NULL, NULL, NULL, '2013-10-17 09:10:51', '2013-11-06 17:04:54', NULL, NULL),
(385, 'short_headline', 73, 1, 'News Story Number One', NULL, NULL, NULL, '2013-10-17 09:10:51', '2013-11-06 17:04:54', NULL, NULL);
INSERT INTO `content` (`id`, `name`, `block_id`, `type_id`, `string_value`, `date_value`, `boolean_value`, `file_value`, `date_created`, `date_updated`, `date_active`, `date_deleted`) VALUES
(386, 'summary', 73, 6, 'This is a news story, and this is the summary of the news story This is a news story, and this is the summary of the news story This is a news story, and this is the summary of the news story ', NULL, NULL, NULL, '2013-10-17 09:10:51', '2013-11-06 17:04:54', NULL, NULL),
(387, 'full_story', 73, 2, '<div>\r\n<p>This is a news story, and this is the full story&nbsp;</p>\r\n<p style="display: inline !important;">This is a news story, and this is the full story&nbsp;</p>\r\n<p>This is a news story, and this is the full story&nbsp;</p>\r\n<p style="display: inline !important;">This is a news story, and this is the full story&nbsp;</p>\r\n<p>This is a news story, and this is the full story&nbsp;</p>\r\n<p style="display: inline !important;">This is a news story, and this is the full story&nbsp;</p>\r\n<p>This is a news story, and this is the full story&nbsp;</p>\r\n<div style="display: inline !important;">\r\n<div style="display: inline !important;">\r\n<div style="display: inline !important;">\r\n<div style="display: inline !important;">\r\n<div style="display: inline !important;">\r\n<div style="display: inline !important;">\r\n<p style="display: inline !important;">This is a news story, and this is the full story</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<p>This is a news story, and this is the full story</p>\r\n<div>\r\n<p>This is a news story, and this is the full story</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, '2013-10-17 09:10:51', '2013-11-06 17:04:54', NULL, NULL),
(388, 'full_image', 73, 3, NULL, NULL, NULL, '/assets/source/nugget2.png', '2013-10-17 09:10:51', '2013-11-06 17:04:54', NULL, NULL),
(389, 'date', 73, 4, NULL, '1970-01-01 00:00:00', NULL, NULL, '2013-10-17 09:10:52', '2013-11-06 17:04:54', NULL, NULL),
(390, 'live_on_site', 73, 5, NULL, NULL, 1, NULL, '2013-10-17 09:10:52', '2013-11-06 17:04:54', NULL, NULL),
(391, 'slug', 73, 7, 'news-story-number-one', NULL, NULL, NULL, '2013-10-17 09:10:52', '2013-11-06 17:04:54', NULL, NULL),
(392, 'title', 74, 1, 'Test News Item', NULL, NULL, NULL, '2013-10-17 10:14:31', '2013-11-06 17:05:13', NULL, NULL),
(393, 'short_headline', 74, 1, 'Short Headline', NULL, NULL, NULL, '2013-10-17 10:14:31', '2013-11-06 17:05:13', NULL, NULL),
(394, 'summary', 74, 6, 'News item summary.', NULL, NULL, NULL, '2013-10-17 10:14:31', '2013-11-06 17:05:13', NULL, NULL),
(395, 'full_story', 74, 2, '<p>Lorem ipsum. This is the full story.</p>', NULL, NULL, NULL, '2013-10-17 10:14:31', '2013-11-06 17:05:13', NULL, NULL),
(396, 'full_image', 74, 3, NULL, NULL, NULL, '/assets/source/logo-wwf.png', '2013-10-17 10:14:31', '2013-11-06 17:05:13', NULL, NULL),
(397, 'date', 74, 4, NULL, '2011-11-11 00:00:00', NULL, NULL, '2013-10-17 10:14:31', '2013-11-06 17:05:13', NULL, NULL),
(398, 'live_on_site', 74, 5, NULL, NULL, 1, NULL, '2013-10-17 10:14:31', '2013-11-06 17:05:13', NULL, NULL),
(399, 'slug', 74, 7, 'test-news-item', NULL, NULL, NULL, '2013-10-17 10:14:31', '2013-11-06 17:05:13', NULL, NULL),
(400, 'text', 75, 2, '<p>We wish to make the Give Us Time project as successful as possible for all those who wish to use the service. To help us do this, we ask you to commit to some rules in relation to our service and your use of the properties.</p>\r\n<p>If you do not agree to these rules, you will not be able to complete your booking. Further, if during your stay at a property, you breach these rules, we will block you from booking properties with us in the future.</p>\r\n<p>You agree that you will:</p>\r\n<ul>\r\n<li>not do anything that could harm the ability of Give Us Time to continue to provide this service to military personnel in the future.</li>\r\n<li>not bring unregistered guests or pets into the property.</li>\r\n<li>not bring illegal substances into the property.</li>\r\n<li>treat the donated property with respect at all times (including respecting no smoking policies in force at the property) and you will not use the property to have parties or conduct other activities that are not appropriate to holiday use.</li>\r\n<li>promptly notify the owner of any damages incurred during your stay.</li>\r\n<li>give as much notice as possible if you need to cancel your booking (this will enable us to place the property with someone else or for the owner to take another booking.</li>\r\n<li>agree to comply with any other rules that the property owner may specify.</li>\r\n<li>hand back the keys to the owner or agent at the end of your stay.</li>\r\n</ul>', NULL, NULL, NULL, '2013-10-17 12:51:11', '2013-10-17 12:51:18', NULL, NULL),
(401, 'text', 76, 2, '<p><strong>TERMS AND CONDITIONS of the DONATION</strong></p>\r\n<p><strong>Between</strong></p>\r\n<p><strong><em>GIVE US TIME</em>&nbsp;AND DONOR</strong></p>\r\n<h1>&nbsp;</h1>\r\n<h1>1 DEFINITIONS</h1>\r\n<p>In these Conditions:</p>\r\n<p>&ldquo;<strong>Applicable&nbsp;Laws</strong>&rdquo; means&nbsp;all applicable laws, regulations, regulatory requirements and codes of practice of any jurisdiction, as amended and in force from time to time.</p>\r\n<p>&ldquo;<strong>Applicant</strong>&rdquo; means any person [registered to the Give Us Time website who may fill in a Booking Form /who is eligible to fill in a Booking Form] to apply to stay at the Property.</p>\r\n<p>&ldquo;<strong>Booking Form</strong>&rdquo; means a form on the Give Us Time website to be completed by the Applicant following the receipt of an Initial Interest Form, which contains details of the Applicant&rsquo;s party and the Deposit.</p>\r\n<p>&ldquo;<strong>Conditions</strong>&rdquo; means the standard terms and conditions of the Donation of the Property to Give us Time to be booked out by Applicants as set out in this document.</p>\r\n<p><em>&ldquo;</em><strong>Confirmed Booking</strong>&rdquo; means a Provisional Booking of the Property that has been confirmed by the Donor following payment by the Applicant of the Deposit.</p>\r\n<p>&ldquo;<strong>Donation</strong>&rdquo; means the arrangement between the Donor and Give Us Time where the Donor agrees to provide the Property or several properties for Applicants to use without charge as set out in this document.</p>\r\n<p>&ldquo;<strong>Donor</strong>&rdquo;&nbsp;means&nbsp;[●] [of] [(company no [●]) whose registered office is at] [●].</p>\r\n<p>&ldquo;<strong>Give Us Time</strong>&rdquo;&nbsp;means&nbsp;a charity with registered charity no [●] whose registered address is at [●].</p>\r\n<p>&ldquo;<strong>Initial Interest Form</strong>&rdquo; means a form that the Applicant must fill in to express an interest in the Property. The submission of on an Initial Interest Form is non-legally binding upon the Applicant.</p>\r\n<p>&ldquo;<strong>Late Cancellation</strong>&rdquo; means if&nbsp;the Applicant either cancels a booking less than 24 hours prior to the commencement of the booking or fails to check in to the Property at the commencement of the booking where no notice has been given.</p>\r\n<p>&ldquo;<strong>Late Cancellation Fee</strong>&rdquo; means the sum of &pound;100 to be paid by the Applicant to the Donor in the event of a Late Cancellation.&nbsp;&nbsp;</p>\r\n<p>&ldquo;<strong>Property</strong>&rdquo; means [●] which is the subject [or one of the subjects] of the Donation.</p>\r\n<p>&ldquo;<strong>Provisional Booking</strong>&rdquo; means a booking that is not yet a Confirmed Booking of the Property where the Applicant has submitted an Initial Interest Form.</p>\r\n<h1>&nbsp;</h1>\r\n<h1>2 THE BOOKING PROCESS</h1>\r\n<ol start="2">\r\n<li>Applicants will fill in an Initial Interest Form from the Give Us Time website specifying the Property the Applicant is interested in staying in. The Applicant will submit the completed Initial Interest Form to Give Us Time.</li>\r\n<li>After confirming the eligibility of the Applicant and, if the Property is available, the Applicant will have a Provisional Booking for 72 hours and will have this time to complete the Booking Form on the Give Us Time website.</li>\r\n<li>Once the Applicant completes the Booking Form including the credit/debit card details (or on receipt of the cheque for the sum of &pound;100 made payable to the Donor by Give Us Time), the Applicant shall have a Confirmed Booking of that Property.</li>\r\n<li>Give Us Time recommends that 72 hours prior to the commencement of the Applicant&rsquo;s party&rsquo;s stay at the Property, the Donor contact the Applicant to remind the Applicant about the details of the booking and ask the Applicant to give a final confirmation of his or her intention to stay at the Property for the agreed period of the booking.</li>\r\n<li>The Applicant will provide credit/debit card details to the Donor or provide a cheque made payable to the Donor for the sum of &pound;100 on making a booking.</li>\r\n<li>The Donor may charge the Late Cancellation Fee in the event of a Late Cancellation.</li>\r\n<li>The Donor acknowledges that most damage to the Property is regarded as ordinary wear and tear and that repairs will be carried out by the Donor&rsquo;s management without any recourse to Give Us Time or the Applicant.</li>\r\n<li>Accidental damage will not be charged to the Applicant.</li>\r\n</ol>\r\n<h1>&nbsp;</h1>\r\n<h1>3 LATE CANCELLATION FEE</h1>\r\n<h1>&nbsp;</h1>\r\n<h1>4 BREAKAGES</h1>\r\n<h1>&nbsp;</h1>\r\n<h1>5 INSURANCE</h1>\r\n<p>The Donor shall for so long as it is a party to these Conditions, maintain in force at its own expense insurance to cover the Property and its contents, and any other insurance as required by Applicable Laws. Give Us Time reserves the right to inspect such insurance policies at any time on reasonable notice and shall be supplied with the current premium receipt from time to time on demand.</p>\r\n<h1>&nbsp;</h1>\r\n<h1>6 DONOR WARRANTIES</h1>\r\n<p>The Donor represents and warrants that:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Donor has full title guarantee to the Property;</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;That there is no restriction on the Donor&rsquo;s ability to make the Donation;</p>\r\n<p>(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Property is fit for the purpose of being a holiday let and that the Donor has all relevant permissions under Applicable Law;</p>\r\n<p>(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The description of the Property is accurate in all respects, and that such information may be provided without recourse to any third party;</p>\r\n<p>(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The during the period of the Donation, the Donor shall not enter into any contract with any other customer for the use of the Property, unless it has received confirmation of a Late Cancellation or there has been no Provisional Booking for the Property within 2 weeks of the start of the period of the Donation; and</p>\r\n<p>(f)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In performing its obligations under these Conditions that it shall comply with all Applicable Laws.</p>\r\n<h1>&nbsp;</h1>\r\n<h1>7 INDEMNITIES</h1>\r\n<p>The Donor shall indemnify Give Us Time from and against all claims, demands, actions, awards, judgments, settlements, costs, expenses, liabilities, damages and losses (including all interest, fines, penalties, management time and legal and other professional costs and expenses) incurred by Give Us Time as a result of or in connection with:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any claim by any third party in respect of the Property as a result of negligence of or breach by or fraud on behalf of the Donor; and</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Breach of any warranty given by the Donor in relation to the Property.</p>\r\n<h1>&nbsp;</h1>\r\n<h1>8 TERMINATION</h1>\r\n<ol start="8">\r\n<li>Either party may terminate these Conditions by giving notice in writing to the other party.</li>\r\n<li>Notice provisions means:\r\n<p><span lang="X-NONE">(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang="X-NONE">1 month if the Property is listed on the Give Us Time website but does not have a Provisional Booking or Confirmed Booking by an Applicant;</span></p>\r\n<p><span lang="X-NONE">(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang="X-NONE">2 months if the Property has a Provisional Booking with an Applicant;</span></p>\r\n<p><span lang="X-NONE">(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang="X-NONE">3 months if the Property has a Confirmed Booking with an Applicant.</span></p>\r\n</li>\r\n<li>If a Donor withdraws the Property from the Donation when an Applicant has a Confirmed Booking and also has other properties which are the subject of a Donation, the Donor will assist Give Us Time to help make alternative arrangements for the Applicant.</li>\r\n<li>Termination shall not affect either of the parties&rsquo; accrued rights or liabilities, or the coming into force or the continuance in force of any provision which is expressly or by implication intended to come into or continue in force on or after such termination.</li>\r\n<li>These Conditions and any non-contractual obligations arising from them will be subject to the laws of England.&nbsp;&nbsp;We will try to solve any disagreements quickly and efficiently. The English courts have exclusive jurisdiction to determinate any dispute arising in connection with the Conditions, including disputes relating to non-contractual obligations.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1 month if the Property is listed on the Give Us Time website but does not have a Provisional Booking or Confirmed Booking by an Applicant;</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 months if the Property has a Provisional Booking with an Applicant;</p>\r\n<p>(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 months if the Property has a Confirmed Booking with an Applicant.</p>\r\n<h1>&nbsp;</h1>\r\n<h1>9 APPLICABLE LAW</h1>\r\n<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>', NULL, NULL, NULL, '2013-10-17 12:56:55', '2013-10-17 13:10:45', NULL, NULL),
(402, 'text', 77, 2, '<p>This is a sub page</p>', NULL, NULL, NULL, '2013-10-17 16:41:08', '2013-10-17 16:41:18', NULL, NULL),
(403, 'text', 78, 2, '<p>sdf;o sdjfg ;asug ;oGUw</p>', NULL, NULL, NULL, '2013-10-17 16:58:50', '2013-10-17 16:58:55', NULL, NULL),
(404, 'text', 79, 2, '<p><span class="highlighted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nisl dui. Quisque ullamcorper tempor purus quis dapibus. Morbi scelerisque eros quis elit aliquet suscipit. Nulla venenatis dictum ipsum id fringilla. Nulla facilisi. Integer risus sapien, fringilla eu magna vel, porttitor aliquam.</span></p>\r\n<p><img src="assets/source/inside.jpg" alt="" width="634" height="291" /></p>\r\n<p>Nulla ac quam scelerisque, scelerisque lorem quis, bibendum tellus. Nunc sagittis risus dui, sed sagittis sem faucibus vitae. Mauris lobortis odio at leo venenatis sollicitudin. Pellentesque sit amet lorem rutrum, placerat nunc quis, elementum mi. Morbi sapien nisi, pretium sit amet ligula ac, dapibus molestie est.</p>\r\n<ol>\r\n<li>This is an odered list item</li>\r\n<li>and another</li>\r\n</ol>\r\n<h2>Second-level Heading</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nisl dui. Quisque ullamcorper tempor purus quis dapibus. Morbi scelerisque eros quis elit aliquet suscipit. Nulla venenatis dictum ipsum id fringilla. Nulla facilisi. Integer risus sapien, fringilla eu magna vel, porttitor aliquam urna. Duis porta vulputate consequat. Fusce facilisis, mi et suscipit consequat, nibh urna faucibus odio, eu gravida neque nunc eu elit. Nullam a nibh sem. Maecenas aliquet in urna sed lacinia. Etiam imperdiet tortor id massa interdum adipiscing. Aliquam congue sodales fermentum. Pellentesque tincidunt lectus lectus, at sollicitudin quam imperdiet et.</p>\r\n<ul>\r\n<li>This is a list item</li>\r\n<li>This is another one</li>\r\n<li>And another</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nisl dui. Quisque ullamcorper tempor purus quis dapibus. Morbi scelerisque eros quis elit aliquet suscipit. Nulla venenatis dictum ipsum id fringilla. Nulla facilisi. Integer risus sapien, fringilla eu magna vel, porttitor aliquam urna. Duis porta vulputate consequat. Fusce facilisis, mi et suscipit consequat, nibh urna faucibus odio, eu gravida neque nunc eu elit. Nullam a nibh sem. Maecenas aliquet in urna sed lacinia. Etiam imperdiet tortor id massa interdum adipiscing. Aliquam congue sodales fermentum. Pellentesque tincidunt lectus lectus, at sollicitudin quam imperdiet et.</p>\r\n<blockquote class="testimonial">\r\n<p>Etiam condimentum odio quis velit pellentesque.</p>\r\n</blockquote>\r\n<p>Etiam condimentum odio quis velit pellentesque, ultricies fringilla sem fermentum. Sed et turpis aliquam, volutpat dui eu, placerat ipsum. Aliquam vestibulum augue nulla, in pharetra risus consequat et. Etiam auctor leo mauris, sit amet ultricies risus fermentum a. Curabitur rhoncus, eros sed blandit blandit, leo nulla egestas tortor, sed condimentum mi felis ac magna. Duis eget sem viverra, condimentum ante in, dictum arcu. Fusce quis diam id nisi lobortis vehicula. Nulla accumsan, elit ut tristique pharetra, felis sem porta sapien, ut aliquet tortor neque a dolor. Nullam rutrum eleifend ipsum, at imperdiet purus egestas ac. Phasellus sodales consequat ullamcorper. Suspendisse fringilla feugiat blandit. Sed quis libero lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec commodo nunc. Aenean quis libero vitae diam consequat rutrum. In hac habitasse platea dictumst.</p>', NULL, NULL, NULL, '2013-10-17 17:57:18', '2013-11-07 16:33:25', NULL, NULL),
(405, 'arrival_date', 80, 4, NULL, '2014-05-11 00:00:00', NULL, NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(406, 'departure_date', 80, 4, NULL, '2014-05-22 00:00:00', NULL, NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(407, 'type', 80, 8, '2', NULL, NULL, NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(408, 'status', 80, 7, 'available', NULL, NULL, NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(409, 'number_of_bedrooms', 80, 1, '5', NULL, NULL, NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(410, 'sleeps_number', 80, 1, '4', NULL, NULL, NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(411, 'property_id', 80, 7, '68', NULL, NULL, NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(412, 'booked_by', 80, 7, '', NULL, NULL, NULL, '2013-10-18 08:37:07', NULL, NULL, NULL),
(413, 'title', 80, 7, '', NULL, NULL, NULL, '2013-10-18 08:37:08', NULL, NULL, NULL),
(414, 'slug', 80, 7, '', NULL, NULL, NULL, '2013-10-18 08:37:08', NULL, NULL, NULL),
(415, 'text', 81, 2, NULL, NULL, NULL, NULL, '2013-10-18 10:49:56', NULL, NULL, NULL),
(416, 'text', 82, 1, NULL, NULL, NULL, NULL, '2013-10-31 20:44:41', NULL, NULL, NULL),
(417, 'text', 83, 1, NULL, NULL, NULL, NULL, '2013-10-31 20:44:46', NULL, NULL, NULL),
(418, 'text', 84, 1, NULL, NULL, NULL, NULL, '2013-10-31 20:44:54', NULL, NULL, NULL),
(419, 'text', 85, 1, 'About Us', NULL, NULL, NULL, '2013-10-31 20:45:02', '2013-11-06 13:45:36', NULL, NULL),
(420, 'arrival_date', 86, 4, NULL, '2013-10-08 00:00:00', NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(421, 'departure_date', 86, 4, NULL, '2013-10-10 00:00:00', NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(422, 'type', 86, 8, '2', NULL, NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(423, 'status', 86, 7, 'available', NULL, NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(424, 'number_of_bedrooms', 86, 1, '2', NULL, NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(425, 'sleeps_number', 86, 1, '2', NULL, NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(426, 'property_id', 86, 7, '67', NULL, NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(427, 'booked_by', 86, 7, '', NULL, NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(428, 'title', 86, 7, '', NULL, NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(429, 'slug', 86, 7, '', NULL, NULL, NULL, '2013-10-31 21:01:14', NULL, NULL, NULL),
(430, 'title', 87, 1, 'New property', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(431, 'location', 87, 8, '9', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(432, 'type', 87, 8, '5', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(433, 'area', 87, 1, 'area', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(434, 'city', 87, 1, 'city', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(435, 'county', 87, 1, 'county', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(436, 'country', 87, 1, 'country', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(437, 'description', 87, 6, 'description', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(438, 'additional_info', 87, 6, 'extra info', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(439, 'wifi', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(440, 'gym', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(441, 'beach', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(442, 'swimming_pool', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(443, 'parking', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(444, 'disabled_access', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(445, 'child_friendly', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(446, 'dog_friendly', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(447, 'cancellation_fee', 87, 5, NULL, NULL, 0, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(448, 'accessibility', 87, 6, 'access', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 11:02:49', NULL, NULL),
(449, 'image_1', 87, 3, '', NULL, NULL, '', '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(450, 'image_2', 87, 3, '', NULL, NULL, '', '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(451, 'image_3', 87, 3, '', NULL, NULL, '', '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(452, 'image_4', 87, 3, '', NULL, NULL, '', '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(453, 'image_5', 87, 3, '', NULL, NULL, '', '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(454, 'welcome_pack', 87, 3, '', NULL, NULL, '', '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(455, 'extras', 87, 6, 'extras', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(456, 'user_id', 87, 7, '42', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(457, 'slug', 87, 7, 'new-property', NULL, NULL, NULL, '2013-10-31 21:09:19', '2013-11-01 10:43:54', NULL, NULL),
(458, 'arrival_date', 88, 4, NULL, '1970-01-01 00:00:00', NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(459, 'departure_date', 88, 4, NULL, '1970-01-01 00:00:00', NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(460, 'type', 88, 8, '2', NULL, NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(461, 'status', 88, 7, 'available', NULL, NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(462, 'number_of_bedrooms', 88, 1, '1', NULL, NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(463, 'sleeps_number', 88, 1, '', NULL, NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(464, 'property_id', 88, 7, '87', NULL, NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(465, 'booked_by', 88, 7, '', NULL, NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(466, 'title', 88, 7, '', NULL, NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(467, 'slug', 88, 7, '', NULL, NULL, NULL, '2013-10-31 21:38:25', '2013-10-31 22:02:15', NULL, NULL),
(468, 'text', 89, 1, 'Contact Us', NULL, NULL, NULL, '2013-10-31 22:06:06', '2013-11-07 09:44:46', NULL, NULL),
(469, 'title', 90, 1, 'Visiting', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(470, 'title_is_link', 90, 5, NULL, NULL, 1, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(471, 'text', 90, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eleifend, arcu et lobortis tempus, eros turpis ullamcorper lorem, vitae mattis felis orci non leo. Sed dignissim ac eros.', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(472, 'href', 90, 1, '/visiting/', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(473, 'target', 90, 5, NULL, NULL, 0, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(474, 'link_in_body', 90, 5, NULL, NULL, 1, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(475, 'link_title', 90, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(476, 'link_text', 90, 1, 'View more', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(477, 'image_src', 90, 3, NULL, NULL, NULL, '/assets/source/nugget2.png', '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(478, 'image_alt', 90, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(479, 'image_title', 90, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:14:36', NULL, NULL),
(480, 'title', 91, 1, 'Events', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(481, 'title_is_link', 91, 5, NULL, NULL, 1, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(482, 'text', 91, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eleifend, arcu et lobortis tempus, eros turpis ullamcorper lorem, vitae mattis felis orci non leo. Sed dignissim ac eros.', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(483, 'href', 91, 1, '/events/', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(484, 'target', 91, 5, NULL, NULL, 0, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(485, 'link_in_body', 91, 5, NULL, NULL, 1, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(486, 'link_title', 91, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(487, 'link_text', 91, 1, 'View more', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(488, 'image_src', 91, 3, NULL, NULL, NULL, '/assets/source/nugget2.png', '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(489, 'image_alt', 91, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(490, 'image_title', 91, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:27:33', NULL, NULL),
(491, 'title', 92, 1, 'Education', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(492, 'title_is_link', 92, 5, NULL, NULL, 1, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(493, 'text', 92, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eleifend, arcu et lobortis tempus, eros turpis ullamcorper lorem, vitae mattis felis orci non leo. Sed dignissim ac eros.', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(494, 'href', 92, 1, '/education/', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(495, 'target', 92, 5, NULL, NULL, 0, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(496, 'link_in_body', 92, 5, NULL, NULL, 1, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(497, 'link_title', 92, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(498, 'link_text', 92, 1, 'View more', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(499, 'image_src', 92, 3, NULL, NULL, NULL, '/assets/source/nugget2.png', '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(500, 'image_alt', 92, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(501, 'image_title', 92, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:29:00', NULL, NULL),
(502, 'title', 93, 1, 'Getting Involved', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(503, 'title_is_link', 93, 5, NULL, NULL, 1, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(504, 'text', 93, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eleifend, arcu et lobortis tempus, eros turpis ullamcorper lorem, vitae mattis felis orci non leo. Sed dignissim ac eros.', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(505, 'href', 93, 1, '/getting-involved/', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(506, 'target', 93, 5, NULL, NULL, 0, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(507, 'link_in_body', 93, 5, NULL, NULL, 1, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(508, 'link_title', 93, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(509, 'link_text', 93, 1, 'View more', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(510, 'image_src', 93, 3, NULL, NULL, NULL, '/assets/source/nugget2.png', '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(511, 'image_alt', 93, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(512, 'image_title', 93, 1, '', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 12:59:19', NULL, NULL),
(513, 'text', 94, 2, '<p><a href="#"><img src="assets/source/logo-northern-trust.png" alt="Northern Trust logo" width="188" height="48" /></a>&nbsp;<a href="#"><img src="assets/source/logo-wwf.png" alt="World Wide Fund for Nature logo" width="60" height="66" /></a>&nbsp;<a href="#"><img src="assets/source/logo-national-trust.png" alt="Natinoal Trust logo" width="179" height="26" /></a></p>', NULL, NULL, NULL, '2013-11-05 16:14:02', '2013-11-06 13:12:07', NULL, NULL),
(514, 'text', 95, 1, NULL, NULL, NULL, NULL, '2013-11-05 16:14:02', NULL, NULL, NULL),
(515, 'text', 96, 1, NULL, NULL, NULL, NULL, '2013-11-05 16:14:03', NULL, NULL, NULL),
(516, 'text', 97, 1, NULL, NULL, NULL, NULL, '2013-11-05 16:14:03', NULL, NULL, NULL),
(517, 'text', 98, 1, NULL, NULL, NULL, NULL, '2013-11-05 16:14:03', NULL, NULL, NULL),
(518, 'title', 99, 1, 'The Avalon Marshes', NULL, NULL, NULL, '2013-11-06 11:53:59', NULL, NULL, NULL),
(519, 'text', 99, 6, 'The Avalon Marshes is an ancient wetland landscape in the heart of Somerset, significant for its hidden cultural heritage as well as its huge range of wildlife. Home to ancient Neolithic trackways, stunning wildflower meadows, and thousands of wintering wildfowl, this landscape has many ancient and modern stories to tell and reveal.', NULL, NULL, NULL, '2013-11-06 11:53:59', NULL, NULL, NULL),
(520, 'image_src', 99, 3, NULL, NULL, NULL, '/assets/source/slide1a.jpg', '2013-11-06 11:53:59', NULL, NULL, NULL),
(521, 'image_alt', 99, 1, '', NULL, NULL, NULL, '2013-11-06 11:53:59', NULL, NULL, NULL),
(522, 'link_href', 99, 1, 'http://google.com', NULL, NULL, NULL, '2013-11-06 11:53:59', NULL, NULL, NULL),
(523, 'link_text', 99, 1, 'Read More', NULL, NULL, NULL, '2013-11-06 11:53:59', NULL, NULL, NULL),
(524, 'link_title', 99, 1, 'Read More Title', NULL, NULL, NULL, '2013-11-06 11:53:59', NULL, NULL, NULL),
(525, 'slug', 99, 7, 'the-avalon-marshes', NULL, NULL, NULL, '2013-11-06 11:53:59', NULL, NULL, NULL),
(526, 'title', 100, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(527, 'title_is_link', 100, 5, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(528, 'text', 100, 6, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(529, 'href', 100, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(530, 'target', 100, 5, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(531, 'link_in_body', 100, 5, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(532, 'link_title', 100, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(533, 'link_text', 100, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(534, 'image_src', 100, 3, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(535, 'image_alt', 100, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(536, 'image_title', 100, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(537, 'text', 101, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(538, 'text', 102, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(539, 'text', 103, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(540, 'text', 104, 1, NULL, NULL, NULL, NULL, '2013-11-06 13:13:55', NULL, NULL, NULL),
(541, 'title', 105, 1, 'Slide 2', NULL, NULL, NULL, '2013-11-06 15:44:35', NULL, NULL, NULL),
(542, 'text', 105, 6, 'The Avalon Marshes is an ancient wetland landscape in the heart of Somerset, significant for its hidden cultural heritage as well as its huge range of wildlife. Home to ancient Neolithic trackways, stunning wildflower meadows, and thousands of wintering wildfowl, this landscape has many ancient and modern stories to tell and reveal.', NULL, NULL, NULL, '2013-11-06 15:44:35', NULL, NULL, NULL),
(543, 'image_src', 105, 3, NULL, NULL, NULL, '/assets/source/slide1b.jpg', '2013-11-06 15:44:35', NULL, NULL, NULL),
(544, 'image_alt', 105, 1, '', NULL, NULL, NULL, '2013-11-06 15:44:35', NULL, NULL, NULL),
(545, 'link_href', 105, 1, '', NULL, NULL, NULL, '2013-11-06 15:44:35', NULL, NULL, NULL),
(546, 'link_text', 105, 1, '', NULL, NULL, NULL, '2013-11-06 15:44:35', NULL, NULL, NULL),
(547, 'link_title', 105, 1, '', NULL, NULL, NULL, '2013-11-06 15:44:35', NULL, NULL, NULL),
(548, 'slug', 105, 7, 'slide-2', NULL, NULL, NULL, '2013-11-06 15:44:35', NULL, NULL, NULL),
(549, 'text', 106, 1, 'Header', NULL, NULL, NULL, '2013-11-06 16:14:55', '2013-11-06 16:15:26', NULL, NULL),
(550, 'text', 107, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi malesuada leo eu neque congue, eu iaculis nulla volutpat. Maecenas interdum turpis ac est convallis, sed gravida eros dapibus. Aenean placerat ante vitae tortor tempor fringilla. Suspendisse potenti. Duis odio nisl, ullamcorper vitae diam vel, semper pharetra enim.</p>\r\n<p>Mauris ornare urna at dolor pellentesque, vitae sagittis neque blandit. Nulla augue est, porta nec justo nec, sagittis dignissim dolor. Donec sit amet ultrices enim. Nam semper adipiscing pulvinar. Sed dictum lectus et sollicitudin condimentum. Aliquam semper tortor cursus orci gravida, dapibus accumsan lacus sagittis. Donec a sem vel velit fringilla porttitor.</p>\r\n<p>Donec tempus, est eget scelerisque lacinia, lacus dui molestie orci, sit amet vehicula nisi leo adipiscing nisi. Pellentesque convallis quam libero, ac faucibus mi blandit et. Nulla eu aliquet ligula. Nunc ac lectus ac augue tincidunt bibendum eget eu est. Nunc feugiat sem velit, eu vestibulum massa malesuada et. Duis eget augue et odio dignissim pharetra laoreet vel arcu. In sed semper ante, id dignissim justo.</p>', NULL, NULL, NULL, '2013-11-06 16:14:55', '2013-11-06 16:16:29', NULL, NULL),
(551, 'title', 108, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(552, 'title_is_link', 108, 5, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(553, 'text', 108, 6, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(554, 'href', 108, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(555, 'target', 108, 5, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(556, 'link_in_body', 108, 5, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(557, 'link_title', 108, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(558, 'link_text', 108, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(559, 'image_src', 108, 3, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(560, 'image_alt', 108, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(561, 'image_title', 108, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(562, 'text', 109, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(563, 'text', 110, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(564, 'text', 111, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(565, 'text', 112, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:14:55', NULL, NULL, NULL),
(566, 'title', 113, 1, 'Nugget Title', NULL, NULL, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(567, 'title_is_link', 113, 5, NULL, NULL, 1, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(568, 'text', 113, 6, 'This is the nugget text.', NULL, NULL, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(569, 'href', 113, 1, '', NULL, NULL, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(570, 'target', 113, 5, NULL, NULL, 0, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(571, 'link_in_body', 113, 5, NULL, NULL, 0, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(572, 'link_title', 113, 1, '', NULL, NULL, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(573, 'link_text', 113, 1, '', NULL, NULL, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(574, 'image_src', 113, 3, NULL, NULL, NULL, '/assets/source/nugget2.png', '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(575, 'image_alt', 113, 1, '', NULL, NULL, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(576, 'image_title', 113, 1, '', NULL, NULL, NULL, '2013-11-06 16:31:22', '2013-11-06 16:31:54', NULL, NULL),
(577, 'title', 114, 1, 'Test Nugget', NULL, NULL, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(578, 'title_is_link', 114, 5, NULL, NULL, 1, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(579, 'text', 114, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(580, 'href', 114, 1, 'http://www.google.com', NULL, NULL, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(581, 'target', 114, 5, NULL, NULL, 0, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(582, 'link_in_body', 114, 5, NULL, NULL, 1, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(583, 'link_title', 114, 1, '', NULL, NULL, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(584, 'link_text', 114, 1, 'Link text', NULL, NULL, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(585, 'image_src', 114, 3, NULL, NULL, NULL, '/assets/source/nugget2.png', '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(586, 'image_alt', 114, 1, '', NULL, NULL, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(587, 'image_title', 114, 1, '', NULL, NULL, NULL, '2013-11-06 16:32:08', '2013-11-07 12:51:33', NULL, NULL),
(588, 'text', 115, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:32:25', NULL, NULL, NULL),
(589, 'text', 116, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:32:25', NULL, NULL, NULL),
(590, 'text', 117, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:32:25', NULL, NULL, NULL),
(591, 'text', 118, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:32:25', NULL, NULL, NULL),
(592, 'text', 119, 1, 'News', NULL, NULL, NULL, '2013-11-06 16:48:42', '2013-11-06 17:04:11', NULL, NULL),
(593, 'title', 120, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(594, 'title_is_link', 120, 5, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(595, 'text', 120, 6, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(596, 'href', 120, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(597, 'target', 120, 5, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(598, 'link_in_body', 120, 5, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(599, 'link_title', 120, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(600, 'link_text', 120, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(601, 'image_src', 120, 3, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(602, 'image_alt', 120, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(603, 'image_title', 120, 1, NULL, NULL, NULL, NULL, '2013-11-06 16:48:42', NULL, NULL, NULL),
(604, 'title', 121, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(605, 'title_is_link', 121, 5, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(606, 'text', 121, 6, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(607, 'href', 121, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(608, 'target', 121, 5, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(609, 'link_in_body', 121, 5, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(610, 'link_title', 121, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(611, 'link_text', 121, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(612, 'image_src', 121, 3, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(613, 'image_alt', 121, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(614, 'image_title', 121, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(615, 'text', 122, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(616, 'text', 123, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(617, 'text', 124, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(618, 'text', 125, 1, NULL, NULL, NULL, NULL, '2013-11-07 09:44:36', NULL, NULL, NULL),
(619, 'text', 126, 2, '<h4>Telephone:</h4>\r\n<p>01823 652400</p>\r\n<h4>Email:</h4>\r\n<p><a href="mailto:enquiries@somersetwildlife.org">enquiries@somersetwildlife.org</a></p>', NULL, NULL, NULL, '2013-11-07 12:43:45', '2013-11-07 12:44:03', NULL, NULL),
(620, 'text', 127, 2, '<h4>Address:</h4>\r\n<p>Somerset Wildlife Trust<br />Tonedale Mill<br />Tonedale<br />Wellington<br />TA21 0AW</p>', NULL, NULL, NULL, '2013-11-07 12:43:45', '2013-11-07 12:44:13', NULL, NULL),
(621, 'text', 128, 2, '<h4>Telephone:</h4>\r\n<p>01823 652400</p>\r\n<h4>Email:</h4>\r\n<p><a href="#">enquiries@somersetwildlife.org</a></p>', NULL, NULL, NULL, '2013-11-07 12:43:45', '2013-11-07 12:44:22', NULL, NULL),
(622, 'text', 129, 2, '<p>Somerset Wildlife Trust<br />Callow Rock Offices<br />Shipham Road<br />Cheddar<br />BS27 3DQ</p>', NULL, NULL, NULL, '2013-11-07 12:44:37', '2013-11-07 12:44:44', NULL, NULL),
(623, 'title', 130, 1, 'Picture Nugget Title', NULL, NULL, NULL, '2013-11-07 15:32:34', '2013-11-07 15:34:19', NULL, NULL),
(624, 'title_is_link', 130, 5, NULL, NULL, 0, NULL, '2013-11-07 15:32:34', '2013-11-07 15:34:19', NULL, NULL),
(625, 'text', 130, 6, 'Please call us for any enquiries about Avalon Marshes on 01823 652400', NULL, NULL, NULL, '2013-11-07 15:32:34', '2013-11-07 15:34:19', NULL, NULL),
(626, 'href', 130, 1, 'http://google.com', NULL, NULL, NULL, '2013-11-07 15:32:34', '2013-11-07 15:34:19', NULL, NULL),
(627, 'target', 130, 5, NULL, NULL, 0, NULL, '2013-11-07 15:32:34', '2013-11-07 15:34:19', NULL, NULL),
(628, 'link_in_body', 130, 5, NULL, NULL, 0, NULL, '2013-11-07 15:32:34', '2013-11-07 15:34:19', NULL, NULL),
(629, 'link_title', 130, 1, '', NULL, NULL, NULL, '2013-11-07 15:32:34', '2013-11-07 15:34:19', NULL, NULL),
(630, 'link_text', 130, 1, 'Read more', NULL, NULL, NULL, '2013-11-07 15:32:35', '2013-11-07 15:34:19', NULL, NULL),
(631, 'image_src', 130, 3, NULL, NULL, NULL, '/assets/source/image-nugget.jpg', '2013-11-07 15:32:35', '2013-11-07 15:34:19', NULL, NULL),
(632, 'image_alt', 130, 1, '', NULL, NULL, NULL, '2013-11-07 15:32:35', '2013-11-07 15:34:19', NULL, NULL),
(633, 'image_title', 130, 1, '', NULL, NULL, NULL, '2013-11-07 15:32:35', '2013-11-07 15:34:19', NULL, NULL),
(634, 'text', 131, 1, 'Heading 1', NULL, NULL, NULL, '2013-11-07 15:44:09', '2013-11-07 15:44:20', NULL, NULL),
(635, 'text', 132, 1, NULL, NULL, NULL, NULL, '2013-11-07 15:44:38', NULL, NULL, NULL),
(636, 'text', 133, 1, NULL, NULL, NULL, NULL, '2013-11-07 15:44:44', NULL, NULL, NULL),
(637, 'title', 134, 1, 'Test Title', NULL, NULL, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(638, 'title_is_link', 134, 5, NULL, NULL, 0, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(639, 'text', 134, 6, 'Test content. More test content.', NULL, NULL, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(640, 'href', 134, 1, '', NULL, NULL, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(641, 'target', 134, 5, NULL, NULL, 0, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(642, 'link_in_body', 134, 5, NULL, NULL, 0, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(643, 'link_title', 134, 1, '', NULL, NULL, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(644, 'link_text', 134, 1, '', NULL, NULL, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(645, 'image_src', 134, 3, NULL, NULL, NULL, '/assets/source/inside.jpg', '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(646, 'image_alt', 134, 1, '', NULL, NULL, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(647, 'image_title', 134, 1, '', NULL, NULL, NULL, '2013-11-07 16:24:28', '2013-11-07 17:14:50', NULL, NULL),
(648, 'text', 135, 1, NULL, NULL, NULL, NULL, '2013-11-07 16:24:28', NULL, NULL, NULL),
(649, 'text', 136, 1, NULL, NULL, NULL, NULL, '2013-11-07 16:59:13', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

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
(8, 'list', '2013-10-15 10:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(40) NOT NULL,
  `filetype` varchar(40) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `date_deleted` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `file`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `old_link`
--

CREATE TABLE IF NOT EXISTS `old_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `old_link`
--


-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `depth` int(11) NOT NULL DEFAULT '1',
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `window_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('all','guest','subscriber','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'all',
  `layout` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_active` datetime DEFAULT NULL,
  `date_visible` datetime DEFAULT NULL,
  `date_subpages` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `parent_id`, `depth`, `lft`, `rgt`, `name`, `target`, `window_title`, `meta_description`, `meta_keywords`, `link`, `role`, `layout`, `date_created`, `date_updated`, `date_active`, `date_visible`, `date_subpages`) VALUES
(82, NULL, 1, 2, 3, 'Home', NULL, 'Home', 'The new fridge home page.', 'new,fridge,home,page,example,template', '/', 'all', 'home', '2013-09-05 11:20:36', '2013-11-07 17:19:14', '2013-09-05 11:20:36', '2013-09-10 10:11:01', NULL),
(84, NULL, 1, 8, 9, 'Login', NULL, 'Login', '', '', '/login', 'guest', 'default', '2013-09-09 14:53:54', '2013-11-07 17:19:14', '2013-09-09 15:25:54', '2013-09-09 14:53:54', NULL),
(88, NULL, 1, 10, 11, 'Logout', NULL, 'Logout', '', '', '/logout', 'user', 'default', '2013-09-10 15:09:27', '2013-11-07 17:19:14', '2013-09-10 15:09:27', NULL, NULL),
(92, NULL, 1, 4, 5, 'News', NULL, 'News', NULL, NULL, 'news', 'all', 'news', '2013-10-02 15:38:16', '2013-11-07 17:19:14', '2013-10-02 15:38:16', '2013-10-02 15:38:16', NULL),
(102, NULL, 1, 6, 7, 'About Us', NULL, 'About Us', '', '', 'about-us', 'all', '3col', '2013-10-17 17:56:54', '2013-11-07 17:19:14', '2013-10-17 17:56:54', '2013-10-17 17:56:54', NULL),
(103, NULL, 1, 12, 13, 'Test page', NULL, 'Test Page Title', '', '', 'test-page', 'all', '3col', '2013-11-06 16:14:48', '2013-11-07 17:19:14', '2013-11-06 16:14:48', '2013-11-06 16:14:48', NULL),
(104, NULL, 1, 14, 15, 'Contact', NULL, 'Contact Us', '', '', 'contact', 'all', 'contact', '2013-11-07 09:35:51', '2013-11-07 17:19:14', '2013-11-07 09:35:51', '2013-11-07 09:35:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_menu`
--

CREATE TABLE IF NOT EXISTS `page_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) unsigned NOT NULL,
  `menu_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `page_menu`
--

INSERT INTO `page_menu` (`id`, `page_id`, `menu_id`) VALUES
(24, 82, 1),
(34, 92, 1),
(44, 102, 1),
(45, 103, 1),
(46, 104, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `old_email` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('subscriber','user','landlord','editor','admin') COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `initial` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_rank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_service_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accessibility` text COLLATE utf8_unicode_ci NOT NULL,
  `date_terms_agreed` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_last_login` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_validation_email_sent` datetime DEFAULT NULL,
  `activation_code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_email_validated` datetime DEFAULT NULL,
  `date_account_expire` datetime DEFAULT NULL,
  `date_revert` datetime DEFAULT NULL,
  `date_reset` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `reset_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `revert_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `old_email`, `password`, `role`, `username`, `title`, `initial`, `firstname`, `lastname`, `address1`, `address2`, `area`, `city`, `county`, `postcode`, `country`, `phone_number`, `personnel_type`, `personnel_rank`, `personnel_service_number`, `personnel_unit`, `accessibility`, `date_terms_agreed`, `date_updated`, `date_last_login`, `date_created`, `date_validation_email_sent`, `activation_code`, `date_email_validated`, `date_account_expire`, `date_revert`, `date_reset`, `date_deleted`, `reset_code`, `revert_code`) VALUES
(38, 'admin@giveustime.org.uk', NULL, '$2a$08$MztAbFdWk.iYzPWgQ8YZ5.sg64Wt1iD.k4dcgRzeRPFy3.8./LpLa', 'admin', 'admin', 'MR', 'A', 'Admin', 'User', 'Test', 'test', 'test', 'test', 'test', 'test', 'test', '0117', ' ', ' ', ' ', ' ', ' ', '2013-10-16 00:00:00', '2013-11-06 17:03:53', '2013-11-06 17:03:53', '2013-10-16 00:00:00', '2013-10-16 00:00:00', NULL, '2013-10-16 00:00:00', NULL, NULL, NULL, NULL, '100', '100'),
(39, 'robin@fanaticdesign.co.uk', NULL, '$2a$08$demRry8RMQTp79hOLZfFg.wgem4FrxHBZTpF1em.6BxViMBDqzcyG', 'landlord', '', '', '', 'Robin', 'Cox', '123 ', '123 street', '123ish', 'Bristol', 'Avon', 'BS4 4HK', 'England', '012 34 56 78 101', '', '', '', '', '', '2013-10-16 15:56:27', '2013-10-17 17:03:50', NULL, '2013-10-16 15:56:27', '2013-10-16 15:56:27', NULL, '2013-10-16 15:57:20', NULL, NULL, NULL, '2013-10-17 17:03:50', '', '3ad69a780666576f18fc4f48e4590709'),
(42, 'holly@fanaticdesign.co.uk', NULL, '$2a$08$cvNCKnpmUmCRINx2ghXhTeTzhwA6cxikKL.Uxak22v6S3noZXOM2i', 'landlord', '', '', '', 'holly', 'baynton', 'loft 3', 'tobacco factory', 'bedminster', 'bristol', 'bristol', 'bs3 1tf', 'uk', '01179532003', '', '', '', '', '', '2013-10-16 16:13:10', '2013-10-31 21:59:09', '2013-10-31 21:59:09', '2013-10-16 16:13:10', '2013-10-16 16:13:10', NULL, '2013-10-16 16:14:19', NULL, NULL, NULL, NULL, '', ''),
(43, 'holly.baynton@gmail.com', NULL, '$2a$08$YC97KavWE9IgopHfsJgdx.zbE9RLYyCbNU4yv3YG6kJODnQThq5aC', 'user', '', 'Miss', 'H', '', 'Baynton', '', '', '', '', '', '', '', '0117 9532003', 'serving', 'Able Seaman', '23232323', 'big ship in sea', 'None', '2013-10-16 16:37:04', '2013-10-18 08:23:37', '2013-10-18 08:23:37', '2013-10-16 16:37:04', '2013-10-16 16:37:04', NULL, '2013-10-16 16:37:22', NULL, NULL, NULL, NULL, '', ''),
(45, 'hay.karen@sky.com', NULL, '$2a$08$P2cJScsnKCg3.zmq771fcePguVfViKnhpxCmCEyz24NbGAy/AStUK', 'user', '', 'Mr', 'I', '', 'Hay', '', '', '', '', '', '', '', '07973 183360', 'serving', 'Colour Sergeant', '18445678', 'Cattrick', '', '2013-10-17 15:59:08', '2013-10-18 09:08:09', '2013-10-18 09:08:09', '2013-10-17 15:59:08', '2013-10-17 15:59:08', NULL, '2013-10-17 16:04:05', NULL, NULL, NULL, NULL, '', ''),
(48, 'elizabethnichol@outlook.com', NULL, '$2a$08$PyaZ/l6bw1bWJ85cDaxqqemCTAbGF0ktwFREA7cgLnI/jl1DjgomG', 'user', '', 'mr', 'p', '', 'smith', '', '', '', '', '', '', '', '01234 567890', 'serving', 'Airman', '123456', 'eagle', '', '2013-10-18 09:10:14', NULL, NULL, '2013-10-18 09:10:14', '2013-10-18 09:10:14', 'a2cdf8019e986ff4b05f1c5aa9d02c15', NULL, NULL, NULL, NULL, NULL, '', ''),
(49, 'jackstowey@gmail.com', NULL, '$2a$08$fBOMMHKRZTznEml1QQle6O4t8TS3LAQLsU03nNHYuzv8kTtBXT1hq', 'landlord', '', '', '', 'Jack', 'Stowey', '', '', '', '', '', '', '', '1234', '', '', '', '', '', '2013-10-18 09:14:44', '2013-10-18 09:24:17', '2013-10-18 09:24:17', '2013-10-18 09:14:44', '2013-10-18 09:14:44', NULL, '2013-10-18 09:14:55', NULL, NULL, NULL, NULL, '', ''),
(50, 'wizbob@hotmail.com', NULL, '$2a$08$3y3lcsgcRSqt.HqpKiMat.w91f9g3zxsV7RQCB5gDqtBqkkROflSO', 'landlord', '', '', '', 'lizzy', 'nichol', '', '', '', '', '', '', '', '01234 567890', '', '', '', '', '', '2013-10-18 09:22:11', '2013-10-18 09:26:51', '2013-10-18 09:26:51', '2013-10-18 09:22:11', '2013-10-18 09:22:11', NULL, '2013-10-18 09:23:43', NULL, NULL, NULL, NULL, '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_block`
--
ALTER TABLE `area_block`
  ADD CONSTRAINT `area` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `block` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `content_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `old_link`
--
ALTER TABLE `old_link`
  ADD CONSTRAINT `redirect` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_menu`
--
ALTER TABLE `page_menu`
  ADD CONSTRAINT `page` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
