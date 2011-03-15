<?php 
/* SVN FILE: $Id$ */
/* Lagerverdityper Fixture generated on: 2010-04-10 21:04:07 : 1270926607*/

class LagerverdityperFixture extends CakeTestFixture {
	var $name = 'Lagerverdityper';
	var $table = 'lagerverdityper';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'navn' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'navn'  => 'Lorem ipsum dolor sit amet'
	));
}
?>