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
		'tinga' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'kunde_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'total' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'frakt' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'varetekst' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'kundetekst' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
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
			'tinga' => '2012-06-01 16:56:50',
			'kunde_id' => 1,
			'total' => 1,
			'frakt' => 1,
			'varetekst' => 'Lorem ipsum dolor sit amet',
			'kundetekst' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-06-01 16:56:50',
			'created' => '2012-06-01 16:56:50'
		),
	);
}
