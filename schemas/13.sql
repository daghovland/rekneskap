#Oppdaterer tabell for "kaffepriser"
#Fix problem with changed name of kaffepriser
CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `kaffeflyttingvekt` AS select `kaffeflytting`.`nummer` AS `kaffeflytting_id`,`kaffeflytting`.`kaffesalg_id` AS `kaffesalg_id`,(`kaffeflytting`.`antall` * `kaffepriser`.`gram`) AS `gram`,((`kaffeflytting`.`antall` * `kaffepriser`.`gram`) / 1000) AS `kilo` from (`kaffeflytting` left join `kaffepriser` on((`kaffeflytting`.`type` = `kaffepriser`.`nummer`)));

REPLACE INTO versions VALUES (13, 'db_schema');
