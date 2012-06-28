# KOnsekvens av at kaffepris er blitt kaffepriser
CREATE OR REPLACE VIEW `rekneskap.kaffeflytting_regnskap_kaffelager_lagertype_innut` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id`,`kaffelagre`.`nummer` AS `kaffelager_id` from ((((`regnskap` join `lagertyper`) join `kaffepriser`) join `kaffelagre`) left join `kaffeflytting` on(((`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` > `regnskap`.`start`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`) and (`kaffeflytting`.`fra` = `kaffelagre`.`nummer`)))) group by `regnskap`.`id`,`lagertyper`.`nummer`,`kaffepriser`.`nummer`,`kaffelagre`.`nummer`) union (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id`,`kaffelagre`.`nummer` AS `kaffelager_id` from ((((`regnskap` join `lagertyper`) join `kaffepriser`) join `kaffelagre`) left join `kaffeflytting` on(((`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` > `regnskap`.`start`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`) and (`kaffeflytting`.`fra` = `kaffelagre`.`nummer`)))) group by `lagertyper`.`nummer`,`regnskap`.`id`,`kaffepriser`.`nummer`,`kaffelagre`.`nummer`);


CREATE OR REPLACE VIEW `suminn` AS select sum(`kaffeflytting`.`antall`) AS `antall`,sum((`kaffeflytting`.`antall` * `kaffepriser`.`pris`)) AS `sum`,`kaffeflytting`.`til` AS `til`,`kaffeflytting`.`type` AS `type` from (`kaffeflytting` left join `kaffepriser` on((`kaffeflytting`.`type` = `kaffepriser`.`nummer`))) group by `kaffeflytting`.`til`,`kaffeflytting`.`type`;

CREATE OR REPLACE VIEW `sumut` AS select sum(`kaffeflytting`.`antall`) AS `antall`,sum((`kaffeflytting`.`antall` * `kaffepriser`.`pris`)) AS `sum`,`kaffeflytting`.`fra` AS `fra`,`kaffeflytting`.`type` AS `type` from (`kaffeflytting` left join `kaffepriser` on((`kaffeflytting`.`type` = `kaffepriser`.`nummer`))) group by `kaffeflytting`.`fra`,`kaffeflytting`.`type`;


# Legger inn konfigurasjonsinfo for kaffesalg
# Denne tabellen har vanligvis bare en linje



CREATE TABLE `innstillingar` (
       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
       `namn` VARCHAR(100),
       `created` DATETIME,
       `modified` DATETIME,
       `ubetalte_kafferegninger` INT UNSIGNED,
       `kaffesalg_fraktutgift` INT UNSIGNED,
       PRIMARY KEY (`id`),      
       KEY `kaffesalg_fraktutgift` (`kaffesalg_fraktutgift`),
       KEY `ubetalte_kafferegninger` (`ubetalte_kafferegninger`),
       CONSTRAINT `fraktutgift_konto` FOREIGN KEY (`kaffesalg_fraktutgift`) REFERENCES `kontoer` (`nummer`),
       CONSTRAINT `ubetalte_kafferegninger_konto` FOREIGN KEY (`ubetalte_kafferegninger`) REFERENCES `kontoer` (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;


REPLACE INTO versions VALUES (18, 'db_schema');