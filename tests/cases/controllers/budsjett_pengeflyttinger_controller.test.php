<?php
/* BudsjettPengeflyttinger Test cases generated on: 2010-11-03 11:11:09 : 1288779369*/
App::import('Controller', 'BudsjettPengeflyttinger');

class TestBudsjettPengeflyttingerController extends BudsjettPengeflyttingerController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BudsjettPengeflyttingerControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.budsjett_pengeflytting', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.kaffibrenning', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum', 'app.kaffeflytting', 'app.faktura', 'app.kunde', 'app.adresse', 'app.kaffesalg', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.konto', 'app.kontotype', 'app.kontobalanse', 'app.pengeflytting', 'app.postsending', 'app.bilag', 'app.pengeflytting_bilag', 'app.kontoutskrift', 'app.kaffelagerbeholdning', 'app.kaffepris', 'app.rabatt', 'app.selgerbalanse', 'app.kaffesalgvekt', 'app.faktura_ubetalt', 'app.kaffeflyttingvekt');

	function startTest() {
		$this->BudsjettPengeflyttinger =& new TestBudsjettPengeflyttingerController();
		$this->BudsjettPengeflyttinger->constructClasses();
	}

	function endTest() {
		unset($this->BudsjettPengeflyttinger);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>