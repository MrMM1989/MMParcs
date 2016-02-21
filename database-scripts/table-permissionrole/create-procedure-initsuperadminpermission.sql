USE MMParcs;
-- -----------------------------------------------------
-- Create Procedure InitSuperadminPermissions
-- -----------------------------------------------------
DROP PROCEDURE IF EXISTS InitSuperadminPermissions;
DELIMITER //
CREATE PROCEDURE InitSuperadminPermissions()
BEGIN
	DECLARE adminRole INT;
    DECLARE permCount INT;
    DECLARE counter INT;
    SELECT CValue FROM Configuration WHERE CKey = 'SuperadministratorRole' INTO adminRole;
    SELECT COUNT(*) FROM Permission INTO permCount;
    SET counter = 1;
    REPEAT
   	INSERT INTO PermissionRole (HasPermission, PermissionId, RoleId) VALUES (1, counter, adminRole); 
    SET counter = counter +1;
    UNTIL counter > permCount  END REPEAT;
    
END //
DELIMITER ;