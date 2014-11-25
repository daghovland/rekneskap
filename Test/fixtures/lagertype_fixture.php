<?php 
/* SVN FILE: $Id$ */
/* Lagertype Fixture generated on: 2010-01-03 22:01:11 : 1262554631*/

class LagertypeFixture extends CakeTestFixture {
	var $name = 'Lagertype';
	var $table = 'lagertyper';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'navn' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 30),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $records = array(array(
		'nummer'  => 1,
		'navn'  => 'Lorem ipsum dolor sit amet'
	));
}
?>