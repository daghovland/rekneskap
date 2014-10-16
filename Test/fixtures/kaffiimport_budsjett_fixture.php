<?php
/* KaffiimportBudsjett Fixture generated on: 2010-11-06 20:11:39 : 1289070399 */
class KaffiimportBudsjettFixture extends CakeTestFixture {
	var $name = 'KaffiimportBudsjett';
	var $table = 'kaffiimport_budsjett';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'totalprisValuta' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 22),
		'totalprisNOK' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '38,4'),
		'kiloprisNOK' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '27,4'),
		'indexes' => array(),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'totalprisValuta' => 1,
			'totalprisNOK' => 1,
			'kiloprisNOK' => 1
		),
	);
}
?>