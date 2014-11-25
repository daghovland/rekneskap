<?php 
/* SVN FILE: $Id$ */
/* Rolle Test cases generated on: 2009-12-30 21:12:03 : 1262205903*/
App::import('Model', 'Rolle');

class RolleTestCase extends CakeTestCase {
	var $Rolle = null;
	var $fixtures = array('app.rolle');

	function startTest() {
		$this->Rolle =& ClassRegistry::init('Rolle');
	}

	function testRolleInstance() {
		$this->assertTrue(is_a($this->Rolle, 'Rolle'));
	}

	function testRolleFind() {
		$this->Rolle->recursive = -1;
		$results = $this->Rolle->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Rolle' => array(
			'nummer'  => 1,
			'navn'  => 'Lorem ipsum dolor '
		));
		$this->assertEqual($results, $expected);
	}
}
?>