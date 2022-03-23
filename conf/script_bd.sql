-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `auladia15` DEFAULT CHARACTER SET utf8 ;
USE `auladia15` ;

CREATE TABLE IF NOT EXISTS `auladia15`.`Estado` (
  `EstadoID` INT NOT NULL AUTO_INCREMENT,
  `EstadoNome` VARCHAR(45) NULL,
  `EstadoSigla` VARCHAR(45) NULL,
  PRIMARY KEY (`EstadoID`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `auladia15`.`Cidade` (
  `CidadeID` INT NOT NULL AUTO_INCREMENT,
  `CidadeNome` VARCHAR(45) NULL,
  `EstadoID` INT NOT NULL,
  PRIMARY KEY (`CidadeID`),
  CONSTRAINT `fk_Cidade_Estado`
    FOREIGN KEY (`EstadoID`)
    REFERENCES `auladia15`.`Estado` (`EstadoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `auladia15`.`estado` (`EstadoNome`, `EstadoSigla`) VALUES ('Santa Catarina', 'SC');
INSERT INTO `auladia15`.`estado` (`EstadoNome`, `EstadoSigla`) VALUES ('São Paulo', 'SP');
INSERT INTO `auladia15`.`estado` (`EstadoNome`, `EstadoSigla`) VALUES ('Paraná', 'PR');
INSERT INTO `auladia15`.`estado` (`EstadoNome`, `EstadoSigla`) VALUES ('Rio Grande do Sul', 'RS');
INSERT INTO `auladia15`.`estado` (`EstadoNome`, `EstadoSigla`) VALUES ('Minas Gerais', 'MG');
INSERT INTO `auladia15`.`cidade` (`CidadeNome`, `EstadoID`) VALUES ('Rio do Sul', '1');
INSERT INTO `auladia15`.`cidade` (`CidadeNome`, `EstadoID`) VALUES ('Ituporanga', '1');
INSERT INTO `auladia15`.`cidade` (`CidadeNome`, `EstadoID`) VALUES ('Blumenau', '1');
INSERT INTO `auladia15`.`cidade` (`CidadeNome`, `EstadoID`) VALUES ('Joinville', '1');
INSERT INTO `auladia15`.`cidade` (`CidadeNome`, `EstadoID`) VALUES ('São Paulo', '2');
INSERT INTO `auladia15`.`cidade` (`CidadeNome`, `EstadoID`) VALUES ('Curitiba', '3');

