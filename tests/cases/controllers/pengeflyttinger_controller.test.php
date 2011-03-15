<?php 
/* SVN FILE: $Id$ */
/* PengeflyttingerController Test cases generated on: 2010-01-01 20:01:01 : 1262373421*/
App::import('Controller', 'Pengeflyttinger');

class TestPengeflyttinger extends PengeflyttingerController {
	var $autoRender = false;
}

class PengeflyttingerControllerTest extends CakeTestCase {
	var $Pengeflyttinger = null;

	function startTest() {
		$this->Pengeflyttinger = new TestPengeflyttinger();
		$this->Pengeflyttinger->constructClasses();
	}

	function testPengeflyttingerControllerInstance() {
		$this->assertTrue(is_a($this->Pengeflyttinger, 'PengeflyttingerController'));
	}

	function endTest() {
		unset($this->Pengeflyttinger);
	}
}
?>