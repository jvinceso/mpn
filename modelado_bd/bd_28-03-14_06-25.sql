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
  `nAplOrden` int(11) NOT NULL,
  `dAplFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cAplEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nAplId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aplicacion`
--

LOCK TABLES `aplicacion` WRITE;
/*!40000 ALTER TABLE `aplicacion` DISABLE KEYS */;
INSERT INTO `aplicacion` VALUES (1,'Utilitarios','1',' icon-cogs',0,'2014-03-01 18:28:31','0'),(2,'Estadisticas','1','icon-bar-chart ',1,'2014-03-01 21:20:22','1'),(3,'Agua','1','icon-cloud',2,'2014-03-06 00:53:09','1'),(4,'Caja','1','icon-credit-card',3,'2014-03-06 00:55:30','1'),(5,'Administrador','1','icon-group ',4,'2014-03-13 22:09:07','1'),(6,'Prueba','1','iconito',5,'2014-03-22 16:13:56','1');
/*!40000 ALTER TABLE `aplicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `nAreId` int(11) NOT NULL AUTO_INCREMENT,
  `cAreDescripcion` varchar(45) NOT NULL,
  `nAreIdPadre` varchar(45) NOT NULL,
  `cAreEstado` char(1) NOT NULL DEFAULT '1',
  `dAreFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nAreId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja_dinero`
--

DROP TABLE IF EXISTS `caja_dinero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja_dinero` (
  `nCadId` int(11) NOT NULL,
  `fCadEntradaDinero` decimal(18,2) DEFAULT NULL,
  `fCadSaldoActual` decimal(18,2) DEFAULT NULL,
  `fCadSalidaDinero` decimal(18,2) DEFAULT NULL,
  `dCadFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cCadEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nCadId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja_dinero`
--

LOCK TABLES `caja_dinero` WRITE;
/*!40000 ALTER TABLE `caja_dinero` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja_dinero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja_pagos`
--

DROP TABLE IF EXISTS `caja_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja_pagos` (
  `nCpaId` int(11) NOT NULL AUTO_INCREMENT,
  `nTmuId` int(11) NOT NULL,
  `nPagId` int(11) NOT NULL,
  `cCpaSerieNumero` varchar(45) DEFAULT NULL,
  `cCpaAno` varchar(4) DEFAULT NULL,
  `nPerId` int(11) DEFAULT NULL,
  `fCpaMonto` decimal(18,2) DEFAULT NULL,
  `cCpaEstadoCobro` char(1) DEFAULT '0' COMMENT 'SI el monto esta activo para el cobro, para que caja pueda cobrar el monto agua o rentas tienen k dar la conformidad',
  `cCpaMes` varchar(50) DEFAULT NULL,
  `fCpaHoras` decimal(18,2) DEFAULT NULL,
  `cCpaSector` varchar(50) DEFAULT NULL,
  `cCpaPlanilla` varchar(50) DEFAULT NULL,
  `cCpaFechaPlanilla` varchar(50) DEFAULT NULL,
  `cCpaSerie` varchar(50) DEFAULT NULL,
  `dCpaFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cCpaEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nCpaId`),
  KEY `fk_caja_pagos_Trabajador_Municipal1_idx` (`nTmuId`),
  KEY `fk_caja_pagos_pagos1_idx` (`nPagId`),
  CONSTRAINT `fk_caja_pagos_pagos1` FOREIGN KEY (`nPagId`) REFERENCES `pagos` (`nPagId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_caja_pagos_Trabajador_Municipal1` FOREIGN KEY (`nTmuId`) REFERENCES `trabajador_municipal` (`nTmuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja_pagos`
--

LOCK TABLES `caja_pagos` WRITE;
/*!40000 ALTER TABLE `caja_pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja_salidas`
--

DROP TABLE IF EXISTS `caja_salidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja_salidas` (
  `nCsaId` int(11) NOT NULL AUTO_INCREMENT,
  `nTmuId` int(11) NOT NULL,
  `cCsaConcepto` varchar(50) NOT NULL,
  `fCsaMonto` decimal(18,2) DEFAULT NULL,
  `cCsaDestinatario` varchar(50) NOT NULL,
  `nAreId` int(11) NOT NULL,
  `dCsaFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cCsaEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nCsaId`),
  KEY `fk_caja_salidas_Trabajador_Municipal1_idx` (`nTmuId`),
  CONSTRAINT `fk_caja_salidas_Trabajador_Municipal1` FOREIGN KEY (`nTmuId`) REFERENCES `trabajador_municipal` (`nTmuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja_salidas`
--

LOCK TABLES `caja_salidas` WRITE;
/*!40000 ALTER TABLE `caja_salidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja_salidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calle`
--

DROP TABLE IF EXISTS `calle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calle` (
  `nCalId` int(11) NOT NULL AUTO_INCREMENT,
  `cCalNombre` varchar(50) NOT NULL,
  `nTivId` int(11) NOT NULL,
  `nSecId` int(11) NOT NULL,
  `nCalEstado` char(1) NOT NULL DEFAULT '1',
  `dCalFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nCalId`),
  KEY `FK_Calle_Tipo_Via` (`nTivId`),
  KEY `fk_calle_sector1_idx` (`nSecId`),
  CONSTRAINT `fk_calle_sector1` FOREIGN KEY (`nSecId`) REFERENCES `sector` (`nSecId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Calle_Tipo_Via` FOREIGN KEY (`nTivId`) REFERENCES `tipo_via` (`nTivId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calle`
--

LOCK TABLES `calle` WRITE;
/*!40000 ALTER TABLE `calle` DISABLE KEYS */;
/*!40000 ALTER TABLE `calle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contribuyente`
--

DROP TABLE IF EXISTS `contribuyente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contribuyente` (
  `nConId` int(11) NOT NULL AUTO_INCREMENT,
  `cConTipoTarifa` char(1) DEFAULT NULL,
  `nPerId` int(11) NOT NULL,
  `cConEstado` char(1) NOT NULL DEFAULT '1',
  `dConFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nConId`),
  KEY `fk_contribuyente_persona1_idx` (`nPerId`),
  CONSTRAINT `fk_contribuyente_persona1` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contribuyente`
--

LOCK TABLES `contribuyente` WRITE;
/*!40000 ALTER TABLE `contribuyente` DISABLE KEYS */;
/*!40000 ALTER TABLE `contribuyente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correlativo`
--

DROP TABLE IF EXISTS `correlativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `correlativo` (
  `cCorTabla` varchar(50) NOT NULL,
  `cCorCampo` varchar(30) NOT NULL,
  `cCorValor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correlativo`
--

LOCK TABLES `correlativo` WRITE;
/*!40000 ALTER TABLE `correlativo` DISABLE KEYS */;
/*!40000 ALTER TABLE `correlativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costo_servicios_tipo`
--

DROP TABLE IF EXISTS `costo_servicios_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costo_servicios_tipo` (
  `nCstId` int(11) NOT NULL,
  `nSetId` int(11) NOT NULL,
  `fCstPago` double DEFAULT NULL,
  `nCstAnio` int(11) DEFAULT NULL,
  `dCstFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cCsrEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`nCstId`),
  KEY `fk_Costo_Servicios_Tipo_Servicios_Tipo1_idx` (`nSetId`),
  CONSTRAINT `fk_Costo_Servicios_Tipo_Servicios_Tipo1` FOREIGN KEY (`nSetId`) REFERENCES `servicios_tipo` (`nSetId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costo_servicios_tipo`
--

LOCK TABLES `costo_servicios_tipo` WRITE;
/*!40000 ALTER TABLE `costo_servicios_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `costo_servicios_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion_calle`
--

DROP TABLE IF EXISTS `direccion_calle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion_calle` (
  `nDicId` int(11) NOT NULL,
  `nPdeId` int(11) DEFAULT NULL,
  `nCalId` int(11) NOT NULL,
  PRIMARY KEY (`nDicId`),
  KEY `fk_Contribuyente_Calle_calle1_idx` (`nCalId`),
  CONSTRAINT `fk_Contribuyente_Calle_calle1` FOREIGN KEY (`nCalId`) REFERENCES `calle` (`nCalId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion_calle`
--

LOCK TABLES `direccion_calle` WRITE;
/*!40000 ALTER TABLE `direccion_calle` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion_calle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `EMP_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `EMP_Apellidos` varchar(50) NOT NULL,
  `EMP_Nombres` varchar(50) NOT NULL,
  `EMP_Direccion` varchar(50) NOT NULL,
  `EMP_Telefono` varchar(50) NOT NULL,
  `EMP_Distrito` varchar(50) NOT NULL,
  PRIMARY KEY (`EMP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fechas vencimiento`
--

DROP TABLE IF EXISTS `fechas vencimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fechas vencimiento` (
  `nFevId` int(11) NOT NULL,
  `nFevAnio` int(11) DEFAULT NULL,
  `nFevCuota` int(11) DEFAULT NULL,
  `dFevFecha_vence` date DEFAULT NULL,
  `dFevFecha_corte` date DEFAULT NULL,
  `dFevFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cFevEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`nFevId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fechas vencimiento`
--

LOCK TABLES `fechas vencimiento` WRITE;
/*!40000 ALTER TABLE `fechas vencimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `fechas vencimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fraccionamiento`
--

DROP TABLE IF EXISTS `fraccionamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fraccionamiento` (
  `nFracId` int(11) NOT NULL,
  `nConId` int(11) NOT NULL,
  `fFracTotalDeuda` double DEFAULT NULL,
  `fFracTotalAbono` double DEFAULT NULL,
  `nFracCuotas` int(11) DEFAULT NULL,
  `cFracRecibos` varchar(100) DEFAULT NULL,
  `dFracFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cFracEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`nFracId`),
  KEY `fk_Fraccionamiento_contribuyente1_idx` (`nConId`),
  CONSTRAINT `fk_Fraccionamiento_contribuyente1` FOREIGN KEY (`nConId`) REFERENCES `contribuyente` (`nConId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fraccionamiento`
--

LOCK TABLES `fraccionamiento` WRITE;
/*!40000 ALTER TABLE `fraccionamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `fraccionamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fraccionamiento_detalle`
--

DROP TABLE IF EXISTS `fraccionamiento_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fraccionamiento_detalle` (
  `nFrdId` int(11) NOT NULL,
  `nFracId` int(11) NOT NULL,
  `nFrdCuotaNumero` int(11) DEFAULT NULL,
  `fFrdMontoCuota` double DEFAULT NULL,
  `dFrdFechaPago` date DEFAULT NULL,
  `dFrdFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cFrdEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`nFrdId`),
  KEY `fk_Fraccionamiento_Detalle_Fraccionamiento1_idx` (`nFracId`),
  CONSTRAINT `fk_Fraccionamiento_Detalle_Fraccionamiento1` FOREIGN KEY (`nFracId`) REFERENCES `fraccionamiento` (`nFracId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fraccionamiento_detalle`
--

LOCK TABLES `fraccionamiento_detalle` WRITE;
/*!40000 ALTER TABLE `fraccionamiento_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `fraccionamiento_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multitabla`
--

DROP TABLE IF EXISTS `multitabla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multitabla` (
  `nMulId` int(11) NOT NULL AUTO_INCREMENT,
  `nMulIdPadre` int(11) NOT NULL,
  `cMulDescripcion` varchar(100) NOT NULL,
  `cMulEstado` varchar(100) NOT NULL,
  PRIMARY KEY (`nMulId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multitabla`
--

LOCK TABLES `multitabla` WRITE;
/*!40000 ALTER TABLE `multitabla` DISABLE KEYS */;
INSERT INTO `multitabla` VALUES (1,0,'Tipo de Pago','1'),(2,1,'Rentas','1'),(3,1,'Area De Luz','1'),(4,1,'Area De Agua','1'),(5,1,'Desague','1'),(6,1,'Maquinaria','1'),(7,1,'Transportes','1'),(8,1,'Adm Merc. y Camal','1'),(9,1,'Administ. de Piscina','1'),(10,1,'Secretaria General','1'),(11,1,'Asesoria Legal','1'),(12,1,'Tesoreria','1'),(13,1,'Desarrollo Urbano','1'),(14,1,'Registro Civil','1'),(15,0,'Tipo Documento','1'),(16,15,'DNI','1'),(17,15,'RUC','1');
/*!40000 ALTER TABLE `multitabla` ENABLE KEYS */;
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
  `nObjOrden` int(11) DEFAULT NULL,
  `cObjEstado` int(11) NOT NULL DEFAULT '1',
  `dObjFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nObjId`),
  KEY `FK_Objeto_Aplicacion_idx` (`nAplId`),
  CONSTRAINT `FK_Objeto_Aplicacion` FOREIGN KEY (`nAplId`) REFERENCES `aplicacion` (`nAplId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto`
--

LOCK TABLES `objeto` WRITE;
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` VALUES (1,1,'ConFigurar Modulos',1,0,1,1,'2014-03-01 18:44:59'),(2,1,'Desconfigurar Modulos',1,0,2,1,'2014-03-01 21:20:56'),(3,1,'Copia de Seguridad',1,0,3,1,'2014-03-01 21:21:53'),(4,2,'Reporte Anual',1,0,1,1,'2014-03-01 21:22:33'),(5,2,'Reporte de Usuarios',1,0,2,1,'2014-03-01 21:22:33'),(6,3,'Contribuyente',1,0,1,1,'2014-03-07 21:35:27'),(7,5,'Trabajador',1,0,1,1,'2014-03-13 22:09:49'),(8,5,'Permisos',1,0,2,1,'2014-03-13 23:57:43'),(9,4,'Concepto de Pago',1,0,1,1,'2014-03-17 03:04:01'),(14,4,'Ciere de Caja',1,0,2,1,'2014-03-17 04:15:16');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto_detalle`
--

LOCK TABLES `objeto_detalle` WRITE;
/*!40000 ALTER TABLE `objeto_detalle` DISABLE KEYS */;
INSERT INTO `objeto_detalle` VALUES (1,1,'../utilitarios/modulo.html',1,'I','1','2014-03-01 18:50:19'),(2,2,'../inicio/conf.html',1,'I','1','2014-03-01 22:00:56'),(3,3,'../utilitarios/backup.html',1,'I','1','2014-03-01 22:00:56'),(4,4,'../inicio/prueba.html',1,'I','1','2014-03-01 22:00:56'),(5,5,'../inicio/mpn.html',1,'I','1','2014-03-01 22:00:56'),(6,6,'../agua/contribuyente.html',1,'I','1','2014-03-07 21:55:00'),(7,7,'../administrador/trabajador.html',1,'I','1','2014-03-13 22:10:27'),(8,8,'../administrador/permisos.html',1,'I','1','2014-03-13 23:58:19'),(9,9,'../caja/conceptopago.html',1,'I','1','2014-03-17 03:04:34'),(10,14,'../caja/cierrecaja.html',1,'I','1','2014-03-17 04:08:35');
/*!40000 ALTER TABLE `objeto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `nPagId` int(11) NOT NULL AUTO_INCREMENT,
  `cPagDescripcion` varchar(200) NOT NULL,
  `fPagCosto` decimal(18,2) DEFAULT NULL,
  `nMulIdTipoPago` int(11) DEFAULT NULL COMMENT 'Registro Civil,Rentas,Area DeLuz,Area De Agua...  ETC',
  `dPagFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cPagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`nPagId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,'Partida De Matrimonio',12.00,14,'2014-03-17 02:50:46','1'),(2,'Partida De Nacimiento',8.00,14,'2014-03-17 02:50:46','1'),(3,'Constancia De Alcabala',30.00,2,'2014-03-17 02:50:46','1'),(4,'Instalacion De Desague',30.00,5,'2014-03-17 02:50:46','1'),(5,'Pago de Energia Electrica',15.00,3,'2014-03-17 02:50:46','1');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
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
  `cPerRandom` varchar(100) DEFAULT NULL,
  `cPerEstado` char(1) NOT NULL DEFAULT '1',
  `dPerFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nPerId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Castro','Aurora','Diego Armando','e10adc3949ba59abbe56e057f20f883e','1','2014-02-27 00:27:38'),(2,'Vinces','Ortiz','José Alexander','e10adc3949ba59abbe56e057f20f883e','1','2014-02-27 00:29:11');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_detalle`
--

LOCK TABLES `persona_detalle` WRITE;
/*!40000 ALTER TABLE `persona_detalle` DISABLE KEYS */;
INSERT INTO `persona_detalle` VALUES (1,1,16,'43837512','2014-03-22 20:56:57','1'),(2,2,16,'46397972','2014-03-22 21:05:22','1');
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
-- Table structure for table `recibo`
--

DROP TABLE IF EXISTS `recibo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recibo` (
  `nRecId` int(11) NOT NULL,
  `nSecId` int(11) NOT NULL,
  `nFevId` int(11) NOT NULL,
  `dRecFechaImpresion` datetime DEFAULT NULL,
  `fRecDeuda` double DEFAULT NULL,
  `fRecAbono` double DEFAULT NULL,
  `fRecDescuento` varchar(45) DEFAULT NULL,
  `cRecPagado` char(1) DEFAULT NULL,
  `dRecFechaPago` varchar(45) DEFAULT NULL,
  `dRecFechaRegistro` varchar(45) DEFAULT 'CURRENT_TIMESTAMP',
  `cRecEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`nRecId`),
  KEY `fk_Recibo_Servicios_Contribuyente1_idx` (`nSecId`),
  KEY `fk_Recibo_Fechas Vencimiento1_idx` (`nFevId`),
  CONSTRAINT `fk_Recibo_Fechas Vencimiento1` FOREIGN KEY (`nFevId`) REFERENCES `fechas vencimiento` (`nFevId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recibo_Servicios_Contribuyente1` FOREIGN KEY (`nSecId`) REFERENCES `servicios_contribuyente` (`nSecId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recibo`
--

LOCK TABLES `recibo` WRITE;
/*!40000 ALTER TABLE `recibo` DISABLE KEYS */;
/*!40000 ALTER TABLE `recibo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recibo_tributo_detalle`
--

DROP TABLE IF EXISTS `recibo_tributo_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recibo_tributo_detalle` (
  `Rec_Cod` char(24) NOT NULL,
  `Con_Cod` char(6) NOT NULL,
  `Anio` char(4) NOT NULL,
  `Mes` char(2) NOT NULL,
  `Monto` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recibo_tributo_detalle`
--

LOCK TABLES `recibo_tributo_detalle` WRITE;
/*!40000 ALTER TABLE `recibo_tributo_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `recibo_tributo_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sector`
--

DROP TABLE IF EXISTS `sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sector` (
  `nSecId` int(11) NOT NULL AUTO_INCREMENT,
  `cSecNombre` varchar(50) DEFAULT NULL,
  `dSecFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cSecEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nSecId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sector`
--

LOCK TABLES `sector` WRITE;
/*!40000 ALTER TABLE `sector` DISABLE KEYS */;
/*!40000 ALTER TABLE `sector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio_contribuyente`
--

DROP TABLE IF EXISTS `servicio_contribuyente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio_contribuyente` (
  `nSerId` int(11) NOT NULL,
  `nConId` int(11) NOT NULL,
  `nMulTipoServicio` int(11) NOT NULL,
  `cSerEstado` char(1) NOT NULL DEFAULT '1',
  `dSerFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nSerId`),
  KEY `fk_servicio_contribuyente_contribuyente1_idx` (`nConId`),
  CONSTRAINT `fk_servicio_contribuyente_contribuyente1` FOREIGN KEY (`nConId`) REFERENCES `contribuyente` (`nConId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio_contribuyente`
--

LOCK TABLES `servicio_contribuyente` WRITE;
/*!40000 ALTER TABLE `servicio_contribuyente` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio_contribuyente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios_contribuyente`
--

DROP TABLE IF EXISTS `servicios_contribuyente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios_contribuyente` (
  `nSecId` int(11) NOT NULL,
  `nConId` int(11) NOT NULL,
  `nSetId` int(11) NOT NULL,
  `nDicId` int(11) NOT NULL,
  `dSecFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cSecEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`nSecId`),
  KEY `fk_Servicios_Contribuyente_contribuyente1_idx` (`nConId`),
  KEY `fk_Servicios_Contribuyente_Servicios_Tipo1_idx` (`nSetId`),
  KEY `fk_Servicios_Contribuyente_Contribuyente_Calle1_idx` (`nDicId`),
  CONSTRAINT `fk_Servicios_Contribuyente_contribuyente1` FOREIGN KEY (`nConId`) REFERENCES `contribuyente` (`nConId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servicios_Contribuyente_Contribuyente_Calle1` FOREIGN KEY (`nDicId`) REFERENCES `direccion_calle` (`nDicId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servicios_Contribuyente_Servicios_Tipo1` FOREIGN KEY (`nSetId`) REFERENCES `servicios_tipo` (`nSetId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_contribuyente`
--

LOCK TABLES `servicios_contribuyente` WRITE;
/*!40000 ALTER TABLE `servicios_contribuyente` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios_contribuyente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios_tipo`
--

DROP TABLE IF EXISTS `servicios_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios_tipo` (
  `nSetId` int(11) NOT NULL,
  `nMulServicio` int(11) DEFAULT NULL COMMENT 'Sale de multitabla',
  `nMulTipoServicio` int(11) DEFAULT NULL COMMENT 'Sale de multitabla',
  `dSetFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cSetEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`nSetId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_tipo`
--

LOCK TABLES `servicios_tipo` WRITE;
/*!40000 ALTER TABLE `servicios_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pago`
--

DROP TABLE IF EXISTS `tipo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_pago` (
  `TIP_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `TIP_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TIP_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pago`
--

LOCK TABLES `tipo_pago` WRITE;
/*!40000 ALTER TABLE `tipo_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_via`
--

DROP TABLE IF EXISTS `tipo_via`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_via` (
  `nTivId` int(11) NOT NULL AUTO_INCREMENT,
  `nTivNombre` char(50) DEFAULT NULL,
  `dTivFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cTivEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nTivId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_via`
--

LOCK TABLES `tipo_via` WRITE;
/*!40000 ALTER TABLE `tipo_via` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_via` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador_municipal`
--

DROP TABLE IF EXISTS `trabajador_municipal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador_municipal` (
  `nTmuId` int(11) NOT NULL,
  `nPerId` int(11) NOT NULL,
  `nAreId` int(11) NOT NULL,
  `nMulCargo` int(11) DEFAULT NULL,
  `cTmuEstado` char(1) DEFAULT '1',
  `fTmuFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nTmuId`),
  KEY `fk_Trabajador_Municipal_persona1_idx` (`nPerId`),
  KEY `fk_Trabajador_Municipal_Area1_idx` (`nAreId`),
  CONSTRAINT `fk_Trabajador_Municipal_Area1` FOREIGN KEY (`nAreId`) REFERENCES `area` (`nAreId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_Municipal_persona1` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador_municipal`
--

LOCK TABLES `trabajador_municipal` WRITE;
/*!40000 ALTER TABLE `trabajador_municipal` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajador_municipal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tributo_municipal`
--

DROP TABLE IF EXISTS `tributo_municipal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tributo_municipal` (
  `nTrmId` varchar(45) NOT NULL,
  `nConId` int(11) NOT NULL AUTO_INCREMENT,
  `cTrmAnio` char(4) NOT NULL,
  `cTrmMes` char(2) NOT NULL,
  `fTrmAgua` double DEFAULT NULL,
  `fTrmDesague` double DEFAULT NULL,
  `fTrmLimpieza` double DEFAULT NULL,
  `fTrmGastos` double DEFAULT NULL,
  `fTrmPorcReduccion` double DEFAULT NULL,
  `fTrmDeuda` double DEFAULT NULL,
  `fTrmAbono` double DEFAULT NULL,
  `cTrmDescargado` char(1) NOT NULL DEFAULT 'N',
  `cTrmFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cTrmEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nTrmId`),
  KEY `fk_tributo_municipal_contribuyente1_idx` (`nConId`),
  CONSTRAINT `fk_tributo_municipal_contribuyente1` FOREIGN KEY (`nConId`) REFERENCES `contribuyente` (`nConId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tributo_municipal`
--

LOCK TABLES `tributo_municipal` WRITE;
/*!40000 ALTER TABLE `tributo_municipal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tributo_municipal` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2313 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubigeo`
--

LOCK TABLES `ubigeo` WRITE;
/*!40000 ALTER TABLE `ubigeo` DISABLE KEYS */;
INSERT INTO `ubigeo` VALUES (1,2241,'01','00','00','AMAZONAS'),(2,2241,'02','00','00','ANCASH'),(3,2241,'03','00','00','APURIMAC'),(4,2241,'04','00','00','AREQUIPA'),(5,2241,'05','00','00','AYACUCHO'),(6,2241,'06','00','00','CAJAMARCA'),(7,2241,'07','00','00','CALLAO'),(8,2241,'08','00','00','CUSCO'),(9,2241,'09','00','00','HUANCAVELICA'),(10,2241,'10','00','00','HUANUCO'),(11,2241,'11','00','00','ICA'),(12,2241,'12','00','00','JUNIN'),(13,2241,'13','00','00','LA LIBERTAD'),(14,2241,'14','00','00','LAMBAYEQUE'),(15,2241,'15','00','00','LIMA'),(16,2241,'16','00','00','LORETO'),(17,2241,'17','00','00','MADRE DE DIOS'),(18,2241,'18','00','00','MOQUEGUA'),(19,2241,'19','00','00','PASCO'),(20,2241,'20','00','00','PIURA'),(21,2241,'21','00','00','PUNO'),(22,2241,'22','00','00','SAN MARTIN'),(23,2241,'23','00','00','TACNA'),(24,2241,'24','00','00','TUMBES'),(25,2241,'25','00','00','UCAYALI'),(26,2241,'01','01','00','CHACHAPOYAS'),(27,2241,'01','02','00','BAGUA'),(28,2241,'01','03','00','BONGARA'),(29,2241,'01','04','00','CONDORCANQUI'),(30,2241,'01','05','00','LUYA'),(31,2241,'01','06','00','RODRIGUEZ DE MENDOZA'),(32,2241,'01','07','00','UTCUBAMBA'),(33,2241,'02','01','00','HUARAZ'),(34,2241,'02','02','00','AIJA'),(35,2241,'02','03','00','ANTONIO RAYMONDI'),(36,2241,'02','04','00','ASUNCION'),(37,2241,'02','05','00','BOLOGNESI'),(38,2241,'02','06','00','CARHUAZ'),(39,2241,'02','07','00','CARLOS FERMIN FITZCARRALD'),(40,2241,'02','08','00','CASMA'),(41,2241,'02','09','00','CORONGO'),(42,2241,'02','10','00','HUARI'),(43,2241,'02','11','00','HUARMEY'),(44,2241,'02','12','00','HUAYLAS'),(45,2241,'02','13','00','MARISCAL LUZURIAGA'),(46,2241,'02','14','00','OCROS'),(47,2241,'02','15','00','PALLASCA'),(48,2241,'02','16','00','POMABAMBA'),(49,2241,'02','17','00','RECUAY'),(50,2241,'02','18','00','SANTA'),(51,2241,'02','19','00','SIHUAS'),(52,2241,'02','20','00','YUNGAY'),(53,2241,'03','01','00','ABANCAY'),(54,2241,'03','02','00','ANDAHUAYLAS'),(55,2241,'03','03','00','ANTABAMBA'),(56,2241,'03','04','00','AYMARAES'),(57,2241,'03','05','00','COTABAMBAS'),(58,2241,'03','06','00','CHINCHEROS'),(59,2241,'03','07','00','GRAU'),(60,2241,'04','01','00','AREQUIPA'),(61,2241,'04','02','00','CAMANA'),(62,2241,'04','03','00','CARAVELI'),(63,2241,'04','04','00','CASTILLA'),(64,2241,'04','05','00','CAYLLOMA'),(65,2241,'04','06','00','CONDESUYOS'),(66,2241,'04','07','00','ISLAY'),(67,2241,'04','08','00','LA UNION'),(68,2241,'05','01','00','HUAMANGA'),(69,2241,'05','02','00','CANGALLO'),(70,2241,'05','03','00','HUANCA SANCOS'),(71,2241,'05','04','00','HUANTA'),(72,2241,'05','05','00','LA MAR'),(73,2241,'05','06','00','LUCANAS'),(74,2241,'05','07','00','PARINACOCHAS'),(75,2241,'05','08','00','PAUCAR DEL SARA SARA'),(76,2241,'05','09','00','SUCRE'),(77,2241,'05','10','00','VICTOR FAFARDO'),(78,2241,'05','10','00','VICTOR FAJARDO'),(79,2241,'05','11','00','VILCAS HUAMAN'),(80,2241,'06','01','00','CAJAMARCA'),(81,2241,'06','02','00','CAJABAMBA'),(82,2241,'06','03','00','CELENDIN'),(83,2241,'06','04','00','CHOTA'),(84,2241,'06','05','00','CONTUMAZA'),(85,2241,'06','06','00','CUTERVO'),(86,2241,'06','07','00','HUALGAYOC'),(87,2241,'06','08','00','JAEN'),(88,2241,'06','09','00','SAN IGNACIO'),(89,2241,'06','10','00','SAN MARCOS'),(90,2241,'06','11','00','SAN MIGUEL'),(91,2241,'06','12','00','SAN PABLO'),(92,2241,'06','13','00','SANTA CRUZ'),(93,2241,'07','01','00','CALLAO'),(94,2241,'08','01','00','CUSCO'),(95,2241,'08','02','00','ACOMAYO'),(96,2241,'08','03','00','ANTA'),(97,2241,'08','04','00','CALCA'),(98,2241,'08','05','00','CANAS'),(99,2241,'08','06','00','CANCHIS'),(100,2241,'08','07','00','CHUMBIVILCAS'),(101,2241,'08','08','00','ESPINAR'),(102,2241,'08','09','00','LA CONVENCION'),(103,2241,'08','10','00','PARURO'),(104,2241,'08','11','00','PAUCARTAMBO'),(105,2241,'08','12','00','QUISPICANCHI'),(106,2241,'08','13','00','URUBAMBA'),(107,2241,'09','01','00','HUANCAVELICA'),(108,2241,'09','02','00','ACOBAMBA'),(109,2241,'09','03','00','ANGARAES'),(110,2241,'09','04','00','CASTROVIRREYNA'),(111,2241,'09','05','00','CHURCAMPA'),(112,2241,'09','06','00','HUAYTARA'),(113,2241,'09','07','00','TAYACAJA'),(114,2241,'10','01','00','HUANUCO'),(115,2241,'10','02','00','AMBO'),(116,2241,'10','03','00','DOS DE MAYO'),(117,2241,'10','04','00','HUACAYBAMBA'),(118,2241,'10','05','00','HUAMALIES'),(119,2241,'10','06','00','LEONCIO PRADO'),(120,2241,'10','07','00','MARAÑON'),(121,2241,'10','08','00','PACHITEA'),(122,2241,'10','09','00','PUERTO INCA'),(123,2241,'10','10','00','LAURICOCHA'),(124,2241,'10','11','00','YAROWILCA'),(125,2241,'11','01','00','ICA'),(126,2241,'11','02','00','CHINCHA'),(127,2241,'11','03','00','NAZCA'),(128,2241,'11','04','00','PALPA'),(129,2241,'11','05','00','PISCO'),(130,2241,'12','01','00','HUANCAYO'),(131,2241,'12','02','00','CONCEPCION'),(132,2241,'12','03','00','CHANCHAMAYO'),(133,2241,'12','04','00','JAUJA'),(134,2241,'12','05','00','JUNIN'),(135,2241,'12','06','00','SATIPO'),(136,2241,'12','07','00','TARMA'),(137,2241,'12','08','00','YAULI'),(138,2241,'12','09','00','CHUPACA'),(139,2241,'13','01','00','TRUJILLO'),(140,2241,'13','02','00','ASCOPE'),(141,2241,'13','03','00','BOLIVAR'),(142,2241,'13','04','00','CHEPEN'),(143,2241,'13','05','00','JULCAN'),(144,2241,'13','06','00','OTUZCO'),(145,2241,'13','07','00','PACASMAYO'),(146,2241,'13','08','00','PATAZ'),(147,2241,'13','09','00','SANCHEZ CARRION'),(148,2241,'13','10','00','SANTIAGO DE CHUCO'),(149,2241,'13','11','00','GRAN CHIMU'),(150,2241,'13','12','00','VIRU'),(151,2241,'14','01','00','CHICLAYO'),(152,2241,'14','02','00','FERREÑAFE'),(153,2241,'14','03','00','LAMBAYEQUE'),(154,2241,'15','01','00','LIMA'),(155,2241,'15','02','00','BARRANCA'),(156,2241,'15','03','00','CAJATAMBO'),(157,2241,'15','04','00','CANTA'),(158,2241,'15','05','00','CAÑETE'),(159,2241,'15','06','00','HUARAL'),(160,2241,'15','07','00','HUAROCHIRI'),(161,2241,'15','08','00','HUAURA'),(162,2241,'15','09','00','OYON'),(163,2241,'15','10','00','YAUYOS'),(164,2241,'16','01','00','MAYNAS'),(165,2241,'16','02','00','ALTO AMAZONAS'),(166,2241,'16','03','00','LORETO'),(167,2241,'16','04','00','MARISCAL RAMON CASTILLA'),(168,2241,'16','05','00','REQUENA'),(169,2241,'16','06','00','UCAYALI'),(170,2241,'16','07','00','DATEM DEL MARAÑON'),(171,2241,'17','01','00','TAMBOPATA'),(172,2241,'17','02','00','MANU'),(173,2241,'17','03','00','TAHUAMANU'),(174,2241,'18','01','00','MARISCAL NIETO'),(175,2241,'18','02','00','GENERAL SANCHEZ CERRO'),(176,2241,'18','03','00','ILO'),(177,2241,'19','01','00','PASCO'),(178,2241,'19','02','00','DANIEL ALCIDES CARRION'),(179,2241,'19','03','00','OXAPAMPA'),(180,2241,'20','01','00','PIURA'),(181,2241,'20','01','00','PUIRA'),(182,2241,'20','02','00','AYABACA'),(183,2241,'20','03','00','HUANCABAMBA'),(184,2241,'20','04','00','MORROPON'),(185,2241,'20','05','00','PAITA'),(186,2241,'20','06','00','SULLANA'),(187,2241,'20','07','00','TALARA'),(188,2241,'20','08','00','SECHURA'),(189,2241,'21','01','00','PUNO'),(190,2241,'21','02','00','AZANGARO'),(191,2241,'21','03','00','CARABAYA'),(192,2241,'21','04','00','CHUCUITO'),(193,2241,'21','05','00','EL COLLAO'),(194,2241,'21','06','00','HUANCANE'),(195,2241,'21','07','00','LAMPA'),(196,2241,'21','08','00','MELGAR'),(197,2241,'21','09','00','MOHO'),(198,2241,'21','10','00','SAN ANTONIO DE PUTINA'),(199,2241,'21','11','00','SAN ROMAN'),(200,2241,'21','12','00','SANDIA'),(201,2241,'21','13','00','YUNGUYO'),(202,2241,'22','01','00','MOYOBAMBA'),(203,2241,'22','02','00','BELLAVISTA'),(204,2241,'22','03','00','EL DORADO'),(205,2241,'22','04','00','HUALLAGA'),(206,2241,'22','05','00','LAMAS'),(207,2241,'22','06','00','MARISCAL CACERES'),(208,2241,'22','07','00','PICOTA'),(209,2241,'22','08','00','RIOJA'),(210,2241,'22','09','00','SAN MARTIN'),(211,2241,'22','10','00','TOCACHE'),(212,2241,'23','01','00','TACNA'),(213,2241,'23','02','00','CANDARAVE'),(214,2241,'23','03','00','JORGE BASADRE'),(215,2241,'23','04','00','TARATA'),(216,2241,'24','01','00','TUMBES'),(217,2241,'24','02','00','CONTRALMIRANTE VILLAR'),(218,2241,'24','03','00','ZARUMILLA'),(219,2241,'25','01','00','CORONEL PORTILLO'),(220,2241,'25','02','00','ATALAYA'),(221,2241,'25','03','00','PADRE ABAD'),(222,2241,'25','04','00','PURUS'),(223,2241,'01','01','01','CHACHAPOYAS'),(224,2241,'01','01','02','ASUNCION'),(225,2241,'01','01','03','BALSAS'),(226,2241,'01','01','04','CHETO'),(227,2241,'01','01','05','CHILIQUIN'),(228,2241,'01','01','06','CHUQUIBAMBA'),(229,2241,'01','01','07','GRANADA'),(230,2241,'01','01','08','HUANCAS'),(231,2241,'01','01','09','LA JALCA'),(232,2241,'01','01','10','LEIMEBAMBA'),(233,2241,'01','01','11','LEVANTO'),(234,2241,'01','01','12','MAGDALENA'),(235,2241,'01','01','13','MARISCAL CASTILLA'),(236,2241,'01','01','14','MOLINOPAMPA'),(237,2241,'01','01','15','MONTEVIDEO'),(238,2241,'01','01','16','OLLEROS'),(239,2241,'01','01','17','QUINJALCA'),(240,2241,'01','01','18','SAN FRANCISCO DE DAGUAS'),(241,2241,'01','01','19','SAN ISIDRO DE MAINO'),(242,2241,'01','01','20','SOLOCO'),(243,2241,'01','01','21','SONCHE'),(244,2241,'01','02','01','LA PECA'),(245,2241,'01','02','02','ARAMANGO'),(246,2241,'01','02','03','COPALLIN'),(247,2241,'01','02','04','EL PARCO'),(248,2241,'01','02','05','IMAZA'),(249,2241,'01','02','06','BAGUA'),(250,2241,'01','03','01','JUMBILLA'),(251,2241,'01','03','02','CHISQUILLA'),(252,2241,'01','03','03','CHURUJA'),(253,2241,'01','03','04','COROSHA'),(254,2241,'01','03','05','CUISPES'),(255,2241,'01','03','06','FLORIDA'),(256,2241,'01','03','07','JAZAN'),(257,2241,'01','03','08','RECTA'),(258,2241,'01','03','09','SAN CARLOS'),(259,2241,'01','03','10','SHIPASBAMBA'),(260,2241,'01','03','11','VALERA'),(261,2241,'01','03','12','YAMBRASBAMBA'),(262,2241,'01','04','01','NIEVA'),(263,2241,'01','04','02','EL CENEPA'),(264,2241,'01','04','03','RIO SANTIAGO'),(265,2241,'01','05','01','LAMUD'),(266,2241,'01','05','02','CAMPORREDONDO'),(267,2241,'01','05','03','COCABAMBA'),(268,2241,'01','05','04','COLCAMAR'),(269,2241,'01','05','05','CONILA'),(270,2241,'01','05','06','INGUILPATA'),(271,2241,'01','05','07','LONGUITA'),(272,2241,'01','05','08','LONYA CHICO'),(273,2241,'01','05','09','LUYA'),(274,2241,'01','05','10','LUYA VIEJO'),(275,2241,'01','05','11','MARIA'),(276,2241,'01','05','12','OCALLI'),(277,2241,'01','05','13','OCUMAL'),(278,2241,'01','05','14','PISUQUIA'),(279,2241,'01','05','15','PROVIDENCIA'),(280,2241,'01','05','16','SAN CRISTOBAL'),(281,2241,'01','05','17','SAN FRANCISCO DEL YESO'),(282,2241,'01','05','18','SAN JERONIMO'),(283,2241,'01','05','19','SAN JUAN DE LOPECANCHA'),(284,2241,'01','05','20','SANTA CATALINA'),(285,2241,'01','05','21','SANTO TOMAS'),(286,2241,'01','05','22','TINGO'),(287,2241,'01','05','23','TRITA'),(288,2241,'01','06','01','SAN NICOLAS'),(289,2241,'01','06','02','CHIRIMOTO'),(290,2241,'01','06','03','COCHAMAL'),(291,2241,'01','06','04','HUAMBO'),(292,2241,'01','06','05','LIMABAMBA'),(293,2241,'01','06','06','LONGAR'),(294,2241,'01','06','07','MARISCAL BENAVIDES'),(295,2241,'01','06','08','MILPUC'),(296,2241,'01','06','09','OMIA'),(297,2241,'01','06','10','SANTA ROSA'),(298,2241,'01','06','11','TOTORA'),(299,2241,'01','06','12','VISTA ALEGRE'),(300,2241,'01','07','01','BAGUA GRANDE'),(301,2241,'01','07','02','CAJARURO'),(302,2241,'01','07','03','CUMBA'),(303,2241,'01','07','04','EL MILAGRO'),(304,2241,'01','07','05','JAMALCA'),(305,2241,'01','07','06','LONYA GRANDE'),(306,2241,'01','07','07','YAMON'),(307,2241,'02','01','01','HUARAZ'),(308,2241,'02','01','02','COCHABAMBA'),(309,2241,'02','01','03','COLCABAMBA'),(310,2241,'02','01','04','HUANCHAY'),(311,2241,'02','01','05','INDEPENDENCIA'),(312,2241,'02','01','06','JANGAS'),(313,2241,'02','01','07','LA LIBERTAD'),(314,2241,'02','01','08','OLLEROS'),(315,2241,'02','01','09','PAMPAS'),(316,2241,'02','01','10','PARIACOTO'),(317,2241,'02','01','11','PIRA'),(318,2241,'02','01','12','TARICA'),(319,2241,'02','02','01','AIJA'),(320,2241,'02','02','02','CORIS'),(321,2241,'02','02','03','HUACLLAN'),(322,2241,'02','02','04','LA MERCED'),(323,2241,'02','02','05','SUCCHA'),(324,2241,'02','03','01','LLAMELLIN'),(325,2241,'02','03','02','ACZO'),(326,2241,'02','03','03','CHACCHO'),(327,2241,'02','03','04','CHINGAS'),(328,2241,'02','03','05','MIRGAS'),(329,2241,'02','03','06','SAN JUAN DE RONTOY'),(330,2241,'02','04','01','CHACAS'),(331,2241,'02','04','02','ACOCHACA'),(332,2241,'02','05','01','CHIQUIAN'),(333,2241,'02','05','02','ABELARDO PARDO LEZAMETA'),(334,2241,'02','05','03','ANTONIO RAYMONDI'),(335,2241,'02','05','04','AQUIA'),(336,2241,'02','05','05','CAJACAY'),(337,2241,'02','05','06','CANIS'),(338,2241,'02','05','07','COLQUIOC'),(339,2241,'02','05','08','HUALLANCA'),(340,2241,'02','05','09','HUASTA'),(341,2241,'02','05','10','HUAYLLACAYAN'),(342,2241,'02','05','11','LA PRIMAVERA'),(343,2241,'02','05','12','MANGAS'),(344,2241,'02','05','13','PACLLON'),(345,2241,'02','05','14','SAN MIGUEL DE CORPANQUI'),(346,2241,'02','05','15','TICLLOS'),(347,2241,'02','06','01','CARHUAZ'),(348,2241,'02','06','02','ACOPAMPA'),(349,2241,'02','06','03','AMASHCA'),(350,2241,'02','06','04','ANTA'),(351,2241,'02','06','05','ATAQUERO'),(352,2241,'02','06','06','MARCARA'),(353,2241,'02','06','07','PARIAHUANCA'),(354,2241,'02','06','08','SAN MIGUEL DE ACO'),(355,2241,'02','06','09','SHILLA'),(356,2241,'02','06','10','TINCO'),(357,2241,'02','06','11','YUNGAR'),(358,2241,'02','07','01','SAN LUIS'),(359,2241,'02','07','02','SAN NICOLAS'),(360,2241,'02','07','03','YAUYA'),(361,2241,'02','08','01','CASMA'),(362,2241,'02','08','02','BUENA VISTA ALTA'),(363,2241,'02','08','03','COMANDANTE NOEL'),(364,2241,'02','08','04','YAUTAN'),(365,2241,'02','09','01','CORONGO'),(366,2241,'02','09','02','ACO'),(367,2241,'02','09','03','BAMBAS'),(368,2241,'02','09','04','CUSCA'),(369,2241,'02','09','05','LA PAMPA'),(370,2241,'02','09','06','YANAC'),(371,2241,'02','09','07','YUPAN'),(372,2241,'02','10','01','HUARI'),(373,2241,'02','10','02','ANRA'),(374,2241,'02','10','03','CAJAY'),(375,2241,'02','10','04','CHAVIN DE HUANTAR'),(376,2241,'02','10','05','HUACACHI'),(377,2241,'02','10','06','HUACCHIS'),(378,2241,'02','10','07','HUACHIS'),(379,2241,'02','10','08','HUANTAR'),(380,2241,'02','10','09','MASIN'),(381,2241,'02','10','10','PAUCAS'),(382,2241,'02','10','11','PONTO'),(383,2241,'02','10','12','RAHUAPAMPA'),(384,2241,'02','10','13','RAPAYAN'),(385,2241,'02','10','14','SAN MARCOS'),(386,2241,'02','10','15','SAN PEDRO DE CHANA'),(387,2241,'02','10','16','UCO'),(388,2241,'02','11','01','HUARMEY'),(389,2241,'02','11','02','COCHAPETI'),(390,2241,'02','11','03','CULEBRAS'),(391,2241,'02','11','04','HUAYAN'),(392,2241,'02','11','05','MALVAS'),(393,2241,'02','12','01','CARAZ'),(394,2241,'02','12','02','HUALLANCA'),(395,2241,'02','12','03','HUATA'),(396,2241,'02','12','04','HUAYLAS'),(397,2241,'02','12','05','MATO'),(398,2241,'02','12','06','PAMPAROMAS'),(399,2241,'02','12','07','PUEBLO LIBRE'),(400,2241,'02','12','08','SANTA CRUZ'),(401,2241,'02','12','09','SANTO TORIBIO'),(402,2241,'02','12','10','YURACMARCA'),(403,2241,'02','13','01','PISCOBAMBA'),(404,2241,'02','13','02','CASCA'),(405,2241,'02','13','03','ELEAZAR GUZMAN BARRON'),(406,2241,'02','13','04','FIDEL OLIVAS ESCUDERO'),(407,2241,'02','13','05','LLAMA'),(408,2241,'02','13','06','LLUMPA'),(409,2241,'02','13','07','LUCMA'),(410,2241,'02','13','08','MUSGA'),(411,2241,'02','14','01','OCROS'),(412,2241,'02','14','02','ACAS'),(413,2241,'02','14','03','CAJAMARQUILLA'),(414,2241,'02','14','04','CARHUAPAMPA'),(415,2241,'02','14','05','COCHAS'),(416,2241,'02','14','06','CONGAS'),(417,2241,'02','14','07','LLIPA'),(418,2241,'02','14','08','SAN CRISTOBAL DE RAJAN'),(419,2241,'02','14','09','SAN PEDRO'),(420,2241,'02','14','10','SANTIAGO DE CHILCAS'),(421,2241,'02','15','01','CABANA'),(422,2241,'02','15','02','BOLOGNESI'),(423,2241,'02','15','03','CONCHUCOS'),(424,2241,'02','15','04','HUACASCHUQUE'),(425,2241,'02','15','05','HUANDOVAL'),(426,2241,'02','15','06','LACABAMBA'),(427,2241,'02','15','07','LLAPO'),(428,2241,'02','15','08','PALLASCA'),(429,2241,'02','15','09','PAMPAS'),(430,2241,'02','15','10','SANTA ROSA'),(431,2241,'02','15','11','TAUCA'),(432,2241,'02','16','01','POMABAMBA'),(433,2241,'02','16','02','HUAYLLAN'),(434,2241,'02','16','03','PAROBAMBA'),(435,2241,'02','16','04','QUINUABAMBA'),(436,2241,'02','17','01','RECUAY'),(437,2241,'02','17','02','CATAC'),(438,2241,'02','17','03','COTAPARACO'),(439,2241,'02','17','04','HUAYLLAPAMPA'),(440,2241,'02','17','05','LLACLLIN'),(441,2241,'02','17','06','MARCA'),(442,2241,'02','17','07','PAMPAS CHICO'),(443,2241,'02','17','08','PARARIN'),(444,2241,'02','17','09','TAPACOCHA'),(445,2241,'02','17','10','TICAPAMPA'),(446,2241,'02','18','01','CHIMBOTE'),(447,2241,'02','18','02','CACERES DEL PERU'),(448,2241,'02','18','03','COISHCO'),(449,2241,'02','18','04','MACATE'),(450,2241,'02','18','05','MORO'),(451,2241,'02','18','06','NEPEÑA'),(452,2241,'02','18','07','SAMANCO'),(453,2241,'02','18','08','SANTA'),(454,2241,'02','18','09','NUEVO CHIMBOTE'),(455,2241,'02','19','01','SIHUAS'),(456,2241,'02','19','02','ACOBAMBA'),(457,2241,'02','19','03','ALFONSO UGARTE'),(458,2241,'02','19','04','CASHAPAMPA'),(459,2241,'02','19','05','CHINGALPO'),(460,2241,'02','19','06','HUAYLLABAMBA'),(461,2241,'02','19','07','QUICHES'),(462,2241,'02','19','08','RAGASH'),(463,2241,'02','19','09','SAN JUAN'),(464,2241,'02','19','10','SICSIBAMBA'),(465,2241,'02','20','01','YUNGAY'),(466,2241,'02','20','02','CASCAPARA'),(467,2241,'02','20','03','MANCOS'),(468,2241,'02','20','04','MATACOTO'),(469,2241,'02','20','05','QUILLO'),(470,2241,'02','20','06','RANRAHIRCA'),(471,2241,'02','20','07','SHUPLUY'),(472,2241,'02','20','08','YANAMA'),(473,2241,'03','01','01','ABANCAY'),(474,2241,'03','01','02','CHACOCHE'),(475,2241,'03','01','03','CIRCA'),(476,2241,'03','01','04','CURAHUASI'),(477,2241,'03','01','05','HUANIPACA'),(478,2241,'03','01','06','LAMBRAMA'),(479,2241,'03','01','07','PICHIRHUA'),(480,2241,'03','01','08','SAN PEDRO DE CACHORA'),(481,2241,'03','01','09','TAMBURCO'),(482,2241,'03','02','01','ANDAHUAYLAS'),(483,2241,'03','02','02','ANDARAPA'),(484,2241,'03','02','03','CHIARA'),(485,2241,'03','02','04','HUANCARAMA'),(486,2241,'03','02','05','HUANCARAY'),(487,2241,'03','02','06','HUAYANA'),(488,2241,'03','02','07','KISHUARA'),(489,2241,'03','02','08','PACOBAMBA'),(490,2241,'03','02','09','PACUCHA'),(491,2241,'03','02','10','PAMPACHIRI'),(492,2241,'03','02','11','POMACOCHA'),(493,2241,'03','02','12','SAN ANTONIO DE CACHI'),(494,2241,'03','02','13','SAN JERONIMO'),(495,2241,'03','02','14','SAN MIGUEL DE CHACCRAMPA'),(496,2241,'03','02','15','SANTA MARIA DE CHICMO'),(497,2241,'03','02','16','TALAVERA'),(498,2241,'03','02','17','TUMAY HUARACA'),(499,2241,'03','02','18','TURPO'),(500,2241,'03','02','19','KAQUIABAMBA'),(501,2241,'03','03','01','ANTABAMBA'),(502,2241,'03','03','02','EL ORO'),(503,2241,'03','03','03','HUAQUIRCA'),(504,2241,'03','03','04','JUAN ESPINOZA MEDRANO'),(505,2241,'03','03','05','OROPESA'),(506,2241,'03','03','06','PACHACONAS'),(507,2241,'03','03','07','SABAINO'),(508,2241,'03','04','01','CHALHUANCA'),(509,2241,'03','04','02','CAPAYA'),(510,2241,'03','04','03','CARAYBAMBA'),(511,2241,'03','04','04','CHAPIMARCA'),(512,2241,'03','04','05','COLCABAMBA'),(513,2241,'03','04','06','COTARUSE'),(514,2241,'03','04','07','HUAYLLO'),(515,2241,'03','04','08','JUSTO APU SAHUARAURA'),(516,2241,'03','04','09','LUCRE'),(517,2241,'03','04','10','POCOHUANCA'),(518,2241,'03','04','11','SAN JUAN DE CHACÑA'),(519,2241,'03','04','12','SAÑAYCA'),(520,2241,'03','04','13','SORAYA'),(521,2241,'03','04','14','TAPAIRIHUA'),(522,2241,'03','04','15','TINTAY'),(523,2241,'03','04','16','TORAYA'),(524,2241,'03','04','17','YANACA'),(525,2241,'03','05','01','TAMBOBAMBA'),(526,2241,'03','05','02','COTABAMBAS'),(527,2241,'03','05','03','COYLLURQUI'),(528,2241,'03','05','04','HAQUIRA'),(529,2241,'03','05','05','MARA'),(530,2241,'03','05','06','CHALLHUAHUACHO'),(531,2241,'03','06','01','CHINCHEROS'),(532,2241,'03','06','02','ANCO_HUALLO'),(533,2241,'03','06','03','COCHARCAS'),(534,2241,'03','06','04','HUACCANA'),(535,2241,'03','06','05','OCOBAMBA'),(536,2241,'03','06','06','ONGOY'),(537,2241,'03','06','07','URANMARCA'),(538,2241,'03','06','08','RANRACANCHA'),(539,2241,'03','07','01','CHUQUIBAMBILLA'),(540,2241,'03','07','02','CURPAHUASI'),(541,2241,'03','07','03','GAMARRA'),(542,2241,'03','07','04','HUAYLLATI'),(543,2241,'03','07','05','MAMARA'),(544,2241,'03','07','06','MICAELA BASTIDAS'),(545,2241,'03','07','07','PATAYPAMPA'),(546,2241,'03','07','08','PROGRESO'),(547,2241,'03','07','09','SAN ANTONIO'),(548,2241,'03','07','10','SANTA ROSA'),(549,2241,'03','07','11','TURPAY'),(550,2241,'03','07','12','VILCABAMBA'),(551,2241,'03','07','13','VIRUNDO'),(552,2241,'03','07','14','CURASCO'),(553,2241,'04','01','01','AREQUIPA'),(554,2241,'04','01','02','ALTO SELVA ALEGRE'),(555,2241,'04','01','03','CAYMA'),(556,2241,'04','01','04','CERRO COLORADO'),(557,2241,'04','01','05','CHARACATO'),(558,2241,'04','01','06','CHIGUATA'),(559,2241,'04','01','07','JACOBO HUNTER'),(560,2241,'04','01','08','LA JOYA'),(561,2241,'04','01','09','MARIANO MELGAR'),(562,2241,'04','01','10','MIRAFLORES'),(563,2241,'04','01','11','MOLLEBAYA'),(564,2241,'04','01','12','PAUCARPATA'),(565,2241,'04','01','13','POCSI'),(566,2241,'04','01','14','POLOBAYA'),(567,2241,'04','01','15','QUEQUEÑA'),(568,2241,'04','01','16','SABANDIA'),(569,2241,'04','01','17','SACHACA'),(570,2241,'04','01','18','SAN JUAN DE SIGUAS'),(571,2241,'04','01','19','SAN JUAN DE TARUCANI'),(572,2241,'04','01','20','SANTA ISABEL DE SIGUAS'),(573,2241,'04','01','21','SANTA RITA DE SIGUAS'),(574,2241,'04','01','22','SOCABAYA'),(575,2241,'04','01','23','TIABAYA'),(576,2241,'04','01','24','UCHUMAYO'),(577,2241,'04','01','25','VITOR'),(578,2241,'04','01','26','YANAHUARA'),(579,2241,'04','01','27','YARABAMBA'),(580,2241,'04','01','28','YURA'),(581,2241,'04','01','29','JOSE LUIS BUSTAMANTE Y RIVERO'),(582,2241,'04','02','01','CAMANA'),(583,2241,'04','02','02','JOSE MARIA QUIMPER'),(584,2241,'04','02','03','MARIANO NICOLAS VALCARCEL'),(585,2241,'04','02','04','MARISCAL CACERES'),(586,2241,'04','02','05','NICOLAS DE PIEROLA'),(587,2241,'04','02','06','OCOÑA'),(588,2241,'04','02','07','QUILCA'),(589,2241,'04','02','08','SAMUEL PASTOR'),(590,2241,'04','03','01','CARAVELI'),(591,2241,'04','03','02','ACARI'),(592,2241,'04','03','03','ATICO'),(593,2241,'04','03','04','ATIQUIPA'),(594,2241,'04','03','05','BELLA UNION'),(595,2241,'04','03','06','CAHUACHO'),(596,2241,'04','03','07','CHALA'),(597,2241,'04','03','08','CHAPARRA'),(598,2241,'04','03','09','HUANUHUANU'),(599,2241,'04','03','10','JAQUI'),(600,2241,'04','03','11','LOMAS'),(601,2241,'04','03','12','QUICACHA'),(602,2241,'04','03','13','YAUCA'),(603,2241,'04','04','01','APLAO'),(604,2241,'04','04','02','ANDAGUA'),(605,2241,'04','04','03','AYO'),(606,2241,'04','04','04','CHACHAS'),(607,2241,'04','04','05','CHILCAYMARCA'),(608,2241,'04','04','06','CHOCO'),(609,2241,'04','04','07','HUANCARQUI'),(610,2241,'04','04','08','MACHAGUAY'),(611,2241,'04','04','09','ORCOPAMPA'),(612,2241,'04','04','10','PAMPACOLCA'),(613,2241,'04','04','11','TIPAN'),(614,2241,'04','04','12','UÑON'),(615,2241,'04','04','13','URACA'),(616,2241,'04','04','14','VIRACO'),(617,2241,'04','05','01','CHIVAY'),(618,2241,'04','05','02','ACHOMA'),(619,2241,'04','05','03','CABANACONDE'),(620,2241,'04','05','04','CALLALLI'),(621,2241,'04','05','05','CAYLLOMA'),(622,2241,'04','05','06','COPORAQUE'),(623,2241,'04','05','07','HUAMBO'),(624,2241,'04','05','08','HUANCA'),(625,2241,'04','05','09','ICHUPAMPA'),(626,2241,'04','05','10','LARI'),(627,2241,'04','05','11','LLUTA'),(628,2241,'04','05','12','MACA'),(629,2241,'04','05','13','MADRIGAL'),(630,2241,'04','05','14','SAN ANTONIO DE CHUCA'),(631,2241,'04','05','15','SIBAYO'),(632,2241,'04','05','16','TAPAY'),(633,2241,'04','05','17','TISCO'),(634,2241,'04','05','18','TUTI'),(635,2241,'04','05','19','YANQUE'),(636,2241,'04','05','20','MAJES'),(637,2241,'04','06','01','CHUQUIBAMBA'),(638,2241,'04','06','02','ANDARAY'),(639,2241,'04','06','03','CAYARANI'),(640,2241,'04','06','04','CHICHAS'),(641,2241,'04','06','05','IRAY'),(642,2241,'04','06','06','RIO GRANDE'),(643,2241,'04','06','07','SALAMANCA'),(644,2241,'04','06','08','YANAQUIHUA'),(645,2241,'04','07','01','MOLLENDO'),(646,2241,'04','07','02','COCACHACRA'),(647,2241,'04','07','03','DEAN VALDIVIA'),(648,2241,'04','07','04','ISLAY'),(649,2241,'04','07','05','MEJIA'),(650,2241,'04','07','06','PUNTA DE BOMBON'),(651,2241,'04','08','01','COTAHUASI'),(652,2241,'04','08','02','ALCA'),(653,2241,'04','08','03','CHARCANA'),(654,2241,'04','08','04','HUAYNACOTAS'),(655,2241,'04','08','05','PAMPAMARCA'),(656,2241,'04','08','06','PUYCA'),(657,2241,'04','08','07','QUECHUALLA'),(658,2241,'04','08','08','SAYLA'),(659,2241,'04','08','09','TAURIA'),(660,2241,'04','08','10','TOMEPAMPA'),(661,2241,'04','08','11','TORO'),(662,2241,'05','01','01','AYACUCHO'),(663,2241,'05','01','02','ACOCRO'),(664,2241,'05','01','03','ACOS VINCHOS'),(665,2241,'05','01','04','CARMEN ALTO'),(666,2241,'05','01','05','CHIARA'),(667,2241,'05','01','06','OCROS'),(668,2241,'05','01','07','PACAYCASA'),(669,2241,'05','01','08','QUINUA'),(670,2241,'05','01','09','SAN JOSE DE TICLLAS'),(671,2241,'05','01','10','SAN JUAN BAUTISTA'),(672,2241,'05','01','11','SANTIAGO DE PISCHA'),(673,2241,'05','01','12','SOCOS'),(674,2241,'05','01','13','TAMBILLO'),(675,2241,'05','01','14','VINCHOS'),(676,2241,'05','01','15','JESUS NAZARENO'),(677,2241,'05','02','01','CANGALLO'),(678,2241,'05','02','02','CHUSCHI'),(679,2241,'05','02','03','LOS MOROCHUCOS'),(680,2241,'05','02','04','MARIA PARADO DE BELLIDO'),(681,2241,'05','02','05','PARAS'),(682,2241,'05','02','06','TOTOS'),(683,2241,'05','03','01','SANCOS'),(684,2241,'05','03','02','CARAPO'),(685,2241,'05','03','03','SACSAMARCA'),(686,2241,'05','03','04','SANTIAGO DE LUCANAMARCA'),(687,2241,'05','04','01','HUANTA'),(688,2241,'05','04','02','AYAHUANCO'),(689,2241,'05','04','03','HUAMANGUILLA'),(690,2241,'05','04','04','IGUAIN'),(691,2241,'05','04','05','LURICOCHA'),(692,2241,'05','04','06','SANTILLANA'),(693,2241,'05','04','07','SIVIA'),(694,2241,'05','04','08','LLOCHEGUA'),(695,2241,'05','05','01','SAN MIGUEL'),(696,2241,'05','05','02','ANCO'),(697,2241,'05','05','03','AYNA'),(698,2241,'05','05','04','CHILCAS'),(699,2241,'05','05','05','CHUNGUI'),(700,2241,'05','05','06','LUIS CARRANZA'),(701,2241,'05','05','07','SANTA ROSA'),(702,2241,'05','05','08','TAMBO'),(703,2241,'05','06','01','PUQUIO'),(704,2241,'05','06','02','AUCARA'),(705,2241,'05','06','03','CABANA'),(706,2241,'05','06','04','CARMEN SALCEDO'),(707,2241,'05','06','05','CHAVIÑA'),(708,2241,'05','06','06','CHIPAO'),(709,2241,'05','06','07','HUAC-HUAS'),(710,2241,'05','06','08','LARAMATE'),(711,2241,'05','06','09','LEONCIO PRADO'),(712,2241,'05','06','10','LLAUTA'),(713,2241,'05','06','11','LUCANAS'),(714,2241,'05','06','12','OCAÑA'),(715,2241,'05','06','13','OTOCA'),(716,2241,'05','06','14','SAISA'),(717,2241,'05','06','15','SAN CRISTOBAL'),(718,2241,'05','06','16','SAN JUAN'),(719,2241,'05','06','17','SAN PEDRO'),(720,2241,'05','06','18','SAN PEDRO DE PALCO'),(721,2241,'05','06','19','SANCOS'),(722,2241,'05','06','20','SANTA ANA DE HUAYCAHUACHO'),(723,2241,'05','06','21','SANTA LUCIA'),(724,2241,'05','07','01','CORACORA'),(725,2241,'05','07','02','CHUMPI'),(726,2241,'05','07','03','CORONEL CASTAÑEDA'),(727,2241,'05','07','04','PACAPAUSA'),(728,2241,'05','07','05','PULLO'),(729,2241,'05','07','06','PUYUSCA'),(730,2241,'05','07','07','SAN FRANCISCO DE RAVACAYCO'),(731,2241,'05','07','08','UPAHUACHO'),(732,2241,'05','08','01','PAUSA'),(733,2241,'05','08','02','COLTA'),(734,2241,'05','08','03','CORCULLA'),(735,2241,'05','08','04','LAMPA'),(736,2241,'05','08','05','MARCABAMBA'),(737,2241,'05','08','06','OYOLO'),(738,2241,'05','08','07','PARARCA'),(739,2241,'05','08','08','SAN JAVIER DE ALPABAMBA'),(740,2241,'05','08','09','SAN JOSE DE USHUA'),(741,2241,'05','08','10','SARA SARA'),(742,2241,'05','09','01','QUEROBAMBA'),(743,2241,'05','09','02','BELEN'),(744,2241,'05','09','03','CHALCOS'),(745,2241,'05','09','04','CHILCAYOC'),(746,2241,'05','09','05','HUACAÑA'),(747,2241,'05','09','06','MORCOLLA'),(748,2241,'05','09','07','PAICO'),(749,2241,'05','09','08','SAN PEDRO DE LARCAY'),(750,2241,'05','09','09','SAN SALVADOR DE QUIJE'),(751,2241,'05','09','10','SANTIAGO DE PAUCARAY'),(752,2241,'05','09','11','SORAS'),(753,2241,'05','10','01','HUANCAPI'),(754,2241,'05','10','02','ALCAMENCA'),(755,2241,'05','10','03','APONGO'),(756,2241,'05','10','04','ASQUIPATA'),(757,2241,'05','10','05','CANARIA'),(758,2241,'05','10','06','CAYARA'),(759,2241,'05','10','07','COLCA'),(760,2241,'05','10','08','HUAMANQUIQUIA'),(761,2241,'05','10','09','HUANCARAYLLA'),(762,2241,'05','10','10','HUAYA'),(763,2241,'05','10','11','SARHUA'),(764,2241,'05','10','12','VILCANCHOS'),(765,2241,'05','11','01','VILCAS HUAMAN'),(766,2241,'05','11','02','ACCOMARCA'),(767,2241,'05','11','03','CARHUANCA'),(768,2241,'05','11','04','CONCEPCION'),(769,2241,'05','11','05','HUAMBALPA'),(770,2241,'05','11','06','INDEPENDENCIA'),(771,2241,'05','11','07','SAURAMA'),(772,2241,'05','11','08','VISCHONGO'),(773,2241,'06','01','01','CAJAMARCA'),(774,2241,'06','01','02','ASUNCION'),(775,2241,'06','01','03','CHETILLA'),(776,2241,'06','01','04','COSPAN'),(777,2241,'06','01','05','ENCAÑADA'),(778,2241,'06','01','06','JESUS'),(779,2241,'06','01','07','LLACANORA'),(780,2241,'06','01','08','LOS BAÑOS DEL INCA'),(781,2241,'06','01','09','MAGDALENA'),(782,2241,'06','01','10','MATARA'),(783,2241,'06','01','11','NAMORA'),(784,2241,'06','01','12','SAN JUAN'),(785,2241,'06','02','01','CAJABAMBA'),(786,2241,'06','02','02','CACHACHI'),(787,2241,'06','02','03','CONDEBAMBA'),(788,2241,'06','02','04','SITACOCHA'),(789,2241,'06','03','01','CELENDIN'),(790,2241,'06','03','02','CHUMUCH'),(791,2241,'06','03','03','CORTEGANA'),(792,2241,'06','03','04','HUASMIN'),(793,2241,'06','03','05','JORGE CHAVEZ'),(794,2241,'06','03','06','JOSE GALVEZ'),(795,2241,'06','03','07','MIGUEL IGLESIAS'),(796,2241,'06','03','08','OXAMARCA'),(797,2241,'06','03','09','SOROCHUCO'),(798,2241,'06','03','10','SUCRE'),(799,2241,'06','03','11','UTCO'),(800,2241,'06','03','12','LA LIBERTAD DE PALLAN'),(801,2241,'06','04','01','CHOTA'),(802,2241,'06','04','02','ANGUIA'),(803,2241,'06','04','03','CHADIN'),(804,2241,'06','04','04','CHIGUIRIP'),(805,2241,'06','04','05','CHIMBAN'),(806,2241,'06','04','06','CHOROPAMPA'),(807,2241,'06','04','07','COCHABAMBA'),(808,2241,'06','04','08','CONCHAN'),(809,2241,'06','04','09','HUAMBOS'),(810,2241,'06','04','10','LAJAS'),(811,2241,'06','04','11','LLAMA'),(812,2241,'06','04','12','MIRACOSTA'),(813,2241,'06','04','13','PACCHA'),(814,2241,'06','04','14','PION'),(815,2241,'06','04','15','QUEROCOTO'),(816,2241,'06','04','16','SAN JUAN DE LICUPIS'),(817,2241,'06','04','17','TACABAMBA'),(818,2241,'06','04','18','TOCMOCHE'),(819,2241,'06','04','19','CHALAMARCA'),(820,2241,'06','05','01','CONTUMAZA'),(821,2241,'06','05','02','CHILETE'),(822,2241,'06','05','03','CUPISNIQUE'),(823,2241,'06','05','04','GUZMANGO'),(824,2241,'06','05','05','SAN BENITO'),(825,2241,'06','05','06','SANTA CRUZ DE TOLED'),(826,2241,'06','05','07','TANTARICA'),(827,2241,'06','05','08','YONAN'),(828,2241,'06','06','01','CUTERVO'),(829,2241,'06','06','02','CALLAYUC'),(830,2241,'06','06','03','CHOROS'),(831,2241,'06','06','04','CUJILLO'),(832,2241,'06','06','05','LA RAMADA'),(833,2241,'06','06','06','PIMPINGOS'),(834,2241,'06','06','07','QUEROCOTILLO'),(835,2241,'06','06','08','SAN ANDRES DE CUTERVO'),(836,2241,'06','06','09','SAN JUAN DE CUTERVO'),(837,2241,'06','06','10','SAN LUIS DE LUCMA'),(838,2241,'06','06','11','SANTA CRUZ'),(839,2241,'06','06','12','SANTO DOMINGO DE LA CAPILLA'),(840,2241,'06','06','13','SANTO TOMAS'),(841,2241,'06','06','14','SOCOTA'),(842,2241,'06','06','15','TORIBIO CASANOVA'),(843,2241,'06','07','01','BAMBAMARCA'),(844,2241,'06','07','02','CHUGUR'),(845,2241,'06','07','03','HUALGAYOC'),(846,2241,'06','08','01','JAEN'),(847,2241,'06','08','02','BELLAVISTA'),(848,2241,'06','08','03','CHONTALI'),(849,2241,'06','08','04','COLASAY'),(850,2241,'06','08','05','HUABAL'),(851,2241,'06','08','06','LAS PIRIAS'),(852,2241,'06','08','07','POMAHUACA'),(853,2241,'06','08','08','PUCARA'),(854,2241,'06','08','09','SALLIQUE'),(855,2241,'06','08','10','SAN FELIPE'),(856,2241,'06','08','11','SAN JOSE DEL ALTO'),(857,2241,'06','08','12','SANTA ROSA'),(858,2241,'06','09','01','SAN IGNACIO'),(859,2241,'06','09','02','CHIRINOS'),(860,2241,'06','09','03','HUARANGO'),(861,2241,'06','09','04','LA COIPA'),(862,2241,'06','09','05','NAMBALLE'),(863,2241,'06','09','06','SAN JOSE DE LOURDES'),(864,2241,'06','09','07','TABACONAS'),(865,2241,'06','10','01','PEDRO GALVEZ'),(866,2241,'06','10','02','CHANCAY'),(867,2241,'06','10','03','EDUARDO VILLANUEVA'),(868,2241,'06','10','04','GREGORIO PITA'),(869,2241,'06','10','05','ICHOCAN'),(870,2241,'06','10','06','JOSE MANUEL QUIROZ'),(871,2241,'06','10','07','JOSE SABOGAL'),(872,2241,'06','11','01','SAN MIGUEL'),(873,2241,'06','11','02','BOLIVAR'),(874,2241,'06','11','03','CALQUIS'),(875,2241,'06','11','04','CATILLUC'),(876,2241,'06','11','05','EL PRADO'),(877,2241,'06','11','06','LA FLORIDA'),(878,2241,'06','11','07','LLAPA'),(879,2241,'06','11','08','NANCHOC'),(880,2241,'06','11','09','NIEPOS'),(881,2241,'06','11','10','SAN GREGORIO'),(882,2241,'06','11','11','SAN SILVESTRE DE COCHAN'),(883,2241,'06','11','12','TONGOD'),(884,2241,'06','11','13','UNION AGUA BLANCA'),(885,2241,'06','12','01','SAN PABLO'),(886,2241,'06','12','02','SAN BERNARDINO'),(887,2241,'06','12','03','SAN LUIS'),(888,2241,'06','12','04','TUMBADEN'),(889,2241,'06','13','01','SANTA CRUZ'),(890,2241,'06','13','02','ANDABAMBA'),(891,2241,'06','13','03','CATACHE'),(892,2241,'06','13','04','CHANCAYBAÑOS'),(893,2241,'06','13','05','LA ESPERANZA'),(894,2241,'06','13','06','NINABAMBA'),(895,2241,'06','13','07','PULAN'),(896,2241,'06','13','08','SAUCEPAMPA'),(897,2241,'06','13','09','SEXI'),(898,2241,'06','13','10','UTICYACU'),(899,2241,'06','13','11','YAUYUCAN'),(900,2241,'07','01','01','CALLAO'),(901,2241,'07','01','02','BELLAVISTA'),(902,2241,'07','01','03','CARMEN DE LA LEGUA REYNOSO'),(903,2241,'07','01','04','LA PERLA'),(904,2241,'07','01','05','LA PUNTA'),(905,2241,'07','01','06','VENTANILLA'),(906,2241,'08','01','01','CUSCO'),(907,2241,'08','01','02','CCORCA'),(908,2241,'08','01','03','POROY'),(909,2241,'08','01','04','SAN JERONIMO'),(910,2241,'08','01','05','SAN SEBASTIAN'),(911,2241,'08','01','06','SANTIAGO'),(912,2241,'08','01','07','SAYLLA'),(913,2241,'08','01','08','WANCHAQ'),(914,2241,'08','02','01','ACOMAYO'),(915,2241,'08','02','02','ACOPIA'),(916,2241,'08','02','03','ACOS'),(917,2241,'08','02','04','MOSOC LLACTA'),(918,2241,'08','02','05','POMACANCHI'),(919,2241,'08','02','06','RONDOCAN'),(920,2241,'08','02','07','SANGARARA'),(921,2241,'08','03','01','ANTA'),(922,2241,'08','03','02','ANCAHUASI'),(923,2241,'08','03','03','CACHIMAYO'),(924,2241,'08','03','04','CHINCHAYPUJIO'),(925,2241,'08','03','05','HUAROCONDO'),(926,2241,'08','03','06','LIMATAMBO'),(927,2241,'08','03','07','MOLLEPATA'),(928,2241,'08','03','08','PUCYURA'),(929,2241,'08','03','09','ZURITE'),(930,2241,'08','04','01','CALCA'),(931,2241,'08','04','02','COYA'),(932,2241,'08','04','03','LAMAY'),(933,2241,'08','04','04','LARES'),(934,2241,'08','04','05','PISAC'),(935,2241,'08','04','06','SAN SALVADOR'),(936,2241,'08','04','07','TARAY'),(937,2241,'08','04','08','YANATILE'),(938,2241,'08','05','01','YANAOCA'),(939,2241,'08','05','02','CHECCA'),(940,2241,'08','05','03','KUNTURKANKI'),(941,2241,'08','05','04','LANGUI'),(942,2241,'08','05','05','LAYO'),(943,2241,'08','05','06','PAMPAMARCA'),(944,2241,'08','05','07','QUEHUE'),(945,2241,'08','05','08','TUPAC AMARU'),(946,2241,'08','06','01','SICUANI'),(947,2241,'08','06','02','CHECACUPE'),(948,2241,'08','06','03','COMBAPATA'),(949,2241,'08','06','04','MARANGANI'),(950,2241,'08','06','05','PITUMARCA'),(951,2241,'08','06','06','SAN PABLO'),(952,2241,'08','06','07','SAN PEDRO'),(953,2241,'08','06','08','TINTA'),(954,2241,'08','07','01','SANTO TOMAS'),(955,2241,'08','07','02','CAPACMARCA'),(956,2241,'08','07','03','CHAMACA'),(957,2241,'08','07','04','COLQUEMARCA'),(958,2241,'08','07','05','LIVITACA'),(959,2241,'08','07','06','LLUSCO'),(960,2241,'08','07','07','QUIÑOTA'),(961,2241,'08','07','08','VELILLE'),(962,2241,'08','08','01','ESPINAR'),(963,2241,'08','08','02','CONDOROMA'),(964,2241,'08','08','03','COPORAQUE'),(965,2241,'08','08','04','OCORURO'),(966,2241,'08','08','05','PALLPATA'),(967,2241,'08','08','06','PICHIGUA'),(968,2241,'08','08','07','SUYCKUTAMBO'),(969,2241,'08','08','08','ALTO PICHIGUA'),(970,2241,'08','09','01','SANTA ANA'),(971,2241,'08','09','02','ECHARATE'),(972,2241,'08','09','03','HUAYOPATA'),(973,2241,'08','09','04','MARANURA'),(974,2241,'08','09','05','OCOBAMBA'),(975,2241,'08','09','06','QUELLOUNO'),(976,2241,'08','09','07','KIMBIRI'),(977,2241,'08','09','08','SANTA TERESA'),(978,2241,'08','09','09','VILCABAMBA'),(979,2241,'08','09','10','PICHARI'),(980,2241,'08','10','01','PARURO'),(981,2241,'08','10','02','ACCHA'),(982,2241,'08','10','03','CCAPI'),(983,2241,'08','10','04','COLCHA'),(984,2241,'08','10','05','HUANOQUITE'),(985,2241,'08','10','06','OMACHA'),(986,2241,'08','10','07','PACCARITAMBO'),(987,2241,'08','10','08','PILLPINTO'),(988,2241,'08','10','09','YAURISQUE'),(989,2241,'08','11','01','PAUCARTAMBO'),(990,2241,'08','11','02','CAICAY'),(991,2241,'08','11','03','CHALLABAMBA'),(992,2241,'08','11','04','COLQUEPATA'),(993,2241,'08','11','05','HUANCARANI'),(994,2241,'08','11','06','KOSÑIPATA'),(995,2241,'08','12','01','URCOS'),(996,2241,'08','12','02','ANDAHUAYLILLAS'),(997,2241,'08','12','03','CAMANTI'),(998,2241,'08','12','04','CCARHUAYO'),(999,2241,'08','12','05','CCATCA'),(1000,2241,'08','12','06','CUSIPATA'),(1001,2241,'08','12','07','HUARO'),(1002,2241,'08','12','08','LUCRE'),(1003,2241,'08','12','09','MARCAPATA'),(1004,2241,'08','12','10','OCONGATE'),(1005,2241,'08','12','11','OROPESA'),(1006,2241,'08','12','12','QUIQUIJANA'),(1007,2241,'08','13','01','URUBAMBA'),(1008,2241,'08','13','02','CHINCHERO'),(1009,2241,'08','13','03','HUAYLLABAMBA'),(1010,2241,'08','13','04','MACHUPICCHU'),(1011,2241,'08','13','05','MARAS'),(1012,2241,'08','13','06','OLLANTAYTAMBO'),(1013,2241,'08','13','07','YUCAY'),(1014,2241,'09','01','01','HUANCAVELICA'),(1015,2241,'09','01','02','ACOBAMBILLA'),(1016,2241,'09','01','03','ACORIA'),(1017,2241,'09','01','04','CONAYCA'),(1018,2241,'09','01','05','CUENCA'),(1019,2241,'09','01','06','HUACHOCOLPA'),(1020,2241,'09','01','07','HUAYLLAHUARA'),(1021,2241,'09','01','08','IZCUCHACA'),(1022,2241,'09','01','09','LARIA'),(1023,2241,'09','01','10','MANTA'),(1024,2241,'09','01','11','MARISCAL CACERES'),(1025,2241,'09','01','12','MOYA'),(1026,2241,'09','01','13','NUEVO OCCORO'),(1027,2241,'09','01','14','PALCA'),(1028,2241,'09','01','15','PILCHACA'),(1029,2241,'09','01','16','VILCA'),(1030,2241,'09','01','17','YAULI'),(1031,2241,'09','01','18','ASCENSION'),(1032,2241,'09','01','19','HUANDO'),(1033,2241,'09','02','01','ACOBAMBA'),(1034,2241,'09','02','02','ANDABAMBA'),(1035,2241,'09','02','03','ANTA'),(1036,2241,'09','02','04','CAJA'),(1037,2241,'09','02','05','MARCAS'),(1038,2241,'09','02','06','PAUCARA'),(1039,2241,'09','02','07','POMACOCHA'),(1040,2241,'09','02','08','ROSARIO'),(1041,2241,'09','03','01','LIRCAY'),(1042,2241,'09','03','02','ANCHONGA'),(1043,2241,'09','03','03','CALLANMARCA'),(1044,2241,'09','03','04','CCOCHACCASA'),(1045,2241,'09','03','05','CHINCHO'),(1046,2241,'09','03','06','CONGALLA'),(1047,2241,'09','03','07','HUANCA-HUANCA'),(1048,2241,'09','03','08','HUAYLLAY GRANDE'),(1049,2241,'09','03','09','JULCAMARCA'),(1050,2241,'09','03','10','SAN ANTONIO DE ANTAPARCO'),(1051,2241,'09','03','11','SANTO TOMAS DE PATA'),(1052,2241,'09','03','12','SECCLLA'),(1053,2241,'09','04','01','CASTROVIRREYNA'),(1054,2241,'09','04','02','ARMA'),(1055,2241,'09','04','03','AURAHUA'),(1056,2241,'09','04','04','CAPILLAS'),(1057,2241,'09','04','05','CHUPAMARCA'),(1058,2241,'09','04','06','COCAS'),(1059,2241,'09','04','07','HUACHOS'),(1060,2241,'09','04','08','HUAMATAMBO'),(1061,2241,'09','04','09','MOLLEPAMPA'),(1062,2241,'09','04','10','SAN JUAN'),(1063,2241,'09','04','11','SANTA ANA'),(1064,2241,'09','04','12','TANTARA'),(1065,2241,'09','04','13','TICRAPO'),(1066,2241,'09','05','01','CHURCAMPA'),(1067,2241,'09','05','02','ANCO'),(1068,2241,'09','05','03','CHINCHIHUASI'),(1069,2241,'09','05','04','EL CARMEN'),(1070,2241,'09','05','05','LA MERCED'),(1071,2241,'09','05','06','LOCROJA'),(1072,2241,'09','05','07','PAUCARBAMBA'),(1073,2241,'09','05','08','SAN MIGUEL DE MAYOCC'),(1074,2241,'09','05','09','SAN PEDRO DE CORIS'),(1075,2241,'09','05','10','PACHAMARCA'),(1076,2241,'09','06','01','HUAYTARA'),(1077,2241,'09','06','02','AYAVI'),(1078,2241,'09','06','03','CORDOVA'),(1079,2241,'09','06','04','HUAYACUNDO ARMA'),(1080,2241,'09','06','05','LARAMARCA'),(1081,2241,'09','06','06','OCOYO'),(1082,2241,'09','06','07','PILPICHACA'),(1083,2241,'09','06','08','QUERCO'),(1084,2241,'09','06','09','QUITO-ARMA'),(1085,2241,'09','06','10','SAN ANTONIO DE CUSICANCHA'),(1086,2241,'09','06','11','SAN FRANCISCO DE SANGAYAICO'),(1087,2241,'09','06','12','SAN ISIDRO'),(1088,2241,'09','06','13','SANTIAGO DE CHOCORVOS'),(1089,2241,'09','06','14','SANTIAGO DE QUIRAHUARA'),(1090,2241,'09','06','15','SANTO DOMINGO DE CAPILLAS'),(1091,2241,'09','06','16','TAMBO'),(1092,2241,'09','07','01','PAMPAS'),(1093,2241,'09','07','02','ACOSTAMBO'),(1094,2241,'09','07','03','ACRAQUIA'),(1095,2241,'09','07','04','AHUAYCHA'),(1096,2241,'09','07','05','COLCABAMBA'),(1097,2241,'09','07','06','DANIEL HERNANDEZ'),(1098,2241,'09','07','07','HUACHOCOLPA'),(1099,2241,'09','07','09','HUARIBAMBA'),(1100,2241,'09','07','10','ÑAHUIMPUQUIO'),(1101,2241,'09','07','11','PAZOS'),(1102,2241,'09','07','13','QUISHUAR'),(1103,2241,'09','07','14','SALCABAMBA'),(1104,2241,'09','07','15','SALCAHUASI'),(1105,2241,'09','07','16','SAN MARCOS DE ROCCHAC'),(1106,2241,'09','07','17','SURCUBAMBA'),(1107,2241,'09','07','18','TINTAY PUNCU'),(1108,2241,'10','01','01','HUANUCO'),(1109,2241,'10','01','02','AMARILIS'),(1110,2241,'10','01','03','CHINCHAO'),(1111,2241,'10','01','04','CHURUBAMBA'),(1112,2241,'10','01','05','MARGOS'),(1113,2241,'10','01','06','QUISQUI'),(1114,2241,'10','01','07','SAN FRANCISCO DE CAYRAN'),(1115,2241,'10','01','08','SAN PEDRO DE CHAULAN'),(1116,2241,'10','01','09','SANTA MARIA DEL VALLE'),(1117,2241,'10','01','10','YARUMAYO'),(1118,2241,'10','01','11','PILLCO MARCA'),(1119,2241,'10','02','01','AMBO'),(1120,2241,'10','02','02','CAYNA'),(1121,2241,'10','02','03','COLPAS'),(1122,2241,'10','02','04','CONCHAMARCA'),(1123,2241,'10','02','05','HUACAR'),(1124,2241,'10','02','06','SAN FRANCISCO'),(1125,2241,'10','02','07','SAN RAFAEL'),(1126,2241,'10','02','08','TOMAY KICHWA'),(1127,2241,'10','03','01','LA UNION'),(1128,2241,'10','03','07','CHUQUIS'),(1129,2241,'10','03','11','MARIAS'),(1130,2241,'10','03','13','PACHAS'),(1131,2241,'10','03','16','QUIVILLA'),(1132,2241,'10','03','17','RIPAN'),(1133,2241,'10','03','21','SHUNQUI'),(1134,2241,'10','03','22','SILLAPATA'),(1135,2241,'10','03','23','YANAS'),(1136,2241,'10','04','01','HUACAYBAMBA'),(1137,2241,'10','04','02','CANCHABAMBA'),(1138,2241,'10','04','03','COCHABAMBA'),(1139,2241,'10','04','04','PINRA'),(1140,2241,'10','05','01','LLATA'),(1141,2241,'10','05','02','ARANCAY'),(1142,2241,'10','05','03','CHAVIN DE PARIARCA'),(1143,2241,'10','05','04','JACAS GRANDE'),(1144,2241,'10','05','05','JIRCAN'),(1145,2241,'10','05','06','MIRAFLORES'),(1146,2241,'10','05','07','MONZON'),(1147,2241,'10','05','08','PUNCHAO'),(1148,2241,'10','05','09','PUÑOS'),(1149,2241,'10','05','10','SINGA'),(1150,2241,'10','05','11','TANTAMAYO'),(1151,2241,'10','06','01','RUPA-RUPA'),(1152,2241,'10','06','02','DANIEL ALOMIAS ROBLES'),(1153,2241,'10','06','03','HERMILIO VALDIZAN'),(1154,2241,'10','06','04','JOSE CRESPO Y CASTILLO'),(1155,2241,'10','06','05','LUYANDO'),(1156,2241,'10','06','06','MARIANO DAMASO BERAUN'),(1157,2241,'10','07','01','HUACRACHUCO'),(1158,2241,'10','07','02','CHOLON'),(1159,2241,'10','07','03','SAN BUENAVENTURA'),(1160,2241,'10','08','01','PANAO'),(1161,2241,'10','08','02','CHAGLLA'),(1162,2241,'10','08','03','MOLINO'),(1163,2241,'10','08','04','UMARI'),(1164,2241,'10','09','01','PUERTO INCA'),(1165,2241,'10','09','02','CODO DEL POZUZO'),(1166,2241,'10','09','03','HONORIA'),(1167,2241,'10','09','04','TOURNAVISTA'),(1168,2241,'10','09','05','YUYAPICHIS'),(1169,2241,'10','10','01','JESUS'),(1170,2241,'10','10','02','BAÑOS'),(1171,2241,'10','10','03','JIVIA'),(1172,2241,'10','10','04','QUEROPALCA'),(1173,2241,'10','10','05','RONDOS'),(1174,2241,'10','10','06','SAN FRANCISCO DE ASIS'),(1175,2241,'10','10','07','SAN MIGUEL DE CAURI'),(1176,2241,'10','11','01','CHAVINILLO'),(1177,2241,'10','11','02','CAHUAC'),(1178,2241,'10','11','03','CHACABAMBA'),(1179,2241,'10','11','04','APARICIO POMARES'),(1180,2241,'10','11','05','JACAS CHICO'),(1181,2241,'10','11','06','OBAS'),(1182,2241,'10','11','07','PAMPAMARCA'),(1183,2241,'10','11','08','CHORAS'),(1184,2241,'11','01','01','ICA'),(1185,2241,'11','01','02','LA TINGUIÑA'),(1186,2241,'11','01','03','LOS AQUIJES'),(1187,2241,'11','01','04','OCUCAJE'),(1188,2241,'11','01','05','PACHACUTEC'),(1189,2241,'11','01','06','PARCONA'),(1190,2241,'11','01','07','PUEBLO NUEVO'),(1191,2241,'11','01','08','SALAS'),(1192,2241,'11','01','09','SAN JOSE DE LOS MOLINOS'),(1193,2241,'11','01','10','SAN JUAN BAUTISTA'),(1194,2241,'11','01','11','SANTIAGO'),(1195,2241,'11','01','12','SUBTANJALLA'),(1196,2241,'11','01','13','TATE'),(1197,2241,'11','01','14','YAUCA DEL ROSARIO'),(1198,2241,'11','02','01','CHINCHA ALTA'),(1199,2241,'11','02','02','ALTO LARAN'),(1200,2241,'11','02','03','CHAVIN'),(1201,2241,'11','02','04','CHINCHA BAJA'),(1202,2241,'11','02','05','EL CARMEN'),(1203,2241,'11','02','06','GROCIO PRADO'),(1204,2241,'11','02','07','PUEBLO NUEVO'),(1205,2241,'11','02','08','SAN JUAN DE YANAC'),(1206,2241,'11','02','09','SAN PEDRO DE HUACARPANA'),(1207,2241,'11','02','10','SUNAMPE'),(1208,2241,'11','02','11','TAMBO DE MORA'),(1209,2241,'11','03','01','NAZCA'),(1210,2241,'11','03','02','CHANGUILLO'),(1211,2241,'11','03','03','EL INGENIO'),(1212,2241,'11','03','04','MARCONA'),(1213,2241,'11','03','05','VISTA ALEGRE'),(1214,2241,'11','04','01','PALPA'),(1215,2241,'11','04','02','LLIPATA'),(1216,2241,'11','04','03','RIO GRANDE'),(1217,2241,'11','04','04','SANTA CRUZ'),(1218,2241,'11','04','05','TIBILLO'),(1219,2241,'11','05','01','PISCO'),(1220,2241,'11','05','02','HUANCANO'),(1221,2241,'11','05','03','HUMAY'),(1222,2241,'11','05','04','INDEPENDENCIA'),(1223,2241,'11','05','05','PARACAS'),(1224,2241,'11','05','06','SAN ANDRES'),(1225,2241,'11','05','07','SAN CLEMENTE'),(1226,2241,'11','05','08','TUPAC AMARU INCA'),(1227,2241,'12','01','01','HUANCAYO'),(1228,2241,'12','01','04','CARHUACALLANGA'),(1229,2241,'12','01','05','CHACAPAMPA'),(1230,2241,'12','01','06','CHICCHE'),(1231,2241,'12','01','07','CHILCA'),(1232,2241,'12','01','08','CHONGOS ALTO'),(1233,2241,'12','01','11','CHUPURO'),(1234,2241,'12','01','12','COLCA'),(1235,2241,'12','01','13','CULLHUAS'),(1236,2241,'12','01','14','EL TAMBO'),(1237,2241,'12','01','16','HUACRAPUQUIO'),(1238,2241,'12','01','17','HUALHUAS'),(1239,2241,'12','01','19','HUANCAN'),(1240,2241,'12','01','20','HUASICANCHA'),(1241,2241,'12','01','21','HUAYUCACHI'),(1242,2241,'12','01','22','INGENIO'),(1243,2241,'12','01','24','PARIAHUANCA'),(1244,2241,'12','01','25','PILCOMAYO'),(1245,2241,'12','01','26','PUCARA'),(1246,2241,'12','01','27','QUICHUAY'),(1247,2241,'12','01','28','QUILCAS'),(1248,2241,'12','01','29','SAN AGUSTIN'),(1249,2241,'12','01','30','SAN JERONIMO DE TUNAN'),(1250,2241,'12','01','32','SAÑO'),(1251,2241,'12','01','33','SAPALLANGA'),(1252,2241,'12','01','34','SICAYA'),(1253,2241,'12','01','35','SANTO DOMINGO DE ACOBAMBA'),(1254,2241,'12','01','36','VIQUES'),(1255,2241,'12','02','01','CONCEPCION'),(1256,2241,'12','02','02','ACO'),(1257,2241,'12','02','03','ANDAMARCA'),(1258,2241,'12','02','04','CHAMBARA'),(1259,2241,'12','02','05','COCHAS'),(1260,2241,'12','02','06','COMAS'),(1261,2241,'12','02','07','HEROINAS TOLEDO'),(1262,2241,'12','02','08','MANZANARES'),(1263,2241,'12','02','09','MARISCAL CASTILLA'),(1264,2241,'12','02','10','MATAHUASI'),(1265,2241,'12','02','11','MITO'),(1266,2241,'12','02','12','NUEVE DE JULIO'),(1267,2241,'12','02','13','ORCOTUNA'),(1268,2241,'12','02','14','SAN JOSE DE QUERO'),(1269,2241,'12','02','15','SANTA ROSA DE OCOPA'),(1270,2241,'12','03','01','CHANCHAMAYO'),(1271,2241,'12','03','02','PERENE'),(1272,2241,'12','03','03','PICHANAQUI'),(1273,2241,'12','03','04','SAN LUIS DE SHUARO'),(1274,2241,'12','03','05','SAN RAMON'),(1275,2241,'12','03','06','VITOC'),(1276,2241,'12','04','01','JAUJA'),(1277,2241,'12','04','02','ACOLLA'),(1278,2241,'12','04','03','APATA'),(1279,2241,'12','04','04','ATAURA'),(1280,2241,'12','04','05','CANCHAYLLO'),(1281,2241,'12','04','06','CURICACA'),(1282,2241,'12','04','07','EL MANTARO'),(1283,2241,'12','04','08','HUAMALI'),(1284,2241,'12','04','09','HUARIPAMPA'),(1285,2241,'12','04','10','HUERTAS'),(1286,2241,'12','04','11','JANJAILLO'),(1287,2241,'12','04','12','JULCAN'),(1288,2241,'12','04','13','LEONOR ORDOÑEZ'),(1289,2241,'12','04','14','LLOCLLAPAMPA'),(1290,2241,'12','04','15','MARCO'),(1291,2241,'12','04','16','MASMA'),(1292,2241,'12','04','17','MASMA CHICCHE'),(1293,2241,'12','04','18','MOLINOS'),(1294,2241,'12','04','19','MONOBAMBA'),(1295,2241,'12','04','20','MUQUI'),(1296,2241,'12','04','21','MUQUIYAUYO'),(1297,2241,'12','04','22','PACA'),(1298,2241,'12','04','23','PACCHA'),(1299,2241,'12','04','24','PANCAN'),(1300,2241,'12','04','25','PARCO'),(1301,2241,'12','04','26','POMACANCHA'),(1302,2241,'12','04','27','RICRAN'),(1303,2241,'12','04','28','SAN LORENZO'),(1304,2241,'12','04','29','SAN PEDRO DE CHUNAN'),(1305,2241,'12','04','30','SAUSA'),(1306,2241,'12','04','31','SINCOS'),(1307,2241,'12','04','32','TUNAN MARCA'),(1308,2241,'12','04','33','YAULI'),(1309,2241,'12','04','34','YAUYOS'),(1310,2241,'12','05','01','JUNIN'),(1311,2241,'12','05','02','CARHUAMAYO'),(1312,2241,'12','05','03','ONDORES'),(1313,2241,'12','05','04','ULCUMAYO'),(1314,2241,'12','06','01','SATIPO'),(1315,2241,'12','06','02','COVIRIALI'),(1316,2241,'12','06','03','LLAYLLA'),(1317,2241,'12','06','04','MAZAMARI'),(1318,2241,'12','06','05','PAMPA HERMOSA'),(1319,2241,'12','06','06','PANGOA'),(1320,2241,'12','06','07','RIO NEGRO'),(1321,2241,'12','06','08','RIO TAMBO'),(1322,2241,'12','07','01','TARMA'),(1323,2241,'12','07','02','ACOBAMBA'),(1324,2241,'12','07','03','HUARICOLCA'),(1325,2241,'12','07','04','HUASAHUASI'),(1326,2241,'12','07','05','LA UNION'),(1327,2241,'12','07','06','PALCA'),(1328,2241,'12','07','07','PALCAMAYO'),(1329,2241,'12','07','08','SAN PEDRO DE CAJAS'),(1330,2241,'12','07','09','TAPO'),(1331,2241,'12','08','01','LA OROYA'),(1332,2241,'12','08','02','CHACAPALPA'),(1333,2241,'12','08','03','HUAY-HUAY'),(1334,2241,'12','08','04','MARCAPOMACOCHA'),(1335,2241,'12','08','05','MOROCOCHA'),(1336,2241,'12','08','06','PACCHA'),(1337,2241,'12','08','07','SANTA BARBARA DE CARHUACAYAN'),(1338,2241,'12','08','08','SANTA ROSA DE SACCO'),(1339,2241,'12','08','09','SUITUCANCHA'),(1340,2241,'12','08','10','YAULI'),(1341,2241,'12','09','01','CHUPACA'),(1342,2241,'12','09','02','AHUAC'),(1343,2241,'12','09','03','CHONGOS BAJO'),(1344,2241,'12','09','04','HUACHAC'),(1345,2241,'12','09','05','HUAMANCACA CHICO'),(1346,2241,'12','09','06','SAN JUAN DE YSCOS'),(1347,2241,'12','09','07','SAN JUAN DE JARPA'),(1348,2241,'12','09','08','TRES DE DICIEMBRE'),(1349,2241,'12','09','09','YANACANCHA'),(1350,2241,'13','01','01','TRUJILLO'),(1351,2241,'13','01','02','EL PORVENIR'),(1352,2241,'13','01','03','FLORENCIA DE MORA'),(1353,2241,'13','01','04','HUANCHACO'),(1354,2241,'13','01','05','LA ESPERANZA'),(1355,2241,'13','01','06','LAREDO'),(1356,2241,'13','01','07','MOCHE'),(1357,2241,'13','01','08','POROTO'),(1358,2241,'13','01','09','SALAVERRY'),(1359,2241,'13','01','10','SIMBAL'),(1360,2241,'13','01','11','VICTOR LARCO HERRERA'),(1361,2241,'13','02','01','ASCOPE'),(1362,2241,'13','02','02','CHICAMA'),(1363,2241,'13','02','03','CHOCOPE'),(1364,2241,'13','02','04','MAGDALENA DE CAO'),(1365,2241,'13','02','05','PAIJAN'),(1366,2241,'13','02','06','RAZURI'),(1367,2241,'13','02','07','SANTIAGO DE CAO'),(1368,2241,'13','02','08','CASA GRANDE'),(1369,2241,'13','03','01','BOLIVAR'),(1370,2241,'13','03','02','BAMBAMARCA'),(1371,2241,'13','03','03','CONDORMARCA'),(1372,2241,'13','03','04','LONGOTEA'),(1373,2241,'13','03','05','UCHUMARCA'),(1374,2241,'13','03','06','UCUNCHA'),(1375,2241,'13','04','01','CHEPEN'),(1376,2241,'13','04','02','PACANGA'),(1377,2241,'13','04','03','PUEBLO NUEVO'),(1378,2241,'13','05','01','JULCAN'),(1379,2241,'13','05','02','CALAMARCA'),(1380,2241,'13','05','03','CARABAMBA'),(1381,2241,'13','05','04','HUASO'),(1382,2241,'13','06','01','OTUZCO'),(1383,2241,'13','06','02','AGALLPAMPA'),(1384,2241,'13','06','04','CHARAT'),(1385,2241,'13','06','05','HUARANCHAL'),(1386,2241,'13','06','06','LA CUESTA'),(1387,2241,'13','06','08','MACHE'),(1388,2241,'13','06','10','PARANDAY'),(1389,2241,'13','06','11','SALPO'),(1390,2241,'13','06','13','SINSICAP'),(1391,2241,'13','06','14','USQUIL'),(1392,2241,'13','07','01','SAN PEDRO DE LLOC'),(1393,2241,'13','07','02','GUADALUPE'),(1394,2241,'13','07','03','JEQUETEPEQUE'),(1395,2241,'13','07','04','PACASMAYO'),(1396,2241,'13','07','05','SAN JOSE'),(1397,2241,'13','08','01','TAYABAMBA'),(1398,2241,'13','08','02','BULDIBUYO'),(1399,2241,'13','08','03','CHILLIA'),(1400,2241,'13','08','04','HUANCASPATA'),(1401,2241,'13','08','05','HUAYLILLAS'),(1402,2241,'13','08','06','HUAYO'),(1403,2241,'13','08','07','ONGON'),(1404,2241,'13','08','08','PARCOY'),(1405,2241,'13','08','09','PATAZ'),(1406,2241,'13','08','10','PIAS'),(1407,2241,'13','08','11','SANTIAGO DE CHALLAS'),(1408,2241,'13','08','12','TAURIJA'),(1409,2241,'13','08','13','URPAY'),(1410,2241,'13','09','01','HUAMACHUCO'),(1411,2241,'13','09','02','CHUGAY'),(1412,2241,'13','09','03','COCHORCO'),(1413,2241,'13','09','04','CURGOS'),(1414,2241,'13','09','05','MARCABAL'),(1415,2241,'13','09','06','SANAGORAN'),(1416,2241,'13','09','07','SARIN'),(1417,2241,'13','09','08','SARTIMBAMBA'),(1418,2241,'13','10','01','SANTIAGO DE CHUCO'),(1419,2241,'13','10','02','ANGASMARCA'),(1420,2241,'13','10','03','CACHICADAN'),(1421,2241,'13','10','04','MOLLEBAMBA'),(1422,2241,'13','10','05','MOLLEPATA'),(1423,2241,'13','10','06','QUIRUVILCA'),(1424,2241,'13','10','07','SANTA CRUZ DE CHUCA'),(1425,2241,'13','10','08','SITABAMBA'),(1426,2241,'13','11','01','CASCAS'),(1427,2241,'13','11','02','LUCMA'),(1428,2241,'13','11','03','COMPIN'),(1429,2241,'13','11','04','SAYAPULLO'),(1430,2241,'13','12','01','VIRU'),(1431,2241,'13','12','02','CHAO'),(1432,2241,'13','12','03','GUADALUPITO'),(1433,2241,'14','01','01','CHICLAYO'),(1434,2241,'14','01','02','CHONGOYAPE'),(1435,2241,'14','01','03','ETEN'),(1436,2241,'14','01','04','ETEN PUERTO'),(1437,2241,'14','01','05','JOSE LEONARDO ORTIZ'),(1438,2241,'14','01','06','LA VICTORIA'),(1439,2241,'14','01','07','LAGUNAS'),(1440,2241,'14','01','08','MONSEFU'),(1441,2241,'14','01','09','NUEVA ARICA'),(1442,2241,'14','01','10','OYOTUN'),(1443,2241,'14','01','11','PICSI'),(1444,2241,'14','01','12','PIMENTEL'),(1445,2241,'14','01','13','REQUE'),(1446,2241,'14','01','14','SANTA ROSA'),(1447,2241,'14','01','15','SAÑA'),(1448,2241,'14','01','16','CAYALTI'),(1449,2241,'14','01','17','PATAPO'),(1450,2241,'14','01','18','POMALCA'),(1451,2241,'14','01','19','PUCALA'),(1452,2241,'14','01','20','TUMAN'),(1453,2241,'14','02','01','FERREÑAFE'),(1454,2241,'14','02','02','CAÑARIS'),(1455,2241,'14','02','03','INCAHUASI'),(1456,2241,'14','02','04','MANUEL ANTONIO MESONES MURO'),(1457,2241,'14','02','05','PITIPO'),(1458,2241,'14','02','06','PUEBLO NUEVO'),(1459,2241,'14','03','01','LAMBAYEQUE'),(1460,2241,'14','03','02','CHOCHOPE'),(1461,2241,'14','03','03','ILLIMO'),(1462,2241,'14','03','04','JAYANCA'),(1463,2241,'14','03','05','MOCHUMI'),(1464,2241,'14','03','06','MORROPE'),(1465,2241,'14','03','07','MOTUPE'),(1466,2241,'14','03','08','OLMOS'),(1467,2241,'14','03','09','PACORA'),(1468,2241,'14','03','10','SALAS'),(1469,2241,'14','03','11','SAN JOSE'),(1470,2241,'14','03','12','TUCUME'),(1471,2241,'15','01','01','LIMA'),(1472,2241,'15','01','02','ANCON'),(1473,2241,'15','01','03','ATE'),(1474,2241,'15','01','04','BARRANCO'),(1475,2241,'15','01','05','BREÑA'),(1476,2241,'15','01','06','CARABAYLLO'),(1477,2241,'15','01','07','CHACLACAYO'),(1478,2241,'15','01','08','CHORRILLOS'),(1479,2241,'15','01','09','CIENEGUILLA'),(1480,2241,'15','01','10','COMAS'),(1481,2241,'15','01','11','EL AGUSTINO'),(1482,2241,'15','01','12','INDEPENDENCIA'),(1483,2241,'15','01','13','JESUS MARIA'),(1484,2241,'15','01','14','LA MOLINA'),(1485,2241,'15','01','15','LA VICTORIA'),(1486,2241,'15','01','16','LINCE'),(1487,2241,'15','01','17','LOS OLIVOS'),(1488,2241,'15','01','18','LURIGANCHO'),(1489,2241,'15','01','19','LURIN'),(1490,2241,'15','01','20','MAGDALENA DEL MAR'),(1491,2241,'15','01','21','MAGDALENA VIEJA'),(1492,2241,'15','01','22','MIRAFLORES'),(1493,2241,'15','01','23','PACHACAMAC'),(1494,2241,'15','01','24','PUCUSANA'),(1495,2241,'15','01','25','PUENTE PIEDRA'),(1496,2241,'15','01','26','PUNTA HERMOSA'),(1497,2241,'15','01','27','PUNTA NEGRA'),(1498,2241,'15','01','28','RIMAC'),(1499,2241,'15','01','29','SAN BARTOLO'),(1500,2241,'15','01','30','SAN BORJA'),(1501,2241,'15','01','31','SAN ISIDRO'),(1502,2241,'15','01','32','SAN JUAN DE LURIGANCHO'),(1503,2241,'15','01','33','SAN JUAN DE MIRAFLORES'),(1504,2241,'15','01','34','SAN LUIS'),(1505,2241,'15','01','35','SAN MARTIN DE PORRES'),(1506,2241,'15','01','36','SAN MIGUEL'),(1507,2241,'15','01','37','SANTA ANITA'),(1508,2241,'15','01','38','SANTA MARIA DEL MAR'),(1509,2241,'15','01','39','SANTA ROSA'),(1510,2241,'15','01','40','SANTIAGO DE SURCO'),(1511,2241,'15','01','41','SURQUILLO'),(1512,2241,'15','01','42','VILLA EL SALVADOR'),(1513,2241,'15','01','43','VILLA MARIA DEL TRIUNFO'),(1514,2241,'15','02','01','BARRANCA'),(1515,2241,'15','02','02','PARAMONGA'),(1516,2241,'15','02','03','PATIVILCA'),(1517,2241,'15','02','04','SUPE'),(1518,2241,'15','02','05','SUPE PUERTO'),(1519,2241,'15','03','01','CAJATAMBO'),(1520,2241,'15','03','02','COPA'),(1521,2241,'15','03','03','GORGOR'),(1522,2241,'15','03','04','HUANCAPON'),(1523,2241,'15','03','05','MANAS'),(1524,2241,'15','04','01','CANTA'),(1525,2241,'15','04','02','ARAHUAY'),(1526,2241,'15','04','03','HUAMANTANGA'),(1527,2241,'15','04','04','HUAROS'),(1528,2241,'15','04','05','LACHAQUI'),(1529,2241,'15','04','06','SAN BUENAVENTURA'),(1530,2241,'15','04','07','SANTA ROSA DE QUIVES'),(1531,2241,'15','05','01','SAN VICENTE DE CAÑETE'),(1532,2241,'15','05','02','ASIA'),(1533,2241,'15','05','03','CALANGO'),(1534,2241,'15','05','04','CERRO AZUL'),(1535,2241,'15','05','05','CHILCA'),(1536,2241,'15','05','06','COAYLLO'),(1537,2241,'15','05','07','IMPERIAL'),(1538,2241,'15','05','08','LUNAHUANA'),(1539,2241,'15','05','09','MALA'),(1540,2241,'15','05','10','NUEVO IMPERIAL'),(1541,2241,'15','05','11','PACARAN'),(1542,2241,'15','05','12','QUILMANA'),(1543,2241,'15','05','13','SAN ANTONIO'),(1544,2241,'15','05','14','SAN LUIS'),(1545,2241,'15','05','15','SANTA CRUZ DE FLORES'),(1546,2241,'15','05','16','ZUÑIGA'),(1547,2241,'15','06','01','HUARAL'),(1548,2241,'15','06','02','ATAVILLOS ALTO'),(1549,2241,'15','06','03','ATAVILLOS BAJO'),(1550,2241,'15','06','04','AUCALLAMA'),(1551,2241,'15','06','05','CHANCAY'),(1552,2241,'15','06','06','IHUARI'),(1553,2241,'15','06','07','LAMPIAN'),(1554,2241,'15','06','08','PACARAOS'),(1555,2241,'15','06','09','SAN MIGUEL DE ACOS'),(1556,2241,'15','06','10','SANTA CRUZ DE ANDAMARCA'),(1557,2241,'15','06','11','SUMBILCA'),(1558,2241,'15','06','12','VEINTISIETE DE NOVIEMBRE'),(1559,2241,'15','07','01','MATUCANA'),(1560,2241,'15','07','02','ANTIOQUIA'),(1561,2241,'15','07','03','CALLAHUANCA'),(1562,2241,'15','07','04','CARAMPOMA'),(1563,2241,'15','07','05','CHICLA'),(1564,2241,'15','07','06','CUENCA'),(1565,2241,'15','07','07','HUACHUPAMPA'),(1566,2241,'15','07','08','HUANZA'),(1567,2241,'15','07','09','HUAROCHIRI'),(1568,2241,'15','07','10','LAHUAYTAMBO'),(1569,2241,'15','07','11','LANGA'),(1570,2241,'15','07','12','LARAOS'),(1571,2241,'15','07','13','MARIATANA'),(1572,2241,'15','07','14','RICARDO PALMA'),(1573,2241,'15','07','15','SAN ANDRES DE TUPICOCHA'),(1574,2241,'15','07','16','SAN ANTONIO'),(1575,2241,'15','07','17','SAN BARTOLOME'),(1576,2241,'15','07','18','SAN DAMIAN'),(1577,2241,'15','07','19','SAN JUAN DE IRIS'),(1578,2241,'15','07','20','SAN JUAN DE TANTARANCHE'),(1579,2241,'15','07','21','SAN LORENZO DE QUINTI'),(1580,2241,'15','07','22','SAN MATEO'),(1581,2241,'15','07','23','SAN MATEO DE OTAO'),(1582,2241,'15','07','24','SAN PEDRO DE CASTA'),(1583,2241,'15','07','25','SAN PEDRO DE HUANCAYRE'),(1584,2241,'15','07','26','SANGALLAYA'),(1585,2241,'15','07','27','SANTA CRUZ DE COCACHACRA'),(1586,2241,'15','07','28','SANTA EULALIA'),(1587,2241,'15','07','29','SANTIAGO DE ANCHUCAYA'),(1588,2241,'15','07','30','SANTIAGO DE TUNA'),(1589,2241,'15','07','31','SANTO DOMINGO DE LOS OLLEROS'),(1590,2241,'15','07','32','SURCO'),(1591,2241,'15','08','01','HUACHO'),(1592,2241,'15','08','02','AMBAR'),(1593,2241,'15','08','03','CALETA DE CARQUIN'),(1594,2241,'15','08','04','CHECRAS'),(1595,2241,'15','08','05','HUALMAY'),(1596,2241,'15','08','06','HUAURA'),(1597,2241,'15','08','07','LEONCIO PRADO'),(1598,2241,'15','08','08','PACCHO'),(1599,2241,'15','08','09','SANTA LEONOR'),(1600,2241,'15','08','10','SANTA MARIA'),(1601,2241,'15','08','11','SAYAN'),(1602,2241,'15','08','12','VEGUETA'),(1603,2241,'15','09','01','OYON'),(1604,2241,'15','09','02','ANDAJES'),(1605,2241,'15','09','03','CAUJUL'),(1606,2241,'15','09','04','COCHAMARCA'),(1607,2241,'15','09','05','NAVAN'),(1608,2241,'15','09','06','PACHANGARA'),(1609,2241,'15','10','01','YAUYOS'),(1610,2241,'15','10','02','ALIS'),(1611,2241,'15','10','03','AYAUCA'),(1612,2241,'15','10','04','AYAVIRI'),(1613,2241,'15','10','05','AZANGARO'),(1614,2241,'15','10','06','CACRA'),(1615,2241,'15','10','07','CARANIA'),(1616,2241,'15','10','08','CATAHUASI'),(1617,2241,'15','10','09','CHOCOS'),(1618,2241,'15','10','10','COCHAS'),(1619,2241,'15','10','11','COLONIA'),(1620,2241,'15','10','12','HONGOS'),(1621,2241,'15','10','13','HUAMPARA'),(1622,2241,'15','10','14','HUANCAYA'),(1623,2241,'15','10','15','HUANGASCAR'),(1624,2241,'15','10','16','HUANTAN'),(1625,2241,'15','10','17','HUAÑEC'),(1626,2241,'15','10','18','LARAOS'),(1627,2241,'15','10','19','LINCHA'),(1628,2241,'15','10','20','MADEAN'),(1629,2241,'15','10','21','MIRAFLORES'),(1630,2241,'15','10','22','OMAS'),(1631,2241,'15','10','23','PUTINZA'),(1632,2241,'15','10','24','QUINCHES'),(1633,2241,'15','10','25','QUINOCAY'),(1634,2241,'15','10','26','SAN JOAQUIN'),(1635,2241,'15','10','27','SAN PEDRO DE PILAS'),(1636,2241,'15','10','28','TANTA'),(1637,2241,'15','10','29','TAURIPAMPA'),(1638,2241,'15','10','30','TOMAS'),(1639,2241,'15','10','31','TUPE'),(1640,2241,'15','10','32','VIÑAC'),(1641,2241,'15','10','33','VITIS'),(1642,2241,'16','01','01','IQUITOS'),(1643,2241,'16','01','02','ALTO NANAY'),(1644,2241,'16','01','03','FERNANDO LORES'),(1645,2241,'16','01','04','INDIANA'),(1646,2241,'16','01','05','LAS AMAZONAS'),(1647,2241,'16','01','06','MAZAN'),(1648,2241,'16','01','07','NAPO'),(1649,2241,'16','01','08','PUNCHANA'),(1650,2241,'16','01','09','PUTUMAYO'),(1651,2241,'16','01','10','TORRES CAUSANA'),(1652,2241,'16','01','12','BELEN'),(1653,2241,'16','01','13','SAN JUAN BAUTISTA'),(1654,2241,'16','01','14','TENIENTE MANUEL CLAVERO'),(1655,2241,'16','02','01','YURIMAGUAS'),(1656,2241,'16','02','02','BALSAPUERTO'),(1657,2241,'16','02','05','JEBEROS'),(1658,2241,'16','02','06','LAGUNAS'),(1659,2241,'16','02','10','SANTA CRUZ'),(1660,2241,'16','02','11','TENIENTE CESAR LOPEZ ROJAS'),(1661,2241,'16','03','01','NAUTA'),(1662,2241,'16','03','02','PARINARI'),(1663,2241,'16','03','03','TIGRE'),(1664,2241,'16','03','04','TROMPETEROS'),(1665,2241,'16','03','05','URARINAS'),(1666,2241,'16','04','01','RAMON CASTILLA'),(1667,2241,'16','04','02','PEBAS'),(1668,2241,'16','04','03','YAVARI'),(1669,2241,'16','04','04','SAN PABLO'),(1670,2241,'16','05','01','REQUENA'),(1671,2241,'16','05','02','ALTO TAPICHE'),(1672,2241,'16','05','03','CAPELO'),(1673,2241,'16','05','04','EMILIO SAN MARTIN'),(1674,2241,'16','05','05','MAQUIA'),(1675,2241,'16','05','06','PUINAHUA'),(1676,2241,'16','05','07','SAQUENA'),(1677,2241,'16','05','08','SOPLIN'),(1678,2241,'16','05','09','TAPICHE'),(1679,2241,'16','05','10','JENARO HERRERA'),(1680,2241,'16','05','11','YAQUERANA'),(1681,2241,'16','06','01','CONTAMANA'),(1682,2241,'16','06','02','INAHUAYA'),(1683,2241,'16','06','03','PADRE MARQUEZ'),(1684,2241,'16','06','04','PAMPA HERMOSA'),(1685,2241,'16','06','05','SARAYACU'),(1686,2241,'16','06','06','VARGAS GUERRA'),(1687,2241,'16','07','01','BARRANCA'),(1688,2241,'16','07','02','CAHUAPANAS'),(1689,2241,'16','07','03','MANSERICHE'),(1690,2241,'16','07','04','MORONA'),(1691,2241,'16','07','05','PASTAZA'),(1692,2241,'16','07','06','ANDOAS'),(1693,2241,'17','01','01','TAMBOPATA'),(1694,2241,'17','01','02','INAMBARI'),(1695,2241,'17','01','03','LAS PIEDRAS'),(1696,2241,'17','01','04','LABERINTO'),(1697,2241,'17','02','01','MANU'),(1698,2241,'17','02','02','FITZCARRALD'),(1699,2241,'17','02','03','MADRE DE DIOS'),(1700,2241,'17','02','04','HUEPETUHE'),(1701,2241,'17','03','01','IÑAPARI'),(1702,2241,'17','03','02','IBERIA'),(1703,2241,'17','03','03','TAHUAMANU'),(1704,2241,'18','01','01','MOQUEGUA'),(1705,2241,'18','01','02','CARUMAS'),(1706,2241,'18','01','03','CUCHUMBAYA'),(1707,2241,'18','01','04','SAMEGUA'),(1708,2241,'18','01','05','SAN CRISTOBAL'),(1709,2241,'18','01','06','TORATA'),(1710,2241,'18','02','01','OMATE'),(1711,2241,'18','02','02','CHOJATA'),(1712,2241,'18','02','03','COALAQUE'),(1713,2241,'18','02','04','ICHUÑA'),(1714,2241,'18','02','05','LA CAPILLA'),(1715,2241,'18','02','06','LLOQUE'),(1716,2241,'18','02','07','MATALAQUE'),(1717,2241,'18','02','08','PUQUINA'),(1718,2241,'18','02','09','QUINISTAQUILLAS'),(1719,2241,'18','02','10','UBINAS'),(1720,2241,'18','02','11','YUNGA'),(1721,2241,'18','03','01','ILO'),(1722,2241,'18','03','02','EL ALGARROBAL'),(1723,2241,'18','03','03','PACOCHA'),(1724,2241,'19','01','01','CHAUPIMARCA'),(1725,2241,'19','01','02','HUACHON'),(1726,2241,'19','01','03','HUARIACA'),(1727,2241,'19','01','04','HUAYLLAY'),(1728,2241,'19','01','05','NINACACA'),(1729,2241,'19','01','06','PALLANCHACRA'),(1730,2241,'19','01','07','PAUCARTAMBO'),(1731,2241,'19','01','08','SAN FRANCISCO DE ASIS DE YARUSYACAN'),(1732,2241,'19','01','09','SIMON BOLIVAR'),(1733,2241,'19','01','10','TICLACAYAN'),(1734,2241,'19','01','11','TINYAHUARCO'),(1735,2241,'19','01','12','VICCO'),(1736,2241,'19','01','13','YANACANCHA'),(1737,2241,'19','02','01','YANAHUANCA'),(1738,2241,'19','02','02','CHACAYAN'),(1739,2241,'19','02','03','GOYLLARISQUIZGA'),(1740,2241,'19','02','04','PAUCAR'),(1741,2241,'19','02','05','SAN PEDRO DE PILLAO'),(1742,2241,'19','02','06','SANTA ANA DE TUSI'),(1743,2241,'19','02','07','TAPUC'),(1744,2241,'19','02','08','VILCABAMBA'),(1745,2241,'19','03','01','OXAPAMPA'),(1746,2241,'19','03','02','CHONTABAMBA'),(1747,2241,'19','03','03','HUANCABAMBA'),(1748,2241,'19','03','04','PALCAZU'),(1749,2241,'19','03','05','POZUZO'),(1750,2241,'19','03','06','PUERTO BERMUDEZ'),(1751,2241,'19','03','07','VILLA RICA'),(1752,2241,'20','01','01','PIURA'),(1753,2241,'20','01','04','CASTILLA'),(1754,2241,'20','01','05','CATACAOS'),(1755,2241,'20','01','07','CURA MORI'),(1756,2241,'20','01','08','EL TALLAN'),(1757,2241,'20','01','09','LA ARENA'),(1758,2241,'20','01','10','LA UNION'),(1759,2241,'20','01','11','LAS LOMAS'),(1760,2241,'20','01','14','TAMBO GRANDE'),(1761,2241,'20','02','01','AYABACA'),(1762,2241,'20','02','02','FRIAS'),(1763,2241,'20','02','03','JILILI'),(1764,2241,'20','02','04','LAGUNAS'),(1765,2241,'20','02','05','MONTERO'),(1766,2241,'20','02','06','PACAIPAMPA'),(1767,2241,'20','02','07','PAIMAS'),(1768,2241,'20','02','08','SAPILLICA'),(1769,2241,'20','02','09','SICCHEZ'),(1770,2241,'20','02','10','SUYO'),(1771,2241,'20','03','01','HUANCABAMBA'),(1772,2241,'20','03','02','CANCHAQUE'),(1773,2241,'20','03','03','EL CARMEN DE LA FRONTERA'),(1774,2241,'20','03','04','HUARMACA'),(1775,2241,'20','03','05','LALAQUIZ'),(1776,2241,'20','03','06','SAN MIGUEL DE EL FAIQUE'),(1777,2241,'20','03','07','SONDOR'),(1778,2241,'20','03','08','SONDORILLO'),(1779,2241,'20','04','01','CHULUCANAS'),(1780,2241,'20','04','02','BUENOS AIRES'),(1781,2241,'20','04','03','CHALACO'),(1782,2241,'20','04','04','LA MATANZA'),(1783,2241,'20','04','05','MORROPON'),(1784,2241,'20','04','06','SALITRAL'),(1785,2241,'20','04','07','SAN JUAN DE BIGOTE'),(1786,2241,'20','04','08','SANTA CATALINA DE MOSSA'),(1787,2241,'20','04','09','SANTO DOMINGO'),(1788,2241,'20','04','10','YAMANGO'),(1789,2241,'20','05','01','PAITA'),(1790,2241,'20','05','02','AMOTAPE'),(1791,2241,'20','05','03','ARENAL'),(1792,2241,'20','05','04','COLAN'),(1793,2241,'20','05','05','LA HUACA'),(1794,2241,'20','05','06','TAMARINDO'),(1795,2241,'20','05','07','VICHAYAL'),(1796,2241,'20','06','01','SULLANA'),(1797,2241,'20','06','02','BELLAVISTA'),(1798,2241,'20','06','03','IGNACIO ESCUDERO'),(1799,2241,'20','06','04','LANCONES'),(1800,2241,'20','06','05','MARCAVELICA'),(1801,2241,'20','06','06','MIGUEL CHECA'),(1802,2241,'20','06','07','QUERECOTILLO'),(1803,2241,'20','06','08','SALITRAL'),(1804,2241,'20','07','01','PARIÑAS'),(1805,2241,'20','07','02','EL ALTO'),(1806,2241,'20','07','03','LA BREA'),(1807,2241,'20','07','04','LOBITOS'),(1808,2241,'20','07','05','LOS ORGANOS'),(1809,2241,'20','07','06','MANCORA'),(1810,2241,'20','08','01','SECHURA'),(1811,2241,'20','08','02','BELLAVISTA DE LA UNION'),(1812,2241,'20','08','03','BERNAL'),(1813,2241,'20','08','04','CRISTO NOS VALGA'),(1814,2241,'20','08','05','VICE'),(1815,2241,'20','08','06','RINCONADA LLICUAR'),(1816,2241,'21','01','01','PUNO'),(1817,2241,'21','01','02','ACORA'),(1818,2241,'21','01','03','AMANTANI'),(1819,2241,'21','01','04','ATUNCOLLA'),(1820,2241,'21','01','05','CAPACHICA'),(1821,2241,'21','01','06','CHUCUITO'),(1822,2241,'21','01','07','COATA'),(1823,2241,'21','01','08','HUATA'),(1824,2241,'21','01','09','MAÑAZO'),(1825,2241,'21','01','10','PAUCARCOLLA'),(1826,2241,'21','01','11','PICHACANI'),(1827,2241,'21','01','12','PLATERIA'),(1828,2241,'21','01','13','SAN ANTONIO'),(1829,2241,'21','01','14','TIQUILLACA'),(1830,2241,'21','01','15','VILQUE'),(1831,2241,'21','02','01','AZANGARO'),(1832,2241,'21','02','02','ACHAYA'),(1833,2241,'21','02','03','ARAPA'),(1834,2241,'21','02','04','ASILLO'),(1835,2241,'21','02','05','CAMINACA'),(1836,2241,'21','02','06','CHUPA'),(1837,2241,'21','02','07','JOSE DOMINGO CHOQUEHUANCA'),(1838,2241,'21','02','08','MUÑANI'),(1839,2241,'21','02','09','POTONI'),(1840,2241,'21','02','10','SAMAN'),(1841,2241,'21','02','11','SAN ANTON'),(1842,2241,'21','02','12','SAN JOSE'),(1843,2241,'21','02','13','SAN JUAN DE SALINAS'),(1844,2241,'21','02','14','SANTIAGO DE PUPUJA'),(1845,2241,'21','02','15','TIRAPATA'),(1846,2241,'21','03','01','MACUSANI'),(1847,2241,'21','03','02','AJOYANI'),(1848,2241,'21','03','03','AYAPATA'),(1849,2241,'21','03','04','COASA'),(1850,2241,'21','03','05','CORANI'),(1851,2241,'21','03','06','CRUCERO'),(1852,2241,'21','03','07','ITUATA'),(1853,2241,'21','03','08','OLLACHEA'),(1854,2241,'21','03','09','SAN GABAN'),(1855,2241,'21','03','10','USICAYOS'),(1856,2241,'21','04','01','JULI'),(1857,2241,'21','04','02','DESAGUADERO'),(1858,2241,'21','04','03','HUACULLANI'),(1859,2241,'21','04','04','KELLUYO'),(1860,2241,'21','04','05','PISACOMA'),(1861,2241,'21','04','06','POMATA'),(1862,2241,'21','04','07','ZEPITA'),(1863,2241,'21','05','01','ILAVE'),(1864,2241,'21','05','02','CAPAZO'),(1865,2241,'21','05','03','PILCUYO'),(1866,2241,'21','05','04','SANTA ROSA'),(1867,2241,'21','05','05','CONDURIRI'),(1868,2241,'21','06','01','HUANCANE'),(1869,2241,'21','06','02','COJATA'),(1870,2241,'21','06','03','HUATASANI'),(1871,2241,'21','06','04','INCHUPALLA'),(1872,2241,'21','06','05','PUSI'),(1873,2241,'21','06','06','ROSASPATA'),(1874,2241,'21','06','07','TARACO'),(1875,2241,'21','06','08','VILQUE CHICO'),(1876,2241,'21','07','01','LAMPA'),(1877,2241,'21','07','02','CABANILLA'),(1878,2241,'21','07','03','CALAPUJA'),(1879,2241,'21','07','04','NICASIO'),(1880,2241,'21','07','05','OCUVIRI'),(1881,2241,'21','07','06','PALCA'),(1882,2241,'21','07','07','PARATIA'),(1883,2241,'21','07','08','PUCARA'),(1884,2241,'21','07','09','SANTA LUCIA'),(1885,2241,'21','07','10','VILAVILA'),(1886,2241,'21','08','01','AYAVIRI'),(1887,2241,'21','08','02','ANTAUTA'),(1888,2241,'21','08','03','CUPI'),(1889,2241,'21','08','04','LLALLI'),(1890,2241,'21','08','05','MACARI'),(1891,2241,'21','08','06','NUÑOA'),(1892,2241,'21','08','07','ORURILLO'),(1893,2241,'21','08','08','SANTA ROSA'),(1894,2241,'21','08','09','UMACHIRI'),(1895,2241,'21','09','01','MOHO'),(1896,2241,'21','09','02','CONIMA'),(1897,2241,'21','09','03','HUAYRAPATA'),(1898,2241,'21','09','04','TILALI'),(1899,2241,'21','10','01','PUTINA'),(1900,2241,'21','10','02','ANANEA'),(1901,2241,'21','10','03','PEDRO VILCA APAZA'),(1902,2241,'21','10','04','QUILCAPUNCU'),(1903,2241,'21','10','05','SINA'),(1904,2241,'21','11','01','JULIACA'),(1905,2241,'21','11','02','CABANA'),(1906,2241,'21','11','03','CABANILLAS'),(1907,2241,'21','11','04','CARACOTO'),(1908,2241,'21','12','01','SANDIA'),(1909,2241,'21','12','02','CUYOCUYO'),(1910,2241,'21','12','03','LIMBANI'),(1911,2241,'21','12','04','PATAMBUCO'),(1912,2241,'21','12','05','PHARA'),(1913,2241,'21','12','06','QUIACA'),(1914,2241,'21','12','07','SAN JUAN DEL ORO'),(1915,2241,'21','12','08','YANAHUAYA'),(1916,2241,'21','12','09','ALTO INAMBARI'),(1917,2241,'21','12','10','SAN PEDRO DE PUTINA PUNCO'),(1918,2241,'21','13','01','YUNGUYO'),(1919,2241,'21','13','02','ANAPIA'),(1920,2241,'21','13','03','COPANI'),(1921,2241,'21','13','04','CUTURAPI'),(1922,2241,'21','13','05','OLLARAYA'),(1923,2241,'21','13','06','TINICACHI'),(1924,2241,'21','13','07','UNICACHI'),(1925,2241,'22','01','01','MOYOBAMBA'),(1926,2241,'22','01','02','CALZADA'),(1927,2241,'22','01','03','HABANA'),(1928,2241,'22','01','04','JEPELACIO'),(1929,2241,'22','01','05','SORITOR'),(1930,2241,'22','01','06','YANTALO'),(1931,2241,'22','02','01','BELLAVISTA'),(1932,2241,'22','02','02','ALTO BIAVO'),(1933,2241,'22','02','03','BAJO BIAVO'),(1934,2241,'22','02','04','HUALLAGA'),(1935,2241,'22','02','05','SAN PABLO'),(1936,2241,'22','02','06','SAN RAFAEL'),(1937,2241,'22','03','01','SAN JOSE DE SISA'),(1938,2241,'22','03','02','AGUA BLANCA'),(1939,2241,'22','03','03','SAN MARTIN'),(1940,2241,'22','03','04','SANTA ROSA'),(1941,2241,'22','03','05','SHATOJA'),(1942,2241,'22','04','01','SAPOSOA'),(1943,2241,'22','04','02','ALTO SAPOSOA'),(1944,2241,'22','04','03','EL ESLABON'),(1945,2241,'22','04','04','PISCOYACU'),(1946,2241,'22','04','05','SACANCHE'),(1947,2241,'22','04','06','TINGO DE SAPOSOA'),(1948,2241,'22','05','01','LAMAS'),(1949,2241,'22','05','02','ALONSO DE ALVARADO'),(1950,2241,'22','05','03','BARRANQUITA'),(1951,2241,'22','05','04','CAYNARACHI'),(1952,2241,'22','05','05','CUÑUMBUQUI'),(1953,2241,'22','05','06','PINTO RECODO'),(1954,2241,'22','05','07','RUMISAPA'),(1955,2241,'22','05','08','SAN ROQUE DE CUMBAZA'),(1956,2241,'22','05','09','SHANAO'),(1957,2241,'22','05','10','TABALOSOS'),(1958,2241,'22','05','11','ZAPATERO'),(1959,2241,'22','06','01','JUANJUI'),(1960,2241,'22','06','02','CAMPANILLA'),(1961,2241,'22','06','03','HUICUNGO'),(1962,2241,'22','06','04','PACHIZA'),(1963,2241,'22','06','05','PAJARILLO'),(1964,2241,'22','07','01','PICOTA'),(1965,2241,'22','07','02','BUENOS AIRES'),(1966,2241,'22','07','03','CASPISAPA'),(1967,2241,'22','07','04','PILLUANA'),(1968,2241,'22','07','05','PUCACACA'),(1969,2241,'22','07','06','SAN CRISTOBAL'),(1970,2241,'22','07','07','SAN HILARION'),(1971,2241,'22','07','08','SHAMBOYACU'),(1972,2241,'22','07','09','TINGO DE PONASA'),(1973,2241,'22','07','10','TRES UNIDOS'),(1974,2241,'22','08','01','RIOJA'),(1975,2241,'22','08','02','AWAJUN'),(1976,2241,'22','08','03','ELIAS SOPLIN VARGAS'),(1977,2241,'22','08','04','NUEVA CAJAMARCA'),(1978,2241,'22','08','05','PARDO MIGUEL'),(1979,2241,'22','08','06','POSIC'),(1980,2241,'22','08','07','SAN FERNANDO'),(1981,2241,'22','08','08','YORONGOS'),(1982,2241,'22','08','09','YURACYACU'),(1983,2241,'22','09','01','TARAPOTO'),(1984,2241,'22','09','02','ALBERTO LEVEAU'),(1985,2241,'22','09','03','CACATACHI'),(1986,2241,'22','09','04','CHAZUTA'),(1987,2241,'22','09','05','CHIPURANA'),(1988,2241,'22','09','06','EL PORVENIR'),(1989,2241,'22','09','07','HUIMBAYOC'),(1990,2241,'22','09','08','JUAN GUERRA'),(1991,2241,'22','09','09','LA BANDA DE SHILCAYO'),(1992,2241,'22','09','10','MORALES'),(1993,2241,'22','09','11','PAPAPLAYA'),(1994,2241,'22','09','12','SAN ANTONIO'),(1995,2241,'22','09','13','SAUCE'),(1996,2241,'22','09','14','SHAPAJA'),(1997,2241,'22','10','01','TOCACHE'),(1998,2241,'22','10','02','NUEVO PROGRESO'),(1999,2241,'22','10','03','POLVORA'),(2000,2241,'22','10','04','SHUNTE'),(2001,2241,'22','10','05','UCHIZA'),(2002,2241,'23','01','01','TACNA'),(2003,2241,'23','01','02','ALTO DE LA ALIANZA'),(2004,2241,'23','01','03','CALANA'),(2005,2241,'23','01','04','CIUDAD NUEVA'),(2006,2241,'23','01','05','INCLAN'),(2007,2241,'23','01','06','PACHIA'),(2008,2241,'23','01','07','PALCA'),(2009,2241,'23','01','08','POCOLLAY'),(2010,2241,'23','01','09','SAMA'),(2011,2241,'23','01','10','CORONEL GREGORIO ALBARRACIN LANCHIPA'),(2012,2241,'23','02','01','CANDARAVE'),(2013,2241,'23','02','02','CAIRANI'),(2014,2241,'23','02','03','CAMILACA'),(2015,2241,'23','02','04','CURIBAYA'),(2016,2241,'23','02','05','HUANUARA'),(2017,2241,'23','02','06','QUILAHUANI'),(2018,2241,'23','03','01','LOCUMBA'),(2019,2241,'23','03','02','ILABAYA'),(2020,2241,'23','03','03','ITE'),(2021,2241,'23','04','01','TARATA'),(2022,2241,'23','04','02','HEROES ALBARRACIN'),(2023,2241,'23','04','03','ESTIQUE'),(2024,2241,'23','04','04','ESTIQUE-PAMPA'),(2025,2241,'23','04','05','SITAJARA'),(2026,2241,'23','04','06','SUSAPAYA'),(2027,2241,'23','04','07','TARUCACHI'),(2028,2241,'23','04','08','TICACO'),(2029,2241,'24','01','01','TUMBES'),(2030,2241,'24','01','02','CORRALES'),(2031,2241,'24','01','03','LA CRUZ'),(2032,2241,'24','01','04','PAMPAS DE HOSPITAL'),(2033,2241,'24','01','05','SAN JACINTO'),(2034,2241,'24','01','06','SAN JUAN DE LA VIRGEN'),(2035,2241,'24','02','01','ZORRITOS'),(2036,2241,'24','02','02','CASITAS'),(2037,2241,'24','02','03','CANOAS DE PUNTA SAL'),(2038,2241,'24','03','01','ZARUMILLA'),(2039,2241,'24','03','02','AGUAS VERDES'),(2040,2241,'24','03','03','MATAPALO'),(2041,2241,'24','03','04','PAPAYAL'),(2042,2241,'25','01','01','CALLERIA'),(2043,2241,'25','01','02','CAMPOVERDE'),(2044,2241,'25','01','03','IPARIA'),(2045,2241,'25','01','04','MASISEA'),(2046,2241,'25','01','05','YARINACOCHA'),(2047,2241,'25','01','06','NUEVA REQUENA'),(2048,2241,'25','02','01','RAYMONDI'),(2049,2241,'25','02','02','SEPAHUA'),(2050,2241,'25','02','03','TAHUANIA'),(2051,2241,'25','02','04','YURUA'),(2052,2241,'25','03','01','PADRE ABAD'),(2053,2241,'25','03','02','IRAZOLA'),(2054,2241,'25','03','03','CURIMANA'),(2055,2241,'25','04','01','PURUS'),(2056,0,'00','00','00','Afganistán'),(2057,0,'00','00','00','Akrotiri'),(2058,0,'00','00','00','Albania'),(2059,0,'00','00','00','Alemania'),(2060,0,'00','00','00','Andorra'),(2061,0,'00','00','00','Angola'),(2062,0,'00','00','00','Anguila'),(2063,0,'00','00','00','Antártida'),(2064,0,'00','00','00','Antigua y Barbuda'),(2065,0,'00','00','00','Antillas Neerlandesas'),(2066,0,'00','00','00','Arabia Saudí'),(2067,0,'00','00','00','Arctic Ocean'),(2068,0,'00','00','00','Argelia'),(2069,0,'00','00','00','Argentina'),(2070,0,'00','00','00','Armenia'),(2071,0,'00','00','00','Aruba'),(2072,0,'00','00','00','Ashmore and Cartier Islands'),(2073,0,'00','00','00','Atlantic Ocean'),(2074,0,'00','00','00','Australia'),(2075,0,'00','00','00','Austria'),(2076,0,'00','00','00','Azerbaiyán'),(2077,0,'00','00','00','Bahamas'),(2078,0,'00','00','00','Bahráin'),(2079,0,'00','00','00','Bangladesh'),(2080,0,'00','00','00','Barbados'),(2081,0,'00','00','00','Bélgica'),(2082,0,'00','00','00','Belice'),(2083,0,'00','00','00','Benín'),(2084,0,'00','00','00','Bermudas'),(2085,0,'00','00','00','Bielorrusia'),(2086,0,'00','00','00','Birmania; Myanmar'),(2087,0,'00','00','00','Bolivia'),(2088,0,'00','00','00','Bosnia y Hercegovina'),(2089,0,'00','00','00','Botsuana'),(2090,0,'00','00','00','Brasil'),(2091,0,'00','00','00','Brunéi'),(2092,0,'00','00','00','Bulgaria'),(2093,0,'00','00','00','Burkina Faso'),(2094,0,'00','00','00','Burundi'),(2095,0,'00','00','00','Bután'),(2096,0,'00','00','00','Cabo Verde'),(2097,0,'00','00','00','Camboya'),(2098,0,'00','00','00','Camerún'),(2099,0,'00','00','00','Canadá'),(2100,0,'00','00','00','Chad'),(2101,0,'00','00','00','Chile'),(2102,0,'00','00','00','China'),(2103,0,'00','00','00','Chipre'),(2104,0,'00','00','00','Clipperton Island'),(2105,0,'00','00','00','Colombia'),(2106,0,'00','00','00','Comoras'),(2107,0,'00','00','00','Congo'),(2108,0,'00','00','00','Coral Sea Islands'),(2109,0,'00','00','00','Corea del Norte'),(2110,0,'00','00','00','Corea del Sur'),(2111,0,'00','00','00','Costa de Marfil'),(2112,0,'00','00','00','Costa Rica'),(2113,0,'00','00','00','Croacia'),(2114,0,'00','00','00','Cuba'),(2115,0,'00','00','00','Dhekelia'),(2116,0,'00','00','00','Dinamarca'),(2117,0,'00','00','00','Dominica'),(2118,0,'00','00','00','Ecuador'),(2119,0,'00','00','00','Egipto'),(2120,0,'00','00','00','El Salvador'),(2121,0,'00','00','00','El Vaticano'),(2122,0,'00','00','00','Emiratos Árabes Unidos'),(2123,0,'00','00','00','Eritrea'),(2124,0,'00','00','00','Eslovaquia'),(2125,0,'00','00','00','Eslovenia'),(2126,0,'00','00','00','España'),(2127,0,'00','00','00','Estados Unidos'),(2128,0,'00','00','00','Estonia'),(2129,0,'00','00','00','Etiopía'),(2130,0,'00','00','00','Filipinas'),(2131,0,'00','00','00','Finlandia'),(2132,0,'00','00','00','Fiyi'),(2133,0,'00','00','00','Francia'),(2134,0,'00','00','00','Gabón'),(2135,0,'00','00','00','Gambia'),(2136,0,'00','00','00','Gaza Strip'),(2137,0,'00','00','00','Georgia'),(2138,0,'00','00','00','Ghana'),(2139,0,'00','00','00','Gibraltar'),(2140,0,'00','00','00','Granada'),(2141,0,'00','00','00','Grecia'),(2142,0,'00','00','00','Groenlandia'),(2143,0,'00','00','00','Guam'),(2144,0,'00','00','00','Guatemala'),(2145,0,'00','00','00','Guernsey'),(2146,0,'00','00','00','Guinea'),(2147,0,'00','00','00','Guinea Ecuatorial'),(2148,0,'00','00','00','Guinea-Bissau'),(2149,0,'00','00','00','Guyana'),(2150,0,'00','00','00','Haití'),(2151,0,'00','00','00','Honduras'),(2152,0,'00','00','00','Hong Kong'),(2153,0,'00','00','00','Hungría'),(2154,0,'00','00','00','India'),(2155,0,'00','00','00','Indian Ocean'),(2156,0,'00','00','00','Indonesia'),(2157,0,'00','00','00','Irán'),(2158,0,'00','00','00','Iraq'),(2159,0,'00','00','00','Irlanda'),(2160,0,'00','00','00','Isla Bouvet'),(2161,0,'00','00','00','Isla Christmas'),(2162,0,'00','00','00','Isla Norfolk'),(2163,0,'00','00','00','Islandia'),(2164,0,'00','00','00','Islas Caimán'),(2165,0,'00','00','00','Islas Cocos'),(2166,0,'00','00','00','Islas Cook'),(2167,0,'00','00','00','Islas Feroe'),(2168,0,'00','00','00','Islas Georgia del Sur y Sandwich del Sur'),(2169,0,'00','00','00','Islas Heard y McDonald'),(2170,0,'00','00','00','Islas Malvinas'),(2171,0,'00','00','00','Islas Marianas del Norte'),(2172,0,'00','00','00','Islas Marshall'),(2173,0,'00','00','00','Islas Pitcairn'),(2174,0,'00','00','00','Islas Salomón'),(2175,0,'00','00','00','Islas Turcas y Caicos'),(2176,0,'00','00','00','Islas Vírgenes Americanas'),(2177,0,'00','00','00','Islas Vírgenes Británicas'),(2178,0,'00','00','00','Israel'),(2179,0,'00','00','00','Italia'),(2180,0,'00','00','00','Jamaica'),(2181,0,'00','00','00','Jan Mayen'),(2182,0,'00','00','00','Japón'),(2183,0,'00','00','00','Jersey'),(2184,0,'00','00','00','Jordania'),(2185,0,'00','00','00','Kazajistán'),(2186,0,'00','00','00','Kenia'),(2187,0,'00','00','00','Kirguizistán'),(2188,0,'00','00','00','Kiribati'),(2189,0,'00','00','00','Kuwait'),(2190,0,'00','00','00','Laos'),(2191,0,'00','00','00','Lesoto'),(2192,0,'00','00','00','Letonia'),(2193,0,'00','00','00','Líbano'),(2194,0,'00','00','00','Liberia'),(2195,0,'00','00','00','Libia'),(2196,0,'00','00','00','Liechtenstein'),(2197,0,'00','00','00','Lituania'),(2198,0,'00','00','00','Luxemburgo'),(2199,0,'00','00','00','Macao'),(2200,0,'00','00','00','Macedonia'),(2201,0,'00','00','00','Madagascar'),(2202,0,'00','00','00','Malasia'),(2203,0,'00','00','00','Malaui'),(2204,0,'00','00','00','Maldivas'),(2205,0,'00','00','00','Malí'),(2206,0,'00','00','00','Malta'),(2207,0,'00','00','00','Man, Isle of'),(2208,0,'00','00','00','Marruecos'),(2209,0,'00','00','00','Mauricio'),(2210,0,'00','00','00','Mauritania'),(2211,0,'00','00','00','Mayotte'),(2212,0,'00','00','00','México'),(2213,0,'00','00','00','Micronesia'),(2214,0,'00','00','00','Moldavia'),(2215,0,'00','00','00','Mónaco'),(2216,0,'00','00','00','Mongolia'),(2217,0,'00','00','00','Montenegro'),(2218,0,'00','00','00','Montserrat'),(2219,0,'00','00','00','Mozambique'),(2220,0,'00','00','00','Mundo'),(2221,0,'00','00','00','Namibia'),(2222,0,'00','00','00','Nauru'),(2223,0,'00','00','00','Navassa Island'),(2224,0,'00','00','00','Nepal'),(2225,0,'00','00','00','Nicaragua'),(2226,0,'00','00','00','Níger'),(2227,0,'00','00','00','Nigeria'),(2228,0,'00','00','00','Niue'),(2229,0,'00','00','00','Noruega'),(2230,0,'00','00','00','Nueva Caledonia'),(2231,0,'00','00','00','Nueva Zelanda'),(2232,0,'00','00','00','Omán'),(2233,0,'00','00','00','Pacific Ocean'),(2234,0,'00','00','00','Países Bajos'),(2235,0,'00','00','00','Pakistán'),(2236,0,'00','00','00','Palaos'),(2237,0,'00','00','00','Panamá'),(2238,0,'00','00','00','Papúa-Nueva Guinea'),(2239,0,'00','00','00','Paracel Islands'),(2240,0,'00','00','00','Paraguay'),(2241,0,'00','00','00','Perú'),(2242,0,'00','00','00','Polinesia Francesa'),(2243,0,'00','00','00','Polonia'),(2244,0,'00','00','00','Portugal'),(2245,0,'00','00','00','Puerto Rico'),(2246,0,'00','00','00','Qatar'),(2247,0,'00','00','00','Reino Unido'),(2248,0,'00','00','00','República Centroafricana'),(2249,0,'00','00','00','República Checa'),(2250,0,'00','00','00','República Democrática del Congo'),(2251,0,'00','00','00','República Dominicana'),(2252,0,'00','00','00','Ruanda'),(2253,0,'00','00','00','Rumania'),(2254,0,'00','00','00','Rusia'),(2255,0,'00','00','00','Sáhara Occidental'),(2256,0,'00','00','00','Samoa'),(2257,0,'00','00','00','Samoa Americana'),(2258,0,'00','00','00','San Cristóbal y Nieves'),(2259,0,'00','00','00','San Marino'),(2260,0,'00','00','00','San Pedro y Miquelón'),(2261,0,'00','00','00','San Vicente y las Granadinas'),(2262,0,'00','00','00','Santa Helena'),(2263,0,'00','00','00','Santa Lucía'),(2264,0,'00','00','00','Santo Tomé y Príncipe'),(2265,0,'00','00','00','Senegal'),(2266,0,'00','00','00','Serbia'),(2267,0,'00','00','00','Seychelles'),(2268,0,'00','00','00','Sierra Leona'),(2269,0,'00','00','00','Singapur'),(2270,0,'00','00','00','Siria'),(2271,0,'00','00','00','Somalia'),(2272,0,'00','00','00','Southern Ocean'),(2273,0,'00','00','00','Spratly Islands'),(2274,0,'00','00','00','Sri Lanka'),(2275,0,'00','00','00','Suazilandia'),(2276,0,'00','00','00','Sudáfrica'),(2277,0,'00','00','00','Sudán'),(2278,0,'00','00','00','Suecia'),(2279,0,'00','00','00','Suiza'),(2280,0,'00','00','00','Surinam'),(2281,0,'00','00','00','Svalbard y Jan Mayen'),(2282,0,'00','00','00','Tailandia'),(2283,0,'00','00','00','Taiwán'),(2284,0,'00','00','00','Tanzania'),(2285,0,'00','00','00','Tayikistán'),(2286,0,'00','00','00','Territorio Británico del Océano Indico'),(2287,0,'00','00','00','Territorios Australes Franceses'),(2288,0,'00','00','00','Timor Oriental'),(2289,0,'00','00','00','Togo'),(2290,0,'00','00','00','Tokelau'),(2291,0,'00','00','00','Tonga'),(2292,0,'00','00','00','Trinidad y Tobago'),(2293,0,'00','00','00','Túnez'),(2294,0,'00','00','00','Turkmenistán'),(2295,0,'00','00','00','Turquía'),(2296,0,'00','00','00','Tuvalu'),(2297,0,'00','00','00','Ucrania'),(2298,0,'00','00','00','Uganda'),(2299,0,'00','00','00','Unión Europea'),(2300,0,'00','00','00','Uruguay'),(2301,0,'00','00','00','Uzbekistán'),(2302,0,'00','00','00','Vanuatu'),(2303,0,'00','00','00','Venezuela'),(2304,0,'00','00','00','Vietnam'),(2305,0,'00','00','00','Wake Island'),(2306,0,'00','00','00','Wallis y Futuna'),(2307,0,'00','00','00','West Bank'),(2308,0,'00','00','00','Yemen'),(2309,0,'00','00','00','Yibuti'),(2310,0,'00','00','00','Zambia'),(2311,0,'00','00','00','Zimbabue'),(2312,2241,'99','99','99','SIN DATOS');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_objeto`
--

LOCK TABLES `usuario_objeto` WRITE;
/*!40000 ALTER TABLE `usuario_objeto` DISABLE KEYS */;
INSERT INTO `usuario_objeto` VALUES (1,1,2,'2014-03-01 18:58:03','1'),(2,2,2,'2014-03-01 21:57:07','1'),(3,3,2,'2014-03-01 21:57:07','1'),(4,4,2,'2014-03-01 21:57:07','1'),(5,5,2,'2014-03-01 21:57:07','1'),(6,1,1,'2014-03-04 00:24:33','1'),(7,2,1,'2014-03-04 00:24:33','1'),(8,3,1,'2014-03-04 00:24:33','1'),(9,4,1,'2014-03-04 00:24:33','1'),(10,5,1,'2014-03-04 00:24:33','1'),(11,6,1,'2014-03-07 21:48:47','1'),(12,7,1,'2014-03-13 22:10:47','1'),(13,8,1,'2014-03-13 23:58:37','1'),(14,9,1,'2014-03-17 03:04:51','1'),(17,14,1,'2014-03-17 04:16:57','1');
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_s_iniciarsesion`(
	IN cusuario VARCHAR(100), 
	IN cclave VARCHAR(100)
)
BEGIN
	select u.nUsuId,p.nPerId,u.cUsuNick,CONCAT(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as nombre from usuario u 
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

-- Dump completed on 2014-03-28 18:22:51
