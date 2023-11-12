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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `author` int NOT NULL,
  `paricipant` int DEFAULT NULL,
  `room_id` int NOT NULL,
  `start` varchar(150) NOT NULL,
  `end` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL DEFAULT '""',
  `uniqueid` varchar(150) DEFAULT '""',
  PRIMARY KEY (`id`),
  KEY `events_fk0` (`author`),
  KEY `events_fk2` (`room_id`),
  KEY `events_fk1` (`paricipant`),
  CONSTRAINT `events_fk0` FOREIGN KEY (`author`) REFERENCES `employees` (`id`),
  CONSTRAINT `events_fk1` FOREIGN KEY (`paricipant`) REFERENCES `employees` (`id`),
  CONSTRAINT `events_fk2` FOREIGN KEY (`room_id`) REFERENCES `meeting_rooms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (106,'Собеседование',6,8,6,'2023.11.13 08:00:00','2023.11.13 17:00:00','Собеседование с одним из кандидатов','6kqjide65508f3d0819byandex.ru'),(107,'Собеседование',6,9,6,'2023.11.13 08:00:00','2023.11.13 17:00:00','Собеседование с одним из кандидатов','6kqjide65508f3d0819byandex.ru'),(108,'Собеседование',6,8,8,'2023.11.13 08:00:00','2023.11.13 17:00:00','Собеседование с одним из кандидатов','6kqjide65508f3dad8e1yandex.ru'),(109,'Собеседование',6,9,8,'2023.11.13 08:00:00','2023.11.13 17:00:00','Собеседование с одним из кандидатов','6kqjide65508f3dad8e1yandex.ru'),(110,'Корпоратив',6,8,6,'2023.11.12 08:00:00','2023.11.12 17:00:00','Офисный Корпоратив','6kqjide65508ffa355ccyandex.ru'),(111,'Корпоратив',6,9,6,'2023.11.12 08:00:00','2023.11.12 17:00:00','Офисный Корпоратив','6kqjide65508ffa355ccyandex.ru'),(112,'Корпоратив',6,8,8,'2023.11.12 08:00:00','2023.11.12 17:00:00','Офисный Корпоратив','6kqjide65508ffb0f373yandex.ru'),(113,'Корпоратив',6,9,8,'2023.11.12 08:00:00','2023.11.12 17:00:00','Офисный Корпоратив','6kqjide65508ffb0f373yandex.ru');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-12 12:18:20
