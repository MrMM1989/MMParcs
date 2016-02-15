USE MMParcs;
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