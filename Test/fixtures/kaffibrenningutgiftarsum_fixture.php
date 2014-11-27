<?php 
/* SVN FILE: $Id$ */
/* Kaffibrenningutgiftarsum Fixture generated on: 2010-04-21 22:04:12 : 1271880312*/

class KaffibrenningutgiftarsumFixture extends CakeTestFixture {
	var $name = 'Kaffibrenningutgiftarsum';
	var $table = 'kaffibrenningutgiftarsum';
	var $fields = array(
		'kaffibrenning_id' => array('type'=>'integer', 'null' => false, 'default' => '0'),
		'utgiftar' => array('type'=>'float', 'null' => true, 'default' => NULL, 'length' => 60),
		'indexes' => array()
	);
	var $records = array(array(
		'kaffibrenning_id'  => 1,
		'utgiftar'  => 1
	));
}
?>