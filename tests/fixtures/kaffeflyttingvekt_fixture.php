<?php 
/* SVN FILE: $Id$ */
/* Kaffeflyttingvekt Fixture generated on: 2010-04-21 11:04:35 : 1271841815*/

class KaffeflyttingvektFixture extends CakeTestFixture {
	var $name = 'Kaffeflyttingvekt';
	var $table = 'kaffeflyttingvekt';
	var $fields = array(
		'kaffeflytting_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'kaffesalg_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'gram' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 22),
		'indexes' => array()
	);
	var $records = array(array(
		'kaffeflytting_id'  => 1,
		'kaffesalg_id'  => 1,
		'gram'  => 1
	));
}
?>