CREATE DATABASE IF NOT EXISTS meetings;
USE meetings;

-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: meetings
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `meeting_rooms`
--

DROP TABLE IF EXISTS `meeting_rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meeting_rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `office_id` int NOT NULL,
  `photo` varchar(400) NOT NULL DEFAULT '""',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(400) NOT NULL DEFAULT '""',
  `ya_calendar__embed_link` varchar(400) NOT NULL DEFAULT '""',
  `accessibility` varchar(50) NOT NULL DEFAULT '"public"',
  `capacity` int NOT NULL DEFAULT '25',
  PRIMARY KEY (`id`),
  KEY `meeting_rooms_fk0` (`office_id`),
  CONSTRAINT `meeting_rooms_fk0` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting_rooms`
--

LOCK TABLES `meeting_rooms` WRITE;
/*!40000 ALTER TABLE `meeting_rooms` DISABLE KEYS */;
INSERT INTO `meeting_rooms` VALUES (3,'Переговорная №1.1',1,'\"\"',1,'\"\"','\"\"','\"public\"',25),(4,'Переговорная №1.2',1,'\"\"',1,'\"\"','\"\"','\"public\"',25),(5,'Переговорная №1.3',1,'\"\"',1,'\"\"','\"\"','\"public\"',25),(6,'Переговорная №2.1',2,'\"\"',1,'\"\"','\"\"','\"public\"',25),(7,'Переговорная №2.2',2,'\"\"',1,'\"\"','\"\"','\"public\"',25),(8,'Переговорная №2.3',2,'\"\"',1,'\"\"','\"\"','\"public\"',25),(9,'Переговорная №3.1',3,'\"\"',1,'\"\"','\"\"','\"public\"',25),(10,'Переговорная №3.2',3,'\"\"',1,'\"\"','\"\"','\"public\"',25),(11,'Переговорная №3.3',3,'\"\"',1,'\"\"','\"\"','\"public\"',25),(12,'Переговорная №4.1',4,'\"\"',1,'\"\"','\"\"','\"public\"',25),(13,'Переговорная №4.2',4,'\"\"',1,'\"\"','\"\"','\"public\"',25),(14,'Переговорная №4.3',4,'\"\"',1,'\"\"','\"\"','\"public\"',25),(15,'Переговорная №5.1',5,'\"\"',1,'\"\"','\"\"','\"public\"',25),(16,'Переговорная №5.2',5,'\"\"',1,'\"\"','\"\"','\"public\"',25),(17,'Переговорная №5.3',5,'\"\"',1,'\"\"','\"\"','\"public\"',25),(18,'Переговорная №6.1',6,'\"\"',1,'\"\"','\"\"','\"public\"',25),(19,'Переговорная №6.2',6,'\"\"',1,'\"\"','\"\"','\"public\"',25),(20,'Переговорная №6.3',6,'\"\"',1,'\"\"','\"\"','\"public\"',25),(21,'Переговорная №7.1',7,'\"\"',1,'\"\"','\"\"','\"public\"',25),(22,'Переговорная №7.2',7,'\"\"',1,'\"\"','\"\"','\"public\"',25),(23,'Переговорная №7.3',7,'\"\"',1,'\"\"','\"\"','\"public\"',25),(24,'Переговорная №8.1',8,'\"\"',1,'\"\"','\"\"','\"public\"',25),(25,'Переговорная №8.2',8,'\"\"',1,'\"\"','\"\"','\"public\"',25),(26,'Переговорная №8.3',8,'\"\"',1,'\"\"','\"\"','\"public\"',25);
/*!40000 ALTER TABLE `meeting_rooms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-11  2:39:43
