-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: financas
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `financas`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `financas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `financas`;

--
-- Temporary view structure for view `V_10MaioresGastos`
--

DROP TABLE IF EXISTS `V_10MaioresGastos`;
/*!50001 DROP VIEW IF EXISTS `V_10MaioresGastos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `V_10MaioresGastos` AS SELECT 
 1 AS `DATA`,
 1 AS `descricao`,
 1 AS `valor`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `V_GASTOS_CATEGORIA_TUDO`
--

DROP TABLE IF EXISTS `V_GASTOS_CATEGORIA_TUDO`;
/*!50001 DROP VIEW IF EXISTS `V_GASTOS_CATEGORIA_TUDO`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `V_GASTOS_CATEGORIA_TUDO` AS SELECT 
 1 AS `CATEGORIA`,
 1 AS `total`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `V_Gastos_Categoria_CC`
--

DROP TABLE IF EXISTS `V_Gastos_Categoria_CC`;
/*!50001 DROP VIEW IF EXISTS `V_Gastos_Categoria_CC`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `V_Gastos_Categoria_CC` AS SELECT 
 1 AS `categoria`,
 1 AS `valor`,
 1 AS `COMPRAS_NESSA_CATEGORIA`,
 1 AS `MEDIA`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `V_GestosPorData`
--

DROP TABLE IF EXISTS `V_GestosPorData`;
/*!50001 DROP VIEW IF EXISTS `V_GestosPorData`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `V_GestosPorData` AS SELECT 
 1 AS `DATA`,
 1 AS `GestosPorData`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `V_PARCELAMENTOS_TOTAL_ANO_ATUAL`
--

DROP TABLE IF EXISTS `V_PARCELAMENTOS_TOTAL_ANO_ATUAL`;
/*!50001 DROP VIEW IF EXISTS `V_PARCELAMENTOS_TOTAL_ANO_ATUAL`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `V_PARCELAMENTOS_TOTAL_ANO_ATUAL` AS SELECT 
 1 AS `MES`,
 1 AS `VALOR`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `V_TOTAL_DESPESA_ANO_CORRENTE`
--

DROP TABLE IF EXISTS `V_TOTAL_DESPESA_ANO_CORRENTE`;
/*!50001 DROP VIEW IF EXISTS `V_TOTAL_DESPESA_ANO_CORRENTE`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `V_TOTAL_DESPESA_ANO_CORRENTE` AS SELECT 
 1 AS `MES`,
 1 AS `TOTAL_DESPESA`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `V_TOTAL_RECEITA_ANO_CORRENTE`
--

DROP TABLE IF EXISTS `V_TOTAL_RECEITA_ANO_CORRENTE`;
/*!50001 DROP VIEW IF EXISTS `V_TOTAL_RECEITA_ANO_CORRENTE`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `V_TOTAL_RECEITA_ANO_CORRENTE` AS SELECT 
 1 AS `MES`,
 1 AS `TOTAL_RECEITA`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'ALIMENTACAO','DESPESAS COM ALIMENTACAO.\r\n'),(2,'CONDOMINIO','DESPESAS DE COIDOMINIO.'),(3,'ENERGIA ELETRICA','CONTAS DA CEMIG.'),(4,'SAÚDE','SAÚDE'),(5,'PRESENTE','PRESENTES'),(6,'CASA','COMPRAS PARA CASA'),(7,'IMPOSTOS','DIVIDAS COM IMPOSTOS DIVERSOS.'),(8,'TELEFONE','GASTOS COM TELEFONE'),(9,'AUTOMOVEL','DESPESAS COM AUTOMOVEL'),(10,'VESTUARIO','SAPATOS,ROUPAS,ETC'),(11,'ELETRÔNICOS','INFORMATICA'),(12,'COSMETICOS','PRODUTOS DE BELEZA'),(13,'FILHO','DESPESAS COM O HERDEIRO'),(14,'SUPERMERCADO','COMPRAS PARA CASA'),(15,'COMBUSTIVEL','COMBUSTIVEL'),(16,'SALAO BELEZA','CORTES,UNHAS,ETC'),(17,'ENTRETERIMENTO','CINEMAS E TEATROS,ETC'),(18,'OUTROS','OUTROS'),(19,'EDUCAÇÃO','DESPESAS COM EDUCAÇÃO'),(20,'TRANSPORTE','DESPESAS TRANSPORTE'),(21,'ANTECIPAÇÃO APTO','ANTECIPAÇÃO DAS PARCELAS DO APTO'),(23,'PRESTAÇÃO APTO','Zenite'),(24,'ALUGUEL PROGRESO REPASSE','Repasse'),(25,'CARTÃO CRÉDITO PREVISÃO','CC'),(26,'LAZER','DESPESA COM LAZER'),(28,'SERVIÇOS','SERVIcOS'),(29,'VIAGEM','VIAGEM'),(30,'RESTAURANTE','RESTAURANTE');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_receita`
--

DROP TABLE IF EXISTS `categoria_receita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_receita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_receita`
--

LOCK TABLES `categoria_receita` WRITE;
/*!40000 ALTER TABLE `categoria_receita` DISABLE KEYS */;
INSERT INTO `categoria_receita` VALUES (1,'Salário ALMG','s/o'),(2,'Férias ALMG','s/o'),(3,'Décimo Terceiro ALMG','s/o'),(4,'Salário Cotemig','s/o'),(5,'Férias Cotemig','s/o'),(6,'Décimo Terceiro Cotemig','s/o'),(7,'Retroativos','s/o'),(8,'Outros','s/o'),(9,'Férias Prêmio','s/o'),(12,'Aluguel','Aluguel');
/*!40000 ALTER TABLE `categoria_receita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config` (
  `ultima_data_upload` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contas`
--

DROP TABLE IF EXISTS `contas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contas` (
  `CONTA` varchar(255) NOT NULL,
  `DESC_CONTAS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas`
--

LOCK TABLES `contas` WRITE;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
INSERT INTO `contas` VALUES ('KIKI','CONTA DA KIKI'),('SAUER','CONTA DO SAUER'),('AMBOS','AMBAS AS CONTAS SERÃO COMPARTILHADAS.'),('KIKI','CONTA DA KIKI'),('SAUER','CONTA DO SAUER'),('AMBOS','AMBAS AS CONTAS SERÃO COMPARTILHADAS.');
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pagamento`
--

DROP TABLE IF EXISTS `forma_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forma_pagamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FORMA_PAGAMENTO` varchar(255) NOT NULL,
  `DESC_FORMA_PAGAMENTO` varchar(255) NOT NULL,
  `TIPO` enum('CC','D','PIX') CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `DIA_FECHAMENTO_FATURA_CC` smallint DEFAULT NULL,
  `DIA_VENCIMENTO_CC` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pagamento`
--

LOCK TABLES `forma_pagamento` WRITE;
/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
INSERT INTO `forma_pagamento` VALUES (1,'DEBITO LU BB','DEBITO NO BB DO LU.','D',NULL,NULL),(3,'CC_NUBANK','CARTÃO DE CREDITO NUBANK','CC',3,10),(4,'DEBITO LU BB','DEBITO NO BB DO LU.','D',NULL,NULL),(8,'CC_INTER','CARTÃO CRÉDITO INTER','CC',3,10),(12,'Debito Caixa','Debito na Caixa','D',1,1);
/*!40000 ALTER TABLE `forma_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `COD_LOGS` int unsigned NOT NULL AUTO_INCREMENT,
  `COD_USUARIOS_SISTEMA` varchar(255) DEFAULT NULL,
  `DATA_LOGS` date DEFAULT NULL,
  `HORA_LOGS` datetime DEFAULT NULL,
  `TIPO_LOGS` varchar(255) DEFAULT NULL,
  `ACAO` varchar(255) DEFAULT NULL,
  `IP_LOGS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`COD_LOGS`)
) ENGINE=InnoDB AUTO_INCREMENT=399 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (315,'admin','2022-06-29','2022-06-29 15:13:30','AUTENTICACAO','SUCESSO','172.20.36.58'),(316,'admin','2022-06-29','2022-06-29 15:42:35','AUTENTICACAO','SUCESSO','172.20.36.58'),(317,'admin','2022-06-29','2022-06-29 17:02:05','AUTENTICACAO','SUCESSO','172.20.36.58'),(318,'admin','2022-06-29','2022-06-29 17:05:05','NOVA MOVIMENTACAO RECEITA','SUCESSO','172.20.36.58'),(319,'admin','2022-06-29','2022-06-29 17:05:52','NOVA MOVIMENTACAO RECEITA','SUCESSO','172.20.36.58'),(320,'admin','2022-06-29','2022-06-29 17:06:48','NOVA MOVIMENTACAO RECEITA','SUCESSO','172.20.36.58'),(321,'admin','2022-06-29','2022-06-29 17:07:30','NOVA MOVIMENTACAO RECEITA','SUCESSO','172.20.36.58'),(322,'admin','2022-06-29','2022-06-29 17:09:13','NOVA MOVIMENTACAO','SUCESSO','172.20.36.58'),(323,'admin','2022-06-29','2022-06-29 17:10:17','NOVA MOVIMENTACAO','SUCESSO','172.20.36.58'),(324,'admin','2022-06-30','2022-06-30 13:51:08','AUTENTICACAO','SUCESSO','127.0.0.1'),(325,'admin','2022-06-30','2022-06-30 14:02:30','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(326,'admin','2022-06-30','2022-06-30 14:03:29','EDICAO RECEITA','SUCESSO','127.0.0.1'),(327,'admin','2022-06-30','2022-06-30 14:03:43','EDICAO RECEITA','SUCESSO','127.0.0.1'),(328,'admin','2022-06-30','2022-06-30 14:11:20','EDICAO RECEITA','SUCESSO','127.0.0.1'),(329,'admin','2022-06-30','2022-06-30 14:13:50','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(330,'admin','2022-06-30','2022-06-30 14:17:28','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(331,'admin','2022-06-30','2022-06-30 14:18:12','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(332,'admin','2022-06-30','2022-06-30 14:19:25','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(333,'admin','2022-06-30','2022-06-30 14:52:58','SAIDA_SISTEMA','SUCESSO','127.0.0.1'),(334,'admin','2022-06-30','2022-06-30 14:53:00','AUTENTICACAO','SUCESSO','127.0.0.1'),(335,'admin','2022-06-30','2022-06-30 15:38:49','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(336,'admin','2022-06-30','2022-06-30 15:46:15','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(337,'admin','2022-06-30','2022-06-30 15:48:55','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(338,'admin','2022-06-30','2022-06-30 17:13:13','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(339,'admin','2022-06-30','2022-06-30 17:13:38','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(340,'admin','2022-07-01','2022-07-01 13:03:23','AUTENTICACAO','SUCESSO','127.0.0.1'),(341,'admin','2022-07-01','2022-07-01 13:03:29','SAIDA_SISTEMA','SUCESSO','127.0.0.1'),(342,'admin','2022-07-01','2022-07-01 13:03:31','AUTENTICACAO','SUCESSO','127.0.0.1'),(343,'admin','2022-07-01','2022-07-01 14:12:00','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(344,'admin','2022-07-01','2022-07-01 14:28:49','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(345,'','2022-07-01','2022-07-01 14:28:53','EXCLUSAO DE FORMA DE PAGAMENTO','SUCESSO','127.0.0.1'),(346,'admin','2022-07-01','2022-07-01 14:29:18','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(347,'','2022-07-01','2022-07-01 14:29:20','EXCLUSAO DE FORMA DE PAGAMENTO','SUCESSO','127.0.0.1'),(348,'admin','2022-07-01','2022-07-01 15:09:48','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(349,'admin','2022-07-01','2022-07-01 15:10:14','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(350,'admin','2022-07-01','2022-07-01 15:48:33','SAIDA_SISTEMA','SUCESSO','127.0.0.1'),(351,'admin','2022-07-01','2022-07-01 15:48:34','AUTENTICACAO','SUCESSO','127.0.0.1'),(352,'admin','2022-07-01','2022-07-01 15:48:46','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(353,'','2022-07-01','2022-07-01 15:48:55','EXCLUSAO DE FORMA DE PAGAMENTO','SUCESSO','127.0.0.1'),(354,'admin','2022-07-01','2022-07-01 15:51:07','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(355,'','2022-07-01','2022-07-01 15:51:10','EXCLUSAO DE Categorias de Receitas','SUCESSO','127.0.0.1'),(356,'admin','2022-07-01','2022-07-01 16:05:08','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(357,'','2022-07-01','2022-07-01 16:05:47','EXCLUSAO DE Categorias de Receitas','SUCESSO','127.0.0.1'),(358,'admin','2022-07-01','2022-07-01 16:16:44','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(359,'admin','2022-07-01','2022-07-01 16:17:36','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(360,'admin','2022-07-01','2022-07-01 16:18:09','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(361,'admin','2022-07-01','2022-07-01 16:20:57','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(362,'admin','2022-07-01','2022-07-01 16:22:06','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(363,'admin','2022-07-01','2022-07-01 16:23:21','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(364,'admin','2022-07-01','2022-07-01 16:24:01','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(365,'admin','2022-07-01','2022-07-01 16:25:34','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(366,'admin','2022-07-01','2022-07-01 16:26:16','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(367,'admin','2022-07-01','2022-07-01 16:27:11','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(368,'admin','2022-07-01','2022-07-01 16:27:42','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(369,'admin','2022-07-01','2022-07-01 16:28:27','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(370,'admin','2022-07-01','2022-07-01 16:29:06','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(371,'admin','2022-07-01','2022-07-01 16:29:45','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(372,'admin','2022-07-01','2022-07-01 16:31:07','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(373,'admin','2022-07-01','2022-07-01 16:31:37','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(374,'admin','2022-07-01','2022-07-01 16:32:48','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(375,'admin','2022-07-01','2022-07-01 16:33:39','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(376,'admin','2022-07-01','2022-07-01 16:34:39','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(377,'admin','2022-07-01','2022-07-01 16:36:13','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(378,'admin','2022-07-01','2022-07-01 17:11:25','AUTENTICACAO','SUCESSO','127.0.0.1'),(379,'admin','2022-07-04','2022-07-04 13:17:02','AUTENTICACAO','SUCESSO','127.0.0.1'),(380,'admin','2022-07-04','2022-07-04 14:41:15','AUTENTICACAO','SUCESSO','127.0.0.1'),(381,'admin','2022-07-04','2022-07-04 14:44:06','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(382,'admin','2022-07-04','2022-07-04 14:44:33','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(383,'admin','2022-07-04','2022-07-04 14:56:45','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(384,'admin','2022-07-04','2022-07-04 14:58:18','CRIACAO DE FORMA DE PAGAMENTOS','SUCESSO','127.0.0.1'),(385,'admin','2022-07-04','2022-07-04 15:00:00','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(386,'admin','2022-07-04','2022-07-04 15:16:16','SAIDA_SISTEMA','SUCESSO','127.0.0.1'),(387,'admin','2022-07-04','2022-07-04 15:16:17','AUTENTICACAO','SUCESSO','127.0.0.1'),(388,'admin','2022-07-04','2022-07-04 17:13:38','AUTENTICACAO','SUCESSO','127.0.0.1'),(389,'admin','2022-07-05','2022-07-05 11:40:41','AUTENTICACAO','SUCESSO','127.0.0.1'),(390,'admin','2022-07-05','2022-07-05 15:24:17','AUTENTICACAO','SUCESSO','127.0.0.1'),(391,'admin','2022-07-05','2022-07-05 15:27:09','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(392,'admin','2022-07-05','2022-07-05 15:29:54','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(393,'admin','2022-07-05','2022-07-05 15:39:28','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(394,'admin','2022-07-05','2022-07-05 15:40:11','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(395,'admin','2022-07-05','2022-07-05 15:42:00','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(396,'admin','2022-07-05','2022-07-05 16:18:55','AUTENTICACAO','SUCESSO','127.0.0.1'),(397,'admin','2022-07-05','2022-07-05 17:25:01','AUTENTICACAO','SUCESSO','127.0.0.1'),(398,'admin','2022-07-06','2022-07-06 12:24:33','AUTENTICACAO','SUCESSO','127.0.0.1');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimentacoes`
--

DROP TABLE IF EXISTS `movimentacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimentacoes` (
  `idFINANCAS` int unsigned NOT NULL AUTO_INCREMENT,
  `TIPO` varchar(255) DEFAULT NULL,
  `DESCRICAO` varchar(255) DEFAULT NULL,
  `VALOR` decimal(15,2) NOT NULL DEFAULT '0.00',
  `CATEGORIA` varchar(255) NOT NULL,
  `DATA_PAGAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date DEFAULT NULL,
  `FORMA_PAGAMENTO` varchar(255) DEFAULT NULL,
  `CONTA` varchar(255) NOT NULL,
  `PARCELA` varchar(255) NOT NULL,
  `PARCELADO` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `SITUACAO` varchar(255) NOT NULL,
  `USOU_CC` tinyint DEFAULT NULL,
  PRIMARY KEY (`idFINANCAS`)
) ENGINE=InnoDB AUTO_INCREMENT=936 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimentacoes`
--

LOCK TABLES `movimentacoes` WRITE;
/*!40000 ALTER TABLE `movimentacoes` DISABLE KEYS */;
INSERT INTO `movimentacoes` VALUES (742,'Receitas','Salário ALMG (1/12)',14400.00,'Salário ALMG','1999-01-01','2022-01-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(743,'Receitas','Salário ALMG (2/12)',14400.00,'Salário ALMG','2022-02-01','2022-02-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(744,'Receitas','Salário ALMG (3/12)',14400.00,'Salário ALMG','2022-03-01','2022-03-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(745,'Receitas','Salário ALMG (4/12)',14400.00,'Salário ALMG','2022-04-01','2022-04-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(746,'Receitas','Salário ALMG (5/12)',14400.00,'Salário ALMG','2022-05-01','2022-05-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(747,'Receitas','Salário ALMG (6/12)',14400.00,'Salário ALMG','2022-06-01','2022-06-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(748,'Receitas','Salário ALMG (7/12)',14400.00,'Salário ALMG','2022-07-04','2022-07-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PAGO',NULL),(749,'Receitas','Salário ALMG (8/12)',14400.00,'Salário ALMG','2022-08-01','2022-08-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(750,'Receitas','Salário ALMG (9/12)',14400.00,'Salário ALMG','2022-09-01','2022-09-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(751,'Receitas','Salário ALMG (10/12)',14400.00,'Salário ALMG','2022-10-01','2022-10-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(752,'Receitas','Salário ALMG (11/12)',14400.00,'Salário ALMG','2022-11-01','2022-11-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(753,'Receitas','Salário ALMG (12/12)',14400.00,'Salário ALMG','2022-12-01','2022-12-01','Depósito em Conta Corente','Lu','12','74ea058327074dda61303774c2963ae2','PENDENTE',NULL),(754,'Receitas','Salário COTEMIG (1/11)',3000.00,'Salário Cotemig','1999-01-01','2022-02-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(755,'Receitas','Salário COTEMIG (2/11)',3000.00,'Salário Cotemig','2022-03-08','2022-03-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(756,'Receitas','Salário COTEMIG (3/11)',3000.00,'Salário Cotemig','2022-04-08','2022-04-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(757,'Receitas','Salário COTEMIG (4/11)',3000.00,'Salário Cotemig','2022-05-08','2022-05-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(758,'Receitas','Salário COTEMIG (5/11)',3000.00,'Salário Cotemig','2022-06-08','2022-06-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(759,'Receitas','Salário COTEMIG (6/11)',3000.00,'Salário Cotemig','0000-01-01','2022-07-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(760,'Receitas','Salário COTEMIG (7/11)',3000.00,'Salário Cotemig','2022-08-08','2022-08-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(761,'Receitas','Salário COTEMIG (8/11)',3000.00,'Salário Cotemig','2022-09-08','2022-09-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(762,'Receitas','Salário COTEMIG (9/11)',3000.00,'Salário Cotemig','2022-10-08','2022-10-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(763,'Receitas','Salário COTEMIG (10/11)',3000.00,'Salário Cotemig','2022-11-08','2022-11-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(764,'Receitas','Salário COTEMIG (11/11)',3000.00,'Salário Cotemig','2022-12-08','2022-12-08','Depósito em Conta Corente','Lu','11','71ebfe48cab9b7eb2b5507e3d910c69f','PENDENTE',NULL),(765,'Despesas','Batista - Theus (1/12)',1422.00,'EDUCAÇÃO','2022-07-01','2022-01-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PAGO',0),(766,'Despesas','Batista - Theus (2/12)',1422.00,'EDUCAÇÃO','2022-07-01','2022-02-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PAGO',0),(767,'Despesas','Batista - Theus (3/12)',1422.00,'EDUCAÇÃO','2022-07-01','2022-03-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PAGO',0),(768,'Despesas','Batista - Theus (4/12)',1422.00,'EDUCAÇÃO',NULL,'2022-04-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PENDENTE',0),(769,'Despesas','Batista - Theus (5/12)',1422.00,'EDUCAÇÃO',NULL,'2022-05-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PENDENTE',0),(770,'Despesas','Batista - Theus (6/12)',1422.00,'EDUCAÇÃO',NULL,'2022-06-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PENDENTE',0),(771,'Despesas','Batista - Theus (7/12)',1422.00,'EDUCAÇÃO','2022-07-01','2022-07-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PAGO',0),(772,'Despesas','Batista - Theus (8/12)',1422.00,'EDUCAÇÃO',NULL,'2022-08-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PENDENTE',0),(773,'Despesas','Batista - Theus (9/12)',1422.00,'EDUCAÇÃO',NULL,'2022-09-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PENDENTE',0),(774,'Despesas','Batista - Theus (10/12)',1422.00,'EDUCAÇÃO',NULL,'2022-10-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PENDENTE',0),(775,'Despesas','Batista - Theus (11/12)',1422.00,'EDUCAÇÃO',NULL,'2022-11-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PENDENTE',0),(776,'Despesas','Batista - Theus (12/12)',1422.00,'EDUCAÇÃO',NULL,'2022-12-05','DEBITO LU BB','Lu','12','8e2cf8be06bf2bc3246728fe650025df','PENDENTE',0),(777,'Despesas','Apto Zenite (1/12)',3000.00,'Prestação APTO','2022-07-01','2022-01-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PAGO',0),(778,'Despesas','Apto Zenite (2/12)',3000.00,'Prestação APTO','2022-07-01','2022-02-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PAGO',0),(779,'Despesas','Apto Zenite (3/12)',3000.00,'Prestação APTO','2022-07-01','2022-03-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PAGO',0),(780,'Despesas','Apto Zenite (4/12)',3000.00,'Prestação APTO',NULL,'2022-04-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PENDENTE',0),(781,'Despesas','Apto Zenite (5/12)',3000.00,'Prestação APTO',NULL,'2022-05-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PENDENTE',0),(782,'Despesas','Apto Zenite (6/12)',3000.00,'Prestação APTO',NULL,'2022-06-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PENDENTE',0),(783,'Despesas','Apto Zenite (7/12)',3000.00,'Prestação APTO','2022-07-01','2022-07-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PAGO',0),(784,'Despesas','Apto Zenite (8/12)',3000.00,'Prestação APTO',NULL,'2022-08-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PENDENTE',0),(785,'Despesas','Apto Zenite (9/12)',3000.00,'Prestação APTO',NULL,'2022-09-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PENDENTE',0),(786,'Despesas','Apto Zenite (10/12)',3000.00,'Prestação APTO',NULL,'2022-10-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PENDENTE',0),(787,'Despesas','Apto Zenite (11/12)',3000.00,'Prestação APTO',NULL,'2022-11-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PENDENTE',0),(788,'Despesas','Apto Zenite (12/12)',3000.00,'Prestação APTO',NULL,'2022-12-10','Debito Caixa','Lu','12','79b50152bbe36861c3810e24a11cfb2e','PENDENTE',0),(789,'Despesas','Claro (1/12)',179.00,'TELEFONE',NULL,'2022-01-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(790,'Despesas','Claro (2/12)',179.00,'TELEFONE',NULL,'2022-02-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(791,'Despesas','Claro (3/12)',179.00,'TELEFONE',NULL,'2022-03-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(792,'Despesas','Claro (4/12)',179.00,'TELEFONE',NULL,'2022-04-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(793,'Despesas','Claro (5/12)',179.00,'TELEFONE',NULL,'2022-05-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(794,'Despesas','Claro (6/12)',179.00,'TELEFONE',NULL,'2022-06-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(795,'Despesas','Claro (7/12)',179.00,'TELEFONE','2022-07-04','2022-07-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(796,'Despesas','Claro (8/12)',179.00,'TELEFONE',NULL,'2022-08-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(797,'Despesas','Claro (9/12)',179.00,'TELEFONE',NULL,'2022-09-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(798,'Despesas','Claro (10/12)',179.00,'TELEFONE',NULL,'2022-10-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(799,'Despesas','Claro (11/12)',179.00,'TELEFONE',NULL,'2022-11-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(800,'Despesas','Claro (12/12)',179.00,'TELEFONE',NULL,'2022-12-10','DEBITO LU BB','Lu','12','3d3789ae4ae4429caa9095a45e6a9028','PAGO',0),(801,'Despesas','Ajudante Casa (1/12)',225.00,'CASA',NULL,'2022-01-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(802,'Despesas','Ajudante Casa (2/12)',225.00,'CASA',NULL,'2022-02-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(803,'Despesas','Ajudante Casa (3/12)',225.00,'CASA',NULL,'2022-03-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(804,'Despesas','Ajudante Casa (4/12)',225.00,'CASA',NULL,'2022-04-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(805,'Despesas','Ajudante Casa (5/12)',225.00,'CASA',NULL,'2022-05-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(806,'Despesas','Ajudante Casa (6/12)',225.00,'CASA',NULL,'2022-06-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(807,'Despesas','Ajudante Casa (7/12)',225.00,'CASA','2022-07-04','2022-07-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(808,'Despesas','Ajudante Casa (8/12)',225.00,'CASA',NULL,'2022-08-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(809,'Despesas','Ajudante Casa (9/12)',225.00,'CASA',NULL,'2022-09-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(810,'Despesas','Ajudante Casa (10/12)',225.00,'CASA',NULL,'2022-10-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(811,'Despesas','Ajudante Casa (11/12)',225.00,'CASA',NULL,'2022-11-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(812,'Despesas','Ajudante Casa (12/12)',225.00,'CASA',NULL,'2022-12-07','DEBITO LU BB','Lu','12','7f75550ea6a5391993c2fec3785a6db0','PAGO',0),(813,'Despesas','IPTU (1/12)',152.00,'IMPOSTOS',NULL,'2022-01-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(814,'Despesas','IPTU (2/12)',152.00,'IMPOSTOS',NULL,'2022-02-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(815,'Despesas','IPTU (3/12)',152.00,'IMPOSTOS',NULL,'2022-03-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(816,'Despesas','IPTU (4/12)',152.00,'IMPOSTOS',NULL,'2022-04-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(817,'Despesas','IPTU (5/12)',152.00,'IMPOSTOS',NULL,'2022-05-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(818,'Despesas','IPTU (6/12)',152.00,'IMPOSTOS',NULL,'2022-06-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(819,'Despesas','IPTU (7/12)',152.00,'IMPOSTOS',NULL,'2022-07-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(820,'Despesas','IPTU (8/12)',152.00,'IMPOSTOS',NULL,'2022-08-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(821,'Despesas','IPTU (9/12)',152.00,'IMPOSTOS',NULL,'2022-09-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(822,'Despesas','IPTU (10/12)',152.00,'IMPOSTOS',NULL,'2022-10-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(823,'Despesas','IPTU (11/12)',152.00,'IMPOSTOS',NULL,'2022-11-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(824,'Despesas','IPTU (12/12)',152.00,'IMPOSTOS',NULL,'2022-12-10','DEBITO LU BB','Lu','12','afb731460ba1937d37b4c5534de98a93','PAGO',0),(825,'Despesas','CEMIG (1/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-01-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(826,'Despesas','CEMIG (2/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-02-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(827,'Despesas','CEMIG (3/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-03-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(828,'Despesas','CEMIG (4/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-04-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(829,'Despesas','CEMIG (5/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-05-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(830,'Despesas','CEMIG (6/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-06-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(831,'Despesas','CEMIG (7/12)',350.00,'ENERGIA ELETRICA','2022-07-04','2022-07-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PAGO',0),(832,'Despesas','CEMIG (8/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-08-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(833,'Despesas','CEMIG (9/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-09-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(834,'Despesas','CEMIG (10/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-10-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(835,'Despesas','CEMIG (11/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-11-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(836,'Despesas','CEMIG (12/12)',350.00,'ENERGIA ELETRICA',NULL,'2022-12-05','DEBITO LU BB','Lu','12','f0d4f8655a7b363c428b3d9ac19ec758','PENDENTE',0),(837,'Despesas','VAN TICO (1/12)',252.00,'TRANSPORTE',NULL,'2022-01-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(838,'Despesas','VAN TICO (2/12)',252.00,'TRANSPORTE',NULL,'2022-02-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(839,'Despesas','VAN TICO (3/12)',252.00,'TRANSPORTE',NULL,'2022-03-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(840,'Despesas','VAN TICO (4/12)',252.00,'TRANSPORTE',NULL,'2022-04-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(841,'Despesas','VAN TICO (5/12)',252.00,'TRANSPORTE',NULL,'2022-05-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(842,'Despesas','VAN TICO (6/12)',252.00,'TRANSPORTE',NULL,'2022-06-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(843,'Despesas','VAN TICO (7/12)',252.00,'TRANSPORTE','2022-07-04','2022-07-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PAGO',0),(844,'Despesas','VAN TICO (8/12)',252.00,'TRANSPORTE',NULL,'2022-08-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(845,'Despesas','VAN TICO (9/12)',252.00,'TRANSPORTE',NULL,'2022-09-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(846,'Despesas','VAN TICO (10/12)',252.00,'TRANSPORTE',NULL,'2022-10-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(847,'Despesas','VAN TICO (11/12)',252.00,'TRANSPORTE',NULL,'2022-11-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(848,'Despesas','VAN TICO (12/12)',252.00,'TRANSPORTE',NULL,'2022-12-05','DEBITO LU BB','Lu','12','c6db574c72606a1e1eb7e221fbb88df1','PENDENTE',0),(849,'Despesas','Natação Tico (1/12)',215.00,'FILHO',NULL,'2022-01-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(850,'Despesas','Natação Tico (2/12)',215.00,'FILHO',NULL,'2022-02-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(851,'Despesas','Natação Tico (3/12)',215.00,'FILHO',NULL,'2022-03-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(852,'Despesas','Natação Tico (4/12)',215.00,'FILHO',NULL,'2022-04-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(853,'Despesas','Natação Tico (5/12)',215.00,'FILHO',NULL,'2022-05-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(854,'Despesas','Natação Tico (6/12)',215.00,'FILHO',NULL,'2022-06-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(855,'Despesas','Natação Tico (7/12)',215.00,'FILHO','2022-07-04','2022-07-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PAGO',0),(856,'Despesas','Natação Tico (8/12)',215.00,'FILHO',NULL,'2022-08-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(857,'Despesas','Natação Tico (9/12)',215.00,'FILHO',NULL,'2022-09-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(858,'Despesas','Natação Tico (10/12)',215.00,'FILHO',NULL,'2022-10-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(859,'Despesas','Natação Tico (11/12)',215.00,'FILHO',NULL,'2022-11-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(860,'Despesas','Natação Tico (12/12)',215.00,'FILHO',NULL,'2022-12-07','DEBITO LU BB','Lu','12','ffbae0eae6d39122174765652a588578','PENDENTE',0),(861,'Despesas','Integrar Tico (1/12)',455.00,'EDUCAÇÃO',NULL,'2022-01-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(862,'Despesas','Integrar Tico (2/12)',455.00,'EDUCAÇÃO',NULL,'2022-02-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(863,'Despesas','Integrar Tico (3/12)',455.00,'EDUCAÇÃO',NULL,'2022-03-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(864,'Despesas','Integrar Tico (4/12)',455.00,'EDUCAÇÃO',NULL,'2022-04-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(865,'Despesas','Integrar Tico (5/12)',455.00,'EDUCAÇÃO',NULL,'2022-05-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(866,'Despesas','Integrar Tico (6/12)',455.00,'EDUCAÇÃO',NULL,'2022-06-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(867,'Despesas','Integrar Tico (7/12)',455.00,'EDUCAÇÃO','2022-07-04','2022-07-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(868,'Despesas','Integrar Tico (8/12)',455.00,'EDUCAÇÃO',NULL,'2022-08-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(869,'Despesas','Integrar Tico (9/12)',455.00,'EDUCAÇÃO',NULL,'2022-09-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(870,'Despesas','Integrar Tico (10/12)',455.00,'EDUCAÇÃO',NULL,'2022-10-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(871,'Despesas','Integrar Tico (11/12)',455.00,'EDUCAÇÃO',NULL,'2022-11-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(872,'Despesas','Integrar Tico (12/12)',455.00,'EDUCAÇÃO',NULL,'2022-12-07','DEBITO LU BB','Lu','12','0bc38afa20ecc3b948f44b9f0203a5ab','PAGO',0),(873,'Despesas','Aluguel APTO -> Mãe (1/01)',750.00,'Aluguel Progresso Repasse',NULL,'2022-01-05','DEBITO LU BB','Lu','01','0','PAGO',0),(874,'Despesas','IPRF 2022 (1/08)',1172.00,'IMPOSTOS',NULL,'2022-05-01','DEBITO LU BB','Lu','08','02f39976abc13df73fdd03bf74d5331f','PAGO',0),(875,'Despesas','IPRF 2022 (2/08)',1172.00,'IMPOSTOS',NULL,'2022-06-01','DEBITO LU BB','Lu','08','02f39976abc13df73fdd03bf74d5331f','PAGO',0),(876,'Despesas','IPRF 2022 (3/08)',1172.00,'IMPOSTOS',NULL,'2022-07-01','DEBITO LU BB','Lu','08','02f39976abc13df73fdd03bf74d5331f','PAGO',0),(877,'Despesas','IPRF 2022 (4/08)',1172.00,'IMPOSTOS',NULL,'2022-08-01','DEBITO LU BB','Lu','08','02f39976abc13df73fdd03bf74d5331f','PAGO',0),(878,'Despesas','IPRF 2022 (5/08)',1172.00,'IMPOSTOS',NULL,'2022-09-01','DEBITO LU BB','Lu','08','02f39976abc13df73fdd03bf74d5331f','PAGO',0),(879,'Despesas','IPRF 2022 (6/08)',1172.00,'IMPOSTOS',NULL,'2022-10-01','DEBITO LU BB','Lu','08','02f39976abc13df73fdd03bf74d5331f','PAGO',0),(880,'Despesas','IPRF 2022 (7/08)',1172.00,'IMPOSTOS',NULL,'2022-11-01','DEBITO LU BB','Lu','08','02f39976abc13df73fdd03bf74d5331f','PAGO',0),(881,'Despesas','IPRF 2022 (8/08)',1172.00,'IMPOSTOS',NULL,'2022-12-01','DEBITO LU BB','Lu','08','02f39976abc13df73fdd03bf74d5331f','PAGO',0),(882,'Despesas','Darf (1/12)',138.00,'IMPOSTOS',NULL,'2022-01-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(883,'Despesas','Darf (2/12)',138.00,'IMPOSTOS',NULL,'2022-02-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(884,'Despesas','Darf (3/12)',138.00,'IMPOSTOS',NULL,'2022-03-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(885,'Despesas','Darf (4/12)',138.00,'IMPOSTOS',NULL,'2022-04-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(886,'Despesas','Darf (5/12)',138.00,'IMPOSTOS',NULL,'2022-05-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(887,'Despesas','Darf (6/12)',138.00,'IMPOSTOS',NULL,'2022-06-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(888,'Despesas','Darf (7/12)',138.00,'IMPOSTOS','2022-07-04','2022-07-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PAGO',0),(889,'Despesas','Darf (8/12)',138.00,'IMPOSTOS',NULL,'2022-08-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(890,'Despesas','Darf (9/12)',138.00,'IMPOSTOS',NULL,'2022-09-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(891,'Despesas','Darf (10/12)',138.00,'IMPOSTOS',NULL,'2022-10-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(892,'Despesas','Darf (11/12)',138.00,'IMPOSTOS',NULL,'2022-11-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(893,'Despesas','Darf (12/12)',138.00,'IMPOSTOS',NULL,'2022-12-01','DEBITO LU BB','Lu','12','d3c8393555b80d88accd9566398ccb1d','PENDENTE',0),(900,'Despesas','Cartão Nubank (1/06)',5500.00,'OUTROS','2022-07-05','2022-01-10','CC_NUBANK','Lu','06','e48037558b3de185b98fbaf337c77624','PAGO',1),(906,'Receitas','Aluguel APTO Progresso (1/12)',665.00,'Aluguel','1999-01-01','2022-01-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(907,'Receitas','Aluguel APTO Progresso (2/12)',665.00,'Aluguel','2022-02-07','2022-02-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(908,'Receitas','Aluguel APTO Progresso (3/12)',665.00,'Aluguel','2022-03-07','2022-03-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(909,'Receitas','Aluguel APTO Progresso (4/12)',665.00,'Aluguel','2022-04-07','2022-04-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(910,'Receitas','Aluguel APTO Progresso (5/12)',665.00,'Aluguel','2022-05-07','2022-05-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(911,'Receitas','Aluguel APTO Progresso (6/12)',665.00,'Aluguel','2022-06-07','2022-06-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(912,'Receitas','Aluguel APTO Progresso (7/12)',665.00,'Aluguel','2022-07-07','2022-07-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(913,'Receitas','Aluguel APTO Progresso (8/12)',665.00,'Aluguel','2022-08-07','2022-08-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(914,'Receitas','Aluguel APTO Progresso (9/12)',665.00,'Aluguel','2022-09-07','2022-09-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(915,'Receitas','Aluguel APTO Progresso (10/12)',665.00,'Aluguel','2022-10-07','2022-10-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(916,'Receitas','Aluguel APTO Progresso (11/12)',665.00,'Aluguel','2022-11-07','2022-11-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(917,'Receitas','Aluguel APTO Progresso (12/12)',665.00,'Aluguel','2022-12-07','2022-12-07','Depósito em Conta Corente','Lu','12','6d6991d1bf3ee4bf0339e090b43f3a85','PENDENTE',NULL),(918,'Despesas','Repasse Aluguel Mãe (1/12)',750.00,'CASA',NULL,'2022-01-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(919,'Despesas','Repasse Aluguel Mãe (2/12)',750.00,'CASA',NULL,'2022-02-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(920,'Despesas','Repasse Aluguel Mãe (3/12)',750.00,'CASA',NULL,'2022-03-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(921,'Despesas','Repasse Aluguel Mãe (4/12)',750.00,'CASA',NULL,'2022-04-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(922,'Despesas','Repasse Aluguel Mãe (5/12)',750.00,'CASA',NULL,'2022-05-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(923,'Despesas','Repasse Aluguel Mãe (6/12)',750.00,'CASA',NULL,'2022-06-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(924,'Despesas','Repasse Aluguel Mãe (7/12)',750.00,'CASA','2022-07-04','2022-07-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PAGO',0),(925,'Despesas','Repasse Aluguel Mãe (8/12)',750.00,'CASA',NULL,'2022-08-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(926,'Despesas','Repasse Aluguel Mãe (9/12)',750.00,'CASA',NULL,'2022-09-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(927,'Despesas','Repasse Aluguel Mãe (10/12)',750.00,'CASA',NULL,'2022-10-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(928,'Despesas','Repasse Aluguel Mãe (11/12)',750.00,'CASA',NULL,'2022-11-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(929,'Despesas','Repasse Aluguel Mãe (12/12)',750.00,'CASA',NULL,'2022-12-07','DEBITO LU BB','Lu','12','3494efe7b4c3ec5dcc519035e3fc1954','PENDENTE',0),(932,'Despesas','Nubank Previsão (1/01)',5000.00,'OUTROS','2022-06-01','2022-07-10','CC_NUBANK','Lu','01','0','PAGO',1);
/*!40000 ALTER TABLE `movimentacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nubank_cc_import`
--

DROP TABLE IF EXISTS `nubank_cc_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nubank_cc_import` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1380 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nubank_cc_import`
--

LOCK TABLES `nubank_cc_import` WRITE;
/*!40000 ALTER TABLE `nubank_cc_import` DISABLE KEYS */;
INSERT INTO `nubank_cc_import` VALUES (1325,'2022-06-03','eletrônicos','Amazon 7/12',39.000000),(1326,'2022-06-03','supermercado','Pizza Legal',15.900000),(1327,'2022-06-03','serviços','Aliexpress 1/6',57.850000),(1328,'2022-06-03','viagem','123 Viagens e Turismo 1/12',279.590000),(1329,'2022-06-03','eletrônicos','Iphone 6/12',424.910000),(1330,'2022-06-03','restaurante','Premiere Sto Agostinho',5.500000),(1331,'2022-06-03','vestuário','Manto da Massa 2/4',118.680000),(1332,'2022-06-03','saúde','Drogaria Pacheco 3/3',263.830000),(1333,'2022-06-03','serviços','Ebi-Escolas Bilingues 5/8',65.260000),(1334,'2022-06-03','transporte','Baterias Gustavo 5/6',66.660000),(1335,'2022-06-03','eletrônicos','Casasbahia. Fraude 2/10',59.800000),(1336,'2022-06-03','vestuário','Decathlon Bh Sul 2/5',57.990000),(1337,'2022-06-03','transporte','Orange Bh Motocicletas 3/3',74.370000),(1338,'2022-06-03','transporte','O2 moto 3/3',60.000000),(1339,'2022-06-03','lazer','Clube Atletico Mineir 9/12',55.000000),(1340,'2022-06-03','transporte','Andre Luiz Ferreira P 2/2',230.000000),(1341,'2022-06-03','vestuário','Lojas Renner Perfume Kiki 2/3',126.630000),(1342,'2022-06-03','outros','Convecao BatCentral L 5/8',161.330000),(1343,'2022-06-04','restaurante','Restaurante Dedo de Mo',22.000000),(1344,'2022-06-04','restaurante','Pao Di Loh',9.700000),(1345,'2022-06-05','casa','Villefort Caicara',986.720000),(1346,'2022-06-05','transporte','Posto Gall',44.780000),(1347,'2022-06-08','serviços','Aliexpress 1/12',122.570000),(1348,'2022-06-09','outros','Catons Burger',37.900000),(1349,'2022-06-10','lazer','ingresso galo',35.000000),(1350,'2022-06-10','supermercado','Sup Epa Quarenta e Doi',29.930000),(1351,'2022-06-10','lazer','ingresso galo',105.000000),(1352,'2022-06-10','transporte','Estacionamento mineirão',40.000000),(1353,'2022-06-10','serviços','Restaurante Douglas',19.000000),(1354,'2022-06-12','supermercado','Supermercados Bh',213.000000),(1355,'2022-06-14','serviços','Netflix.Com',55.900000),(1356,'2022-06-14','supermercado','Sup Epa Quarenta e Doi',68.740000),(1357,'2022-06-15','educação','EbanxCambly 1/12',199.550000),(1358,'2022-06-16','restaurante','Varanda',61.680000),(1359,'2022-06-16','restaurante','Padaria e Confeitaria',72.450000),(1360,'2022-06-17','restaurante','Padaria e Confeitaria',20.880000),(1361,'2022-06-17','transporte','Shop Power Center Mina',6.500000),(1362,'2022-06-17','vestuário','Decathlon Belo Horizon 1/3',96.660000),(1363,'2022-06-17','restaurante','Comida Caseira',107.980000),(1364,'2022-06-17','supermercado','Sup Epa Quarenta e Doi',43.000000),(1365,'2022-06-17','vestuário','Decathlon Bh Sul',30.000000),(1366,'2022-06-18','restaurante','Garapa Oiapoque',10.820000),(1367,'2022-06-18','restaurante','Restaurante Dedo de Mo',40.500000),(1368,'2022-06-18','outros','doação asapec',30.000000),(1369,'2022-06-18','eletrônicos','Lembrança Duda',15.000000),(1370,'2022-06-18','eletrônicos','Pulseira Apple',45.000000),(1371,'2022-06-18','transporte','Estacionamento Oi Bh',10.000000),(1372,'2022-06-18','lazer','Guanabara Centro de D',40.000000),(1373,'2022-06-19','supermercado','Sup Epa Quarenta e Doi 1/2',77.130000),(1374,'2022-06-20','supermercado','Maxi Carne',51.730000),(1375,'2022-06-21','transporte','Posto Gall',20.000000),(1376,'2022-06-21','serviços','Bh Barbers',30.000000),(1377,'2022-06-22','restaurante','Mp Restbifao',20.000000),(1378,'2022-06-23','restaurante','PagComercial',10.880000),(1379,'2022-06-23','serviços','Fabiola Rodrigues Sant',18.500000);
/*!40000 ALTER TABLE `nubank_cc_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `COD_Usuario` int unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `perfil` int NOT NULL,
  `cont_acesso` int DEFAULT '0',
  `path_avatar` varchar(1024) DEFAULT 'img\\avatar.png',
  `ultimo_acesso` varchar(255) DEFAULT 'Nunca Acessou',
  `informacoes` varchar(1024) DEFAULT 'Sem Informações',
  PRIMARY KEY (`COD_Usuario`),
  UNIQUE KEY `ConstraintUnicos` (`cpf`,`login`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'03040222686','admin','admin','21232f297a57a5a743894a0e4a801fc3','admin@gmail.com',1,107,'img\\avatar.png','06/07/2022 - 12:24:33','Sauer'),(2,'030.402.226-86','Alexandre Sauer Pais Lemes','alesauer','202cb962ac59075b964b07152d234b70','alesauer@gmail.com',2,1,'img\\avatar.png','14/09/2021 - 15:23:18','Sem Informações');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `financas`
--

USE `financas`;

--
-- Final view structure for view `V_10MaioresGastos`
--

/*!50001 DROP VIEW IF EXISTS `V_10MaioresGastos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_10MaioresGastos` AS select `nubank_cc_import`.`data` AS `DATA`,`nubank_cc_import`.`descricao` AS `descricao`,`nubank_cc_import`.`valor` AS `valor` from `nubank_cc_import` order by `nubank_cc_import`.`valor` desc limit 1,10 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_GASTOS_CATEGORIA_TUDO`
--

/*!50001 DROP VIEW IF EXISTS `V_GASTOS_CATEGORIA_TUDO`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_GASTOS_CATEGORIA_TUDO` AS select `movimentacoes`.`CATEGORIA` AS `CATEGORIA`,sum(`movimentacoes`.`VALOR`) AS `total` from `movimentacoes` where (`movimentacoes`.`TIPO` = 'Despesas') group by `movimentacoes`.`CATEGORIA` order by `total` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_Gastos_Categoria_CC`
--

/*!50001 DROP VIEW IF EXISTS `V_Gastos_Categoria_CC`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_Gastos_Categoria_CC` AS select `nubank_cc_import`.`categoria` AS `categoria`,sum(`nubank_cc_import`.`valor`) AS `valor`,count(`nubank_cc_import`.`categoria`) AS `COMPRAS_NESSA_CATEGORIA`,avg(`nubank_cc_import`.`valor`) AS `MEDIA` from `nubank_cc_import` group by `nubank_cc_import`.`categoria` order by `valor` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_GestosPorData`
--

/*!50001 DROP VIEW IF EXISTS `V_GestosPorData`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_GestosPorData` AS select `nubank_cc_import`.`data` AS `DATA`,sum(`nubank_cc_import`.`valor`) AS `GestosPorData` from `nubank_cc_import` group by `nubank_cc_import`.`data` order by `GestosPorData` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_PARCELAMENTOS_TOTAL_ANO_ATUAL`
--

/*!50001 DROP VIEW IF EXISTS `V_PARCELAMENTOS_TOTAL_ANO_ATUAL`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_PARCELAMENTOS_TOTAL_ANO_ATUAL` AS select month(`movimentacoes`.`DATA_VENCIMENTO`) AS `MES`,sum(`movimentacoes`.`VALOR`) AS `VALOR` from `movimentacoes` where ((`movimentacoes`.`TIPO` = 'Despesas') and (`movimentacoes`.`PARCELADO` <> '0') and (year(`movimentacoes`.`DATA_VENCIMENTO`) = year(now()))) group by `MES` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_TOTAL_DESPESA_ANO_CORRENTE`
--

/*!50001 DROP VIEW IF EXISTS `V_TOTAL_DESPESA_ANO_CORRENTE`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_TOTAL_DESPESA_ANO_CORRENTE` AS select month(`movimentacoes`.`DATA_VENCIMENTO`) AS `MES`,sum(`movimentacoes`.`VALOR`) AS `TOTAL_DESPESA` from `movimentacoes` where ((`movimentacoes`.`TIPO` = 'Despesas') and (year(`movimentacoes`.`DATA_VENCIMENTO`) = year(now()))) group by `MES` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `V_TOTAL_RECEITA_ANO_CORRENTE`
--

/*!50001 DROP VIEW IF EXISTS `V_TOTAL_RECEITA_ANO_CORRENTE`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_TOTAL_RECEITA_ANO_CORRENTE` AS select month(`movimentacoes`.`DATA_VENCIMENTO`) AS `MES`,sum(`movimentacoes`.`VALOR`) AS `TOTAL_RECEITA` from `movimentacoes` where ((`movimentacoes`.`TIPO` = 'Receitas') and (year(`movimentacoes`.`DATA_VENCIMENTO`) = year(now()))) group by `MES` */;
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

-- Dump completed on 2022-07-06 13:10:20
