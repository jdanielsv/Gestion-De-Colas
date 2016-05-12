-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`indexPersonalizado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`indexPersonalizado` (
  `idindexPersonalizado` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `logo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `footer` VARCHAR(45) NULL,
  PRIMARY KEY (`idindexPersonalizado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL COMMENT '	',
  `apellidos` VARCHAR(45) NULL,
  `rol` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `contrasenia` VARCHAR(45) NULL,
  `indexPersonalizado_idindexPersonalizado` INT NOT NULL,
  PRIMARY KEY (`idusuario`, `indexPersonalizado_idindexPersonalizado`),
  INDEX `fk_usuario_indexPersonalizado1_idx` (`indexPersonalizado_idindexPersonalizado` ASC),
  CONSTRAINT `fk_usuario_indexPersonalizado1`
    FOREIGN KEY (`indexPersonalizado_idindexPersonalizado`)
    REFERENCES `mydb`.`indexPersonalizado` (`idindexPersonalizado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cola`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cola` (
  `idcola` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `fecha_fin` VARCHAR(45) NULL,
  `fecha_inicio` VARCHAR(45) NULL,
  `usuario_idusuario` INT NOT NULL COMMENT '	',
  `codigo_alta` VARCHAR(45) NULL,
  PRIMARY KEY (`idcola`, `usuario_idusuario`),
  INDEX `fk_cola_usuario_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_cola_usuario`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `mydb`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuarioTemporales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuarioTemporales` (
  `idusuarioTemporales` INT NOT NULL AUTO_INCREMENT,
  `DNI` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `codigo_cliente` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuarioTemporales`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cola_has_usuarioTemporales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cola_has_usuarioTemporales` (
  `cola_idcola` INT NOT NULL,
  `cola_usuario_idusuario` INT NOT NULL,
  `usuarioTemporales_idusuarioTemporales` INT NOT NULL,
  `posicion` INT NULL,
  PRIMARY KEY (`cola_idcola`, `cola_usuario_idusuario`, `usuarioTemporales_idusuarioTemporales`),
  INDEX `fk_cola_has_usuarioTemporales_usuarioTemporales1_idx` (`usuarioTemporales_idusuarioTemporales` ASC),
  INDEX `fk_cola_has_usuarioTemporales_cola1_idx` (`cola_idcola` ASC, `cola_usuario_idusuario` ASC),
  CONSTRAINT `fk_cola_has_usuarioTemporales_cola1`
    FOREIGN KEY (`cola_idcola` , `cola_usuario_idusuario`)
    REFERENCES `mydb`.`cola` (`idcola` , `usuario_idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cola_has_usuarioTemporales_usuarioTemporales1`
    FOREIGN KEY (`usuarioTemporales_idusuarioTemporales`)
    REFERENCES `mydb`.`usuarioTemporales` (`idusuarioTemporales`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
