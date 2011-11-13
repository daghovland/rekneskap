<?php 
/* SVN FILE: $Id$ */
/* Faktura Fixture generated on: 2010-01-01 20:01:58 : 1262374918*/

class FakturaFixture extends CakeTestFixture {
	var $name = 'Faktura';
	var $table = 'fakturaer';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'kunde' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'faktura_dato' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'betaling' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'betalings_frist' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'melding' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'kroner' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'adresse' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'mva' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'totalpris' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'kunde' => array('column' => 'kunde', 'unique' => 0), 'betaling' => array('column' => 'betaling', 'unique' => 0), 'fakturaadresse' => array('column' => 'adresse', 'unique' => 0))
	);
	var $records = array(array(
		'nummer'  => 1,
		'kunde'  => 1,
		'faktura_dato'  => '2010-01-01',
		'betaling'  => 1,
		'betalings_frist'  => '2010-01-01',
		'melding'  => 'Lorem ipsum dolor sit amet',
		'kroner'  => 1,
		'adresse'  => 1,
		'mva'  => 1,
		'totalpris'  => 1
	));
}
?>