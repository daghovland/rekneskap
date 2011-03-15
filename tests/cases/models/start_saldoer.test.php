<?php 
/* SVN FILE: $Id$ */
/* StartSaldoer Test cases generated on: 2010-01-18 23:01:39 : 1263853359*/
App::import('Model', 'StartSaldoer');

class StartSaldoerTestCase extends CakeTestCase {
	var $StartSaldoer = null;
	var $fixtures = array('app.start_saldoer', 'app.regnskap', 'app.konto');

	function startTest() {
		$this->StartSaldoer =& ClassRegistry::init('StartSaldoer');
	}

	function testStartSaldoerInstance() {
		$this->assertTrue(is_a($this->StartSaldoer, 'StartSaldoer'));
	}

	function testStartSaldoerFind() {
		$this->StartSaldoer->recursive = -1;
		$results = $this->StartSaldoer->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('StartSaldoer' => array(
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