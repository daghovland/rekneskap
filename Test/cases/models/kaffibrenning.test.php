<?php 
/* SVN FILE: $Id$ */
/* Kaffibrenning Test cases generated on: 2010-04-11 15:04:44 : 1270992344*/
App::import('Model', 'Kaffibrenning');

class KaffibrenningTestCase extends CakeTestCase {
	var $Kaffibrenning = null;
	var $fixtures = array('app.kaffibrenning', 'app.kaffiimport', 'app.kaffiinnkjop', 'app.lagerverdiflytting');

	function startTest() {
		$this->Kaffibrenning =& ClassRegistry::init('Kaffibrenning');
	}

	function testKaffibrenningInstance() {
		$this->assertTrue(is_a($this->Kaffibrenning, 'Kaffibrenning'));
	}

	function testKaffibrenningFind() {
		$this->Kaffibrenning->recursive = -1;
		$results = $this->Kaffibrenning->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffibrenning' => array(
			'id'  => 1,
			'brenneri'  => 'Lorem ipsum dolor sit amet',
			'kaffiimport_id'  => 1,
			'modified'  => '2010-04-11 15:25:44',
			'created'  => '2010-04-11 15:25:44'
		));
		$this->assertEqual($results, $expected);
	}
}
?>