SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `asistencia` DEFAULT CHARACTER SET utf8 ;
USE `asistencia` ;

-- -----------------------------------------------------
-- Table `asistencia`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`tipo_usuario` (
  `id_tipo_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `activo` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `asistencia`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre_usuario` VARCHAR(60) NOT NULL,
  `apellido_usuario` VARCHAR(60) NOT NULL,
  `carnet` VARCHAR(15) NOT NULL,
  `direccion` VARCHAR(45) NULL,
  `id_tipo_usuario` INT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_tipo_usuario_idx` (`id_tipo_usuario` ASC),
  CONSTRAINT `fk_tipo_usuario`
    FOREIGN KEY (`id_tipo_usuario`)
    REFERENCES `asistencia`.`tipo_usuario` (`id_tipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
