-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: labo2
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
-- Table structure for table `juego`
--

DROP TABLE IF EXISTS `juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juego` (
  `id_juego` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `jugadores` smallint DEFAULT NULL,
  `lanzamiento` date DEFAULT NULL,
  `genero` varchar(50) NOT NULL,
  `portada` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juego`
--

LOCK TABLES `juego` WRITE;
/*!40000 ALTER TABLE `juego` DISABLE KEYS */;
INSERT INTO `juego` VALUES (1,'Diablo IV',1,'2023-06-05','Rol','diablo_iv.jpg'),(2,'Alan Wake',1,'2010-05-14','Survival','alan_wake.jpg'),(3,'Age Of Empires IV',1,'2021-10-28','Estrategia',''),(4,'Path Of Exile 2',1,'2024-06-07','Rol','path_of_exile_2.jpg');
/*!40000 ALTER TABLE `juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `activado` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'jpepe','39d19e8bec728e2cd4d2a4199e9434ad7df5e459','Administrador','jpepe.jpg','S'),(2,'mruiz','397747e2ea1fd4995810616087d0e6c4ab7014d4','Administrador','mruiz.jpg','S'),(3,'dsingh','abab1d2a5f608941022d1b43da6c92d574d55060','Común','dsingh.jpg','S'),(4,'cflores','d1662c4daf4585ab458111cff0b30c954603d0ea','Común','','S'),(5,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Administrador','','S'),(6,'test','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Común','','N');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-26 21:22:42
