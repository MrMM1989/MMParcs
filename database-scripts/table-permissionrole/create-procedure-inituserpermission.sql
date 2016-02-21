USE MMParcs;
-- -----------------------------------------------------
-- Create Procedure InitUserPermissions
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS InitUserPermissions;
DELIMITER //
CREATE PROCEDURE InitUserPermissions()
BEGIN
	DECLARE userRole INT;
    DECLARE permCount INT;
    DECLARE counter INT;
    SELECT CValue FROM Configuration WHERE CKey = 'UserRole' INTO userRole;
    SELECT COUNT(*) FROM Permission INTO permCount;
    SET counter = 1;
    REPEAT
   	INSERT INTO PermissionRole (HasPermission, PermissionId, RoleId) VALUES (0, counter, userRole); 
    SET counter = counter +1;
    UNTIL counter > permCount  END REPEAT;
    
END //
DELIMITER ;