<?php
/* KaffibrenningBudsjett Fixture generated on: 2010-11-06 20:11:30 : 1289070450 */
class KaffibrenningBudsjettFixture extends CakeTestFixture {
	var $name = 'KaffibrenningBudsjett';
	var $table = 'kaffibrenning_budsjett';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'totalpris' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 23),
		'indexes' => array(),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'totalpris' => 1
		),
	);
}
?>