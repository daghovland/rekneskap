# KOnsekvens av at kaffepris er blitt kaffepriser
CREATE OR REPLACE VIEW `kaffeflytting_regnskap_kaffelager_slutt` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`fra` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepriser`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`til` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`);


CREATE OR REPLACE VIEW `kaffeflytting_regnskap_kaffelager_start` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`fra` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepriser`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`til` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`);

CREATE OR REPLACE VIEW `kaffibrenningferdigvekt` AS select sum((`kaffeflytting`.`antall` * `kaffepriser`.`gram`)) AS `gram`,`kaffibrenning`.`id` AS `kaffibrenning_id` from ((`kaffibrenning` left join `kaffeflytting` on((`kaffibrenning`.`id` = `kaffeflytting`.`kaffibrenning_id`))) left join `kaffepriser` on((`kaffeflytting`.`type` = `kaffepriser`.`nummer`))) group by `kaffibrenning`.`id`;

CREATE OR REPLACE VIEW `solgt` AS select `lagerselger`.`lagertypenavn` AS `lagertypenavn`,sum(`kaffeflytting`.`antall`) AS `antall`,sum((`kaffeflytting`.`antall` * `kaffepriser`.`pris`)) AS `sum`,`kaffeflytting`.`fra` AS `lagernummer`,`kaffeflytting`.`type` AS `typenr` from ((`kaffeflytting` left join `lagerselger` on((`kaffeflytting`.`til` = `lagerselger`.`lager`))) left join `kaffepriser` on((`kaffeflytting`.`type` = `kaffepriser`.`nummer`))) where (`lagerselger`.`lagertypenavn` = _utf8'salg') group by `kaffeflytting`.`fra`,`kaffeflytting`.`type`;

DROP VIEW `sumbestilt`;
DROP VIEW `kundebestillinger`;


REPLACE INTO versions VALUES (19, 'db_schema');