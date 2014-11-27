<?php 
/* SVN FILE: $Id$ */
/* RollerController Test cases generated on: 2009-12-30 21:12:28 : 1262205088*/
App::import('Controller', 'Roller');

class TestRoller extends RollerController {
	var $autoRender = false;
}

class RollerControllerTest extends CakeTestCase {
	var $Roller = null;

	function startTest() {
		$this->Roller = new TestRoller();
		$this->Roller->constructClasses();
	}

	function testRollerControllerInstance() {
		$this->assertTrue(is_a($this->Roller, 'RollerController'));
	}

	function endTest() {
		unset($this->Roller);
	}
}
?>