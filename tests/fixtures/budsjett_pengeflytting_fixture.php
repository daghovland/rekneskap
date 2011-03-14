<?php
/* BudsjettPengeflytting Fixture generated on: 2010-11-03 11:11:22 : 1288779322 */
class BudsjettPengeflyttingFixture extends CakeTestFixture {
	var $name = 'BudsjettPengeflytting';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'fra' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'til' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kroner' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'dato' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'beskrivelse' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 400, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'oere' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'kaffiimport_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kaffibrenning_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'til' => array('column' => 'til', 'unique' => 0), 'fra' => array('column' => 'fra', 'unique' => 0), 'kaffiimport_id' => array('column' => 'kaffiimport_id', 'unique' => 0), 'kaffibrenning_id' => array('column' => 'kaffibrenning_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'fra' => 1,
			'til' => 1,
			'kroner' => 1,
			'dato' => '2010-11-03 11:15:22',
			'beskrivelse' => 'Lorem ipsum dolor sit amet',
			'oere' => 1,
			'modified' => '2010-11-03 11:15:22',
			'created' => '2010-11-03 11:15:22',
			'kaffiimport_id' => 1,
			'kaffibrenning_id' => 1
		),
	);
}
?>