<?php 
/* SVN FILE: $Id$ */
/* Kaffepris Fixture generated on: 2010-01-04 14:01:08 : 1262612648*/

class KaffeprisFixture extends CakeTestFixture {
	var $name = 'Kaffepris';
	var $table = 'kaffepris';
	var $fields = array(
		'type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 10),
		'beskrivelse' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'fra' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'til' => array('type'=>'date', 'null' => true, 'default' => NULL),
		'pris' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'nummer' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'gram' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => 'nummer', 'unique' => 1))
	);
	var $records = array(array(
		'type'  => 'Lorem ip',
		'beskrivelse'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'fra'  => '2010-01-04',
		'til'  => '2010-01-04',
		'pris'  => 1,
		'nummer'  => 1,
		'gram'  => 1
	));
}
?>