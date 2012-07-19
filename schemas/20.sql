#Gjør lagertyper til en del av programmet
ALTER TABLE `lagertyper` ADD UNIQUE KEY(`navn`);
INSERT IGNORE INTO `lagertyper` (`navn`, `er_vanlig_lagertype`) VALUES ('salg', false), ('kjop', false), ('lager', false), ('tinging', false), ('svinn', false), ('utgift', false);

ALTER TABLE `innstillingar` ADD COLUMN `standard_lager` INT UNSIGNED,
      ADD COLUMN `nettsal_lager` INT UNSIGNED,
      ADD KEY (`nettsal_lager`),
      ADD KEY (`standard_lager`),
      ADD CONSTRAINT `nettsal_lager_kaffelager` FOREIGN KEY (`nettsal_lager`) REFERENCES `kaffelagre` (`nummer`),
      ADD CONSTRAINT `standard_lager_kaffelager` FOREIGN KEY (`standard_lager`) REFERENCES `kaffelagre` (`nummer`);


REPLACE INTO versions VALUES (20, 'db_schema');