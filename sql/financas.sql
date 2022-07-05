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
-- Temporary view structure for view `V_Gastos_Categoria`
--

DROP TABLE IF EXISTS `V_Gastos_Categoria`;
/*!50001 DROP VIEW IF EXISTS `V_Gastos_Categoria`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `V_Gastos_Categoria` AS SELECT 
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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES ('ALIMENTACAO','DESPESAS COM ALIMENTACAO.\r\n'),('CONDOMINIO','DESPESAS DE COIDOMINIO.'),('ENERGIA ELETRICA','CONTAS DA CEMIG.'),('FARMÁCIA','FARMÁCIA'),('PRESENTE','PRESENTES'),('CASA','COMPRAS PARA CASA'),('IMPOSTOS','DIVIDAS COM IMPOSTOS DIVERSOS.'),('TELEFONE','GASTOS COM TELEFONE'),('AUTOMOVEL','DESPESAS COM AUTOMOVEL'),('VESTUARIO','SAPATOS,ROUPAS,ETC'),('INFORMATICA','INFORMATICA'),('COSMETICOS','PRODUTOS DE BELEZA'),('FILHO','DESPESAS COM O HERDEIRO'),('SUPERMERCADO','COMPRAS PARA CASA'),('COMBUSTIVEL','COMBUSTIVEL'),('SALAO BELEZA','CORTES,UNHAS,ETC'),('ENTRETERIMENTO','CINEMAS E TEATROS,ETC'),('OUTROS','OUTROS'),('EDUCAÇÃO','DESPESAS COM EDUCAÇÃO'),('TRANSPORTE','DESPESAS TRANSPORTE');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_receita`
--

DROP TABLE IF EXISTS `categoria_receita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_receita` (
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_receita`
--

LOCK TABLES `categoria_receita` WRITE;
/*!40000 ALTER TABLE `categoria_receita` DISABLE KEYS */;
INSERT INTO `categoria_receita` VALUES ('Salário ALMG','s/o'),('Férias ALMG','s/o'),('Décimo Terceiro ALMG','s/o'),('Salário Cotemig','s/o'),('Férias Cotemig','s/o'),('Décimo Terceiro Cotemig','s/o'),('Retroativos','s/o'),('Outros','s/o'),('Férias Prêmio','s/o');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pagamento`
--

LOCK TABLES `forma_pagamento` WRITE;
/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
INSERT INTO `forma_pagamento` VALUES (1,'DEBITO LU BB','DEBITO NO BB DO LU.','D',NULL,NULL),(3,'CC_NUBANK','CARTÃO DE CREDITO NUBANK','CC',3,10),(4,'DEBITO LU BB','DEBITO NO BB DO LU.','D',NULL,NULL),(8,'CC_INTER','CARTÃO CRÉDITO INTER','CC',3,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=343 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (315,'admin','2022-06-29','2022-06-29 15:13:30','AUTENTICACAO','SUCESSO','172.20.36.58'),(316,'admin','2022-06-29','2022-06-29 15:42:35','AUTENTICACAO','SUCESSO','172.20.36.58'),(317,'admin','2022-06-29','2022-06-29 17:02:05','AUTENTICACAO','SUCESSO','172.20.36.58'),(318,'admin','2022-06-29','2022-06-29 17:05:05','NOVA MOVIMENTACAO RECEITA','SUCESSO','172.20.36.58'),(319,'admin','2022-06-29','2022-06-29 17:05:52','NOVA MOVIMENTACAO RECEITA','SUCESSO','172.20.36.58'),(320,'admin','2022-06-29','2022-06-29 17:06:48','NOVA MOVIMENTACAO RECEITA','SUCESSO','172.20.36.58'),(321,'admin','2022-06-29','2022-06-29 17:07:30','NOVA MOVIMENTACAO RECEITA','SUCESSO','172.20.36.58'),(322,'admin','2022-06-29','2022-06-29 17:09:13','NOVA MOVIMENTACAO','SUCESSO','172.20.36.58'),(323,'admin','2022-06-29','2022-06-29 17:10:17','NOVA MOVIMENTACAO','SUCESSO','172.20.36.58'),(324,'admin','2022-06-30','2022-06-30 13:51:08','AUTENTICACAO','SUCESSO','127.0.0.1'),(325,'admin','2022-06-30','2022-06-30 14:02:30','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(326,'admin','2022-06-30','2022-06-30 14:03:29','EDICAO RECEITA','SUCESSO','127.0.0.1'),(327,'admin','2022-06-30','2022-06-30 14:03:43','EDICAO RECEITA','SUCESSO','127.0.0.1'),(328,'admin','2022-06-30','2022-06-30 14:11:20','EDICAO RECEITA','SUCESSO','127.0.0.1'),(329,'admin','2022-06-30','2022-06-30 14:13:50','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(330,'admin','2022-06-30','2022-06-30 14:17:28','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(331,'admin','2022-06-30','2022-06-30 14:18:12','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(332,'admin','2022-06-30','2022-06-30 14:19:25','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(333,'admin','2022-06-30','2022-06-30 14:52:58','SAIDA_SISTEMA','SUCESSO','127.0.0.1'),(334,'admin','2022-06-30','2022-06-30 14:53:00','AUTENTICACAO','SUCESSO','127.0.0.1'),(335,'admin','2022-06-30','2022-06-30 15:38:49','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(336,'admin','2022-06-30','2022-06-30 15:46:15','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(337,'admin','2022-06-30','2022-06-30 15:48:55','NOVA MOVIMENTACAO RECEITA','SUCESSO','127.0.0.1'),(338,'admin','2022-06-30','2022-06-30 17:13:13','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(339,'admin','2022-06-30','2022-06-30 17:13:38','NOVA MOVIMENTACAO','SUCESSO','127.0.0.1'),(340,'admin','2022-07-01','2022-07-01 13:03:23','AUTENTICACAO','SUCESSO','127.0.0.1'),(341,'admin','2022-07-01','2022-07-01 13:03:29','SAIDA_SISTEMA','SUCESSO','127.0.0.1'),(342,'admin','2022-07-01','2022-07-01 13:03:31','AUTENTICACAO','SUCESSO','127.0.0.1');
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
) ENGINE=InnoDB AUTO_INCREMENT=728 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimentacoes`
--

