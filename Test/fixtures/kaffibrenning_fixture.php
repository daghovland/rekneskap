<?php 
/* SVN FILE: $Id$ */
/* Kaffibrenning Fixture generated on: 2010-04-11 15:04:44 : 1270992344*/

class KaffibrenningFixture extends CakeTestFixture {
	var $name = 'Kaffibrenning';
	var $table = 'kaffibrenning';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'brenneri' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'kaffiimport_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'kaffiimport_id' => array('column' => 'kaffiimport_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'brenneri'  => 'Lorem ipsum dolor sit amet',
		'kaffiimport_id'  => 1,
		'modified'  => '2010-04-11 15:25:44',
		'created'  => '2010-04-11 15:25:44'
	));
}
?>