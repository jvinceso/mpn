SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bdmpnintegrado` ;
USE `bdmpnintegrado` ;

-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`aplicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`aplicacion` (
  `nAplId` INT(11) NOT NULL AUTO_INCREMENT,
  `cAplNombre` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `nAplTipo` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cAplIcono` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cAplEstado` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `dAplFechaRegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nAplId`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`objeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`objeto` (
  `nObjId` INT(11) NOT NULL AUTO_INCREMENT,
  `nAplId` INT(11) NOT NULL,
  `cObjNombre` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cObjNombreArchivo` VARCHAR(200) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `bObjTipo` INT(11) NOT NULL,
  `nObjIdPadre` INT(11) NOT NULL,
  `dObjFechaRegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bObjEliminado` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nObjId`),
  INDEX `FK_Objeto_Aplicacion_idx` (`nAplId` ASC),
  CONSTRAINT `FK_Objeto_Aplicacion`
    FOREIGN KEY (`nAplId`)
    REFERENCES `bdmpnintegrado`.`aplicacion` (`nAplId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`objeto_detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`objeto_detalle` (
  `nOdetId` INT(11) NOT NULL AUTO_INCREMENT,
  `nObjId` INT(11) NOT NULL,
  `cOdetNombreArchivo` VARCHAR(200) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `nOdetTipo` INT(11) NOT NULL,
  `cOdetPlataforma` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cOdetEstado` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `dOdetFechaRegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nOdetId`),
  INDEX `FK_Objeto_Detalle_Objeto_idx` (`nObjId` ASC),
  CONSTRAINT `FK_Objeto_Detalle_Objeto`
    FOREIGN KEY (`nObjId`)
    REFERENCES `bdmpnintegrado`.`objeto` (`nObjId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`persona` (
  `nPerId` INT(11) NOT NULL AUTO_INCREMENT,
  `nUbiId` INT(11) NOT NULL,
  `cPerApellidoPaterno` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `cPerApellidoMaterno` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `cPerNombres` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `dPerFechaRegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bPerEliminado` BIT(1) NOT NULL DEFAULT b'0',
  `cUbiIdDepartamento` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `cUbiIdProvincia` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `cUbiIdDistrito` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `cPerRandom` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`nPerId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`persona_detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`persona_detalle` (
  `nPdeId` INT(11) NOT NULL AUTO_INCREMENT,
  `nPerId` INT(11) NOT NULL,
  `nMulId` INT(11) NOT NULL,
  `cPdeValor` VARCHAR(200) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL,
  `dPedFechaRegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cPedEliminado` CHAR(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`nPdeId`),
  INDEX `FK_Persona_Detalle_idx` (`nPerId` ASC),
  CONSTRAINT `FK_Persona_Detalle`
    FOREIGN KEY (`nPerId`)
    REFERENCES `bdmpnintegrado`.`persona` (`nPerId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`persona_juridica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`persona_juridica` (
  `nPerId` INT(11) NOT NULL,
  `nMulIdRubro` INT(11) NOT NULL,
  PRIMARY KEY (`nPerId`),
  CONSTRAINT `FK_Persona_Juridica`
    FOREIGN KEY (`nPerId`)
    REFERENCES `bdmpnintegrado`.`persona` (`nPerId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`persona_natural`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`persona_natural` (
  `nPerId` INT(11) NOT NULL,
  `bPnaSexo` BIT(1) NOT NULL,
  `dPnaFechaNacimiento` DATE NOT NULL,
  `dPnaFechaRegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nPnaEdad` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`nPerId`),
  CONSTRAINT `FK_Persona`
    FOREIGN KEY (`nPerId`)
    REFERENCES `bdmpnintegrado`.`persona` (`nPerId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`ubigeo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`ubigeo` (
  `nUbiId` INT(11) NOT NULL AUTO_INCREMENT,
  `nPaiId` INT(11) NOT NULL,
  `cUbiIdDepartamento` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cUbiIdProvincia` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cUbiIdDistrito` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cUbiDescripcion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  PRIMARY KEY (`nUbiId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`usuario` (
  `nUsuId` INT(11) NOT NULL AUTO_INCREMENT,
  `nPerId` INT(11) NOT NULL,
  `cPerUsuCodigo` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cPerUsuClave` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `nUsuTipo` INT(11) NOT NULL,
  `dUsuFechaRegistro` DATETIME NOT NULL,
  `bUsuEliminado` INT(11) NOT NULL,
  PRIMARY KEY (`nUsuId`),
  INDEX `FK_Usuario_Persona_idx` (`nPerId` ASC),
  CONSTRAINT `FK_Usuario_Persona`
    FOREIGN KEY (`nPerId`)
    REFERENCES `bdmpnintegrado`.`persona` (`nPerId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdmpnintegrado`.`usuario_objeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdmpnintegrado`.`usuario_objeto` (
  `nUobId` INT(11) NOT NULL AUTO_INCREMENT,
  `nObjId` INT(11) NOT NULL,
  `nUsuId` INT(11) NOT NULL,
  `dUobFecharegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cUobEliminado` CHAR(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`nUobId`),
  INDEX `FK_Usuario_objeto_Usuario_idx` (`nUsuId` ASC),
  INDEX `FK_Usuario_Objeto_Objeto_idx` (`nObjId` ASC),
  CONSTRAINT `FK_Usuario_objeto_Usuario`
    FOREIGN KEY (`nUsuId`)
    REFERENCES `bdmpnintegrado`.`usuario` (`nUsuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Usuario_Objeto_Objeto`
    FOREIGN KEY (`nObjId`)
    REFERENCES `bdmpnintegrado`.`objeto` (`nObjId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
