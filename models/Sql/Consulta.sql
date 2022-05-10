CREATE TABLE `tbprocedimento` (
	`IdProcedimento` INT(11) NOT NULL AUTO_INCREMENT,
	`Descricao` VARCHAR(250) NOT NULL COLLATE 'utf8mb4_general_ci',
	`ValorProc` FLOAT NOT NULL DEFAULT '0',
	PRIMARY KEY (`IdProcedimento`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `tbcotacao` (
	`IdCotacao` INT(11) NOT NULL AUTO_INCREMENT,
	`IdProcedimento` INT(11) NOT NULL,
	`NomeFornecedor` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`ValorCotacao` DOUBLE NOT NULL DEFAULT '0',
	PRIMARY KEY (`IdCotacao`) USING BTREE,
	INDEX `IdProcedimento` (`IdProcedimento`) USING BTREE,
	CONSTRAINT `FK_tbcotacao_tbprocedimento` FOREIGN KEY (`IdProcedimento`) REFERENCES `tbprocedimento` (`IdProcedimento`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

INSERT INTO `base`.`tbprocedimento` (`Descricao`, `ValorProc`) VALUES ('Radiografia', '50');
INSERT INTO `base`.`tbprocedimento` (`Descricao`, `ValorProc`) VALUES ('Mamografia', '150');
INSERT INTO `base`.`tbprocedimento` (`Descricao`, `ValorProc`) VALUES ('Exame', '150');

INSERT INTO `base`.`tbcotacao` (`IdProcedimento`, `NomeFornecedor`, `ValorCotacao`) VALUES ('1', 'Março Cunha', '60');
INSERT INTO `base`.`tbcotacao` (`IdProcedimento`, `NomeFornecedor`, `ValorCotacao`) VALUES ('2', 'Climed', '150');
INSERT INTO `base`.`tbcotacao` (`IdProcedimento`, `NomeFornecedor`, `ValorCotacao`) VALUES ('1', 'ProSaude', '70');

