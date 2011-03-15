<?php
/* SplittTransaksjon Fixture generated on: 2010-12-03 15:12:26 : 1291385006 */
class SplittTransaksjonFixture extends CakeTestFixture {
	var $name = 'SplittTransaksjon';
	var $table = 'splitt_transaksjoner';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'dato' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'selger_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kroner' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'oere' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'kommentar' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'selger_id' => array('column' => 'selger_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'dato' => '2010-12-03 15:03:26',
			'created' => '2010-12-03 15:03:26',
			'modified' => '2010-12-03 15:03:26',
			'selger_id' => 1,
			'kroner' => 1,
			'oere' => 1,
			'kommentar' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>