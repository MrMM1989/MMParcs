-- MySQL Workbench Forward Engineering

USE `MMParcs` ;

-- -----------------------------------------------------
-- Table `MMParcs`.`Zone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`Zone` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Address` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MMParcs`.`Sector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`Sector` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `ZoneId` INT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC),
  INDEX `FK_S_ZoneId_idx` (`ZoneId` ASC),
  CONSTRAINT `FK_S_ZoneId`
    FOREIGN KEY (`ZoneId`)
    REFERENCES `MMParcs`.`Zone` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `MMParcs`.`AttractionCategory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`AttractionCategory` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Description` TEXT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MMParcs`.`AttractionStatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`AttractionStatus` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Description` TEXT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MMParcs`.`Attraction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`Attraction` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(100) NOT NULL,
  `Description` TEXT NULL,
  `TimeOpen` TIME NOT NULL,
  `TimeClosed` TIME NOT NULL,
  `AttractionCategoryId` INT NOT NULL,
  `AttractionStatusId` INT NOT NULL,
  `SectorId` INT NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC),
  INDEX `FK_A_AttractionCategoryId_idx` (`AttractionCategoryId` ASC),
  INDEX `FK_A_AttractionStatusId_idx` (`AttractionStatusId` ASC),
  INDEX `FK_A_SectorId_idx` (`SectorId` ASC),
  CONSTRAINT `FK_A_AttractionCategoryId`
    FOREIGN KEY (`AttractionCategoryId`)
    REFERENCES `MMParcs`.`AttractionCategory` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `FK_A_AttractionStatusId`
    FOREIGN KEY (`AttractionStatusId`)
    REFERENCES `MMParcs`.`AttractionStatus` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `FK_A_SectorId`
    FOREIGN KEY (`SectorId`)
    REFERENCES `MMParcs`.`Sector` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);