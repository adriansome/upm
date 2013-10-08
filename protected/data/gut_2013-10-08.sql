-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2013 at 01:09 PM
-- Server version: 5.5.32-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.3

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
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) unsigned NOT NULL,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `name`, `scope`, `page_id`, `date_created`, `date_updated`, `date_active`, `date_deleted`) VALUES
(1, 'nugget-support', 'page', 82, '2013-09-30 13:49:32', NULL, NULL, NULL),
(3, 'blog item', 'section', NULL, '2013-09-30 14:46:05', NULL, NULL, NULL),
(4, 'nugget-2col', 'page', 82, '2013-10-06 17:36:00', NULL, NULL, NULL),
(5, 'message-from-liam-image', 'page', 82, '2013-10-06 17:36:01', NULL, NULL, NULL),
(6, 'message-from-liam-heading', 'page', 82, '2013-10-06 17:36:01', NULL, NULL, NULL),
(7, 'message-from-liam-text', 'page', 82, '2013-10-06 17:36:01', NULL, NULL, NULL),
(8, 'message-from-liam-more-link', 'page', 82, '2013-10-06 17:36:01', NULL, NULL, NULL),
(9, 'video-thumbnail', 'page', 82, '2013-10-06 17:36:02', NULL, NULL, NULL),
(10, 'news item', 'section', NULL, '2013-10-06 21:21:07', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`, `block_id`, `type_id`, `string_value`, `date_value`, `boolean_value`, `file_value`, `date_created`, `date_updated`, `date_active`, `date_deleted`) VALUES
(1, 'title', 1, 1, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(2, 'title_is_link', 1, 5, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(3, 'text', 1, 6, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(4, 'href', 1, 1, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(5, 'target', 1, 5, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(6, 'link_in_body', 1, 5, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(7, 'link_title', 1, 1, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(8, 'link_text', 1, 1, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(9, 'image_src', 1, 3, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(10, 'image_alt', 1, 1, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(11, 'image_title', 1, 1, NULL, NULL, NULL, NULL, '2013-09-30 13:49:32', NULL, NULL, NULL),
(15, 'title', 3, 1, NULL, NULL, NULL, '/assets/source/nugget-stories.jpg', '2013-09-30 14:46:05', NULL, NULL, NULL),
(16, 'text', 3, 2, 'Test Image', NULL, NULL, NULL, '2013-09-30 14:46:05', NULL, NULL, NULL),
(17, 'image', 3, 3, 'Nuggets Nuggets Nuggets!', NULL, NULL, NULL, '2013-09-30 14:46:05', NULL, NULL, NULL),
(18, 'title', 4, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(19, 'title_is_link', 4, 5, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(20, 'text', 4, 6, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(21, 'href', 4, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(22, 'target', 4, 5, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(23, 'link_in_body', 4, 5, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(24, 'link_title', 4, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(25, 'link_text', 4, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(26, 'image_src', 4, 3, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(27, 'image_alt', 4, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(28, 'image_title', 4, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(29, 'image', 5, 3, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(30, 'alt', 5, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(31, 'title', 5, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(32, 'text', 6, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(33, 'text', 7, 2, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(34, 'href', 8, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:01', NULL, NULL, NULL),
(35, 'title', 8, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:02', NULL, NULL, NULL),
(36, 'text', 8, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:02', NULL, NULL, NULL),
(37, 'target', 8, 5, NULL, NULL, NULL, NULL, '2013-10-06 17:36:02', NULL, NULL, NULL),
(38, 'image', 9, 3, NULL, NULL, NULL, NULL, '2013-10-06 17:36:02', NULL, NULL, NULL),
(39, 'alt', 9, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:02', NULL, NULL, NULL),
(40, 'title', 9, 1, NULL, NULL, NULL, NULL, '2013-10-06 17:36:02', NULL, NULL, NULL),
(41, 'title', 10, 1, 'Blog Post', NULL, NULL, NULL, '2013-10-06 21:21:08', '2013-10-06 22:05:17', NULL, NULL),
(42, 'short_headline', 10, 1, 'Headline', NULL, NULL, NULL, '2013-10-06 21:21:08', '2013-10-06 22:05:17', NULL, NULL),
(43, 'summary', 10, 6, 'Text here for blog post', NULL, NULL, NULL, '2013-10-06 21:21:08', '2013-10-06 22:05:17', NULL, NULL),
(44, 'full_story', 10, 2, '<p>Full story goes here</p>', NULL, NULL, NULL, '2013-10-06 21:21:08', '2013-10-06 22:05:18', NULL, NULL),
(45, 'full_image', 10, 3, NULL, NULL, NULL, '/assets/source/cookie-monster.jpg', '2013-10-06 21:21:08', '2013-10-06 22:05:18', NULL, NULL),
(46, 'date', 10, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-06 21:21:08', '2013-10-06 22:05:18', NULL, NULL),
(47, 'live_on_site', 10, 5, NULL, NULL, 1, NULL, '2013-10-06 21:21:08', '2013-10-06 22:05:18', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `content_type`
--

INSERT INTO `content_type` (`id`, `name`, `date_created`, `date_updated`, `date_active`, `date_deleted`) VALUES
(1, 'singleline', '2013-09-05 12:06:47', '2013-09-05 12:06:47', '2013-09-05 12:06:47', NULL),
(2, 'html', '2013-09-05 12:06:47', '2013-09-05 12:06:47', '2013-09-05 12:06:47', NULL),
(3, 'file', '2013-09-05 12:07:24', '2013-09-05 12:07:24', '2013-09-05 12:07:24', NULL),
(4, 'date', '2013-09-05 12:07:24', '2013-09-05 12:07:24', '2013-09-05 12:07:24', NULL),
(5, 'boolean', '2013-09-05 12:07:37', '2013-09-05 12:07:37', '2013-09-05 12:07:37', NULL),
(6, 'multiline', '2013-09-05 12:07:37', '2013-09-05 12:07:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=90 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `parent_id`, `depth`, `lft`, `rgt`, `name`, `target`, `window_title`, `meta_description`, `meta_keywords`, `link`, `role`, `layout`, `date_created`, `date_updated`, `date_active`, `date_visible`, `date_subpages`) VALUES
(82, NULL, 1, 2, 3, 'Home', NULL, 'Home', 'The new fridge home page.', 'new,fridge,home,page,example,template', '/', 'all', 'home', '2013-09-05 11:20:36', '2013-09-16 19:02:19', '2013-09-05 11:20:36', '2013-09-10 10:11:01', NULL),
(84, NULL, 1, 8, 11, 'Login', NULL, 'Login', '', '', '/login', 'guest', 'default', '2013-09-09 14:53:54', '2013-09-16 19:02:20', '2013-09-09 15:25:54', '2013-09-09 14:53:54', '2013-09-09 14:53:54'),
(85, 84, 2, 9, 10, 'Forgotten Credentials', NULL, 'Forgotten Credentials', '', '', '/login/forgotten-credentials', 'guest', 'default', '2013-09-09 14:59:22', '2013-09-16 19:02:20', '2013-09-09 15:47:33', '2013-09-09 14:59:22', NULL),
(86, NULL, 1, 6, 7, 'Register', NULL, 'Register', '', '', '/register', 'guest', 'default', '2013-09-09 16:06:29', '2013-09-16 19:02:19', '2013-09-09 16:06:29', '2013-09-09 16:06:29', NULL),
(87, NULL, 1, 4, 5, 'Contact Us', NULL, 'Contact Us', '', '', '/contact', 'all', 'default', '2013-09-09 16:07:23', '2013-09-16 19:02:19', '2013-09-09 21:40:35', '2013-09-09 21:34:27', NULL),
(88, NULL, 1, 12, 13, 'Logout', NULL, 'Logout', '', '', '/logout', 'user', 'default', '2013-09-10 15:09:27', '2013-09-16 19:02:20', '2013-09-10 15:09:27', '2013-09-10 15:09:27', '2013-09-16 19:01:45'),
(89, NULL, 1, 14, 15, 'News', NULL, 'News', '', '', 'news', 'all', 'news', '2013-10-06 21:18:56', NULL, '2013-10-06 21:18:56', '2013-10-06 21:18:56', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `page_menu`
--

INSERT INTO `page_menu` (`id`, `page_id`, `menu_id`) VALUES
(24, 82, 1),
(25, 87, 1),
(26, 86, 1),
(27, 84, 1),
(29, 88, 1),
(30, 89, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `old_email`, `password`, `role`, `username`, `title`, `initial`, `firstname`, `lastname`, `address1`, `address2`, `area`, `city`, `county`, `postcode`, `country`, `phone_number`, `personnel_type`, `personnel_rank`, `personnel_service_number`, `personnel_unit`, `accessibility`, `date_terms_agreed`, `date_updated`, `date_last_login`, `date_created`, `date_validation_email_sent`, `activation_code`, `date_email_validated`, `date_account_expire`, `date_revert`, `date_reset`, `date_deleted`, `reset_code`, `revert_code`) VALUES
(2, 'mail@mattbiddle.cc', 'matt@fanaticdesign.co.uk', '$2a$08$MztAbFdWk.iYzPWgQ8YZ5.sg64Wt1iD.k4dcgRzeRPFy3.8./LpLa', 'admin', 'admin', '', '', 'Fanatic', 'Design', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-08-27 09:52:45', '2013-10-07 09:21:25', '2013-10-07 09:21:25', '2013-08-27 09:52:45', '2013-08-27 09:52:45', NULL, '2013-08-27 09:53:08', NULL, '2013-08-28 11:55:48', NULL, NULL, '', ''),
(4, 'matt@fanaticdesign.co.uk', NULL, '$2a$08$HoaNUGRgV.dJjHjJBoul0ezqjL1fRyJTd/rGyBLIYX.o.KbZ7QjUe', 'user', 'demo', '', '', 'Demo', 'User', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-08-28 12:10:04', '2013-09-11 22:56:13', '2013-09-11 22:56:13', '2013-08-28 12:10:04', '2013-08-28 12:10:04', NULL, '2013-09-02 10:52:11', NULL, NULL, '2013-09-09 12:32:13', NULL, '70ab6997e21e800279dac063b1cda168', ''),
(5, 'jack@mightysquid.com', NULL, '$2a$08$zMIutE04QVm5xvUJydrDDeFWeJOh5QKeT6ZhY0uCA489NuLQypBoi', 'user', '', 'TEST', 'TEST', '', 'TEST', '', '', '', '', '', '', '', '01293 873771', 'none', 'none', 'SERVICE NUMBER', 'UNIT', '', '2013-10-08 09:36:15', NULL, NULL, '2013-10-08 09:36:15', '2013-10-08 09:36:15', 'b45f528ad01e6f305bd4c2f2740e07fa', NULL, NULL, NULL, NULL, NULL, '', ''),
(6, 'jack@test.com', NULL, '$2a$08$yx0lve4BKslPGEgUswVIvujImfc3ZkU5mlO4nDSwnjoXQrW773ydi', 'user', '', 'MR', 'J', '', 'SURNAME', '', '', '', '', '', '', '', '01275 99131', 'veteran', 'Chief Petty Officer', 'SERVIC', 'NUMBA', 'Accessibility', '2013-10-08 09:56:22', NULL, NULL, '2013-10-08 09:56:22', '2013-10-08 09:56:22', '2205db7c8fd8e85254c2d28b69fc3379', NULL, NULL, NULL, NULL, NULL, '', ''),
(7, 'jack@example.com', NULL, '$2a$08$Bn3FfAAr.EiYFDvaxLh1COPpGSbRdbSOvo5oqNEbSpuOt9KibkTDO', 'user', '', 'TITLE', 'J', '', 'SURNAME', '', '', '', '', '', '', '', '0122211', 'widow', 'Corporal', 'SERV', 'UNIT', '', '2013-10-08 12:43:43', NULL, NULL, '2013-10-08 12:43:43', '2013-10-08 12:43:43', '6cd474bb62468fa6cb1de06938759b7c', NULL, NULL, NULL, NULL, NULL, '', '');

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
-- Constraints for table `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `block_page` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `parent` FOREIGN KEY (`parent_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_menu`
--
ALTER TABLE `page_menu`
  ADD CONSTRAINT `page` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
