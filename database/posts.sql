CREATE DATABASE  IF NOT EXISTS `post` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `post`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: post
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `publish` tinyint(4) NOT NULL,
  `publish_date` date DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'ttt','sdfdf',0,NULL),(2,1,'test 1','test 1',0,NULL),(3,1,'1221','dfdf',1,'2022-03-28'),(4,1,'Etymology','The English word province is attested since about 1330 and derives from the 13th-century Old French province, which itself comes from the Latin word provincia, which referred to the sphere of authority of a magistrate, in particular, to a foreign territory.',1,'2022-03-29'),(5,1,'Etymology1','The English word province is attested since about 1330 and derives from the 13th-century Old French province, which itself comes from the Latin word provincia, which referred to the sphere of authority of a magistrate, in particular, to a foreign territory.1',1,'2022-03-30'),(6,1,'Teeeeeee','dgfggfhghgfhgfh',0,NULL),(7,1,'Teeeeeee','dgfggfhghgfhgfh',0,NULL),(8,2,'Ludwig Ferdinand Huber','Ludwig Ferdinand Huber or Louis Ferdinand Huber (1764 â€“ 24 December 1804) was a German translator, diplomat, playwright, literary critic and journalist. Born in Paris, Huber was the son of the Bavarian-born writer and translator Michael Huber [de; fr] and his French wife Anna Louise, nÃ©e l\'Epine. He grew up bilingual in French and German after his parents moved to Leipzig when he was two years old',1,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Peang Pithukchorica','peang.pithukchorica@smart.com.kh','25d55ad283aa400af464c76d713c07ad'),(2,'Ly Rica','lyrica@gmail.com','25d55ad283aa400af464c76d713c07ad'),(3,'Test ','test@gmail.com','25d55ad283aa400af464c76d713c07ad');
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

-- Dump completed on 2022-03-31  8:42:34
