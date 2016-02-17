USE MMParcs;
-- -----------------------------------------------------
-- Create Procedure RoleUpdate
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS RoleUpdate;
DELIMITER //
CREATE PROCEDURE RoleUpdate
(
pName NVARCHAR (50) ,
pDescription TEXT ,
pId INT
)
BEGIN
UPDATE Role
SET
  Name = pName,
  Description = pDescription
WHERE Id = pId;
END //
DELIMITER ;