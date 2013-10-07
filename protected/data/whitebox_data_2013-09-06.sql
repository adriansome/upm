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
-- Dumping data for table `block`
--

LOCK TABLES `block` WRITE;
/*!40000 ALTER TABLE `block` DISABLE KEYS */;
/*!40000 ALTER TABLE `block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `content_type`
--

LOCK TABLES `content_type` WRITE;
/*!40000 ALTER TABLE `content_type` DISABLE KEYS */;
INSERT INTO `content_type` VALUES (1,'textline','2013-09-05 12:06:47','2013-09-05 12:06:47','2013-09-05 12:06:47',NULL),(2,'wysiwyg','2013-09-05 12:06:47','2013-09-05 12:06:47','2013-09-05 12:06:47',NULL),(3,'image','2013-09-05 12:07:24','2013-09-05 12:07:24','2013-09-05 12:07:24',NULL),(4,'date','2013-09-05 12:07:24','2013-09-05 12:07:24','2013-09-05 12:07:24',NULL),(5,'boolean','2013-09-05 12:07:37','2013-09-05 12:07:37','2013-09-05 12:07:37',NULL);
/*!40000 ALTER TABLE `content_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `old_link`
--

LOCK TABLES `old_link` WRITE;
/*!40000 ALTER TABLE `old_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `old_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (78,NULL,1,12,15,'Test Page',NULL,'Test 2col Page','This is a test page.','test,example,page','test-page','all','2col','0000-00-00 00:00:00','2013-09-09 22:43:07','2013-09-09 21:41:34','2013-09-09 21:43:44','2013-09-02 14:08:37'),(79,78,2,13,14,'Another Page',NULL,'this is another menu item.','','','test-page/another-page','guest','2col','0000-00-00 00:00:00','2013-09-09 22:48:29','2013-09-04 11:13:22','2013-09-04 11:13:22','2013-09-09 17:29:20'),(80,NULL,1,16,19,'Yet Another Page',NULL,'This is yet another test page.','','','yet-another-page','all','2col','0000-00-00 00:00:00','2013-09-09 18:34:34','2013-09-04 14:51:16','2013-09-04 14:51:16','2013-09-04 14:51:16'),(81,80,2,17,18,'Another Child Page',NULL,'This is another child page.','','','yet-another-page/another-child-page','all','2col','0000-00-00 00:00:00','2013-09-09 18:34:34','2013-09-04 14:51:23','2013-09-04 14:51:23','2013-09-09 17:29:35'),(82,NULL,1,2,3,'Home',NULL,'Home','The new fridge home page.','new,fridge,home,page,example,template','/','all','home','2013-09-05 11:20:36','2013-09-09 22:05:21','2013-09-05 11:20:36','2013-09-05 11:20:36',NULL),(84,NULL,1,6,9,'Login',NULL,'Login','','','/login','all','default','2013-09-09 14:53:54','2013-09-09 22:47:24','2013-09-09 15:25:54','2013-09-09 14:53:54','2013-09-09 14:53:54'),(85,84,2,7,8,'Forgotten Credentials',NULL,'Forgotten Credentials','','','/login/forgotten-credentials','all','default','2013-09-09 14:59:22','2013-09-09 18:34:34','2013-09-09 15:47:33','2013-09-09 14:59:22',NULL),(86,NULL,1,4,5,'Register',NULL,'Register','','','/register','all','default','2013-09-09 16:06:29','2013-09-09 21:08:57','2013-09-09 16:06:29','2013-09-09 16:06:29',NULL),(87,NULL,1,10,11,'Contact Us',NULL,'Contact Us','','','/contact','all','default','2013-09-09 16:07:23','2013-09-09 21:41:28','2013-09-09 21:40:35','2013-09-09 21:34:27',NULL);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `page_menu`
--

LOCK TABLES `page_menu` WRITE;
/*!40000 ALTER TABLE `page_menu` DISABLE KEYS */;
INSERT INTO `page_menu` VALUES (6,82,1),(7,86,1),(8,84,1),(9,87,1),(10,78,1);
/*!40000 ALTER TABLE `page_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'mail@mattbiddle.cc','matt@fanaticdesign.co.uk','$2a$08$MztAbFdWk.iYzPWgQ8YZ5.sg64Wt1iD.k4dcgRzeRPFy3.8./LpLa','admin','admin','Fanatic','Design','2013-08-27 09:52:45','2013-09-09 21:08:40','2013-09-09 21:08:40','2013-08-27 09:52:45','2013-08-27 09:52:45',NULL,'2013-08-27 09:53:08',NULL,'2013-08-28 11:55:48',NULL,NULL,'',''),(4,'matt@fanaticdesign.co.uk',NULL,'$2a$08$HoaNUGRgV.dJjHjJBoul0ezqjL1fRyJTd/rGyBLIYX.o.KbZ7QjUe','user','demo','Demo','User','2013-08-28 12:10:04','2013-09-09 12:32:13','2013-09-04 16:10:08','2013-08-28 12:10:04','2013-08-28 12:10:04',NULL,'2013-09-02 10:52:11',NULL,NULL,'2013-09-09 12:32:13',NULL,'70ab6997e21e800279dac063b1cda168','');
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

-- Dump completed on 2013-09-09 22:57:32
