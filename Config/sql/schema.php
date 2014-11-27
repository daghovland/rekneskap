<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2010-01-08 10:01:40 : 1262941720*/
class AppSchema extends CakeSchema {
	var $name = 'App';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $acos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $adresser = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'linje1' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200),
		'linje2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'linje3' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'merkes' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'postnummer' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 4),
		'poststad' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $aros = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $aros_acos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'aro_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'aco_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'_create' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_read' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_update' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_delete' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'ARO_ACO_KEY' => array('column' => array('aro_id', 'aco_id'), 'unique' => 1))
	);
	var $fakturaer = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'kunde' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'faktura_dato' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'betaling' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'betalings_frist' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'melding' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'kroner' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'adresse' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'mva' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'totalpris' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'kaffesalg_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'kunde' => array('column' => 'kunde', 'unique' => 0), 'betaling' => array('column' => 'betaling', 'unique' => 0), 'fakturaadresse' => array('column' => 'adresse', 'unique' => 0), 'kaffesalg_id' => array('column' => 'kaffesalg_id', 'unique' => 0))
	);
	var $kaffeflytting = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'type' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'antall' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6),
		'fra' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'beskrivelse' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'til' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'dato' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'pengeflytting' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'fralagertype' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'tillagertype' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'ansvarlig' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'faktura' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kaffesalg_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'pengeflytting' => array('column' => 'pengeflytting', 'unique' => 0), 'fralagertype' => array('column' => 'fralagertype', 'unique' => 0), 'tillagertype' => array('column' => 'tillagertype', 'unique' => 0), 'ansvarlig' => array('column' => 'ansvarlig', 'unique' => 0), 'kaffefaktura' => array('column' => 'faktura', 'unique' => 0), 'kaffesalg_id' => array('column' => 'kaffesalg_id', 'unique' => 0))
	);
	var $kaffelagre = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'selger' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'beskrivelse' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30),
		'lagertype' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'konto' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'unique'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'konto_2' => array('column' => 'konto', 'unique' => 1), 'kaffelagre_ibfk_1' => array('column' => 'selger', 'unique' => 0), 'lagertype' => array('column' => 'lagertype', 'unique' => 0))
	);
	var $kaffepris = array(
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10),
		'beskrivelse' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'fra' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'til' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'pris' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'gram' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $kaffesalg = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'total' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'frakt' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'mva' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'kontant' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'sending' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $kontoer = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'beskrivelse' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'unique'),
		'type' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'ansvarlig' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'delav' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'beskrivelse' => array('column' => 'beskrivelse', 'unique' => 1), 'type' => array('column' => 'type', 'unique' => 0), 'ansvarlig' => array('column' => 'ansvarlig', 'unique' => 0), 'delav' => array('column' => 'delav', 'unique' => 0))
	);
	var $kontotyper = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'beskrivelse' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $kunder = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'navn' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'epost' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'telefon' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 8),
		'slettes' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'registrert' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'kontaktperson' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'fakturaadresse' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'leveringsadresse' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'leveringsadresse' => array('column' => 'leveringsadresse', 'unique' => 0), 'fakturaadresse' => array('column' => 'fakturaadresse', 'unique' => 0))
	);
	var $lagertyper = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'navn' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $pengeflytting = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'fra' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'til' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kroner' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'Ã¸re' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2),
		'dato' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'beskrivelse' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'dekningsFaktura' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'oere' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2),
		'kaffesalg_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'fra' => array('column' => 'fra', 'unique' => 0), 'til' => array('column' => 'til', 'unique' => 0), 'dekningsFaktura' => array('column' => 'dekningsFaktura', 'unique' => 0), 'dekningsFaktura_2' => array('column' => 'dekningsFaktura', 'unique' => 0), 'kaffesalg_id' => array('column' => 'kaffesalg_id', 'unique' => 0))
	);
	var $roller = array(
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'navn' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $selgere = array(
		'navn' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'key' => 'unique'),
		'nummer' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'epost' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 40),
		'telefon' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'passord' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'rolle_id' => array('type' => 'integer', 'null' => false, 'default' => '5', 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'navn' => array('column' => 'navn', 'unique' => 1), 'rolle_id' => array('column' => 'rolle_id', 'unique' => 0))
	);
}
?>