<?php 
/* SVN FILE: $Id$ */
/* Lagertype Test cases generated on: 2010-01-03 22:01:12 : 1262554632*/
App::import('Model', 'Lagertype');

class LagertypeTestCase extends CakeTestCase {
	var $Lagertype = null;
	var $fixtures = array('app.lagertype', 'app.kaffelager');

	function startTest() {
		$this->Lagertype =& ClassRegistry::init('Lagertype');
	}

	function testLagertypeInstance() {
		$this->assertTrue(is_a($this->Lagertype, 'Lagertype'));
	}

	function testLagertypeFind() {
		$this->Lagertype->recursive = -1;
		$results = $this->Lagertype->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Lagertype' => array(
			'nummer'  => 1,
			'navn'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>