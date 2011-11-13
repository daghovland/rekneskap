<?php 
/* SVN FILE: $Id$ */
/* KaffityperController Test cases generated on: 2010-06-15 13:39:45 : 1276601985*/
App::import('Controller', 'Kaffityper');

class TestKaffityper extends KaffityperController {
	var $autoRender = false;
}

class KaffityperControllerTest extends CakeTestCase {
	var $Kaffityper = null;

	function startTest() {
		$this->Kaffityper = new TestKaffityper();
		$this->Kaffityper->constructClasses();
	}

	function testKaffityperControllerInstance() {
		$this->assertTrue(is_a($this->Kaffityper, 'KaffityperController'));
	}

	function endTest() {
		unset($this->Kaffityper);
	}
}
?>