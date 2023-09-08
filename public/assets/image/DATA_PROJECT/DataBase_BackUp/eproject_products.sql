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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `Product_ID` int NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(200) DEFAULT NULL,
  `Category_ID` int DEFAULT NULL,
  `Brand_ID` int DEFAULT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'CHANEL 19 CARD HOLDER',14,1),(2,'CHANEL 19 FLAP CARD HOLDER',14,1),(3,'Zipped Card Holder ',14,1),(4,'CHANEL 19 WALLET ON CHAIN',15,1),(5,'WALLET ON CHAIN',15,1),(6,'CLASSIC WALLET ON CHAIN',15,1),(7,'CLASSIC LONG FLAP WALLET',16,1),(8,'CLASSIC LONG ZIPPED WALLET',16,1),(9,'BOY CHANEL Long Flap Wallet',16,1),(10,'MESSENGER BAG BOY CHANEL SMALL SIZE',17,1),(11,'Classic Small Flap Wallet ',17,1),(12,'CHANEL 19 SMALL FLAP WALLET',17,1),(13,'Black Dior Oblique Galaxy Leather',18,2),(14,'Black Dior Oblique Galaxy Leather',18,2),(15,'Dior Oblique JacquardS ADDLE FLAP COMPACT ZIPPED CARD HOLDER',18,2),(16,'Blue Dior Oblique Jacquard LONG SADDLE WALLET WITH CHAIN',19,2),(17,'Black Ultramatte Calfskin LONG SADDLE WALLET WITH CHAIN',19,2),(18,'Black Goatskin LONG SADDLE WALLET WITH CHAIN',19,2),(19,'Black Dior Oblique Jacquard ZIPPED LONG WALLET',20,2),(20,'Black Dior Oblique Galaxy Leathe ZIPPED LONG WALLET',20,2),(21,'Blue Dior Oblique Jacquard LONG SADDLE WALLET WITH CHAIN',20,2),(22,'Gray Dior Oblique Jacquard SADDLE LOTUS WALLET',21,2),(23,'Blue Dior Oblique Jacquard 30 MONTAIGNE LOTUS WALLET',21,2),(24,'DIOR CARO COMPACT ZIPPED WALLET Azure Blue Supple Cannage Calfskin',21,2),(37,'COIN CARD HOLDER',26,4),(38,'POCKET ORGANIZER',26,4),(39,'COIN CARD HOLDER',26,4),(40,'BANDOULIÈRE',27,4),(41,'TOILETRY POUCH ON CHAIN',27,4),(42,'MICRO MÉTIS',27,4),(43,'SARAH WALLET',28,4),(44,'BRAZZA WALLET',28,4),(45,'ZIPPY WALLET',28,4),(46,'JULIETTE WALLET',29,4),(47,'JULIETTE WALLET',29,4),(48,'CAPUCINES COMPACT WALLET',29,4),(49,'Gucci Blondie card case wallet',22,3),(50,'Keychain zip wallet',22,3),(51,'Ophidia jumbo GG key case ',22,3),(52,'Dionysus mini leather chain wallet',23,3),(53,'GG Marmont matelassé mini bag ',23,3),(54,'Gucci Blondie mini bag',23,3),(55,'GG Marmont continental wallet',24,3),(56,'Jackie 1961 chain wallet',24,3),(57,'Jackie 1961 chain wallet ',24,3),(58,'GG Matelassé card case wallet',25,3),(59,'Gucci Horsebit 1955 python wallet',25,3),(60,'Gucci Horsebit 1955 wallet',25,3);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
