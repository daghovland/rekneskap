<?php 
/* SVN FILE: $Id$ */
/* KaffiinnkjopController Test cases generated on: 2010-06-15 13:40:00 : 1276602000*/
App::import('Controller', 'Kaffiinnkjop');

class TestKaffiinnkjop extends KaffiinnkjopController {
	var $autoRender = false;
}

class KaffiinnkjopControllerTest extends CakeTestCase {
	var $Kaffiinnkjop = null;

	function startTest() {
		$this->Kaffiinnkjop = new TestKaffiinnkjop();
		$this->Kaffiinnkjop->constructClasses();
	}

	function testKaffiinnkjopControllerInstance() {
		$this->assertTrue(is_a($this->Kaffiinnkjop, 'KaffiinnkjopController'));
	}

	function endTest() {
		unset($this->Kaffiinnkjop);
	}
}
?>