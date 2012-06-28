# KOnsekvens av at kaffepris er blitt kaffepriser
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