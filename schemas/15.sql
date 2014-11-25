# Legger til referanse til drupal sin sku i kaffityper
#Hvis det er problemer med denne, sjekk hvilke kaffeflyttinger som har type utenfor kaffepriser nummer
# Det hender noen har blitt registrert med type 0
ALTER TABLE `kaffeflytting` ADD KEY `type` (`type`) , ADD CONSTRAINT `kaffeflytting_kaffepris` FOREIGN KEY (`type`) REFERENCES `kaffepriser` (`nummer`);

REPLACE INTO versions VALUES (15, 'db_schema');