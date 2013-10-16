-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2013 at 03:35 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=75 ;

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
(54, 'news item', 'section', NULL, '2013-10-11 16:58:10', NULL, NULL, NULL),
(55, 'news item', 'section', NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(56, 'news item', 'section', NULL, '2013-10-12 14:32:07', NULL, NULL, NULL),
(73, 'properties item', 'section', NULL, '2013-10-16 14:38:24', NULL, NULL, NULL),
(74, 'holidays item', 'section', NULL, '2013-10-16 14:38:56', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=765 ;

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
(47, 'live_on_site', 10, 5, NULL, NULL, 1, NULL, '2013-10-06 21:21:08', '2013-10-06 22:05:18', NULL, NULL),
(257, 'title', 38, 1, 'updated slus', NULL, NULL, NULL, '2013-10-10 12:37:54', '2013-10-11 15:49:54', NULL, NULL),
(258, 'short_headline', 38, 1, 'HEADLINE', NULL, NULL, NULL, '2013-10-10 12:37:54', '2013-10-11 15:49:54', NULL, NULL),
(259, 'summary', 38, 6, 'summary', NULL, NULL, NULL, '2013-10-10 12:37:54', '2013-10-11 15:49:54', NULL, NULL),
(260, 'full_story', 38, 2, '', NULL, NULL, NULL, '2013-10-10 12:37:54', '2013-10-11 15:49:54', NULL, NULL),
(261, 'full_image', 38, 3, NULL, NULL, NULL, '', '2013-10-10 12:37:54', '2013-10-11 15:49:55', NULL, NULL),
(262, 'date', 38, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-10 12:37:54', '2013-10-11 15:49:55', NULL, NULL),
(263, 'live_on_site', 38, 5, NULL, NULL, 0, NULL, '2013-10-10 12:37:54', '2013-10-11 15:49:55', NULL, NULL),
(264, 'slug', 38, 7, 'updated-slug', NULL, NULL, NULL, '2013-10-10 12:37:54', '2013-10-11 15:49:55', NULL, NULL),
(446, 'title', 51, 1, 'New property', NULL, NULL, NULL, '2013-10-11 16:45:32', NULL, NULL, NULL),
(447, 'area', 51, 1, '', NULL, NULL, NULL, '2013-10-11 16:45:32', NULL, NULL, NULL),
(448, 'city', 51, 1, '', NULL, NULL, NULL, '2013-10-11 16:45:32', NULL, NULL, NULL),
(449, 'county', 51, 1, '', NULL, NULL, NULL, '2013-10-11 16:45:32', NULL, NULL, NULL),
(450, 'country', 51, 1, '', NULL, NULL, NULL, '2013-10-11 16:45:32', NULL, NULL, NULL),
(451, 'description', 51, 6, '', NULL, NULL, NULL, '2013-10-11 16:45:32', NULL, NULL, NULL),
(452, 'additional_info', 51, 6, '', NULL, NULL, NULL, '2013-10-11 16:45:32', NULL, NULL, NULL),
(453, 'facilities', 51, 6, '', NULL, NULL, NULL, '2013-10-11 16:45:32', NULL, NULL, NULL),
(454, 'accessibility', 51, 6, '', NULL, NULL, NULL, '2013-10-11 16:45:33', NULL, NULL, NULL),
(455, 'image', 51, 3, NULL, NULL, NULL, '', '2013-10-11 16:45:33', NULL, NULL, NULL),
(456, 'welcome_pack', 51, 3, NULL, NULL, NULL, '', '2013-10-11 16:45:33', NULL, NULL, NULL),
(457, 'extras', 51, 6, '', NULL, NULL, NULL, '2013-10-11 16:45:33', NULL, NULL, NULL),
(458, 'date', 51, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-11 16:45:33', NULL, NULL, NULL),
(459, 'live_on_site', 51, 5, NULL, NULL, 0, NULL, '2013-10-11 16:45:33', NULL, NULL, NULL),
(460, 'user_id', 51, 7, '8', NULL, NULL, NULL, '2013-10-11 16:45:33', NULL, NULL, NULL),
(461, 'slug', 51, 7, NULL, NULL, NULL, NULL, '2013-10-11 16:45:33', NULL, NULL, NULL),
(462, 'title', 52, 1, 'Slug field will appear now', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(463, 'area', 52, 1, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(464, 'city', 52, 1, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(465, 'county', 52, 1, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(466, 'country', 52, 1, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(467, 'description', 52, 6, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(468, 'additional_info', 52, 6, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(469, 'facilities', 52, 6, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(470, 'accessibility', 52, 6, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(471, 'image', 52, 3, NULL, NULL, NULL, '', '2013-10-11 16:54:54', NULL, NULL, NULL),
(472, 'welcome_pack', 52, 3, NULL, NULL, NULL, '', '2013-10-11 16:54:54', NULL, NULL, NULL),
(473, 'extras', 52, 6, '', NULL, NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(474, 'date', 52, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(475, 'live_on_site', 52, 5, NULL, NULL, 0, NULL, '2013-10-11 16:54:54', NULL, NULL, NULL),
(476, 'user_id', 52, 7, '8', NULL, NULL, NULL, '2013-10-11 16:54:55', NULL, NULL, NULL),
(477, 'slug', 52, 7, 'slug-field-will-appear-now', NULL, NULL, NULL, '2013-10-11 16:54:55', NULL, NULL, NULL),
(478, 'title', 53, 1, 'New item with pretty url', NULL, NULL, NULL, '2013-10-11 16:56:49', NULL, NULL, NULL),
(479, 'short_headline', 53, 1, '', NULL, NULL, NULL, '2013-10-11 16:56:49', NULL, NULL, NULL),
(480, 'summary', 53, 6, '', NULL, NULL, NULL, '2013-10-11 16:56:49', NULL, NULL, NULL),
(481, 'full_story', 53, 2, '', NULL, NULL, NULL, '2013-10-11 16:56:49', NULL, NULL, NULL),
(482, 'full_image', 53, 3, NULL, NULL, NULL, '', '2013-10-11 16:56:49', NULL, NULL, NULL),
(483, 'date', 53, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-11 16:56:49', NULL, NULL, NULL),
(484, 'live_on_site', 53, 5, NULL, NULL, 0, NULL, '2013-10-11 16:56:49', NULL, NULL, NULL),
(485, 'slug', 53, 7, '', NULL, NULL, NULL, '2013-10-11 16:56:49', NULL, NULL, NULL),
(486, 'slug', 53, 7, 'new-item-with-pretty-url', NULL, NULL, NULL, '2013-10-11 16:56:49', NULL, NULL, NULL),
(487, 'title', 54, 1, 'Edited slug', NULL, NULL, NULL, '2013-10-11 16:58:10', '2013-10-12 13:06:13', NULL, NULL),
(488, 'short_headline', 54, 1, '', NULL, NULL, NULL, '2013-10-11 16:58:10', '2013-10-12 13:06:13', NULL, NULL),
(489, 'summary', 54, 6, '', NULL, NULL, NULL, '2013-10-11 16:58:10', '2013-10-12 13:06:13', NULL, NULL),
(490, 'full_story', 54, 2, '', NULL, NULL, NULL, '2013-10-11 16:58:10', '2013-10-12 13:06:13', NULL, NULL),
(491, 'full_image', 54, 3, NULL, NULL, NULL, '', '2013-10-11 16:58:10', '2013-10-12 13:06:13', NULL, NULL),
(492, 'date', 54, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-11 16:58:10', '2013-10-12 13:06:13', NULL, NULL),
(493, 'live_on_site', 54, 5, NULL, NULL, 0, NULL, '2013-10-11 16:58:10', '2013-10-12 13:06:13', NULL, NULL),
(494, 'slug', 54, 7, 'edited-slug', NULL, NULL, NULL, '2013-10-11 16:58:10', '2013-10-12 13:06:13', NULL, NULL),
(495, 'title', 55, 1, 'New item stuff', NULL, NULL, NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(496, 'short_headline', 55, 1, '', NULL, NULL, NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(497, 'summary', 55, 6, '', NULL, NULL, NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(498, 'full_story', 55, 2, '', NULL, NULL, NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(499, 'full_image', 55, 3, NULL, NULL, NULL, '', '2013-10-12 14:13:10', NULL, NULL, NULL),
(500, 'date', 55, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(501, 'live_on_site', 55, 5, NULL, NULL, 0, NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(502, 'slug', 55, 7, '', NULL, NULL, NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(503, 'slug', 55, 7, 'new-item-stuff', NULL, NULL, NULL, '2013-10-12 14:13:10', NULL, NULL, NULL),
(504, 'title', 56, 1, 'New item stuff', NULL, NULL, NULL, '2013-10-12 14:32:07', NULL, NULL, NULL),
(505, 'short_headline', 56, 1, '', NULL, NULL, NULL, '2013-10-12 14:32:07', NULL, NULL, NULL),
(506, 'summary', 56, 6, '', NULL, NULL, NULL, '2013-10-12 14:32:07', NULL, NULL, NULL),
(507, 'full_story', 56, 2, '', NULL, NULL, NULL, '2013-10-12 14:32:07', NULL, NULL, NULL),
(508, 'full_image', 56, 3, NULL, NULL, NULL, '', '2013-10-12 14:32:08', NULL, NULL, NULL),
(509, 'date', 56, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-12 14:32:08', NULL, NULL, NULL),
(510, 'live_on_site', 56, 5, NULL, NULL, 0, NULL, '2013-10-12 14:32:08', NULL, NULL, NULL),
(511, 'slug', 56, 7, 'new-item-stuff', NULL, NULL, NULL, '2013-10-12 14:32:08', NULL, NULL, NULL),
(512, 'title', 57, 1, 'Bella Della', NULL, NULL, NULL, '2013-10-13 21:20:28', '2013-10-14 09:10:47', NULL, NULL),
(513, 'location', 57, 8, '1', NULL, NULL, NULL, '2013-10-13 21:20:28', '2013-10-14 09:10:47', NULL, NULL),
(514, 'type', 57, 8, '1', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(515, 'area', 57, 1, 'Marbella', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(516, 'city', 57, 1, '', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(517, 'county', 57, 1, '', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(518, 'country', 57, 1, '', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(519, 'description', 57, 6, '', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(520, 'additional_info', 57, 6, '', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(521, 'facilities', 57, 6, '', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(522, 'accessibility', 57, 6, '', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(523, 'image', 57, 3, NULL, NULL, NULL, '', '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(524, 'welcome_pack', 57, 3, NULL, NULL, NULL, '', '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(525, 'extras', 57, 6, '', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:47', NULL, NULL),
(526, 'date', 57, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:48', NULL, NULL),
(527, 'live_on_site', 57, 5, NULL, NULL, 0, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:48', NULL, NULL),
(528, 'user_id', 57, 7, '8', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:48', NULL, NULL),
(529, 'slug', 57, 7, 'bella-della', NULL, NULL, NULL, '2013-10-13 21:20:29', '2013-10-14 09:10:48', NULL, NULL),
(530, 'arrival_date', 58, 4, NULL, '2013-10-13 00:00:00', NULL, NULL, '2013-10-13 21:20:54', NULL, NULL, NULL),
(531, 'departure_date', 58, 4, NULL, '2013-10-20 00:00:00', NULL, NULL, '2013-10-13 21:20:54', NULL, NULL, NULL),
(532, 'type', 58, 8, '1', NULL, NULL, NULL, '2013-10-13 21:20:54', NULL, NULL, NULL),
(533, 'status', 58, 7, 'booked', NULL, NULL, NULL, '2013-10-13 21:20:54', '2013-10-14 09:18:21', NULL, NULL),
(534, 'number_of_bedrooms', 58, 1, '', NULL, NULL, NULL, '2013-10-13 21:20:54', NULL, NULL, NULL),
(535, 'sleeps_number', 58, 1, '', NULL, NULL, NULL, '2013-10-13 21:20:55', NULL, NULL, NULL),
(536, 'property_id', 58, 7, '57', NULL, NULL, NULL, '2013-10-13 21:20:55', NULL, NULL, NULL),
(537, 'booked_by', 58, 7, '', NULL, NULL, NULL, '2013-10-13 21:20:55', NULL, NULL, NULL),
(538, 'title', 58, 7, '', NULL, NULL, NULL, '2013-10-13 21:20:55', NULL, NULL, NULL),
(539, 'slug', 58, 7, '', NULL, NULL, NULL, '2013-10-13 21:20:55', NULL, NULL, NULL),
(540, 'arrival_date', 58, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(541, 'departure_date', 58, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(542, 'type', 58, 8, '1', NULL, NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(543, 'status', 58, 7, 'provisionally-booked', NULL, NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(544, 'number_of_bedrooms', 58, 1, '3', NULL, NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(545, 'sleeps_number', 58, 1, '4', NULL, NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(546, 'property_id', 58, 7, '57', NULL, NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(547, 'booked_by', 58, 7, '8', NULL, NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(548, 'title', 58, 7, '', NULL, NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(549, 'slug', 58, 7, '', NULL, NULL, NULL, '2013-10-14 09:15:54', NULL, NULL, NULL),
(550, 'title', 59, 1, 'Bella Della', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(551, 'location', 59, 8, '1', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(552, 'type', 59, 8, '1', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(553, 'area', 59, 1, 'Marbella', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(554, 'city', 59, 1, '', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(555, 'county', 59, 1, '', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(556, 'country', 59, 1, '', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(557, 'description', 59, 6, 'Amazing location with beautiful views of the sunset.', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(558, 'additional_info', 59, 6, '', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(559, 'facilities', 59, 6, '', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(560, 'accessibility', 59, 6, '', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(561, 'image', 59, 3, NULL, NULL, NULL, '/assets/source/resort-full.jpg', '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(562, 'welcome_pack', 59, 3, NULL, NULL, NULL, '', '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(563, 'extras', 59, 6, '', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:42', NULL, NULL),
(564, 'date', 59, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:43', NULL, NULL),
(565, 'live_on_site', 59, 5, NULL, NULL, 0, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:43', NULL, NULL),
(566, 'user_id', 59, 7, '8', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:43', NULL, NULL),
(567, 'slug', 59, 7, 'bella-della', NULL, NULL, NULL, '2013-10-14 09:52:31', '2013-10-15 15:15:43', NULL, NULL),
(568, 'arrival_date', 60, 4, NULL, '2013-10-15 00:00:00', NULL, NULL, '2013-10-14 09:53:01', NULL, NULL, NULL),
(569, 'departure_date', 60, 4, NULL, '2013-10-25 00:00:00', NULL, NULL, '2013-10-14 09:53:01', NULL, NULL, NULL),
(570, 'type', 60, 8, '1', NULL, NULL, NULL, '2013-10-14 09:53:01', NULL, NULL, NULL),
(571, 'status', 60, 7, 'available', NULL, NULL, NULL, '2013-10-14 09:53:02', '2013-10-14 14:30:00', NULL, NULL),
(572, 'number_of_bedrooms', 60, 1, '2', NULL, NULL, NULL, '2013-10-14 09:53:02', NULL, NULL, NULL),
(573, 'sleeps_number', 60, 1, '4', NULL, NULL, NULL, '2013-10-14 09:53:02', NULL, NULL, NULL),
(574, 'property_id', 60, 7, '59', NULL, NULL, NULL, '2013-10-14 09:53:02', NULL, NULL, NULL),
(575, 'booked_by', 60, 7, '', NULL, NULL, NULL, '2013-10-14 09:53:02', '2013-10-14 14:30:00', NULL, NULL),
(576, 'title', 60, 7, '', NULL, NULL, NULL, '2013-10-14 09:53:02', NULL, NULL, NULL),
(577, 'slug', 60, 7, '', NULL, NULL, NULL, '2013-10-14 09:53:02', NULL, NULL, NULL),
(578, 'title', 61, 1, 'Amazing Flat', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(579, 'location', 61, 8, '2', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(580, 'type', 61, 8, '2', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(581, 'area', 61, 1, 'Marbella', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(582, 'city', 61, 1, 'Madrid', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(583, 'county', 61, 1, 'County', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(584, 'country', 61, 1, 'Spain', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(585, 'description', 61, 6, 'Lovely property', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(586, 'additional_info', 61, 6, '', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(587, 'facilities', 61, 6, '', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(588, 'accessibility', 61, 6, '', NULL, NULL, NULL, '2013-10-14 12:08:58', NULL, NULL, NULL),
(589, 'image', 61, 3, NULL, NULL, NULL, '/assets/source/cookie-monster.jpg', '2013-10-14 12:08:59', NULL, NULL, NULL),
(590, 'welcome_pack', 61, 3, NULL, NULL, NULL, '', '2013-10-14 12:08:59', NULL, NULL, NULL),
(591, 'extras', 61, 6, '', NULL, NULL, NULL, '2013-10-14 12:08:59', NULL, NULL, NULL),
(592, 'date', 61, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 12:08:59', NULL, NULL, NULL),
(593, 'live_on_site', 61, 5, NULL, NULL, 1, NULL, '2013-10-14 12:08:59', NULL, NULL, NULL),
(594, 'user_id', 61, 7, '8', NULL, NULL, NULL, '2013-10-14 12:08:59', NULL, NULL, NULL),
(595, 'slug', 61, 7, 'amazing-flat', NULL, NULL, NULL, '2013-10-14 12:08:59', NULL, NULL, NULL),
(596, 'title', 62, 1, 'Amazing property', NULL, NULL, NULL, '2013-10-14 12:30:13', NULL, NULL, NULL),
(597, 'location', 62, 8, '1', NULL, NULL, NULL, '2013-10-14 12:30:13', NULL, NULL, NULL),
(598, 'type', 62, 8, '2', NULL, NULL, NULL, '2013-10-14 12:30:13', NULL, NULL, NULL),
(599, 'area', 62, 1, 'Marbella', NULL, NULL, NULL, '2013-10-14 12:30:13', NULL, NULL, NULL),
(600, 'city', 62, 1, 'Madrid', NULL, NULL, NULL, '2013-10-14 12:30:13', NULL, NULL, NULL),
(601, 'county', 62, 1, 'Andalucia', NULL, NULL, NULL, '2013-10-14 12:30:13', NULL, NULL, NULL),
(602, 'country', 62, 1, '', NULL, NULL, NULL, '2013-10-14 12:30:13', NULL, NULL, NULL),
(603, 'description', 62, 6, 'Great property with a view of the sea', NULL, NULL, NULL, '2013-10-14 12:30:13', NULL, NULL, NULL),
(604, 'additional_info', 62, 6, '', NULL, NULL, NULL, '2013-10-14 12:30:14', NULL, NULL, NULL),
(605, 'facilities', 62, 6, '', NULL, NULL, NULL, '2013-10-14 12:30:14', NULL, NULL, NULL),
(606, 'accessibility', 62, 6, '', NULL, NULL, NULL, '2013-10-14 12:30:14', NULL, NULL, NULL),
(607, 'image', 62, 3, NULL, NULL, NULL, '', '2013-10-14 12:30:14', NULL, NULL, NULL),
(608, 'welcome_pack', 62, 3, NULL, NULL, NULL, '', '2013-10-14 12:30:14', NULL, NULL, NULL),
(609, 'extras', 62, 6, '', NULL, NULL, NULL, '2013-10-14 12:30:14', NULL, NULL, NULL),
(610, 'date', 62, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 12:30:14', NULL, NULL, NULL),
(611, 'live_on_site', 62, 5, NULL, NULL, 0, NULL, '2013-10-14 12:30:14', NULL, NULL, NULL),
(612, 'user_id', 62, 7, '8', NULL, NULL, NULL, '2013-10-14 12:30:14', NULL, NULL, NULL),
(613, 'slug', 62, 7, 'amazing-property', NULL, NULL, NULL, '2013-10-14 12:30:14', NULL, NULL, NULL),
(614, 'arrival_date', 63, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(615, 'departure_date', 63, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(616, 'type', 63, 8, '1', NULL, NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(617, 'status', 63, 7, 'available', NULL, NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(618, 'number_of_bedrooms', 63, 1, '4', NULL, NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(619, 'sleeps_number', 63, 1, '5', NULL, NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(620, 'property_id', 63, 7, '62', NULL, NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(621, 'booked_by', 63, 7, '', NULL, NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(622, 'title', 63, 7, '', NULL, NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(623, 'slug', 63, 7, '', NULL, NULL, NULL, '2013-10-14 12:30:42', NULL, NULL, NULL),
(624, 'arrival_date', 64, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(625, 'departure_date', 64, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(626, 'type', 64, 8, '1', NULL, NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(627, 'status', 64, 7, 'available', NULL, NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(628, 'number_of_bedrooms', 64, 1, '5', NULL, NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(629, 'sleeps_number', 64, 1, '5', NULL, NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(630, 'property_id', 64, 7, '', NULL, NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(631, 'booked_by', 64, 7, '', NULL, NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(632, 'title', 64, 7, '', NULL, NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(633, 'slug', 64, 7, '', NULL, NULL, NULL, '2013-10-14 14:37:04', NULL, NULL, NULL),
(634, 'arrival_date', 65, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(635, 'departure_date', 65, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(636, 'type', 65, 8, '4', NULL, NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(637, 'status', 65, 7, 'available', NULL, NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(638, 'number_of_bedrooms', 65, 1, '9', NULL, NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(639, 'sleeps_number', 65, 1, '2', NULL, NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(640, 'property_id', 65, 7, '59', NULL, NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(641, 'booked_by', 65, 7, '', NULL, NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(642, 'title', 65, 7, '', NULL, NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(643, 'slug', 65, 7, '', NULL, NULL, NULL, '2013-10-14 14:39:02', NULL, NULL, NULL),
(644, 'arrival_date', 66, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(645, 'departure_date', 66, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(646, 'type', 66, 8, '1', NULL, NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(647, 'status', 66, 7, 'available', NULL, NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(648, 'number_of_bedrooms', 66, 1, '', NULL, NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(649, 'sleeps_number', 66, 1, '', NULL, NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(650, 'property_id', 66, 7, '59', NULL, NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(651, 'booked_by', 66, 7, '', NULL, NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(652, 'title', 66, 7, '', NULL, NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(653, 'slug', 66, 7, '', NULL, NULL, NULL, '2013-10-14 14:40:50', NULL, NULL, NULL),
(654, 'arrival_date', 67, 4, NULL, '2013-10-23 00:00:00', NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(655, 'departure_date', 67, 4, NULL, '2013-10-26 00:00:00', NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(656, 'type', 67, 8, '1', NULL, NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(657, 'status', 67, 7, 'available', NULL, NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(658, 'number_of_bedrooms', 67, 1, '', NULL, NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(659, 'sleeps_number', 67, 1, '', NULL, NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(660, 'property_id', 67, 7, '59', NULL, NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(661, 'booked_by', 67, 7, '', NULL, NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(662, 'title', 67, 7, '', NULL, NULL, NULL, '2013-10-14 14:41:21', NULL, NULL, NULL),
(663, 'slug', 67, 7, '', NULL, NULL, NULL, '2013-10-14 14:41:22', NULL, NULL, NULL),
(664, 'arrival_date', 68, 4, NULL, '2013-10-23 00:00:00', NULL, NULL, '2013-10-14 16:49:32', NULL, NULL, NULL),
(665, 'departure_date', 68, 4, NULL, '2013-10-30 00:00:00', NULL, NULL, '2013-10-14 16:49:32', NULL, NULL, NULL),
(666, 'type', 68, 8, '1', NULL, NULL, NULL, '2013-10-14 16:49:32', NULL, NULL, NULL),
(667, 'status', 68, 7, 'available', NULL, NULL, NULL, '2013-10-14 16:49:32', NULL, NULL, NULL),
(668, 'number_of_bedrooms', 68, 1, '4', NULL, NULL, NULL, '2013-10-14 16:49:32', NULL, NULL, NULL),
(669, 'sleeps_number', 68, 1, '5', NULL, NULL, NULL, '2013-10-14 16:49:33', NULL, NULL, NULL),
(670, 'property_id', 68, 7, '59', NULL, NULL, NULL, '2013-10-14 16:49:33', NULL, NULL, NULL),
(671, 'booked_by', 68, 7, '', NULL, NULL, NULL, '2013-10-14 16:49:33', NULL, NULL, NULL),
(672, 'title', 68, 7, '', NULL, NULL, NULL, '2013-10-14 16:49:33', NULL, NULL, NULL),
(673, 'slug', 68, 7, '', NULL, NULL, NULL, '2013-10-14 16:49:33', NULL, NULL, NULL),
(674, 'title', 69, 1, 'Hotel Luxury', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(675, 'location', 69, 8, '1', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(676, 'type', 69, 8, '1', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(677, 'area', 69, 1, 'Algarve', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(678, 'city', 69, 1, 'Lisbon', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(679, 'county', 69, 1, '', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(680, 'country', 69, 1, 'Portugal', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(681, 'description', 69, 6, 'Beautiful sunset views, dolphin sightings.', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(682, 'additional_info', 69, 6, '', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(683, 'facilities', 69, 6, '', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(684, 'parking', 69, 5, NULL, NULL, 0, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(685, 'accessibility', 69, 6, '', NULL, NULL, NULL, '2013-10-16 12:59:12', NULL, NULL, NULL),
(686, 'image', 69, 3, NULL, NULL, NULL, '', '2013-10-16 12:59:12', NULL, NULL, NULL),
(687, 'welcome_pack', 69, 3, NULL, NULL, NULL, '', '2013-10-16 12:59:13', NULL, NULL, NULL),
(688, 'extras', 69, 6, '', NULL, NULL, NULL, '2013-10-16 12:59:13', NULL, NULL, NULL),
(689, 'date', 69, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-16 12:59:13', NULL, NULL, NULL),
(690, 'live_on_site', 69, 5, NULL, NULL, 0, NULL, '2013-10-16 12:59:13', NULL, NULL, NULL),
(691, 'user_id', 69, 7, '28', NULL, NULL, NULL, '2013-10-16 12:59:13', NULL, NULL, NULL),
(692, 'slug', 69, 7, 'hotel-luxury', NULL, NULL, NULL, '2013-10-16 12:59:13', NULL, NULL, NULL),
(693, 'arrival_date', 70, 4, NULL, '2013-10-21 00:00:00', NULL, NULL, '2013-10-16 13:00:22', '2013-10-16 13:05:36', NULL, NULL),
(694, 'departure_date', 70, 4, NULL, '2013-10-25 00:00:00', NULL, NULL, '2013-10-16 13:00:22', '2013-10-16 13:05:36', NULL, NULL),
(695, 'type', 70, 8, '4', NULL, NULL, NULL, '2013-10-16 13:00:22', '2013-10-16 13:05:37', NULL, NULL),
(696, 'status', 70, 7, 'available', NULL, NULL, NULL, '2013-10-16 13:00:22', '2013-10-16 13:05:37', NULL, NULL),
(697, 'number_of_bedrooms', 70, 1, '4', NULL, NULL, NULL, '2013-10-16 13:00:23', '2013-10-16 13:05:37', NULL, NULL),
(698, 'sleeps_number', 70, 1, '4', NULL, NULL, NULL, '2013-10-16 13:00:23', '2013-10-16 13:05:37', NULL, NULL),
(699, 'property_id', 70, 7, '69', NULL, NULL, NULL, '2013-10-16 13:00:23', '2013-10-16 13:05:37', NULL, NULL),
(700, 'booked_by', 70, 7, '', NULL, NULL, NULL, '2013-10-16 13:00:23', '2013-10-16 13:05:37', NULL, NULL),
(701, 'title', 70, 7, '', NULL, NULL, NULL, '2013-10-16 13:00:23', '2013-10-16 13:05:37', NULL, NULL),
(702, 'slug', 70, 7, '', NULL, NULL, NULL, '2013-10-16 13:00:23', '2013-10-16 13:05:37', NULL, NULL),
(703, 'title', 71, 1, 'Amazing Property', NULL, NULL, NULL, '2013-10-16 13:26:25', NULL, NULL, NULL),
(704, 'location', 71, 8, '1', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(705, 'type', 71, 8, '1', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(706, 'area', 71, 1, '', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(707, 'city', 71, 1, '', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(708, 'county', 71, 1, '', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(709, 'country', 71, 1, '', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(710, 'description', 71, 6, '', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(711, 'additional_info', 71, 6, '', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(712, 'disabled_access', 71, 5, NULL, NULL, 1, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(713, 'beach', 71, 5, NULL, NULL, 1, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(714, 'child-friendly', 71, 5, NULL, NULL, 0, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(715, 'cancellation_fee', 71, 5, NULL, NULL, 0, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(716, 'accessibility', 71, 6, '', NULL, NULL, NULL, '2013-10-16 13:26:26', NULL, NULL, NULL),
(717, 'image', 71, 3, NULL, NULL, NULL, '', '2013-10-16 13:26:26', NULL, NULL, NULL),
(718, 'welcome_pack', 71, 3, NULL, NULL, NULL, '', '2013-10-16 13:26:26', NULL, NULL, NULL),
(719, 'extras', 71, 6, '', NULL, NULL, NULL, '2013-10-16 13:26:27', NULL, NULL, NULL),
(720, 'date', 71, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-16 13:26:27', NULL, NULL, NULL),
(721, 'live_on_site', 71, 5, NULL, NULL, 0, NULL, '2013-10-16 13:26:27', NULL, NULL, NULL),
(722, 'user_id', 71, 7, '28', NULL, NULL, NULL, '2013-10-16 13:26:27', NULL, NULL, NULL),
(723, 'slug', 71, 7, 'amazing-property', NULL, NULL, NULL, '2013-10-16 13:26:27', NULL, NULL, NULL),
(724, 'arrival_date', 72, 4, NULL, '2013-10-23 00:00:00', NULL, NULL, '2013-10-16 13:26:43', NULL, NULL, NULL),
(725, 'departure_date', 72, 4, NULL, '2013-10-30 00:00:00', NULL, NULL, '2013-10-16 13:26:43', NULL, NULL, NULL),
(726, 'type', 72, 8, '2', NULL, NULL, NULL, '2013-10-16 13:26:43', NULL, NULL, NULL),
(727, 'status', 72, 7, 'available', NULL, NULL, NULL, '2013-10-16 13:26:43', NULL, NULL, NULL),
(728, 'number_of_bedrooms', 72, 1, '2', NULL, NULL, NULL, '2013-10-16 13:26:43', NULL, NULL, NULL),
(729, 'sleeps_number', 72, 1, '3', NULL, NULL, NULL, '2013-10-16 13:26:43', NULL, NULL, NULL),
(730, 'property_id', 72, 7, '71', NULL, NULL, NULL, '2013-10-16 13:26:43', NULL, NULL, NULL),
(731, 'booked_by', 72, 7, '', NULL, NULL, NULL, '2013-10-16 13:26:43', NULL, NULL, NULL),
(732, 'title', 72, 7, '', NULL, NULL, NULL, '2013-10-16 13:26:44', NULL, NULL, NULL),
(733, 'slug', 72, 7, '', NULL, NULL, NULL, '2013-10-16 13:26:44', NULL, NULL, NULL),
(734, 'title', 73, 1, 'Bella Della', NULL, NULL, NULL, '2013-10-16 14:38:24', NULL, NULL, NULL),
(735, 'location', 73, 8, '1', NULL, NULL, NULL, '2013-10-16 14:38:24', NULL, NULL, NULL),
(736, 'type', 73, 8, '2', NULL, NULL, NULL, '2013-10-16 14:38:24', NULL, NULL, NULL),
(737, 'area', 73, 1, 'Big Place', NULL, NULL, NULL, '2013-10-16 14:38:24', NULL, NULL, NULL),
(738, 'city', 73, 1, '', NULL, NULL, NULL, '2013-10-16 14:38:24', NULL, NULL, NULL),
(739, 'county', 73, 1, '', NULL, NULL, NULL, '2013-10-16 14:38:24', NULL, NULL, NULL),
(740, 'country', 73, 1, '', NULL, NULL, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(741, 'description', 73, 6, 'I am a description', NULL, NULL, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(742, 'additional_info', 73, 6, 'Additional info goes here', NULL, NULL, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(743, 'disabled_access', 73, 5, NULL, NULL, 1, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(744, 'beach', 73, 5, NULL, NULL, 0, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(745, 'child_friendly', 73, 5, NULL, NULL, 1, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(746, 'cancellation_fee', 73, 5, NULL, NULL, 0, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(747, 'accessibility', 73, 6, '', NULL, NULL, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(748, 'image', 73, 3, NULL, NULL, NULL, '', '2013-10-16 14:38:25', NULL, NULL, NULL),
(749, 'welcome_pack', 73, 3, NULL, NULL, NULL, '', '2013-10-16 14:38:25', NULL, NULL, NULL),
(750, 'extras', 73, 6, '', NULL, NULL, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(751, 'date', 73, 4, NULL, '0000-00-00 00:00:00', NULL, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(752, 'live_on_site', 73, 5, NULL, NULL, 0, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(753, 'user_id', 73, 7, '28', NULL, NULL, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(754, 'slug', 73, 7, 'bella-della', NULL, NULL, NULL, '2013-10-16 14:38:25', NULL, NULL, NULL),
(755, 'arrival_date', 74, 4, NULL, '2013-10-22 00:00:00', NULL, NULL, '2013-10-16 14:38:56', NULL, NULL, NULL),
(756, 'departure_date', 74, 4, NULL, '2013-10-25 00:00:00', NULL, NULL, '2013-10-16 14:38:56', NULL, NULL, NULL),
(757, 'type', 74, 8, '2', NULL, NULL, NULL, '2013-10-16 14:38:56', NULL, NULL, NULL),
(758, 'status', 74, 7, 'available', NULL, NULL, NULL, '2013-10-16 14:38:56', NULL, NULL, NULL),
(759, 'number_of_bedrooms', 74, 1, '4', NULL, NULL, NULL, '2013-10-16 14:38:56', NULL, NULL, NULL),
(760, 'sleeps_number', 74, 1, '6', NULL, NULL, NULL, '2013-10-16 14:38:57', NULL, NULL, NULL),
(761, 'property_id', 74, 7, '73', NULL, NULL, NULL, '2013-10-16 14:38:57', NULL, NULL, NULL),
(762, 'booked_by', 74, 7, '', NULL, NULL, NULL, '2013-10-16 14:38:57', NULL, NULL, NULL),
(763, 'title', 74, 7, '', NULL, NULL, NULL, '2013-10-16 14:38:57', NULL, NULL, NULL),
(764, 'slug', 74, 7, '', NULL, NULL, NULL, '2013-10-16 14:38:57', NULL, NULL, NULL);

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
(7, 'hidden', '2013-10-09 00:00:00', NULL, NULL, NULL),
(8, 'list', '2013-10-12 14:12:00', NULL, NULL, NULL);

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
  `role` enum('all','guest','subscriber','user','landlord') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'all',
  `layout` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_active` datetime DEFAULT NULL,
  `date_visible` datetime DEFAULT NULL,
  `date_subpages` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=92 ;

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
(89, NULL, 1, 14, 15, 'News', NULL, 'News', '', '', 'news', 'all', 'news', '2013-10-06 21:18:56', NULL, '2013-10-06 21:18:56', '2013-10-06 21:18:56', NULL),
(90, NULL, 1, 16, 17, 'Search', NULL, 'Search Results', '', '', 'search', 'all', 'search', '2013-10-14 10:43:41', NULL, '2013-10-14 10:43:41', '2013-10-14 10:43:41', NULL),
(91, NULL, 1, 18, 19, 'Properties', NULL, 'Properties', '', '', 'properties', 'all', 'properties', '2013-10-14 10:50:18', NULL, '2013-10-14 10:50:18', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `old_email`, `password`, `role`, `username`, `title`, `initial`, `firstname`, `lastname`, `address1`, `address2`, `area`, `city`, `county`, `postcode`, `country`, `phone_number`, `personnel_type`, `personnel_rank`, `personnel_service_number`, `personnel_unit`, `accessibility`, `date_terms_agreed`, `date_updated`, `date_last_login`, `date_created`, `date_validation_email_sent`, `activation_code`, `date_email_validated`, `date_account_expire`, `date_revert`, `date_reset`, `date_deleted`, `reset_code`, `revert_code`) VALUES
(2, 'demo@test.com', 'matt@fanaticdesign.co.uk', '$2a$08$MztAbFdWk.iYzPWgQ8YZ5.sg64Wt1iD.k4dcgRzeRPFy3.8./LpLa', 'admin', 'admin', '', '', 'Fanatic', 'Design', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-08-27 09:52:45', '2013-10-07 09:21:25', '2013-10-07 09:21:25', '2013-08-27 09:52:45', '2013-08-27 09:52:45', NULL, '2013-08-27 09:53:08', NULL, '2013-08-28 11:55:48', NULL, NULL, '', ''),
(4, 'matt@fanaticdesign.co.uk', NULL, '$2a$08$HoaNUGRgV.dJjHjJBoul0ezqjL1fRyJTd/rGyBLIYX.o.KbZ7QjUe', 'user', 'demo', '', '', 'Demo', 'User', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-08-28 12:10:04', '2013-09-11 22:56:13', '2013-09-11 22:56:13', '2013-08-28 12:10:04', '2013-08-28 12:10:04', NULL, '2013-09-02 10:52:11', NULL, NULL, '2013-09-09 12:32:13', NULL, '70ab6997e21e800279dac063b1cda168', ''),
(9, 'test@example.com', NULL, '$2a$08$KJeKgRAgXTTIcKdcG8F3N.aJV3497h5FDgQ/ZTAFfljGASSxMc0BG', 'user', '', 'MR', 'J', '', 'SURNAME', '', '', '', '', '', '', '', '01275 393473', 'serving', 'Colour Sergeant', 'SERV', 'UNIT', 'access', '2013-10-14 10:19:42', NULL, NULL, '2013-10-14 10:19:42', '2013-10-14 10:19:42', '5656c408172c16ec75b780d90d1107ac', NULL, NULL, NULL, NULL, NULL, '', ''),
(12, 'jackstowey@gmail.com', NULL, '$2a$08$NOUG20RHeaVPL.QeZBNvDO8qWAl5HXWFmnnnha9o6XIPsEsVb8ita', 'user', '', 'MR', 'J', '', 'STOWEY', '', '', '', '', '', '', '', '01235 191781', 'serving', 'Airman', 'SERV', 'UNIT', 'access', '2013-10-15 17:24:54', NULL, NULL, '2013-10-15 17:24:54', '2013-10-15 17:24:54', '320647e46482a618d50431a377e9134e', '2013-10-23 00:00:00', NULL, NULL, NULL, NULL, '', ''),
(28, 'jack@mightysquid.com', NULL, '$2a$08$3C/Dg5Ubg9iro78BYXwCLeI8b5hs2T5/74AYY/2KjQP8gDcJmt6VK', 'landlord', '', '', '', 'Jack', 'Stowey', '', '', '', '', '', '', '', '01275 939181', '', '', '', '', '', '2013-10-16 12:20:03', NULL, NULL, '2013-10-16 12:20:03', '2013-10-16 12:20:03', NULL, '2013-10-16 12:20:37', NULL, NULL, NULL, NULL, '', '');

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
