# bestillinger er erstatta av tingingar
DROP TABLE `bestillinger`;
ALTER TABLE `kaffelagre` ADD COLUMN (`er_standard_lager` BOOLEAN);

REPLACE INTO versions VALUES (16, 'db_schema');