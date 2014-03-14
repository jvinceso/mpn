CREATE DATABASE  IF NOT EXISTS `bdmpnintegrado` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bdmpnintegrado`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bdmpnintegrado
-- ------------------------------------------------------
-- Server version	5.5.27

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
-- Table structure for table `aplicacion`
--

DROP TABLE IF EXISTS `aplicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aplicacion` (
  `nAplId` int(11) NOT NULL AUTO_INCREMENT,
  `cAplNombre` varchar(50) NOT NULL,
  `nAplTipo` char(1) NOT NULL,
  `cAplIcono` varchar(50) NOT NULL,
  `cAplEstado` char(1) NOT NULL DEFAULT '1',
  `dAplFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nAplOrden` int(11) NOT NULL,
  PRIMARY KEY (`nAplId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aplicacion`
--

LOCK TABLES `aplicacion` WRITE;
/*!40000 ALTER TABLE `aplicacion` DISABLE KEYS */;
INSERT INTO `aplicacion` VALUES (1,'Utilitarios','1',' icon-cogs','1','2014-03-01 18:28:31',0),(2,'Estadisticas','1','icon-bar-chart ','1','2014-03-01 21:20:22',1),(3,'Agua','','icon-cloud','1','2014-03-06 00:53:09',2),(4,'Caja','','icon-credit-card','1','2014-03-06 00:55:30',3);
/*!40000 ALTER TABLE `aplicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objeto`
--

DROP TABLE IF EXISTS `objeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objeto` (
  `nObjId` int(11) NOT NULL AUTO_INCREMENT,
  `nAplId` int(11) NOT NULL,
  `cObjNombre` varchar(100) NOT NULL,
  `bObjTipo` int(11) NOT NULL,
  `nObjIdPadre` int(11) NOT NULL,
  `dObjFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cObjEstado` int(11) NOT NULL DEFAULT '1',
  `nObjOrden` int(11) DEFAULT NULL,
  PRIMARY KEY (`nObjId`),
  KEY `FK_Objeto_Aplicacion_idx` (`nAplId`),
  CONSTRAINT `FK_Objeto_Aplicacion` FOREIGN KEY (`nAplId`) REFERENCES `aplicacion` (`nAplId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto`
--

LOCK TABLES `objeto` WRITE;
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` VALUES (1,1,'ConFigurar Modulos',1,0,'2014-03-01 18:44:59',1,1),(2,1,'Desconfigurar Modulos',1,0,'2014-03-01 21:20:56',1,2),(3,1,'Copia de Seguridad',1,0,'2014-03-01 21:21:53',1,3),(4,2,'Reporte Anual',1,0,'2014-03-01 21:22:33',1,1),(5,2,'Reporte de Usuarios',1,0,'2014-03-01 21:22:33',1,2),(6,3,'Contribuyente',1,0,'2014-03-07 21:35:27',1,1);
/*!40000 ALTER TABLE `objeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objeto_detalle`
--

DROP TABLE IF EXISTS `objeto_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objeto_detalle` (
  `nOdetId` int(11) NOT NULL AUTO_INCREMENT,
  `nObjId` int(11) NOT NULL,
  `cOdetNombreArchivo` varchar(200) NOT NULL,
  `nOdetTipo` int(11) NOT NULL,
  `cOdetPlataforma` char(1) NOT NULL,
  `cOdetEstado` char(1) NOT NULL DEFAULT '1',
  `dOdetFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nOdetId`),
  KEY `FK_Objeto_Detalle_Objeto_idx` (`nObjId`),
  CONSTRAINT `FK_Objeto_Detalle_Objeto` FOREIGN KEY (`nObjId`) REFERENCES `objeto` (`nObjId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto_detalle`
--

LOCK TABLES `objeto_detalle` WRITE;
/*!40000 ALTER TABLE `objeto_detalle` DISABLE KEYS */;
INSERT INTO `objeto_detalle` VALUES (1,1,'../utilitarios/modulo.html',1,'I','1','2014-03-01 18:50:19'),(2,2,'../inicio/conf.html',1,'I','1','2014-03-01 22:00:56'),(3,3,'../utilitarios/backup.html',1,'I','1','2014-03-01 22:00:56'),(4,4,'../inicio/prueba.html',1,'I','1','2014-03-01 22:00:56'),(5,5,'../inicio/mpn.html',1,'I','1','2014-03-01 22:00:56'),(6,6,'../agua/contribuyente.html',1,'I','1','2014-03-07 21:55:00');
/*!40000 ALTER TABLE `objeto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `nPerId` int(11) NOT NULL AUTO_INCREMENT,
  `cPerApellidoPaterno` varchar(50) DEFAULT NULL,
  `cPerApellidoMaterno` varchar(50) DEFAULT NULL,
  `cPerNombres` varchar(100) NOT NULL,
  `dPerFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cPerEstado` char(1) NOT NULL DEFAULT '1',
  `cPerRandom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nPerId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Castro','Aurora','Diego Armando','2014-02-27 00:27:38','1','e10adc3949ba59abbe56e057f20f883e'),(2,'Vinces','Ortiz','José Alexander','2014-02-27 00:29:11','1','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_detalle`
--

DROP TABLE IF EXISTS `persona_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_detalle` (
  `nPdeId` int(11) NOT NULL AUTO_INCREMENT,
  `nPerId` int(11) NOT NULL,
  `nMulId` int(11) NOT NULL,
  `cPdeValor` varchar(200) DEFAULT NULL,
  `dPedFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cPedEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nPdeId`),
  KEY `FK_Persona_Detalle_idx` (`nPerId`),
  CONSTRAINT `FK_Persona_Detalle` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_detalle`
--

LOCK TABLES `persona_detalle` WRITE;
/*!40000 ALTER TABLE `persona_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_juridica`
--

DROP TABLE IF EXISTS `persona_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_juridica` (
  `nPerId` int(11) NOT NULL,
  `nMulIdRubro` int(11) NOT NULL,
  PRIMARY KEY (`nPerId`),
  CONSTRAINT `FK_Persona_Juridica` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_juridica`
--

LOCK TABLES `persona_juridica` WRITE;
/*!40000 ALTER TABLE `persona_juridica` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_natural`
--

DROP TABLE IF EXISTS `persona_natural`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_natural` (
  `nPerId` int(11) NOT NULL,
  `bPnaSexo` bit(1) NOT NULL,
  `dPnaFechaNacimiento` date NOT NULL,
  `dPnaFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nPnaEdad` char(2) DEFAULT NULL,
  `nUbiId` int(11) NOT NULL,
  `cUbiIdDepartamento` char(2) DEFAULT NULL,
  `cUbiIdProvincia` char(2) DEFAULT NULL,
  `cUbiIdDistrito` char(2) DEFAULT NULL,
  PRIMARY KEY (`nPerId`),
  CONSTRAINT `FK_Persona` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_natural`
--

LOCK TABLES `persona_natural` WRITE;
/*!40000 ALTER TABLE `persona_natural` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_natural` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubigeo`
--

DROP TABLE IF EXISTS `ubigeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubigeo` (
  `nUbiId` int(11) NOT NULL AUTO_INCREMENT,
  `nPaiId` int(11) NOT NULL,
  `cUbiIdDepartamento` char(2) CHARACTER SET utf8 NOT NULL,
  `cUbiIdProvincia` char(2) CHARACTER SET utf8 NOT NULL,
  `cUbiIdDistrito` char(2) CHARACTER SET utf8 NOT NULL,
  `cUbiDescripcion` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`nUbiId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubigeo`
--

LOCK TABLES `ubigeo` WRITE;
/*!40000 ALTER TABLE `ubigeo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubigeo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `nUsuId` int(11) NOT NULL AUTO_INCREMENT,
  `nPerId` int(11) NOT NULL,
  `cUsuNick` varchar(100) NOT NULL,
  `cUsuClave` varchar(100) NOT NULL,
  `dUsuFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cUsuEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nUsuId`),
  KEY `FK_Usuario_Persona_idx` (`nPerId`),
  CONSTRAINT `FK_Usuario_Persona` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'dcastro','e10adc3949ba59abbe56e057f20f883e','2014-02-27 00:32:50','1'),(2,2,'jvinces','e10adc3949ba59abbe56e057f20f883e','2014-02-27 00:32:50','1');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_objeto`
--

DROP TABLE IF EXISTS `usuario_objeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_objeto` (
  `nUobId` int(11) NOT NULL AUTO_INCREMENT,
  `nObjId` int(11) NOT NULL,
  `nUsuId` int(11) NOT NULL,
  `dUobFecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cUobEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nUobId`),
  KEY `FK_Usuario_objeto_Usuario_idx` (`nUsuId`),
  KEY `FK_Usuario_Objeto_Objeto_idx` (`nObjId`),
  CONSTRAINT `FK_Usuario_Objeto_Objeto` FOREIGN KEY (`nObjId`) REFERENCES `objeto` (`nObjId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Usuario_objeto_Usuario` FOREIGN KEY (`nUsuId`) REFERENCES `usuario` (`nUsuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_objeto`
--

LOCK TABLES `usuario_objeto` WRITE;
/*!40000 ALTER TABLE `usuario_objeto` DISABLE KEYS */;
INSERT INTO `usuario_objeto` VALUES (1,1,2,'2014-03-01 18:58:03','1'),(2,2,2,'2014-03-01 21:57:07','1'),(3,3,2,'2014-03-01 21:57:07','1'),(4,4,2,'2014-03-01 21:57:07','1'),(5,5,2,'2014-03-01 21:57:07','1'),(6,1,1,'2014-03-04 00:24:33','1'),(7,2,1,'2014-03-04 00:24:33','1'),(8,3,1,'2014-03-04 00:24:33','1'),(9,4,1,'2014-03-04 00:24:33','1'),(10,5,1,'2014-03-04 00:24:33','1'),(11,6,1,'2014-03-07 21:48:47','1');
/*!40000 ALTER TABLE `usuario_objeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bdmpnintegrado'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_s_iniciarsesion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_s_iniciarsesion`(
	IN cusuario VARCHAR(100), 
	IN cclave VARCHAR(100)
)
BEGIN
	select u.nUsuId,p.nPerId,u.cUsuNick,CONCAT(p.cPerNombres,' ',p.cPerApellidoPaterno) as nombre from usuario u 
		inner join persona p ON u.nPerId = p.nPerId
	where u.cUsuNick = cusuario and u.cUsuClave = cclave and p.cPerEstado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-07 20:02:16
