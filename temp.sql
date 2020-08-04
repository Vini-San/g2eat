CREATE TABLE `company` (
	`id_company` INT(11) NOT NULL AUTO_INCREMENT,
	`nome_company` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`logradouro` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`numero` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`complemento` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`cidade` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`uf` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`cep` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`dt_cadastro` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	PRIMARY KEY (`id_company`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=9
;

CREATE TABLE `tel_company` (
	`id_tel_company` INT(11) NOT NULL AUTO_INCREMENT,
	`idcompany` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`telefone` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`id_user` INT(10) UNSIGNED NOT NULL,
	PRIMARY KEY (`id_tel_company`) USING BTREE,
	INDEX `idcompany` (`idcompany`) USING BTREE,
	CONSTRAINT `tel_company_ibfk_1` FOREIGN KEY (`idcompany`) REFERENCES `bigbenca_bigbencao`.`company` (`id_company`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=9
;
