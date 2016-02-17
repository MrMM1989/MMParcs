USE MMParcs;
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