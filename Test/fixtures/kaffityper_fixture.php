<?php 
/* SVN FILE: $Id$ */
/* Kaffityper Fixture generated on: 2010-06-15 13:36:24 : 1276601784*/

class KaffityperFixture extends CakeTestFixture {
	var $name = 'Kaffityper';
	var $table = 'kaffityper';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'nettogram' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'namn' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 400),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'nettogram'  => 1,
		'namn'  => 'Lorem ipsum dolor sit amet'
	));
}
?>