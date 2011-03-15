<?php 
/* SVN FILE: $Id$ */
/* Lagerverdityper Test cases generated on: 2010-04-10 21:04:07 : 1270926607*/
App::import('Model', 'Lagerverdityper');

class LagerverdityperTestCase extends CakeTestCase {
	var $Lagerverdityper = null;
	var $fixtures = array('app.lagerverdityper');

	function startTest() {
		$this->Lagerverdityper =& ClassRegistry::init('Lagerverdityper');
	}

	function testLagerverdityperInstance() {
		$this->assertTrue(is_a($this->Lagerverdityper, 'Lagerverdityper'));
	}

	function testLagerverdityperFind() {
		$this->Lagerverdityper->recursive = -1;
		$results = $this->Lagerverdityper->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Lagerverdityper' => array(
			'id'  => 1,
			'navn'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>