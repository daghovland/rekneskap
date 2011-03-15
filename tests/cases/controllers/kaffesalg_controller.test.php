<?php 
/* SVN FILE: $Id$ */
/* KaffesalgController Test cases generated on: 2010-01-08 10:01:21 : 1262941581*/
App::import('Controller', 'Kaffesalg');

class TestKaffesalg extends KaffesalgController {
	var $autoRender = false;
}

class KaffesalgControllerTest extends CakeTestCase {
	var $Kaffesalg = null;

	function startTest() {
		$this->Kaffesalg = new TestKaffesalg();
		$this->Kaffesalg->constructClasses();
	}

	function testKaffesalgControllerInstance() {
		$this->assertTrue(is_a($this->Kaffesalg, 'KaffesalgController'));
	}

	function endTest() {
		unset($this->Kaffesalg);
	}
}
?>