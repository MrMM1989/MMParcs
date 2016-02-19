-- MySQL Workbench Forward Engineering for table DDL

-- Stored Procedures, Views and Init by Maarten Marreel

-- -----------------------------------------------------
-- Schema MMParcs
-- -----------------------------------------------------
DROP DATABASE IF EXISTS MMParcs;
CREATE DATABASE MMParcs;
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
    ON DELETE NO ACTION
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
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_A_AttractionStatusId`
    FOREIGN KEY (`AttractionStatusId`)
    REFERENCES `MMParcs`.`AttractionStatus` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_A_SectorId`
    FOREIGN KEY (`SectorId`)
    REFERENCES `MMParcs`.`Sector` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `MMParcs`.`Role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`Role` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Description` TEXT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MMParcs`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`User` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(100) NOT NULL,
  `LastName` VARCHAR(100) NOT NULL,
  `Email` VARCHAR(255) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `DateRegistration` DATETIME NOT NULL,
  `DateLastLogin` DATETIME NULL,
  `IsBanned` TINYINT(1) NOT NULL DEFAULT 0,
  `RoleId` INT NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC),
  INDEX `FK_U_RoleId_idx` (`RoleId` ASC),
  CONSTRAINT `FK_U_RoleId`
    FOREIGN KEY (`RoleId`)
    REFERENCES `MMParcs`.`Role` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `MMParcs`.`Configuration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`Configuration` (
  `CKey` VARCHAR(50) NOT NULL,
  `CValue` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`CKey`));


-- -----------------------------------------------------
-- Table `MMParcs`.`PermissionGroup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`PermissionGroup` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC));


-- -----------------------------------------------------
-- Table `MMParcs`.`Permission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`Permission` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Description` VARCHAR(100) NOT NULL,
  `PermissionGroupId` INT NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC),
  UNIQUE INDEX `Description_UNIQUE` (`Description` ASC),
  INDEX `FK_P_PermissionGroupId_idx` (`PermissionGroupId` ASC),
  CONSTRAINT `FK_P_PermissionGroupId`
    FOREIGN KEY (`PermissionGroupId`)
    REFERENCES `MMParcs`.`PermissionGroup` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `MMParcs`.`PermissionRole`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MMParcs`.`PermissionRole` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `HasPermission` TINYINT(1) NOT NULL DEFAULT 0,
  `PermissionId` INT NOT NULL,
  `RoleId` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `FK_PR_PermissionId_idx` (`PermissionId` ASC),
  INDEX `FK_PR_RoleId_idx` (`RoleId` ASC),
  CONSTRAINT `FK_PR_PermissionId`
    FOREIGN KEY (`PermissionId`)
    REFERENCES `MMParcs`.`Permission` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_PR_RoleId`
    FOREIGN KEY (`RoleId`)
    REFERENCES `MMParcs`.`Role` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);

-- -----------------------------------------------------
-- Create Procedure RoleReadingAll
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS RoleSelectAll;
DELIMITER //
CREATE PROCEDURE RoleSelectAll()
BEGIN
SELECT Id, Name 
FROM Role;
END //
DELIMITER ;

-- -----------------------------------------------------
-- Create Procedure RoleReadingOne
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS RoleSelectOne;
DELIMITER //
CREATE PROCEDURE RoleSelectOne(
	pId INT
)
BEGIN
SELECT Id, Name, Description 
FROM Role
WHERE Id = pId;
END //
DELIMITER ;

-- -----------------------------------------------------
-- Create Procedure UserReadingAll
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS UserSelectAll;
DELIMITER //
CREATE PROCEDURE UserSelectAll()
BEGIN
SELECT Id, FirstName, LastName 
FROM User;
END //
DELIMITER ;

-- -----------------------------------------------------
-- Create Procedure ZoneReadingAll
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS ZoneSelectAll;
DELIMITER //
CREATE PROCEDURE ZoneSelectAll()
BEGIN
SELECT Id, Name 
FROM Zone;
END //
DELIMITER ;

-- -----------------------------------------------------
-- Create Procedure ZoneReadingOne
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS ZoneSelectOne;
DELIMITER //
CREATE PROCEDURE ZoneSelectOne(
	pId INT
)
BEGIN
SELECT Id, Name, Address 
FROM Zone
WHERE Id = pId;
END //
DELIMITER ;

-- -----------------------------------------------------
-- Init Table Role
-- -----------------------------------------------------
INSERT INTO Role (Name, Description) VALUES ('Superadministrator', 'Superadministrators zijn de hoofdbeheerders en/of eigenaars van de website. Zij hebben altijd alle rechten. Voorzichtigheid is geboden bij het toekennen van deze rol aan een gebruiker.');
INSERT INTO Role (Name, Description) VALUES ('Gebruiker', 'De standaard gebruikerrol die toegekend wordt aan de pas geregistreerde gebruikers');

-- -----------------------------------------------------
-- Init Table Zone
-- -----------------------------------------------------
INSERT INTO Zone (Name, Address) VALUES ('Hoofdgebouwen', 'Pretparkstraat 50 0001 Spelstad');
INSERT INTO Zone (Name, Address) VALUES ('Attractiepark', 'Pretparkstraat 150 0001 Spelstad');

-- -----------------------------------------------------
-- Init Table Configuration
-- -----------------------------------------------------
INSERT INTO Configuration (CKey, CValue) VALUES ('SuperadministratorRole', (SELECT Id FROM Role WHERE Name = 'Superadministrator'));
INSERT INTO Configuration (CKey, CValue) VALUES ('UserRole', (SELECT Id FROM Role WHERE Name = 'Gebruiker'));