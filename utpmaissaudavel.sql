/**
 * Author:  michael
 * Created: 24/05/2018
 */

-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: utpmaissaudavel
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.17.10.1

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
-- Table structure for table `CID10`
--

DROP TABLE IF EXISTS `CID10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CID10` (
  `id_cid` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CID10`
--

LOCK TABLES `CID10` WRITE;
/*!40000 ALTER TABLE `CID10` DISABLE KEYS */;
/*!40000 ALTER TABLE `CID10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendamentos`
--

DROP TABLE IF EXISTS `agendamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamentos` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NULL DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_agendamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamentos`
--

LOCK TABLES `agendamentos` WRITE;
/*!40000 ALTER TABLE `agendamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enderecos` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoa` int(11) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `criado_por` int(11) NOT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_endereco`,`fk_id_pessoa`),
  KEY `fk_enderecos_pessoas1_idx` (`fk_id_pessoa`),
  CONSTRAINT `fk_enderecos_pessoas1` FOREIGN KEY (`fk_id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Tabela de endereços de qualquer usuários do sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (12,25,'81150-305','Rua Cem','Pinheirinho','Curitiba','PR','100','Casa',2,NULL,2,NULL),(13,26,'81150-305','Jardinete Ângelo Cavol','Pinheirinho','Curitiba','PR','200','Apartamento',21,NULL,21,NULL),(14,27,'81150-310','Rua Valentin Nichele','Pinheirinho','Curitiba','PR','150','Casa',21,NULL,21,NULL),(15,28,'80310-105','Rua Duzentos','Juvevê','Curitiba','PR','200','Apartamento',21,NULL,21,NULL),(16,29,'83602-115','Rua José Krupa','Jardim São Vicente ','Campo Largo','PR','37','Casa',2,'2018-05-28 22:33:32',2,'2018-05-28 22:33:32'),(17,30,'81150-305','Jardinete Ângelo Cavol','Pinheirinho','Curitiba','PR','150','Casa',2,'2018-05-28 23:16:03',2,'2018-05-28 23:16:03'),(18,31,'81190-325','Rua Almeida','Sao Bras','Curitiba','PR','780','Casa',21,'2018-05-28 23:17:46',21,'2018-05-28 23:17:46');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidades` (
  `id_especialidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_especialidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_saude_paciente`
--

DROP TABLE IF EXISTS `historico_saude_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_saude_paciente` (
  `id_historico_saude_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `fk_triagem_paciente` int(11) NOT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_historico_saude_paciente`,`fk_triagem_paciente`),
  KEY `fk_historico_saude_paciente_triagem_paciente1_idx` (`fk_triagem_paciente`),
  CONSTRAINT `fk_historico_saude_paciente_triagem_paciente1` FOREIGN KEY (`fk_triagem_paciente`) REFERENCES `triagem_paciente` (`id_triagem_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_saude_paciente`
--

LOCK TABLES `historico_saude_paciente` WRITE;
/*!40000 ALTER TABLE `historico_saude_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico_saude_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes_agendamentos`
--

DROP TABLE IF EXISTS `pacientes_agendamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes_agendamentos` (
  `id_paciente_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_agendamento` int(11) NOT NULL,
  `fk_id_paciente` int(11) NOT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_paciente_agendamento`,`fk_id_agendamento`,`fk_id_paciente`),
  KEY `fk_pacientes_agendamentos_agendamentos1_idx` (`fk_id_agendamento`),
  KEY `fk_pacientes_agendamentos_usuarios1_idx` (`fk_id_paciente`),
  CONSTRAINT `fk_pacientes_agendamentos_agendamentos1` FOREIGN KEY (`fk_id_agendamento`) REFERENCES `agendamentos` (`id_agendamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pacientes_agendamentos_usuarios1` FOREIGN KEY (`fk_id_paciente`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes_agendamentos`
--

LOCK TABLES `pacientes_agendamentos` WRITE;
/*!40000 ALTER TABLE `pacientes_agendamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacientes_agendamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfis`
--

DROP TABLE IF EXISTS `perfis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfis` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(45) NOT NULL,
  `criado_por` int(11) NOT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Tabela para Tipos de Perfis';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfis`
--

LOCK TABLES `perfis` WRITE;
/*!40000 ALTER TABLE `perfis` DISABLE KEYS */;
INSERT INTO `perfis` VALUES (1,'Administrador',1,'2018-05-24 22:00:00',1,'2018-05-24 22:00:00'),(2,'Coordenador',2,'2018-05-24 22:43:48',2,'2018-05-24 22:43:48'),(3,'Fisioterapeuta',2,'2018-05-24 22:44:05',2,'2018-05-24 22:44:05'),(4,'Secretaria',2,'2018-05-24 22:44:31',2,'2018-05-24 22:44:31'),(5,'Aluno',2,'2018-05-24 22:44:44',2,'2018-05-24 22:44:44'),(6,'Paciente',2,'2018-05-24 22:44:50',2,'2018-05-24 22:44:50'),(7,'Medico',2,'2018-05-24 22:44:56',2,'2018-05-24 22:44:56');
/*!40000 ALTER TABLE `perfis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfis_url`
--

DROP TABLE IF EXISTS `perfis_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfis_url` (
  `id_perfil_url` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_url` int(11) NOT NULL,
  `fk_id_perfil` int(11) NOT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfil_url`,`fk_id_url`,`fk_id_perfil`),
  KEY `fk_perfis_url_urls1_idx` (`fk_id_url`),
  KEY `fk_perfis_url_perfis1_idx` (`fk_id_perfil`),
  CONSTRAINT `fk_perfis_url_perfis1` FOREIGN KEY (`fk_id_perfil`) REFERENCES `perfis` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfis_url_urls1` FOREIGN KEY (`fk_id_url`) REFERENCES `urls` (`id_url`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfis_url`
--

LOCK TABLES `perfis_url` WRITE;
/*!40000 ALTER TABLE `perfis_url` DISABLE KEYS */;
INSERT INTO `perfis_url` VALUES (1,5,1,2,'2018-05-26 20:35:22',2,'2018-05-26 20:35:22'),(2,5,2,2,'2018-05-26 20:35:22',2,'2018-05-26 20:35:22'),(3,5,3,2,'2018-05-26 20:35:22',2,'2018-05-26 20:35:22'),(4,5,4,2,'2018-05-26 20:35:22',2,'2018-05-26 20:35:22'),(5,5,5,2,'2018-05-26 20:35:22',2,'2018-05-26 20:35:22'),(6,5,6,2,'2018-05-26 20:35:22',2,'2018-05-26 20:35:22'),(7,5,7,2,'2018-05-26 20:35:22',2,'2018-05-26 20:35:22'),(8,6,1,2,'2018-05-26 20:42:17',2,'2018-05-26 20:42:17'),(9,6,2,2,'2018-05-26 20:42:17',2,'2018-05-26 20:42:17'),(10,6,3,2,'2018-05-26 20:42:17',2,'2018-05-26 20:42:17'),(11,7,1,2,'2018-05-26 20:43:02',2,'2018-05-26 20:43:02'),(12,7,2,2,'2018-05-26 20:43:02',2,'2018-05-26 20:43:02'),(13,7,3,2,'2018-05-26 20:43:02',2,'2018-05-26 20:43:02'),(14,8,1,2,'2018-05-26 20:44:06',2,'2018-05-26 20:44:06'),(15,9,1,2,'2018-05-26 20:44:53',2,'2018-05-26 20:44:53'),(16,9,2,2,'2018-05-26 20:44:53',2,'2018-05-26 20:44:53'),(17,10,1,2,'2018-05-26 20:45:10',2,'2018-05-26 20:45:10'),(18,11,1,2,'2018-05-26 20:45:21',2,'2018-05-26 20:45:21'),(19,12,1,2,'2018-05-27 16:49:18',2,'2018-05-27 16:49:18'),(20,12,2,2,'2018-05-27 16:49:18',2,'2018-05-27 16:49:18'),(21,12,3,2,'2018-05-27 16:49:18',2,'2018-05-27 16:49:18'),(22,12,4,2,'2018-05-27 16:49:18',2,'2018-05-27 16:49:18'),(23,13,1,2,'2018-05-27 16:49:38',2,'2018-05-27 16:49:38'),(24,13,2,2,'2018-05-27 16:49:38',2,'2018-05-27 16:49:38'),(25,13,3,2,'2018-05-27 16:49:38',2,'2018-05-27 16:49:38'),(26,13,4,2,'2018-05-27 16:49:38',2,'2018-05-27 16:49:38'),(27,14,1,2,'2018-05-27 16:50:46',2,'2018-05-27 16:50:46'),(28,14,2,2,'2018-05-27 16:50:46',2,'2018-05-27 16:50:46'),(29,14,3,2,'2018-05-27 16:50:46',2,'2018-05-27 16:50:46'),(30,14,4,2,'2018-05-27 16:50:46',2,'2018-05-27 16:50:46'),(31,15,1,2,'2018-05-27 17:06:05',2,'2018-05-27 17:06:05'),(32,15,2,2,'2018-05-27 17:06:05',2,'2018-05-27 17:06:05'),(33,15,3,2,'2018-05-27 17:06:05',2,'2018-05-27 17:06:05'),(34,15,4,2,'2018-05-27 17:06:05',2,'2018-05-27 17:06:05'),(35,16,1,2,'2018-05-27 19:22:51',2,'2018-05-27 19:22:51'),(36,16,2,2,'2018-05-27 19:22:51',2,'2018-05-27 19:22:51'),(37,16,3,2,'2018-05-27 19:22:51',2,'2018-05-27 19:22:51'),(38,16,4,2,'2018-05-27 19:22:51',2,'2018-05-27 19:22:51'),(39,17,1,2,'2018-05-27 19:23:26',2,'2018-05-27 19:23:26'),(40,17,2,2,'2018-05-27 19:23:26',2,'2018-05-27 19:23:26'),(41,17,3,2,'2018-05-27 19:23:26',2,'2018-05-27 19:23:26'),(42,17,4,2,'2018-05-27 19:23:26',2,'2018-05-27 19:23:26'),(43,18,1,2,'2018-05-29 01:19:46',2,'2018-05-29 01:19:46'),(44,18,2,2,'2018-05-29 01:19:46',2,'2018-05-29 01:19:46'),(45,18,3,2,'2018-05-29 01:19:46',2,'2018-05-29 01:19:46'),(46,18,4,2,'2018-05-29 01:19:46',2,'2018-05-29 01:19:46'),(47,18,5,2,'2018-05-29 01:19:46',2,'2018-05-29 01:19:46'),(48,19,1,2,'2018-05-29 01:20:01',2,'2018-05-29 01:20:01'),(49,19,2,2,'2018-05-29 01:20:01',2,'2018-05-29 01:20:01'),(50,19,3,2,'2018-05-29 01:20:01',2,'2018-05-29 01:20:01'),(51,19,4,2,'2018-05-29 01:20:01',2,'2018-05-29 01:20:01'),(52,19,5,2,'2018-05-29 01:20:01',2,'2018-05-29 01:20:01'),(53,20,1,2,'2018-05-29 02:07:01',2,'2018-05-29 02:07:01'),(54,20,2,2,'2018-05-29 02:07:01',2,'2018-05-29 02:07:01'),(55,20,3,2,'2018-05-29 02:07:01',2,'2018-05-29 02:07:01'),(56,20,4,2,'2018-05-29 02:07:01',2,'2018-05-29 02:07:01'),(57,20,5,2,'2018-05-29 02:07:01',2,'2018-05-29 02:07:01'),(58,21,1,2,'2018-05-29 02:07:14',2,'2018-05-29 02:07:14'),(59,21,2,2,'2018-05-29 02:07:14',2,'2018-05-29 02:07:14'),(60,21,3,2,'2018-05-29 02:07:14',2,'2018-05-29 02:07:14'),(61,21,4,2,'2018-05-29 02:07:14',2,'2018-05-29 02:07:14'),(62,21,5,2,'2018-05-29 02:07:14',2,'2018-05-29 02:07:14'),(63,22,1,2,'2018-05-29 02:41:18',2,'2018-05-29 02:41:18'),(64,22,2,2,'2018-05-29 02:41:18',2,'2018-05-29 02:41:18'),(65,22,3,2,'2018-05-29 02:41:18',2,'2018-05-29 02:41:18'),(66,22,4,2,'2018-05-29 02:41:18',2,'2018-05-29 02:41:18'),(67,22,5,2,'2018-05-29 02:41:18',2,'2018-05-29 02:41:18'),(68,23,1,2,'2018-05-29 02:41:31',2,'2018-05-29 02:41:31'),(69,23,2,2,'2018-05-29 02:41:31',2,'2018-05-29 02:41:31'),(70,23,3,2,'2018-05-29 02:41:31',2,'2018-05-29 02:41:31'),(71,23,4,2,'2018-05-29 02:41:31',2,'2018-05-29 02:41:31'),(72,23,5,2,'2018-05-29 02:41:31',2,'2018-05-29 02:41:31'),(73,24,1,2,'2018-05-30 00:15:30',2,'2018-05-30 00:15:30'),(74,24,2,2,'2018-05-30 00:15:30',2,'2018-05-30 00:15:30'),(75,24,3,2,'2018-05-30 00:15:30',2,'2018-05-30 00:15:30'),(76,25,1,2,'2018-05-30 00:16:01',2,'2018-05-30 00:16:01'),(77,25,2,2,'2018-05-30 00:16:01',2,'2018-05-30 00:16:01'),(78,25,3,2,'2018-05-30 00:16:01',2,'2018-05-30 00:16:01'),(79,25,4,2,'2018-05-30 00:16:01',2,'2018-05-30 00:16:01'),(80,25,5,2,'2018-05-30 00:16:01',2,'2018-05-30 00:16:01');
/*!40000 ALTER TABLE `perfis_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas_triagem`
--

DROP TABLE IF EXISTS `perguntas_triagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perguntas_triagem` (
  `id_perguntas_triagem` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pilar` int(11) NOT NULL,
  `nome` text,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_perguntas_triagem`,`fk_id_pilar`),
  KEY `fk_perguntas_triagem_pilares1_idx` (`fk_id_pilar`),
  CONSTRAINT `fk_perguntas_triagem_pilares1` FOREIGN KEY (`fk_id_pilar`) REFERENCES `pilares` (`id_pilar`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas_triagem`
--

LOCK TABLES `perguntas_triagem` WRITE;
/*!40000 ALTER TABLE `perguntas_triagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `perguntas_triagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pessoa` varchar(100) NOT NULL,
  `data_nascimento` varchar(15) NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `criado_por` int(11) NOT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='Tabela de Usuários. Referente aos dados pessoais do usuário';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (1,'Michael Douglas Soares','10/01/1994','M','079.422.139-43','12.559.554-5','michaeldouglas.10.94@gmail.com','1',1,'2018-05-24 22:00:00',1,'2018-05-24 22:00:00'),(25,'Bruno Paula Mendes','1997-10-15','M','875-121-518-18','12-151-818-1','bruno@gmail.com','1',2,'2018-05-27 16:59:37',21,'2018-05-27 17:18:35'),(26,'Patricia Rucker de Bassi','1970-10-15','M','515-184-848-48','51-515-151-5','patricia@gmail.com','1',21,'2018-05-27 17:07:09',21,'2018-05-27 17:17:18'),(27,'Katren Almeida','1985-10-10','M','515-184-848-48','51-515-515-1','katren@gmail.com','1',21,'2018-05-27 17:22:35',21,'2018-05-27 17:22:35'),(28,'Angela Zatti','1985-10-15','M','151-518-181-81','51-545-454-5','angela@gmail.com','1',21,'2018-05-27 17:24:06',2,'2018-05-27 23:16:52'),(29,'Karina Fernanda Grochoski','1990-01-13','M','645-484-545-15','81-815-445-4','karina.grochoski@gmail.com','1',2,'2018-05-28 22:33:32',2,'2018-05-28 22:33:32'),(30,'Carlos Marquioni','1970-10-15','M','151-518-181-81','54-545-484-8','carlos@gmail.com','0',2,'2018-05-28 23:16:03',2,'2018-05-29 01:46:18'),(31,'Cintia Alves Silva','1975-10-10','M','849-646-495-95','56-484-845-4','cintia@utp.com.br','0',21,'2018-05-28 23:17:46',21,'2018-05-28 23:44:43');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pilares`
--

DROP TABLE IF EXISTS `pilares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pilares` (
  `id_pilar` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pilar` varchar(255) DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pilar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pilares`
--

LOCK TABLES `pilares` WRITE;
/*!40000 ALTER TABLE `pilares` DISABLE KEYS */;
/*!40000 ALTER TABLE `pilares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissionais`
--

DROP TABLE IF EXISTS `profissionais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profissionais` (
  `id_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoa` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `conselho` varchar(45) DEFAULT NULL,
  `numero_conselho` varchar(45) DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_profissional`,`fk_id_pessoa`),
  KEY `fk_profissionais_pessoas1_idx` (`fk_id_pessoa`),
  CONSTRAINT `fk_profissionais_pessoas1` FOREIGN KEY (`fk_id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissionais`
--

LOCK TABLES `profissionais` WRITE;
/*!40000 ALTER TABLE `profissionais` DISABLE KEYS */;
/*!40000 ALTER TABLE `profissionais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefones`
--

DROP TABLE IF EXISTS `telefones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefones` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_pessoa` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `contato` varchar(45) NOT NULL,
  `criado_por` int(11) NOT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_telefone`,`fk_id_pessoa`),
  KEY `fk_telefones_usuarios1_idx` (`fk_id_pessoa`),
  CONSTRAINT `fk_telefones_usuarios1` FOREIGN KEY (`fk_id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='Tabela de telefones dos usuários';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefones`
--

LOCK TABLES `telefones` WRITE;
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
INSERT INTO `telefones` VALUES (23,25,'(84) 5151-1515','(84) 84848-4848','(84) 84848-4848',2,'2018-05-27 16:59:37',2,'2018-05-27 16:59:37'),(24,26,'(64) 6464-5545','(18) 18181-8181','(51) 51515-5151',21,'2018-05-27 17:07:09',21,'2018-05-27 17:07:09'),(25,27,'(84) 5151-5151','(12) 12121-1515','(51) 55155-1511',21,'2018-05-27 17:22:35',21,'2018-05-27 17:22:35'),(26,28,'(81) 6565-9494','(65) 65656-5665','(41) 56548-4848',21,'2018-05-27 17:24:06',21,'2018-05-27 17:24:06'),(27,29,'(41) 6584-5454','(41) 99686-5548','(41) 99603-2030',2,'2018-05-28 22:33:32',2,'2018-05-28 22:33:32'),(28,30,'(41) 3152-4584','(41) 99655-8874','(41) 88447-7888',2,'2018-05-28 23:16:03',2,'2018-05-28 23:16:03'),(29,31,'(41) 3154-8754','(41) 99654-8484','(41) 99656-5484',21,'2018-05-28 23:17:46',21,'2018-05-28 23:17:46');
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `triagem_paciente`
--

DROP TABLE IF EXISTS `triagem_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `triagem_paciente` (
  `id_triagem_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_paciente` int(11) NOT NULL,
  `diagnostico_clinico` text,
  `exames_complementares` text,
  `criado_por` int(11) NOT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_triagem_paciente`,`fk_id_paciente`),
  KEY `fk_triagem_paciente_pessoas1_idx` (`fk_id_paciente`),
  CONSTRAINT `fk_triagem_paciente_pessoas1` FOREIGN KEY (`fk_id_paciente`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `triagem_paciente`
--

LOCK TABLES `triagem_paciente` WRITE;
/*!40000 ALTER TABLE `triagem_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `triagem_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `triagem_paciente_especialidade`
--

DROP TABLE IF EXISTS `triagem_paciente_especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `triagem_paciente_especialidade` (
  `id_triagem_paciente_especialidade` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_especialidade` int(11) NOT NULL,
  `fk_triagem_paciente` int(11) NOT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_triagem_paciente_especialidade`,`fk_id_especialidade`,`fk_triagem_paciente`),
  KEY `fk_triagem_paciente_especialidade_especialidades1_idx` (`fk_id_especialidade`),
  KEY `fk_triagem_paciente_especialidade_triagem_paciente1_idx` (`fk_triagem_paciente`),
  CONSTRAINT `fk_triagem_paciente_especialidade_especialidades1` FOREIGN KEY (`fk_id_especialidade`) REFERENCES `especialidades` (`id_especialidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_triagem_paciente_especialidade_triagem_paciente1` FOREIGN KEY (`fk_triagem_paciente`) REFERENCES `triagem_paciente` (`id_triagem_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `triagem_paciente_especialidade`
--

LOCK TABLES `triagem_paciente_especialidade` WRITE;
/*!40000 ALTER TABLE `triagem_paciente_especialidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `triagem_paciente_especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `triagem_paciente_perguntas_fronteira`
--

DROP TABLE IF EXISTS `triagem_paciente_perguntas_fronteira`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `triagem_paciente_perguntas_fronteira` (
  `id_triagem_paciente_perguntas_fronteira` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_triagem_paciente` int(11) NOT NULL,
  `fk_id_pergunta_triagem` int(11) NOT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_triagem_paciente_perguntas_fronteira`,`fk_id_triagem_paciente`,`fk_id_pergunta_triagem`),
  KEY `fk_triagem_paciente_perguntas_fronteira_triagem_paciente1_idx` (`fk_id_triagem_paciente`),
  KEY `fk_triagem_paciente_perguntas_fronteira_perguntas_triagem1_idx` (`fk_id_pergunta_triagem`),
  CONSTRAINT `fk_triagem_paciente_perguntas_fronteira_perguntas_triagem1` FOREIGN KEY (`fk_id_pergunta_triagem`) REFERENCES `perguntas_triagem` (`id_perguntas_triagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_triagem_paciente_perguntas_fronteira_triagem_paciente1` FOREIGN KEY (`fk_id_triagem_paciente`) REFERENCES `triagem_paciente` (`id_triagem_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `triagem_paciente_perguntas_fronteira`
--

LOCK TABLES `triagem_paciente_perguntas_fronteira` WRITE;
/*!40000 ALTER TABLE `triagem_paciente_perguntas_fronteira` DISABLE KEYS */;
/*!40000 ALTER TABLE `triagem_paciente_perguntas_fronteira` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_de_saude`
--

DROP TABLE IF EXISTS `unidades_de_saude`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidades_de_saude` (
  `id_unidade_de_saude` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_unidade_de_saude`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_de_saude`
--

LOCK TABLES `unidades_de_saude` WRITE;
/*!40000 ALTER TABLE `unidades_de_saude` DISABLE KEYS */;
INSERT INTO `unidades_de_saude` VALUES (1,'Unidade de Saude Itaqui',21,'2018-05-28 01:00:31',21,'2018-05-29 03:35:39'),(2,'Unidade de Saúde Águas de Lindóia',21,'2018-05-28 01:12:08',21,'2018-05-29 22:48:17'),(3,'Unidade de Saúde São Bras',21,'2018-05-28 01:13:19',21,'2018-05-28 01:13:19'),(4,'Unidade de Saúde Santa Felicidade',2,'2018-05-28 21:52:47',2,'2018-05-28 21:52:47'),(5,'Unidade de Saúde Santa Lúzia',2,'2018-05-28 21:54:00',2,'2018-05-29 02:28:37'),(8,'Unidade de Saúde São Cristóvão',2,'2018-05-29 03:36:36',2,'2018-05-29 03:36:36');
/*!40000 ALTER TABLE `unidades_de_saude` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urls`
--

DROP TABLE IF EXISTS `urls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `urls` (
  `id_url` int(11) NOT NULL AUTO_INCREMENT,
  `nome_url` varchar(45) DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_url`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urls`
--

LOCK TABLES `urls` WRITE;
/*!40000 ALTER TABLE `urls` DISABLE KEYS */;
INSERT INTO `urls` VALUES (5,'/home',2,'2018-05-26 20:35:22',2,'2018-05-26 20:35:22'),(6,'/pessoas/cadastrar',2,'2018-05-26 20:42:17',2,'2018-05-26 20:42:17'),(7,'/pessoas/visualizar',2,'2018-05-26 20:43:02',2,'2018-05-26 20:43:02'),(8,'/perfis/cadastrar',2,'2018-05-26 20:44:06',2,'2018-05-26 20:44:06'),(9,'/perfis/visualizar',2,'2018-05-26 20:44:53',2,'2018-05-26 20:44:53'),(10,'/urls/cadastrar',2,'2018-05-26 20:45:10',2,'2018-05-26 20:45:10'),(11,'/urls/visualizar',2,'2018-05-26 20:45:20',2,'2018-05-26 20:45:20'),(12,'/pessoas/buscaPessoaParaEdicao',2,'2018-05-27 16:49:18',2,'2018-05-27 16:49:18'),(13,'/pessoas/buscaPessoaParaExclusao',2,'2018-05-27 16:49:38',2,'2018-05-27 16:49:38'),(14,'/pessoas/excluir',2,'2018-05-27 16:50:46',2,'2018-05-27 16:50:46'),(15,'/pessoas/buscaCep',2,'2018-05-27 17:06:05',2,'2018-05-27 17:06:05'),(16,'/unidades/cadastrar',2,'2018-05-27 19:22:51',2,'2018-05-27 19:22:51'),(17,'/unidades/visualizar',2,'2018-05-27 19:23:26',2,'2018-05-27 19:23:26'),(18,'/unidades/buscaUnidadeParaEdicao',2,'2018-05-29 01:19:46',2,'2018-05-29 01:19:46'),(19,'/unidades/buscaUnidadeParaExclusao',2,'2018-05-29 01:20:01',2,'2018-05-29 01:20:01'),(20,'/unidades/editar',2,'2018-05-29 02:07:01',2,'2018-05-29 02:07:01'),(21,'/unidades/excluir',2,'2018-05-29 02:07:14',2,'2018-05-29 02:07:14'),(22,'/pacientes/cadastrar',2,'2018-05-29 02:41:18',2,'2018-05-29 02:41:18'),(23,'/pacientes/visualizar',2,'2018-05-29 02:41:31',2,'2018-05-29 02:41:31'),(24,'/especialidades/cadastrar',2,'2018-05-30 00:15:30',2,'2018-05-30 00:15:30'),(25,'/especialidades/visualizar',2,'2018-05-30 00:16:01',2,'2018-05-30 00:16:01');
/*!40000 ALTER TABLE `urls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_perfil` int(11) NOT NULL,
  `fk_id_pessoa` int(11) NOT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_por` int(11) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`fk_id_perfil`,`fk_id_pessoa`),
  KEY `fk_usuarios_perfis1_idx` (`fk_id_perfil`),
  KEY `fk_usuarios_pessoas1_idx` (`fk_id_pessoa`),
  CONSTRAINT `fk_usuarios_perfis1` FOREIGN KEY (`fk_id_perfil`) REFERENCES `perfis` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_pessoas1` FOREIGN KEY (`fk_id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,1,1,'4939beb1d70c4e08281e725797366ee8',1,'2018-05-24 22:00:00',1,'2018-05-24 22:00:00'),(21,2,25,'202cb962ac59075b964b07152d234b70',2,'2018-05-27 16:59:37',2,'2018-05-27 16:59:37'),(22,3,26,NULL,21,'2018-05-27 17:07:10',21,'2018-05-27 17:07:10'),(23,3,27,NULL,21,'2018-05-27 17:22:35',21,'2018-05-27 17:22:35'),(24,4,28,NULL,21,'2018-05-27 17:24:06',21,'2018-05-27 17:24:06'),(25,6,29,NULL,2,'2018-05-28 22:33:32',2,'2018-05-28 22:33:32'),(26,7,30,NULL,2,'2018-05-28 23:16:03',2,'2018-05-28 23:16:03'),(27,4,31,NULL,21,'2018-05-28 23:17:46',21,'2018-05-28 23:17:46');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-29 21:41:29