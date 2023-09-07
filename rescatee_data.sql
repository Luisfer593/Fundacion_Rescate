-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: rescatee_data
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `candidatos`
--

DROP TABLE IF EXISTS `candidatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidatos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(10) DEFAULT NULL,
  `Nombres` varchar(80) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `FechaNaci` date DEFAULT NULL,
  `Direccion` varchar(150) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `RutaImagen` varchar(50) DEFAULT NULL,
  `Universidad` varchar(50) DEFAULT NULL,
  `Carrera` varchar(80) DEFAULT NULL,
  `Duracion` varchar(80) DEFAULT NULL,
  `SemestreActual` varchar(80) DEFAULT NULL,
  `Titulo` varchar(80) DEFAULT NULL,
  `Padre` varchar(120) DEFAULT NULL,
  `Madre` varchar(120) DEFAULT NULL,
  `TrabajoP` varchar(50) DEFAULT NULL,
  `TrabajoM` varchar(50) DEFAULT NULL,
  `Hermanos` int(10) DEFAULT NULL,
  `ViveConPadres` varchar(20) DEFAULT NULL,
  `ViviendaActual` varchar(40) DEFAULT NULL,
  `EstadoCivil` varchar(100) NOT NULL,
  `NoHijos` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
