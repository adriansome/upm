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
-- Dumping data for table `old_link`
--

LOCK TABLES `old_link` WRITE;
/*!40000 ALTER TABLE `old_link` DISABLE KEYS */;
INSERT INTO `old_link` VALUES (1,78,'old-test-page');
/*!40000 ALTER TABLE `old_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (78,NULL,1,2,5,'Test Page',NULL,'This is a test menu item.','This is a test page.','test,example,page','test-page','all','2col','0000-00-00 00:00:00','2013-09-04 13:53:09','2013-09-04 10:30:26','2013-09-02 14:08:37','2013-09-02 14:08:37'),(79,78,2,3,4,'Another Page',NULL,'this is another menu item.','','','test-page/another-page','guest','2col','0000-00-00 00:00:00','2013-09-04 11:13:22','2013-09-04 11:13:22','2013-09-04 11:13:22','2013-09-04 11:13:22'),(80,NULL,1,6,9,'Yet Another Page',NULL,'This is yet another test page.','','','yet-another-page','','2col','0000-00-00 00:00:00','2013-09-02 16:07:37',NULL,NULL,NULL),(81,80,2,7,8,'Another Child Page',NULL,'This is another child page.','','','yet-another-page/another-child-page','','2col','0000-00-00 00:00:00','2013-09-02 16:07:59',NULL,NULL,NULL);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `page_menu`
--

LOCK TABLES `page_menu` WRITE;
/*!40000 ALTER TABLE `page_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'mail@mattbiddle.cc','matt@fanaticdesign.co.uk','$2a$08$MztAbFdWk.iYzPWgQ8YZ5.sg64Wt1iD.k4dcgRzeRPFy3.8./LpLa','admin','admin','Fanatic','Design','2013-08-27 09:52:45','2013-09-04 12:52:35','2013-09-04 12:52:35','2013-08-27 09:52:45','2013-08-27 09:52:45',NULL,'2013-08-27 09:53:08',NULL,'2013-08-28 11:55:48',NULL,NULL,'',''),(4,'matt@fanaticdesign.co.uk',NULL,'$2a$08$HoaNUGRgV.dJjHjJBoul0ezqjL1fRyJTd/rGyBLIYX.o.KbZ7QjUe','user','demo','Demo','User','2013-08-28 12:10:04','2013-09-04 11:20:32','2013-09-04 11:20:32','2013-08-28 12:10:04','2013-08-28 12:10:04',NULL,'2013-09-02 10:52:11',NULL,NULL,NULL,NULL,'','');
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

-- Dump completed on 2013-09-04 14:03:11
