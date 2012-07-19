ALTER TABLE `tingingar` ADD COLUMN `kaffesalg_id` INT UNSIGNED,
      ADD KEY (`kaffesalg_id`),
      ADD CONSTRAINT `tinging_kaffesalg` FOREIGN KEY (`kaffesalg_id`) REFERENCES `kaffesalg` (`nummer`);

REPLACE INTO versions VALUES (21, 'db_schema');