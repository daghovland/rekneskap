#Lager en tabell for "leverandører", dvs. Posten, trykkerier, Lindvalls o.l.
CREATE TABLE  IF NOT EXISTS `leverandor` (
       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
       `navn` VARCHAR(100) NOT NULL,
        `modified` datetime DEFAULT NULL,
       `created` datetime DEFAULT NULL,
       PRIMARY KEY (`id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;

#En mva-klasse er en type mva med andel slik den er
# gyldig for en gitt periode
CREATE TABLE  IF NOT EXISTS `mva_klasse` (
       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
       `prosent` TINYINT UNSIGNED NOT NULL,
       `navn` VARCHAR(100),
       `beskrivelse` TEXT,
        `start` datetime DEFAULT NULL,
       `slutt` datetime DEFAULT NULL,
        `modified` datetime DEFAULT NULL,
       `created` datetime DEFAULT NULL,
       PRIMARY KEY (`id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `mva_klasse` (`prosent`, `navn`) VALUES (0, "Fritatt, ikkje mva");

# Lager en tabell for rekningar
CREATE TABLE  IF NOT EXISTS `rekningar` (
       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
       `fakturadato` datetime NOT NULL, 
       `betalingsfrist` datetime NOT NULL, 
       `mva_klasse_id` INT UNSIGNED,
       `leverandor_id` INT UNSIGNED,
       `betalings_id` INT UNSIGNED,
       `mva_id` INT UNSIGNED,
       `netto_id` INT UNSIGNED,
       `modified` datetime DEFAULT NULL,
       `created` datetime DEFAULT NULL,
       PRIMARY KEY (`id`),
        KEY `mva_klasse_id` (`mva_klasse_id`),
        KEY `leverandor_id` (`leverandor_id`),
        KEY `betalings_id` (`betalings_id`),
        KEY `mva_pengeflytting` (`mva_id`),
        KEY `netto_pengeflytting` (`netto_id`),
  CONSTRAINT `rekning_mva_klasse` FOREIGN KEY (`mva_klasse_id`) REFERENCES `mva_klasse` (`id`),
  CONSTRAINT `rekning_leverandor` FOREIGN KEY (`leverandor_id`) REFERENCES `leverandor` (`id`),
  CONSTRAINT `betalings_pengeflytting` FOREIGN KEY (`betalings_id`) REFERENCES `pengeflytting` (`nummer`),
  CONSTRAINT `mva_pengeflytting` FOREIGN KEY (`mva_id`) REFERENCES `pengeflytting` (`nummer`),
  CONSTRAINT `netto_pengeflytting` FOREIGN KEY (`netto_id`) REFERENCES `pengeflytting` (`nummer`)
  )
ENGINE=InnoDB DEFAULT CHARSET=utf8;

REPLACE INTO versions VALUES (8, 'db_schema');