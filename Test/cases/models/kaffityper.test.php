<?php 
/* SVN FILE: $Id$ */
/* Kaffityper Test cases generated on: 2010-06-15 13:36:24 : 1276601784*/
App::import('Model', 'Kaffityper');

class KaffityperTestCase extends CakeTestCase {
	var $Kaffityper = null;
	var $fixtures = array('app.kaffityper');

	function startTest() {
		$this->Kaffityper =& ClassRegistry::init('Kaffityper');
	}

	function testKaffityperInstance() {
		$this->assertTrue(is_a($this->Kaffityper, 'Kaffityper'));
	}

	function testKaffityperFind() {
		$this->Kaffityper->recursive = -1;
		$results = $this->Kaffityper->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffityper' => array(
			'id'  => 1,
			'nettogram'  => 1,
			'namn'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>