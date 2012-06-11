#Oppdaterer tabell for "kaffepriser"
#Fix problem with changed name of kaffepriser
CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `kaffeflyttingvekt` AS select `rekneskap`.`kaffeflytting`.`nummer` AS `kaffeflytting_id`,`rekneskap`.`kaffeflytting`.`kaffesalg_id` AS `kaffesalg_id`,(`rekneskap`.`kaffeflytting`.`antall` * `rekneskap`.`kaffepriser`.`gram`) AS `gram`,((`rekneskap`.`kaffeflytting`.`antall` * `rekneskap`.`kaffepriser`.`gram`) / 1000) AS `kilo` from (`kaffeflytting` left join `kaffepriser` on((`rekneskap`.`kaffeflytting`.`type` = `rekneskap`.`kaffepriser`.`nummer`)));

REPLACE INTO versions VALUES (13, 'db_schema');