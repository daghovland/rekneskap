/* For keeping track of keys for forgotten passwords */
ALTER TABLE selgere ADD COLUMN tmp_key VARCHAR(100);
ALTER TABLE selgere ADD COLUMN tmp_key_created DATETIME;
REPLACE INTO versions VALUES (2, 'db_schema');
