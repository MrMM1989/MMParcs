USE MMParcs;
-- -----------------------------------------------------
-- Create View vwReadUserRole
-- -----------------------------------------------------
DROP VIEW IF EXISTS vwReadUserRole;
CREATE VIEW vwReadUserRole AS
SELECT u.Id, u.FirstName, u.LastName, u.Email, u.DateRegistration, u.DateLastLogin, u.IsBanned, u.RoleId, r.Name AS RoleName
FROM User AS u 
INNER JOIN Role AS r
ON u.RoleId = r.Id;