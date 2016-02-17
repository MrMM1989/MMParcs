USE MMParcs;
-- -----------------------------------------------------
-- Create Procedure RoleInsert
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS RoleInsert;
DELIMITER //
CREATE PROCEDURE `RoleInsert`
(
IN pName NVARCHAR (50) ,
IN pDescription TEXT,
OUT pId INT
)
BEGIN
INSERT INTO `Role`
(
  `Role`.`Name`,
  `Role`.`Description`
)
VALUES
(
  pName,
  pDescription
);
SELECT LAST_INSERT_ID() INTO pId;
END //
DELIMITER ;