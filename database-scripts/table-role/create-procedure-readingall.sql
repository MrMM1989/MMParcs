USE MMParcs;
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