<?php 
/* SVN FILE: $Id$ */
/* Regnskap Fixture generated on: 2010-01-18 23:01:03 : 1263853323*/

class RegnskapFixture extends CakeTestFixture {
	var $name = 'Regnskap';
	var $table = 'regnskap';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'start' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'slutt' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'beskrivelse' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'start'  => '2010-01-18 23:22:03',
		'slutt'  => '2010-01-18 23:22:03',
		'beskrivelse'  => 'Lorem ipsum dolor sit amet'
	));
}
?>