-- MySQL dump 10.11
--
-- Host: db9.subsys.no    Database: zapatista_rekneskap
-- ------------------------------------------------------
-- Server version	5.0.90

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
-- Table structure for table `TypeTabell`
--

DROP TABLE IF EXISTS `TypeTabell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TypeTabell` (
  `ID` int(11) NOT NULL auto_increment,
  `Navn` varchar(30) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=267 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adresser`
--

DROP TABLE IF EXISTS `adresser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adresser` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `linje1` varchar(200) NOT NULL,
  `linje2` varchar(200) default NULL,
  `linje3` varchar(200) default NULL,
  `merkes` varchar(100) default NULL,
  `postnummer` char(4) NOT NULL,
  `poststad` varchar(100) NOT NULL,
  `epost` varchar(100) default NULL,
  PRIMARY KEY  (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `alle_kaffesalg_penger_per_dag`
--

DROP TABLE IF EXISTS `alle_kaffesalg_penger_per_dag`;
/*!50001 DROP VIEW IF EXISTS `alle_kaffesalg_penger_per_dag`*/;
/*!50001 CREATE TABLE `alle_kaffesalg_penger_per_dag` (
  `sum(pengeflytting.kroner)` decimal(33,0),
  `date(pengeflytting.dato)` date
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `alle_sals_datoar`
--

DROP TABLE IF EXISTS `alle_sals_datoar`;
/*!50001 DROP VIEW IF EXISTS `alle_sals_datoar`*/;
/*!50001 CREATE TABLE `alle_sals_datoar` (
  `dato` varchar(10),
  `year` int(4),
  `month` int(2),
  `day` int(2)
) ENGINE=MyISAM */;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL auto_increment,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL default '0',
  `_read` varchar(2) NOT NULL default '0',
  `_update` varchar(2) NOT NULL default '0',
  `_delete` varchar(2) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `beholdning`
--

DROP TABLE IF EXISTS `beholdning`;
/*!50001 DROP VIEW IF EXISTS `beholdning`*/;
/*!50001 CREATE TABLE `beholdning` (
  `inn` decimal(33,0),
  `ut` decimal(33,0),
  `type` int(10) unsigned,
  `lager` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Table structure for table `bestillinger`
--

DROP TABLE IF EXISTS `bestillinger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bestillinger` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `antall` int(10) unsigned NOT NULL,
  `kunde` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`nummer`),
  KEY `type` (`type`),
  KEY `kunde` (`kunde`),
  CONSTRAINT `bestillinger_ibfk_1` FOREIGN KEY (`type`) REFERENCES `kaffepris` (`nummer`),
  CONSTRAINT `bestillinger_ibfk_2` FOREIGN KEY (`kunde`) REFERENCES `kunder` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bilag`
--

DROP TABLE IF EXISTS `bilag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bilag` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `filnavn` varchar(100) NOT NULL,
  `filtype` varchar(50) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `pengeflytting_id` int(10) unsigned default NULL,
  `innhold` longblob NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `selger_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `pengeflytting_id` (`pengeflytting_id`),
  KEY `selger_id` (`selger_id`),
  CONSTRAINT `bilag_ibfk_1` FOREIGN KEY (`pengeflytting_id`) REFERENCES `pengeflytting` (`nummer`),
  CONSTRAINT `bilag_ibfk_2` FOREIGN KEY (`selger_id`) REFERENCES `selgere` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=617 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bringsonestruktur`
--

DROP TABLE IF EXISTS `bringsonestruktur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bringsonestruktur` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `start` char(4) NOT NULL,
  `slutt` char(4) NOT NULL,
  `sone` int(10) unsigned NOT NULL,
  `sted` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `budsjett_pengeflyttinger`
--

DROP TABLE IF EXISTS `budsjett_pengeflyttinger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budsjett_pengeflyttinger` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fra` int(10) unsigned NOT NULL,
  `til` int(10) unsigned NOT NULL,
  `kroner` int(10) unsigned NOT NULL,
  `dato` datetime NOT NULL,
  `beskrivelse` varchar(400) default NULL,
  `oere` int(2) unsigned default '0',
  `modified` datetime default NULL,
  `created` datetime default NULL,
  `kaffiimport_id` int(10) unsigned default NULL,
  `kaffibrenning_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `til` (`til`),
  KEY `fra` (`fra`),
  KEY `kaffiimport_id` (`kaffiimport_id`),
  KEY `kaffibrenning_id` (`kaffibrenning_id`),
  CONSTRAINT `frakonto` FOREIGN KEY (`fra`) REFERENCES `kontoer` (`nummer`),
  CONSTRAINT `kaffibrenning_budsjett_utgift` FOREIGN KEY (`kaffibrenning_id`) REFERENCES `kaffibrenning` (`id`),
  CONSTRAINT `kaffiimport_budsjett_utgift` FOREIGN KEY (`kaffiimport_id`) REFERENCES `kaffiimport` (`id`),
  CONSTRAINT `tilkonto` FOREIGN KEY (`til`) REFERENCES `kontoer` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `counter`
--

DROP TABLE IF EXISTS `counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counter` (
  `count` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `faktura_innbetalt`
--

DROP TABLE IF EXISTS `faktura_innbetalt`;
/*!50001 DROP VIEW IF EXISTS `faktura_innbetalt`*/;
/*!50001 CREATE TABLE `faktura_innbetalt` (
  `faktura_id` int(10) unsigned,
  `kroner` decimal(33,0),
  `oere` decimal(33,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `faktura_ubetalt`
--

DROP TABLE IF EXISTS `faktura_ubetalt`;
/*!50001 DROP VIEW IF EXISTS `faktura_ubetalt`*/;
/*!50001 CREATE TABLE `faktura_ubetalt` (
  `faktura_id` int(10) unsigned,
  `mangler` decimal(34,0)
) ENGINE=MyISAM */;

--
-- Table structure for table `fakturaer`
--

DROP TABLE IF EXISTS `fakturaer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakturaer` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `kunde` int(10) unsigned NOT NULL,
  `faktura_dato` date NOT NULL,
  `betalings_frist` date NOT NULL,
  `melding` varchar(200) default NULL,
  `kroner` int(10) unsigned NOT NULL,
  `adresse` int(10) unsigned NOT NULL,
  `mva` int(10) unsigned default '0',
  `totalpris` int(10) unsigned NOT NULL,
  `kaffesalg_id` int(10) unsigned default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `tekst` varchar(2000) default NULL,
  `fakturapdf_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`nummer`),
  KEY `kunde` (`kunde`),
  KEY `fakturaadresse` (`adresse`),
  KEY `kaffesalg_id` (`kaffesalg_id`),
  KEY `fakturapdf_id` (`fakturapdf_id`),
  CONSTRAINT `fakturaadresse` FOREIGN KEY (`adresse`) REFERENCES `adresser` (`nummer`),
  CONSTRAINT `fakturaer_ibfk_2` FOREIGN KEY (`kunde`) REFERENCES `kunder` (`nummer`),
  CONSTRAINT `fakturaer_ibfk_4` FOREIGN KEY (`kaffesalg_id`) REFERENCES `kaffesalg` (`nummer`),
  CONSTRAINT `fakturaer_ibfk_5` FOREIGN KEY (`fakturapdf_id`) REFERENCES `fakturapdf` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=536 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fakturapdf`
--

DROP TABLE IF EXISTS `fakturapdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakturapdf` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `filnavn` varchar(30) NOT NULL,
  `filtype` varchar(30) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `innhold` longblob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `filer`
--

DROP TABLE IF EXISTS `filer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filer` (
  `navn` varchar(50) NOT NULL,
  `mimeType` varchar(30) NOT NULL,
  `data` longblob NOT NULL,
  `opphavsrett` varchar(30) default NULL,
  PRIMARY KEY  (`navn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `gronne_bonner_verdi`
--

DROP TABLE IF EXISTS `gronne_bonner_verdi`;
/*!50001 DROP VIEW IF EXISTS `gronne_bonner_verdi`*/;
/*!50001 CREATE TABLE `gronne_bonner_verdi` (
  `kaffiimport_id` int(11) unsigned,
  `verdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `gronne_bonner_verdi_sum`
--

DROP TABLE IF EXISTS `gronne_bonner_verdi_sum`;
/*!50001 DROP VIEW IF EXISTS `gronne_bonner_verdi_sum`*/;
/*!50001 CREATE TABLE `gronne_bonner_verdi_sum` (
  `kaffiimport_id` int(11) unsigned,
  `verdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `gronne_bonner_verdi_total`
--

DROP TABLE IF EXISTS `gronne_bonner_verdi_total`;
/*!50001 DROP VIEW IF EXISTS `gronne_bonner_verdi_total`*/;
/*!50001 CREATE TABLE `gronne_bonner_verdi_total` (
  `sum(verdi)` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Table structure for table `intern_filer`
--

DROP TABLE IF EXISTS `intern_filer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intern_filer` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `filnavn` varchar(100) NOT NULL,
  `filtype` varchar(50) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `innhold` longblob NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `selger_id` int(10) unsigned default NULL,
  `kommentar` varchar(200) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fillager_selger` (`selger_id`),
  CONSTRAINT `fillager_selger` FOREIGN KEY (`selger_id`) REFERENCES `selgere` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kaffeflytting`
--

DROP TABLE IF EXISTS `kaffeflytting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffeflytting` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `type` int(10) unsigned NOT NULL,
  `antall` int(6) unsigned NOT NULL,
  `fra` int(10) unsigned NOT NULL,
  `beskrivelse` varchar(400) default NULL,
  `til` int(10) unsigned NOT NULL,
  `dato` datetime NOT NULL,
  `pengeflytting` int(10) unsigned default NULL,
  `fralagertype` int(10) unsigned default NULL,
  `tillagertype` int(10) unsigned default NULL,
  `ansvarlig` int(10) unsigned default NULL,
  `faktura` int(10) unsigned default NULL,
  `kaffesalg_id` int(10) unsigned default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `rabatt_id` int(10) unsigned default NULL,
  `kaffibrenning_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`nummer`),
  KEY `pengeflytting` (`pengeflytting`),
  KEY `fralagertype` (`fralagertype`),
  KEY `tillagertype` (`tillagertype`),
  KEY `ansvarlig` (`ansvarlig`),
  KEY `kaffefaktura` (`faktura`),
  KEY `kaffesalg_id` (`kaffesalg_id`),
  KEY `rabatt_id` (`rabatt_id`),
  KEY `kaffibrenning_flytting` (`kaffibrenning_id`),
  CONSTRAINT `kaffefaktura` FOREIGN KEY (`faktura`) REFERENCES `fakturaer` (`nummer`),
  CONSTRAINT `kaffeflytting_ibfk_2` FOREIGN KEY (`pengeflytting`) REFERENCES `pengeflytting` (`nummer`) ON DELETE CASCADE,
  CONSTRAINT `kaffeflytting_ibfk_3` FOREIGN KEY (`fralagertype`) REFERENCES `lagertyper` (`nummer`),
  CONSTRAINT `kaffeflytting_ibfk_4` FOREIGN KEY (`tillagertype`) REFERENCES `lagertyper` (`nummer`),
  CONSTRAINT `kaffeflytting_ibfk_5` FOREIGN KEY (`ansvarlig`) REFERENCES `selgere` (`nummer`),
  CONSTRAINT `kaffeflytting_ibfk_6` FOREIGN KEY (`kaffesalg_id`) REFERENCES `kaffesalg` (`nummer`),
  CONSTRAINT `kaffeflytting_ibfk_7` FOREIGN KEY (`rabatt_id`) REFERENCES `rabatter` (`id`),
  CONSTRAINT `kaffibrenning_flytting` FOREIGN KEY (`kaffibrenning_id`) REFERENCES `kaffibrenning` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1340 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `kaffeflytting_regnskap_kaffelager_lagertype_innut`
--

DROP TABLE IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_innut`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_innut`*/;
/*!50001 CREATE TABLE `kaffeflytting_regnskap_kaffelager_lagertype_innut` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(33,0),
  `lagertype_id` int(11) unsigned,
  `kaffelager_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_regnskap_kaffelager_lagertype_slutt`
--

DROP TABLE IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_slutt`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_slutt`*/;
/*!50001 CREATE TABLE `kaffeflytting_regnskap_kaffelager_lagertype_slutt` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(33,0),
  `kaffelager_id` int(11) unsigned,
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_regnskap_kaffelager_lagertype_start`
--

DROP TABLE IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_start`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_start`*/;
/*!50001 CREATE TABLE `kaffeflytting_regnskap_kaffelager_lagertype_start` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(33,0),
  `kaffelager_id` int(11) unsigned,
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_regnskap_kaffelager_slutt`
--

DROP TABLE IF EXISTS `kaffeflytting_regnskap_kaffelager_slutt`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_slutt`*/;
/*!50001 CREATE TABLE `kaffeflytting_regnskap_kaffelager_slutt` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(33,0),
  `kaffelager_id` int(11) unsigned,
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_regnskap_kaffelager_start`
--

DROP TABLE IF EXISTS `kaffeflytting_regnskap_kaffelager_start`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_start`*/;
/*!50001 CREATE TABLE `kaffeflytting_regnskap_kaffelager_start` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(33,0),
  `kaffelager_id` int(11) unsigned,
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_regnskap_lagertype_innut`
--

DROP TABLE IF EXISTS `kaffeflytting_regnskap_lagertype_innut`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_lagertype_innut`*/;
/*!50001 CREATE TABLE `kaffeflytting_regnskap_lagertype_innut` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(33,0),
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_regnskap_lagertype_slutt`
--

DROP TABLE IF EXISTS `kaffeflytting_regnskap_lagertype_slutt`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_lagertype_slutt`*/;
/*!50001 CREATE TABLE `kaffeflytting_regnskap_lagertype_slutt` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(33,0),
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_regnskap_lagertype_start`
--

DROP TABLE IF EXISTS `kaffeflytting_regnskap_lagertype_start`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_lagertype_start`*/;
/*!50001 CREATE TABLE `kaffeflytting_regnskap_lagertype_start` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(33,0),
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_sum`
--

DROP TABLE IF EXISTS `kaffeflytting_sum`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_sum`*/;
/*!50001 CREATE TABLE `kaffeflytting_sum` (
  `antall` decimal(34,0),
  `til` int(11) unsigned,
  `tillagertype` int(11) unsigned,
  `type` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflytting_varetelling`
--

DROP TABLE IF EXISTS `kaffeflytting_varetelling`;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_varetelling`*/;
/*!50001 CREATE TABLE `kaffeflytting_varetelling` (
  `id` int(11) unsigned,
  `antall` decimal(34,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffeflyttingvekt`
--

DROP TABLE IF EXISTS `kaffeflyttingvekt`;
/*!50001 DROP VIEW IF EXISTS `kaffeflyttingvekt`*/;
/*!50001 CREATE TABLE `kaffeflyttingvekt` (
  `kaffeflytting_id` int(10) unsigned,
  `kaffesalg_id` int(10) unsigned,
  `gram` bigint(22) unsigned,
  `kilo` decimal(26,4)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffelagerbeholdninger`
--

DROP TABLE IF EXISTS `kaffelagerbeholdninger`;
/*!50001 DROP VIEW IF EXISTS `kaffelagerbeholdninger`*/;
/*!50001 CREATE TABLE `kaffelagerbeholdninger` (
  `antall` decimal(56,0),
  `kaffelager_id` int(11) unsigned,
  `lagertype_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Table structure for table `kaffelagre`
--

DROP TABLE IF EXISTS `kaffelagre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffelagre` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `selger` int(10) unsigned default NULL,
  `beskrivelse` varchar(30) default NULL,
  `lagertype` int(10) unsigned default NULL,
  `konto` int(10) unsigned default NULL,
  PRIMARY KEY  (`nummer`),
  UNIQUE KEY `konto_2` (`konto`),
  KEY `kaffelagre_ibfk_1` (`selger`),
  KEY `lagertype` (`lagertype`),
  CONSTRAINT `kaffelagre_ibfk_1` FOREIGN KEY (`selger`) REFERENCES `selgere` (`nummer`),
  CONSTRAINT `kaffelagre_ibfk_2` FOREIGN KEY (`lagertype`) REFERENCES `lagertyper` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kaffepengekopling`
--

DROP TABLE IF EXISTS `kaffepengekopling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffepengekopling` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `pengeflytting` int(10) unsigned NOT NULL,
  `kaffeflytting` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`nummer`),
  KEY `pengeflytting` (`pengeflytting`),
  KEY `kaffeflytting` (`kaffeflytting`),
  CONSTRAINT `kaffepengekopling_ibfk_1` FOREIGN KEY (`pengeflytting`) REFERENCES `pengeflytting` (`nummer`),
  CONSTRAINT `kaffepengekopling_ibfk_2` FOREIGN KEY (`kaffeflytting`) REFERENCES `kaffeflytting` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kaffepris`
--

DROP TABLE IF EXISTS `kaffepris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffepris` (
  `type` varchar(50) default NULL,
  `beskrivelse` text,
  `pris` int(10) unsigned NOT NULL,
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `gram` int(4) unsigned NOT NULL,
  `haldbar` date default NULL,
  `malt` tinyint(1) default NULL,
  `intern_navn` varchar(200) default NULL,
  `brennings_grad` varchar(100) default NULL,
  `salsnamn` varchar(200) default NULL,
  `kaffibrenning_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`nummer`),
  KEY `kaffetype_brenning` (`kaffibrenning_id`),
  CONSTRAINT `kaffetype_brenning` FOREIGN KEY (`kaffibrenning_id`) REFERENCES `kaffibrenning` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kaffesalg`
--

DROP TABLE IF EXISTS `kaffesalg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffesalg` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `total` int(10) unsigned default NULL,
  `frakt` int(10) unsigned default '0',
  `mva` int(10) unsigned default '0',
  `kontant` tinyint(1) default NULL,
  `sending` tinyint(1) default NULL,
  `dato` datetime default NULL,
  `modified` datetime default NULL,
  `created` datetime default NULL,
  `selger_id` int(10) unsigned NOT NULL,
  `fakturatekst` varchar(2000) default NULL,
  `internmelding` varchar(200) default NULL,
  `kunde_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`nummer`),
  KEY `selger_id` (`selger_id`),
  KEY `kaffesalg_kunde` (`kunde_id`),
  CONSTRAINT `kaffesalg_ibfk_1` FOREIGN KEY (`selger_id`) REFERENCES `selgere` (`nummer`),
  CONSTRAINT `kaffesalg_kunde` FOREIGN KEY (`kunde_id`) REFERENCES `kunder` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=560 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `kaffesalgvekt`
--

DROP TABLE IF EXISTS `kaffesalgvekt`;
/*!50001 DROP VIEW IF EXISTS `kaffesalgvekt`*/;
/*!50001 CREATE TABLE `kaffesalgvekt` (
  `kaffesalg_id` int(10) unsigned,
  `netto_gram` decimal(42,0),
  `netto_kilo` decimal(48,4)
) ENGINE=MyISAM */;

--
-- Table structure for table `kaffibrenning`
--

DROP TABLE IF EXISTS `kaffibrenning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffibrenning` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `brenneri` varchar(200) default NULL,
  `kaffiimport_id` int(10) unsigned default NULL,
  `modified` datetime default NULL,
  `created` datetime default NULL,
  `navn` varchar(200) default NULL,
  `brent` date default NULL,
  `kilo` int(10) unsigned default NULL,
  `budsjett_kilopris` int(10) unsigned default NULL,
  `budsjett_transport` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `kaffiimport_id` (`kaffiimport_id`),
  CONSTRAINT `kaffibrenning_ibfk_1` FOREIGN KEY (`kaffiimport_id`) REFERENCES `kaffiimport` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `kaffibrenning_budsjett`
--

DROP TABLE IF EXISTS `kaffibrenning_budsjett`;
/*!50001 DROP VIEW IF EXISTS `kaffibrenning_budsjett`*/;
/*!50001 CREATE TABLE `kaffibrenning_budsjett` (
  `id` int(10) unsigned,
  `totalpris` bigint(23) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffibrenningbonneverdi`
--

DROP TABLE IF EXISTS `kaffibrenningbonneverdi`;
/*!50001 DROP VIEW IF EXISTS `kaffibrenningbonneverdi`*/;
/*!50001 CREATE TABLE `kaffibrenningbonneverdi` (
  `kaffibrenning_id` int(10) unsigned,
  `bonneverdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffibrenningferdigvekt`
--

DROP TABLE IF EXISTS `kaffibrenningferdigvekt`;
/*!50001 DROP VIEW IF EXISTS `kaffibrenningferdigvekt`*/;
/*!50001 CREATE TABLE `kaffibrenningferdigvekt` (
  `gram` decimal(44,0),
  `kaffibrenning_id` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffibrenningutgiftar`
--

DROP TABLE IF EXISTS `kaffibrenningutgiftar`;
/*!50001 DROP VIEW IF EXISTS `kaffibrenningutgiftar`*/;
/*!50001 CREATE TABLE `kaffibrenningutgiftar` (
  `kaffibrenning_id` int(11) unsigned,
  `utgiftar` decimal(38,4)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffibrenningutgiftarsum`
--

DROP TABLE IF EXISTS `kaffibrenningutgiftarsum`;
/*!50001 DROP VIEW IF EXISTS `kaffibrenningutgiftarsum`*/;
/*!50001 CREATE TABLE `kaffibrenningutgiftarsum` (
  `kaffibrenning_id` int(11) unsigned,
  `utgiftar` decimal(60,4)
) ENGINE=MyISAM */;

--
-- Table structure for table `kaffiimport`
--

DROP TABLE IF EXISTS `kaffiimport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffiimport` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `kooperativ` varchar(200) default NULL,
  `kilo` int(10) unsigned NOT NULL,
  `sekker` int(10) unsigned NOT NULL,
  `kontrakt` int(10) unsigned default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `kommentar` text,
  `navn` varchar(200) default NULL,
  `pris` float unsigned default NULL,
  `kurs` int(10) unsigned default NULL,
  `budsjett_transport` int(10) unsigned default NULL,
  `andelForhand` int(10) unsigned default NULL,
  `forhandBetaling` datetime default NULL,
  `restBetaling` datetime default NULL,
  `valuta` char(3) default 'MXN',
  PRIMARY KEY  (`id`),
  KEY `kontrakt` (`kontrakt`),
  CONSTRAINT `kaffiimport_ibfk_4` FOREIGN KEY (`kontrakt`) REFERENCES `bilag` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `kaffiimport_budsjett`
--

DROP TABLE IF EXISTS `kaffiimport_budsjett`;
/*!50001 DROP VIEW IF EXISTS `kaffiimport_budsjett`*/;
/*!50001 CREATE TABLE `kaffiimport_budsjett` (
  `id` int(10) unsigned,
  `totalprisValuta` double,
  `totalprisNOK` double,
  `kiloprisNOK` double
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffiimport_info`
--

DROP TABLE IF EXISTS `kaffiimport_info`;
/*!50001 DROP VIEW IF EXISTS `kaffiimport_info`*/;
/*!50001 CREATE TABLE `kaffiimport_info` (
  `kaffiimport_id` int(11) unsigned,
  `verdi` decimal(65,8),
  `utgiftar` decimal(60,4)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffiimportutgiftar`
--

DROP TABLE IF EXISTS `kaffiimportutgiftar`;
/*!50001 DROP VIEW IF EXISTS `kaffiimportutgiftar`*/;
/*!50001 CREATE TABLE `kaffiimportutgiftar` (
  `kaffiimport_id` int(11) unsigned,
  `utgiftar` decimal(38,4)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `kaffiimportutgiftarsum`
--

DROP TABLE IF EXISTS `kaffiimportutgiftarsum`;
/*!50001 DROP VIEW IF EXISTS `kaffiimportutgiftarsum`*/;
/*!50001 CREATE TABLE `kaffiimportutgiftarsum` (
  `kaffiimport_id` int(11) unsigned,
  `utgiftar` decimal(60,4)
) ENGINE=MyISAM */;

--
-- Table structure for table `kaffiinnkjop`
--

DROP TABLE IF EXISTS `kaffiinnkjop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffiinnkjop` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `kaffibrenning_id` int(10) unsigned default NULL,
  `kaffitype_id` int(10) unsigned NOT NULL,
  `kommentar` varchar(500) default NULL,
  `dato` datetime default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `pengeflytting_id` int(10) unsigned default NULL,
  `kaffeflytting_id` int(10) unsigned NOT NULL,
  `antall` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `pengeflytting_id` (`pengeflytting_id`),
  KEY `kaffiinnkjop_brenning` (`kaffibrenning_id`),
  KEY `kaffiinnkjop_type` (`kaffitype_id`),
  KEY `kaffiinnkjop_flytting` (`kaffeflytting_id`),
  CONSTRAINT `kaffiinnkjop_brenning` FOREIGN KEY (`kaffibrenning_id`) REFERENCES `kaffibrenning` (`id`),
  CONSTRAINT `kaffiinnkjop_flytting` FOREIGN KEY (`kaffeflytting_id`) REFERENCES `kaffeflytting` (`nummer`),
  CONSTRAINT `kaffiinnkjop_ibfk_3` FOREIGN KEY (`pengeflytting_id`) REFERENCES `pengeflytting` (`nummer`),
  CONSTRAINT `kaffiinnkjop_type` FOREIGN KEY (`kaffitype_id`) REFERENCES `kaffityper` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kaffityper`
--

DROP TABLE IF EXISTS `kaffityper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaffityper` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nettogram` int(10) unsigned NOT NULL,
  `namn` varchar(400) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `kontobalanser`
--

DROP TABLE IF EXISTS `kontobalanser`;
/*!50001 DROP VIEW IF EXISTS `kontobalanser`*/;
/*!50001 CREATE TABLE `kontobalanser` (
  `kroner` decimal(57,0),
  `oere` decimal(61,0),
  `konto_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Table structure for table `kontoer`
--

DROP TABLE IF EXISTS `kontoer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontoer` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `beskrivelse` varchar(100) NOT NULL,
  `type` int(10) unsigned default NULL,
  `ansvarlig` int(10) unsigned NOT NULL,
  `delav` int(10) unsigned default NULL,
  `NS4102` int(5) unsigned default NULL,
  PRIMARY KEY  (`nummer`),
  UNIQUE KEY `beskrivelse` (`beskrivelse`),
  KEY `type` (`type`),
  KEY `ansvarlig` (`ansvarlig`),
  KEY `delav` (`delav`),
  CONSTRAINT `kontoer_ibfk_1` FOREIGN KEY (`type`) REFERENCES `kontotyper` (`nummer`),
  CONSTRAINT `kontoer_ibfk_2` FOREIGN KEY (`ansvarlig`) REFERENCES `selgere` (`nummer`),
  CONSTRAINT `kontoer_ibfk_3` FOREIGN KEY (`delav`) REFERENCES `kontoer` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kontotyper`
--

DROP TABLE IF EXISTS `kontotyper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontotyper` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `beskrivelse` varchar(30) default NULL,
  PRIMARY KEY  (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kontoutskrift`
--

DROP TABLE IF EXISTS `kontoutskrift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontoutskrift` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `filnavn` varchar(100) NOT NULL,
  `filtype` varchar(50) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `innhold` longblob NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `konto_id` int(10) unsigned NOT NULL,
  `mnd` tinyint(3) unsigned NOT NULL,
  `aar` year(4) NOT NULL,
  `inn_kroner` int(10) unsigned NOT NULL,
  `ut_kroner` int(10) unsigned NOT NULL,
  `ut_oere` tinyint(3) unsigned NOT NULL,
  `inn_oere` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `utskrift_konto` (`konto_id`),
  CONSTRAINT `utskrift_konto` FOREIGN KEY (`konto_id`) REFERENCES `kontoer` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `kundebestillinger`
--

DROP TABLE IF EXISTS `kundebestillinger`;
/*!50001 DROP VIEW IF EXISTS `kundebestillinger`*/;
/*!50001 CREATE TABLE `kundebestillinger` (
  `nummer` int(10) unsigned,
  `kunde` int(10) unsigned,
  `navn` varchar(100),
  `epost` varchar(100),
  `slettes` tinyint(1) unsigned,
  `pris` int(10) unsigned,
  `adresse` int(10) unsigned,
  `telefon` char(8),
  `registrert` date,
  `antall` int(10) unsigned,
  `type` varchar(50)
) ENGINE=MyISAM */;

--
-- Table structure for table `kunder`
--

DROP TABLE IF EXISTS `kunder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kunder` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `navn` varchar(100) default NULL,
  `epost` varchar(100) default NULL,
  `telefon` char(8) default NULL,
  `slettes` tinyint(1) unsigned NOT NULL,
  `registrert` date NOT NULL,
  `kontaktperson` varchar(200) default NULL,
  `fakturaadresse` int(10) unsigned default NULL,
  `leveringsadresse` int(10) unsigned NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`nummer`),
  KEY `leveringsadresse` (`leveringsadresse`),
  KEY `fakturaadresse` (`fakturaadresse`),
  CONSTRAINT `kundefakturaadresse` FOREIGN KEY (`fakturaadresse`) REFERENCES `adresser` (`nummer`),
  CONSTRAINT `kundeleveringsadresse` FOREIGN KEY (`leveringsadresse`) REFERENCES `adresser` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `lagerselger`
--

DROP TABLE IF EXISTS `lagerselger`;
/*!50001 DROP VIEW IF EXISTS `lagerselger`*/;
/*!50001 CREATE TABLE `lagerselger` (
  `selger` int(10) unsigned,
  `lagertypenavn` varchar(30),
  `lagertype` int(10) unsigned,
  `selgernavn` varchar(30),
  `lager` int(10) unsigned,
  `lagernavn` varchar(30)
) ENGINE=MyISAM */;

--
-- Table structure for table `lagertyper`
--

DROP TABLE IF EXISTS `lagertyper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lagertyper` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `navn` varchar(30) NOT NULL,
  PRIMARY KEY  (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lagerverdiflyttinger`
--

DROP TABLE IF EXISTS `lagerverdiflyttinger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lagerverdiflyttinger` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fra` int(10) unsigned NOT NULL,
  `til` int(10) unsigned NOT NULL,
  `kroner` int(10) unsigned NOT NULL,
  `oere` int(10) unsigned default NULL,
  `dato` datetime default NULL,
  `kommentar` varchar(300) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `pengeflytting_id` int(10) unsigned default NULL,
  `kaffeflytting_id` int(10) unsigned default NULL,
  `kaffiimport_id` int(10) unsigned default NULL,
  `kaffesalg_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `fra` (`fra`),
  KEY `til` (`til`),
  KEY `pengeflytting_id` (`pengeflytting_id`),
  KEY `kaffeflytting_id` (`kaffeflytting_id`),
  KEY `kaffesalg_id` (`kaffesalg_id`),
  CONSTRAINT `lagerverdiflyttinger_ibfk_1` FOREIGN KEY (`fra`) REFERENCES `lagerverdikontoer` (`id`),
  CONSTRAINT `lagerverdiflyttinger_ibfk_2` FOREIGN KEY (`til`) REFERENCES `lagerverdikontoer` (`id`),
  CONSTRAINT `lagerverdiflyttinger_ibfk_3` FOREIGN KEY (`pengeflytting_id`) REFERENCES `pengeflytting` (`nummer`),
  CONSTRAINT `lagerverdiflyttinger_ibfk_4` FOREIGN KEY (`kaffeflytting_id`) REFERENCES `kaffeflytting` (`nummer`),
  CONSTRAINT `lagerverdiflyttinger_ibfk_5` FOREIGN KEY (`kaffesalg_id`) REFERENCES `kaffesalg` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lagerverdikontoer`
--

DROP TABLE IF EXISTS `lagerverdikontoer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lagerverdikontoer` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `navn` varchar(100) NOT NULL,
  `lagerverditype_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `lagerverditype_id` (`lagerverditype_id`),
  CONSTRAINT `lagerverdikontoer_ibfk_1` FOREIGN KEY (`lagerverditype_id`) REFERENCES `lagerverdityper` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lagerverdityper`
--

DROP TABLE IF EXISTS `lagerverdityper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lagerverdityper` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `navn` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `logg`
--

DROP TABLE IF EXISTS `logg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logg` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `tid` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `innhold` text,
  PRIMARY KEY  (`nummer`)
) ENGINE=MyISAM AUTO_INCREMENT=4866 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pengeflytting`
--

DROP TABLE IF EXISTS `pengeflytting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengeflytting` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `fra` int(10) unsigned NOT NULL,
  `til` int(10) unsigned NOT NULL,
  `kroner` int(10) unsigned NOT NULL,
  `dato` datetime NOT NULL,
  `beskrivelse` varchar(400) default NULL,
  `dekningsFaktura` int(10) unsigned default NULL,
  `oere` int(2) unsigned default '0',
  `kaffesalg_id` int(10) unsigned default NULL,
  `modified` datetime default NULL,
  `created` datetime default NULL,
  `splitt_transaksjon_id` int(10) unsigned default NULL,
  `kaffiimport_id` int(10) unsigned default NULL,
  `kaffibrenning_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`nummer`),
  KEY `fra` (`fra`),
  KEY `til` (`til`),
  KEY `dekningsFaktura` (`dekningsFaktura`),
  KEY `dekningsFaktura_2` (`dekningsFaktura`),
  KEY `kaffesalg_id` (`kaffesalg_id`),
  KEY `splitt_transaksjon_id` (`splitt_transaksjon_id`),
  KEY `kaffibrenning_utgift` (`kaffibrenning_id`),
  KEY `kaffiimport_utgift` (`kaffiimport_id`),
  CONSTRAINT `dekkesOverFaktura` FOREIGN KEY (`dekningsFaktura`) REFERENCES `fakturaer` (`nummer`),
  CONSTRAINT `kaffibrenning_utgift` FOREIGN KEY (`kaffibrenning_id`) REFERENCES `kaffibrenning` (`id`),
  CONSTRAINT `kaffiimport_utgift` FOREIGN KEY (`kaffiimport_id`) REFERENCES `kaffiimport` (`id`),
  CONSTRAINT `pengeflytting_ibfk_1` FOREIGN KEY (`fra`) REFERENCES `kontoer` (`nummer`),
  CONSTRAINT `pengeflytting_ibfk_2` FOREIGN KEY (`til`) REFERENCES `kontoer` (`nummer`),
  CONSTRAINT `pengeflytting_ibfk_3` FOREIGN KEY (`kaffesalg_id`) REFERENCES `kaffesalg` (`nummer`),
  CONSTRAINT `pengeflytting_ibfk_4` FOREIGN KEY (`splitt_transaksjon_id`) REFERENCES `splitt_transaksjoner` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1811 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `pengeflytting_bilag`
--

DROP TABLE IF EXISTS `pengeflytting_bilag`;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_bilag`*/;
/*!50001 CREATE TABLE `pengeflytting_bilag` (
  `pengeflytting_id` int(10) unsigned,
  `bilag_id` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengeflytting_pengetelling`
--

DROP TABLE IF EXISTS `pengeflytting_pengetelling`;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_pengetelling`*/;
/*!50001 CREATE TABLE `pengeflytting_pengetelling` (
  `id` int(11) unsigned,
  `kroner` decimal(34,0),
  `oere` decimal(34,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengeflytting_regnskap_slutt_balanser_sum`
--

DROP TABLE IF EXISTS `pengeflytting_regnskap_slutt_balanser_sum`;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_slutt_balanser_sum`*/;
/*!50001 CREATE TABLE `pengeflytting_regnskap_slutt_balanser_sum` (
  `regnskap_id` int(11) unsigned,
  `konto_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned,
  `kroner` decimal(33,0),
  `oere` decimal(33,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengeflytting_regnskap_slutt_kontotyper_sum`
--

DROP TABLE IF EXISTS `pengeflytting_regnskap_slutt_kontotyper_sum`;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_slutt_kontotyper_sum`*/;
/*!50001 CREATE TABLE `pengeflytting_regnskap_slutt_kontotyper_sum` (
  `regnskap_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned,
  `kroner` decimal(33,0),
  `oere` decimal(33,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengeflytting_regnskap_slutt_start`
--

DROP TABLE IF EXISTS `pengeflytting_regnskap_slutt_start`;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_slutt_start`*/;
/*!50001 CREATE TABLE `pengeflytting_regnskap_slutt_start` (
  `regnskap_id` int(11) unsigned,
  `konto_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned,
  `kroner` decimal(33,0),
  `oere` decimal(33,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengeflytting_regnskap_start_balanser_sum`
--

DROP TABLE IF EXISTS `pengeflytting_regnskap_start_balanser_sum`;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_start_balanser_sum`*/;
/*!50001 CREATE TABLE `pengeflytting_regnskap_start_balanser_sum` (
  `regnskap_id` int(11) unsigned,
  `konto_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned,
  `kroner` decimal(33,0),
  `oere` decimal(33,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengeflytting_regnskap_start_kontotyper_sum`
--

DROP TABLE IF EXISTS `pengeflytting_regnskap_start_kontotyper_sum`;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_start_kontotyper_sum`*/;
/*!50001 CREATE TABLE `pengeflytting_regnskap_start_kontotyper_sum` (
  `regnskap_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned,
  `kroner` decimal(33,0),
  `oere` decimal(33,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengeflytting_sum`
--

DROP TABLE IF EXISTS `pengeflytting_sum`;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_sum`*/;
/*!50001 CREATE TABLE `pengeflytting_sum` (
  `kroner` decimal(34,0),
  `oere` decimal(34,0),
  `til` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengerinn`
--

DROP TABLE IF EXISTS `pengerinn`;
/*!50001 DROP VIEW IF EXISTS `pengerinn`*/;
/*!50001 CREATE TABLE `pengerinn` (
  `kroner` decimal(34,0),
  `oere` decimal(33,0),
  `fra` int(10) unsigned,
  `til` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `pengerut`
--

DROP TABLE IF EXISTS `pengerut`;
/*!50001 DROP VIEW IF EXISTS `pengerut`*/;
/*!50001 CREATE TABLE `pengerut` (
  `kroner` decimal(34,0),
  `oere` decimal(33,0),
  `fra` int(10) unsigned,
  `til` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Table structure for table `pengetellingar`
--

DROP TABLE IF EXISTS `pengetellingar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengetellingar` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `konto_id` int(10) unsigned NOT NULL,
  `kroner` int(11) NOT NULL,
  `oere` int(11) NOT NULL default '0',
  `dato` datetime NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `selger_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `pengetelling_konto` (`konto_id`),
  KEY `pengetelling_selger` (`selger_id`),
  CONSTRAINT `pengetelling_konto` FOREIGN KEY (`konto_id`) REFERENCES `kontoer` (`nummer`),
  CONSTRAINT `pengetelling_selger` FOREIGN KEY (`selger_id`) REFERENCES `selgere` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `pengetellingsjekk`
--

DROP TABLE IF EXISTS `pengetellingsjekk`;
/*!50001 DROP VIEW IF EXISTS `pengetellingsjekk`*/;
/*!50001 CREATE TABLE `pengetellingsjekk` (
  `id` int(11) unsigned,
  `pengetelling_id` int(11) unsigned,
  `kroner` decimal(57,0),
  `oere` decimal(60,0)
) ENGINE=MyISAM */;

--
-- Table structure for table `postsendingar`
--

DROP TABLE IF EXISTS `postsendingar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postsendingar` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `kaffesalg_id` int(10) unsigned NOT NULL,
  `utgift` int(10) unsigned default NULL,
  `sendingsnummer` varchar(200) default NULL,
  `transporter` varchar(200) default NULL,
  `kommentar` varchar(300) default NULL,
  `bruttovekt` int(10) unsigned default NULL,
  `vektgruppe` int(10) unsigned default NULL,
  `prissone` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `kaffesalg_id` (`kaffesalg_id`),
  KEY `utgift` (`utgift`),
  CONSTRAINT `postsendingar_ibfk_1` FOREIGN KEY (`kaffesalg_id`) REFERENCES `kaffesalg` (`nummer`),
  CONSTRAINT `postsendingar_ibfk_3` FOREIGN KEY (`utgift`) REFERENCES `pengeflytting` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `purringer`
--

DROP TABLE IF EXISTS `purringer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purringer` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `faktura` int(10) unsigned default NULL,
  `tekst` varchar(1000) NOT NULL,
  `sendt` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL default '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`nummer`),
  KEY `faktura` (`faktura`),
  CONSTRAINT `purringer_ibfk_1` FOREIGN KEY (`faktura`) REFERENCES `fakturaer` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rabatter`
--

DROP TABLE IF EXISTS `rabatter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rabatter` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `kaffepris_id` int(10) unsigned NOT NULL,
  `pris` int(10) unsigned NOT NULL,
  `beskrivelse` varchar(100) default NULL,
  PRIMARY KEY  (`id`),
  KEY `rabattType` (`kaffepris_id`),
  CONSTRAINT `rabattType` FOREIGN KEY (`kaffepris_id`) REFERENCES `kaffepris` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `registrering`
--

DROP TABLE IF EXISTS `registrering`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrering` (
  `ID` int(11) NOT NULL auto_increment,
  `Type` int(11) NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `registreringType` (`Type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `regnskap`
--

DROP TABLE IF EXISTS `regnskap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regnskap` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `start` datetime default NULL,
  `slutt` datetime default NULL,
  `beskrivelse` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `regnskap_balanser`
--

DROP TABLE IF EXISTS `regnskap_balanser`;
/*!50001 DROP VIEW IF EXISTS `regnskap_balanser`*/;
/*!50001 CREATE TABLE `regnskap_balanser` (
  `kontotype_id` int(11) unsigned,
  `start_kroner` decimal(56,0),
  `start_oere` decimal(60,0),
  `slutt_kroner` decimal(56,0),
  `slutt_oere` decimal(60,0),
  `regnskap_id` int(11) unsigned,
  `konto_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_balanser_kontotype_sum`
--

DROP TABLE IF EXISTS `regnskap_balanser_kontotype_sum`;
/*!50001 DROP VIEW IF EXISTS `regnskap_balanser_kontotype_sum`*/;
/*!50001 CREATE TABLE `regnskap_balanser_kontotype_sum` (
  `konto_id` int(2),
  `start_kroner` decimal(56,0),
  `start_oere` decimal(60,0),
  `slutt_kroner` decimal(56,0),
  `slutt_oere` decimal(60,0),
  `regnskap_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_balanser_sum`
--

DROP TABLE IF EXISTS `regnskap_balanser_sum`;
/*!50001 DROP VIEW IF EXISTS `regnskap_balanser_sum`*/;
/*!50001 CREATE TABLE `regnskap_balanser_sum` (
  `regnskap_id` int(11) unsigned,
  `start_kroner` decimal(61,0),
  `slutt_kroner` decimal(61,0),
  `start_oere` decimal(62,0),
  `slutt_oere` decimal(62,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_balanser_visning`
--

DROP TABLE IF EXISTS `regnskap_balanser_visning`;
/*!50001 DROP VIEW IF EXISTS `regnskap_balanser_visning`*/;
/*!50001 CREATE TABLE `regnskap_balanser_visning` (
  `regnskap_id` int(11) unsigned,
  `konto_id` bigint(20) unsigned,
  `beskrivelse` varchar(100),
  `start_kroner` decimal(61,0),
  `start_oere` decimal(62,0),
  `slutt_kroner` decimal(61,0),
  `slutt_oere` decimal(62,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_gronne_bonner_verdi_slutt`
--

DROP TABLE IF EXISTS `regnskap_gronne_bonner_verdi_slutt`;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_slutt`*/;
/*!50001 CREATE TABLE `regnskap_gronne_bonner_verdi_slutt` (
  `regnskap_id` int(11) unsigned,
  `kaffiimport_id` int(11) unsigned,
  `verdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_gronne_bonner_verdi_slutt_sum`
--

DROP TABLE IF EXISTS `regnskap_gronne_bonner_verdi_slutt_sum`;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_slutt_sum`*/;
/*!50001 CREATE TABLE `regnskap_gronne_bonner_verdi_slutt_sum` (
  `regnskap_id` int(11) unsigned,
  `kaffiimport_id` int(11) unsigned,
  `verdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_gronne_bonner_verdi_slutt_total`
--

DROP TABLE IF EXISTS `regnskap_gronne_bonner_verdi_slutt_total`;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_slutt_total`*/;
/*!50001 CREATE TABLE `regnskap_gronne_bonner_verdi_slutt_total` (
  `regnskap_id` int(11) unsigned,
  `verdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_gronne_bonner_verdi_start`
--

DROP TABLE IF EXISTS `regnskap_gronne_bonner_verdi_start`;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_start`*/;
/*!50001 CREATE TABLE `regnskap_gronne_bonner_verdi_start` (
  `regnskap_id` int(11) unsigned,
  `kaffiimport_id` int(11) unsigned,
  `verdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_gronne_bonner_verdi_start_sum`
--

DROP TABLE IF EXISTS `regnskap_gronne_bonner_verdi_start_sum`;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_start_sum`*/;
/*!50001 CREATE TABLE `regnskap_gronne_bonner_verdi_start_sum` (
  `regnskap_id` int(11) unsigned,
  `kaffiimport_id` int(11) unsigned,
  `verdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_gronne_bonner_verdi_start_total`
--

DROP TABLE IF EXISTS `regnskap_gronne_bonner_verdi_start_total`;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_start_total`*/;
/*!50001 CREATE TABLE `regnskap_gronne_bonner_verdi_start_total` (
  `regnskap_id` int(11) unsigned,
  `verdi` decimal(65,8)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_inntekter`
--

DROP TABLE IF EXISTS `regnskap_inntekter`;
/*!50001 DROP VIEW IF EXISTS `regnskap_inntekter`*/;
/*!50001 CREATE TABLE `regnskap_inntekter` (
  `kroner` decimal(57,0),
  `oere` decimal(60,0),
  `regnskap_id` int(11) unsigned,
  `konto_id` bigint(20) unsigned,
  `beskrivelse` varchar(100)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_inntekter_kaffesalg_sum`
--

DROP TABLE IF EXISTS `regnskap_inntekter_kaffesalg_sum`;
/*!50001 DROP VIEW IF EXISTS `regnskap_inntekter_kaffesalg_sum`*/;
/*!50001 CREATE TABLE `regnskap_inntekter_kaffesalg_sum` (
  `regnskap_id` int(11) unsigned,
  `kroner` decimal(56,0),
  `oere` decimal(60,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_innut`
--

DROP TABLE IF EXISTS `regnskap_innut`;
/*!50001 DROP VIEW IF EXISTS `regnskap_innut`*/;
/*!50001 CREATE TABLE `regnskap_innut` (
  `konto_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned,
  `regnskap_id` int(11) unsigned,
  `kroner` decimal(56,0),
  `oere` decimal(60,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_innut_sum`
--

DROP TABLE IF EXISTS `regnskap_innut_sum`;
/*!50001 DROP VIEW IF EXISTS `regnskap_innut_sum`*/;
/*!50001 CREATE TABLE `regnskap_innut_sum` (
  `kontotype_id` int(11) unsigned,
  `regnskap_id` int(11) unsigned,
  `kroner` decimal(56,0),
  `oere` decimal(60,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_kaffelager_lagertype_innut`
--

DROP TABLE IF EXISTS `regnskap_kaffelager_lagertype_innut`;
/*!50001 DROP VIEW IF EXISTS `regnskap_kaffelager_lagertype_innut`*/;
/*!50001 CREATE TABLE `regnskap_kaffelager_lagertype_innut` (
  `regnskap_id` int(11) unsigned,
  `antall` decimal(55,0),
  `kaffelager_id` int(11) unsigned,
  `lagertype_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_kaffelager_lagertype_slutt`
--

DROP TABLE IF EXISTS `regnskap_kaffelager_lagertype_slutt`;
/*!50001 DROP VIEW IF EXISTS `regnskap_kaffelager_lagertype_slutt`*/;
/*!50001 CREATE TABLE `regnskap_kaffelager_lagertype_slutt` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(55,0),
  `lagertype_id` int(11) unsigned,
  `kaffelager_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_kaffelager_lagertype_start`
--

DROP TABLE IF EXISTS `regnskap_kaffelager_lagertype_start`;
/*!50001 DROP VIEW IF EXISTS `regnskap_kaffelager_lagertype_start`*/;
/*!50001 CREATE TABLE `regnskap_kaffelager_lagertype_start` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(55,0),
  `lagertype_id` int(11) unsigned,
  `kaffelager_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_kaffelager_lagertype_start_slutt`
--

DROP TABLE IF EXISTS `regnskap_kaffelager_lagertype_start_slutt`;
/*!50001 DROP VIEW IF EXISTS `regnskap_kaffelager_lagertype_start_slutt`*/;
/*!50001 CREATE TABLE `regnskap_kaffelager_lagertype_start_slutt` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `lagertype_id` int(11) unsigned,
  `kaffelager_id` int(11) unsigned,
  `start` decimal(55,0),
  `slutt` decimal(55,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_lagertype_innut`
--

DROP TABLE IF EXISTS `regnskap_lagertype_innut`;
/*!50001 DROP VIEW IF EXISTS `regnskap_lagertype_innut`*/;
/*!50001 CREATE TABLE `regnskap_lagertype_innut` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(55,0),
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_lagertype_slutt`
--

DROP TABLE IF EXISTS `regnskap_lagertype_slutt`;
/*!50001 DROP VIEW IF EXISTS `regnskap_lagertype_slutt`*/;
/*!50001 CREATE TABLE `regnskap_lagertype_slutt` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(55,0),
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_lagertype_start`
--

DROP TABLE IF EXISTS `regnskap_lagertype_start`;
/*!50001 DROP VIEW IF EXISTS `regnskap_lagertype_start`*/;
/*!50001 CREATE TABLE `regnskap_lagertype_start` (
  `regnskap_id` int(11) unsigned,
  `kaffepris_id` int(11) unsigned,
  `antall` decimal(55,0),
  `lagertype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_slutt_balanser`
--

DROP TABLE IF EXISTS `regnskap_slutt_balanser`;
/*!50001 DROP VIEW IF EXISTS `regnskap_slutt_balanser`*/;
/*!50001 CREATE TABLE `regnskap_slutt_balanser` (
  `kontotype_id` int(11) unsigned,
  `kroner` decimal(56,0),
  `oere` decimal(60,0),
  `regnskap_id` int(11) unsigned,
  `konto_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_slutt_kontotyper`
--

DROP TABLE IF EXISTS `regnskap_slutt_kontotyper`;
/*!50001 DROP VIEW IF EXISTS `regnskap_slutt_kontotyper`*/;
/*!50001 CREATE TABLE `regnskap_slutt_kontotyper` (
  `regnskap_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned,
  `kroner` decimal(56,0),
  `oere` decimal(60,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_start_balanser`
--

DROP TABLE IF EXISTS `regnskap_start_balanser`;
/*!50001 DROP VIEW IF EXISTS `regnskap_start_balanser`*/;
/*!50001 CREATE TABLE `regnskap_start_balanser` (
  `kroner` decimal(56,0),
  `oere` decimal(60,0),
  `regnskap_id` int(11) unsigned,
  `konto_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_start_kontotyper`
--

DROP TABLE IF EXISTS `regnskap_start_kontotyper`;
/*!50001 DROP VIEW IF EXISTS `regnskap_start_kontotyper`*/;
/*!50001 CREATE TABLE `regnskap_start_kontotyper` (
  `regnskap_id` int(11) unsigned,
  `kontotype_id` int(11) unsigned,
  `kroner` decimal(56,0),
  `oere` decimal(60,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `regnskap_utgifter`
--

DROP TABLE IF EXISTS `regnskap_utgifter`;
/*!50001 DROP VIEW IF EXISTS `regnskap_utgifter`*/;
/*!50001 CREATE TABLE `regnskap_utgifter` (
  `kroner` decimal(56,0),
  `oere` decimal(60,0),
  `regnskap_id` int(11) unsigned,
  `konto_id` bigint(20) unsigned,
  `beskrivelse` varchar(100)
) ENGINE=MyISAM */;

--
-- Table structure for table `roller`
--

DROP TABLE IF EXISTS `roller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roller` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `navn` varchar(20) default NULL,
  PRIMARY KEY  (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `sal_per_12mnd`
--

DROP TABLE IF EXISTS `sal_per_12mnd`;
/*!50001 DROP VIEW IF EXISTS `sal_per_12mnd`*/;
/*!50001 CREATE TABLE `sal_per_12mnd` (
  `start` varbinary(29),
  `slutt` varchar(10),
  `solgt` decimal(33,0)
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `sal_per_maanad`
--

DROP TABLE IF EXISTS `sal_per_maanad`;
/*!50001 DROP VIEW IF EXISTS `sal_per_maanad`*/;
/*!50001 CREATE TABLE `sal_per_maanad` (
  `year` int(4),
  `month` int(2),
  `solgt` decimal(33,0),
  `kaffepris_id` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `selgerbalanser`
--

DROP TABLE IF EXISTS `selgerbalanser`;
/*!50001 DROP VIEW IF EXISTS `selgerbalanser`*/;
/*!50001 CREATE TABLE `selgerbalanser` (
  `konto_id` int(10) unsigned,
  `kroner` decimal(57,0),
  `oere` decimal(61,0),
  `selger_id` int(10) unsigned,
  `kaffelager_id` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Table structure for table `selgere`
--

DROP TABLE IF EXISTS `selgere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selgere` (
  `navn` varchar(30) character set latin1 NOT NULL,
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `epost` varchar(40) character set latin1 default NULL,
  `telefon` varchar(20) character set latin1 default NULL,
  `passord` varchar(40) character set latin1 NOT NULL,
  `rolle_id` int(10) unsigned NOT NULL default '5',
  PRIMARY KEY  (`nummer`),
  UNIQUE KEY `navn` (`navn`),
  KEY `rolle_id` (`rolle_id`),
  CONSTRAINT `selger_rolle` FOREIGN KEY (`rolle_id`) REFERENCES `roller` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `selgerlager`
--

DROP TABLE IF EXISTS `selgerlager`;
/*!50001 DROP VIEW IF EXISTS `selgerlager`*/;
/*!50001 CREATE TABLE `selgerlager` (
  `selger` int(10) unsigned,
  `lager` int(10) unsigned,
  `navn` varchar(30),
  `beskrivelse` varchar(30)
) ENGINE=MyISAM */;

--
-- Table structure for table `selgerroller`
--

DROP TABLE IF EXISTS `selgerroller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selgerroller` (
  `selger` int(10) unsigned NOT NULL default '0',
  `rolle` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`selger`,`rolle`),
  KEY `rolle` (`rolle`),
  CONSTRAINT `selgerroller_ibfk_1` FOREIGN KEY (`selger`) REFERENCES `selgere` (`nummer`),
  CONSTRAINT `selgerroller_ibfk_2` FOREIGN KEY (`rolle`) REFERENCES `roller` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sessionValues`
--

DROP TABLE IF EXISTS `sessionValues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessionValues` (
  `nummer` int(10) unsigned NOT NULL auto_increment,
  `selger` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`nummer`),
  KEY `sessionSelgerId` (`selger`),
  CONSTRAINT `sessionSelgerId` FOREIGN KEY (`selger`) REFERENCES `selgere` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `solgt`
--

DROP TABLE IF EXISTS `solgt`;
/*!50001 DROP VIEW IF EXISTS `solgt`*/;
/*!50001 CREATE TABLE `solgt` (
  `lagertypenavn` varchar(30),
  `antall` decimal(33,0),
  `sum` decimal(44,0),
  `lagernummer` int(10) unsigned,
  `typenr` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Table structure for table `splitt_transaksjoner`
--

DROP TABLE IF EXISTS `splitt_transaksjoner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `splitt_transaksjoner` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `dato` datetime default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `selger_id` int(10) unsigned NOT NULL,
  `kroner` int(10) unsigned default NULL,
  `oere` int(10) unsigned default NULL,
  `kommentar` varchar(200) default NULL,
  PRIMARY KEY  (`id`),
  KEY `selger_id` (`selger_id`),
  CONSTRAINT `splitt_transaksjoner_ibfk_1` FOREIGN KEY (`selger_id`) REFERENCES `selgere` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `sumbestilt`
--

DROP TABLE IF EXISTS `sumbestilt`;
/*!50001 DROP VIEW IF EXISTS `sumbestilt`*/;
/*!50001 CREATE TABLE `sumbestilt` (
  `bestilt` decimal(33,0),
  `nummer` int(10) unsigned,
  `type` varchar(50),
  `beskrivelse` text,
  `pris` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `sumbetalt`
--

DROP TABLE IF EXISTS `sumbetalt`;
/*!50001 DROP VIEW IF EXISTS `sumbetalt`*/;
/*!50001 CREATE TABLE `sumbetalt` (
  `kroner` decimal(34,0),
  `oere` decimal(33,0),
  `fra` int(10) unsigned,
  `flyttebesk` varchar(400),
  `tilkontobesk` varchar(100),
  `tilkontonr` int(10) unsigned,
  `dato` datetime
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `suminn`
--

DROP TABLE IF EXISTS `suminn`;
/*!50001 DROP VIEW IF EXISTS `suminn`*/;
/*!50001 CREATE TABLE `suminn` (
  `antall` decimal(33,0),
  `sum` decimal(44,0),
  `til` int(10) unsigned,
  `type` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Temporary table structure for view `sumut`
--

DROP TABLE IF EXISTS `sumut`;
/*!50001 DROP VIEW IF EXISTS `sumut`*/;
/*!50001 CREATE TABLE `sumut` (
  `antall` decimal(33,0),
  `sum` decimal(44,0),
  `fra` int(10) unsigned,
  `type` int(10) unsigned
) ENGINE=MyISAM */;

--
-- Table structure for table `varetelling`
--

DROP TABLE IF EXISTS `varetelling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `varetelling` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `kaffelager_id` int(10) unsigned NOT NULL,
  `kaffepris_id` int(10) unsigned NOT NULL,
  `antall` int(10) unsigned NOT NULL,
  `dato` datetime NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `selger_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `kaffelager_id` (`kaffelager_id`),
  KEY `kaffepris_id` (`kaffepris_id`),
  KEY `selger_id` (`selger_id`),
  CONSTRAINT `varetelling_ibfk_1` FOREIGN KEY (`kaffelager_id`) REFERENCES `kaffelagre` (`nummer`),
  CONSTRAINT `varetelling_ibfk_2` FOREIGN KEY (`kaffepris_id`) REFERENCES `kaffepris` (`nummer`),
  CONSTRAINT `varetelling_ibfk_3` FOREIGN KEY (`selger_id`) REFERENCES `selgere` (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `varetellingsjekk`
--

DROP TABLE IF EXISTS `varetellingsjekk`;
/*!50001 DROP VIEW IF EXISTS `varetellingsjekk`*/;
/*!50001 CREATE TABLE `varetellingsjekk` (
  `varetelling_id` int(11) unsigned,
  `id` int(11) unsigned,
  `antall` decimal(56,0)
) ENGINE=MyISAM */;

--
-- Final view structure for view `alle_kaffesalg_penger_per_dag`
--

/*!50001 DROP TABLE `alle_kaffesalg_penger_per_dag`*/;
/*!50001 DROP VIEW IF EXISTS `alle_kaffesalg_penger_per_dag`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `alle_kaffesalg_penger_per_dag` AS select sum(`pengeflytting`.`kroner`) AS `sum(pengeflytting.kroner)`,cast(`pengeflytting`.`dato` as date) AS `date(pengeflytting.dato)` from (`pengeflytting` left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) where (`kontoer`.`type` = 6) group by cast(`pengeflytting`.`dato` as date) */;

--
-- Final view structure for view `alle_sals_datoar`
--

/*!50001 DROP TABLE `alle_sals_datoar`*/;
/*!50001 DROP VIEW IF EXISTS `alle_sals_datoar`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `alle_sals_datoar` AS select date_format(`pengeflytting`.`dato`,_utf8'%Y-%m-%d') AS `dato`,year(`pengeflytting`.`dato`) AS `year`,month(`pengeflytting`.`dato`) AS `month`,dayofmonth(`pengeflytting`.`dato`) AS `day` from (`pengeflytting` join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) where (`kontoer`.`type` = 6) group by year(`pengeflytting`.`dato`),month(`pengeflytting`.`dato`),dayofmonth(`pengeflytting`.`dato`) order by year(`pengeflytting`.`dato`),month(`pengeflytting`.`dato`),dayofmonth(`pengeflytting`.`dato`) */;

--
-- Final view structure for view `beholdning`
--

/*!50001 DROP TABLE `beholdning`*/;
/*!50001 DROP VIEW IF EXISTS `beholdning`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `beholdning` AS select `suminn`.`antall` AS `inn`,`sumut`.`antall` AS `ut`,`sumut`.`type` AS `type`,`sumut`.`fra` AS `lager` from (`sumut` left join `suminn` on(((`sumut`.`fra` = `suminn`.`til`) and (`sumut`.`type` = `suminn`.`type`)))) */;

--
-- Final view structure for view `faktura_innbetalt`
--

/*!50001 DROP TABLE `faktura_innbetalt`*/;
/*!50001 DROP VIEW IF EXISTS `faktura_innbetalt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `faktura_innbetalt` AS select `fakturaer`.`nummer` AS `faktura_id`,sum(`pengeflytting`.`kroner`) AS `kroner`,sum(`pengeflytting`.`oere`) AS `oere` from (`fakturaer` join `pengeflytting` on((`pengeflytting`.`dekningsFaktura` = `fakturaer`.`nummer`))) group by `fakturaer`.`nummer` */;

--
-- Final view structure for view `faktura_ubetalt`
--

/*!50001 DROP TABLE `faktura_ubetalt`*/;
/*!50001 DROP VIEW IF EXISTS `faktura_ubetalt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `faktura_ubetalt` AS select `fakturaer`.`nummer` AS `faktura_id`,if(isnull(sum(`pengeflytting`.`kroner`)),`fakturaer`.`totalpris`,(sum(`pengeflytting`.`kroner`) - `fakturaer`.`totalpris`)) AS `mangler` from (`fakturaer` left join `pengeflytting` on((`pengeflytting`.`dekningsFaktura` = `fakturaer`.`nummer`))) group by `fakturaer`.`nummer` */;

--
-- Final view structure for view `gronne_bonner_verdi`
--

/*!50001 DROP TABLE `gronne_bonner_verdi`*/;
/*!50001 DROP VIEW IF EXISTS `gronne_bonner_verdi`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `gronne_bonner_verdi` AS (select `kaffiimport`.`id` AS `kaffiimport_id`,(sum(`pengeflytting`.`kroner`) + (sum(`pengeflytting`.`oere`) / 100)) AS `verdi` from ((`kaffiimport` join `pengeflytting` on((`pengeflytting`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) where (`kontoer`.`type` = 1) group by `kaffiimport`.`id`) union (select `kaffiimport`.`id` AS `kaffiimport_id`,-((sum(`pengeflytting`.`kroner`) + (sum(`pengeflytting`.`oere`) / 100))) AS `verdi` from ((`kaffiimport` join `pengeflytting` on((`pengeflytting`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) where (`kontoer`.`type` = 1) group by `kaffiimport`.`id`) union (select `kaffibrenning`.`kaffiimport_id` AS `kaffiimport_id`,-(sum(`kaffibrenningbonneverdi`.`bonneverdi`)) AS `bonneverdi` from (`kaffibrenning` left join `kaffibrenningbonneverdi` on((`kaffibrenning`.`id` = `kaffibrenningbonneverdi`.`kaffibrenning_id`))) group by `kaffibrenning`.`kaffiimport_id`) */;

--
-- Final view structure for view `gronne_bonner_verdi_sum`
--

/*!50001 DROP TABLE `gronne_bonner_verdi_sum`*/;
/*!50001 DROP VIEW IF EXISTS `gronne_bonner_verdi_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `gronne_bonner_verdi_sum` AS select `gronne_bonner_verdi`.`kaffiimport_id` AS `kaffiimport_id`,sum(`gronne_bonner_verdi`.`verdi`) AS `verdi` from `gronne_bonner_verdi` group by `gronne_bonner_verdi`.`kaffiimport_id` */;

--
-- Final view structure for view `gronne_bonner_verdi_total`
--

/*!50001 DROP TABLE `gronne_bonner_verdi_total`*/;
/*!50001 DROP VIEW IF EXISTS `gronne_bonner_verdi_total`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `gronne_bonner_verdi_total` AS select sum(`gronne_bonner_verdi`.`verdi`) AS `sum(verdi)` from `gronne_bonner_verdi` */;

--
-- Final view structure for view `kaffeflytting_regnskap_kaffelager_lagertype_innut`
--

/*!50001 DROP TABLE `kaffeflytting_regnskap_kaffelager_lagertype_innut`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_innut`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_regnskap_kaffelager_lagertype_innut` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id`,`kaffelagre`.`nummer` AS `kaffelager_id` from ((((`regnskap` join `lagertyper`) join `kaffepris`) join `kaffelagre`) left join `kaffeflytting` on(((`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` > `regnskap`.`start`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`) and (`kaffeflytting`.`fra` = `kaffelagre`.`nummer`)))) group by `regnskap`.`id`,`lagertyper`.`nummer`,`kaffepris`.`nummer`,`kaffelagre`.`nummer`) union (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id`,`kaffelagre`.`nummer` AS `kaffelager_id` from ((((`regnskap` join `lagertyper`) join `kaffepris`) join `kaffelagre`) left join `kaffeflytting` on(((`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` > `regnskap`.`start`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`) and (`kaffeflytting`.`fra` = `kaffelagre`.`nummer`)))) group by `lagertyper`.`nummer`,`regnskap`.`id`,`kaffepris`.`nummer`,`kaffelagre`.`nummer`) */;

--
-- Final view structure for view `kaffeflytting_regnskap_kaffelager_lagertype_slutt`
--

/*!50001 DROP TABLE `kaffeflytting_regnskap_kaffelager_lagertype_slutt`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_slutt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_regnskap_kaffelager_lagertype_slutt` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`fra` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepris`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`til` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) */;

--
-- Final view structure for view `kaffeflytting_regnskap_kaffelager_lagertype_start`
--

/*!50001 DROP TABLE `kaffeflytting_regnskap_kaffelager_lagertype_start`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_lagertype_start`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_regnskap_kaffelager_lagertype_start` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`fra` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepris`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`til` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) */;

--
-- Final view structure for view `kaffeflytting_regnskap_kaffelager_slutt`
--

/*!50001 DROP TABLE `kaffeflytting_regnskap_kaffelager_slutt`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_slutt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_regnskap_kaffelager_slutt` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`fra` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepris`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`til` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) */;

--
-- Final view structure for view `kaffeflytting_regnskap_kaffelager_start`
--

/*!50001 DROP TABLE `kaffeflytting_regnskap_kaffelager_start`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_kaffelager_start`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_regnskap_kaffelager_start` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`fra` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepris`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`til` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) */;

--
-- Final view structure for view `kaffeflytting_regnskap_lagertype_innut`
--

/*!50001 DROP TABLE `kaffeflytting_regnskap_lagertype_innut`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_lagertype_innut`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_regnskap_lagertype_innut` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `lagertyper`) join `kaffepris`) left join `kaffeflytting` on(((`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` > `regnskap`.`start`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`)))) group by `regnskap`.`id`,`lagertyper`.`nummer`,`kaffepris`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepris`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`lagertyper`.`nummer` AS `nummer` from (((`regnskap` join `lagertyper`) join `kaffepris`) left join `kaffeflytting` on(((`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` > `regnskap`.`start`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`)))) group by `regnskap`.`id`,`lagertyper`.`nummer`,`kaffepris`.`nummer`) */;

--
-- Final view structure for view `kaffeflytting_regnskap_lagertype_slutt`
--

/*!50001 DROP TABLE `kaffeflytting_regnskap_lagertype_slutt`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_lagertype_slutt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_regnskap_lagertype_slutt` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepris`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`)))) group by `regnskap`.`id`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) */;

--
-- Final view structure for view `kaffeflytting_regnskap_lagertype_start`
--

/*!50001 DROP TABLE `kaffeflytting_regnskap_lagertype_start`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_regnskap_lagertype_start`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_regnskap_lagertype_start` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepris`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepris`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `kaffepris`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepris`.`nummer`)))) group by `regnskap`.`id`,`kaffepris`.`nummer`,`lagertyper`.`nummer`) */;

--
-- Final view structure for view `kaffeflytting_sum`
--

/*!50001 DROP TABLE `kaffeflytting_sum`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_sum` AS (select sum(`kaffeflytting`.`antall`) AS `antall`,`kaffeflytting`.`til` AS `til`,`kaffeflytting`.`tillagertype` AS `tillagertype`,`kaffeflytting`.`type` AS `type` from `kaffeflytting` group by `kaffeflytting`.`til`,`kaffeflytting`.`tillagertype`,`kaffeflytting`.`type`) union (select -(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffeflytting`.`fra` AS `fra`,`kaffeflytting`.`fralagertype` AS `fralagertype`,`kaffeflytting`.`type` AS `type` from `kaffeflytting` group by `kaffeflytting`.`fra`,`kaffeflytting`.`fralagertype`,`kaffeflytting`.`type`) */;

--
-- Final view structure for view `kaffeflytting_varetelling`
--

/*!50001 DROP TABLE `kaffeflytting_varetelling`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflytting_varetelling`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflytting_varetelling` AS (select `varetelling`.`id` AS `id`,sum(`kaffeflytting`.`antall`) AS `antall` from (`kaffeflytting` join `varetelling` on(((`kaffeflytting`.`til` = `varetelling`.`kaffelager_id`) and (`kaffeflytting`.`dato` <= `varetelling`.`dato`) and (`kaffeflytting`.`type` = `varetelling`.`kaffepris_id`) and (`kaffeflytting`.`tillagertype` = 3)))) group by `varetelling`.`id`,`kaffeflytting`.`type`,`kaffeflytting`.`til`) union (select `varetelling`.`id` AS `id`,-(sum(`kaffeflytting`.`antall`)) AS `antall` from (`kaffeflytting` join `varetelling` on(((`kaffeflytting`.`fra` = `varetelling`.`kaffelager_id`) and (`kaffeflytting`.`dato` <= `varetelling`.`dato`) and (`kaffeflytting`.`type` = `varetelling`.`kaffepris_id`) and (`kaffeflytting`.`fralagertype` = 3)))) group by `varetelling`.`id`,`kaffeflytting`.`type`,`kaffeflytting`.`fra`) */;

--
-- Final view structure for view `kaffeflyttingvekt`
--

/*!50001 DROP TABLE `kaffeflyttingvekt`*/;
/*!50001 DROP VIEW IF EXISTS `kaffeflyttingvekt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffeflyttingvekt` AS select `kaffeflytting`.`nummer` AS `kaffeflytting_id`,`kaffeflytting`.`kaffesalg_id` AS `kaffesalg_id`,(`kaffeflytting`.`antall` * `kaffepris`.`gram`) AS `gram`,((`kaffeflytting`.`antall` * `kaffepris`.`gram`) / 1000) AS `kilo` from (`kaffeflytting` left join `kaffepris` on((`kaffeflytting`.`type` = `kaffepris`.`nummer`))) */;

--
-- Final view structure for view `kaffelagerbeholdninger`
--

/*!50001 DROP TABLE `kaffelagerbeholdninger`*/;
/*!50001 DROP VIEW IF EXISTS `kaffelagerbeholdninger`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffelagerbeholdninger` AS select sum(`kaffeflytting_sum`.`antall`) AS `antall`,`kaffeflytting_sum`.`til` AS `kaffelager_id`,`kaffeflytting_sum`.`tillagertype` AS `lagertype_id`,`kaffeflytting_sum`.`type` AS `kaffepris_id` from `kaffeflytting_sum` group by `kaffeflytting_sum`.`til`,`kaffeflytting_sum`.`tillagertype`,`kaffeflytting_sum`.`type` order by `kaffeflytting_sum`.`type` desc */;

--
-- Final view structure for view `kaffesalgvekt`
--

/*!50001 DROP TABLE `kaffesalgvekt`*/;
/*!50001 DROP VIEW IF EXISTS `kaffesalgvekt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffesalgvekt` AS select `kaffeflyttingvekt`.`kaffesalg_id` AS `kaffesalg_id`,sum(`kaffeflyttingvekt`.`gram`) AS `netto_gram`,sum(`kaffeflyttingvekt`.`kilo`) AS `netto_kilo` from (`kaffeflyttingvekt` left join `kaffesalg` on((`kaffeflyttingvekt`.`kaffesalg_id` = `kaffesalg`.`nummer`))) group by `kaffeflyttingvekt`.`kaffesalg_id` */;

--
-- Final view structure for view `kaffibrenning_budsjett`
--

/*!50001 DROP TABLE `kaffibrenning_budsjett`*/;
/*!50001 DROP VIEW IF EXISTS `kaffibrenning_budsjett`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffibrenning_budsjett` AS select `kaffibrenning`.`id` AS `id`,((`kaffibrenning`.`kilo` * `kaffibrenning`.`budsjett_kilopris`) + `kaffibrenning`.`budsjett_transport`) AS `totalpris` from `kaffibrenning` */;

--
-- Final view structure for view `kaffibrenningbonneverdi`
--

/*!50001 DROP TABLE `kaffibrenningbonneverdi`*/;
/*!50001 DROP VIEW IF EXISTS `kaffibrenningbonneverdi`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffibrenningbonneverdi` AS select `kaffibrenning`.`id` AS `kaffibrenning_id`,((`kaffiimportutgiftarsum`.`utgiftar` * `kaffibrenning`.`kilo`) / `kaffiimport`.`kilo`) AS `bonneverdi` from ((`kaffibrenning` left join `kaffiimport` on((`kaffibrenning`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kaffiimportutgiftarsum` on((`kaffiimportutgiftarsum`.`kaffiimport_id` = `kaffiimport`.`id`))) */;

--
-- Final view structure for view `kaffibrenningferdigvekt`
--

/*!50001 DROP TABLE `kaffibrenningferdigvekt`*/;
/*!50001 DROP VIEW IF EXISTS `kaffibrenningferdigvekt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffibrenningferdigvekt` AS select sum((`kaffeflytting`.`antall` * `kaffepris`.`gram`)) AS `gram`,`kaffibrenning`.`id` AS `kaffibrenning_id` from ((`kaffibrenning` left join `kaffeflytting` on((`kaffibrenning`.`id` = `kaffeflytting`.`kaffibrenning_id`))) left join `kaffepris` on((`kaffeflytting`.`type` = `kaffepris`.`nummer`))) group by `kaffibrenning`.`id` */;

--
-- Final view structure for view `kaffibrenningutgiftar`
--

/*!50001 DROP TABLE `kaffibrenningutgiftar`*/;
/*!50001 DROP VIEW IF EXISTS `kaffibrenningutgiftar`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffibrenningutgiftar` AS (select `kaffibrenning`.`id` AS `kaffibrenning_id`,(sum(`pengeflytting`.`kroner`) + (sum(`pengeflytting`.`oere`) / 100)) AS `utgiftar` from ((`kaffibrenning` join `pengeflytting` on((`pengeflytting`.`kaffibrenning_id` = `kaffibrenning`.`id`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) where (`kontoer`.`type` = 1) group by `kaffibrenning`.`id`) union (select `kaffibrenning`.`id` AS `kaffibrenning_id`,(-(sum(`pengeflytting`.`kroner`)) - (sum(`pengeflytting`.`oere`) / 100)) AS `utgiftar` from ((`kaffibrenning` join `pengeflytting` on((`pengeflytting`.`kaffibrenning_id` = `kaffibrenning`.`id`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) where (`kontoer`.`type` = 1) group by `kaffibrenning`.`id`) */;

--
-- Final view structure for view `kaffibrenningutgiftarsum`
--

/*!50001 DROP TABLE `kaffibrenningutgiftarsum`*/;
/*!50001 DROP VIEW IF EXISTS `kaffibrenningutgiftarsum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffibrenningutgiftarsum` AS select `kaffibrenningutgiftar`.`kaffibrenning_id` AS `kaffibrenning_id`,sum(`kaffibrenningutgiftar`.`utgiftar`) AS `utgiftar` from `kaffibrenningutgiftar` group by `kaffibrenningutgiftar`.`kaffibrenning_id` */;

--
-- Final view structure for view `kaffiimport_budsjett`
--

/*!50001 DROP TABLE `kaffiimport_budsjett`*/;
/*!50001 DROP VIEW IF EXISTS `kaffiimport_budsjett`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffiimport_budsjett` AS select `kaffiimport`.`id` AS `id`,(`kaffiimport`.`kilo` * `kaffiimport`.`pris`) AS `totalprisValuta`,((((`kaffiimport`.`kilo` * `kaffiimport`.`pris`) * `kaffiimport`.`kurs`) / 100) + `kaffiimport`.`budsjett_transport`) AS `totalprisNOK`,(((`kaffiimport`.`pris` * `kaffiimport`.`kurs`) / 100) + (`kaffiimport`.`budsjett_transport` / `kaffiimport`.`kilo`)) AS `kiloprisNOK` from `kaffiimport` */;

--
-- Final view structure for view `kaffiimport_info`
--

/*!50001 DROP TABLE `kaffiimport_info`*/;
/*!50001 DROP VIEW IF EXISTS `kaffiimport_info`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffiimport_info` AS select `gronne_bonner_verdi_sum`.`kaffiimport_id` AS `kaffiimport_id`,`gronne_bonner_verdi_sum`.`verdi` AS `verdi`,`kaffiimportutgiftarsum`.`utgiftar` AS `utgiftar` from (`gronne_bonner_verdi_sum` left join `kaffiimportutgiftarsum` on((`kaffiimportutgiftarsum`.`kaffiimport_id` = `gronne_bonner_verdi_sum`.`kaffiimport_id`))) */;

--
-- Final view structure for view `kaffiimportutgiftar`
--

/*!50001 DROP TABLE `kaffiimportutgiftar`*/;
/*!50001 DROP VIEW IF EXISTS `kaffiimportutgiftar`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffiimportutgiftar` AS (select `kaffiimport`.`id` AS `kaffiimport_id`,(sum(`pengeflytting`.`kroner`) + (sum(`pengeflytting`.`oere`) / 100)) AS `utgiftar` from ((`kaffiimport` join `pengeflytting` on((`pengeflytting`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) where (`kontoer`.`type` = 1) group by `kaffiimport`.`id`) union (select `kaffiimport`.`id` AS `kaffiimport_id`,(-(sum(`pengeflytting`.`kroner`)) - (sum(`pengeflytting`.`oere`) / 100)) AS `utgiftar` from ((`kaffiimport` join `pengeflytting` on((`pengeflytting`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) where (`kontoer`.`type` = 1) group by `kaffiimport`.`id`) */;

--
-- Final view structure for view `kaffiimportutgiftarsum`
--

/*!50001 DROP TABLE `kaffiimportutgiftarsum`*/;
/*!50001 DROP VIEW IF EXISTS `kaffiimportutgiftarsum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kaffiimportutgiftarsum` AS select `kaffiimportutgiftar`.`kaffiimport_id` AS `kaffiimport_id`,sum(`kaffiimportutgiftar`.`utgiftar`) AS `utgiftar` from `kaffiimportutgiftar` group by `kaffiimportutgiftar`.`kaffiimport_id` */;

--
-- Final view structure for view `kontobalanser`
--

/*!50001 DROP TABLE `kontobalanser`*/;
/*!50001 DROP VIEW IF EXISTS `kontobalanser`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kontobalanser` AS select truncate((sum(`pengeflytting_sum`.`kroner`) + (sum(`pengeflytting_sum`.`oere`) / 100)),0) AS `kroner`,abs(round((100 * ((sum(`pengeflytting_sum`.`kroner`) + (sum(`pengeflytting_sum`.`oere`) / 100)) % 1.00)),0)) AS `oere`,`pengeflytting_sum`.`til` AS `konto_id` from `pengeflytting_sum` group by `pengeflytting_sum`.`til` */;

--
-- Final view structure for view `kundebestillinger`
--

/*!50001 DROP TABLE `kundebestillinger`*/;
/*!50001 DROP VIEW IF EXISTS `kundebestillinger`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `kundebestillinger` AS select `bestillinger`.`nummer` AS `nummer`,`kunder`.`nummer` AS `kunde`,`kunder`.`navn` AS `navn`,`kunder`.`epost` AS `epost`,`kunder`.`slettes` AS `slettes`,`kaffepris`.`pris` AS `pris`,`kunder`.`leveringsadresse` AS `adresse`,`kunder`.`telefon` AS `telefon`,`kunder`.`registrert` AS `registrert`,`bestillinger`.`antall` AS `antall`,`kaffepris`.`type` AS `type` from ((`kunder` left join `bestillinger` on((`bestillinger`.`kunde` = `kunder`.`nummer`))) left join `kaffepris` on((`kaffepris`.`nummer` = `bestillinger`.`type`))) */;

--
-- Final view structure for view `lagerselger`
--

/*!50001 DROP TABLE `lagerselger`*/;
/*!50001 DROP VIEW IF EXISTS `lagerselger`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `lagerselger` AS select `selgere`.`nummer` AS `selger`,`lagertyper`.`navn` AS `lagertypenavn`,`kaffelagre`.`lagertype` AS `lagertype`,`selgere`.`navn` AS `selgernavn`,`kaffelagre`.`nummer` AS `lager`,`kaffelagre`.`beskrivelse` AS `lagernavn` from ((`kaffelagre` left join `selgere` on((`selgere`.`nummer` = `kaffelagre`.`selger`))) left join `lagertyper` on((`lagertyper`.`nummer` = `kaffelagre`.`lagertype`))) */;

--
-- Final view structure for view `pengeflytting_bilag`
--

/*!50001 DROP TABLE `pengeflytting_bilag`*/;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_bilag`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengeflytting_bilag` AS (select `pengeflytting`.`nummer` AS `pengeflytting_id`,`bilag`.`id` AS `bilag_id` from (`pengeflytting` join `bilag` on((`pengeflytting`.`nummer` = `bilag`.`pengeflytting_id`)))) */;

--
-- Final view structure for view `pengeflytting_pengetelling`
--

/*!50001 DROP TABLE `pengeflytting_pengetelling`*/;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_pengetelling`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengeflytting_pengetelling` AS (select `pengetellingar`.`id` AS `id`,sum(`pengeflytting`.`kroner`) AS `kroner`,sum(`pengeflytting`.`oere`) AS `oere` from (`pengeflytting` join `pengetellingar` on(((`pengeflytting`.`til` = `pengetellingar`.`konto_id`) and (`pengeflytting`.`dato` <= `pengetellingar`.`dato`)))) group by `pengetellingar`.`id`) union (select `pengetellingar`.`id` AS `id`,-(sum(`pengeflytting`.`kroner`)) AS `kroner`,-(sum(`pengeflytting`.`oere`)) AS `oere` from (`pengeflytting` join `pengetellingar` on(((`pengeflytting`.`fra` = `pengetellingar`.`konto_id`) and (`pengeflytting`.`dato` <= `pengetellingar`.`dato`)))) group by `pengetellingar`.`id`) */;

--
-- Final view structure for view `pengeflytting_regnskap_slutt_balanser_sum`
--

/*!50001 DROP TABLE `pengeflytting_regnskap_slutt_balanser_sum`*/;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_slutt_balanser_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengeflytting_regnskap_slutt_balanser_sum` AS (select `regnskap`.`id` AS `regnskap_id`,`pengeflytting`.`fra` AS `konto_id`,`kontoer`.`type` AS `kontotype_id`,-(sum(`pengeflytting`.`kroner`)) AS `kroner`,-(sum(`pengeflytting`.`oere`)) AS `oere` from ((`pengeflytting` join `regnskap` on((`regnskap`.`slutt` > `pengeflytting`.`dato`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`pengeflytting`.`fra`) union (select `regnskap`.`id` AS `regnskap_id`,`pengeflytting`.`til` AS `konto_id`,`kontoer`.`type` AS `kontotype_id`,sum(`pengeflytting`.`kroner`) AS `kroner`,sum(`pengeflytting`.`oere`) AS `oere` from ((`pengeflytting` join `regnskap` on((`regnskap`.`slutt` > `pengeflytting`.`dato`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`pengeflytting`.`til`) */;

--
-- Final view structure for view `pengeflytting_regnskap_slutt_kontotyper_sum`
--

/*!50001 DROP TABLE `pengeflytting_regnskap_slutt_kontotyper_sum`*/;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_slutt_kontotyper_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengeflytting_regnskap_slutt_kontotyper_sum` AS (select `regnskap`.`id` AS `regnskap_id`,`kontoer`.`type` AS `kontotype_id`,-(sum(`pengeflytting`.`kroner`)) AS `kroner`,-(sum(`pengeflytting`.`oere`)) AS `oere` from ((`pengeflytting` join `regnskap` on((`regnskap`.`slutt` > `pengeflytting`.`dato`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`kontoer`.`type`) union (select `regnskap`.`id` AS `regnskap_id`,`kontoer`.`type` AS `kontotype_id`,sum(`pengeflytting`.`kroner`) AS `kroner`,sum(`pengeflytting`.`oere`) AS `oere` from ((`pengeflytting` join `regnskap` on((`regnskap`.`slutt` > `pengeflytting`.`dato`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`kontoer`.`type`) */;

--
-- Final view structure for view `pengeflytting_regnskap_slutt_start`
--

/*!50001 DROP TABLE `pengeflytting_regnskap_slutt_start`*/;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_slutt_start`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengeflytting_regnskap_slutt_start` AS (select `regnskap`.`id` AS `regnskap_id`,`pengeflytting`.`fra` AS `konto_id`,`kontoer`.`type` AS `kontotype_id`,-(sum(`pengeflytting`.`kroner`)) AS `kroner`,-(sum(`pengeflytting`.`oere`)) AS `oere` from ((`pengeflytting` join `regnskap` on(((`regnskap`.`slutt` > `pengeflytting`.`dato`) and (`regnskap`.`start` <= `pengeflytting`.`dato`)))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`pengeflytting`.`fra`) union (select `regnskap`.`id` AS `regnskap_id`,`pengeflytting`.`til` AS `konto_id`,`kontoer`.`type` AS `kontotype_id`,sum(`pengeflytting`.`kroner`) AS `kroner`,sum(`pengeflytting`.`oere`) AS `oere` from ((`pengeflytting` join `regnskap` on(((`regnskap`.`slutt` > `pengeflytting`.`dato`) and (`regnskap`.`start` <= `pengeflytting`.`dato`)))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`pengeflytting`.`til`) */;

--
-- Final view structure for view `pengeflytting_regnskap_start_balanser_sum`
--

/*!50001 DROP TABLE `pengeflytting_regnskap_start_balanser_sum`*/;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_start_balanser_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengeflytting_regnskap_start_balanser_sum` AS (select `regnskap`.`id` AS `regnskap_id`,`pengeflytting`.`fra` AS `konto_id`,`kontoer`.`type` AS `kontotype_id`,-(sum(`pengeflytting`.`kroner`)) AS `kroner`,-(sum(`pengeflytting`.`oere`)) AS `oere` from ((`pengeflytting` join `regnskap` on((`regnskap`.`start` > `pengeflytting`.`dato`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`pengeflytting`.`fra`) union (select `regnskap`.`id` AS `regnskap_id`,`pengeflytting`.`til` AS `konto_id`,`kontoer`.`type` AS `kontotype_id`,sum(`pengeflytting`.`kroner`) AS `kroner`,sum(`pengeflytting`.`oere`) AS `oere` from ((`pengeflytting` join `regnskap` on((`regnskap`.`start` > `pengeflytting`.`dato`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`pengeflytting`.`til`) */;

--
-- Final view structure for view `pengeflytting_regnskap_start_kontotyper_sum`
--

/*!50001 DROP TABLE `pengeflytting_regnskap_start_kontotyper_sum`*/;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_regnskap_start_kontotyper_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengeflytting_regnskap_start_kontotyper_sum` AS (select `regnskap`.`id` AS `regnskap_id`,`kontoer`.`type` AS `kontotype_id`,-(sum(`pengeflytting`.`kroner`)) AS `kroner`,-(sum(`pengeflytting`.`oere`)) AS `oere` from ((`pengeflytting` join `regnskap` on((`regnskap`.`start` > `pengeflytting`.`dato`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`kontoer`.`type`) union (select `regnskap`.`id` AS `regnskap_id`,`kontoer`.`type` AS `kontotype_id`,sum(`pengeflytting`.`kroner`) AS `kroner`,sum(`pengeflytting`.`oere`) AS `oere` from ((`pengeflytting` join `regnskap` on((`regnskap`.`start` > `pengeflytting`.`dato`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) group by `regnskap`.`id`,`kontoer`.`type`) */;

--
-- Final view structure for view `pengeflytting_sum`
--

/*!50001 DROP TABLE `pengeflytting_sum`*/;
/*!50001 DROP VIEW IF EXISTS `pengeflytting_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengeflytting_sum` AS (select sum(`pengeflytting`.`kroner`) AS `kroner`,sum(`pengeflytting`.`oere`) AS `oere`,`pengeflytting`.`til` AS `til` from `pengeflytting` group by `pengeflytting`.`til`) union (select -(sum(`pengeflytting`.`kroner`)) AS `kroner`,-(sum(`pengeflytting`.`oere`)) AS `oere`,`pengeflytting`.`fra` AS `fra` from `pengeflytting` group by `pengeflytting`.`fra`) */;

--
-- Final view structure for view `pengerinn`
--

/*!50001 DROP TABLE `pengerinn`*/;
/*!50001 DROP VIEW IF EXISTS `pengerinn`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengerinn` AS select (sum(`pengeflytting`.`kroner`) + floor((sum(`pengeflytting`.`oere`) / 100))) AS `kroner`,(sum(`pengeflytting`.`oere`) % 100) AS `oere`,`pengeflytting`.`fra` AS `fra`,`pengeflytting`.`til` AS `til` from `pengeflytting` group by `pengeflytting`.`til` */;

--
-- Final view structure for view `pengerut`
--

/*!50001 DROP TABLE `pengerut`*/;
/*!50001 DROP VIEW IF EXISTS `pengerut`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengerut` AS select (sum(`pengeflytting`.`kroner`) + floor((sum(`pengeflytting`.`oere`) / 100))) AS `kroner`,(sum(`pengeflytting`.`oere`) % 100) AS `oere`,`pengeflytting`.`fra` AS `fra`,`pengeflytting`.`til` AS `til` from `pengeflytting` group by `pengeflytting`.`fra` */;

--
-- Final view structure for view `pengetellingsjekk`
--

/*!50001 DROP TABLE `pengetellingsjekk`*/;
/*!50001 DROP VIEW IF EXISTS `pengetellingsjekk`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `pengetellingsjekk` AS (select `pengeflytting_pengetelling`.`id` AS `id`,`pengeflytting_pengetelling`.`id` AS `pengetelling_id`,truncate((sum(`pengeflytting_pengetelling`.`kroner`) + (sum(`pengeflytting_pengetelling`.`oere`) / 100)),0) AS `kroner`,(((sum(`pengeflytting_pengetelling`.`kroner`) * 100) + sum(`pengeflytting_pengetelling`.`oere`)) % 100) AS `oere` from `pengeflytting_pengetelling` group by `pengeflytting_pengetelling`.`id`) */;

--
-- Final view structure for view `regnskap_balanser`
--

/*!50001 DROP TABLE `regnskap_balanser`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_balanser`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_balanser` AS select `regnskap_slutt_balanser`.`kontotype_id` AS `kontotype_id`,`regnskap_start_balanser`.`kroner` AS `start_kroner`,`regnskap_start_balanser`.`oere` AS `start_oere`,`regnskap_slutt_balanser`.`kroner` AS `slutt_kroner`,`regnskap_slutt_balanser`.`oere` AS `slutt_oere`,`regnskap_slutt_balanser`.`regnskap_id` AS `regnskap_id`,`regnskap_slutt_balanser`.`konto_id` AS `konto_id` from (`regnskap_slutt_balanser` left join `regnskap_start_balanser` on(((`regnskap_slutt_balanser`.`regnskap_id` = `regnskap_start_balanser`.`regnskap_id`) and (`regnskap_slutt_balanser`.`konto_id` = `regnskap_start_balanser`.`konto_id`)))) where ((`regnskap_slutt_balanser`.`kontotype_id` = 3) or (`regnskap_slutt_balanser`.`kontotype_id` = 4) or (`regnskap_slutt_balanser`.`kontotype_id` = 7)) */;

--
-- Final view structure for view `regnskap_balanser_kontotype_sum`
--

/*!50001 DROP TABLE `regnskap_balanser_kontotype_sum`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_balanser_kontotype_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_balanser_kontotype_sum` AS select -(1) AS `konto_id`,`regnskap_start_kontotyper`.`kroner` AS `start_kroner`,`regnskap_start_kontotyper`.`oere` AS `start_oere`,`regnskap_slutt_kontotyper`.`kroner` AS `slutt_kroner`,`regnskap_slutt_kontotyper`.`oere` AS `slutt_oere`,`regnskap_slutt_kontotyper`.`regnskap_id` AS `regnskap_id`,`regnskap_slutt_kontotyper`.`kontotype_id` AS `kontotype_id` from (`regnskap_start_kontotyper` left join `regnskap_slutt_kontotyper` on(((`regnskap_start_kontotyper`.`regnskap_id` = `regnskap_slutt_kontotyper`.`regnskap_id`) and (`regnskap_start_kontotyper`.`kontotype_id` = `regnskap_slutt_kontotyper`.`kontotype_id`)))) */;

--
-- Final view structure for view `regnskap_balanser_sum`
--

/*!50001 DROP TABLE `regnskap_balanser_sum`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_balanser_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_balanser_sum` AS select `regnskap_balanser`.`regnskap_id` AS `regnskap_id`,truncate((sum(`regnskap_balanser`.`start_kroner`) + (sum(`regnskap_balanser`.`start_oere`) / 100)),0) AS `start_kroner`,truncate((sum(`regnskap_balanser`.`slutt_kroner`) + (sum(`regnskap_balanser`.`slutt_oere`) / 100)),0) AS `slutt_kroner`,abs(round((100 * ((sum(`regnskap_balanser`.`start_kroner`) + (sum(`regnskap_balanser`.`start_oere`) / 100)) % 1.00)),0)) AS `start_oere`,abs(round((100 * ((sum(`regnskap_balanser`.`slutt_kroner`) + (sum(`regnskap_balanser`.`slutt_oere`) / 100)) % 1.00)),0)) AS `slutt_oere` from `regnskap_balanser` group by `regnskap_balanser`.`regnskap_id` */;

--
-- Final view structure for view `regnskap_balanser_visning`
--

/*!50001 DROP TABLE `regnskap_balanser_visning`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_balanser_visning`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_balanser_visning` AS (select `regnskap_balanser`.`regnskap_id` AS `regnskap_id`,`regnskap_balanser`.`konto_id` AS `konto_id`,`kontoer`.`beskrivelse` AS `beskrivelse`,`regnskap_balanser`.`start_kroner` AS `start_kroner`,`regnskap_balanser`.`start_oere` AS `start_oere`,`regnskap_balanser`.`slutt_kroner` AS `slutt_kroner`,`regnskap_balanser`.`slutt_oere` AS `slutt_oere` from (`regnskap_balanser` left join `kontoer` on((`kontoer`.`nummer` = `regnskap_balanser`.`konto_id`))) where ((`regnskap_balanser`.`kontotype_id` = 3) or (`regnskap_balanser`.`kontotype_id` = 4))) union (select `regnskap_balanser_kontotype_sum`.`regnskap_id` AS `regnskap_id`,0 AS `konto_id`,_latin1'Penger heime hos oss' AS `beskrivelse`,`regnskap_balanser_kontotype_sum`.`start_kroner` AS `start_kroner`,`regnskap_balanser_kontotype_sum`.`start_oere` AS `start_oere`,`regnskap_balanser_kontotype_sum`.`slutt_kroner` AS `slutt_kroner`,`regnskap_balanser_kontotype_sum`.`slutt_oere` AS `slutt_oere` from `regnskap_balanser_kontotype_sum` where (`regnskap_balanser_kontotype_sum`.`kontotype_id` = 7)) union (select `regnskap_balanser_sum`.`regnskap_id` AS `regnskap_id`,0 AS `konto_id`,_latin1'Totalt' AS `beskrivelse`,`regnskap_balanser_sum`.`start_kroner` AS `start_kroner`,`regnskap_balanser_sum`.`start_oere` AS `start_oere`,`regnskap_balanser_sum`.`slutt_kroner` AS `slutt_kroner`,`regnskap_balanser_sum`.`slutt_oere` AS `slutt_oere` from `regnskap_balanser_sum`) */;

--
-- Final view structure for view `regnskap_gronne_bonner_verdi_slutt`
--

/*!50001 DROP TABLE `regnskap_gronne_bonner_verdi_slutt`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_slutt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_gronne_bonner_verdi_slutt` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffiimport`.`id` AS `kaffiimport_id`,(sum(`pengeflytting`.`kroner`) + (sum(`pengeflytting`.`oere`) / 100)) AS `verdi` from (((`regnskap` join `kaffiimport`) join `pengeflytting` on((`pengeflytting`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) where ((`pengeflytting`.`dato` < `regnskap`.`slutt`) and (`kontoer`.`type` = 1)) group by `kaffiimport`.`id`,`regnskap`.`id`) union (select `regnskap`.`id` AS `regnskap_id`,`kaffiimport`.`id` AS `kaffiimport_id`,-((sum(`pengeflytting`.`kroner`) + (sum(`pengeflytting`.`oere`) / 100))) AS `verdi` from (((`regnskap` join `kaffiimport`) join `pengeflytting` on((`pengeflytting`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) where ((`pengeflytting`.`dato` < `regnskap`.`slutt`) and (`kontoer`.`type` = 1)) group by `kaffiimport`.`id`,`regnskap`.`id`) union (select `regnskap`.`id` AS `regnskap_id`,`kaffibrenning`.`kaffiimport_id` AS `kaffiimport_id`,-(sum(`kaffibrenningbonneverdi`.`bonneverdi`)) AS `-sum(bonneverdi)` from ((`regnskap` join `kaffibrenning`) left join `kaffibrenningbonneverdi` on((`kaffibrenning`.`id` = `kaffibrenningbonneverdi`.`kaffibrenning_id`))) where (`kaffibrenning`.`brent` < `regnskap`.`slutt`) group by `regnskap`.`id`,`kaffibrenning`.`kaffiimport_id`) */;

--
-- Final view structure for view `regnskap_gronne_bonner_verdi_slutt_sum`
--

/*!50001 DROP TABLE `regnskap_gronne_bonner_verdi_slutt_sum`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_slutt_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_gronne_bonner_verdi_slutt_sum` AS select `regnskap_gronne_bonner_verdi_slutt`.`regnskap_id` AS `regnskap_id`,`regnskap_gronne_bonner_verdi_slutt`.`kaffiimport_id` AS `kaffiimport_id`,sum(`regnskap_gronne_bonner_verdi_slutt`.`verdi`) AS `verdi` from `regnskap_gronne_bonner_verdi_slutt` group by `regnskap_gronne_bonner_verdi_slutt`.`regnskap_id`,`regnskap_gronne_bonner_verdi_slutt`.`kaffiimport_id` */;

--
-- Final view structure for view `regnskap_gronne_bonner_verdi_slutt_total`
--

/*!50001 DROP TABLE `regnskap_gronne_bonner_verdi_slutt_total`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_slutt_total`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_gronne_bonner_verdi_slutt_total` AS select `regnskap_gronne_bonner_verdi_slutt`.`regnskap_id` AS `regnskap_id`,sum(`regnskap_gronne_bonner_verdi_slutt`.`verdi`) AS `verdi` from `regnskap_gronne_bonner_verdi_slutt` group by `regnskap_gronne_bonner_verdi_slutt`.`regnskap_id` */;

--
-- Final view structure for view `regnskap_gronne_bonner_verdi_start`
--

/*!50001 DROP TABLE `regnskap_gronne_bonner_verdi_start`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_start`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_gronne_bonner_verdi_start` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffiimport`.`id` AS `kaffiimport_id`,(sum(`pengeflytting`.`kroner`) + (sum(`pengeflytting`.`oere`) / 100)) AS `verdi` from (((`regnskap` join `kaffiimport`) join `pengeflytting` on((`pengeflytting`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kontoer` on((`pengeflytting`.`til` = `kontoer`.`nummer`))) where ((`pengeflytting`.`dato` < `regnskap`.`start`) and (`kontoer`.`type` = 1)) group by `kaffiimport`.`id`,`regnskap`.`id`) union (select `regnskap`.`id` AS `regnskap_id`,`kaffiimport`.`id` AS `kaffiimport_id`,-((sum(`pengeflytting`.`kroner`) + (sum(`pengeflytting`.`oere`) / 100))) AS `verdi` from (((`regnskap` join `kaffiimport`) join `pengeflytting` on((`pengeflytting`.`kaffiimport_id` = `kaffiimport`.`id`))) left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) where ((`pengeflytting`.`dato` < `regnskap`.`start`) and (`kontoer`.`type` = 1)) group by `kaffiimport`.`id`,`regnskap`.`id`) union (select `regnskap`.`id` AS `regnskap_id`,`kaffibrenning`.`kaffiimport_id` AS `kaffiimport_id`,-(sum(`kaffibrenningbonneverdi`.`bonneverdi`)) AS `-sum(bonneverdi)` from ((`regnskap` join `kaffibrenning`) left join `kaffibrenningbonneverdi` on((`kaffibrenning`.`id` = `kaffibrenningbonneverdi`.`kaffibrenning_id`))) where (`kaffibrenning`.`brent` < `regnskap`.`start`) group by `regnskap`.`id`,`kaffibrenning`.`kaffiimport_id`) */;

--
-- Final view structure for view `regnskap_gronne_bonner_verdi_start_sum`
--

/*!50001 DROP TABLE `regnskap_gronne_bonner_verdi_start_sum`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_start_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_gronne_bonner_verdi_start_sum` AS select `regnskap_gronne_bonner_verdi_start`.`regnskap_id` AS `regnskap_id`,`regnskap_gronne_bonner_verdi_start`.`kaffiimport_id` AS `kaffiimport_id`,sum(`regnskap_gronne_bonner_verdi_start`.`verdi`) AS `verdi` from `regnskap_gronne_bonner_verdi_start` group by `regnskap_gronne_bonner_verdi_start`.`regnskap_id`,`regnskap_gronne_bonner_verdi_start`.`kaffiimport_id` */;

--
-- Final view structure for view `regnskap_gronne_bonner_verdi_start_total`
--

/*!50001 DROP TABLE `regnskap_gronne_bonner_verdi_start_total`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_gronne_bonner_verdi_start_total`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_gronne_bonner_verdi_start_total` AS select `regnskap_gronne_bonner_verdi_start`.`regnskap_id` AS `regnskap_id`,sum(`regnskap_gronne_bonner_verdi_start`.`verdi`) AS `verdi` from `regnskap_gronne_bonner_verdi_start` group by `regnskap_gronne_bonner_verdi_start`.`regnskap_id` */;

--
-- Final view structure for view `regnskap_inntekter`
--

/*!50001 DROP TABLE `regnskap_inntekter`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_inntekter`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_inntekter` AS (select -(`regnskap_innut`.`kroner`) AS `kroner`,`regnskap_innut`.`oere` AS `oere`,`regnskap_innut`.`regnskap_id` AS `regnskap_id`,`regnskap_innut`.`konto_id` AS `konto_id`,`kontoer`.`beskrivelse` AS `beskrivelse` from (`regnskap_innut` left join `kontoer` on((`regnskap_innut`.`konto_id` = `kontoer`.`nummer`))) where (`regnskap_innut`.`kontotype_id` = 2)) union (select -(`regnskap_innut_sum`.`kroner`) AS `-kroner`,`regnskap_innut_sum`.`oere` AS `oere`,`regnskap_innut_sum`.`regnskap_id` AS `regnskap_id`,0 AS `konto_id`,_latin1'Kaffisal' AS `beskrivelse` from `regnskap_innut_sum` where (`regnskap_innut_sum`.`kontotype_id` = 6)) union (select -(`regnskap_inntekter_kaffesalg_sum`.`kroner`) AS `kroner`,`regnskap_inntekter_kaffesalg_sum`.`oere` AS `oere`,`regnskap_inntekter_kaffesalg_sum`.`regnskap_id` AS `regnskap_id`,0 AS `konto_id`,_latin1'Sum inn' AS `beskrivelse` from `regnskap_inntekter_kaffesalg_sum`) */;

--
-- Final view structure for view `regnskap_inntekter_kaffesalg_sum`
--

/*!50001 DROP TABLE `regnskap_inntekter_kaffesalg_sum`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_inntekter_kaffesalg_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_inntekter_kaffesalg_sum` AS select `pengeflytting_regnskap_slutt_start`.`regnskap_id` AS `regnskap_id`,truncate((sum(`pengeflytting_regnskap_slutt_start`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_start`.`oere`) / 100)),0) AS `kroner`,abs(round((100 * ((sum(`pengeflytting_regnskap_slutt_start`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_start`.`oere`) / 100)) % 1.00)),0)) AS `oere` from `pengeflytting_regnskap_slutt_start` where ((`pengeflytting_regnskap_slutt_start`.`kontotype_id` = 2) or (`pengeflytting_regnskap_slutt_start`.`kontotype_id` = 6)) group by `pengeflytting_regnskap_slutt_start`.`regnskap_id` */;

--
-- Final view structure for view `regnskap_innut`
--

/*!50001 DROP TABLE `regnskap_innut`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_innut`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_innut` AS select `pengeflytting_regnskap_slutt_start`.`konto_id` AS `konto_id`,`pengeflytting_regnskap_slutt_start`.`kontotype_id` AS `kontotype_id`,`pengeflytting_regnskap_slutt_start`.`regnskap_id` AS `regnskap_id`,truncate((sum(`pengeflytting_regnskap_slutt_start`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_start`.`oere`) / 100)),0) AS `kroner`,abs(round((100 * ((sum(`pengeflytting_regnskap_slutt_start`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_start`.`oere`) / 100)) % 1.00)),0)) AS `oere` from `pengeflytting_regnskap_slutt_start` group by `pengeflytting_regnskap_slutt_start`.`regnskap_id`,`pengeflytting_regnskap_slutt_start`.`konto_id` */;

--
-- Final view structure for view `regnskap_innut_sum`
--

/*!50001 DROP TABLE `regnskap_innut_sum`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_innut_sum`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_innut_sum` AS select `pengeflytting_regnskap_slutt_start`.`kontotype_id` AS `kontotype_id`,`pengeflytting_regnskap_slutt_start`.`regnskap_id` AS `regnskap_id`,truncate((sum(`pengeflytting_regnskap_slutt_start`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_start`.`oere`) / 100)),0) AS `kroner`,abs(round((100 * ((sum(`pengeflytting_regnskap_slutt_start`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_start`.`oere`) / 100)) % 1.00)),0)) AS `oere` from `pengeflytting_regnskap_slutt_start` group by `pengeflytting_regnskap_slutt_start`.`regnskap_id`,`pengeflytting_regnskap_slutt_start`.`kontotype_id` */;

--
-- Final view structure for view `regnskap_kaffelager_lagertype_innut`
--

/*!50001 DROP TABLE `regnskap_kaffelager_lagertype_innut`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_kaffelager_lagertype_innut`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_kaffelager_lagertype_innut` AS (select `kaffeflytting_regnskap_kaffelager_lagertype_innut`.`regnskap_id` AS `regnskap_id`,sum(`kaffeflytting_regnskap_kaffelager_lagertype_innut`.`antall`) AS `antall`,`kaffeflytting_regnskap_kaffelager_lagertype_innut`.`kaffelager_id` AS `kaffelager_id`,`kaffeflytting_regnskap_kaffelager_lagertype_innut`.`lagertype_id` AS `lagertype_id`,`kaffeflytting_regnskap_kaffelager_lagertype_innut`.`kaffepris_id` AS `kaffepris_id` from `kaffeflytting_regnskap_kaffelager_lagertype_innut` group by `kaffeflytting_regnskap_kaffelager_lagertype_innut`.`regnskap_id`,`kaffeflytting_regnskap_kaffelager_lagertype_innut`.`kaffelager_id`,`kaffeflytting_regnskap_kaffelager_lagertype_innut`.`lagertype_id`,`kaffeflytting_regnskap_kaffelager_lagertype_innut`.`kaffepris_id`) */;

--
-- Final view structure for view `regnskap_kaffelager_lagertype_slutt`
--

/*!50001 DROP TABLE `regnskap_kaffelager_lagertype_slutt`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_kaffelager_lagertype_slutt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_kaffelager_lagertype_slutt` AS select `kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`regnskap_id` AS `regnskap_id`,`kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`kaffepris_id` AS `kaffepris_id`,sum(`kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`antall`) AS `antall`,`kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`lagertype_id` AS `lagertype_id`,`kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`kaffelager_id` AS `kaffelager_id` from `kaffeflytting_regnskap_kaffelager_lagertype_slutt` group by `kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`regnskap_id`,`kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`lagertype_id`,`kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`kaffepris_id`,`kaffeflytting_regnskap_kaffelager_lagertype_slutt`.`kaffelager_id` */;

--
-- Final view structure for view `regnskap_kaffelager_lagertype_start`
--

/*!50001 DROP TABLE `regnskap_kaffelager_lagertype_start`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_kaffelager_lagertype_start`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_kaffelager_lagertype_start` AS select `kaffeflytting_regnskap_kaffelager_lagertype_start`.`regnskap_id` AS `regnskap_id`,`kaffeflytting_regnskap_kaffelager_lagertype_start`.`kaffepris_id` AS `kaffepris_id`,sum(`kaffeflytting_regnskap_kaffelager_lagertype_start`.`antall`) AS `antall`,`kaffeflytting_regnskap_kaffelager_lagertype_start`.`lagertype_id` AS `lagertype_id`,`kaffeflytting_regnskap_kaffelager_lagertype_start`.`kaffelager_id` AS `kaffelager_id` from `kaffeflytting_regnskap_kaffelager_lagertype_start` group by `kaffeflytting_regnskap_kaffelager_lagertype_start`.`regnskap_id`,`kaffeflytting_regnskap_kaffelager_lagertype_start`.`lagertype_id`,`kaffeflytting_regnskap_kaffelager_lagertype_start`.`kaffepris_id`,`kaffeflytting_regnskap_kaffelager_lagertype_start`.`kaffelager_id` */;

--
-- Final view structure for view `regnskap_kaffelager_lagertype_start_slutt`
--

/*!50001 DROP TABLE `regnskap_kaffelager_lagertype_start_slutt`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_kaffelager_lagertype_start_slutt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_kaffelager_lagertype_start_slutt` AS select `regnskap_kaffelager_lagertype_start`.`regnskap_id` AS `regnskap_id`,`regnskap_kaffelager_lagertype_start`.`kaffepris_id` AS `kaffepris_id`,`regnskap_kaffelager_lagertype_start`.`lagertype_id` AS `lagertype_id`,`regnskap_kaffelager_lagertype_start`.`kaffelager_id` AS `kaffelager_id`,`regnskap_kaffelager_lagertype_start`.`antall` AS `start`,`regnskap_kaffelager_lagertype_slutt`.`antall` AS `slutt` from (`regnskap_kaffelager_lagertype_start` left join `regnskap_kaffelager_lagertype_slutt` on(((`regnskap_kaffelager_lagertype_start`.`regnskap_id` = `regnskap_kaffelager_lagertype_slutt`.`regnskap_id`) and (`regnskap_kaffelager_lagertype_start`.`kaffepris_id` = `regnskap_kaffelager_lagertype_slutt`.`kaffepris_id`) and (`regnskap_kaffelager_lagertype_start`.`kaffelager_id` = `regnskap_kaffelager_lagertype_slutt`.`kaffelager_id`) and (`regnskap_kaffelager_lagertype_start`.`lagertype_id` = `regnskap_kaffelager_lagertype_slutt`.`lagertype_id`)))) */;

--
-- Final view structure for view `regnskap_lagertype_innut`
--

/*!50001 DROP TABLE `regnskap_lagertype_innut`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_lagertype_innut`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_lagertype_innut` AS select `kaffeflytting_regnskap_lagertype_innut`.`regnskap_id` AS `regnskap_id`,`kaffeflytting_regnskap_lagertype_innut`.`kaffepris_id` AS `kaffepris_id`,sum(`kaffeflytting_regnskap_lagertype_innut`.`antall`) AS `antall`,`kaffeflytting_regnskap_lagertype_innut`.`lagertype_id` AS `lagertype_id` from `kaffeflytting_regnskap_lagertype_innut` group by `kaffeflytting_regnskap_lagertype_innut`.`regnskap_id`,`kaffeflytting_regnskap_lagertype_innut`.`lagertype_id`,`kaffeflytting_regnskap_lagertype_innut`.`kaffepris_id` */;

--
-- Final view structure for view `regnskap_lagertype_slutt`
--

/*!50001 DROP TABLE `regnskap_lagertype_slutt`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_lagertype_slutt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_lagertype_slutt` AS select `kaffeflytting_regnskap_lagertype_slutt`.`regnskap_id` AS `regnskap_id`,`kaffeflytting_regnskap_lagertype_slutt`.`kaffepris_id` AS `kaffepris_id`,sum(`kaffeflytting_regnskap_lagertype_slutt`.`antall`) AS `antall`,`kaffeflytting_regnskap_lagertype_slutt`.`lagertype_id` AS `lagertype_id` from `kaffeflytting_regnskap_lagertype_slutt` group by `kaffeflytting_regnskap_lagertype_slutt`.`regnskap_id`,`kaffeflytting_regnskap_lagertype_slutt`.`lagertype_id`,`kaffeflytting_regnskap_lagertype_slutt`.`kaffepris_id` */;

--
-- Final view structure for view `regnskap_lagertype_start`
--

/*!50001 DROP TABLE `regnskap_lagertype_start`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_lagertype_start`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_lagertype_start` AS select `kaffeflytting_regnskap_lagertype_start`.`regnskap_id` AS `regnskap_id`,`kaffeflytting_regnskap_lagertype_start`.`kaffepris_id` AS `kaffepris_id`,sum(`kaffeflytting_regnskap_lagertype_start`.`antall`) AS `antall`,`kaffeflytting_regnskap_lagertype_start`.`lagertype_id` AS `lagertype_id` from `kaffeflytting_regnskap_lagertype_start` group by `kaffeflytting_regnskap_lagertype_start`.`regnskap_id`,`kaffeflytting_regnskap_lagertype_start`.`lagertype_id`,`kaffeflytting_regnskap_lagertype_start`.`kaffepris_id` */;

--
-- Final view structure for view `regnskap_slutt_balanser`
--

/*!50001 DROP TABLE `regnskap_slutt_balanser`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_slutt_balanser`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_slutt_balanser` AS select `pengeflytting_regnskap_slutt_balanser_sum`.`kontotype_id` AS `kontotype_id`,truncate((sum(`pengeflytting_regnskap_slutt_balanser_sum`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_balanser_sum`.`oere`) / 100)),0) AS `kroner`,abs(round((100 * ((sum(`pengeflytting_regnskap_slutt_balanser_sum`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_balanser_sum`.`oere`) / 100)) % 1.00)),0)) AS `oere`,`pengeflytting_regnskap_slutt_balanser_sum`.`regnskap_id` AS `regnskap_id`,`pengeflytting_regnskap_slutt_balanser_sum`.`konto_id` AS `konto_id` from `pengeflytting_regnskap_slutt_balanser_sum` group by `pengeflytting_regnskap_slutt_balanser_sum`.`regnskap_id`,`pengeflytting_regnskap_slutt_balanser_sum`.`konto_id` */;

--
-- Final view structure for view `regnskap_slutt_kontotyper`
--

/*!50001 DROP TABLE `regnskap_slutt_kontotyper`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_slutt_kontotyper`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_slutt_kontotyper` AS select `pengeflytting_regnskap_slutt_kontotyper_sum`.`regnskap_id` AS `regnskap_id`,`pengeflytting_regnskap_slutt_kontotyper_sum`.`kontotype_id` AS `kontotype_id`,truncate((sum(`pengeflytting_regnskap_slutt_kontotyper_sum`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_kontotyper_sum`.`oere`) / 100)),0) AS `kroner`,abs(round((100 * ((sum(`pengeflytting_regnskap_slutt_kontotyper_sum`.`kroner`) + (sum(`pengeflytting_regnskap_slutt_kontotyper_sum`.`oere`) / 100)) % 1.00)),0)) AS `oere` from `pengeflytting_regnskap_slutt_kontotyper_sum` group by `pengeflytting_regnskap_slutt_kontotyper_sum`.`regnskap_id`,`pengeflytting_regnskap_slutt_kontotyper_sum`.`kontotype_id` */;

--
-- Final view structure for view `regnskap_start_balanser`
--

/*!50001 DROP TABLE `regnskap_start_balanser`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_start_balanser`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_start_balanser` AS select truncate((sum(`pengeflytting_regnskap_start_balanser_sum`.`kroner`) + (sum(`pengeflytting_regnskap_start_balanser_sum`.`oere`) / 100)),0) AS `kroner`,abs(round((100 * ((sum(`pengeflytting_regnskap_start_balanser_sum`.`kroner`) + (sum(`pengeflytting_regnskap_start_balanser_sum`.`oere`) / 100)) % 1.00)),0)) AS `oere`,`pengeflytting_regnskap_start_balanser_sum`.`regnskap_id` AS `regnskap_id`,`pengeflytting_regnskap_start_balanser_sum`.`konto_id` AS `konto_id`,`pengeflytting_regnskap_start_balanser_sum`.`kontotype_id` AS `kontotype_id` from `pengeflytting_regnskap_start_balanser_sum` group by `pengeflytting_regnskap_start_balanser_sum`.`regnskap_id`,`pengeflytting_regnskap_start_balanser_sum`.`konto_id` */;

--
-- Final view structure for view `regnskap_start_kontotyper`
--

/*!50001 DROP TABLE `regnskap_start_kontotyper`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_start_kontotyper`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_start_kontotyper` AS select `pengeflytting_regnskap_start_kontotyper_sum`.`regnskap_id` AS `regnskap_id`,`pengeflytting_regnskap_start_kontotyper_sum`.`kontotype_id` AS `kontotype_id`,truncate((sum(`pengeflytting_regnskap_start_kontotyper_sum`.`kroner`) + (sum(`pengeflytting_regnskap_start_kontotyper_sum`.`oere`) / 100)),0) AS `kroner`,abs(round((100 * ((sum(`pengeflytting_regnskap_start_kontotyper_sum`.`kroner`) + (sum(`pengeflytting_regnskap_start_kontotyper_sum`.`oere`) / 100)) % 1.00)),0)) AS `oere` from `pengeflytting_regnskap_start_kontotyper_sum` group by `pengeflytting_regnskap_start_kontotyper_sum`.`regnskap_id`,`pengeflytting_regnskap_start_kontotyper_sum`.`kontotype_id` */;

--
-- Final view structure for view `regnskap_utgifter`
--

/*!50001 DROP TABLE `regnskap_utgifter`*/;
/*!50001 DROP VIEW IF EXISTS `regnskap_utgifter`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `regnskap_utgifter` AS (select `regnskap_innut`.`kroner` AS `kroner`,`regnskap_innut`.`oere` AS `oere`,`regnskap_innut`.`regnskap_id` AS `regnskap_id`,`regnskap_innut`.`konto_id` AS `konto_id`,`kontoer`.`beskrivelse` AS `beskrivelse` from (`regnskap_innut` left join `kontoer` on((`regnskap_innut`.`konto_id` = `kontoer`.`nummer`))) where (`regnskap_innut`.`kontotype_id` = 1)) union (select `regnskap_innut_sum`.`kroner` AS `kroner`,`regnskap_innut_sum`.`oere` AS `oere`,`regnskap_innut_sum`.`regnskap_id` AS `regnskap_id`,0 AS `konto_id`,_latin1'Sum ut' AS `beskrivelse` from `regnskap_innut_sum` where (`regnskap_innut_sum`.`kontotype_id` = 1)) */;

--
-- Final view structure for view `sal_per_12mnd`
--

/*!50001 DROP TABLE `sal_per_12mnd`*/;
/*!50001 DROP VIEW IF EXISTS `sal_per_12mnd`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `sal_per_12mnd` AS select (`alle_sals_datoar`.`dato` - interval 1 year) AS `start`,`alle_sals_datoar`.`dato` AS `slutt`,sum(`pengeflytting`.`kroner`) AS `solgt` from ((`pengeflytting` left join `kontoer` on((`pengeflytting`.`fra` = `kontoer`.`nummer`))) join `alle_sals_datoar`) where (((to_days((`alle_sals_datoar`.`dato` - interval 1 year)) - to_days(cast(`pengeflytting`.`dato` as date))) < 0) and ((to_days(`alle_sals_datoar`.`dato`) - to_days(cast(`pengeflytting`.`dato` as date))) >= 0) and (`kontoer`.`type` = 6)) group by `alle_sals_datoar`.`dato` order by `alle_sals_datoar`.`dato` */;

--
-- Final view structure for view `sal_per_maanad`
--

/*!50001 DROP TABLE `sal_per_maanad`*/;
/*!50001 DROP VIEW IF EXISTS `sal_per_maanad`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `sal_per_maanad` AS select year(`kaffeflytting`.`dato`) AS `year`,month(`kaffeflytting`.`dato`) AS `month`,sum(`kaffeflytting`.`antall`) AS `solgt`,`kaffeflytting`.`type` AS `kaffepris_id` from `kaffeflytting` where (`kaffeflytting`.`tillagertype` = 1) group by year(`kaffeflytting`.`dato`),month(`kaffeflytting`.`dato`),`kaffeflytting`.`type` */;

--
-- Final view structure for view `selgerbalanser`
--

/*!50001 DROP TABLE `selgerbalanser`*/;
/*!50001 DROP VIEW IF EXISTS `selgerbalanser`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `selgerbalanser` AS (select `kontoer`.`nummer` AS `konto_id`,`kontobalanser`.`kroner` AS `kroner`,`kontobalanser`.`oere` AS `oere`,`selgere`.`nummer` AS `selger_id`,`kaffelagre`.`nummer` AS `kaffelager_id` from (((`kontobalanser` left join `kontoer` on((`kontoer`.`nummer` = `kontobalanser`.`konto_id`))) left join `selgere` on((`selgere`.`nummer` = `kontoer`.`ansvarlig`))) left join `kaffelagre` on(((`kaffelagre`.`selger` = `selgere`.`nummer`) and (`kaffelagre`.`beskrivelse` = convert(`selgere`.`navn` using utf8))))) where (`kontoer`.`type` = 7)) */;

--
-- Final view structure for view `selgerlager`
--

/*!50001 DROP TABLE `selgerlager`*/;
/*!50001 DROP VIEW IF EXISTS `selgerlager`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `selgerlager` AS select `selgere`.`nummer` AS `selger`,`kaffelagre`.`nummer` AS `lager`,`selgere`.`navn` AS `navn`,`kaffelagre`.`beskrivelse` AS `beskrivelse` from (`kaffelagre` left join `selgere` on((`selgere`.`nummer` = `kaffelagre`.`selger`))) */;

--
-- Final view structure for view `solgt`
--

/*!50001 DROP TABLE `solgt`*/;
/*!50001 DROP VIEW IF EXISTS `solgt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `solgt` AS select `lagerselger`.`lagertypenavn` AS `lagertypenavn`,sum(`kaffeflytting`.`antall`) AS `antall`,sum((`kaffeflytting`.`antall` * `kaffepris`.`pris`)) AS `sum`,`kaffeflytting`.`fra` AS `lagernummer`,`kaffeflytting`.`type` AS `typenr` from ((`kaffeflytting` left join `lagerselger` on((`kaffeflytting`.`til` = `lagerselger`.`lager`))) left join `kaffepris` on((`kaffeflytting`.`type` = `kaffepris`.`nummer`))) where (`lagerselger`.`lagertypenavn` = _utf8'salg') group by `kaffeflytting`.`fra`,`kaffeflytting`.`type` */;

--
-- Final view structure for view `sumbestilt`
--

/*!50001 DROP TABLE `sumbestilt`*/;
/*!50001 DROP VIEW IF EXISTS `sumbestilt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `sumbestilt` AS select sum(`bestillinger`.`antall`) AS `bestilt`,`kaffepris`.`nummer` AS `nummer`,`kaffepris`.`type` AS `type`,`kaffepris`.`beskrivelse` AS `beskrivelse`,`kaffepris`.`pris` AS `pris` from (`kaffepris` left join `bestillinger` on((`kaffepris`.`nummer` = `bestillinger`.`type`))) group by `kaffepris`.`nummer` */;

--
-- Final view structure for view `sumbetalt`
--

/*!50001 DROP TABLE `sumbetalt`*/;
/*!50001 DROP VIEW IF EXISTS `sumbetalt`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `sumbetalt` AS select (sum(`pengeflytting`.`kroner`) + floor((sum(`pengeflytting`.`oere`) / 100))) AS `kroner`,(sum(`pengeflytting`.`oere`) % 100) AS `oere`,`pengeflytting`.`fra` AS `fra`,`pengeflytting`.`beskrivelse` AS `flyttebesk`,`kontoer`.`beskrivelse` AS `tilkontobesk`,`kontoer`.`nummer` AS `tilkontonr`,`pengeflytting`.`dato` AS `dato` from (`pengeflytting` left join (`kontoer` left join `kontotyper` on((`kontoer`.`type` = `kontotyper`.`nummer`))) on((`pengeflytting`.`til` = `kontoer`.`nummer`))) where (`kontotyper`.`nummer` = 3) group by `pengeflytting`.`fra` */;

--
-- Final view structure for view `suminn`
--

/*!50001 DROP TABLE `suminn`*/;
/*!50001 DROP VIEW IF EXISTS `suminn`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `suminn` AS select sum(`kaffeflytting`.`antall`) AS `antall`,sum((`kaffeflytting`.`antall` * `kaffepris`.`pris`)) AS `sum`,`kaffeflytting`.`til` AS `til`,`kaffeflytting`.`type` AS `type` from (`kaffeflytting` left join `kaffepris` on((`kaffeflytting`.`type` = `kaffepris`.`nummer`))) group by `kaffeflytting`.`til`,`kaffeflytting`.`type` */;

--
-- Final view structure for view `sumut`
--

/*!50001 DROP TABLE `sumut`*/;
/*!50001 DROP VIEW IF EXISTS `sumut`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `sumut` AS select sum(`kaffeflytting`.`antall`) AS `antall`,sum((`kaffeflytting`.`antall` * `kaffepris`.`pris`)) AS `sum`,`kaffeflytting`.`fra` AS `fra`,`kaffeflytting`.`type` AS `type` from (`kaffeflytting` left join `kaffepris` on((`kaffeflytting`.`type` = `kaffepris`.`nummer`))) group by `kaffeflytting`.`fra`,`kaffeflytting`.`type` */;

--
-- Final view structure for view `varetellingsjekk`
--

/*!50001 DROP TABLE `varetellingsjekk`*/;
/*!50001 DROP VIEW IF EXISTS `varetellingsjekk`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `varetellingsjekk` AS (select `kaffeflytting_varetelling`.`id` AS `varetelling_id`,`kaffeflytting_varetelling`.`id` AS `id`,sum(`kaffeflytting_varetelling`.`antall`) AS `antall` from `kaffeflytting_varetelling` group by `kaffeflytting_varetelling`.`id`) */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-13  1:41:51
