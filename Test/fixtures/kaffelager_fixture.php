<?php 
/* SVN FILE: $Id$ */
/* Kaffelager Fixture generated on: 2010-01-01 19:01:33 : 1262370993*/

class KaffelagerFixture extends CakeTestFixture {
	var $name = 'Kaffelager';
	var $table = 'kaffelagre';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'selger' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'beskrivelse' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 30),
		'lagertype' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'konto' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'unique'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'konto_2' => array('column' => 'konto', 'unique' => 1), 'kaffelagre_ibfk_1' => array('column' => 'selger', 'unique' => 0), 'lagertype' => array('column' => 'lagertype', 'unique' => 0))
	);
	var $records = array(array(
		'nummer'  => 1,
		'selger'  => 1,
		'beskrivelse'  => 'Lorem ipsum dolor sit amet',
		'lagertype'  => 1,
		'konto'  => 1
	));
}
?>