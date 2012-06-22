#Oppdaterer tabell for "kaffepriser"
ALTER TABLE `kaffepris` ADD COLUMN `kaffitype_id` INT UNSIGNED DEFAULT NULL, ADD KEY `kaffitype_id` (`kaffitype_id`), ADD CONSTRAINT `kaffepris_kaffitype` FOREIGN KEY (`kaffitype_id`) REFERENCES `kaffityper` (`id`); 
ALTER TABLE `kaffepris` RENAME TO `kaffepriser`;
ALTER TABLE `kaffityper` ADD COLUMN `standard_kaffepris_id` INT UNSIGNED DEFAULT NULL, ADD KEY `standard_kaffepris_id` (`standard_kaffepris_id`), ADD CONSTRAINT `kaffitype_standard_kaffepris` FOREIGN KEY (`standard_kaffepris_id`) REFERENCES `kaffepriser` (`nummer`); 
REPLACE INTO versions VALUES (11, 'db_schema');