<?php 
/* SVN FILE: $Id$ */
/* RegnskapController Test cases generated on: 2010-01-18 23:01:36 : 1263853776*/
App::import('Controller', 'Regnskap');

class TestRegnskap extends RegnskapController {
	var $autoRender = false;
}

class RegnskapControllerTest extends CakeTestCase {
	var $Regnskap = null;

	function startTest() {
		$this->Regnskap = new TestRegnskap();
		$this->Regnskap->constructClasses();
	}

	function testRegnskapControllerInstance() {
		$this->assertTrue(is_a($this->Regnskap, 'RegnskapController'));
	}

	function endTest() {
		unset($this->Regnskap);
	}
}
?>