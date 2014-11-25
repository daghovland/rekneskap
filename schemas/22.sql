# Legg bring pakkeseddel og sporing URIer inn i fakturaer 
ALTER TABLE `fakturaer` ADD COLUMN `pakkeseddel` VARCHAR(2083) ;
ALTER TABLE `fakturaer` ADD COLUMN `sporing` VARCHAR(2083) ;

REPLACE INTO versions VALUES (22, 'db_schema');
