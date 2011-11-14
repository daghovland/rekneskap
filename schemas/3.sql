/* For keeping track of keys for forgotten passwords */
CREATE TRIGGER tmp_key_update BEFORE INSERT ON selgere FOR EACH ROW SET NEW.tmp_key_created = NOW();
CREATE TRIGGER tmp_key_update BEFORE UPDATE ON selgere FOR EACH ROW SET NEW.tmp_key_created = NOW();
REPLACE INTO versions VALUES (3, 'db_schema');