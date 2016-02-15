USE MMParcs;
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