-- Run once on the MySQL/MariaDB database (phpMyAdmin or CLI).
-- Adds modern password storage for adminuser; legacy md5/plain columns remain until migrated at login.

ALTER TABLE adminuser
  ADD COLUMN password_hash VARCHAR(255) NULL DEFAULT NULL
  COMMENT 'password_hash() bcrypt; NULL means legacy md5+pass columns'
  AFTER hashpass;
