<?php
/* Leverandor Fixture generated on: 2012-02-22 21:29:29 : 1329942569 */

/**
 * LeverandorFixture
 *
 */
class LeverandorFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'leverandor';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'navn' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
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
			'navn' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-02-22 21:29:29',
			'created' => '2012-02-22 21:29:29'
		),
	);
}
