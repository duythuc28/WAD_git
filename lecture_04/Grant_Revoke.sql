GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP -> ON TUTORIALS.*
TO 'zara'@'localhost'
IDENTIFIED BY 'zara123';

Before deleting a user, you must first revoke all privileges assigned to the user account for all databases
 - Use the REVOKE ALL PRIVILEGES statement
 - View the privileges assigned to a user account with the SHOW GRANTS FOR user statement