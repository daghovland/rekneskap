<?php
/**
 * InnstillingFixture
 *
 */
class InnstillingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'namn' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'ubetalte_kafferegninger' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kaffesalg_fraktutgift' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'kaffesalg_fraktutgift' => array('column' => 'kaffesalg_fraktutgift', 'unique' => 0), 'ubetalte_kafferegninger' => array('column' => 'ubetalte_kafferegninger', 'unique' => 0)),
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
			'namn' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-07-10 20:40:05',
			'modified' => '2012-07-10 20:40:05',
			'ubetalte_kafferegninger' => 1,
			'kaffesalg_fraktutgift' => 1
		),
	);
}
