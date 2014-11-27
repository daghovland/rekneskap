<?php 
/* SVN FILE: $Id$ */
/* Kaffesalgvekt Fixture generated on: 2010-04-21 11:04:56 : 1271841836*/

class KaffesalgvektFixture extends CakeTestFixture {
	var $name = 'Kaffesalgvekt';
	var $table = 'kaffesalgvekt';
	var $fields = array(
		'kaffesalg_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'gram' => array('type'=>'float', 'null' => true, 'default' => NULL, 'length' => 42),
		'indexes' => array()
	);
	var $records = array(array(
		'kaffesalg_id'  => 1,
		'gram'  => 1
	));
}
?>