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
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `Brand_ID` int NOT NULL AUTO_INCREMENT,
  `Brand_name` varchar(50) DEFAULT NULL,
  `Brand_logo` varchar(500) DEFAULT NULL,
  `Brand_slide_img` varchar(500) DEFAULT NULL,
  `Brand_video_demo` varchar(500) DEFAULT NULL,
  `Brand_information` text,
  `Brand_history` text,
  `Brand_slug` varchar(20) DEFAULT NULL,
  `Create_at` datetime DEFAULT NULL,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Brand_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Chanel',NULL,NULL,NULL,'Chanel (/ʃəˈnɛl/ shə-NEL, French: [ʃanɛl] (listen)) is a French high-end luxury fashion house founded in 1910 by Coco Chanel in Paris. Chanel specializes in women\'s ready-to-wear, luxury goods, and accessories[3] and licenses its name and branding to Luxottica for eyewear.[4] Chanel is well known for its No. 5 perfume and \"Chanel Suit\".[5] Chanel is credited for revolutionizing haute couture and ready-to-wear by replacing structured, corseted silhouettes with more functional garments that women still found flattering','The House of Chanel originated in 1909 when Gabrielle Chanel opened a millinery shop at 160 Boulevard Malesherbes, the ground floor of the Parisian flat of the socialite and textile businessman Étienne Balsan, of whom she was the mistress.[3] Because the Balsan flat also was a salon for the French hunting and sporting élite, Chanel had the opportunity to meet their demi-mondaine mistresses who, as such, were women of fashion, upon whom the rich men displayed their wealth – as ornate clothes, jewellery, and hats.',NULL,NULL,NULL),(2,'Dior',NULL,NULL,NULL,'Christian Dior SE (French: [kʁistjɑ̃ djɔʁ]),[1] commonly known as Dior (stylized DIOR), is a French high-end luxury fashion house[2] controlled and chaired by French businessman Bernard Arnault, who also heads LVMH, the world\'s largest luxury group. Dior holds 42.36% shares of and 59.01% voting rights within LVMH.[7][8]','The House of Dior was established on 16 December 1946[10][6] at 30 Avenue Montaigne in Paris. However, the current Dior corporation celebrates \"1947\" as the opening year.[6] Dior was financially backed by wealthy businessman Marcel Boussac.[6][11] Boussac had originally invited Dior to design for Philippe et Gaston, but Dior refused, wishing to make a fresh start under his own name rather than reviving an old brand.[12] The new couture house became a part of \"a vertically integrated textile business\" already operated by Boussac.',NULL,NULL,NULL),(3,'Gucci',NULL,NULL,NULL,'Gucci (/ˈɡuːtʃi/ (listen), GOO-chee; Italian pronunciation: [ˈɡuttʃi]) is an Italian high-end luxury fashion house based in Florence, Italy.[1][2][3] Its product lines include handbags, ready-to-wear, footwear, accessories, and home decoration; and it licenses its name and branding to Coty, Inc. for fragrance and cosmetics under the name Gucci Beauty.[4]','Gucci was founded in 1921 by Guccio Gucci (1881–1953) in Florence, Tuscany. Under the direction of Aldo Gucci (son of Guccio), Gucci became a worldwide-known brand, an icon of the Italian Dolce Vita. Following family feuds during the 1980s, the Gucci family was entirely ousted from the capital of the company by 1993. After this crisis, the brand was revived with a provocative \'Porno Chic\' props. In 1999, Gucci was acquired by the French conglomerate Pinault Printemps Redoute, which later became Kering. During the 2010s, Gucci became an iconic \'geek-chic\' brand.',NULL,NULL,NULL),(4,'Louis Vuitton',NULL,NULL,NULL,'Louis Vuitton Malletier, commonly known as Louis Vuitton (/luːˈiː vɪˈtɒn/ (listen), French: [lwi vɥitɔ̃] (listen)), is a French high-end luxury fashion house ','company founded in 1854 by Louis Vuitton.[1] The label\'s LV monogram appears on most of its products, ranging from luxury bags and leather goods to ready-to-wear, shoes, watches, jewelry, accessories, sunglasses and books. Louis Vuitton is one of the world\'s leading international fashion houses. It sells its products through standalone boutiques, lease departments in high-end departmental stores, and through the e-commerce section of its website',NULL,NULL,NULL);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
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
