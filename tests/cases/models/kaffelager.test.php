<?php 
/* SVN FILE: $Id$ */
/* Kaffelager Test cases generated on: 2010-01-01 19:01:33 : 1262370993*/
App::import('Model', 'Kaffelager');

class KaffelagerTestCase extends CakeTestCase {
	var $Kaffelager = null;
	var $fixtures = array('app.kaffelager', 'app.selger');

	function startTest() {
		$this->Kaffelager =& ClassRegistry::init('Kaffelager');
	}

	function testKaffelagerInstance() {
		$this->assertTrue(is_a($this->Kaffelager, 'Kaffelager'));
	}

	function testKaffelagerFind() {
		$this->Kaffelager->recursive = -1;
		$results = $this->Kaffelager->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffelager' => array(
			'nummer'  => 1,
			'selger'  => 1,
			'beskrivelse'  => 'Lorem ipsum dolor sit amet',
			'lagertype'  => 1,
			'konto'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>