-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: cola
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `cola`
--

DROP TABLE IF EXISTS `cola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cola` (
  `idcola` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_fin` varchar(45) DEFAULT NULL,
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL COMMENT '	',
  `codigo_alta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcola`,`usuario_idusuario`),
  KEY `fk_cola_usuario_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_cola_usuario` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cola`
--

LOCK TABLES `cola` WRITE;
/*!40000 ALTER TABLE `cola` DISABLE KEYS */;
/*!40000 ALTER TABLE `cola` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cola_has_usuariotemporales`
--

DROP TABLE IF EXISTS `cola_has_usuariotemporales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cola_has_usuariotemporales` (
  `cola_idcola` int(11) NOT NULL,
  `cola_usuario_idusuario` int(11) NOT NULL,
  `usuarioTemporales_idusuarioTemporales` int(11) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  PRIMARY KEY (`cola_idcola`,`cola_usuario_idusuario`,`usuarioTemporales_idusuarioTemporales`),
  KEY `fk_cola_has_usuarioTemporales_usuarioTemporales1_idx` (`usuarioTemporales_idusuarioTemporales`),
  KEY `fk_cola_has_usuarioTemporales_cola1_idx` (`cola_idcola`,`cola_usuario_idusuario`),
  CONSTRAINT `fk_cola_has_usuarioTemporales_cola1` FOREIGN KEY (`cola_idcola`, `cola_usuario_idusuario`) REFERENCES `cola` (`idcola`, `usuario_idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cola_has_usuarioTemporales_usuarioTemporales1` FOREIGN KEY (`usuarioTemporales_idusuarioTemporales`) REFERENCES `usuariotemporales` (`idusuarioTemporales`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cola_has_usuariotemporales`
--

LOCK TABLES `cola_has_usuariotemporales` WRITE;
/*!40000 ALTER TABLE `cola_has_usuariotemporales` DISABLE KEYS */;
/*!40000 ALTER TABLE `cola_has_usuariotemporales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indexpersonalizado`
--

DROP TABLE IF EXISTS `indexpersonalizado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indexpersonalizado` (
  `idindexPersonalizado` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `footer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idindexPersonalizado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indexpersonalizado`
--

LOCK TABLES `indexpersonalizado` WRITE;
/*!40000 ALTER TABLE `indexpersonalizado` DISABLE KEYS */;
/*!40000 ALTER TABLE `indexpersonalizado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL COMMENT '	',
  `apellidos` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contrasenia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'David','Salas Castro','Admin','davidsalascastro@gmail.com','password'),(2,'Jose Daniel','Salas Villaldea','Moderador','dasavi1811@gmail.com','password');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariotemporales`
--

DROP TABLE IF EXISTS `usuariotemporales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariotemporales` (
  `idusuarioTemporales` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `codigo_cliente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuarioTemporales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariotemporales`
--

LOCK TABLES `usuariotemporales` WRITE;
/*!40000 ALTER TABLE `usuariotemporales` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariotemporales` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-18 16:41:07
