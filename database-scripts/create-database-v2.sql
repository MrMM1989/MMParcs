-- MySQL Workbench Forward Engineering

-- -----------------------------------------------------
-- Schema MaartenMarreel
-- -----------------------------------------------------
USE `MaartenMarreel` ;

-- -----------------------------------------------------
-- Table `MaartenMarreel`.`Zone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MaartenMarreel`.`Zone` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Address` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MaartenMarreel`.`Sector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MaartenMarreel`.`Sector` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `ZoneId` INT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC),
  INDEX `FK_S_ZoneId_idx` (`ZoneId` ASC),
  CONSTRAINT `FK_S_ZoneId`
    FOREIGN KEY (`ZoneId`)
    REFERENCES `MaartenMarreel`.`Zone` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `MaartenMarreel`.`AttractionCategory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MaartenMarreel`.`AttractionCategory` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Description` TEXT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MaartenMarreel`.`AttractionStatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MaartenMarreel`.`AttractionStatus` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Description` TEXT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MaartenMarreel`.`Attraction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MaartenMarreel`.`Attraction` (
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
    REFERENCES `MaartenMarreel`.`AttractionCategory` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `FK_A_AttractionStatusId`
    FOREIGN KEY (`AttractionStatusId`)
    REFERENCES `MaartenMarreel`.`AttractionStatus` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `FK_A_SectorId`
    FOREIGN KEY (`SectorId`)
    REFERENCES `MaartenMarreel`.`Sector` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `MaartenMarreel`.`Role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MaartenMarreel`.`Role` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Description` TEXT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MaartenMarreel`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MaartenMarreel`.`User` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(100) NOT NULL,
  `Email` VARCHAR(255) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `DateRegistration` DATETIME NOT NULL,
  `DateLastLogin` DATETIME NULL,
  `IsBanned` TINYINT(1) NOT NULL DEFAULT 0,
  `RoleId` INT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC),
  INDEX `FK_U_RoleId_idx` (`RoleId` ASC),
  CONSTRAINT `FK_U_RoleId`
    FOREIGN KEY (`RoleId`)
    REFERENCES `MaartenMarreel`.`Role` (`Id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);