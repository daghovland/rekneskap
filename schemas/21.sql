#Gjør lagertyper til en del av programmet
ALTER TABLE `fakturaer` ADD COLUMN `pakket` DATE DEFAULT NULL,
	MODIFY COLUMN `faktura_dato` DATE DEFAULT NULL,
	MODIFY COLUMN `betalings_frist` DATE DEFAULT NULL;

UPDATE  `fakturaer` SET `pakket`=CURDATE();
REPLACE INTO versions VALUES (21, 'db_schema');
