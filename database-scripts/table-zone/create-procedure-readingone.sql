USE MMParcs;
-- -----------------------------------------------------
-- Create Procedure ZoneReadingOne
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS ZoneReadingOne;
DELIMITER //
CREATE PROCEDURE ZoneReadingOne(
	pId INT
)
BEGIN
SELECT Id, Name, Address 
FROM Zone
WHERE Id = pId;
END //
DELIMITER ;