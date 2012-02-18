# Lager en tabell for regninger
CREATE TABLE rekningar COLUMNS (
       id INT UNSIGNED AUTO_INCREMENT, 
       `fakturadato` datetime NOT NULL, 
       `betalingsfrist` datetime NOT NULL, 
       `betalingsdato` datetime, 
       'mva_kroner' INT UNSIGNED,
       'mva_oere' INT UNSIGNED,
       'netto_kroner' INT UNSIGNED NOT NULL,
       'netto_oere' INT UNSIGNED NOT NULL,
       'mva_klasse_id' INT UNSIGNED,
       'leverandør_id' INT UNSIGNED,
       'betalings_pengeflytting' INT UNSIGNED,
       'mva_pengeflytting' INT UNSIGNED,
       'netto_pengeflytting' INT UNSIGNED,
       `modified` datetime DEFAULT NULL,
       `created` datetime DEFAULT NULL)
ENGINE=InnoDB DEFAULT CHARSET=utf8 ;
