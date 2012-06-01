#Lager en tabell for "tingingar", dvs. tingingar som ikkje har vorte til verkerlege sal endå
CREATE TABLE  IF NOT EXISTS `tingingar` (
       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
       `tinga` datetime NOT NULL,
       `kunde_id` INT(10) UNSIGNED,
       `total` INT(10) UNSIGNED,
       `frakt` INT(10) UNSIGNED,
       `varetekst` VARCHAR(300) NOT NULL,
       `kundetekst` VARCHAR(300) NOT NULL,
       `modified` datetime DEFAULT NULL,
       `created` datetime DEFAULT NULL,
       PRIMARY KEY (`id`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;

REPLACE INTO versions VALUES (9, 'db_schema');