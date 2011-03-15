<?php 
/* SVN FILE: $Id$ */
/* Kaffibrenningbonneverdi Test cases generated on: 2010-04-21 21:04:50 : 1271879690*/
App::import('Model', 'Kaffibrenningbonneverdi');

class KaffibrenningbonneverdiTestCase extends CakeTestCase {
	var $Kaffibrenningbonneverdi = null;
	var $fixtures = array('app.kaffibrenningbonneverdi', 'app.kaffibrenning');

	function startTest() {
		$this->Kaffibrenningbonneverdi =& ClassRegistry::init('Kaffibrenningbonneverdi');
	}

	function testKaffibrenningbonneverdiInstance() {
		$this->assertTrue(is_a($this->Kaffibrenningbonneverdi, 'Kaffibrenningbonneverdi'));
	}

	function testKaffibrenningbonneverdiFind() {
		$this->Kaffibrenningbonneverdi->recursive = -1;
		$results = $this->Kaffibrenningbonneverdi->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffibrenningbonneverdi' => array(
			'kaffibrenning_id'  => 1,
			'bonneverdi'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>