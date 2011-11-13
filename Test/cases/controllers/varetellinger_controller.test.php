<?php 
/* SVN FILE: $Id$ */
/* VaretellingerController Test cases generated on: 2010-03-05 12:03:47 : 1267787447*/
App::import('Controller', 'Varetellinger');

class TestVaretellinger extends VaretellingerController {
	var $autoRender = false;
}

class VaretellingerControllerTest extends CakeTestCase {
	var $Varetellinger = null;

	function startTest() {
		$this->Varetellinger = new TestVaretellinger();
		$this->Varetellinger->constructClasses();
	}

	function testVaretellingerControllerInstance() {
		$this->assertTrue(is_a($this->Varetellinger, 'VaretellingerController'));
	}

	function endTest() {
		unset($this->Varetellinger);
	}
}
?>