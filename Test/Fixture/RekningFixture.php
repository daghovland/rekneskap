<?php
/* Rekning Fixture generated on: 2012-02-22 21:37:35 : 1329943055 */

/**
 * RekningFixture
 *
 */
class RekningFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'rekningar';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'fakturadato' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'beskrivelse' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 300, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'betalingsfrist' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'mva_klasse_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'leverandor_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'betalings_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'mva_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'netto_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'mva_klasse_id' => array('column' => 'mva_klasse_id', 'unique' => 0), 'leverandor_id' => array('column' => 'leverandor_id', 'unique' => 0), 'betalings_id' => array('column' => 'betalings_id', 'unique' => 0), 'mva_pengeflytting' => array('column' => 'mva_id', 'unique' => 0), 'netto_pengeflytting' => array('column' => 'netto_id', 'unique' => 0)),
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
			'fakturadato' => '2012-02-22 21:37:35',
			'beskrivelse' => 'Lorem ipsum dolor sit amet',
			'betalingsfrist' => '2012-02-22 21:37:35',
			'mva_klasse_id' => 1,
			'leverandor_id' => 1,
			'betalings_id' => 1,
			'mva_id' => 1,
			'netto_id' => 1,
			'modified' => '2012-02-22 21:37:35',
			'created' => '2012-02-22 21:37:35'
		),
	);
}
