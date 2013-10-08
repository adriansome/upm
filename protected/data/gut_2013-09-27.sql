<<<<<<< HEAD:protected/data/gut_2013-09-27.sql
-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: 33.33.33.33    Database: give_us_time
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) unsigned NOT NULL,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_block`
--

DROP TABLE IF EXISTS `area_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_block` (
  `area_id` int(11) unsigned NOT NULL,
  `block_id` int(11) unsigned NOT NULL,
  KEY `area_id` (`area_id`) USING BTREE,
  KEY `block_id` (`block_id`) USING BTREE,
  CONSTRAINT `area` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `block` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_block`
--

LOCK TABLES `area_block` WRITE;
/*!40000 ALTER TABLE `area_block` DISABLE KEYS */;
/*!40000 ALTER TABLE `area_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `block` (
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
  KEY `name` (`name`),
  CONSTRAINT `block_page` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block`
--

LOCK TABLES `block` WRITE;
/*!40000 ALTER TABLE `block` DISABLE KEYS */;
INSERT INTO `block` VALUES (1,'nugget-support','page',82,'2013-09-30 13:49:32',NULL,NULL,NULL),(3,'blog item','section',NULL,'2013-09-30 14:46:05',NULL,NULL,NULL);
/*!40000 ALTER TABLE `block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
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
  KEY `type_id` (`type_id`) USING BTREE,
  CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `content_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'title',1,1,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(2,'title_is_link',1,5,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(3,'text',1,6,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(4,'href',1,1,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(5,'target',1,5,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(6,'link_in_body',1,5,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(7,'link_title',1,1,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(8,'link_text',1,1,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(9,'image_src',1,3,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(10,'image_alt',1,1,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(11,'image_title',1,1,NULL,NULL,NULL,NULL,'2013-09-30 13:49:32',NULL,NULL,NULL),(15,'title',3,1,NULL,NULL,NULL,'/assets/source/nugget-stories.jpg','2013-09-30 14:46:05',NULL,NULL,NULL),(16,'text',3,2,'Test Image',NULL,NULL,NULL,'2013-09-30 14:46:05',NULL,NULL,NULL),(17,'image',3,3,'Nuggets Nuggets Nuggets!',NULL,NULL,NULL,'2013-09-30 14:46:05',NULL,NULL,NULL);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_type`
--

DROP TABLE IF EXISTS `content_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_active` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_type`
--

LOCK TABLES `content_type` WRITE;
/*!40000 ALTER TABLE `content_type` DISABLE KEYS */;
INSERT INTO `content_type` VALUES (1,'singleline','2013-09-05 12:06:47','2013-09-05 12:06:47','2013-09-05 12:06:47',NULL),(2,'html','2013-09-05 12:06:47','2013-09-05 12:06:47','2013-09-05 12:06:47',NULL),(3,'file','2013-09-05 12:07:24','2013-09-05 12:07:24','2013-09-05 12:07:24',NULL),(4,'date','2013-09-05 12:07:24','2013-09-05 12:07:24','2013-09-05 12:07:24',NULL),(5,'boolean','2013-09-05 12:07:37','2013-09-05 12:07:37','2013-09-05 12:07:37',NULL),(6,'multiline','2013-09-05 12:07:37','2013-09-05 12:07:37',NULL,NULL);
/*!40000 ALTER TABLE `content_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `old_link`
--

DROP TABLE IF EXISTS `old_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `old_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`) USING BTREE,
  CONSTRAINT `redirect` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `old_link`
--

LOCK TABLES `old_link` WRITE;
/*!40000 ALTER TABLE `old_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `old_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
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
  KEY `parent_id` (`parent_id`) USING BTREE,
  CONSTRAINT `parent` FOREIGN KEY (`parent_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (82,NULL,1,2,3,'Home',NULL,'Home','The new fridge home page.','new,fridge,home,page,example,template','/','all','home','2013-09-05 11:20:36','2013-09-16 19:02:19','2013-09-05 11:20:36','2013-09-10 10:11:01',NULL),(84,NULL,1,8,11,'Login',NULL,'Login','','','/login','guest','default','2013-09-09 14:53:54','2013-09-16 19:02:20','2013-09-09 15:25:54','2013-09-09 14:53:54','2013-09-09 14:53:54'),(85,84,2,9,10,'Forgotten Credentials',NULL,'Forgotten Credentials','','','/login/forgotten-credentials','guest','default','2013-09-09 14:59:22','2013-09-16 19:02:20','2013-09-09 15:47:33','2013-09-09 14:59:22',NULL),(86,NULL,1,6,7,'Register',NULL,'Register','','','/register','guest','default','2013-09-09 16:06:29','2013-09-16 19:02:19','2013-09-09 16:06:29','2013-09-09 16:06:29',NULL),(87,NULL,1,4,5,'Contact Us',NULL,'Contact Us','','','/contact','all','default','2013-09-09 16:07:23','2013-09-16 19:02:19','2013-09-09 21:40:35','2013-09-09 21:34:27',NULL),(88,NULL,1,12,13,'Logout',NULL,'Logout','','','/logout','user','default','2013-09-10 15:09:27','2013-09-16 19:02:20','2013-09-10 15:09:27','2013-09-10 15:09:27','2013-09-16 19:01:45');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_menu`
--

DROP TABLE IF EXISTS `page_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) unsigned NOT NULL,
  `menu_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`) USING BTREE,
  CONSTRAINT `page` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_menu`
--

LOCK TABLES `page_menu` WRITE;
/*!40000 ALTER TABLE `page_menu` DISABLE KEYS */;
INSERT INTO `page_menu` VALUES (24,82,1),(25,87,1),(26,86,1),(27,84,1),(29,88,1);
/*!40000 ALTER TABLE `page_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `old_email` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('subscriber','user','editor','admin') COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'mail@mattbiddle.cc','matt@fanaticdesign.co.uk','$2a$08$MztAbFdWk.iYzPWgQ8YZ5.sg64Wt1iD.k4dcgRzeRPFy3.8./LpLa','admin','admin','Fanatic','Design','2013-08-27 09:52:45','2013-09-30 12:50:38','2013-09-30 12:50:38','2013-08-27 09:52:45','2013-08-27 09:52:45',NULL,'2013-08-27 09:53:08',NULL,'2013-08-28 11:55:48',NULL,NULL,'',''),(4,'matt@fanaticdesign.co.uk',NULL,'$2a$08$HoaNUGRgV.dJjHjJBoul0ezqjL1fRyJTd/rGyBLIYX.o.KbZ7QjUe','user','demo','Demo','User','2013-08-28 12:10:04','2013-09-11 22:56:13','2013-09-11 22:56:13','2013-08-28 12:10:04','2013-08-28 12:10:04',NULL,'2013-09-02 10:52:11',NULL,NULL,'2013-09-09 12:32:13',NULL,'70ab6997e21e800279dac063b1cda168','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-30 15:49:34
=======
-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: 33.33.33.33    Database: fanatic
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) unsigned NOT NULL,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `area_block`
--

DROP TABLE IF EXISTS `area_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_block` (
  `area_id` int(11) unsigned NOT NULL,
  `block_id` int(11) unsigned NOT NULL,
  KEY `area_id` (`area_id`) USING BTREE,
  KEY `block_id` (`block_id`) USING BTREE,
  CONSTRAINT `area` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `block` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `block` (
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
  KEY `name` (`name`),
  CONSTRAINT `block_page` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
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
  KEY `type_id` (`type_id`) USING BTREE,
  CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `content_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `content_type`
--

DROP TABLE IF EXISTS `content_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_active` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `old_link`
--

DROP TABLE IF EXISTS `old_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `old_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`) USING BTREE,
  CONSTRAINT `redirect` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
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
  KEY `parent_id` (`parent_id`) USING BTREE,
  CONSTRAINT `parent` FOREIGN KEY (`parent_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `page_menu`
--

DROP TABLE IF EXISTS `page_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) unsigned NOT NULL,
  `menu_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`) USING BTREE,
  CONSTRAINT `page` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `old_email` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('subscriber','user','editor','admin') COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-27  9:50:26
>>>>>>> remotes/origin/master:protected/data/whitebox_schema_2013-09-27.sql
