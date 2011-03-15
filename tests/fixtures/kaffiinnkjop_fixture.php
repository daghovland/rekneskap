<?php 
/* SVN FILE: $Id$ */
/* Kaffiinnkjop Fixture generated on: 2010-06-15 13:36:57 : 1276601817*/

class KaffiinnkjopFixture extends CakeTestFixture {
	var $name = 'Kaffiinnkjop';
	var $table = 'kaffiinnkjop';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'kaffibrenning_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kaffitype_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kommentar' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 500),
		'dato' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'pengeflytting_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kaffeflytting_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'pengeflytting_id' => array('column' => 'pengeflytting_id', 'unique' => 0), 'kaffiinnkjop_brenning' => array('column' => 'kaffibrenning_id', 'unique' => 0), 'kaffiinnkjop_type' => array('column' => 'kaffitype_id', 'unique' => 0), 'kaffiinnkjop_flytting' => array('column' => 'kaffeflytting_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'kaffibrenning_id'  => 1,
		'kaffitype_id'  => 1,
		'kommentar'  => 'Lorem ipsum dolor sit amet',
		'dato'  => '2010-06-15 13:36:57',
		'created'  => '2010-06-15 13:36:57',
		'modified'  => '2010-06-15 13:36:57',
		'pengeflytting_id'  => 1,
		'kaffeflytting_id'  => 1
	));
}
?>