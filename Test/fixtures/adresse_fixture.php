<?php 
/* SVN FILE: $Id$ */
/* Adresse Fixture generated on: 2010-01-01 20:01:23 : 1262375723*/

class AdresseFixture extends CakeTestFixture {
	var $name = 'Adresse';
	var $table = 'adresser';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'linje1' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 200),
		'linje2' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'linje3' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'merkes' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'postnummer' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 4),
		'poststad' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $records = array(array(
		'nummer'  => 1,
		'linje1'  => 'Lorem ipsum dolor sit amet',
		'linje2'  => 'Lorem ipsum dolor sit amet',
		'linje3'  => 'Lorem ipsum dolor sit amet',
		'merkes'  => 'Lorem ipsum dolor sit amet',
		'postnummer'  => 'Lo',
		'poststad'  => 'Lorem ipsum dolor sit amet'
	));
}
?>