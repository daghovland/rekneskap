#Oppdaterer tabell for "kaffepriser"
#Fix problem with changed name of kaffepriser
CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `kaffeflytting_regnskap_lagertype_start` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepriser`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`)))) group by `regnskap`.`id`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`);
CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `kaffeflytting_regnskap_lagertype_slutt` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepriser`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`)))) group by `regnskap`.`id`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`);
CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `kaffeflytting_regnskap_kaffelager_lagertype_start` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`fra` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepriser`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`til` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`start`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`) ;
CREATE OR REPLACE SQL SECURITY DEFINER VIEW `kaffeflytting_regnskap_kaffelager_lagertype_slutt` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`fra` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`) and (`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepriser`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`kaffelagre`.`nummer` AS `kaffelager_id`,`lagertyper`.`nummer` AS `lagertype_id` from ((((`regnskap` join `kaffelagre`) join `kaffepriser`) join `lagertyper`) left join `kaffeflytting` on(((`kaffeflytting`.`til` = `kaffelagre`.`nummer`) and (`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`)))) group by `regnskap`.`id`,`kaffelagre`.`nummer`,`kaffepriser`.`nummer`,`lagertyper`.`nummer`) ;
CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `kaffeflytting_regnskap_lagertype_innut` AS (select `regnskap`.`id` AS `regnskap_id`,`kaffepriser`.`nummer` AS `kaffepris_id`,-(sum(`kaffeflytting`.`antall`)) AS `antall`,`lagertyper`.`nummer` AS `lagertype_id` from (((`regnskap` join `lagertyper`) join `kaffepriser`) left join `kaffeflytting` on(((`kaffeflytting`.`fralagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` > `regnskap`.`start`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`)))) group by `regnskap`.`id`,`lagertyper`.`nummer`,`kaffepriser`.`nummer`) union (select `regnskap`.`id` AS `id`,`kaffepriser`.`nummer` AS `kaffepris_id`,sum(`kaffeflytting`.`antall`) AS `antall`,`lagertyper`.`nummer` AS `nummer` from (((`regnskap` join `lagertyper`) join `kaffepriser`) left join `kaffeflytting` on(((`kaffeflytting`.`tillagertype` = `lagertyper`.`nummer`) and (`kaffeflytting`.`dato` > `regnskap`.`start`) and (`kaffeflytting`.`dato` < `regnskap`.`slutt`) and (`kaffeflytting`.`type` = `kaffepriser`.`nummer`)))) group by `regnskap`.`id`,`lagertyper`.`nummer`,`kaffepriser`.`nummer`);
REPLACE INTO versions VALUES (12, 'db_schema');