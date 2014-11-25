<?php 
/* SVN FILE: $Id$ */
/* KaffiimportarController Test cases generated on: 2010-04-11 18:04:02 : 1271001902*/
App::import('Controller', 'Kaffiimportar');

class TestKaffiimportar extends KaffiimportarController {
	var $autoRender = false;
}

class KaffiimportarControllerTest extends CakeTestCase {
	var $Kaffiimportar = null;

	function startTest() {
		$this->Kaffiimportar = new TestKaffiimportar();
		$this->Kaffiimportar->constructClasses();
	}

	function testKaffiimportarControllerInstance() {
		$this->assertTrue(is_a($this->Kaffiimportar, 'KaffiimportarController'));
	}

	function endTest() {
		unset($this->Kaffiimportar);
	}
}
?>