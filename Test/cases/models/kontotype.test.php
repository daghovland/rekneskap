<?php 
/* SVN FILE: $Id$ */
/* Kontotype Test cases generated on: 2010-01-02 20:01:54 : 1262459514*/
App::import('Model', 'Kontotype');

class KontotypeTestCase extends CakeTestCase {
	var $Kontotype = null;
	var $fixtures = array('app.kontotype');

	function startTest() {
		$this->Kontotype =& ClassRegistry::init('Kontotype');
	}

	function testKontotypeInstance() {
		$this->assertTrue(is_a($this->Kontotype, 'Kontotype'));
	}

	function testKontotypeFind() {
		$this->Kontotype->recursive = -1;
		$results = $this->Kontotype->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kontotype' => array(
			'nummer'  => 1,
			'beskrivelse'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>