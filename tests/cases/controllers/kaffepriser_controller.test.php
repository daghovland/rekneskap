<?php 
/* SVN FILE: $Id$ */
/* KaffepriserController Test cases generated on: 2010-01-04 14:01:09 : 1262612710*/
App::import('Controller', 'Kaffepriser');

class TestKaffepriser extends KaffepriserController {
	var $autoRender = false;
}

class KaffepriserControllerTest extends CakeTestCase {
	var $Kaffepriser = null;

	function startTest() {
		$this->Kaffepriser = new TestKaffepriser();
		$this->Kaffepriser->constructClasses();
	}

	function testKaffepriserControllerInstance() {
		$this->assertTrue(is_a($this->Kaffepriser, 'KaffepriserController'));
	}

	function endTest() {
		unset($this->Kaffepriser);
	}
}
?>