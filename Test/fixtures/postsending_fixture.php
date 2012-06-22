<?php 
/* SVN FILE: $Id$ */
/* Postsending Fixture generated on: 2010-04-20 11:04:31 : 1271757511*/

class PostsendingFixture extends CakeTestFixture {
	var $name = 'Postsending';
	var $table = 'postsendingar';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'kaffesalg_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kunderegning' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'utgift' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'sendingsnummer' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'transporter' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'kommentar' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 300),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'kaffesalg_id' => array('column' => 'kaffesalg_id', 'unique' => 0), 'kunderegning' => array('column' => 'kunderegning', 'unique' => 0), 'utgift' => array('column' => 'utgift', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'kaffesalg_id'  => 1,
		'kunderegning'  => 1,
		'utgift'  => 1,
		'sendingsnummer'  => 'Lorem ipsum dolor sit amet',
		'transporter'  => 'Lorem ipsum dolor sit amet',
		'kommentar'  => 'Lorem ipsum dolor sit amet'
	));
}
?>