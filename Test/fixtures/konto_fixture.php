<?php 
/* SVN FILE: $Id$ */
/* Konto Fixture generated on: 2010-01-01 20:01:15 : 1262374155*/

class KontoFixture extends CakeTestFixture {
	var $name = 'Konto';
	var $table = 'kontoer';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'beskrivelse' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'unique'),
		'type' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'ansvarlig' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'delav' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'beskrivelse' => array('column' => 'beskrivelse', 'unique' => 1), 'type' => array('column' => 'type', 'unique' => 0), 'ansvarlig' => array('column' => 'ansvarlig', 'unique' => 0), 'delav' => array('column' => 'delav', 'unique' => 0))
	);
	var $records = array(array(
		'nummer'  => 1,
		'beskrivelse'  => 'Lorem ipsum dolor sit amet',
		'type'  => 1,
		'ansvarlig'  => 1,
		'delav'  => 1
	));
}
?>