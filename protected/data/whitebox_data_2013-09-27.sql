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
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,82,'home nugget area');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `area_block`
--

LOCK TABLES `area_block` WRITE;
/*!40000 ALTER TABLE `area_block` DISABLE KEYS */;
INSERT INTO `area_block` VALUES (1,41);
/*!40000 ALTER TABLE `area_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `block`
--

LOCK TABLES `block` WRITE;
/*!40000 ALTER TABLE `block` DISABLE KEYS */;
INSERT INTO `block` VALUES (1,'test text','page',82,'2013-09-17 12:43:44',NULL,NULL,NULL),(2,'test text block','page',82,'2013-09-17 12:43:44',NULL,NULL,NULL),(3,'test heading','page',82,'2013-09-17 12:43:44',NULL,NULL,NULL),(4,'test text block 2','page',82,'2013-09-17 12:43:44',NULL,NULL,NULL),(5,'test image block','page',82,'2013-09-17 12:43:44',NULL,NULL,NULL),(7,'page text','page',79,'2013-09-17 12:44:11',NULL,NULL,NULL),(12,'blog item 1','section',NULL,'2013-09-17 16:17:21',NULL,NULL,NULL),(13,'blog item 2','section',NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(14,'blog item 3','section',NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(15,'page text','page',78,'2013-09-25 10:18:49',NULL,NULL,NULL),(38,'home-carousel item 1','page',82,'2013-09-25 16:24:37',NULL,NULL,NULL),(39,'home-carousel item 2','page',82,'2013-09-25 16:24:37',NULL,NULL,NULL),(40,'home-carousel item 3','page',82,'2013-09-25 16:24:37',NULL,NULL,NULL),(41,'test nugget block','page',82,'2013-09-26 12:04:31',NULL,NULL,NULL);
/*!40000 ALTER TABLE `block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'text',1,1,'Main Heading',NULL,NULL,NULL,'2013-09-17 12:43:44','2013-09-25 16:56:22',NULL,NULL),(2,'text',2,2,'<b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit. Cras nec lacinia urna. Etiam convallis diam eu neque placerat aliquam. Proin volutpat erat sed leo dignissim, sit amet eleifend nulla congue. Proin elementum, est sit amet fringilla tincidunt, odio nisi molestie nulla, id lobortis neque nisi sed est. Etiam sagittis nisl quam, a suscipit augue varius id. Curabitur a nisl laoreet, ultrices justo et, iaculis sapien. Aenean placerat magna sit amet purus lobortis feugiat. Nunc sapien nunc, porta sit amet porttitor eu, congue sit amet lacus. Aliquam ultrices placerat turpis quis sodales. Pellentesque eu congue est.',NULL,NULL,NULL,'2013-09-17 12:43:44','2013-09-17 19:47:01',NULL,NULL),(3,'text',3,1,'Sub Heading',NULL,NULL,NULL,'2013-09-17 12:43:44','2013-09-19 22:17:51',NULL,NULL),(4,'text',4,6,'Duis placerat, justo a facilisis rhoncus, orci diam scelerisque elit, ut euismod magna ante ut odio. Integer semper mauris vitae nisi tempus, nec iaculis magna congue. Cras porttitor tristique vulputate. Donec rhoncus lobortis lorem sit amet malesuada. Ut in auctor justo. Aliquam sed tincidunt massa. Maecenas vel neque consectetur, porta ante nec, auctor nibh. Vestibulum iaculis convallis velit, sed elementum sapien euismod ac. Mauris fringilla non elit vitae semper.',NULL,NULL,NULL,'2013-09-17 12:43:44','2013-09-17 13:11:52',NULL,NULL),(5,'image',5,3,NULL,NULL,NULL,'/assets/source/4334645438.jpg','2013-09-17 12:43:44','2013-09-24 15:25:30',NULL,NULL),(6,'alt',5,1,'Test Img',NULL,NULL,NULL,'2013-09-17 12:43:44','2013-09-24 15:25:30',NULL,NULL),(7,'title',5,1,'This is a test image block.',NULL,NULL,NULL,'2013-09-17 12:43:44','2013-09-24 15:25:30',NULL,NULL),(17,'text',7,1,NULL,NULL,NULL,NULL,'2013-09-17 12:44:11',NULL,NULL,NULL),(18,'title',12,1,'Aenean Volutpat...',NULL,NULL,NULL,'2013-09-17 16:17:21','2013-09-26 15:30:00',NULL,NULL),(19,'text',12,2,'Aenean volutpat tempor sodales. Nam vestibulum, lectus ut pellentesque sagittis, quam erat tincidunt ligula, vel tristique augue dolor sed nulla. Aenean eget ultrices turpis. Pellentesque sit amet ante egestas, pharetra ipsum ac, commodo nulla. Nullam tortor dolor, porttitor nec porta ut, sodales ac magna. Mauris blandit in sem vitae placerat. Curabitur eget tincidunt enim. Donec at pretium eros. Integer sagittis magna ac tempus ultrices. Suspendisse potenti. Morbi ac enim vel ligula tempus accumsan in dignissim libero. Nam vulputate hendrerit lacus vitae luctus.',NULL,NULL,NULL,'2013-09-17 16:17:21','2013-09-26 15:30:00',NULL,NULL),(20,'image',12,3,NULL,NULL,NULL,'0','2013-09-17 16:17:21','2013-09-26 15:30:00',NULL,NULL),(21,'image_alt',12,1,'',NULL,NULL,NULL,'2013-09-17 16:17:21','2013-09-26 15:30:00',NULL,NULL),(22,'image_title',12,1,'',NULL,NULL,NULL,'2013-09-17 16:17:21','2013-09-26 15:30:00',NULL,NULL),(23,'link_text',12,1,'Read More...',NULL,NULL,NULL,'2013-09-17 16:17:21','2013-09-26 15:30:00',NULL,NULL),(24,'author',12,1,'Matt Biddle',NULL,NULL,NULL,'2013-09-17 16:17:21','2013-09-26 15:30:00',NULL,NULL),(25,'date_published',12,4,NULL,'2013-09-18 11:43:00',NULL,NULL,'2013-09-17 16:17:21','2013-09-26 15:30:00',NULL,NULL),(26,'title',13,1,'Blog item 2',NULL,NULL,NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(27,'text',13,2,'Nunc condimentum dictum libero ut congue. Maecenas mi nisi, ullamcorper vel mauris eget, vestibulum rhoncus turpis. In rhoncus id mi rhoncus blandit. Curabitur magna dolor, cursus lobortis lacus eget, fermentum rhoncus est. Etiam tincidunt turpis placerat metus mattis, in dapibus ligula mollis. Fusce dignissim porta enim eget sagittis. Nullam cursus nec odio quis porttitor. Morbi id ipsum scelerisque, fermentum nulla nec, vulputate felis. Suspendisse bibendum et sapien ut mattis. Maecenas mollis ligula eget mi sagittis tempus. Mauris auctor eu nisi id adipiscing. Phasellus dignissim est arcu, mattis imperdiet velit rutrum at. Nunc felis augue, hendrerit eu mattis ut, facilisis vitae elit. Nam fermentum velit ac augue feugiat, a mollis purus cursus.',NULL,NULL,NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(28,'image',13,3,NULL,NULL,NULL,NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(29,'image_alt',13,1,NULL,NULL,NULL,NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(30,'image_title',13,1,NULL,NULL,NULL,NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(31,'link_text',13,1,'Read More...',NULL,NULL,NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(32,'author',13,1,'Matt Biddle',NULL,NULL,NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(33,'date_published',13,4,NULL,'2013-09-18 11:43:00',NULL,NULL,'2013-09-17 16:28:07',NULL,NULL,NULL),(34,'title',14,1,'Blog item 3',NULL,NULL,NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(35,'text',14,2,'Donec a vulputate lacus. Cras pretium fringilla mi at scelerisque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sem est, tristique eu facilisis sit amet, cursus et est. Maecenas venenatis, tellus placerat semper sagittis, mauris odio facilisis odio, commodo bibendum metus risus sit amet mi. Phasellus placerat dolor vitae lectus elementum luctus. Sed felis metus, vehicula in felis id, fringilla semper turpis. Morbi ut libero dictum, aliquet lectus aliquet, dictum est. Pellentesque enim elit, vehicula eget volutpat vel, vehicula et est. Vestibulum in eros orci. Curabitur ligula odio, dignissim ut accumsan et, ullamcorper eu enim. Vivamus ac lectus nulla. Nullam et egestas quam, at pharetra erat. Aenean faucibus congue scelerisque.',NULL,NULL,NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(36,'image',14,3,NULL,NULL,NULL,NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(37,'image_alt',14,1,NULL,NULL,NULL,NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(38,'image_title',14,1,NULL,NULL,NULL,NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(39,'link_text',14,1,'Read More...',NULL,NULL,NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(40,'author',14,1,'Matt Biddle',NULL,NULL,NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(41,'date_published',14,4,NULL,'2013-09-18 11:43:00',NULL,NULL,'2013-09-17 16:33:01',NULL,NULL,NULL),(42,'text',15,1,NULL,NULL,NULL,NULL,'2013-09-25 10:18:49',NULL,NULL,NULL),(86,'title',38,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37','2013-09-26 11:11:23',NULL,NULL),(87,'text',38,6,'',NULL,NULL,NULL,'2013-09-25 16:24:37','2013-09-26 11:11:23',NULL,NULL),(88,'image_src',38,3,NULL,NULL,NULL,'','2013-09-25 16:24:37','2013-09-26 11:11:23',NULL,NULL),(89,'image_alt',38,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37','2013-09-26 11:11:23',NULL,NULL),(90,'link_href',38,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37','2013-09-26 11:11:23',NULL,NULL),(91,'link_text',38,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37','2013-09-26 11:11:23',NULL,NULL),(92,'link_title',38,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37','2013-09-26 11:11:23',NULL,NULL),(93,'title',39,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(94,'text',39,6,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(95,'image_src',39,3,NULL,NULL,NULL,'','2013-09-25 16:24:37',NULL,NULL,NULL),(96,'image_alt',39,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(97,'link_href',39,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(98,'link_text',39,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(99,'link_title',39,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(100,'title',40,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(101,'text',40,6,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(102,'image_src',40,3,NULL,NULL,NULL,'','2013-09-25 16:24:37',NULL,NULL,NULL),(103,'image_alt',40,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(104,'link_href',40,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(105,'link_text',40,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(106,'link_title',40,1,'',NULL,NULL,NULL,'2013-09-25 16:24:37',NULL,NULL,NULL),(107,'title',41,1,'',NULL,NULL,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:09',NULL,NULL),(108,'title_is_link',41,5,NULL,NULL,1,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:09',NULL,NULL),(109,'text',41,6,'Vestibulum lacinia eu risus eget facilisis. Duis ultrices, urna et tempus rhoncus, eros mi pretium odio, ac bibendum neque mauris sit amet justo. Nam congue augue risus, non vulputate leo placerat sit amet. Mauris erat libero, sodales sit amet sem quis, sollicitudin imperdiet enim. Suspendisse vel mi ut nisl semper iaculis. Etiam eu sagittis turpis. In tincidunt ipsum id dui dictum sollicitudin. Mauris accumsan non risus in facilisis. Nunc eget sollicitudin dolor.',NULL,NULL,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL),(110,'href',41,1,'#',NULL,NULL,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL),(111,'target',41,5,NULL,NULL,0,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL),(112,'link_in_body',41,5,NULL,NULL,1,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL),(113,'link_title',41,1,'Link Tool Tip',NULL,NULL,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL),(114,'link_text',41,1,'A Link',NULL,NULL,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL),(115,'image_src',41,3,NULL,NULL,NULL,'/assets/source/4334645438.jpg','2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL),(116,'image_alt',41,1,'a test image',NULL,NULL,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL),(117,'image_title',41,1,'Image Tool Tip',NULL,NULL,NULL,'2013-09-26 12:04:31','2013-09-27 08:52:10',NULL,NULL);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `content_type`
--

LOCK TABLES `content_type` WRITE;
/*!40000 ALTER TABLE `content_type` DISABLE KEYS */;
INSERT INTO `content_type` VALUES (1,'singleline','2013-09-05 12:06:47','2013-09-05 12:06:47','2013-09-05 12:06:47',NULL),(2,'html','2013-09-05 12:06:47','2013-09-05 12:06:47','2013-09-05 12:06:47',NULL),(3,'file','2013-09-05 12:07:24','2013-09-05 12:07:24','2013-09-05 12:07:24',NULL),(4,'date','2013-09-05 12:07:24','2013-09-05 12:07:24','2013-09-05 12:07:24',NULL),(5,'boolean','2013-09-05 12:07:37','2013-09-05 12:07:37','2013-09-05 12:07:37',NULL),(6,'multiline','2013-09-05 12:07:37','2013-09-05 12:07:37',NULL,NULL);
/*!40000 ALTER TABLE `content_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
INSERT INTO `page` VALUES (78,NULL,1,14,17,'Test Page',NULL,'Test 2col Page','This is a test page.','test,example,page','test-page','all','2col','0000-00-00 00:00:00','2013-09-16 19:02:20','2013-09-09 21:41:34','2013-09-09 21:43:44','2013-09-16 19:02:00'),(79,78,2,15,16,'Another Page',NULL,'this is another menu item.','','','test-page/another-page','all','2col','0000-00-00 00:00:00','2013-09-16 19:05:34','2013-09-04 11:13:22','2013-09-04 11:13:22',NULL),(80,NULL,1,18,21,'Yet Another Page',NULL,'This is yet another test page.','','','yet-another-page','all','2col','0000-00-00 00:00:00','2013-09-16 19:02:20','2013-09-04 14:51:16','2013-09-04 14:51:16','2013-09-04 14:51:16'),(81,80,2,19,20,'Another Child Page',NULL,'This is another child page.','','','yet-another-page/another-child-page','all','2col','0000-00-00 00:00:00','2013-09-16 19:02:20','2013-09-04 14:51:23','2013-09-04 14:51:23',NULL),(82,NULL,1,2,3,'Home',NULL,'Home','The new fridge home page.','new,fridge,home,page,example,template','/','all','home','2013-09-05 11:20:36','2013-09-16 19:02:19','2013-09-05 11:20:36','2013-09-10 10:11:01',NULL),(84,NULL,1,8,11,'Login',NULL,'Login','','','/login','guest','default','2013-09-09 14:53:54','2013-09-16 19:02:20','2013-09-09 15:25:54','2013-09-09 14:53:54','2013-09-09 14:53:54'),(85,84,2,9,10,'Forgotten Credentials',NULL,'Forgotten Credentials','','','/login/forgotten-credentials','guest','default','2013-09-09 14:59:22','2013-09-16 19:02:20','2013-09-09 15:47:33','2013-09-09 14:59:22',NULL),(86,NULL,1,6,7,'Register',NULL,'Register','','','/register','guest','default','2013-09-09 16:06:29','2013-09-16 19:02:19','2013-09-09 16:06:29','2013-09-09 16:06:29',NULL),(87,NULL,1,4,5,'Contact Us',NULL,'Contact Us','','','/contact','all','default','2013-09-09 16:07:23','2013-09-16 19:02:19','2013-09-09 21:40:35','2013-09-09 21:34:27',NULL),(88,NULL,1,12,13,'Logout',NULL,'Logout','','','/logout','user','default','2013-09-10 15:09:27','2013-09-16 19:02:20','2013-09-10 15:09:27','2013-09-10 15:09:27','2013-09-16 19:01:45');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `page_menu`
--

LOCK TABLES `page_menu` WRITE;
/*!40000 ALTER TABLE `page_menu` DISABLE KEYS */;
INSERT INTO `page_menu` VALUES (24,82,1),(25,87,1),(26,86,1),(27,84,1),(29,88,1),(30,78,1);
/*!40000 ALTER TABLE `page_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'mail@mattbiddle.cc','matt@fanaticdesign.co.uk','$2a$08$MztAbFdWk.iYzPWgQ8YZ5.sg64Wt1iD.k4dcgRzeRPFy3.8./LpLa','admin','admin','Fanatic','Design','2013-08-27 09:52:45','2013-09-27 08:26:20','2013-09-27 08:26:20','2013-08-27 09:52:45','2013-08-27 09:52:45',NULL,'2013-08-27 09:53:08',NULL,'2013-08-28 11:55:48',NULL,NULL,'',''),(4,'matt@fanaticdesign.co.uk',NULL,'$2a$08$HoaNUGRgV.dJjHjJBoul0ezqjL1fRyJTd/rGyBLIYX.o.KbZ7QjUe','user','demo','Demo','User','2013-08-28 12:10:04','2013-09-11 22:56:13','2013-09-11 22:56:13','2013-08-28 12:10:04','2013-08-28 12:10:04',NULL,'2013-09-02 10:52:11',NULL,NULL,'2013-09-09 12:32:13',NULL,'70ab6997e21e800279dac063b1cda168','');
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

-- Dump completed on 2013-09-27  9:50:38
