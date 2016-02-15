USE MMParcs;
-- -----------------------------------------------------
-- Create Procedure ZoneReadingAll
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS ZoneReadingAll;
DELIMITER //
CREATE PROCEDURE ZoneReadingAll()
BEGIN
SELECT Id, Name 
FROM Zone;
END //
DELIMITER ;