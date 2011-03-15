<?php 
/* SVN FILE: $Id$ */
/* Rolle Fixture generated on: 2009-12-30 21:12:03 : 1262205903*/

class RolleFixture extends CakeTestFixture {
	var $name = 'Rolle';
	var $table = 'roller';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'navn' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $records = array(array(
		'nummer'  => 1,
		'navn'  => 'Lorem ipsum dolor '
	));
}
?>