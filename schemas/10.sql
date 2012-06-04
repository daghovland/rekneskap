#Oppdaterer tabell for "tingingar", dvs. tingingar som ikkje har vorte til verkerlege sal endå
ALTER TABLE `kaffeflytting` ADD COLUMN `tinging_id` INT UNSIGNED DEFAULT NULL, ADD KEY `tinging_id` (`tinging_id`), ADD CONSTRAINT `kaffeflytting_tinging` FOREIGN KEY (`tinging_id`) REFERENCES `tingingar` (`id`); 
REPLACE INTO versions VALUES (10, 'db_schema');