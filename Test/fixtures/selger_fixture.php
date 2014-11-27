<?php 
/* SVN FILE: $Id$ */
/* Selger Fixture generated on: 2009-12-30 21:12:08 : 1262205728*/

class SelgerFixture extends CakeTestFixture {
	var $name = 'Selger';
	var $table = 'selgere';
	var $fields = array(
		'navn' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 30, 'key' => 'unique'),
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'epost' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 40),
		'telefon' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'passord' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'rolle_id' => array('type'=>'integer', 'null' => false, 'default' => '5', 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'navn' => array('column' => 'navn', 'unique' => 1), 'rolle_id' => array('column' => 'rolle_id', 'unique' => 0))
	);
	var $records = array(array(
		'navn'  => 'Lorem ipsum dolor sit amet',
		'nummer'  => 1,
		'epost'  => 'Lorem ipsum dolor sit amet',
		'telefon'  => 'Lorem ipsum dolor ',
		'passord'  => 'Lorem ipsum dolor sit amet',
		'rolle_id'  => 1
	));
}
?>