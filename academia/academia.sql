-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para academia
CREATE DATABASE IF NOT EXISTS `academia` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `academia`;

-- Copiando estrutura para tabela academia.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.anamnese
CREATE TABLE IF NOT EXISTS `anamnese` (
  `idAnamnese` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `data` date NOT NULL,
  `altura` float(5,2) NOT NULL,
  `peso` float(5,2) NOT NULL,
  `imc` float(10,2) NOT NULL,
  `fumante` enum('Sim','Não') NOT NULL,
  `pressao` enum('Alta','Baixa','Normal') NOT NULL,
  `diabete` enum('Sim','Não') NOT NULL,
  `cardiaco` enum('Sim','Não') NOT NULL,
  `colesterol` enum('Alto','Baixo','Normal') NOT NULL,
  `lesao` enum('Sim','Não') NOT NULL,
  `medicamento` enum('Sim','Não') NOT NULL,
  `dataExame` date NOT NULL,
  `suplemento` enum('Sim','Não') NOT NULL,
  `atividadeFisica` enum('Sim','Não') NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`idAnamnese`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `observacoes` text NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `treinamento` enum('Musculação') DEFAULT NULL,
  `idObjetivo` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_cliente_objetivo1_idx` (`idObjetivo`),
  CONSTRAINT `fk_cliente_objetivo1` FOREIGN KEY (`idObjetivo`) REFERENCES `objetivo` (`idObjetivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.contrato
CREATE TABLE IF NOT EXISTS `contrato` (
  `idContrato` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `diaPagamento` enum('1','5','10','15','20') NOT NULL,
  `ativo` enum('Sim','Não') DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idPlanos` int(11) NOT NULL,
  PRIMARY KEY (`idContrato`),
  KEY `fk_contrato_cliente1_idx` (`idCliente`),
  KEY `fk_contrato_planos1_idx` (`idPlanos`),
  CONSTRAINT `fk_contrato_cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_planos1` FOREIGN KEY (`idPlanos`) REFERENCES `planos` (`idPlanos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.exercicio
CREATE TABLE IF NOT EXISTS `exercicio` (
  `idExercicio` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) DEFAULT NULL,
  `exercicio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idExercicio`),
  KEY `fk_exercicio_categoria1_idx` (`idCategoria`),
  CONSTRAINT `fk_exercicio_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.mensalidade
CREATE TABLE IF NOT EXISTS `mensalidade` (
  `idMensalidade` int(11) NOT NULL AUTO_INCREMENT,
  `dt_vencimento` date DEFAULT NULL,
  `dt_pagamento` date DEFAULT NULL,
  `pago` enum('sim','não') DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `idContrato` int(11) NOT NULL,
  PRIMARY KEY (`idMensalidade`),
  KEY `fk_mensalidade_contrato1_idx` (`idContrato`),
  CONSTRAINT `fk_mensalidade_contrato1` FOREIGN KEY (`idContrato`) REFERENCES `contrato` (`idContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.objetivo
CREATE TABLE IF NOT EXISTS `objetivo` (
  `idObjetivo` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idObjetivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.planos
CREATE TABLE IF NOT EXISTS `planos` (
  `idPlanos` int(11) NOT NULL AUTO_INCREMENT,
  `plano` varchar(100) DEFAULT NULL,
  `valor` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`idPlanos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela academia.treino
CREATE TABLE IF NOT EXISTS `treino` (
  `idTreino` int(11) NOT NULL AUTO_INCREMENT,
  `idExercicio` int(11) NOT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `historico` enum('Sim','Não') NOT NULL,
  `idContrato` int(11) NOT NULL,
  `peso` varchar(15) NOT NULL,
  PRIMARY KEY (`idTreino`),
  KEY `fk_treino_contrato1` (`idContrato`),
  KEY `fk_treino_exercicio1` (`idExercicio`),
  CONSTRAINT `fk_treino_contrato1` FOREIGN KEY (`idContrato`) REFERENCES `contrato` (`idContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_treino_exercicio1` FOREIGN KEY (`idExercicio`) REFERENCES `exercicio` (`idExercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