LOCK TABLES `movimentacoes` WRITE;
/*!40000 ALTER TABLE `movimentacoes` DISABLE KEYS */;
INSERT INTO `movimentacoes` VALUES (685,'Receitas','Salário ALMG (1/01)',14450.43,'Salário ALMG','2022-06-30','2022-06-02','Depósito em Conta Corente','Lu','01','0','PAGO',NULL),(693,'Despesas','IPHONE (8/08)',485.00,'INFORMATICA','2022-06-30','2023-01-01','CC_NUBANK','Lu','08','d11c8bc6947402ebe111f9e96079e617','PAGO',1),(700,'Despesas','TESTE USOU CC INTER (4/07)',1000.00,'FARMÁCIA',NULL,'2022-09-01','CC_INTER','Lu','07','ce53ec717078f9b0de24c36c451808a7','PENDENTE',1),(701,'Despesas','TESTE USOU CC INTER (5/07)',1000.00,'FARMÁCIA',NULL,'2022-10-01','CC_INTER','Lu','07','ce53ec717078f9b0de24c36c451808a7','PENDENTE',1),(702,'Despesas','TESTE USOU CC INTER (6/07)',1000.00,'FARMÁCIA',NULL,'2022-11-01','CC_INTER','Lu','07','ce53ec717078f9b0de24c36c451808a7','PENDENTE',1),(703,'Despesas','TESTE USOU CC INTER (7/07)',1000.00,'FARMÁCIA',NULL,'2022-12-01','CC_INTER','Lu','07','ce53ec717078f9b0de24c36c451808a7','PENDENTE',1),(704,'Receitas','Salário COTEMIG (1/01)',3009.00,'Salário Cotemig','1999-01-01','2022-06-01','Depósito em Conta Corente','Lu','01','0','PENDENTE',NULL),(706,'Receitas','Salário ALMG (1/01)',485.00,'Décimo Terceiro ALMG','1999-01-01','2022-06-07','Depósito em Conta Corente','Lu','01','0','PENDENTE',NULL),(707,'Receitas','Salário ALMG (1/01)',485.00,'Décimo Terceiro ALMG','1999-01-01','2022-06-07','Depósito em Conta Corente','Lu','01','0','PENDENTE',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2360 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nubank_cc_import`
--

LOCK TABLES `nubank_cc_import` WRITE;
/*!40000 ALTER TABLE `nubank_cc_import` DISABLE KEYS */;
INSERT INTO `nubank_cc_import` VALUES (2275,'2022-05-03','eletrônicos','Amazon 6/12',39.000000),(2276,'2022-05-03','supermercado','Sup Epa Quarenta e Doi',101.470000),(2277,'2022-05-03','casa','Granlar',9.500000),(2278,'2022-05-03','eletrônicos','Iphone 5/12',424.910000),(2279,'2022-05-03','outros','Ebanx *Cambly 12/12',199.440000),(2280,'2022-05-03','saúde','Drogaria Pacheco 2/3',263.830000),(2281,'2022-05-03','eletrônicos','Pag*Roupas 2/2',71.050000),(2282,'2022-05-03','supermercado','Sup Epa Quarenta e Doi',20.960000),(2283,'2022-05-03','serviços','Ebi-Escolas Bilingues 4/8',65.260000),(2284,'2022-05-03','saúde','Raia 3/3',73.760000),(2285,'2022-05-03','transporte','Baterias Gustavo 4/6',66.660000),(2286,'2022-05-03','lazer','Clube Atletico Mineir 8/12',55.000000),(2287,'2022-05-03','transporte','Orange Bh Motocicletas 2/3',74.370000),(2288,'2022-05-03','transporte','O2 moto 2/3',60.000000),(2289,'2022-05-03','outros','Convecao Bat*Central L 4/8',161.330000),(2291,'2022-05-06','supermercado','Sup Epa Quarenta e Doi',62.140000),(2292,'2022-05-06','educação','Sto Agostinho Livraria',29.970000),(2293,'2022-05-08','transporte','Posto Gall',42.820000),(2294,'2022-05-08','restaurante','Padaria e Confeitaria',49.770000),(2295,'2022-05-08','restaurante','Ali Ba Bar',212.300000),(2296,'2022-05-08','supermercado','Sup Epa Quarenta e Doi',39.000000),(2297,'2022-05-08','restaurante','Dubelvs Fine Burguers',40.400000),(2298,'2022-05-09','transporte','Posto Gall',212.000000),(2299,'2022-05-10','transporte','Uber *Uber *Trip',19.930000),(2300,'2022-05-10','restaurante','Panificadora Padoka',4.600000),(2301,'2022-05-10','supermercado','Pag*Sacolaoourobranco',55.960000),(2302,'2022-05-10','saúde','Drogaria Araujo S A Fi',60.580000),(2303,'2022-05-10','educação','Opus Assembleia',4.000000),(2304,'2022-05-10','supermercado','Supermercados Bh',370.090000),(2305,'2022-05-10','supermercado','Sup Epa Quarenta e Doi',20.000000),(2306,'2022-05-10','transporte','Andre Luiz Ferreira P 1/2',230.000000),(2307,'2022-05-11','restaurante','Chico do Churrasco',18.900000),(2308,'2022-05-11','vestuário','Manto da Massa 1/4',118.710000),(2309,'2022-05-13','lazer','Pag*Implyrental Galo',93.800000),(2310,'2022-05-13','serviços','Netflix.Com',55.900000),(2311,'2022-05-13','supermercado','Sup Epa Quarenta e Doi',29.440000),(2312,'2022-05-15','lazer','Guanabara Centro de D',62.500000),(2313,'2022-05-15','restaurante','Padaria e Confeitaria',58.340000),(2314,'2022-05-15','lazer','Guanabara Centro de D',6.000000),(2315,'2022-05-15','transporte','Posto Gall',70.000000),(2316,'2022-05-15','restaurante','Lanchonete Guanabara',24.000000),(2317,'2022-05-15','serviços','Nintendo *Americaus',42.440000),(2319,'2022-05-15','supermercado','Sup Epa',191.180000),(2320,'2022-05-16','supermercado','Maxi Carne',69.300000),(2321,'2022-05-18','saúde','Raia',24.280000),(2322,'2022-05-18','supermercado','Sup Epa Quarenta e Doi',69.820000),(2323,'2022-05-20','supermercado','Sup Epa Quarenta e Doi',28.280000),(2324,'2022-05-20','restaurante','Coco Bambu',304.470000),(2325,'2022-05-20','transporte','Estacionamento del rey',15.000000),(2326,'2022-05-20','vestuário','Lojas Renner Perfume Kiki 1/3',126.640000),(2327,'2022-05-22','lazer','galo ingresso',41.650000),(2328,'2022-05-22','vestuário','Decathlon Bh Sul 1/5',58.010000),(2329,'2022-05-23','serviços','Pag*Vanialuciaalvesma',26.000000),(2330,'2022-05-23','restaurante','Tradição do churrasco',127.540000),(2331,'2022-05-23','supermercado','Fernando Cascas dos',23.000000),(2332,'2022-05-23','lazer','Mp *Vinicius',25.000000),(2333,'2022-05-24','supermercado','Sup Epa Quarenta e Doi',199.130000),(2334,'2022-05-24','transporte','Posto Gall',43.040000),(2335,'2022-05-25','restaurante','Comercial Nunes',13.100000),(2336,'2022-05-26','restaurante','Tropeiro Real',27.000000),(2337,'2022-05-26','supermercado','Sup Epa Quarenta e Doi',30.140000),(2338,'2022-05-27','serviços','Google Storage',9.990000),(2339,'2022-05-27','restaurante','Pampulha',29.800000),(2340,'2022-05-27','educação','Amazonprimebr',89.000000),(2341,'2022-05-27','restaurante','Premiere Sto Agostinho',9.220000),(2342,'2022-05-28','supermercado','Sup Epa Quarenta e Doi',97.100000),(2343,'2022-05-28','restaurante','Padaria e Confeitaria',3.330000),(2344,'2022-05-28','educação','Personal Arte',8.350000),(2346,'2022-05-28','saúde','Drogaria Araujo Ração Luki',109.900000),(2347,'2022-05-28','supermercado','Maxi Carne',17.840000),(2348,'2022-05-28','eletrônicos','Casasbahia. Fraude 1/10',59.800000),(2349,'2022-05-29','transporte','Estacionamento del rey',15.000000),(2350,'2022-05-29','restaurante','del rey sauer',18.900000),(2351,'2022-05-29','restaurante','grape del rey',5.500000),(2352,'2022-05-29','restaurante','Pag*Jeronimodelreybgr',28.900000),(2353,'2022-05-30','restaurante','Panificadora Padoka',40.700000),(2354,'2022-05-30','restaurante','Padaria e Confeitaria',35.260000),(2355,'2022-05-30','supermercado','Maxi Carne',100.290000),(2356,'2022-05-31','restaurante','Comercial Nunes',15.600000),(2357,'2022-05-31','eletrônicos','Pag*Leandrofelipedeso',21.280000),(2358,'2022-06-01','eletrônicos','Leandrofelipedeso sacolao',81.250000),(2359,'2022-06-01','supermercado','Sup Epa Quarenta e Doi',163.210000);
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
INSERT INTO `usuario` VALUES (1,'03040222686','admin','admin','21232f297a57a5a743894a0e4a801fc3','admin@gmail.com',1,96,'img\\avatar.png','01/07/2022 - 13:03:31','Sauer'),(2,'030.402.226-86','Alexandre Sauer Pais Lemes','alesauer','202cb962ac59075b964b07152d234b70','alesauer@gmail.com',2,1,'img\\avatar.png','14/09/2021 - 15:23:18','Sem Informações');
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
-- Final view structure for view `V_Gastos_Categoria`
--

/*!50001 DROP VIEW IF EXISTS `V_Gastos_Categoria`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `V_Gastos_Categoria` AS select `nubank_cc_import`.`categoria` AS `categoria`,sum(`nubank_cc_import`.`valor`) AS `valor`,count(`nubank_cc_import`.`categoria`) AS `COMPRAS_NESSA_CATEGORIA`,avg(`nubank_cc_import`.`valor`) AS `MEDIA` from `nubank_cc_import` group by `nubank_cc_import`.`categoria` order by `valor` desc */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-01 13:05:58
