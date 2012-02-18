<?php 
/* SVN FILE: $Id$ */
/* Rabatt Fixture generated on: 2010-01-20 13:01:07 : 1263990127*/

class RabattFixture extends CakeTestFixture {
	var $name = 'Rabatt';
	var $table = 'rabatter';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'type' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'pris' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'beskrivelse' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'type' => array('column' => 'type', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'type'  => 1,
		'pris'  => 1,
		'beskrivelse'  => 'Lorem ipsum dolor sit amet'
	));
}
?>