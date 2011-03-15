<?php 
/* SVN FILE: $Id$ */
/* Selger Test cases generated on: 2009-12-30 21:12:08 : 1262205728*/
App::import('Model', 'Selger');

class SelgerTestCase extends CakeTestCase {
	var $Selger = null;
	var $fixtures = array('app.selger', 'app.rolle');

	function startTest() {
		$this->Selger =& ClassRegistry::init('Selger');
	}

	function testSelgerInstance() {
		$this->assertTrue(is_a($this->Selger, 'Selger'));
	}

	function testSelgerFind() {
		$this->Selger->recursive = -1;
		$results = $this->Selger->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Selger' => array(
			'navn'  => 'Lorem ipsum dolor sit amet',
			'nummer'  => 1,
			'epost'  => 'Lorem ipsum dolor sit amet',
			'telefon'  => 'Lorem ipsum dolor ',
			'passord'  => 'Lorem ipsum dolor sit amet',
			'rolle_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>