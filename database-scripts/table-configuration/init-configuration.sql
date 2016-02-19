-- -----------------------------------------------------
-- Init Table Configuration
-- -----------------------------------------------------
INSERT INTO Configuration (CKey, CValue)
VALUES
('SuperadministratorRole', (SELECT Id FROM Role WHERE Name = 'Superadministrator')),
('UserRole', (SELECT Id FROM Role WHERE Name = 'Gebruiker'));	