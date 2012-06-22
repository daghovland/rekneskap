<?php 
/* SVN FILE: $Id$ */
/* SalPerMaanad Fixture generated on: 2010-04-28 22:04:52 : 1272486112*/

class SalPerMaanadFixture extends CakeTestFixture {
	var $name = 'SalPerMaanad';
	var $table = 'sal_per_maanad';
	var $fields = array(
		'year' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'month' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'solgt' => array('type'=>'float', 'null' => true, 'default' => NULL, 'length' => 33),
		'kaffepris_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array()
	);
	var $records = array(array(
		'year'  => 1,
		'month'  => 1,
		'solgt'  => 1,
		'kaffepris_id'  => 1
	));
}
?>