USE MMParcs;
-- -----------------------------------------------------
-- Create Trigger InitNewRolePermissions
-- -----------------------------------------------------
DROP TRIGGER IF EXISTS InitNewRolePermissions;
DELIMITER //
CREATE TRIGGER InitNewRolePermissions
AFTER INSERT ON Role FOR EACH ROW 
BEGIN
	DECLARE role INT;
	DECLARE permCount INT;
	DECLARE counter INT;
	SET role = NEW.Id;
	SELECT COUNT(*) FROM Permission INTO permCount;
    SET counter = 1;
	REPEAT
   	INSERT INTO PermissionRole (HasPermission, PermissionId, RoleId) VALUES (0, counter, role); 
    SET counter = counter +1;
    UNTIL counter > permCount  END REPEAT;
END //
DELIMITER ;