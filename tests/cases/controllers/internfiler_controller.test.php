<?php 
/* SVN FILE: $Id$ */
/* InternfilerController Test cases generated on: 2010-03-25 22:03:12 : 1269552312*/
App::import('Controller', 'Internfiler');

class TestInternfiler extends InternfilerController {
	var $autoRender = false;
}

class InternfilerControllerTest extends CakeTestCase {
	var $Internfiler = null;

	function startTest() {
		$this->Internfiler = new TestInternfiler();
		$this->Internfiler->constructClasses();
	}

	function testInternfilerControllerInstance() {
		$this->assertTrue(is_a($this->Internfiler, 'InternfilerController'));
	}

	function endTest() {
		unset($this->Internfiler);
	}
}
?>