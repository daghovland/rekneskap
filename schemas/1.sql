ALTER TABLE roller ADD UNIQUE INDEX(navn);
INSERT IGNORE INTO roller (navn) VALUES ('kasserer');
INSERT IGNORE INTO roller (navn) VALUES ('bruker');
INSERT IGNORE INTO roller (navn) VALUES ('admin');
INSERT IGNORE INTO roller (navn) VALUES ('lager');
INSERT IGNORE INTO roller (navn) VALUES ('kunde');

ALTER TABLE lagertyper ADD UNIQUE INDEX(navn);
INSERT IGNORE INTO lagertyper (navn) VALUES ('lager');       	      
INSERT IGNORE INTO lagertyper (navn) VALUES ('innkjop');       	      
INSERT IGNORE INTO lagertyper (navn) VALUES ('salg');       	      

CREATE TABLE IF NOT EXISTS versions (number INT UNSIGNED NOT NULL, name VARCHAR(100), PRIMARY KEY(name)) DEFAULT CHARSET = utf8;
REPLACE INTO versions VALUES (1, 'db_schema');
