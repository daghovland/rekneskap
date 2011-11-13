<?php 
/* SVN FILE: $Id$ */
/* Kaffesalgvekt Test cases generated on: 2010-04-21 11:04:56 : 1271841836*/
App::import('Model', 'Kaffesalgvekt');

class KaffesalgvektTestCase extends CakeTestCase {
	var $Kaffesalgvekt = null;
	var $fixtures = array('app.kaffesalgvekt', 'app.kaffesalg');

	function startTest() {
		$this->Kaffesalgvekt =& ClassRegistry::init('Kaffesalgvekt');
	}

	function testKaffesalgvektInstance() {
		$this->assertTrue(is_a($this->Kaffesalgvekt, 'Kaffesalgvekt'));
	}

	function testKaffesalgvektFind() {
		$this->Kaffesalgvekt->recursive = -1;
		$results = $this->Kaffesalgvekt->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffesalgvekt' => array(
			'kaffesalg_id'  => 1,
			'gram'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>