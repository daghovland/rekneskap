<?php 
/* SVN FILE: $Id$ */
/* LagerverdityperController Test cases generated on: 2010-04-10 21:04:26 : 1270926926*/
App::import('Controller', 'Lagerverdityper');

class TestLagerverdityper extends LagerverdityperController {
	var $autoRender = false;
}

class LagerverdityperControllerTest extends CakeTestCase {
	var $Lagerverdityper = null;

	function startTest() {
		$this->Lagerverdityper = new TestLagerverdityper();
		$this->Lagerverdityper->constructClasses();
	}

	function testLagerverdityperControllerInstance() {
		$this->assertTrue(is_a($this->Lagerverdityper, 'LagerverdityperController'));
	}

	function endTest() {
		unset($this->Lagerverdityper);
	}
}
?>