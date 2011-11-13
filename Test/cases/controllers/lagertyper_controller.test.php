<?php 
/* SVN FILE: $Id$ */
/* LagertyperController Test cases generated on: 2010-01-03 22:01:36 : 1262554656*/
App::import('Controller', 'Lagertyper');

class TestLagertyper extends LagertyperController {
	var $autoRender = false;
}

class LagertyperControllerTest extends CakeTestCase {
	var $Lagertyper = null;

	function startTest() {
		$this->Lagertyper = new TestLagertyper();
		$this->Lagertyper->constructClasses();
	}

	function testLagertyperControllerInstance() {
		$this->assertTrue(is_a($this->Lagertyper, 'LagertyperController'));
	}

	function endTest() {
		unset($this->Lagertyper);
	}
}
?>