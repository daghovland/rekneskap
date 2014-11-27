INSERT IGNORE INTO roller (navn) VALUES ('admin'),('kunde'),('lager'),('bruker'),('kasserer');
SELECT (@admin_rolle_id := nummer) AS admin_nr FROM roller WHERE navn='admin';
INSERT IGNORE INTO selgere (navn,rolle_id) VALUES ('admin', @admin_rolle_id);
ALTER TABLE selgere ADD COLUMN (digest_hash VARCHAR(100));
REPLACE INTO versions VALUES (7, 'db_schema');