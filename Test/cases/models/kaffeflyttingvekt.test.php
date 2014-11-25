<?php 
/* SVN FILE: $Id$ */
/* Kaffeflyttingvekt Test cases generated on: 2010-04-21 11:04:35 : 1271841815*/
App::import('Model', 'Kaffeflyttingvekt');

class KaffeflyttingvektTestCase extends CakeTestCase {
	var $Kaffeflyttingvekt = null;
	var $fixtures = array('app.kaffeflyttingvekt', 'app.kaffeflytting', 'app.kaffesalg');

	function startTest() {
		$this->Kaffeflyttingvekt =& ClassRegistry::init('Kaffeflyttingvekt');
	}

	function testKaffeflyttingvektInstance() {
		$this->assertTrue(is_a($this->Kaffeflyttingvekt, 'Kaffeflyttingvekt'));
	}

	function testKaffeflyttingvektFind() {
		$this->Kaffeflyttingvekt->recursive = -1;
		$results = $this->Kaffeflyttingvekt->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffeflyttingvekt' => array(
			'kaffeflytting_id'  => 1,
			'kaffesalg_id'  => 1,
			'gram'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>