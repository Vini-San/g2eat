-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bigbenca_bigbencao
CREATE DATABASE IF NOT EXISTS `bigbenca_bigbencao` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bigbenca_bigbencao`;

-- Copiando estrutura para tabela bigbenca_bigbencao.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bigbenca_bigbencao.groups: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bigbenca_bigbencao.login_attempts: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
	(1, '127.0.0.1', 'a', 1588435766),
	(2, '127.0.0.1', 'a', 1588436078),
	(3, '127.0.0.1', 'a', 1588436105),
	(4, '127.0.0.1', 'a', 1588438244);
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_balancete
CREATE TABLE IF NOT EXISTS `tb_balancete` (
  `id_balancete` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_tipomovimento` int(11) NOT NULL,
  `valor` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_balancete`),
  KEY `id_pedido` (`id_pedido`),
  KEY `id_tipomovimento` (`id_tipomovimento`),
  CONSTRAINT `balancete_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`),
  CONSTRAINT `balancete_ibfk_2` FOREIGN KEY (`id_tipomovimento`) REFERENCES `tb_tipomovimento` (`id_tipomovimento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_balancete: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_balancete` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_balancete` ENABLE KEYS */;

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
  `pedido_titular` varchar(250) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `logradouro` varchar(250) DEFAULT NULL,
  `numero` varchar(200) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_situacao_entrega` int(11) DEFAULT NULL,
  `id_situacao_financeira` int(11) DEFAULT NULL,
  `id_tipo_pedido` int(11) DEFAULT NULL,
  `dt_pedido` timestamp NULL DEFAULT NULL,
  `dt_entrega` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_situacao_entrega` (`id_situacao_entrega`),
  KEY `id_situacao_financeira` (`id_situacao_financeira`),
  KEY `id_tipo_pedido` (`id_tipo_pedido`),
  CONSTRAINT `tb_pedido_ibfk_2` FOREIGN KEY (`id_situacao_entrega`) REFERENCES `tb_situacao_entrega` (`id_situacao_entrega`),
  CONSTRAINT `tb_pedido_ibfk_3` FOREIGN KEY (`id_situacao_financeira`) REFERENCES `tb_situacao_financeira` (`id_situacao_financeira`),
  CONSTRAINT `tb_pedido_ibfk_4` FOREIGN KEY (`id_tipo_pedido`) REFERENCES `tb_tipo_pedido` (`id_tb_tipo_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_pedido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` (`id_pedido`, `pedido_titular`, `telefone`, `logradouro`, `numero`, `complemento`, `cidade`, `uf`, `id_usuario`, `id_situacao_entrega`, `id_situacao_financeira`, `id_tipo_pedido`, `dt_pedido`, `dt_entrega`) VALUES
	(4, 'Vinicius', '981391520', 'Rua Divino Salvador', '100', 'Fundos', 'Rio de Janeiro', 'RJ', 1, 1, 1, 5, '2020-04-29 15:19:26', NULL),
	(5, 'Juliana', '981351459', 'Rua Divino Salvador', '100', 'Fundos', 'Rio de Janeiro', 'RJ', 1, 2, 1, 4, '2020-04-29 15:21:45', NULL);
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
	(4, 1, 3),
	(5, 1, 4),
	(4, 1, 9),
	(4, 2, 3);
/*!40000 ALTER TABLE `tb_pedido_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.tb_produto
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(200) NOT NULL,
  `valor` double NOT NULL DEFAULT '0',
  `quantidade` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tb_tipo_produto` (`id_tipo_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_produto: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `valor`, `quantidade`, `id_tipo`) VALUES
	(1, 'quentinha de panqueca', 15, 2, 1),
	(2, 'feijoada', 15.5, 13, 1),
	(3, 'Coxinha', 5, 10, 2),
	(4, 'Torta de Limão', 5.5, 0, 3),
	(5, 'Cheetos', 4, 10, 4);
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

-- Copiando dados para a tabela bigbenca_bigbencao.tb_situacao_usuario: ~0 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigbenca_bigbencao.tb_tipo_produto: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipo_produto` DISABLE KEYS */;
INSERT INTO `tb_tipo_produto` (`id_tipo_produto`, `nome_tipo_produto`) VALUES
	(1, 'refeição'),
	(2, 'salgado'),
	(3, 'doce'),
	(4, 'biscoitos'),
	(5, 'bebida');
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

-- Copiando dados para a tabela bigbenca_bigbencao.tb_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `cpf`, `telefone`, `senha`, `tentativa`, `id_nivel_usuario`, `id_situacao_usuario`) VALUES
	(1, 'simone', '05632009793', '983537252', 'simone123456', 0, 1, 1);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela bigbenca_bigbencao.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
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
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bigbenca_bigbencao.users: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
	(1, '127.0.0.1', 'administrador', '$2y$12$wOMnvKlKM6iPK0VVDPZIuuoAMfAga.LIm2Zll.Jv7pVjNfa0y9XaC', 'admin@admin.com', NULL, '', NULL, NULL, NULL, '6d878dd95400ff65a5a9873658dda9bd0704d184', '$2y$10$33f.ThWNeVnIPBsw3tCxaehcVFTVlNXnqFbH6t7DOOIhzKngH2Xh.', 1268889823, 1588441278, 1, 'Admin', 'istrator', 'ADMIN', '0'),
	(2, '127.0.0.1', 'Usuario', '$2y$10$j9xhyIaWnkLyqEzJTbYuO.Gb0EgA0DqaO0fkCNWFj1jCjKxJDlATW', 'user.teste', NULL, NULL, NULL, NULL, NULL, '79e45015dd962fb4db849dce187299e1b890fccd', '$2y$10$vZi45O7SSqQHLfkXLrGxNuI8/yl2WkqonbSWQALyTEkTv3gmQGEyu', 1588445433, 1588451841, 1, 'benedmunds', 'Edmunds', NULL, NULL),
	(3, '127.0.0.1', 'Simone', '$2y$12$hA/Znq3eLA9MrfMX5aF3QubEEoOjhPtURM4Qxu2KfjQZvArCzzwou', 'simone_admin', NULL, NULL, NULL, NULL, NULL, '650efcfc75a7e112494af14e7345c7cf966b4ac2', NULL, 1588451055, 1588452097, 1, 'Simone', NULL, NULL, NULL),
	(4, '127.0.0.1', 'Vinicius', '$2y$12$Wi8LcDhJ/3B4YEwn9ta23OehZZTbe2Rl5hoYVgUhAerR7vsJxkGc.', 'vinicius_admin', NULL, NULL, NULL, NULL, NULL, 'f4623c2ecc2a85f75023a715c33222ae7bade67c', '$2y$10$EWIaeyKekn2oEgPkqFAzVOtFA2DPI8QNTKLuer0VaucX0wPHewXmC', 1588451316, 1588464947, 1, 'Vinicius', NULL, NULL, NULL),
	(6, '127.0.0.1', 'Julia', '$2y$10$39P.VD4shTcJVMv3mIUkLehmZR7OeY1B0metT2l1dOPCFbVv9mdDW', 'jujuba', NULL, NULL, NULL, NULL, NULL, '4a6535e9a445839c3e4641d21536f27ed3c350ff', NULL, 1588453454, 1588460976, 1, 'Julia', NULL, NULL, NULL),
	(7, '127.0.0.1', 'Juliana', '$2y$10$y.FWAlfIFSB0otFuokLuXOQ12aGw1fkP3Sn8A/bkvA6Pb0FRJbJ1O', 'juliana.rosa', NULL, NULL, NULL, NULL, NULL, '744a74aa8ab404da04919388285038d72d771c85', '$2y$10$b/3AqYRA7te/8S80RJyNtOhHO8b5u0Hp8DdIjPDHe7f2a7C79y.y.', 1588456049, 1588464907, 1, 'Juliana', NULL, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bigbenca_bigbencao.users_groups: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(17, 1, 1),
	(16, 2, 2),
	(4, 3, 1),
	(5, 4, 1),
	(11, 6, 2),
	(15, 7, 2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
