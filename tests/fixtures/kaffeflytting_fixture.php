<?php 
/* SVN FILE: $Id$ */
/* Kaffeflytting Fixture generated on: 2010-01-02 00:01:09 : 1262388129*/

class KaffeflyttingFixture extends CakeTestFixture {
	var $name = 'Kaffeflytting';
	var $table = 'kaffeflytting';
	var $fields = array(
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'type' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'antall' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 6),
		'fra' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'beskrivelse' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'til' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'dato' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'pengeflytting' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'fralagertype' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'tillagertype' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'ansvarlig' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'faktura' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1), 'pengeflytting' => array('column' => 'pengeflytting', 'unique' => 0), 'fralagertype' => array('column' => 'fralagertype', 'unique' => 0), 'tillagertype' => array('column' => 'tillagertype', 'unique' => 0), 'ansvarlig' => array('column' => 'ansvarlig', 'unique' => 0), 'kaffefaktura' => array('column' => 'faktura', 'unique' => 0))
	);
	var $records = array(array(
		'nummer'  => 1,
		'type'  => 1,
		'antall'  => 1,
		'fra'  => 1,
		'beskrivelse'  => 'Lorem ipsum dolor sit amet',
		'til'  => 1,
		'dato'  => '2010-01-02',
		'pengeflytting'  => 1,
		'fralagertype'  => 1,
		'tillagertype'  => 1,
		'ansvarlig'  => 1,
		'faktura'  => 1
	));
}
?>