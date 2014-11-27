<?php 
/* SVN FILE: $Id$ */
/* KaffelagerBeholdningerController Test cases generated on: 2010-03-11 17:03:31 : 1268325751*/
App::import('Controller', 'KaffelagerBeholdninger');

class TestKaffelagerBeholdninger extends KaffelagerBeholdningerController {
	var $autoRender = false;
}

class KaffelagerBeholdningerControllerTest extends CakeTestCase {
	var $KaffelagerBeholdninger = null;

	function startTest() {
		$this->KaffelagerBeholdninger = new TestKaffelagerBeholdninger();
		$this->KaffelagerBeholdninger->constructClasses();
	}

	function testKaffelagerBeholdningerControllerInstance() {
		$this->assertTrue(is_a($this->KaffelagerBeholdninger, 'KaffelagerBeholdningerController'));
	}

	function endTest() {
		unset($this->KaffelagerBeholdninger);
	}
}
?>