<?php 
/* SVN FILE: $Id$ */
/* Kaffiimport Fixture generated on: 2010-04-11 15:04:35 : 1270992275*/

class KaffiimportFixture extends CakeTestFixture {
	var $name = 'Kaffiimport';
	var $table = 'kaffiimport';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'kooperativ' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'transportbetaling' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'forskuddsbetaling' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'restbetaling' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'kilo' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'sekker' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'kontrakt' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'kommentar' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'transportbetaling' => array('column' => 'transportbetaling', 'unique' => 0), 'forskuddsbetaling' => array('column' => 'forskuddsbetaling', 'unique' => 0), 'restbetaling' => array('column' => 'restbetaling', 'unique' => 0), 'kontrakt' => array('column' => 'kontrakt', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'kooperativ'  => 'Lorem ipsum dolor sit amet',
		'transportbetaling'  => 1,
		'forskuddsbetaling'  => 1,
		'restbetaling'  => 1,
		'kilo'  => 1,
		'sekker'  => 1,
		'kontrakt'  => 1,
		'created'  => '2010-04-11 15:24:35',
		'modified'  => '2010-04-11 15:24:35',
		'kommentar'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
	));
}
?>