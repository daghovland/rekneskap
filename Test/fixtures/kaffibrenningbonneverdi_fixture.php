<?php 
/* SVN FILE: $Id$ */
/* Kaffibrenningbonneverdi Fixture generated on: 2010-04-21 21:04:50 : 1271879690*/

class KaffibrenningbonneverdiFixture extends CakeTestFixture {
	var $name = 'Kaffibrenningbonneverdi';
	var $table = 'kaffibrenningbonneverdi';
	var $fields = array(
		'kaffibrenning_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'bonneverdi' => array('type'=>'float', 'null' => true, 'default' => NULL, 'length' => 65),
		'indexes' => array()
	);
	var $records = array(array(
		'kaffibrenning_id'  => 1,
		'bonneverdi'  => 1
	));
}
?>