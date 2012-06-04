#Oppdaterer tabell for "tingingar", dvs. tingingar som ikkje har vorte til verkerlege sal endå
ALTER TABLE `tingingar` ADD COLUMN `ubercart_ordre_id` INT(10) UNSIGNED;

REPLACE INTO versions VALUES (10, 'db_schema');