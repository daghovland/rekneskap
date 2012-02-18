<?php 
/* SVN FILE: $Id$ */
/* Kaffibrenningutgiftarsum Test cases generated on: 2010-04-21 22:04:12 : 1271880312*/
App::import('Model', 'Kaffibrenningutgiftarsum');

class KaffibrenningutgiftarsumTestCase extends CakeTestCase {
	var $Kaffibrenningutgiftarsum = null;
	var $fixtures = array('app.kaffibrenningutgiftarsum', 'app.kaffibrenning');

	function startTest() {
		$this->Kaffibrenningutgiftarsum =& ClassRegistry::init('Kaffibrenningutgiftarsum');
	}

	function testKaffibrenningutgiftarsumInstance() {
		$this->assertTrue(is_a($this->Kaffibrenningutgiftarsum, 'Kaffibrenningutgiftarsum'));
	}

	function testKaffibrenningutgiftarsumFind() {
		$this->Kaffibrenningutgiftarsum->recursive = -1;
		$results = $this->Kaffibrenningutgiftarsum->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffibrenningutgiftarsum' => array(
			'kaffibrenning_id'  => 1,
			'utgiftar'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>