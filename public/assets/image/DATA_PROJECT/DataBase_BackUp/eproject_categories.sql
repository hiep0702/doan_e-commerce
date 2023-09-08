-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: eproject
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `Category_ID` int NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(50) DEFAULT NULL,
  `Brand_ID` int DEFAULT NULL,
  `Category_logo` varchar(500) DEFAULT NULL,
  `Category_slide_img` varchar(500) DEFAULT NULL,
  `Category_video_demo` varchar(500) DEFAULT NULL,
  `Category_informations` varchar(200) DEFAULT NULL,
  `Category_history` varchar(200) DEFAULT NULL,
  `Create_at` datetime DEFAULT NULL,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (14,'Cards Holder',1,NULL,NULL,NULL,'Card holder or cardholder may refer to:','Card holder or cardholder may refer to:',NULL,NULL),(15,'Chain and Strap Wallets',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'Long Wallet',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'Small Wallet',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'Cards Holder',2,NULL,NULL,NULL,'Card holder or cardholder may refer to:','Card holder or cardholder may refer to:',NULL,NULL),(19,'Chain and Strap Wallets',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'Long Wallet',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'Small Wallet',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'Cards Holder',3,NULL,NULL,NULL,'Card holder or cardholder may refer to:','Card holder or cardholder may refer to:',NULL,NULL),(23,'Chain and Strap Wallets',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'Long Wallet',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'Small Wallet',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'Cards Holder',4,NULL,NULL,NULL,'Card holder or cardholder may refer to:','Card holder or cardholder may refer to:',NULL,NULL),(27,'Chain and Strap Wallets',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'Long Wallet',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'Small Wallet',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-06 10:36:28
