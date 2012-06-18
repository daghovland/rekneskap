# Legger til referanse til drupal sin sku i kaffityper
ALTER TABLE `kaffeflytting` ADD KEY `type` (`type`) , ADD CONSTRAINT `kaffeflytting_kaffepris` FOREIGN KEY (`type`) REFERENCES `kaffepriser` (`nummer`);

REPLACE INTO versions VALUES (15, 'db_schema');