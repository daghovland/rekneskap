<?php 
/* SVN FILE: $Id$ */
/* Kunde Fixture generated on: 2010-01-02 00:01:22 : 1262389462*/

class KundeFixture extends CakeTestFixture {
	var $name = 'Kunde';
	var $table = 'kunder';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'navn' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'epost' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'telefon' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 8),
		'slettes' => array('type'=>'boolean', 'null' => false, 'default' => NULL),
		'registrert' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'kontaktperson' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'fakturaadresse' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'leveringsadresse' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'leveringsadresse' => array('column' => 'leveringsadresse', 'unique' => 0), 'fakturaadresse' => array('column' => 'fakturaadresse', 'unique' => 0))
	);
	var $records = array(array(
		'nummer'  => 1,
		'navn'  => 'Lorem ipsum dolor sit amet',
		'epost'  => 'Lorem ipsum dolor sit amet',
		'telefon'  => 'Lorem ',
		'slettes'  => 1,
		'registrert'  => '2010-01-02',
		'kontaktperson'  => 'Lorem ipsum dolor sit amet',
		'fakturaadresse'  => 1,
		'leveringsadresse'  => 1
	));
}
?>