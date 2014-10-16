<?php
/**
 * TingingFixture
 *
 */
class TingingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'ubercart_ordre_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'tinga' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'kunde_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'total' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'frakt' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'kunde_id' => array('column' => 'kunde_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'ubercart_ordre_id' => 1,
			'tinga' => '2012-06-05 09:32:57',
			'kunde_id' => 1,
			'total' => 1,
			'frakt' => 1,
			'modified' => '2012-06-05 09:32:57',
			'created' => '2012-06-05 09:32:57'
		),
	);
}
