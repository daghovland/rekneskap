<?php
/* MeldeFaktura Fixture generated on: 2011-11-15 15:32:36 : 1321367556 */

/**
 * MeldeFakturaFixture
 *
 */
class MeldeFakturaFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'melde_fakturaer';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'faktura_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10, 'collate' => NULL, 'comment' => ''),
		'sist_purret' => array('type' => 'timestamp', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'purring_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10, 'collate' => NULL, 'comment' => ''),
		'betalings_frist' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array(),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'faktura_id' => 1,
			'sist_purret' => 1321367556,
			'purring_id' => 1,
			'betalings_frist' => '2011-11-15'
		),
	);
}
