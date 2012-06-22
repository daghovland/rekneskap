# Erstatter lagertyper tabell med tre bool i kaffelagre
ALTER TABLE `lagertyper` ADD COLUMN (`er_vanlig_lagertype` BOOL);

CREATE OR REPLACE VIEW `kaffelagerbeholdninger` AS select sum(`kaffeflytting_sum`.`antall`) AS `antall`,`kaffeflytting_sum`.`til` AS `kaffelager_id`,`kaffeflytting_sum`.`tillagertype` AS `lagertype_id`,`kaffeflytting_sum`.`type` AS `kaffepris_id`, `kaffelagre`.`beskrivelse` AS `lagernavn`, `lagertyper`.`er_vanlig_lagertype` from `kaffeflytting_sum` LEFT JOIN `lagertyper` ON `kaffeflytting_sum`.`tillagertype` = `lagertyper`.`nummer` LEFT JOIN `kaffelagre` ON `kaffeflytting_sum`.`til` = `kaffelagre`.`nummer` group by `kaffeflytting_sum`.`til`,`kaffeflytting_sum`.`tillagertype`,`kaffeflytting_sum`.`type` order by `kaffeflytting_sum`.`type` desc;

REPLACE INTO versions VALUES (17, 'db_schema');