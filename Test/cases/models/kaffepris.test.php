<?php 
/* SVN FILE: $Id$ */
/* Kaffepris Test cases generated on: 2010-01-04 14:01:08 : 1262612648*/
App::import('Model', 'Kaffepris');

class KaffeprisTestCase extends CakeTestCase {
	var $Kaffepris = null;
	var $fixtures = array('app.kaffepris', 'app.kaffeflytting');

	function startTest() {
		$this->Kaffepris =& ClassRegistry::init('Kaffepris');
	}

	function testKaffeprisInstance() {
		$this->assertTrue(is_a($this->Kaffepris, 'Kaffepris'));
	}

	function testKaffeprisFind() {
		$this->Kaffepris->recursive = -1;
		$results = $this->Kaffepris->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffepris' => array(
			'type'  => 'Lorem ip',
			'beskrivelse'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'fra'  => '2010-01-04',
			'til'  => '2010-01-04',
			'pris'  => 1,
			'nummer'  => 1,
			'gram'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>