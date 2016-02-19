USE MMParcs;
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