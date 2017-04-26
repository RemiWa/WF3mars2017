-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: entreprise
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `employes`
--

DROP TABLE IF EXISTS `employes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employes` (
  `id_employes` int(3) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `sexe` enum('m','f') NOT NULL,
  `service` varchar(30) DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  `salaire` float DEFAULT NULL,
  PRIMARY KEY (`id_employes`)
) ENGINE=InnoDB AUTO_INCREMENT=2001 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employes`
--

LOCK TABLES `employes` WRITE;
/*!40000 ALTER TABLE `employes` DISABLE KEYS */;
INSERT INTO `employes` VALUES (350,'Jean-pierre','Laborde','m','direction','1999-12-09',5100),(415,'Thomas','Winter','m','commercial','2000-05-03',3650),(417,'Chloe','Dubar','f','production','2001-09-05',2000),(491,'Elodie','Fellier','f','secretariat','2002-02-22',1700),(509,'Fabrice','Grand','m','comptabilite','2003-02-20',2000),(547,'Melanie','Collier','f','commercial','2004-09-08',3200),(592,'Laura','Blanchet','f','direction','2005-06-09',4600),(627,'Guillaume','Miller','m','commercial','2006-07-02',2000),(655,'Celine','Perrin','f','commercial','2006-09-10',2800),(699,'Julien','Cottet','m','autre','2007-01-18',1972),(739,'ALLO','Desprez','m','secretariat','2009-11-17',1600),(780,'Amandine','Thoyer','f','communication','2010-01-23',1600),(802,'Damien','Durand','m','informatique','2010-07-05',2350),(876,'Nathalie','Martin','f','juridique','2012-01-12',3300),(933,'Emilie','Sennard','f','commercial','2014-09-11',1900),(2000,'test','test','m','marketing','2010-07-05',2701);
/*!40000 ALTER TABLE `employes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vue_homme`
--

DROP TABLE IF EXISTS `vue_homme`;
/*!50001 DROP VIEW IF EXISTS `vue_homme`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vue_homme` (
  `prenom` tinyint NOT NULL,
  `nom` tinyint NOT NULL,
  `sexe` tinyint NOT NULL,
  `service` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vue_homme`
--

/*!50001 DROP TABLE IF EXISTS `vue_homme`*/;
/*!50001 DROP VIEW IF EXISTS `vue_homme`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = cp850 */;
/*!50001 SET character_set_results     = cp850 */;
/*!50001 SET collation_connection      = cp850_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vue_homme` AS select `employes`.`prenom` AS `prenom`,`employes`.`nom` AS `nom`,`employes`.`sexe` AS `sexe`,`employes`.`service` AS `service` from `employes` where (`employes`.`sexe` = 'm') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 11:41:43
