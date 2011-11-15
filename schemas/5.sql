/* For keeping track of keys for forgotten passwords */
ALTER TABLE purringer MODIFY COLUMN created DATETIME, MODIFY COLUMN modified DATETIME;
REPLACE INTO versions VALUES (5, 'db_schema');
