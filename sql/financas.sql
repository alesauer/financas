-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.32-0ubuntu0.20.04.2 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para financas
CREATE DATABASE IF NOT EXISTS `financas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `financas`;

-- Copiando estrutura para tabela financas.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela financas.categoria: ~29 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `DESC_CATEGORIA`, `OBS_CATEGORIA`) VALUES
	(1, 'ALIMENTACAO', 'DESPESAS COM ALIMENTACAO.\r\n'),
	(2, 'CONDOMINIO', 'DESPESAS DE COIDOMINIO.'),
	(3, 'ENERGIA ELETRICA', 'CONTAS DA CEMIG.'),
	(4, 'SAÚDE', 'SAÚDE'),
	(5, 'PRESENTE', 'PRESENTES'),
	(6, 'CASA', 'COMPRAS PARA CASA'),
	(7, 'IMPOSTOS', 'DIVIDAS COM IMPOSTOS DIVERSOS.'),
	(8, 'TELEFONE', 'GASTOS COM TELEFONE'),
	(9, 'AUTOMOVEL', 'DESPESAS COM AUTOMOVEL'),
	(10, 'VESTUARIO', 'SAPATOS,ROUPAS,ETC'),
	(11, 'ELETRÔNICOS', 'INFORMATICA'),
	(12, 'COSMETICOS', 'PRODUTOS DE BELEZA'),
	(13, 'FILHO', 'DESPESAS COM O HERDEIRO'),
	(14, 'SUPERMERCADO', 'COMPRAS PARA CASA'),
	(15, 'COMBUSTIVEL', 'COMBUSTIVEL'),
	(16, 'SALAO BELEZA', 'CORTES,UNHAS,ETC'),
	(17, 'ENTRETERIMENTO', 'CINEMAS E TEATROS,ETC'),
	(18, 'OUTROS', 'OUTROS'),
	(19, 'EDUCAÇÃO', 'DESPESAS COM EDUCAÇÃO'),
	(20, 'TRANSPORTE', 'DESPESAS TRANSPORTE'),
	(21, 'ANTECIPAÇÃO APTO', 'ANTECIPAÇÃO DAS PARCELAS DO APTO'),
	(24, 'ALUGUEL', 'Repasse'),
	(25, 'CARTÃO CRÉDITO PREVISÃO', 'CC'),
	(26, 'LAZER', 'DESPESA COM LAZER'),
	(28, 'SERVIÇOS', 'SERVIcOS'),
	(29, 'VIAGEM', 'VIAGEM'),
	(30, 'RESTAURANTE', 'RESTAURANTE'),
	(33, 'IPTV', 'IPTV');

-- Copiando estrutura para tabela financas.categoria_receita
CREATE TABLE IF NOT EXISTS `categoria_receita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela financas.categoria_receita: ~9 rows (aproximadamente)
INSERT INTO `categoria_receita` (`id`, `DESC_CATEGORIA`, `OBS_CATEGORIA`) VALUES
	(1, 'Salário', 's/o'),
	(2, 'Férias', 's/o'),
	(3, 'Décimo Terceiro', 's/o'),
	(7, 'Retroativos', 's/o'),
	(8, 'Outros', 's/o'),
	(9, 'Férias Prêmio', 's/o'),
	(12, 'Aluguel', 'Aluguel');

