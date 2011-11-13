<?php 
/* SVN FILE: $Id$ */
/* KontotyperController Test cases generated on: 2010-01-02 01:01:30 : 1262391930*/
App::import('Controller', 'Kontotyper');

class TestKontotyper extends KontotyperController {
	var $autoRender = false;
}

class KontotyperControllerTest extends CakeTestCase {
	var $Kontotyper = null;

	function startTest() {
		$this->Kontotyper = new TestKontotyper();
		$this->Kontotyper->constructClasses();
	}

	function testKontotyperControllerInstance() {
		$this->assertTrue(is_a($this->Kontotyper, 'KontotyperController'));
	}

	function endTest() {
		unset($this->Kontotyper);
	}
}
?>