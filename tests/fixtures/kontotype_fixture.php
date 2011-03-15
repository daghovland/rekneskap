<?php 
/* SVN FILE: $Id$ */
/* Kontotype Fixture generated on: 2010-01-02 20:01:53 : 1262459513*/

class KontotypeFixture extends CakeTestFixture {
	var $name = 'Kontotype';
	var $table = 'kontotyper';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'beskrivelse' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 30),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $records = array(array(
		'nummer'  => 1,
		'beskrivelse'  => 'Lorem ipsum dolor sit amet'
	));
}
?>