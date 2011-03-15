<?php 
/* SVN FILE: $Id$ */
/* Lagerverdikonto Fixture generated on: 2010-04-10 21:04:26 : 1270926746*/

class LagerverdikontoFixture extends CakeTestFixture {
	var $name = 'Lagerverdikonto';
	var $table = 'lagerverdikontoer';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'navn' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'lagerverditype_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'lagerverditype_id' => array('column' => 'lagerverditype_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'navn'  => 'Lorem ipsum dolor sit amet',
		'lagerverditype_id'  => 1
	));
}
?>