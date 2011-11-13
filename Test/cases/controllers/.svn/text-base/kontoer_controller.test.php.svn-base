<?php 
/* SVN FILE: $Id$ */
/* KontoerController Test cases generated on: 2010-01-02 01:01:48 : 1262391828*/
App::import('Controller', 'Kontoer');

class TestKontoer extends KontoerController {
	var $autoRender = false;
}

class KontoerControllerTest extends CakeTestCase {
	var $Kontoer = null;

	function startTest() {
		$this->Kontoer = new TestKontoer();
		$this->Kontoer->constructClasses();
	}

	function testKontoerControllerInstance() {
		$this->assertTrue(is_a($this->Kontoer, 'KontoerController'));
	}

	function endTest() {
		unset($this->Kontoer);
	}
}
?>