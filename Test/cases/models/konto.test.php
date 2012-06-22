<?php 
/* SVN FILE: $Id$ */
/* Konto Test cases generated on: 2010-01-01 20:01:17 : 1262374157*/
App::import('Model', 'Konto');

class KontoTestCase extends CakeTestCase {
	var $Konto = null;
	var $fixtures = array('app.konto', 'app.kontotype', 'app.selger');

	function startTest() {
		$this->Konto =& ClassRegistry::init('Konto');
	}

	function testKontoInstance() {
		$this->assertTrue(is_a($this->Konto, 'Konto'));
	}

	function testKontoFind() {
		$this->Konto->recursive = -1;
		$results = $this->Konto->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Konto' => array(
			'nummer'  => 1,
			'beskrivelse'  => 'Lorem ipsum dolor sit amet',
			'type'  => 1,
			'ansvarlig'  => 1,
			'delav'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>