<?php 
/* SVN FILE: $Id$ */
/* KunderController Test cases generated on: 2010-01-02 00:01:43 : 1262389603*/
App::import('Controller', 'Kunder');

class TestKunder extends KunderController {
	var $autoRender = false;
}

class KunderControllerTest extends CakeTestCase {
	var $Kunder = null;

	function startTest() {
		$this->Kunder = new TestKunder();
		$this->Kunder->constructClasses();
	}

	function testKunderControllerInstance() {
		$this->assertTrue(is_a($this->Kunder, 'KunderController'));
	}

	function endTest() {
		unset($this->Kunder);
	}
}
?>