<?php 
/* SVN FILE: $Id$ */
/* FakturaUbetalt Fixture generated on: 2010-05-21 14:05:02 : 1274443562*/

class FakturaUbetaltFixture extends CakeTestFixture {
	var $name = 'FakturaUbetalt';
	var $table = 'faktura_ubetalt';
	var $fields = array(
		'faktura_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'mangler' => array('type'=>'float', 'null' => true, 'default' => NULL, 'length' => 34),
		'indexes' => array()
	);
	var $records = array(array(
		'faktura_id'  => 1,
		'mangler'  => 1
	));
}
?>