/* For keeping track of keys for forgotten passwords */
DROP TRIGGER IF EXISTS tmp_key_insert;
DROP TRIGGER IF EXISTS tmp_key_update;
REPLACE INTO versions VALUES (4, 'db_schema');
