<?php 
/* SVN FILE: $Id$ */
/* Lagerverdiflytting Fixture generated on: 2010-04-10 21:04:04 : 1270926904*/

class LagerverdiflyttingFixture extends CakeTestFixture {
	var $name = 'Lagerverdiflytting';
	var $table = 'lagerverdiflyttinger';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'fra' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'til' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kroner' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'oere' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'dato' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'kommentar' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 300),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'pengeflytting_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kaffeflytting_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kaffiimport_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'kaffesalg_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fra' => array('column' => 'fra', 'unique' => 0), 'til' => array('column' => 'til', 'unique' => 0), 'pengeflytting_id' => array('column' => 'pengeflytting_id', 'unique' => 0), 'kaffeflytting_id' => array('column' => 'kaffeflytting_id', 'unique' => 0), 'kaffesalg_id' => array('column' => 'kaffesalg_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'fra'  => 1,
		'til'  => 1,
		'kroner'  => 1,
		'oere'  => 1,
		'dato'  => '2010-04-10 21:15:04',
		'kommentar'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-04-10 21:15:04',
		'modified'  => '2010-04-10 21:15:04',
		'pengeflytting_id'  => 1,
		'kaffeflytting_id'  => 1,
		'kaffiimport_id'  => 1,
		'kaffesalg_id'  => 1
	));
}
?>