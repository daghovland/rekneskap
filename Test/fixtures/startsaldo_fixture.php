<?php 
/* SVN FILE: $Id$ */
/* Startsaldo Fixture generated on: 2010-01-19 09:01:26 : 1263890426*/

class StartsaldoFixture extends CakeTestFixture {
	var $name = 'Startsaldo';
	var $table = 'start_saldoer';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'regnskap_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kroner' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'oere' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'konto_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'regnskap_id' => array('column' => 'regnskap_id', 'unique' => 0), 'konto_id' => array('column' => 'konto_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'regnskap_id'  => 1,
		'kroner'  => 1,
		'oere'  => 1,
		'konto_id'  => 1
	));
}
?>