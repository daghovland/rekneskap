#Lager en tabell for "tingingar", dvs. tingingar som ikkje har vorte til verkerlege sal endå
CREATE TABLE  IF NOT EXISTS `tingingar` (
       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
       `ubercart_ordre_id` INT(10) UNSIGNED DEFAULT NULL,
       `tinga` datetime NOT NULL,
       `kunde_id` INT(10) UNSIGNED,
       `total` INT(10) UNSIGNED,
       `frakt` INT(10) UNSIGNED,
       `modified` datetime DEFAULT NULL,
       `created` datetime DEFAULT NULL,
        KEY `kunde_id` (`kunde_id`), 
        CONSTRAINT `tinging_kunde` FOREIGN KEY (`kunde_id`) REFERENCES `kunder` (`nummer`),
       PRIMARY KEY (`id`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;

REPLACE INTO versions VALUES (9, 'db_schema');