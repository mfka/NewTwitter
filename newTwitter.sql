-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: newTwitter
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `twitt_id` int(11) DEFAULT NULL,
  `text` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_fk_user` (`user_id`),
  KEY `comment_fk_twitt` (`twitt_id`),
  CONSTRAINT `comment_fk_twitt` FOREIGN KEY (`twitt_id`) REFERENCES `twitt` (`id`),
  CONSTRAINT `comment_fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_tags`
--

DROP TABLE IF EXISTS `comments_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_tags_tag` (`tag_id`),
  KEY `comments_tags_comment` (`comment_id`),
  CONSTRAINT `comments_tags_comment` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
  CONSTRAINT `comments_tags_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_tags`
--

LOCK TABLES `comments_tags` WRITE;
/*!40000 ALTER TABLE `comments_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(60) CHARACTER SET utf8 NOT NULL,
  `read` tinyint(2) DEFAULT '0',
  `title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages_users`
--

DROP TABLE IF EXISTS `messages_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromUser_id` int(11) DEFAULT NULL,
  `toUser_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_users_message` (`message_id`),
  KEY `messages_users_from` (`fromUser_id`),
  KEY `messages_users_user_id_fk` (`toUser_id`),
  CONSTRAINT `messages_users_from` FOREIGN KEY (`fromUser_id`) REFERENCES `user` (`id`),
  CONSTRAINT `messages_users_message` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`),
  CONSTRAINT `messages_users_user_id_fk` FOREIGN KEY (`toUser_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages_users`
--

LOCK TABLES `messages_users` WRITE;
/*!40000 ALTER TABLE `messages_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twitt`
--

DROP TABLE IF EXISTS `twitt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `twitt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `text` varchar(140) CHARACTER SET utf8 DEFAULT NULL,
  `publish` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `twitt_user_id_fk` (`user_id`),
  CONSTRAINT `twitt_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twitt`
--

LOCK TABLES `twitt` WRITE;
/*!40000 ALTER TABLE `twitt` DISABLE KEYS */;
INSERT INTO `twitt` VALUES (8,3,'DziaÅ‚a?','2017-02-06 22:22:30',NULL),(9,3,'Sprawdzam dziaÅ‚anie mojego twitterka - moÅ¼e coÅ› siÄ™ ruszy ;)','2017-02-07 10:33:22',NULL),(10,3,'CoÅ› coÅ› dziaÅ‚a moÅ¼e i moÅ¼e nie , a moÅ¼e i teÅ¼Â nie :(','2017-02-07 10:34:10',NULL);
/*!40000 ALTER TABLE `twitt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twitts_tags`
--

DROP TABLE IF EXISTS `twitts_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `twitts_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) DEFAULT NULL,
  `twitt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `twitts_tags_tag` (`tag_id`),
  KEY `twitts_tags_twitt` (`twitt_id`),
  CONSTRAINT `twitts_tags_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`),
  CONSTRAINT `twitts_tags_twitt` FOREIGN KEY (`twitt_id`) REFERENCES `twitt` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twitts_tags`
--

LOCK TABLES `twitts_tags` WRITE;
/*!40000 ALTER TABLE `twitts_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `twitts_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `login_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `register_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'marek@cl.pl','Marek','Firlejczyk','2016-12-10 21:47:31','2016-12-10 21:47:31','a469a3e635e694cc0e690611f1f44959',NULL,0),(3,'marek@test.pl','marek',NULL,'2017-02-23 12:06:28','2016-12-15 22:01:10','52f6a449e845b89797c84cb27f5a5459',NULL,0);
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

-- Dump completed on 2017-02-23 19:32:29