-- Copiando estrutura para tabela financas.config
CREATE TABLE IF NOT EXISTS `config` (
  `ultima_data_upload` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela financas.config: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela financas.contas
CREATE TABLE IF NOT EXISTS `contas` (
  `CONTA` varchar(255) NOT NULL,
  `DESC_CONTAS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela financas.contas: ~6 rows (aproximadamente)
INSERT INTO `contas` (`CONTA`, `DESC_CONTAS`) VALUES
	('CASA', 'CONTA DA KIKI'),
	('PARTICULAR', 'CONTA DO SAUER');

-- Copiando estrutura para tabela financas.forma_pagamento
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FORMA_PAGAMENTO` varchar(255) NOT NULL,
  `DESC_FORMA_PAGAMENTO` varchar(255) NOT NULL,
  `TIPO` enum('CC','D','PIX') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `DIA_FECHAMENTO_FATURA_CC` smallint DEFAULT NULL,
  `DIA_VENCIMENTO_CC` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela financas.forma_pagamento: ~8 rows (aproximadamente)
INSERT INTO `forma_pagamento` (`id`, `FORMA_PAGAMENTO`, `DESC_FORMA_PAGAMENTO`, `TIPO`, `DIA_FECHAMENTO_FATURA_CC`, `DIA_VENCIMENTO_CC`) VALUES
	(1, 'DEBITO BANCO', 'DEBITO', 'D', 1, 1),
	(16, 'NUBANK CRÉDITO', 'NUBANK CRÉDITO', 'CC', 28, 3);

-- Copiando estrutura para tabela financas.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `COD_LOGS` int unsigned NOT NULL AUTO_INCREMENT,
  `COD_USUARIOS_SISTEMA` varchar(255) DEFAULT NULL,
  `DATA_LOGS` date DEFAULT NULL,
  `HORA_LOGS` datetime DEFAULT NULL,
  `TIPO_LOGS` varchar(255) DEFAULT NULL,
  `ACAO` varchar(255) DEFAULT NULL,
  `IP_LOGS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`COD_LOGS`)
) ENGINE=InnoDB AUTO_INCREMENT=572 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela financas.logs: ~196 rows (aproximadamente)
INSERT INTO `logs` (`COD_LOGS`, `COD_USUARIOS_SISTEMA`, `DATA_LOGS`, `HORA_LOGS`, `TIPO_LOGS`, `ACAO`, `IP_LOGS`) VALUES
	(560, 'admin', '2023-04-17', '2023-04-17 09:24:33', 'NOVA MOVIMENTACAO RECEITA', 'SUCESSO', '127.0.0.1'),
	(561, 'admin', '2023-04-17', '2023-04-17 09:25:11', 'NOVA MOVIMENTACAO', 'SUCESSO', '127.0.0.1'),
	(562, 'admin', '2023-04-17', '2023-04-17 09:25:46', 'NOVA MOVIMENTACAO', 'SUCESSO', '127.0.0.1'),
	(563, 'admin', '2023-04-17', '2023-04-17 09:27:11', 'NOVA MOVIMENTACAO', 'SUCESSO', '127.0.0.1'),
	(564, 'admin', '2023-04-17', '2023-04-17 09:27:50', 'NOVA MOVIMENTACAO', 'SUCESSO', '127.0.0.1'),
	(565, 'admin', '2023-04-17', '2023-04-17 09:28:51', 'CRIACAO DE FORMA DE PAGAMENTOS', 'SUCESSO', '127.0.0.1'),
	(566, '', '2023-04-17', '2023-04-17 09:28:58', 'EXCLUSAO DE FORMA DE PAGAMENTO', 'SUCESSO', '127.0.0.1'),
	(567, 'admin', '2023-04-17', '2023-04-17 09:30:53', 'NOVA MOVIMENTACAO', 'SUCESSO', '127.0.0.1'),
	(568, 'admin', '2023-04-17', '2023-04-17 09:33:49', 'NOVA MOVIMENTACAO', 'SUCESSO', '127.0.0.1'),
	(569, 'admin', '2023-04-17', '2023-04-17 09:40:36', 'NOVA MOVIMENTACAO', 'SUCESSO', '127.0.0.1'),
	(570, 'admin', '2023-04-17', '2023-04-17 09:59:02', 'NOVA MOVIMENTACAO', 'SUCESSO', '127.0.0.1'),
	(571, 'admin', '2023-04-17', '2023-04-17 10:00:20', 'SAIDA_SISTEMA', 'SUCESSO', '127.0.0.1');

-- Copiando estrutura para tabela financas.movimentacoes
CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `idFINANCAS` int unsigned NOT NULL AUTO_INCREMENT,
  `TIPO` varchar(255) DEFAULT NULL,
  `DESCRICAO` varchar(255) DEFAULT NULL,
  `VALOR` decimal(13,2) NOT NULL DEFAULT '0.00',
  `CATEGORIA` varchar(255) NOT NULL,
  `DATA_PAGAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date DEFAULT NULL,
  `FORMA_PAGAMENTO` varchar(255) DEFAULT NULL,
  `CONTA` varchar(255) NOT NULL,
  `PARCELA` varchar(255) NOT NULL,
  `PARCELADO` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `RECORRENTE_PARCELADO` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `SITUACAO` varchar(255) NOT NULL,
  `USOU_CC` tinyint DEFAULT NULL,
  PRIMARY KEY (`idFINANCAS`)
) ENGINE=InnoDB AUTO_INCREMENT=1166 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela financas.movimentacoes: ~148 rows (aproximadamente)
INSERT INTO `movimentacoes` (`idFINANCAS`, `TIPO`, `DESCRICAO`, `VALOR`, `CATEGORIA`, `DATA_PAGAMENTO`, `DATA_VENCIMENTO`, `FORMA_PAGAMENTO`, `CONTA`, `PARCELA`, `PARCELADO`, `RECORRENTE_PARCELADO`, `SITUACAO`, `USOU_CC`) VALUES
	(1149, 'Receitas', 'Salário (1/01)', 1000.00, 'Salário', '1999-01-01', '2023-04-07', 'Depósito em Conta', 'Lu', '01', '0', NULL, 'PENDENTE', NULL),
	(1150, 'Despesas', 'Luz (1/01)', 85.00, 'ENERGIA ELETRICA', NULL, '2023-04-10', 'DEBITO BANCO', 'Lu', '01', '0', NULL, 'PENDENTE', 0),
	(1151, 'Despesas', 'Telefone (1/01)', 45.00, 'TELEFONE', NULL, '2023-04-07', 'DEBITO BANCO', 'Lu', '01', '0', NULL, 'PENDENTE', 0),
	(1152, 'Despesas', 'Condomínio (1/01)', 230.00, 'CONDOMINIO', NULL, '2023-04-14', 'DEBITO BANCO', 'Lu', '01', '0', NULL, 'PENDENTE', 0),
	(1163, 'Despesas', 'Camiseta do Galo (1/03)', 120.00, 'VESTUARIO', NULL, '2023-04-04', 'NUBANK CRÉDITO', 'Lu', '03', 'a4ddd36accaadd86664728798b2358cb', NULL, 'PENDENTE', 1),
	(1164, 'Despesas', 'Camiseta do Galo (2/03)', 120.00, 'VESTUARIO', NULL, '2023-05-04', 'NUBANK CRÉDITO', 'Lu', '03', 'a4ddd36accaadd86664728798b2358cb', NULL, 'PENDENTE', 1),
	(1165, 'Despesas', 'Camiseta do Galo (3/03)', 120.00, 'VESTUARIO', NULL, '2023-06-04', 'NUBANK CRÉDITO', 'Lu', '03', 'a4ddd36accaadd86664728798b2358cb', NULL, 'PENDENTE', 1);

-- Copiando estrutura para tabela financas.nubank_cc_import
CREATE TABLE IF NOT EXISTS `nubank_cc_import` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1460 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela financas.nubank_cc_import: ~80 rows (aproximadamente)

-- Copiando estrutura para tabela financas.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela financas.usuario: ~2 rows (aproximadamente)
INSERT INTO `usuario` (`COD_Usuario`, `cpf`, `nome`, `login`, `senha`, `email`, `perfil`, `cont_acesso`, `path_avatar`, `ultimo_acesso`, `informacoes`) VALUES
	(1, '03040222686', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1, 145, 'img\\avatar.png', '17/04/2023 - 09:11:28', 'Sauer'),
	(3, '030.402.226-86', 'Alexandre Sauer Pais Lemes', 'alesauer', '202cb962ac59075b964b07152d234b70', 'alesauer@gmail.com', 2, 6, 'img\\avatar.png', '21/11/2022 - 12:39:19', 'Sem Informações');

-- Copiando estrutura para view financas.V_10MaioresGastos
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `V_10MaioresGastos` (
	`DATA` DATE NULL,
	`descricao` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`valor` DECIMAL(20,6) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view financas.V_Gastos_Categoria_CC
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `V_Gastos_Categoria_CC` (
	`categoria` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`valor` DECIMAL(42,6) NULL,
	`COMPRAS_NESSA_CATEGORIA` BIGINT(19) NOT NULL,
	`MEDIA` DECIMAL(24,10) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view financas.V_GASTOS_CATEGORIA_TUDO
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `V_GASTOS_CATEGORIA_TUDO` (
	`CATEGORIA` VARCHAR(255) NOT NULL COLLATE 'utf8mb3_general_ci',
	`total` DECIMAL(35,2) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view financas.V_GestosPorData
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `V_GestosPorData` (
	`DATA` DATE NULL,
	`GestosPorData` DECIMAL(42,6) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view financas.V_PARCELAMENTOS_TOTAL_ANO_ATUAL
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `V_PARCELAMENTOS_TOTAL_ANO_ATUAL` (
	`MES` INT(10) NULL,
	`VALOR` DECIMAL(35,2) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view financas.V_TOTAL_DESPESA_ANO_CORRENTE
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `V_TOTAL_DESPESA_ANO_CORRENTE` (
	`MES` INT(10) NULL,
	`TOTAL_DESPESA` DECIMAL(35,2) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view financas.V_TOTAL_RECEITA_ANO_CORRENTE
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `V_TOTAL_RECEITA_ANO_CORRENTE` (
	`MES` INT(10) NULL,
	`TOTAL_RECEITA` DECIMAL(35,2) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view financas.V_10MaioresGastos
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `V_10MaioresGastos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `V_10MaioresGastos` AS select `nubank_cc_import`.`data` AS `DATA`,`nubank_cc_import`.`descricao` AS `descricao`,`nubank_cc_import`.`valor` AS `valor` from `nubank_cc_import` order by `nubank_cc_import`.`valor` desc limit 1,10;

-- Copiando estrutura para view financas.V_Gastos_Categoria_CC
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `V_Gastos_Categoria_CC`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `V_Gastos_Categoria_CC` AS select `nubank_cc_import`.`categoria` AS `categoria`,sum(`nubank_cc_import`.`valor`) AS `valor`,count(`nubank_cc_import`.`categoria`) AS `COMPRAS_NESSA_CATEGORIA`,avg(`nubank_cc_import`.`valor`) AS `MEDIA` from `nubank_cc_import` group by `nubank_cc_import`.`categoria` order by `valor` desc;

-- Copiando estrutura para view financas.V_GASTOS_CATEGORIA_TUDO
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `V_GASTOS_CATEGORIA_TUDO`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `V_GASTOS_CATEGORIA_TUDO` AS select `movimentacoes`.`CATEGORIA` AS `CATEGORIA`,sum(`movimentacoes`.`VALOR`) AS `total` from `movimentacoes` where (`movimentacoes`.`TIPO` = 'Despesas') group by `movimentacoes`.`CATEGORIA` order by `total` desc;

-- Copiando estrutura para view financas.V_GestosPorData
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `V_GestosPorData`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `V_GestosPorData` AS select `nubank_cc_import`.`data` AS `DATA`,sum(`nubank_cc_import`.`valor`) AS `GestosPorData` from `nubank_cc_import` group by `nubank_cc_import`.`data` order by `GestosPorData` desc;

-- Copiando estrutura para view financas.V_PARCELAMENTOS_TOTAL_ANO_ATUAL
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `V_PARCELAMENTOS_TOTAL_ANO_ATUAL`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `V_PARCELAMENTOS_TOTAL_ANO_ATUAL` AS select month(`movimentacoes`.`DATA_VENCIMENTO`) AS `MES`,sum(`movimentacoes`.`VALOR`) AS `VALOR` from `movimentacoes` where ((`movimentacoes`.`TIPO` = 'Despesas') and (`movimentacoes`.`PARCELADO` <> '0') and (year(`movimentacoes`.`DATA_VENCIMENTO`) = year(now()))) group by `MES`;

-- Copiando estrutura para view financas.V_TOTAL_DESPESA_ANO_CORRENTE
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `V_TOTAL_DESPESA_ANO_CORRENTE`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `V_TOTAL_DESPESA_ANO_CORRENTE` AS select month(`movimentacoes`.`DATA_VENCIMENTO`) AS `MES`,sum(`movimentacoes`.`VALOR`) AS `TOTAL_DESPESA` from `movimentacoes` where ((`movimentacoes`.`TIPO` = 'Despesas') and (year(`movimentacoes`.`DATA_VENCIMENTO`) = year(now()))) group by `MES`;

-- Copiando estrutura para view financas.V_TOTAL_RECEITA_ANO_CORRENTE
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `V_TOTAL_RECEITA_ANO_CORRENTE`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `V_TOTAL_RECEITA_ANO_CORRENTE` AS select month(`movimentacoes`.`DATA_VENCIMENTO`) AS `MES`,sum(`movimentacoes`.`VALOR`) AS `TOTAL_RECEITA` from `movimentacoes` where ((`movimentacoes`.`TIPO` = 'Receitas') and (year(`movimentacoes`.`DATA_VENCIMENTO`) = year(now()))) group by `MES`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
