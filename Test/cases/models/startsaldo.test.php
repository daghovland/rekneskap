<?php 
/* SVN FILE: $Id$ */
/* Startsaldo Test cases generated on: 2010-01-19 09:01:26 : 1263890426*/
App::import('Model', 'Startsaldo');

class StartsaldoTestCase extends CakeTestCase {
	var $Startsaldo = null;
	var $fixtures = array('app.startsaldo', 'app.regnskap', 'app.konto');

	function startTest() {
		$this->Startsaldo =& ClassRegistry::init('Startsaldo');
	}

	function testStartsaldoInstance() {
		$this->assertTrue(is_a($this->Startsaldo, 'Startsaldo'));
	}

	function testStartsaldoFind() {
		$this->Startsaldo->recursive = -1;
		$results = $this->Startsaldo->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Startsaldo' => array(
			'id'  => 1,
			'regnskap_id'  => 1,
			'kroner'  => 1,
			'oere'  => 1,
			'konto_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>