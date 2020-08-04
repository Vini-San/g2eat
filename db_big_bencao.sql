-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bigbenca_bigbencao
CREATE DATABASE IF NOT EXISTS `bigbenca_bigbencao` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bigbenca_bigbencao`;

-- Copiando estrutura para tabela bigbenca_bigbencao.company
CREATE TABLE IF NOT EXISTS `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `nome_company` varchar(255) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `uf` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `dt_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_company`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.company: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.company_tel
CREATE TABLE IF NOT EXISTS `company_tel` (
  `id_company_tel` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_titular` varchar(250) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `idcompany` int(11) DEFAULT NULL,
  `id_situacao_entrega` int(11) DEFAULT NULL,
  `id_situacao_financeira` int(11) DEFAULT NULL,
  `id_tipo_pedido` int(11) DEFAULT NULL,
  `dt_pedido` timestamp NULL DEFAULT NULL,
  `dt_entrega` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_company_tel`) USING BTREE,
  KEY `fk_company_tel_company` (`idcompany`) USING BTREE,
  CONSTRAINT `fk_company_tel_company` FOREIGN KEY (`idcompany`) REFERENCES `company` (`id_company`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.company_tel: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `company_tel` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_tel` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bigbenca_bigbencao.groups: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User'),
	(3, 'cliente', 'Cliente');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bigbenca_bigbencao.login_attempts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_balancete
CREATE TABLE IF NOT EXISTS `tb_balancete` (
  `id_balancete` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_tipomovimento` int(11) NOT NULL,
  `valor` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_balancete`),
  KEY `id_pedido` (`id_pedido`),
  KEY `id_tipomovimento` (`id_tipomovimento`),
  CONSTRAINT `balancete_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`),
  CONSTRAINT `balancete_ibfk_2` FOREIGN KEY (`id_tipomovimento`) REFERENCES `tb_tipomovimento` (`id_tipomovimento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_balancete: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_balancete` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_balancete` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_endereco
CREATE TABLE IF NOT EXISTS `tb_endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `uf` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `dt_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_endereco`) USING BTREE,
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_endereco_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_endereco: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_endereco` DISABLE KEYS */;
INSERT INTO `tb_endereco` (`id_endereco`, `logradouro`, `numero`, `complemento`, `cidade`, `uf`, `cep`, `dt_cadastro`, `id_user`) VALUES
	(1, 'Rua tal del longe de algum lugar', '213', 'fundos', 'Rio', 'RJ', '4984984', '2020-07-30 10:56:19', 13),
	(5, 'Rua nova', '100', 'frente', 'Rio de Janeiro', 'RJ', '', '2020-07-30 10:56:34', 13),
	(6, 'Rua nova', '', 'lote 13', '', '', '', '2020-07-30 10:58:19', 13),
	(8, 'Rua Exemplo', '1', '', 'Rio de Janeiro', 'RJ', '2075601', '2020-07-30 16:34:00', 14);
/*!40000 ALTER TABLE `tb_endereco` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_nivel_usuario
CREATE TABLE IF NOT EXISTS `tb_nivel_usuario` (
  `id_nivel_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_nivel_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_nivel_usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_nivel_usuario` DISABLE KEYS */;
INSERT INTO `tb_nivel_usuario` (`id_nivel_usuario`, `nivel`) VALUES
	(1, 'admin'),
	(2, 'usuário');
/*!40000 ALTER TABLE `tb_nivel_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_pedido
CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_titular` int(11) unsigned NOT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  `id_situacao_entrega` int(11) DEFAULT NULL,
  `id_situacao_financeira` int(11) DEFAULT NULL,
  `id_tipo_pedido` int(11) DEFAULT NULL,
  `dt_pedido` timestamp NULL DEFAULT NULL,
  `dt_entrega` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pedido`) USING BTREE,
  KEY `pedido_titular` (`pedido_titular`) USING BTREE,
  KEY `id_situacao_entrega` (`id_situacao_entrega`) USING BTREE,
  KEY `id_situacao_financeira` (`id_situacao_financeira`) USING BTREE,
  KEY `id_tipo_pedido` (`id_tipo_pedido`) USING BTREE,
  KEY `fk_pedido_endereco` (`id_endereco`) USING BTREE,
  CONSTRAINT `fk_pedido_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `tb_endereco` (`id_endereco`),
  CONSTRAINT `tb_pedido_ibfk_2` FOREIGN KEY (`id_situacao_entrega`) REFERENCES `tb_situacao_entrega` (`id_situacao_entrega`),
  CONSTRAINT `tb_pedido_ibfk_3` FOREIGN KEY (`id_situacao_financeira`) REFERENCES `tb_situacao_financeira` (`id_situacao_financeira`),
  CONSTRAINT `tb_pedido_ibfk_4` FOREIGN KEY (`id_tipo_pedido`) REFERENCES `tb_tipo_pedido` (`id_tb_tipo_pedido`),
  CONSTRAINT `tb_pedido_ibfk_5` FOREIGN KEY (`pedido_titular`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_pedido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` (`id_pedido`, `pedido_titular`, `id_endereco`, `id_situacao_entrega`, `id_situacao_financeira`, `id_tipo_pedido`, `dt_pedido`, `dt_entrega`) VALUES
	(4, 4, 8, 1, 2, 5, '2020-07-31 19:42:02', NULL),
	(5, 3, 1, 1, 1, 5, '2020-07-31 20:12:29', NULL);
/*!40000 ALTER TABLE `tb_pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_pedido_produto
CREATE TABLE IF NOT EXISTS `tb_pedido_produto` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  KEY `id_pedido` (`id_pedido`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `pedido_produto_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`),
  CONSTRAINT `pedido_produto_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_pedido_produto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_pedido_produto` DISABLE KEYS */;
INSERT INTO `tb_pedido_produto` (`id_pedido`, `id_produto`, `quantidade`) VALUES
	(5, 1, 3),
	(5, 1, 4),
	(4, 1, 9),
	(4, 2, 3);
/*!40000 ALTER TABLE `tb_pedido_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_produto
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(200) NOT NULL,
  `valor` double NOT NULL DEFAULT 0,
  `quantidade` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tb_tipo_produto` (`id_tipo_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_produto: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `valor`, `quantidade`, `id_tipo`) VALUES
	(1, 'quentinha de panqueca', 15, 2, 1),
	(2, 'feijoada', 15.5, 13, 1),
	(3, 'Coxinha', 5, 10, 2),
	(4, 'Torta de Limão', 5.5, 0, 3),
	(5, 'Cheetos', 4, 10, 4),
	(6, 'Empadão', 5, 12, 2),
	(7, 'Quentinha carne assada com creme de milho', 12, 100, 1),
	(8, 'Pastel', 5, 40, 2),
	(9, 'Água', 2, 40, 5),
	(10, 'Pão na chapa', 3, 12, 6),
	(11, 'Pão com mortadela', 4, 12, 6),
	(12, 'Misto quente', 5, 12, 6),
	(13, 'Pão com queijo', 4.5, 12, 6),
	(14, 'Pão com ovo', 3.5, 12, 6),
	(15, 'Hambúrguer', 5, 20, 7),
	(16, 'Hambúrguer big benção', 7, 20, 7),
	(17, 'Happy dez', 5, 20, 7),
	(18, 'Bolo integral', 5, 12, 8),
	(19, 'Bolo simples', 4, 12, 8),
	(20, 'Torta', 5, 12, 8),
	(21, 'Pirulito ', 0.5, 25, 3),
	(22, 'Bala', 0.1, 30, 3),
	(23, 'Pipoca doce', 2, 10, 3),
	(24, 'Amendoim', 0.5, 20, 3),
	(25, 'Guaraná natural', 1.5, 24, 5),
	(26, 'Suco', 5, 12, 5),
	(27, 'Salgado de Forno', 5, 12, 2),
	(28, 'Salgado frito', 4, 12, 2),
	(29, 'Promoção salgado e Guaraná natural', 5, 20, 2),
	(30, 'Batata Frita grande', 5, 20, 2),
	(31, 'Alfhajor', 2, 20, 3),
	(32, 'sopa de ervilha', 15, 0, 1);
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_situacao_entrega
CREATE TABLE IF NOT EXISTS `tb_situacao_entrega` (
  `id_situacao_entrega` int(11) NOT NULL AUTO_INCREMENT,
  `nome_situacao_entrega` varchar(20) NOT NULL,
  PRIMARY KEY (`id_situacao_entrega`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_situacao_entrega: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_situacao_entrega` DISABLE KEYS */;
INSERT INTO `tb_situacao_entrega` (`id_situacao_entrega`, `nome_situacao_entrega`) VALUES
	(1, 'pendente'),
	(2, 'realizada');
/*!40000 ALTER TABLE `tb_situacao_entrega` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_situacao_financeira
CREATE TABLE IF NOT EXISTS `tb_situacao_financeira` (
  `id_situacao_financeira` int(11) NOT NULL AUTO_INCREMENT,
  `nome_situacao_financeira` varchar(20) NOT NULL,
  PRIMARY KEY (`id_situacao_financeira`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_situacao_financeira: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_situacao_financeira` DISABLE KEYS */;
INSERT INTO `tb_situacao_financeira` (`id_situacao_financeira`, `nome_situacao_financeira`) VALUES
	(1, 'pendente'),
	(2, 'realizado'),
	(3, 'outro');
/*!40000 ALTER TABLE `tb_situacao_financeira` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_situacao_usuario
CREATE TABLE IF NOT EXISTS `tb_situacao_usuario` (
  `id_situacao_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `situacao` varchar(20) NOT NULL,
  PRIMARY KEY (`id_situacao_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_situacao_usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_situacao_usuario` DISABLE KEYS */;
INSERT INTO `tb_situacao_usuario` (`id_situacao_usuario`, `situacao`) VALUES
	(1, 'ativo');
/*!40000 ALTER TABLE `tb_situacao_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_tipomovimento
CREATE TABLE IF NOT EXISTS `tb_tipomovimento` (
  `id_tipomovimento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipomovimento` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_tipomovimento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_tipomovimento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipomovimento` DISABLE KEYS */;
INSERT INTO `tb_tipomovimento` (`id_tipomovimento`, `nome_tipomovimento`) VALUES
	(1, 'receita'),
	(2, 'despesa');
/*!40000 ALTER TABLE `tb_tipomovimento` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_tipo_pedido
CREATE TABLE IF NOT EXISTS `tb_tipo_pedido` (
  `id_tb_tipo_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `tb_tipo_pedido` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tb_tipo_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_tipo_pedido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipo_pedido` DISABLE KEYS */;
INSERT INTO `tb_tipo_pedido` (`id_tb_tipo_pedido`, `tb_tipo_pedido`) VALUES
	(4, 'delivery'),
	(5, 'retirar na igreja');
/*!40000 ALTER TABLE `tb_tipo_pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_tipo_produto
CREATE TABLE IF NOT EXISTS `tb_tipo_produto` (
  `id_tipo_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo_produto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_tipo_produto: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipo_produto` DISABLE KEYS */;
INSERT INTO `tb_tipo_produto` (`id_tipo_produto`, `nome_tipo_produto`) VALUES
	(1, 'refeição'),
	(2, 'salgado'),
	(3, 'doce'),
	(4, 'biscoitos'),
	(5, 'bebida'),
	(6, 'Pão na Chapa'),
	(7, 'Sanduíche'),
	(8, 'Bolo e sobremesa'),
	(9, 'Doces'),
	(10, 'sucos');
/*!40000 ALTER TABLE `tb_tipo_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_usuario
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(200) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `tentativa` int(11) DEFAULT NULL,
  `id_nivel_usuario` int(11) DEFAULT NULL,
  `id_situacao_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_situacao_usuario` (`id_situacao_usuario`),
  KEY `id_nivel_usuario` (`id_nivel_usuario`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_situacao_usuario`) REFERENCES `tb_situacao_usuario` (`id_situacao_usuario`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_nivel_usuario`) REFERENCES `tb_nivel_usuario` (`id_nivel_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `cpf`, `telefone`, `senha`, `tentativa`, `id_nivel_usuario`, `id_situacao_usuario`) VALUES
	(1, 'simone', '05632009793', '983537252', 'simone123456', 0, 1, 1);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bigbenca_bigbencao.users: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `ip_address`, `phone`) VALUES
	(1, 'administrador', '$2y$12$wOMnvKlKM6iPK0VVDPZIuuoAMfAga.LIm2Zll.Jv7pVjNfa0y9XaC', 'admin@admin.com', NULL, '', NULL, NULL, NULL, '4fe7ba3d098f05f721d6ec5515ef11d9b9e26dfd', '$2y$10$.HZ75hwfS0ecazjCVr5c8.hkjFgtpDPMgivpStFkMJdZOqUO8LNya', 1268889823, 1589728291, 1, 'Admin', 'istrator', 0, '127.0.0.1', '0'),
	(2, 'Usuario', '$2y$10$j9xhyIaWnkLyqEzJTbYuO.Gb0EgA0DqaO0fkCNWFj1jCjKxJDlATW', 'user.teste', NULL, NULL, NULL, NULL, NULL, '79e45015dd962fb4db849dce187299e1b890fccd', '$2y$10$vZi45O7SSqQHLfkXLrGxNuI8/yl2WkqonbSWQALyTEkTv3gmQGEyu', 1588445433, 1588451841, 1, 'benedmunds', 'Edmunds', 2, '127.0.0.1', NULL),
	(3, 'Simone', '$2y$12$hA/Znq3eLA9MrfMX5aF3QubEEoOjhPtURM4Qxu2KfjQZvArCzzwou', 'simone_admin', NULL, NULL, NULL, NULL, NULL, '0e4dc15808773e66fa20e4cb37c6a60ec303554f', '$2y$10$UZ2dlBdgUqZHC0Ubj86uWelCtriFShzh6IPEveCWZJqCKhzamvQUy', 1588451055, 1596253627, 1, 'Simone', NULL, 1, '127.0.0.1', NULL),
	(4, 'Vinicius', '$2y$12$YuorFj.plCqndMTdyI1OpeCi8DKS61dDgO2yQLte4UubZgxhN/T9q', 'vinicius_admin', NULL, NULL, NULL, NULL, NULL, '60c1596b88dff118befb833da9912e4e5e042c01', '$2y$10$MQk0FzjiAEZkAMfPgmujIuF2cWCS01zw/LtOzTSSEkZHRdX8/pP9q', 1588451316, 1596258824, 1, 'Vinicius', NULL, 2, '127.0.0.1', NULL),
	(6, 'Julia', '$2y$10$A2DDv70qS3bGlhE/i51Ia.sRepbRHvdxmeAj2r1D4gM4dD27/kojO', 'jujuba', NULL, NULL, NULL, NULL, NULL, 'f87cad5ed2ac57faba8592f476ffa2b7523ed776', '$2y$10$NGGMNFmSpF/Y9PW6vXTbmOcYhzNGk3IgWGtuCNhGi5.9rN3R5Ecuy', 1588453454, 1596258710, 1, 'Julia', NULL, 1, '127.0.0.1', NULL),
	(7, 'Juliana', '$2y$12$Hg70UGdNkywX8e00nUnZeevusko2PtBMkghYejPwEjKzJLtWaHo9.', 'juliana.rosa', NULL, NULL, NULL, NULL, NULL, '3296643643040277108be8108f6badb00fa5e09e', NULL, 1588456049, 1596133925, 1, 'Juliana', NULL, 2, '127.0.0.1', NULL),
	(13, 'Cliente teste1', '$2y$10$qCe1dRczBxAXiAXWFWBpoebO5WK5cb5unT.cajPSt9a9W80NNMZEq', 'cli.teste1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1595554689, NULL, 1, NULL, NULL, NULL, '127.0.0.1', '98498498'),
	(14, 'cliente dois', '$2y$10$hAYOpQkYR7qWT1pm3hcgFeepe3OJTPj3xiK3uWAK9KskTS/ZTzr9K', 'cliente.dois', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1596137640, NULL, 1, NULL, NULL, NULL, '127.0.0.1', '98765132198');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bigbenca_bigbencao.users_groups: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(21, 1, 1),
	(18, 2, 2),
	(4, 3, 1),
	(20, 4, 1),
	(22, 6, 2),
	(15, 7, 1),
	(34, 13, 3),
	(33, 14, 3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
